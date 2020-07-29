<?php

require_once 'class/Message.php';

$errors = null;
if (isset($_POST['username']) && isset($_POST['message'])) {
    $message = new Message($_POST['username'], $_POST['message']);
    if ($message->isValid()) {
        $message = "Votre formulaire a été envoyé.";
    } else {
        $errors = "Votre formulaire est invalide.";
    }

}

$title = "Livre d'or";
require_once 'elements/header.php';
?>

<div class="container">
    <h1>Livre d'Or</h1>

    <?php if($errors): ?>
        <div class="alert alert-danger">
            <?= $errors ?>
        </div>
    <?php endif ?>
    <?php if($message): ?>
        <div class="alert alert-succes">
            <?= $message ?>
        </div>
    <?php endif ?>

    <form action="" method="post">
        <div class="form-group">
            <input type="text" name="username"
                class="form-control" placeholder="Votre Pseudo">
        </div>
        <div class="form-group">
            <textarea name="message" placeholder="Votre texte" class="form-group"></textarea>
        </div>
        <button class="btn btn-primary">Envoyer</button>
    </form>
</div>





<?php require 'elements/footer.php'; ?>