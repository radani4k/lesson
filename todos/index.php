<?php

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

session_start();

require_once 'models/User.class.php';
require_once 'models/ToDo.class.php';
require_once 'models/Helper.class.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

if (User::status()) {
    switch ($action) {
        case 'add_todo':
            require_once 'views/add_todo.php';
            break;
        case 'add_user':
            require_once 'views/add_user.php';
            break;
        case 'list_user':
            $userObj = new User();
            $user_list = $userObj->getUsers();
            require_once 'views/list_user.php';
            break;
        case 'list_doto':
            $todoObj = new ToDo();
            $todo_list = $todoObj->getTodos(User::getIdUser());
            require_once 'views/list_doto.php';
            break;
        case 'index':
        default:
            Helper::goToPage();
            break;
    }
} else {
    require_once 'views/auth.php';
}