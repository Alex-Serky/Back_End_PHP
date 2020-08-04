<h1>Ma homepage</h1>

<!-- Génération automatique de l'url dynamique de la page -->
<a href="<?= $router->generate('contact') ?>">Nous contacter</a>
<a href="<?= $router->generate('article', ['slug' => 'importe-quoi', 'id' => 56]) ?>">Voir l'article</a>