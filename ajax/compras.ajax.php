<?php

require_once "../controladores/compras_controlador.php";
require_once "../modelos/compras_modelo.php";

class AjaxCompras{
    public $cliente_id;
    public $codigo_producto;

    /*===================================================================*/
    //NRO DE BOLETA
    /*===================================================================*/
    public function ajaxObtenerNroBoleta($compro_id){

        $nroBoleta = ComprasControlador::ctrObtenerNroBoleta($compro_id);
        echo json_encode($nroBoleta,JSON_UNESCAPED_UNICODE);
    }


    /*===================================================================*/
    //REGISTRAR COMPRA
    /*===================================================================*/
    public function ajaxRegistrarCompra($datos, $nro_compra, $cliente_id, $compro_id, $serie_comprobante, $nro_comprobante, $fecha_comprobante, $ope_gravada, $igv,  $total_compra,  $id_usuario, $f_pago , $f_pago_ope, $caja_id){

        $registroCompra = ComprasControlador::ctrRegistrarCompra($datos, $nro_compra, $cliente_id,$compro_id, $serie_comprobante, $nro_comprobante, $fecha_comprobante, $ope_gravada, $igv,  $total_compra,  $id_usuario, $f_pago , $f_pago_ope, $caja_id);
        echo json_encode($registroCompra,JSON_UNESCAPED_UNICODE);

    }

    /*===================================================================*/
    //LISTAR LAS COMPRA
    /*===================================================================*/
    public function ajaxListarVentas($fechaDesde, $fechaHasta){
        $ventas = ComprasControlador::ctrListarVentas($fechaDesde, $fechaHasta);  
        echo json_encode($ventas,JSON_UNESCAPED_UNICODE);
        
    }

     /*==========================================================*/
    //ANULAR LA COMPRA
    /*==========================================================*/
    public function ajaxEliminarCompra($nro_compra)
    {
        $respuesta = ComprasControlador::ctrEliminarCompra($nro_compra);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE); //se usa el json_unescaped por tildes
    }

     /*==========================================================*/
    //LISTAR COMPRA EN DATATABLE  - SEGUNDA VENTANA
    /*==========================================================*/
    public function  GetListVentasFechas($fecha_ini, $fecha_fin)
    {
        $Listventas = ComprasControlador::ctrListVentasFechas($fecha_ini, $fecha_fin);
        echo json_encode($Listventas);
    }


    /*==========================================================*/
     //VER DETALLE DE LA COMPRA
     /*==========================================================*/
     public function GetDetalleVenta($nro_compra)
     {
         $detalleVenta = ComprasControlador::ctrDetalleVenta($nro_compra);
         echo json_encode($detalleVenta, JSON_UNESCAPED_UNICODE);
     }

     /*===================================================================
    LISTAR NOMBRE DE PRODUCTOS PARA INPUT DE AUTO COMPLETADO
    ====================================================================*/
    public function ajaxListarNombreProductos(){

        $NombreProductos = ComprasControlador::ctrListarNombreProductos();

        echo json_encode($NombreProductos);
    }

    /*===================================================================
    BUSCAR PRODUCTO POR SU CODIGO DE BARRAS
    ====================================================================*/
    public function ajaxGetDatosProducto(){
        
        $producto = ComprasControlador::ctrGetDatosProducto($this->codigo_producto);

        echo json_encode($producto);
    }
  

}


/*===================================================================*/
//NRO DE BOLETA
/*===================================================================*/
if(isset($_POST["accion"]) && $_POST["accion"] == 1){
	
	$nroBoleta = new AjaxCompras();
    $nroBoleta -> ajaxObtenerNroBoleta($_POST["compro_id"]);
	
}
/*===================================================================*/
//REGISTRAR COMPRA
/*===================================================================*/
else if(isset($_POST["accion"]) && $_POST["accion"] == 2 ){ // LISTADO DE COMPRA POR RANGO DE FECHAS
   
    $ventas = new AjaxCompras();
    $ventas -> ajaxListarVentas($_POST["fechaDesde"],$_POST["fechaHasta"] );

}
/*===================================================================*/
//ANULAR COMPRA
/*===================================================================*/
else if (isset($_POST["accion"]) && $_POST["accion"] == 3) { // ELIMINAR UNA VENTA

    $compra = new AjaxCompras();
    $compra->ajaxEliminarCompra($_POST["nro_compra"]);

} 
/*===================================================================*/
//LISTAR LAS COMPRA - SEGUNDA VENTANA
/*===================================================================*/
else if (isset($_POST['accion']) && $_POST['accion'] == 4) { //LISTAR COMPRA POR RANGO DE FECHAS
    $Listventas = new AjaxCompras();
    $Listventas->GetListVentasFechas($_POST["fecha_ini"],$_POST["fecha_fin"]);
    
} 
/*===================================================================*/
//TRAER DETALLE DE LAS COMPRA
/*===================================================================*/
else if (isset($_POST['accion']) && $_POST['accion'] == 5) { //LISTAR  DETALLE DE COMPRAS
    $detalleVenta = new AjaxCompras();
    $detalleVenta->GetDetalleVenta($_POST["nro_compra"]);

}
/*===================================================================
    // TRAER LISTADO DE PRODUCTOS PARA EL AUTOCOMPLETE
====================================================================*/
else if(isset($_POST["accion"]) && $_POST["accion"] == 6){  

    $nombreProductos = new AjaxCompras();
    $nombreProductos -> ajaxListarNombreProductos();

}
/*===================================================================
   OBTENER DATOS DE UN PRODUCTO POR SU CODIGO
====================================================================*/
else if(isset($_POST["accion"]) && $_POST["accion"] == 7){ // 

    $listaProducto = new AjaxCompras();
    $listaProducto -> codigo_producto = $_POST["codigo_producto"];   
    $listaProducto -> ajaxGetDatosProducto();
	
}
/*===================================================================*/
//GUARDAR LAS COMPRA
/*===================================================================*/
else {
     
	if((isset($_POST["arr"]))){
		
		$registrar = new AjaxCompras();
        
		$registrar -> ajaxRegistrarCompra($_POST["arr"],$_POST['nro_compra'],$_POST['cliente_id'], $_POST['compro_id'], $_POST['serie_comprobante'], $_POST['nro_comprobante'], $_POST['fecha_comprobante'], $_POST['ope_gravada'],  $_POST['igv'], 
        $_POST['total_compra'],  $_POST['id_usuario'],  $_POST['f_pago'], $_POST['f_pago_ope'], $_POST['caja_id']); 
        
        //, $_POST['id_talla']);

	}
 }
