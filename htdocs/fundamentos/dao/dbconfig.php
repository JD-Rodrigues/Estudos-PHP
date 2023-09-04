<?php
    
    $dbname = 'test';
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    
    $pdo = new PDO("mysql:dbname=$dbname;host=$host", $user, $pass);