<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <p>
            gissning: <br>
            <input type="number" name="guess" id="" required>
        </p>
        <input type="submit" value="Gissa" name="hej">
    </form>
    <?php

        $number = $_GET['number'];
        $gissningar = (int)$_GET['gissningar'];
        echo "gissningar: ".$gissningar;
        if($_POST['guess'] == $number){
            echo "yey du gissade rätt";
        }


        echo "antal gissningar: " . $gissningar;
        Header("Location: php2.php?number=".$number."&gissningar=".$gissningar++);

    ?>
</body>
</html>