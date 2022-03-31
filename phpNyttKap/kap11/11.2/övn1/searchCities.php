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

<?php
    if(isset($_POST['search'])){
        try
        {
            include_once("db.php");

            $a = $_POST["value"];

            /* Skapar en förfrågan */
            $sql = "SELECT Name, Population, ID FROM city WHERE Name LIKE '$a%' ORDER BY Name";
            /* Förbereder förfrågan till databasen */
            $stmt = $dbh->prepare($sql);
            /* Skickar förfrågan till databasen */
            $stmt->execute();
            /* Skriver ut resultatet på webbsidan */
            echo "<table>";
            echo "<th>Stad</th>";
            echo "<th>Population</th>";
            echo "<th>Standardized Header</th>";
            if ($stmt->rowCount() > 0) { 
                while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    echo "<tr><td>" . $row["Name"]."</td>";
                    echo "<td>".$row["Population"]."</td>";
                    echo '<td><a href="editCity.php?id='.$row["ID"].'" >Redigera</a></td></tr>';
                }
            }else{
                echo "det fanns inga sökträffar";
            }
            echo "</table>";
            
        }
        catch (PDOException $e)
        {
            echo("Anslutningen misslyckades: " . $e->getMessage());
        }
    }
?>