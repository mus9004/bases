<?php
	include_once("class/class-conexion-oracle.php");
	$conexion = new Conexion();
  	$conexion->conectar();
  	echo "Versión cliente: " . oci_client_version();
  	$conexion->desconectar();
?>