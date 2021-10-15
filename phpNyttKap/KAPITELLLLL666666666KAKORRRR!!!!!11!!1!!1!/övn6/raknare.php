<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="checkbox" name="check" id="">
        <input type="submit" value="räkna">

    </form>
    <?php
        session_start();

        if(!isset($_SESSION['ggr']) || isset($_POST['check'])){
            $_SESSION['ggr'] = 0;
        }
        else{
            $_SESSION['ggr'] += 1;
        }
        echo $_SESSION['ggr'];

    ?>
</body>
</html>