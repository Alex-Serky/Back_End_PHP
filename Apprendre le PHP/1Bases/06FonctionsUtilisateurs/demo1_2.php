<?php

function bonjour($nom = 'Alexis'){
    return 'Bonjour ' . $nom . "\n";
}

$salutation = bonjour();
echo $salutation;