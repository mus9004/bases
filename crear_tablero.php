<?php
    session_start();
    include_once("class/class-conexion-oracle1.php");
        $conexion = new Conexion();
        $conexion->conectar();
        $codigousuario=$_SESSION['codigo_usuario'];
        $codigo_table=$_GET['codigo_tablero'];
        $seguidores=$conexion->ejecutarInstruccion("
                                            SELECT CODIGO_TABLERO, COUNT(*)  AS SEGUIDORES
                                            FROM TBL_SEGUIDORES_X_TABLEERO
                                            GROUP BY CODIGO_TABLERO
                                            HAVING CODIGO_TABLERO =$codigo_table
                                              ");
        $nombre_tab=$conexion->ejecutarInstruccion("
                                            SELECT NOMBRE_TABLERO
                                            FROM TBL_TABLERO
                                            WHERE CODIGO_TABLERO =$codigo_table
                                              ");

         $usuario=$conexion->ejecutarInstruccion("
                                            SELECT CODIGO_USUARIO,
                                                    NOMBRE ||' ' ||'('|| ALIAS ||')' AS NOMBRE    
                                            FROM TBL_USUARIO
                                            WHERE CODIGO_USUARIO = $codigousuario
                                              ");
         $seguidores1=$conexion->ejecutarInstruccion("
                                            SELECT A.CODIGO_TABLERO, B.NOMBRE ||' ' ||'('|| B.ALIAS ||')' AS NOMBRE 
                                            FROM TBL_SEGUIDORES_X_TABLEERO A
                                            INNER JOIN TBL_USUARIO B
                                            ON (A.CODIGO_USUARIO=B.CODIGO_USUARIO)
                                            WHERE A.CODIGO_TABLERO =$codigo_table
                                              ");
         $pines=$conexion->ejecutarInstruccion("
                                            SELECT A.NOMBRE_PIN, A.DIRECCION, A.DESCRIPCION, B.URL_FOTO, B.SITIO_WEB
                                            FROM TBL_PINES A
                                            INNER JOIN TBL_FOTOS B
                                            ON (A.CODIGO_FOTO=B.CODIGO_FOTO)
                                            WHERE CODIGO_USUARIO = $codigousuario
                                              ");
        
        $linea1=$conexion->obtenerRegistro($seguidores);
        $linea3=$conexion->obtenerRegistro($seguidores1);
        $linea=$conexion->obtenerRegistro($nombre_tab);
        $linea2=$conexion->obtenerRegistro($usuario);
        $linea4=$conexion->obtenerRegistro($pines);
    ?>

<!DOCTYPE html>
<html>
<head>
  <title>Pinterest/Perfil</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <meta charset="utf-8">
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
     .e:hover{
       background-color:rgba(217,222,231,0.5);
    }

    .zoom{
        transition: 1.5s ease;
        -moz-transition: 1.5s ease; /* Firefox */
        -webkit-transition: 1.5s ease; /* Chrome - Safari */
        -o-transition: 1.5s ease; /* Opera */
    }
    .zoom:hover{
      transform : scale(1.2);
      -moz-transform : scale(1.2); /* Firefox */
      -webkit-transform : scale(1.2); /* Chrome - Safari */
      -o-transform : scale(1.2); /* Opera */
      -ms-transform : scale(1.2); /* IE9 */
    }

    .material-switch > input[type="checkbox"] {
    display: none;   
    }

    .material-switch > label {
        cursor: pointer;
        height: 0px;
        position: relative; 
        width: 40px;  
    }

    .material-switch > label::before {
        background: rgb(0, 0, 0);
        box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
        border-radius: 8px;
        content: '';
        height: 16px;
        margin-top: -8px;
        position:absolute;
        opacity: 0.3;
        transition: all 0.4s ease-in-out;
        width: 40px;
    }
    .material-switch > label::after {
        background: rgb(255, 255, 255);
        border-radius: 16px;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
        content: '';
        height: 24px;
        left: -4px;
        margin-top: -8px;
        position: absolute;
        top: -4px;
        transition: all 0.3s ease-in-out;
        width: 24px;
    }
    .material-switch > input[type="checkbox"]:checked + label::before {
        background: inherit;
        opacity: 0.5;
    }
    .material-switch > input[type="checkbox"]:checked + label::after {
        background: inherit;
        left: 20px;
    }


    * {
    padding: 0;
    margin: 0;
    }
    p {
      margin-bottom: 10px;
    }
    .wrapper {
      width: 80%;
      margin: auto;
      overflow:hidden;
    }
    header {
      background: rgba(255,255,255,0.9);
      width: 100%;
      position: fixed;
      z-index: 10;
    }

    nav {
      float: left; /* Desplazamos el nav hacia la izquierda */
    }
    nav ul {
      list-style: none;
      overflow: hidden; /* Limpiamos errores de float */
    }
    nav ul li {
      float: left;
      font-family: Arial, sans-serif;
      font-size: 16px;
    }
    nav ul li a {
      display: block; /* Convertimos los elementos a en elementos bloque para manipular el padding */
      padding: 20px;
      color: #000;
      text-decoration: none;
    }
    nav ul li:hover {
      background: #EAE4E3;
    }
    .contenido {
      padding-top: 80px;
}

</style>
</head>
<body>

  <div>
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="Principal.html"><img src="img/icon.png" width="25" height="25"></a>
          </div>
            <form style="margin-top: 8px;">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search">
                  <div class="input-group-btn">
                      <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Tableros <span class="glyphicon glyphicon-chevron-down"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="#">Todos los Pines</a></li><br>
                        <li role="separator" class="divider"></li><br>
                        <li><a href="#">Tus Pines</a></li><br>
                        <li role="separator" class="divider"></li><br>
                        <li><a href="#">Pines que se pueden comprar</a></li><br>
                        <li role="separator" class="divider"></li><br>
                        <li><a href="#">Gente</a></li><br>
                        <li><a href="#">Tableros <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a></li><br>
                        <li role="separator" class="divider"></li><br>
                      </ul>
                      <button type="button" class="btn btn-default dropdown-toggle" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorías <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
                      </button>
                      <button type="button" id="perfil" class="btn btn-default">perfil
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                      </button>
                      <button type="button" class="btn btn-default">Notificaciones
                        <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                      </button>
                  </div>
                </div>
            </form>
          </div>
      </nav>
    </div>

    <div style="background-color: #FFFFFF;" >
      <p>
      <br></p>
      <br>
    </div>


   <div class="col-sm-12">
          <div class="col-sm-12 col-sm-offset-1" > 
            <header>
              <section class="wrapper">
                    <nav>
                        <ul>
                            <li> <a class="idnav" href="#myModal"  data-toggle="modal"><i class="glyphicon glyphicon-pencil"></i></a></li>
                            <li> <a class="idnav dropdown-toggle" href="#" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="glyphicon glyphicon-option-horizontal"></i></a>
                                <ul style="background-color: #FFFFFF" class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                   <li style="background-color: #FFFFFF" ><a href="#">Enviar tablero</a></li><br>
                                   <li role="separator" class="divider"></li><br>
                                   <li style="background-color: #FFFFFF"><a href="#">conpartir con facebook</a></li><br>
                                   <li role="separator" class="divider"></li><br>
                                   <li style="background-color: #FFFFFF"><a href="#">crear un widget</a></li><br>
                                   <li role="separator" class="divider"></li><br>
                               </ul> 
                            </li>
                        </ul>
                </nav>
                </section>
            </header>
          </div>
    </div> 

    <div style="background-color: #FFFFFF;" >
      <br>
      <br>
      <br>
      <br>
    </div>
    

    <div >
      <div class="col-sm-12">
          <div class="col-sm-8 col-sm-offset-2" >
            <div id="div-nombre" name="div-nombre" class="col-sm-6">
              <h3 ><span id="nombre-tablero"><?php echo $linea[0]?></span></h3>
            </div>
          </div>
      </div>
    </div>

     <div >
      <div class="col-sm-12">
        <div class="col-sm-10 col-sm-offset-2" >
           </div>
          <div class="col-sm-10 col-sm-offset-2" >
            <div class="col-sm-3">
              <p style="color: #b5b5b5;" class="subEtiquetasPefil" >0 pines</p>
              <p style="color: #b5b5b5;" class="subEtiquetasPefil" ><?php echo $linea1[1]?> seguidores </p><br>
              <br>
            </div>
            <div class="col-sm-8">
              <br>
              <center>
                <a class="idnav" href="#myModal1"  data-toggle="modal" style="color: #000000"><i style="font-size: 30px; margin-top:5px; align-content: center;" class="glyphicon glyphicon-plus-sign"></i></a>
                <img style="width: 60px" id="perfil" src="img/icon.png">
              </center><br>
             </div>
          </div>

      </div>
    </div>

    <div style="background-color: #FFFFFF;"> 
      <p> <br>
        <br>
      <br>
      <br>
      
      </p>
    </div>


<div>
    <div class="col-md-2 col-sm-2 col-md-2 col-lg-2">
          <p>
            <div class="container-fluid">
              <div class="row">
                
                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                  <div class="well">
                    <strong></strong>
                    <p>los pines que guardes se almacenaran aqui</p>
                    <img src="" class="img-responsive">
                    <span class="badge"></span>
                    <span class="badge"></span>
                    <p>
                      <hr>
                      <h4></h4>
                      <div>
                        <strong></strong>
                      </div>
                    </p>
                  </div>
                </div>

              </div>
            </div>
          </p>
     </div>


<?php
  while (($linea4=$conexion->obtenerRegistro($pines))!= false) {
  ?>  <div class="col-md-2 col-sm-2 col-md-2 col-lg-2"">
          <p>
            <div class="container-fluid">
              <div class="row">
                
                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                  <div class="well">
                    <strong><?php echo $linea4[0]?></strong>
                    <p></p>
                    <img src="<?php echo $linea4[3]?>" class="img-responsive">
                    <span class="badge"></span>
                    <span class="badge"></span>
                    <p>
                      <hr>
                      <h5><?php echo $linea4[2]?></h5>
                      <div>
                        <a href="<?php echo $linea4[4]?>">sitio web</a>
                      </div>
                    </p>
                  </div>
                </div>

              </div>
            </div>
          </p>
     </div>
  <?php 
}
?>
        <!-- Modal1 -->
        <div class="modal fade" id="myModal1" role="dialog">
            <div class="modal-dialog modal-lg">
            
                  <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title"><strong>Invita a gente a unirse a este tablero</strong></h2>
                      </div>

                          <div class="form-group">

                            <table class="table ">
                            	<tr>
                            		<td style="width: 200px">
                            			<div class="input-group">
						                  <input style="width: 180px" type="text" class="form-control" placeholder="Search">
                              <?php while(($linea3=$conexion->obtenerRegistro($seguidores1))!= false){
                               echo '<h4>'.$linea3['NOMBRE'].'</h4>';

                              }?>
                            		</td>

                            		<td style="width: 200px">
                            			<div><strong>Desarrollador</strong></div>
                            			
                            			<div class="col-sm-1" ">
		                                    <center><img style="width: 30px" class="img-responsive" id="perfil" src="img/icon.png"> </center>
		                                 </div> 
		                                 <div class="col-sm-8"><strong><h5><?php echo $linea2[1]?></h5></strong>
		                                 	<h6>Has creado este tablero</h5>
		                                 </div>

                            		</td>
                            	</tr>                           
                            </table>     
                          </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger">Listo</button>
                      </div>
                  </div>
              
            </div>
        </div>


  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
   <script src="js/tablero.js"></script>
   
 
</body>
</html>

