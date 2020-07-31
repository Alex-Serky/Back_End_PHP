<?php

$pdo = new PDO('sqlite:../data.db', null, null, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Comment gérer les erreurs et émettre une exception
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);

$error = null;
try {
    $query = $pdo->prepare('SELECT * from posts WHERE id = :id');
    $query->execute([
        'id' => $_GET['id']
    ]);
    $posts = $query->fetchAll();
} catch (PDOException $e) {
    $error = $e->getMessage();
}


require_once '../elements/header.php';

?>

<?php if ($error) : ?>
    <div class="alert alert-danger">
        <?= $error ?>
    </div>
<?php else : ?>
    <ul>
        <?php foreach ($posts as $post) : ?>
            <li>
                <a href="/blog/edit.php?id=<?= $post->id ?>">htmlentities(<?= $post->name ?>)</a>
            </li>
        <?php endforeach ?>
    </ul>
<?php endif ?>



<?php require_once '../elements/footer.php'; ?>