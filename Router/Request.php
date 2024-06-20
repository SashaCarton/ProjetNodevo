<?php
namespace Router;
readonly class Request {

    private function __construct(
        public string $method, 
        public string $uri,
        public array $cookie,
        public array $session,
        public array $post,
    ) {
    }

    public static function fromGlobals() {
        return new Request($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI'], $_COOKIE, $_SESSION, $_POST);
    }
}