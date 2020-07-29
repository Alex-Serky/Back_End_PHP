<?php

class Message
{
    const LIMIT_USERNAME = 3;
    const LIMIT_MESSAGE = 10;
    private $username;
    private $message;
    private $date;

    public static function fromJSON(string $json): Message
    {
        $data = json_decode($json, true);
        return new self($data['username'], $data['message'], new DateTime("@" . $data['date']));
    }

    public function __construct(string $username, string $message, ?DateTime $date = null)
    {
        $this->username = $username; // On définit pour la propriété username la valeur qui sera passer au niveau du constructeur
        $this->message = $message;
        $this->date = $date ?: new DateTime(); // Je veux que tu crées une date et s'il n'y en a pas, tu crées la date du jour.
    }


    public function isValid(): bool
    {
        return empty($this->getErrors());
    }

    public function getErrors(): array
    {
        $errors = [];
        /**
         * Est-ce que la taille de la chaîne caractères " " est < " "? (strln)
         */
        if (strlen($this->username) < self::LIMIT_USERNAME) {
            $errors['username'] = "Votre pseudo est trop court.";
        }
        if(strlen($this->message) < self::LIMIT_MESSAGE){
            $errors['message'] = "Votre message est trop court.";
        }
        return $errors;
    }

    public function toHTML(): string
    {
        $username = htmlentities($this->username);
        $this->date->setTimezone(new DateTimeZone('Europe/Paris'));
        $date = $this->date->format('d/m/Y à H:i');
        $message = nl2br(htmlentities($this->message));  // Permet d'insérer un retour à la ligne HTML à chaque nouvelle ligne/
        return <<<HTML
        <p>
            <strong>{$username}</strong> <em>le {$date}</em><br/>
            {$message}
        </p>
HTML;
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