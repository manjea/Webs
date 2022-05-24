<?php
    if(!isset($_SESSION['admin'])){ // om man inte är admin får man inte vara på denna sida
        header('Location: index.php');
    }
?>
<section id="main">
    <form action="index.php?page=editedUser" method="post">
        <fieldset>
            <legend>Register Account</legend>
            <p> 
                <label for="fname">Firstname</label><br />
                <input type="text" name="firstname" id="fname"/>
            </p>

            <p>
                <label for="lname">Lastname</label><br>
                <input type="text" name="lastname" id="lname"/>
            </p>

            <p>
                <label for="email">Email</label><br>
                <input type="email" name="email" id="email"/>
            </p>

            <p>
                <label for="pass">Password</label><br>
                <input type="password" name="password" id="pass"/>
            </p>

            <input type="hidden" name="user_id" value="<?php echo $_GET['userId'] ?>"> <!-- gömd user_id -->

            <input type="submit" value="Edit" name="submit" />

            <span id="login-btn">
                Already have an account? 
                <a href="index.php?page=login">Log in</a>
            </span>
        </fieldset>
    </form>

</section>