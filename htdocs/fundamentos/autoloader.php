<?php
    spl_autoload_register(function($class){
        
        $dir =  __DIR__ . "/classes/";
        $file = $dir . str_replace("\\", "/", $class) . ".php";
        
        if(file_exists($file)){
            require $file;
        } else {
            echo "O arquivo" . $file . "não foi encontrado.";
        }
        
    });