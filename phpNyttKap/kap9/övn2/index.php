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

            <label for="fnamn">Fnamn</label>
            <input type="text" name="fnamn" id="fnamn" required>

            <label for="enamn">Enamn</label>
            <input type="text" name="enamn" id="enamn" required>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>

            <textarea name="txt" id="" cols="30" rows="10"></textarea>

            <input type="submit" name="s" value="Submit">
        </fieldset>
    </form>

    <?php
        if(isset($_POST['s'])){
            if(isset($_POST['txt'])){
                $file = fopen('file.txt', 'a') or die('die');

                $fnamn = filter_input(INPUT_POST, 'fnamn', FILTER_SANITIZE_STRING);
                $enamn = filter_input(INPUT_POST, 'enamn' , FILTER_SANITIZE_STRING);
                $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
                $text = filter_input(INPUT_POST, 'txt', FILTER_SANITIZE_STRING);

                $final_string = "$fnamn $enamn $email <br> $text <br>";

                fputs($file, $final_string);
                fclose($file);
            }
        }
        if(file_exists('file.txt')){
            $file = fopen('file.txt', 'r') or die('No file');
            echo fread($file, filesize('file.txt'));
            fclose($file);
        }
        

        // $fil = fopen("file.txt","w") or die("Kunde inte öppna fil"); 
        // $text = "Hej hopp!"; 
        // fputs($fil, $text); 
        // fclose($fil); 
        // echo "Texten $text har skrivits till fil."; 
        
    ?>
</body>
</html>