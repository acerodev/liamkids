<?php

require_once "../controladores/comprobantes_controlador.php";
require_once "../modelos/comprobantes_modelo.php";

class AjaxComprobantes
{

    /*===================================================================*/
    //LISTAR EN DATATABLE COMPROBANTES
    /*===================================================================*/
    public function  GetListarComprobantes()
    {
        $GetCompro = ComprobantesControlador::ctrListarComprobantes();
        echo json_encode($GetCompro);
    }

    /*===================================================================*/
    //LISTAR EN SELECT COMPROBANTES
    /*===================================================================*/
    public function ListarSelectCompro()
    {
        $Compro = ComprobantesControlador::ctrListarSelectCompro();
        echo json_encode($Compro);
    }

    /*===================================================================*/
    //REGISTRAR COMPROBANTES
    /*===================================================================*/
    public function GetRegistraComprobantes($data)
    {    
        $RegistraComprobantes = ComprobantesControlador::ctrRegistraComprobantes($data);
        echo json_encode($RegistraComprobantes);
    }

    /*===================================================================*/
    //ACTUALIZAR COMPROBANTES
    /*===================================================================*/
    public function GetUpdateComprobantes($data)
    {    
        $table = "comprobante"; //TABLA
        $id = $_POST["compro_id"]; 
        $nameId = "compro_id"; //CAMPO DE LA BASE
        $UpdateComprobantes = ComprobantesControlador::ctrUpdateComprobantes($table, $data, $id, $nameId);
        echo json_encode($UpdateComprobantes);
    }

     /*===================================================================*/
    //ELIMINAR COMPROBANTES
    /*===================================================================*/
    public function ajaxEliminarComprobantes(){
        $table = "comprobante"; //TABLA
        $id = $_POST["compro_id"]; 
        $nameId = "compro_id"; //CAMPO DE LA BASE
        $eliminarComprobantes = ComprobantesControlador::ctrEliminarComprobantes($table, $id, $nameId);
        echo json_encode($eliminarComprobantes);
    }
}


if (isset($_POST['accion']) && $_POST['accion'] == 1) { //LISTAR CLIENTE EN DATATABLE DE CLIENTE
    $GetCompro = new AjaxComprobantes();
    $GetCompro->GetListarComprobantes();

} 
/*=============================================
    REGISTRAR COMPROBANTES
=============================================*/
else if (isset($_POST['accion']) && $_POST['accion'] == 2) { 
    $RegistraComprobantes = new AjaxComprobantes();
    $data = array(
        "compro_tipo" => $_POST["compro_tipo"],
        "compro_serie" => $_POST["compro_serie"],
        "compro_numero" => $_POST["compro_numero"]
    );
    $RegistraComprobantes->GetRegistraComprobantes($data);
} 

/*=============================================
    ACTUALIZAR COMPROBANTES
=============================================*/
else if (isset($_POST['accion']) && $_POST['accion'] == 3) { 
    $UpdateComprobantes = new AjaxComprobantes();
    $data = array(
        "compro_id" => $_POST["compro_id"],
        "compro_tipo" => $_POST["compro_tipo"],
        "compro_serie" => $_POST["compro_serie"],
        "compro_numero" => $_POST["compro_numero"],
        "compro_estado" => $_POST["compro_estado"]
    );
    $UpdateComprobantes->GetUpdateComprobantes($data);
} 
/*===================================================================*/
//ELIMINAR COMPROBANTES
/*===================================================================*/
else if (isset($_POST['accion']) && $_POST['accion'] == 4) {

    $eliminarComprobantes = new AjaxComprobantes();
    $eliminarComprobantes -> ajaxEliminarComprobantes();


}

else {
    $Compro = new AjaxComprobantes();
    $Compro->ListarSelectCompro();
}