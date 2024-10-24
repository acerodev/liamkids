<?php

class ClienteControlador
{

    /*===================================================================*/
    //LISTAR EN SELECT VENTA
    /*===================================================================*/
    static public function ctrListarSelectClientes()
    {
        $cliente = ClienteModelo::mdlListarSelectClientes();
        return $cliente;
    }


    /*===================================================================*/
    //LISTAR CLIENTES CON PROCEDURE  EN DATATABLE
    /*===================================================================*/
    static public function ctrListarClientes()
    {
        $cliente = ClienteModelo::mdlListarClientes();
        return $cliente;
    }


    /*===================================================================*/
    //REGISTRAR CLIENTES
    /*===================================================================*/
    static public function ctrRegistrarcliente($cliente_tipo_doc, $cliente_dni, $cliente_nombres, $cliente_direccion,  $cliente_celular, $cliente_correo)
    {
        $registrocliente = ClienteModelo::mdlRegistrarCliente($cliente_tipo_doc, $cliente_dni, $cliente_nombres, $cliente_direccion, $cliente_celular,  $cliente_correo);
        return $registrocliente;
    }


    /*===================================================================*/
    //VERIFICAR SI EL DOCUMENTO YA SE ENCUENTRA REGISTRADO
    /*===================================================================*/
    static public function ctrVerificarDuplicadoDocument($cliente_dni)
    {
        $respuesta = ClienteModelo::mdlVerificarDuplicadoDocument($cliente_dni);
        return $respuesta;
    }


    /*===================================================================*/
    //ACTUALIZAR CLIENTES
    /*===================================================================*/
    static public function ctrActualizarCliente($table, $data, $id, $nameId)
    {
        $respuesta = ClienteModelo::mdlActualizarCliente($table, $data, $id, $nameId);
        return $respuesta;
    }


    /*===================================================================*/
    //ELIMINAR CLIENTES
    /*===================================================================*/
    static public function ctrEliminarCliente($table, $id, $nameId)
    {
        $respuesta = ClienteModelo::mdlEliminarCliente($table, $id, $nameId);
        return $respuesta;
    }


    /*===================================================================*/
    //LISTAR CLIENTES CON PROCEDURE  EN DATATABLE
    /*===================================================================*/
    static public function ctrListarAutocomplete()
    {
        $cliente = ClienteModelo::mdlListarClientesAutocomplete();
        return $cliente;
    }

     /*===================================================================*/
    //AUTOCOMPLETE POR DNI
    /*===================================================================*/
    static public function ctrAutocompleteDni($cliente_dni)
    {
        $respuesta = ClienteModelo::mdlAutocompleteDni($cliente_dni);
        return $respuesta;
    }

    /*===================================================================*/
    //LISTAR PROVEEDORES
    /*===================================================================*/
    static public function ctrListarProveedores()
    {
        $cliente = ClienteModelo::mdlListarProveedores();
        return $cliente;
    }
}
