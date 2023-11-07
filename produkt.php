<?php
?>
<section class="produktForm">
			<h2 style="color: white;">Add new product:</h2>
			<form action="includes/productform.php" method="post"> 
			<!-- Action posle info z formu na stranku...-->
				<div class="input"><input type="text" name="nameP" placeholder="Product name..."><span data-placeholder="Text";></span></div>
				<br><!--<label for="stav">Condition:</label>
				<select name="stav" form="stavform">
				  <option value="bad">bad</option>
				  <option value="ok">ok</option>
				  <option value="good">good</option>
				  <option value="brandnew">brand new</option>
				</select>-->
				<?php 
				//include 'includes/productform.php'; ked tu toto nastavim tak sa cesta nastavi na localhost/potockyMP.php iba :(

				$stav = array("---", "bad", "ok", "good", "new");
				echo '<a class="dropbox">Condition: <select name="stav">';
                for($x=0; $x<=4; $x++){
                    echo "<option name=stav[$x] value=$stav[$x]> $stav[$x]</option>";
                    }
        		echo "</select></a><br>";

		        $category = array("---", "sports", "tech", "home", "car", "kids", "other");
						echo '<a class="dropbox">Category: <select name="category">';
		                for($x=0; $x<=6; $x++){
		                    echo "<option name='category[$x]' value=$category[$x]> $category[$x]</option>";
		                    }
		        echo "</select></a><br>";
				?>
				<!--<label for="category">Category:</label>
				<select name="category" form="categoryform">
				  <option value="sports">sports</option>
				  <option value="tech">tech</option>
				  <option value="home">home</option>
				  <option value="car">car</option>
				  <option value="kids">kids</option>
				  <option value="other">other</option>
				</select><br>-->
				<div class="input"><input  type="text" name="price" placeholder="Price..."><span data-placeholder="Text";></span></div>
				<div class="input"><input type="text" name="popis" placeholder="Description..."><span data-placeholder="Text";></span></div>
				<div class="centerBtn"><button class="btnGreen" type="submit" name="submit">Upload</button></div>
			</form>
		</section>

<?php

	if (isset($_GET["error"])){
		if($_GET["error"] == "emptyInputProduct"){
			echo "<p>fill in all fields to upload product to market</p>";
		}

		

		
		else if($_GET["error"] == "none"){
			echo "<p>uploaded :D</p>";
		}

	}

//}
?>