<?php
include_once("../class/class-conexion-oracle1.php");
session_start();
switch ($_GET['accion']) {
	case '1':
		if(!isset($_SESSION['codigo_usuario']))
			echo "1";
		else echo "0";
		break;
	case '2':
		$conexion = new Conexion();
  		$conexion->conectar();
		$datos= array();
		echo json_encode($datos);
		$conexion->desconectar();
		break;
	default:
		break;
}
?>