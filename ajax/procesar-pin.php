<?php 
 
	// echo "Hola mundo";
include_once("../class/class-conexion-oracle1.php");
$conexion = new Conexion();
$conexion->conectar();
switch ($_GET["accion"]) {
		case 1:
			
			$codigoPin = $_GET["codigo"];
			// echo $codigoPin;
				$sql=' SELECT A.CODIGO_FOTO , A.CODIGO_USUARIO, C.CODIGO_FOTO,
				    B.NOMBRE, C.URL_FOTO, C.SITIO_WEB
					FROM TBL_PINES A
					LEFT JOIN TBL_USUARIO B
					ON A.CODIGO_USUARIO = B.CODIGO_USUARIO
					LEFT JOIN TBL_FOTOS C
					ON A.CODIGO_FOTO= C.CODIGO_FOTO
					WHERE A.CODIGO_PINES='.$_GET["codigo"].' ';
			// $sql='SELECT CODIGO_FOTO, URL_FOTO, SITIO_WEB
			// 		FROM TBL_FOTOS
	 	// 			WHERE CODIGO_FOTO ='. $_GET["codigo"].' ';
			$resultado=$conexion->ejecutarInstruccion($sql);
	 		while ($linea= $conexion->obtenerRegistro($resultado)) {
			?>
			<!-- <link rel="stylesheet" type="text/css"> -->
			<div>
				<img src="<?php echo $linea["URL_FOTO"];?>" style="width: 450px;
         			height: auto; margin: auto; display: block; border-radius: 15px; argin-top:30px;">
         		<hr width="85%" />
         		<h6>Guardado desde:</h6>
         		<a href="<?php echo $linea["SITIO_WEB"]; ?>" style="color: #A4A4A4"><h6><?php if (isset($linea["SITIO_WEB"])) {
             	echo $linea["SITIO_WEB"]; } ?></h6></a>	
         		 <!-- <hr width="85%" />
         		 <div class="texto">
		        	<h5>Comentarios:</h5>
		        </div> -->
         	</div>
			

			<?php
			}
			break;
		case '2':
			$codigoPin = $_GET["codigo"];

			// echo $codigoPin;
			// SELECT A.CODIGO_FOTO, A.URL_FOTO, B.NOMBRE
			// 		FROM TBL_FOTOS A
			// 		LEFT JOIN TBL_USUARIO B
			// 		ON A.CODIGO_FOTO = B.CODIGO_FOTO
			// 		WHERE A.CODIGO_FOTO=
			$sql1=' SELECT A.CODIGO_FOTO, A.CODIGO_TABLERO,A.CODIGO_USUARIO, C.CODIGO_FOTO,
				    B.NOMBRE, C.URL_FOTO, C.SITIO_WEB, D.NOMBRE_TABLERO
					FROM TBL_PINES A
					LEFT JOIN TBL_USUARIO B
					ON A.CODIGO_USUARIO = B.CODIGO_USUARIO
					LEFT JOIN TBL_FOTOS C
					ON A.CODIGO_FOTO= C.CODIGO_FOTO
					LEFT JOIN TBL_TABLERO D
					ON A.CODIGO_TABLERO=D.CODIGO_TABLERO
					WHERE A.CODIGO_PINES='.$_GET["codigo"].' ';
			$resultado=$conexion->ejecutarInstruccion($sql1);		
			while ($linea= $conexion->obtenerRegistro($resultado)) {
			?>
			<div>
			
			<img src="<?php echo $linea["URL_FOTO"];?>" class="imagenModal">
				
 			</div>
 		
			<?php
			}
			break;
			case '3':
			session_start();
					$codigousuario= $_SESSION['codigo_usuario'];
					// echo $codigousuario;
			$usuarioTablero =$conexion->ejecutarInstruccion("
						SELECT  A.CODIGO_USUARIO, C.NOMBRE_TABLERO, A.CODIGO_TABLERO
						            FROM TBL_TABLERO_X_USUARIO A
						            LEFT JOIN TBL_USUARIO B
						            ON A.CODIGO_USUARIO=B.CODIGO_USUARIO
						            LEFT JOIN TBL_TABLERO C
						            ON A.CODIGO_TABLERO= C.CODIGO_TABLERO
						            WHERE A.CODIGO_USUARIO=".$_SESSION['codigo_usuario'].''
						            );
			while($fila= $conexion->obtenerRegistro($usuarioTablero)){
				
				?>
                 <p style="margin-top: 15px;"><?php echo $fila["NOMBRE_TABLERO"];?><p> 
				 <button id="btn-almacenar" style="width: 130px; text-align: center; margin-top: 5px;" type="button" class="btn btn-danger" onclick="guardarUsuario(<?php echo $fila["CODIGO_TABLERO"];?>); ">Guardar
				 </button>

				<?php
                }
			break;
			case 4:
				session_start();
				$codigoTablero1 = $_GET["codigoTablero"];
				$codigousuario1= $_SESSION['codigo_usuario'];
				// $codigoPin1 = $_GET["codigoPin"];
			    
			    $usuarioTablero =$conexion->ejecutarInstruccion("SELECT A.NOMBRE_PIN, 
			    	A.DIRECCION, A.DESCRIPCION, B.CODIGO_FOTO
			    	FROM TBL_PINES A
			    	LEFT JOIN TBL_FOTOS B
			    	ON A.CODIGO_FOTO=B.CODIGO_FOTO
			    	WHERE A.CODIGO_PINES=".$_GET["codigoPin"].'');
				    $fila=$conexion->obtenerRegistro($usuarioTablero);
				     $nombrepin1=$fila["NOMBRE_PIN"];
				      $fotoPin1=$fila["CODIGO_FOTO"];
				     $direccion1=$fila["DIRECCION"];
				      $descripcion1=$fila["DESCRIPCION"]; 
			    
			    $conn = oci_connect('DB_PINTEREST', 'oracle', 'localhost/XE','AL32UTF8');
					if (!$conn) {
			    	$e = oci_error();
			    	echo "SIN CONEXION";
			      exit;
					}		
					$sql="
						BEGIN
						    P_INSERTAR_PIN_TABLERO(
					        :CODIGO_PIN,
					        :CODIGO_USUARIO,
					        :CODIGO_TABLERO,
					        :CODIGO_FOTO,
					        :NOMBRE_PIN,
					        :DIRECCION,
					        :DESCRIPCION,
					        :CODIGO_RESULTADO,
    						:MENSAJE_RESULTADO 
						    );
						END;
							";
			$procedure = oci_parse($conn, $sql);
			oci_bind_by_name($procedure, ':CODIGO_PIN', $CODIGO_PIN,10); 
			oci_bind_by_name($procedure, ':CODIGO_USUARIO', $codigousuario1);
			oci_bind_by_name($procedure, ':CODIGO_TABLERO', $codigoTablero1);
			oci_bind_by_name($procedure, ':CODIGO_FOTO', $fotoPin1);
			oci_bind_by_name($procedure, ':NOMBRE_PIN', $nombrepin1);
			oci_bind_by_name($procedure, ':DIRECCION', $direccion1);
			oci_bind_by_name($procedure, ':DESCRIPCION', $descripcion1);
			oci_bind_by_name($procedure, ':CODIGO_RESULTADO', $CODIGO_RESULTADO, 10);
			oci_bind_by_name($procedure, ':MENSAJE_RESULTADO', $MENSAJE_RESULTADO , 200);//(out)
			oci_execute($procedure);
			$resultado['codigousuario'] = $codigousuario1;
			$resultado['codigoTablero'] = $codigoTablero1;
			$resultado['codigofoto'] = $fotoPin1;
			$resultado['nombrepin'] = $nombrepin1;
			$resultado['direccion'] = $direccion1;
			$resultado['descripcion'] = $descripcion1;
			$resultado['codigoResp'] = $CODIGO_RESULTADO;
			$resultado['mensajeResp'] = $MENSAJE_RESULTADO;			
			oci_free_statement($procedure);
			oci_close($conn);
			echo json_encode($MENSAJE_RESULTADO);
			
			break;		
		case 5:
			$sql=' SELECT A.CODIGO_FOTO , A.CODIGO_USUARIO, C.CODIGO_FOTO,
				    B.NOMBRE, C.URL_FOTO, C.SITIO_WEB, D.COMENTARIO 
					FROM TBL_PINES A
					LEFT JOIN TBL_USUARIO B
					ON A.CODIGO_USUARIO = B.CODIGO_USUARIO
					LEFT JOIN TBL_FOTOS C
					ON A.CODIGO_FOTO= C.CODIGO_FOTO
					LEFT JOIN TBL_COMENTARIO D
					ON A.CODIGO_PINES= D.CODIGO_PINES
					WHERE A.CODIGO_PINES='.$_GET["codigo"].' ';
			// $sql='SELECT CODIGO_FOTO, URL_FOTO, SITIO_WEB
			// 		FROM TBL_FOTOS
	 	// 			WHERE CODIGO_FOTO ='. $_GET["codigo"].' ';
			$resultado=$conexion->ejecutarInstruccion($sql);
	 		while ($linea= $conexion->obtenerRegistro($resultado)) {
			?>
			<!-- <link rel="stylesheet" type="text/css"> -->
			<div>
             <!-- <h5>Comentarios:</h5> -->
             <p><?php if (isset($linea["COMENTARIO"])) {
             	echo $linea["COMENTARIO"]; } ?> </p>
         	</div>
			  

			<?php
			}

				break;	
		    
		
}	
$conexion->desconectar();
?>
