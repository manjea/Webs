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
        <legend>Registrera användare</legend>
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
            <input type="submit" name="s" value="Registrera" />
        </p>
    </fieldset>
</form>

<?php
include('./checkinput.php');
    if(isset($_POST['s'])){
        $anv = checkInput($_POST['anv']);//returnerar false om det är skumt
        $psw = checkInput($_POST['psw']);
        if($anv != false && $psw != false){//om det inte är skumt
            if(session_status() === PHP_SESSION_NONE){
                session_start();
            }
            $psw = password_hash($psw, PASSWORD_DEFAULT);//krypterar password
            if(file_exists('./users.dat')){
                $userArray = unserialize(file_get_contents('./users.dat')); //plockar alla användare
                $userArray[$anv] = $psw;//lägger till en användare

            }
            else{
                $userArray[$anv] = $psw;
            }
            file_put_contents('./users.dat', serialize($userArray));//stoppar in dom nya användarna 

            header('Location: index.php?page=login');//skickar en till login
        }
    }
?>