<?php
require_once('../auth.php');
require_once('../inc/config.php');
include('../tmp/header_t.php'); //HTML Header Bereich
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
<?php

 function renderForm($id, $charname, $klasse, $punkte, $beschreibung, $error)
 {
 ?>

 <?php 

 if ($error != '')
 {
 echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 
 <center>
 <form action="" method="post">
 <input type="hidden" name="id" value="<?php echo $id; ?>"/>
 <div>
 <p><strong>ID:</br></strong> <?php echo $id; ?></p>
 <strong>Charname: *</br></strong> <input type="text" name="charname" value="<?php echo $charname; ?>"/><br/>
 <strong><select name="klasse" > 
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
		</select><br/>
 <strong>Punkte: *</br></strong> <input type="text" name="punkte" value="<?php echo $punkte; ?>"/><br/>
  <strong>beschreibung: *</br></strong> <textarea rows="10" cols="85" name="beschreibung"><?php echo $beschreibung; ?></textarea><br/>
 <p>* Erforderlich</br></p>
 <input type="submit" name="Bearbeiten" value="Submit">
 </div>
 </form> </center>
 <?php
 }



 // connect to the database
 include('../inc/config.php');
 
 // check if the form has been submitted. If it has, process the form and save it to the database
 if (isset($_POST['Bearbeiten']))
 { 
 // confirm that the 'id' value is a valid integer before getting the form data
 if (is_numeric($_POST['id']))
 {
 // get form data, making sure it is valid
 $id = $_POST['id'];
 $charname = mysql_real_escape_string(htmlspecialchars($_POST['charname']));
 $klasse = mysql_real_escape_string(htmlspecialchars($_POST['klasse']));
 $punkte = mysql_real_escape_string(htmlspecialchars($_POST['punkte']));
 $beschreibung = mysql_real_escape_string(htmlspecialchars($_POST['beschreibung']));

 // check that firstname/lastname fields are both filled in
 if ($charname == '' || $klasse == '' || $punkte == '' || $beschreibung == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 //error, display form
 renderForm($id, $charname, $punkte, $klasse, $beschreibung, $error);
 }
 else
 {
 // save the data to the database
 mysql_query("UPDATE w_scav SET charname='$charname', klasse='$klasse', punkte='$punkte', beschreibung='$beschreibung' WHERE id='$id'")
 
 or die(mysql_error()); 
 
 // once saved, redirect back to the view page
 header("Location: admin_scav.php"); 
 }
 }
 else
 {
 // if the 'id' isn't valid, display an error
 echo 'Error!';
 }
 }
 else
 // if the form hasn't been submitted, get the data from the db and display the form
 {
 
 // get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
 if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
 {
 // query db
 $id = $_GET['id'];
 $result = mysql_query("SELECT * FROM w_scav WHERE id=$id")
 or die(mysql_error()); 
 $row = mysql_fetch_array($result);
 
 // check that the 'id' matches up with a row in the databse
 if($row)
 {
 
 // get data from db
 $charname = $row['charname'];
 $klasse = $row['klasse'];
 $punkte = $row['punkte'];
 $beschreibung = $row['beschreibung'];
 
 // show form
 renderForm($id, $charname, $klasse, $punkte, $beschreibung, '');
 }
 else
 // if no match, display result
 {
 echo "No results!";
 }
 }
 else
 // if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error
 {
 echo 'Error!';
 }
 }
?>
				</div>
			</div>
			<div class="right_body">
				<div class="box_title"><font color="#018DB8">Men&Uuml;</font></div>
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