<section id="main">
<!-- lite style -->
    <style>  
        .bigSpanContainerForReciept{
            
            display: flex;
            flex-direction: column;
        }
        .kvittoContainer{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 20%;
            border: 1px solid black;
        }
    </style>

    <?php
        if (session_status() == PHP_SESSION_NONE) { 
            session_start(); 
        }

        if(!isset($_SESSION['user_id'])){
            header('Location: index.php?page=login');
        }
        try {
            include_once('db.php');
            $dbh = connectToDB();
        } catch (\Throwable $th) {
            echo 'Det gick inte att ansluta till databasen för tillfället!';
            $dbh = null;
        }

    ?>

    <?php
        $index = 1;
        
        $stmt1 = getAllOrders($dbh, $_SESSION['user_id']); //vi hämtar alla orders som hör till user:n

        while($rad = $stmt1->fetch(PDO::FETCH_ASSOC)) // för varje order hämtar vi alla reciepts och skriver ut dem
        {
            $stmt = getRecieptsToPrint($dbh, $rad['order_id']); 
            echo '<p class="kvittoContainer">';

            echo 'Kvitto: ' . $index . '<br /><br />';


            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $articleRow = fetchArticleById($row["article_id"], $dbh);

                echo '<span class="bigSpanContainerForReciept"><span class="article_nameSpan">' . $articleRow["article_name"] . '</span><span class="reciept_summaSpan">' .'$'. $row["reciept_summa"] . '</span></span>';
                echo '<br />';
            }
            //vi stänger $stmt objektet för att kunna utföra fler PDO funktioner.
            $stmt->closeCursor();
            echo '<br />';
            echo 'summa: $' . $rad['summa'];
            echo '</p>';
            echo '<br /><br /><br />';
            $index++; //vi har en index för att kunna få ordning på kvittona.
        }
    ?>
    

</section>