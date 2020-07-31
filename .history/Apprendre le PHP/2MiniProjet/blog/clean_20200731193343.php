<?php

require_once '../elements/cnx.php';
/**
 * Gérer les transactions qui permettent de faire plusieurs requêtes les unes derrières les autres.
 * Le système de transaction va être très intéressant lors des suppressions, des insertions croisées à faire.
*/
$pdo->beginTransaction();
$pdo->exec('UPDATE posts SET name = "demo" WHERE id = 3');
$pdo->exec('UPDATE posts SET content = "demo" WHERE id = 3');
$post = $pdo->query('SELECT * FROM posts WHERE id = 3')->fetch();
var_dump($post);
// $pdo->commit(); // Toutes les transactions vont être exécuter
$pdo->rollBack(); // Toutes les opérations effectuées seront annulées