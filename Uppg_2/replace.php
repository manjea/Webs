<?php
    header("Content-Type: text/html; charset=utf-8");

    $text = "Webbserverprogrammering 1 med PHP";

    echo substr($text, -3);
    echo "<br>";
    $text = str_replace("PHP", "Johan", $text);

    echo $text;

?>
