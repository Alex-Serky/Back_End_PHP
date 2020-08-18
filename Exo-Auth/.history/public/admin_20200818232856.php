<?php

use App\App;

require '../vendor/autoload.php';

$user = App::getAuth();
if ($user === null || $user->role !== 'admin') {
    header('Location: index.php?forbid = 1');
    exit();
}

?>

Réservé à l'admin