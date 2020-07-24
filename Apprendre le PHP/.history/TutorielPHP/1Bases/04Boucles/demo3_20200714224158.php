<?php

$notes = [10, 15, 16];
$eleves = [
    'CM2' => ['Jean', 'Marc', 'Jane', 'Marion'],
    'CM1' => ['Mireille', 'Marcellin']
];


for ($i=0; $i < 3; $i++) {
    echo ' - ' . $notes[$i] . "\n";
}


foreach ($eleves as $classe => $listEleves) {
    echo "La classe $classe : \n";
    foreach ($listEleves as $eleve) {
        echo "$eleve \n";
    }
    echo "\n";
}