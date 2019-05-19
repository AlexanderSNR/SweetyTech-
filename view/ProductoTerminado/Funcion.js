function busqueda(){
    var texto = $('#insumo').val();
    var parametros = {
        "texto" : texto
    };
    $.ajax({
    data: parametros, 
    url:"validar.php",
    type: "POST",
    success: function(response){
        console.log(response);
        $("#resultado").html(response);
    }
    
    });
    }