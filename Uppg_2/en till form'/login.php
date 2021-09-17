<?php
    header("Content-Type: text/html; charset=utf-8");

    if(!(isset($_GET['mail']) && isset($_GET['pass']))){
        echo"<script>
            alert('vad gör du här?');
        </script>";
    }else{
        
        $mail = htmlspecialchars($_GET['mail']);
        $correct = filter_var($mail, FILTER_VALIDATE_EMAIL);
        
        $pass = htmlspecialchars($_GET['pass']);
        echo "mail " . $mail;
        echo "<br>";
        echo "pass " . $pass;

        if ($correct){
            echo "<br>";
            echo "korrekt mail";
        }
        else {
            echo "<br>";
            echo "fail mail";
        }
    }
?>
