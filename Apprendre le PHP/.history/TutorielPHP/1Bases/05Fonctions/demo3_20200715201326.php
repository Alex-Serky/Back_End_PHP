<?php

$insultes = ['merde', 'con', 'imbécile', 'bête'];


// 1ère méthode

$phrase = readline('Entrez une phrase : ');
foreach ($insultes as $insulte) {
    $replace = str_repeat('*', strlen($insulte));
    $phrase = str_replace($insulte, $replace, $phrase);
}
echo $phrase;