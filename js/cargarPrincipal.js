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
function mostrar(codigo){
	$('#btn'+codigo).toggle();
};
$("#perfil").click(function(){
      location.href ="perfil.html";
    });