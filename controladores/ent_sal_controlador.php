<?php

class EntradaSalControlador{

    static public function ctrGetEntradaSalidas(){

        $EntradasSalidas = EntradaSaldModelo::mdlGetEntradaSalidas();
        return $EntradasSalidas;
    }


     /*==========================================================*/
    //MOVIMIENTOS POR PRODUCTO
    /*==========================================================*/
    static public function ctrMoviPro($codigo_p){

        $Movimientos = EntradaSaldModelo::mdlMoviPro($codigo_p);
        return $Movimientos;
    }


    /****************************************** */
    //ENTRADAS Y SALIDAS - REPORTE
    /****************************************** */
    static public function ctrGetEntradaSalidasRpte(){

        $EntradasSalidasRpte = EntradaSaldModelo::mdlGetEntradaSalidasRpte();
        return $EntradasSalidasRpte;
    }


    /****************************************** */
    //REPORTE UTILIDAD POR PRODUCTOS
    /****************************************** */
    static public function ctrUtilidadProd(){

        $UtilidadProd = EntradaSaldModelo::mdlUtilidadProd();
        return $UtilidadProd;
    }
}