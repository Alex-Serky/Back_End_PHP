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

/* Une fonction qui renvoie une fonction anonyme avec plusieurs paramètres */

function sorterByKey(array $array string $key)
{
    usort($array, function ($a, $b) use ($key) {
        return $a[$key] - $b[$key];
    });
    return $array;
}

$elevesSorted = usort($eleves, 'moyenne');
dump($eleves);
dump($elevesSorted);
