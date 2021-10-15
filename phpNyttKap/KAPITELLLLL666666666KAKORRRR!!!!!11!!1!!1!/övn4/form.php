<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="show.php" method="get">
        <label for="namn">Namn:</label><br>
        <input type="text" name="namn" id="namn"><br>
        <label for="mail">Mailadress:</label><br>
        <input type="email" name="mail" id="mail"><br><br>
        <input type="submit" value="sub" name="sub">
        
    </form>
    <?php
        if(isset($_GET['namn'])){
            setcookie('namn', $_GET['namn'], time() + 86400, "/");
        }
        if(isset($_COOKIE['namn'])){
            echo "namn: " . $_COOKIE['namn'];
        }else{
            echo "<p>Fyll i formuläret för att visa ditt namn här</p>";
        }


    ?>
</body>
</html>