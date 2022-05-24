<section id="browse">
    <section id="browse-header">
        <h1>Hetast Just Nu</h1>
        <ul>
            <li><a href="#shirt-jump">Shirts</a></li>
            <li><a href="#pant-jump">Pants</a></li>
            <li><a href="#hat-jump">Hats</a></li>
            <li><a href="#belt-jump">Belts</a></li>
        </ul>
    </section>

    <?php
        try {
            //skriver ut radnom artiklar
            include_once('db.php');
            $dbh = connectToDB();
            $allArticles =fetchNumberOfArticles($dbh); //vi hämtar antalet artiklar i databasen

            $num_of_articles = $allArticles['COUNT(article_id)'];

            do { //vi plockar random artiklar tills vi får en som vi inte redan fått
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
            echo '<div class="article-container">
                    <span class="article-information-container">
                        <img src="'.$rand1_info['article_img_path'].'" alt="">';

                        echo '<span>'.$rand1_info['article_name'].'<br /> $'.$rand1_info['price'].'</span>';

                        echo '<button onclick="addToCart(' . $rand1_info['article_id'] . ')">Add to cart</button> './/knapp för att läggar till artikeln, scriptet ligger i CartScripts.js
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
        } catch (\Throwable $th) {
            echo 'Det går inte att ansluta till databasen för tillfället';
        }
        

        
    ?>
    <h1 id="shirt-jump" class="article-type-header">Shirts</h1>
    <?php
        try {
            //skriver ut tröjer
            include_once('db.php');

            if(!isset($dbh)){ //för hindrar varningar ifall $dbh inte är settat när databasen är nere.
                $dbh = null;
            }

            $allArticles =fetchNumberOfArticles($dbh);

            do {
                $rand1 = rand(0, $num_of_articles);
                $rand1_info = fetchArticleById($rand1, $dbh, 'shirt');    
            }while($rand1_info == false);

            do {
                $rand2 = rand(0, $num_of_articles);
                $rand2_info = fetchArticleById($rand2, $dbh, 'shirt');
            } while ($rand2 == $rand1 || $rand2_info == false);

            do {
                $rand3 = rand(0, $num_of_articles);
                $rand3_info = fetchArticleById($rand3, $dbh, 'shirt');
            } while ($rand3 == $rand1 || $rand3 == $rand2 || $rand3_info == false);




            echo '<div class="article-container">
                    <span class="article-information-container">
                        <img src="'.$rand1_info['article_img_path'].'" alt="">
                        <span>'.$rand1_info['article_name'].'<br /> $'.$rand1_info['price'].'</span>
                        <button onclick="addToCart(' . $rand1_info['article_id'] . ')">Add to cart</button>
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

        } catch (\Throwable $th) {
            echo 'Det går inte att ansluta till databasen för tillfället';
        }
        
        
    ?>
    <h1 id="pant-jump" class="article-type-header">Pants</h1>
    <?php
        try {
            //skriver ut byxor
            include_once('db.php');

            $allArticles =fetchNumberOfArticles($dbh);

            do {
                $rand1 = rand(0, $num_of_articles);
                $rand1_info = fetchArticleById($rand1, $dbh, 'pants');    
            }while($rand1_info == false);

            do {
                $rand2 = rand(0, $num_of_articles);
                $rand2_info = fetchArticleById($rand2, $dbh, 'pants');
            } while ($rand2 == $rand1 || $rand2_info == false);

            do {
                $rand3 = rand(0, $num_of_articles);
                $rand3_info = fetchArticleById($rand3, $dbh, 'pants');
            } while ($rand3 == $rand1 || $rand3 == $rand2 || $rand3_info == false);




            echo '<div class="article-container">
                    <span class="article-information-container">
                        <img src="'.$rand1_info['article_img_path'].'" alt="">
                        <span>'.$rand1_info['article_name'].'<br /> $'.$rand1_info['price'].'</span>
                        <button onclick="addToCart(' . $rand1_info['article_id'] . ')">Add to cart</button>
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
        } catch (\Throwable $th) {
            echo 'Det går inte att ansluta till databasen för tillfället';
        }
        

        
    ?>
    <h1 id="hat-jump" class="article-type-header">Hats</h1>
    <?php
    //skriver ut hattar
        try {
            include_once('db.php');

            $allArticles =fetchNumberOfArticles($dbh);

            do {
                $rand1 = rand(0, $num_of_articles);
                $rand1_info = fetchArticleById($rand1, $dbh, 'hat');
            }while($rand1_info == false);

            do {
                $rand2 = rand(0, $num_of_articles);
                $rand2_info = fetchArticleById($rand2, $dbh, 'hat');
            } while ($rand2 == $rand1 || $rand2_info == false);

            do {
                $rand3 = rand(0, $num_of_articles);
                $rand3_info = fetchArticleById($rand3, $dbh, 'hat');
            } while ($rand3 == $rand1 || $rand3 == $rand2 || $rand3_info == false);




            echo '<div class="article-container">
                    <span class="article-information-container">
                        <img src="'.$rand1_info['article_img_path'].'" alt="">
                        <span>'.$rand1_info['article_name'].'<br /> $'.$rand1_info['price'].'</span>
                        <button onclick="addToCart(' . $rand1_info['article_id'] . ')">Add to cart</button>
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
        } catch (\Throwable $th) {
            echo 'Det går inte att ansluta till databasen för tillfället';
        }
        

        
    ?>
    <h1 id="belt-jump" class="article-type-header">Belts</h1>
    <?php
    //skriver ut bälten
        try {
            include_once('db.php');

            $allArticles =fetchNumberOfArticles($dbh);
    
            do {
                $rand1 = rand(0, $num_of_articles);
                $rand1_info = fetchArticleById($rand1, $dbh, 'belt');    
            }while($rand1_info == false);
    
            do {
                $rand2 = rand(0, $num_of_articles);
                $rand2_info = fetchArticleById($rand2, $dbh, 'belt');
            } while ($rand2 == $rand1 || $rand2_info == false);
    
            do {
                $rand3 = rand(0, $num_of_articles);
                $rand3_info = fetchArticleById($rand3, $dbh, 'belt');
            } while ($rand3 == $rand1 || $rand3 == $rand2 || $rand3_info == false);
    
    
    
    
            echo '<div class="article-container">
                    <span class="article-information-container">
                        <img src="'.$rand1_info['article_img_path'].'" alt="">
                        <span>'.$rand1_info['article_name'].'<br /> $'.$rand1_info['price'].'</span>
                        <button onclick="addToCart(' . $rand1_info['article_id'] . ')">Add to cart</button>
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
        } catch (\Throwable $th) {
            echo 'Det går inte att ansluta till databasen för tillfället';
        }
    ?>
    <a href="#top-jump">jump to top</a>
</section>