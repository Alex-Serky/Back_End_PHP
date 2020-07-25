<?php

function ajouter_vue(){
    // Le chemin qui mène au compteur
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
/*
    // Première méthode
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
    
    // Autre méthode
    $fichier = 1; // on initialise le fichier avec la valeur 1
    if(file_exists($fichier)){
        // Si le fichier existe, on incrémente
        $compteur =  (int)file_get_contents($fichier);
        $compteur++;
    }
    file_put_contents($fichier, $compteur);
    
}