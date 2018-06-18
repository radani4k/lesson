<?php

class Connection
{
    private static $instance;
    protected $connect;

    protected function __construct()
    {
        $this->connect = new PDO(
            'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=' . Config::DB_CHAR,
            Config::DB_USER,
            Config::DB_PASS
        );
    }

    public static function instance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connect;
    }
}