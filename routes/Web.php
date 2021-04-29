<?php

use CoffeeCode\Router\Router;

class Web
{
    private $router;

    public function __construct() {
        $this->router = new Router(ROOT);

        $this->router->namespace("App\Controller");

        $this->router->group(null);
        $this->router->get("/", "Web:home");
        $this->router->get("/add-funcionario", "Web:addFunc");

        $this->router->post("/cad-funcionario", "Web:cadFunc");
        $this->router->post("/addponto", "Web:addPonto");

        $this->router->group("error")->namespace("App\Controller");
        $this->router->get("/{errcode}", "Web:error");

        if($this->router->error()) {
            $this->router->redirect("/error/{$router->error()}");
        }
    }

    public function run() {
        return $this->router->dispatch();
    }
}