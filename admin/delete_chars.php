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
<?PHP require_once ('../inc/config.php');

 
 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['id']) && is_numeric($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];
 
 // delete the entry
 $result = mysql_query("DELETE FROM w_scav_chars WHERE id=$id")
 or die(mysql_error()); 
 
 // redirect back to the view page
 header("Location: admin_chars.php");
 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
 header("Location: admin_chars.php");
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