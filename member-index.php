<?php
	require_once('auth.php');
	include('tmp/header.php'); //HTML Header Bereich
?>
		<div class="body">
			<div class="left_body">
				<div class="slider">
					<div style="text-align: center;padding: 40px 0px 0px 0px;font-size: 30px;">Willkommen <?php echo $_SESSION['SESS_FIRST_NAME'];?></br><?php echo '<img src="'.htmlentities($_SESSION['SESS_AVATAR'], ENT_QUOTES, 'UTF-8').'" alt="Avatar" style="max-width:200px;max-height:200px;" />';?></div>
				</div>
				<div class="box_title"><b><font color="#018DB8">3-Punkte-System</font></b></div>
				<div class="box_content">
				Jeder Spieler bekommt aus diversen Gründen Strafpunkte. Hat ein Spieler 3 Punkte erreicht
Folgt der Ausschluss aus der Stammgruppe oder aus sogar aus der Gilde.<p><br>
</br>
<b><font color="#018DB8">Gründe: </font></b></br>
- Fehlverhalten</br>
- Trash dodgen: Wer keine Regelmäßige Beteiligung beim Trash zeigt muss auch da mit Konsequenzen rechnen
Mehrfach auffallende geringe Leistung, wird diese Person darum gebeten einen der Klassenleiter auf zu suchen.<p><br>

Geschieht dieses nicht bekommt diese Person 1 Punkt im 3- Punkte- System.
Einer der Klassenleiter wird sich mit diesem Spieler befassen, ignoriert der Spieler die Verbesserungsvorschläge, resultiert darauß widerum ein Punkt und der Ausschluss aus
der Stammgruppe, oder der Gilde!
</p><p><br><b>
<font color="#018DB8">Der Raidlead und/oder der DKP-Manager behält sich vor, je nach Situation individuell zu handeln und DKP zu vergeben/abzuziehen. Dabei wird sich jedoch an dem 
obenstehenden Strafenkatalog orientiert!</font></b>
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