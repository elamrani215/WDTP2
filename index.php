<?php
require_once('config/config.php');
require_once('librairie/core.php');

// Récupérer le nom du contrôleur et la fonction depuis l'URL ou utiliser les valeurs par défaut
$controller = isset($_REQUEST['controller']) ? safe($_REQUEST['controller']) : $config['default_controller'];
$function = isset($_REQUEST['function']) ? safe($_REQUEST['function']) : $config['default_function'];

$controller_file = "controllers/".ucfirst($controller)."Controller.php";
// Vérifier l'existence du fichier du contrôleur
if(!file_exists($controller_file)){

    // Traitement de l'erreur si le fichier n'existe pas
    trigger_error('Invalid controller');
    echo 'Invalid controller '.$controller;
    exit;
}

require_once($controller_file);
$controller_function = strtolower($function);

// Vérifier l'existence de la fonction dans le contrôleur
if(!function_exists($controller_function)){

    // Traitement de l'erreur si la fonction n'existe pas
    trigger_error('Invalid function');
    echo 'Invalid function '.$function;
    exit;
}

// Appeler la fonction du contrôleur
call_user_func($function, $_REQUEST);

?>
