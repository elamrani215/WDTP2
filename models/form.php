<?php

//print_r($_GET); // Cette ligne est pour le débogage, pour afficher les données GET.

// Vérifie si l'ID du client est passé dans l'URL et n'est pas nul
if (isset($_GET['id']) && $_GET['id'] != null) {
    require('db/connex.php'); // Inclut le fichier de connexion à la base de données.

    $id = mysqli_real_escape_string($connex, $_GET['id']); // Nettoie l'ID pour éviter les injections SQL.

    $sql = "SELECT * FROM client WHERE id = '$id'"; // Prépare la requête SQL pour sélectionner les informations du client.
    $result = mysqli_query($connex, $sql); // Exécute la requête.

    $count = mysqli_num_rows($result); // Compte le nombre de lignes retournées par la requête.

    // Vérifie si un client correspondant à l'ID a été trouvé
    if ($count == 1) {
        $client = mysqli_fetch_array($result, MYSQLI_ASSOC); // Récupère les informations du client.
        // print_r($client); // Pour le débogage, affiche les informations du client.
        // die(); // Arrête l'exécution du script ici.
    } else {
        header('location: client-index.php'); // Redirige vers l'index des clients si aucun client correspondant n'est trouvé.
    }
} else {
    header('location: client-index.php'); // Redirige vers l'index des clients si aucun ID n'est fourni.
}

$title = 'Afficher Client'; // Définit un titre pour la page.
require('library/header.php'); // Inclut le fichier d'en-tête.

// Affiche les informations du client
?>
<p> <strong>Nom : </strong><?= $client['nom']; ?></p>
<p> <strong>Adresse : </strong><?= $client['adresse']; ?></p>
<p> <strong>Phone : </strong><?= $client['phone']; ?></p>
<p> <strong>Courriel : </strong><?= $client['courriel']; ?></p>
<a href="client-edit.php?id=<?= $client['id']; ?>" class="btn">Modifier</a> <!-- Lien pour modifier les informations du client -->
<form action="client-delete.php" method="post">
    <input type="hidden" name="id" value="<?= $client['id']; ?>"> <!-- Champ caché pour envoyer l'ID du client -->
    <input type="submit" class="btn-danger" value="Effacer"> <!-- Bouton pour supprimer le client -->
</form>
<?php
require('library/footer.php'); // Inclut le fichier de pied de page.
?>
