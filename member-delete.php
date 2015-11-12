<?php
include ('config.php');
require_once('auth.php');

if (isset($_POST["Absenden"])){

      $user  = $_POST['u_name'];
      $pass  = $_POST['pwd'];
	  
if(!$user){
echo "Bitte gebe dein Username ein. <br>";
}
if(!$pass){
	echo "Bitte gebe dein Passwort ein.";
	header('Refresh: 9; member-delete.php');
	}
if ($user && $pass){
	   $sql= ("DELETE FROM user_accounts WHERE username = '$user' AND password = '$pass' ");
	   $res = mysql_query($sql);
	   echo"Dein Account wurde Gelöscht.";
	   } ELSE {
		   echo"Falscher User und Passwort!";
	  } 
		  
}
?>
