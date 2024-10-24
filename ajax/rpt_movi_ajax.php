<?php

require_once "../controladores/rpt_movi_controlador.php";
require_once "../modelos/rpt_movi_modelo.php";

class AjaxRpt_Movi{

    /****************************************** */
    //REPORTE DE MOVIMIENTOS POR FECHAS
    /****************************************** */
    public function getRpte_movi_fechas($movi, $fecha_ini, $fecha_fin){

        $Rpte_movi_fechas = Rpt_MoviControlador::ctrRpte_movi_fechas($movi, $fecha_ini, $fecha_fin);
        echo json_encode($Rpte_movi_fechas);
    }

}




/****************************************** */
    //REPORTE DE MOVIMIENTOS POR FECHAS
    /****************************************** */
    if(isset($_POST['accion']) && $_POST['accion'] == 1){ 

        $Rpte_movi_fechas = new AjaxRpt_Movi();
        $Rpte_movi_fechas -> getRpte_movi_fechas($_POST["movi"], $_POST["fecha_ini"],$_POST["fecha_fin"]);
    
    }  


