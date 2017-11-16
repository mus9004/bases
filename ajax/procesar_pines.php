<?php
session_start();
	include_once("../class/class-conexion-oracle1.php");
		$conexion = new Conexion();
		$conexion->conectar();
		$conn = oci_connect('DB_PINTEREST', 'oracle', 'localhost/XE','AL32UTF8');
			if (!$conn) {
			    $e = oci_error();
			    echo "SIN CONEXION";
			    exit;
			}

	switch ($_GET["accion"]) {
		case '1':
			$codigo_usuario=$_POST["txt-sitio"];
		    $codigo_tablero=$_POST["slc-tableros"];
		    $nombre_pin= $_POST["txt-nombre1"];
		    $nombre_imagen= $_POST["txt-imagen"];
		    $descripcion=$_POST["txt-descripcion"];
		    $url=$_POST['txt-url'];
		  	$alto=512;
		  	$ancho=512;
		  	$codigo_foto=11;

		  	$sql='BEGIN P_INSERTAR_PIN(
							    :P_CODIGO_PINES,
							    :P_CODIGO_USUARIO,
							    :P_CODIGO_TABLERO,
							    :P_CODIGO_FOTO,
							    :P_NOMBRE_PIN,
							    :P_DIRECCION_URl,
							    :P_DESCRIPCION,
							    :CODIGO_RESULTADO,
							    :MENSAJE_RESULTADO
							); 
							END;';
				$procedure = oci_parse($conn, $sql);
				oci_bind_by_name($procedure, ':P_CODIGO_PINES', $CODIGO_PINES,10);
				oci_bind_by_name($procedure, ':P_CODIGO_USUARIO', $codigo_usuario);
				oci_bind_by_name($procedure, ':P_CODIGO_TABLERO', $codigo_tablero);
				oci_bind_by_name($procedure, ':P_CODIGO_FOTO',$codigo_foto);
				oci_bind_by_name($procedure, ':P_NOMBRE_PIN', $nombre_pin);
				oci_bind_by_name($procedure, ':P_DIRECCION_URl', $url);
				oci_bind_by_name($procedure, ':P_DESCRIPCION', $descripcion);
				oci_bind_by_name($procedure, ':CODIGO_RESULTADO', $CODIGO_RESULTADO,10);
				oci_bind_by_name($procedure, ':MENSAJE_RESULTADO', $MENSAJE_RESULTADO,200);
				oci_execute($procedure);			
			$resultado['codigoResp'] = $CODIGO_RESULTADO;
			$resultado['mensajeResp'] = $MENSAJE_RESULTADO;
			oci_free_statement($procedure);
			echo json_encode($resultado);
	
			break;
		default:
			break;
	}
	$conexion->desconectar();

?>
