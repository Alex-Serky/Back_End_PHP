<?php

$insultes = ['merde', 'con', 'imbécile', 'bête'];
$phrase = readline('Entrez une phrase : ');

// 1ère méthode
foreach ($insultes as $insulte) {
    $replace = str_repeat('*', strlen($insulte));
    $phrase = str_replace($insulte, $replace, $phrase);
}
echo $phrase;

// 2ème méthode
$asterisque = [];
foreach ($insultes as $insulte) {
    $asterisque = str_repeat('*', strlen($insulte));
}
$phrase = readline('Veuillez entrer une phrase : ');