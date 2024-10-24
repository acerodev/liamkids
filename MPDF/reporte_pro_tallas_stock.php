<?php

require_once __DIR__ . '/vendor/autoload.php';
require '../conexion_reportes/r_conexion.php';

//require_once __DIR__ . '/vendor/autoload.php'; // Ruta a la carpeta de mPDF
$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);

// Consulta para obtener las tallas
$sql_tallas = "SELECT id_talla, descripcion FROM talla";

// Ejecutar la consulta y obtener las tallas
$resultado_tallas = $mysqli->query($sql_tallas);

// Obtener el número de tallas
$num_tallas = $resultado_tallas->num_rows;

// Crear la parte de la consulta SQL dinámica para las tallas
$sql_tallas_dynamic = '';
$tallas_header = '';

// Agregar las tallas a la consulta SQL y a la cabecera de la tabla
while ($row_tallas = $resultado_tallas->fetch_assoc()) {
    $id_talla = $row_tallas['id_talla'];
    $talla = $row_tallas['descripcion'];
    $sql_tallas_dynamic .= "SUM(CASE WHEN tp.id_talla = '$id_talla' THEN tp.stock ELSE 0 END) AS `$talla`, ";
    $tallas_header .= "<th>$talla</th>";
}

// Eliminar la coma y el espacio extra al final de la consulta SQL dinámica
$sql_tallas_dynamic = rtrim($sql_tallas_dynamic, ', ');

// Consulta para obtener los resultados con las tallas dinámicas
$sql_resultados = "SELECT p.codigo_producto, p.descripcion_producto AS Producto, p.stock_producto,  $sql_tallas_dynamic
                   FROM productos p
                   LEFT JOIN (SELECT codigo_producto, id_talla, stock FROM talla_producto) tp
                   ON p.codigo_producto = tp.codigo_producto
                   where p.estado = 'Activo'
                   GROUP BY p.codigo_producto, p.descripcion_producto, p.stock_producto";

// Ejecutar la consulta y obtener los resultados
$resultado_resultados = $mysqli->query($sql_resultados);


// Crear una tabla HTML para mostrar los resultados
$html = '<style>
            
@page {
    margin: 5mm;
    margin-header: 0mm;
    margin-footer: 0mm;
    odd-footer-name: html_myfooter1;
}

</style>
<h3 style="text-align: center;"> INVENTARIO DE ARTICULOS </h3> <br>
<table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>Codigo Producto</th>
                <th>Producto</th>
                <th>Stock</th>
                ' . $tallas_header . '
            </tr>';

// Agregar las filas de datos
while ($row = $resultado_resultados->fetch_assoc()) {
    $html .= '<tr>';
    $html .= '<td>' . $row['codigo_producto'] . '</td>';
    $html .= '<td>' . $row['Producto'] . '</td>';
   

    // Agregar los valores de las tallas a la tabla
    foreach ($row as $key => $value) {
        if ($key !== 'codigo_producto' && $key !== 'Producto') {
            $html .= '<td>' . $value . '</td>';
        }
    }

    $html .= '</tr>';
}

$html .= '</table>';

$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();

// Agregar el contenido HTML al PDF
//$mpdf->WriteHTML($html);

// Generar el PDF
//$mpdf->Output('reporte.pdf', 'D');
