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

$eleve['notes'] = 16;  // On peut rajouter une note à l'élève.
echo $eleve['notes'][4];
