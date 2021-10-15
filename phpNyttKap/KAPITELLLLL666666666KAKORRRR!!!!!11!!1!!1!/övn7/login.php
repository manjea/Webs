<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="anv">Användarnamn:</label><br>
        <input type="text" name="anv" required><br>
        <br>
        <label for="lös">Lösenord:</label><br>
        <input type="password" name="lös" required><br>




        <input type="submit" value="Logga in" name="log">
    </form>

    <?php
        session_start();

        if(isset($_POST['log'])){
            if($_POST['anv'] == 'root' && $_POST['lös'] == 'admin'){
                $_SESSION['loggedIn'] = 1;
                header('Location: loggedIn.php');
            }else{
                echo 'Felaktiga uppgifter';
            }    
        }




    ?>

</body>
</html>