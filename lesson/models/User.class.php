<?php

require_once 'Connection.class.php';

class User
{
    private $connect;

    function __construct() {
        $this->connect = Connection::base();
    }

    public function setUser($login, $password) {
        $query = $this->connect->prepare('INSERT INTO `users` (`login`, `password`) VALUES (:login, md5(:password))');
        $query->bindParam(':login', $login, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->execute();

        return $query->fetchColumn();
    }

    public function getUser($login, $password) {
        $query = $this->connect->prepare('SELECT `id`, `login`, `password` FROM `users` WHERE `login`=:login AND `password`=md5(:password)');
        $query->bindValue(':login', $login, PDO::PARAM_STR);
        $query->bindValue(':password', $password, PDO::PARAM_STR);
        $query->execute();

        return $query->fetch();
    }

    public function getUsers() {
        $query = $this->connect->query('SELECT `id`, `login` FROM `users`');
        $query->execute();

        return $query->fetchAll();
    }

    public function removeUser($id) {
        $query = $this->connect->prepare('DELETE FROM `users` WHERE `id`=:id LIMIT 1');
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchColumn();

    }

    public static function setIdUser($id) {
        $id = (int) $id;
        $_SESSION['id_user'] = $id;
    }

    public static function getIdUser() {
        if (isset($_SESSION['id_user'])) {
            return $_SESSION['id_user'];
        }

        return false;
    }

    public static function status() {
        if (self::getIdUser()) {
            return true;
        }
        return false;
    }
}