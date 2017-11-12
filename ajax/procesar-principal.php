<?php
 	include_once("../class/class-conexion-oracle1.php");
	$conexion = new Conexion();
  	$conexion->conectar();
  	$consulta=$conexion->ejecutarInstruccion('
  		SELECT CODIGO_FOTO, URL_FOTO
  			FROM "TBL_FOTOS"');
  		?><div style="padding-left: 50px; padding-right: 40px;">
 			<div class="grid">
 		<?php
	  	while(($linea=$conexion->obtenerRegistro($consulta))!= false){
	  			?>
		      <div class="grid-item" id="grid<?php echo $linea["CODIGO_FOTO"];?>">
	              <img src="<?php echo $linea["URL_FOTO"];?>" class="img-responsive" width="250" style="border-radius: 12px;" onclick="mostrar(<?php echo $linea["CODIGO_FOTO"];?>)">
	              <div class="text-right">
	              	<div class="btn-group" style="display: none; top: 10px; margin-bottom: 10px" id="btn<?php echo $linea["CODIGO_FOTO"];?>">
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
		<?php
 		/*?><div style="padding-left: 50px; padding-right: 40px;">
 			<div class="grid">
 		<?php
 		for ($i=0; $i < 20; $i++) { 
		      ?>
		      <div class="grid-item">
	              <img src="img/<?php echo rand(1,27)?>.jpg" class="img-responsive" width="250" style="border-radius: 12px;">
	          </div>
		      <?php
		    }
		?></div>
		</div>
		<?php*/
		$conexion->desconectar();
?>