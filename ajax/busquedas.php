<?php
session_start();
include_once("../class/class-conexion-oracle1.php");
switch ($_GET["tipo_busqueda"]) {
	case '1':
		switch ($_GET["accion"]) {
			case '1':
				$conexion = new Conexion();
			  	$conexion->conectar();
			  	$consulta=$conexion->ejecutarInstruccion("SELECT * FROM(
			  		SELECT A.*, ROWNUM RW
			  		FROM (
			           SELECT CODIGO_FOTO, URL_FOTO
			            FROM TBL_FOTOS) A
			            WHERE UPPER(URL_FOTO) LIKE UPPER('%".$_POST["busqueda"]."%')
			        )
			        WHERE RW BETWEEN ".(1+(($_GET["accion"]-1)*20)).' AND '.(20+(($_GET["accion"]-1)*20)));
			  		?><div style="padding-left: 50px; padding-right: 40px;">
			 			<div class="grid">
			 		<?php
				  	while(($linea=$conexion->obtenerRegistro($consulta))!= false){
				  			?>
					      <div class="grid-item" id="grid<?php echo $linea["CODIGO_FOTO"];?>">
				              <img src="<?php echo $linea["URL_FOTO"];?>" class="img-responsive" width="250" style="border-radius: 12px;" onclick="mostrar(<?php echo $linea["CODIGO_FOTO"];?>)" id="img">
				              <div class="text-right" style="height: 0px;">
				              	<div class="btn-group" style="display: none; top: -40px; left: -10px" id="btn<?php echo $linea["CODIGO_FOTO"];?>">
				              		<button type="button" class="btn btn-default" onclick="redireccionar(<?php echo $linea["CODIGO_FOTO"];?>)">Ver Pin</button>
								  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...
								  </button>
								  <ul class="dropdown-menu">
								    <li><a onclick="ocultar(<?php echo $linea["CODIGO_FOTO"];?>)">Ocultar</a></li>
								    <li><a href="#">Denunciar</a></li>
								    <li role="separator" class="divider"></li>
								    <li><a href="#">Ves este pin porque </a></li>
								  </ul>
								</div>
					          </div>
					      </div>
					      <?php	
				  		
				  	}?>
				  		</div>
					</div>
						<div class="text-center" id="btn-pag">
					      	<button type="button" class="btn btn-info" id="pag<?php echo $_GET["accion"]+1;?>" onclick="mas_busqueda(<?php echo ($_GET["accion"]+1).","."'".$_POST["busqueda"]."'".",".$_GET["tipo_busqueda"];?>)" style="margin-bottom: 10px;">Pagina <?php echo $_GET["accion"]+1;?></button>
					      </div>
					<?php
					$conexion->desconectar();
				break;
			
			default:
				$conexion = new Conexion();
			  	$conexion->conectar();
			  	$consulta=$conexion->ejecutarInstruccion("SELECT * FROM(
			  		SELECT A.*, ROWNUM RW
			  		FROM (
			           SELECT CODIGO_FOTO, URL_FOTO
			            FROM TBL_FOTOS) A
			            WHERE UPPER(URL_FOTO) LIKE UPPER('%".$_POST["busqueda"]."%')
			        )
			        WHERE RW BETWEEN ".(1+(($_GET["accion"]-1)*20)).' AND '.(20+(($_GET["accion"]-1)*20)));
				  	while(($linea=$conexion->obtenerRegistro($consulta))!= false){
				  			?>
					      <div class="grid-item" id="grid<?php echo $linea["CODIGO_FOTO"];?>">
				              <img src="<?php echo $linea["URL_FOTO"];?>" class="img-responsive" width="250" style="border-radius: 12px;" onclick="mostrar(<?php echo $linea["CODIGO_FOTO"];?>)" id="img">
				              <div class="text-right" style="height: 0px;">
				              	<div class="btn-group" style="display: none; top: -40px; left: -10px" id="btn<?php echo $linea["CODIGO_FOTO"];?>">
				              		<button type="button" class="btn btn-default" onclick="redireccionar(<?php echo $linea["CODIGO_FOTO"];?>)">Ver Pin</button>
								  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...
								  </button>
								  <ul class="dropdown-menu">
								    <li><a onclick="ocultar(<?php echo $linea["CODIGO_FOTO"];?>)">Ocultar</a></li>
								    <li><a href="#">Denunciar</a></li>
								    <li role="separator" class="divider"></li>
								    <li><a href="#">Ves este pin porque </a></li>
								  </ul>
								</div>
					          </div>
					      </div>
					      <?php	
				  	}
				  	?>
				  	<?php
				break;
		}
		break;
	case '3':
		switch ($_GET["accion"]) {
			case '1':
				$conexion = new Conexion();
			  	$conexion->conectar();
			  	$consulta=$conexion->ejecutarInstruccion("WITH SEGUIDORES AS (SELECT CODIGO_USUARIO, COUNT(*) AS NUM_SEGUIDORES
					FROM TBL_SEGUIDORES_X_USUARIO
					GROUP BY CODIGO_USUARIO)    
					SELECT * FROM(
					SELECT A.*, ROWNUM RW
					FROM (
   					select A.CODIGO_IDIOMA, A.CODIGO_GENERO, A.ALIAS, A.NOMBRE, B.APELLIDO,
   					TO_CHAR(B.FECHA_NACIMIENTO, 'DD/MM/YYYY') as FECHA_NACIMIENTO, C.URL_FOTO, NVL(E.NUM_SEGUIDORES,0) AS NUM_SEGUIDORES
					from TBL_USUARIO A, TBL_PERSONA B, TBL_FOTOS C, SEGUIDORES E
					WHERE A.CODIGO_USUARIO = B.CODIGO_PERSONA(+)
					AND A.CODIGO_FOTO = C.CODIGO_FOTO(+) AND
					A.CODIGO_USUARIO = E.CODIGO_USUARIO(+) AND
					UPPER(A.NOMBRE || ' ' || B.APELLIDO || A.ALIAS) LIKE UPPER('%".$_POST["busqueda"]."%')) A
			        )
			        WHERE RW BETWEEN ".(1+(($_GET["accion"]-1)*20)).' AND '.(20+(($_GET["accion"]-1)*20)));
			  		?><div style="padding-left: 50px; padding-right: 40px;">
			 			<div class="grid">
			 		<?php
				  	while(($linea=$conexion->obtenerRegistro($consulta))!= false){
				  			?>
					      <div class="grid-item" id="grid<?php echo $linea["CODIGO_USUARIO"];?>">
				              <img src="<?php echo $linea["URL_FOTO"];?>" class="img-circle" width="250" height="250" id="img">
				              <div class="text-center"><h1><?php echo $linea["ALIAS"];?></h1><span class="bg-info"><?php echo $linea["NUM_SEGUIDORES"];?> Seguidores</span></div>
					      </div>
					      <?php	
				  		
				  	}?>
				  		</div>
					</div>
						<div class="text-center" id="btn-pag">
					      	<button type="button" class="btn btn-info" id="pag<?php echo $_GET["accion"]+1;?>" onclick="mas_busqueda(<?php echo ($_GET["accion"]+1).","."'".$_POST["busqueda"]."'".",".$_GET["tipo_busqueda"];?>)" style="margin-bottom: 10px;">Pagina <?php echo $_GET["accion"]+1;?></button>
					      </div>
					<?php
					$conexion->desconectar();
				break;
			
			default:
				$conexion = new Conexion();
			  	$conexion->conectar();
			  	$consulta=$conexion->ejecutarInstruccion("WITH SEGUIDORES AS (SELECT CODIGO_USUARIO, COUNT(*) AS NUM_SEGUIDORES
					FROM TBL_SEGUIDORES_X_USUARIO
					GROUP BY CODIGO_USUARIO)    
					SELECT * FROM(
					SELECT A.*, ROWNUM RW
					FROM (
   					select A.CODIGO_IDIOMA, A.CODIGO_GENERO, A.ALIAS, A.NOMBRE, B.APELLIDO,
   					TO_CHAR(B.FECHA_NACIMIENTO, 'DD/MM/YYYY') as FECHA_NACIMIENTO, C.URL_FOTO, NVL(E.NUM_SEGUIDORES,0) AS NUM_SEGUIDORES
					from TBL_USUARIO A, TBL_PERSONA B, TBL_FOTOS C, SEGUIDORES E
					WHERE A.CODIGO_USUARIO = B.CODIGO_PERSONA(+)
					AND A.CODIGO_FOTO = C.CODIGO_FOTO(+) AND
					A.CODIGO_USUARIO = E.CODIGO_USUARIO(+) AND
					UPPER(A.NOMBRE || ' ' || B.APELLIDO || A.ALIAS) LIKE UPPER('%".$_POST["busqueda"]."%')) A
			        )
			        WHERE RW BETWEEN ".(1+(($_GET["accion"]-1)*20)).' AND '.(20+(($_GET["accion"]-1)*20)));
				  	while(($linea=$conexion->obtenerRegistro($consulta))!= false){
				  			?>
					      <div class="grid-item" id="grid<?php echo $linea["CODIGO_USUARIO"];?>">
				              <img src="<?php echo $linea["URL_FOTO"];?>" class="img-circle" width="250" height="250" id="img">
				              <div class="text-center"><h1><?php echo $linea["ALIAS"];?></h1></div>
					      </div>
					      <?php	
				  	}
				  	?>
				  	<?php
				break;
		}
		break;
	case '5':
		$conexion = new Conexion();
	  	$conexion->conectar();
	  	$consulta=$conexion->ejecutarInstruccion('SELECT * FROM(
  		SELECT A.*, ROWNUM RW
  		FROM (
           SELECT NOMBRE_CATEGORIA, CODIGO_CATEGORIA
            FROM "TBL_CATEGORIAS") A
        )
        WHERE RW BETWEEN 41 AND 50');
        while(($linea=$conexion->obtenerRegistro($consulta))!= false){
        	echo '<li><a id="cate'.$linea['CODIGO_CATEGORIA'].'">'.$linea['NOMBRE_CATEGORIA'].'</a></li>';
        }
        ?>
        <li role="separator" class="divider"></li>
		<li><a href="Privacidad.html">Privacidad</a><a href="Condiciones.html">Condiciones</a></li>
		<?php
		break;
	default:
		
		break;
}
 	
?>