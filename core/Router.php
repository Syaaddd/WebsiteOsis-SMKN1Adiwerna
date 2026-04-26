<?php
class Router {
    private $routes = [];

    public function get($pattern, $controller, $method) {
        $this->routes[] = ['GET', $pattern, $controller, $method];
    }

    public function post($pattern, $controller, $method) {
        $this->routes[] = ['POST', $pattern, $controller, $method];
    }

    public function resolve($uri, $httpMethod) {
        $uri = trim(parse_url($uri, PHP_URL_PATH), '/');
        // strip base path from URI
        $base = trim(parse_url(BASE_URL, PHP_URL_PATH), '/');
        if (strpos($uri, $base) === 0) {
            $uri = trim(substr($uri, strlen($base)), '/');
        }

        foreach ($this->routes as [$reqMethod, $pattern, $ctrl, $action]) {
            if ($reqMethod !== $httpMethod) continue;
            $regex = '@^' . preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $pattern) . '$@';
            if (preg_match($regex, $uri, $matches)) {
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                $controllerFile = APP_PATH . '/controllers/' . $ctrl . '.php';
                if (!file_exists($controllerFile)) {
                    $this->notFound(); return;
                }
                require_once $controllerFile;
                $obj = new $ctrl();
                $obj->$action(...array_values($params));
                return;
            }
        }
        $this->notFound();
    }

    private function notFound() {
        http_response_code(404);
        echo '<h2 style="font-family:sans-serif;text-align:center;margin-top:100px">404 – Halaman tidak ditemukan</h2>';
    }
}
