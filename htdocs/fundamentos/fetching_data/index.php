<?php
    
    require 'displayErrorsConfig.php';
    require 'getUsers.php';
    
    $users = $preparedUsers->fetchAll(PDO::FETCH_ASSOC);
    
    echo '<pre>';

    print_r($users)
    
?>