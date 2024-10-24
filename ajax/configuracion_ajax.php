<?php
require_once "../controladores/configuracion_controlador.php";
require_once "../modelos/configuracion_modelo.php";


class AjaxConfiguracion
{

    public function ajaxObtenerDataEmpresa(){
        $DataEmpresa = ConfiguracionControlador::ctrObtenerDataEmpresa();
        echo json_encode($DataEmpresa, JSON_UNESCAPED_UNICODE);
    }

    /*===================================================================*/
    //ACTUALIZAR CONFIGURACION
    /*===================================================================*/
    public function ajaxActualizarConfiguracion($data)
    {
        $table = "empresa"; //TABLA
        $id = $_POST["id_empresa"]; //LO QUE VIENE DE PRODUCTOS.PHP
        $nameId = "id_empresa"; //CAMPO DE LA BASEbien bebe

        $respuesta = ConfiguracionControlador::ctrActualizarConfiguracion($table, $data);

        echo json_encode($respuesta);
    }


        /*===================================================================
     //ACTUALIZAR FOTO DEL LOGO
    ====================================================================*/
    public function ajaxActualizaFoto($data, $imagen = null)
    {     
        $ActualizaFoto = ConfiguracionControlador::ctrActualizaFoto( $data, $imagen);
            echo json_encode($ActualizaFoto);

    }
}



//instanciamos para que se ejecute la funcion
if (isset($_POST['accion']) && $_POST['accion'] == 1) {
    $DataEmpresa = new AjaxConfiguracion();
    $DataEmpresa->ajaxObtenerDataEmpresa(); //creamos el metodo

}else if (isset($_POST['accion']) && $_POST['accion'] == 2) { //ACTUALIZAR CONFIGURACION

    $actualizarConfig = new AjaxConfiguracion();
    $data = array(
        "razon_social" => $_POST["razon_social"],
        "ruc" => $_POST["ruc"],
        "direccion" => $_POST["direccion"],
        "moneda" => $_POST["moneda"],
        "celular" => $_POST["celular"],
        "email" => $_POST["email"],
        "igv" => $_POST["igv"],
        "cuenta" => $_POST["cuenta"],
        "nro_cuenta" => $_POST["nro_cuenta"],
        "nombre_sistema" => $_POST["nombre_sistema"],
        "tipo_impuesto" => $_POST["tipo_impuesto"],
        "soles" => $_POST["soles"],
        "centimos" => $_POST["centimos"],);

    $actualizarConfig->ajaxActualizarConfiguracion($data);



} /*===================================================================
ACTUALIZAR LOGO
====================================================================*/
else if(isset($_POST['accion']) && $_POST['accion'] == 3){   


$data = array(
    "id_empresa" => $_POST["id_empresa"],
   
);
if(isset($_FILES["archivo"]["name"])){

    $imagen["ubicacionTemporal"] =  $_FILES["archivo"]["tmp_name"][0];

    //capturamos el nombre de la imagen
    $info = new SplFileInfo($_FILES["archivo"]["name"][0]);

    //generamos un nombre aleatorio y unico para la imagen
    $imagen["nuevoNombre"] = sprintf("%s_%d.%s", uniqid(), rand(100,999), $info->getExtension());

    $imagen["folder"] = '../vistas/assets/imagenes/empresa/';

    $imagen["FotoDefault"] = 'default.png';

    $ActualizaFoto = new AjaxConfiguracion();
    $ActualizaFoto->ajaxActualizaFoto($data, $imagen);


}else{
    $ActualizaFoto = new AjaxConfiguracion();
    $ActualizaFoto->ajaxActualizaFoto($data );
}

   
}