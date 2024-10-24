<?php

require_once "conexion.php";

class Rpt_MoviModelo{

     /*=============================================
    REPORTE DE MOVIMIENTOS POR FECHAS  
    =============================================*/
    static public function mdlRpte_movi_fechas($movi, $fecha_ini, $fecha_fin)
    {
        $stmt = Conexion::conectar()->prepare('call SP_REPORTE_MOVIMIENTOS_FECHAS(:movi, :fecha_ini, :fecha_fin)');
        $stmt->bindParam(":movi", $movi, PDO::PARAM_STR);
        $stmt->bindParam(":fecha_ini", $fecha_ini, PDO::PARAM_STR);
        $stmt->bindParam(":fecha_fin", $fecha_fin, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }


}