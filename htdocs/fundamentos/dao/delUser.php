<?php

    require 'displayErrorsConfig.php';
    require('dbconfig.php');
    require 'dao/UserDaoMySQL.php';

    if(isset($_GET)) {
        $id = $_GET['id'];
        
        $userDaoMySql = new UserDaoMySQL($pdo);
        $userDaoMySql->delete($id);
        
    }

    header('location: index.php');
    exit;