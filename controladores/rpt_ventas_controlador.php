<?php

class Rpt_VentasControlador{

       /*==========================================================*/
    //BUSCAR VENTAS POR RANGO DE FECHAS   - SEGUNDA VENTANA
    /*==========================================================*/
    static public function ctrListVentasFechas($fecha_ini,$fecha_fin)
    {
        $Listventas =  Rpt_VentasModelo::mdlListVentasFechas($fecha_ini,$fecha_fin);
        return $Listventas;
        //var_dump($Listventas);
    }

       /*==========================================================*/
    //LISTAR  VENTAS DE CREDITO
    /*==========================================================*/
    static public function ctrListVentasCreditoFechas($fecha_ini,$fecha_fin)
    {
        $respuesta =  Rpt_VentasModelo::mdlListVentasCreditoFechas($fecha_ini,$fecha_fin);
        return $respuesta;
        
    }


       /*==========================================================*/
    //LISTAR AÑOS EN SELECT
    /*==========================================================*/
    static public function ctrListarSelectAnio()
    {
        $SelectAnio = Rpt_VentasModelo::mdlListarSelectAnio();
        return $SelectAnio;
    }


    /*==========================================================*/
    //BUSCAR VENTAS POR MES Y AÑO
    /*==========================================================*/
    static public function ctrListVentasMesyAnio($mes, $anio)
    {
        $ListventasMesAnio =  Rpt_VentasModelo::mdlListVentasMesyAnio($mes, $anio);
        return $ListventasMesAnio;
        //var_dump($Listventas);
    }


    /*==========================================================*/
    //BUSCAR VENTAS POR AÑO
    /*==========================================================*/
    static public function ctrListVentasPorAnio($anio_a)
    {
        $ListventasPorAnio =  Rpt_VentasModelo::mdlListVentasPorAnio($anio_a);
        return $ListventasPorAnio;
        //var_dump($Listventas);
    }


    /*==========================================================*/
    //COMPARATIVO ANUAL
    /*==========================================================*/
    static public function ctrListVentasCompAnual()
    {
        $ListventasCompAnual =  Rpt_VentasModelo::mdlListVentasCompAnual();
        return $ListventasCompAnual;
        //var_dump($Listventas);
    }


    /*==========================================================*/
    //PIVOT VENTAS
    /*==========================================================*/
    static public function ctrVentasPivot()
    {
        $VentasPivot =  Rpt_VentasModelo::mdlVentasPivot();
        return $VentasPivot;
        //var_dump($Listventas);
    }


       /*==========================================================*/
    //LISTAR USUARIOS EN SELECT
    /*==========================================================*/
    static public function ctrListarSelectUsuario()
    {
        $SelectUsua = Rpt_VentasModelo::mdlListarSelectUsuario();
        return $SelectUsua;
    }


    /*==========================================================*/
    //REPORTE RECORD USUARIO
    /*==========================================================*/
    static public function ctrListVentasRecordUsuario($usu, $anio_usu)
    {
        $RecordUsuario =  Rpt_VentasModelo::mdlListVentasRecordUsuario($usu, $anio_usu);
        return $RecordUsuario;
        //var_dump($Listventas);
    }

      /*==========================================================*/
    //LISTAR GANANCIAS DE VENTAS POR FECHA
    /*==========================================================*/
    static public function ctrGananciasVentasFechas($fecha_ini,$fecha_fin)
    {
        $respuesta =  Rpt_VentasModelo::mdlGananciasVentasFechas($fecha_ini,$fecha_fin);
        return $respuesta;
        //var_dump($Listventas);
    }

      /*==========================================================*/
    //LISTAR GANANCIAS DE VENTAS POR FECHA - CREDITO
    /*==========================================================*/
    static public function ctrGananciasVentasFechas_Credito($fecha_ini,$fecha_fin)
    {
        $respuesta =  Rpt_VentasModelo::mdlGananciasVentasFechas_Credito($fecha_ini,$fecha_fin);
        return $respuesta;
        //var_dump($Listventas);
    }


    /*==========================================================*/
    // BUSCAR VENTAS - CREDITO -  POR MES Y AÑO
    /*==========================================================*/
    static public function ctrListVentas_Credito_MesyAnio($mes, $anio)
    {
        $respuesta =  Rpt_VentasModelo::mdlListVentas_Credito_MesyAnio($mes, $anio);
        return $respuesta;
        //var_dump($Listventas);
    }


    /*==========================================================*/
    //BUSCAR VENTAS POR AÑO - CREDITOS
    /*==========================================================*/
    static public function ctrListVentas_Credito_PorAnio($anio_a)
    {
        $respuesta =  Rpt_VentasModelo::mdlListVentas_Credito_PorAnio($anio_a);
        return $respuesta;
        //var_dump($Listventas);
    }


    /*==========================================================*/
    //COMPARATIVO ANUAL
    /*==========================================================*/
    static public function ctrListVentas_Credito_CompAnual()
    {
        $respuesta =  Rpt_VentasModelo::mdlListVentas_Credito_CompAnual();
        return $respuesta;
        //var_dump($Listventas);
    }


}