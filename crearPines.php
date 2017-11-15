<!DOCTYPE html>
<html>
<head>
  <title>Pinterest/Perfil</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/buscar.css">
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
                      <button type="button" class="btn btn-default">Guardado
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
            <table>
            <tr>
              <h1 id="nombrePerfil">Ana Iris</h1>
              </div>
            </tr>
           <tr>
            <div class="col-sm-2">
                 <br>
                  <br>
                  <p  class="subEtiquetasPefil">0</p>
                  <p style="color: #b5b5b5;" class="subEtiquetasPefil" >Seguidor</p>
                
            </tr>
            </div>
                <td>
                  <div class="col-sm-2" style="left: 90px;">
                  <br>
                  <br>
                  <p  class="subEtiquetasPefil">0</p>
                  <p style="color: #b5b5b5; " class="subEtiquetasPefil" >Siguiendo</p>
                </td>
            
            </table>
            </div>
            <div class="col-sm-2">
              <br>
              <center>
                <img id="perfil" src="img/icon.png">
              </center>
             </div>
          </div>


          <div class="col-sm-12">
            <div class="col-sm-8 col-sm-offset-2" style="top: 80px;">
              <ul class="nav nav-pills">
              <li role="presentation" ><a href="ver_tableros.php">Tableros</a></li>
              <li role="presentation" class="active"><a href="#">Pines</a></li>
               </ul>
              <br>
            </div> 
            <div class="col-sm-12 col-sm-offset-2" style="top: 90px">
                <p id="etiquetacreartablero"><b>Crear Pines</b></p>
                <div></div>
            </div>
          </div>
      </div>
    </div>
    <div >
         
         <div class="well col-sm-3 col-sm-offset-2 e zoom" style="    margin-left: 120px;
              top: 150px;">
                <center><a href="#myModal"  data-toggle="modal"><i  style="font-size:35px; margin-top: 35px"class="glyphicon glyphicon-plus-sign"></i></a></center>
          </div>
    </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
            
                  <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 style="text-align: center;" class="modal-title"><strong> Crear Pin</strong> </h3>
                      </div>
                          <div class="form-group">

                            <table class="table ">
                              <tr>
                                <td style="align-items: center;" rowspan="4">
                                  <br><br>
                                  <form style="width: 200px" method="post" id="formulario" enctype="multipart/form-data">
                                   <h4>Cargar Imagen:</h4>
                                  <input style="width: 100%" type="file" name="file">
                                 </form><br>
                                  <input type="text" id="txt-imagen" name="txt-imagen" placeholder="img/001.jpg" required class="form-control">
                                </td>
                                <td rowspan="2">
                                  <h4>Añade una descripcion</h4>
                                  <input style="background: #E4E0DF" aria-invalid="false" class="form-control" type="textarea" name="txt-descripcion" id="txt-descripcion" placeholder="Descripcion" required>
                                </td>
                              </tr>
                              <tr>
                                <td></td>
                              </tr>
                              <tr>
                                <td rowspan="2">
                                   <h4>Enlaza con el sitio web</h4>
                                  <input style="background: #E4E0DF" aria-invalid="false" class="form-control" type="text" name="txt-nombre" id="txt-nombre" placeholder="http://" required>
                                </td>
                              </tr>
                              <tr>
                                <td></td>
                              </tr>
                            </table>     
                          </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="crearPin()">Crear</button>
                      </div>
                  </div>
              
            </div>
        </div>

        <!--modal dos-->
        <div class="modal fade" id="myModal1" role="dialog">
             <div class="modal-dialog modal-lg">
                <div class="modal-content col-lg-12">
                  <div >
                    <div class=" col-lg-6">
                      <br><br><br>
                      <div class="col-lg-6" style="text-align: center;">
                        <img src="img/anillo6.jpg" style="width: 256px; height: 256px">
                        <br><br>
                        descripcion pin
                        <br><br><br>
                      </div>

                    </div>
                    
                    <div class=" col-lg-6">
                      <div >
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 style="text-align: center;" class="modal-title"><strong> seleccionar tablero</strong> </h3>
                      </div>
                       <div class="flexsearch">
                            <div class="flexsearch--wrapper">
                              <form class="flexsearch--form" action="#" method="post">
                                <div class="flexsearch--input-wrapper">
                                  <input class="flexsearch--input" type="search" placeholder="Buscar">
                                </div>
                                <input class="flexsearch--submit" type="submit" value="&#10140;"/>
                              </form>
                            </div>
                        </div><br>
                        <div>
                          Todos los tableros
                          <table class="table table-hover ">
                              <tr>
                                <td id="capa">
                                  <img src="img/anillo7.jpg" height="15%" class="img-circle">&nbsp  nombre del tablero &nbsp &nbsp &nbsp 
                                
                                  <button id="btn-guardar" style="width: 130px; text-align: center;" type="button" class="btn btn-danger" data-dismiss="modal" onclick="guardar()">Guardar</button>
                                </td>
                              </tr>
                            </table>  
                        </div>
                        
                    </div>
                    </div>
                    
                  </div>
                </div>
              </div>
        </div>


        <!-- Modal tres -->
        <div class="modal fade" id="myModal2" role="dialog">
            <div class="modal-dialog modal-lg">
            
                  <div class="modal-content">
                      <div class="modal-header">
                        <h3  class="modal-title"><strong> Guardado en "nombre del tablero"</strong> </h3>
                      </div>
                      <div style="text-align: center;">
                        <img src="img/anillo6.jpg" style="height: 50%">
                      </div>
                         
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      </div>
                  </div>
              
            </div>
        </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
   <script>
  function crearPin(){
    $('#myModal1').modal('show');
  }

   $("#capa").hover(function(){
        $("#btn-guardar").show();
    }, function(){
        $("#btn-guardar").hide();
    });

   function guardar(){
    $('#myModal2').modal('show');
  }
  </script>

 
</body>
</html>

