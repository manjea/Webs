<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
</body>
</html>

<?php
    session_start();


    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1){
        echo '<a href="logut.php">Logga ut</a> <br> <a href="sida1.php">En annan länk</a> <br> <a href="sida2.php">Ännu en annan länk</a> <br>';
        //man kan prova skriva in /sida1.php som url för att testa om man känner för det.
    }else{
        echo 'du är utloggad<br>lol';
    }




?>