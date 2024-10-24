<?php

class MedidaControlador{

     /*===================================================================*/
    //LISTAR EN DATATABLE  MEDIDA
    /*===================================================================*/
    static public function ctrListarMedida()
    {
        $MedidaList = MedidaModelo::mdlListarMedida();
        return $MedidaList;
    }

     /*===================================================================*/
    //REGISTRAR MEDIDA
    /*===================================================================*/
    static public function ctrRegistrarMedida($descripcion, $abreviatura)
    {
        $RegMedida = MedidaModelo::mdlRegistrarMedida($descripcion, $abreviatura);
        return $RegMedida;
    }

    /*===================================================================*/
    //ACTUALIZAR MEDIDA
    /*===================================================================*/
    static public function ctrActualizarMedida($table, $data, $id, $nameId)
    {
        $actualizarMedida = MedidaModelo::mdlActualizarMedida($table, $data, $id, $nameId);
        return $actualizarMedida;
    }


    /*===================================================================*/
    //ELIMINAR MEDIDA
    /*===================================================================*/
    static public function ctrEliminarMedida($table, $id, $nameId)
    {
        $eliminarMedida = MedidaModelo::mdlEliminarMedida($table, $id, $nameId);
        return $eliminarMedida;
    }


     /*===================================================================*/
    //SELECT     MEDIDA 
    /*===================================================================*/
    static public function ctrListarSelectMedida()
    {
        $SelectMedida = MedidaModelo::mdlListarSelectMedida();
        return $SelectMedida;
    }


}