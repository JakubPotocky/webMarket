<?php
      $number = 0;
      if(isset( $_POST['number'])){

           $number = $_POST['number'] + 1;
       }
       if(isset( $_POST['number1'])){

           $number = $_POST['number1'] - 1;
       }
?>
<html>
    <head>

    </head>
    <body>
        <form method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
            <?php// echo $number; ?>
            <input type="hidden" value="<?php echo $number ?>" name="number" />
            <input type="submit" name="add" value="Add" />
        </form>

        <form method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
            <?php// echo $number; ?>
            <input type="hidden" value="<?php echo $number ?>" name="number1" />
            <input type="submit" name="take" value="Take" />
        </form>
    </body>

    <?php echo $number;?>
</html>