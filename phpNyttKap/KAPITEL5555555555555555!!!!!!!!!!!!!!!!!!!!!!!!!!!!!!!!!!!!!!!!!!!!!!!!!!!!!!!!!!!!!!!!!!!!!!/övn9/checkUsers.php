<?php
require('users.php');
require('func.php');
    if(isset($_POST['sub'])){
        $anvn = $_POST['anvn'];
        $lös = $_POST['lös'];

        $anvn = cleanData($anvn, true);
        $lös = cleanData($lös);



        foreach ($users as $key => $value) {
            if($anvn == $key){
                if ($lös == $value) {
                    header('Location: usersPage.php' . "?anvn={$key}");
                }
            }
        }
        $errorStr = 'ogiltiga inmatningar';
        header('Location: php.php' . "?somedata={$errorStr}");

    }



?>