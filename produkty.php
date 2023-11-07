	<?php include_once 'includes/produktydata.php';  
//musim najst kde sa nastavuje hodnota na "$strany" a nastavit tam kontrolu aby so na stranke nepisalo /// UPDATE -> asi $kontrola staci
if($kontrola != 0){
if($strany >= 2){
			if($number <= 0){$number = 1;}
			if($number > $strany){$number = ceil($kolkoStran);}
			if($number < $strany)
			{ ?>
					<form method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
		            <?php// echo $number; ?>
		            <input type="hidden" value="<?php echo $number ?>" name="number" />
		            <input class="btnNxt" type="submit" name="add" value="Next" />
		        	</form>
			<?php }
			if($number <= $strany && $number != 1)
			{ ?>
					<form method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
		            <?php// echo $number; ?>
		            <input type="hidden" value="<?php echo $number ?>" name="number1" />
		            <input class="btnPrv" type="submit" name="take" value="Prev" />
		        	</form>

			<?php }

			//echo $number; <--------- Na akej si strane

		}
		}
else{
	
}




/*include 'includes/functions.php';
include 'includes/produktydata.php';*/ 
?>