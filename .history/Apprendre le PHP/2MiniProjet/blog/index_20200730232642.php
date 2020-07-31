<?php

$pdo = new PDO('sqlite:../data.db');
$query = $pdo->query('SELECT * from posts');
if ($query === false) {
    var_dump($query);
    die('Erreur SQL');
}

$posts = $query->fetchAll(PDO::FETCH_OBJ);

require_once '../elements/header.php';

?>

<ul>
    <?php foreach ($posts as $post): ?>
    <li><?= $post->name ?></li>
    <?php endforeach ?>
</ul>



<?php require_once '../elements/footer.php'; ?>