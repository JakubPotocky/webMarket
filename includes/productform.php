<?php
session_start();

if (isset($_POST["submit"])) {
	
	$nameP = $_POST["nameP"];
	//$category = $_POST['category']; 
	//$stav = $_POST['stav'];			
	$price = $_POST["price"];
	$popis = $_POST["popis"];

	$stav = $_POST["stav"];
	$category = $_POST["category"];

	require_once 'dbh.php';
	require_once 'functions.php';


	if (emptyInputProduct($nameP, $price, $popis) !== false){
		header("location: ../potockyMP.php?error=emptyInputProduct");
		exit();
	}

	

	else{
		createProduct($conn, $nameP, $category, $price, $stav, $popis);
		header("location: ../potockyMP.php?error=none");
		exit();
	}



	

}

else {
	header("location: ../potockyMP.php");
	exit();
}