<?php
require_once './Funciones/datosBD.php';
require_once './Funciones/conectaBD.php';
require_once './Funciones/funciones.php';
conecta_bd ($servidor, $baseDatos, $usuario, $clave, $bd);
?>
<link rel="stylesheet" href="style.css"/>
<div class="box">
  <h1>Crear pizza</h1>
  <h2>Elige los ingredientes</h2>
  <form class="formulario" action="pedido.php" method="post">

    <?php
    seleccion($bd);

     ?>
     <br/><br/>
     Nombre: <input type="text" name="nombre"/>
     <br/>
     <input type="submit"  value="Enviar"/>
  </form>
</div>
