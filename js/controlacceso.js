    $("#btn-login").click(function(){
      
      var parametros="inputEmail="+$("#inputEmail").val() +"&"+ "inputPassword="+$("#inputPassword").val();

      $.ajax({
        url: "acciones.php", 
        data:parametros,
        method:"POST",
        dataType:"json",
        success: function(result){
        		//alert(result);
            if (result==0) 
             	alert("Usuario o Password incorrectos");
            	//$("#msgtxt").html('<div style="color: red">Informacion Invalida </div>');
			if (result==1) 	
				 location.href ="Principal.html";         
             
          }
      });

    });
