<!DOCTYPE html>
//setup page for the user search 
<?php
session_start();
include("php/functions.php");
$username=checkUser($_SESSION['userid'],session_id(),2);
$currentuser=getUserLevel();
?>
<html>
<head>
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
		<li><a href="search_for_update.php">Check User</a></li>
		<li><a href="php/logout.php">Log Out</a></li>
		<li><a href="addarticle.php">add article</a></li>
		<li><a href="deletearticle.php">delete article</a></li>
	</ul>
</nav>
<body>
<h1>User Information</h1>
<?php
	//selects the data for the user the admin selected
	$userid=$_POST['userid'];
	$db = createConnection();
	$sql = "select userid,username,firstname,surname,dob,emailadd,usertype from Assessment where userid = ?";
	$stmt = $db->prepare($sql);
	$stmt->bind_param("i",$currentuser['userid']);
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($userid,$username,$firstname,$surname,$dob,$emailadd,$usertype);
	
	while($stmt->fetch()) {
		//displays the information grabbed
		echo "<form action='user_update.php' method='post'>
	<p>
	<p>UserId <input type='text' name='userid'  value = '$userid' readonly></p>
	<p>username <input type='text' name='username'  value = '$username'></p>
	<p>firstname <input type='text' name='firstname'  value = '$firstname'></p>
	<p>surname <input type='text' name='surname'  value = '$surname'></p>
	<p>Date-Of-Birth <input type='text' name='dob'  value = '$dob'></p>
	<p>Email Address <input type='text' name='emailadd'  value = '$emailadd'></p>
	<p>User Type <input type='text' name='usertype'  value = '$usertype'></p>
	<input type='submit' value='Update'>";
	}

	$stmt->close();
	$db->close();
	

?>
</body>
<p>Return to the <a href="admin.php">Admin</a> page.</p>"
<script src="js/functions.js"></script>
<script src="js/touch.js"></script>
<script>
var userlevel=<?php echo $currentuser['userlevel']; ?>;
document.onreadystatechange = function(){
	if(document.readyState=="complete") {
		var addarticle=document.getElementById("addarticle");
		prepareTouch();
		prepareMenu();
	}
}

</html>
