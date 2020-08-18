<?php

namespace App;

use PDO;

class Auth
{
    private $pdo;
    private $loginPath;

    public function __construct(PDO $pdo, string $loginPath)
    {
        $this->pdo = $pdo;
        $this->loginPath = $loginPath;
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

    /**
     *  ... veulent dire qu'on autorise plusieurs paramètres qui sont des chaînes de caractères
     * et cette variable est un tableau
     *
     * @param string ...$roles
     * @return void
     */
    public function requireRole(string ...$roles): void
    {
        $user = $this->user();
        if ($user === null || !in_array($user->role, $roles)) {
            header("Location: {$this->loginPath}?forbid = 1");
            exit();
        }
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