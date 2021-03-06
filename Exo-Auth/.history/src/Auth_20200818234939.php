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

    public function requireRole(string $role): void
    {
        $user = $this->user();
        if ($user === null || $user->role !== $role) {
            header('Location: {$this->loginPath}?forbid = 1');
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