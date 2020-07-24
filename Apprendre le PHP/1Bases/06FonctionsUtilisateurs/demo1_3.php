<?php

function bonjour($nom = null){
    if ($nom === null) {
        return "Bonjour \n";
    }
    return 'Bonjour ' . $nom . "\n";
}

echo bonjour();
echo bonjour('Julie');