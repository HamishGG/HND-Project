<?php
//setup page for selecting the user you want to change 
session_start();
include("php/functions.php");
$username=checkUser($_SESSION['userid'],session_id(),2);
$currentuser=getUserLevel();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<!--
Referenced from https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_button_elements&stacked=h 
-->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
<header>
</header>
<nav>
	<div id="menubutton">Menu</div>
	<ul id="menu">
		<li><a href="index.php">Home</a></li>
		<?php if($currentuser['userlevel']==1) { ?>
		<li><a href="admin.php">Admin</a></li>
			<?php } ?>
		<?php if($currentuser['userlevel']==2) { ?>
		<li><a href="user.php">User Panel</a></li>
			<?php } ?>
		<li><a href="php/logout.php">Log Out</a></li>
	</ul>
</nav>
<section  class  = "main" id="main">
<div class="Main_Info">
  <h1>Order Search</h1>
  <form action="results_for_update.php" method="post">
  <p>Choose Order:</p>
  <select name="Order_ID">
	<?php
	$db = createConnection();
	$sql = "select Order_ID,food_name,price,date from Graded_Unit_Cart where userid = ?";
	$stmt = $db->prepare($sql);
	$stmt->bind_param("i",$currentuser['userid']);
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($Order_ID,$food_name,$price,$date);
	
	while($stmt->fetch()) {
		//shows all users that are being selected
		echo "<option value = ",$Order_ID,">",$Order_ID, " ", $price, " ",$date,"</option>";
		echo "</br>";
	}
	$stmt->close();
	$db->close();
?> 
	</select>
    </br>
	</br>
    <input class="btn btn-primary" type="submit" value="Search"><br>
	</br>
		<?php if($currentuser['userlevel']==2) { ?>
		<p><a href="user.php"class="btn btn-success" role="button">Go to User Page</a></p>
	<?php } ?>
	
	<?php if($currentuser['userlevel']==1) { ?>
		<p><a href="admin.php"class="btn btn-success" role="button">Go to Admin Page</a></p>
	<?php } ?>
	
  </form>
  </section>
  </div>
</body>
</html>
<script src="js/functions.js"></script>
<script src="js/touch.js"></script>
<script>
var userlevel=<?php echo $currentuser['userlevel']; ?>;
document.onreadystatechange = function(){
	if(document.readyState=="complete") {
		prepareTouch();
		prepareMenu();
	}
}

</script>