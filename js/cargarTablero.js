$(document).ready(function(){
	$.ajax({
		url:"ajax/procesar-tablero.php?accion=1",
		method:"POST",
		dataType:"html",
		success:function(respuesta){
			$("#tablero").html(respuesta);
			$('.grid').isotope({
		        layoutMode: 'fitRows',
		        itemSelector: '.grid-item',
		        fitRows: {
		          gutter: 30
		        }
		      });
		}
	});
});
$("#perfil").click(function(){
      location.href ="perfil.html";
    });