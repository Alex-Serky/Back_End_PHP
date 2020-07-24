<?php

$note = readline('Entrez votre note : ' );

if ($note >= 10) {
    if($note == 10){
        echo 'Vous avez juste la moyenne pour ne pas mourir de faim.';
    }else{
        echo 'Bravo! Vous avez la moyenne.';
    }
} else {
    echo 'Dommage! Vous n\'avez pas la moyenne.';
}
