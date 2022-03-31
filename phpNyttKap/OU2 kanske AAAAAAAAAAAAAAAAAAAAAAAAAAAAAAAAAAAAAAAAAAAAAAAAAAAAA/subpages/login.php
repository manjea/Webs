<?php
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }    
    if(isset($_SESSION['loggedIn'])){
        header('Location: index.php?page=home');
    }
?>


<form id="formLogin" action="#" method="post">
    <fieldset>
        <legend>Logga in</legend>
        <p>
            <label>Användarnamn <br />
                <input type="text" name="anv" placeholder="User123" required />
            </label>
        </p>
        <p>
            <label>Lösenord <br />
                <input type="password" name="psw" placeholder="Lösenord" required />
            </label>
        </p>
        <p>
            <input type="submit" name="s" value="Logga In" />
        </p>
    </fieldset>
    <a href="index.php?page=register">Registrera Konto</a>
</form>

<?php
    if(isset($_POST['s'])){
        $anv = $_POST['anv'];
        $psw = $_POST['psw'];
        $anv = htmlspecialchars($anv);
        $psw = htmlspecialchars($psw);
        //förfinar anv och psw
        $users = unserialize(file_get_contents('./users.dat'));//plockar alla användare
        foreach ($users as $key => $value) {
            
            if(password_verify($psw, $users[$anv])){ // kollar om det är rätt
                if(session_status() === PHP_SESSION_NONE){
                    session_start();
                }
                $_SESSION['loggedIn'] = true; //loggedIn
    
                header('Location: index.php?page=home');//skickar en hem
            }
        }
    }
?>