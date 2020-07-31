<?php

class Post
{
    public $id;
    public $name;
    public $content;

    public function __construct()
    {
        var_dump($this->name);
    }

    public function getExcerpt(): string
    {
        return substr($this->content, 0, 150);
    }
}