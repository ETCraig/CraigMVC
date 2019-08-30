<?php   
    //Load Config File
    require_once 'config/Config.php';
    //Autoload for Libraries
    spl_autoload_register(function($className) {
        require_once 'libraries/' . $className . '.php';
    });