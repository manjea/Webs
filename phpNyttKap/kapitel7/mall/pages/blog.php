<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="utf-8" />
        <title>Sessioner</title>
        <link href="../css/style.css" rel="stylesheet" type="text/css" />
    </head>

    <?php
        if (session_status() == PHP_SESSION_NONE) { 
            session_start(); 
        }
        if(!isset($_SESSION['loggedIn'])){
            header('Location: index.php?msg=Logga in för att få tillgång till blogg');
        }

    ?>
    <body>
        <section id="main">
            <h1>Skapa inlägg</h1>

            <!-- Lägg till formulär -->
            <form action="#" method="post">
                <fieldset>
                    <legend>Blogg inlägg</legend>
                    <label for="subject">Ämne:</label><br>
                    <input type="text" name="subject" id="subject"><br>
                    <label for="meddelande">Meddelande:</label><br>
                    <textarea style="resize: none;" name="meddelande" id="meddelande" cols="30" rows="10" placeholder="meddelande"></textarea><br><br>

                    <input type="submit" value="submit" name="submit">
                </fieldset>
            </form>

            <?php
                if(isset($_POST['submit'])){
                    $subject = "<hr/><p>Ämne: " . $_POST["subject"] . "</p>"; 
                    $msg = "<p>" . $_POST["meddelande"] . "</p>"; 
                    $date = date("Y-m-d H:i:s"); 
                    file_put_contents("msg.dat", $subject . " " . $msg . " " . $date, FILE_APPEND);

                    if(file_exists("msg.dat")) 
                    { 
                        echo file_get_contents("msg.dat"); 
                    }
                }
                if($_SESSION['loggedIn']){
                    if(file_exists("antal.txt")) 
                    { 
                        $antal = file_get_contents("antal.txt"); 
                        echo $antal +1;
                        file_put_contents("antal.txt", $antal+1);
                    }else{
                        file_put_contents("antal.txt", 1);
                        echo 1;
                    }

                    
                }
            ?>
        </section>
    </body>
</html>