(function(){
    function $(selector){
        return document.querySelector(selector);
    }
   function Carrito(){
    this.constructor=function(){
        if (!localStorage.getItem('carrito')) {
            localStorage.setItem('carrito','[]');
        }
        
    }
    
    this.getCarrito = JSON.parse(localStorage.getItem('carrito'));   
    
    this.eliminarItem = function(item){
        for (var i in this.getCarrito) {
            if(this.getCarrito[i].Codigo_Ancheta === item){
                this.getCarrito.splice(i,1);
            }
        }
        localStorage.setItem("carrito",JSON.stringify(this.getCarrito));
    }

    this.addcantidad = function(item){
        for (var i in this.getCarrito) {
            if(this.getCarrito[i].Codigo_Ancheta === item){
                this.getCarrito[i].cantidad++;
                
            }
        }
        localStorage.setItem("carrito",JSON.stringify(this.getCarrito));
    }
    this.minCantidad = function(item){
        for (var i in this.getCarrito) {
            if(this.getCarrito[i].Codigo_Ancheta === item){
                this.getCarrito[i].cantidad--;
                if (this.getCarrito[i].cantidad == 0) {
                    this.eliminarItem(this.getCarrito[i].Codigo_Ancheta);
                }
            }
        }
    }
   }

   function  Car_view(){
       this.loaderCart = function(){
           if (carrito.getCarrito.length > 0) {
               console.log(carrito.getCarrito.length);
              try {
                var template = `<table class="timetable_sub" id="carrito">
                <thead>
                    <tr>
                        <th>No.</th>	
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Nombre  del Producto</th>
                        <th>Subtotal</th>
                        <th>Remover</th>
                    </tr>
                </thead>`;
                var cont = 0;
                var Total = 0;
                for(i of carrito.getCarrito){
                    cont++;
                      
                   template+= `
                   <tr class="rem" id="product">
                       <td class="invert" >${cont}</td>
                       <td class="invert-image"><a href="single.html"><img src="../assets/images/${i.Foto1}" alt=" "  class="img-responsive" /></a></td>
                       <td class="invert">
                            <div class="quantity"> 
                               <div class="quantity-select" >                           
                                   <div class="entry value-minus" id="quantyMin" data-idproducto ="${i.Codigo_Ancheta}" >&nbsp;</div>
                                   <div class="entry value"><span>${i.cantidad}</span></div>
                                   <div class="entry value-plus active" data-idproducto ="${i.Codigo_Ancheta}" id="addQuanty">&nbsp;</div>
                               </div>
                           </div>
                       </td>
                       <td class="invert">${i.Nombre_Ancheta}</td>
                       <td class="invert">${Subtotal(i.Precio,i.cantidad,i.Descuento)}</td>
                       <td class="invert">
                       <div class="rem">
                            <center><div class="close1" id="delete" data-producto ="${i.Codigo_Ancheta}"> </div></center>
                        </div>
                       </td>
                   </tr>`;
                   Total+=Subtotal(i.Precio,i.cantidad,i.Descuento);
                }
                template+=  `</table>
                `;
               $('#cartItems').innerHTML=template;
                var listtobuy = `<div class="checkout-left">	
                <div class="checkout-left-basket">
                    <h4>Tus articulos</h4>
                    <ul  id="listProduct">
                    
                    </ul>
                </div>
                <div class="checkout-right-basket">
                    <a href="envio.php" >Continuar compra</a>
                </div>
   
                <div class="clearfix"> </div>
            </div>
        </div> `;
               $('#DetailsToBuy').innerHTML=listtobuy;
               var listProduct= ` `;
                cont=0;
                for( x of carrito.getCarrito){
                    cont++;
                  listProduct += ` <li>${x.Nombre_Ancheta}  <i>--</i> <span>${Subtotal(x.Precio,x.cantidad,x.Descuento)}</span></li>`;
                }
                listProduct+=`<strong><li>Total <i>--</i> <span>${Total}</span></li><strong> `;
               $('#listProduct').innerHTML=listProduct;
              } catch (error) {
                  
              }
             
           }else{
               NumberItems2();
               try {
                $('#cartItems').innerHTML="";
                $('#DetailsToBuy').innerHTML="";
               } catch (error) {
                   
               }
               
               
           
           }
       }
   }
   var carrito = new Carrito();
   var cart_view = new  Car_view();
   document.addEventListener('DOMContentLoaded',function(){
      carrito.constructor();
      cart_view.loaderCart();
      NumberItems2();
      
   });
  
  if (document.getElementById("Catalogo") != null) {
    $("#Catalogo").addEventListener("click",function(ev){
        
        if(ev.target.id === "agregar"){
            var id = ev.target.dataset.producto;
           AgregarCarrito(id); 
        }
    });
  } 
 
   if(document.getElementById("cartItems") != null){
    $("#cartItems").addEventListener("click",function(ev){
        ev.preventDefault();
       if (ev.target.id=="delete") {
        carrito.eliminarItem(ev.target.dataset.producto);
        cart_view.loaderCart();
        NumberItems2();
       }
    

       if (ev.target.id=="addQuanty") {
          carrito.addcantidad(ev.target.dataset.idproducto);
          cart_view.loaderCart();
          NumberItems2();
       }
       if (ev.target.id == "quantyMin") {
           carrito.minCantidad(ev.target.dataset.idproducto);
           cart_view.loaderCart();
           NumberItems2();
       }
    });
   }
   
   if (document.getElementById("anadir") != null) {
    $("#anadir").addEventListener("click",function(ev){
        if(ev.target.id === "agregar"){
            var id = ev.target.dataset.producto;
            AgregarCarrito(id); 
        }
    });
  } 
  if (document.getElementById("ofertas") != null) {
    $("#ofertas").addEventListener("click",function(ev){
        if(ev.target.id === "agregar"){
            var id = ev.target.dataset.producto;
            AgregarCarrito(id); 
        }
    });
  } 
  function NumberItems2() {
      
      try {
        var Items = carrito.getCarrito;
        var numItems =  Items.length;
        if (numItems != 0) {
            $('#itemsNumber').innerHTML=numItems;
            if (numItems == 1) {
              $('#numItems').innerHTML=numItems+" PRODUCTO";
            }else{
              $('#numItems').innerHTML=numItems+" PRODUCTOS";
            }
        }else{
          $('#numItems').innerHTML= 0 + " PRODUCTOS";
        }
      } catch (error) {
          numItems = 0;
      }
         
      
  }
   
  function Subtotal(price,quantity,discount){
      if (discount == null) {
          return price * quantity;
      }else{
          var Subprice = (price * quantity)-((price * quantity)*(discount/100));
          return Subprice;
      }

  }

  function price (price,discount,quantity){
    if (discount == null) {
        return price * quantity;
    }else{
        var price= price-(price *(discount/100));
        return price;
    }
  }


})();