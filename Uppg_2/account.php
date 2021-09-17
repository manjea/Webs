<?php
    header("Content-Type: text/html; charset=utf-8");

    if(!isset($_POST['firstname'])){
        echo"<script>
            alert('vad gör du här?');
        </script>";
    }else{
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        $firstname = strtolower($firstname);
        $lastname = strtolower($lastname);
        $firstname = ucfirst($firstname);
        $lastname = ucfirst($lastname);

        $firstname = trim($firstname)
        $lastname = trim($lastname)
        $firstname = htmlspecialchars($firstname)
        $lastname = htmlspecialchars($lastname)
        $firstname = stripslashes($firstname)
        $lastname = stripslashes($lastname)

        $username = trim($username)
        $username = htmlspecialchars($username)
        $password = htmlspecialchars($password)

        echo $firstname;
    }
?>