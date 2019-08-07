<?php
setCookie("userintent","",(time+86400),"/~pe14016471");
session_start();
include('php/functions.php');
$currentuser=getUserLevel();
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
<h1>Welcome back <?php echo $currentuser['username']; ?>!</h1>
<section id="main">
<?php
$db=createConnection();
$sql = "select Item_ID,Item_Type,Item_Name,Item_Description,Item_Price,Vegetarian,Gluten_Free,imagefile from Food_Menu";
$stmt = $db->prepare($sql);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($Item_ID,$Item_Type,$Item_Name,$Item_Description,$Item_Price,$Vegetarian,$Gluten_Free,$imagefile);

while($stmt->fetch()) {
	echo 'Item ID: ',$Item_ID;
	echo '<br />';
	echo 'Item Type: ',$Item_Type;
	echo '<br />';
	echo 'Item Name: ',$Item_Name;
	echo '<br />';
	echo 'Item Description: ',$Item_Description;
	echo '<br />';
	echo 'Item Price: ',$Item_Price;
	echo '<br />';
	echo 'Vegetarian? (0 - no 1 - yes): ',$Vegetarian;
	echo '<br />';
	echo 'Gluten Free? (0 - no 1 - yes): ',$Gluten_Free;
	echo '<br />';
	echo '<a href="#"><div class="hover-img">
  <p>Picture of the food</p>
   <span><img src="website/',$imagefile,'" alt="image" height="150" />      </span>
</div></a>';
	}		
$stmt->close();
$db->close();

?>
</section>

</body>

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
