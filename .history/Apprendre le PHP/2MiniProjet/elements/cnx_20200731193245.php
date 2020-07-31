<?php

$pdo = new PDO('sqlite:../data.db', null, null, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Comment gérer les erreurs et émettre une exception
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);

