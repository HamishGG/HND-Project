<?php
//setup page for index 
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
		<?php if($currentuser['userlevel']==0) { ?>
		<li><a href="register.html">Register</a></li>
			<?php } ?>			
		<?php if($currentuser['userlevel']>=1) { ?>
		<li><a href="php/logout.php">Log Out</a></li>
			<?php } ?>
		<?php if($currentuser['userlevel']==1) { ?>
		<li><a href="admin.php">Admin</a></li>
			<?php } ?>
		<?php if($currentuser['userlevel']==2) { ?>
		<li><a href="user.php">User Panel</a></li>
			<?php } ?>
		<?php if($currentuser['userlevel']==1 || $currentuser['userlevel']==2) { ?>
		<li><a href="menu.php">Menu</a></li>
			<?php } ?>

	</ul>
</nav>
<button onclick="topFunction()" id="myBtn" title="Go To Top">Top</button>
	</div>
<section  class  = "main" id="main">
<div class="Main_Info">
		<?php if($currentuser['userlevel']==0) { ?>
	<h1>Please Login to see the Menu</h1></br>
	<a href="login.php"class="btn btn-success" role="button">Login</a>
	<a href="register.html"class="btn btn-primary" role="button">Register</a>
	<?php } ?>
	</br></br>
	<h1>Welcome back <?php echo $currentuser['username']; ?>!</h1>
	</br></br>
		
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis iaculis mauris in pretium ultricies. Proin bibendum porttitor eros, ut facilisis lectus tincidunt sed. Morbi venenatis nulla neque, vel ornare nibh facilisis non. Morbi ut vestibulum arcu. Vestibulum venenatis velit in mauris consequat, eget luctus quam varius. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras non luctus sem. Nunc fermentum vestibulum aliquet. Donec vitae vestibulum magna. Nullam fringilla ante sit amet nisi laoreet, sed molestie nunc auctor. Nam gravida eu tortor gravida luctus.

Vestibulum molestie, diam vitae egestas fringilla, massa nibh aliquet turpis, ullamcorper vehicula dui urna venenatis risus. Proin fermentum molestie lorem id pellentesque. Nunc pulvinar sapien sed libero pretium convallis. In sagittis leo in aliquam rhoncus. Pellentesque euismod velit at efficitur sodales. Aenean convallis leo eget imperdiet luctus. In hendrerit, diam vitae rutrum dapibus, sapien justo volutpat ex, at luctus turpis magna id turpis. Vestibulum arcu purus, mollis ac lobortis vel, vehicula non dui. Curabitur eu ultrices odio, id tincidunt nisi.

Morbi maximus, mauris id euismod congue, dui metus aliquam risus, nec dignissim metus tellus at purus. Ut imperdiet turpis consectetur feugiat fermentum. Donec ut posuere elit, sit amet accumsan diam. Nulla dignissim faucibus erat, eget feugiat odio convallis rutrum. Ut ut finibus ipsum, in tristique eros. Maecenas laoreet pellentesque eros in facilisis. Aenean feugiat, dolor vel dapibus bibendum, nisl augue consequat metus, sit amet tincidunt eros leo non sem. Morbi sit amet cursus mi. Suspendisse non semper risus. Quisque semper egestas turpis, at convallis quam volutpat quis. Quisque sit amet velit sem.

Donec tincidunt ut lectus sed feugiat. Vestibulum gravida fringilla turpis nec facilisis. Nulla sed fringilla velit. Phasellus elit enim, sodales a nisl id, ullamcorper facilisis diam. Donec suscipit pulvinar maximus. Nulla pulvinar odio vitae neque interdum, ut convallis risus laoreet. Mauris rhoncus mi quis iaculis elementum. Nullam sit amet leo consequat dolor pretium venenatis. Vivamus sed enim turpis. In hac habitasse platea dictumst. Sed sed massa non urna interdum suscipit non nec nunc. Fusce nec ex a sapien sollicitudin vestibulum. Aenean justo elit, volutpat sit amet ante id, posuere egestas eros. Aliquam at libero ac leo commodo feugiat eu in sem. Integer pulvinar eu nisi sed consequat. Nam vulputate, quam ut pharetra dignissim, justo ex fermentum sapien, nec finibus urna tellus sed quam.

Suspendisse tempor tellus orci, vel consequat turpis posuere eget. Phasellus in velit sit amet sem consequat ultricies quis eget magna. Fusce aliquam eu magna in dignissim. Mauris ut vulputate turpis. Sed id enim id odio iaculis pulvinar. Aliquam est risus, ornare lobortis hendrerit ac, sollicitudin id tellus. In a eros nec turpis tempor tincidunt et nec massa. Quisque luctus, augue sit amet fermentum fermentum, lectus purus accumsan arcu, sed accumsan elit magna mattis urna. Etiam et auctor tellus, vitae volutpat odio. Etiam sed malesuada metus. Pellentesque vel ultricies nunc. Morbi feugiat venenatis dictum.
</p>
</div>
</section>

</body>
<script src="js/functions.js"></script>
<script src="js/touch.js"></script>
<script src="js/Topbutton.js"></script>
<script>
var userlevel=<?php echo $currentuser['userlevel']; ?>;
document.onreadystatechange = function(){
	if(document.readyState=="complete") {
		prepareTouch();
		prepareMenu();
	}
}

</script>
</html>
