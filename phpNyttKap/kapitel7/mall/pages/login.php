<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="utf-8" />
        <title>Sessioner</title>
        <link href="../css/style.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <?php
            if (session_status() == PHP_SESSION_NONE) { 
                session_start(); 
            }   
            if(isset($_SESSION['loggedIn'])){
                header('Location: index.php?msg=Du är redan inloggad');
            }
        ?>

        <section id="main">
            <h1>Logga in</h1>

            <!-- Lägg till formulär -->

            <form action="#" method="post">
                <fieldset>
                    <legend>Loggin</legend>
                
                    <label for="namn">Username:</label><br>
                    <input type="text" name="namn" id="namn"><br>

                    <label for="pass">Password:</label><br>
                    <input type="text" name="pass" id="pass"><br>
                    <br>
                    <input type="submit" value="login" name="submit">
                </fieldset>

            </form>

            <a href="index.php?page=register">Register</a>

        </section>
    </body>
    <?php

        if(isset($_POST['submit'])){
            if (session_status() == PHP_SESSION_NONE) { 
                session_start(); 
            }

            $namn =  $_POST['namn'];
            $pass = $_POST['pass'];
            if(isset($_SESSION[$namn])){
                if($_SESSION[$namn] == $pass){
                    $_SESSION["loggedIn"] = true;
                    $_SESSION["activeUser"] = $namn;
                     header('Location: index.php');
                }else{
                    echo 'felaktiga uppgifter';
                }
            }else{
                echo 'kontot finns inte';
            }
            
            
            // if ($namn == 'root' && $pass == 'admin') {
            //     $_SESSION["loggedIn"] = true;
            //     header('Location: index.php');
            // }else{
            //     echo 'felaktiga uppgifter';
            // }
        }
    ?>
</html>