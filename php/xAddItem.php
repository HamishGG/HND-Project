<html lang="en-gb" dir="ltr">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<!--
Referenced from https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_button_elements&stacked=h 
-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/ieold.css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" type="text/css" media="screen and (min-width: 840px) and (max-width:999px)" href="../css/medium.css" />
<link rel="stylesheet" type="text/css" media="screen and (min-width: 1000px)" href="../css/wide.css" />
<link rel="stylesheet" type="text/css" media="screen and (min-width: 640px) and (max-width:839px)" href="../css/medium_narrow.css" />
<link rel="stylesheet" type="text/css" media="screen and (max-width:639px)" href="../css/narrow.css" />
<link rel="stylesheet" type="text/css" media="print" href="../css/print.css" />
	
	<!--[if (lte IE 8)&!(IEMobile)]>
		<script src="js/iefix.js"></script>

		<style>
			header, section, nav, footer {display:block;}
		</style>

<![endif]-->

	<title>New Honey Flower</title>
</head>
<body>
<header >
</header>
<nav>
	<div id="menubutton">Menu</div>
	<ul id="menu">
		<li><a href="../index.php">Home</a></li>
		<li><a href="../contact.php">Contact</a></li>
		<?php if($currentuser['userlevel']==0) { ?>
		<li><a href="../login.php">Login</a></li>
		<?php } ?>
		<?php if($currentuser['userlevel']>=1) { ?>
		<li><a href="logout.php">Log Out</a></li>
		<?php } ?>
		<?php if($currentuser['userlevel']==1) { ?>
		<li><a href="../admin.php">Admin</a></li>
			<?php } ?>

	</ul>
</nav>
<br>
<br>
<section  class  = "main" id="main">
<div class="Main_Info">
<?php
$targetheight=500; // Maximum height of resized image
$targetwidth=500; // Maximum width of resized image
$updest='../assets/Food_Pictures/'; //Sets the relative path to the uploads folder
$displaypath="../assets/Food_Pictures/"; //Sets the path to the uploads folder for use on the web page
$allowedExts = array("jpg", "jpeg", "gif", "png", "webp"); //Allowed image file extensions
$timestamp=time(); //The time of upload is used to ensure that filenames are unique, this way
// two files called 'myfile.jpg' can be uploaded but still have unique names as they would
// have different timestamps
$tempFileName=$_FILES['imagefile']['tmp_name']; //This finds the temporary location 
// where the file was uploaded to
$permFileName=$updest.$timestamp.$_FILES['imagefile']['name']; //The uploads folder and filename
// that the file will be stored in permanently
$displayName=$displaypath.$timestamp.$_FILES['imagefile']['name']; //The display path for the page
$uploadFileType=$_FILES['imagefile']['type']; //The filetype of the uploaded image (not extension)
$uploadFileSize=$_FILES["imagefile"]["size"]; //The size in bytes of the uploaded image


