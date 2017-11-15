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
  		$consulta=$conexion->ejecutarInstruccion("select A.CODIGO_IDIOMA, A.CODIGO_GENERO, A.ALIAS, A.NOMBRE, B.APELLIDO, TO_CHAR(B.FECHA_NACIMIENTO, 'DD/MM/YYYY') as FECHA_NACIMIENTO, C.URL_FOTO
			from TBL_USUARIO A, TBL_PERSONA B, TBL_FOTOS C
			WHERE A.CODIGO_USUARIO = B.CODIGO_PERSONA(+)
			AND A.CODIGO_FOTO = C.CODIGO_FOTO(+)
			and A.CODIGO_USUARIO=".$_SESSION['codigo_usuario']);
		$linea=$conexion->obtenerRegistro($consulta);
		echo json_encode($linea);
		$conexion->desconectar();
		break;
	default:
		break;
}
?>