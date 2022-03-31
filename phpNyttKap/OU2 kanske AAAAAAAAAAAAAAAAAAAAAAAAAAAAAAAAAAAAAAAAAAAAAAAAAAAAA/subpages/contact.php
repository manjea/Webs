
<h1>Kontakt</h1>

<article id="articleLeft">
    <p>Exempelföretag AB</p>
    <p>Öppettider: Vardagar 10 - 19</p>
    <p>Telefonnummer: 010-12345678</p>
    <p>Adress: 12345 City</p>
</article>

<article id="articleRight">
    <form action="#" method="post">
        <fieldset>
            <legend>Skicka ett meddelande</legend>
            <p>
                <label>Namn <br />
                    <input name="namn" type="text" placeholder="Johan Englund" required />
                </label>
            </p>
            <p>
                <label>Mail <br />
                    <input name="mail" type="email" placeholder="example@example.com" required />
                </label>
            </p>
            <p>
                <label>Meddelande <br />
                    <textarea name="msg" placeholder="Max 200 tecken" cols="25" rows="5" maxlength="200" required></textarea>
                </label>
            </p>
            <p>
                <input name="s" type="submit" value="Skicka" />
            </p>
        </fieldset>
    </form>

    <?php
        include('./checkinput.php');
        if(isset($_POST['s'])){
            if(filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL)){//om mailen funkar
                $name = checkInput($_POST['namn']);//förfinar och kollar så dom är längre än 4 annars falsk
                $msg = checkInput($_POST['msg']);
                if($name != false && $msg != false){ //om ingen av dom är falsk
                    echo 'Tack för ditt meddelande';
                }else{
                    echo 'Felaktiga inmatningar';//1
                }
            }else{
                echo 'Felaktiga inmatningar';//2
            }
        }

    ?>
</article>
