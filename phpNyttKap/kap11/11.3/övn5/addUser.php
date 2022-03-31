<?php
    if(isset($_POST['add'])){
        try{
            include_once("db.php");
            $uname = $_POST['uname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $sql = "INSERT INTO updateuser (uname, email, pword) VALUES ('$uname', '$email', '$password')"; 

            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            header("Location: index.php?add=true");
        
        }
        catch (PDOException $e)
        {
            echo("Anslutningen misslyckades: " . $e->getMessage());
        }
    }
    else if(isset($_POST['cancel'])){
        header("Location: index.php?cancel=true");
    }
    else{
        echo "vad gör du här?";
    }

?>