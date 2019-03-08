<?php
	// 1. meter en un fichero aparte las cuatro variables de la base de datos
	// 2. crear otro fichero con dos funciones conecta_bd y cierra_bd
	// 3. Meter en otro fichero aparte las funciones de seleccion, insercion, modificacion y borrado

	function conecta_bd ($servidor, $baseDatos, $usuario, $clave, &$bd) {
		try {
		$bd = new PDO('mysql:host=' . $servidor . ';dbname=' . $baseDatos,
			$usuario, $clave,
			array(PDO::ATTR_PERSISTENT => true,
				  PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8'));

		} catch (PDOException $e) {
			die ("ERROR: <br />$e<br />");
		}

	}

	function cierra_bd (&$bd) {
		$bd = null;
	}

?>
