<?php

//print_r($_GET); // Cette ligne, actuellement commentée, servirait à afficher les informations GET pour le débogage.

require('db/connex.php'); // Inclut le fichier de connexion à la base de données.

$id = mysqli_real_escape_string($connex, $_GET['id']); // Nettoie la variable 'id' obtenue via GET pour prévenir les injections SQL.

$sql = "SELECT * FROM forum"; // Prépare une requête SQL pour sélectionner tous les enregistrements de la table 'forum'.
$result = mysqli_query($connex, $sql); // Exécute la requête SQL.

$count = mysqli_num_rows($result); // Compte le nombre de lignes retournées par la requête.
$client = "";
if ($count == 2) {
    // Ce bloc sera exécuté si exactement 2 lignes sont retournées.
    $client = mysqli_fetch_array($result); // Récupère la ligne de résultat sous forme de tableau.
    //print_r($client); // Afficherait les informations du client pour le débogage.
    // die(); // Arrêterait le script ici.
}

$title = 'Afficher Client'; // Définit un titre pour la page ou la section.

foreach ($result as $row) { 
    // Boucle sur chaque enregistrement retourné par la requête SQL.
    // Affiche les informations de l'article dans un formulaire (pour la présentation, pas pour la soumission de données).
    echo "<form>";
    echo "<p> <strong>auteur : </strong>" . $row['auteur'] . " </p>";
    echo "<p> <strong>titre : </strong>" . $row['titre'] . " </p>";
    echo "<p> <strong>date de publication : </strong>" . $row['datePublication'] . " </p>";
    echo "<p> <strong>article : </strong>" . $row['article'] . " </p>";
    
    session_start(); // Démarre une session ou reprend une session existante.
    if ($_SESSION['nom'] == $row['auteur']) {
        // Si le nom dans la session correspond à l'auteur de l'article, affiche un lien pour supprimer l'article.
        echo "<form action='index.php?controller=utilisateur&function=supprimer' method='post'>";
        echo "<li><a href='index.php?controller=utilisateur&function=supprimer'>supprimer</a></li>";
        echo "</form>";
    }
    echo "</form>";
}
?>
