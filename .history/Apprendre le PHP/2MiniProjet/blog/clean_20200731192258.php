<?php

$pdo = new PDO('sqlite:../data.db', null, null, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Comment gérer les erreurs et émettre une exception
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);

$pdo->beginTransaction();
$pdo->exec('UPDATE posts SET name = "demo" WHERE id = 3');
$pdo->exec('UPDATE posts SET content = "demo" WHERE id = 3');
$post = $pdo->query('SELECT * FROM posts WHERE id = 3')->fetch();
var_dump($posts);
// $pdo->commit(); // Toutes les transactions vont être exécuter
$pdo->rollBack(); // Toutes les opérations effectuées seront annulées