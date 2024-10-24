<?php

require_once "conexion.php";

class CotizacionModelo{
    
    public $resultado;

    
    static public function mdlObtenerNroBoleta($compro_id){

        $stmt = Conexion::conectar()->prepare('call SP_OBTENER_NRO_BOLETA2(:compro_id)');
        $stmt -> bindParam(":compro_id",$compro_id,PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }



    //REGISTRAR COTIZACION
    static public function mdlRegistrarCoti($datos,$nro_boleta,$total_venta,$descripcion_venta, $subtotal, $igv, $id_usuario, $cliente_id, $f_pago , $f_pago_ope, $compro_id, $atiende, $validez){
        
        $date = date('Y-m-d');

        $stmt = Conexion::conectar()->prepare("INSERT INTO coti_cabecera(nro_boleta,descripcion,total_venta,subtotal,igv, id_usuario, venta_estado, cliente_id, f_pago,f_pago_ope, compro_id, estado_caja, atiende, validez)         
                                                VALUES(:nro_boleta,:descripcion,:total_venta, :subtotal, :igv, :id_usuario, 'REGISTRADA', :cliente_id, :f_pago, :f_pago_ope, :compro_id, 'VIGENTE',  :atiende, :validez)");

        $stmt -> bindParam(":nro_boleta", $nro_boleta , PDO::PARAM_STR);
        $stmt -> bindParam(":descripcion", $descripcion_venta, PDO::PARAM_STR);
        $stmt -> bindParam(":total_venta", $total_venta , PDO::PARAM_STR);
        $stmt -> bindParam(":subtotal", $subtotal, PDO::PARAM_STR);
        $stmt -> bindParam(":igv", $igv, PDO::PARAM_STR);
        $stmt -> bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
        $stmt -> bindParam(":cliente_id", $cliente_id, PDO::PARAM_INT);
        $stmt -> bindParam(":f_pago", $f_pago, PDO::PARAM_STR);
        $stmt -> bindParam(":f_pago_ope", $f_pago_ope, PDO::PARAM_STR);
        $stmt -> bindParam(":compro_id", $compro_id, PDO::PARAM_STR);
        //$stmt -> bindParam(":caja_id", $caja_id, PDO::PARAM_STR);
        $stmt -> bindParam(":atiende", $atiende, PDO::PARAM_STR);
        $stmt -> bindParam(":validez", $validez, PDO::PARAM_STR);


        if($stmt -> execute()){
            
            $stmt = null;

           //ACTUALIZAMOS EL CORRELATIVO
           $stmt = Conexion::conectar()->prepare("UPDATE comprobante SET compro_numero = LPAD(compro_numero + 1,8,'0') WHERE compro_id = :compro_id");
           $stmt -> bindParam(":compro_id", $compro_id, PDO::PARAM_STR);

            if($stmt -> execute()){
               // $stmt = null;
                $listaProductos = [];

                for ($i = 0; $i < count($datos); ++$i){
                    $listaProductos = explode(",",$datos[$i]);
                    $stmt = Conexion::conectar()->prepare("call prc_registrar_cotizacion_detalle (:p_nro_boleta, 
                                                                                             :p_codigo_producto, 
                                                                                             :p_cantidad, 
                                                                                             :p_total_venta,
                                                                                             :p_precio_oferta,
                                                                                             :p_talla );");
          
                    $stmt -> bindParam(":p_nro_boleta", $nro_boleta , PDO::PARAM_STR);
                    $stmt -> bindParam(":p_codigo_producto", $listaProductos[0] , PDO::PARAM_STR);
                    $stmt -> bindParam(":p_cantidad", $listaProductos[1] , PDO::PARAM_STR);
                    $stmt -> bindParam(":p_total_venta", $listaProductos[2] , PDO::PARAM_STR);
                    $stmt -> bindParam(":p_precio_oferta", $listaProductos[3] , PDO::PARAM_STR);
                    $stmt -> bindParam(":p_talla", $listaProductos[4] , PDO::PARAM_STR);

                    if($stmt -> execute()){
                        $resultado = "SE REGISTRO LA COTIZACION CORRECTAMENTE";
                    }else{
                        $resultado = "Error al guardar";
                    }    
                    
                } 
               
                
            }
            // else{
                        
            //     $resultado = "Errorrrrrrs";

            // }
        }
        // else{
                        
        //         $resultado = "Error al registrar la Cotizacion";

        //  }
    

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
    static public function mdlEliminarVenta($nroBoleta){
        $stmt = Conexion::conectar()->prepare('call prc_eliminar_venta(:nroBoleta)');
        $stmt -> bindParam(":nroBoleta",$nroBoleta,PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }

     /*=============================================
    Peticion LISTAR PARA MOSTRAR DATOS EN DATATABLE CON PROCEDURE   - SEGUNDA VENTANA
    =============================================*/
    static public function mdlListCotiFechas($fecha_ini, $fecha_fin)
    {
        $stmt = Conexion::conectar()->prepare('call SP_LISTAR_COTIZACION_FECHAS(:fecha_ini, :fecha_fin)');
        $stmt->bindParam(":fecha_ini", $fecha_ini, PDO::PARAM_STR);
        $stmt->bindParam(":fecha_fin", $fecha_fin, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /*==========================================================*/
    //VER DETALLE DE UNA VENTA
    /*==========================================================*/
    static public function mdlDetalleVenta($nro_boleta){
        $stmt = Conexion::conectar()->prepare('call SP_LISTAR_DETALLE_VENTA(:nro_boleta)');
        $stmt -> bindParam(":nro_boleta", $nro_boleta,PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }


}