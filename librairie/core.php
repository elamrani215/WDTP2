<?php

function safe($params)
{
    // La fonction 'safe' prend un paramètre et retourne la même valeur avec des antislashs ajoutés devant certains caractères.
    // Cela est généralement utilisé pour préparer des données à être insérées dans une base de données, en évitant les injections SQL.
    return addslashes($params);
}

function render($file, $data = null)
{
    // La fonction 'render' est utilisée pour afficher une vue dans le cadre d'un modèle MVC (Modèle-Vue-Contrôleur).
    // Elle prend en paramètre le chemin d'un fichier de vue et des données optionnelles à transmettre à la vue.

    $layout_file = VIEW_DIR . '/layouts/layout.php'; // Définit le chemin du fichier de mise en page (layout) principal.

    ob_start(); // Démarre la temporisation de sortie. Tout ce qui est "imprimé" en PHP est conservé en mémoire et non affiché immédiatement.

    include_once(VIEW_DIR . $file); // Inclut le fichier de vue spécifié. Les données peuvent être passées à cette vue.

    $content = ob_get_clean(); // Récupère le contenu qui a été "imprimé" pendant la temporisation de sortie et arrête cette temporisation.

    include_once($layout_file); // Inclut le fichier de mise en page principal. Ce fichier utilisera probablement la variable '$content'.
}
?>
