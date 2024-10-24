<?php

require_once "../controladores/cotizacion.controlador.php";
require_once "../modelos/cotizacion.modelo.php";

class  AjaxCotizacion{

    /*===================================================================*/
    //NRO DE BOLETA
    /*===================================================================*/
    public function ajaxObtenerNroBoleta($compro_id){

        $nroBoleta = CotizacionControlador::ctrObtenerNroBoleta($compro_id);
        echo json_encode($nroBoleta,JSON_UNESCAPED_UNICODE);
    }


    /*===================================================================*/
    //REGISTRAR COTIZACION
    /*===================================================================*/
    public function ajaxRegistrarCoti($datos,$nro_boleta,$total_venta, $descripcion_venta, $subtotal, $igv, $id_usuario, $cliente_id, $f_pago , $f_pago_ope, $compro_id,  $atiende, $validez){

        $registroCoti = CotizacionControlador::ctrRegistrarCoti($datos,$nro_boleta,$total_venta, $descripcion_venta, $subtotal, $igv, $id_usuario, $cliente_id, $f_pago , $f_pago_ope, $compro_id,  $atiende, $validez);
        echo json_encode($registroCoti,JSON_UNESCAPED_UNICODE);

    }

    /*===================================================================*/
    //LISTAR LAS COTIZACION
    /*===================================================================*/
    public function ajaxListarVentas($fechaDesde, $fechaHasta){
        $ventas = CotizacionControlador::ctrListarVentas($fechaDesde, $fechaHasta);  
        echo json_encode($ventas,JSON_UNESCAPED_UNICODE);
        
    }

     /*==========================================================*/
    //ANULAR LA COTIZACION
    /*==========================================================*/
    public function ajaxEliminarVenta($nroBoleta)
    {
        $respuesta = CotizacionControlador::ctrEliminarVenta($nroBoleta);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE); //se usa el json_unescaped por tildes
    }

     /*==========================================================*/
    //LISTAR COTIZACION EN DATATABLE  - SEGUNDA VENTANA
    /*==========================================================*/
    public function  GetListCotiFechas($fecha_ini, $fecha_fin)
    {
        $ListCoti = CotizacionControlador::ctrListCotiFechas($fecha_ini, $fecha_fin);
        echo json_encode($ListCoti);
    }


    /*==========================================================*/
     //VER DETALLE DE LA COTIZACION
     /*==========================================================*/
     public function GetDetalleVenta($nro_boleta)
     {
         $detalleVenta = CotizacionControlador::ctrDetalleVenta($nro_boleta);
         echo json_encode($detalleVenta, JSON_UNESCAPED_UNICODE);
     }
  

}


/*===================================================================*/
//NRO DE BOLETA
/*===================================================================*/
if(isset($_POST["accion"]) && $_POST["accion"] == 1){
	
	$nroBoleta = new AjaxCotizacion();
    $nroBoleta -> ajaxObtenerNroBoleta($_POST["compro_id"]);
	
}
/*===================================================================*/
//lISTADO DE  COTIZACION
/*===================================================================*/
else if(isset($_POST["accion"]) && $_POST["accion"] == 2 ){ // LISTADO DE COTIZACION POR RANGO DE FECHAS NO SE USA
   
    $ventas = new AjaxCotizacion();
    $ventas -> ajaxListarVentas($_POST["fechaDesde"],$_POST["fechaHasta"] );

}
/*===================================================================*/
//ANULAR COTIZACION
/*===================================================================*/
else if (isset($_POST["accion"]) && $_POST["accion"] == 3) { // ELIMINAR UNA COTIZACION

    $ventas = new AjaxCotizacion();
    $ventas->ajaxEliminarVenta($_POST["Boleta"]);

} 
/*===================================================================*/
//LISTAR LAS COTIZACION - SEGUNDA VENTANA
/*===================================================================*/
else if (isset($_POST['accion']) && $_POST['accion'] == 4) { //LISTAR  COTIZACION POR FECHAS
    $ListCoti = new AjaxCotizacion();
    $ListCoti->GetListCotiFechas($_POST["fecha_ini"],$_POST["fecha_fin"]);
    
} 
/*===================================================================*/
//TRAER DETALLE DE LAS COTIZACION
/*===================================================================*/
else if (isset($_POST['accion']) && $_POST['accion'] == 5) { //LISTAR  DETALLE DE COTIZACION
    $detalleVenta = new AjaxCotizacion();
    $detalleVenta->GetDetalleVenta($_POST["nro_boleta"]);

}
/*===================================================================*/
//REGISTRAR LA COTIZACION
/*===================================================================*/
else {
     
	if((isset($_POST["arr"]))){
		
		$registrar = new AjaxCotizacion();
		$registrar -> ajaxRegistrarCoti($_POST["arr"], $_POST['nro_boleta'],$_POST['total_venta'],$_POST['descripcion_venta'], $_POST['subtotal'], $_POST['igv'], $_POST['id_usuario'], $_POST['cliente_id'], 
        $_POST['f_pago'], $_POST['f_pago_ope'], $_POST['compro_id'],  $_POST['atiende'], $_POST['validez']);
        //, $_POST['id_talla']);

	}
 }
