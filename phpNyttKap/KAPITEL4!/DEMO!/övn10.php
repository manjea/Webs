<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" style="width: 30%;">
        <fieldset>
            <legend>Formulär</legend>
            <label for="input">Namn</label><br>
            <input type="text" name="namn" id="input" required>
            <br><br>
            <input type="checkbox" name="prog" id="prog"><label for="prog">Programmering</label>
            <input type="checkbox" name="musik" id="musik"><label for="musik">Musik</label>
            <input type="checkbox" name="matte" id="matte"><label for="matte">Matematik</label>
            <input type="checkbox" name="game" id="game"><label for="game">Gaming</label>
            <br><br>
            <input type="submit" value="SUBMIT" name="SUBMITkanske">
        </fieldset>
    </form>

    <?php
        if(isset($_POST['SUBMITkanske'])){
            $name = $_POST['namn'];

            $array = [];

            $prog = isset($_POST['prog']);
            $musik = isset($_POST['musik']);
            $matte = isset($_POST['matte']);
            $game = isset($_POST['game']);

            if($prog){
                array_push($array, 'programmering');
            }
            if($musik){
                array_push($array, 'musik');
            }
            if($matte){
                array_push($array, 'matte');
            }
            if($game){
                array_push($array, 'gaming');
            }
            if(substr($name, -1) == 's'){
                echo "{$name} intressen är: <br>";
            }else{
                echo "{$name}s intressen är: <br>";
            }

            foreach($array as $values){
                echo $values;
                if($values != $array[count($array) -1]){
                    echo ',<br>';
                }
            }

        }
        else{
            echo 'Skicka Formläret för att se dina intressen som du definitivt inte vet själv :)';
        }

    ?>
</body>
</html>