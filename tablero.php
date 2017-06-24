<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/icon.png">

    <title>Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/tablero.css" rel="stylesheet">
  </head>

  <body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
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
                  <li><a href="#">Tableros <span class="glyphicon glyphicon-ok" aria-hidden="true"></a></li>
                </ul>
                <button type="button" class="btn btn-default">Categorías
                  <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
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
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div style="padding-left: 50px; padding-right: 50px;">
  <div class="row">
    <div class="grid">
    <div class="grid"></div>
    <?php
    for ($i=0; $i < 20; $i++) { 
      ?>
      <div class="grid-item"><img src="img/icon.png" width="250" height="250" class="img-responsive"><strong>Pinterest Logo</strong><br>Leví Canales<button class="btn btn-danger btn-block">Seguir</button></div>
      <?php
    }
      
    ?>
  </div>
</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script>$('.grid').isotope({
        layoutMode: 'fitRows',
        itemSelector: '.grid-item',
        fitRows: {
          gutter: 10
        }
      });
    </script>
    <script src="js/cargarTablero.js"></script>
  </body>
</html>
