<?php

class Message
{
    const LIMIT_USERNAME = 3;
    const LIMIT_MESSAGE = 10;
    private $username;
    private $message;
    private $date;

    public function __construct(string $username, string $message, ?Datetime $Date = null)
    {
        $this->username = $username;
        $this->message = $message;
        $this->date = $date ?: new DateTime(); // Je veux que tu crée une date et s'il n'y en a pas, tu crée une nouvelle.
    }

    public function isValid(): bool
    {
        return empty($this->getErrors());
    }

    public function getErrors(): array
    {
        $errors = [];
        /**
         * Est-ce que la longueur de chaîne caractères " " est < " "? (strln)
         */
        if (strlen($this->username) < self::LIMIT_USERNAME) {
            $errors['username'] = "Votre pseudo est trop court.";
        }
        if(strlen($this->message) < self::LIMIT_MESSAGE){
            $errors['message'] = "Votre message est trop court.";
        }
        return $errors;
    }

    public function toJSON(): string
    {
        return json_encode([
            'username' => $this->username,
            'message' => $this->message,
            'date' => $this->date->getTimestamp()
        ]);
    }
}