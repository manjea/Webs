<?php

    if(isset($_COOKIE['loggedIn'])){
        setcookie('user', 'hajsan hejsan', time()-1, "/");
        setcookie('pass', 'hajsan hejsan', time()-1, "/");
        setcookie('loggedIn', 'hajsan hejsan', time()-1, "/");
        echo 'Du har raderat kontot!<br>';
        echo '<a href="index.php">Tillbaka till inloggningssidan</a>';
    }else{
        header("Location: index.php" . "?message=Logga in för att ta bort konto");
    }








?>