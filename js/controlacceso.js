    $("#btn-login").click(function(){
      var parametros="inputEmail="+$("#inputEmail").val() +"&"+ "inputPassword="+$("#inputPassword").val();
      $.ajax({
        url: "acciones.php", 
        data:parametros,
        method:"POST",
        dataType:"json",
        success: function(result){
            if (result==0) 
             	alert("Usuario o Password incorrectos");
            	//$("#msgtxt").html('<div style="color: red">Informacion Invalida </div>');
      			if (result!=0) 	
      				 location.href ="Principal.html";         
             
          }
      });

    });

    $("#btn-datos").click(function(){
      $("#myModal").modal("hide");
     
   
      var parametros="reg-email="+$("#reg-email").val() +"&"+ 
      "reg-password="+$("#reg-password").val() +"&"+ 
      "reg-nom="+$("#reg-nom").val() +"&"+ 
      "reg-telefono="+$("#reg-telefono").val() +"&"+
      "sl-gen="+$("#sl-gen").val() +"&"+
      "id-lugar="+$("#sl-gen").val();

      $.ajax({
        url: "crearusuario.php", 
        data:parametros,
        method:"POST",
        dataType:"json",
        success: function(result){

            if (result!=0) 
              alert("El Correo ya existe");

            if (result==0)  
                {
                    $.ajax({
                      url: "obtenercodigo.php", 
                      data:parametros,
                      method:"POST",
                      dataType: "text",
                      success: function(result1){

                        }
                    });             
               location.href ="Principal.html";         
             };
             
          }
      });
     

    });
