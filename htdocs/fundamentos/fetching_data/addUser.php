<?php

    require 'displayErrorsConfig.php';
    require 'dbconfig.php';
    require 'utils.php';
    

    if(!empty($_POST)) {

        $eMail = testInput(filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL));
        $password = testInput(filter_input(INPUT_POST,'password'));

        $emailAlreadyExists = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $emailAlreadyExists->bindValue(':email', $eMail);
        $emailAlreadyExists->execute();

        if($emailAlreadyExists->rowCount() === 0) {
            //Método menos seguro:

            // $pdo->query("INSERT INTO usuarios (email, senha) VALUES ('$eMail', '$password')");

            //Método mais seguro:

            $sql = $pdo->prepare("INSERT INTO usuarios (email, senha) VALUES (:email, :senha)");
            $sql->bindValue(':email', $eMail);
            $sql->bindValue(':senha', $password);
            $sql->execute();
            header("location: index.php");
        } else {
            header("location: signupForm.php");
        }        

    }

    