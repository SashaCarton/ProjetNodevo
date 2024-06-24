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
            die('sqdqs');
            return fn() => require dirname(__DIR__) . '/views/404.php';
        }

        return $this->routes[$request->method][$request->uri];
    }
    public function getUri(Request $request): string
    {
        $uri = $request->uri;
        $uri = parse_url($uri, PHP_URL_QUERY);
        $uri = str_replace('id=', '', $uri);
        return $uri;
    }
    public function getUrl(Request $request): string
    {
        $uri = $request->uri;
        $uri = parse_url($uri, PHP_URL_QUERY);
        $uri = str_replace('', '', $uri);
        return $uri;
    }
}