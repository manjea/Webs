<?php
    if(!isset($_SESSION['loggedIn'])){
        header('Location: index.php?msg=Du är redan utloggad&page=start');
    }else{
        session_start();
        session_unset();
        session_destroy();
        // $_SESSION['loggedIn'] = null;                    } gör man så försvinner inte alla användarna
        // $_SESSION['activeUser'] = 'No active user';      }
        header('Location: index.php?page=start');   
    }

?>