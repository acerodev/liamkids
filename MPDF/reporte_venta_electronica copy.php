<?php

require_once __DIR__ . '/vendor/autoload.php';
require '../conexion_reportes/r_conexion.php';
require 'numeroletras/CifrasEnLetras.php';
//Incluímos la clase pago
$v=new CifrasEnLetras(); 
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [80, 225]]);
$query = "SELECT vc.nro_boleta,
				DATE_FORMAT( vc.fecha_venta, '%d/%m/%Y' ) AS fecha,
				vc.subtotal,
				vc.igv,
				vc.total_venta,
				vc.descuento,
				vc.venta_estado,
				vc.cliente_id,
				c.cliente_nombres,
				c.cliente_dni,
				c.cliente_celular,
				c.cliente_tipo_doc,
				c.cliente_direccion,
				vc.compro_id,
				cp.compro_tipo,
				vc.f_pago,
				vc.f_pago_ope,
				e.razon_social,
				e.ruc,
				e.direccion,
				e.email,
				e.moneda,
				e.celular,
				e.nombre_moneda,
				e.imagen
				FROM
				venta_cabecera vc INNER JOIN clientes c on 
				vc.cliente_id = c.cliente_id 
				INNER JOIN comprobante cp on
				vc.compro_id = cp.compro_id,
				empresa e
				WHERE vc.nro_boleta = '".$_GET['codigo']."'";
	
	//REEMPLAZAR COMA POR PUNTO DEPENDE LA BASE (convertirNumeroEnLetras)
	$resultado = $mysqli ->query($query);
while ($row1 = $resultado-> fetch_assoc()){

	$totalpagar=($row1['total_venta']);
	//Convertimos el total en letras
	$letra=($v->convertirEurosEnLetras($totalpagar));	

$html.='
	<h3 style="text-align:center;display: inline-block;margin: 0px;padding: 0px; "><img src="../vistas/assets/imagenes/empresa/'.$row1['imagen'].'" width="45px"></h3><br>
	<h3 style="text-align:center;display: inline-block;margin: 0px;padding: 0px; ">'.utf8_decode($row1['razon_social']).'</h3>
	<h5 style="text-align:center;display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;">'.utf8_decode($row1['direccion']).'</h5>	
	<h5 style="text-align:center;display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;">R.U.C '.$row1['ruc'].'</h5>
	<h5 style="text-align:center;display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;">Cel. '.$row1['celular'].'</h5>
	-----------------------------------------------------------------------<br>

	<h4 style="text-align:center;display: inline-block;margin: 0px;padding: 0px;" ><b>'.strtoupper($row1['compro_tipo']).' DE VENTA ELECTRONICA</b></h4>
	<h4 style="text-align:center;display: inline-block;margin: 0px;padding: 0px;">'.$row1['nro_boleta'].'</h4>
	-----------------------------------------------------------------------<br>
	<h4 style="text-align:left;display: inline-block;margin: 0px;padding: 0px;">Fecha: '.$row1['fecha'].'</h4>
	<h4 style="text-align:left;display: inline-block;margin: 0px;padding: 0px;">Cliente: '.utf8_decode($row1['cliente_nombres']).'</h4>
	<h4 style="text-align:left;display: inline-block;margin: 0px;padding: 0px;">Ruc/Dni: '.$row1['cliente_dni'].'</h4>
	<h4 style="text-align:left;display: inline-block;margin: 0px;padding: 0px;">Direcci&oacute;n: '.$row1['cliente_direccion'].'</h4>
	<h4 style="text-align:left;display: inline-block;margin: 0px;padding: 0px;">Moneda: '.$row1['nombre_moneda'].'</h4>
	
	';
	$html.='

	<table>
	     <thead>

             <tr>
            
            </tr>
	     </thead>
	  </table>
         
         ';

	$html.=' -----------------------------------------------------------------------
	<table >
        <thead>

          <tr>  
            <th>Cant.</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Importe </th>
          </tr>

           <tr>
            <td colspan="4" style="text-align:right;">-----------------------------------------------------------------------------</td>
          </tr>
   
        </thead>

        <tbody>';
         $query2 = "SELECT
						vd.nro_boleta,
						vd.codigo_producto,
						CONCAT(p.descripcion_producto,' (T-',tp.descripcion,')') as descripcion_producto,
						vd.cantidad,
						vd.vd_descuento,
						vd.precio_ofertas ,
						(vd.cantidad * vd.precio_ofertas) as subtotal
					FROM
						venta_detalle vd inner join productos p on 
						vd.codigo_producto = p.codigo_producto
						INNER JOIN talla tp on vd.id_talla = tp.id_talla
						WHERE vd.nro_boleta = '".$_GET['codigo']."'";
						$contador=0;
						$resultado2 = $mysqli ->query($query2);
						while ($row2 = $resultado2-> fetch_assoc()){
							$contador++;

        $html.='
        <tr>
		    <td>'.$row2['cantidad'].'</td>
            <td>'.utf8_decode($row2['descripcion_producto']).' </td>
            <td>'.$row1['moneda'].' '.$row2['precio_ofertas'].'</td>
            <td>'.round($row2['subtotal'],2).'</td>
         
        </tr>';
        }
      
        $html.='
        <tr >
            <td colspan="4" style="text-align:right;">-----------------------------------------------------------------------------</td>
	            <td  style="text-align:right;">    </td>
          </tr>
          
          <tr>
            <td colspan="3" style="text-align:right;font-size:13px">GRAVADAS:</td>
            <td style="text-align:left;font-size:13px">'.$row1['moneda'].' '.round(($row1['total_venta'] - $row1['igv'] ), 3).'</td>
          </tr>
          <tr> 
            <td colspan="3" style="text-align:right;font-size:13px">I.G.V:</td>
            <td style="text-align:left;font-size:13px">'.$row1['moneda'].' '.round($row1['igv'],3).'</td>
          </tr>
          <tr>
            <td colspan="3" style="text-align:right;font-size:13px"><b>TOTAL:</b></td>
	        <td  style="text-align:left;font-size:13px"><b>'.$row1['moneda'].' '.round($row1['total_venta'],3).'</b></td>
          </tr>
          ';
       


        
 $html.='
		 <tbody>
 		</table>

 			';

 	$html.='<br>
	<table>
	     <thead>
	     <tr>
            	
            	<td style="text-align:center;font-size:11px"><b>SON:</b> '.utf8_decode(strtoupper($letra)).'</td>

       </tr>
           <tr>
            	
            	<td><br></td><br>

           </tr>
           
           <tr>
	            <td  style=" text-align:center ">
				<barcode code="'.$row1['ruc'].'|'.$row1['compro_tipo'].'|'.$row1['nro_boleta'].'|'.$row1['igv'].'|'.$row1['total_venta'].'|'.$row1['fecha'].'|'.$row1['cliente_tipo_doc'].'|'.$row1['cliente_dni'].'" type="QR" class="barcode" size="1" disableborder="1" />
	            </td>
           </tr>
        	<tr>
            	<td  style="text-align:center;font-size:10px">**MUCHAS GRACIAS POR SU COMPRA**</td>

           </tr>
	     </thead>
	  </table>
         
         ';


	



}

$css = file_get_contents('css/style_venta_electronica.css');
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();