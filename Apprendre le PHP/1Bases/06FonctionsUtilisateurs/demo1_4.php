<?php

$nom = 'Doe';

function bonjour($prenom = null, $nom = null){
    if ($prenom === null) {
        return "Bonjour \n";
    }
    return 'Bonjour ' . $prenom . " " . $nom . "\n";
}

echo bonjour('Jean', $nom);

// ou
function bonjr($prenom = null, $nom = null)
{
    global $nom; // Considérer comme une mauvaise pratique (à éviter)
    if ($prenom === null) {
        return "Bonjour \n";
    }
    return 'Bonjour ' . $prenom . " " . $nom . "\n";
}

echo bonjr('Clotaire');