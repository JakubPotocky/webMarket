<?php 

if (isset($_POST["submit"])) {
	
	$name = $_POST["name"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$password2 = $_POST["password2"];

	$problem = 0;

	require_once 'dbh.php';
	require_once 'functions.php';

	if (emptyInputSignup($name, $email, $password, $password2) !== false){
		header("location: ../potockyMP.php?error=emptyinput");
		$problem = 1;
		exit();
	}

	if (invalidUid($name) !== false){
		header("location: ../potockyMP.php?error=invalidUid");
		$problem = 2;
		exit();
	}

	if (invalidEmail($email) !== false){
		header("location: ../potockyMP.php?error=invalidemail");
		$problem = 3;
		exit();
	}

	if (passwordMatch($password, $password2) !== false){
		header("location: ../potockyMP.php?error=passwordsdontmatch");
		$problem = 4;
		exit();
	}

	if (uidExists($conn, $name, $email) !== false){ 
	header("location: ../potockyMP.php?error=nametaken");
	exit();
	}


	createUser($conn, $name, $email, $password);

}

else {
	header("location: ../potockyMP.php");
	exit();
}