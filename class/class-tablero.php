<?php
 switch ($_GET["accion"]) {
 	case '1':
 		for ($i=0; $i < 20; $i++) { 
		      ?>
		      <div class="grid-item"><img src="img/icon.png" width="250" height="250" class="img-responsive"><strong>Pinterest Logo</strong><br>Leví Canales<button class="btn btn-danger btn-block">Seguir</button></div>
		      <?php
		    }
		break;
 	
 	default:
 		# code...
 		break;
 }
?>