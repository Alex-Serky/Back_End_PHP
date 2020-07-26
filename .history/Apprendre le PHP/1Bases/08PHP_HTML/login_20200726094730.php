<?php
require 'elements/header.php';
?>

<form action="" method="post">
    <div class="form-group">
        <input class="form-control" type="text" name="pseudo" placeholder="Nom d'utilisateur">
    </div>
    <div class="form-group">
        <input class="form-control" type="password" name="motdepasse" placeholder="Votre mot de passe">
    </div>
    <button class="btn btn-primary" type="submit">Se connecter</button>
</form>

<?php require 'elements/footer.php'; ?>