<?php
    $text = "En text";
    $heltal = 5;
    $decimaltal = 3.2;
    $boolean = true;
    $vektor = array("Juni", "Juli", "Augusti");
    $null = "";

    echo var_dump($text) . "<br>";
    echo var_dump($heltal) . "<br>";
    echo var_dump($decimaltal) . "<br>";
    echo var_dump($boolean) . "<br>";
    echo var_dump($vektor) . "<br>";
    echo var_dump($null) . "<br>";


    $null = null;
    echo var_dump($null) . "<br>";
    echo var_dump($text, $heltal)
?>