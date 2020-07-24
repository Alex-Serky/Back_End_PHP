<?php

$insultes = ['merde', 'con', 'imbécile', 'bête'];


// 1ère méthode

$phrase = readline('Entrez une phrase : ');
foreach ($insultes as $insulte) {
    $replace = str_repeat('*', strlen($insulte));
    $phrase = str_replace($insulte, $replace, $phrase);
}
echo $phrase .'<br />';
/*
// 2ème méthode
$asterisque = [];

foreach ($insultes as $insulte) {
    $asterisque = str_repeat('*', strlen($insulte));
}
$phrase = readline('Veuillez entrer une deuxième phrase : ');
$phrase = str_replace($insulte, $asterisque, $phrase);

echo $phrase . '<br />';
/*
// 3ème méthode
$asterisque = [];
foreach ($insultes as $insulte) {

    $lettre = substr($insulte, 0, 1);  //Trouver la première lettre du mot
    $asterisque[] = $lettre . str_repeat('*', strlen($insulte) - 1); // Concaténer la première lettre avec le str_repeat 

}
$phrase = readline('Veuillez entrer une deuxième phrase : ');
$phrase = str_replace($insultes, $asterisque, $phrase);

echo $phrase;
*/