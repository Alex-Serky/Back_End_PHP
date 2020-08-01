<?php

namespace App;

use Parsedown;

/**
 * Permet de représenter un article au lieu de son intégralité
 * dans notre cas autour de 150 mots.
 */
class Post
{
    public $id;
    public $name;
    public $content;
    public $created_at;

    public function __construct()
    {
        if (is_int($this->created_at) || is_string($this->created_at)) {
            $this->created_at = new \DateTime('@' . $this->created_at);
        }
    }

    /**
     * Permet de récupérer un extrait du texte.
     *
     * @return string
     */
    public function getExcerpt(): string
    {
        return substr($this->content, 0, 150);
    }

    public function getBody()
    {
        $parseDown = new Parsedown();
        $parseDown->setSafeMode(true);
        return $parseDown->text($this->content);
    }
}