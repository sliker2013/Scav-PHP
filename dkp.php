<?php
require_once('auth.php');
require_once('inc/config.php');
include('tmp/header_t.php'); //HTML Header Bereich

?>

		<div class="body">
			<div class="left_body">
				<div class="slider">
					<div style="text-align: center;padding: 40px 0px 0px 0px;font-size: 30px;">Admin Arbeiten <?php echo $_SESSION['SESS_FIRST_NAME'];?></br><?php echo '<img src="'.htmlentities($_SESSION['SESS_AVATAR'], ENT_QUOTES, 'UTF-8').'" alt="Avatar" style="max-width:200px;max-height:200px;" />';?></div>
				</div>
				<div class="box_title"><b><font color="#018DB8">Scavengers DKP Liste</font></b></div>
				<div class="box_content">
				<table>
<thead>
    <tr>
		<th>Name</th>
    	<th>Klasse</th>
		<th>Rang</th>
		<th>Net DKP</th>
		<th>Total DKP</th>
		<th>Spent DKP</th>
    </tr>
	</thead>
<?PHP
				require_once('inc/config.php');
				$sql = "SELECT * FROM w_scav_dkp";
				$rs = mysql_query($sql);
				while($row = mysql_fetch_assoc($rs)) {
				echo $row['dkp'] . "<br />";}
?>
</table><a href="#top" onClick="scrollTop()"><b><p align="right">Nach Oben</p></b></a>

				</div>
			</div>
			<div class="right_body">
				<div class="box_title"><font color="#018DB8">Men&uuml;</font></div>
				<div class="box_content">
				<?php
				require_once('userlink.php');
				?>
				</div>
			</div>
			<div class="clear"></div>
		</div>
<?php
include('tmp/footer.php');
?>