<?php
    include_once('config.php');
    spl_autoload_register('myLoader');

    function myLoader($className)
    {
        $modelsPath = 'models/';
        $controllersPath = 'controllers/';

        $fullModelsPath = $modelsPath . $className . '.php';
        $fullControllersPath = $controllersPath . $className . '.php';

        if (file_exists($fullModelsPath)) {
            include_once $fullModelsPath;
        } elseif (file_exists($fullControllersPath)){
            include_once $fullControllersPath;
        } else {
            return false;
        }
    }
