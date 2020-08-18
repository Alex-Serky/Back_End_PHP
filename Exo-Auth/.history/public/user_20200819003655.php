<?php

use App\App;

require '../vendor/autoload.php';

App::getAuth()->requireRole('user')

?>

Réservé à l'utilisateur