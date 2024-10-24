<?php

require_once "conexion.php";

class EntradaSaldModelo{

    static public function mdlGetEntradaSalidas(){
        $stmt = Conexion::conectar()->prepare('call SP_KARDEX_ENT_SAL()');
        $stmt->execute();
        return $stmt->fetchAll();  
    }



    /*==========================================================*/
    //MOVIMIENTOS POR PRODUCTO
    /*==========================================================*/
    static public function mdlMoviPro($codigo_p){
        $stmt = Conexion::conectar()->prepare('call prc_movimientos_por_producto_kardex(:codigo_p)');
        $stmt -> bindParam(":codigo_p", $codigo_p,PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    /****************************************** */
    //ENTRADAS Y SALIDAS - REPORTE
    /****************************************** */
    static public function mdlGetEntradaSalidasRpte(){
        $stmt = Conexion::conectar()->prepare('call SP_KARDEX_RPTE_ENT_SAL()');
        $stmt->execute();
        return $stmt->fetchAll();  
    }


    /****************************************** */
    //REPORTE UTILIDAD POR PRODUCTOS
    /****************************************** */
    static public function mdlUtilidadProd(){
        $stmt = Conexion::conectar()->prepare('call SP_REPORTE_UTILIDAD_PRODUCTOS()');
        $stmt->execute();
        return $stmt->fetchAll();  
    }

}