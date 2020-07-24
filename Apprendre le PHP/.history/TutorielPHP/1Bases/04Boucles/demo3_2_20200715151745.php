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
        echo "Le créneau ne peut pas être enregistré car l'heure d'ouverture ($debut) est supérieur à l'heure de la fermeture ($fin) ";
    } else {
        $creneaux[] =[$debut, $fin];
        $action = readline('Voulez-vous enregistrer un nouveau créneau (o/n) : ');
        if ($action === 'n') {
        break;
        }
    }
}

// Le magasin est ouvert de 9h - 12h et 14h - 18h

echo 'Le magasin est ouvert de';

foreach ($creneaux as $key => $creneau) {
    echo "{$creneau[0]}h à {$creneau[1]}h";
}


/*
$heure = (int)readline('A quelle heure voulez-vous visiter le magasin? : ');
$creneauTrouve = false;

foreach ($creneaux as $creneau) {
    if ($heure >= $creneau[0] && $heure <= $creneau[1]) {
        $creneauTrouve = true;
    break;
    } else {
        echo "Désolé, le magasin sera fermé \n";
    }
}

if ((9 < $heure && $heure < 12) || (14 < $heure && $heure < 18)) {
    echo "Le magasin est ouvert. \n";
}else {
    echo "Revenez aux heures d'ouverture";
}

*/