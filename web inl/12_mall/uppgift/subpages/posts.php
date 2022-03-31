<?php
    session_start();

    
    if(!isset($_SESSION["user_id"]))
    {
        header("Location: login.php");
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


    /* PHP-kod för att hämta inlägg */
    if(isset($_SESSION['user_id'])){
        $stmt = getPosts($dbh);

        $stmt->execute();

    }else{
        header('Location: ../index.php?q=du ska inte va här');
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
            <article id="articleLeft">
                <h3>Inlägg</h3>
                <?php

                    
                    /* PHP-kod för utskrift av inlägg */
                    if($stmt->rowCount() > 0){                        
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                        {
                            echo "<article class='box'>"; 
                            /* Utskrift av sessionsvariabeln username, datum och meddelandetexten 
                            från tabellen posts */ 
                            echo $row['firstname']." ".$row['lastname']." (".$row['username'].")<br />".$row['date']."<br /><br />".$row['text'];
                            
                            echo "</article>";
                        }
                    }
                ?>
            </article>
            
            <?php
                /* PHP-kod för att inkludera dokumentet addPost.php */
                include('addPost.php');

            ?>
        </section>
        <footer>
            Inlämningsuppgift kontoinloggning
        </footer>
    </body>
</html>