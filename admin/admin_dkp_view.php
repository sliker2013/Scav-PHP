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
				<div class="box_title"><b><font color="#018DB8">DKP Liste</font></b></div>
				<div class="box_content">
<ul>
<?php
// Ordnername 
$ordner = "uploads/"; //auch komplette Pfade möglich ($ordner = "download/files";)
 
// Ordner auslesen und Array in Variable speichern
$alledateien = scandir($ordner); // Sortierung A-Z
// Sortierung Z-A mit scandir($ordner, 1)               				
 
// Schleife um Array "$alledateien" aus scandir Funktion auszugeben
// Einzeldateien werden dabei in der Variabel $datei abgelegt
foreach ($alledateien as $datei) {
 
	// Zusammentragen der Dateiinfo
	$dateiinfo = pathinfo($ordner."/".$datei); 
	//Folgende Variablen stehen nach pathinfo zur Verfügung
	// $dateiinfo['filename'] =Dateiname ohne Dateiendung  *erst mit PHP 5.2
	// $dateiinfo['dirname'] = Verzeichnisname
	// $dateiinfo['extension'] = Dateityp -/endung
	// $dateiinfo['basename'] = voller Dateiname mit Dateiendung
 
	// Größe ermitteln zur Ausgabe
	$size = ceil(filesize($ordner."/".$datei)/1024); 
	//1024 = kb | 1048576 = MB | 1073741824 = GB
 
	// scandir liest alle Dateien im Ordner aus, zusätzlich noch "." , ".." als Ordner
	// Nur echte Dateien anzeigen lassen und keine "Punkt" Ordner
	// _notes ist eine Ergänzung für Dreamweaver Nutzer, denn DW legt zur besseren Synchronisation diese Datei in den Orndern ab
	if ($datei != "." && $datei != ".."  && $datei != "_notes") { 
	?>
<table>
<thead>
    <tr>
    	<th><center>Name</center></th>
		<th><center>Datei</center></th>
		<th><center>Größe</center></th>
		<th><center>Delete</center></th>
    </tr>
	</thead>
<tbody>
    <tr>
    	<td class="lol"><center><a href="<?php echo $dateiinfo['dirname']."/".$dateiinfo['basename'];?>" target="_blank"><?php echo $dateiinfo['filename']; ?></a></center></td>
		<td class="lol"><center><?php echo $dateiinfo['extension']; ?></center></td>
		<td class="lol"><center><?php echo $size ; ?>kb</center></td>
		<td class="lol"><center><a href="#"><img src="../img/icon/delete2.png"></a></center></td>
    </tr>
  </tbody>
</table>
 <?php
	};
 };
?>     
</ul>
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