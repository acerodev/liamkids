<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../vendor/autoload.php";

class ajaxProductos{

    public $fileProductos;

    public $codigo_producto;
    public $id_categoria_producto;
    public $descripcion_producto;
    public $precio_compra_producto;
    public $precio_venta_producto;
    public $utilidad;
    public $stock_producto;
    public $minimo_stock_producto;
    public $ventas_producto;
    public $precio_mayor_producto;
    public $precio_oferta_producto;
    public $id_medida;
    public $id_talla;
    public $estado;
    public $stock;

    public $cantidad_a_comprar;

    public function ajaxCargaMasivaProductos(){

        $respuesta = ProductosControlador::ctrCargaMasivaProductos($this->fileProductos);

        echo json_encode($respuesta);
    }

    /*===================================================================
    LISTAR PRODUCTOS
    ====================================================================*/
    public function ajaxListarProductos(){
    
        $productos = ProductosControlador::ctrListarProductos();
    
        echo json_encode($productos);
    
    }

     /*===================================================================
     //REGISTRAR PRODUCTO
    ====================================================================*/
    public function ajaxRegistrarProducto($data)
    {     
        $producto = ProductosControlador::ctrRegistrarProducto( $data);
            echo json_encode($producto);

    }

    /*===================================================================
    AUMENTAR STOCK
    ====================================================================*/
    public function ajaxAumentarStock(){

        $respuesta = ProductosControlador::ctrAumentarStock($_POST["codigo_producto"], $_POST["nuevoStock"], $_POST["cant_stock"], $_POST["id_talla"]);

        echo json_encode($respuesta);
    }

    /*===================================================================
    DISMINUIR STOCK
    ====================================================================*/
    public function ajaxDisminuirStock(){

        $respuesta = ProductosControlador::ctrDisminuirStock($_POST["codigo_producto"], $_POST["nuevoStock"], $_POST["cant_stock"], $_POST["id_talla"]);

        echo json_encode($respuesta);
    }

    /*===================================================================
    ACTUALIZAR PRODUCTO
    ====================================================================*/
    public function ajaxActualizarProducto()
    {
        $producto = ProductosControlador::ctrActualizarProducto(
            $this->codigo_producto,
            $this->id_categoria_producto,
            $this->descripcion_producto,
            $this->precio_compra_producto,
            $this->precio_venta_producto,
            $this->precio_mayor_producto,
            $this->precio_oferta_producto,
            $this->stock_producto,
            $this->minimo_stock_producto,
            $this->estado,
            $this->id_medida
           // $this->id_talla     
        );
        echo json_encode($producto);
    }

    /*===================================================================
    ELIMINAR UN PRODUCTO
    ====================================================================*/
    public function ajaxEliminarProducto($codigo_producto){
       
        $respuesta = ProductosControlador::ctrEliminarProducto($codigo_producto);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }

    
    /*===================================================================
    LISTAR NOMBRE DE PRODUCTOS PARA INPUT DE AUTO COMPLETADO
    ====================================================================*/
    public function ajaxListarNombreProductos(){

        $NombreProductos = ProductosControlador::ctrListarNombreProductos();

        echo json_encode($NombreProductos);
    }

    /*===================================================================
    BUSCAR PRODUCTO POR SU CODIGO DE BARRAS
    ====================================================================*/
    public function ajaxGetDatosProducto(){
        
        $producto = ProductosControlador::ctrGetDatosProducto($this->codigo_producto);

        echo json_encode($producto);
    }

    /*===================================================================
    VERIFICAR SI TIENE STOCK
    ====================================================================*/
    public function ajaxVerificaStockProducto(){

        $respuesta = ProductosControlador::ctrVerificaStockProducto($this->codigo_producto,$this->stock, $this->id_talla);
   
       echo json_encode($respuesta);
   }

   /*===================================================================
    VERIFICAR SI ESTA REGISTRADO -DUPLICADO
    ====================================================================*/
   public function ajaxVerificarDuplicadoProd(){
    $respuesta = ProductosControlador::ctrVerificarDuplicadoProd($this->codigo_producto);
    echo json_encode($respuesta);
    }

    
    /*===================================================================*/
    // REGISTRAR DETALLE TALLAS
    /*===================================================================*/
    public function ajaxRegistrarTallasDetalle($codigo_producto, $id_talla, $stock)
    {
        $registrarDetalleTalla = ProductosControlador::ctrRegistrarTallasDetalle($codigo_producto, $id_talla, $stock);
        echo json_encode($registrarDetalleTalla);
       // var_dump($registroPrestamoDetalle);
    }


