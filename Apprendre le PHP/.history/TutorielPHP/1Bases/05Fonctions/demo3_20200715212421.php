<?php

$insultes = ['merde', 'con', 'imbécile', 'bête'];
$phrase = readline('Entrez une phrase : ');

// 1ère méthode
foreach ($insultes as $insulte) {
    $replace = str_repeat('*', strlen($insulte));
    $phrase = str_replace($insulte, $replace, $phrase);
}
echo $phrase;
