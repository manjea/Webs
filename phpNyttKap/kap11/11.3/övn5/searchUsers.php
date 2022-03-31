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
            $sql = "SELECT uname, email, id FROM updateuser WHERE uname LIKE '$a%' ORDER BY uname";
            /* Förbereder förfrågan till databasen */
            $stmt = $dbh->prepare($sql);
            /* Skickar förfrågan till databasen */
            $stmt->execute();
            /* Skriver ut resultatet på webbsidan */
            echo "<table>";
            echo "<th>Username</th>";
            echo "<th>Email</th>";
            echo "<th colspan=2>Åtgärd</th>";
            if ($stmt->rowCount() > 0) { 
                while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    echo "<tr><td>" . $row["uname"]."</td>";
                    echo "<td>".$row["email"]."</td>";
                    echo '<td><a href="confirmDelete.php?id='.$row["id"].'">Delete</a></td>';
                    echo '<td><a href="editUser.php?id='.$row["id"].'">Redigera</a></td></tr>';
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