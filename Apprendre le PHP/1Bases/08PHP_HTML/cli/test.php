<?php

$fichier = __DIR__ . DIRECTORY_SEPARATOR . 'demo.txt';
file_put_contents($fichier, ' Bonjour! As-tu pensé de ce monde?', FILE_APPEND);