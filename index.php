<?php
//session_start();
require_once('config.php');

/**
 * Sempre que uma classe for instanciada o 
 * Autoload que buscará e carregará automaticamente a classe.
 */
spl_autoload_register(function($class) {
    if(file_exists('controllers/' . $class . '.php')) {
        require_once('controllers/' . $class . '.php');
    } 
    else if (file_exists('models/' . $class . '.php')) {
        require_once('models/' . $class . '.php');
    }
    else if (file_exists('core/' . $class . '.php')){
        require_once('core/' . $class . '.php');
    }
});

$core = new Core();
$core->run();