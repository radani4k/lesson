<?php

class Post
{
    protected $defaulFormat = "Y-m-d H:i:s";

    public function date($formatTo = 'd/m/Y')
    {
        $dateObj = DateTime::createFromFormat($this->defaulFormat, $this->date);
        return $dateObj->format($formatTo);
    }

    public function preview($len = 50)
    {
        if (strlen($this->body) >= $len) {
            return substr($this->body, 0, $len) . '...';
        }

        return $this->body;
    }
}