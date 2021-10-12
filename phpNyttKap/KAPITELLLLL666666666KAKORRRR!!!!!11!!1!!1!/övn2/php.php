<?php

    setcookie('username', 'user1', time() + 86400, '/');

    if(isset($_COOKIE['username'])){
        echo "Kakan: username är lagrad" . '<br>' . "Väret är: {$_COOKIE["username"]}";
    }else{
        echo 'kakan finns inte';
    }


?>