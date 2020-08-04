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
$router->map('GET', '/blog/[*:slug]-[i:id]', function($slug, $id) {
    echo "Je suis sur l'article $slug avec le numéro $id";
});

$match = $router->match();
if ($match !== null) {
    // $match['target']($match['params']['slug'], $match['params']['id']); // Ne correspond pas convenablement à notre situation
    call_user_func_array($match['target'], $match['params']); // Appelle une fonction de rappel avec les paramètres rassemblés en tableau
}

// require '../elements/footer.php';
?>
