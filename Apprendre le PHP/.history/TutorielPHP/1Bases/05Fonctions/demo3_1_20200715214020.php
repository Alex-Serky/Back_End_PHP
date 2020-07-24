<?php

$insultes = ['merde', 'con', 'imbécile', 'bête'];
$phrase = readline('Entrez une phrase : ');

$asterisque = [];
foreach ($insultes as $insulte) {
    $asterisque = str_repeat('*', strlen($insultes));
}
$phrase = readline('Veuillez entrer une phrase : ');
$phrase = str_replace($insultes, $asterisque, $phrase);

echo $phrase;
