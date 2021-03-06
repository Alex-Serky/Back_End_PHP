<?php

use App\Post;

require_once '../vendor/autoload.php';
require_once '../elements/cnx.php';

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

    /** @var Post[] Tableau d'articles */
    $posts = $query->fetchAll(PDO::FETCH_CLASS, Post::class);
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
            <?php dump($post) ?>
            <h2>
                <a href="/blog/edit.php?id=<?= $post->id ?>"><?= htmlentities($post->name) ?></a>
            </h2>
            <p class="small text-muted">
                Ecrit le <?= $post->created_at->format('d/m/Y à H:i') ?>
            </p>
            <!-- <p>
                <?= nl2br(htmlentities($post->getExcerpt())) ?>
            </p> -->
            <p>
                <?= $post->getBody() ?>
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