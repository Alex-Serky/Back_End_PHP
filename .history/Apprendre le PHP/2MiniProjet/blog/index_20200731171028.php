<?php

require_once "../Post.php";

$pdo = new PDO('sqlite:../data.db', null, null, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Comment gérer les erreurs et émettre une exception
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);

$error = null;
try {
    if (isset($_POST['name'], $_POST['content'])) {
        $query = $pdo->prepare('INSERT INTO posts (name, content, created_at) VALUES(:name, :content, :created)');
        $query->execute([
            'name' => $_POST['name'],
            'content' => $_POST['content'],
            'created' => time()
        ]);
        header('Location: /blog/edit.php?id=' . $pdo->lastInsertId());
        exit();
    }

    $query = $pdo->query('SELECT * from posts');
    $posts = $query->fetchAll(PDO::FETCH_CLASS, 'Post');
} catch (PDOException $e) {
    $error = $e->getMessage();
}


require_once '../elements/header.php';

?>
<div class="container">
    <?php if ($error) : ?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
    <?php else : ?>
        <?php foreach ($posts as $post) : ?>
            <h2>
                <a href="/blog/edit.php?id<?= $post->id ?>"><?= htmlentities($post->name) ?></a>
            </h2>
            <p>
                <?= nl2br(htmlentities($post->content)) ?>
            </p>
        <?php endforeach ?>
        <form action="" method="post">
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Votre article">
            </div>
            <div class="form-group">
                <textarea name="content" class="form-control" placeholder="Ecrire votre texte"></textarea>
            </div>
            <button class="btn btn-primary">Sauvegarder</button>
        </form>
    <?php endif ?>
</div>

<?php require_once '../elements/footer.php'; ?>