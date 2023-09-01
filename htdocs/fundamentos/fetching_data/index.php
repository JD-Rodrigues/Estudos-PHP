<?php

    
    require 'displayErrorsConfig.php';
    require 'dbconfig.php';
    
    $query = $pdo->query('SELECT * FROM usuarios');
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    echo '<pre>';
    print_r($data);
    

?>