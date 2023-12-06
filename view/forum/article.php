<!-- Le formulaire pour envoyé les données d'un article -->
<form action="index.php?controller=forum&function=addArticle" method="post">
    <h3>Rédiger un article</h3> <!-- Titre du formulaire -->

    <label for="titre">Titre:</label> <!-- Étiquette pour le champ du titre -->
    <input id="titre" name="titre" type="text" required> 
    <!-- Champ de texte pour saisir le titre de l'article. L'attribut 'required' indique que ce champ est obligatoire -->

    <label for="article">Article:</label> <!-- Étiquette pour le champ du contenu de l'article -->
    <textarea id="article" name="article" required></textarea>
    <!-- Zone de texte pour écrire le contenu de l'article. L'attribut 'required' indique que ce champ est également obligatoire -->

    <input type="submit" value="Publier l'article"> <!-- Bouton pour soumettre le formulaire et publier l'article -->
</form>
