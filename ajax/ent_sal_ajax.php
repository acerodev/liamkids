<?php

require_once "../controladores/ent_sal_controlador.php";
require_once "../modelos/ent_sal_modelo.php";

class AjaxEntradaSal{

    /****************************************** */
    //ENTRADAS Y SALIDAS
    /****************************************** */
    public function getEntradaSalidas(){

        $EntradasSalidas = EntradaSalControlador::ctrGetEntradaSalidas();
        echo json_encode($EntradasSalidas);
    }


    /*==========================================================*/
     //MOVIMIENTOS POR PRODUCTO
     /*==========================================================*/
     public function GetMoviPro($codigo_p)
     {
         $Movimientos = EntradaSalControlador::ctrMoviPro($codigo_p);
         echo json_encode($Movimientos, JSON_UNESCAPED_UNICODE);
     }


    /****************************************** */
    //ENTRADAS Y SALIDAS - REPORTE
    /****************************************** */
    public function getEntradaSalidasRpte(){

        $EntradasSalidasRpte = EntradaSalControlador::ctrGetEntradaSalidasRpte();
        echo json_encode($EntradasSalidasRpte);
    }


    /****************************************** */
    //REPORTE UTILIDAD POR PRODUCTOS
    /****************************************** */
    public function getUtilidadProd(){

        $UtilidadProd = EntradaSalControlador::ctrUtilidadProd();
        echo json_encode($UtilidadProd);
    }
}



/****************************************** */
    //ENTRADAS Y SALIDAS
    /****************************************** */
if(isset($_POST['accion']) && $_POST['accion'] == 1){ 

    $EntradasSalidas = new AjaxEntradaSal();
    $EntradasSalidas -> getEntradaSalidas();

}  

/****************************************** */
//MOVIMIENTOS POR PRODUCTO
/****************************************** */
else if (isset($_POST['accion']) && $_POST['accion'] == 2) { //LISTAR  DETALLE DEL PRESTAMO SUS CUOTAS
    $Movimientos = new AjaxEntradaSal();
    $Movimientos->GetMoviPro($_POST["codigo_p"]);

}
/****************************************** */
//REPORTE POR PRODUCTOS - ENTRADA SALIDAS
/****************************************** */
else if(isset($_POST['accion']) && $_POST['accion'] == 3){ 

        $EntradasSalidasRpte = new AjaxEntradaSal();
        $EntradasSalidasRpte -> getEntradaSalidasRpte();
}  
/****************************************** */
//REPORTE UTILIDAD POR PRODUCTOS
/****************************************** */
else if(isset($_POST['accion']) && $_POST['accion'] == 4){ 

    $UtilidadProd = new AjaxEntradaSal();
    $UtilidadProd -> getUtilidadProd();
}  


