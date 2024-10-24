<?php

require_once "../controladores/rpt_compras_controlador.php";
require_once "../modelos/rpt_compras_modelo.php";

class AjaxRpt_Compras{


     
     /*==========================================================*/
    //LISTAR  COMPRAS DEL DIA
    /*==========================================================*/
    public function  GetListComprasFechas($fecha_ini, $fecha_fin)
    {
        $ListCompras = Rpt_ComprasControlador::ctrListComprasFechas($fecha_ini, $fecha_fin);
        echo json_encode($ListCompras);
    }

    /*===================================================================*/
    //LISTAR AÑOS EN COMBOBOX 
    /*===================================================================*/
    public function ListarSelectCompras()
    {
        $SelectAnio = Rpt_ComprasControlador::ctrListarSelectCompras();
        echo json_encode($SelectAnio, JSON_UNESCAPED_UNICODE);
    }

     /*==========================================================*/
    //LISTAR  COMPRAS DEL MES Y AÑO
    /*==========================================================*/
    public function  GetListComprasMesyAnio($mes, $anio)
    {
        $ListComprasMesAnio = Rpt_ComprasControlador::ctrListComprasMesyAnio($mes, $anio);
        echo json_encode($ListComprasMesAnio);
    }


    
     /*==========================================================*/
    //LISTAR  COMPRAS POR AÑO
    /*==========================================================*/
    public function  GetListComprasPorAnio( $anio_a)
    {
        $ListComprasPorAnio = Rpt_ComprasControlador::ctrListComprasPorAnio($anio_a);
        echo json_encode($ListComprasPorAnio);
    }


     /*==========================================================*/
    //COMPARATIVO ANUAL
    /*==========================================================*/
    public function  GetListComprasCompAnual()
    {
        $ListComprasCompAnual = Rpt_ComprasControlador::ctrListComprasCompAnual();
        echo json_encode($ListComprasCompAnual);
    }

      /*==========================================================*/
    //PIVOT COMPRAS
    /*==========================================================*/
    public function  GetComprasPivot()
    {
        $ComprasPivot = Rpt_ComprasControlador::ctrComprasPivot();
        echo json_encode($ComprasPivot);
    }

       /*===================================================================*/
    //LISTAR USUARIOS EN SELECT
    /*===================================================================*/
    public function ListarSelectUsuario()
    {
        $SelectUsua = Rpt_ComprasControlador::ctrListarSelectUsuario();
        echo json_encode($SelectUsua, JSON_UNESCAPED_UNICODE);
    }


      /*==========================================================*/
    //REPORTE RECORD USUARIO
    /*==========================================================*/
    public function  GetListComprasRecordUsuario($usu, $anio_usu)
    {
        $RecordUsuario = Rpt_ComprasControlador::ctrListComprasRecordUsuario($usu, $anio_usu);
        echo json_encode($RecordUsuario);
    }

}


/*===================================================================*/
//LISTAR  COMPRAS DEL DIA
/*===================================================================*/
if (isset($_POST['accion']) && $_POST['accion'] == 1) { //LISTAR  COMPRAS DEL DIA
    $ListCompras = new AjaxRpt_Compras();
    $ListCompras->GetListComprasFechas($_POST["fecha_ini"],$_POST["fecha_fin"]);
    

} 
else if (isset($_POST['accion']) && $_POST['accion'] == 2) { //LISTAR AÑOS EN SELECT
    $SelectAnio = new AjaxRpt_Compras();
    $SelectAnio->ListarSelectCompras();

} 
else if (isset($_POST['accion']) && $_POST['accion'] == 3) { //LISTAR  COMPRAS POR MES Y AÑO
    $ListComprasMesAnio = new AjaxRpt_Compras();
    $ListComprasMesAnio->GetListComprasMesyAnio($_POST["mes"],$_POST["anio"]);
    

}
else if (isset($_POST['accion']) && $_POST['accion'] == 4) { //LISTAR  COMPRAS POR AÑO
    $ListComprasPorAnio = new AjaxRpt_Compras();
    $ListComprasPorAnio->GetListComprasPorAnio($_POST["anio_a"]);
    

} 
else if (isset($_POST['accion']) && $_POST['accion'] == 5) { //COMPARATIVO ANUAL
    $ListComprasCompAnual = new AjaxRpt_Compras();
    $ListComprasCompAnual->GetListComprasCompAnual();

}
 else if (isset($_POST['accion']) && $_POST['accion'] == 6) { //PIVOT COMPRAS
    $ComprasPivot = new AjaxRpt_Compras();
    $ComprasPivot->GetComprasPivot();
    
}
else if (isset($_POST['accion']) && $_POST['accion'] == 7) { //LISTAR USUARIOS EN SELECT
    $SelectUsua = new AjaxRpt_Compras();
    $SelectUsua->ListarSelectUsuario();

}
else if (isset($_POST['accion']) && $_POST['accion'] == 8) { //REPORTE RECORD USUARIO
    $RecordUsuario = new AjaxRpt_Compras();
    $RecordUsuario->GetListComprasRecordUsuario($_POST["usu"],$_POST["anio_usu"]);
    

}