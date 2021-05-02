<?php

namespace App\Controller;

use \Twig\Loader\FilesystemLoader;
use \Twig\Environment;
use \App\Model\User;

use \Exception;

class Web
{
    public function home() {
        $loader = new FilesystemLoader(__DIR__.'/../../public/View');
        $twig = new Environment($loader);

        $template = $twig->load('home.html');

        echo $template->render(["url" => ROOT]);
    }

    public function addPonto($data) {
        return print_r($data);
    }

    public function addFunc() {
        $loader = new FilesystemLoader(__DIR__.'/../../public/View');
        $twig = new Environment($loader);

        $template = $twig->load('cadFunc.html');

        echo $template->render(["url" => ROOT]);
    }

    public function cadFunc($data) {
        $user = new User();
        echo "<pre>";
        print_r($user);
        echo "</pre>";
    }

    public function listUsers() {
        $user = new User();
        $lista = $user->listAll();
        if (!$lista) {
            echo "Oops";
        }
    }

    public function error($data) {
        echo "Error {$data['errcode']}";
    }
}