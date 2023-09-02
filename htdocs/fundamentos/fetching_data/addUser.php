<?php

    require 'displayErrorsConfig.php';
    require 'dbconfig.php';
    require 'utils.php';
    

    if(!empty($_POST)) {

        $eMail = testInput(filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL));
        $password = testInput(filter_input(INPUT_POST,'password'));

        //Método menos seguro:

        // $pdo->query("INSERT INTO usuarios (email, senha) VALUES ('$eMail', '$password')");

        //Método mais seguro:

        $sql = $pdo->prepare("INSERT INTO usuarios (email, senha) VALUES (:email, :senha)");
        $sql->bindValue(':email', $eMail);
        $sql->bindValue(':senha', $password);
        $sql->execute();

    }
    

    header("location: index.php");