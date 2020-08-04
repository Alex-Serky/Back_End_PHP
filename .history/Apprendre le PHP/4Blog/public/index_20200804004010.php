<?php

require '../vendor/autoload.php';
// require '../elements/header.php';

$uri = $_SERVER['REQUEST_URI'];
$router = new AltoRouter();
$router->map('GET', '/', function() {
    echo 'Salut';
});
$router->map('GET', '/nous-contacter', function() {
    echo 'Nous contacter';
});
$router->map('GET', '/blog/[*:slug]-[i:id]', function() {
    echo "Je suis sur l'article $slug avec le numéro $id";
});

$match = $router->match();
if ($match !== null) {
    $match['target']();
}

// require '../elements/footer.php';
?>
