<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="register.php" method="post">
        <label for="forn">Förnamn:</label><br>
        <input type="text" name="forn" id="forn" required><br>
        <label for="eftn">Efternamn:</label><br>
        <input type="text" name="eftn" id="eftn" required><br>
        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" required><br>
        <br>
        <input type="submit" value="submit!!" name="sub">
    </form>
    <?php
        require('functions.php');


        if(isset($_COOKIE['forn']) && isset($_COOKIE['eftn']) && isset($_COOKIE['email'])){
            $forn = $_COOKIE['forn'];
            $eftn = $_COOKIE['eftn'];
            skadlig($forn);
            skadlig($eftn);
            echo 'ojsan här vart det ju någon som var registrerad, den hette ' . $forn . " " . $_COOKIE['eftn'] . "<br>";
            echo '<a href="kopvara.php">Köp vara</a><br>';
        }
        if(isset($_COOKIE['totalt'])){
            echo '<a href="utcheck.php">Utcheckning</a>';
        }



    ?>
</body>
</html>