<?php

// 1ère méthode
$notes = [10, 15, 16];

for ($i=0; $i < 3; $i++) {
    echo ' - ' . $notes[$i] . "\n";
}

//éème méthode
foreach ($notes as $note) {
    echo "- $note \n";
}