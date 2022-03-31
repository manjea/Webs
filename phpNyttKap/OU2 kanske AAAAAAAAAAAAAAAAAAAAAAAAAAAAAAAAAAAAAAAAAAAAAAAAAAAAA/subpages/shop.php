<?php
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }

    if(!isset($_SESSION['loggedIn'])){//skickar hem en om man inte är inloggad
        header('Location: index.php?page=home');
    }
?>


<h1>Handla</h1>


<article id="articleLeft">
    <p>Beställningsinformation:</p>

    <!-- Lägg till utskrift om kostnad -->
    <p>
        <?php 
            if(isset($_SESSION['CSRFToken']) && isset($_POST['CSRFToken'])){ //kollar om det är samma CSRFToken
                if($_SESSION['CSRFToken'] == $_POST['CSRFToken']){
                    $x=true;
                }else{
                    $x=false;
                }
            }else{
                $x=true;
            }
            
            $_SESSION["CSRFToken"] = bin2hex(random_bytes(32)); //gör en ny CSRFToken
        ?>
    </p>

    <?php
        
        if(isset($_POST['s'])){
            $antal = $_POST['antal'];
            $kostnad = $antal * $_POST['priser'];

            if($x){ // om det inte är en CRFT-attack
                if($antal > 0){ // om det inte är fel
                    if(isset($_SESSION['total']) && isset($_SESSION['varukorg'])){
                        $_SESSION['total'] += $kostnad;
                        array_push($_SESSION['varukorg'], array($antal, $_POST['priser'])); 
                    }else{ //om sessionen inte finns
                        $_SESSION['total'] = $kostnad;
                        $_SESSION['varukorg'] = array();
                        array_push($_SESSION['varukorg'], array($antal, $_POST['priser'])); 
                    }
                    if(isset($_SESSION['varukorg'])){//skriv ut alla köp
                        foreach ($_SESSION['varukorg'] as $key => $value) {
                            echo $value[0] . "st varor för " . $value[1] . "kr<br>";
                        }
                    }
                    if(isset($_SESSION['total'])){//skriv ut summa
                        echo "<br>"."Summa: " . $_SESSION['total'] . "kr";
                    }

                }else{//om antal <= 0
                    echo 'Felaktigt antal';
                }
            }
        }
    ?>
</article>

<article id="articleRight">
    <form action="#" method="post">
        <fieldset>
            <legend>Köp</legend>
            <input type="hidden" name="CSRFToken" value="<?php echo $_SESSION['CSRFToken'] ?>" />
            <p>
                <label for="p">Välj vara</label>
                <select name="priser" id="p">
                    <option value="149">Vara 1 (149:-)</option>
                    <option value="199">Vara 2 (199:-)</option>
                    <option value="249">Vara 3 (249:-)</option>
                    <option value="399">Vara 4 (399:-)</option>
                    <option value="479">Vara 5 (479:-)</option>
                    <option value="599">Vara 6 (599:-)</option>
                </select>
            </p>
            <p>
                <label>Antal <br />
                    <input type="number" name="antal" placeholder="Ex. 1" required />
                </label>
            </p>
            <p>
                <input type="submit" name="s" value="Lägg till i varukorg" />
            </p>
        </fieldset>
    </form>

    

    
</article>
