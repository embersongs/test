<?php
namespace Admin\Blog;

class User {
    public $name = "user";

    public function __toString()
    {
        return $this->name . PHP_EOL;
    }
}