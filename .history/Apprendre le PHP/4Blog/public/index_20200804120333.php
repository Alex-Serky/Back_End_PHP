<?php

require '../vendor/autoload.php';

// $uri = $_SERVER['REQUEST_URI'];
$router = new AltoRouter();
$router->map('GET', '/', function() {
    echo 'Salut';
});
$router->map('GET', '/nous-contacter', 'contact');
$router->map('GET', '/blog/[*:slug]-[i:id]', 'blog/article');

$match = $router->match();
if ($match !== null) {
    require '../elements/header.php';
    if (is_callable($match['target'])) {
        # Appelle une fonction de rappel avec les paramètres rassemblés en tableau
        call_user_func_array($match['target'], $match['params']);
    } else {
        require "../templates/{$match['target']}";
    }
    require '../elements/footer.php';
}
?>
