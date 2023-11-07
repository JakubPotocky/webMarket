<?php 

function emptyInputSignup($name, $email, $password, $password2){
	$result;
	if(empty($name) or empty($email) or empty($password) or empty($password2)){
		$result = true;
	}

	else{
		$result = false;
	}

	return $result;

}



function invalidUid($name){
	$result;
	if (!preg_match("/^[a-zA-Z]*$/", $name)) {
		$result = true;
	}

	else{
		$result = false;
	}

	return $result;
}


function invalidEmail($email){
	$result;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$result = true;
	}

	else{
		$result = false;
	}

	return $result;
}

function passwordMatch($password, $password2){
	$result;
	if ($password !== $password2) {
		$result = true;
	}

	else{
		$result = false;
	}

	return $result;
}

function createUser($conn, $name, $email, $password){
	$sql = "INSERT INTO users (usersName, usersEmail, usersPassword) VALUES (?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)){
		header("location: ../potockyMP.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "sss", $name, $email, $password);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("location: ../potockyMP.php?error=none");
		exit();
}


function uidExists($conn,/* $name,*/ $email){ /*porovnaa email idk co sa deje*/
	$sql = "SELECT * FROM users WHERE usersName = ? OR usersEmail = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../potockyMP.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "ss", $name, $email);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}
	else{
		$result = false;
		return $result;
	}
	mysqli_stmt_close($stmt);
}


function emptyInputLogin($email, $password){
	$result;
	if(empty($email) || empty($password)){
		$result = true;
	}

	else{
		$result = false;
	}

	return $result;

}


function loginUser($conn, $email, $password){
	$uidExists = uidExists($conn, $email, $password);

	if ($uidExists === false){
		header("location: ../potockyMP.php?error=wronglogin_email");
		exit();
	}

	$passwordOK = $uidExists["usersPassword"];
	$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	$checkPassword = password_verify($passwordOK, $hashed_password);
	/*if($passwordOK === $password){ $checkPassword = true;} else {$checkPassword = false;}*/

	if($checkPassword === false) {
		header("location: ../potockyMP.php?error=wronglogin_password");
		exit();
	}

	else if ($checkPassword === true) {
		session_start();
		$_SESSION["userid"] = $uidExists["usersId"]; 
		$_SESSION["useruid"] = $uidExists["usersName"];
		header("location: ../potockyMP.php");
		exit();

	}
}

function emptyInputProduct($nameP, $price, $popis){
	$result;
	if(empty($nameP) || empty($price) || empty($popis)){
		$result = true;
	}

	else{
		$result = false;
	}

	return $result;	

}

function createProduct($conn, $nameP, $category, $price, $stav, $popis){
	$sql = "INSERT INTO products (sellerID, sellerName, productName, productCategory, productPrice, productCondition, productDescription) VALUES (?, ?, ?, ?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)){
		header("location: ../potockyMP.php?error=stmtfailed");
		exit();
	}


	if (isset($_SESSION['useruid']))
		{
			$jeden = $_SESSION["userid"];
			$dva = $_SESSION["useruid"];
		}


	mysqli_stmt_bind_param($stmt, "sssssss", $jeden, $dva, $nameP, $category, $price, $stav, $popis);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("location: ../potockyMP.php?error=none");
		exit();
}

function getProducts($conn){ //funguje :D ale chcem este zobrat data poriadne
	$sql = "SELECT * FROM products;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../potockyMP.php?error=stmtfailed");
		exit();
	}
	
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}
	else{
		$result = false;
		return $result;
	}
	mysqli_stmt_close($stmt);
}

function deleteProduct($conn, $deleteProductID){
	$sql = "DELETE FROM products WHERE productID =(?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)){
		header("location: ../potockyMP.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $deleteProductID);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("location: ../potockyMP.php?productDeleted");
		exit();
}
