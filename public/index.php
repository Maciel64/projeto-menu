<?php

	require "bootstrap.php";

	try {
		$router = router();

		if (!isset($router["view"])) {
			throw new Exception("A view {$router["view"]} carregada não existe");
		}

		if (!isset($router["data"])) {
			throw new Exception("Parametro data não passado");
		}

		if (!file_exists(VIEWS_PATH . $router["view"])) {
			throw new Exception("Arquivo da view {$router["view"]} não encontrado");
		}


		extract($router["data"]);

		$view = $router["view"];

		require VIEWS_PATH . "_master.php";

	} catch (Exception $error) {

		require VIEWS_PATH . "error.php";
	}

?>