<section id="main">
    <?php

        if(isset($_SESSION['loggedIn'])){ //om vi är inloggade kan man se sina reciepes
            echo '<span><h1>Welcome ' . $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] . '</h1></span> <br />';

            echo '<a href="index.php?page=recipies">Your Recipies</a>';
        }
        else{
            echo "Obs! Du måste logga in för att göra ett köp. Men oroa dig inte, vi sparar din varukorg tills du har loggat in! <br />";
        }
    ?>

    <?php
        try {
            include_once('db.php');
            $dbh = connectToDB(); 
            if(isset($_GET['purchase']) && !isset($_SESSION['user_id'])){ //om vi försöker köpa men inte är inloggad
                header('Location: index.php?page=login');
            }
            else if(isset($_GET['purchase']) && isset($_SESSION['user_id']) && isset($_COOKIE['cart'])){ //om vi försöker köpa, är inloggade och har varer i varukorgen
                makePurchase($dbh);
                echo 'purchase' . '<br />';
            }
            else if(isset($_COOKIE['cart'])){ //om vi endast skriver ut varukorgen
                $cartArray = explode(',',$_COOKIE['cart']);

                foreach ($cartArray as $key => $value) {
                    $article = fetchArticleById($value, $dbh);

                    echo $article['article_name'];
                    echo '<br />';
                    echo $article['price'];
                    echo '<br />';
                    echo '<br />';
                    echo '<br />';
                }
            }else{ //ifall varukorgen är tom
                echo 'Varukorgen va tom';
            }
            //skriver ut knappar
            echo'<button onclick="EmptyCart()">Empty Cart</button> '. //knapp för att tömma varukorgen, scriptet finns i CartScripts.js
            '
            <br /><br /><br />
            <a href="index.php?page=checkout&purchase=true">Purchase</a>';
        } catch (\Throwable $th) {
            echo 'Det går inte att ansluta till databasen för tillfället';
        }
        
    ?>
</section>