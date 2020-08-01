<?php

require_once 'vendor/autoload.php';

declare(strict_types = 1); // Rend PHP plus strict dans le traitement des erreurs
$weather = new App\OpenWeather('94c6cf0868fa5cb930a5e2d71baf0dbf');
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
use App\OpenWeather;
