<?php

require_once "conexion.php";

class ComprasModelo{
    
    public $resultado;

    
    static public function mdlObtenerNroBoleta($compro_id){

        $stmt = Conexion::conectar()->prepare('call SP_OBTENER_NRO_BOLETA2(:compro_id)');
        $stmt -> bindParam(":compro_id",$compro_id,PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    static public function mdlRegistrarCompra($datos, $nro_compra, $cliente_id,$compro_id, $serie_comprobante, $nro_comprobante, $fecha_comprobante, $ope_gravada, $igv,  $total_compra, $id_usuario, $f_pago , $f_pago_ope, $caja_id){
        
        $date = date('Y-m-d');

        $stmt = Conexion::conectar()->prepare("INSERT INTO compra_cabecera(nro_compra, cliente_id, compro_id, serie_comprobante, nro_comprobante, fecha_comprobante, ope_gravada, igv, total_compra, compra_estado, fecha, id_usuario, f_pago, f_pago_ope, estado_caja, caja_id )         
                                                VALUES(:nro_compra, :cliente_id, :compro_id, :serie_comprobante, :nro_comprobante, :fecha_comprobante, :ope_gravada, :igv, :total_compra, 'REGISTRADA', CURDATE(), :id_usuario, :f_pago, :f_pago_ope, 'VIGENTE', :caja_id); ");

        $stmt -> bindParam(":nro_compra", $nro_compra , PDO::PARAM_STR);
        $stmt -> bindParam(":cliente_id", $cliente_id , PDO::PARAM_STR);
        $stmt -> bindParam(":compro_id", $compro_id, PDO::PARAM_STR);
        $stmt -> bindParam(":serie_comprobante", $serie_comprobante, PDO::PARAM_STR);
        $stmt -> bindParam(":nro_comprobante", $nro_comprobante, PDO::PARAM_STR);
        $stmt -> bindParam(":fecha_comprobante", $fecha_comprobante, PDO::PARAM_STR);
        $stmt -> bindParam(":ope_gravada", $ope_gravada, PDO::PARAM_STR);
        $stmt -> bindParam(":igv", $igv, PDO::PARAM_STR);
        $stmt -> bindParam(":total_compra", $total_compra , PDO::PARAM_STR);
        $stmt -> bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
        $stmt -> bindParam(":f_pago", $f_pago, PDO::PARAM_STR);
        $stmt -> bindParam(":f_pago_ope", $f_pago_ope, PDO::PARAM_STR);
        $stmt -> bindParam(":caja_id", $caja_id, PDO::PARAM_STR);
        


       // if($stmt -> execute()){
            
            //$stmt = null;

           //ACTUALIZAMOS EL CORRELATIVO
           //$stmt = Conexion::conectar()->prepare("UPDATE comprobante SET compro_numero = LPAD(compro_numero + 1,8,'0') WHERE compro_id = :compro_id");
           //$stmt = Conexion::conectar()->prepare("UPDATE empresa SET nro_correlativo_venta = LPAD(nro_correlativo_venta + 1,8,'0')");
           //$stmt -> bindParam(":compro_id", $compro_id, PDO::PARAM_STR);

            if($stmt -> execute()){

                $listaProductos = [];

                for ($i = 0; $i < count($datos); ++$i){
                    
                    $listaProductos = explode(",",$datos[$i]);
        
                    $stmt = Conexion::conectar()->prepare('call prc_registrar_compra_detalle (:p_nro_compra, 
                                                                                             :p_codigo_producto, 
                                                                                             :p_cantidad, 
                                                                                             :p_total_compra,
                                                                                             :p_precio_compra,
                                                                                             :p_talla );');
          
                    $stmt -> bindParam(":p_nro_compra", $nro_compra , PDO::PARAM_STR);
                    $stmt -> bindParam(":p_codigo_producto", $listaProductos[0] , PDO::PARAM_STR);
                    $stmt -> bindParam(":p_cantidad", $listaProductos[1] , PDO::PARAM_STR);
                    $stmt -> bindParam(":p_total_compra", $listaProductos[2] , PDO::PARAM_STR);
                    $stmt -> bindParam(":p_precio_compra", $listaProductos[3] , PDO::PARAM_STR);
                    $stmt -> bindParam(":p_talla", $listaProductos[4] , PDO::PARAM_STR);
                  


                    if($stmt -> execute()){
                        $stmt = null;
                        $concepto = 'COMPRA';
                        // //REGISTRAMOS EL KARDEX DE SALIDAS Y STOCK
                        $stmt = Conexion::conectar()->prepare('call prc_registrar_kardex_compra (:p_codigo_producto,
                                                                                                :p_fecha, 
                                                                                                :p_concepto,
                                                                                                :p_comprobante,
                                                                                                :p_unidades,
                                                                                                :p_talla
                                                                                                );');

                        $stmt -> bindParam(":p_codigo_producto",$listaProductos[0] , PDO::PARAM_STR);
                        $stmt -> bindParam(":p_fecha", $date , PDO::PARAM_STR);
                        $stmt -> bindParam(":p_concepto", $concepto , PDO::PARAM_STR);
                        $stmt -> bindParam(":p_comprobante", $nro_compra , PDO::PARAM_STR);
                        $stmt -> bindParam(":p_unidades", $listaProductos[1] , PDO::PARAM_STR);
                        $stmt -> bindParam(":p_talla", $listaProductos[4] , PDO::PARAM_STR);
                      
                      
                        
                        if($stmt -> execute()){
                            
                            $resultado = "SE REGISTRO LA COMPRA CORRECTAMENTE";

                        }else{
                            
                            $resultado = "Error al actualizar el stock";

                        }

                    }else{
                        
                        $resultado = "Error al registrar la Compra";

                    }
                }
            }
       // }
    

        return $resultado;
        $stmt = null;
        //var_dump($resultado);
        
        
       
    }

    static public function mdlListarVentas($fechaDesde,$fechaHasta){

        try {
            
            $stmt = Conexion::conectar()->prepare("SELECT Concat('Boleta Nro: ',v.nro_boleta,' - Total Venta: S./ ',Round(vc.total_venta,2)) as nro_boleta,
                                                            v.codigo_producto,
                                                            c.nombre_categoria,
                                                            p.descripcion_producto,
                                                            case when c.aplica_peso = 1 then concat(v.cantidad,' Kg(s)')
                                                            else concat(v.cantidad,' Und(s)') end as cantidad,                            
                                                            concat('S./ ',round(v.total_venta,2)) as total_venta,
                                                            v.fecha_venta
                                                            FROM venta_detalle v inner join productos p on v.codigo_producto = p.codigo_producto
                                                                                inner join venta_cabecera vc on cast(vc.nro_boleta as integer) = cast(v.nro_boleta as integer)
                                                                                inner join categorias c on c.id_categoria = p.id_categoria_producto
                                                    where DATE(v.fecha_venta) >= date(:fechaDesde) and DATE(v.fecha_venta) <= date(:fechaHasta)
                                                    order by v.nro_boleta asc");

            $stmt -> bindParam(":fechaDesde",$fechaDesde,PDO::PARAM_STR);
            $stmt -> bindParam(":fechaHasta",$fechaHasta,PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt->fetchAll();
            
        } catch (Exception $e) {
            return 'Excepción capturada: '.  $e->getMessage(). "\n";
        }
        

        $stmt = null;
    }


     /*==========================================================*/
    //ELIMINAR UNA VENTA
    /*==========================================================*/
    static public function mdlEliminarCompra($nro_compra){
        $stmt = Conexion::conectar()->prepare('call prc_eliminar_compra(:nro_compra)');
        $stmt -> bindParam(":nro_compra",$nro_compra,PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }

     /*=============================================
    Peticion LISTAR PARA MOSTRAR DATOS EN DATATABLE CON PROCEDURE   - SEGUNDA VENTANA
    =============================================*/
    static public function mdlListVentasFechas($fecha_ini, $fecha_fin)
    {
        $stmt = Conexion::conectar()->prepare('call SP_LISTAR_COMPRAS(:fecha_ini, :fecha_fin)');
        $stmt->bindParam(":fecha_ini", $fecha_ini, PDO::PARAM_STR);
        $stmt->bindParam(":fecha_fin", $fecha_fin, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /*==========================================================*/
    //VER DETALLE DE UNA VENTA
    /*==========================================================*/
    static public function mdlDetalleVenta($nro_compra){
        $stmt = Conexion::conectar()->prepare('call SP_LISTAR_DETALLE_COMPRA(:nro_compra)');
        $stmt -> bindParam(":nro_compra", $nro_compra,PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }


     /*===================================================================
    LISTAR NOMBRE DE PRODUCTOS PARA INPUT DE AUTO COMPLETADO
    ====================================================================*/
    static public function mdlListarNombreProductos(){

        $stmt = Conexion::conectar()->prepare("SELECT
                                                    Concat(
                                                        codigo_producto,' / ',
                                                        c.nombre_categoria,' / ',
                                                        descripcion_producto,'  - Costo:  ',
                                                        p.precio_compra_producto,
                                                        ' / Stock: ',p.stock_producto,' ',
                                                        m.abreviatura 
                                                    ) AS descripcion_producto 
                                                FROM
                                                    productos p
                                                    INNER JOIN categorias c ON p.id_categoria_producto = c.id_categoria
                                                    INNER JOIN medida m ON p.id_medida = m.id_medida
                                                    
                                                WHERE
                                                    p.estado = 'Activo';");

        $stmt -> execute();

        return $stmt->fetchAll();
    }


    /*===================================================================
    BUSCAR PRODUCTO POR SU CODIGO DE BARRAS
    ====================================================================*/
    static public function mdlGetDatosProducto($codigoProducto){

        $stmt = Conexion::conectar()->prepare("SELECT   codigo_producto,
                                                        c.id_categoria,                                                        
                                                        c.nombre_categoria,
                                                        descripcion_producto,
                                                        '1' as cantidad,
                                                        CONCAT(CONVERT(ROUND(precio_compra_producto,2), CHAR)) as precio_compra_producto,
                                                        CONCAT(CONVERT(ROUND(1*precio_compra_producto,2), CHAR)) as total,
                                                        '' as acciones,
                                                        c.aplica_peso,
                                                        p.precio_mayor_producto,
													    p.precio_oferta_producto,
                                                        '' as talla
                                                FROM productos p inner join categorias c on p.id_categoria_producto = c.id_categoria
                                            WHERE codigo_producto = :codigoProducto
                                                ");
        
        $stmt -> bindParam(":codigoProducto",$codigoProducto,PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }


}