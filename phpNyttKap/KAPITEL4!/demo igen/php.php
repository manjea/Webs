<?php

    define("Namn", "Johan");

    test();

    echo '<br>';

//////////

    function test(){
        echo "test() körs ";
        echo Namn;
    }

    function namn($fnamn = "Manfred", $lnamn = "Jeansson"){
        return "Du heter ${fnamn} ${lnamn}";
    }

    echo namn("Manfred");

    echo '<br>';

///////////

    $speed = 5; //mph

    function mphToKmh(&$x){
        $x = $x * 1.609;
    }

    mphToKmh($speed);
    echo $speed;
    





?>