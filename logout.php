<?php
	//Start session
	session_start();
	include('tmp/header.php'); //HTML Header Bereich
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
?>
		<div class="body">
			<div class="left_body">
				<div class="slider">
					<iframe width="600" height="250" src="https://www.youtube.com/embed/-Gqo1lD1skQ" frameborder="0" allowfullscreen></iframe>
				</div>
				<div class="box_title"><font color="#018DB8"><b>Komm Bald Wieder</b></font></div>
				<a href="index.php">Start</a>
				<div class="box_content">
			</div>
			<div class="right_body">
				
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