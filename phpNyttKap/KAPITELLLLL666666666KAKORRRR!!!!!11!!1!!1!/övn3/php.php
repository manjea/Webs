<?php


    foreach ($_COOKIE as $key => $value) {
        setcookie(
            $key,
            $value,
            time() -1,
            '/'
        );
    }

    foreach ($_COOKIE as $key => $value) {
        print_r("key: {$key}, value: {$value} <br>");
    }

?>