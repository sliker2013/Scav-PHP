<?php
    define('DB_HOST', '127.0.0.1');
    define('DB_USER', 'user');
    define('DB_PASSWORD', 'passowrd');
    define('DB_DATABASE', 'database');

	
$connection = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) OR DIE ("Keine Verbindung zu der Datenbank moeglich.");
$db = mysql_select_db(DB_DATABASE , $connection) OR DIE ("Auswahl der Datenbank nicht moeglich."); 

error_reporting(E_ALL ^ E_NOTICE);


define ("ADMIN_LEVEL", 5);
define ("USER_LEVEL", 1);
define ("GUEST_LEVEL", 0);


require_once('userclass.php');
?>
