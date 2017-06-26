<!DOCTYPE html>

<?php //include 'content/reaload.php';?>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<?php ///include "content/nav.php" ?>

<html>
<head>
  <title>Pinterest/Perfil</title>
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

</style>
</head>
<body>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#"><img src="img/icon.png" width="25" height="25"></a>
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
        </div>
      </nav>

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

          <div class="col-sm-12">
            <div class="col-sm-8 col-sm-offset-2">
              <ul class="nav nav-pills">
              <li role="presentation" class="active"><a href="#">Tableros</a></li>
              <li role="presentation"><a href="#">Pines</a></li>
               </ul>
              <br>
              <div class="well col-sm-3 e zoom">
                <center><a href="#"><i  style="font-size:35px; margin-top: 35px"class="glyphicon glyphicon-plus-sign"></i></a></center>
              </div>
            </div> 
            <div class="col-sm-12 col-sm-offset-2">
                <p id="etiquetacreartablero"><b>Crear tablero</b></p>
                <div></div>
            </div>
          </div>
      </div>
    </div>
    <div class="well col-sm-12 " style="max-width: 100%">
         <p id="etiquetacreartablero "><b>Tableros privados</b></p>
         <div class="well col-sm-3 col-sm-offset-2 e zoom">
                <center><a href="#"><i  style="font-size:35px; margin-top: 35px"class="glyphicon glyphicon-plus-sign"></i></a></center>
          </div>
    </div>
</body>
</html>



