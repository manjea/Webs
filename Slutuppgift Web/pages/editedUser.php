<?php
    if(!isset($_SESSION['admin'])){
        header('Location: index.php');
    }

    try {
        include_once('db.php');

        $dbh = connectToDB();
    } catch (\Throwable $th) {
        echo 'Kan inte ansluta till databasen för tillfället!';
    }

?>
<section id="main">
    <?php
        $error = true;
        if(isset($_POST['submit'])){
            if (session_status() == PHP_SESSION_NONE) { 
                session_start(); 
            }
            $register_result = editCustomer($dbh, $_POST['user_id']);
            
            if($register_result){ //om editCustomer returnerar true betyder det att det gick att redigera användaren
                $error = false;
            }
            
        }

        if($error){
            echo 'Something went wrong';
        } else{
            echo 'Your edited succesfully';
            $row = getUserById($dbh, $_POST['user_id']); //vi skriver ut det redigerade användaren


            echo '<span>' . $row["firstname"] . ' ' . $row['lastname'] .' '. $row['mail'] .' '. '<a href="index.php?page=editUser&userId=' . $row['user_id'] . '">EditAgain</a>' . '</span>';
            echo '<br />';

        }
    ?>


</section>