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

// Autre méthode

$key = 'age';
$sort = function ($eleve1, $eleve2) use ($key) {
    return $eleve2[$key] - $eleve1[$key];
};

usort($eleves, $sort);

// dump($eleves);

/* Une fonction qui renvoie une fonction anonyme */

function sorterByKey($key) {
    return function ($eleve1, $eleve2) use ($key) {
        return $eleve2[$key] - $eleve1[$key];
    };
}

usort($eleves, sorterByKey('age'));
dump($eleves);