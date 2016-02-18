<?php
require_once('../auth.php');
require_once('../inc/config.php');
include('../tmp/header_admin.php'); //HTML Header Bereich
if(!checkAdmin()) {
header("Location: ../member-index.php");
exit();
}
?>

		<div class="body">
			<div class="left_body">
				<div class="slider">
					<div style="text-align: center;padding: 40px 0px 0px 0px;font-size: 30px;">Admin Arbeiten <?php echo $_SESSION['SESS_FIRST_NAME'];?></br><?php echo '<img src="'.htmlentities($_SESSION['SESS_AVATAR'], ENT_QUOTES, 'UTF-8').'" alt="Avatar" style="max-width:200px;max-height:200px;" />';?></div>
				</div>
				<div class="box_title"><b><font color="#018DB8">3-Punkte-System</font></b></div>
				<div class="box_content">
				<table>
<thead>
    <tr>
		<th>ID</th>
    	<th>Charname</th>
		<th>Punkte</th>
		<th>Beschreibung</th>
		<th>Datum</th>
		<th>Edit</th>
		<th>Delete</th>
    </tr>
	</thead>


<?PHP include ("../inc/config.php");
$query = "SELECT * FROM w_scav";
$result = mysql_query($query);
while ($row = mysql_fetch_array($result))

  {
		echo "<tr>";
		echo '<td>' . $row['id'] . '</td>';
		echo '<td><img src="../img/klassen/'.$row['klasse'].'.jpg"><a href="http://www.frostmourne.eu/community/char/Frostmourne/' . $row['charname'] . '/" target="_blank">' . $row['charname'] . '</td>';
		echo '<td>' . $row['punkte'] . '</td>';
		echo '<td>' . $row['beschreibung'] . '</td>';
		echo '<td>' . $row['date'] . '</td>';
		echo '<td><center><a href="update.php?id=' . $row['id'] . '"><img src="../img/icon/file-edit-2.png" alt="Bild" /></a></center></td>';
		echo '<td><center><a href="delete.php?id=' . $row['id'] . '"><img src="../img/icon/delete2.png" alt="Bild" /></a></center></td>';
		echo "</tr>"; 
	} 
	echo "</table>";
?>
</table>
    <p>
	<table>
<thead>
    <tr>
    	<th><center>Charname</center></th>
		<th><center>Klasse</center></th>
		<th><center>Punkte</center></th>
		<th><center>Beschreibung</center></th>
    </tr>
	</thead>
<tbody>
    <tr>
	<form method="post" value="link" action="ausgabe.php">
    	<td class="lol"><input type="text" name="charname" value="Charname"></td>
		<td class="lol"><select name="klasse" > 
        <option value="1">Krieger</option> 
        <option value="2">Paladin</option> 
        <option value="3">Todesritter</option> 
        <option value="4">Druide</option> 
        <option value="5">J&auml;ger</option>
		<option value="6">Hexenmeister</option> 
		<option value="7">Schurke</option> 
		<option value="8">Priester</option> 
		<option value="9">Schamane</option> 
		<option value="10">Magier</option> 		
		</select></td>
		<td class="lol"><input type="text" name="punkte" value=""></td>
		<td class="lol"><input type="text" name="beschreibung" value="Beschreibung"></td>
		<p>
		
    </tr>
  </tbody>
</table>
<input type="submit" name="send" onClick="../member-index.php"></p>
	</form>		<a href="#top" onClick="scrollTop()"><b><p align="right">Nach Oben</p></b></a>
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
include('../tmp/footer.php');
?>