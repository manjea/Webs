<!-- Redigera länkar -->
<ul>
    <li><a href="index.php">Hem</a></li>
    <li><a href="index.php?page=kontakt">Kontakt</a></li>
    <li><a href="index.php?page=blog">Blogg</a></li>
    <?php
        if (session_status() == PHP_SESSION_NONE) { 
            session_start(); 
        }
        if (isset($_SESSION["loggedIn"])) 
        {
            echo '<li><a href="index.php?page=logout">Logga ut</a></li>'; 
        }
        else 
        { 
            echo '<li><a href="index.php?page=login">Logga in</a></li>'; 
        }
    ?>
    <!-- <li><a href="pages/login.php">Logga in</a></li> -->
</ul>