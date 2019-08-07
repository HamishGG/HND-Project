<?php
session_start();
include("php/functions.php");
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
<button onclick="topFunction()" id="myBtn" title="Go To Top">Top</button>

<section  class  = "Main_Food_Menu" id="Main_Food_Menu">

   
   
<h1>Welcome back <?php echo $currentuser['username']; ?>!</h1>
<p>
	To select a item simply click on the item in the list to move it to the cart.
	<br>
	To remove the item simply click on the item in the cart to remove it from your order 
</p>
	<div class="Cart_Menu">
	 <button id ="Cart_Menu_Button" type="button" class="btn btn-primary" data-toggle="collapse" data-target="#Cart_Menu">Cart_Menu</button>
		<form id="myform" method="post" action="php/xcheckout.php"> 
        <div id="Cart_Menu" class="collapse in">
        </br>
        <p>Total Order:</p>
		<input type="hidden" id="markers" name="markers">
        </br>
		<p id="shoppinglist" class="cartlist"></p>
		
        <div id="outputinfo">
        <p>Total : <span id="totalresult"></span></p>
		<input type="hidden" id="totalresulthidden" name="totalresulthidden" value="">
		<button class="btn btn-primary" >Submit</button>
        </form>
		</div>
		</div>
	    </div>	
		</div>
	 
	
	 <div class="Login_Menu">

	 <button id ="Login_Menu_Button" type="button" class="btn btn-primary" data-toggle="collapse" data-target="#Login_Menu">Login Menu</button>
	 	
		<div id="Login_Menu" class="collapse in">
		</br>
		<?php if($currentuser['userlevel']==2) { ?>
			<p><a href="user.php"class="btn btn-success" role="button">Go to User Page</a></p>
		<?php } ?>
		
		<?php if($currentuser['userlevel']==1) { ?>
			<p><a href="admin.php"class="btn btn-success" role="button">Go to Admin Page</a></p>
		<?php } ?>		
		</div> 
	 </div>

<div class="Menu_List">

 <button id ="Menu_button" type="button" class="btn btn-primary" data-toggle="collapse" data-target="#Starters">Starters</button>
   <br>

   <div id="Starters" class="collapse in">

   <br>
   
   
   
   

 	<button id ="Menu_button" type="button" class="btn btn-info" data-toggle="collapse" data-target="#Soup">Soups</button>
 	   <br>

	   <div id="Soup" class="collapse in">

	   <br>

	   <b><u><h4>Soups</b></u></h4>
	   <br>
	   
	   <ul id="sourcelist">
	   		<?php
				$db=createConnection();
				$sql = "select Item_ID,Item_Type,Item_Name,Item_Description,Item_Price,Vegetarian,Gluten_Free,imagefile from Food_Menu where Item_Type = 'Soup'";
				$stmt = $db->prepare($sql);
				$stmt->execute();
				$stmt->store_result();
				$stmt->bind_result($Item_ID,$Item_Type,$Item_Name,$Item_Description,$Item_Price,$Vegetarian,$Gluten_Free,$imagefile);
					while($stmt->fetch()) {
						echo 
						'<a><div class="hover-img">
						<P name="Order" id="Order" data-value="',$Item_Price,'" >',$Item_Name,' : &pound;',$Item_Price,'</P>
						<figure><img class="display_Image" align="right" src="website/',$imagefile,'" alt="Picture of Soup" height="200"  />
						<figcaption class="w3-display-bottomleft w3-container"><p>',$Item_Description,'</p></figcaption></figure>
						</div></a>';	
					
					}
			?>
			</br>
			</div>
			</ul>

	
		<button id ="Menu_button" type="button" class="btn btn-info" data-toggle="collapse" data-target="#Appetisers">Appetisers</button>
		<br>
		<div id="Appetisers" class="collapse in ">
   
		<br>
	
	   <b><u><h4>Appetisers</b></u></h4>
	   
	   <br>
	   	   <ul id="sourcelist2">
	   		<?php
				$db=createConnection();
				$sql = "select Item_ID,Item_Type,Item_Name,Item_Description,Item_Price,Vegetarian,Gluten_Free,imagefile from Food_Menu where Item_Type = 'Appetisers'";
				$stmt = $db->prepare($sql);
				$stmt->execute();
				$stmt->store_result();
				$stmt->bind_result($Item_ID,$Item_Type,$Item_Name,$Item_Description,$Item_Price,$Vegetarian,$Gluten_Free,$imagefile);
					while($stmt->fetch()) {
						echo 
						'<a><div class="hover-img">
						<P name="Order" id="Order" data-value="',$Item_Price,'" >',$Item_Name,' : &pound;',$Item_Price,'</P>
						<figure><img class="display_Image" align="right" src="website/',$imagefile,'" alt="Picture of Soup" height="200"  />
						<figcaption class="w3-display-bottomleft w3-container"><p>',$Item_Description,'</p></figcaption></figure>
						</div></a>';	
					
					}
			?>
			</br>
	</ul>
 	</div>
	</div>
	<br>



 	<button id ="Menu_button" type="button" class="btn btn-primary" data-toggle="collapse" data-target="#Mains">Mains</button>
     
      <br>

    <div id="Mains" class="collapse in">

   <br>

   <button id ="Menu_button" type="button" class="btn btn-info" data-toggle="collapse" data-target="#Special_Dishes">Special Dishes</button>

   <br>

   <div id="Special_Dishes" class="collapse in ">

   <b><u><h4>Special Dishes</b></u></h4>
   
   <br>
	   	   <ul id="sourcelist3">
	   		<?php
				$db=createConnection();
				$sql = "select Item_ID,Item_Type,Item_Name,Item_Description,Item_Price,Vegetarian,Gluten_Free,imagefile from Food_Menu where Item_Type = 'Special Dishes'";
				$stmt = $db->prepare($sql);
				$stmt->execute();
				$stmt->store_result();
				$stmt->bind_result($Item_ID,$Item_Type,$Item_Name,$Item_Description,$Item_Price,$Vegetarian,$Gluten_Free,$imagefile);
					while($stmt->fetch()) {
						echo 
						'<a><div class="hover-img">
						<P name="Order" id="Order" data-value="',$Item_Price,'" >',$Item_Name,' : &pound;',$Item_Price,'</P>
						<figure><img class="display_Image" align="right" src="website/',$imagefile,'" alt="Picture of Soup" height="200"  />
						<figcaption class="w3-display-bottomleft w3-container"><p>',$Item_Description,'</p></figcaption></figure>
						</div></a>';	
					
					}
			?>
	</br>
	</ul>
  </div>
  </div>
  <br>
  </div>






