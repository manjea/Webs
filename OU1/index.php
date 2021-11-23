<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="post">
        <label for="user">Användarnamn:</label><br>
        <input type="text" name="user" id="user" required><br>
        <label for="pass">Lösenord:</label><br>
        <input type="password" name="pass" id="pass" required><br><br>
        <input type="submit" value="Logga In" name="submit">
    </form>
    <?php
    //clean
    require('functions.php');
        if(isset($_COOKIE['loggedIn'])){
            echo '<a href="delete.php">Ta bort konto</a><br>';
        }else{
            echo '<a href="register.php">Registrera konto</a><br>';
        }

        if(isset($_GET['message'])){
            $message = sanitizeInput($_GET['message']);
            echo $message;
        }



    ?>
</body>
</html>