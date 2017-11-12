<?php
include_once("../class/class-conexion-oracle1.php");
switch ($_GET["accion"]) {
	case '1':
	$conexion = new Conexion();
  	$conexion->conectar();
  	$consulta=$conexion->ejecutarInstruccion('SELECT * FROM(
  		SELECT A.*, ROWNUM RW
  		FROM (
           SELECT CODIGO_FOTO, URL_FOTO
            FROM "TBL_FOTOS") A
        )
        WHERE RW BETWEEN '.(1+(($_GET["accion"]-1)*20)).' AND '.(20+(($_GET["accion"]-1)*20)));
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
		      	<button type="button" class="btn btn-info" id="pag<?php echo $_GET["accion"]+1;?>" onclick="mas(<?php echo $_GET["accion"]+1;?>)" style="margin-bottom: 10px;">Pagina <?php echo $_GET["accion"]+1;?></button>
		      </div>
		<?php
		$conexion->desconectar();
		break;
	
	default:
		$conexion = new Conexion();
  	$conexion->conectar();
  	$consulta=$conexion->ejecutarInstruccion('SELECT * FROM(
  		SELECT A.*, ROWNUM RW
  		FROM (
           SELECT CODIGO_FOTO, URL_FOTO
            FROM "TBL_FOTOS") A
        )
        WHERE RW BETWEEN '.(1+(($_GET["accion"]-1)*20)).' AND '.(20+(($_GET["accion"]-1)*20)));
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
 	
?>