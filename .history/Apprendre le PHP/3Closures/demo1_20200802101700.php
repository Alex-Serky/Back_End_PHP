<?php

require 'vendor/autoload.php';

$eleves = [
    [
        'nom' => 'Anne',
        'age' => 18,
        'moyenne' => 15
    ],
    [
        'nom' => 'Marc',
        'age' => 21,
        'moyenne' => 13
    ],
    [
        'nom' => 'Jean',
        'age' => 20,
        'moyenne' => 18
    ],
];

// Deuxième méthode (Générale)

$key = 'age';
$sort = function ($eleve1, $eleve2) {
    return $eleve2['$key'] - $eleve1['$key'];
};

usort($eleves, $sort);

dump($eleves);