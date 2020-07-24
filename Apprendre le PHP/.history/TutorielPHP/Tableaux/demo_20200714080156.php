<?php

$notes = [10, 20, 9, 8];
echo $notes[1] . ' '. '<br>';

$eleve = [
    'prenom' => 'Marc',
    'nom' => 'Doe',
    'notes' => [10, 20, 9, 8]
];
$eleve['prenom'] = 'Jean';  // On peut modifier la valeur du prénom.
echo $eleve['prenom'] . ' ' . $eleve['nom'] . ' ' . '<br>';

$eleve['notes'][4] = 16;  // On peut rajouter une note à l'élève.
print_r($eleve['notes'])"\n"; //On remplace echo par print_r pour afficher le tableau des notes.

$eleve[] = 'CM2-A'; // Attribuer une classe à l'élève.
print_r($eleve) . ' ' . '<br>';

$classe = [
    [
        'nom' => 'Doe',
        'prenom' => 'Jean',
        'notes' => [12, 18, 16, 17]
    ],
    [
        'nom' => 'Tube',
        'prenom' => 'Samuel',
        'notes' => [12, 18, 16, 17]
    ]
];
echo $classe[1]['notes'][2];