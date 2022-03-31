<?php
    function checkInput($str){
        $str = trim(htmlspecialchars($str)); //sanerar
        if(strlen($str) >= 4){ // returnerar strängen om den är tilräckligt lång
            return $str;
        }else{ // om den är för kort returneras false
            return false;
        }
    }

?>