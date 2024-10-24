<?php


class ProductosControlador{

    static public function ctrCargaMasivaProductos($fileProductos){
        
        $respuesta = ProductosModelo::mdlCargaMasivaProductos($fileProductos);
        
        return $respuesta;
    }

    /*===================================================================
    LISTAR PRODUCTOS
    ====================================================================*/
    static public function ctrListarProductos(){
    
        $productos = ProductosModelo::mdlListarProductos();
    
        return $productos;
    
    }


   /*===================================================================
     //REGISTRAR PRODUCTO
    ====================================================================*/
    static public function ctrRegistrarProducto( $data){
      

        $registroProducto = ProductosModelo::mdlRegistrarProducto( $data);

        return $registroProducto;

    }

    
   
    /*===================================================================
    AUMENTAR STOCK
    ====================================================================*/
    static public function ctrAumentarStock($codigo_producto, $nuevo_stock, $cant_stock, $id_talla){
        
        $respuesta = ProductosModelo::mdlAumentarStock($codigo_producto, $nuevo_stock, $cant_stock, $id_talla);
        
        return $respuesta;
    }

    /*===================================================================
    DISMINUIR STOCK
    ====================================================================*/
    static public function ctrDisminuirStock($codigo_producto, $nuevo_stock, $cant_stock, $id_talla){
        
        $respuesta = ProductosModelo::mdlDisminuirStock($codigo_producto, $nuevo_stock, $cant_stock, $id_talla);
        
        return $respuesta;
    }


    /*===================================================================
    ACTUALIZAR PRODUCTO
    ====================================================================*/
    static public function ctrActualizarProducto($codigo_producto, $id_categoria_producto,$descripcion_producto,$precio_compra_producto,
                                                $precio_venta_producto,$precio_mayor_producto,$precio_oferta_producto,$stock_producto,$minimo_stock_producto, $estado, $id_medida){

        $registroProducto = ProductosModelo::mdlActualizarProducto($codigo_producto, $id_categoria_producto,$descripcion_producto,$precio_compra_producto,
                                        $precio_venta_producto,$precio_mayor_producto,$precio_oferta_producto,$stock_producto, $minimo_stock_producto,$estado, $id_medida);

        return $registroProducto;
    }

    /*===================================================================
    ELIMINAR UN PRODUCTO
    ====================================================================*/
    static public function ctrEliminarProducto($codigo_producto)
    {
        $respuesta = ProductosModelo::mdlEliminarProductos($codigo_producto);
        
        return $respuesta;
    }


    /*===================================================================
    LISTAR NOMBRE DE PRODUCTOS PARA INPUT DE AUTO COMPLETADO
    ====================================================================*/
    static public function ctrListarNombreProductos(){

        $producto = ProductosModelo::mdlListarNombreProductos();

        return $producto;
    }

    /*===================================================================
    BUSCAR PRODUCTO POR SU CODIGO DE BARRAS
    ====================================================================*/
    static public function ctrGetDatosProducto($codigo_producto){
            
        $producto = ProductosModelo::mdlGetDatosProducto($codigo_producto);

        return $producto;

    }

    /*===================================================================
    VERIFICAR STOCK DEL PRODUCTO PARA LA VENTA
    ====================================================================*/
    static public function ctrVerificaStockProducto($codigo_producto,$stock, $id_talla){

        $respuesta = ProductosModelo::mdlVerificaStockProducto($codigo_producto, $stock, $id_talla);
    
        return $respuesta;
    }

    /*===================================================================
    CODIGO REPETIDO
    ====================================================================*/
      
      static public function ctrVerificarDuplicadoProd($codigo_producto){
        $respuesta = ProductosModelo::mdlVerificarDuplicadoProd($codigo_producto);
        return $respuesta;
    }

     /*===================================================================*/
  // ACTUALIZAR FOTO DEL  PRODUCTO
  /*===================================================================*/
  static public function ctrRegistrarTallasDetalle($codigo_producto, $id_talla, $stock)
  {
    $array_id_talla =  explode(",", $id_talla);
    $array_stock =   explode(",", $stock);
  

    for ($i = 0; $i < count($array_id_talla); $i++) {
      $registrarDetalleTalla = ProductosModelo::mdlRegistrarTallasDetalle($codigo_producto, $array_id_talla[$i], $array_stock[$i]); //llamamos al metodo del modelo
    }

    return $registrarDetalleTalla;

  }

  /*===================================================================*/
    //VER DETALLE DE LAS TALLAS DEL PRODUCTO
    /*===================================================================*/
    static public function ctrTraerDetalleTallas($codigo_producto)
    {
        $detalleTallas =  ProductosModelo::mdlTraerDetalleTallas($codigo_producto);
        return $detalleTallas;
    }

     /*===================================================================
     //REGISTRAR PRODUCTO
    ====================================================================*/
    static public function ctrActualizaFoto( $data, $imagen){

        $ActualizaFoto = ProductosModelo::mdlActualizaFoto( $data, $imagen);
        return $ActualizaFoto;

    }

    /*===================================================================
    AUMENTAR STOCK
    ====================================================================*/
    static public function ctrInserTallaPro($codigo_producto, $id_talla){
        
        $InsrtProducto = ProductosModelo::mdlInserTallaPro($codigo_producto, $id_talla);
        
        return $InsrtProducto;
    }


  
}