<?php

function bonjour($nom){
    return 'Bonjour ' . $nom . "\n";
}

$salutation = bonjour('Jeannot');
echo $salutation;