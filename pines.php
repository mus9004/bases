<!DOCTYPE html>
<html>
<head>
	<title>Pines</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/button.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">      
	  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	  <link rel="stylesheet" href="css/materialize.min.css">
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>           
      <script src="js/materialize.min.js"></script>    
      <style>
      	.texto{    margin-left: 15px;}
      	.imagenModal{
      		/*max-width: 100%;*/
      		width: 200px;
      		height: auto;
    		width: auto/50;
    		/*width: 280px;         		*/
    		/*height: auto; */
    		margin: auto; 
    		display: block; 
    		border-radius: 15px;
      	}
      </style>
      	
	  
</head>
<body class="behind "> 
		<a href="principal.html" class="close" style=" margin-right: 80px; margin-top: 20px;">&times;</button>
       <div class="centrar corner display">
       	
           <a href="#myModal" data-toggle="modal" class="myButton positionButton1 ">GUARDAR</a>
           <div id="pin" class="img-responsive img1" ></div>
	     	<!-- <hr width="85%" /> -->
		      <div class="texto">
            <img src="img/tablero/1.jpg">
		       <table>
		        <tr>
		        	<td>
				         <h5>¿Has probado este PIN?</h5>
				         <h6>Se el primero en compartir</h6>
				         <h6>tu experiencia.</h6>
			        </td>
			        <td>

			             <a href="#myModal2" data-toggle="modal" class="myButton">Añadir foto</a>
			        </td> 
			    </tr>       	  
			   </table>    
        </div >
        <hr width="85%" />
        <div class="texto" >
        	<h5>Comentarios:</h5>
        	<div id="comentario"></div>
        </div>
      </div>
	<!-- Modal1 -->

      <div id="myModal" class="modal fade" role="dialog">
	      <div class="modal-header">
	      <table>
	           	<tr>
	        		<td>
	        			<div id="pinModal">
	        			</div>
	        			</td>
	        			<td>
							<center><h4 class="modal-title">Seleccionar Tablero</h4></center>
							<hr width="85%" />
						     <table>
						     <tr>
						     	<td><div id="tablero"> </div></td>
						     	<!-- <td> <button id="btn-almacenar" style="width: 130px; text-align: center; margin-top: 5px;" type="button" class="btn btn-danger"  >Guardar</button></td> -->
						     </tr>

                           	 </table>
                         	</td>
                    	
					</td>	
				</tr>
			</table>
	        			
	        		</td>

		</div>
	    			
	             
	      <div class="modal-footer">
	      	 <div id ="guardando" ></div>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

	      </div>
	    </div>

	  </div>
	</div>
	<!-- Modal2 -->
      <div class="modal fade" id="myModal2" role="dialog">
            <!-- <div class="modal-dialog modal-lg"> -->
            
                  <!-- <div class="modal-content"> -->
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 style="text-align: center;" class="modal-title"><strong>Has probado este pin </strong> </h4>
                      </div>
                          <div class="form-group">
                                  <center>
                                  <form style="width: 200px" method="post" id="formulario" enctype="multipart/form-data">
                                   <h5>Cargar Imagen:</h5>
                                  <br><input style="width: 100%" type="file" name="file">
                                 </form><br>
                                 </center>
                                
                          </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="crearPin()">Crear</button>
                      </div>
                  </div>
              
            </div>
        </div>


	  </div>
	</div>
 		<div class="fixed-action-btn horizontal">
		    <a class="btn-floating btn-large red ">
		      <i class="material-icons">publish</i>
		    </a>
		    <ul>
		      <li><a href="https://www.facebook.com/" class="btn-floating blue"><i class="material-icons"><img src="img/facebook.png"></i></a></li>
		      <li><a href="https://twitter.com/login?lang=es" class="btn-floating blue darken-1"><i class="material-icons"><img src="img/twitter1.png"></i></a></li>
		      <li><a class="btn-floating green"><i class="large material-icons">mode_edit</i></a></li>
		      <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
		    </ul>
		  </div>

 <script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/infinite-scroll.pkgd.min.js"></script>
<script src="js/isotope.pkgd.min.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/controlador_pin.js"></script>
<script type="text/javascript">
	function crearPin() {
    window.location.href ="crear_tablero.php";
  }
   // $("#capa").hover(function(){
   //      $("#btn-guardar").show();
   //  }, function(){
   //      $("#btn-guardar").hide();
   //  });
  </script>
</body>
</html>