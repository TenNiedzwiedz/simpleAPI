<?php

namespace app\core;

class Router
{
  public Request $request;
  public Response $response;
  protected array $routes = [];

  public function __construct(Request $request, Response $response)
  {
    header("Content-type: application/json; charset=UTF-8");
    $this->request = $request;
    $this->response = $response;
  }

  /**
   * Adds route to routes array.
   * 
   * @param string $path
   * @param string $controller
   */
  public function route(string $path, string $controller) :void
  {
    $this->routes[$path] = $controller;
  }

  /**
   * Checks if for given path and method exists valid route in $routes array.
   * Returns result of given callback or throw exception.
   * 
   * @return string Result of given callback
   */
  public function resolve(): string
  {
    $path = $this->request->getPath();
    $method = $this->request->getMethod();

    if (!$callback[0] = $this->routes[$path] ?? false) {
      throw new \Exception('Invalid route', 404);
    }
    $callback[1] = $method;

    $controller = new $callback[0]();
    Application::$app->controller = $controller;
    $controller->action = $callback[1];
    $callback[0] = $controller;

    return call_user_func($callback, $this->request);
  }
}
