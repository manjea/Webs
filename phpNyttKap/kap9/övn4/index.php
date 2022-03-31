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
            <legend>övn4</legend>

            <textarea style="resize: none;" name="txt" id="txt" cols="30" rows="10"></textarea>

            <input type="submit" name="s" value="Submit">
        </fieldset>
    </form>

    <?php
        if(isset($_POST['s'])){
            $txt = $_POST['txt'];

            if(file_exists($txt)){
                $file = fopen($txt, 'r') or die('No file');

                echo fread($file, filesize($txt));

                fclose($file);
            }
            
        }
        
    ?>
</body>
</html>