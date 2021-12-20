<?php

use App\Database\DB;
use App\Response\Response;
use App\Router\Router;

require_once __DIR__ . '/vendor/autoload.php';

try {
    DB::initDatabase();
    Response::send(
        (new Router(require __DIR__ . '/config/routes.php'))
            ->handleRequest()
    );
} catch (InvalidArgumentException $exception) {
    echo $exception->getMessage();
}


