<?php
session_start(); //starts the session giving the user a session id
include("php/functions.php"); //includes functions files for php  
setCookie("userintent","",(time+86400),"/~pe14016471"); //setting the cookies for the user
$currentuser=getUserLevel(); //get the users current usertype
$username=checkUser($_SESSION['userid'],session_id(),1); // checks if user is allowed on this page
?>
<!doctype html>
<html lang="en-gb" dir="ltr">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<!--
Referenced from https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_button_elements&stacked=h 
-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/ieold.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" media="screen and (min-width: 840px) and (max-width:999px)" href="css/medium.css" />
<link rel="stylesheet" type="text/css" media="screen and (min-width: 1000px)" href="css/wide.css" />
<link rel="stylesheet" type="text/css" media="screen and (min-width: 640px) and (max-width:839px)" href="css/medium_narrow.css" />
<link rel="stylesheet" type="text/css" media="screen and (max-width:639px)" href="css/narrow.css" />
<link rel="stylesheet" type="text/css" media="print" href="css/print.css" />
	
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
		<li><a href="index.php">Home</a></li>
		<li><a href="contact.php">Contact</a></li>
		<?php if($currentuser['userlevel']==0) { ?>
		<li><a href="login.php">Login</a></li>
		<?php } ?>
		<?php if($currentuser['userlevel']>=1) { ?>
		<li><a href="php/logout.php">Log Out</a></li>
		<?php } ?>
		<?php if($currentuser['userlevel']==1) { ?>
		<li><a href="admin.php">Admin</a></li>
			<?php } ?>

	</ul>
</nav>
</head>
<body>
<section  class  = "main" id="main">
<div class="Main_Info">
<form id="imageupload" name="imageupload" method="post" enctype="multipart/form-data" action="php/xAddItem.php"> <!--when the form is submitted it will redirect to the php page-->
<fieldset><legend>Add New Item</legend>

	<label for="Item_Type">Item Type: </label>
	<select name="Item_Type">
  	<option value="Soup">Soup</option>
  	<option value="Appetisers">Appetisers</option>
  	<option value="Special Dishes">Special Dishes</option>
	</select>
	<br>
	
	<label for="Item_Name">Item Name: </label>
	<input type="text" name="Item_Name" id="Item_Name" size="30" required /><br>
	
	<label for="Item_Description">Item Description: </label>
	<input type="text" name="Item_Description" id="Item_Description" size="30" required /><br>
	
	<label for="Item_Price">Item Price: </label>
	<input type="text" name="Item_Price" id="Item_Price" size="30" required /><br>
	
	<label for="Vegetarian">Vegetarian: </label>
	<input type="CheckBox" name="Vegetarian" id="Vegetarian" size="30" /><br>
	
	<label for="Gluten_Free">Gluten Free: </label>
	<input type="Checkbox" name="Gluten_Free" id="Gluten_Free" size="30"/><br>
	
	<label for="imagefile">Please select your image : </label>
	<input type="file" name="imagefile" id="imagefile" size="30">
	<br />
	<input type="submit" value="Upload" name="upload">
</form>

</fieldset>
</form>
</div>
</section>
</div>
</body>
<!--includes the current scripts required to run page-->
<script src="js/functions.js"></script>
<script src="js/touch.js"></script>
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
</html>
