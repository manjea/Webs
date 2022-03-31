<?php
    try{
        include_once("db.php");
        if(isset($_GET['id'])){
            $id = $_GET['id'];
         
            $sql = "SELECT Name, Population, ID FROM city WHERE ID LIKE '$id'"; 

            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
    catch (PDOException $e)
    {
        echo("Anslutningen misslyckades: " . $e->getMessage());
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table{
        border: 1px solid black;
    }
    tr{
        border: 1px solid black;
    }
    th{
        border: 1px solid black;
        padding: 5px;
    }
    td{

        border: 1px solid black;
        padding: 5px;
    }
    td>*{
        display:flex;
        justify-content: center;
    }
</style>
<body>
    <h1>Är du säker på att du vill radera följande?</h1>
    <table>
        <th>Name</th>
        <th>Population</th>
        <th>ID</th>
        <tr>
            <td> <?php echo $row['Name']; ?></td>
            <td> <?php echo $row['Population']; ?></td>
            <td> <?php echo $row['ID']; ?></td>
        </tr>
    </table>
    <br/>
    <form action="deleteCity.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
        <input type="submit" value="Radera" name="delete">
        <input type="submit" value="Avbryt" name="cancel">
    </form>
</body>
</html>