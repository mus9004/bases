<?php
 switch ($_GET["accion"]) {
 	case '1':
 	include_once("../class/class-conexion-oracle1.php");
	$conexion = new Conexion();
  	$conexion->conectar();
  	$consulta=$conexion->ejecutarInstruccion('SELECT * FROM TBL_FOTOS');
  		?><div style="padding-left: 50px; padding-right: 40px;">
 			<div class="grid">
 		<?php
	  	while(($linea=$conexion->obtenerRegistro($consulta))!= false){
	  			?>
		      <div class="grid-item">
	              <img src="<?php echo $linea[4];?>" class="img-responsive" width="250" style="border-radius: 12px;">
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
		break;
 	
 	default:
 		# code...
 		break;
 }
?>