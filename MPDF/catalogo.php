<?php

require_once __DIR__ . '/vendor/autoload.php';
require '../conexion_reportes/r_conexion.php';

//$contador = 3;
$mpdf = new \Mpdf\Mpdf();
$query = "SELECT c.nombre_categoria 
            FROM productos p INNER JOIN categorias c  
            ON p.id_categoria_producto = c.id_categoria 
            WHERE c.id_categoria = '".$_GET['categoria']."'  AND p.estado = 'Activo'
            GROUP BY c.id_categoria";
   
 	$resultado = $mysqli ->query($query);
   
    while ($row1 = $resultado-> fetch_assoc()){
        
 	
       
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <title>Catalogo de productos</title>
          <style>
          
            
              *{
                
                margin:0; padding:0;
                box-sizing: border-box;
                outline: none; border:none;
                text-decoration: none;
                transition: all .2s linear;
                text-transform: capitalize;
            }
            
            html{
                font-size: 62.5%;
                overflow-x: hidden;
            }
            
            body{
                background: #F5F5F5;
            }

            .container .title{
                font-size: 3.5rem;
                color:#444;
                margin-bottom: 3rem;
                text-transform: uppercase;
                text-align: center;
            }
            
            .container .products-container{
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
                gap:2rem;
               
            }
            
            .container .products-container .product{
                text-align: center;
                padding:3rem 2rem;
                background: #fff;
                
                cursor: pointer;
            }
            
            
            .container .products-container .product:hover{
                outline: .2rem solid #222;
                outline-offset: 0;
            }
            
            .container .products-container .product img{
               
                width: 100px;
               height: 100px;
            }
            
           
            
            .container .products-container .product h3{
                padding:.5rem 0;
                font-size: 2rem;
                color:#444;
            }
            
          
            
            .container .products-container .product .price{
                font-size: 20px;
                color:#444;
            }

            @page {
              margin: 10mm;
              margin-header: 0mm;
              margin-footer: 0mm;
              odd-footer-name: html_myfooter1;
          }
         
         
           
          
          </style>
        </head>
        
        <body>
        <div class="container">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h3 class="title"> Productos por categoria</h3>
            <br>
            <br>
            <br>
            <h3 class="title"> " '.$row1['nombre_categoria'].' "  </h3>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            
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
                            where p.id_categoria_producto = '".$_GET['categoria']."' and p.estado = 'Activo'";
							$contador=0;
							$resultado2 = $mysqli ->query($query2);
							while ($row2 = $resultado2-> fetch_assoc()){

                    
                         $html.='<div class="products-container">
                            <div class="product" data-name="p-1">
                            <h3>'.$row2['descripcion_producto'].'</h3>
                            <img src="../vistas/assets/imagenes/productos/'.$row2['imagen_p'].'" alt="">
                           
                            <div class="price">PRECIO: '.$row2['moneda'].' '.$row2['precio_venta'].'</div>
                          
                          </div>  
                          </div>  
                          <br>
 
                        
                         ';
                        
                      }              
                      
                $html.='
           
                    
          </div>

          
   
        </body>
        
        </html>';
             
            }



            
                
//type="C128C" OCASIONAR UN ERROR Y QUE SALGA LA CONSULTA EN PANTALLA
//$css = file_get_contents('css/barra.css'); //CODABAR o QR
//$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();