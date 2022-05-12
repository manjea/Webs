<section id="main">
    <?php

        if(isset($_SESSION['loggedIn'])){
            echo '<span><h1>Welcome ' . $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] . '</h1></span> <br />';

            echo '<a href="index.php?page=recipies">Your Recipies</a>';
        }
        else{
        }
    ?>

    <?php
        include_once('db.php');
        $dbh = connectToDB();
        if(isset($_GET['purchase']) && !isset($_SESSION['user_id'])){
            header('Location: index.php?page=login');
        }
        else if(isset($_GET['purchase']) && isset($_SESSION['user_id']) && isset($_COOKIE['cart'])){
            makePurchase($dbh);
            echo 'purchase' . '<br />';
        }
        else if(isset($_COOKIE['cart'])){
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
        }else{
            echo 'Varukorgen va tom';
        }
        
    ?>

    <button onclick="EmptyCart()">Empty Cart</button>
        <br /><br /><br />
    <a href="index.php?page=checkout&purchase=true">Purchase</a>



</section>