<?php

class PostRepo
{
    public static function create($title, $body, $userId)
    {
        $query = self::connection()->prepare('
            INSERT INTO `posts` (`title`, `body`, `user_id`, `timestamp`)
            VALUES (:title, :body, :user_id, NOW());
        ');
        $query->bindParam(':title', $title, PDO::PARAM_STR);
        $query->bindParam(':body', $body, PDO::PARAM_STR);
        $query->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, 'Post');

        return $query->fetchColumn();
    }

    public static function getAll()
    {
        $query = self::connection()->query('
            SELECT p.id, p.title, p.body, p.user_id, u.email AS user_email, p.timestamp AS date, COUNT(c.id) AS comments_number
            FROM posts AS p
            JOIN users AS u ON u.id = p.user_id
            LEFT JOIN comments AS c ON c.post_id = p.id
            GROUP BY p.id
            ORDER BY p.timestamp DESC
        ');

        return $query->fetchAll(PDO::FETCH_CLASS, 'Post');
    }

    public static function getOne($id)
    {
        $query = self::connection()->prepare('
            SELECT p.id, p.title, p.body, p.user_id, u.email AS user_email, p.timestamp AS date
            FROM posts AS p
            JOIN users AS u ON u.id = p.user_id
            WHERE p.id = :id
        ');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, 'Post');

        return $query->fetch();
    }

    public static function getAllByUserId($userId)
    {
        $query = self::connection()->prepare('
            SELECT p.id, p.title, p.body, p.user_id, u.email AS user_email, p.timestamp AS date
            FROM posts AS p
            JOIN users AS u ON p.user_id = u.id
            WHERE p.user_id = :user_id
        ');
        $query->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_CLASS, 'Post');
    }

    public static function delete($id)
    {
        $query = self::connection()->prepare('
            DELETE FROM `posts` WHERE id = :id LIMIT 1
        ');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchColumn();
    }

    private static function connection()
    {
        return Connection::instance()->getConnection();
    }
}