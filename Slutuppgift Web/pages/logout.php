<?php
    session_regenerate_id(true);
    if(!isset($_SESSION['loggedIn'])){ //om man inte är inloggad redirectas man
        header('Location: index.php?page=start');
    }else{ //om man är inloggad, loggas man ut, och redirectas
        session_start();
        session_unset();
        session_destroy();
        header('Location: index.php?page=start');   
    }

?>