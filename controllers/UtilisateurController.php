<?php

// Fonction pour afficher la page de connexion
function index()
{
    render('/utilisateur/login.php'); // Appelle la fonction render pour afficher la vue login.php
}

// Fonction pour afficher la page d'inscription
function ajouter()
{
    render('/utilisateur/register.php'); // Appelle la fonction render pour afficher la vue register.php
}

// Fonction pour afficher la page de création de forum
function creerForum()
{
    render('/utilisateur/creerforum.php'); // Appelle la fonction render pour afficher la vue creerforum.php
}

// Fonction pour ajouter un forum
function ajouterForum()
{
    session_start(); // Démarre une nouvelle session ou reprend une session existante
    require_once('db/connex.php'); // Inclut le fichier de connexion à la base de données

    // Vérifie si la méthode de la requête est POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupère les données du formulaire
        $titre = $_POST['titre'];
        $article = $_POST['article'];
        $author_id = $_SESSION['user_id']; // Utilise l'ID de l'utilisateur connecté
        date_default_timezone_set("America/Montreal"); // Définit le fuseau horaire
        $date = date('Y-m-d'); // Obtient la date actuelle
        $nom = $_SESSION['nom']; // Utilise le nom de l'utilisateur connecté

        // Prépare la requête SQL pour insérer un nouvel article dans la base de données
        $query = "INSERT INTO `forum`(`id_Article`, `titre`, `article`, `datePublication`, `auteur`, `id_Utilisateur`) 
        VALUES ('[value-1]','$titre','$article','$date','$nom',16)";

        // Exécute la requête et gère le résultat
        if (mysqli_query($connex, $query)) {
            header("Location: index.php"); // Redirige vers la page d'accueil
            exit();
        } else {
            echo "Erreur lors de l'insertion de l'article : " . mysqli_error($connex); // Affiche une erreur si la requête échoue
        }
    }
}

// Fonction pour enregistrer un nouvel utilisateur
function register()
{
    require('db/connex.php'); // Inclut le fichier de connexion à la base de données

    // Nettoie et sécurise les données reçues via POST
    foreach ($_POST as $key => $value) {
        $$key = mysqli_real_escape_string($connex, $value);
    }

    // Génère un mot de passe haché
    $salt = "loufy"; // Utilise un sel pour le hachage
    $saltPassword = $motDePasse . $salt; // Concatène le mot de passe et le sel
    $password = password_hash($saltPassword, PASSWORD_BCRYPT, ['cost' => 10]); // Hache le mot de passe

    // Vérifie si le nom d'utilisateur est unique
    $checkUser = "SELECT * FROM utilisateur WHERE nomUtilisateur = '$nomUtilisateur'";
    $userExists = mysqli_query($connex, $checkUser);
    if (mysqli_num_rows($userExists) > 0) {
        echo "Nom d'utilisateur déjà pris"; // Affiche un message si le nom d'utilisateur existe déjà
        return;
    }

    // Insère le nouvel utilisateur dans la base de données
    $sql = "INSERT INTO utilisateur (nom, nomUtilisateur, motDePasse, dateDeNaissance) 
            VALUES ('$nom', '$nomUtilisateur', '$password', '$dateDeNaissance')";
    if (mysqli_query($connex, $sql)) {
        header('location: index.php?controller=utilisateur&function=index'); // Redirige en cas de succès
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connex); // Affiche une erreur en cas d'échec
    }
}

// Fonction pour vérifier la connexion de l'utilisateur
function verifierlogin()
{
    require('models/utilisateur.php'); // Inclut le fichier utilisateur.php
    login(); // Appelle la fonction login
}

// Fonction pour afficher la page de suppression de forum
function supprimer()
{
    render('/utilisateur/supprimerforum.php'); // Appelle la fonction render pour afficher la vue supprimerforum.php
}
