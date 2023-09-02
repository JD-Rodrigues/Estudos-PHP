<?php

    require 'displayErrorsConfig.php';
    require 'dbconfig.php';
    require 'utils.php';

    if(!empty($_POST)) {

        $eMail = testInput(filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL));
        $password = testInput(filter_input(INPUT_POST,'password'));

        $pdo->query("INSERT INTO usuarios (email, senha) VALUES ('$eMail', '$password')");
        
    }
    

    header("location: index.php");