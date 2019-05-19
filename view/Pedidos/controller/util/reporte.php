<?php
require_once 'validarSesion.php';
require_once('../../assets/pdf/vendor/autoload.php');
//controlador Reporte
require_once('../controllerReporte.php');
//codigo css de la plantilla 
$css = file_get_contents('../../assets/css/pdf.css');
$Reporte = new controllerReporte();

if (isset($_GET['id'])) {

  $pedido = $Reporte->ConsultarPedido($_GET['id']);
  $direccion = $Reporte->ConsultarDireccion();
  $anchetas = $Reporte->ConsultarAnchetasPedido($_GET['id']);
  try {
      $mpdf = new \Mpdf\Mpdf([]);
      $plantilla =  getReporte($pedido,$direccion,$Usuario,$anchetas);
      $mpdf->writeHtml($css,\Mpdf\HTMLParserMode::HEADER_CSS);
      $mpdf->writeHtml($plantilla,\Mpdf\HTMLParserMode::HTML_BODY);
      $mpdf->Output('Reporte','I');
    
  } catch (\Throwable $th) {
    echo "<script>window.location.href='../../view/misPedidos.php'</script>";
  }
    
     
}else{
  echo "<script>window.location.href='../../view/misPedidos.php'</script>";
}
 
function getReporte($pedido,$Empresa,$Usuario,$anchetas){
    $fecha_actual = date('Y-m-d');
    date_default_timezone_set('America/Bogota');
    $hora = date('h:i:s');
    $html = ' <body>
    <header class="clearfix">
     
      <div id="company">
        <h2 class="name">';$html.=$Empresa[0]['Nombre'].'</h2>
        <div>';$html.=$Empresa[0]['Direccion'].'</div>
        <div>(034) ';$html.=$Empresa[0]['Telefono'].'</div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">CLIENTE</div>
          <h2 class="name">';$html.=$Usuario['Nombre']." ".$Usuario['Apellido'].'</h2>
          <div class="address">';$html.=$Usuario['Documento_Identificacion'].'</div>
          
          <div class="address">';$html.=DireccionUsuario($Usuario['Direccion']).'</div>
          <div class="address">Tel: ';$html.=TelefonoUsuario($Usuario['Telefono'],$Usuario['Celular']).'</div>
        </div>
        <div id="invoice">
          <h1>PEDIDO #';$html.=$pedido[0]['Id_Pedido'].'</h1>
          <div class="date">Fecha del Pedido : ';$html.=$pedido[0]['Fecha_Pedido'].' </div>
          <div class="date">'.TipoEnvio($pedido[0]['Id_Tipo_Envio']).' </div>
          <div class="date">'.$pedido[0]['Direccion_Envio'].' </div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">NOMBRE</th>
            <th class="unit">UNIDAD PRECIO</th>
            <th class="qty">CANTIDAD</th>
            <th class="total">SUBTOTAL</th>
          </tr>
        </thead>
        <tbody>';
        $subtotal=0;
         for ($i=0; $i < count($anchetas); $i++) { 
             $html.='<tr>
             <td class="no">'.($i+1).'</td>
             <td class="desc"><h4>'.$anchetas[$i]['Nombre_Ancheta'].'</h4></td>
             <td class="unit">$'.Descuento($anchetas[$i]['Descuento'],$anchetas[$i]['Precio']).'</td>
             <td class="qty">'.$anchetas[$i]['Cantidad'].'</td>
             <td class="total">$'.$anchetas[$i]['SubTotal'].'</td>
           </tr>';
           $subtotal+= $anchetas[$i]['SubTotal'];
         }
         $html.= '
          
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            <td>'.$subtotal.'</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">Recargos</td>
            <td>'.validarRecargo($pedido[0]['Aplicar_recargo']).'</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">TOTAL</td>
            <td>'.($subtotal+(validarRecargo($pedido[0]['Aplicar_recargo']))).'</td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks">Muchas Gracias por su pedido .</div>
      <div id="notices">
        <div>AVISO:</div>
        <div class="notice">Este documento fue generado el ';$html.=$fecha_actual. ' a las ';$html.=$hora.' </div>
      </div>
    </main>
  </body>';

  return $html;
}
//funciones de ayuda para validar campos nulos .
 function DireccionUsuario($direccion){
   if ($direccion == null) {
      return "Sin dirección";
   }else{
     return $direccion;
   }
 }

 function TelefonoUsuario($fijo,$celular){
   if ($celular != null) {
       return $celular;
   }else{
     return $fijo;
   }
 }

 function Descuento($descuento,$precio){
      if ($descuento != null) {
         $total = $precio -($precio*($descuento/100));
         return $total;
      }else{
        return $precio;
      }
 }

 function  validarRecargo($recargo){
   if ($recargo != null) {
      return $recargo;
   }else{
     return 0;
   }
 }
 function TipoEnvio($envio){
    if ($envio == 1) {
      return "Domicilio";
    }else{
      return "Recoger en Tienda";
    }
 }
?>