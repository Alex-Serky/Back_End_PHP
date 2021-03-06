<?php require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions.php'; ?>
<?php require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'auth.php'; ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>
        <?php if (isset($title)): ?>
            <?= $title ?>
        <?php else: ?>
            Mon site
        <?php endif; ?>
    </title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <a class="navbar-brand" href="#">Mon site</a>
        <button class="navbar-toggler" type="button"
                data-toggle="collapse" data-target="#navbarsExampleDefault"
                aria-controls="navbarsExampleDefault" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse"
            id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <?= nav_menu('nav-link') ;?>
            </ul>
            <ul class="navbar-nav">
                <?php if(est_connecte()): ?>
                    <li class="nav-item">
                        <a href="/logout.php">Se déconnecter</a>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </nav>

    <main role="main" class="container">
