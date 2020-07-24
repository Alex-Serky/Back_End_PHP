<?php

/*

On veut demander à l'utilisateur de rentrer les horaires d'ouverture d'un magasin.
On lui demande de rentrer une heure et on lui dira si le magasin est ouvert.

*/

// On demande à l'utilisateur de rentrer un créneaux (O/N)
    // On demande l'heure de début
    // On demande l'heure de fin
    // On vérifie que l'heure de début est inférieure à l'heure de fin
    // On demande si on veut rajouter un nouveau créneaux
// On demande à l'utilisateur de rentrer une heure
// On affiche l'état d'ouverture du magasin

$creneaux = [];

while (true) {
    $debut = (int)readline('Heure d\'ouverture : ');
    $fin = (int)readline('Heure de fermeture : ');

    if ($debut >= $fin) {
        echo "Le créneau ne peut pas être enregistré car l'heure d'ouverture ($debut) est supérieur à l'heure de fin ";
    } else {
        $creneaux =[$debut, $fin];
        $action = readline('Voulez-vous enregistrer iun nouveau créneau (O/N) : ');
        if ($action === 'n') {
        break;
        }
    }
}

print_r($creneaux);
/*
$heure = (int)readline('Entrez une heure : ');

if ((9 < $heure && $heure < 12) || (14 < $heure && $heure < 18)) {
    echo "Le magasin est ouvert. \n";
}else {
    echo "Revenez aux heures d'ouverture";
}*/

