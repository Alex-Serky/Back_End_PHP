<?php

/*

Demander à l'utilisateur de rentrer une note ou de taper "fin".
Chaque note est sauvegardée dans un tableau $notes (pensez $notes[]).
A la fin, on affiche le tableau de note sous forme de liste.

*/

echo "1ère méthode \n";
$notes = [];
$action = null;

// Tant que l'utilisateur ne tape pas "fin"
while ($action !== 'fin') {
    $action = readline('Entrez une nouvelle note (ou \'fin\' pour terminier la saisie) : ');
    // On ajoute la note tapée au tableau notes
    if ($action !== 'fin') {
        $notes[] = (int)$action;
    }
}
// Pour chaque note dans notes
foreach ($notes as $note) {
    // On affiche "- note"
    echo "- $note \n";
}
echo "2ème méthode \n";
$notes = [];

// Tant que l'utilisateur ne tape pas "fin"
while (true) {
    $action = readline('Entrez une nouvelle note (ou \'fin\' pour terminier la saisie) : ');
    // On ajoute la note tapée au tableau notes
    if ($action === 'fin') {
        break;
    } else {
        $notes[] = (int)$action;
    }
}

// Pour chaque note dans notes
foreach ($notes as $note) {
    // On affiche "- note"
    echo "- $note \n";
}