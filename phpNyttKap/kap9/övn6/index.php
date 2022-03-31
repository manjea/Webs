<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
        

    </style>
    <title>Document</title>
</head>
<body>
    <?php

        $jsonEncoded = file_get_contents('cars.json');
        $jsonDecoded = json_decode($jsonEncoded, true);

        $cars = $jsonDecoded["Cars"];

        foreach ($cars as $key => $value) {
            foreach ($value as $key => $value) {
                echo $key . '<br>';
            }
            //echo print_r($value) . "<br>";
        }
    ?>
    <div class="container flex-parent">
        <!-- car1 -->
        <div class="box"> <span></span><?php echo array_values($cars[0])[0] ?> </div>
        <div class="box"> <?php echo array_values($cars[0])[1] ?> </div>
        <div class="box"> <?php echo array_values($cars[0])[2] ?> </div>
        <!-- car2 -->
        <div class="box"> <?php echo array_values($cars[1])[0] ?> </div>
        <div class="box"> <?php echo array_values($cars[1])[1] ?> </div>
        <div class="box"> <?php echo array_values($cars[1])[2] ?> </div>
        <!-- car3 -->
        <div class="box"> <?php echo array_values($cars[2])[0] ?> </div>
        <div class="box"> <?php echo array_values($cars[2])[1] ?> </div>
        <div class="box"> <?php echo array_values($cars[2])[2] ?> </div>
    </div>
</body>
</html>