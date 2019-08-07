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
<!--includes the required css files for page-->
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
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
<title>The Local Theatre</title>
</head>
<body>
<header>
	<h1>The Local Theatre </h1>
	<h2>User Information</h2>
</header>
<nav>
	<div id="menubutton">Menu</div>
	<ul id="menu">
		<li><a href="index.php">Home</a></li>
		<li><a href="contact.php">Contact Us</a></li>
		<li><a href="deletearticle.php">delete article</a></li>
	</ul>
</nav>
</head>
<body>
<h1>Add Article</h1>
<section id="main">

<form method="post" action="php/xaddarticle.php"> <!--when the form is submitted it will redirect to the php page-->
<fieldset><legend>Add New Article</legend>
	<label for="Item_type">Title</label><input type="text" name="Item_Type" id="Item_Type" size="30" required /><br
	<label for="Item_Name">Title</label><input type="text" name="Item_Name" id="Item_Name" size="30" required /><br
	<label for="Item_Description">Title</label><input type="text" name="Item_Description" id="Item_Description" size="30" required /><br
	<label for="Item_Price">Title</label><input type="text" name="Item_Price" id="Item_Price" size="30" required /><br
	<label for="Vegetarian">Title</label><input type="Boolean" name="Vegetarian" id="Vegetarian" size="30" required /><br
	<label for="Gluten_Free">Title</label><input type="Boolean" name="Gluten_Free" id="Gluten_Free" size="30" required /><br
	<button type="submit">Add Post</button>
</fieldset>
</form>
</section>
</body>
<!--includes the current scripts required to run page-->
<script src="js/functions.js"></script>
<script src="js/touch.js"></script>
<script>
<!-- run the script and the prepared functions -->
var userlevel=<?php echo $currentuser['userlevel']; ?>;
document.onreadystatechange = function(){
	if(document.readyState=="complete") {
		var addarticle=document.getElementById("addarticle");
		prepareTouch();
		prepareMenu();
	}
}

</script>
</html>
