<?php

namespace App\Controller;

use \Twig\Loader\FilesystemLoader;
use \Twig\Environment;

class Web
{
    public function home() {
        $loader = new FilesystemLoader(__DIR__.'/../../public/View');
        $twig = new Environment($loader);

        $template = $twig->load('home.html');

        echo $template->render(["name" => "Alison"]);
    }

    public function error($data) {
        echo "Error {$data['errcode']}";
    }
}