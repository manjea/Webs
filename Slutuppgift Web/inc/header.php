<style>
    .header-container { 
        display: flex; 
        align-items: center;
        justify-content: space-around;
    }
    .header-container > span {
        flex: 1 0 0;
    }
    .header-container > span {
        text-align: center;
    }
</style>

<div class="header-container">
    <span id="header-logo-container"><a href="index.php">
        <img src="./inc/images/logo-temp-toobig.png" alt="BRÖTHERS LOGO"></a></span>

    <span><h1>BRÖTHERS</h1></span>

    <span>
        <?php

            // $date = date("Y-m-d");    // Nytt innehåll som visar aktuellt datum 
            // echo "<time> $date </time>" . '<br>'; 

            if (session_status() == PHP_SESSION_NONE) { 
                session_start(); 
            }
            if (isset($_SESSION["loggedIn"])) 
            {
                echo '<a id="login-button" href="index.php?page=logout">Log out</a>'; 
            }
            else 
            { 
                echo '<a id="login-button" href="index.php?page=login">Log in</a>'; 
            }

        ?>
    </span>
</div>