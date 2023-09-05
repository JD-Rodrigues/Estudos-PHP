<?php
    require 'displayErrorsConfig.php';
    require 'dbconfig.php';
    require 'utils.php';
    require 'dao/UserDaoMySQL.php';

    $eMail = testInput(filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL));
    $password = testInput(filter_input(INPUT_POST,'password'));

    if($eMail && $password){
        $id = $_GET['id'];

        $userObject = new User();
        $userObject->setEmail($eMail);
        $userObject->setPassword($password);
        $userObject->setId($id);

        $userDaoMySql = new UserDaoMySQL($pdo);
        $userDaoMySql->update($userObject);

        header('location: index.php');
        exit;
        
    }else{
        echo "Nenhum dado foi enviado";
    }