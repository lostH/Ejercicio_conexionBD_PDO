<?php
	// 1. meter en un fichero aparte las cuatro variables de la base de datos
	// 2. crear otro fichero con dos funciones conecta_bd y cierra_bd
	// 3. Meter en otro fichero aparte las funciones de seleccion, insercion, modificacion y borrado

function Ultimo(&$bd,&$a)
{
	$consulta = "SELECT COUNT(Id_Pizza) FROM `Pizzas` ";
	$res = $bd->prepare($consulta);
	$res->execute();
	$num=0;
	while( $fila = $res->fetch() ) {
		$num+=$fila[0];
	}

	$res->closeCursor();

	$num=$num+1;
	$a="P";
	$a.=$num;

}
	function seleccion (&$bd) {
		$consulta = "SELECT * FROM  Ingredientes";
		$res = $bd->prepare($consulta);
		$res->execute();

		while( $fila = $res->fetch() ) {
			if ($fila[1]=='Tomate' or $fila[1] == "Oregano") {
					echo "";
			}else {
				echo "<input type='checkbox' name='ingredientes[]'value='" . $fila[1]."'/>";
				echo "<label>" . $fila[1] ."</label>";
				echo "<br />";
			}

		}
		$res->closeCursor();
	}

	function insercion ($id, $nombre, $precio, &$bd) {
		$consulta = "INSERT INTO `Pizzas`(`Id_Pizza`, `Nombre`, `precio`) VALUES (:id, :nombre, :precio)";
		$res = $bd->prepare($consulta);
		$res->bindValue(":id", $id);
		$res->bindValue(":nombre", $nombre);
		$res->bindValue(":precio",$precio);
		$res->execute();
		$res->closeCursor();
		echo "Se insertado $id, $nombre , $precio";
	}

	function modificacion ($id, $cant, &$bd) {
		$consulta = "UPDATE  ciudades SET cantidad = :cantidad WHERE idpro = :idpro";
		$res = $bd->prepare($consulta);
		$res->bindValue("idpro", $id);
		$res->bindValue("cantidad", $cant);

		$res->execute();

		$res->closeCursor();
	}

	function borrar ($id, &$bd) {
		$consulta = "DELETE FROM ciudades WHERE idpro = :idpro";
		$res = $bd->prepare($consulta);
		$res->bindValue("idpro", $id);

		$res->execute();

		$res->closeCursor();
	}
	function Calcular (&$bd,$ingredientes,&$t) {
		$iva=0.21;
		$consulta = "SELECT * FROM  Ingredientes";
		$res = $bd->prepare($consulta);
		$res->execute();

		while( $fila = $res->fetch() ) {
					$precio[$fila[1]]=$fila[2];
				}
						$res->closeCursor();
		foreach ($precio as $key => $value) {
			foreach ($ingredientes as $key1 => $value1) {
				if ($key==$value1) {
						$t=$t+$value;
				}
			}
		}
		$t+=6;
		$iva=$iva*$t;
		$t+=$iva;

	}

?>
