<?php

namespace App\Controller;

class Web
{
    public function inicio() {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/../../public/View');
        $twig = new \Twig\Environment($loader);

        $template = $twig->load('inicio.html');

        echo $template->render(["url" => ROOT]);
    }

    public function error($data) {
        echo "Error {$data['errcode']}";
    }
}