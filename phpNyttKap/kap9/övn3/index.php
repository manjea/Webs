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
            <legend>TELEFON KATALOG</legend>

            <label for="fnamn">Fnamn</label>
            <input type="text" name="fnamn" id="fnamn" required>

            <input type="submit" name="s" value="Submit">
        </fieldset>
    </form>

    <?php
        if(isset($_POST['s'])){
            $fnamn = filter_input(INPUT_POST, 'fnamn', FILTER_SANITIZE_STRING);
            $fnamn = $_POST['fnamn'];

            if(file_exists('Telefonkatalog.txt')){
                $file = fopen('Telefonkatalog.txt', 'r') or die('No file');
                //$file_content = fread($file, filesize('Telefonkatalog.txt'));
                //sleep(5);
                while(!feof($file)){
                    if(strpos(fgets($file), $fnamn) !== false){
                        echo 'ehsjan'/*fgets($file)*/;
                    }
                    
                }

                fclose($file);
            }
            
        }
        
    ?>
</body>
</html>