echo 'Uploaded Image <br />';
$extension = end(explode(".", $permFileName)); //Finds the extension of the uploaded file
if ((($uploadFileType == "image/gif")
|| ($uploadFileType == "image/jpeg")
|| ($uploadFileType == "image/png")
|| ($uploadFileType == "image/webp")
|| ($uploadFileType == "image/pjpeg"))
&& ($uploadFileSize < 8000000)
&& in_array($extension, $allowedExts)) //The if statement ensures the uploaded file is of the
//correct type, no bigger than 8Mb and has the correct type of file extension
{
	echo "Upload: " . $permFileName . "<br />"; //These echo statements just output a little 
	echo "Type: " . $uploadFileType . "<br />"; //information about the uploaded file
	echo "Size: " . ($uploadFileSize / 1024) . " Kb<br />";
	echo "Temp file: " . $tempFileName . "<br />";
	if (file_exists($permFileName)) //Ensures there is not a file of the same name already
	{
		echo $permFileName . " already exists.<br /> ";
	}
	else
	{
		echo 'Moving File <br />';
		if (is_dir($updest)) {
			echo "Target Directory Exists<br />";
			if(is_writable($updest)) {
				echo "Target Directory is Writable<br />";
				if(@move_uploaded_file($tempFileName, $permFileName))
				{			
					@copy($permFileName, $permFileName.'.old');
					echo "Original file - <img src='$displayName.old'><br />";
					echo 'File Moved, resizing<br />';
					if(extension_loaded('imagick')) {
						echo "Can resize with ImageMagick<br />";
						$resimg = new Imagick();
						$resimg->readImage($permFileName); 
						$height=$resimg->getImageHeight(); 
						$width=$resimg->getImageWidth();  
						if ($width > $targetwidth || $height > $targetheight) $resimg->scaleImage($targetwidth,$targetheight,true); 
						$resimg->writeImage($permFileName); 
						$resimg->clear(); 
						$resimg->destroy();
						echo "Resized image stored in: " . $permFileName;
						echo '<br />';
						echo "Resized image - <img src='$displayName'><br />";

					} else if(extension_loaded("gd")) {
						echo "Can resize with GD Library<br />";
						list($width, $height, $stype) = getimagesize($permFileName); // Get image properties using GD
						// Check GD understands file type
						switch ($stype) {
							case IMAGETYPE_GIF:
								$simage = imagecreatefromgif($permFileName);
								break;
							case IMAGETYPE_JPEG:
								$simage = imagecreatefromjpeg($permFileName);
								break;
							case IMAGETYPE_PNG:
								$simage = imagecreatefrompng($permFileName);
								break;
						}
						if ($simage != false) { // if GD understands resize
							$aspectrat = $width/$height;
							$targetrat=$targetwidth/$targetheight;
							// GD cannot resize automatically maintaining aspect ratio
							// calculate new dimensions based on old and new aspect ratios
							if ($width <= $targetwidth && $height <= $targetheight) {
								$image_width = $width;
								$image_height = $height;
							} else if ($targetrat > $aspectrat) {
								$image_width = (int) ($targetheight * $aspectrat);
								$image_height = $targetheight;
							} else {
								$image_width = $targetwidth;
								$image_height = (int) ($targetwidth / $aspectrat);
							}
							// resize and resample image within width and height constraints
							$gd_image = imagecreatetruecolor($image_width, $image_height);
							imagecopyresampled($gd_image, $simage, 0, 0, 0, 0, $image_width, $image_height, $width, $height);
							imagejpeg($gd_image, $permFileName, 90);
							// clean up memory
							imagedestroy($simage);
							imagedestroy($gd_image);
							echo "Resized image stored in: " . $permFileName;
							echo '<br />';
							echo "Resized image - <img src='$displayName'><br />";
						}

					} else {
						echo "No valid tool available to resize image<br />";
					}

				}
				else {echo 'Cannot move file<br />';}

			} else {
				echo "Target Directory Not Writable<br />";
			}
		} else {
			echo "Target Directory Missing<br />";
		}
	}

}
else
{
	echo "Invalid file<br />";
}
	

session_start();
include("functions.php");
$username=checkUser($_SESSION['userid'],session_id(),2);
$currentuser=getUserLevel();
	$db=createConnection();
	if(isset($_POST['Item_Type'])){
	$selected_val = $_POST['Item_Type'];  // Storing Selected Value In Variable
	echo "You have selected : " .$selected_val ."</br>";// Displaying Selected Value
	}
	$Item_Name=$_POST['Item_Name'];
	$Item_Description=$_POST['Item_Description'];
	$Item_Price=$_POST['Item_Price'];
	$Vegetarian=(isset($_POST['Vegetarian'])) ? 1 : 0;
	$Gluten_Free=(isset($_POST['Gluten_Free'])) ? 1 : 0;
	$imagefile = $permFileName;
	echo "image file name is: ", $imagefile;
	
	//adds articles to the database
	$insertItemsql="insert into Food_Menu (Item_Type,Item_Name,Item_Description,Item_Price,Vegetarian,Gluten_Free,imagefile,userid) values (?,?,?,?,?,?,?,?)";
	$insertItem=$db->prepare($insertItemsql);
	$insertItem->bind_param("sssdiisi",$selected_val,$Item_Name,$Item_Description,$Item_Price,$Vegetarian,$Gluten_Free,$imagefile,$currentuser['userid']);
	$insertItem->execute();
	echo "</br>";
	printf("%d Row inserted.\n", $insertItem->affected_rows);
	echo "</br>";
	$insertItem->close();
	if($insertItemsql)
	{
	echo "</br>";
	echo "Success";
	echo "</br>";
	}
	else
	{
	echo "Error";

	}
	$db->close();
?>
</section>
</div>
	</body>
	<script src="../js/functions.js"></script>
<script src="../js/touch.js"></script>
<script>
<!-- run the script and the prepared functions -->
var userlevel=<?php echo $currentuser['userlevel']; ?>;
document.onreadystatechange = function(){
	if(document.readyState=="complete") {
		prepareTouch();
		prepareMenu();
	}
}

</script>
	<<meta http-equiv="refresh" content="5; url=https:../AddItem.php" />
	</html>
