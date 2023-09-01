<?php

    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    require 'dbconfig.php';

    
    $query = $pdo->query('SELECT * FROM usuarios');
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    echo '<pre>';
    print_r($data);
    print_r($data[1]["senha"]); 
    

?>