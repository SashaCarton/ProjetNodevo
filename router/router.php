<?
namespace Router;

class Router
{
    private $routes = [];

    public function register($path, $action)
    {
        $this->routes[$path] = $action;
    }

    public function resolve($url)
    {
        if (array_key_exists($url, $this->routes)) {
            return $this->routes[$url];
        } else {
            return '404';
        }
    }
}