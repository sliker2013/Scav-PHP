<?php
require_once('../inc/config.php');


$Autor = $_SESSION['SESS_LOGIN_NAME'];
$Char = $_POST["charname"];
$Klasse = $_POST["klasse"];
$Titel = $_POST["punkte"];
$Inhalt = $_POST["beschreibung"];

echo $_SESSION['SESS_LOGIN_NAME'];
echo $_POST["charname"];
echo $_Post["klasse"];
echo $_POST["punkte"];
echo $_POST["beschreibung"];

$sql_schreiben = "INSERT INTO w_scav (autor, charname, klasse, punkte, beschreibung, date) VALUES('$Autor', '$Char', '$Klasse', '$Titel', '$Inhalt', now())";
mysql_query($sql_schreiben);
var_dump($sql_schreiben);
if($sql_schreiben){ 
		
			header("Location: admin_scav.php");
		
		}else{
			echo get_error('Der Eintrag war leider nicht erfolgreich! ".mysql_error()."');
		}
?>