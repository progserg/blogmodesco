<?php

namespace Controller;

use Model\modelRouter;

class Router
{
    private $routes = [];

    function __construct()
    {
        $this->MR = new modelRouter();
    }

    public function getRoutes()
    {
        return $this->routes;
    }

    public function add($name = '', $path = '')
    {
        if (!empty($newRoute = $this->MR->checkRoute($path))) {
            $name = (empty($name) || $name == '/') ? 'home' : $name;
            $this->routes[$name] = $newRoute;
        }
    }

    public function redirect($get = '', $post = '')
    {
        if ($page = $this->MR->loadPage($get, $post, $this->routes)) {
            $class = $page[0];
            $method = $page[1];
            $params = $page[2];
            $obj = new $class();
            return $obj->$method($params);
        }
        echo 'Error 404 <br><a href="/">На главную</a>';
    }
}