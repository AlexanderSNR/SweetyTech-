<?php
session_start();
    require_once '../model/config.php';
    require_once '../model/anchetaModel.php';
class ControllerCatalogo extends Conexion
{
    public function   ConsultarAnchetas($query,$offset,$per_page){
        $query = $this->conexion->quote($query);

        $datos=array();
        $sql = "call consultarAnchetasCatalogo($query,$offset,$per_page)";
        try {
            $resultado=$this->conexion->query($sql);
            foreach ($resultado->fetchAll(PDO::FETCH_OBJ) as $dato) {
                $ancheta = new anchetaModel($dato->Codigo_Ancheta,$dato->Nombre_Ancheta,$dato->Descripcion,$dato->Precio,$dato->Foto1   ,$dato->Descuento);
                array_push($datos,$ancheta);
            }
            return $datos;
        } catch (EXception $e) {
            return  $datos ;
        }
    }
   
    
    
    //cuenta el número de registros en la base de datos 
    public function TotalRegistros($query){
             //escape de caracteres especiales
             $query = $this->conexion->quote($query);
             //consulta
            $sql="call totalProductosBuscar($query) ";
            try {
                $resultado = $this->conexion->query($sql);
                $total_registros = $resultado->fetch(PDO::FETCH_ASSOC);
                return $total_registros['num_registros'];
            } catch (\exception $th) {
                return  0;
            }
    }

    public function BuscarItem($idProduct){
        
       $sql="call BuscarItem($idProduct) ";
       try {
           
           $resultado = $this->conexion->query($sql);
           $resultado = $resultado->fetchAll(PDO::FETCH_ASSOC);
           if ( count($resultado) > 0 ) {
            echo json_encode($resultado,JSON_UNESCAPED_UNICODE); 
           }else {
                echo "0";
           }
           
       } catch (\exception $th) {
           echo($th);
       }
    }
    
    public function BuscarOfertas($referencia){
        $query = $this->conexion->quote($referencia);
        $sql="call ConsultarOfertas($query) ";
        
        try {
            
            $resultado = $this->conexion->query($sql);
            $resultado = $resultado->fetchAll(PDO::FETCH_ASSOC);
            if ( count($resultado) > 0 ) {
             echo json_encode($resultado,JSON_UNESCAPED_UNICODE); 
            }else {
                 echo "0";
            }
            
        } catch (\exception $th) {
            echo($th);
        }
     }
  

    
}
//creamos un objeto de controlador de anchetas 
$controlcatalogo = new ControllerCatalogo();
//validamos el action y  si no lo dejamos por defecto
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
switch (intval($_REQUEST['option'])) {
    case 1 :
    sleep(2);
        //si  la peticion  viene por medio de ajax  
if ($action == 'ajax') {
    //capturamos el query 
    $query =$_REQUEST['query'];
    //incluimos el  archivo de paginacion
    include 'ajax/paginacion.php';
    //validamos las pagina enviada o si no la configuramos por defecto en la primera
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;

    $per_page = intval($_REQUEST['per_page']); 
	$adjacents  = 4; 
    $offset = ($page - 1) * $per_page;
	$numrows = $controlcatalogo->TotalRegistros($query);
    $total_pages = ceil($numrows/$per_page);
    
    $productos = $controlcatalogo->ConsultarAnchetas($query,$offset,$per_page);
    if (count($productos) <= 3) {
        $repetir=1;
    }else {
        $repetir=2;
    }
     
    

    //variableS de ayuda para imprimir el catalogo
    $out="";
    $contaux=0;
	if ($numrows > 0) {
        for ($i=0; $i < $repetir; $i++) { 
            $out.="<div class='agile_top_brands_grids'>";
            for ($x=0; $x < 3; $x++) { 
                $out.="<div class='col-md-4 top_brand_left'>
                <div class='hover14 column'>
                    <div class='agile_top_brand_left_grid'>
                        <div class='agile_top_brand_left_grid_pos'>";
                          if ($productos[$contaux]->Descuento !=null) {
                             $out.="<img src='../assets/images/oferta.jpg' alt=' ' class='img-responsive'>";
                          }
                            
                       $out.=" </div>
                        <div class='agile_top_brand_left_grid1'>
                            <figure>
                                <div class='snipcart-item block'>
                                    <div class='snipcart-thumb'>
                                        <a href='producto.php?id=";$out.=$productos[$contaux]->Codigo_Ancheta;$out.="'><img title=' ' alt='Lo sentimos no se cargo la imagen' src='../assets/images/";$out.=$productos[$contaux]->Foto."'"; $out.=" class='img-producto'></a>		
                                        <p>";
                                        $out.= $productos[$contaux]->Nombre;
                                        $out.="</p>
                                        <h4>";
                                        if ($productos[$contaux]->Descuento !=null) {
                                            $preciodescuento= $productos[$contaux]->Precio -($productos[$contaux]->Descuento /100)*$productos[$contaux]->Precio;
                                            $out.="$".$preciodescuento."<span>$".$productos[$contaux]->Precio."</span>";
                                        }else{
                                            $out.="$".$productos[$contaux]->Precio;
                                        }
                                        
                                        $out.="</h4>
                                    </div>
                                    <div class='snipcart-details top_brand_home_details'>
                                    <input type='button' id='agregar' data-producto='".$productos[$contaux]->Codigo_Ancheta;$out.="'  value='Añadir' class='button'>
                                    </div>
                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>";
            $contaux++;
            if (count($productos)==$contaux) {
                break;
            }
            }
            $out.="<div class='clearfix'> </div></div>";
        }
        echo $out;
		
		echo paginate( $page, $total_pages, $adjacents);
	 
	}else{
        if ($numrows==0) {
            ?>
            <center><div class="alert alert-info" role="alert"> No hay  resultados de productos disponibles</div></center>
            <?php
        }
    }
    
}
        break;
    case 2 : 
            if ($action=="ajax") {
               $id = $_REQUEST['idProducto'];
               $controlcatalogo->BuscarItem($id);
            }
       break;
    case 3 : 
      if ($action == "ajax") {
        $controlcatalogo->BuscarOfertas($_REQUEST['referencia']);
      }
        
    default:
        
        break;
}

?>