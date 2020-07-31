<?php

class Post
{
    public $id;
    public $name;
    public $content;

    public function getExcerpt()
    {
        return substr($this->content, 150);
    }
}