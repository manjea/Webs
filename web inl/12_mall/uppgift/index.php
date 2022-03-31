<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Kontoinloggning</title>
        <link href="css/style.css" rel="stylesheet" />
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="index.php">Hem</a></li>
                <li><a href="subpages/posts.php">Inlägg</a></li>
    
                <?php
                    session_start();

                    if (isset($_SESSION["user_id"]))
                    {
                        echo '<li id="right"><a href="subpages/logout.php">Logga ut</a></li>';
                    }
                    else
                    {
                        echo '<li id="right"><a href="subpages/login.php">Logga in</a></li>';
                    }
                ?>
            </ul>
        </nav>

        <section>
            <article style="margin-top:40px">
                <?php
                    if (isset($_SESSION["user_id"]))
                    {
                        /* PHP-kod för att skriva ut ett välkomstmeddelande med förnamn och efternamn */
                        echo "<h1>Välkommen ".$_SESSION['firstname']." ".$_SESSION['lastname']."!</h1>";
                        echo "<p>Du är nu inloggad och kan ta del av sidan Inlägg</p>";
                    }
                    else
                    {
                        echo "<p>Logga in för att ta del av allt innehåll på sidan</p>";
                    }
                ?>
            </article>
        </section>

        <footer>
            Inlämningsuppgift kontoinloggning
        </footer>
    </body>
</html>