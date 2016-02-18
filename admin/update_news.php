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
				<div class="box_title"><b><font color="#018DB8">News System</font></b></div>
				<div class="box_content">
<?php

 function renderForm($id, $title, $cat, $error)
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
 <strong>Title: *</br></strong> <textarea rows="10" cols="85" name="cat"><?php echo $title; ?></textarea><br/>
 <strong>News: *</br></strong> <textarea rows="10" cols="85" name="cat"><?php echo $cat; ?></textarea><br/>
 <p>* Erforderlich</br></p>
 <input type="submit" name="Bearbeiten" value="Submit">
 </div>
 </form> </center>
 <?php
 }




 include('../inc/config.php');
 

 if (isset($_POST['Bearbeiten']))
 { 

 if (is_numeric($_POST['id']))
 {

 $id = $_POST['id'];
 $title = mysql_real_escape_string(htmlspecialchars($_POST['title']));
 $cat = mysql_real_escape_string(htmlspecialchars($_POST['cat']));

 if ($title == '' || $cat == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 //error, display form
 renderForm($id, $title, $cat, $error);
 }
 else
 {
 // save the data to the database
 mysql_query("UPDATE w_news SET title='$title', cat='$cat' WHERE id='$id'")
 or die(mysql_error()); 
 
 // once saved, redirect back to the view page
 header("Location: admin_chars.php"); 
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
 $result = mysql_query("SELECT * FROM w_news WHERE id=$id")
 or die(mysql_error()); 
 $row = mysql_fetch_array($result);
 
 // check that the 'id' matches up with a row in the databse
 if($row)
 {
 
 // get data from db
 $title = $row['title'];
 $cat = $row['cat'];

 
 // show form
 renderForm($id, $title, $cat, '');
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
				<div class="box_title"><font color="#018DB8">Menü</font></div>
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