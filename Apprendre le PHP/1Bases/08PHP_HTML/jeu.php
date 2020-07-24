<?php

$aDeviner = 150;
$erreur = null;
$succes = null;
$value = null;

if (isset($_GET['chiffre'])) {
    if ($_GET['chiffre'] > $aDeviner) {
        $erreur = "Votre chiffre est trop grand.";
    }elseif ($_GET['chiffre'] < $aDeviner) {
        $erreur = "Votre chiffre est trop petit.";
    }else{
        $succes = "Bravo! Vous avez deviné le chiffre <strong>$aDeviner</strong>.";
    }
    $value = (int)$_GET['chiffre'];
}

require 'header.php';
?>

<?php if($erreur): ?>
    <div class="alert alert-danger">
        <?= $erreur ?>
    </div>
<?php elseif ($succes): ?>
    <div class="alert alert-success">
        <?= $succes ?>
    </div>
<?php endif ?>

<form action="/jeu.php" method="GET">
    <div class="form-group">
        <input type="number"
            name="chiffre" class="form-control"
            placeholder="Entre 0 à 1000"
            value="<?= $value ?>">
    </div>
    <button type="submit" class="btn btn-primary">Deviner</button>
</form>

<form action="/jeu.php" method="POST">
    <div class="form-group">
        <input type="checkbox"
            name="parfum" class="form-control"
            value="Fraise">Fraise<br/>
        <input type="checkbox"
            name="parfum" class="form-control"
            value="Vanille">Vanille<br />
        <input type="checkbox"
            name="parfum" class="form-control"
            value="Chocolat">Chocolat
    </div>
    <button type="submit" class="btn btn-primary">Deviner</button>
</form>

<?php require 'footer.php' ?>