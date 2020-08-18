<?php

use App\Auth;

$pdo = new PDO("sqlite:../data.sqlite", null, null, [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
$auth = new Auth($pdo);
$user = $auth->user();
if ($user === null || $user->role !== 'admin') {
    header('Location: index.php?forbid = 1');
    exit();
}

?>

Réservé à l'admin