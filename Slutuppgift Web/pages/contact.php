<?php
    $loggedIn = false;
    if(isset($_SESSION['loggedIn'])){
        $loggedIn = true;
    }
?>


<section id="main">
    <!-- Lägg till formulär -->
    <form action="#" method="post">
        <fieldset>
            <legend>Contact</legend>

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

            <input type="submit" value="Send"></input>

            <span id="login-btn">
                Don't have an account? 
                <a href="index.php?page=register">Sign up</a>
            </span>
        </fieldset>
    </form>
</section>
