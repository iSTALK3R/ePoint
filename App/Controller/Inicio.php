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
        $ponto = new Ponto();
        $pontoDao = new PontoDao($ponto);

        $users = $userDao->listAll();
        $pontos = $pontoDao->listAllRegs();

        echo $template->render(["url" => ROOT, "users" => $users, "pontos" => $pontos]);
    }

    public function baterPonto($data) {
        $ponto = new Ponto();

        $ponto->setIdFuncionario($data["id"]);
        $ponto->setTipo($data["tipo"]);
        $ponto->setDataHora(date('Y-m-d H:i:s'));

        $pontoDao = new PontoDao($ponto);
        $user = new User();
        $userDao = new UserDao($user);

        $user->setId($data["id"]);

        $rUser = $userDao->listById();

        if ($rUser["password"] != md5($data["passwd"])) {
            echo "<script>alert('Senha incorreta!');</script>";
            echo "<meta http-equiv='refresh' content='0;url=".ROOT."'>";
            exit;
        }

        $inserir = $pontoDao->baterPonto();

        if ($inserir) {
            echo "<meta http-equiv='refresh' content='0;url=".ROOT."'>";
        } else {
            echo "<script>alert('Erro ao bater o ponto');</script>";
            echo "<meta http-equiv='refresh' content='0;url=".ROOT."'>";
        }
    }

    public function error($data) {
        echo "Error {$data['errcode']}";
    }
}