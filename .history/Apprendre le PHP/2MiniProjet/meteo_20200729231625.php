<?php

require_once 'class/OpenWeather.php';
$weather = new OpenWeather('94c6cf0868fa5cb930a5e2d71baf0dbf');
$forecast = $weather->getForecast('La Roche-sur-Yon, fr');

require_once 'elements/header.php';
?>

<div class="container">
    <ul>
        <?php foreach ($forecast as $day) : ?>
            <li><?= $day['date']->format('d/m/Y') ?> <?= $day['description'] ?> <?= $day['temp'] ?></li>
        <?php endforeach ?>
    </ul>
</div>



<?php require_once 'elements/footer.php'; ?>