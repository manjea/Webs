<?php
    function cleanData($str, $isAnvn = false){
        $data = $str;
        if($isAnvn){
            htmlspecialchars(stripslashes(trim($str)));
        }else{
            htmlspecialchars($str);
        }
        return $data;
    }
?>