$(document).ready(function(){	
	$("#btn-crear").click(function(){
		
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
			//alert(resultado);
			if (resultado.codigoResp==1)
			creartablero();
			else
				alert("el tablero no se creo");
			},
		});
		//creartablero();
	});

});

 function creartablero() {
    window.location.href ="crear_tablero.html";
  }