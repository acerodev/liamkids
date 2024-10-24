<?php
require_once __DIR__ . '/vendor/autoload.php';
require '../conexion_reportes/r_conexion.php';
include 'codigobarra/vendor/autoload.php';
use Com\Tecnick\Barcode\Barcode;

$mpdf = new \Mpdf\Mpdf();

$query = "SELECT
    p.codigo_producto,
    p.descripcion_producto,
    p.precio_venta_producto,
    t.descripcion as talla,
    empresa.moneda
    FROM  empresa,
        productos p INNER JOIN talla_producto tp on 
        p.codigo_producto = tp.codigo_producto
        INNER JOIN talla t on  tp.id_talla = t.id_talla
    where p.codigo_producto = '".$_GET['codigo']."' and tp.id_talla = '".$_GET['idtalla']."'";
$fila = $_GET['contador'];
$col =  $_GET['columna'];
$resultado = $mysqli->query($query);

while ($row1 = $resultado->fetch_assoc()) {
    $barcode = new Barcode();

    $bobj = $barcode->getBarcodeObj(
        "C39",
        $row1['codigo_producto'],
        -2,
        -100,
        'black',
        array(0, 0, 0, 0)
    );

    $imageData = $bobj->getPngData();
    $barcodeFilename = 'barcode.png';
    file_put_contents($barcodeFilename, $imageData);

    $html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Example 1</title>
        <link rel="stylesheet" href="style.css" media="all" />
        <style>
            table,  td{
                border: 0.8px solid black;
                border-collapse: collapse;
            }
            th, td{
                padding: 5px;
            }
            td{
                text-align: center;
            }
            
            @page {
                margin: 5mm;
                margin-header: 0mm;
                margin-footer: 0mm;
                odd-footer-name: html_myfooter1;
            }
        </style>
    </head>
    <body>
        <table>';
    for ($f = 0; $f < $fila; $f++) {
        $html .= '<tr>';
                for ($c = 0; $c < $col; $c++) {
                    $html .= '<td>' . $row1['descripcion_producto'] . ' (T-' . $row1['talla'] . ')
                    <br> ' . $row1['moneda'] . '. ' . $row1['precio_venta_producto'] . '
                    <br> <img src="' . $barcodeFilename . '" alt="Barcode" class="barcode" />
                    <br>' . $row1['codigo_producto'] . ' </td>';
                }
        $html .= '</tr>';
    }
    $html .= '</table>
    <footer>
    </footer>
    </body>
    </html>';
}

$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();
?>
