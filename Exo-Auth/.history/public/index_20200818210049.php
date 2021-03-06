<?php

require '../vendor/autoload.php';

use App\Auth;

$pdo = new PDO("sqlite:../data.sqlite", null, null, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);
$users = $pdo->query('SELECT * FROM users')->fetchAll();
$auth = new Auth($pdo);
$user = $auth->user();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="p-4">
    <h1>Accéder aux pages</h1>
    <?php if (isset($_GET['login'])) : ?>
        <div class="alert alert-success">
            Vous êtes bien identifié(e)s.
        </div>
    <?php endif ?>
    <?php if ($user) : ?>
        <p>
            Vous êtes connecté(e)s en tant que <?= $user->username ?> -
            <a href="logout.php">Se déconnecter</a>
        </p>
        <?php endif ?>

        <ul>
            <li><a href="admin.php">Page réservée à l'administrateur</a></li>
            <li><a href="user.php">Page réservée à l'utilisateur</a></li>
        </ul>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pseudo</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['role'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
</body>

</html>