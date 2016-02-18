<?php

	session_start();

?>

<!doctype html>

<html>

<head>

	<meta charset="UTF-8" />

  	<link href="css/style.css" rel="stylesheet" type="text/css" />

	<link href='http://fonts.googleapis.com/css?family=Tauri' rel='stylesheet' type='text/css'>

   	<title>W&V 2015 - Forum</title>

</head>

<body>	

  <header class="banner">

    <ul class='menu_top clearfix'>

      <li><a href="index.php">Home</a></li>

      <li><a href="forum.html">Forum</a></li>

      <li><a href="info.html">Infos</a></li>

      <li><a href="live.html">Live Stream</a></li>

    </ul>



    <h1 class='logo_wrapper'>

      <a href="index.php">

        <img src="img/Design02-logo-blue.png" onMouseOver="this.src='img/Design02-logo-orange.png'" onMouseOut="this.src='img/Design02-logo-blue.png'" alt="Startseite" title="Startseite">

      </a>

    </h1>

	</header>





		<!-- CONTENT -->

<main role="main">

<article>

<?php

	if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {

		echo '<ul class="err">';

		foreach($_SESSION['ERRMSG_ARR'] as $msg) {

			echo '<li>',$msg,'</li>'; 

		}

		echo '</ul>';

		unset($_SESSION['ERRMSG_ARR']);

	}

?>

	<h1><b>Registrierung</h1>

 

<section>

	<h2>Jetzt Kostenloss Registrieren!!!!</h2>

    <p><center>

<form id="loginForm" name="loginForm" method="post" action="register-exec.php">

  <table width="300" border="0" align="center" cellpadding="2" cellspacing="0">

    <tr>

      <th>Vorname:</th>

      <td><input name="fname" type="text" class="textfield" id="fname" /></td>

    </tr>

    <tr>

      <th>Nachname:</th>

      <td><input name="lname" type="text" class="textfield" id="lname" /></td>

    </tr>

    <tr>

      <th width="124">Login Name:</th>

      <td width="168"><input name="login" type="text" class="textfield" id="login" /></td>

    </tr>

	    <tr>

      <th width="124">Email:</th>

      <td width="168"><input name="email" type="text" class="textfield" id="email" /></td>

    </tr>
    <tr>

      <th>Password:</th>

      <td><input name="password" type="password" class="textfield" id="password" /></td>

    </tr>

    <tr>
      <th>Wiederhole Password:</th>

      <td><input name="cpassword" type="password" class="textfield" id="cpassword" /></td>

    </tr>

    <tr>

      <td>&nbsp;</td>
	<center>
      <td><input type="submit" name="Submit" value="Registrieren" /></td></center>

    </tr>

  </table>

</form>

    </center></p>

</section>



<aside class="contact">

    <h2>weitere Informationen</h2>

	<ul class="bullets">

		<li><a href="#" >Werbung 1</a></li>

		<li><a href="#" >Werbung 2</a></li>

		<li><a href="#" >Werbung 3</a></li>

		<li><a href="#" >Werbung 4</a></li>

		<li><a href="#" >Werbung 5</a></li>

		<li><a href="#" >Werbung 6</a></li>

	</ul>

</aside>

</article> 

</main>

<?php
include('tmp/footer.php');
?>
</html>