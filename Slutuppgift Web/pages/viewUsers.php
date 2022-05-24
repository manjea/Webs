<?php
    if(!isset($_SESSION['admin'])){ //om man inte är admin, redirectas man
        header('Location: index.php');
    }

    try {
        include_once('db.php');

        $dbh = connectToDB();
    } catch (\Throwable $th) {
        echo 'Det gick inte att ansluta till databasen för tillfället!';
        $dbh = null; //fixar reference buggar
    }

?>


<section id="main">
    <!-- Lägg till formulär -->
    <?php

        $stmt = getAllUsers($dbh); //hämtar $stmt objektet som innehåller alla users

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) //för varje user, skriver vi ut data
        {
            echo '<span>' . $row["firstname"] . ' ' . $row['lastname'] .' '. $row['mail'] .' '. '<a href="index.php?page=editUser&userId=' . $row['user_id'] . '">EditUser</a>' . '</span>';
            echo '<br />';
        }
    ?>

</section>
