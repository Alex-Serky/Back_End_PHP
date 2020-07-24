<?php

while (true) {
    $mot = readline('Veuillez entrer un mot : ');
    if ($mot === '') {
       exit('Fin du programme');
    }
    $reverse = strrev($mot);

    if ($mot === $reverse) {
        echo 'Ce mot est un palyndrôme';
    }else {
        echo 'Ce mot n\'est pas un payndrôme';
    }
}
