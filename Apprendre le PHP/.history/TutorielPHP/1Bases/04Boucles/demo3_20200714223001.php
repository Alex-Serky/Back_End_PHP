<?php

$notes = [10, 15, 16];
$eleves = [
    'CM2' => 'Jean',
    'CM1' => 'Marc'
];

// 1ère méthode
for ($i=0; $i < 3; $i++) {
    echo ' - ' . $notes[$i] . "\n";
}

//2ème méthode
foreach ($eleves as $classe => $eleve) {
    echo "$eleve est dans la classe $classe \n";
}