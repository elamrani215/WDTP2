<?php

function login()
{
    require('db/connex.php'); // Inclut le fichier de connexion à la base de données.

    foreach ($_POST as $key => $value) {
        // Nettoie chaque valeur reçue via POST pour prévenir les injections SQL.
        $$key = mysqli_real_escape_string($connex, $value);
    }

    // 1- Vérification de l'utilisateur dans la base de données
    $sql = "SELECT * FROM utilisateur WHERE nomUtilisateur = '$nomUtilisateur'"; // Prépare la requête SQL.
    $result = mysqli_query($connex, $sql); // Exécute la requête.

    // 2- Vérifie le nombre de lignes retournées
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        // 3- Vérifie le mot de passe
        $info_user = mysqli_fetch_array($result, MYSQLI_ASSOC); // Récupère les informations de l'utilisateur.

        error_log(" mot de passe qui vient du db : " . $info_user['motDePasse']); // Enregistre le mot de passe dans le journal d'erreurs pour le débogage.
        $salt = "loufy"; // Définit un sel pour le mot de passe.
        $saltPassword = $motDePasse . $salt; // Concatène le mot de passe et le sel.

        if (password_verify($saltPassword, $info_user['motDePasse'])) {
            // Si le mot de passe est correct :
            session_start(); // Démarre une nouvelle session ou reprend une session existante.
            //print_r($info_user); // Afficherait les informations de l'utilisateur pour le débogage.
            session_regenerate_id(); // Régénère l'ID de session pour la sécurité.
            $_SESSION['id'] = $info_user['id']; // Stocke l'ID de l'utilisateur dans la session.
            $_SESSION['nom'] = $info_user['nom']; // Stocke le nom de l'utilisateur dans la session.
            $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR']); // Crée une empreinte pour la session.

            header('location:index.php?controller=forum&function=afficherForum'); // Redirige vers la page du forum.
        } else {
            // Si le mot de passe est incorrect, redirige avec un message d'erreur.
            header('location:utilisateur/login.php?msg=2');
        }
    } else {
        // Si l'utilisateur n'est pas trouvé, redirige avec un message d'erreur.
        header('location:utilisateur/login.php?msg=1');
    }
}
