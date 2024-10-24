<?php

require_once "../controladores/caja_controlador.php";
require_once "../modelos/caja_modelo.php";
//require_once("../modelos/email_caja.php");
//$CierreCorreo2 = new Email();

class AjaxCaja
{

    public $caja_descripcion;
    public $caja_monto_inicial;
    public        $caja_monto_ingreso;
    public        $caja__monto_egreso;
    public        $caja_monto_total;
    public       $caja_count_ingreso;
    public        $caja_count_egreso;
    public        $caja_monto_ing_directo;
    public        $caja_monto_egre_directo;
    public $caja_abonos;
    public $caja_count_abonos;



    /*===================================================================*/
    //LISTAR CAJA EN DATATABLE CON PROCEDURE
    /*===================================================================*/
    public function  ListarAperturaCaja()
    {
        $ListarCaja = CajaControlador::ctrListarAperturaCaja();
        echo json_encode($ListarCaja);
    }

    /*===================================================================*/
    //REGISTRAR CAJA
    /*===================================================================*/
    public function ajaxRegistrarCaja()
    {
        $RegCaja = CajaControlador::ctrRegistrarCaja(
            $this->caja_descripcion,
            $this->caja_monto_inicial

        );
        echo json_encode($RegCaja);
    }


    /*===================================================================*/
    //TRAER DATOS FINALES PARA CERRAR LA CAJA
    /*===================================================================*/
    public function ajaxObtenerDataCierreCaja(){
        $DataCierreCaja = CajaControlador::ctrObtenerDataCierreCaja();
        echo json_encode($DataCierreCaja, JSON_UNESCAPED_UNICODE);
    }


    /*===================================================================*/
    //REGISTRAR CERRAR LA CAJA
    /*===================================================================*/
    public function ajaxCerrarCaja()
    {
        $CerrarCaja = CajaControlador::ctrCerrarCaja(
            $this->caja_monto_ingreso,
            $this->caja_count_ingreso,
            $this->caja__monto_egreso,
            $this->caja_count_egreso,
            $this->caja_monto_total,
            $this->caja_monto_ing_directo,
            $this->caja_monto_egre_directo,
            $this->caja_abonos,
            $this->caja_count_abonos
        );
        echo json_encode($CerrarCaja);
    }


    /*===================================================================*/
    // ESTADO DE LA CAJA PARA PROCEDER A REALIZAR UN PRESTAMO
    /*===================================================================*/
    public function ajaxObtenerDataEstadoCaja(){
        $DataEstadoCaja = CajaControlador::ctrObtenerDataEstadoCaja();
        echo json_encode($DataEstadoCaja, JSON_UNESCAPED_UNICODE);
    }


    /*===================================================================*/
     //OBTENER   ID DE LA CAJA
    /*===================================================================*/
    public function ajaxObtenerIDCaja(){
        $traerIdCaja = CajaControlador::ctrObtenerIDCaja();
        echo json_encode($traerIdCaja, JSON_UNESCAPED_UNICODE);
    }


    /*===================================================================*/
    //VER  PRESTAMO POR CAJA ID
    /*===================================================================*/
    public function ajaxVentasPorCajaID($caja_id)
    {
        $VentasporCajaID = CajaControlador::ctrVentasPorCajaID($caja_id);
        echo json_encode($VentasporCajaID, JSON_UNESCAPED_UNICODE);
    }

     /*===================================================================*/
    //VER  MOVIMIENTOS POR CAJA ID
    /*===================================================================*/
    public function ajaxMovimientosPorCajaID($caja_id)
    {
        $MovimientosporCajaID = CajaControlador::ctrMovimientosPorCajaID($caja_id);
        echo json_encode($MovimientosporCajaID, JSON_UNESCAPED_UNICODE);
    }


}


if (isset($_POST['accion']) && $_POST['accion'] == 1) { //LISTAR DATOS 
    $ListarCaja = new AjaxCaja();
    $ListarCaja->ListarAperturaCaja();


} else if (isset($_POST['accion']) && $_POST['accion'] == 2) { //PARA REGISTRAR LA CAJA
    $RegCaja = new AjaxCaja();
    $RegCaja->caja_descripcion = $_POST["caja_descripcion"];
    $RegCaja->caja_monto_inicial = $_POST["caja_monto_inicial"];
    $RegCaja->ajaxRegistrarCaja();


} else if (isset($_POST['accion']) && $_POST['accion'] == 3) {   //TRAER DATOS DEL CIERRE DE CAJA
    $DataCierreCaja = new AjaxCaja();
    $DataCierreCaja->ajaxObtenerDataCierreCaja(); 


} else if (isset($_POST['accion']) && $_POST['accion'] == 4) { //PARA REGISTRAR -  CERRAR LA CAJA
    $CerrarCaja = new AjaxCaja();
    $CerrarCaja->caja_monto_ingreso = $_POST["caja_monto_ingreso"];
    $CerrarCaja->caja_count_ingreso = $_POST["caja_count_ingreso"];
    $CerrarCaja->caja__monto_egreso = $_POST["caja__monto_egreso"];
    $CerrarCaja->caja_count_egreso = $_POST["caja_count_egreso"];
    $CerrarCaja->caja_monto_total = $_POST["caja_monto_total"];
    $CerrarCaja->caja_monto_ing_directo = $_POST["caja_monto_ing_directo"];
    $CerrarCaja->caja_monto_egre_directo = $_POST["caja_monto_egre_directo"];

    $CerrarCaja->caja_abonos = $_POST["caja_abonos"];
    $CerrarCaja->caja_count_abonos = $_POST["caja_count_abonos"];
  
    $CerrarCaja->ajaxCerrarCaja();


} else if (isset($_POST['accion']) && $_POST['accion'] == 5) {    // ESTADO DE LA CAJA PARA PROCEDER A REALIZAR UNA VENTA
    $DataEstadoCaja = new AjaxCaja();
    $DataEstadoCaja->ajaxObtenerDataEstadoCaja(); 

} else if (isset($_POST['accion']) && $_POST['accion'] == 6) {   //OBTENER   ID DE LA CAJA
    $traerIdCaja = new AjaxCaja();
    $traerIdCaja->ajaxObtenerIDCaja(); //creamos el metodo

} else if (isset($_POST['accion']) && $_POST['accion'] == 7) {       ///VER  VENTAS POR CAJA ID
    $VentasporCajaID = new AjaxCaja();
    $VentasporCajaID->ajaxVentasPorCajaID($_POST["caja_id"]);


}else if (isset($_POST['accion']) && $_POST['accion'] == 8) {       ///VER  MOVIMIENTOS POR CAJA ID
    $MovimientosporCajaID = new AjaxCaja();
    $MovimientosporCajaID->ajaxMovimientosPorCajaID($_POST["caja_id"]);


}

