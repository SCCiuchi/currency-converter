<?php

namespace Config\Router;

class Router
{
    public $request;
    public $routes = [];

    public function __construct(array $request)
    {
        $this->request = basename($request['REQUEST_URI']);
    }

    public function addRoute(string $uri, \Closure $fn): void
    {
        $this->routes[$uri] = $fn;
    }

    public function hasRoute(string $uri): bool
    {
        return array_key_exists($uri, $this->routes);
    }

    public function run()
    {
        if ($this->hasRoute($this->request)) {
            $this->routes[$this->request]->call($this);
        }
    }
}