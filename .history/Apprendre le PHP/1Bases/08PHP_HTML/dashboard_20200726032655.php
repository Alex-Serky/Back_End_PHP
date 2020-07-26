<?php

require 'functions/compteur.php';
$annee = (int)date('Y');
$annee_selection = empty($_GET['annee']) ? null : (int)$_GET['annee'];
$mois_selection = empty($_GET['mois']) ? null : $_GET['mois'];
if ($annee_selection && $mois_selection) {
    $total = nombre_vues_mois($annee_selection, $mois_selection);
    $detail = nombre_vues_detail_mois($annee_selection, $mois_selection)
} else {
    $total = nombre_vues();
}


$mois = [
    '01' => 'Janvier',
    '02' => 'Février',
    '03' => 'Mars',
    '04' => 'Avril',
    '05' => 'Mai',
    '06' => 'Juin',
    '07' => 'Juillet',
    '08' => 'Août',
    '09' => 'Septembre',
    '10' => 'Octobre',
    '11' => 'Novembre',
    '12' => 'Décembre'
];
require 'elements/header.php';
?>

<div class="row">
    <div class="col-md-4">
        <div class="list-group">
            <?php for ($i = 0; $i < 5; $i++): ?>
                <a class="list-group-item <?= $annee - $i === $annee_selection ? 'active' : ''; ?>" href="dashboard.php?annee=<?= $annee - $i ?>"><?= $annee - $i ?></a>
                <?php if($annee - $i === $annee_selection ): ?>
                    <div class="list-group">
                        <?php foreach($mois as $m => $nom): ?>
                            <a class="list-group-item <?= $m === $mois_selection ? 'active' : ''?>" href="dashboard.php?annee=<?= $annee_selection ?>&mois=<?= $m ?>">
                                <?= $nom ?>
                            </a>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
            <?php endfor ?>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <strong style="font-size:3em"><?= $total ?></strong><br />
                Visite<?= $total > 1 ? 's' : '' ?> totale<?= $total > 1 ? 's' : '' ?>
            </div>
        </div>
        <?php if(isset($detail)): ?>
            <h2>Détails des visites pour le mois</h2>
            <table>
                <thead>
                    <tr>
                        <th>Jour</th>
                        <th>Mois</th>
                        <th>Année</th>
                        <th>Nombre de visites</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($details as $ligne): ?>
                    <tr>
                        <td><?= $ligne['jour'] ?></td>
                        <td><?= $ligne['mois'] ?></td>
                        <td><?= $ligne['annee'] ?></td>
                        <td><?= $ligne['visites'] ?> visite<?= $ligne > 1 ? 's' : '' ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php endif ?>
    </div>
</div>


<?php require 'elements/footer.php'; ?>