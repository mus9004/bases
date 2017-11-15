$(document).ready(function(){
	$('form').keypress(function(e){
		if (e.which == 13) {
			return false;
		};
	});
	$.ajax({
		url:"ajax/procesar-principal.php?accion=1",
		method:"POST",
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
$('#busqueda').keypress(function(e){
	if (e.keyCode == 13) {
		$("#principal").html($('#busqueda').val());;
	};
});
function mas(numero){
	$.ajax({
		url:"ajax/procesar-principal.php?accion="+numero,
		method:"POST",
		dataType:"html",
		success:function(respuesta){
			$("#pag"+numero).remove();
			$(".grid").append(respuesta);
			$("#btn-pag").html("<button type='button' class='btn btn-info' id='pag"+(numero+1)+"' onclick='mas("+(numero+1)+")' style='margin-bottom: 10px;'>Pagina "+(numero+1)+"</button>");
			$('.grid').imagesLoaded( function() {
			  $('.grid').isotope({
			    masonry: {
					columnWidth: 40
				}
			  });
			});
			$('.grid').isotope('reloadItems');
		}
	});
}
function mostrar(codigo){
	$('#btn'+codigo).toggle();
};
function redireccionar(codigo){
	location.href = "pines.html?pin="+codigo;
};
function ocultar(codigo){
	$('#grid'+codigo).hide();
	$('.grid').isotope('layout');
};
$("#perfil").click(function(){
      location.href ="perfil.html";
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
function que_buscar(codigo){
	if (codigo==2) {
		$('#tipo_busqueda').html('Tus Pines&nbsp;<span class="glyphicon glyphicon-chevron-down"></span></span>');
		$('#op1').html('Todos los Pines');
		$('#op3').html('Gente');
		$('#op2').html('Tus Pines&nbsp;<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>');
	}else if (codigo==3) {
		$('#tipo_busqueda').html('Tus Pines&nbsp;<span class="glyphicon glyphicon-chevron-down"></span></span>');
		$('#op1').html('Todos los Pines');
		$('#op2').html('Tus Pines');
		$('#op3').html('Gente&nbsp;<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>');
	};
};