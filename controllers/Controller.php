<?php
namespace controllers;

class  Controller
{
    private $url;
    private $path = dirname(__DIR__) . "/";
    function getPage()
    {
        return $this->page;
    }
    public function __construct($path)
    {
        $this->path = $path;
    }
    

    public function render($page)
    {   
        ob_start();
        include $this->path . 'views/' . $page . '.php';
        return ob_get_clean();
    }
}
