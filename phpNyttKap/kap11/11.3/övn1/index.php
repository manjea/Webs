<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_GET['update'])){
            echo "Uppdaterat och klart!";
        }
        
        if(isset($_GET['delete'])){
            echo "Borttaget och klart!";
        }
        
        if(isset($_GET['cancel'])){
            echo "Avbrytet och klart!";
        }
    ?>
    <form action="searchCities.php" method="post">
        <input type="text" name="value" id="search">
        <input type="submit" value="search" name="search">
    </form>
</body>
</html>