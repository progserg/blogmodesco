<?php

namespace Model;


class modelRouter
{
    public function checkRoute($path = '')
    {
        $result = null;
        if (!empty($path)) {
            $path = explode('/', $path);
            if (count($path) <= 2 && !empty($path)) {
                $result = [
                    'controller' => $path[0],
                    'method' => $path[1]
                ];
            }
        }
        return $result;
    }

    public function loadPage($get, $post, &$routes)
    {
        $path = (!empty($get['path'])) ? $get['path'] : 'home';
        unset($get['path']);

        $params = (!empty($get) ? $get : $post);
        if(!empty($_FILES['file'])){
            $params['file'] = $_FILES['file'];
        }
        if (array_key_exists($path, $routes)) {
            $class = 'Controller\\' . $routes[$path]['controller'];
            $method = $routes[$path]['method'];
            if (in_array($method, get_class_methods($class))) {
                return $result = [$class, $method, $params];
            }
        }
        return false;
    }
}