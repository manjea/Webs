<?php
    session_start();

    if (isset($_SESSION["user_id"]))
    {
        header("Location: ../index.php");
    }

    try 
    {
        require_once "../db.php";
        $dbh = connectToDB();
    } 
    catch(PDOException $e)  
    { 
        echo $e->getMessage(); 
    } 
    
    /* PHP-kod för inloggning */
    if(isset($_POST['username'])){
        loginUser($dbh);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Kontoinloggning</title>
        <link href="../css/style.css" rel="stylesheet" />
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="../index.php">Hem</a></li>
                <li><a href="posts.php">Inlägg</a></li>
                <li id="right"><a href="login.php">Logga in</a></li>
            </ul>
        </nav>
        <section>
            <form id="formLogin" action="#" method="post">
                <fieldset>
                    <legend>Konto</legend>
                    <p>
                        Användarnamn <br />
                        <input type="text" name="username" placeholder="User123" required />
                    </p>
                    <p>
                        Lösenord <br />
                        <input type="password" name="password" placeholder="Password" required />
                    </p>
                    <input type="submit" value="Logga in" name="login"/>
                    <p><a href="addUser.php">Registrera</a></p>
                </fieldset>
            </form>
        <section>
        <footer>
            Inlämningsuppgift kontoinloggning
        </footer>
    </body>
</html>