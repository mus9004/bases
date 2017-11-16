

function getGET()
    {
        // capturamos la url
        var loc = document.location.href;
        // si existe el interrogante
        if(loc.indexOf('?')>0)
        {
           var getCadena = loc.split('?')[1];
           var getCodigo = getCadena.split('=')[1];  
            }
            return getCodigo;
        }
var codigo = getGET();
 // alert (codigo);   

$(document).ready(function(){
// 	$("#btn-almacenar").click(function(){
// 	alert("llege aqui");
// }
   $.ajax({
			url:"ajax/procesar-pin.php?accion=1&codigo=" +codigo+ "",
			method: "POST",
			success:function(resultado){
				$("#pin").html(resultado);
			    
			},
			error:function(){
				alert("algo esta mal");

			}
		});
$.ajax({
			url:"ajax/procesar-pin.php?accion=5&codigo=" +codigo+ "",
			method: "POST",
			success:function(resultado){
				$("#comentario").html(resultado);
			    
			},
			error:function(){
				alert("algo esta mal");

			}
		});   
$.ajax({

			url:"ajax/procesar-pin.php?accion=2&codigo=" +codigo+ "",
			method: "POST",
			success:function(resultado){
				$("#pinModal").html(resultado);
			    
			},
			error:function(){
				alert("algo esta mal");

			}
		});

$.ajax({

			url:"ajax/procesar-pin.php?accion=3",
			method: "POST",
			success:function(resultado){
				$("#tablero").html(resultado);
			    
			},
			error:function(){
				alert("algo esta mal");

			}
		});	


});
 
 function guardarUsuario($codigo) {
	// alert($codigo);
	// $.ajax({
	var codigoPin = getGET();	
	var codigoTablero = $codigo;
	 // alert(codigoTablero);
	$.ajax({
			url:"ajax/procesar-pin.php?accion=4&codigoTablero=" +codigoTablero+ "&codigoPin="+codigoPin+"",
			method: "POST",
			success:function(resultado){
				$("#guardando").html(resultado);
				
			    
			},
			error:function(){
				alert("algo esta mal");

			}
		});
}

// $("#btn-crearPin").click(function(){
// 	$.ajax({

// 			url:"ajax/procesar-pin.php?accion=5",
// 			method: "POST",
// 			success:function(resultado){
// 				$("#tablero").html(resultado);
			    
// 			},
// 			error:function(){
// 				alert("algo esta mal");

// 			}
// 		});	



//  });