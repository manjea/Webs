<?php
    session_regenerate_id(true);
    if(!isset($_SESSION['loggedIn'])){
        header('Location: index.php?page=start');
    }else{
        session_start();
        session_unset();
        session_destroy();
        header('Location: index.php?page=start');   
    }

?>