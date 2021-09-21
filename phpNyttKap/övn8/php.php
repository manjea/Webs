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
        <p>
            gissning: <br>
            <input type="number" name="guess" id="" required>
        </p>
        <input type="submit" value="Gissa" name="hej">
    </form>
    <?php
        if(isset($_POST["hej"])){
            $from = (int)$_POST["from"];
            $to = (int)$_POST["to"];
            $guess = (int)$_POST["guess"];

            if(!is_int($from) && !is_int($to)&&!is_int($guess)){
                echo "någon av de angivna värdena är inte en integer.";
            }
            else
            {
                if($from > $to){
                    echo "startvärdet är större än slutvärdet.";
                }
                else{
                    if($guess > $to || $guess < $from){
                        echo "nu gissade du lite knasigt.";
                    }else{
                        $number = rand($from, $to);
                        if($guess < $number){
                            echo "för lågt";
                        }else if($guess > $number){
                            echo "för högt";
                        }else{
                            echo "rätt";
                        }
                        echo "<br>";
                        if(!$guess == null){
                            echo "Du gissade på " . $guess . "<br>";
                        }
                        if(!$number == null){
                            echo "Svaret var " . $number . "<br>";
                        }
                    }
                }
            }
        }
    ?>
</body>
</html>