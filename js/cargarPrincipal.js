$(document).ready(function(){
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
			$grid.on( 'click', '.grid-item', function() {
			  // remove clicked element
			  $(this).toggleClass('gigante');
			    // layout remaining item elements
			    $grid.isotope('layout');
			});
		}
	});
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
			var $grid = $('.grid').imagesLoaded( function() {
			  $grid.isotope({
			    masonry: {
					columnWidth: 40
				}
			  });
			});
			$grid.on( 'click', '.grid-item', function() {
			  // remove clicked element
			  $(this).toggleClass('gigante');
			    // layout remaining item elements
			    $grid.isotope('layout');
			});
			$grid.isotope('reloadItems');
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
};
$("#perfil").click(function(){
      location.href ="perfil.html";
    });