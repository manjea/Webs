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
        if(isset($_COOKIE['totalt'])){
            echo "En faktura på {$_COOKIE['totalt']} kr skickas till {$_COOKIE['email']} <br>";
            echo '<a href="index.php">Tillbaka</a>';
            setcookie('totalt', 'hejsan', time(), "/");
            setcookie(
                'email',
                'hejsan',
                time(),
                "/"
            );
            setcookie(
                'forn',
                'hejsan',
                time(),
                "/"
            );
            setcookie(
                'eftn',
                'hejsan',
                time(),
                "/"
            );
        }
        
    ?>
</body>
</html>