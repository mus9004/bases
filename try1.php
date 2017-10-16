<?php
	include_once("class/class-conexion-oracle1.php");
	$conexion = new Conexion();
  	$conexion->conectar();
  	$consulta=$conexion->ejecutarInstruccion('SELECT * FROM TBL_USUARIO');
  	
  	echo $conexion->cantidadRegistros($consulta)+"\n";

  	while(($linea=$conexion->obtenerRegistro($consulta))!= false){ ////ejemplo de como obtiene los datos linea por linea
  			echo $linea[1];		
  	}
  	
  	$conexion->desconectar();
?>