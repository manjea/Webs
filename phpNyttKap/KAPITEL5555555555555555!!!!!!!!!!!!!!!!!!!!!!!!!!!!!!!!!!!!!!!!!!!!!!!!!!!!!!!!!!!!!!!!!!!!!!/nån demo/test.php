<?php
    require('functions.php');

    if (isset($_POST['t'])){
        //sanitizar input :)
        $input = sanitize($_POST['t']);

        //om tal > 0
        if(numberChecker($input)){
            echo $input . " är ett tal";
        }else{
            echo $input;
        }
        echo "<br>";
    }else{

    }


?>