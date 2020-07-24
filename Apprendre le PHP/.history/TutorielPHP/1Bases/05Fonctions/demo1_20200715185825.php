<?php

while (true) {
    $mot = readline('Veuillez entrer un mot : ');
    if ($mot === '') {
       exit('Fin du programme');
    }
    $reverse = strtolower(strrev($mot));

    if (strtolower($mot) === $reverse) {
        echo "Ce mot est un palyndrôme \n";
    }else {
        echo "Ce mot n'est pas un payndrôme \n";
    }
}
