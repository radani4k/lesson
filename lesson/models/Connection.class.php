<?php

require_once 'Config.class.php';

class Connection
{
    public static function base() {
        return new PDO(
            'mysql:host=' . Config::mysqlHost . ';dbname=' . Config::mysqlName . ';charset=' . Config::mysqlChar,
            Config::mysqlUser,
            Config::mysqlPass
        );
    }
}