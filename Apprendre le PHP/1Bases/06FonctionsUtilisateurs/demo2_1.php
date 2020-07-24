<?php

function repondre_oui_non(string $phrase): bool
{
    while (true) {
        $reponse = readline($phrase . " - (o)ui/((n)on: ");
        if ($reponse === 'o') {
            return true;
        } elseif ($reponse === 'n') {
            return false;
        }
    }
}

function demander_creneau($phrase = 'Veuillez entrer un creneau')
{
    echo $phrase . "\n";
    while (true) {
        $ouverture = (int)readline('Heure d\'ouverture : ');
        if ($ouverture >= 0 && $ouverture <= 23) {
            break;
        }
    }
    while (true) {
        $fermeture = (int)readline('Heure de fermeture : ');
        if ($fermeture >= 0 && $fermeture <= 23 && $fermeture > $ouverture) {
            break;
        }
    }
    return [$ouverture, $fermeture];
}

// $resultat = repondre_oui_non('Voulez-vous continuer ?');
$creneau = demander_creneau();
$creneau2 = demander_creneau('Veuillez entrer votre creneau.');

var_dump($creneau, $creneau2);

