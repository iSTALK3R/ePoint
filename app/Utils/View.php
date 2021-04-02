<?php

namespace App\Utils;

class View
{
	private static function getContentView($view) {
		$file = __DIR__.'../../../resources/view/'.$view.'.html';
		return file_exists($file) ? file_get_contents($file) : '';
	}

	public static function render($view, $params = []) {
		$contentView = self::getContentView($view);

		/* $keys = array_keys($params);
		$keys = array_map(function($item){
			return '{{'.$item.'}}';
		}, $keys); */

		foreach ($params as $keys => $value) {
			$retorno = $keys;
		}

		//return str_replace($keys, array_values($params), $contentView);
		print_r($retorno);
	}
}