    /*===================================================================*/
    //VER DETALLE DE LAS TALLAS DEL PRODUCTO
    /*===================================================================*/
    public function ajaxTraerDetalleTallas($codigo_producto)
    {
        $detalleTallas = ProductosControlador::ctrTraerDetalleTallas($codigo_producto);
        echo json_encode($detalleTallas, JSON_UNESCAPED_UNICODE);
    }

      /*===================================================================
     //ACTUALIZAR FOTO DEL  PRODUCTO
    ====================================================================*/
    public function ajaxActualizaFoto($data, $imagen = null)
    {     
        $ActualizaFoto = ProductosControlador::ctrActualizaFoto( $data, $imagen);
            echo json_encode($ActualizaFoto);

    }

     /*===================================================================
    INSERT TALLAS NUESVAS AL  PRODUCTO
    ====================================================================*/
    public function ajaxInserTallaPro()
    {
        $InsrtProducto = ProductosControlador::ctrInserTallaPro(
            $this->codigo_producto,
            $this->id_talla
           
        );
        echo json_encode($InsrtProducto);
    }


   
}

/*===================================================================
    LISTAR PRODUCTOS
====================================================================*/
if(isset($_POST['accion']) && $_POST['accion'] == 1){ 

    $productos = new ajaxProductos();
    $productos -> ajaxListarProductos();
    
}
/*===================================================================
    REGISTRAR PRODUCTOS
====================================================================*/
else if(isset($_POST['accion']) && $_POST['accion'] == 2){   
    $registrarProducto = new AjaxProductos();
    $data = array(
        "codigo_producto" => $_POST["codigo_producto"],
        "id_categoria_producto" => $_POST["id_categoria_producto"],
        "descripcion_producto" => $_POST["descripcion_producto"],
        "precio_compra_producto" => $_POST["precio_compra_producto"],
        "precio_venta_producto" => $_POST["precio_venta_producto"],
        "precio_mayor_producto" => $_POST["precio_mayor_producto"],
        "precio_oferta_producto" => $_POST["precio_oferta_producto"],
        "stock_producto" => $_POST["stock_producto"],
        "minimo_stock_producto" => $_POST["minimo_stock_producto"],
        "ventas_producto" => $_POST["ventas_producto"],
        "id_medida" => $_POST["id_medida"],
    );
    $registrarProducto->ajaxRegistrarProducto($data);

   /* if(isset($_FILES["archivo"]["name"])){

        $imagen["ubicacionTemporal"] =  $_FILES["archivo"]["tmp_name"][0];

        //capturamos el nombre de la imagen
        $info = new SplFileInfo($_FILES["archivo"]["name"][0]);

        //generamos un nombre aleatorio y unico para la imagen
        $imagen["nuevoNombre"] = sprintf("%s_%d.%s", uniqid(), rand(100,999), $info->getExtension());

        $imagen["folder"] = '../vistas/assets/imagenes/productos/';

        $registrarProducto = new AjaxProductos();
        $registrarProducto->ajaxRegistrarProducto($data, $imagen);


    }else{
        $registrarProducto = new AjaxProductos();
        $registrarProducto->ajaxRegistrarProducto($data);
    }*/
        

}
/*===================================================================
    ACTUALIZAR STOCK PRODUCTOS
====================================================================*/
else if(isset($_POST['accion']) && $_POST['accion'] == 3){ 

    $actualizarStock = new ajaxProductos();
    if($_POST['tipo_movimiento'] == 1){
        $actualizarStock -> ajaxAumentarStock();
    }else{
        $actualizarStock -> ajaxDisminuirStock();
    }

}
/*===================================================================
    ACTUALIZAR PRODUCTOS
====================================================================*/
else if(isset($_POST['accion']) && $_POST['accion'] == 4){ 
    $editarProducto = new AjaxProductos();
    $editarProducto->codigo_producto = $_POST["codigo_producto"];
    $editarProducto->id_categoria_producto = $_POST["id_categoria_producto"];
    $editarProducto->descripcion_producto = $_POST["descripcion_producto"];
    $editarProducto->precio_compra_producto = $_POST["precio_compra_producto"];
    $editarProducto->precio_venta_producto = $_POST["precio_venta_producto"];
    $editarProducto->precio_mayor_producto = $_POST["precio_mayor_producto"];
    $editarProducto->precio_oferta_producto = $_POST["precio_oferta_producto"];
    $editarProducto->stock_producto = $_POST["stock_producto"];
    $editarProducto->minimo_stock_producto = $_POST["minimo_stock_producto"];
    $editarProducto->estado = $_POST["estado"];
    $editarProducto->id_medida = $_POST["id_medida"];
    //$editarProducto->id_talla = $_POST["id_talla"];
    $editarProducto -> ajaxActualizarProducto();

}
/*===================================================================
    ELIMINAR PRODUCTOS
====================================================================*/
else if (isset($_POST['accion']) && $_POST['accion'] == 5) {

    $eliminarProducto = new ajaxProductos();
    $eliminarProducto -> ajaxEliminarProducto($_POST["codigo_producto"]);

}
/*===================================================================
    // TRAER LISTADO DE PRODUCTOS PARA EL AUTOCOMPLETE
====================================================================*/
else if(isset($_POST["accion"]) && $_POST["accion"] == 6){  

    $nombreProductos = new AjaxProductos();
    $nombreProductos -> ajaxListarNombreProductos();

}
/*===================================================================
   OBTENER DATOS DE UN PRODUCTO POR SU CODIGO
====================================================================*/
else if(isset($_POST["accion"]) && $_POST["accion"] == 7){ // 

    $listaProducto = new AjaxProductos();
    $listaProducto -> codigo_producto = $_POST["codigo_producto"];   
    $listaProducto -> ajaxGetDatosProducto();
	
}
/*===================================================================
    VERIFICAR STOCK DEL PRODUCTO
====================================================================*/
else if(isset($_POST["accion"]) && $_POST["accion"] == 8){ // 

    $verificaStock = new AjaxProductos();
    $verificaStock -> codigo_producto = $_POST["codigo_producto"];
    $verificaStock -> stock = $_POST["stock"]; 
    $verificaStock -> id_talla = $_POST["id_talla"]; 
    $verificaStock -> ajaxVerificaStockProducto();

}
/*===================================================================
    VERIFICAR SI ESTA REGISTRADO -DUPLICADO
    ====================================================================*/
