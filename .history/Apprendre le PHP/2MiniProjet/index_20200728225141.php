<?php

require_once 'class/Message.php';

$errors = null;
if (isset($_POST['username']) && isset($_POST['message'])) {
    $message = new Message($_POST['username'], $_POST['message']);
    if ($message->isValid()) {
        $message = "Votre formulaire a été envoyé.";
    } else {
        $errors = $message->getErrors();
    }
}

$title = "Livre d'or";
require_once 'elements/header.php';
?>

<div class="container">
    <h1>Livre d'Or</h1>

    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
            Votre formulaire est invalide.
        </div>
    <?php endif ?>
    <?php if ($message) : ?>
        <div class="alert alert-success">
            <?= $message ?>
        </div>
    <?php endif ?>

    <form action="" method="post">
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Votre Pseudo">
            <?php if (isset($errors['username'])) : ?>
                <div class="invalid-feedback">
                    <?= $errors['username'] ?>
                </div>
            <?php endif ?>
        </div>
        <div class="form-group">
            <textarea name="message" placeholder="Votre texte" class="form-group"></textarea>
        </div>
        <?php if (isset($errors['message'])) : ?>
            <div class="invalid-feedback">
                <?= $errors['message'] ?>
            </div>
        <?php endif ?>
        <button class="btn btn-primary">Envoyer</button>
    </form>
</div>





<?php require 'elements/footer.php'; ?>