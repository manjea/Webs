<?php
    $text = "En text";
    $heltal = 5;
    $decimaltal = 3.2;
    $boolean = true;
    $vektor = array("Juni", "Juli", "Augusti");
    $null = "";

    echo gettype($text) . "<br>";
    echo gettype($heltal) . "<br>";
    echo gettype($decimaltal) . "<br>";
    echo gettype($boolean) . "<br>";
    echo gettype($vektor) . "<br>";
    echo gettype($null) . "<br>";


    $null = null;
    echo gettype($null) . "<br>";
    echo gettype($text, $heltal)
?>