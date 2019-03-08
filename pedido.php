<?php
require_once './Funciones/datosBD.php';
require_once './Funciones/conectaBD.php';
require_once './Funciones/funciones.php';
conecta_bd ($servidor, $baseDatos, $usuario, $clave, $bd);
if (isset($_POST)) {
  foreach ($_POST as $key => $value) {
    if (empty($value)) {
        header ('Location: ./pizzas.php');
    }
  }
}

  $ultimo=0;
  Ultimo($bd,$ultimo);

  $total=0;
  Calcular($bd,$_POST["ingredientes"],$total);
  $totalf=round($total,2);
  insercion($ultimo,$_POST["nombre"],$totalf,$bd);
?>
<br/>
<a href="pizzas.php">Volver</a>
