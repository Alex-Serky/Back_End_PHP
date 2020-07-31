<?php

declare(strict_types = 1); // Rend PHP plus strict dans le traitement des erreurs
require_once 'class/OpenWeather.php';
$weather = new OpenWeather('1fbb198d4cf15d7d7106c08af2028e25');
$error = null;
try {
    $forecast = $weather->getForecast('La Roche-sur-Yon,fr');
    $today = $weather->getToday('La Roche-sur-Yon,fr');
} catch (Exception | Error $e) {
    $error = $e->getMessage();
}

require_once 'elements/header.php';
?>

<?php if ($error) : ?>
    <div class="alert alert-danger">
        <?= $error ?>
    </div>
<?php else : ?>
    <div class="container">
        <ul>
            <li>En ce moment <?= $today['description'] ?> <?= $today['temp'] ?>°C</li>
            <?php foreach ($forecast as $day) : ?>
                <li><?= $day['date']->format('d/m/Y') ?> <?= $day['description'] ?> <?= $day['temp'] ?>°C</li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>

<?php require_once 'elements/footer.php'; ?>