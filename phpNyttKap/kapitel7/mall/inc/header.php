<h1>Webbserverprogrammering 1</h1>
<?php

    $date = date("Y-m-d");    // Nytt innehåll som visar aktuellt datum 
    echo "<time> $date </time>" . '<br>'; 
    if (session_status() == PHP_SESSION_NONE) { 
        session_start(); 
    }
    if(isset($_SESSION['activeUser'])){
        echo $_SESSION['activeUser'] . '<br>';
    }
    else{
        echo 'No active user' . '<br>';
    }

    $antal = 0;
    foreach ($_SESSION as $key => $value) {
        $antal++;
    }
    if(isset($_SESSION['activeUser'])){
        echo $antal-2;
    }
    else{
        echo $antal;
    }
?>