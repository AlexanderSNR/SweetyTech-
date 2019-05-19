$(document).ready(function(){
    // let edit;
    // console.log(edit);
    listar2();
    listar();

    $(document).on('click', '#insertarP', function(e){
        e.preventDefault();
            let element = $(this)[0].parentElement.parentElement;
            const postData = {
                idInsumo : $(element).attr('idInsumo'),
                cantidad : $('#cantidad_'+ $(element).attr('idInsumo')).val(),
            }
            // console.log(postData);
            $.post('http://localhost:8080/ProyectoExpo/controller/salidaController.php', postData, function(response){
                    // console.log(response);
                if (response==1) {
                    alert("Agregaste Este producto");
             
                } else {
                    // console.log(response);
                swal({title: "ERROR",    
                    text: "No se púdo registrar la categoria. Intenta más tarde."+response, 
                    type:"error", 
                    confirmButtonText: "OK", 
                    closeOnConfirm: true 
                  });  
                }
                listar();
            });
        });

$(document).on('click', '#eliminar', function(e){
        e.preventDefault();
        let element = $(this)[0].parentElement.parentElement;
          const postData = {
            idInsumo : $(element).attr('idInsumo'),
        }
        // console.log(postData);
            $.post('http://localhost:8080/ProyectoExpo/controller/salidaController.php', postData, function(response){
                    listar();
                    $('#categoria-form').trigger('reset');
                    // console.log(response);
                    if (response) {
                        swal({title: "Exito",    
                        text: "Eliminar."+response, 
                        type:"error", 
                        confirmButtonText: "OK", 
                        closeOnConfirm: true 
                        
                        });  
                    listar(); 
                    } else {
                        // console.log(response);
                    swal({title: "ERROR",    
                        text: "No se púdo registrar la categoria. Intenta más tarde."+response, 
                        type:"error", 
                        confirmButtonText: "OK", 
                        closeOnConfirm: true 
                      }, 
                      function(){ 
                      });  
                    }
                });
    });

    function listar2(){
        $.ajax({
            url : 'http://localhost:8080/ProyectoExpo/controller/salidaController.php',
            type : 'GET',
            success : function(response){
                // console.log(response);
                let productos = JSON.parse(response);
                let template = '';
                productos.forEach(productos => {
                    template += `
                        <tr idInsumo="${productos.idInsumo}" valor="${productos.valor}">
                        <td style="display: none"></td>
                        <td>${productos.nombre}</td>
                        <td>${productos.cantidad}</td>
                        <td>
                        <input type="number" id="cantidad_${productos.idInsumo}" value="0">
                        </td>
                        <td>
                        <button class="btn btn-success text-center" id="insertarP">mas</button>
                        </td>
                        </tr>
                    `;
                });
                $('#product').html(template);
            } 
        });
    };

    function listar(){
        let listar="listar";
        let total=0;
            $.post('http://localhost:8080/ProyectoExpo/controller/salidaController.php', listar, function(response){
                // $('#categoria-form').trigger('reset');
                // console.log(response);
                if (response) {
                  let productos = JSON.parse(response);
                  let template = "";
                  productos.forEach(productos => {
                      total+=parseInt(productos.valor);
                      template += 
                      `
                      <tr idInsumo="${productos.idTmp}">
                          <td>${productos.nombre}</td>
                          <td>${productos.cantidad}</td>
                          <td>
                          <button class="btn btn-success text-center" id="eliminar">eliminar</button>
                          </td>
                       </tr>
                       
                    `
                         
                      ;
                  });
                  $('#dir').val(total);
                  $('#tabla').html(template);
                } else {
                    console.log(response);
                swal({title: "ERROR",    
                    text: "No se púdo registrar la categoria. Intenta más tarde."+response, 
                    type:"error", 
                    confirmButtonText: "OK", 
                    closeOnConfirm: true 
                  }, 
                  function(){ 
                  });  
                }
            });
    }

    // $(document).on('click', '#eliminar', function(){
    //     let element = $(this)[0].parentElement.parentElement;
    //     let estado = $(element).attr('estado');
    //     let id = $(element).attr('idCategoria');
    //     const postData = {
    //         estado : estado,
    //         id : id,
    //     }
    //     swal({title: "LISTO",    
    //       text: "El estado ha sido editado correctamente.", 
    //       type:"success", 
    //       confirmButtonText: "OK", 
    //       closeOnConfirm: true 
    //     }, 
    //     function(){ 
    //         $.post('http://localhost:8080/SIR/Controller/categoriaController.php', postData, function(response) {
    //             console.log(response);
    //             listar();
    //         });
    //     });  
    // });

//     $(document).on('click', '.boton-limpiar', function(){
//         $('#btnR').html("Registrar");
//         console.log(edit);
//         edit = null;
//     });
});