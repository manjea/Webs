<?php

    if(isset($_POST['submit']) && isset($_COOKIE['user'])){
        require('functions.php');
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $user = sanitizeInput($user);

        if($user == $_COOKIE['user'] && $pass == $_COOKIE['pass']){
            echo 'Inloggningen lyckades!<br>';
            setcookie(
                "loggedIn",
                true,
                time() + 60*60,
                "/"
            );
        }else{
            echo 'Fel användarnamn eller lösenord<br>';
        }
    }else{
        echo 'Skapa ett konto först<br>'; // detta kommer även skrivas ut om man inte klickar submit men jag tycker det passar ändå
    }
    echo '<a href="index.php">Tillbaka</a>';

?>