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
			

			$codigo_usuario=$_SESSION['codigo_usuario'];
		    $tipo_tablero=$_POST["chk-checkbox"];
		    $nombre_tablero= $_POST["txt-nombre"];
		    $descripcion=' ';
					
					$sql='BEGIN P_INSERTAR_TABLERO(
							    :CODIGO_TABLERO,
							    :codigo_usuario,
							    :tipo_tablero,
							    :nombre_tablero,
							    :descripcion,
							    :fecha,
							    :CODIGO_RESULTADO,
							    :MENSAJE_RESULTADO
							); 
							END;';
				$procedure = oci_parse($conn, $sql);
				oci_bind_by_name($procedure, ':CODIGO_TABLERO', $CODIGO_TABLERO,10);
				oci_bind_by_name($procedure, ':codigo_usuario', $codigo_usuario);
				oci_bind_by_name($procedure, ':tipo_tablero', $tipo_tablero);
				oci_bind_by_name($procedure, ':nombre_tablero', $nombre_tablero);
				oci_bind_by_name($procedure, ':descripcion', $descripcion);
				oci_bind_by_name($procedure, ':fecha', $fecha,50);
				oci_bind_by_name($procedure, ':CODIGO_RESULTADO', $CODIGO_RESULTADO,10);
				oci_bind_by_name($procedure, ':MENSAJE_RESULTADO', $MENSAJE_RESULTADO,200);
				oci_execute($procedure);
			$resultado['nombretablero'] = $_POST["txt-nombre"];			
			$resultado['codigoResp'] = $CODIGO_RESULTADO;
			$resultado['mensajeResp'] = $MENSAJE_RESULTADO;	
			$var=$_POST["txt-nombre"];
			$resultado['nombretablero'] = $var;
			oci_free_statement($procedure);
			echo json_encode($resultado);
			break;

		case '2':
			

			$codigo_usuario=$_SESSION['codigo_usuario'];
		    $tipo_tablero=$_POST["chk-checkbox"];
		    $nombre_tablero= $_POST["txt-nombre"];
		    $descripcion=$_POST["txt-descripcion"];
		    $codi_table=$_POST["txt-codigota"];
					
					$sql='BEGIN P_ACTUALIZAR_TABLERO(
							    :CODIGO_TABLERO,
							    :codigo_usuario,
							    :tipo_tablero,
							    :nombre_tablero,
							    :descripcion,
							    :fecha,
							    :CODIGO_RESULTADO,
							    :MENSAJE_RESULTADO
							); 
							END;';
				$procedure = oci_parse($conn, $sql);
				oci_bind_by_name($procedure, ':CODIGO_TABLERO', $codi_table);
				oci_bind_by_name($procedure, ':codigo_usuario', $codigo_usuario);
				oci_bind_by_name($procedure, ':tipo_tablero', $tipo_tablero);
				oci_bind_by_name($procedure, ':nombre_tablero', $nombre_tablero);
				oci_bind_by_name($procedure, ':descripcion', $descripcion);
				oci_bind_by_name($procedure, ':fecha', $fecha,50);
				oci_bind_by_name($procedure, ':CODIGO_RESULTADO', $CODIGO_RESULTADO,10);
				oci_bind_by_name($procedure, ':MENSAJE_RESULTADO', $MENSAJE_RESULTADO,200);
				oci_execute($procedure);			
			$resultado['codigoResp'] = $CODIGO_RESULTADO;
			$resultado['mensajeResp'] = $MENSAJE_RESULTADO;	
			oci_free_statement($procedure);
			echo json_encode($resultado);
			break;
		case '3':
		    $codi_table=$_POST["txt-codigota"];
					
					$sql='BEGIN P_BORRAR_TABLERO(
							    :CODIGO_TABLERO,
							    :CODIGO_RESULTADO,
							    :MENSAJE_RESULTADO
							); 
							END;';
				$procedure = oci_parse($conn, $sql);
				oci_bind_by_name($procedure, ':CODIGO_TABLERO', $codi_table);
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
