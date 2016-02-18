<?php
	//Start session
	session_start();
	
	//Include database connection details
	require_once('inc/config.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$login = clean($_POST['login']);
	$password = clean($_POST['password']);
	
	//Input Validations
	if($login == '') {
		$errmsg_arr[] = 'Login ID fehlt';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password fehlt';
		$errflag = true;
	}
	
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: login-form.php");
		exit();
	}
	
	//Create query
	$qry="SELECT * FROM w_members WHERE login='$login' AND passwd='".md5($_POST['password'])."'";
	$result=mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) == 1) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['member_id'];
			$_SESSION['SESS_FIRST_NAME'] = $member['firstname'];
			$_SESSION['SESS_LAST_NAME'] = $member['lastname'];
			$_SESSION['SESS_LOGIN_NAME'] = $member['login'];
			$_SESSION['SESS_EMAIL_NAME'] = $member['email'];
			$_SESSION['SESS_AVATAR'] = $member['avatar'];
		list($user_level) = mysql_fetch_row(mysql_query("select user_level from w_members where member_id='$_SESSION[SESS_MEMBER_ID]'"));

			$_SESSION['user_level'] = $user_level;
			session_write_close();
			header("location: member-index.php");
			exit();
		}else {
			//Login failed
			header("location: loginfailed.php");
			exit();
		}
	}else {
		die("Query failed");
	}
?>
