<?php

$insultes = ['merde', 'con', 'imbécile', 'bête'];
$phrase = readline('Entrez une phrase : ');

$asterisque = [];
foreach ($insultes as $insulte) {
    $asterisque = str_repeat('*', strlen($insulte));
}
$phrase = readline('Veuillez entrer une deuxième phrase : ');
$phrase = str_replace($insulte, $asterisque, $phrase);

echo $phrase;
