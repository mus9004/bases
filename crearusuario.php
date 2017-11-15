<?php 
//session_start();
include_once("class-conexion-oracle1.php");
$conexion=new Conexion();
$conexion->conectar();
				    
$consulta=$conexion->ejecutarInstruccion("SELECT EXISTE_USUARIO('".$_POST["reg-email"]."') RESULTADO FROM DUAL");

$respuesta = array();
$ses=array();
$linea=$conexion->obtenerRegistro($consulta);

switch ($linea[0]) {
	case 0:
		echo json_encode(0);
		$consulta=$conexion->ejecutarInstruccion(
	"BEGIN CREAR_USUARIO(".$_POST["id-lugar"].",".$_POST["sl-gen"].",'".$_POST["reg-email"]."','".$_POST["reg-nom"]."','".$_POST["reg-password"]."','".$_POST["reg-telefono"]."');END; ");
		$consulta1=$conexion->ejecutarInstruccion("SELECT CODIGO_USUARIO FROM TBL_USUARIO WHERE CORREO='".$_POST["reg-email"]."';");	
		$ses=$conexion->obtenerRegistro($consulta1);
		session_start();
		$_SESSION['codigo_usuario']=$ses[0];
		//echo json_encode(0);
		$conexion->desconectar();
		break;
	case 1:
		echo json_encode($linea[0]);
		break;
}

//$conexion->desconectar();
 ?>