<?php
	require_once 'dbh.php';
	require_once 'functions.php';
	require_once 'productFilter.php';
	//require_once 'filterForm.php'; //MUSIM UROBIT KONEKTIVITU MEDZI filterForm.php a produktydata.php
	
	// vytvor instanciu triedy ProductFilter, automaticky sa nacitaju vsetky premenne z URL do filtra
	$filter = new ProductFilter();

	// Tento vypis mozme zmazazt, je tu iba na demonstraciu ako sa pristupuje k premennym
	/*echo 'Obsah Filtra: ';
	echo $filter->nameS;
	echo $filter->nameP;
	echo $filter->price;
	echo $filter->stav;
	echo $filter->category;*/

	//skontroluje ci je zadane meno predajcu (seller name)
	if($filter->nameS == "")
	{
		$TFnameS = false;
	}
	else
	{
		$fNameS = $filter->nameS;
		$TFnameS = true;
		$_SESSION['nameS'] = $fNameS;
	}

	//skontroluje ci je zadane meno produktu (product name)
	if($filter->nameP == "")
	{
		$TFnameP = false;
	}
	else
	{
		$fNameP = $filter->nameP;
		$TFnameP = true;
		$_SESSION['nameP'] = $fNameP;
	}

	//skotroluje ci je zadana maximalna cena (price)
	if($filter->price == "")
	{
		$TFprice = false;
	}
	else
	{
		$fPrice = $filter->price;
		$TFprice = true;
		$_SESSION['price'] = $fPrice;
	}

	//skontroluje ci je zadany stav (stav)
	if($filter->stav == "" or $filter->stav == "all")
	{
		$TFstav = false;
	}
	else
	{
		$fStav = $filter->stav;
		$TFstav = true;
		$_SESSION['stav'] = $fStav;
	}

	//skontroluje ci je zadana kategoria (category)
	if($filter->category == "" or $filter->category == "all")
	{
		$TFcategory = false;
	}
	else
	{
		$fCategory = $filter->category;
		$TFcategory = true;
		$_SESSION['category'] = $fCategory;
	}


	$sql = "SELECT productID, sellerID, sellerName, productName, productCategory, productPrice, productCondition, productDescription FROM products";
	//$result = $conn->query($sql);

	$result = mysqli_query($conn, $sql);

	// Asociativne pole so vsetkymi datami z query
	$rows = $result->fetch_all(MYSQLI_ASSOC);
	$rowsFilter = array();

	$kontrola = 0;
	$maxProductID = 0;
	
	if (count($rows)) {
		 			//poradie: nameS, nameP, price, stav, category
		foreach ($rows as $row) {
			$row["filterCount"] = 0;	
			if(!$TFnameS){$row["filterCount"]++;}
			else if ($row["sellerName"] == $fNameS && $TFnameS){$row["filterCount"]++;}

			if(!$TFnameP){$row["filterCount"]++;}
			else if ($row["productName"] == $fNameP && $TFnameP){$row["filterCount"]++;}

			if(!$TFprice){$row["filterCount"]++;}
			else if($row["productPrice"] <= $fPrice && $TFprice){$row["filterCount"]++;}

			if(!$TFstav){$row["filterCount"]++;}
			else if($row["productCondition"] == $fStav && $TFstav){$row["filterCount"]++;}

			if(!$TFcategory){$row["filterCount"]++;}
			else if($row["productCategory"] == $fCategory && $TFcategory){$row["filterCount"]++;}

		/*  // VYPISANIE VSETKYCH PRODUKTOV
			echo '<div class="testprodukt">';
			echo "-productID: " . $row["productID"]. "<br>-sellerID: " . $row["sellerID"]. "<br>-sellerName: " . $row["sellerName"]. "<br>-productName: " . $row["productName"]. "<br>-productCategory: " . $row["productCategory"]. "<br>-productPrice: " . $row["productPrice"]. "€<br>-productCondition: " . $row["productCondition"]. "<br>-productDescription: " . $row["productDescription"];
			echo "</div>";

		*/
			if($maxProductID <= $row["productID"])
			{
				$maxProductID = $row["productID"];
			}

			if($row["filterCount"] == 5)
			{
				array_push($rowsFilter, $row);
				$kontrola++;
			}
		}

		if($kontrola == 0){echo "<h1>We have not found anything as you requested, reset or update the filter.</h1>";}
		else{ 
		$pocet = count($rows); 
		$perPage = 9; // kolko na stranku bude produktov
		$pagedArray = array_chunk($rowsFilter, $perPage, true); // rozclenenie pola produktov po viacerych poliach, po 9 prvkoch (respektive po poccte ktory sme nastavili vyssie)
		$nthPage = $pagedArray[$number - 1]; // zober data pre n-tu stranku, ak je stranka 1, zober data s indexom [0] lebo tak sa zacina indexovat
		// ak je stranka 2, zober dalsich 9, atd atd.

		foreach ($nthPage as $i => $row) //vypis 9 produktov :D
		{
			echo '<div class="testprodukt">';
			echo '<div class="productNameC">Product: <b>' . $row["productName"]. '</b></div><br>Seller: <b>' . $row["sellerName"]. '</b><br>Category: ' . $row["productCategory"]. '<br>Condition: ' . $row["productCondition"]. '<br>Price: <b>' . $row["productPrice"]. ' €</b><br><br>Short description: <br><i>' . $row["productDescription"]. '</i>';
				


			if($row["sellerID"] == $_SESSION['userid'])
			{
				$delProduct = $row["productID"];
				$_SESSION["delProductID"] = $row["productID"]; 	//toto viem vyriesit tak ze tu dam 2 jeden invisible button ktory bude mat name

				echo '<form action="includes/nxt.php" method="post">';
				/*echo '<input type="submit" value="delete product" name="delete_"' . $row["productID"] . '>';*/
				echo '<div class="centerBtn"><button class="btnRed" name="button'.$delProduct.'" value="'.$delProduct.'">Delete product</button></div>';
				echo '</form>';

			}
			echo "</div>";
		}



		$kolkoStran = $pocet/9;		//vypocitanie potrebnych stran -> nie cele cislo, potrebujeme cele
		$strany = ceil($kolkoStran); //vypocitanie potrebnych stran -> cele cislo :)
		}
	}




	else {
		echo "0 results";
	}

?>
<style>

	</style>