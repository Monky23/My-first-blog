<?php

namespace Router;

use Exceptions\NotRouteFoundException;

class Router
{

    public $url;
    public $routes = [];

    public function __construct($url)
    {
        $this->url = trim($url, '/');
    }

    public function get(string $path, string $action)
    {
        $this->routes['GET'][] = new Route($path, $action);
    }

    public function post(string $path, string $action)
    {
        $this->routes['POST'][] = new Route($path, $action);
    }

    public function run()
    {
        $serverReqMet = filter_input(INPUT_SERVER, 'REQUEST_METHOD');
        foreach ($this->routes[$serverReqMet] as $route) {
            if ($route->matches($this->url)) {
                return $route->execute();
            }
        }

        throw new NotRouteFoundException("La page demandée est introuvable.");
    }
}