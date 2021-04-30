<?php

namespace App\Controller;

use \Twig\Loader\FilesystemLoader;
use \Twig\Environment;
use \App\Model\User;

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
        try {
            $user = new User();
            
            $user->username = $data["username"];
            $user->name = $data["name"];
            $user->passwd = md5($data["passwd"]);

            $user->save();

            echo "<script>alert('Funcionário cadastrado com sucesso!');</script>";
        } catch (Exception $e) {
            throw new Exception("Não foi possivel cadastrar o funcionário!" . $e->getMessage());
        }
    }

    public function error($data) {
        echo "Error {$data['errcode']}";
    }
}