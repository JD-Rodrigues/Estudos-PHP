<?php

    require 'displayErrorsConfig.php';
    require 'dbconfig.php';
    require 'utils.php';
    require 'dao/UserDaoMySQL.php';

    if(!empty($_POST)) {

        $eMail = testInput(filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL));
        $password = testInput(filter_input(INPUT_POST,'password'));

        $emailAlreadyExists = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $emailAlreadyExists->bindValue(':email', $eMail);
        $emailAlreadyExists->execute();

        if($emailAlreadyExists->rowCount() === 0) {

            $userObject = new User();
            $userObject->setEmail($eMail);
            $userObject->setPassword($password);

            $userDaoMySql = new UserDaoMySQL($pdo);
            $userDaoMySql->add($userObject);

            
            header("location: index.php");
            exit;
        } else {
            header("location: signupForm.php");
            exit;
        }        

    }

    