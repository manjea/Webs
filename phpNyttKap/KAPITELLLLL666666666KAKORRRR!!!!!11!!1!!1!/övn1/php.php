<?php

    setcookie('testakaka', 'ärkakortillåtna', time() + 3600, '/');
    if(isset($_COOKIE['testakaka'])){
        echo "kakor är tillåtna";
    }

?>