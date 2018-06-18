<?php

class Location {
    public static function openDefault() {
        header('Location: ./');
    }

    public static function openPage($page = 'signin') {
        header('Location: ./?router=/' . $page);
    }
}