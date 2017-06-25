<?php //include 'content/reaload.php';?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<?php include "content/nav.php" ?>
<style type="text/css">
	#btns-subnav{
		font-size: 25px;
	}
	#nombrePerfil{
		font-size: 50px;
		font: helvetica;
    font-weight: bold;
		color:#4d4d4d;
	}
	.subEtiquetasPefil{
		margin-bottom: 0px;
		margin-top: 0px;
		font-size:18px;
	}

	#perfil{
	    max-width: 170px;
	    max-height: 170px;
	}

  .well{
    min-height: 160px;
   /* min-width: 190px;*/
    max-width: 230px;
  }
  #etiquetacreartablero{
    font-size:20px;
    color: #b5b5b5;
 
  }
  


</style>
<div row>
	<br>
	<div class="col-sm-12">
		<div class="col-sm-8 col-sm-offset-2" >
			<div id="btns-subnav">
	      <a style="margin-left:15px;" class="idnav" href="#"><i class="glyphicon glyphicon-cog"></i></a>
      	<a class="idnav" href="#"><i class="glyphicon glyphicon-share-alt"></i></a>
      	<a class="idnav" href="#"><i class="glyphicon glyphicon-option-horizontal"></i></a>
      	<br>
      	</div>
      <div class="col-sm-6">
  			<h1 id="nombrePerfil">Elisa Gabriela Zelaya</h1>
  		  </div>
  		<div class="col-sm-2">
  			<br>
  			<br>
  			<p  class="subEtiquetasPefil">0</p>
  			<p style="color: #b5b5b5;" class="subEtiquetasPefil" >Seguidores</p>
  		</div>
  		<div class="col-sm-2">
  			<br>
  			<br>
  			<p  class="subEtiquetasPefil">0</p>
  			<p style="color: #b5b5b5;"class="subEtiquetasPefil" >Siguiendo</p>
  		</div>
  		<div class="col-sm-2">
  			<br>
  			<center>
  				<img id="perfil" src="img/icon.png">
  			</center>
    		</div>
  		</div>
      <div clas="col-sm-12">
        <div class="col-sm-8 col-sm-offset-2">
          <ul class="nav nav-pills">
          <li role="presentation" class="active"><a href="#">Tableros</a></li>
          <li role="presentation"><a href="#">Pines</a></li>
           </ul>
          <br>
        <div class="well col-sm-3">
          <center><a href="#"><i  style="font-size:35px; margin-top: 35px"class="glyphicon glyphicon-plus-sign"></i></a></center></div>
         
          </div> 
        <div class="col-sm-2 col-sm-offset-2">
            <p id="etiquetacreartablero"><b>Crear tablero</b></p>
          </div>
      </div>
	</div>

</div>
