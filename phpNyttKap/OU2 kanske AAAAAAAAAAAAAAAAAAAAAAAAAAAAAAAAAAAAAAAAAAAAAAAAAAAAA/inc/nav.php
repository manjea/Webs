<nav>
    <ul>
        <li><a href="index.php?page=home">Hem</a></li>
        <li><a href="index.php?page=products">Produkter</a></li>
        <li><a href="index.php?page=contact">Kontakt</a></li>
        <li><a href="index.php?page=shop">Handla</a></li>
        <?php
        session_start();
            if(!isset($_SESSION['loggedIn'])){
                echo '<li id="right"><a href="index.php?page=login">Logga in</a></li>';
            }else{
                
                echo '<li id="right"><a href="index.php?page=logout">Logga ut</a></li>';
            }
        ?>
    </ul>
</nav>