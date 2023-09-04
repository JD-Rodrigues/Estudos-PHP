<?php
    require 'displayErrorsConfig.php';
    require 'dbconfig.php';
    require 'utils.php';

    if(isset($_POST)) {

        $eMail = testInput(filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL));
        $password = testInput(filter_input(INPUT_POST,'password'));
        $id = $_GET['id'];

        $userPreparedToUpdate = $pdo->prepare("UPDATE usuarios SET email = :email, senha = :password WHERE id = :id");

        $userPreparedToUpdate->bindValue(':email', $eMail);
        $userPreparedToUpdate->bindValue(':password', $password);
        $userPreparedToUpdate->bindValue(':id', $id);
        $userPreparedToUpdate->execute();

        header('location: index.php');
        exit;
        
    }else{
        echo "Nenhum dado foi enviado";
    }