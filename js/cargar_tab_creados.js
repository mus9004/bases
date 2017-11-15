$(document).ready(function(){
	var parametro="txt-codigousu="+  $("#txt-sitio").val();
	//alert(parametro);
	$.ajax({

		url:"ajax/procesar-tableros-creados.php?accion=1",
		method:"POST",
		data:parametro,
		dataType:"html",
		success:function(respuesta){
			$("#principal").html(respuesta);
			var $grid = $('.grid').imagesLoaded( function() {
			  $grid.isotope({
			    masonry: {
					columnWidth: 40
				}
			  });
			});
			$grid.on( 'click', '#img', function() {
			  // remove clicked element
			  $(this).toggleClass('gigante');
			    // layout remaining item elements
			    $grid.isotope('layout');
			});
		}
	});
});
function mostrar(codigo){
	$('#btn'+codigo).toggle();
};
function redireccionar(codigo){
	location.href = "crear_tablero.php?codigo_tablero="+codigo;
};
function redireccionar1(codigo,){
	location.href = "ver_tableros.php?codigo_tablero="+codigo;
	$('#myModal1').modal('show')
};

$("#perfil").click(function(){
      location.href ="perfil.php";
    });
$(".dropdown-button").dropdown();
$("#buscar").click(function(){
      $('#barra').hide();;
    });
$("#buscar").click(function(){
      $('#barra').hide();
      $('#busqueda').show();
      $('.label-icon').addClass('active');
    });