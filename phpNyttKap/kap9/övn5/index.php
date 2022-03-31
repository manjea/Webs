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
        <fieldset style="width:min-content;">
            <legend>Hejsan</legend>
            <label for="fil">File:</label><br>
            <input type="file" name="fil" id="fil" enctype="multipart/form-data" ><br> <!--accept=".txt, .dat"-->
            <input name="s" type="submit" value="submit">
        </fieldset>
    </form>
    <?php
        if(isset($_POST['s'])){
            echo print_r($_FILES) . '<br>';
            if(array_key_exists('fil', $_FILES) && array_key_exists('error', $_FILES['fil'])){
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["fil"]["name"]); 
                $uploadOk = 1; 
                $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); 
            
                // Om filen redan finns 
                if (file_exists($target_file)){ 
                    echo "Filen finns redan"; 
                    $uploadOk = 0; 
                } 

                if ($_FILES["fil"]["size"] > 500000){ 
                    echo "Filen är för stor"; 
                    $uploadOk = 0; 
                }
                
                // Tillåtna filformat 
                if($fileType != "txt"){ 
                    echo "Bara txt-filer är tillåtna"; 
                    $uploadOk = 0; 
                } 
            
                // Om något med filen är felaktigt 
                if ($uploadOk == 0){ 
                    echo "Filen har inte laddats upp"; 
                } 
                
                // Om allt är ok så laddas filen upp 
                else
                { 
                    if (move_uploaded_file($_FILES["fil"]["tmp_name"], $target_file)){ 
                        echo "Filen har laddats upp"; 
                    }
                    else{ 
                        echo "Något blev fel vid uppladdningen"; 
                    } 
                }
            }else{
                echo 'den bara skippar';
            }
        }

    ?>
</body>
</html>