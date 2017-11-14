<?php 
//session_start();
include_once("class-conexion-oracle1.php");
$conexion=new Conexion();
$conexion->conectar();
				    
$consulta=$conexion->ejecutarInstruccion("SELECT EXISTE_USUARIO('".$_POST["reg-email"]."') RESULTADO FROM DUAL");

$respuesta = array();
$linea=$conexion->obtenerRegistro($consulta);

switch ($linea[0]) {
	case 0:
		$consulta=$conexion->ejecutarInstruccion(
	"BEGIN CREAR_USUARIO(".$_POST["id-lugar"].",".$_POST["sl-gen"].",'".$_POST["reg-email"]."','".$_POST["reg-nom"]."','
					   ".$_POST["reg-password"]."','".$_POST["reg-telefono"]."');END; ");
		echo json_encode($linea[0]);
		break;
	case 1:
		echo json_encode($linea[0]);
		break;
}

$conexion->desconectar();
 ?>