<?php

    require 'displayErrorsConfig.php';
    require('dbconfig.php');

    if(isset($_GET)) {
        $id = $_GET['id'];
        
        $preparedDeletion = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
        $preparedDeletion->bindValue(':id', $id);
        $preparedDeletion->execute();

        header('location: index.php');
    }