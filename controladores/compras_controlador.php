<?php

class ComprasControlador{

    static public function ctrObtenerNroBoleta($compro_id){
        
        $nroBoleta = ComprasModelo::mdlObtenerNroBoleta($compro_id);
        return $nroBoleta;

    }

    /*==========================================================*/
    //REGISTRAR UNA VENTA
    /*==========================================================*/
    static public function ctrRegistrarCompra($datos, $nro_compra, $cliente_id,$compro_id, $serie_comprobante, $nro_comprobante, $fecha_comprobante, $ope_gravada, $igv,  $total_compra,  $id_usuario, $f_pago , $f_pago_ope, $caja_id){
        
        $registroCompra = ComprasModelo::mdlRegistrarCompra($datos, $nro_compra, $cliente_id,$compro_id, $serie_comprobante, $nro_comprobante, $fecha_comprobante, $ope_gravada, $igv,  $total_compra,  $id_usuario, $f_pago , $f_pago_ope, $caja_id);
        return $registroCompra;

    }


    static public function ctrListarVentas($fechaDesde, $fechaHasta){

        $ventas = ComprasModelo::mdlListarVentas($fechaDesde,$fechaHasta);
        return $ventas;
    }

    /*==========================================================*/
    //ELIMINAR UNA VENTA
    /*==========================================================*/
    static public function ctrEliminarCompra($nro_compra){

        $respuesta = ComprasModelo::mdlEliminarCompra($nro_compra);
        return $respuesta;
    }

     /*==========================================================*/
    //BUSCAR VENTAS POR RANGO DE FECHAS   - SEGUNDA VENTANA
    /*==========================================================*/
    static public function ctrListVentasFechas($fecha_ini,$fecha_fin)
    {
        $Listventas =  ComprasModelo::mdlListVentasFechas($fecha_ini,$fecha_fin);
        return $Listventas;
        //var_dump($Listventas);
    }


    /*==========================================================*/
    //ELIMINAR UNA VENTA
    /*==========================================================*/
    static public function ctrDetalleVenta($nro_compra){

        $detalleVenta = ComprasModelo::mdlDetalleVenta($nro_compra);
        return $detalleVenta;
    }

    /*===================================================================
    LISTAR NOMBRE DE PRODUCTOS PARA INPUT DE AUTO COMPLETADO
    ====================================================================*/
    static public function ctrListarNombreProductos(){

        $producto = ComprasModelo::mdlListarNombreProductos();

        return $producto;
    }


     /*===================================================================
    BUSCAR PRODUCTO POR SU CODIGO DE BARRAS
    ====================================================================*/
    static public function ctrGetDatosProducto($codigo_producto){
            
        $producto = ComprasModelo::mdlGetDatosProducto($codigo_producto);

        return $producto;

    }
    
}