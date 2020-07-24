<?php

/*

Demander à l'utilisateur de rentrer une note ou de taper "fin".
Chaque note est sauvegardée dans un tableau $notes (pensez $notes[]).
A la fin, on affiche le tableau de note sous forme de liste.

*/

$notes = (int)readline('Entrez une note : ');

foreach ($notes as $note) {
    echo "Le tableau de note sera $notes[$note] \n";
}