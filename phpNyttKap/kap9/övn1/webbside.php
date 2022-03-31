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
        <fieldset style="width: min-content;">
            <legend>LEGEND</legend>

            <textarea name="txt" id="" cols="30" rows="10"></textarea>

            <input type="submit" name="s" value="Submit">
        </fieldset>
    </form>

    <?php
        if(isset($_POST['s'])){
            if(isset($_POST['txt'])){
                $file = fopen('file.txt', 'a') or die('hejsan');
                $text2 = filter_input(INPUT_POST, 'txt', FILTER_SANITIZE_STRING);
                fputs($file, $text2);
                fclose($file);
                // file_put_contents()
            }
        }

        // $fil = fopen("file.txt","w") or die("Kunde inte öppna fil"); 
        // $text = "Hej hopp!"; 
        // fputs($fil, $text); 
        // fclose($fil); 
        // echo "Texten $text har skrivits till fil."; 
        
    ?>
</body>
</html>