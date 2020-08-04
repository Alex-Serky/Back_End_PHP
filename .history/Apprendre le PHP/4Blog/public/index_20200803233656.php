<?php

require '../vendor/autoload.php';

$page = $_GET['page'] ?? '404';
require '../elements/header.php';
if ($page === 'blog') {
    require '../elements/footer.php';
}
?>
