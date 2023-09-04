<?php

function testInput($data) {
    $data = stripslashes($data);
    $data = trim($data);
            
    return $data;
}