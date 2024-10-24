<?php

require_once __DIR__ . '/vendor/autoload.php';
require '../conexion_reportes/r_conexion.php';

//$contador = 3;
$mpdf = new \Mpdf\Mpdf();
$query = "SELECT c.nombre_categoria 
            FROM productos p INNER JOIN categorias c  
            ON p.id_categoria_producto = c.id_categoria 
            WHERE c.id_categoria = '3561'  AND p.estado = 'Activo'
            GROUP BY c.id_categoria";
   
 	$resultado = $mysqli ->query($query);
   
    while ($row1 = $resultado-> fetch_assoc()){

$fila = 1;
    
$col =  2;

$html = '
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Responsive Product Design</title>
	<style>


*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

body{
	font-size: 1.7rem;
	
	
	color: #ececec;
	padding: 4rem;
}

h2{
	text-align: center;
	margin-bottom: 5rem;
	font-size: 4rem;
}

.all-products{
	display: flex;
	align-items: center;
	justify-content: center;
	flex-wrap: wrap;
}

.product{
	overflow: hidden;
	background: #2c3e50;
	color: #21201e;
	text-align: center;
	width: 240px;
	height: 200px;
	padding: 2rem;
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	border-radius: 1.2rem;
	margin: 3rem;
}

.product .product-title, .product .product-price{
	font-size: 18px;
}

.product:hover img{
	scale:  1.1;
}

.product:hover {
	box-shadow: 5px 15px 25px #eeeeee;
}

.product img {
	height: 200px;
	margin: 1rem;
	transition: all 0.3s;
}

.product a:link, .product a:visited{
	color: #ececec;
	display: inline-block;
	text-decoration: none;
	background-color: #2c3e50;
	padding: 1.2rem 3rem;
	border-radius: 1rem;
	margin-top: 1rem;
	font-size: 14px;
	transition: all 0.2s;
}

.product a:hover{
	transform: scale(1.1);
}

  </style>
</head>
<body>
	<section class="products">
		<h2>Our Products</h2>
    ';
    $query2 = "SELECT
                    p.codigo_producto,
                    p.id_categoria_producto,
                    c.nombre_categoria,
                    p.descripcion_producto,
                    ROUND(p.precio_compra_producto,2) as precio_compra,
                    ROUND(p.precio_venta_producto,2) as precio_venta,
                    p.stock_producto,
                    p.imagen_p,
                    empresa.moneda
                    FROM
                    empresa,
                    productos p
                    INNER JOIN categorias c ON p.id_categoria_producto = c.id_categoria
                    where p.id_categoria_producto = '3561' and p.estado = 'Activo'";
      $contador=0;
      $resultado2 = $mysqli ->query($query2);
      while ($row2 = $resultado2-> fetch_assoc()){

            
                 $html.='<div class="all-products">
                            <div class="product">
                            <h3 class="product-title">'.$row2['descripcion_producto'].'</h3>
                              <img src="../vistas/assets/imagenes/productos/'.$row2['imagen_p'].'" alt="">
                                 <div class="product-info">
                                   
                                    <p class="product-price">PRECIO: '.$row2['moneda'].' '.$row2['precio_venta'].'<p>
                                  </div>
                          
                          </div>  
                        </div>  
                  <br>

                
                 ';
                
              }              
              
        $html.='
		
	</section>

</body>
</html>
';
      }
// $css = file_get_contents('css/styleCataWeb.css');
// $mpdf->WriteHTML($css,1);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();