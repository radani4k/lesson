<?php

class User
{
    public static function setIdUser($id) {
        if (isset($id)) {
            $_SESSION['id_user'] = (int) $id;
        }
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

    public static function out() {
        $_SESSION['id_user'] = 0;
    }
}