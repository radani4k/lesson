<?php

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

session_start();

require_once 'configs/Config.php';

require_once 'helpers/Connection.php';
require_once 'helpers/Location.php';
require_once 'helpers/Router.php';
require_once 'helpers/Salt.php';

require_once 'models/User.php';
require_once 'models/Post.php';
require_once 'models/Comment.php';

require_once 'repos/UserRepo.php';
require_once 'repos/PostRepo.php';
require_once 'repos/CommentRepo.php';

require_once 'controllers/PostController.php';
require_once 'controllers/UserController.php';

$route = (isset($_GET['router'])) ? $_GET['router'] : '/';
$router = new Router($route);

$router->serve();