else if (isset($_POST['accion']) && $_POST['accion'] == 9) {
    $verificaCodBarra = new ajaxProductos();
    $verificaCodBarra -> codigo_producto = $_POST["codigo_producto"];//definimos arriba  y jalamos la variable que envia desde ventas
    $verificaCodBarra -> ajaxVerificarDuplicadoProd();

}
/*===================================================================
    REGISTRAR DETALLE DE TALLAS DEL PRODUCTO
====================================================================*/
else if (isset($_POST["accion"]) && $_POST["accion"] == 10) { 

    $registrarDetalleTalla = new ajaxProductos();
    $registrarDetalleTalla->ajaxRegistrarTallasDetalle(
        $_POST['codigo_producto'],
        $_POST['id_talla'],
        $_POST['stock']
       

    );
}
/*===================================================================
    TRAER DETALLE DE TALLAS DEL PRODUCTO
====================================================================*/
 else if (isset($_POST['accion']) && $_POST['accion'] == 11) {       
    $detalleTallas = new ajaxProductos();
    $detalleTallas->ajaxTraerDetalleTallas($_POST["codigo_producto"]);


}
/*===================================================================
    ACTUALIZAR FOTO
====================================================================*/
else if(isset($_POST['accion']) && $_POST['accion'] == 12){   
    
  
    $data = array(
        "codigo_producto" => $_POST["codigo_producto"],
       
    );
    if(isset($_FILES["archivo"]["name"])){

        $imagen["ubicacionTemporal"] =  $_FILES["archivo"]["tmp_name"][0];

        //capturamos el nombre de la imagen
        $info = new SplFileInfo($_FILES["archivo"]["name"][0]);

        //generamos un nombre aleatorio y unico para la imagen
        $imagen["nuevoNombre"] = sprintf("%s_%d.%s", uniqid(), rand(100,999), $info->getExtension());

        $imagen["folder"] = '../vistas/assets/imagenes/productos/';

        $imagen["FotoDefault"] = 'default.png';

        $ActualizaFoto = new AjaxProductos();
        $ActualizaFoto->ajaxActualizaFoto($data, $imagen);


    }else{
        $ActualizaFoto = new AjaxProductos();
        $ActualizaFoto->ajaxActualizaFoto($data );
    }

       
}
/*===================================================================
    ACTUALIZAR PRODUCTOS
====================================================================*/
else if(isset($_POST['accion']) && $_POST['accion'] == 13){ 
    $InserTallaP = new AjaxProductos();
    $InserTallaP->codigo_producto = $_POST["codigo_producto"];
    $InserTallaP->id_talla = $_POST["id_talla"];
   
    $InserTallaP -> ajaxInserTallaPro();

}
/*===================================================================
    CARGA MASIVA
====================================================================*/
else if(isset($_FILES)){
    $archivo_productos = new ajaxProductos();
    $archivo_productos-> fileProductos = $_FILES['fileProductos'];
    $archivo_productos -> ajaxCargaMasivaProductos();
}