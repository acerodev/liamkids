<?php

require_once "conexion.php";

class Rpt_ComprasModelo{

     /*=============================================
    Peticion LISTAR PARA MOSTRAR DATOS EN DATATABLE CON PROCEDURE   - SEGUNDA VENTANA
    =============================================*/
    static public function mdlListComprasFechas($fecha_ini, $fecha_fin)
    {
        $stmt = Conexion::conectar()->prepare('call SP_REPORTE_COMPRAS_DEL_DIA(:fecha_ini, :fecha_fin)');
        $stmt->bindParam(":fecha_ini", $fecha_ini, PDO::PARAM_STR);
        $stmt->bindParam(":fecha_fin", $fecha_fin, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    /*=============================================
    Peticion SELECT: PARA MOSTRAR EN COMBO 
    =============================================*/
    static public function mdlListarSelectCompras(){
        $stmt = Conexion::conectar()->prepare("SELECT YEAR ( fecha_comprobante ) AS anio 
                                            FROM compra_cabecera 
                                            WHERE compra_estado <> 'ANULADA' 
                                            GROUP BY YEAR (fecha_comprobante)");
        $stmt -> execute();
        return $stmt->fetchAll();
    }


    /*=============================================
    BUSCAR COMPRAS POR MES Y AÑO
    =============================================*/
    static public function mdlListComprasMesyAnio($mes, $anio)
    {
        $stmt = Conexion::conectar()->prepare('call SP_REPORTE_COMPRAS_MES_ANIO(:mes, :anio)');
        $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
        $stmt->bindParam(":anio", $anio, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    
    /*=============================================
    BUSCAR COMPRAS POR AÑO
    =============================================*/
    static public function mdlListComprasPorAnio($anio_a)
    {
        $stmt = Conexion::conectar()->prepare('call SP_REPORTE_COMPRAS_POR_ANIO(:anio_a)');
        $stmt->bindParam(":anio_a", $anio_a, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    /*=============================================
    COMPARATIVO ANUAL
    =============================================*/
    static public function mdlListComprasCompAnual()
    {
        $stmt = Conexion::conectar()->prepare('call SP_REPORTE_COMPARATIVO_ANUAL_COMPRAS()');
        $stmt->execute();
        return $stmt->fetchAll();
    }


    /*=============================================
    PIVOT COMPRAS
    =============================================*/
    static public function mdlComprasPivot()
    {
        $stmt = Conexion::conectar()->prepare('call SP_REPORTE_PIVOT_COMPRAS()');
        $stmt->execute();
        return $stmt->fetchAll();
    }


     /*=============================================
    Peticion SELECT: PARA MOSTRAR EN COMBO DE PRODUCTOS
    =============================================*/
    static public function mdlListarSelectUsuario(){
        $stmt = Conexion::conectar()->prepare("SELECT cc.id_usuario, u.nombre_usuario 
                                                FROM compra_cabecera cc INNER JOIN usuarios u 
                                                ON cc.id_usuario = u.id_usuario 
                                                GROUP BY cc.id_usuario");
        $stmt -> execute();
        return $stmt->fetchAll();
    }


      /*=============================================
    REPORTE RECORD USUARIO
    =============================================*/
    static public function mdlListComprasRecordUsuario($usu, $anio_usu)
    {
        $stmt = Conexion::conectar()->prepare('call SP_REPORTE_COMPRA_RECORD_USUARIO(:usu, :anio_usu)');
        $stmt->bindParam(":usu", $usu, PDO::PARAM_STR);
        $stmt->bindParam(":anio_usu", $anio_usu, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }


}