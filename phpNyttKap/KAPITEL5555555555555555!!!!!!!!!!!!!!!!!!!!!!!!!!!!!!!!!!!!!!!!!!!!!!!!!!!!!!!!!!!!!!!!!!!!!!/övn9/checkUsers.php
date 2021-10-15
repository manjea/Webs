<?php
require('users.php');
require('func.php');
    if(isset($_POST['sub'])){
        $anvn = $_POST['anvn'];
        $lös = $_POST['lös'];

        $anvn = cleanData($anvn, true);
        $lös = cleanData($lös);

        $correct = false;



        foreach ($users as $key => $value) {
            if($anvn == $key && $lös == $value)
            {
                header('Location: usersPage.php' . "?anvn={$key}");
                while (true){
                    echo 'hej';
                }
                $correct = true;
            }

        }
        
        //if ()
        $errorStr = 'ogiltiga inmatningar';
        header('Location: php.php' . "?somedata={$errorStr}");

    }



?>