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

// Première méthode

// /* Tri du tableau suivant l'âge croissant */

// $sortAge = function ($eleve1, $eleve2){
//     return $eleve1['age'] - $eleve2['age'];
// };

// usort($eleves, $sortAge);

// /* Tri du tableau suivant la moyenne décroissante */

// $sortMoyenne = function ($eleve1, $eleve2){
//     return $eleve2['moyenne'] - $eleve1['moyenne'];
// };

// usort($eleves, $sortMoyenne);

// dump($eleves);

// Deuxième méthode (Générale)

$key = 'age';
$sort = function ($eleve1, $eleve2){
    return $eleve2['$key'] - $eleve1['$key'];
};

usort($eleves, $sort);

dump($eleves);