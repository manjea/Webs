<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <?php
        try{
            include_once("db.php");


            if(isset($_POST['inv'])){
                $inv = $_POST['inv'];
                $id = $_POST['id'];

                $sql = "UPDATE city SET Population = :p WHERE ID  = :id"; 
    
                $stmt = $dbh->prepare($sql); 
                
                $stmt->bindValue(":p", $inv); 
                $stmt->bindValue(":id", $id); 
                $stmt->execute();


                echo $inv;
                echo "<br>";
                echo $id;
                //header("Location: index.php?update=true"); 
            } 
            else 
            { 
                //header("Location: index.php"); 
            } 
        }
        catch (PDOException $e)
        {
            echo("Anslutningen misslyckades: " . $e->getMessage());
        }
    ?>
</body>
</html>