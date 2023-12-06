<?php
require_once('config/config.php'); // Inclut le fichier de configuration
require_once('librairie/core.php'); // Inclut les fonctions de base de la librairie

// Récupération du nom du contrôleur et de la fonction depuis l'URL ou utilisation des valeurs par défaut
$controller = isset($_REQUEST['controller']) ? safe($_REQUEST['controller']) : $config['default_controller']; 
$function = isset($_REQUEST['function']) ? safe($_REQUEST['function']) : $config['default_function']; 

$controller_file = "controllers/" . ucfirst($controller) . "Controller.php"; // Construit le chemin du fichier du contrôleur

// Vérification de l'existence du fichier du contrôleur
if (!file_exists($controller_file)) {

    // Gestion de l'erreur si le fichier du contrôleur n'existe pas
    trigger_error('Invalid controller'); // Déclenche une erreur
    echo 'Invalid controller ' . $controller; // Affiche un message d'erreur
    exit(); // Arrête l'exécution du script
}

require_once($controller_file); // Inclut le fichier du contrôleur
$controller_function = strtolower($function); // Prépare le nom de la fonction en minuscules

// Vérification de l'existence de la fonction dans le contrôleur
if (!function_exists($controller_function)) {

    // Gestion de l'erreur si la fonction n'existe pas dans le contrôleur
    trigger_error('Invalid function'); // Déclenche une erreur
    echo 'Invalid function ' . $function; // Affiche un message d'erreur
    exit(); // Arrête l'exécution du script
}

// Appel de la fonction du contrôleur avec les paramètres de la requête
call_user_func($function, $_REQUEST); 
?>


