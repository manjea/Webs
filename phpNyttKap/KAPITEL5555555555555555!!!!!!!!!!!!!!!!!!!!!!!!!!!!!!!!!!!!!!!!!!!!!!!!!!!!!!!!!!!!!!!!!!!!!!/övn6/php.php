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
        bredd: <input type="number" name="width" id="" required>
        <br>
        längd: <input type="number" name="length" id="" required>
        <br>
        <input type="submit" value="CalcArea" name="sub">

    </form>
</body>
</html>


<?php
    if(isset($_POST['sub'])){
        $length = $_POST['length'];
        $width = $_POST['width'];
        echo calcArea($length, $width);
    }

    function calcArea($len, $wid){
        $area = $wid * $len;
        if($len != $wid){
            return "Area för rektangel längd:{$len}, bredd:{$wid} == {$area}";
        }else{
            return "Area för fyrkant längd:{$len}, bredd:{$wid} == {$area}";
        }
        

    }


?>