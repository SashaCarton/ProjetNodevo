<?php

namespace Router;

class Request {
    public string $method;
    public string $uri;
    public array $cookie;
    public array $session;
    public array $post;

    public function __construct(
        string $method, 
        string $uri,
        array $cookie,
        array $session,
        array $post
    ) {
        $this->method = $method;
        $this->uri = $uri;
        $this->cookie = $cookie;
        $this->session = $session;
        $this->post = $post;
    }

    public static function fromGlobals() {
        return new Request($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI'], $_COOKIE, $_SESSION, $_POST);
    }
}