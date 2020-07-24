<?php

$title = 'Nous contacter !';
require_once 'data/config.php';
require_once 'functions.php';
date_default_timezone_set('Europe/Paris');
$heure = (int)($_GET['heure'] ?? date('G')); // Récupérer l'heure d'aujourd'hui
$jour = (int)($_GET['jour'] ?? date('N') - 1);
$creneaux = CRENEAUX[$jour]; // Récupérer les créneaux d'aujourd'hui $creneaux
$ouvert = in_creneaux($heure, $creneaux); // Récupérer l'état d'ouverture du magasin
$color = $ouvert ? 'green' : 'red'; // Ternaire
/* if ($ouvert) { $color = 'green';} else { $color = 'red'; } */
require 'elements/header.php';

?>

<div class="row">
    <div class="col-md-8">
        <h2>Nous contacter !</h2>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. A autem at id,
            nobis ex sapiente ullam necessitatibus deserunt, sit ea est ipsum quia minus
            assumenda perspiciatis ad mollitia, dolorum distinctio.
        </p>
    </div>
    <div class="col-md-4">
        <h3>Horaires d'ouvertures</h3>

        <?php if ($ouvert) : ?>
            <div class="alert alert-success">
                Le magasin sera ouvert.
            </div>
        <?php else : ?>
            <div class="alert alert-danger">
                Le magasin sera fermé.
            </div>
        <?php endif ?>

        <form action="" method="GET">
            <div class="form-group">
                <?= select('jour', $jour, JOURS) ?>
            </div>
            <div class="form-group">
                <input class="form-control" type="number" name="heure" value="<?= $heure ?>">
            </div>
            <button type="submit" class="btn btn-primary">Voir si le magasin est ouvert</button>
        </form>

        <ul>
            <?php foreach (JOURS as $k => $jour) : ?>
                <li>
                    <strong><?= $jour ?> :</strong>
                    <?= creneaux_html(CRENEAUX[$k]); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

</div>

<?php require 'elements/footer.php'; ?>