<?php

$notes = [10, 20, 13];

$sum = array_sum($notes);
$count = count($notes);

echo "Vous avez " . ($sum / $count) . " de moyenne générale";