<?php
$prenom = 'Marc';
$nom = 'Doe';
$note1 = 10;
$note2 = 20;
$moy = ($note1 + $note2)/2;

echo 'Bonjour ' . $prenom . ' ' . $nom . ',' . 'vous avez obtenu ' . $moy . ' de moyenne' . "\r\n";
echo "Bonjour $prenom $nom, vous avez eu $moy de moyenne";

?>