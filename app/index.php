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

		if (!file_exists(VIEWS . $router["view"])) {
			throw new Exception("Arquivo da view {$router["view"]} não encontrado");
		}


		extract($router["data"]);

		$view = $router["view"];

		require VIEWS . "_master.php";

	} catch (Exception $e) {

		var_dump($e);
		// require VIEWS . "erro.php";
	}

?>