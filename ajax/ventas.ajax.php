<?php

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";

class AjaxVentas{

    /*===================================================================*/
    //NRO DE BOLETA
    /*===================================================================*/
    public function ajaxObtenerNroBoleta($compro_id){

        $nroBoleta = VentasControlador::ctrObtenerNroBoleta($compro_id);
        echo json_encode($nroBoleta,JSON_UNESCAPED_UNICODE);
    }


    /*===================================================================*/
    //REGISTRAR VENTA
    /*===================================================================*/
    public function ajaxRegistrarVenta($detalle_productos,$nro_boleta,$total_venta, $descripcion_venta, $subtotal, $igv, $id_usuario, $cliente_id, $f_pago , $f_pago_ope, $compro_id, $caja_id, $monto_efectivo , $monto_transfe, $descuento){

        $registroVenta = VentasControlador::ctrRegistrarVenta($detalle_productos,$nro_boleta,$total_venta, $descripcion_venta, $subtotal, $igv, $id_usuario, $cliente_id, $f_pago , $f_pago_ope, $compro_id, $caja_id, $monto_efectivo , $monto_transfe, $descuento);
        echo json_encode($registroVenta);

    }

    /*===================================================================*/
    //LISTAR LAS VENTAS
    /*===================================================================*/
    public function ajaxListarVentas($fechaDesde, $fechaHasta){
        $ventas = VentasControlador::ctrListarVentas($fechaDesde, $fechaHasta);  
        echo json_encode($ventas,JSON_UNESCAPED_UNICODE);
        
    }

     /*==========================================================*/
    //ANULAR LA VENTA
    /*==========================================================*/
    public function ajaxEliminarVenta($nroBoleta)
    {
        $respuesta = VentasControlador::ctrEliminarVenta($nroBoleta);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE); //se usa el json_unescaped por tildes
    }

     /*==========================================================*/
    //LISTAR VENTAS EN DATATABLE  - SEGUNDA VENTANA
    /*==========================================================*/
    public function  GetListVentasFechas($fecha_ini, $fecha_fin)
    {
        $Listventas = VentasControlador::ctrListVentasFechas($fecha_ini, $fecha_fin);
        echo json_encode($Listventas);
    }


    /*==========================================================*/
     //VER DETALLE DE LA VENTA
     /*==========================================================*/
     public function GetDetalleVenta($nro_boleta)
     {
         $detalleVenta = VentasControlador::ctrDetalleVenta($nro_boleta);
         echo json_encode($detalleVenta, JSON_UNESCAPED_UNICODE);
     }

     /*==========================================================*/
    //LISTAR VENTAS A CRREDITO
    /*==========================================================*/
    public function  GetListVentasCredito()
    {
        $Listventas = VentasControlador::ctrListVentasCredito();
        echo json_encode($Listventas);
    }


     /*=========================================================*/
    //REGISTRAR ABONO
    /*=========================================================*/
    public function ajaxRegAbonoVentaCred($data)
    {
        $respuesta = VentasControlador::ctrRegAbonoVentaCred($data);
        echo json_encode($respuesta);
    }

    /*=========================================================*/
    //IMPRESION DE TICKET - RECIBOS DE PAGOS 
    /*=========================================================*/
    public function ajaxImpre_recibos_pagos_VentaCred($data)
    {
        $respuesta = VentasControlador::ctrImpre_recibos_pagos_VentaCred($data);
        echo json_encode($respuesta);
    }
  

}


/*===================================================================*/
//NRO DE BOLETA
/*===================================================================*/
if(isset($_POST["accion"]) && $_POST["accion"] == 1){
	
	$nroBoleta = new AjaxVentas();
    $nroBoleta -> ajaxObtenerNroBoleta($_POST["compro_id"]);
	
}
/*===================================================================*/
//LISTADO DE VENTAS POR RANGO DE FECHAS
/*===================================================================*/
else if(isset($_POST["accion"]) && $_POST["accion"] == 2 ){ // LISTADO DE VENTAS POR RANGO DE FECHAS
   
    $ventas = new AjaxVentas();
    $ventas -> ajaxListarVentas($_POST["fechaDesde"],$_POST["fechaHasta"] );

}
/*===================================================================*/
//ANULAR VENTA
/*===================================================================*/
else if (isset($_POST["accion"]) && $_POST["accion"] == 3) { // ELIMINAR UNA VENTA

    $ventas = new AjaxVentas();
    $ventas->ajaxEliminarVenta($_POST["Boleta"]);

} 
/*===================================================================*/
//LISTAR LAS VENTAS - SEGUNDA VENTANA
/*===================================================================*/
else if (isset($_POST['accion']) && $_POST['accion'] == 4) { //LISTADO DE VENTAS POR RANGO DE FECHAS
    $Listventas = new AjaxVentas();
    $Listventas->GetListVentasFechas($_POST["fecha_ini"],$_POST["fecha_fin"]);
    
} 
/*===================================================================*/
//TRAER DETALLE DE LAS VENTAS
/*===================================================================*/
else if (isset($_POST['accion']) && $_POST['accion'] == 5) { //LISTAR  DETALLE DEL PRESTAMO SUS CUOTAS
    $detalleVenta = new AjaxVentas();
    $detalleVenta->GetDetalleVenta($_POST["nro_boleta"]);

}
else if (isset($_POST['accion']) && $_POST['accion'] == 6) { //LISTADO DE VENTAS  A CREDITOS
    $ListventasCre = new AjaxVentas();
    $ListventasCre->GetListVentasCredito();
    
} 
else if (isset($_POST['accion']) && $_POST['accion'] == 7) { //REGISTRAR ABONO
    $RegAbono = new AjaxVentas();
    $data = array(
        
        "nro_boleta" => $_POST["nro_boleta"],    
        "monto" => $_POST["monto"], 
        "caja_id" => $_POST["caja_id"],   
    );
    $RegAbono->ajaxRegAbonoVentaCred($data);

}
else if (isset($_POST['accion']) && $_POST['accion'] == 8) { //IMPRESION DE TICKET - RECIBOS DE PAGOS 
    $Impre_recibos_pagos = new AjaxVentas();
    $data = array(
        
        "nro_boleta" => $_POST["nro_boleta"],    
       
    );
    $Impre_recibos_pagos->ajaxImpre_recibos_pagos_VentaCred($data);

}
/*===================================================================*/
//LISTAR LAS VENTAS
/*===================================================================*/
else {
     
	if((isset($_POST["arr"]))){
        //$detalle_productos = json_decode($_POST["arr"]);
		
		$registrar = new AjaxVentas();
		$registrar -> ajaxRegistrarVenta($_POST["arr"],$_POST['nro_boleta'],$_POST['total_venta'],$_POST['descripcion_venta'], $_POST['subtotal'], $_POST['igv'], $_POST['id_usuario'], $_POST['cliente_id'], $_POST['f_pago'], $_POST['f_pago_ope'], $_POST['compro_id'], $_POST['caja_id'], $_POST['monto_efectivo'], $_POST['monto_transfe'], $_POST['descuento']);
        //, $_POST['id_talla']);

	}
 }
