<?php
    $vektor = ['Johan' => 33, 'Kalle' => 21, 'Dag' => 'Fredag'];

    echo $vektor['Johan'] . '<br>';

    foreach($vektor as $key => $value){
        if ($key == 'Dag'){
            unset($vektor[$key]);
        }
        //echo $key . ' => ' . $value . '<br>';
    }

    print_r($vektor);


?>