<!-- Le formulaire pour envoyé les données de l'article -->
<form action="index.php?controller=utilisateur&function=ajouterforum" method="post">
    <h3>Rédiger un article</h3> <!-- Titre du formulaire -->

    <label for="titre">Titre:</label> <!-- Étiquette pour le champ du titre de l'article -->
    <input id="titre" name="titre" type="text" required>
    <!-- Champ de saisie pour le titre de l'article. L'attribut 'required' indique que ce champ doit être rempli pour soumettre le formulaire -->

    <label for="article">Article:</label> <!-- Étiquette pour le champ du contenu de l'article -->
    <textarea id="article" name="article" required></textarea>
    <!-- Zone de texte pour la saisie du contenu de l'article. L'attribut 'required' indique que ce champ doit également être rempli -->

    <input type="submit" value="Publier l'article"> <!-- Bouton pour soumettre le formulaire et publier l'article -->
</form>