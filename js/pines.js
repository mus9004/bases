$(document).ready(function(){	
	$("#btn").click(function(){
		
		var parametros = "txt-nombre1=" + $("#txt-nombre1").val() + "&" +
			"txt-imagen=" + $("#txt-imagen").val() + "&" + 
			"txt-descripcion=" + $("#txt-descripcion").val() + "&" +
			"txt-url=" + $("#txt-url").val() + "&" +
			"txt-sitio=" + $("#txt-sitio").val() + "&" +
			"slc-tableros=" + $("#slc-tableros").val();
			alert(parametros);
		$.ajax({ 
			url:"ajax/procesar_pines.php?accion=1",
			method: "POST",
			data:parametros,
			dataType:"json",
			success:function(resultado){
			alert(resultado.mensajeResp);
			if (resultado.codigoResp==1){
			//creartablero();
			}
			else{
				alert("el tablero no se creo");
			}
			$("#nombre-tablero").val()=b;
			},

		});
	});

});



 function creartablero() {
    window.location.href ="ver_tableros.php";
  }