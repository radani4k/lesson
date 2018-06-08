<?php

class ToDo
{
    private $connect;
    private $statusTypes = array('hide', 'done');

    function __construct() {
        $this->connect = Connection::base();
    }

    public function addTodo($idUser, $message) {
        $query = $this->connect->prepare('
            INSERT INTO todo_list (id_user , message)
            VALUES (:id_user, :message)
        ');
        $query->bindParam(':id_user', $idUser, PDO::PARAM_INT);
        $query->bindParam(':message', $message, PDO::PARAM_STR);
        $query->execute();

        return $query->fetchColumn();
    }

    public function getTodos($idUser) {
        $query = $this->connect->prepare('
            SELECT id, id_user, message, status
            FROM todo_list
            WHERE id_user = :id_user AND (status = "done" OR status = "show")
        ');
        $query->bindParam(':id_user', $idUser, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll();
    }

    public function setTodoStatus($id, $status) {
        if (!in_array($status, $this->statusTypes)) {
            $status = 'show';
        }
        $query = $this->connect->prepare('
            UPDATE todo_list
            SET status = :status
            WHERE id = :id
        ');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->execute();

        return $query->fetchColumn();
    }
}