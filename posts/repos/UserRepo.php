<?php

class UserRepo
{
    public static function setUser($email, $password) {
        $salt = Salt::generate();
        $preparePassword = self::preparePassword($password, $salt);

        $query = self::connection()->prepare('
            INSERT INTO `users` (`email`, `password`, `salt`)
            VALUES (:email, :password, :salt)
        ');
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', $preparePassword, PDO::PARAM_STR);
        $query->bindParam(':salt', $salt, PDO::PARAM_STR);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, 'User');

        return $query->fetchColumn();
    }

    public static function getUser($email, $password) {
        $user = self::getUserByEmail($email);

        if ($user && self::preparePassword($password, $user->salt) == $user->password) {
            return $user;
        }

        return false;
    }

    public static function getUserByEmail($email)
    {
        $query = self::connection()->prepare('SELECT * FROM `users` WHERE `email`=:email');
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, 'User');

        return $query->fetch();
    }

    public static function removeUser($id) {
        $query = self::connection()->prepare('DELETE FROM `email` WHERE `id`=:id LIMIT 1');
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchColumn();
    }

    private static function preparePassword($password, $salt)
    {
        return hash('sha256', $password . $salt);
    }

    private static function connection()
    {
        return Connection::instance()->getConnection();
    }
}