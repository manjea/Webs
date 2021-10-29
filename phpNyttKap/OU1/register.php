<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require('functions.php');



        if(isset($_POST['sub'])){
            $forn = $_POST['forn'];
            $eftn = $_POST['eftn'];
            $forn = rensa($forn);
            $eftn = rensa($eftn);
            $email = $_POST['email'];
            skadlig($forn);
            skadlig($eftn);
            skadlig($email);
            if(strlen($forn) >= 2 && strlen($eftn) >= 2){
                setcookie('forn', $forn, time() + 60*60, "/");
                setcookie('eftn', $eftn, time() + 60*60, "/");
                setcookie('email', $email, time() + 60*60, "/");
                echo 'Nu blev ' . $forn . " registrerad! <br>"; 
            }
        }
        else{
            echo 'Registrera en person först!<br>';
        }
        echo '<a href="index.php">Tillbaka</a>';


        function rensa($x){
            $x = str_replace(" ", "", $x);
            return $x;
        }


    ?>
</body>
</html>