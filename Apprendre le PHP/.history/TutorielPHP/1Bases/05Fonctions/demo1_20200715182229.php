<?php

$mot = readline('Veuillez entrer un mot');

$reverse = strrev($mot);

if ($mot === $reverse) {
    echo 'Ce mot est un palyndrôme';
}else {
    echo 'Ce mot n\'est pas un payndrôme';
}