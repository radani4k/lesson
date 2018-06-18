<?php

class UserController
{
    public static function create($postArray)
    {
        if (isset($postArray['email']) && isset($postArray['password'])) {
            UserRepo::setUser($postArray['email'], $postArray['password']);
        }
    }

    public static function auth($arrayPost) {
        if (isset($arrayPost['email']) && isset($arrayPost['password'])) {
            $user = UserRepo::getUser($arrayPost['email'], $arrayPost['password']);
        }

        if (isset($user->id)) {
            User::setIdUser($user->id);
        }
    }

    public static function signIn($arrayPost)
    {
        if (!empty($arrayPost)) {
            UserController::auth($arrayPost);
        }
        if (User::status()) {
            Location::openPage('posts');
            return;
        }
        require_once 'templates/signin.php';
    }

    public static function signUp($arrayPost)
    {
        if (!empty($arrayPost)) {
            UserController::create($arrayPost);
            Location::openPage('signin');
            return;
        }
        require_once 'templates/signup.php';
    }

    public static function signOut() {
        User::out();
        Location::openPage();
    }
}