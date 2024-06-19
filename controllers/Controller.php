<?php
namespace controllers;

class Controller
{

    private $path;
    function __construct($path)
    {
        $this->path = $path;
    }
    function render($page)
    {
        ob_start();
        include $this->path . 'views/' . $page . '.php';
        return ob_get_clean();
    }
}