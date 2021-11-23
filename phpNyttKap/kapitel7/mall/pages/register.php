<!-- fixa ! :) -->
<section id="main">
    <h1>Registera Konto</h1>

    <?php
        if(isset($_POST['submit'])){
            if (session_status() == PHP_SESSION_NONE) { 
                session_start(); 
            }

            $uname = $_POST["uname"]; 
            $password = $_POST["pass"];

            $uname = htmlspecialchars(stripslashes(trim($uname)));
            $password = htmlspecialchars(stripslashes(trim($password)));

            
        }
    ?>

    <!-- Lägg till formulär -->
    <form action="#" method="post">
        <fieldset>
            <legend>Konto Information</legend>
            <label for="uname">Användarnamn:</label><br>
            <input type="text" name="uname" id="uname" value="<?php echo (isset($uname))?$uname:'';?>"><br>
            <label for="pass">Lösenord:</label><br>
            <input type="text" name="pass" id="pass"></input><br><br>

            <input type="submit" value="submit" name="submit">
        </fieldset>
    </form>

    <?php
        if(isset($_POST['submit'])){
            echo '<br>';
            if(strlen($password) < 8 || strlen($uname) < 4){
            echo 'för kort anvnamn eller lösenord';

            }else{
                $_SESSION[$uname] = $password;

                header('Location: index.php?page=login');
            }
        }
    ?>
    
</section>