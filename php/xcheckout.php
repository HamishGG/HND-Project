<?php
session_start();
include("functions.php");
$username=checkUser($_SESSION['userid'],session_id(),2);
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
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
<button onclick="topFunction()" id="myBtn" title="Go To Top">Top</button>

<section  class  = "main" id="main">
<div class="Main_Info">
<?php
$markers = json_decode($_POST['markers']); 
$totalprice = $_POST['totalresulthidden'];
$order  = implode (",", $markers);
	$db = createConnection();
	$sql="insert into Graded_Unit_Cart (food_name, userid, price) values (?,?,?)";
	$stmt=$db->prepare($sql);
	$stmt->bind_param("sis",$order,$currentuser['userid'], $totalprice);
	$stmt->execute();
	
	
	echo "</br>";
	echo "<h1>Order has been placed!</h1>";
	echo "</br>";
	echo "<h3>here is your order list : </h3>";
	echo "</br>";
	echo "<p>".implode("<br>",$markers)."</p>";
	echo "</br>";
	echo "<p>Here is your total price for the order : ".$totalprice."</p>";
 
?>	
	<?php if($currentuser['userlevel']==2) { ?>
		<p><a href="../user.php"class="btn btn-success" role="button">Go to User Page</a></p>
	<?php } ?>
	
	<?php if($currentuser['userlevel']==1) { ?>
		<p><a href="../admin.php"class="btn btn-success" role="button">Go to Admin Page</a></p>
	<?php } ?>

</div>
</section>
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
</html>