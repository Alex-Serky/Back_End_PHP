<?php

namespace Alexis\Guestbook;


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
        $content = trim(file_get_contents($this->file)); // On récupère le contenu du fichier et trim() pour enlever la dernière ligne 
        $lines =explode(PHP_EOL, $content); // On récupère chaque ligne du fichier individuellement
        $messages = [];
        foreach ($lines as $line) {
            $messages[] = Message::fromJSON($line);
        }
        return array_reverse($messages);
    }
}