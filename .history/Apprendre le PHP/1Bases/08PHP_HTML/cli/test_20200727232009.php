<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Creneau.php';
$creneau = new Creneau(9, 12);
$creneau2 = new Creneau(14, 17);
var_dump($creneau, $creneau2);