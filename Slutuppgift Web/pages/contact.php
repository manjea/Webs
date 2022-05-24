<?php
    include_once('db.php');

    $loggedIn = false;
    if(isset($_SESSION['loggedIn'])){
        $loggedIn = true;
    }

    if(isset($_POST['send'])){ //om vi försöker skicka ett mail
        if($_SESSION["CSRFToken"] === $_POST["CSRFToken"]){ //om vi inte spammar
            mailTo();
        }
        else{ //annars blir det error
            $error = true;

        }
    }

    $_SESSION["CSRFToken"] = bin2hex(random_bytes(32)); //skapar CSRFToken
?>


<section id="main">
    <!-- Lägg till formulär -->
    <form action="#" method="post">
        <fieldset>
            <legend>Contact</legend>

            <input type="hidden" name="CSRFToken" value="<?php echo $_SESSION['CSRFToken'] ?>" /> <!-- gömd CSRFToken -->

            <p>
                <label for="namn">Full Name</label><br />
                <input type="text" name="namn" id="namn" placeholder="Per Karlsson" value="<?php if($loggedIn){echo $_SESSION['firstname'].' '.$_SESSION['lastname'];}else{echo '';} ?>" required><br>
            </p>

            <p>
                <label for="email">Email</label><br />
                <input type="email" name="email" id="email" placeholder="namn@example.uk" value="<?php if($loggedIn){echo $_SESSION['email'];}else{echo '';} ?>" required><br>
            </p>
            
            <p>
                <label for="meddelandetext">Message</label><br />
                <textarea name="meddelandetext" id="meddelandetext" cols="30" rows="10" placeholder="Write here..." required></textarea>
            </p>
            
            <p>
                <label for="reciept">Reciept Image</label><br />
                <input type="file" name="reciept" id="reciept" accept="image/*"><br />
                <span style="font-size:12px;">*optional</span>
            </p>

            <input type="submit" name="send" value="Send"></input>
            <br />
            <?php
                if(isset($error)){ //om dom spammar
                    if($error){
                        echo '<span class="register-error-msg">Sluta spamma mig!!</span>';
                    }
                }
                if(isset($_SESSION["errorMsg"])){ //om dom spammar
                    echo '<span class="register-error-msg">'. $_SESSION["errorMsg"] .'</span>';
                }
            ?>

            <span id="login-btn">
                Don't have an account? 
                <a href="index.php?page=register">Sign up</a>
            </span>
        </fieldset>
    </form>
</section>
