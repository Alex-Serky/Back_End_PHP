<?php

$pdo = new PDO('sqlite:../data.db');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Comment gérer les erreurs et émettre une exception
$query = $pdo->query('SELECT * from posts');

$posts = $query->fetchAll(PDO::FETCH_OBJ);

require_once '../elements/header.php';

?>

<ul>
    <?php foreach ($posts as $post): ?>
    <li><?= $post->name ?></li>
    <?php endforeach ?>
</ul>



<?php require_once '../elements/footer.php'; ?>