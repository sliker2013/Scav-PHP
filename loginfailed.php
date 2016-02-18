<?php

	session_start();
	include('tmp/header.php'); //HTML Header Bereich

?>

		<div class="body">
			<div class="left_body">
				<div class="slider">
					<iframe width="600" height="250" src="https://www.youtube.com/embed/-Gqo1lD1skQ" frameborder="0" allowfullscreen></iframe>
				</div>
				<div class="box_title"><?php
				require_once('inc/config.php');
				$sql = "SELECT * FROM w_news ORDER BY id DESC LIMIT 1";
				$rs = mysql_query($sql);
				while($row = mysql_fetch_assoc($rs)) {
				echo $row['title'] . "<br />";}
?></div>
				<div class="box_content">
<font color="018DB8"><b>Falsche Daten Benutzt!</b><p></br></font>
Versuche es Nochmal				</div>
			</div>
			<div class="right_body">
				<div class="box_title"><font color="#018DB8">Memberbereich</font></div>
				<div class="box_content">
				<form id="loginForm" name="loginForm" method="post" action="login-exec.php" class="form form--login">
					<div class="left" style="margin-top: 10px"><font color="#018DB8">Username</font></div><div class="right"><input name="login" type="text" class="textfield" id="login" /></div><div class="clear"></div>
					<div class="left" style="margin-top: 10px"><font color="#018DB8">Password</font></div><div class="right"><input name="password" type="password" class="textfield" id="password" /></div><div class="hidden"></div>
					<div class="right"><input type="submit" name="Submit" value="Login" /></div><div class="clear"></div>
					</form>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	</center>
	<div class="clearfooter"></div>
</div>
<?php
include('tmp/footer.php'); //HTML Footer Bereich
?>