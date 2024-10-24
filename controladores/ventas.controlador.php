<?php

class VentasControlador{

    static public function ctrObtenerNroBoleta($compro_id){
        
        $nroBoleta = VentasModelo::mdlObtenerNroBoleta($compro_id);
        return $nroBoleta;

    }

    /*==========================================================*/
    //REGISTRAR UNA VENTA
    /*==========================================================*/
    static public function ctrRegistrarVenta($detalle_productos,$nro_boleta,$total_venta,$descripcion_venta, $subtotal, $igv, $id_usuario, $cliente_id, $f_pago , $f_pago_ope, $compro_id, $caja_id, $monto_efectivo , $monto_transfe, $descuento){
        
        $registroVenta = VentasModelo::mdlRegistrarVenta($detalle_productos,$nro_boleta,$total_venta,$descripcion_venta, $subtotal, $igv, $id_usuario, $cliente_id, $f_pago , $f_pago_ope, $compro_id, $caja_id, $monto_efectivo , $monto_transfe, $descuento);
        return $registroVenta;

    }


    static public function ctrListarVentas($fechaDesde, $fechaHasta){

        $ventas = VentasModelo::mdlListarVentas($fechaDesde,$fechaHasta);
        return $ventas;
    }

    /*==========================================================*/
    //ELIMINAR UNA VENTA
    /*==========================================================*/
    static public function ctrEliminarVenta($nroBoleta){

        $respuesta = VentasModelo::mdlEliminarVenta($nroBoleta);
        return $respuesta;
    }

     /*==========================================================*/
    //BUSCAR VENTAS POR RANGO DE FECHAS   - SEGUNDA VENTANA
    /*==========================================================*/
    static public function ctrListVentasFechas($fecha_ini,$fecha_fin)
    {
        $Listventas =  VentasModelo::mdlListVentasFechas($fecha_ini,$fecha_fin);
        return $Listventas;
        //var_dump($Listventas);
    }


    /*==========================================================*/
    //ELIMINAR UNA VENTA
    /*==========================================================*/
    static public function ctrDetalleVenta($nro_boleta){

        $detalleVenta = VentasModelo::mdlDetalleVenta($nro_boleta);
        return $detalleVenta;
    }

     /*==========================================================*/
    //LISTAR VENTAS A CRREDITO
    /*==========================================================*/
    static public function ctrListVentasCredito()
    {
        $Listventas =  VentasModelo::mdlListVentasCredito();
        return $Listventas;
        //var_dump($Listventas);
    }

    /*===================================================================*/
    //REGISTRAR ABONO
    /*===================================================================*/
    static public function ctrRegAbonoVentaCred($data)
    {
        $respuesta = VentasModelo::mdlRegAbonoVentaCred($data);
        return $respuesta;
    }

    /*===================================================================*/
    //IMPRESION DE TICKET - RECIBOS DE PAGOS 
    /*===================================================================*/
    static public function ctrImpre_recibos_pagos_VentaCred($data)
    {
        $respuesta = VentasModelo::mdlImpre_recibos_pagos_VentaCred($data);
        return $respuesta;
    }
    
}