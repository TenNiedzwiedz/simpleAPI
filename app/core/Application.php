<?php

  namespace app\core;

  class Application {

    public Request $request;
    public Router $router;
    public Response $response;

    public Database $db;

    public static string $ROOT_DIR;
    public static Application $app;

    public function __construct($rootPath)
    {
      self::$ROOT_DIR = $rootPath;
      self::$app = $this;

      $this->request = new Request();
      $this->response = new Response();

      $this->db = new Database();

      $this->router = new Router($this->request, $this->response);
    }

    /**
     * Tries to resolve user request.
     * On exception throws error
     * 
     * @return void
     */
    public function run()
    {
      try {
        echo $this->router->resolve();
      } catch (\Exception $e) {
        $this->response->setStatusCode($e->getCode());
        echo json_encode($e->getMessage());
      }
    }

  }

?>
