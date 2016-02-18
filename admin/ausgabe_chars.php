<?php
require_once('../inc/config.php');


$DKP = $_POST["dkp"];

echo $_POST["dkp"];



$sql_schreiben = "INSERT INTO w_scav_dkp (dkp) VALUES('$DKP')";
mysql_query($sql_schreiben);
var_dump($sql_schreiben);
if($sql_schreiben){ 
		
			header("Location: admin_chars.php");
		
		}else{
			echo get_error('Der Eintrag war leider nicht erfolgreich! ".mysql_error()."');
		}
?>