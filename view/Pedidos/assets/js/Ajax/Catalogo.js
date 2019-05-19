
//funciones para cargar el catalogo , busqueda y paginación
$(function() {
    load(1);
    numberItems();
});
//función para cargar el catalogo
function load(page){
    
    var query=$("#Search").val();
    
     if (query=="") {
         query= ' ';
     }
    var per_page=6;
    var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page,"option":'1'};
    $("#mensaje").fadeIn('slow');
    $.ajax({
        url:'../controller/controllerCatalogo.php',
        data: parametros,
        beforeSend: function(objeto) {
        $('#Catalogo').html("");
        $("#mensaje").html("<center style='margin-top:200px;'><div class='cssload-box-loading'></div><br>Cargando ...</center>");  
        },
        success: function(data){ 
            $('#Catalogo').html(data).fadeIn('slow'); 
            $('#mensaje').html("");
            
        } ,
        error: function(){
            console.log("Ha ocurrido un error! :(");
            
        }
    });
    
}
$("#btn-buscar").click(function(){
    load(1);
  });
//filtros del catálogo
$(".filtros").click(function(evento){
    var buscar =$(this).attr('category');
    $("#Search").val(buscar);
    load(1);
});

function AgregarCarrito(idProduct){
    
    var parametros = {"action":"ajax",'idProducto':idProduct,"option":'2'};
    $.ajax({
        url:'../controller/controllerCatalogo.php',
        data: parametros,
        success: function(data){ 
            if (parseInt(data) != 0) {
                var product = JSON.parse(data);
                getCarrito = JSON.parse(localStorage.getItem('carrito'));
                for (i of getCarrito){
                    if(i.Codigo_Ancheta === idProduct){
                        i.cantidad++;
                        console.log(getCarrito);
                        localStorage.setItem("carrito",JSON.stringify(getCarrito));
                        AgregadoCarrito();
                        numberItems();
                        return;
                    }
                }
                //si no existe el item lo agregamos a localStorage
                product[0].cantidad = 1;
                getCarrito.push(product[0]);
                localStorage.setItem("carrito",JSON.stringify(getCarrito));
                 AgregadoCarrito();
                 numberItems();
                 
            }else{
                ErrorCarrito();
            }
        } ,
        error: function(){
            console.log("Ha ocurrido un error! :(");
        }
    });
}
function ErrorCarrito(){
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
      toastr["error"]("No  existe el Item,lo sentimos");
}

function AgregadoCarrito(){
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
      toastr["success"]("Agregado al carrito");
}
 function numberItems() {
    $('#itemsNumber').text("");
    getCarrito = JSON.parse(localStorage.getItem('carrito'));
    if (getCarrito != null) {
        var numItems=  getCarrito.length;
        if (numItems != 0) {
          $('#itemsNumber').text(numItems);
        }
    }    
 }
