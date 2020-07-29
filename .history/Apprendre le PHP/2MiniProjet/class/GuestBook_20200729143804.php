<?php

require_once 'Message.php';

class GuestBook
{
    private $file;

    public function __construct(string $file)
    {
        $directory = dirname($file); // Dossier dans lequel on souhaiterait sauvegarder le fichier
        if (!is_dir($directory)) {
            // Si ce n'est pas un dossier, il va falloir le créer
            mkdir($directory, 0777, true);
        }
        if(!file_exists($file)){
            touch($file); // Création de fichier
        }
        $this->file = $file;
    }

    public function addMessage(Message $message): void
    {
        file_put_contents($this->file, $message->toJSON() . PHP_EOL, FILE_APPEND);
    }

    public function getMessages(): array
    {
        $content = trim(file_get_contents($this->file));
        $lines =explode(PHP_EOL, $content);
        $messages = [];
        foreach ($lines as $line) {
            $data = json_decode($line, true);
            $messages[] = new Message($data['username'], $data['message'], new DateTime("@" . $data["date"]));
        }
        return array_reverse($messages);
    }
}