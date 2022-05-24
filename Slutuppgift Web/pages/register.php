<!-- fixa ! :) -->
<section id="main">
    <?php
        if(isset($_POST['submit'])){
            if (session_status() == PHP_SESSION_NONE) { 
                session_start(); 
            }
        }
    ?>

    <?php
        $error = false;
        if(isset($_POST['submit'])){
            try { //om dom tar bort required i formet och försöker skicka det. / om det inte funkar
                include_once('db.php');
                $dbh = connectToDB();

                $register_result = registerCustomer($dbh);
                
                if($register_result){
                    header('Location: index.php?page=login');
                }
                $error = true;
                
            } catch (\Throwable $th) {
                echo 'Något gick fel vid anslutningen till databasen <br />';
            }
            
            
        }
    ?>

    <!-- Lägg till formulär -->
    <form action="#" method="post">
        <fieldset>
            <legend>Register Account</legend>
            <p> 
                <label for="fname">Firstname</label><br />
                <input type="text" name="firstname" id="fname" value="<?php echo (isset($firstname))?$firstname:'';?>" required />
            </p>

            <p>
                <label for="lname">Lastname</label><br>
                <input type="text" name="lastname" id="lname" value="<?php echo (isset($lastname))?$lastname:'';?>" required />
            </p>

            <p>
                <label for="email">Email</label><br>
                <input type="email" name="email" id="email" value="<?php echo (isset($email))?$email:'';?>" required />
            </p>

            <p>
                <label for="pass">Password</label><br>
                <input type="password" name="password" id="pass" required />
            </p>

            <span class="register-error-msg"><?php if($error){ echo 'Det gick inte att registrera kontot'; } else{ echo ''; } ?></span>


            <input type="submit" value="Register" name="submit" />

            <span id="login-btn">
                Already have an account? 
                <a href="index.php?page=login">Log in</a>
            </span>
        </fieldset>
    </form>

    
    
</section>