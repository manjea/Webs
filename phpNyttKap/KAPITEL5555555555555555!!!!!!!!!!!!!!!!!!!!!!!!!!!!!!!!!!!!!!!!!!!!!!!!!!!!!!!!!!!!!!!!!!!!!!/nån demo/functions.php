<?php
    function sanitize($x){
        $data = trim($x);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    function numberChecker($x){
        if(is_numeric($x) && $x > 0){
            return true;
        }
        return false;
    }


?>