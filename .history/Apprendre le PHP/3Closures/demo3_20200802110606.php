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
    [
        'nom' => 'Gabin',
        'age' => 25,
        'moyenne' => 9
    ],
    [
        'nom' => 'Blandine',
        'age' => 20,
        'moyenne' => 7
    ]
];

/** Une fonction qui ne renvoie que les élèves qui ont la moyenne
 */

function sortByKey(array $array, string $key)
{
    usort($array, function ($a, $b) use ($key) {
        return $a[$key] - $b[$key];
    });
    return $array;
}

$elevesSorted = sortByKey($eleves, 'moyenne');

$eleveMoyenne = array_filter($eleves, function ($eleve) {
    return $eleve['moyenne'] < 8;
});

dump($eleves);
dump($eleveMoyenne);
