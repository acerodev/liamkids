<?php

require_once "../controladores/cliente_controlador.php";
require_once "../modelos/cliente_modelo.php";

class AjaxCliente
{

    public $cliente_tipo_doc;
    public $cliente_dni ;
    public $cliente_nombres ;
    public $cliente_direccion;
    public $cliente_celular; 
    public $cliente_correo; 


    /*===================================================================*/
    //LISTAR EN SELECT VENTA
    /*===================================================================*/
    public function ListarSelectClientes()
    {
        $cliente = ClienteControlador::ctrListarSelectClientes();
        echo json_encode($cliente);
    }

    /*===================================================================*/
    //LISTAR CLIENTE EN DATATABLE 
    /*===================================================================*/
    public function  ListarClientes()
    {
        $cliente = ClienteControlador::ctrListarClientes();
        echo json_encode($cliente);
    }

    /*===================================================================*/
    //REGISTRAR CLIENTE
    /*===================================================================*/
    public function ajaxRegistrarCliente()
    {
        $cliente = ClienteControlador::ctrRegistrarcliente(
            $this->cliente_tipo_doc,
            $this->cliente_dni,
            $this->cliente_nombres,
            $this->cliente_direccion,
            $this->cliente_celular,
            $this->cliente_correo

        );
        echo json_encode($cliente);
        //var_dump($cliente);
    }


    /*===================================================================*/
      //ACTUALIZAR CLIENTE
    /*===================================================================*/
      public function ajaxActualizarCliente($data)
      {
          $table = "clientes"; //TABLA
          $id = $_POST["cliente_id"]; //LO QUE VIENE DE PRODUCTOS.PHP
          $nameId = "cliente_id"; //CAMPO DE LA BASE
  
          $respuesta = ClienteControlador::ctrActualizarCliente($table, $data, $id, $nameId);
  
          echo json_encode($respuesta);
      }

    
    /*===================================================================*/
      //ELIMINAR CLIENTE
    /*===================================================================*/
    public function ajaxEliminarCliente()
    {
        $table = "clientes"; //TABLA
        $id = $_POST["cliente_id"]; //LO QUE VIENE DE PRODUCTOS.PHP
        $nameId = "cliente_id"; //CAMPO DE LA BASE 
        $respuesta = ClienteControlador::ctrEliminarCliente($table, $id, $nameId);

        echo json_encode($respuesta);
    }


    /*===================================================================*/
    //VERIFICAR SI EL DOCUMENTO YA SE ENCUENTRA REGISTRADO
    /*===================================================================*/
    public function ajaxVerificarDuplicadoDocument()
    {
        $respuesta = ClienteControlador::ctrVerificarDuplicadoDocument($this->cliente_dni);
        echo json_encode($respuesta);
        // var_dump($respuesta);
    }

    /*===================================================================*/
    //LISTAR CLIENTE AUTOCOMPLETE
    /*===================================================================*/
    public function  ListarClientesAutocomplete()
    {
        $cliente = ClienteControlador::ctrListarAutocomplete();
        echo json_encode($cliente);
    }

    /*===================================================================*/
    //AUTOCOMPLETE POR DNI
    /*===================================================================*/
    public function ajaxAutocompleteDni()
    {
        $respuesta = ClienteControlador::ctrAutocompleteDni($this->cliente_dni);
        echo json_encode($respuesta);
        // var_dump($respuesta);
    }

     /*===================================================================*/
    //LISTAR CLIENTE AUTOCOMPLETE
    /*===================================================================*/
    public function  ListaProveedores()
    {
        $cliente = ClienteControlador::ctrListarProveedores();
        echo json_encode($cliente);
    }
}









if (isset($_POST['accion']) && $_POST['accion'] == 1) { //LISTAR CLIENTE EN DATATABLE DE CLIENTE
    $cliente = new AjaxCliente();
    $cliente->ListarClientes();

} else if (isset($_POST['accion']) && $_POST['accion'] == 2) { //PARA REGISTRAR EL CLIENTE

    $registroCliente = new AjaxCliente();
    $registroCliente->cliente_tipo_doc = $_POST["cliente_tipo_doc"];
    $registroCliente->cliente_dni = $_POST["cliente_dni"];
    $registroCliente->cliente_nombres = $_POST["cliente_nombres"];
    $registroCliente->cliente_direccion = $_POST["cliente_direccion"];
    $registroCliente->cliente_celular = $_POST["cliente_celular"];
    $registroCliente->cliente_correo = $_POST["cliente_correo"];
    $registroCliente->ajaxRegistrarCliente();


} else if (isset($_POST['accion']) && $_POST['accion'] == 3) { //ACTUALIZAR CLIENTE

    $actualizarCliente = new AjaxCliente();
     $data = array(
        // campo de tabla y la variable definida en el registrar
        "cliente_tipo_doc" => $_POST["cliente_tipo_doc"],
        "cliente_dni" => $_POST["cliente_dni"],
        "cliente_nombres" => $_POST["cliente_nombres"],
        "cliente_direccion" => $_POST["cliente_direccion"],
        "cliente_celular" => $_POST["cliente_celular"],   
        "cliente_correo" => $_POST["cliente_correo"],
    );
    $actualizarCliente->ajaxActualizarCliente($data);


} 
/*===================================================================
   //ELIMINAR UN CLIENTE
====================================================================*/
else if (isset($_POST['accion']) && $_POST['accion'] == 4) { 


    $eliminarCliente = new AjaxCliente();
    $eliminarCliente->ajaxEliminarCliente();


} 
/*===================================================================
   //VERIFICA SI YA ESTA REGISTRADO
====================================================================*/
else if (isset($_POST['accion']) && $_POST['accion'] == 5) {   


    $verificaDoc = new AjaxCliente();
    $verificaDoc->cliente_dni = $_POST["cliente_dni"];
    $verificaDoc->ajaxVerificarDuplicadoDocument();


}

/*===================================================================
    LISTAR CLIENTE EN AUTOCOMPLETE
====================================================================*/
else if (isset($_POST['accion']) && $_POST['accion'] == 6) { 
    $cliente = new AjaxCliente();
    $cliente->ListarClientesAutocomplete();

} 

else if (isset($_POST['accion']) && $_POST['accion'] == 7) {   


    $AutocompleteDni = new AjaxCliente();
    $AutocompleteDni->cliente_dni = $_POST["cliente_dni"];
    $AutocompleteDni->ajaxAutocompleteDni();


}
/*===================================================================
    LISTAR PROVEEDORES
====================================================================*/
else if (isset($_POST['accion']) && $_POST['accion'] == 8) { 
    $cliente = new AjaxCliente();
    $cliente->ListaProveedores();

}
else {

    $cliente = new AjaxCliente();
    $cliente->ListarSelectClientes();
}
