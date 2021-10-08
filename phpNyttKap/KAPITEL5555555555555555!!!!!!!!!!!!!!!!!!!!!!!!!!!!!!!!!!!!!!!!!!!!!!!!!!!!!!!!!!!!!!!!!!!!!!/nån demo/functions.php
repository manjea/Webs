<?php
    function sanitize($x){
        $data = trim($x);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    }



?>