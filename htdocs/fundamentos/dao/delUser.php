<?php

    require 'displayErrorsConfig.php';
    require('dbconfig.php');
    require 'dao/UserDaoMySQL.php';

    $id = $_GET['id'];

    if($id) {        
        
        $userDaoMySql = new UserDaoMySQL($pdo);
        $userDaoMySql->delete($id);
        
    }

    header('location: index.php');
    exit;