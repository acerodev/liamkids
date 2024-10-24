<?php

class CotizacionControlador{

    static public function ctrObtenerNroBoleta($compro_id){
        
        $nroBoleta = CotizacionModelo::mdlObtenerNroBoleta($compro_id);
        return $nroBoleta;

    }

    /*==========================================================*/
    //REGISTRAR UNA VENTA
    /*==========================================================*/
    static public function ctrRegistrarCoti($datos,$nro_boleta,$total_venta,$descripcion_venta, $subtotal, $igv, $id_usuario, $cliente_id, $f_pago , $f_pago_ope, $compro_id, $atiende, $validez){
        
        $registroCoti = CotizacionModelo::mdlRegistrarCoti($datos,$nro_boleta,$total_venta,$descripcion_venta, $subtotal, $igv, $id_usuario, $cliente_id, $f_pago , $f_pago_ope, $compro_id,  $atiende, $validez);
        return $registroCoti;

    }


    static public function ctrListarVentas($fechaDesde, $fechaHasta){

        $ventas = CotizacionModelo::mdlListarVentas($fechaDesde,$fechaHasta);
        return $ventas;
    }

    /*==========================================================*/
    //ELIMINAR UNA VENTA
    /*==========================================================*/
    static public function ctrEliminarVenta($nroBoleta){

        $respuesta = CotizacionModelo::mdlEliminarVenta($nroBoleta);
        return $respuesta;
    }

     /*==========================================================*/
    //BUSCAR VENTAS POR RANGO DE FECHAS   - SEGUNDA VENTANA
    /*==========================================================*/
    static public function ctrListCotiFechas($fecha_ini,$fecha_fin)
    {
        $ListCoti =  CotizacionModelo::mdlListCotiFechas($fecha_ini,$fecha_fin);
        return $ListCoti;
        //var_dump($Listventas);
    }


    /*==========================================================*/
    //ELIMINAR UNA VENTA
    /*==========================================================*/
    static public function ctrDetalleVenta($nro_boleta){

        $detalleVenta = CotizacionModelo::mdlDetalleVenta($nro_boleta);
        return $detalleVenta;
    }
    
}