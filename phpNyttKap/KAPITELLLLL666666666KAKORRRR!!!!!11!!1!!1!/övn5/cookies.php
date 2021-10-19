<?php
    if(isset($_POST['sub'])){
        if(isset($_COOKIE['firstName']) && isset($_COOKIE['lastName'])){
            if($_COOKIE['firstName']) == $_POST['forn'] && $_COOKIE['lastName']) == $_POST['eftn']){
                echo 'Du har redan fyllt i detta formulär ' . $_COOKIE['firstName'] . ' ' . $_COOKIE['lastName'] . '<br>';
            }else{
                setcookie('firstName', $_POST['forn'], time() + 60*60, "/");
                setcookie('lastName', $_POST['eftn'], time() + 60*60, "/");
                echo 'tack för din registrering ' . $_POST['forn'] . '<br>';
            }
        }
    }
    echo '<a href="form.php">tillbaka</a>'; // lol
    

?>