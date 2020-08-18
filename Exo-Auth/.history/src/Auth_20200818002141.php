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

    public function usre(): ?user
    {
        
    }

    public function login(string $username, string $password): ?user
    {
        // Trouver l'utilisateur qui correspond au username
        $query = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $query->execute(['username' => $username]);
        $query->setFetchMode(PDO::FETCH_OBJ, User::class);
        $user = $query->fetch();
        if ( $user === false ) {
            return null;
        }

        // On vérifie password_verify que l'utilisateur corresponde
        if (password_verify($password, $user->password)) {
            return $user;
        }
        return null;
    }
}