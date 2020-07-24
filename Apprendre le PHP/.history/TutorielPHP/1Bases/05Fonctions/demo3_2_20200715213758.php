<?php

$insultes = ['merde', 'con', 'imbécile', 'bête'];
$asterisque = [];
foreach ($insultes as $insulte) {

    $lettre = substr($insulte, 0, 1);  //Trouver la première lettre du mot
    $asterisque[] = $lettre . str_repeat('*', strlen($insulte) - 1); // Concaténer la première lettre avec le str_repeat 

}
$phrase = readline('Veuillez entrer une phrase : ');
$phrase = str_replace($insultes, $asterisque, $phrase);