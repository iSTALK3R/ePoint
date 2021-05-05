<?php

namespace App\Controller;

use \App\Model\User;
use \App\Model\UserDao;
use \App\Model\Ponto;
use \App\Model\PontoDao;

class Inicio
{
    public function inicio() {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/../../public/View');
        $twig = new \Twig\Environment($loader);

        $template = $twig->load('inicio.html');

        $user = new User();
        $userDao = new UserDao($user);

        $users = $userDao->listAll();

        echo $template->render(["url" => ROOT, "users" => $users]);
    }

    public function error($data) {
        echo "Error {$data['errcode']}";
    }
}