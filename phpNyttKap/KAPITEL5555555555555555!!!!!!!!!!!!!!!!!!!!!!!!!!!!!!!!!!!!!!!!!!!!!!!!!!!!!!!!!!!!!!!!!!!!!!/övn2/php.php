<?php
    define("PI", 3.14159);
    function circle($radius = 5){
        return round(PI*$radius);
    }

    echo circle();
    
?>