<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Content-Type: application/json");

if(count($apiData)>0){
    echo json_encode($apiData);
    exit;
} else {
    echo "Nada para mostrar";
}

