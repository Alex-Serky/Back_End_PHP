<?php
require 'elements/header.php';
?>

<form action="" method="post">
    <div class="form-group">
        <input type="text" name="pseudo" placeholder="Nom d'utilisateur">
    </div>
    <div class="form-group">
        <input type="password" name="motdepasse" placeholder="Votre mot de passe">
    </div>
    <button class="btn btn-primary" type="submit">Se connecter</button>
</form>

<?php 'elements/footer.php'; ?>