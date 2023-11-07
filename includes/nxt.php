<?php //nxt.php je vlastne delete product php
include_once "produktydata.php";
include_once "functions.php";

for($i = 0; $i <= $maxProductID; $i++) 
{
	if(isset($_POST['button'.$i])) 
	{

    $deleteProductID = $_POST['button'.$i];
    
    deleteProduct($conn, $deleteProductID);

	}
}