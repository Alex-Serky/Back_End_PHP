<?php

$pdo = new PDO('sqlite:../data.db', null, null, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Comment gérer les erreurs et émettre une exception
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);

$error = null;
try {
    $query = $pdo->prepare('SELECT * FROM posts WHERE id = :id'); // Permet d'éviter toutes les injections SQL
    $query->execute([
        'id' => $_GET['id']
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
                <input type="text" name="name" 
                    class="form-control" 
                    value="<?= htmlentities($post->name) ?>">
            </div>
            <textarea class="form-group">
            <input type="text" name="content"
                class="form-control"
                value="<?= htmlentities($post->content) ?>">
        </textarea>
            <button class="btn btn-primary">Sauvegarder</button>
        </form>
    <?php endif ?>
</div>


<?php require_once '../elements/footer.php'; ?>