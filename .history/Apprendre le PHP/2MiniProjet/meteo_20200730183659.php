<?php

require_once 'class/OpenWeather.php';
$weather = new OpenWeather('94c6cf0868fa5cb930a5e2d71baf0dbf');
$error = null;
try {
    $forecast = $weather->getForecast('La Roche-sur-Yon,fr');
    $today = $weather->getToday('La Roche-sur-Yon,fr');
} catch (APIException $e) {
    $error = "Erreur API";
} catch (Exception $e) {
    $error = "Erreur classique";
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