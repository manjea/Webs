<?php
    session_start();

    if (isset($_SESSION["user_id"]))
    {
        header("Location: ../index.php");        
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
                <?php
                    if (isset($_SESSION["user_id"]))
                    {
                        echo '<li id="right"><a href="logout.php">Logga ut</a></li>';
                    }
                    else
                    {
                        echo '<li id="right"><a href="login.php">Logga in</a></li>';
                    }
                ?>
            </ul>
        </nav>
        <section>
            <form id="formLogin" action="#" method="post">
                <fieldset>
                    <legend>Skapa konto</legend>
                    <p>
                        Förnamn <br />
                        <input type="text" name="firstname" placeholder="Johan" required />
                    </p>
                    <p>
                        Efternamn <br />
                        <input type="text" name="lastname" placeholder="Englund" required />
                    </p>
                    <p>
                        Användarnamn <br />
                        <input type="text" name="username" placeholder="User123" required />
                    </p>
                    <p>
                        Lösenord <br />
                        <input type="password" name="password" placeholder="Password" required />
                    </p>
                    <input type="submit" name="submit" value="Registrera" />
                </fieldset>
                
                <?php
                    /* PHP-kod för att lägga till en användare */

                    if (isset($_POST['submit'])) 
                    { 
                        try 
                        {
                            require_once "../db.php";
                            $dbh = connectToDB();
                            $result = addUser($dbh); 
                        
                            if ($result){
                                echo "Användaren har registrerats";
                            }
                        } 
                        catch(PDOException $e)  
                        { 
                            echo $e->getMessage(); 
                        } 
                    }
                ?>
            </form>
        </section>
        <footer>
            Inlämningsuppgift kontoinloggning
        </footer>
    </body>
</html>