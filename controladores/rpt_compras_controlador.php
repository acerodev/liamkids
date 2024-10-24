<?php

class Rpt_ComprasControlador{


      /*==========================================================*/
    //BUSCAR COMPRAS POR RANGO DE FECHAS  
    /*==========================================================*/
    static public function ctrListComprasFechas($fecha_ini,$fecha_fin)
    {
        $ListCompras =  Rpt_ComprasModelo::mdlListComprasFechas($fecha_ini,$fecha_fin);
        return $ListCompras;
        //var_dump($Listventas);
    }


      /*==========================================================*/
    //LISTAR AÑOS EN SELECT
    /*==========================================================*/
    static public function ctrListarSelectCompras()
    {
        $SelectAnio = Rpt_ComprasModelo::mdlListarSelectCompras();
        return $SelectAnio;
    }


     /*==========================================================*/
    //BUSCAR VENTAS POR MES Y AÑO
    /*==========================================================*/
    static public function ctrListComprasMesyAnio($mes, $anio)
    {
        $ListComprasMesAnio =  Rpt_ComprasModelo::mdlListComprasMesyAnio($mes, $anio);
        return $ListComprasMesAnio;
        //var_dump($Listventas);
    }


     /*==========================================================*/
    //BUSCAR VENTAS POR AÑO
    /*==========================================================*/
    static public function ctrListComprasPorAnio($anio_a)
    {
        $ListComprasPorAnio =  Rpt_ComprasModelo::mdlListComprasPorAnio($anio_a);
        return $ListComprasPorAnio;
        //var_dump($Listventas);
    }


    
    /*==========================================================*/
    //COMPARATIVO ANUAL
    /*==========================================================*/
    static public function ctrListComprasCompAnual()
    {
        $ListComprasCompAnual =  Rpt_ComprasModelo::mdlListComprasCompAnual();
        return $ListComprasCompAnual;
        //var_dump($Listventas);
    }


    
    /*==========================================================*/
    //PIVOT COMPRAS
    /*==========================================================*/
    static public function ctrComprasPivot()
    {
        $ComprasPivot =  Rpt_ComprasModelo::mdlComprasPivot();
        return $ComprasPivot;
        //var_dump($Listventas);
    }

        /*==========================================================*/
    //LISTAR USUARIOS EN SELECT
    /*==========================================================*/
    static public function ctrListarSelectUsuario()
    {
        $SelectUsua = Rpt_ComprasModelo::mdlListarSelectUsuario();
        return $SelectUsua;
    }


    /*==========================================================*/
    //REPORTE RECORD USUARIO
    /*==========================================================*/
    static public function ctrListComprasRecordUsuario($usu, $anio_usu)
    {
        $RecordUsuario =  Rpt_ComprasModelo::mdlListComprasRecordUsuario($usu, $anio_usu);
        return $RecordUsuario;
        //var_dump($Listventas);
    }

}