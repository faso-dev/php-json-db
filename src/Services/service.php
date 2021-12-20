<?php
define("ROUTES", require __DIR__ . '/../../config/routes.php');

function redirectTo(string $route)
{
    header(sprintf("Location: %s", route($route)));
}

function route(string $routeName)
{
    return ROUTES[$routeName] ?? '';
}

function inRequest(string $key): bool
{
    return isset($_POST[$key]);
}

function request(string $key)
{
    return $_POST[$key] ?? null;
}

function query(string $key)
{
    return $_GET[$key] ?? null;
}

function make_active(string $route): string
{
    return route($route) === requestUri() ? 'active' : '';
}

function requestUri(): string
{
    return explode('?', $_SERVER['REQUEST_URI'])[0];
}