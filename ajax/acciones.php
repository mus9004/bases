<?php 
//session_start();
include_once("class-conexion-oracle1.php");
$conexion=new Conexion();
$conexion->conectar();
$consulta=$conexion->ejecutarInstruccion("SELECT VerificarUsuario('".$_POST["inputEmail"]."','".$_POST["inputPassword"]."') RESULTADO FROM DUAL");
$respuesta = array();
$linea=$conexion->obtenerRegistro($consulta);
///$respuesta["codigo_resultado"] =$linea[0]
echo json_encode($linea[0]);
//echo json_encode($consulta);

$conexion->desconectar();
 ?>