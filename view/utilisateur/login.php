<?php

$msg = null; // Initialisation de la variable $msg à null
if (isset($_GET['msg'])) { // Vérifie si le paramètre 'msg' est présent dans l'URL
    if ($_GET['msg'] == 1) {
        $msg = "Verifier le nom de l'utilisateur"; // Affecte un message d'erreur spécifique si 'msg' vaut 1
    } elseif ($_GET['msg'] == 2) {
        $msg = "Verifier le mot de passe"; // Affecte un autre message d'erreur si 'msg' vaut 2
    }
}

?>

<form action="index.php?controller=utilisateur&function=verifierlogin" method="post">
    <!-- Formulaire de connexion envoyant les données à 'index.php' avec les paramètres spécifiés dans l'URL -->
    <h3>Connexion</h3> <!-- Titre du formulaire -->
    <span class="text-danger"><?= $msg; ?></span> <!-- Affiche le message d'erreur basé sur la variable $msg -->

    <!-- Champ pour entrer le nom d'utilisateur (email) -->
    <label> nomUtilisateur :
        <input name="nomUtilisateur" type="email"> <!-- Champ email pour le nom d'utilisateur -->
    </label>

    <!-- Champ pour entrer le mot de passe -->
    <label> Mot de passe :
        <input name="motDePasse" type="password"> <!-- Champ de mot de passe -->
    </label>

    <input type="submit" value="Se Connecter"> <!-- Bouton pour soumettre le formulaire -->
</form>