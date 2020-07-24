<?php

/*

On veut demander à l'utilisateur de rentrer les horaires d'ouverture d'un magasin.
On lui demande de rentrer une heure et on lui dira si le magasin est ouvert.

*/

$heure = (int)readline('Entrez une heure : ');

if ((9 < $heure && $heure < 12) || (14 < $heure && $heure < 18)) {
    echo "Le magasin est ouvert \n";
}else {
    echo "Revenez aux heure d'ouverture";
}