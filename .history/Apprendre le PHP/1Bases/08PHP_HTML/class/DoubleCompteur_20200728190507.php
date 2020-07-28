<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'Compteur.php';

/**
 * Le Principe d'Héritage va nous permettre de créer une classe qui
 * fonctionne comme une autre mais avec une petite difgférence.
 * Une propriété public est visible depuis l'extérieur Par contre
 * une propriété private n'est accessible qu'à l'intérieur d'une classe
 * courante et de l'extérieur grâce à $this.
 */

class DoubleCompteur extends Compteur
{
    public function recuperer(): int
    {
        return 2 * parent::recuperer();
    }
}
