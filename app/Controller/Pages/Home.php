<?php

namespace App\Controller\Pages;

use \App\Utils\View;

class Home extends Page
{
	public static function getHome() {
		$content = View::render('pages/home', [
			'name' => 'Alison',
			'age' => 21
		]);
		return parent::getPage('Inicio', $content);
	}
}