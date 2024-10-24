<?php

require_once "../controladores/rpt_ventas_controlador.php";
require_once "../modelos/rpt_ventas_modelo.php";

class AjaxRpt_Ventas{

    
     /*==========================================================*/
    //LISTAR  VENTAS DEL DIA
    /*==========================================================*/
    public function  GetListVentasFechas($fecha_ini, $fecha_fin)
    {
        $Listventas = Rpt_VentasControlador::ctrListVentasFechas($fecha_ini, $fecha_fin);
        echo json_encode($Listventas);
    }

     /*==========================================================*/
    //LISTAR  VENTAS DE CREDITO
    /*==========================================================*/
    public function  GetListVentasCreditoFechas($fecha_ini, $fecha_fin)
    {
        $respuesta = Rpt_VentasControlador::ctrListVentasCreditoFechas($fecha_ini, $fecha_fin);
        echo json_encode($respuesta);
    }


    /*===================================================================*/
    //LISTAR AÑOS EN COMBOBOX 
    /*===================================================================*/
    public function ListarSelectAnio()
    {
        $SelectAnio = Rpt_VentasControlador::ctrListarSelectAnio();
        echo json_encode($SelectAnio, JSON_UNESCAPED_UNICODE);
    }

     /*==========================================================*/
    //LISTAR  VENTAS DEL MES Y AÑO
    /*==========================================================*/
    public function  GetListVentasMesyAnio($mes, $anio)
    {
        $ListventasMesAnio = Rpt_VentasControlador::ctrListVentasMesyAnio($mes, $anio);
        echo json_encode($ListventasMesAnio);
    }
    

     /*==========================================================*/
    //LISTAR  VENTAS POR AÑO
    /*==========================================================*/
    public function  GetListVentasPorAnio( $anio_a)
    {
        $ListventasPorAnio = Rpt_VentasControlador::ctrListVentasPorAnio($anio_a);
        echo json_encode($ListventasPorAnio);
    }

     /*==========================================================*/
    //COMPARATIVO ANUAL
    /*==========================================================*/
    public function  GetListVentasCompAnual()
    {
        $ListventasCompAnual = Rpt_VentasControlador::ctrListVentasCompAnual();
        echo json_encode($ListventasCompAnual);
    }


     /*==========================================================*/
    //PIVOT VENTAS
    /*==========================================================*/
    public function  GetVentasPivot()
    {
        $VentasPivot = Rpt_VentasControlador::ctrVentasPivot();
        echo json_encode($VentasPivot);
    }


     /*===================================================================*/
    //LISTAR USUARIOS EN SELECT
    /*===================================================================*/
    public function ListarSelectUsuario()
    {
        $SelectUsua = Rpt_VentasControlador::ctrListarSelectUsuario();
        echo json_encode($SelectUsua, JSON_UNESCAPED_UNICODE);
    }


     /*==========================================================*/
    //REPORTE RECORD USUARIO
    /*==========================================================*/
    public function  GetListVentasRecordUsuario($usu, $anio_usu)
    {
        $RecordUsuario = Rpt_VentasControlador::ctrListVentasRecordUsuario($usu, $anio_usu);
        echo json_encode($RecordUsuario);
    }

      /*==========================================================*/
    //LISTAR GANANCIAS DE VENTAS POR FECHA
    /*==========================================================*/
    public function  GetGananciasVentasFechas($fecha_ini, $fecha_fin)
    {
        $respuesta = Rpt_VentasControlador::ctrGananciasVentasFechas($fecha_ini, $fecha_fin);
        echo json_encode($respuesta);
    }

      /*==========================================================*/
    //LISTAR GANANCIAS DE VENTAS POR FECHA - CREDITO
    /*==========================================================*/
    public function  GetGananciasVentasFechas_Credito($fecha_ini, $fecha_fin)
    {
        $respuesta = Rpt_VentasControlador::ctrGananciasVentasFechas_Credito($fecha_ini, $fecha_fin);
        echo json_encode($respuesta);
    }

     /*==========================================================*/
    //BUSCAR VENTAS - CREDITO -  POR MES Y AÑO
    /*==========================================================*/
    public function  GetListVentas_Credito_MesyAnio($mes, $anio)
    {
        $respuesta = Rpt_VentasControlador::ctrListVentas_Credito_MesyAnio($mes, $anio);
        echo json_encode($respuesta);
    }

     /*==========================================================*/
    //LISTAR  VENTAS POR AÑO - CREDITO
    /*==========================================================*/
    public function  GetListVentas_Credito_PorAnio( $anio_a)
    {
        $respuesta = Rpt_VentasControlador::ctrListVentas_Credito_PorAnio($anio_a);
        echo json_encode($respuesta);
    }

