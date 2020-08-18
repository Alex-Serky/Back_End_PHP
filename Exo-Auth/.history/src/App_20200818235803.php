<?php

namespace App;

use PDO;

class App
{
    public static $pdo;
    public static $auth;

    public static function getPDO(): PDO
    {
        if (!self::$pdo) { // Si $pdo n'existe pas alors on la crée et on sauvegarde le résultat dans:
            self::$pdo = new PDO("sqlite:../data.sqlite", null, null, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        }
        return self::$pdo;
    }

    public static function getAuth(): Auth
    {
        if (!self::$auth) { // Si $pdo n'existe pas alors on la crée et on sauvegarde le résultat dans:
            self::$auth = new Auth(self::getPDO(), '/login.php');
        }
        return self::$auth;
    }
}