<?php

require_once 'Message.php';

class GuestBook
{
    private $file;

    public function __construct(string $file)
    {
        $directory = dirname($file); // Dossier dans lequel on veut sauvegarder le fichier
        if (!is_dir($directory)) {
            // Si ce n'est pas un dossier, il va falloir le créer
            mkdir($directory, 0777, true);
        }
        if(!file_exists($file)){
            touch($file); // Création de fichier
        }
    }

    public function addMessage(Message $message): void
    {
        file_put_contents($this->file, $message->toJSON() . PHP_EOL, FILE_APPEND);
    }
}