<?php

require 'separateur.php'; // (Préférence) Demande si le fichier existe donc il planque le programme si le fichier n'existe pas.

require_once 'functions.php';  // N'utilise qu'une seule fois le fichier pour ne pas le déclarer en double et cela crée des problèmes d'éxécution.
// include 'function.php';  // Va afficher un problème mais le reste du programme va s'exécuter.
require_once 'functions_creneaux.php';
var_dump(repondre_oui_non('Test'));


require 'separateur.php';

require 'separateur.php';

require 'separateur.php';