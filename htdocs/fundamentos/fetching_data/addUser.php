<?php

    require 'dbconfig.php';

    $eMail = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST,'password');

    $pdo->query("INSERT INTO usuarios (email, senha) VALUES ('$eMail', '$password')");

    header("location: index.php");