<?php
    function change(&$str){
        $str = "Ändrad text";
    }


    $text = "Gammal text"; 
    change($text); 
 
    echo $text;

    function doubleUp(&$tal){
        $tal *= 2;
    }

    $tal = 4; 
    doubleUp($tal); 
 
    echo $tal;
?>