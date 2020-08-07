<?php

require 'vendor/autoload.php';

$pdo = new PDO("sqlite:./data.sql", null, null, [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
$products = $pdo->query("SELECT * FROM products LIMIT 20")->fetchAll();
dd($products);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Biens immobiliers</title>
</head>
<body>
    <div class="container">
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
                <tr>
                <?php foreach($products as $product): ?>
                    <td>#<?= $product['id'] ?></td>
                    <td><?= $product['name'] ?></td>
                    <td><?= $product['price'] ?> €</td>
                    <td><?= $product['city'] ?></td>
                    <td><?= $product['address'] ?></td>
                <?php endforeach ?>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>