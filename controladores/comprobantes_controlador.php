<?php

class ComprobantesControlador
{

     /*===================================================================*/
    //LISTAR EN DATATABLE  COMPROBANTES
    /*===================================================================*/
    static public function ctrListarComprobantes()
    {
        $GetCompro = ComprobantesModelo::mdlListarComprobantes();
        return $GetCompro;
    }

    /*===================================================================*/
    //REGISTRAR COMPROBANTES
    /*===================================================================*/
    static public function ctrRegistraComprobantes($data)
    {
        $RegistraComprobantes = ComprobantesModelo::mdlRegistraComprobantes($data);
        return $RegistraComprobantes;
    }

    /*===================================================================*/
    //ACTUALIZAR COMPROBANTES
    /*===================================================================*/
    static public function ctrUpdateComprobantes($table, $data, $id, $nameId)
    {
        $UpdateComprobantes = ComprobantesModelo::mdlUpdateComprobantes($table, $data, $id, $nameId);
        return $UpdateComprobantes;
    }


      /*===================================================================*/
    //ELIMINAR COMPROBANTES
    /*===================================================================*/
    static public function ctrEliminarComprobantes($table, $id, $nameId)
    {
        $eliminarComprobantes = ComprobantesModelo::mdlEliminarComprobantes($table, $id, $nameId);
        return $eliminarComprobantes;
    }

    /*===================================================================*/
    //LISTAR EN SELECT Comprobantes
    /*===================================================================*/
    static public function ctrListarSelectCompro()
    {
        $Compro = ComprobantesModelo::mdlListarSelectCompro();
        return $Compro;
    }
}