</section>

</body>
<script src="js/functions.js"></script>
<script src="js/touch.js"></script>
<script src="js/Topbutton.js"></script>

<script>

var Orderlist = [];


	
function JSONEventSubmit() {
    document.getElementById('myform').addEventListener('submit', function(){
        var markersField = document.getElementById('markers');
        markersField.value = JSON.stringify(Orderlist);
		
    });
}


function calcTotal() {
	var shoppinglist=document.getElementById("shoppinglist");
	var total=0;
	for(i=0;i<shoppinglist.children.length;i++) {
		total+=parseFloat(shoppinglist.children[i].getAttribute("data-value"));
	}
	var totalresult=document.getElementById("totalresult");
	totalresult.innerHTML="&pound;"+total.toFixed(2);
	
	var totalpriceid = document.getElementById("totalresulthidden");
	var totalpricevalue = totalresulthidden.getAttribute("value");
	totalresulthidden.setAttribute("value",totalresult.innerHTML);
		
}

function getTargetElement(e) {
	var targetelement=null;
	targetelement=(e.srcElement || e.target || e.toElement)
	return targetelement;
}

function handleEvent(e) {
	var listclicked=getTargetElement(e);
	console.log(listclicked);
	var newlistitem=document.createElement("ul");
	var datavalue=listclicked.getAttribute("data-value");
	var idvalue=listclicked.getAttribute("id");
	newlistitem.setAttribute("data-value",datavalue);
	newlistitem.setAttribute("id",idvalue);
	newlistitem.setAttribute("class",idvalue);
	newlisttext=document.createTextNode(listclicked.innerHTML)
	newlistitem.appendChild(newlisttext);
	Orderlist.push(listclicked.textContent);
	for(i=0;i<Orderlist.length;i++) {
	console.log(Orderlist[i]);
	}
	var shoppinglist = document.getElementById("shoppinglist");
	shoppinglist.appendChild(newlistitem);
	newlistitem.addEventListener("click", removeChild, false);
	newlistitem.addEventListener("click", calcTotal, false);

}

function removeChild(e){
	clickeditem = getTargetElement(e);
	console.log(clickeditem.textContent);
	newlisttext=document.createTextNode(clickeditem.innerHTML)
	var index = Orderlist.indexOf(clickeditem.textContent);
	if (index > -1){
		Orderlist.splice(index,1);
	}
console.log(Orderlist.toString());
	clickeditem.parentNode.removeChild(clickeditem);
}



var userlevel=<?php echo $currentuser['userlevel']; ?>;

document.onreadystatechange = function(){
	if(document.readyState=="complete") {
		prepareMenu();
		JSONEventSubmit();
	var sourcelist=document.getElementById("sourcelist");
			var totalbutton=document.getElementById("calctotal");
		for(i=0;i<sourcelist.children.length;i++) {
			if(document.addEventListener) {
				sourcelist.children[i].addEventListener("click", handleEvent, false);
				sourcelist.children[i].addEventListener("click",calcTotal,false);

			} else {
				sourcelist.children[i].attachEvent("onclick", handleEvent);
				sourcelist.children[i].attachEvent("onclick",calcTotal);
			}
		}
		
	var sourcelist=document.getElementById("sourcelist2");
		for(i=0;i<sourcelist.children.length;i++) {
			if(document.addEventListener) {
				sourcelist.children[i].addEventListener("click", handleEvent, false);
				sourcelist.children[i].addEventListener("click",calcTotal,false);

			} else {
				sourcelist.children[i].attachEvent("onclick", handleEvent);
				sourcelist.children[i].attachEvent("onclick",calcTotal);
			}
		}
	var sourcelist=document.getElementById("sourcelist3");
		for(i=0;i<sourcelist.children.length;i++) {
			if(document.addEventListener) {
				sourcelist.children[i].addEventListener("click", handleEvent, false);
				sourcelist.children[i].addEventListener("click",calcTotal,false);

			} else {
				sourcelist.children[i].attachEvent("onclick", handleEvent);
				sourcelist.children[i].attachEvent("onclick",calcTotal);
			}
		}
		
		

	}
}
</script>
</html>
