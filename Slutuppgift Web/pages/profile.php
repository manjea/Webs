<?php
    if(isset($_SESSION['loggedIn'])){
        echo '<span><h1>Welcome ' . $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] . '</h1></span>';
    }else{
        header('Location: index.php');
    }

?>