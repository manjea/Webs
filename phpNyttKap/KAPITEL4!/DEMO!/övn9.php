<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" style="width: min-content;">
        <fieldset>
            <legend>Formulär</legend>
            <label for="input">Skriv in dina intressen. Skilj dom åt med kommatecken.</label><br>
            <input type="text" name="values" id="input" placeholder="Intressen" required>
            <br><br>
            <input type="submit" value="SUBMIT" name="SUBMITkanske">
        </fieldset>
    </form>

    <?php
        if(isset($_POST['SUBMITkanske'])){
            $value = $_POST['values'];
            $valueVektor = explode(',', $value);

            echo 'Du har ' . count($valueVektor) . ' intressen:' . '<br>';
            foreach($valueVektor as $values){
                echo $values;
                if($values != $valueVektor[count($valueVektor) -1]){
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