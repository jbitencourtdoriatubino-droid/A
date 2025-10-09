<?php
namespace a\connections;

class Router {

    private  array $router = [];

    public function add(String $method, String $path, callable $callback) {
        // Initialize router
        $this->router[] = [
            'method' => strtoupper($method),
            'path' => $path,
            'callback' => $callback
        ];
    }

    public function group(String $method,String $prefix, callable $callback){
        $this->router[] = [
            'prefix' => $prefix,
            'callback' => $callback,
            'route' => $this->add($method, $prefix, $callback)
        ];
        call_user_func($callback, $this);

    }

    public function match(String $method, String $uri) {
        $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        foreach ($this->router as $route) {
            if ($route['method'] === strtoupper($method) && $route['path'] === $uri) {
                return $route;
            }else{
                http_response_code(404);
            }
        }
        http_response_code(404);
        return null;
    }

    public function dispatch(String $method, String $uri) {
        $route = $this->match($method, $uri);
        if ($route) {
            call_user_func($route['callback']);
        }
    }


}