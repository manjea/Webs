<?php
    function medel($vek, $tal){
        $sum = 0;
        foreach($vek as $key){
            $sum += $key;
        }
        $sum /= count($vek);
        return round($sum, $tal); 
    }

    echo medel([1, 3, 4], 3);



?>