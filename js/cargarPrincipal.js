var tipo_busqueda;
$(document).ready(function(){
	tipo_busqueda = 1;
	$('form').keypress(function(e){
		if (e.which == 13) {
			return false;
		};
	});
	$.ajax({			
			url:"ajax/acceso.php?accion=1",
			success:function(respuesta){
				if (respuesta==0) {
					nombrar();
				}
			}
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
function nombrar(){
		$.ajax({
		url:"ajax/acceso.php?accion=2",
		method:"POST",
		dataType:"JSON",
		success:function(respuesta){
			$('#perfil').html(respuesta.NOMBRE+'&nbsp;<img src="'+respuesta.URL_FOTO+'" width="18px" height="18px" class="img-circle">');
		}
	});
};
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
};
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
function que_buscar(codigo){
	if (codigo==2) {
		tipo_busqueda = 2;
		$('#tipo_busqueda').html('Tus Pines&nbsp;<span class="glyphicon glyphicon-chevron-down"></span></span>');
		$('#op1').html('Todos los Pines');
		$('#op3').html('Gente');
		$('#op2').html('Tus Pines&nbsp;<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>');
	}else if (codigo==3) {
		tipo_busqueda = 3;
		$('#tipo_busqueda').html('Tus Pines&nbsp;<span class="glyphicon glyphicon-chevron-down"></span></span>');
		$('#op1').html('Todos los Pines');
		$('#op2').html('Tus Pines');
		$('#op3').html('Gente&nbsp;<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>');
	};
};
$('#busqueda').keypress(function(e){
	if (e.keyCode == 13) {
		var parametros= "busqueda="+$('#busqueda').val();
		$.ajax({
			url: "ajax/busquedas.php?tipo_busqueda="+tipo_busqueda+"&accion=1",
			data: parametros,
			method: "POST",
			dataType: "html",
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
	};
});
function mas_busqueda(numero,busqueda,t_busqueda){
	var parametros= "busqueda="+busqueda;
	$.ajax({
		url: "ajax/busquedas.php?tipo_busqueda="+t_busqueda+"&accion="+numero,
		data: parametros,
		method:"POST",
		dataType:"html",
		success:function(respuesta){
			alert(busqueda);
			$("#pag"+numero).remove();
			$(".grid").append(respuesta);
			$("#btn-pag").html("<button type='button' class='btn btn-info' id='pag"+(numero+1)+"' onclick='mas_busqueda("+(numero+1)+' ,"'+String(busqueda)+'", '+t_busqueda+")' style='margin-bottom: 10px;'>Pagina "+(numero+1)+"</button>");
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
};