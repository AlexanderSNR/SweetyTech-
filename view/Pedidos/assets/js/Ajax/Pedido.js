$(function() {
   if (!localStorage.getItem('DetallePedido')) {
      localStorage.setItem('DetallePedido','{}');
  }
  var Items = JSON.parse(localStorage.getItem('carrito'));
		if (Items.length > 0 ) {
			$('#itemsNumber').text(Items.length);
      }

      if (document.getElementById("datosEnvio") != null) {
         domicilio();
         DatosTienda();
      }
   
});
function  RecogerEnTienda(){
   var parametros = {"action":"ajax","option":'2'};
   $.ajax({
       url:'../controller/controllerPedido.php',
       data: parametros,
       beforeSend: function(objeto) {
         $('#tienda').text("Cargando....");
         },
       success: function(data){ 
          var addres = JSON.parse(data);
          addres[0].Tipoenvio=2;
          localStorage.setItem('DetallePedido',JSON.stringify(addres[0]));
          window.location.replace("resumen.php");
       } ,
       error: function(){
           console.log("Ha ocurrido un error! :(");
       }
   });
}

function domicilio(documento){
    var documento = $('#documento').val();
   var parametros = {"action":"ajax","option":'1',"documento":documento};
   $.ajax({
       url:'../controller/controllerPedido.php',
       data: parametros,
       success: function(data){ 
           var direccion = JSON.parse(data);
           $('#direccion').val(direccion[0].Direccion);
       } ,
       error: function(){
           console.log("Ha ocurrido un error! :(");
       }
   });
}
function  DatosTienda(){
   var parametros = {"action":"ajax","option":'2'};
   $.ajax({
       url:'../controller/controllerPedido.php',
       data: parametros,
       success: function(data){ 
          var addres = JSON.parse(data);
          addres[0].Tipoenvio=1;
          localStorage.setItem('DetallePedido',JSON.stringify(addres[0]));
       } ,
       error: function(){
           console.log("Ha ocurrido un error! :(");
       }
   });
}
$("#tienda").click(function(){
   RecogerEnTienda();
 });
 
 $("#domicilio").click(function(){
    $('#domicilio').text('Cargando...');
    setTimeout ('nada ()', 5000); 
   window.location.replace("DatosEnvio.php");
});
$('#continuar').click(function(){
   var direccion = $('#direccion').val();
   var info = JSON.parse(localStorage.getItem('DetallePedido'));
   info.direccionUser= direccion;
   localStorage.setItem('DetallePedido',JSON.stringify(info));

  setTimeout($('#continuar').text('Cargando...'),5000);
});

