<?php

class Helper {
    public static function goToHome() {
        header('Location: ./');
    }

    public static function goToPage($page = 'list_doto') {
        header('Location: ./?action=' . $page);
    }
}