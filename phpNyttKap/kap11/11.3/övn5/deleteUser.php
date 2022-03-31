<?php
    if(isset($_POST['delete'])){
        try{
            include_once("db.php");
            $id = $_POST['id'];
            
            $sql = "DELETE FROM updateuser WHERE id LIKE '$id'"; 

            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            header("Location: index.php?delete=true");
        
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