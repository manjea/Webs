<?php 
try 
{ 
    if(isset($_POST["firstName"], $_POST["surName"], $_POST["userName"], $_POST["pwd"])) 
    { 
        include_once("db.php"); 

        $fname = filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_STRING); 
        $sname = filter_input(INPUT_POST, "surName", FILTER_SANITIZE_STRING); 
        $user = filter_input(INPUT_POST, "userName", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
        $pwd = password_hash($_POST["pwd"], PASSWORD_DEFAULT); 

        $sql = "INSERT INTO teoridokumentetstabell (fname, sname, uname, password) 
        VALUES(:fn, :sn, :user, :pwd)"; 

        // Förbereder förfrågan till databasen 
        $stmt= $dbh->prepare($sql); 

        // Binder ihop behållarna med informationen från formuläret 
        $stmt->bindValue(":fn", $fname); 
        $stmt->bindValue(":sn", $sname); 
        $stmt->bindValue(":user", $user); 
        $stmt->bindValue(":pwd", $pwd); 

        // OM INSERT gick bra. Om användarnamnet är upptaget fungerar inte Insert 
        if($stmt->execute()) 
        { 
            echo "<p>Användaren har lagts till!</p>"; 
        } 
        else 
        { 
            echo "<p>Kunde inte lägga till användaren. Kontrollera användarnamnet!</p>"; 
        } 
    } 
} 
catch (PDOException $e) 
{ 
    echo("Anslutningen misslyckades: " . $e->getMessage()); 
} 

?>