<?php
    session_start();


    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1){
        echo 'du är inloggad på sida 1';

    }else{
        echo 'du är utloggad på sida 1';
    }
    echo '<a href="loggedIn.php"> tillbaka :)</a>';
?>