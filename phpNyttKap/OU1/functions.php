<?php
    function skadlig(&$a){
        $a = htmlspecialchars($a);
        $a = stripslashes($a);
        return $a;
    }





?>