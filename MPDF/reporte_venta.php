<?php

require_once __DIR__ . '/vendor/autoload.php';
require '../conexion_reportes/r_conexion.php';
require 'numeroletras/CifrasEnLetras.php';
//Incluímos la clase pago
$v=new CifrasEnLetras(); 
$mpdf = new \Mpdf\Mpdf();
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
				e.imagen,
				e.soles,
				e.centimos,
				e.tipo_impuesto
			FROM
				venta_cabecera vc INNER JOIN clientes c on 
				vc.cliente_id = c.cliente_id 
				INNER JOIN comprobante cp on
				vc.compro_id = cp.compro_id,
				empresa e
			WHERE vc.nro_boleta = '".$_GET['codigo']."'";

$resultado = $mysqli ->query($query);
while ($row1 = $resultado-> fetch_assoc()){
	
	$totalpagar=($row1['total_venta']);
	$correla = $row1['compro_tipo'];
	$solesmoned = ($row1['soles']);
	$centimosmoned = ($row1['centimos']);
	//Convertimos el total en letras
	$letra=$v->convertirEurosEnLetras($totalpagar, $solesmoned, $centimosmoned);	


	$html = '<!DOCTYPE html>
	<html lang="en">
	  <head>
		<meta charset="utf-8">
		<title>Example 1</title>
		<link rel="stylesheet" href="style.css" media="all" />
	  </head>';
	  if($row1['venta_estado'] == "REGISTRADA" || $row1['venta_estado'] == "CREDITO" || $row1['venta_estado'] == "PAGADA") {
		$html = '
		<body>
			  
		<header class="clearfix">
		<table style="border-collapse; " border="1" >
			<thead >
				<tr>
					<th width="20%" style="border-top:0px; border-left:0px; border-bottom:0px; border-right:0px; "><img src="../vistas/assets/imagenes/empresa/'.$row1['imagen'].'" width="70px"></th>
	
					<th width="50%" style="border-top:0px; border-left:0px; border-bottom:0px; border-right:0px; text-align:left">
						<h3><b>'.utf8_decode($row1['razon_social']).'</b></h3><br>
						<b>Direcci&oacute;n: </b>'.utf8_decode($row1['direccion']).'<br>
						<b>Tel: </b>'.$row1['celular'].'<br>
					
						<b>Correo: </b>'.$row1['email'].'<br>
					</th>
	
					<th width="30%" style="text-align:center;">
						<h3 style="">R.U.C. '.$row1['ruc'].' </h3><br>
						<h2 style="color:black;">'.strtoupper($correla).' DE VENTA    </h2><br>
						<h3 style="">'.$row1['nro_boleta'].' </h3>
					</th>
				</tr>
			</thead>
		</table>
	 
	
		</header>
		 <table  style="border-collapse; " border="1" >
		
			<thead >
			<div class="round_table" >  
				<tr>
			
					<th width="50%" style="  text-align:left; border-right:0px; ">
						<b>Cliente   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </b>'.utf8_decode($row1['cliente_nombres']).'<br>
						<br><b>Ruc/Dni &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b>'.$row1['cliente_dni'].'<br>
						<br><b>Direcci&oacute;n &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b>'.$row1['cliente_direccion'].'<br>
						<br><b>Moneda   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b>'.$row1['nombre_moneda'].'<br>
						<br><b>Observaci&oacute;n : </b><br>
						
					</th>
					<th width="50%" style="text-align:right; border-left:0px;">
						<b>Fecha: </b>'.$row1['fecha'].'<br><br>
						<br><br>
						<br><br>
						<br><br>
						
					</th>
	
				</tr>
				</div>
			</thead>
		</table>
		
		<main>
		  <table  style="border-collapse; " border="1"  >
		 
			<thead>
			  <tr>
				<th   class=""  >ITEM</th>
				<th class="">PRODUCTO</th>
				<th>PRECIO</th>
				<th>CANTIDAD</th>
				<th>DESC.</th>
				<th>SUB TOTAL</th>
	
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
							(vd.cantidad * vd.precio_ofertas - vd.vd_descuento) as subtotal
						FROM
							venta_detalle vd inner join productos p on 
							vd.codigo_producto = p.codigo_producto
							INNER JOIN talla tp on vd.id_talla = tp.id_talla
							WHERE vd.nro_boleta = '".$_GET['codigo']."'";
							$contador=0;
							$resultado2 = $mysqli ->query($query2);
							while ($row2 = $resultado2-> fetch_assoc()){
								$contador++;
								$descri = $row2['descripcion_producto'];
	
			$html.='<tr >
				<td class="service" style="border-bottom:0px; border-top:0px;">'.$contador.'</td>
				<td class="desc" style="border-bottom:0px ;border-top:0px; text-align: center;">'.utf8_decode( $descri).'</td>
				<td class="unit" style="border-bottom:0px; border-top:0px; text-align: center;">'.$row2['precio_ofertas'].'</td>
				<td class="qty" style="border-bottom:0px; border-top:0px; text-align: center;">'.$row2['cantidad'].'</td>
				<td class="qty" style="border-bottom:0px; border-top:0px; text-align: center;">'.$row2['vd_descuento'].'</td>
				<td class="total" style="border-bottom:0px; border-top:0px; text-align: right;">'.round($row2['subtotal'],2).'</td>
				</tr>';
			}
			
			$html.='
			  
			  <tr>
				
			  </tr>
				 <tr>
					<td  colspan="1" rowspan="5"  style="  border-left:0px; border-bottom:0px; border-right:0px; ">
					<barcode code="'.$row1['ruc'].'|'.$row1['compro_tipo'].'|'.$row1['nro_boleta'].'|'.$row1['igv'].'|'.$row1['total_venta'].'|'.$row1['fecha'].'|'.$row1['cliente_tipo_doc'].'|'.$row1['cliente_dni'].'" type="QR" class="barcode" size="1" disableborder="1" />
					</td>
					<td colspan="4" style=" border-left:0px; border-bottom:0px; border-right:0px;">GRAVADAS:</td>
					<td class="" style="text-align: right;">'.$row1['moneda'].' '.number_format ((float)$row1['subtotal'] , 2, '.', '').'</td>
				
			  </tr>
			   
			  <tr> 
				<td colspan="4"  style=" border-top:0px; border-left:0px; border-bottom:0px; border-right:0px;">'.$row1['tipo_impuesto'].':</td>
				<td class="" style="text-align: right;">'.$row1['moneda'].' '.number_format ((float)$row1['igv'], 2, '.', '').'</td>
			  </tr>
			  <tr> 
				<td colspan="4"  style=" border-top:0px; border-left:0px; border-bottom:0px; border-right:0px;">DESC.:</td>
				<td class="" style="text-align: right;">'.$row1['moneda'].' '.number_format ((float)$row1['descuento'], 2, '.', '').'</td>
			  </tr>
			  <tr>
				<td colspan="4" class="grand total" style=" border-top:0px; border-left:0px; border-bottom:0px; border-right:0px;"><b>TOTAL:</b></td>
					<td class="" style="text-align: right;">'.$row1['moneda'].' '.$row1['total_venta'].'</td>
			  </tr>
			   
			</tbody>
		  </table>
		  <br>
		  <br>
		  <br>
		  <div id="notices">
			<div></div>
			<div class="notice">SON: '.utf8_decode(strtoupper($letra)).'</div>
			<br>
			<br>
			<div><b>Condiciones:</b></div><br>
			<div>Forma de Pago &nbsp;&nbsp;&nbsp; :&nbsp;&nbsp; '.$row1['f_pago'].'</div>
		  </div>
		</main>
		<footer>	
		</footer>
		
		
	  </body>';
	} else{
		$html = '
		<body>
		<div class="caja">
		<img class="anulada" src="img/anulado.png" alt="Anulada">
		</div>

	  
		<header class="clearfix">
		<table style="border-collapse; " border="1" >
			<thead >
				<tr>
					<th width="20%" style="border-top:0px; border-left:0px; border-bottom:0px; border-right:0px; "><img src="../vistas/assets/imagenes/empresa/'.$row1['imagen'].'" width="70px"></th>
	
					<th width="50%" style="border-top:0px; border-left:0px; border-bottom:0px; border-right:0px; text-align:left">
						<h3><b>'.utf8_decode($row1['razon_social']).'</b></h3><br>
						<b>Direcci&oacute;n: </b>'.utf8_decode($row1['direccion']).'<br>
						<b>Tel: </b>'.$row1['celular'].'<br>
					
						<b>Correo: </b>'.$row1['email'].'<br>
					</th>
	
					<th width="30%" style="text-align:center;">
						<h3 style="">R.U.C. '.$row1['ruc'].' </h3><br>
						<h2 style="color:black;">'.strtoupper($correla).' DE VENTA    </h2><br>
						<h3 style="">'.$row1['nro_boleta'].' </h3>
					</th>
				</tr>
			</thead>
		</table>
	 
	
		</header>
		 <table  style="border-collapse; " border="1" >
		
			<thead >
			<div class="round_table" >  
				<tr>
			
					<th width="50%" style="  text-align:left; border-right:0px; ">
						<b>Cliente   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </b>'.utf8_decode($row1['cliente_nombres']).'<br>
						<br><b>Ruc/Dni &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b>'.$row1['cliente_dni'].'<br>
						<br><b>Direcci&oacute;n &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b>'.$row1['cliente_direccion'].'<br>
						<br><b>Moneda   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b>'.$row1['nombre_moneda'].'<br>
						<br><b>Observaci&oacute;n : </b><br>
						
					</th>
					<th width="50%" style="text-align:right; border-left:0px;">
						<b>Fecha: </b>'.$row1['fecha'].'<br><br>
						<br><br>
						<br><br>
						<br><br>
						
					</th>
	
				</tr>
				</div>
			</thead>
		</table>
		
		<main>
		  <table  style="border-collapse; " border="1"  >
		 
			<thead>
			  <tr>
				<th   class=""  >ITEM</th>
				<th class="">PRODUCTO</th>
				<th>PRECIO</th>
				<th>CANTIDAD</th>
				<th>SUB TOTAL</th>
	
			  </tr>
			</thead>
			
			<tbody>';
			$query2 = "SELECT
							vd.nro_boleta,
							vd.codigo_producto,
							CONCAT(p.descripcion_producto,' (T-',tp.descripcion,')') as descripcion_producto,
							vd.cantidad,
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
								$descri = $row2['descripcion_producto'];
	
			$html.='<tr >
				<td class="service" style="border-bottom:0px; border-top:0px;">'.$contador.'</td>
				<td class="desc" style="border-bottom:0px ;border-top:0px; text-align: center;">'.utf8_decode( $descri).'</td>
				<td class="unit" style="border-bottom:0px; border-top:0px; text-align: center;">'.$row2['precio_ofertas'].'</td>
				<td class="qty" style="border-bottom:0px; border-top:0px; text-align: center;">'.$row2['cantidad'].'</td>
				<td class="total" style="border-bottom:0px; border-top:0px; text-align: right;">'.round($row2['subtotal'],2).'</td>
				</tr>';
			}
			
			$html.='
			  
			  <tr>
				
			  </tr>
				 <tr>
				<td  colspan="1" rowspan="5"  style="  border-left:0px; border-bottom:0px; border-right:0px; ">
				 <barcode code="'.$row1['ruc'].'|'.$row1['compro_tipo'].'|'.$row1['nro_boleta'].'|'.$row1['igv'].'|'.$row1['total_venta'].'|'.$row1['fecha'].'|'.$row1['cliente_tipo_doc'].'|'.$row1['cliente_dni'].'" type="QR" class="barcode" size="1" disableborder="1" />
				</td>
				<td colspan="3" style=" border-left:0px; border-bottom:0px; border-right:0px;">GRAVADAS:</td>
				<td class="" style="text-align: right;">'.$row1['moneda'].' '.round(($row1['total_venta'] - $row1['igv'] ),2).'</td>
				
			  </tr>
			   
			  <tr> 
				<td colspan="3"  style=" border-top:0px; border-left:0px; border-bottom:0px; border-right:0px;">IGV:</td>
				<td class="" style="text-align: right;">'.$row1['moneda'].' '.round($row1['igv'],2).'</td>
			  </tr>
			  <tr>
				<td colspan="3" class="grand total" style=" border-top:0px; border-left:0px; border-bottom:0px; border-right:0px;"><b>TOTAL:</b></td>
					<td class="" style="text-align: right;">'.$row1['moneda'].' '.$row1['total_venta'].'</td>
			  </tr>
			   
			</tbody>
		  </table>
		  <br>
		  <br>
		  <br>
		  <div id="notices">
			<div></div>
			<div class="notice">SON: '.utf8_decode(strtoupper($letra)).'</div>
			<br>
			<br>
			<div><b>Condiciones:</b></div><br>
			<div>Forma de Pago &nbsp;&nbsp;&nbsp; :&nbsp;&nbsp; '.$row1['f_pago'].'</div>
		  </div>
		</main>
		<footer>	
		</footer>
		
		
	  </body>';



	}
	  $html.='
	</html>';

}
$css = file_get_contents('css/style.css');
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();