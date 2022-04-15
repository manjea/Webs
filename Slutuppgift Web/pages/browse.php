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
        include_once('db.php');
        $dbh = connectToDB();
        $allArticles = fetchAllArticles($dbh);

        $num_of_articles = $allArticles['COUNT(article_id)'];

        do {
            $rand1 = rand(0, $num_of_articles);
            $rand1_info = fetchArticleById($rand1, $dbh);    
        }while($rand1_info == false);

        do {
            $rand2 = rand(0, $num_of_articles);
            $rand2_info = fetchArticleById($rand2, $dbh);
        } while ($rand2 == $rand1 || $rand2_info == false);

        do {
            $rand3 = rand(0, $num_of_articles);
            $rand3_info = fetchArticleById($rand3, $dbh);
        } while ($rand3 == $rand1 || $rand3 == $rand2 || $rand3_info == false);




        echo '<div class="article-container">
                <span class="article-information-container">
                    <img src="'.$rand1_info['article_img_path'].'" alt="">
                    <span>'.$rand1_info['article_name'].'<br /> $'.$rand1_info['price'].'</span>
                </span>
                <span class="article-information-container">
                    <img src="'.$rand2_info['article_img_path'].'" alt="">
                    <span>'.$rand2_info['article_name'].'<br /> $'.$rand2_info['price'].'</span>
                </span>
                <span class="article-information-container">
                    <img src="'.$rand3_info['article_img_path'].'" alt="">
                    <span>'.$rand3_info['article_name'].'<br /> $'.$rand3_info['price'].'</span>
                </span>
            </div>';

        
    ?>
    <h1 id="shirt-jump" class="article-type-header">Shirts</h1>
    <?php
        include_once('db.php');

        $allArticles = fetchAllArticles($dbh);

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
                </span>
                <span class="article-information-container">
                    <img src="'.$rand2_info['article_img_path'].'" alt="">
                    <span>'.$rand2_info['article_name'].'<br /> $'.$rand2_info['price'].'</span>
                </span>
                <span class="article-information-container">
                    <img src="'.$rand3_info['article_img_path'].'" alt="">
                    <span>'.$rand3_info['article_name'].'<br /> $'.$rand3_info['price'].'</span>
                </span>
            </div>';

        
    ?>
    <h1 id="pant-jump" class="article-type-header">Pants</h1>
    <?php
        include_once('db.php');

        $allArticles = fetchAllArticles($dbh);

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
                </span>
                <span class="article-information-container">
                    <img src="'.$rand2_info['article_img_path'].'" alt="">
                    <span>'.$rand2_info['article_name'].'<br /> $'.$rand2_info['price'].'</span>
                </span>
                <span class="article-information-container">
                    <img src="'.$rand3_info['article_img_path'].'" alt="">
                    <span>'.$rand3_info['article_name'].'<br /> $'.$rand3_info['price'].'</span>
                </span>
            </div>';

        
    ?>
    <h1 id="hat-jump" class="article-type-header">Hats</h1>
    <?php
        include_once('db.php');

        $allArticles = fetchAllArticles($dbh);

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
                </span>
                <span class="article-information-container">
                    <img src="'.$rand2_info['article_img_path'].'" alt="">
                    <span>'.$rand2_info['article_name'].'<br /> $'.$rand2_info['price'].'</span>
                </span>
                <span class="article-information-container">
                    <img src="'.$rand3_info['article_img_path'].'" alt="">
                    <span>'.$rand3_info['article_name'].'<br /> $'.$rand3_info['price'].'</span>
                </span>
            </div>';

        
    ?>
    <h1 id="belt-jump" class="article-type-header">Belts</h1>
    <?php
        include_once('db.php');

        $allArticles = fetchAllArticles($dbh);

        do {
            $rand1 = rand(0, $num_of_articles);
            $rand1_info = fetchArticleById($rand1, $dbh);    
        }while($rand1_info == false);

        do {
            $rand2 = rand(0, $num_of_articles);
            $rand2_info = fetchArticleById($rand2, $dbh);
        } while ($rand2 == $rand1 || $rand2_info == false);

        do {
            $rand3 = rand(0, $num_of_articles);
            $rand3_info = fetchArticleById($rand3, $dbh);
        } while ($rand3 == $rand1 || $rand3 == $rand2 || $rand3_info == false);




        echo '<div class="article-container">
                <span class="article-information-container">
                    <img src="'.$rand1_info['article_img_path'].'" alt="">
                    <span>'.$rand1_info['article_name'].'<br /> $'.$rand1_info['price'].'</span>
                </span>
                <span class="article-information-container">
                    <img src="'.$rand2_info['article_img_path'].'" alt="">
                    <span>'.$rand2_info['article_name'].'<br /> $'.$rand2_info['price'].'</span>
                </span>
                <span class="article-information-container">
                    <img src="'.$rand3_info['article_img_path'].'" alt="">
                    <span>'.$rand3_info['article_name'].'<br /> $'.$rand3_info['price'].'</span>
                </span>
            </div>';

        
    ?>
    <a href="#top-jump">jump to top</a>
</section>