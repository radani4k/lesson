<?php

class Router
{
    public function __construct($route)
    {
        $this->route = $route;
    }

    public function serve()
    {
        switch ($this->route) {
            case '/':
                Location::openPage('posts');
                break;
            case '/signup':
                UserController::signUp($_POST);
                break;
            case '/signin':
                UserController::signIn($_POST);
                break;
            case '/signout':
                UserController::signOut();
                break;
            case '/post':
                PostController::post($_GET['id']);
                break;
            case '/posts':
                PostController::posts();
                break;
            case '/post/create':
                if (!empty($_POST)) {
                    PostRepo::create($_POST['title'], $_POST['body'], User::getIdUser());
                }
                PostController::postCreate();
                break;
            case '/post/delete':
                PostController::postDelete($_POST['post_id']);
                break;
            default:
                echo 'Not Found';
                // code...
                break;
        }
    }
}