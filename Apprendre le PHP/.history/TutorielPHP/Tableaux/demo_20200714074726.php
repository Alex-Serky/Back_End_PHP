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

$eleve['notes'][] = 16;  // On peut rajouter une note à l'élève.
print_r($eleve['notes']) . ' ' . '<br>'; //On remplace echo par print_r pour afficher le tableau des notes.

$eleve[] = 'CM2-A';
print_r($eleve);