<?php

session_start();

require_once 'models/User.class.php';
require_once 'models/Helper.class.php';

if (isset($_POST['login']) && isset($_POST['password'])) {
    $auth = New User();
    $result = $auth->setUser($_POST['login'], $_POST['password']);
}

Helper::goToPage();