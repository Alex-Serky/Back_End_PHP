<?php

namespace App;

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

    }
}