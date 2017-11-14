<?php
	include_once("../class/class-conexion-oracle1.php");
		$conexion = new Conexion();
		$conexion->conectar();

	switch ($_GET["accion"]) {
		case '1':
			
			$codigo_usuario=1;
		    $tipo_tablero=$_POST["chk-checkbox"];
		    $nombre_tablero= $_POST["txt-nombre"];
		    $descripcion=' x';
		    $fecha="13/11/2017";
					
		    	/*$sql='BEGIN P_INSERTAR_TABLERO(
							    $CODIGO_TABLERO,
							    $codigo_usuario,
							    $tipo_tablero,
							    $nombre_tablero,
							    $descripcion,
							    $fecha,
							    $CODIGO_RESULTADO,
							    $MENSAJE_RESULTADO
							); 
							END;';*/

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
				//$conexion->ejecutarInstruccion($sql);
				$procedure = oci_parse($conn, $sql);
				oci_bind_by_name($sql, ':CODIGO_TABLERO', $CODIGO_TABLERO,32);
				oci_bind_by_name($sql, ':codigo_usuario', $codigo_usuario);
				oci_bind_by_name($sql, ':tipo_tablero', $tipo_tablero);
				oci_bind_by_name($sql, ':nombre_tablero', $nombre_tablero);
				oci_bind_by_name($sql, ':descripcion', $descripcion);
				oci_bind_by_name($sql, ':fecha', $fecha);
				oci_bind_by_name($sql, ':CODIGO_RESULTADO', $CODIGO_RESULTADO,10);
				oci_bind_by_name($sql, ':MENSAJE_RESULTADO', $MENSAJE_RESULTADO,200);
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
