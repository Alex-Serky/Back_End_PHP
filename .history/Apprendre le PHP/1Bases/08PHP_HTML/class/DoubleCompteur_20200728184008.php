<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'Compteur.php';

class DoubleCompteur extends Compteur
{
    public function recuperer(): int
    {
        if (!file_exists($this->fichier)) {
            return 0;
        }
        return 2 * file_get_contents($this->fichier);
    }
}
