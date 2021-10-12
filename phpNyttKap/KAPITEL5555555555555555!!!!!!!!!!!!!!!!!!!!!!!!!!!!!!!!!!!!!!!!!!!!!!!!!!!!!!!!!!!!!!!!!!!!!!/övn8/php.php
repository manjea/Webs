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

        anvn: <input type="text" name="anvn" id="" required><br>

        lös: <input type="password" name="lös" id="" required><br>

        email: <input type="email" name="email" id="" required><br>

        <input type="submit" value="" name="sub">
    </form>

    <?php
    require('func.php');
        if(isset($_POST['sub'])){
            $anvn = $_POST['anvn'];
            $lös = $_POST['lös'];
            $email = $_POST['email'];
            
            $anvn = cleanData($anvn, true);
            $lös = cleanData($lös);

            if(!(count($anvn) < 5 || count($lös) < 8)){


            }else{
                echo "fel";
            }
       }


    ?>
</body>
</html>