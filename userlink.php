<?php
require_once('inc/config.php');
session_start();
if (isset($_SESSION['SESS_MEMBER_ID'])) {
	echo "
	<ul>
	<li><a href='member-index.php'>Member Home</a></li>
	<li><a href='scav.php'>Punkte System</a></li>
	<li><a href='dkp.php'>DKP Liste</a></li>
	<li><a href='logout.php'>Logout</a></li>
	</ul>";
	
	//Links for permission level 1 (default admin)
	if (checkAdmin()){
	echo "
	<ul>
	</br>
	<b>Admin Bereich</b>
	</br>
	<li><a href='./admin/admin_scav.php'>Punkte System Eintragen</a></li>
	<li><a href='./admin/admin_dkp.php'>DKP Hochladen</a></li>
	<li><a href='./admin/admin_chars.php'>DKP Liste</a></li>
	</br>
	<b>News Bereich</b>
	</br>
	<li><a href='./admin/admin_news.php'>News Schreiben</a></li>
	</ul>";
	}
}
?>