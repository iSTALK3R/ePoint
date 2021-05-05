<?php

namespace App\Controller;

use \App\Model\User;
use \App\Model\UserDao;

use \Exception;

class FuncionarioController
{
    public function viewAddFuncionario() {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/../../public/View');
        $twig = new \Twig\Environment($loader);

        $template = $twig->load('cadastro_funcionario.html');

        echo $template->render(["url" => ROOT]);
    }

    public function addFuncionario($data) {
        $user = new User();

        $user->setName($data["name"]);
        $user->setUsername($data["username"]);
        $user->setPasswd(md5($data["passwd"]));
        $user->setSetor($data["setor"]);
        $user->setCpf($data["cpf"]);

        $userDao = new UserDao($user);
        $funcList = $userDao->listAll();

        $isEqual = false;
        $username = $user->getUsername();
        for ($i = 0; $i < count($funcList); $i++) {
            if ($funcList[$i]["username"] == $username) {
                $isEqual = true;
            }
        }

        if ($isEqual) {
            echo "<script>alert('Nome de usuário já está em uso!');</script>";
            echo "<meta http-equiv='refresh' content='0;url=".ROOT."/funcionario'>";
            exit;
        }

        $insert = $userDao->inserirFuncionario();

        if ($insert) {
            echo "<script>alert('Funcionário cadastrado com sucesso!');</script>";
            echo "<meta http-equiv='refresh' content='0;url=".ROOT."'>";
        } else {
            echo "<script>alert('Erro ao cadastrar o funcionário!');</script>";
            echo "<meta http-equiv='refresh' content='0;url=".ROOT."/funcionario'>";
        }
    }

    public function error($data) {
        echo "Error aqui {$data['errcode']}";
    }
}