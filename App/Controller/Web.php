<?php

namespace App\Controller;

use \Twig\Loader\FilesystemLoader;
use \Twig\Environment;

class Web
{
    public function inicio() {
        $loader = new FilesystemLoader(__DIR__.'/../../public/View');
        $twig = new Environment($loader);

        $template = $twig->load('inicio.html');

        echo $template->render(["url" => ROOT]);
    }

    public function error($data) {
        echo "Error {$data['errcode']}";
    }
}