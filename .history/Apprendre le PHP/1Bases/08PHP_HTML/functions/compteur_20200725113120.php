<?php

function ajouter_vue(){
    // Le chemin qui mène au compteur
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
    $fichier_journalier = $fichier . '-' . date('Y-m-d');

    // Autre méthode
    incrementer_compteur($fichier);
    incrementer_compteur($fichier_journalier);

/*
    // Première méthode de nombre de vues
    if (file_exists($fichier)) {
        // Si le fichier existe, on incrémente
        $compteur =  (int)file_get_contents($fichier);
        $compteur++;
        file_put_contents($fichier, $compteur);
    }else{
        // Sinon, on crée le fichier avec la valeur 1
        file_put_contents($fichier, '1');
    }
*/
}

function incrementer_compteur($fichier): void
{
    $compteur = 1; // on initialise le fichier avec la valeur 1
    if (file_exists($fichier)) {
        // Si le fichier existe, on incrémente
        $compteur =  (int)file_get_contents($fichier);
        $compteur++;
    }
    file_put_contents($fichier, $compteur);
}
function nombre_vues(){
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
    return file_get_contents($fichier);
}