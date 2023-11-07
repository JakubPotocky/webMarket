<?php

if (isset($_POST["login"])){

	$email = $_POST["email"];
	$password = $_POST["password"]; 

	require_once 'dbh.php';
	require_once 'functions.php';

	if (emptyInputLogin($email, $password) !== false){
		header("location: ../potockyMP.php?error=emptyinput");
		exit();
	}


	loginUser($conn, $email, $password);

	}

else {
	header("location: ../potockyMP.php");
	exit();
}