<?php
    require 'displayErrorsConfig.php';
    require 'dbconfig.php';

    $preparedUsers = $pdo->prepare('SELECT * FROM usuarios');
    $preparedUsers->execute();