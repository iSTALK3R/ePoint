<?php

use CoffeeCode\Router\Router;

$router = new Router(ROOT);

$router->namespace("App\Controller");

$router->group(null);
$router->get("/", "Web:home");
$router->get("/add-funcionario", "Web:addFunc");
$router->get("/list", "Web:listUsers");

$router->post("/cad-funcionario", "Web:cadFunc");
$router->post("/addponto", "Web:addPonto");

$router->group("error")->namespace("App\Controller");
$router->get("/{errcode}", "Web:error");

$router->dispatch();

if($router->error()) {
    $router->redirect("/error/{$router->error()}");
}