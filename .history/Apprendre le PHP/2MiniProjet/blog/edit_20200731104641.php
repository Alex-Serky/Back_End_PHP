<?php

$pdo = new PDO('sqlite:../data.db', null, null, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Comment gérer les erreurs et émettre une exception
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);

$error = null;
try {
    if (isset($_GET['name']) && isset($_GET['content'])) {
        $query->prepare('UPDATE posts SET name = :name, content = :content WHERE id = :id');
    }
    $query = $pdo->prepare('SELECT * FROM posts WHERE id = :id'); // Permet d'éviter toutes les injections SQL
    $query->execute([
        'id' => $_GET['id'] // Paramètre récupérer dans l'url pour la même raison
    ]);
    $post = $query->fetch();
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
        <form action="" method="post">
            <div class="form-group">
                <input type="text" name="name" class="form-control" value="<?= htmlentities($post->name) ?>">
            </div>
            <div class="form-group">
                <textarea name="name" class="form-control"><?= htmlentities($post->content) ?></textarea>
            </div>
            <button class="btn btn-primary">Sauvegarder</button>
        </form>
    <?php endif ?>
</div>


<?php require_once '../elements/footer.php'; ?>