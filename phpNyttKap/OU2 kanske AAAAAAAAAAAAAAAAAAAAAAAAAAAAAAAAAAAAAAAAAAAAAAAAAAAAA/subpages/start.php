
<h1>Startsida</h1>
<article>
    <p>Detta är webbsidans startsida</p>

    <!-- Lägg till utskrift om man är inloggad eller inte -->
    <p>
        <?php
            if(session_status() === PHP_SESSION_NONE){
                session_start();
            }
            if(isset($_SESSION['loggedIn'])){//ut skrift ifall man är inloggad eller inte
                echo 'Du är inloggad och kan handla.';
            }
            else{
                echo 'Logga in för att handla.';
            }
        ?>
    </p>
    
    
</article>

<article style="margin-top:40px">
    <h3>Nyheter</h3>
    <p>Innehåll</p>
</article>
