<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en"> 

<head class="head">
	<link rel="stylesheet" href="potockyMP.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
</head>

<body>
<?php if (isset($_SESSION['useruid'])) { ?>
<div class="obrazokHore">
	<img class="obrazokHore" src="photos/bazos.png">	
</div>
<?php } else{ ?>
<div class="obrazokHore">
	<img class="obrazokHore" src="photos/bazos2.png">	
</div>
<?php } ?>
<div class="zaklad">


	<div class="lava">
		<?php
		//if(isset($_SESSION['useruid'])){
		include_once 'filter.php';	
		//}
		//else{}

		?>
	</div>

	<div class="prava">
		<?php  
		if (isset($_SESSION['useruid']))
		{
			$isonline = true;
			/*echo "<p>your id: " . $_SESSION["userid"] . "</p>";*/
			echo '<p><h1 class="center" style="color:white">WELCOME <b>' . $_SESSION["useruid"] . '</b> !</h1></p>';

				echo '<form action="logout.php">';
		    	echo '<div class="centerBtn"><input class="btnGreen" type="submit" value="Log out" /></div>';
				echo '</form>';

				$MyProductsName = $_SESSION["useruid"];

			include_once 'produkt.php';
		}
		else{
			$isonline = false;
		}


		include_once 'register.php';
		include_once 'login.php';
		include_once 'includes/functions.php';

		?>
	</div>

	<!--<div class="c">
		chatbox
	</div>-->

	<div class="stred">
		<?php 
		if(!$isonline)
			{ echo '<h1 class="notLoggedInTxt">Log into your account to see offers.</h1>';
			  echo '<img class="lock" src="photos/lock.png">';
			  echo '<style> .zaklad {background-image: linear-gradient(120deg,#C6C6C6,#C6C6C6);} .prava{background-image: linear-gradient(120deg,#919191,#919191); color:white;} .lava{background-image: linear-gradient(0deg,#919191,#919191); color:white;}</style>';
			}

		else
		{
		//novy script
			echo '<style> .zaklad {background-image: linear-gradient(120deg,#FFDC44,#FFDC44);} .prava{background-image: linear-gradient(120deg,#FFF800,#FFDC44);} .lava{background-image: linear-gradient(120deg,#FFF800,#FFDC44);}</style>';
	      $number = 1;
	      if(isset( $_POST['number'])){

	           $number = $_POST['number'] + 1;
	       }
	       if(isset( $_POST['number1'])){

	           $number = $_POST['number1'] - 1;
	       }
       // novy script
			include_once 'produkty.php'; //posunol som to sem aby $number vedel precitat v produktydata.php

		
	}
		?>

</div>

	

</div>

			<script type="text/javascript">
      $(".input input").on("focus",function(){
        $(this).addClass("focus");
      });

      $(".input input").on("blur",function(){
        if($(this).val() == "")
        $(this).removeClass("focus");
      });

      </script>


</body>


</html>

