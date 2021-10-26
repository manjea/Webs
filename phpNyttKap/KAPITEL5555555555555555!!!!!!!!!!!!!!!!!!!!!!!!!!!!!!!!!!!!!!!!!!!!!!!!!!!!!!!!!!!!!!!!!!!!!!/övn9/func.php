<?php
    function cleanData($str, $isAnvn = false){
        $data = $str;
        if($isAnvn){
            $data = htmlspecialchars(stripslashes(trim($str)));
        }else{
            $data = htmlspecialchars($str);
        }
        return $data;
    }
?>