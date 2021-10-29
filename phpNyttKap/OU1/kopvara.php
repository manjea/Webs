<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <label for="antal">Antal varor:</label><br>
        <input type="number" name="antal" id="antal" required><br>
        <label for="pris">Pris per vara</label><br>
        <input type="number" name="pris" id="pris" required><br>
        <br>
        <input type="submit" value="Köp!!" name="sub">
    </form>



    <?php
        if(isset($_COOKIE['email'])){
            if(isset($_POST['sub'])){
                $antal = $_POST['antal'];
                $pris = $_POST['pris'];
                if(numberCheck($antal) && numberCheck($pris)){
                    setcookie('totalt', $antal*$pris, time() + 60*60, "/");
                    echo 'Ditt köp har registrerats<br>' . '<a href="index.php">Tillbaka</a>';
                }else{
                    echo 'Felaktiga inmatningar';
                }
            }
        }
        else{
            echo 'registrera en person först!';
        }


        function numberCheck($n){
            if(!($n <= 0)){
                return true;
            }
            return false;
        }





    ?>
</body>
</html>