<?php

require '../vendor/autoload.php';
// require '../elements/header.php';

$uri = $_SERVER['REQUEST_URI'];
$router = new AltoRouter();
$router->map('GET', '/', function() {
    echo 'Salut';
});
$router->map('GET', '/nous-contacter', function() {
    echo 'Nous contact';
});
$router->map('GET', '/blog/[*:slug]-[i:id]', function() {
    echo 'Blog';
});

$match = $router->match();
dump($match);

// require '../elements/footer.php';
?>
