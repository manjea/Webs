<?php
    session_start();


    if(!isset($_SESSION['loggedIn'])){
        header("Location: login.php");

    }else{
        echo 'du är inloggad på sida 1';
        echo '<a href="loggedIn.php"> tillbaka :)</a>';
    }
?>