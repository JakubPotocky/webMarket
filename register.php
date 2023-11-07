<?php 
if ($isonline == true) {} else{
?>
<section class="register">
			<h2 class="center">Register:</h2>
			<form action="includes/registerform.php" method="post"> 
			<!-- Action posle info z formu na stranku...-->
				<div class="input"><input type="text" name="name" placeholder="Username..."><span data-placeholder="Text";></span></div>
				<div class="input"><input type="text" name="email" placeholder="Email..."><span data-placeholder="Text";></span></div>
				<div class="input"><input type="password" name="password" placeholder="Password..."><span data-placeholder="Text";></span></div>
				<div class="input"><input type="password" name="password2" placeholder="Repeat password..."><span data-placeholder="Text";></span></div>
				<div class="centerBtn"><button class="btnRed" type="submit" name="submit">Sign Up</button></div>
			</form>
		</section>

<?php

	if (isset($_GET["error"])){
		if($_GET["error"] == "emptyinput"){
			echo "<p>fill in all fields</p>";
		}

		else if($_GET["error"] =="invalidUid"){
			echo "<p>invalid name, use name without space ex. JakubPotocky</p>";
		}

		else if($_GET["error"] =="invalidemail"){
			echo "<p>invalid email</p>";
		}

		else if($_GET["error"] =="passwordsdontmatch"){
			echo "<p>passwords dont match</p>";
		}

		else if($_GET["error"] =="stmtfailed"){
			echo "<p>meno alebo email uz niekto pouzuva</p>";
		}

		else if($_GET["error"] =="none"){
			echo "<p>You are signed up, now you can log into your account.</p>";
		}

	}

}
?>