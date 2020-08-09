<?php

use App\NumberHelper;

define('PER_PAGE', 20);

require 'vendor/autoload.php';
$pdo = new PDO("sqlite:./data.sql", null, null, [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$query = "SELECT * FROM products";
$queryCount = "SELECT COUNT(id) AS count FROM products";
$params = [];

// Recherche par ville
if (!empty($_GET['q'])) {
    $query .= " WHERE city LIKE :city";
    $queryCount .= " WHERE city LIKE :city";
    $params['city'] =  '%' . $_GET['q'] . '%';
}

// Pagination
$page = (int)($_GET['p'] ?? 1);
$offset = ($page - 1) * PER_PAGE;

$query .= " LIMIT " . PER_PAGE . " OFFSET $offset";

$statement = $pdo->prepare($query);
$statement->execute($params);
$products = $statement->fetchAll();

$statement = $pdo->prepare($queryCount);
$statement->execute($params);
$count = (int)$statement->fetch()['count'];
dd($count);
$pages = ceil($count / PER_PAGE);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biens immobiliers</title>

    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body class="p-5">
    <h1>Les Biens immobiliers</h1>
    <form action="" class="mb-4">
        <div class="form-group">
            <input type="text" class="form-control mb-2" name="q" placeholder="Rechercher par ville" value="<?= htmlentities($_GET['q'] ?? null) ?>">
            <button class="btn btn-primary">Rechercher</button>
        </div>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Ville</th>
                <th>Adresse</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td>#<?= $product['id'] ?></td>
                    <td><?= $product['name'] ?></td>
                    <td><?= NumberHelper::price($product['price']) ?></td>
                    <td><?= $product['city'] ?></td>
                    <td><?= $product['address'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <?php if ($pages > 1 && $page < 1): ?>
        <a href="?p=<?= $page - 1 ?>" class="btn btn-primary">Page précédente</a>
    <?php endif ?>
    <?php if ($pages > 1 && $page < $pages): ?>
        <a href="?p=<?= $page + 1 ?>" class="btn btn-primary">Page suivante</a>
    <?php endif ?>
</body>

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>