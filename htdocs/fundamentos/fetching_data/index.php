<?php
    
    require 'displayErrorsConfig.php';
    require 'dbconfig.php';
    require 'getUsers.php';
    

    $users = $usersData->fetchAll(PDO::FETCH_ASSOC);

    echo '<pre>';

    print_r($users);   
    
?>