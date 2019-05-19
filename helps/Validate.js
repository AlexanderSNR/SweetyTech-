
(function ($) {
    "use strict";

    /*==================================================================
    [ Validate ]*/
   
    //se referencia la clase  valite-input y la clase de inputs
    var input = $('.validate-input .campos');
    
    //cuando presione el boton submit del formulario,validara los campos
    $('.validate-form').on('submit',function(){
        //se supone que los campos estan correctamente iniciando la variable check.
        var check = true;
        //se recorre la variable input que trae los inputs del formulario,se valida cada uno
        for(var i=0; i<input.length; i++) {
            //valida, si la función validar devuelve false es por que el campo esta inconpleto y genera la alerta
            if(validate(input[i]) == false){
                //muestra la alerta .
                showValidate(input[i]);
                check=false;
            }
        }
        //retorna la respuesta de la validación ,si los campos son incompletos  retorna false y si no true .

        return check;
    });

  // si da click en alguno de los campos , quita el alerta de campo incompleto
    $('.validate-form .campos').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });
 
    //Función que valida los campos .
    function validate (input) {
        //si el input es de tipo email o  name es email  ,valida el campo tipo email.
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email' ) {
            //valida que el formato del correo este correcto  con  el input que viene en la variable input.
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
             if ($(input).attr('type') == 'number' ) {
                 if (isNaN($(input).val())) {
                     return false ;
                 }else{
                     if ($(input).val() == '') {
                         return false;
                     }
                 }
             }else{
                 if ($(input).attr('type') == 'date') {
                      if ($(input).val().trim() == '') {
                          return false ;
                      }
                      
                 }else{
                    if($(input).val().trim() == ''){
                        return false;
                    }else{
                        if ($('select').val() == '0') {
                            return false;
                        }
                    }
                 }
                
             }
            
        }
    }
    //muestra la alerta
    function showValidate(input) {
        var thisAlert = $(input).parent();
         //agrega la clase al input
        $(thisAlert).addClass('alert-validate');
    }
//esconde la alerta 
    function hideValidate(input) {
        var thisAlert = $(input).parent();
        //elimina la clase del input
        $(thisAlert).removeClass('alert-validate');
    }
    

})(jQuery);