<?php

$nom = null;

if (!empty($_GET['action']) && $_GET['action'] === 'deconnecter') {
    unset($_COOKIE['utlisateur']);
    setcookie('utlisateur', '', time()); //Détruire les cookies
}

if(!empty($_COOKIE['utlisateur'])){
    $nom = $_COOKIE['utilisateur'];
}

if (!empty($_POST['nom'])) {
    setcookie('utilisateur', $_POST['nom']);
    $nom = $_POST['nom'];
}
/*
// Autre méthode pour un exemple plus complexe





*/
require 'elements/header.php';

?>

<?php if($nom): ?>
    <h1>Bonjour <?= htmlentities($nom) ?></h1>
    <a href="profil.php?action=deconnecter">Se déconnecter</a>
<?php else: ?>
    <form action="" method="POST">
        <div class="form-group">
            <input type="text" class="form-control" name="nom" placeholder="Entrer votre nom">
        </div>
        <button class="btn btn-primary">Se connecter</button>
    </form>
<?php endif ?>


<?php require 'elements/footer.php'; ?>