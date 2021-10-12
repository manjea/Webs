<?php
    setcookie("testkaka1", "test1", time() + 60, "/");

    setcookie("testkaka2", "test2", strtotime("+1 day"), "/");

    

    if(isset($_COOKIE['testkaka1'])){
        foreach ($_COOKIE as $name => $value) {
            echo $name . " " . $value . '<br>';
        }
    }

    // if(count($_COOKIE) > 0){
    //     echo "kakor tillåtna";
    // }
    $text = $_POST['t'];
    setcookie('user', $text, time() + 3600, "/");
    header('Location: form.php');
?>