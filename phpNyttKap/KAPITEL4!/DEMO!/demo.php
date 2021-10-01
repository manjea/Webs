<?php

    //övn2
    $vektor = ["Må", "Ti", "On", "To", "Fr", "Lö", "Sö"];
    $str1 = implode($vektor);


    echo "<br>";echo "<br>";



    //övn4
    $prog = ["PHP", "JS", "C#"];
    array_pop($prog);
    array_pop($prog);
    array_push($prog, "Python");
    array_push($prog, "Java");

    print_r($prog);


    echo "<br>";echo "<br>";


    //övn6
    $cities = [
        "Stockholm",
        "Oslo",
        "Berlin",
        "Amsterdam",
        "Budapest",
        "Tokyo",
        "Kairo",
        "Paris",
        "Madrid",
        "Rom"
    ];
    sort($cities);

    foreach ($cities as $i){
        echo $i . " ";
    }

    echo "<br>";

    rsort($cities);

    foreach ($cities as $i){
        echo $i . " ";
    }





    echo "<br>";echo "<br>";




    //övn7
    $assvek = [
        'Sverige' => 'Stockholm',
        'Norge' => 'Oslo',
        'Danmark' => 'Köpenhamn',
        'Finland' => 'Helsingfors',
        'Island' => 'Reykjavik'
    ];

    //a)
    foreach($assvek as $key => $value){
        echo "Huvudstaden i " . $key . " är " . $value . "<br>";
    }
    //b)
    unset($assvek['Norge']);
    unset($assvek['Island']);
    //c)
    asort($assvek);
    print_r($assvek);
    echo "<br>";echo "<br>";
    ksort($assvek);
    print_r($assvek);
    echo "<br>";echo "<br>";
    arsort($assvek);
    print_r($assvek);
    echo "<br>";echo "<br>";
    krsort($assvek);
    print_r($assvek);
    echo "<br>";echo "<br>";
    echo "<br>";echo "<br>";



    //övn8
    $cars = array(
        array("Volvo", "V90", 5),
        array("VW", "Passat", 10),
        array("Toyota", "Prius", 3)
    );

    foreach($cars as $car){
        $values = array(
            'str',
            'str',
            0
        );

        for($i = 0; $i < 3; $i++){
            $values[$i] = $car[$i];
        }

        echo $values[2] . " st " . $values[0] . " Modell " . $values[1] . '<br>';

        
    }



?>






