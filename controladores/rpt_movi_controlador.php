<?php

class Rpt_MoviControlador{

        /*==========================================================*/
    //REPORTE DE MOVIMIENTOS POR FECHAS  
    /*==========================================================*/
    static public function ctrRpte_movi_fechas($movi, $fecha_ini,$fecha_fin)
    {
        $Rpte_movi_fechas =  Rpt_MoviModelo::mdlRpte_movi_fechas($movi, $fecha_ini,$fecha_fin);
        return $Rpte_movi_fechas;
        //var_dump($Listventas);
    }


}

