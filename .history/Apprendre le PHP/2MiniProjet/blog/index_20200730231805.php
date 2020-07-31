<?php

$pdo = new PDO('sqlite:../data.db');
$query = $pdo->query('SELECT * from posts');
if ($query === false) {
    var_dump($query);
    die('Erreur SQL');
}

$posts = $query->fetchAll();
echo '<pre>';
print_r($posts);
echo '</pre>';

require_once '../elements/header.php';

?>




<?php require_once '../elements/footer.php'; ?>