      /*==========================================================*/
    //COMPARATIVO ANUAL - CREDITOS
    /*==========================================================*/
    public function  GetListVentas_Credito_CompAnual()
    {
        $respuesta = Rpt_VentasControlador::ctrListVentas_Credito_CompAnual();
        echo json_encode($respuesta);
    }




}



/*===================================================================*/
//LISTAR  VENTAS DEL DIA
/*===================================================================*/
 if (isset($_POST['accion']) && $_POST['accion'] == 1) { //LISTAR  VENTAS DEL DIA
    $Listventas = new AjaxRpt_Ventas();
    $Listventas->GetListVentasFechas($_POST["fecha_ini"],$_POST["fecha_fin"]);
    

} else if (isset($_POST['accion']) && $_POST['accion'] == 2) { //LISTAR AÑOS EN SELECT
    $SelectAnio = new AjaxRpt_Ventas();
    $SelectAnio->ListarSelectAnio();

} else if (isset($_POST['accion']) && $_POST['accion'] == 3) { //LISTAR  VENTAS DEL DIA
    $ListventasMesAnio = new AjaxRpt_Ventas();
    $ListventasMesAnio->GetListVentasMesyAnio($_POST["mes"],$_POST["anio"]);
    

} else if (isset($_POST['accion']) && $_POST['accion'] == 4) { //LISTAR  VENTAS POR AÑO
    $ListventasPorAnio = new AjaxRpt_Ventas();
    $ListventasPorAnio->GetListVentasPorAnio($_POST["anio_a"]);
    

}
else if (isset($_POST['accion']) && $_POST['accion'] == 5) { //COMPARATIVO ANUAL
    $ListventasCompAnual = new AjaxRpt_Ventas();
    $ListventasCompAnual->GetListVentasCompAnual();
    

}
else if (isset($_POST['accion']) && $_POST['accion'] == 6) { //PIVOT VENTAS
    $VentasPivot = new AjaxRpt_Ventas();
    $VentasPivot->GetVentasPivot();
    

}
else if (isset($_POST['accion']) && $_POST['accion'] == 7) { //LISTAR USUARIOS EN SELECT
    $SelectUsua = new AjaxRpt_Ventas();
    $SelectUsua->ListarSelectUsuario();

}
else if (isset($_POST['accion']) && $_POST['accion'] == 8) { //REPORTE RECORD USUARIO
    $RecordUsuario = new AjaxRpt_Ventas();
    $RecordUsuario->GetListVentasRecordUsuario($_POST["usu"],$_POST["anio_usu"]);
    

} 
else if (isset($_POST['accion']) && $_POST['accion'] == 9) { //LISTAR  GANANCIAS DE VENTAS POR FECHA
    $gananciasventas = new AjaxRpt_Ventas();
    $gananciasventas->GetGananciasVentasFechas($_POST["fecha_ini"],$_POST["fecha_fin"]);
    

}  else if (isset($_POST['accion']) && $_POST['accion'] == 10) { //LISTAR  VENTAS A CREDITO
    $ListventasCre = new AjaxRpt_Ventas();
    $ListventasCre->GetListVentasCreditoFechas($_POST["fecha_ini"],$_POST["fecha_fin"]);
    

} else if (isset($_POST['accion']) && $_POST['accion'] == 11) { //LISTAR  GANANCIAS DE VENTAS POR FECHA
    $gananciasventas_credit = new AjaxRpt_Ventas();
    $gananciasventas_credit->GetGananciasVentasFechas_Credito($_POST["fecha_ini"],$_POST["fecha_fin"]);
    

} else if (isset($_POST['accion']) && $_POST['accion'] == 12) { //LISTAR  VENTAS DEL DIA
    $ListventasCreditMesAnio = new AjaxRpt_Ventas();
    $ListventasCreditMesAnio->GetListVentas_Credito_MesyAnio($_POST["mes"],$_POST["anio"]);
    

} else if (isset($_POST['accion']) && $_POST['accion'] == 13) { //LISTAR  VENTAS POR AÑO - CREDITO
    $ListventasPorAnio_Credito = new AjaxRpt_Ventas();
    $ListventasPorAnio_Credito->GetListVentas_Credito_PorAnio($_POST["anio_a"]);
    

} else if (isset($_POST['accion']) && $_POST['accion'] == 14) { //COMPARATIVO ANUAL - CREDITOS
    $ListventasCompAnualCredit = new AjaxRpt_Ventas();
    $ListventasCompAnualCredit->GetListVentas_Credito_CompAnual();
    

}