<?php

namespace App\Response;

class Response
{
    public static function send(string $content)
    {
        echo $content;
    }
}