<?php

require_once __DIR__ . '/vendor/autoload.php';
require '../conexion_reportes/r_conexion.php';



$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [80, 80]]);
$query = "SELECT
            vc.id_credito, 
            vc.nro_boleta, 
            vc.monto, 
            
            DATE_FORMAT(vc.fecha_pago, '%d/%m/%Y %H:%i:%s') AS fecha_pago,
            vc.estado, 
            e.razon_social, 
            e.ruc, 
            e.celular, 
            e.email,
            e.direccion,
            ve.total_venta,
            c.cliente_nombres
          FROM
            venta_credito AS vc
                INNER JOIN venta_cabecera ve ON vc.nro_boleta = ve.nro_boleta
                INNER JOIN clientes c ON ve.cliente_id = c.cliente_id,
            empresa AS e

         WHERE vc.id_credito =  '".$_GET['codigo']."'";
	
	//REEMPLAZAR COMA POR PUNTO DEPENDE LA BASE (convertirNumeroEnLetras)
	$resultado = $mysqli ->query($query);
while ($row1 = $resultado-> fetch_assoc()){

$html.='   

<table style="border-collapse; " border="1" >
<thead >
    <tr>

        <th width="100%" style="border-top:0px; border-left:0px; border-bottom:0px; border-right:0px; text-align:center">
            <h3><b>'.utf8_decode($row1['razon_social']).'</b></h3><br>
            <h4> '.$row1['direccion'].' </h4>
            <h4>Cel.  '.$row1['celular'].' </h4>
            <h4>'.$row1['email'].' </h4>
        </th>
        
    <tr>

       
        <th width="100%" style="border-top:0px; border-left:0px; border-bottom:0px; border-right:0px; text-align:center">
        
        <h4>------------------------------------------------------------------------ </h4>
    </th>

      
    </tr>
</thead>
</table> 
<br>


<table style="border-collapse; " border="1" >
    <thead >
        <tr>
            <th width="100%" style="border-top:0px; border-left:0px; border-bottom:0px; border-right:0px; text-align:left">
                <h4>Ticket:&nbsp;&nbsp;000'.utf8_decode($row1['id_credito']).'</h4><br>
            </th>
        </tr>
        <tr>
            <th width="100%" style="border-top:0px; border-left:0px; border-bottom:0px; border-right:0px; text-align:left">
                <h4>Nombre:&nbsp;&nbsp;'.utf8_decode($row1['cliente_nombres']).'</h4><br>
            </th>
        </tr>
        <tr>
            <th width="100%" style="border-top:0px; border-left:0px; border-bottom:0px; border-right:0px; text-align:left">
                <h4>Comprobante:&nbsp;&nbsp;'.utf8_decode($row1['nro_boleta']).'</h4><br>
            </th>
        </tr>

        <tr>
            <th width="100%" style="border-top:0px; border-left:0px; border-bottom:0px; border-right:0px; text-align:left">
                <h4>Fecha:&nbsp;&nbsp;'.utf8_decode($row1['fecha_pago']).'</h4><br>
            </th>
        </tr>

        <tr>
            <th width="100%" style="border-top:0px; border-left:0px; border-bottom:0px; border-right:0px; text-align:left">
                <h4>Abonado:&nbsp;&nbsp;'.utf8_decode($row1['monto']).'</h4><br>
            </th>
        </tr>
        <tr>
            <th width="100%" style="border-top:0px; border-left:0px; border-bottom:0px; border-right:0px; text-align:left">
                <h4>Total Credito:&nbsp;&nbsp;'.utf8_decode($row1['total_venta']).'</h4><br>
            </th>
        </tr>


    </thead>
</table> 



';


 }




 $css = file_get_contents('css/style_venta_electronica.css');
 $mpdf->WriteHTML($css,1);
 $mpdf->WriteHTML(utf8_encode($html));
 $mpdf->Output();