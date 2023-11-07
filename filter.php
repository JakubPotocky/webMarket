	<section class="produktForm">
			<h2 style="color: white;">Filter:</h2>
			
			<!-- Zmenili sme na get, nech filter ostava v URL, a nech ma rovnake nazvy, na zaklade nich sa potom nacitaju premenne vo filtri -->
			<form action="potockyMP.php" method="GET"> 
			<!-- Action posle info z formu na stranku...-->
				<?php 

				// pouzi filter
				require_once 'includes/productFilter.php';
				// vytvor instanciu triedy, automaticky sa nacitaju vsetky premenne z URL do filtra
				$filter = new ProductFilter();

				// Upravili sme tuto cast, aby sa automaticky predvolili filtrovane hodnoty 
				echo "<div class='input'>
				<input type='text' name='nameS' placeholder='Seller name...' value='$filter->nameS'>
				<span data-placeholder='Text';></span>
				</div>
				<div class='input'><input type='text' name='nameP' placeholder='Product name...' value='$filter->nameP'><span data-placeholder='Text';></span></div>
				<br>";

				$stav = array("all", "bad", "ok", "good", "new");
				echo '<a class="dropbox">Condition: <select name="stav">';
                for($x=0; $x<=4; $x++){
					// Upravili sme tuto cast, aby sa automaticky predvolili filtrovane hodnoty
					// pridali sme 'selected' atribut do option, v pripade ak stav ktory vypisujeme je aj v URL
					$selected = ($stav[$x] == $filter->stav ? 'selected' : '');
                    echo "<option name='stav[$x]' value='$stav[$x]' $selected> $stav[$x]</option>";
                    }
        		echo "</select></a><br>";

		        $category = array("all", "sports", "tech", "home", "car", "kids", "other");
						echo '<a class="dropbox">Category: <select name="category">';
		                for($x=0; $x<=6; $x++){
							// Upravili sme tuto cast, aby sa automaticky predvolili filtrovane hodnoty
							// pridali sme 'selected' atribut do option, v pripade ak kategoria ktoru vypisujeme je aj v URL
							$selected = ($category[$x] == $filter->category ? 'selected' : '');
		                    echo "<option name='category[$x]' value='$category[$x]' $selected> $category[$x]</option>";
		                    }
		        echo "</select></a><br>";
				?>
				
				<!-- aj tu sme nastavili hodnotu z filtra -->
				<div class="input"><input  type="text" name="price" placeholder="Max price..." value="<?php echo $filter->price; ?>"><span data-placeholder="Text";></span></div>
				<div class="centerBtn"><button class="btnRed" type="submit" name="filter">Update</button></div>

				

				<!-- SPRAVIT ->  Pridajme reset tlacidlo, ktore vyresetuje hodnoty na nulu, alebo ich zmaze uplne z URL -->
			</form>

			<!-- ZATIAL mam taketo hovno lebo to je posrate-->
			<form action="potockyMP.php" method="get">
				
				<div class="centerBtn"><button class="btnRed" type="submit" name="reset">Reset</button></div>
				
			</form>
			<?php 
			if (isset($_SESSION['useruid'])){ //tu musim dat kontrolu
			$_COOKIE['MyProducts'] =  $_SESSION['useruid'];

			//echo $_SESSION['useruid']; // <---- tuto to pozna ale dalej na prv.php to nepozna

			echo '<form action="" method="post">';
				
			echo '	<div class="centerBtn"><button class="btnRed" type="submit" name="myproducts">My Products</button></div>';
				
			echo '</form>';
			}
			else
			{

			}

			if(isset($_POST["myproducts"])){
    
			    if (isset($_SESSION['useruid']))
			    {
			    	header("location: potockyMP.php?nameS=" . $_SESSION['useruid'] . "&nameP=&stav=all&category=all&price=&filter=");
			        
			    }

			    else{
			   
			    }
			}
			?>

		</section>