<?php
    $dbh = new PDO("mysql:host=localhost;dbname=world;charset=utf8", "world", "world");

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


?>