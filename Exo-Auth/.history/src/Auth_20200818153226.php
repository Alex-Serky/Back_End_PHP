<?php

namespace App;

use PDO;

class Auth
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function user(): ?user
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $id = $_SESSION['auth'] ?? null;
        if ($id === false) {
            return null;
        }
        $query = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $query->execute([$id]);
        $user = $query->fetchObject(User::class);
        return $user ?: null;
    }

    public function login(string $username, string $password): ?user
    {
        // Trouver l'utilisateur qui correspond au username
        $query = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $query->execute(['username' => $username]);
        $user = $query->fetchObject(User::class);
        if ( $user === false ) {
            return null;
        }

        // On vérifie password_verify que l'utilisateur corresponde
        if (password_verify($password, $user->password)) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['auth'] = $user->id;
            return $user;
        }
        return null;
    }
}