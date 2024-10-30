<?php

require_once "conexion.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

require __DIR__ . '/../vendor/autoload.php';

class VentasModelo{
    
    public $resultado;

    
    static public function mdlObtenerNroBoleta($compro_id){

        $stmt = Conexion::conectar()->prepare('call SP_OBTENER_NRO_BOLETA2(:compro_id)');
        $stmt -> bindParam(":compro_id",$compro_id,PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    //REGISTRAR VENTA Y ENVIAR POR CORREO
    static public function mdlRegistrarVenta($detalle_productos,$nro_boleta,$total_venta,$descripcion_venta, $subtotal, $igv, $id_usuario, $cliente_id, $f_pago , $f_pago_ope, $compro_id, $caja_id, $monto_efectivo , $monto_transfe, $descuento)
    {
        $dbh = Conexion::conectar();
        $date = date('Y-m-d');
        $datetime = date('Y-m-d H:i:s');
        try {

        $stmt = $dbh->prepare("INSERT INTO venta_cabecera(nro_boleta,descripcion,total_venta,fecha_venta,subtotal,igv, id_usuario, venta_estado, cliente_id, f_pago,f_pago_ope, compro_id, estado_caja, caja_id, monto_efectivo, monto_transfe, descuento, abonado)         
                                                VALUES(:nro_boleta,:descripcion,:total_venta,:fecha_venta, :subtotal, :igv, :id_usuario,   IF(:f_pago = 'Credito', 'CREDITO', 'REGISTRADA'),  :cliente_id, :f_pago, :f_pago_ope, :compro_id, 'VIGENTE', :caja_id, :monto_efectivo, :monto_transfe, :descuento, '0')");


        $dbh->beginTransaction();
        $stmt->execute(array(
           
            ':nro_boleta' => $nro_boleta,
            ':descripcion' => $descripcion_venta,
            ':total_venta' => $total_venta,
            ':subtotal' => $subtotal,
            ':igv' => $igv,
            ':id_usuario' => $id_usuario,
            ':cliente_id' => $cliente_id,
            ':f_pago' => $f_pago,
            ':f_pago_ope' => $f_pago_ope,
            ':compro_id' => $compro_id,
            ':caja_id' => $caja_id,
            ':monto_efectivo' => $monto_efectivo,
            ':monto_transfe' => $monto_transfe,
            ':fecha_venta' => $datetime,
             ':descuento' => $descuento

          
        ));
        $dbh->commit();



     
                //ACTUALIZAMOS EL CORRELATIVO
                $stmt =$dbh->prepare("UPDATE comprobante SET compro_numero = LPAD(compro_numero + 1,8,'0') WHERE compro_id = :compro_id");
          
                $dbh->beginTransaction();
                $stmt->execute(array(              
                    ':compro_id' => $compro_id
                ));
                $dbh->commit();

               

                $listaProductos = [];

                for ($i = 0; $i < count($detalle_productos); ++$i){
                    
                    $listaProductos = explode(",",$detalle_productos[$i]);

                    $stmt = $dbh->prepare("INSERT INTO venta_detalle(nro_boleta, codigo_producto, cantidad, total_venta, fecha_venta, venta_estado, precio_ofertas, id_talla, vd_descuento) 
                                            VALUES(:nro_boleta,:codigo_producto, :cantidad,  :total_venta, CURDATE(), 'REGISTRADA', :precio_ofertas, :id_talla, :vd_descuento);");
                    $dbh->beginTransaction();
                    $stmt->execute(array(
                        ':nro_boleta' => $nro_boleta,
                        ':codigo_producto' => $listaProductos[0],
                        ':cantidad' => $listaProductos[1],
                        
                        ':total_venta' => $listaProductos[2],
                        ':precio_ofertas' => $listaProductos[3],
                        ':id_talla' => $listaProductos[4],
                        ':vd_descuento' => $listaProductos[5],
                        
                    ));
    
                    $dbh->commit();


                       $concepto = 'VENTA';
                        // //REGISTRAMOS EL KARDEX DE SALIDAS Y STOCK
                        $stmt = $dbh->prepare("call prc_registrar_kardex_venta(:codigo_producto,:fecha, :concepto,:comprobante,:unidades,:talla);");

                        $dbh->beginTransaction();
                        $stmt->execute(array(
                           
                            ':codigo_producto' => $listaProductos[0],
                            ':fecha' => $date,
                            ':concepto' => $concepto,
                            ':comprobante' => $nro_boleta,
                            ':unidades' => $listaProductos[1],
                            ':talla' => $listaProductos[4]
                            
                        ));
        
                        $dbh->commit();  
        }
        

        $resultado = "SE REGISTRO LA VENTA CORRECTAMENTE";
        } catch (Exception $e) {
            $dbh->rollBack();
            $resultado = "ERROR AL REGISTRAR LA VENTA". $e->getMessage();
        // $resultado["msj"] = "Error al registrar la compra correctamente " . $e->getMessage();
        }
            return $resultado;
 
    }

     /*==========================================================*/
    //LISTAR VENTA
    /*==========================================================*/
    static public function mdlListarVentas($fechaDesde,$fechaHasta){

        try {
            
            $stmt = Conexion::conectar()->prepare("SELECT Concat('Boleta Nro: ',v.nro_boleta,' - Total Venta:', ' ', e.moneda,' ',Round(vc.total_venta,2)) as nro_boleta,
                                                            v.codigo_producto,
                                                            c.nombre_categoria,
                                                            p.descripcion_producto,
                                                            case when c.aplica_peso = 1 then concat(v.cantidad,' Kg(s)')
                                                            else concat(v.cantidad,' Und(s)') end as cantidad,                            
                                                            concat(e.moneda,' ',round(v.total_venta,2)) as total_venta,
                                                            v.fecha_venta
                                                            FROM venta_detalle v inner join productos p on v.codigo_producto = p.codigo_producto
                                                                                inner join venta_cabecera vc on vc.nro_boleta  = cv.nro_boleta 
                                                                                inner join categorias c on c.id_categoria = p.id_categoria_producto,
                                                                                empresa e
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
    static public function mdlListVentasFechas($fecha_ini, $fecha_fin)
    {
        $stmt = Conexion::conectar()->prepare('call SP_LISTAR_VENTAS(:fecha_ini, :fecha_fin)');
        $stmt->bindParam(":fecha_ini", $fecha_ini, PDO::PARAM_STR);
        $stmt->bindParam(":fecha_fin", $fecha_fin, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /*==========================================================*/
    //VER DETALLE DE UNA VENTA
    /*==========================================================*/
    static public function mdlDetalleVenta($nro_boleta){
       /* $stmt = Conexion::conectar()->prepare('call SP_LISTAR_DETALLE_VENTA(:nro_boleta)');
        $stmt -> bindParam(":nro_boleta", $nro_boleta,PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();*/

        $dbh = Conexion::conectar();
        $date = date('Y-m-d');
        try {

        $stmt = $dbh->prepare("SELECT
                            vd.nro_boleta, 
                            vd.codigo_producto, 
                            CONCAT(p.descripcion_producto,' (T-',tp.descripcion,')') as producto,
                            vd.precio_ofertas,
                            vd.cantidad, 
                            vd.total_venta 
                        FROM
                            venta_detalle vd
                            INNER JOIN productos p ON vd.codigo_producto = p.codigo_producto
                            INNER JOIN talla tp on vd.id_talla = tp.id_talla
                            where vd.nro_boleta = :nro_boleta");


        $dbh->beginTransaction();
        $stmt->execute(array(
           
            ':nro_boleta' => $nro_boleta         
        ));
        $dbh->commit();


        } catch (Exception $e) {
            $dbh->rollBack();
          // $resultado = "ERROR". $e->getMessage();
        
        }
        return $stmt->fetchAll();
    }

     /*=============================================
    LISTAR VENTAS A CRREDITO
    =============================================*/
    static public function mdlListVentasCredito()
    {
        $stmt = Conexion::conectar()->prepare('call SP_LISTAR_VENTAS_CREDITO()');
        // $stmt->bindParam(":fecha_ini", $fecha_ini, PDO::PARAM_STR);
        // $stmt->bindParam(":fecha_fin", $fecha_fin, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    
    /*=============================================
     REGISTRAR ABONO
    =============================================*/
    static public function mdlRegAbonoVentaCred($data)
    {

        $dbh = Conexion::conectar();
        $date = date('Y-m-d');
        try {

        $stmt = $dbh->prepare("call SP_REGISTRAR_ABONO_VENTA_CREDITO(:nro_boleta, :monto, :caja_id)");


        $dbh->beginTransaction();
        $stmt->execute(array(
           
            ':nro_boleta' => $data['nro_boleta'], 
            ':monto' => $data['monto'],        
            ':caja_id' => $data['caja_id']                
        ));
        $dbh->commit();

        $resultado = "ok";
        } catch (Exception $e) {
            $dbh->rollBack();
            $resultado = "error". $e->getMessage();
        
        }

        return $resultado;
        
       /* try {
            //$fecha = date('Y-m-d');
            $stmt = Conexion::conectar()->prepare('call SP_REGISTRAR_ABONO_VENTA_CREDITO(:nro_boleta, :monto, :caja_id)');

            $stmt->bindParam(":nro_boleta", $data['nro_boleta'], PDO::PARAM_STR);
            $stmt->bindParam(":monto", $data['monto'], PDO::PARAM_STR);
            $stmt->bindParam(":caja_id", $data['caja_id'], PDO::PARAM_STR);
           
            if ($stmt->execute()) {
                $resultado = "ok";
            } else {
                $resultado = "error";
            }
        } catch (Exception $e) {
            $resultado = 'Excepción capturada: ' .  $e->getMessage() . "\n";
        }

        return $resultado;

        $stmt = null;*/
    }


     /*=============================================
    LISTAR VENTAS A CRREDITO
    =============================================*/
    static public function mdlImpre_recibos_pagos_VentaCred($data)
    {
        $stmt = Conexion::conectar()->prepare('call SP_IMPRIMIR_RECIBOS_VENTA_CREDITO(:nro_boleta)');
        $stmt->bindParam(":nro_boleta", $data['nro_boleta'], PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }


}