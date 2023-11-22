<form action="index.php?controller=utilisateur&function=register" method="post">
    <h3>Login</h3>
    <span class="text-danger"><?= $msg; ?></span>
    <label> Nom utilisateur :
        <input name="nomUtilisateur" type="email">
    </label>
    <label> Nom :
        <input name="nom" type="text">
    </label>
    <label> Mot de passe :
        <input name="motDePasse" type="password">
    </label>
    <label> Date De Naissance :
        <input name="dateDeNaissance" type="date">
    </label>

    <input type="submit" value="Save">
</form>