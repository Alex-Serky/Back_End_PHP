<?php

$notes = [10, 20, 9, 8];
echo $notes[1] . ' '. '<br>';

$eleve = [
    'prenom' => 'Marc',
    'nom' => 'Doe',
    'notes' => [10, 20, 9, 8]
];
$eleve['prenom'] = 'Jean';
echo $eleve['prenom'] . ' ' . $eleve['nom'];
