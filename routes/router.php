<?php

use CoffeeCode\Router\Router;

$router = new Router(ROOT);

$router->namespace("App\Controller");

$router->group(null);
$router->get("/", "Web:inicio");

$router->group("funcionario");
$router->get("/", "FuncionarioController:viewAddFuncionario");
$router->post("/cadastrar-funcionario", "FuncionarioController:addFuncionario");

$router->group("error")->namespace("App\Controller");
$router->get("/{errcode}", "Web:error");

$router->dispatch();

if($router->error()) {
    $router->redirect("/error/{$router->error()}");
}