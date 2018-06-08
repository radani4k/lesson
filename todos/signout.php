<?php

session_start();

require_once 'models/Helper.class.php';
require_once 'models/User.class.php';

User::setIdUser(0);
Helper::goToHome();