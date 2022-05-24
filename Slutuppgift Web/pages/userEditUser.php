<?php

    include_once('db.php');

    $dbh = connectToDB();

?>

<?php
    if(isset($_POST['submit'])){
        if (session_status() == PHP_SESSION_NONE) { 
            session_start(); 
        }
    }

    $error = false;
    if(isset($_POST['submit'])){
        $register_result = editSelf($dbh, $_SESSION['user_id']); //om det gick att ändra lösen
        
        if($register_result){
            header('Location: index.php?page=login'); //så skickas vi till login
        }
        $error = true; //annars error
    }
?>

<section id="main">
    <form action="#" method="post">
        <fieldset>
            <legend>Edit own account</legend>
            <p>
                <label for="pass">Password</label><br>
                <input type="password" name="password" id="pass" required />
            </p>

            <span class="register-error-msg"><?php if($error){ echo 'Det gick inte att edita kontot'; } else{ echo ''; } ?></span> <!-- om error -->


            <input type="submit" value="Edit" name="submit" />

        </fieldset>

    </form>
</section>