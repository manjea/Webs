<?php
    if(isset($_POST['search'])){
        try
        {
            include_once("db.php");

            $a = $_POST["value"];

            /* Skapar en förfrågan */
            $sql = "SELECT Name, Population FROM city WHERE Name LIKE '$a%' ORDER BY Name";
            /* Förbereder förfrågan till databasen */
            $stmt = $dbh->prepare($sql);
            /* Skickar förfrågan till databasen */
            $stmt->execute();
            /* Skriver ut resultatet på webbsidan */

            if ($stmt->rowCount() > 0) { 
                while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    echo "<strong>Land:</strong>" . $row["Name"];
                    echo "<strong>Antal invånare: </strong>".$row["Population"];
                    echo "<br /><hr />";
                }
            }else{
                echo "det fanns inga sökträffar";
            }
            
        }
        catch (PDOException $e)
        {
            echo("Anslutningen misslyckades: " . $e->getMessage());
        }
    }
?>