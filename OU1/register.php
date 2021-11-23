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

    //clean
        require('functions.php');
        if(!isset($_COOKIE['user'])){

            echo '
                <form action="#" method="post">
                    <label for="user">Användarnamn:</label><br>
                    <input type="text" name="user" id="user" required><br>
                    <label for="pass">Lösenord:</label><br>
                    <input type="password" name="pass" id="pass" required><br><br>
                    <input type="submit" value="Registrera" name="submit">
                </form>';
        }else{
            echo 'Kontot finns redan<br>';
            echo '<a href="index.php">Tillbaka</a>';
        }
        if(isset($_POST['submit'])){
            $user = sanitizeInput($_POST['user']);
            if(correctInput($user)){
                setcookie('user', $user, time() + 60*60, "/");
                setcookie('pass', sanitizeInput($_POST['pass']), time() + 60*60, "/");
                echo '<a href="index.php">Tillbaka</a>';

            }
        }












    ?>
</body>
</html>
