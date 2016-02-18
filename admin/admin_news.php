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
				<div class="box_title"><b><font color="#018DB8">Startseiten News</font></b></div>
				<div class="box_content">
	<?php
	require_once('../inc/config.php');
	require_once('../inc/bbcode.php');
if(isset($_GET['id'])){ // Sofern ID uebergeben wurde

 $id = $_GET['id']; // Variable definieren

	// DB Abfrage der Daten
	$abfrage = mysql_query("SELECT title, news, cat FROM news WHERE id='$id'");
	$row = mysql_fetch_object($abfrage);
}

	
if(isset($_POST['submit'])){

	$title = $_POST['title']; 
	$news = $_POST['news'];   
	$cat = $_POST['cat'];
	$autor = $_SESSION['SESS_FIRST_NAME'];
	
	if(empty($title) || empty($news) || empty($autor)){

		echo get_error('Bitte Danke alle benoetigten Felder ausfuellen!');

	
		}else{ 

			$eintragen = mysql_query("INSERT INTO w_news (autor, title, news, cat, date) VALUES ('$autor','$title','$news','$cat', now())");
			
		}
	
		if($eintragen){ 
		
			header("Location: ../member-index.php");
		
		}else{
			echo get_error('Der Eintrag war leider nicht erfolgreich! ".mysql_error()."');
		}
		
	}
		

	?>
<script type="text/javascript">
/* Funtionn BBCode */
var n = 1;
function add(code) {
         document.getElementById('bbcode').news.value += " " + code ;
}
</script>

	<h2>Eingeloggt als: <?php echo $_SESSION['SESS_FIRST_NAME'];?></h2>

    <p><center>
<form action="" method="post" id="bbcode">
	<fieldset>
		<legend><?php echo $headline; ?></legend>
		
		<label><b>Titel</b></label>
		</br>
		<input type="text" name="title" value="<?php echo $row->title; ?>" />
		<br /><br />
		<b>Komplet:</b>
		<?php get_bbcode('admin'); /* BBCode ausgeben */ ?>
		
		<textarea rows="10" cols="85" name="news"><?php echo $row->news;?></textarea>
		<br /><br />

		<input type="submit" value="Eintragen" name="submit" class="button"/>
	</fieldset>
</form>
    </center>
	<table>
<thead>
    <tr>
		<th>ID</th>
    	<th>Autor</th>
		<th>Titel</th>
		<th>News</th>
		<th>Datum</th>
		<th>Edit</th>
		<th>Delete</th>
    </tr>
	</thead>
<?PHP include ("../inc/config.php");
$query = "SELECT * FROM w_news";
$result = mysql_query($query);
while ($row = mysql_fetch_array($result))

  {
		echo "<tr>";
		echo '<td>' . $row['id'] . '</td>';
		echo '<td>' . $row['autor'] . '</td>';
		echo '<td>' . $row['title'] . '</td>';
		echo '<td>' . $row['cat'] . '</td>';
		echo '<td>' . $row['date'] . '</td>';
		echo '<td><center><a href="update_news.php?id=' . $row['id'] . '"><img src="../img/icon/file-edit-2.png" alt="Bild" /></a></center></td>';
		echo '<td><center><a href="delete_news.php?id=' . $row['id'] . '"><img src="../img/icon/delete2.png" alt="Bild" /></a></center></td>';
		echo "</tr>"; 
	} 
	echo "</table>";
?>
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
include('../tmp/footer.php');
?>