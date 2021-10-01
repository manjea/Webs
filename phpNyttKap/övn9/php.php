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
            slumptal från: <br>
            <input type="number" name="from" id="" required>
        </p>
        <p>
            slumptal till: <br>
            <input type="number" name="to" id="" required>
        </p>
        <input type="submit" value="Gå vidare?" name="hej">
    </form>
    <?php
        if(isset($_POST["hej"])){
            $from = $_POST["from"];
            $to = $_POST["to"];

            if(is_numeric($from)){

                if($from > $to){
                    echo "startvärdet är större än slutvärdet.";
                }
                else{
                    $number = rand($from, $to);
                    echo $number;
                    header("Location: php2.php?number=".$number."&gissningar=1");
                }
            }
            else
            {
                echo "någon av de angivna värdena är inte en integer.";
            }

            
        }
        
        
    ?>
</body>
</html>