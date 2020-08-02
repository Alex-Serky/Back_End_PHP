<?php

require 'vendor/autoload.php';

$eleves = [
    [
        'nom' => 'Anne',
        'age' => 18
    ],
    [
        'nom' => 'Marc',
        'age' => 21
    ],
    [
        'nom' => 'Jean',
        'age' => 20
    ],
];

/* Tri du tableau suivant l'âge croissant */

$sort = function ($eleve1, $eleve2){
    return $eleve1['age'] - $eleve2['age'];
};

usort($eleves, $sort);

dump($eleves);