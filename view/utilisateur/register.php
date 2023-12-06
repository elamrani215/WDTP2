    <!-- Le formulaire pour envoyé les données -->

    <form action="index.php?controller=utilisateur&function=register" method="post">

        <h3>Inscription</h3>
        <span class="text-danger"><? $msg = isset($msg) ? $msg : ''; ?></span> <!-- Affiche un message d'erreur si défini -->

        <!-- Champ pour entrer le nom -->
        <label> Nom :
            <input name="nom" type="text"> <!-- Champ de texte pour le nom -->
        </label>

        <!-- Champ pour entrer l'adresse email -->
        <label> Nom utilisateur (Email) :
            <input name="nomUtilisateur" type="email" required> <!-- Champ email obligatoire -->
        </label>

        <!-- Champ pour entrer le mot de passe -->
        <label> Mot de passe :
            <input name="motDePasse" type="password" required minlength="6" maxlength="20"> <!-- Champ de mot de passe avec des critères -->
        </label>

        <!-- Champ pour entrer la date de naissance -->
        <label> Date De Naissance :
            <input name="dateDeNaissance" type="date" required> <!-- Champ de date obligatoire -->
        </label>

        <input type="submit" value="valider"> <!-- Bouton pour soumettre le formulaire -->
    </form>