<?php

class Post
{
    public $id;
    public $name;
    public $content;
    public $created_at;

    public function __construct()
    {
        $this->created = new DataTime('@' . $this->created_at);
    }

    public function getExcerpt(): string
    {
        return substr($this->content, 0, 150);
    }
}