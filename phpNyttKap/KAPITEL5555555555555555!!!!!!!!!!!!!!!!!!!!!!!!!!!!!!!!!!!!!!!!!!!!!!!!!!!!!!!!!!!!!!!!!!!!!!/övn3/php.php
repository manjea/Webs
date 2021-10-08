<?php
    // $x = 5; 
 
     
    // function demo($x = 5) 
    // { 
    //   // ska ge utskriften 5 
    //   echo $x; 
    // }

    // demo();
    $x = 5;
    function demo(&$x) 
    { 
        return $x = $x + 10;
    } 
    
    demo($x);
    
    // ska ge utskriften 15 
    echo $x; 


?>