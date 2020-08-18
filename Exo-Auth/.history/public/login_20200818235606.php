<?php

require '../vendor/autoload.php';
use App\App;

session_start();

$auth = App::getAuth();
$error = false;

/*
if ($auth->user() !== null) {
    header('Location: index.php');
    exit();
}
*/

if (!empty($_POST)) {
    $pdo = new PDO("sqlite:../data.sqlite", null, null, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    $auth = new Auth($pdo);
    $user = $auth->login($_POST['username'], $_POST['password']);
    if ($user) {
        header('Location: index.php?login=1');
        exit();
    }
    $error = true;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="p-4">
    <h1>Se connecter</h1>

    <?php if ($error): ?>
        <div class="alert alert-danger">
            Identifiant ou mot de passe incorrect.
        </div>
    <?php endif ?>

    <?php if ($_GET['forbid']): ?>
        <div class="alert alert-danger">
            L'accès à la page est interdit.
        </div>
    <?php endif ?>
    <form action="" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Pseudo">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Mot de passe">
        </div>
        <button class="btn btn-primary">Se connecter</button>
    </form>
    <?php dump($_SESSION) ?>
</body>
</html>