<?php   
    //Load Config File
    require_once 'config/Config.php';
    //Load Helpers
    require_once 'helpers/url_helper.php';
    require_once 'helpers/session_helper.php';
    //Autoload for Libraries
    spl_autoload_register(function($className) {
        require_once 'libraries/' . $className . '.php';
    });