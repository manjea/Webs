<section id="browse">
    <?php
        include_once('db.php');
        $dbh = connectToDB();
        $row = fetchAllArticles($dbh);

        do {
            $rand1 = rand(0, count($row));
            $rand1_info = fetchArticleById($rand1, $dbh);    
        }while($rand1_info == false);

        do {
            $rand2 = rand(0, count($row));
            $rand2_info = fetchArticleById($rand2, $dbh);
        } while ($rand2 == $rand1 || $rand2_info == false);

        do {
            $rand3 = rand(0, count($row));
            $rand3_info = fetchArticleById($rand3, $dbh);
        } while ($rand3 == $rand1 || $rand3 == $rand2 || $rand3_info == false);



        echo '<h1>Hetast Just Nu</h1>';
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

        echo '
        <br />
        <p>
            <a href="google.se" target="_blank">Browse More</a>
        </p>';
    ?>

</section>