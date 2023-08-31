<?php
    spl_autoload_register(function($class){
        
        if(file_exists('classes/formulas/'.$class.'.php')){
            require 'classes/formulas/'.$class.'.php';
        } else {
            echo "O arquivo não existe";
        }
        
        
    });