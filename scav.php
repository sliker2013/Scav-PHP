<?php
	require_once('auth.php');
	include('tmp/header_t.php'); //HTML Header Bereich
?>
		<div class="body">
			<div class="left_body">
				<div class="slider">
					<div style="text-align: center;padding: 40px 0px 0px 0px;font-size: 30px;">Willkommen <?php echo $_SESSION['SESS_FIRST_NAME'];?></br><?php echo '<img src="'.htmlentities($_SESSION['SESS_AVATAR'], ENT_QUOTES, 'UTF-8').'" alt="Avatar" style="max-width:200px;max-height:200px;" />';?></div>
				</div>
				<div class="box_title"><b><font color="#018DB8">3-Punkte-System</font></b></div>
				<div class="box_content">
<table>
<thead>
    <tr>
    	<th>Charname</th>
		<th>Punkte</th>
		<th>Beschreibung</th>
		<th>Datum</th>
    </tr>
	</thead>
<?PHP include ("inc/config.php");
$query = "SELECT * FROM w_scav";
$result = mysql_query($query);
while ($row = mysql_fetch_array($result))

  {
		echo "<tr>";
		echo '<td><img src="img/klassen/'.$row['klasse'].'.jpg"><a href="http://www.frostmourne.eu/community/char/Frostmourne/' . $row['charname'] . '/" target="_blank">' . $row['charname'] . '</td>';
		echo '<td>' . $row['punkte'] . '</td>';
		echo '<td>' . $row['beschreibung'] . '</td>';
		echo '<td>' . $row['date'] . '</td>';
		echo "</tr>"; 
	} 
	echo "</table>";
?>
  </tbody>
</table>
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