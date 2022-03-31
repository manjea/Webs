<?php 
    try 
    { 
        include_once("db.php"); 
    
        /* Skapar en förfrågan */ 
        $sql = "SELECT Name, Population FROM city WHERE Name LIKE 'Z%'ORDER BY Name"; 
        /* Förbereder förfrågan till databasen */ 
        $stmt = $dbh->prepare($sql); 
        /* Skickar förfrågan till databasen */ 
        $stmt->execute(); 
        /* Skriver ut resultatet på webbsidan */ 
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
        { 
            echo "<strong>Land:</strong>" . $row["Name"]; 
           echo "<strong>Antal invånare: </strong>".$row["Population"]; 
            echo "<br /><hr />"; 
        } 

    } 
    catch (PDOException $e) 
    { 
        echo("Anslutningen misslyckades: " . $e->getMessage()); 
    } 
?> 