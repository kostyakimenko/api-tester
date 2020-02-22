<?php


namespace app\Helpers;


class Log
{
    public static function info(string $message)
    {
        fwrite(STDOUT, "$message\n");
    }

    public static function success(string $message)
    {
        fwrite(STDOUT, "\e[1;32m$message\e[0m\n");
    }

    public static function error(string $message)
    {
        fwrite(STDOUT, "\e[1;31m$message\e[0m\n");
    }

    public static function result(string $message)
    {
        fwrite(STDOUT, "\e[1;33m$message\e[0m\n");
    }
}
