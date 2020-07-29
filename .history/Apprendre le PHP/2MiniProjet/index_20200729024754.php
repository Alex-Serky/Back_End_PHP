<?php

require_once 'class/Message.php';
require_once 'class/GuestBook.php';

$errors = null;
$success = false;
if (isset($_POST['username']) && isset($_POST['message'])) {
    $message = new Message($_POST['username'], $_POST['message']);
    if ($message->isValid()) {
        $guestBook = new GuestBook(__DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'messages');
        $guestBook->addMessage($message);
        $success = true;
        $_POST = []; // Permet de vider les informations une fois envoyées.
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
    <?php if (empty($errors)) : ?>
        <div class="alert alert-success">
            Votre formulaire a été envoyé.
        </div>
    <?php endif ?>


    <form action="" method="post">
        <div class="form-group">
            <input value="<?= htmlentities($_POST['username'] ?? '') ?>" type="text" name="username" placeholder="Votre Pseudo" class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>">
            <?php if (isset($errors['username'])) : ?>
                <div class="invalid-feedback">
                    <?= $errors['username'] ?>
                </div>
            <?php endif ?>
        </div>
        <div class="form-group">
            <textarea name="message" placeholder="Votre message"
                class="form-control <?= isset($errors['message']) ? 'is-invalid' : '' ?>">
                <?= htmlentities($_POST['message'] ?? '') ?>
            </textarea>
            <?php if (isset($errors['message'])) : ?>
                <div class="invalid-feedback">
                    <?= $errors['message'] ?>
                </div>
            <?php endif ?>
        </div>
        <button class="btn btn-primary">Envoyer</button>
    </form>
</div>

<?php require 'elements/footer.php'; ?>