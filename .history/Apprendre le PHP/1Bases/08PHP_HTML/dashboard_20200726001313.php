<?php

require 'functions/compteur.php';
$total = nombre_vues();
require 'elements/header.php';
?>

<div class="card">
    <div class="card-body">
        <strong style="font-size:3em"><?= $total ?></strong>
        Visite<?= $total > 1 ? 's' : '' ?> totale<?= $total > 1 ? 's' : '' ?>
    </div>
</div>


<?php require 'elements/footer.php'; ?>