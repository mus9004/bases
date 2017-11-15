<?php
    session_start();
    include_once("class/class-conexion-oracle1.php");
        $conexion = new Conexion();
        $conexion->conectar();
        $codigousuario=$_SESSION['codigo_usuario'];
        $usuario=$conexion->ejecutarInstruccion("
                                            SELECT CODIGO_USUARIO,
                                                    NOMBRE ||' ' ||'('|| ALIAS ||')' AS NOMBRE    
                                            FROM TBL_USUARIO
                                            WHERE CODIGO_USUARIO = $codigousuario
                                              ");
        $linea=$conexion->obtenerRegistro($usuario);
    ?>  

<!DOCTYPE html>
<html>
<head>
  <title>Pinterest/Perfil</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <meta charset="utf-8">
  <link href="css/tablero.css" rel="stylesheet">
    <link rel="icon" type="image/icon" href="img/icono3.png" />
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
                        <li><a href="#">Todos los Pines</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Tus Pines</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Pines que se pueden comprar</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Gente</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Tableros <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a></li>
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

    <div >
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
              <h1 id="nombrePerfil"><?php echo $linea[1]?></h1>
              </div>
            <div class="col-sm-4">
              <br>
              <center>
                <img id="perfil" src="img/icon.png">
              </center>
             </div>
             <div class="col-sm-12">
              <br>
              <br>
              <p style="color: #b5b5b5;" class="subEtiquetasPefil" >Tableros guardados</p><br>
              <input type="text" style="visibility: hidden;" id="txt-sitio" name="txt-sitio" value="<?php echo $_SESSION['codigo_usuario']?>">
            </div>
            
          </div>


         <div class="col-sm-12">
            <div class="col-sm-8 col-sm-offset-2">
              <ul class="nav nav-pills">
              <li role="presentation" class="active"><a href="ver_tableros.php">Tableros</a></li>
              <li role="presentation"><a href="crearPines.php">Pines</a></li>
               </ul>
              <br>
              <div class="well col-sm-3 e zoom">
                <center><a href="#myModal"  data-toggle="modal"><i  style="font-size:35px; margin-top: 35px"class="glyphicon glyphicon-plus-sign"></i></a></center>
              </div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            </div> 
          </div>
<!--<div >
    <div class="well col-sm-12 " style="max-width: 100%">
         <p id="etiquetacreartablero "><b>Tableros privados</b></p>
         <div class="well col-sm-3 col-sm-offset-2 e zoom">
                <center><a href="#myModal"  data-toggle="modal"><i  style="font-size:35px; margin-top: 35px"class="glyphicon glyphicon-plus-sign"></i></a></center>
          </div>
    </div>-->
</div>
      </div>



<div style="margin-top: 600px">
    <div id="principal1">
            
            
    </div>
</div>
 

  </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
                  <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Crear tablero</h4>
                      </div>
                          <div class="form-group">

                            <table class="table ">
                              <tr>
                                <td>
                                  <h4>Nombre</h4>
                                </td>
                                <td>
                                  <form method="POST" action="crear_tablero.php">
                                  <input aria-invalid="false" class="form-control" type="text" name="txt-nombre" id="txt-nombre" placeholder="Como lugar que visitar o recetas que hacer" required></td>
                                  </form>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h4>Secreto</h4>
                                  <a href=""><h5>Mas informacion</h5>
                                </td>
                                <td>
                                  <div class="material-switch pull-left">
                                        <br>
                                        <input class="form-control" id="someSwitchOptionDanger" name="chk-secreto" type="checkbox"/>
                                        <label  for="someSwitchOptionDanger" class="label-danger"></label>
                                    </div>
                                </td>
                              </tr>
                            </table>     
                          </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button id="btn-crear" type="button" class="btn btn-default" data-dismiss="modal" >Crear</button>
                      </div>
                  </div>
              
            </div>
        </div>

        <!-- Modal para editar tablero -->
          <div class="modal fade" id="myModal1" role="dialog">
            <div class="modal-dialog">
            
                  <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title"><strong>Edita tu tablero</strong></h2>
                      </div>
                          <div class="form-group">

                            <table class="table ">
                              <tr>
                                <td>
                                  <h4>Nombre</h4>
                                </td>
                                <td>
                                  <input style="background: #E4E0DF" aria-invalid="false" class="form-control" type="text" name="txt-nombre" id="txt-nombre" placeholder="nombre del tablero" required></td>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h4>Descipcion</h4>
                                </td>
                                <td>
                                  <input style="background: #E4E0DF" aria-invalid="false" class="form-control" type="textarea" name="txt-descripcion" id="txt-descripcion" placeholder="¿Cual es el tema de este tablero?" required></td>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h4>Categoria</h4>
                                </td>
                                <td>
                                  <select style="background: #E4E0DF" class="form-control" id="slc-categoria" >
                                    <option >¿De que tablero se trata?</option>
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                  </select>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h4>Secreto</h4>
                                  <a href=""><h5>Mas informacion</h5>
                                </td>
                                <td>
                                  <div class="material-switch pull-left">
                                        <br>
                                        <input class="form-control" id="someSwitchOptionDanger" name="someSwitchOption001" type="checkbox"/>
                                        <label  for="someSwitchOptionDanger" class="label-danger"></label>
                                    </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h4>Colaboradores</h4>
                                  <a href=""><h5>Mas informacion</h5>
                                </td>
                                <td>
                                  <br>
                                 <div class="input-group"> <input style="width: 300px" aria-invalid="false" class="form-control" type="text" name="txt-colaboradores" id="txt-colaboradores" placeholder="Nombre o correo">  &nbsp&nbsp&nbsp   <input style="width: 75px" class="btn btn-default" type="button" value="Invitar">
                                 </div>
                                 <div class="col-sm-1" ">
                                    <img style="width: 30px" class="img-responsive" id="perfil" src="img/icon.png">
                                    
                                 </div> 
                                 <div class="col-sm-6"><strong><h6>Has creado este tablero</h6></strong>
                                      </div>
                                </td>
                              </tr>
                            </table>     
                          </div>
                      <div class="modal-footer">
                        <div class="col-sm-3">
                          <button type="button" class="btn btn-default">Eliminar tablero</button>
                        </div>
                        
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger">Guardar</button>
                      </div>
                  </div>
              
            </div>
        </div>

<div style="margin-top: 60px">
    <div id="principal">
            
            
    </div>
</div>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/isotope.pkgd.min.js"></script>
  <script src="js/imagesloaded.pkgd.min.js"></script>
   <script src="js/tablero.js"></script>
   <script src="js/cargar_tab_creados.js"></script>
 <!-- <script>
    function redireccionar(codigo){
     codigo= $("#txt-nombre").val();
  window.location.href = "crear_tablero.php?tablero="+codigo;
};
  }
  </script>-->
    <script type="text/javascript">
        $("#btn-guardao").click(function(){
        window.location.href = "perfil.php";
    });
    </script> 
 
</body>
</html>

