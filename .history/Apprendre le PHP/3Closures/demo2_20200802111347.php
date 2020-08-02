<?php

require 'vendor/autoload.php';

$eleves = [
    [
        'nom' => 'Anne',
        'age' => 18,
        'moyenne' => 15
    ],
    [
        'nom' => 'Gabin',
        'age' => 25,
        'moyenne' => 9
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
    [
        'nom' => 'Blandine',
        'age' => 20,
        'moyenne' => 7
    ]
];

/** Une fonction qui renvoie une fonction anonyme avec plusieurs paramètres.
 * Très utile pour l'organisation d'un tableau.
 */

function sortByKey(array $array, string $key)
{
    usort($array, function ($a, $b) use ($key) {
        return $a[$key] - $b[$key];
    });
    return $array;
}

$elevesSorted = sortByKey($eleves, 'moyenne');
// dump($eleves);
// dump($elevesSorted);

/* Filtrer les éléments du tableau grâce à une fonction utilisateur */

$eleveMoyenne = array_filter($eleves, function ($eleve) {
    return $eleve['moyenne'] >= 10;
});

dump($eleveMoyenne);