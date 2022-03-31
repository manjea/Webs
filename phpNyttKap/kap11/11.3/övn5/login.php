<?php
    if(isset($_POST['login'])){
        try
        {
            session_start();
            include_once("db.php");

            $uname = $_POST["uname"];
            $password = $_POST["pass"];

            $sql = "SELECT uname, email, pword FROM updateuser WHERE uname LIKE '$uname' OR email LIKE '$uname'";

            $stmt = $dbh->prepare($sql);

            $stmt->execute();

            if ($stmt->rowCount() > 0) { 
                while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    if(password_verify($password, $row['pword'])){
                        $_SESSION['loggedIn'] = true;
                        break;
                    }
                }
            }else{
                echo "nope";
            }
        }
        catch (PDOException $e)
        {
            echo("Anslutningen misslyckades: " . $e->getMessage());
        }
    }
    header("Location: index.php?n=". $uname);

?>