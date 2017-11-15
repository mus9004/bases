$(document).ready(function(){
	var parametro="txt-codigousu="+  $("#txt-sitio").val();
	//alert(parametro);
	$.ajax({
		url:"ajax/procesar-tableros-creados.php?accion=1",
		method:"POST",
		data:parametro,
		method:"POST",
		dataType:"html",
		success:function(respuesta){
			$("#principal").html(respuesta);
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