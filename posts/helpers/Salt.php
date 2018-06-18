<?php

class Salt
{
    const CHARS = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    public static function generate()
    {
        $randString = '';
        $length = strlen(self::CHARS);

        for ($i = 0; $i < 10; $i++) {
            $randString .= self::CHARS[rand(0, $length)];
        }

        return $randString;
    }
}