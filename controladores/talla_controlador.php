<?php

class TallaControlador{

    /*===================================================================*/
    //LISTAR EN DATATABLE LAS TALLA
    /*===================================================================*/
    static public function ctrListarTalla()
    {
        $tallaList = TallaModelo::mdlListarTalla();
        return $tallaList;
    }


     /*===================================================================*/
    //REGISTRAR TALLA
    /*===================================================================*/
    static public function ctrRegistrarTalla($descripcion)
    {
        $RegTalla = TallaModelo::mdlRegistrarTalla($descripcion);
        return $RegTalla;
    }


    /*===================================================================*/
    //ACTUALIZAR TALLA
    /*===================================================================*/
    static public function ctrActualizarTalla($table, $data, $id, $nameId)
    {
        $actualizarTalla = TallaModelo::mdlActualizarTalla($table, $data, $id, $nameId);
        return $actualizarTalla;
    }

    /*===================================================================*/
    //ELIMINAR TALLA
    /*===================================================================*/
    static public function ctrEliminarTalla($table, $id, $nameId)
    {
        $eliminarTalla = TallaModelo::mdlEliminarTalla($table, $id, $nameId);
        return $eliminarTalla;
    }

    /*===================================================================*/
    //SELECT     TALLA 
    /*===================================================================*/
    static public function ctrListarSelectTalla()
    {
        $SelectTalla = TallaModelo::mdlListarSelectTalla();
        return $SelectTalla;
    }


    /*===================================================================*/
    //SELECT     TALLA POR CODIGO
    /*===================================================================*/
    static public function ctrListarSelectTallasPorCod($codigo_producto)
    {

        $SelectTallasPorCod = TallaModelo::mdlListarSelectTallasPorCod($codigo_producto);
        return $SelectTallasPorCod;
    }


    /*===================================================================*/
    //SELECT     TALLA POR CODIGO PARA CODIGO DE BARRA 
    /*===================================================================*/
    static public function ctrListarSelectTallasCodBarra($codigo_producto)
    {

        $SelectTallasPorCodBarra = TallaModelo::mdlListarSelectTallasCodBarra($codigo_producto);
        return $SelectTallasPorCodBarra;
    }


}