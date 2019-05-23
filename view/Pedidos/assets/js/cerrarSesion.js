 function CerrarSesion(){
    swal({
        title: "Deseas cerrar sesión ?",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Hasta  pronto! ", {
            icon: "success",
          });
          setTimeout(function(){
            window.location="../../../controller/Cerrar_session.php";
          },2000)
          

        } else {
          
        }
      })
 } 