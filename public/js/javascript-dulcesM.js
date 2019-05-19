 function  mostrarAlerta(){
 
  	swal({
  title: "Esta seguro que desea salir?",
  icon: "warning",
  buttons:["Cancelar","Aceptar"],
  dangerMode:true,
})
.then((willsalir) => {
  if (willsalir) {
          location.href = '../../index.html';
  } else {
    
  }
})
  }