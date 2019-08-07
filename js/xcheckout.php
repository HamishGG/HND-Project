<?php
session_start();
include("functions.php");
	$db=createConnection();
	$Order=$_POST['Order'];
	$totalresult=$_POST['totalresult'];
	echo $shoppinglist;
	echo $totalresult;
		
?>