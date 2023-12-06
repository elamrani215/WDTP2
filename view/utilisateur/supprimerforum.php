<?php

function supprimer1()
{
    session_start(); // Démarre une nouvelle session ou reprend une session existante

    require_once('db/connex.php'); // Inclut le fichier de connexion à la base de données une seule fois

    // Ce bloc de code est commenté. Il vérifiait si l'utilisateur était connecté avant de continuer
    // if (!isset($_SESSION['user_id'])) {
    //     header("Location: login.php"); // Redirige vers la page de connexion si l'utilisateur n'est pas connecté
    //     exit(); // Arrête l'exécution du script
    // }

    if ($_SERVER["REQUEST_METHOD"] == "POST") { // Vérifie si la méthode de la requête HTTP est POST

        // Prépare une requête SQL pour supprimer un article de la base de données
        $sql = "DELETE FROM forum WHERE `forum`.`id_Article` = 796";

        if (mysqli_query($connex, $sql)) { // Exécute la requête SQL et vérifie si elle réussit
            // Redirige vers la page d'accueil si la requête est exécutée avec succès
            header("Location: index.php");
            exit(); // Arrête l'exécution du script
        } else {
            // Affiche un message d'erreur si la requête échoue
            echo "Erreur lors de l'insertion de l'article : " . mysqli_error($connex);
        }
    }
}
?>
