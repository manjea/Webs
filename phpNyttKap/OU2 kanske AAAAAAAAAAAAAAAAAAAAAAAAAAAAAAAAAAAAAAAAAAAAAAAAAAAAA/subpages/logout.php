<?php
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }

    if(isset($_SESSION['loggedIn'])){
        session_unset();//förstör sessionen och skickar en hem
        session_destroy();
        header('Location: index.php?page=home');
        
    }else{
        header('Location: index.php?page=home&msg=Du är redan utloggad');//om man är utloggad vet inte varför msg finns där men jag har inte gjort nåt med det, om man ser det kan man ju skratta lite "hahaha vilken dum developer han har glömt ta bort den där saken som han inte använder längre hahaha".
    }

?>