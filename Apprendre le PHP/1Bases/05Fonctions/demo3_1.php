<?php

$insultes = ['merde', 'con', 'imbécile', 'bête'];
$asterisque = [];

foreach ($insultes as $insulte) {
    $asterisque[] = str_repeat('*', strlen($insulte));
}
$phrase = readline('Veuillez entrer une phrase : ');
$phrase = str_replace($insultes, $asterisque, $phrase);

echo $phrase;
