<?php 
//session_start();
include_once("class-conexion-oracle1.php");
$conexion=new Conexion();
$conexion->conectar();
				    
$consulta=$conexion->ejecutarInstruccion("SELECT CODIGO_USUARIO FROM TBL_USUARIO WHERE CORREO='".$_POST["reg-email"]."'");

$respuesta = array();
$linea=$conexion->obtenerRegistro($consulta);
session_start();
$_SESSION['codigo_usuario']=$linea[0];

	$conexion->desconectar();

 ?>