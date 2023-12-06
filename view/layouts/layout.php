<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum du Collège Maisonneuve</title>
    <link rel="stylesheet" href="ressources/css/style.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php?controller=utilisateur&function=ajouter">Ajouter Utilisateur</a></li>
            <li><a href="index.php?controller=utilisateur&function=index">Connexion</a></li>
            <li><a href="index.php?controller=utilisateur&function=creerForum">Creer Article</a></li>
        </ul>
    </nav>
    <div class="container">
        <?php echo $content; ?>
    </div>
    



    <footer>
        <p>&copy; 2023 - Programmation Web dynamique - TP:MVC – PHP Procédurale - Réaliser par : Adil Mostapha EL AMRANI - Tous droits réservés.</p>
    </footer>
</body>

</html>