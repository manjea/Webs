<?php

    function correctInput($x){
        if(strlen($x) >= 8){
            return true;
        }
        return false;
    }

    function sanitizeInput($x){
        $x = stripslashes($x);
        $x = htmlspecialchars($x);
        return $x;
    }






?>