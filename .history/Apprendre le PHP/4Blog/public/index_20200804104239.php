<?php

require '../vendor/autoload.php';
// require '../elements/header.php';

$uri = $_SERVER['REQUEST_URI'];
$router = new AltoRouter();
$router->map('GET', '/', function() {
    echo 'Salut';
});
$router->map('GET', '/nous-contacter', function() {
    echo 'Nous contacter!';
});
$router->map('GET', '/blog/[*]-[i]', function() {
    echo "Blog";
});

$match = $router->match();
dump($match);
die();
if ($match !== null) {
    $match['target']($match['params']['slug'], $match['params']['id']);
}

// require '../elements/footer.php';
?>
