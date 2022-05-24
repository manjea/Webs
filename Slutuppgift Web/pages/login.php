<?php
    if (session_status() == PHP_SESSION_NONE) { 
        session_start(); 
    }   
    if(isset($_SESSION['loggedIn'])){
        header('Location: index.php');
    }
?>

<?php
    $error = false;
    if(isset($_POST['submit'])){

        try {
            include_once('db.php');
            $dbh = connectToDB();
            $login_result = loginCustomer($dbh);
            if($login_result){
                header('Location: index.php?page=start');
            }
            $error = true;
        } catch (\Throwable $th) {
            echo 'Det går inte att ansluta till databasen för tillfället!';
        }
    }
?>

<section id="main">
    <form action="#" method="post">
        <fieldset>
            <legend>Log In</legend>
            <p>
                <label for="email">Email</label><br>
                <input type="email" name="email" id="email" value="<?php echo (isset($email))?$email:'';?>" required />
            </p>

            <p>
                <label for="pass">Password</label><br>
                <input type="password" name="password" id="pass" required />
            </p>

            <span class="register-error-msg"><?php if($error){ echo 'Det gick inte att logga in'; } else{ echo ''; } ?></span> <!-- om det blir error -->


            <input type="submit" value="Log in" name="submit" />

            <span id="login-btn">
                Don't have an account? 
                <a href="index.php?page=register">Sign up</a>
            </span>
        </fieldset>

    </form>

</section>