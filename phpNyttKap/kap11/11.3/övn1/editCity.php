<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <?php
        if(isset($_GET['id'])){
            try{
                include_once("db.php");

                $id = $_GET['id'];

                $sql = "SELECT Name, Population, ID FROM city WHERE ID LIKE '$id' ORDER BY Name";

                $stmt = $dbh->prepare($sql);
                $stmt->execute();
    
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            catch (PDOException $e)
            {
                echo("Anslutningen misslyckades: " . $e->getMessage());
            }
        }
    ?>
    <form action="updateCity.php" method="post">
        <h1><?php echo $row['Name']; ?></h1>


        Antal Invånare: <input type="text" name="inv" id="inv" value=<?php echo '"'.$row['Population'].'"'; ?> required>
        <br><br>
        <input type="hidden" name="id" value=<?php echo '"'.$id.'"' ?>>
        <input type="submit" value="Uppdatera" name="sub">


    </form>
</body>
</html>