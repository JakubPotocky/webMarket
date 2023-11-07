<?php 
if ($isonline == true) {} else{
?>
<section class="login">
			<h2 class="center">Login:</h2>
			<form action="includes/loginform.php" method="post"> 
			<!-- Action posle info z formu na stranku    UID - idk ma to byt mail asi...-->
				<div class="input"><input placeholder="Email..." type="text" name="email"><span data-placeholder="Text";></span></div>
				<div class="input"><input placeholder="Password..." type="password" name="password"><span data-placeholder="Text";></span></div>
				<div class="centerBtn"><button class="btnRed" type="submit" name="login">Login</button></div>
			</form>
		</section>
<?php 
if (isset($_GET["error"])) {
	if ($_GET["error"] == "emptyinput"){
		echo "<p>Fill in all fields!</p>";
	}

	else if ($_GET["error"] == "wronglogin_password"){
		echo "<p>Wrong login password!</p>";
	}

	else if ($_GET["error"] == "wronglogin_email"){
		echo "<p>Wrong login email!</p>";
	}
}
}