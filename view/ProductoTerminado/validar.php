<?php

if(isset($_POST["texto"])){
    $tmp="";

    $sql="SELECT I.Nombre_Insumo FROM tbl_insumo I 
    JOIN tbl_insumo_has_plantilla dp on 
    I.Codigo_insumo=dp.Codigo_insumo JOIN tbl_plantilla pl ON pl.Codigo_Plantilla =  dp.Codigo_Plantilla WHERE pl.Nombre_Plantilla = '".$_POST["texto"]."'";

    $conn=new PDO("mysql:host=localhost;dbname=db_sweety", "root", "");

    $tmp="<table>
    <tr>
    <th>Nombre Insumos </th>
    </tr>";
    $res= $conn->prepare($sql);
    $res->execute();
    foreach ($res->fetchAll(PDO::FETCH_OBJ) as $insumo) {
        $tmp.='<tr>
        <td>'.$insumo->Nombre_Insumo.'</td>
        </tr>';
    }
    
    $tmp.="</table>";
    echo $tmp;
}
?>