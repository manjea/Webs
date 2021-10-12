<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="php.php" method="POST">
        Username: <input type="text" name="t" id="" required><br>
        <input type="submit" value="SUBMIT" name="sub">
    </form>

    <?php
        if(isset($_COOKIE['user'])){
            echo 'hej ' . $_COOKIE['user'];
        }
    ?>
</body>
</html>