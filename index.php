<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/routes/Web.php';

$router = new Web();

$router->run();