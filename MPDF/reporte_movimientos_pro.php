<?php

use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Sum;

require_once __DIR__ . '/vendor/autoload.php';
require '../conexion_reportes/r_conexion.php';

//$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','orientation' => 'L']);
$mpdf = new \Mpdf\Mpdf();

$query = " SELECT
            k.codigo_producto,
            p.descripcion_producto,
            DATE_FORMAT(CURDATE(), '%d/%m/%Y') as fec_actual,
            IFNULL(SUM(k.kardex_ingreso),0) as sum_in,
            IFNULL(sum(k.kardex_salida),0) as sum_sal,
            COALESCE(SUM(k.kardex_ingreso), 0) - COALESCE(SUM(k.kardex_salida), 0) AS stock_producto
            FROM kardex2 k INNER JOIN productos p on k.codigo_producto = p.codigo_producto
            where k.kardex_tipo IN ('INVENTARIO INICIAL','INGRESO DIRECTO','SALIDA DIRECTA', 'VENTA', 'COMPRA') and p.codigo_producto =  '".$_GET['codigo']."'
            GROUP BY k.codigo_producto";

$resultado = $mysqli->query($query);
while ($row1 = $resultado->fetch_assoc()) {


    $html = '<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <title>Example 1</title>
        <link rel="stylesheet" href="" media="all" />
      </head>
      <body>
        <header class="clearfix">
        <style>
        table {
            border-collapse: collapse;
           
            margin-bottom: 1em;
            font-family: Arial, sans-serif;
            font-size: 8px;
            /* color: #333; */
        }
    
        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
            /* background-color: #f2f2f2; */
        }
    
        th {
            /* background-color: #ddd; */
            font-weight: bold;
            text-transform: uppercase;
            position: relative;
        }
    
        th img {
            float: left;
            margin-right: 20px;
            max-width: 100px;
            transform: translateY(-50%);
            right: 20px;
            max-width: 100px;
        }
        @page {
            margin: 5mm;
            margin-header: 0mm;
            margin-footer: 0mm;
            odd-footer-name: html_myfooter1;
            }
        </style>
        <table style=" width: 100%;">
        <thead>
            <tr>
                <th colspan="6"  style="color:black;  font-size: 10px;  text-align: center;">
                    <b>REPORTE DETALLADO DE MOVIMIENTOS POR PRODUCTO</b>
                
                </th>
                <th style="color:black;  font-size: 10px;  text-align: right;"> 
                    FECHA: &nbsp; '.$row1['fec_actual'].'
                
                </th>
            </tr>
          
            
        </thead>
    </table>
     

        <table>
        <thead>
            <tr>
                <th colspan="7"  style="color:black;  font-size: 10px; text-align: left;">
                    ARTICULO: &nbsp; &nbsp; '.$row1['descripcion_producto'].' &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; STOCK:  &nbsp; &nbsp; '.$row1['stock_producto'].'
                   
                </th>
                
            
            </th>
            </tr>
           
            
            <tr>
                <th style="color:black;   font-size: 9px;"><b>#</b></th>
                <th style="color:black;   font-size: 9px;"><b>CODIGO</b></th>
                <th style="color:black; font-size: 9px;"><b>COMPROBANTE</b></th>
                <th style="color:black; font-size: 9px;"><b>CONCEPTO</b></th>
                <th style="color:black; font-size: 9px;"><b>FECHA</b></th>
                <th style="color:black; font-size: 9px;"><b>ENTRADAS</b></th>
                <th style="color:black; font-size: 9px;"><b>SALIDAS</b></th>
               

            </tr>
        </thead>
        <tbody>';
    $query2 = "SELECT
                codigo_producto,
                IFNULL(venta_comprobante, '-') as comprobante,
                kardex_tipo,
                DATE_FORMAT(kardex_fecha, '%d/%m/%Y') as fecha, 
                kardex_ingreso,
                kardex_salida
            FROM
                kardex2 
            WHERE  kardex_tipo IN ( 'INGRESO DIRECTO', 'SALIDA DIRECTA', 'VENTA', 'INVENTARIO INICIAL' , 'COMPRA') AND 
                codigo_producto = '".$_GET['codigo']."'";
   

    $contador = 0;
    $resultado2 = $mysqli->query($query2);
    while ($row2 = $resultado2->fetch_assoc()) {
        $contador++;

        $html .= '<tr >
   
    <td class="desc"  style=" font-size: 9px; "> '.$contador.'</td>
    <td class="desc"  style=" font-size: 9px; ">' . $row2['codigo_producto'] . '</td>
    <td class="desc"  style=" font-size: 9px;">' . $row2['comprobante'] . '</td>
    <td class="desc"  style=" font-size: 9px;">' . $row2['kardex_tipo'] . '</td>
    <td class="desc"  style=" font-size: 9px;">' . $row2['fecha'] . '</td>
    <td class="desc"  style=" font-size: 9px; ">' . $row2['kardex_ingreso'] . '</td>
    <td class="desc"  style=" font-size: 9px;  ">' . $row2['kardex_salida'] . '</td>
   
    </tr>';
    }


    $html .= '
    <tr>
				
    </tr>
       <tr>
          <td  colspan="1" rowspan="5"  style="  border-left:0px; border-bottom:0px; border-right:0px; ">
      
          </td>
          <td colspan="4" style=" border-left:0px; border-bottom:0px; border-right:0px;">Totales:</td>
          <td class="" style="text-align: right; font-size: 9px; ">' .$row1['sum_in'].'</td>
          <td class="" style="text-align: right; font-size: 9px; ">' .$row1['sum_sal'].'</td>
      
       </tr>
   
               
            </tbody>
          </table>
         
          
        
        </main>
        <footer>
    
        </footer>
      </body>
    </html>';
}




 $css = file_get_contents('css/style_coti.css');
 $mpdf->WriteHTML($css,1);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();