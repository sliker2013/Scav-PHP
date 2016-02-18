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
				<div class="box_title"><b><font color="#018DB8">DKP Liste Hochladen</font></b></div>
				<div class="box_content">
				<center><a href="admin_dkp_view.php"><b>Dateien Ansehen</b></a></center>
					<center>
Bitte nur txt dateien verwenden
<?php

# SET VARIABLES ##########################

# Set the full path to this directory with trailing slash /.

$full_path = "c:/";

# Set how many simultaneous uploads to allow.

$number_of_uploads = 1;

# Set allowed file types, lowercase without period (.)

$allowed_file_types =	 array("html");

# Change the upload_folder path, with trailing slash, 
# to your full directory path if neccessary, and set 
# permissions (chmod) to 777.

$upload_folder = "./uploads/";

# Set maximum file upload size in kilobytes.

$max_size_in_kb = 10240;

# Set 1 to rename files, 0 to keep original file names.

$rename_files = 1;

# END SETTING VARIABLES #################

function printForm()
{
global $allowed_file_types,$number_of_uploads,$max_size_in_kb;

print "<center><form action=\"". htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES) ."\" method=\"post\" enctype=\"multipart/form-data\">\n</center>";

	for($i=0;$i<$number_of_uploads;$i++)
	{
	print "<p><center><input type=\"file\" name=\"file[]\" /></center></p>\n";
	}

print "<p><center><input type=\"hidden\" name=\"upload\" value=\"1\" /><input type=\"submit\" value=\"Upload\" /></p>\n</form></center>\n";

print "<p><center>Erlaubte Dateien: ." . implode($allowed_file_types, " ."). "</center></p>\n";
}

$fileNAMES = array();

if(isset($_POST['upload']))
{
	for($i=0;$i<$number_of_uploads;$i++)
	{
		if(strlen($_FILES['file']['name'][$i]) > 0)
		{
		$filearray = explode(".", $_FILES['file']['name'][$i]);
		$ext = end($filearray);

			if($rename_files == 1)
			{
			list($usec, $sec) = explode(" ", microtime());
			$fileNAMES[$i] = $sec."_".$usec;
			}
			else
			{
			$xperiods = str_replace("." . $ext, "", $_FILES['file']['name'][$i]);
			$fileNAMES[$i] = str_replace(".", "", $xperiods);
			}

			if(!in_array(strtolower($ext), $allowed_file_types))
			{
			print "<p class=\"error\">FAILED: ". htmlspecialchars($_FILES['file']['name'][$i]) ."<br />ERROR: File type not allowed.</p>\n";
			}
			elseif($_FILES['file']['size'][$i] > ($max_size_in_kb*1024))
			{
			print "<p class=\"error\">FAILED: ". htmlspecialchars($_FILES['file']['name'][$i]) ."<br />ERROR: File size to large.</p>\n";
			}
			elseif(file_exists($upload_folder.$fileNAMES[$i] .".". $ext))
			{
			print "<p class=\"error\">FAILED: ". htmlspecialchars($fileNAMES[$i]) .".". $ext ."<br />ERROR: File already exists.</p>\n";
			}
			else
			{
				if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $upload_folder.$fileNAMES[$i] .".". $ext))
				{
				print "<p>UPLOADED: ". htmlspecialchars($fileNAMES[$i]) .".". $ext ."</p>\n";
				}
				else
				{
				print "<p class=\"error\">FAILED: ". htmlspecialchars($_FILES['file']['name'][$i]) ."<br />ERROR: Undetermined.</p>\n";
				}
			}
		}
	}
printForm();
}
else
{
printForm();
}

?>

</center>
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