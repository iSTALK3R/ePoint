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

    public function baterPonto($data) {
        $ponto = new Ponto();

        $ponto->setIdFuncionario($data["id"]);
        $ponto->setTipo($data["tipo"]);
        $ponto->setDataHora(date('Y-m-d H:i:s'));

        echo "<pre>";
        print_r($ponto);
        echo "</pre>";
        exit;

        $pontoDao = new PontoDao($ponto);

        $user = new User();
        $userDao = new UserDao($user);

        $user->setId($data["id"]);

        $rUser = $userDao->listById();

        if ($rUser[0]["password"] != $data["passwd"]) {
            echo "<script>alert('Senha incorreta! por favor, tente novamente!</script>";
            echo "<meta http-equiv='refresh' content='0; URL=".ROOT."/>";
            exit;
        }

        $inserir = $pontoDao->baterPonto();

        if ($inserir) {
            echo "<meta http-equiv='refresh' content='0; URL=".ROOT."/>";
        } else {
            echo "<script>alert('Erro ao bater o ponto');</script>";
            echo "<meta http-equiv='refresh' content='0; URL=".ROOT."/>";
        }
    }

    public function error($data) {
        echo "Error {$data['errcode']}";
    }
}