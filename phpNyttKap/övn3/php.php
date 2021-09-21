<?php
    $tal = 3;
    $text = "3";
    var_dump($text == $tal);

    if ($tal == $text) echo "lika";
    if ($tal === $text) echo "lika";
    if ($tal === (int)$text) echo "lika";
    if ((string)$tal === $text) echo "lika";

?>