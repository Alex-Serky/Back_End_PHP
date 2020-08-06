<?php

require '../vendor/autoload.php';

$uri = $_SERVER['REQUEST_URI'];
/* Documentation de AltoRouter via packagist.org */
$router = new AltoRouter();

$router->map('GET', '/', 'home');
$router->map('GET', '/nous-contacter', 'contact', 'contact');
$router->map('GET', '/blog/[*:slug]-[i:id]', 'blog/article', 'article');

$match = $router->match();
if (is_array($match)) {
    require '../elements/header.php';
    if (is_callable($match['target'])) {
        # Appelle une fonction de rappel avec les paramètres rassemblés en tableau
        call_user_func_array($match['target'], $match['params']);
    } else {
        $params = $match['params'];
        ob_start(); // Empêche la temporisation de sortie
        require "../templates/{$match['target']}.php";
        $pageContent = ob_get_clean(); // Lit le contenu courant du tampon puis l'efface.
    }
    require '../elements/layout.php';
} else {
    echo '404';
}
?>
