<section id="main">
    <?php
        try {
            include_once('db.php');
            $dbh = connectToDB();
            $allArticles =fetchNumberOfArticles($dbh); //vi hämtar antalet artiklar i databasen

            $num_of_articles = $allArticles['COUNT(article_id)']; 


            do {//vi plockar random artiklar tills vi får en som vi inte redan fått
                $rand1 = rand(0, $num_of_articles);
                $rand1_info = fetchArticleById($rand1, $dbh);    
            }while($rand1_info == false);

            do {//vi plockar random artiklar tills vi får en som vi inte redan fått
                $rand2 = rand(0, $num_of_articles);
                $rand2_info = fetchArticleById($rand2, $dbh);
            } while ($rand2 == $rand1 || $rand2_info == false);

            do {//vi plockar random artiklar tills vi får en som vi inte redan fått
                $rand3 = rand(0, $num_of_articles);
                $rand3_info = fetchArticleById($rand3, $dbh);
            } while ($rand3 == $rand1 || $rand3 == $rand2 || $rand3_info == false);

            //vi skriver ut artiklarna
            if(isset($_SESSION['loggedIn'])){
                echo '<span><h1>Welcome ' . $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] . '</h1></span>';

                echo '<div class="article-container">
                    <span class="article-information-container">
                        <img src="'.$rand1_info['article_img_path'].'" alt="">';

                        echo '<span>'.$rand1_info['article_name'].'<br /> $'.$rand1_info['price'].'</span>';

                        echo '<button onclick="addToCart(' . $rand1_info['article_id'] . ')">Add to cart</button>'.//knapp för att läggar till artikeln, scriptet ligger i CartScripts.js
                        '
                    </span>
                    <span class="article-information-container">
                        <img src="'.$rand2_info['article_img_path'].'" alt="">
                        <span>'.$rand2_info['article_name'].'<br /> $'.$rand2_info['price'].'</span>
                        <button onclick="addToCart(' . $rand2_info['article_id'] . ')">Add to cart</button>
                    </span>
                    <span class="article-information-container">
                        <img src="'.$rand3_info['article_img_path'].'" alt="">
                        <span>'.$rand3_info['article_name'].'<br /> $'.$rand3_info['price'].'</span>
                        <button onclick="addToCart(' . $rand3_info['article_id'] . ')">Add to cart</button>
                    </span>
                </div>';
                echo '
                <br />
                <p>
                    <a href="index.php?page=browse">Browse More</a>
                </p>';
            }
            else{
                echo '<p>Log in to see <span class="italic-span">for-you</span> page ☺</p>';
                echo '<p>OR</p>';
                echo '
                <br />
                <p>
                    <a href="index.php?page=browse">Browse More</a>
                </p>';
            }
        } catch (\Throwable $th) {
            echo 'Det går inte att ansluta till databasen för tillfället';
        }
        


    ?>

</section>