<?php

namespace Router;

use Route\Route;

class Router
{
    private $routes = [];

    public function add(string $method, string $uri, callable $controller): void
    {
        $this->routes[$method][$uri] = $controller;

    }

    public function resolve(Request $request): callable
    {
        if (!isset($this->routes[$request->method][$request->uri])) {
            return fn() => require dirname(__DIR__) . '/views/404.php';
        }

        return $this->routes[$request->method][$request->uri];
    }
}