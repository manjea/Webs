<?php
require('functions.php');
    if(isset($_POST['sub'])){
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $thingy = 0;
        $opp = $_POST['opp'];
        if($opp == '+'){
            $thingy = add($num1, $num2);
        }
        else if($opp == '-'){
            $thingy = subt($num1, $num2);
        }
        else if($opp == '*'){
            $thingy = tim($num1, $num2);
        }
        else if($opp == '/'){
            $thingy = div($num1, $num2);
        }
        else{
            echo "how he do it?";
        }
        echo $thingy;
    }


?>