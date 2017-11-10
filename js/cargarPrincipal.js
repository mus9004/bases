$(document).ready(function(){
	$.ajax({
		url:"ajax/procesar-principal.php?accion=1",
		method:"POST",
		dataType:"html",
		success:function(respuesta){
			$("#principal").html(respuesta);
			var $grid = $('.grid').imagesLoaded( function() {
			  // init Masonry after all images have loaded
			  $grid.masonry({
			    columnWidth: 40
			  });
			});
			$grid.on( 'click', '.grid-item', function() {
			  // remove clicked element
			  $grid.masonry( 'remove', this )
			    // layout remaining item elements
			    .masonry('layout');
			});
		}
	});
});
$("#perfil").click(function(){
      location.href ="perfil.html";
    });