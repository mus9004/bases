<?php
session_start();
include_once("../class/class-conexion-oracle1.php");
switch ($_GET["accion"]) {
	case '1':
	
	$conexion = new Conexion();
  	$conexion->conectar();
  	$codigo_usuari=$_POST['txt-codigousu'];
  	$consulta=$conexion->ejecutarInstruccion("
											SELECT *
											FROM TBL_TABLERO
											WHERE CODIGO_USUARIO = $codigo_usuari");

  		?><div style="padding-left: 50px; padding-right: 40px;">
 			<div class="grid">
 		<?php
	  	while(($linea=$conexion->obtenerRegistro($consulta))!= false){
	  			?>
		      <div class="grid-item" id="grid<?php echo $linea["CODIGO_TABLERO"];?>">
	              <img src="img/tablero/5.jpg" class="img-responsive" width="200" style="border-radius: 12px;" onclick="mostrar(<?php echo $linea["CODIGO_TABLERO"];?>)" id="img">
	              
	              <div class="text-right" style="height: 0px;">
	              	<div class="btn-group" style="display: none; top: -40px; left: -10px" id="btn<?php echo $linea["CODIGO_TABLERO"];?>">
	              		<button type="button" class="btn btn-default" onclick="redireccionar(<?php echo $linea["CODIGO_TABLERO"];?>)">Ver Tablero</button>
					  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...
					  </button>
					  <ul class="dropdown-menu">
					    <li><a href="#">Denunciar</a></li>
					    <li role="separator" class="divider"></li>
					    <li><button type="button" class="btn btn-link" data-toggle="modal"  onclick="redireccionar(<?php echo $linea["CODIGO_TABLERO"];?>)">Editar</button></li>
					  </ul>
					</div>
		          </div>
		      </div>
		      <?php	
	  		
	  	}?>
	  		</div>
		</div>
		<?php

		$conexion->desconectar();
		break;
	
	default:
		break;
}
 	
?>