<?php

$erreur = null;
$password = '$2y$12$UiZ4ReDGes0ZDsNzqTU7seJ5cSL4StP4AJRfJk57J5OLrIy26vDQ.';

if (!empty($_POST['pseudo']) && !empty($_POST['motdepasse'])) {
    if ($_POST['pseudo'] === 'John' && password_verify($_POST['motdepasse'], $password)) {
        // On connecte l'utilisateur
        session_start();
        $_SESSION['connecte'] = 1;
        header('Location: /dashboard.php');
        exit();
    }else{
        $erreur = 'Identifiants incorrects';
    }
}

require_once 'functions/auth.php';
if (est_connecte()) {
    header('Location: /dashboard.php');
    exit();
}

require_once 'elements/header.php';
?>

<?php if($erreur): ?>
    <div class="alert alert-danger">
        <?= $erreur ?>
    </div>
<?php endif ?>

<form action="" method="POST">
    <div class="form-group">
        <input class="form-control" type="text" name="pseudo" placeholder="Nom d'utilisateur">
    </div>
    <div class="form-group">
        <input class="form-control" type="password" name="motdepasse" placeholder="Votre mot de passe">
    </div>
    <button class="btn btn-primary" type="submit">Se connecter</button>
</form>

<?php require_once 'elements/footer.php'; ?>