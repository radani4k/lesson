<?php

session_start();

require_once 'models/User.class.php';
require_once 'models/ToDo.class.php';
require_once 'models/Helper.class.php';


if (!User::status() || !isset($_POST)) {
    Helper::goToPage();
    exit();
}

$type = isset($_POST['type']) ? $_POST['type'] : '';

if ('save' == $type) {
    if (isset($_POST['message'])) {
        $todo = New ToDo();
        $todo->addTodo(User::getIdUser(), $_POST['message']);
    }
}

if ('change' == $type) {
    if (isset($_POST['id']) && isset($_POST['status'])) {
        $todo = New ToDo();
        $todo->setTodoStatus($_POST['id'], $_POST['status']);
    }
}

Helper::goToPage();