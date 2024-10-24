<?php

require_once "conexion.php";

class Rpt_VentasModelo{


    /*=============================================
    Peticion LISTAR PARA MOSTRAR DATOS EN DATATABLE CON PROCEDURE   - SEGUNDA VENTANA
    =============================================*/
    static public function mdlListVentasFechas($fecha_ini, $fecha_fin)
    {
        $stmt = Conexion::conectar()->prepare('call SP_REPORTE_VENTA_DEL_DIA(:fecha_ini, :fecha_fin)');
        $stmt->bindParam(":fecha_ini", $fecha_ini, PDO::PARAM_STR);
        $stmt->bindParam(":fecha_fin", $fecha_fin, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /*=============================================
    Peticion LISTAR VENTAS A CREDITO POR FECHAS
    =============================================*/
    static public function mdlListVentasCreditoFechas($fecha_ini, $fecha_fin)
    {
        $stmt = Conexion::conectar()->prepare('call SP_REPORTE_VENTA_CREDITO_FECHAS(:fecha_ini, :fecha_fin)');
        $stmt->bindParam(":fecha_ini", $fecha_ini, PDO::PARAM_STR);
        $stmt->bindParam(":fecha_fin", $fecha_fin, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    /*=============================================
    Peticion SELECT: PARA MOSTRAR EN COMBO 
    =============================================*/
    static public function mdlListarSelectAnio(){
        $stmt = Conexion::conectar()->prepare("SELECT YEAR(fecha_venta) as anio FROM venta_cabecera
                                                where venta_estado <> 'ANULADA' 
                                                GROUP BY YEAR(fecha_venta)");
        $stmt -> execute();
        return $stmt->fetchAll();
    }


    /*=============================================
    BUSCAR VENTAS POR MES Y AÑO
    =============================================*/
    static public function mdlListVentasMesyAnio($mes, $anio)
    {
        $stmt = Conexion::conectar()->prepare('call SP_REPORTE_VENTA_MES_ANIO(:mes, :anio)');
        $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
        $stmt->bindParam(":anio", $anio, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    /*=============================================
    BUSCAR VENTAS POR AÑO
    =============================================*/
    static public function mdlListVentasPorAnio($anio_a)
    {
        $stmt = Conexion::conectar()->prepare('call SP_REPORTE_VENTA_POR_ANIO(:anio_a)');
        $stmt->bindParam(":anio_a", $anio_a, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /*=============================================
    COMPARATIVO ANUAL
    =============================================*/
    static public function mdlListVentasCompAnual()
    {
        $stmt = Conexion::conectar()->prepare('call SP_REPORTE_COMPARATIVO_ANUAL()');
        $stmt->execute();
        return $stmt->fetchAll();
    }


    /*=============================================
    PIVOT VENTAS
    =============================================*/
    static public function mdlVentasPivot()
    {
        $stmt = Conexion::conectar()->prepare('call SP_REPORTE_PIVOT_VENTAS()');
        $stmt->execute();
        return $stmt->fetchAll();
    }


    
    /*=============================================
    Peticion SELECT: PARA MOSTRAR EN COMBO DE PRODUCTOS
    =============================================*/
    static public function mdlListarSelectUsuario(){
        $stmt = Conexion::conectar()->prepare("SELECT vc.id_usuario, u.nombre_usuario 
                                                FROM venta_cabecera vc INNER JOIN usuarios u 
                                                ON vc.id_usuario = u.id_usuario 
                                                GROUP BY vc.id_usuario");
        $stmt -> execute();
        return $stmt->fetchAll();
    }


    /*=============================================
    REPORTE RECORD USUARIO
    =============================================*/
    static public function mdlListVentasRecordUsuario($usu, $anio_usu)
    {
        $stmt = Conexion::conectar()->prepare('call SP_REPORTE_VENTA_RECORD_USUARIO(:usu, :anio_usu)');
        $stmt->bindParam(":usu", $usu, PDO::PARAM_STR);
        $stmt->bindParam(":anio_usu", $anio_usu, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /*=============================================
    LISTAR GANANCIAS DE VENTAS POR FECHA
    =============================================*/
    static public function mdlGananciasVentasFechas($fecha_ini, $fecha_fin)
    {
        $stmt = Conexion::conectar()->prepare('call SP_LISTAR_GANANCIAS_FECHAS(:fecha_ini, :fecha_fin)');
        $stmt->bindParam(":fecha_ini", $fecha_ini, PDO::PARAM_STR);
        $stmt->bindParam(":fecha_fin", $fecha_fin, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    /*=============================================
    LISTAR GANANCIAS DE VENTAS POR FECHA - CREDITOS
    =============================================*/
    static public function mdlGananciasVentasFechas_Credito($fecha_ini, $fecha_fin)
    {
        $stmt = Conexion::conectar()->prepare('call SP_LISTAR_GANANCIAS_CREDITO_FECHAS(:fecha_ini, :fecha_fin)');
        $stmt->bindParam(":fecha_ini", $fecha_ini, PDO::PARAM_STR);
        $stmt->bindParam(":fecha_fin", $fecha_fin, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /*=============================================
    BUSCAR VENTAS - CREDITO -  POR MES Y AÑO
    =============================================*/
    static public function mdlListVentas_Credito_MesyAnio($mes, $anio)
    {
        $stmt = Conexion::conectar()->prepare('call SP_REPORTE_VENTA_CREDITO_MES_ANIO(:mes, :anio)');
        $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
        $stmt->bindParam(":anio", $anio, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    /*=============================================
    BUSCAR VENTAS POR AÑO - CREDITOS
    =============================================*/
    static public function mdlListVentas_Credito_PorAnio($anio_a)
    {
        $stmt = Conexion::conectar()->prepare('call SP_REPORTE_VENTA_CREDITO_POR_ANIO(:anio_a)');
        $stmt->bindParam(":anio_a", $anio_a, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /*=============================================
    COMPARATIVO ANUAL - CREDITOS
    =============================================*/
    static public function mdlListVentas_Credito_CompAnual()
    {
        $stmt = Conexion::conectar()->prepare('call SP_REPORTE_CREDITOS_COMPARATIVO_ANUAL()');
        $stmt->execute();
        return $stmt->fetchAll();
    }

}