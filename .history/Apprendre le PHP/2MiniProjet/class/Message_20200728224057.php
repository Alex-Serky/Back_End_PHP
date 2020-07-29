<?php

class Message
{
    private $username;
    private $message;

    public function __construct(string $username, string $message, ?Datetime $Date = null)
    {
        $this->username = $username;
        $this->message = $message;
    }

    public function isValid(): bool
    {
        return empty($this->getErrors());
    }

    public function getErrors(): array
    {
        $errors = [];
        if (strlen($this->username) < 3) {
            $errors['username'] = "Votre pseudo est trop court.";
        }
        if(strlen($this->message) < 10){
            $errors['message'] = "Votre message est trop court.";
        }
        return $errors;
    }
}