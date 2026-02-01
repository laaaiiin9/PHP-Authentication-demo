<?php

class Router
{
    protected array $routes = [];

    public function get(string $uri, array $action): void
    {
        $this->routes['GET'][] = [
            'uri'    => $uri,
            'action' => $action,
        ];
    }

    public function post(string $uri, array $action): void
    {
        $this->routes['POST'][] = [
            'uri'    => $uri,
            'action' => $action,
        ];
    }

    public function dispatch(string $method, string $uri): void
    {
        $uri = rtrim($uri, '/') ?: '/';

        foreach ($this->routes[$method] ?? [] as $route) {
            $pattern = $this->convertToRegex($route['uri']);

            if (preg_match($pattern, $uri, $matches)) {
                array_shift($matches);

                [$controllerClass, $action] = $route['action'];

                $controller = new $controllerClass();
                $controller->$action(...$matches);
                return;
            }
        }

        http_response_code(404);
        echo '404 - Page not found';
    }

    protected function convertToRegex(string $uri): string
    {
        if ($uri === '/') {
            return '#^/$#';
        }

        $pattern = preg_replace('#\{[^/]+\}#', '([^/]+)', $uri);
        return '#^' . rtrim($pattern, '/') . '$#';
    }
}
