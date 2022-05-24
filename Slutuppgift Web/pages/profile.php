<section id="main">

<?php
    try {
        if(isset($_SESSION['loggedIn'])){
            echo '<span><h1>Welcome ' . $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] . '</h1></span>';
        }else{
            header('Location: index.php');
        }
    
        include_once('db.php');
    
        $dbh = connectToDB();
    
        $row = getUserById($dbh, $_SESSION['user_id']);
    
        echo '<span>' . $row["firstname"] . ' ' . $row['lastname'] .' '. $row['mail'] .' '. '<a href="index.php?page=userEditUser&userId=' . $row['user_id'] . '">EditUser</a>' . '</span>';
        echo '<br />';
    } catch (\Throwable $th) {
        echo 'Det går inte att ansluta till databasen för tillfället!';
    }

?>

</section>