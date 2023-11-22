<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum du Collège Maisonneuve</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php?controller=utilisateur&function=index">Utilisateur</a></li>
            <li><a href="index.php?controller=utilisateur&function=ajouter">Ajouter Utilisateur</a></li>
        </ul>
    </nav>
    <div class="container">
        <?php echo $content; ?>
    </div>

</body>

</html>