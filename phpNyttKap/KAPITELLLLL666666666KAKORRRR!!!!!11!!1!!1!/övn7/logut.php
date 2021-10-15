

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>du har loggats ut</p>
    <a href="loggedIn.php"> tillbaka :)</a>
</body>
</html> 
<?php
    session_start();

    $_SESSION['loggedIn'] = 0;


?>