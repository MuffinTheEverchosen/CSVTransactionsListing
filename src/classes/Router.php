<?php

namespace classes;

use classes\exceptions\RouteNotFoundException;

class Router //brak phpdoc przed większością funkcji i protperty
{
    protected mixed $routes;

    public function register(string|array $routes, callable|array $action, string $requestMethod = 'get'): self
    {
        if (is_array($routes))
        {
            foreach ($routes as $route)
            {
                $this->routes[$requestMethod][$route] = $action;
            }

            return $this;
        }

        $this->routes[$requestMethod][$routes] = $action;

        return $this;
    }

    public function post(string|array $route, callable|array $action): self
    {
        $this->register($route, $action, 'post');

        return $this;
    }

    /**
     * @throws RouteNotFoundException
     */
    public function resolve(string $requestUri, string $requestMethod)
    {
        $requestMethod = mb_strtolower($requestMethod);

        $route = explode('?', $requestUri)[0];
        $action = $this->routes[$requestMethod][$route]; //jeśli ktoś wprowadzi nie prawidłowy uri wystąpi tu błąd undefined array key. Do sprawdzenia za pomocą isset() czy $this->routes[$requestMethod][$route] i tylko jeśli tak to ustawić do $action

        if (! $action) //nie powinno być spacji między wykrzyknikiem a zmienną
        {
            throw new RouteNotFoundException();
        }

        if (is_callable($action))
        {
            return call_user_func($action);
        }

        if (is_array($action))
        {
            [$class, $method] = $action;

            if(class_exists($class))
            {
                $class = new $class;

                if (method_exists($class, $method))
                {
                    return call_user_func_array([$class, $method], []);
                }
            }
        }

        throw new RouteNotFoundException();
    }
} //brak ostatniej pustej linii