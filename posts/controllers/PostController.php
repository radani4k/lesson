<?php

class PostController
{
    public static function postCreate() {
        require_once 'templates/create.php';
    }

    public static function posts() {
        if (isset($_GET['user_id']) && $_GET['user_id'] > 0) {
            $posts = PostRepo::getAllByUserId($_GET['user_id']);
        } else {
            $posts = PostRepo::getAll();
        }
        require_once 'templates/posts.php';
    }

    public static function post($id) {
        $post = PostRepo::getOne($id);
        require_once 'templates/post.php';
    }

    public static function postDelete($id) {
        if (isset($id)) {
            PostRepo::delete((int) $id);
            Location::openPage('posts');
        }
    }
}