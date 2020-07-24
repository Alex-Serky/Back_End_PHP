<?php
$notes = readline('Entrez votre note :');

if ($notes >= 10) {
    echo 'Bravo! Vous avez la moyenne.';
} else {
    echo 'Dommage! Vous n\'avez pas la moyenne.';
}
