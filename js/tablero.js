$(document).ready(function(){	
	$("#btn-crear").click(function(){
		var b=$("#txt-nombre").val();
		if ($('input:checkbox[name=chk-secreto]:checked').is(':checked')) {
			var a=2
		}
		else
			var a=1
		var parametros = "txt-nombre=" + $("#txt-nombre").val() + "&" + 
			"chk-checkbox="+a;
			alert(parametros);
		$.ajax({ 
			url:"ajax/procesar_tablero.php?accion=1",
			method: "POST",
			data:parametros,
			dataType:"json",
			success:function(resultado){
			alert(resultado.mensajeResp);
			if (resultado.codigoResp==1){
			creartablero();
			}
			else{
				alert("el tablero no se creo");
			}
			$("#nombre-tablero").val()=b;
			},

		});
	});



	$("#btn-edi").click(function(){
		if ($('input:checkbox[name=chksecreto]:checked').is(':checked')) {
			var a=2
		}
		else
			var a=1
		var parametros = "txt-nombre=" + $("#txt-nombre").val() + "&" + 
			"chk-checkbox="+a+ "&"+
			"txt-descripcion=" + $("#txt-descripcion1").val()+ "&"+
			"txt-codigota="+  $("#txt-sitio").val();
			alert(parametros);
		$.ajax({
			url:"ajax/procesar_tablero.php?accion=2",
			method: "POST",
			data:parametros,
			dataType:"json",
			success:function(resultado){
			alert(resultado.mensajeResp);
			if (resultado.codigoResp==1){
			creartablero();
			}
			else{
				alert("el tablero no se actualizo");
			}
			$("#nombre-tablero").val()=b;
			},

		});
	});

	$("#btn-eliminar").click(function(){
		var parametros = 
			"txt-codigota="+  $("#txt-sitio").val();
			alert(parametros);
		$.ajax({
			url:"ajax/procesar_tablero.php?accion=3",
			method: "POST",
			data:parametros,
			dataType:"json",
			success:function(resultado){
			alert(resultado.mensajeResp);
			if (resultado.codigoResp==1){
			creartablero();
			}
			else{
				alert("el tablero no se elimino");
			}
			},

		});
	});

});



 function creartablero() {
    window.location.href ="ver_tableros.php";
  }


/* function cargardatos(){
 	var parametro = "txt-nombre=" + $("#txt-nombre").val();
	  $.ajax({
	        url: "ajax/procesar_tablero.php?accion=2", 
		    method:"POST",
            //dataType:"json",
		    success: function(result){
		      $("#div-nombre").html(result);
		  }
	 });	  
}*/