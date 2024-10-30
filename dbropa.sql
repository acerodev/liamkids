/*
 Navicat Premium Data Transfer

 Source Server         : MYSQL
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : dbropa

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 05/06/2024 01:46:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for arqueo_caja
-- ----------------------------
DROP TABLE IF EXISTS `arqueo_caja`;
CREATE TABLE `arqueo_caja`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_caja` int NULL DEFAULT NULL,
  `id_usuario` int NULL DEFAULT NULL,
  `fecha_inicio` datetime NULL DEFAULT NULL,
  `fecha_fin` datetime NULL DEFAULT NULL,
  `monto_inicial` float NULL DEFAULT NULL,
  `ingresos` float NULL DEFAULT NULL,
  `devoluciones` float NULL DEFAULT NULL,
  `gastos` float NULL DEFAULT NULL,
  `monto_final` float NULL DEFAULT NULL,
  `status` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_id_caja_idx`(`id_caja` ASC) USING BTREE,
  INDEX `fk_id_usuario_idx`(`id_usuario` ASC) USING BTREE,
  CONSTRAINT `fk_id_caja` FOREIGN KEY (`id_caja`) REFERENCES `cajas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of arqueo_caja
-- ----------------------------

-- ----------------------------
-- Table structure for caja
-- ----------------------------
DROP TABLE IF EXISTS `caja`;
CREATE TABLE `caja`  (
  `caja_id` int NOT NULL AUTO_INCREMENT,
  `caja_descripcion` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `caja_monto_inicial` float NULL DEFAULT NULL,
  `caja_monto_ingreso` float NULL DEFAULT NULL,
  `caja_f_apertura` date NULL DEFAULT NULL,
  `caja_f_cierre` date NULL DEFAULT NULL,
  `caja__monto_egreso` float NULL DEFAULT NULL,
  `caja_monto_total` float NULL DEFAULT NULL,
  `caja_estado` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `caja_hora_apertura` time NULL DEFAULT NULL,
  `caja_hora_cierre` time NULL DEFAULT NULL,
  `caja_count_ingreso` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `caja_count_egreso` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `caja_correo` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `caja_interes` float NULL DEFAULT NULL,
  `caja_monto_ing_directo` float NULL DEFAULT NULL,
  `caja_monto_egre_directo` float NULL DEFAULT NULL,
  `caja_abonos` float NULL DEFAULT NULL,
  `caja_count_abonos` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`caja_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of caja
-- ----------------------------

-- ----------------------------
-- Table structure for cajas
-- ----------------------------
DROP TABLE IF EXISTS `cajas`;
CREATE TABLE `cajas`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `numero_caja` int NOT NULL,
  `nombre_caja` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of cajas
-- ----------------------------

-- ----------------------------
-- Table structure for categorias
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias`  (
  `id_categoria` int NOT NULL AUTO_INCREMENT,
  `nombre_categoria` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL,
  `aplica_peso` int NOT NULL,
  `fecha_actualizacion_categoria` date NULL DEFAULT NULL,
  `estado` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `fecha_creacion_categoria` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_categoria`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO `categorias` VALUES (1, 'Poleras', 0, '2023-01-10', '1', NULL);
INSERT INTO `categorias` VALUES (2, 'Short de hombre', 0, NULL, '1', NULL);
INSERT INTO `categorias` VALUES (3, 'Pantalon', 0, '2023-01-11', '1', NULL);
INSERT INTO `categorias` VALUES (4, 'Zapatos', 0, NULL, '1', NULL);
INSERT INTO `categorias` VALUES (5, 'CAMISETAS', 0, NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (6, 'Pantalones', 0, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for clientes
-- ----------------------------
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes`  (
  `cliente_id` int NOT NULL AUTO_INCREMENT,
  `cliente_tipo_doc` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `cliente_dni` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `cliente_nombres` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `cliente_direccion` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `cliente_celular` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `cliente_correo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`cliente_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of clientes
-- ----------------------------
INSERT INTO `clientes` VALUES (1, 'Ruc', '0000000', 'Clientes Varios', 'sin direccion', '0000000', '');

-- ----------------------------
-- Table structure for color
-- ----------------------------
DROP TABLE IF EXISTS `color`;
CREATE TABLE `color`  (
  `id_color` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_color`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of color
-- ----------------------------
INSERT INTO `color` VALUES (1, 'Rojo');
INSERT INTO `color` VALUES (4, 'Negro');

-- ----------------------------
-- Table structure for compra_cabecera
-- ----------------------------
DROP TABLE IF EXISTS `compra_cabecera`;
CREATE TABLE `compra_cabecera`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nro_compra` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `cliente_id` int NOT NULL,
  `compro_id` int NOT NULL,
  `serie_comprobante` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `nro_comprobante` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `fecha_comprobante` date NULL DEFAULT NULL,
  `compra_estado` enum('REGISTRADA','ANULADA') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `ope_exonerada` float NULL DEFAULT NULL,
  `ope_inafecta` float NULL DEFAULT NULL,
  `ope_gravada` float NULL DEFAULT NULL,
  `igv` float NULL DEFAULT NULL,
  `total_compra` float NULL DEFAULT NULL,
  `fecha` date NULL DEFAULT NULL,
  `id_usuario` int NOT NULL,
  `f_pago` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `f_pago_ope` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `estado_caja` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `caja_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `nro_compra`) USING BTREE,
  INDEX `fk_id_proveedor_idx`(`cliente_id` ASC) USING BTREE,
  INDEX `fk_id_comprobante_idx`(`compro_id` ASC) USING BTREE,
  INDEX `fk_id_moneda_idx`(`nro_compra` ASC) USING BTREE,
  INDEX `caja_id`(`caja_id` ASC) USING BTREE,
  INDEX `id`(`id` ASC) USING BTREE,
  CONSTRAINT `compra_cabecera_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`cliente_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `compra_cabecera_ibfk_2` FOREIGN KEY (`compro_id`) REFERENCES `comprobante` (`compro_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `compra_cabecera_ibfk_3` FOREIGN KEY (`caja_id`) REFERENCES `caja` (`caja_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of compra_cabecera
-- ----------------------------

-- ----------------------------
-- Table structure for compra_detalle
-- ----------------------------
DROP TABLE IF EXISTS `compra_detalle`;
CREATE TABLE `compra_detalle`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_compra` int NULL DEFAULT NULL,
  `nro_compra` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `codigo_producto` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `cantidad` float NOT NULL,
  `costo_unitario` float NULL DEFAULT NULL,
  `descuento` float NULL DEFAULT NULL,
  `subtotal` float NULL DEFAULT NULL,
  `impuesto` float NULL DEFAULT NULL,
  `total` float NOT NULL,
  `estado` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `id_talla` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `fecha` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `nro_compra`) USING BTREE,
  INDEX `fk_cod_producto_idx`(`codigo_producto` ASC) USING BTREE,
  INDEX `fk_id_compra_idx`(`id_compra` ASC) USING BTREE,
  CONSTRAINT `fk_cod_producto` FOREIGN KEY (`codigo_producto`) REFERENCES `productos` (`codigo_producto`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_id_compra` FOREIGN KEY (`id_compra`) REFERENCES `compra_cabecera` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of compra_detalle
-- ----------------------------

-- ----------------------------
-- Table structure for comprobante
-- ----------------------------
DROP TABLE IF EXISTS `comprobante`;
CREATE TABLE `comprobante`  (
  `compro_id` int NOT NULL AUTO_INCREMENT,
  `compro_tipo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `compro_serie` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `compro_numero` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `compro_estado` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`compro_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of comprobante
-- ----------------------------
INSERT INTO `comprobante` VALUES (1, 'Boleta', 'B001', '00000039', 'ACTIVO');
INSERT INTO `comprobante` VALUES (2, 'Factura', 'F001', '00000008', 'ACTIVO');
INSERT INTO `comprobante` VALUES (3, 'Ticket', 'T001', '00000007', 'ACTIVO');
INSERT INTO `comprobante` VALUES (4, 'Cotizacion', 'C000', '00000002', 'ACTIVO');

-- ----------------------------
-- Table structure for coti_cabecera
-- ----------------------------
DROP TABLE IF EXISTS `coti_cabecera`;
CREATE TABLE `coti_cabecera`  (
  `nro_boleta` varchar(13) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `subtotal` float NOT NULL,
  `igv` float NOT NULL,
  `total_venta` float NULL DEFAULT NULL,
  `fecha_venta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `venta_estado` enum('REGISTRADA','ANULADA') CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `id_usuario` int NULL DEFAULT NULL,
  `cliente_id` int NULL DEFAULT NULL,
  `compro_id` int NULL DEFAULT NULL,
  `serie` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `f_pago` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `f_pago_ope` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `estado_caja` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `atiende` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `validez` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`nro_boleta`) USING BTREE,
  INDEX `id_usuario`(`id_usuario` ASC) USING BTREE,
  INDEX `cliente_id`(`cliente_id` ASC) USING BTREE,
  INDEX `compro_id`(`compro_id` ASC) USING BTREE,
  INDEX `caja_id`(`atiende` ASC) USING BTREE,
  CONSTRAINT `coti_cabecera_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `coti_cabecera_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`cliente_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `coti_cabecera_ibfk_3` FOREIGN KEY (`compro_id`) REFERENCES `comprobante` (`compro_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb3 COLLATE = utf8mb3_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of coti_cabecera
-- ----------------------------

-- ----------------------------
-- Table structure for coti_detalle
-- ----------------------------
DROP TABLE IF EXISTS `coti_detalle`;
CREATE TABLE `coti_detalle`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nro_boleta` varchar(13) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `codigo_producto` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `cantidad` float NOT NULL,
  `costo_unitario_venta` float NULL DEFAULT NULL,
  `precio_unitario_venta` float NULL DEFAULT NULL,
  `total_venta` float NOT NULL,
  `fecha_venta` date NOT NULL,
  `venta_estado` enum('REGISTRADA','ANULADA') CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `precio_ofertas` float NULL DEFAULT NULL,
  `id_talla` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_nro_boleta_idx`(`nro_boleta` ASC) USING BTREE,
  INDEX `fk_cod_producto_idx`(`codigo_producto` ASC) USING BTREE,
  CONSTRAINT `coti_detalle_ibfk_1` FOREIGN KEY (`codigo_producto`) REFERENCES `productos` (`codigo_producto`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `coti_detalle_ibfk_2` FOREIGN KEY (`nro_boleta`) REFERENCES `coti_cabecera` (`nro_boleta`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of coti_detalle
-- ----------------------------

-- ----------------------------
-- Table structure for empresa
-- ----------------------------
DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa`  (
  `id_empresa` int NOT NULL AUTO_INCREMENT,
  `razon_social` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `ruc` bigint NOT NULL,
  `direccion` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `marca` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `serie_boleta` varchar(4) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `nro_correlativo_venta` varchar(8) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `moneda` varchar(5) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `celular` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `nombre_moneda` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `imagen` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `igv` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `cuenta` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `nro_cuenta` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `nombre_sistema` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `tipo_impuesto` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `soles` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `centimos` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_empresa`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of empresa
-- ----------------------------
INSERT INTO `empresa` VALUES (1, 'Tienda de Ropa \"Mi Juanita\"', 10467291241, 'Ciudad Blanca Parte Alta 2', '', '', '', 'gmasiasdeveloper@gmail.com', 'S/', '922804671', 'soles', '659f1ff241e72_952.jpg', '0.18', 'INTERBANK', '733-0565689-5656', 'Sistema Ropa', 'IGV', 'SOLES', 'CENTIMOS');

-- ----------------------------
-- Table structure for forma_pago
-- ----------------------------
DROP TABLE IF EXISTS `forma_pago`;
CREATE TABLE `forma_pago`  (
  `fpago_id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `estado` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`fpago_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of forma_pago
-- ----------------------------

-- ----------------------------
-- Table structure for kardex
-- ----------------------------
DROP TABLE IF EXISTS `kardex`;
CREATE TABLE `kardex`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo_producto` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `fecha` datetime NULL DEFAULT NULL,
  `concepto` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `comprobante` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `in_unidades` float NULL DEFAULT NULL,
  `in_cant_unid` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `in_costo_unitario` float NULL DEFAULT NULL,
  `in_costo_total` float NULL DEFAULT NULL,
  `out_unidades` float NULL DEFAULT NULL,
  `out_cant_unid` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `out_costo_unitario` float NULL DEFAULT NULL,
  `out_costo_total` float NULL DEFAULT NULL,
  `ex_unidades` float NULL DEFAULT NULL,
  `ex_costo_unitario` float NULL DEFAULT NULL,
  `ex_costo_total` float NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_id_producto_idx`(`codigo_producto` ASC) USING BTREE,
  CONSTRAINT `fk_cod_producto_kardex` FOREIGN KEY (`codigo_producto`) REFERENCES `productos` (`codigo_producto`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kardex
-- ----------------------------

-- ----------------------------
-- Table structure for kardex2
-- ----------------------------
DROP TABLE IF EXISTS `kardex2`;
CREATE TABLE `kardex2`  (
  `kardex_id` int NOT NULL AUTO_INCREMENT,
  `kardex_fecha` date NULL DEFAULT NULL,
  `kardex_tipo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kardex_ingreso` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kardex_p_ingreso` decimal(10, 2) NULL DEFAULT NULL,
  `kardex_salida` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kardex_p_salida` decimal(10, 2) NULL DEFAULT NULL,
  `kardex_total` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kardex_precio_general` decimal(10, 2) NULL DEFAULT NULL,
  `codigo_producto` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `producto_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `venta_comprobante` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kardex_id`) USING BTREE,
  INDEX `producto_id`(`codigo_producto` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kardex2
-- ----------------------------

-- ----------------------------
-- Table structure for medida
-- ----------------------------
DROP TABLE IF EXISTS `medida`;
CREATE TABLE `medida`  (
  `id_medida` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `abreviatura` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_medida`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of medida
-- ----------------------------
INSERT INTO `medida` VALUES (1, 'Unidad', 'Und');
INSERT INTO `medida` VALUES (2, 'Sacos', 'Saco');
INSERT INTO `medida` VALUES (4, 'Pares', 'Par');
INSERT INTO `medida` VALUES (5, 'Docena', 'doce');

-- ----------------------------
-- Table structure for modulos
-- ----------------------------
DROP TABLE IF EXISTS `modulos`;
CREATE TABLE `modulos`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `modulo` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `padre_id` int NULL DEFAULT NULL,
  `vista` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `icon_menu` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `orden` int NULL DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT NULL,
  `fecha_actualizacion` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 53 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of modulos
-- ----------------------------
INSERT INTO `modulos` VALUES (1, 'Tablero Principal', 0, 'dashboard.php', 'fas fa-tachometer-alt', 0, NULL, NULL);
INSERT INTO `modulos` VALUES (2, 'Ventas', 0, '', 'fas fa-store-alt', 4, NULL, NULL);
INSERT INTO `modulos` VALUES (3, 'Punto de Venta', 2, 'ventas.php', 'far fa-circle', 5, NULL, NULL);
INSERT INTO `modulos` VALUES (5, 'Productos', 0, NULL, 'fas fa-cart-plus', 8, NULL, NULL);
INSERT INTO `modulos` VALUES (6, 'Articulos', 5, 'productos.php', 'far fa-circle', 9, NULL, NULL);
INSERT INTO `modulos` VALUES (8, 'Categorías', 5, 'categorias.php', 'far fa-circle', 10, NULL, NULL);
INSERT INTO `modulos` VALUES (10, 'Reporte ventas', 0, '', 'fas fa-chart-line ', 26, NULL, NULL);
INSERT INTO `modulos` VALUES (11, 'Empresa', 46, 'configuracion.php', 'far fa-circle', 16, NULL, NULL);
INSERT INTO `modulos` VALUES (12, 'Usuarios', 26, 'usuarios.php', 'fas fa-users', 22, NULL, NULL);
INSERT INTO `modulos` VALUES (13, 'Roles y Perfiles', 26, 'modulos_perfiles.php', 'fas fa-tablet-alt', 23, NULL, NULL);
INSERT INTO `modulos` VALUES (15, 'Apertura Caja', 36, 'caja.php', 'far fa-circle', 2, '2022-12-05 04:44:08', NULL);
INSERT INTO `modulos` VALUES (17, 'Compras', 0, '', 'fa fa-cart-arrow-down', 18, NULL, NULL);
INSERT INTO `modulos` VALUES (24, 'Tallas', 5, 'talla.php', 'far fa-circle', 11, NULL, NULL);
INSERT INTO `modulos` VALUES (25, 'Color', 5, 'color.php', 'far fa-circle', 12, NULL, NULL);
INSERT INTO `modulos` VALUES (26, 'Mantenimiento', 0, '', 'fas fa-user-cog', 21, NULL, NULL);
INSERT INTO `modulos` VALUES (27, 'Clientes / Prov', 0, 'cliente.php', 'fas fa-id-card', 14, NULL, NULL);
INSERT INTO `modulos` VALUES (28, 'Unidad Medida', 5, 'medida.php', 'far fa-circle', 13, NULL, NULL);
INSERT INTO `modulos` VALUES (29, 'Listado Ventas', 2, 'listado_ventas.php', 'far fa-circle', 6, NULL, NULL);
INSERT INTO `modulos` VALUES (31, 'Inventario', 0, '', 'fas fa-home', 24, NULL, NULL);
INSERT INTO `modulos` VALUES (32, 'Entrada / Salidas', 31, 'ensal.php', 'far fa-circle', 25, NULL, NULL);
INSERT INTO `modulos` VALUES (33, 'Ingresar', 17, 'compras.php', 'far fa-circle', 19, NULL, NULL);
INSERT INTO `modulos` VALUES (34, 'Listado Compras', 17, 'listado_compras.php', 'far fa-circle', 20, NULL, NULL);
INSERT INTO `modulos` VALUES (35, 'Ingresos / Egre', 36, 'ingresos.php', 'far fa-circle', 3, NULL, NULL);
INSERT INTO `modulos` VALUES (36, 'Caja', 0, '', 'fas fa-cash-register', 1, NULL, NULL);
INSERT INTO `modulos` VALUES (37, 'Reporte Compras', 0, '', 'fas fa-chart-line', 30, NULL, NULL);
INSERT INTO `modulos` VALUES (38, 'Reportes Ventas', 10, 'reporte_ventas.php', 'far fa-circle', 27, NULL, NULL);
INSERT INTO `modulos` VALUES (39, 'Pivot', 10, 'pivot.php', 'far fa-circle ', 29, NULL, NULL);
INSERT INTO `modulos` VALUES (40, 'Reportes Compras', 37, 'reporte_compras.php', 'far fa-circle', 31, NULL, NULL);
INSERT INTO `modulos` VALUES (41, 'Pivot Compras', 37, 'pivot_compras.php', 'far fa-circle ', 32, NULL, NULL);
INSERT INTO `modulos` VALUES (42, 'Reporte Producto', 0, '', 'fas fa-chart-line', 33, NULL, NULL);
INSERT INTO `modulos` VALUES (43, 'Reporte Movi.', 0, '', 'fas fa-chart-line', 35, NULL, NULL);
INSERT INTO `modulos` VALUES (44, 'Por Producto', 42, 'reporte_producto.php', 'far fa-circle ', 34, NULL, NULL);
INSERT INTO `modulos` VALUES (45, 'Rpte. Movimientos', 43, 'reporte_movimientos.php', 'far fa-circle', 36, NULL, NULL);
INSERT INTO `modulos` VALUES (46, 'Configuracion', 0, '', 'fas fa-cogs', 15, NULL, NULL);
INSERT INTO `modulos` VALUES (47, 'Comprobantes', 46, 'comprobantes.php', 'far fa-circle ', 17, NULL, NULL);
INSERT INTO `modulos` VALUES (48, 'Cotizaciones', 0, '', 'fas fa-file-alt', 37, NULL, NULL);
INSERT INTO `modulos` VALUES (49, 'Reg. Cotizacion', 48, 'cotizacion.php', 'far fa-circle', 38, NULL, NULL);
INSERT INTO `modulos` VALUES (50, 'Lista Cotizacion', 48, 'listado_cotizacion.php', 'far fa-circle fs-6 text-white', 39, NULL, NULL);
INSERT INTO `modulos` VALUES (51, 'Ventas a Credito', 2, 'ventas_credito.php', 'far fa-circle fs-6 text-white', 7, NULL, NULL);
INSERT INTO `modulos` VALUES (52, 'Reporte Venta Credito', 10, 'reporte_venta_credito.php', 'far fa-circle fs-6 text-white', 28, NULL, NULL);

-- ----------------------------
-- Table structure for monedas
-- ----------------------------
DROP TABLE IF EXISTS `monedas`;
CREATE TABLE `monedas`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of monedas
-- ----------------------------

-- ----------------------------
-- Table structure for movimientos
-- ----------------------------
DROP TABLE IF EXISTS `movimientos`;
CREATE TABLE `movimientos`  (
  `movimientos_id` int NOT NULL AUTO_INCREMENT,
  `movi_tipo` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `movi_descripcion` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `movi_monto` float NULL DEFAULT NULL,
  `movi_fecha` datetime NULL DEFAULT NULL,
  `movi_caja` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `caja_id` int NULL DEFAULT NULL,
  `movi_responsable` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`movimientos_id`) USING BTREE,
  INDEX `caja_id`(`caja_id` ASC) USING BTREE,
  CONSTRAINT `movimientos_ibfk_1` FOREIGN KEY (`caja_id`) REFERENCES `caja` (`caja_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of movimientos
-- ----------------------------

-- ----------------------------
-- Table structure for perfil_modulo
-- ----------------------------
DROP TABLE IF EXISTS `perfil_modulo`;
CREATE TABLE `perfil_modulo`  (
  `idperfil_modulo` int NOT NULL AUTO_INCREMENT,
  `id_perfil` int NULL DEFAULT NULL,
  `id_modulo` int NULL DEFAULT NULL,
  `vista_inicio` tinyint NULL DEFAULT NULL,
  `estado` tinyint NULL DEFAULT NULL,
  PRIMARY KEY (`idperfil_modulo`) USING BTREE,
  INDEX `id_perfil`(`id_perfil` ASC) USING BTREE,
  INDEX `id_modulo`(`id_modulo` ASC) USING BTREE,
  CONSTRAINT `id_modulo` FOREIGN KEY (`id_modulo`) REFERENCES `modulos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `id_perfil` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id_perfil`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1016 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of perfil_modulo
-- ----------------------------
INSERT INTO `perfil_modulo` VALUES (13, 1, 13, NULL, 1);
INSERT INTO `perfil_modulo` VALUES (948, 1, 1, 1, 1);
INSERT INTO `perfil_modulo` VALUES (949, 1, 15, 0, 1);
INSERT INTO `perfil_modulo` VALUES (950, 1, 36, 0, 1);
INSERT INTO `perfil_modulo` VALUES (951, 1, 35, 0, 1);
INSERT INTO `perfil_modulo` VALUES (952, 1, 3, 0, 1);
INSERT INTO `perfil_modulo` VALUES (953, 1, 2, 0, 1);
INSERT INTO `perfil_modulo` VALUES (954, 1, 29, 0, 1);
INSERT INTO `perfil_modulo` VALUES (955, 1, 51, 0, 1);
INSERT INTO `perfil_modulo` VALUES (956, 1, 6, 0, 1);
INSERT INTO `perfil_modulo` VALUES (957, 1, 5, 0, 1);
INSERT INTO `perfil_modulo` VALUES (958, 1, 8, 0, 1);
INSERT INTO `perfil_modulo` VALUES (959, 1, 24, 0, 1);
INSERT INTO `perfil_modulo` VALUES (960, 1, 28, 0, 1);
INSERT INTO `perfil_modulo` VALUES (961, 1, 27, 0, 1);
INSERT INTO `perfil_modulo` VALUES (962, 1, 11, 0, 1);
INSERT INTO `perfil_modulo` VALUES (963, 1, 46, 0, 1);
INSERT INTO `perfil_modulo` VALUES (964, 1, 47, 0, 1);
INSERT INTO `perfil_modulo` VALUES (965, 1, 33, 0, 1);
INSERT INTO `perfil_modulo` VALUES (966, 1, 17, 0, 1);
INSERT INTO `perfil_modulo` VALUES (967, 1, 34, 0, 1);
INSERT INTO `perfil_modulo` VALUES (968, 1, 12, 0, 1);
INSERT INTO `perfil_modulo` VALUES (969, 1, 26, 0, 1);
INSERT INTO `perfil_modulo` VALUES (970, 1, 32, 0, 1);
INSERT INTO `perfil_modulo` VALUES (971, 1, 31, 0, 1);
INSERT INTO `perfil_modulo` VALUES (972, 1, 38, 0, 1);
INSERT INTO `perfil_modulo` VALUES (973, 1, 10, 0, 1);
INSERT INTO `perfil_modulo` VALUES (974, 1, 39, 0, 1);
INSERT INTO `perfil_modulo` VALUES (975, 1, 40, 0, 1);
INSERT INTO `perfil_modulo` VALUES (976, 1, 37, 0, 1);
INSERT INTO `perfil_modulo` VALUES (977, 1, 41, 0, 1);
INSERT INTO `perfil_modulo` VALUES (978, 1, 44, 0, 1);
INSERT INTO `perfil_modulo` VALUES (979, 1, 42, 0, 1);
INSERT INTO `perfil_modulo` VALUES (980, 1, 45, 0, 1);
INSERT INTO `perfil_modulo` VALUES (981, 1, 43, 0, 1);
INSERT INTO `perfil_modulo` VALUES (982, 1, 49, 0, 1);
INSERT INTO `perfil_modulo` VALUES (983, 1, 48, 0, 1);
INSERT INTO `perfil_modulo` VALUES (984, 1, 50, 0, 1);
INSERT INTO `perfil_modulo` VALUES (985, 1, 52, 0, 1);
INSERT INTO `perfil_modulo` VALUES (986, 2, 1, 1, 1);
INSERT INTO `perfil_modulo` VALUES (987, 2, 15, 0, 1);
INSERT INTO `perfil_modulo` VALUES (988, 2, 36, 0, 1);
INSERT INTO `perfil_modulo` VALUES (989, 2, 35, 0, 1);
INSERT INTO `perfil_modulo` VALUES (990, 2, 3, 0, 1);
INSERT INTO `perfil_modulo` VALUES (991, 2, 2, 0, 1);
INSERT INTO `perfil_modulo` VALUES (992, 2, 29, 0, 1);
INSERT INTO `perfil_modulo` VALUES (993, 2, 51, 0, 1);
INSERT INTO `perfil_modulo` VALUES (994, 2, 6, 0, 1);
INSERT INTO `perfil_modulo` VALUES (995, 2, 5, 0, 1);
INSERT INTO `perfil_modulo` VALUES (996, 2, 8, 0, 1);
INSERT INTO `perfil_modulo` VALUES (997, 2, 24, 0, 1);
INSERT INTO `perfil_modulo` VALUES (998, 2, 28, 0, 1);
INSERT INTO `perfil_modulo` VALUES (999, 2, 27, 0, 1);
INSERT INTO `perfil_modulo` VALUES (1000, 2, 33, 0, 1);
INSERT INTO `perfil_modulo` VALUES (1001, 2, 17, 0, 1);
INSERT INTO `perfil_modulo` VALUES (1002, 2, 34, 0, 1);
INSERT INTO `perfil_modulo` VALUES (1003, 2, 32, 0, 1);
INSERT INTO `perfil_modulo` VALUES (1004, 2, 31, 0, 1);
INSERT INTO `perfil_modulo` VALUES (1005, 2, 38, 0, 1);
INSERT INTO `perfil_modulo` VALUES (1006, 2, 10, 0, 1);
INSERT INTO `perfil_modulo` VALUES (1007, 2, 39, 0, 1);
INSERT INTO `perfil_modulo` VALUES (1008, 2, 40, 0, 1);
INSERT INTO `perfil_modulo` VALUES (1009, 2, 37, 0, 1);
INSERT INTO `perfil_modulo` VALUES (1010, 2, 41, 0, 1);
INSERT INTO `perfil_modulo` VALUES (1011, 2, 44, 0, 1);
INSERT INTO `perfil_modulo` VALUES (1012, 2, 42, 0, 1);
INSERT INTO `perfil_modulo` VALUES (1013, 2, 45, 0, 1);
INSERT INTO `perfil_modulo` VALUES (1014, 2, 43, 0, 1);
INSERT INTO `perfil_modulo` VALUES (1015, 2, 52, 0, 1);

-- ----------------------------
-- Table structure for perfiles
-- ----------------------------
DROP TABLE IF EXISTS `perfiles`;
CREATE TABLE `perfiles`  (
  `id_perfil` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `estado` tinyint NULL DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT NULL,
  `fecha_actualizacion` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_perfil`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of perfiles
-- ----------------------------
INSERT INTO `perfiles` VALUES (1, 'Administrador', 1, NULL, NULL);
INSERT INTO `perfiles` VALUES (2, 'Vendedor', 1, NULL, NULL);
INSERT INTO `perfiles` VALUES (4, 'CAJERO', 1, NULL, NULL);

-- ----------------------------
-- Table structure for productos
-- ----------------------------
DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos`  (
  `codigo_producto` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `id_categoria_producto` int NULL DEFAULT NULL,
  `descripcion_producto` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL,
  `precio_compra_producto` float NOT NULL,
  `precio_venta_producto` float NOT NULL,
  `precio_mayor_producto` float NULL DEFAULT NULL,
  `precio_oferta_producto` float NULL DEFAULT NULL,
  `stock_producto` float NULL DEFAULT NULL,
  `minimo_stock_producto` float NULL DEFAULT NULL,
  `ventas_producto` float NULL DEFAULT NULL,
  `costo_total_producto` float NULL DEFAULT NULL,
  `fecha_creacion_producto` date NULL DEFAULT NULL,
  `fecha_actualizacion_producto` date NULL DEFAULT NULL,
  `estado` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `id_talla` int NULL DEFAULT NULL,
  `id_medida` int NULL DEFAULT NULL,
  `imagen_p` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`codigo_producto`) USING BTREE,
  UNIQUE INDEX `codigo_producto_UNIQUE`(`codigo_producto` ASC) USING BTREE,
  INDEX `fk_id_categoria_idx`(`id_categoria_producto` ASC) USING BTREE,
  INDEX `id_talla`(`id_talla` ASC) USING BTREE,
  INDEX `id_medida`(`id_medida` ASC) USING BTREE,
  CONSTRAINT `fk_id_categoria` FOREIGN KEY (`id_categoria_producto`) REFERENCES `categorias` (`id_categoria`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_talla`) REFERENCES `talla` (`id_talla`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_medida`) REFERENCES `medida` (`id_medida`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb3 COLLATE = utf8mb3_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of productos
-- ----------------------------

-- ----------------------------
-- Table structure for proveedores
-- ----------------------------
DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE `proveedores`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `ruc` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `razon_social` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `direccion` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of proveedores
-- ----------------------------

-- ----------------------------
-- Table structure for talla
-- ----------------------------
DROP TABLE IF EXISTS `talla`;
CREATE TABLE `talla`  (
  `id_talla` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_talla`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of talla
-- ----------------------------
INSERT INTO `talla` VALUES (1, 'S');
INSERT INTO `talla` VALUES (2, 'M');
INSERT INTO `talla` VALUES (3, 'L');
INSERT INTO `talla` VALUES (6, '40');
INSERT INTO `talla` VALUES (7, '42');
INSERT INTO `talla` VALUES (8, 'XL');
INSERT INTO `talla` VALUES (9, '39');
INSERT INTO `talla` VALUES (10, '41');

-- ----------------------------
-- Table structure for talla_producto
-- ----------------------------
DROP TABLE IF EXISTS `talla_producto`;
CREATE TABLE `talla_producto`  (
  `id_talla_producto` int NOT NULL AUTO_INCREMENT,
  `codigo_producto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_talla` int NULL DEFAULT NULL,
  `stock` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_talla_producto`) USING BTREE,
  INDEX `id_talla`(`id_talla` ASC) USING BTREE,
  CONSTRAINT `talla_producto_ibfk_1` FOREIGN KEY (`id_talla`) REFERENCES `talla` (`id_talla`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of talla_producto
-- ----------------------------

-- ----------------------------
-- Table structure for tipo_comprobante
-- ----------------------------
DROP TABLE IF EXISTS `tipo_comprobante`;
CREATE TABLE `tipo_comprobante`  (
  `id` varchar(3) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `descripcion` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tipo_comprobante
-- ----------------------------
INSERT INTO `tipo_comprobante` VALUES ('', 'Boleta');
INSERT INTO `tipo_comprobante` VALUES ('F01', 'Factura');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `apellido_usuario` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `usuario` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `clave` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL,
  `id_perfil_usuario` int NULL DEFAULT NULL,
  `estado` tinyint NULL DEFAULT NULL,
  PRIMARY KEY (`id_usuario`) USING BTREE,
  INDEX `id_perfil_usuario`(`id_perfil_usuario` ASC) USING BTREE,
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_perfil_usuario`) REFERENCES `perfiles` (`id_perfil`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (4, 'Gustavo', 'Masias', 'gmasias', '$2a$07$azybxcags23425sdg23sdeWdBD5K/WLuiEyQ3M9yIJwhDvhbblzKK', 1, 1);
INSERT INTO `usuarios` VALUES (5, 'prueba', 'prueba', 'prueba', '$2a$07$azybxcags23425sdg23sdemRuHOE7dGp6OuuwTVOX3TACOEE/3QoG', 2, 1);

-- ----------------------------
-- Table structure for venta_cabecera
-- ----------------------------
DROP TABLE IF EXISTS `venta_cabecera`;
CREATE TABLE `venta_cabecera`  (
  `nro_boleta` varchar(13) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL,
  `subtotal` float NOT NULL,
  `igv` float NOT NULL,
  `total_venta` float NULL DEFAULT NULL,
  `fecha_venta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `venta_estado` enum('REGISTRADA','ANULADA','CREDITO','PAGADA') CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `id_usuario` int NULL DEFAULT NULL,
  `cliente_id` int NULL DEFAULT NULL,
  `compro_id` int NULL DEFAULT NULL,
  `serie` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `f_pago` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `monto_efectivo` decimal(10, 2) NULL DEFAULT NULL,
  `f_pago_ope` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `monto_transfe` decimal(10, 2) NULL DEFAULT NULL,
  `estado_caja` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `caja_id` int NULL DEFAULT NULL,
  `descuento` decimal(10, 2) NULL DEFAULT NULL,
  `abonado` decimal(10, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`nro_boleta`) USING BTREE,
  INDEX `id_usuario`(`id_usuario` ASC) USING BTREE,
  INDEX `cliente_id`(`cliente_id` ASC) USING BTREE,
  INDEX `compro_id`(`compro_id` ASC) USING BTREE,
  INDEX `caja_id`(`caja_id` ASC) USING BTREE,
  CONSTRAINT `venta_cabecera_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `venta_cabecera_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`cliente_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `venta_cabecera_ibfk_3` FOREIGN KEY (`compro_id`) REFERENCES `comprobante` (`compro_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `venta_cabecera_ibfk_4` FOREIGN KEY (`caja_id`) REFERENCES `caja` (`caja_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb3 COLLATE = utf8mb3_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of venta_cabecera
-- ----------------------------

-- ----------------------------
-- Table structure for venta_credito
-- ----------------------------
DROP TABLE IF EXISTS `venta_credito`;
CREATE TABLE `venta_credito`  (
  `id_credito` int NOT NULL AUTO_INCREMENT,
  `nro_boleta` varchar(13) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `monto` decimal(10, 2) NULL DEFAULT NULL,
  `fecha_pago` datetime NULL DEFAULT NULL,
  `estado` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `caja_estado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `caja_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_credito`) USING BTREE,
  INDEX `nro_boleta`(`nro_boleta` ASC) USING BTREE,
  CONSTRAINT `venta_credito_ibfk_1` FOREIGN KEY (`nro_boleta`) REFERENCES `venta_cabecera` (`nro_boleta`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of venta_credito
-- ----------------------------

-- ----------------------------
-- Table structure for venta_detalle
-- ----------------------------
DROP TABLE IF EXISTS `venta_detalle`;
CREATE TABLE `venta_detalle`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nro_boleta` varchar(13) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `codigo_producto` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `cantidad` float NOT NULL,
  `costo_unitario_venta` float NULL DEFAULT NULL,
  `precio_unitario_venta` float NULL DEFAULT NULL,
  `total_venta` decimal(10, 2) NOT NULL,
  `fecha_venta` date NOT NULL,
  `venta_estado` enum('REGISTRADA','ANULADA','CREDITO','PAGADA') CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `precio_ofertas` decimal(10, 2) NULL DEFAULT NULL,
  `id_talla` int NULL DEFAULT NULL,
  `vd_descuento` decimal(10, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_nro_boleta_idx`(`nro_boleta` ASC) USING BTREE,
  INDEX `fk_cod_producto_idx`(`codigo_producto` ASC) USING BTREE,
  CONSTRAINT `fk_cod_producto_detalle` FOREIGN KEY (`codigo_producto`) REFERENCES `productos` (`codigo_producto`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_nro_boleta` FOREIGN KEY (`nro_boleta`) REFERENCES `venta_cabecera` (`nro_boleta`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of venta_detalle
-- ----------------------------

-- ----------------------------
-- Procedure structure for prc_ActualizarDetalleVenta
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_ActualizarDetalleVenta`;
delimiter ;;
CREATE PROCEDURE `prc_ActualizarDetalleVenta`(IN `p_codigo_producto` VARCHAR(20), IN `p_cantidad` FLOAT, IN `p_id` INT)
BEGIN

 declare v_nro_boleta varchar(20);
 declare v_total_venta float;

/*
ACTUALIZAR EL STOCK DEL PRODUCTO QUE SEA MODIFICADO
......
.....
.......
*/

/*
ACTULIZAR CODIGO, CANTIDAD Y TOTAL DEL ITEM MODIFICADO
*/

 UPDATE venta_detalle 
 SET codigo_producto = p_codigo_producto, 
 cantidad = p_cantidad, 
 total_venta = (p_cantidad * (select precio_venta_producto from productos where codigo_producto = p_codigo_producto))
 WHERE id = p_id;
 
 set v_nro_boleta = (select nro_boleta from venta_detalle where id = p_id);
 set v_total_venta = (select sum(total_venta) from venta_detalle where nro_boleta = v_nro_boleta);
 
 update venta_cabecera
   set total_venta = v_total_venta
 where nro_boleta = v_nro_boleta;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for prc_actualizar_kardex_existencias
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_actualizar_kardex_existencias`;
delimiter ;;
CREATE PROCEDURE `prc_actualizar_kardex_existencias`(IN `p_codigo_producto` VARCHAR ( 25 ),
	IN `p_costo_unitario` FLOAT,
	IN `p_costo_total` FLOAT)
BEGIN
	UPDATE  kardex SET 
	ex_costo_unitario = p_costo_unitario, 
	ex_costo_total = p_costo_total
	WHERE codigo_producto = p_codigo_producto;
	
	UPDATE kardex2 SET
	kardex_p_ingreso = p_costo_unitario
	WHERE codigo_producto = p_codigo_producto;
	
	


END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for prc_eliminar_compra
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_eliminar_compra`;
delimiter ;;
CREATE PROCEDURE `prc_eliminar_compra`(IN `p_nro_compra` VARCHAR(20))
BEGIN

DECLARE v_codigo VARCHAR(20);
DECLARE v_cantidad FLOAT;
DECLARE v_talla INT;
DECLARE done INT DEFAULT FALSE;

DECLARE cursor_i CURSOR FOR 
SELECT codigo_producto,cantidad, id_talla 
FROM compra_detalle 
where nro_compra =p_nro_compra  ;

DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

OPEN cursor_i;
read_loop: LOOP
FETCH cursor_i INTO v_codigo, v_cantidad, v_talla;

	IF done THEN
	  LEAVE read_loop;
	END IF;
    
    UPDATE productos 
       SET stock_producto = stock_producto - v_cantidad
    WHERE codigo_producto  = v_codigo ;
		
		UPDATE talla_producto SET 
		stock = stock - v_cantidad
    WHERE codigo_producto  COLLATE utf8mb4_general_ci = v_codigo and id_talla = v_talla;
    
END LOOP;
CLOSE cursor_i;

			UPDATE compra_cabecera
			SET compra_estado = 'ANULADA'
			WHERE nro_compra  = p_nro_compra ;
			
			UPDATE compra_detalle
			SET estado = 'ANULADA'
			WHERE nro_compra  = p_nro_compra;
			
			UPDATE kardex2 SET
			kardex_tipo = 'COMPRA/ANULADA'
			WHERE venta_comprobante = p_nro_compra;
			
			DELETE FROM kardex where comprobante = p_nro_compra;

-- DELETE FROM VENTA_DETALLE WHERE CAST(nro_boleta AS CHAR CHARACTER SET utf8) = CAST(p_nro_compra AS CHAR CHARACTER SET utf8) ;
-- DELETE FROM VENTA_CABECERA WHERE CAST(nro_boleta AS CHAR CHARACTER SET utf8)  = CAST(p_nro_compra AS CHAR CHARACTER SET utf8) ;

SELECT 'Se Anulo correctamente la Compra';
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for prc_eliminar_venta
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_eliminar_venta`;
delimiter ;;
CREATE PROCEDURE `prc_eliminar_venta`(IN `p_nro_boleta` VARCHAR(20))
BEGIN

DECLARE v_codigo VARCHAR(20);
DECLARE v_cantidad FLOAT;
DECLARE v_talla INT;
DECLARE done INT DEFAULT FALSE;

DECLARE cursor_i CURSOR FOR 
SELECT codigo_producto,cantidad, id_talla 
FROM venta_detalle 
where nro_boleta =p_nro_boleta  ;

DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

OPEN cursor_i;
read_loop: LOOP
FETCH cursor_i INTO v_codigo, v_cantidad, v_talla;

	IF done THEN
	  LEAVE read_loop;
	END IF;
    
    UPDATE productos 
       SET stock_producto = stock_producto + v_cantidad
    WHERE codigo_producto  = v_codigo ;
		
		UPDATE talla_producto SET 
		stock = stock + v_cantidad
    WHERE codigo_producto  = v_codigo and id_talla = v_talla;
    
END LOOP;
CLOSE cursor_i;

			UPDATE venta_cabecera
			SET venta_estado = 'ANULADA'
			WHERE nro_boleta  = p_nro_boleta ;
			
			UPDATE venta_detalle
			SET venta_estado = 'ANULADA'
			WHERE nro_boleta  = p_nro_boleta;
			
			UPDATE kardex2 SET
			kardex_tipo = 'VENTA/ANULADA'
			WHERE venta_comprobante = p_nro_boleta;
			
			DELETE FROM kardex where comprobante = p_nro_boleta;

-- DELETE FROM VENTA_DETALLE WHERE CAST(nro_boleta AS CHAR CHARACTER SET utf8) = CAST(p_nro_boleta AS CHAR CHARACTER SET utf8) ;
-- DELETE FROM VENTA_CABECERA WHERE CAST(nro_boleta AS CHAR CHARACTER SET utf8)  = CAST(p_nro_boleta AS CHAR CHARACTER SET utf8) ;

SELECT 'Se Anulo correctamente la venta';
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for prc_ListarCategorias
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_ListarCategorias`;
delimiter ;;
CREATE PROCEDURE `prc_ListarCategorias`()
BEGIN
select * from categorias;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for prc_ListarProductos
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_ListarProductos`;
delimiter ;;
CREATE PROCEDURE `prc_ListarProductos`()
SELECT   '' as detalles,
		codigo_producto,
		id_categoria_producto,
		nombre_categoria,
		descripcion_producto,
		ROUND(precio_compra_producto,2) as precio_compra_producto,
		ROUND(precio_venta_producto,2) as precio_venta_producto,
        ROUND(precio_mayor_producto,2) as precio_mayor_producto,
        ROUND(precio_oferta_producto,2) as precio_oferta_producto,
		case when c.aplica_peso = 1 then concat(stock_producto)
			else concat(stock_producto, ' ', m.abreviatura) end as stock_producto,
		case when c.aplica_peso = 1 then concat(minimo_stock_producto)
			else concat(minimo_stock_producto , ' ', m.abreviatura) end as minimo_stock_producto,
		case when c.aplica_peso = 1 then concat(ventas_producto) 
			else concat(ventas_producto) end as ventas_producto,
		ROUND(costo_total_producto,2) as costo_total_producto,
		fecha_creacion_producto,
		fecha_actualizacion_producto,
		'' as acciones,
		p.estado as est,
		-- p.id_talla,
		-- t.descripcion,
		p.id_medida,
		m.descripcion,
		m.abreviatura,
		p.stock_producto as stock,
		p.minimo_stock_producto as min_stock,
		p.imagen_p
	FROM productos p INNER JOIN categorias c 
	on p.id_categoria_producto = c.id_categoria 
	
	INNER JOIN medida m
	on p.id_medida = m.id_medida
	order by p.codigo_producto desc
;;
delimiter ;

-- ----------------------------
-- Procedure structure for prc_ListarProductosMasVendidos
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_ListarProductosMasVendidos`;
delimiter ;;
CREATE PROCEDURE `prc_ListarProductosMasVendidos`()
  NO SQL 
BEGIN

select  p.codigo_producto,
		p.descripcion_producto,
        sum(vd.cantidad) as cantidad,
        sum(Round(vd.total_venta,2)) as total_venta
from venta_detalle vd inner join productos p on vd.codigo_producto = p.codigo_producto
group by p.codigo_producto,
		p.descripcion_producto
order by  sum(Round(vd.total_venta,2)) DESC
limit 10;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for prc_ListarProductosPocoStock
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_ListarProductosPocoStock`;
delimiter ;;
CREATE PROCEDURE `prc_ListarProductosPocoStock`()
  NO SQL 
BEGIN
select p.codigo_producto,
		p.descripcion_producto,
        p.stock_producto,
        p.minimo_stock_producto
from productos p
where p.stock_producto <= p.minimo_stock_producto
order by p.stock_producto asc;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for prc_movimientos_por_producto
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_movimientos_por_producto`;
delimiter ;;
CREATE PROCEDURE `prc_movimientos_por_producto`(IN COD VARCHAR(20))
SELECT
vd.codigo_producto,
	vd.nro_boleta,
	c.cliente_nombres,
	DATE_FORMAT(vd.fecha_venta, '%d/%m/%Y') as fecha, 
	vd.cantidad,
	vd.precio_ofertas,
	vd.total_venta ,
	vc.cliente_id
	

FROM
	venta_detalle vd inner join venta_cabecera vc on 
	vc.nro_boleta = vd.nro_boleta
	INNER JOIN clientes c on
	vc.cliente_id = c.cliente_id
WHERE
	codigo_producto = COD AND vd.venta_estado = 'REGISTRADA'
;;
delimiter ;

-- ----------------------------
-- Procedure structure for prc_movimientos_por_producto_kardex
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_movimientos_por_producto_kardex`;
delimiter ;;
CREATE PROCEDURE `prc_movimientos_por_producto_kardex`(IN COD VARCHAR(20))
SELECT
	codigo_producto,
	IFNULL(venta_comprobante, '-') as comprobante,
	kardex_tipo,
	DATE_FORMAT(kardex_fecha, '%d/%m/%Y') as fecha, 
	kardex_ingreso,
	kardex_salida
FROM
	kardex2 
WHERE
	codigo_producto COLLATE utf8mb4_general_ci = COD 
	AND kardex_tipo IN ( 'INGRESO DIRECTO', 'SALIDA DIRECTA', 'VENTA', 'INVENTARIO INICIAL' , 'COMPRA') 
	
	
	
	-- 32202311629 32202310253
;;
delimiter ;

-- ----------------------------
-- Procedure structure for prc_ObtenerComprasMesActual
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_ObtenerComprasMesActual`;
delimiter ;;
CREATE PROCEDURE `prc_ObtenerComprasMesActual`()
  NO SQL 
BEGIN
SELECT DATE(cc.fecha) as fecha_compra,
		SUM(ROUND(cc.total_compra,2)) as total_compra,
        (SELECT SUM(ROUND(cc1.total_compra,2))
			FROM compra_cabecera cc1
		where DATE(cc1.fecha) >= DATE(last_day(CONVERT_TZ(NOW(),'SYSTEM','-05:00') - INTERVAL 2 month) + INTERVAL 1 day)
		and DATE(cc1.fecha) <= last_day(last_day(CONVERT_TZ(NOW(),'SYSTEM','-05:00') - INTERVAL 2 month) + INTERVAL 1 day)
      -- and DATE(cc1.fecha_comprobante) = DATE_ADD(cc1.fecha_comprobante, INTERVAL -1 MONTH)
		group by DATE(cc1.fecha)) as total_compra_ant
FROM compra_cabecera cc
where DATE(cc.fecha) >= DATE(last_day(CONVERT_TZ(NOW(),'SYSTEM','-05:00') - INTERVAL 1 month) + INTERVAL 1 day)
and DATE(cc.fecha) <= last_day(DATE(CONVERT_TZ(NOW(),'SYSTEM','-05:00')))
and cc.compra_estado = 'REGISTRADA'
group by DATE(cc.fecha);

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for prc_ObtenerDatosDashboard
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_ObtenerDatosDashboard`;
delimiter ;;
CREATE PROCEDURE `prc_ObtenerDatosDashboard`()
BEGIN
  DECLARE totalProductos int;
  DECLARE totalCompras float;
  DECLARE totalVentas float;
	DECLARE totalabonos float;
	DECLARE totalabonoshoy float;
	DECLARE totalabonoshoysuma float;
  DECLARE ganancias float;
  DECLARE productosPocoStock int;
  DECLARE ventasHoy float;
	DECLARE monedasimbolo VARCHAR(10);
	
	DECLARE ventasycreditos float;
	
	 SET monedasimbolo = (SELECT moneda FROM empresa);
	
  SET totalProductos = (SELECT COUNT(*)FROM productos);
	
  SET totalCompras = (SELECT SUM(p.costo_total_producto) FROM productos p);

  SET totalVentas = (SELECT SUM(vc.total_venta) FROM venta_cabecera vc where vc.venta_estado = 'REGISTRADA' AND MONTH(vc.fecha_venta) = MONTH(DATE(CONVERT_TZ(NOW(),'SYSTEM','-05:00'))) AND YEAR(vc.fecha_venta) = YEAR(DATE(CONVERT_TZ(NOW(),'SYSTEM','-05:00'))) );
	
	SET totalabonos = (SELECT IFNULL(SUM(vc.monto),0) FROM venta_credito vc where  MONTH(vc.fecha_pago) = MONTH(DATE(CONVERT_TZ(NOW(),'SYSTEM','-05:00'))) AND YEAR(vc.fecha_pago) = YEAR(DATE(CONVERT_TZ(NOW(),'SYSTEM','-05:00'))) );
	
	SET ventasycreditos = ( totalVentas + totalabonos );

  SET ganancias = (SELECT SUM(vd.cantidad * vd.precio_ofertas) - SUM(vd.cantidad * vd.costo_unitario_venta) - SUM(vd.vd_descuento) FROM venta_detalle vd where vd.venta_estado = 'REGISTRADA');
	
  SET productosPocoStock = (SELECT COUNT(*) FROM productos p WHERE p.stock_producto <= p.minimo_stock_producto);
	
  SET ventasHoy = (SELECT SUM(vc.total_venta)  FROM venta_cabecera vc WHERE vc.venta_estado = 'REGISTRADA' AND DATE(vc.fecha_venta) = DATE(CONVERT_TZ(NOW(),'SYSTEM','-05:00')));
	SET totalabonoshoy = (SELECT IFNULL(SUM(vc.monto),0) FROM venta_credito vc where  DATE(vc.fecha_pago)  = DATE(CONVERT_TZ(NOW(),'SYSTEM','-05:00')) );
	
	SET totalabonoshoysuma = ( ventasHoy + totalabonoshoy );

  SELECT
    IFNULL(totalProductos, 0) AS totalProductos,
    IFNULL(FORMAT(totalCompras, 2), 0) AS totalCompras,
    IFNULL( FORMAT(ventasycreditos, 2), 0) AS totalVentas,
    IFNULL( FORMAT(ganancias, 2), 0) AS ganancias,
    IFNULL(productosPocoStock, 0) AS productosPocoStock,
		 IFNULL(ventasycreditos, 0) AS totalventasycreditos,
    IFNULL( FORMAT(totalabonoshoysuma, 2), 0) AS ventasHoy,
		monedasimbolo AS moneda;
    



END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for prc_obtenerNroBoleta
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_obtenerNroBoleta`;
delimiter ;;
CREATE PROCEDURE `prc_obtenerNroBoleta`()
  NO SQL 
select serie_boleta,
		IFNULL(LPAD(max(c.nro_correlativo_venta)+1,8,'0'),'00000001') nro_venta 
from empresa c
;;
delimiter ;

-- ----------------------------
-- Procedure structure for prc_ObtenerVentasMesActual
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_ObtenerVentasMesActual`;
delimiter ;;
CREATE PROCEDURE `prc_ObtenerVentasMesActual`()
  NO SQL 
BEGIN
DECLARE tvent FLOAT;
DECLARE tvent_ant FLOAT;
DECLARE tabono FLOAT;
DECLARE tot_suma FLOAT;

-- ventas del mes
SET tvent = (SELECT sum(round(vc.total_venta,2))   FROM venta_cabecera vc WHERE  MONTH(vc.fecha_venta) = MONTH(DATE(CONVERT_TZ(NOW(),'SYSTEM','-05:00'))) AND YEAR(vc.fecha_venta) = YEAR(DATE(CONVERT_TZ(NOW(),'SYSTEM','-05:00'))) AND  vc.venta_estado = 'REGISTRADA'); 


-- ventas del mes anterior
SET tvent_ant = (SELECT sum(round(vc.total_venta,2))   FROM venta_cabecera vc WHERE date(vc.fecha_venta) >= date(last_day(now() - INTERVAL 2 month) + INTERVAL 1 day) and date(vc.fecha_venta) <= last_day(last_day(now() - INTERVAL 2 month) + INTERVAL 1 day) AND vc.venta_estado = 'REGISTRADA');


-- abonos del mes
SET tabono = (SELECT SUM(cr.monto) FROM venta_credito cr where MONTH(cr.fecha_pago) = MONTH(DATE(CONVERT_TZ(NOW(),'SYSTEM','-05:00'))) AND YEAR(cr.fecha_pago) = YEAR(DATE(CONVERT_TZ(NOW(),'SYSTEM','-05:00'))));

SET tot_suma = ( tvent +  tabono );
 

SELECT
        IFNULL(ROUND(tvent, 2), 0) AS total_venta,
				 IFNULL(ROUND(tvent_ant, 2), 0) AS total_venta_ant,
				  IFNULL(ROUND(tabono, 2), 0) AS abonos,
					
					IFNULL(ROUND(tot_suma, 2), 0) AS suma_abonos;





END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for prc_ObtenerVentasMesAnterior
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_ObtenerVentasMesAnterior`;
delimiter ;;
CREATE PROCEDURE `prc_ObtenerVentasMesAnterior`()
  NO SQL 
BEGIN
SELECT date(vc.fecha_venta) as fecha_venta,
		sum(round(vc.total_venta,2)) as total_venta,
        sum(round(vc.total_venta,2)) as total_venta_ant
FROM venta_cabecera vc
where date(vc.fecha_venta) >= date(last_day(CONVERT_TZ(NOW(),'SYSTEM','-05:00') - INTERVAL 2 month) + INTERVAL 1 day)
and date(vc.fecha_venta) <= last_day(last_day(CONVERT_TZ(NOW(),'SYSTEM','-05:00') - INTERVAL 2 month) + INTERVAL 1 day)
group by date(vc.fecha_venta);
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for prc_registrar_compra_detalle
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_registrar_compra_detalle`;
delimiter ;;
CREATE PROCEDURE `prc_registrar_compra_detalle`(IN `p_nro_compra` VARCHAR(13), IN `p_codigo_producto` VARCHAR(20), IN `p_cantidad` FLOAT, IN `p_total_compra` FLOAT, IN `p_precio_compra` FLOAT,  IN `p_talla` INT)
BEGIN
declare v_precio_compra float;
declare v_precio_venta float;

SELECT p.precio_compra_producto,p.precio_venta_producto
into v_precio_compra, v_precio_venta
FROM productos p
WHERE p.codigo_producto  = p_codigo_producto;
    
INSERT INTO compra_detalle(nro_compra,   codigo_producto,   cantidad,   costo_unitario,       total,        estado,         id_talla,   fecha) 
									VALUES(p_nro_compra, p_codigo_producto, p_cantidad,   p_precio_compra,   p_total_compra,  'REGISTRADA',  p_talla,     DATE(CONVERT_TZ(NOW(),'SYSTEM','-05:00')));
                                                        
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for prc_registrar_cotizacion_detalle
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_registrar_cotizacion_detalle`;
delimiter ;;
CREATE PROCEDURE `prc_registrar_cotizacion_detalle`(IN `p_nro_boleta` VARCHAR(13), IN `p_codigo_producto` VARCHAR(20), IN `p_cantidad` FLOAT, IN `p_total_venta` FLOAT, IN `p_precio_oferta` FLOAT, IN `p_talla` INT)
BEGIN
declare v_precio_compra float;
declare v_precio_venta float;

SELECT p.precio_compra_producto,p.precio_venta_producto
into v_precio_compra, v_precio_venta
FROM productos p
WHERE p.codigo_producto  = p_codigo_producto;
    
INSERT INTO coti_detalle(nro_boleta,codigo_producto, cantidad, costo_unitario_venta,precio_unitario_venta,total_venta, fecha_venta, venta_estado, precio_ofertas, id_talla) 
VALUES(p_nro_boleta,p_codigo_producto, p_cantidad, v_precio_compra, v_precio_venta, p_total_venta, DATE(CONVERT_TZ(NOW(),'SYSTEM','-05:00')), 'REGISTRADA', p_precio_oferta, p_talla);
                                                        
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for prc_registrar_kardex_bono
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_registrar_kardex_bono`;
delimiter ;;
CREATE PROCEDURE `prc_registrar_kardex_bono`(IN `p_codigo_producto` VARCHAR(20), IN `p_concepto` VARCHAR(100), IN `p_nuevo_stock` FLOAT , IN  `p_cant_u` VARCHAR(50), IN `p_talla` INT)
BEGIN

	declare v_unidades_ex float;
	declare v_costo_unitario_ex float;    
	declare v_costo_total_ex float;
    
		declare v_cant_u float;
    declare v_unidades_in float;
	declare v_costo_unitario_in float;    
	declare v_costo_total_in float;
    

		
		SELECT p.precio_compra_producto, p.stock_producto , p.costo_total_producto
		into v_costo_unitario_ex, v_unidades_ex, v_costo_total_ex
		from productos p
		WHERE p.codigo_producto = p_codigo_producto
		 ORDER BY codigo_producto DESC
    LIMIT 1;
    
 
    SET v_unidades_in = p_nuevo_stock;
    SET v_costo_unitario_in = 0;
    SET v_costo_total_in = v_unidades_in * v_costo_unitario_in;
		SET v_cant_u = p_cant_u; 
    
 
    SET v_unidades_ex = ROUND(v_unidades_in,2);    
    SET v_costo_total_ex = ROUND(v_costo_total_ex + v_costo_total_in,2);

        
	INSERT INTO kardex(codigo_producto,
						fecha,
                        concepto,
                        comprobante,
												in_cant_unid,
                        in_unidades,
                        in_costo_unitario,
                        in_costo_total,
                        ex_unidades,
                        ex_costo_unitario,
                        ex_costo_total)
				VALUES(p_codigo_producto,
												DATE(CONVERT_TZ(NOW(),'SYSTEM','-05:00')),
                        p_concepto,
                        '',
												v_cant_u,
                        v_unidades_in,
                        v_costo_unitario_in,
                        v_costo_total_in,
                        v_unidades_ex,
                        v_costo_unitario_ex,
                        v_costo_total_ex);
												
		INSERT INTO kardex2 (codigo_producto ,  kardex_fecha,   kardex_tipo,    kardex_ingreso,    kardex_p_ingreso,       kardex_total) 
		values             (p_codigo_producto, DATE(CONVERT_TZ(NOW(),'SYSTEM','-05:00')),     p_concepto,        v_cant_u,           v_costo_unitario_ex,       v_unidades_ex);



	UPDATE productos 
	SET stock_producto = v_unidades_ex, 
        precio_compra_producto = v_costo_unitario_ex,
        costo_total_producto = v_costo_total_ex
	WHERE codigo_producto = p_codigo_producto ; 

	
	UPDATE talla_producto SET
	stock = stock + p_cant_u 
	where codigo_producto = p_codigo_producto and id_talla = p_talla;

										 

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for prc_registrar_kardex_compra
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_registrar_kardex_compra`;
delimiter ;;
CREATE PROCEDURE `prc_registrar_kardex_compra`(IN `p_codigo_producto` VARCHAR(20), IN `p_fecha` DATE, IN `p_concepto` VARCHAR(100), IN `p_comprobante` VARCHAR(100), IN `p_unidades` FLOAT, IN `p_talla` INT)
BEGIN

	declare v_unidades_ex float;
	declare v_costo_unitario_ex float;    
	declare v_costo_total_ex float;
    
    declare v_unidades_out float;
	declare v_costo_unitario_out float;    
	declare v_costo_total_out float;
    
		

		SELECT p.precio_compra_producto, p.stock_producto , p.costo_total_producto
		into v_costo_unitario_ex, v_unidades_ex, v_costo_total_ex
		from productos p
		WHERE p.codigo_producto = p_codigo_producto
		 ORDER BY codigo_producto DESC
    LIMIT 1;
    
   
    SET v_unidades_out = p_unidades;
    SET v_costo_unitario_out = v_costo_unitario_ex;
    SET v_costo_total_out = p_unidades * v_costo_unitario_ex;
    
  
    SET v_unidades_ex = ROUND(v_unidades_ex + v_unidades_out,2);    
    SET v_costo_total_ex = ROUND(v_costo_total_ex +  v_costo_total_out,2);
    
  
        
	INSERT INTO kardex(codigo_producto,
												fecha,
                        concepto,
                        comprobante,
                        out_unidades,
                        out_costo_unitario,
                        out_costo_total,
                        ex_unidades,
                        ex_costo_unitario,
                        ex_costo_total)
				VALUES(p_codigo_producto,
												p_fecha,
                        p_concepto,
                        p_comprobante,
                        v_unidades_out,
                        v_costo_unitario_out,
                        v_costo_total_out,
                        v_unidades_ex,
                        v_costo_unitario_ex,
                        v_costo_total_ex);
												
		INSERT INTO kardex2 (codigo_producto ,   kardex_fecha, kardex_tipo,  kardex_ingreso,    kardex_p_ingreso,      kardex_total,      venta_comprobante) 
		values               (p_codigo_producto, DATE(CONVERT_TZ(NOW(),'SYSTEM','-05:00')),     p_concepto,  v_unidades_out,   v_costo_unitario_ex,   v_unidades_ex,   p_comprobante);

	 
	UPDATE productos 
	SET   stock_producto =  v_unidades_ex, 
		    ventas_producto = ventas_producto + v_unidades_out,
        precio_compra_producto = v_costo_unitario_ex,
        costo_total_producto = v_costo_total_ex
	WHERE codigo_producto = p_codigo_producto ;   
			
	UPDATE talla_producto SET
	stock = stock + v_unidades_out 
	where codigo_producto = p_codigo_producto and id_talla = p_talla;
	 
		
								 

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for prc_registrar_kardex_existencias
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_registrar_kardex_existencias`;
delimiter ;;
CREATE PROCEDURE `prc_registrar_kardex_existencias`(IN `p_codigo_producto` VARCHAR(25), IN `p_concepto` VARCHAR(100), IN `p_comprobante` VARCHAR(100), IN `p_unidades` FLOAT, IN `p_costo_unitario` FLOAT, IN `p_costo_total` FLOAT)
BEGIN
  INSERT INTO kardex (codigo_producto, fecha, concepto, comprobante, ex_unidades, ex_costo_unitario, ex_costo_total)
    VALUES (p_codigo_producto, TIME(CONVERT_TZ(NOW(),'SYSTEM','-05:00')), p_concepto, p_comprobante, p_unidades, p_costo_unitario, p_costo_total);
		
		INSERT INTO kardex2 (codigo_producto ,kardex_fecha, kardex_tipo, venta_comprobante, kardex_ingreso, kardex_p_ingreso, kardex_total) 
		values (p_codigo_producto, DATE(CONVERT_TZ(NOW(),'SYSTEM','-05:00')),p_concepto,  p_comprobante, p_unidades, p_costo_unitario, p_unidades);

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for prc_registrar_kardex_vencido
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_registrar_kardex_vencido`;
delimiter ;;
CREATE PROCEDURE `prc_registrar_kardex_vencido`(IN `p_codigo_producto` VARCHAR(20), IN `p_concepto` VARCHAR(100), IN `p_nuevo_stock` FLOAT, IN  `p_cant_u` VARCHAR(50), IN `p_talla` INT)
BEGIN

	declare v_unidades_ex float;
	declare v_costo_unitario_ex float;    
	declare v_costo_total_ex float;
	
    declare v_cant_u float;
    declare v_unidades_out float;
	declare v_costo_unitario_out float;    
	declare v_costo_total_out float;
    

		SELECT p.precio_compra_producto, p.stock_producto , p.costo_total_producto
		into v_costo_unitario_ex, v_unidades_ex, v_costo_total_ex
		from productos p
		WHERE p.codigo_producto = p_codigo_producto
		 ORDER BY codigo_producto DESC
    LIMIT 1;
    
   
    SET v_unidades_out = p_nuevo_stock;
    SET v_costo_unitario_out = 0;
    SET v_costo_total_out = v_unidades_out * v_costo_unitario_out;
		SET v_cant_u = p_cant_u; 
    
   
    SET v_unidades_ex = ROUND(v_unidades_out,2);    
    SET v_costo_total_ex = ROUND(v_costo_total_ex - v_costo_total_out,2);
    
 
        
	INSERT INTO kardex(codigo_producto,
						fecha,
                        concepto,
                        comprobante,
                        out_unidades,
												out_cant_unid,
                        out_costo_unitario,
                        out_costo_total,
                        ex_unidades,
                        ex_costo_unitario,
                        ex_costo_total)
				VALUES(p_codigo_producto,
						DATE(CONVERT_TZ(NOW(),'SYSTEM','-05:00')),
                        p_concepto,
                        '',
                        v_unidades_out,
												v_cant_u,
                        v_costo_unitario_out,
                        v_costo_total_out,
                        v_unidades_ex,
                        v_costo_unitario_ex,
                        v_costo_total_ex);
												
			INSERT INTO kardex2 (codigo_producto ,kardex_fecha, kardex_tipo, kardex_salida, kardex_p_salida, kardex_total) 
		values (p_codigo_producto, DATE(CONVERT_TZ(NOW(),'SYSTEM','-05:00')),p_concepto, v_cant_u, v_costo_unitario_ex, v_unidades_ex);


	UPDATE productos 
	SET stock_producto = v_unidades_ex, 
        precio_compra_producto = v_costo_unitario_ex,
        costo_total_producto = v_costo_total_ex
	WHERE codigo_producto = p_codigo_producto ;  
	
	
	UPDATE talla_producto SET
	stock = stock - p_cant_u 
	where codigo_producto = p_codigo_producto and id_talla = p_talla; 
										 

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for prc_registrar_kardex_venta
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_registrar_kardex_venta`;
delimiter ;;
CREATE PROCEDURE `prc_registrar_kardex_venta`(IN `p_codigo_producto` VARCHAR(20), IN `p_fecha` DATE, IN `p_concepto` VARCHAR(100), IN `p_comprobante` VARCHAR(100), IN `p_unidades` FLOAT, IN `p_talla` INT)
BEGIN

	declare v_unidades_ex float;
	declare v_costo_unitario_ex float;    
	declare v_costo_total_ex float;
    
    declare v_unidades_out float;
	declare v_costo_unitario_out float;    
	declare v_costo_total_out float;
    
		DECLARE PRECIOCOMPRA FLOAT;
    DECLARE PRECIOVENTA FLOAT;



    SET PRECIOCOMPRA := (SELECT precio_compra_producto FROM productos WHERE codigo_producto = p_codigo_producto);
    SET PRECIOVENTA := (SELECT precio_venta_producto FROM productos WHERE codigo_producto = p_codigo_producto);
	/*OBTENEMOS LAS ULTIMAS EXISTENCIAS DEL PRODUCTO*/
    
   /* SELECT k.ex_costo_unitario , k.ex_unidades, k.ex_costo_total
    into v_costo_unitario_ex, v_unidades_ex, v_costo_total_ex
    FROM KARDEX K
    WHERE K.CODIGO_PRODUCTO = p_codigo_producto
    ORDER BY ID DESC
    LIMIT 1;*/
		
		/*OBTENEMOS LAS ULTIMAS EXISTENCIAS DEL PRODUCTO*/
		SELECT p.precio_compra_producto, p.stock_producto , p.costo_total_producto
		into v_costo_unitario_ex, v_unidades_ex, v_costo_total_ex
		from productos p
		WHERE p.codigo_producto = p_codigo_producto
		 ORDER BY codigo_producto DESC
    LIMIT 1;
    
    /*SETEAMOS LOS VALORES PARA EL REGISTRO DE SALIDA*/
    SET v_unidades_out = p_unidades;
    SET v_costo_unitario_out = v_costo_unitario_ex;
    SET v_costo_total_out = p_unidades * v_costo_unitario_ex;
    
    /*SETEAMOS LAS EXISTENCIAS ACTUALES*/
    SET v_unidades_ex = ROUND(v_unidades_ex - v_unidades_out,2);    
    SET v_costo_total_ex = ROUND(v_costo_total_ex -  v_costo_total_out,2);
    
    /*IF(v_costo_total_ex > 0) THEN
		SET v_costo_unitario_ex = ROUND(v_costo_total_ex/v_unidades_ex,2);
	else
		SET v_costo_unitario_ex = ROUND(0,2);
    END IF;*/
    
        
	INSERT INTO kardex(codigo_producto,
												fecha,
                        concepto,
                        comprobante,
                        out_unidades,
                        out_costo_unitario,
                        out_costo_total,
                        ex_unidades,
                        ex_costo_unitario,
                        ex_costo_total)
				VALUES(p_codigo_producto,
												p_fecha,
                        p_concepto,
                        p_comprobante,
                        v_unidades_out,
                        v_costo_unitario_out,
                        v_costo_total_out,
                        v_unidades_ex,
                        v_costo_unitario_ex,
                        v_costo_total_ex);
												
		INSERT INTO kardex2 (codigo_producto ,   kardex_fecha, kardex_tipo,  kardex_salida,    kardex_p_salida,      kardex_total,      venta_comprobante) 
		values               (p_codigo_producto, DATE(CONVERT_TZ(NOW(),'SYSTEM','-05:00')),     p_concepto,  v_unidades_out,   v_costo_unitario_ex,   v_unidades_ex,   p_comprobante);
		
		UPDATE venta_detalle SET
		costo_unitario_venta = PRECIOCOMPRA, 
		precio_unitario_venta = PRECIOVENTA
		WHERE nro_boleta = p_comprobante and codigo_producto = p_codigo_producto and id_talla = p_talla;

	/*ACTUALIZAMOS EL STOCK, EL NRO DE VENTAS DEL PRODUCTO*/
	UPDATE productos 
	SET   stock_producto =  v_unidades_ex, 
		    ventas_producto = ventas_producto + v_unidades_out,
        precio_compra_producto = v_costo_unitario_ex,
        costo_total_producto = v_costo_total_ex
	WHERE codigo_producto = p_codigo_producto ;   
			
	UPDATE talla_producto SET
	stock = stock - p_unidades 
	where codigo_producto = p_codigo_producto and id_talla = p_talla;
	 
		
								 

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for prc_registrar_venta_detalle
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_registrar_venta_detalle`;
delimiter ;;
CREATE PROCEDURE `prc_registrar_venta_detalle`(IN `p_nro_boleta` VARCHAR(13), IN `p_codigo_producto` VARCHAR(20), IN `p_cantidad` FLOAT, IN `p_total_venta` DECIMAL(10,2), IN `p_precio_oferta` DECIMAL(10,2) , IN `p_talla` INT, IN p_descuento DECIMAL(10,2))
BEGIN
DECLARE PRECIOCOMPRA FLOAT;
    DECLARE PRECIOVENTA FLOAT;



    SET PRECIOCOMPRA := (SELECT precio_compra_producto FROM productos WHERE codigo_producto = p_codigo_producto);
    SET PRECIOVENTA := (SELECT precio_venta_producto FROM productos WHERE codigo_producto = p_codigo_producto);


/*SELECT p.precio_compra_producto,p.precio_venta_producto
into v_precio_compra, v_precio_venta
FROM productos p
WHERE p.codigo_producto  = p_codigo_producto;*/
    
INSERT INTO venta_detalle(nro_boleta,codigo_producto, cantidad, costo_unitario_venta,precio_unitario_venta,total_venta, fecha_venta, venta_estado, precio_ofertas, id_talla, vd_descuento) 
VALUES(p_nro_boleta,p_codigo_producto, p_cantidad, PRECIOCOMPRA, PRECIOVENTA, p_total_venta, DATE(CONVERT_TZ(NOW(),'SYSTEM','-05:00')), 'REGISTRADA', p_precio_oferta, p_talla, p_descuento);
                                                        
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for prc_top_ventas_categorias
-- ----------------------------
DROP PROCEDURE IF EXISTS `prc_top_ventas_categorias`;
delimiter ;;
CREATE PROCEDURE `prc_top_ventas_categorias`()
BEGIN

select cast(sum(vd.precio_ofertas)  AS DECIMAL(8,2)) as y, 
			c.nombre_categoria as label
    from venta_detalle vd 
					inner join productos p on vd.codigo_producto = p.codigo_producto
          inner join categorias c on c.id_categoria = p.id_categoria_producto
					where vd.venta_estado = 'REGISTRADA'
    group by c.nombre_categoria
    LIMIT 10;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_ACTUALIZAR_COMPROBANTES
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_ACTUALIZAR_COMPROBANTES`;
delimiter ;;
CREATE PROCEDURE `SP_ACTUALIZAR_COMPROBANTES`(IN id INT, IN tipo VARCHAR(255), IN serie varchar(4), IN numero varchar(8), IN estado VARCHAR(50))
BEGIN

UPDATE comprobante SET 
compro_tipo = tipo, 
compro_serie = serie, 
compro_numero = numero, 
compro_estado = estado
where compro_id = id;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_ELIMINAR_MOVIMIENTO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_ELIMINAR_MOVIMIENTO`;
delimiter ;;
CREATE PROCEDURE `SP_ELIMINAR_MOVIMIENTO`(IN ID VARCHAR(11))
BEGIN 

DECLARE CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM movimientos where movi_caja ='CERRADO' AND movimientos_id = ID);
if @CANTIDAD = 0 THEN
	
		DELETE FROM movimientos  
		where movimientos_id = ID;
		
SELECT 1;
ELSE
SELECT 2;
END IF;


END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_ELIMINAR_PRODUCTO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_ELIMINAR_PRODUCTO`;
delimiter ;;
CREATE PROCEDURE `SP_ELIMINAR_PRODUCTO`(in COD varchar(20))
BEGIN
DECLARE CANTIDADVENTAS INT;
DECLARE CANTIDADCOMPRAS INT;

SET @CANTIDADVENTAS:=(SELECT COUNT(*) FROM venta_detalle where  codigo_producto = COD);

SET @CANTIDADCOMPRAS:=(SELECT COUNT(*) FROM compra_detalle where  codigo_producto = COD);

if @CANTIDADVENTAS = 0 THEN
			if @CANTIDADCOMPRAS = 0 THEN
					DELETE FROM talla_producto WHERE codigo_producto = COD;
					
					DELETE FROM kardex WHERE codigo_producto = COD;
					
					DELETE FROM kardex2 WHERE codigo_producto = COD;
					
					DELETE FROM productos WHERE codigo_producto = COD;
		SELECT 1;
	ELSE
		SELECT 2;
END IF;
ELSE
        SELECT 3;
	END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_IMPRIMIR_RECIBOS_VENTA_CREDITO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_IMPRIMIR_RECIBOS_VENTA_CREDITO`;
delimiter ;;
CREATE PROCEDURE `SP_IMPRIMIR_RECIBOS_VENTA_CREDITO`(IN p_nro_bol VARCHAR(13))
BEGIN
SELECT vc.id_credito, vc.nro_boleta, vc.monto, vc.fecha_pago, '' as opcion FROM venta_credito vc WHERE vc.nro_boleta = p_nro_bol;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_INSERTAR_TALLA_PRODUCTO_MANUAL
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_INSERTAR_TALLA_PRODUCTO_MANUAL`;
delimiter ;;
CREATE PROCEDURE `SP_INSERTAR_TALLA_PRODUCTO_MANUAL`(IN COD_PROD VARCHAR(50), IN ID_TALL INT)
BEGIN
DECLARE CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM talla_producto where id_talla= ID_TALL and codigo_producto = COD_PROD );
if @CANTIDAD = 0 THEN
	INSERT into talla_producto(codigo_producto ,id_talla, stock)
	values(COD_PROD, ID_TALL, '0');
SELECT 1;
ELSE
SELECT 2;
END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_KARDEX_ENT_SAL
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_KARDEX_ENT_SAL`;
delimiter ;;
CREATE PROCEDURE `SP_KARDEX_ENT_SAL`()
SELECT
	
    k.codigo_producto,
    MAX(p.descripcion_producto) AS nombre,
    MAX(k.kardex_p_ingreso) AS precio,
    IFNULL(SUM(k.kardex_ingreso), 0) AS ingresos,
    IFNULL(SUM(k.kardex_salida), 0) AS salidas,
    IFNULL((SUM(k.kardex_ingreso) - SUM(k.kardex_salida)), SUM(k.kardex_ingreso)) AS stock_actual,
    '' AS opcion
FROM
    kardex2 k
    INNER JOIN productos p ON k.codigo_producto = p.codigo_producto
WHERE
    k.kardex_tipo IN ('INVENTARIO INICIAL', 'INGRESO DIRECTO', 'SALIDA DIRECTA', 'VENTA', 'COMPRA')
GROUP BY
    k.codigo_producto
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_KARDEX_RPTE_ENT_SAL
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_KARDEX_RPTE_ENT_SAL`;
delimiter ;;
CREATE PROCEDURE `SP_KARDEX_RPTE_ENT_SAL`()
SELECT
	k.codigo_producto,
	 MAX(p.descripcion_producto) as nombre ,
	 MAX(k.kardex_p_ingreso) as precio, 
	IFNULL(SUM(k.kardex_ingreso),0) as ingresos,
	IFNULL(sum(k.kardex_salida),0) as salidas,
   IFNULL( (SUM(k.kardex_ingreso) - sum(k.kardex_salida)),SUM(k.kardex_ingreso)) as stock_actual
FROM
	kardex2 k INNER JOIN productos p on k.codigo_producto = p.codigo_producto
	 where k.kardex_tipo IN ('INVENTARIO INICIAL','INGRESO DIRECTO','SALIDA DIRECTA', 'VENTA', 'COMPRA')
	GROUP BY k.codigo_producto
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_CAJA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_CAJA`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_CAJA`()
SELECT
	caja_id,
	-- caja_descripcion,
	caja_monto_inicial,
	IFNULL(caja_monto_ingreso,0),
	caja__monto_egreso,
 CONCAT_WS(' ',DATE_FORMAT(caja_f_apertura, '%d/%m/%Y'), caja_hora_apertura) as f_apert,
  CONCAT_WS(' ',DATE_FORMAT(caja_f_cierre, '%d/%m/%Y'), caja_hora_cierre) as caja_f_cierre,
	
	caja_monto_total,
	caja_estado,
	'' as opciones
FROM
	caja
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_CLIENTES_AUTOCOMPLETE
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_CLIENTES_AUTOCOMPLETE`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_CLIENTES_AUTOCOMPLETE`()
SELECT
CONCAT(
	cliente_dni,' - ',
	cliente_nombres ) as clientes
FROM
	clientes
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_CLIENTES_TABLE
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_CLIENTES_TABLE`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_CLIENTES_TABLE`()
SELECT cliente_id,
			 cliente_tipo_doc,
			 cliente_dni,
				cliente_nombres,
				cliente_direccion,
				'' as opcion,
				cliente_celular,
				cliente_correo
				 FROM clientes
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_COMPRAS
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_COMPRAS`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_COMPRAS`(in fecha_ini DATE, in fecha_fin DATE)
SELECT
	cc.cliente_id, 
	cl.cliente_nombres, 
	cc.compro_id, 
	com.compro_tipo, 
	cc.nro_compra, 
	cc.total_compra, 
	DATE_FORMAT(cc.fecha, '%d/%m/%Y') as fecha, 
	cc.id_usuario, 
	u.usuario, 
	cc.compra_estado,
	'' as opcion,
	cc.f_pago,
	cc.ope_gravada,
	cc.igv
FROM
	compra_cabecera cc
	INNER JOIN
	clientes cl
	ON 
		cc.cliente_id = cl.cliente_id
	INNER JOIN
	comprobante com
	ON 
		cc.compro_id = com.compro_id
	INNER JOIN
	usuarios u
	ON 
		cc.id_usuario = u.id_usuario
		 WHERE DATE(cc.fecha) BETWEEN fecha_ini AND fecha_fin
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_COMPROBANTES
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_COMPROBANTES`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_COMPROBANTES`()
BEGIN
SELECT
	compro_id,
	compro_tipo ,
	compro_serie,
	compro_numero,
	compro_estado,
	'' as opcion
FROM
	comprobante 

ORDER BY
	compro_id ASC;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_COTIZACION_FECHAS
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_COTIZACION_FECHAS`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_COTIZACION_FECHAS`(in fecha_ini DATE, in fecha_fin DATE)
SELECT
	cc.cliente_id, 
	cl.cliente_nombres, 
	cc.compro_id, 
	com.compro_tipo, 
	cc.nro_boleta, 
	cc.total_venta, 
	DATE_FORMAT(cc.fecha_venta, '%d/%m/%Y') as fecha, 
	cc.id_usuario, 
	u.usuario, 
	cc.venta_estado,
	'' as opcion,
	cc.f_pago,
	cc.subtotal,
	cc.igv
FROM
	coti_cabecera cc
	INNER JOIN
	clientes cl
	ON 
		cc.cliente_id = cl.cliente_id
	INNER JOIN
	comprobante com
	ON 
		cc.compro_id = com.compro_id
	INNER JOIN
	usuarios u
	ON 
		cc.id_usuario = u.id_usuario
		 WHERE DATE(cc.fecha_venta) BETWEEN fecha_ini AND fecha_fin
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_DETALLE_COMPRA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_DETALLE_COMPRA`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_DETALLE_COMPRA`(IN nro_com VARCHAR(13))
SELECT
	cd.nro_compra, 
	cd.codigo_producto, 
	CONCAT(p.descripcion_producto,' (T-',tp.descripcion,')') as producto,
	
	cd.costo_unitario,
	cd.cantidad, 
	cd.total
	
FROM
	compra_detalle cd
	INNER JOIN productos p ON cd.codigo_producto = p.codigo_producto
	INNER JOIN talla tp on cd.id_talla = tp.id_talla
	where cd.nro_compra = nro_com
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_DETALLE_VENTA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_DETALLE_VENTA`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_DETALLE_VENTA`(IN nro_bol VARCHAR(13))
SELECT
	
	vd.nro_boleta, 
	vd.codigo_producto, 
	CONCAT(p.descripcion_producto,' (T-',tp.descripcion,')') as producto,
	
	vd.precio_ofertas,
	vd.cantidad, 
	vd.total_venta
	
FROM
	venta_detalle vd
	INNER JOIN productos p ON vd.codigo_producto = p.codigo_producto
	INNER JOIN talla tp on vd.id_talla = tp.id_talla
	where vd.nro_boleta = nro_bol
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_GANANCIAS_CREDITO_FECHAS
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_GANANCIAS_CREDITO_FECHAS`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_GANANCIAS_CREDITO_FECHAS`(IN p_fini DATE, IN p_ffin DATE)
SELECT
	DATE_FORMAT(vc.fecha_venta, '%d/%m/%Y') as fecha,
	CONCAT('CREDITO: ', vc.total_venta,  ' ', CASE 
			WHEN vc.venta_estado = 'CREDITO' THEN 'PENDIENTE'
			ELSE
				'PAGADA'
		END  , ': ', (vc.total_venta - vc.abonado)) estado_v,
	CONCAT(	cp.compro_tipo, ' - ', vc.nro_boleta) AS comprobante,
	c.cliente_nombres,
	vc.subtotal,
    vc.igv,
	vc.total_venta,
    SUM(vd.cantidad) as canti,
    vd.costo_unitario_venta as precio_compra,
    vd.precio_ofertas as precio_venta,
	SUM(vd.cantidad * vd.precio_ofertas) - SUM(vd.cantidad * vd.costo_unitario_venta) as ganancias,
	usu.usuario
	
FROM
	venta_cabecera vc
	INNER JOIN clientes c ON vc.cliente_id = c.cliente_id
	INNER JOIN comprobante cp on vc.compro_id = cp.compro_id
	INNER JOIN venta_detalle vd on vc.nro_boleta = vd.nro_boleta
	INNER JOIN usuarios usu ON vc.id_usuario = usu.id_usuario
	where vc.venta_estado IN ('PAGADA', 'CREDITO') and
	 DATE(vc.fecha_venta) BETWEEN p_fini AND p_ffin	
	GROUP BY
    fecha, compro_tipo, vc.nro_boleta, cliente_nombres, subtotal, igv, total_venta, costo_unitario_venta, precio_ofertas, usuario
ORDER BY 
    vc.fecha_venta ASC
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_GANANCIAS_FECHAS
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_GANANCIAS_FECHAS`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_GANANCIAS_FECHAS`(IN `p_fini` DATE, IN `p_ffin` DATE)
SELECT
	DATE_FORMAT(vc.fecha_venta, '%d/%m/%Y') as fecha,
	cp.compro_tipo,
	vc.nro_boleta,
	c.cliente_nombres,
	vc.subtotal,
    vc.igv,
	vc.total_venta,
    SUM(vd.cantidad) as canti,
    vd.costo_unitario_venta as precio_compra,
    vd.precio_ofertas as precio_venta,
	SUM(vd.cantidad * vd.precio_ofertas) - SUM(vd.cantidad * vd.costo_unitario_venta) as ganancias,
	usu.usuario
	
FROM
	venta_cabecera vc
	INNER JOIN clientes c ON vc.cliente_id = c.cliente_id
	INNER JOIN comprobante cp on vc.compro_id = cp.compro_id
	INNER JOIN venta_detalle vd on vc.nro_boleta = vd.nro_boleta
	INNER JOIN usuarios usu ON vc.id_usuario = usu.id_usuario
	where vc.venta_estado = 'REGISTRADA' and
	 DATE(vc.fecha_venta) BETWEEN p_fini AND p_ffin	
	GROUP BY
    fecha, compro_tipo, nro_boleta, cliente_nombres, subtotal, igv, total_venta, costo_unitario_venta, precio_ofertas, usuario
ORDER BY 
    vc.fecha_venta ASC
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_ID_CAJA_PARA_OPERACIONES
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_ID_CAJA_PARA_OPERACIONES`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_ID_CAJA_PARA_OPERACIONES`()
SELECT
caja_id,
caja_f_apertura 
FROM
	caja 
WHERE
	caja_estado = 'VIGENTE'
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_MOVIMIENTOS
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_MOVIMIENTOS`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_MOVIMIENTOS`()
SELECT
	movimientos_id,
	movi_tipo,
	movi_descripcion,
	ROUND(movi_monto,2) as monto,
	 DATE_FORMAT(movi_fecha, '%d/%m/%Y') as fecha,
	 movi_responsable,
	 movi_caja,
	'' as opciones
	
	
FROM
	movimientos
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_MOVIMIENTOS_POR_CAJA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_MOVIMIENTOS_POR_CAJA`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_MOVIMIENTOS_POR_CAJA`(IN CAJA_ID INT)
SELECT
		m.movi_tipo,
		m.movi_descripcion,
		m.movi_monto,
		 DATE_FORMAT(m.movi_fecha, '%d/%m/%Y') as fecha,
		m.caja_id
FROM
	movimientos m
	where m.caja_id = CAJA_ID
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_PROVEEDORES
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_PROVEEDORES`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_PROVEEDORES`()
select cliente_id, cliente_nombres,  cliente_dni,  cliente_tipo_doc from clientes where cliente_tipo_doc = 'Ruc'
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_SELECT_ANIO_VENTA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_SELECT_ANIO_VENTA`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_SELECT_ANIO_VENTA`()
SELECT YEAR(fecha_venta) as anio FROM venta_cabecera
where venta_estado <> 'ANULADA' 
GROUP BY YEAR(fecha_venta)
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_USUARIOS
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_USUARIOS`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_USUARIOS`()
SELECT
	usuarios.id_usuario,
	usuarios.nombre_usuario,
	usuarios.apellido_usuario,
	-- CONCAT_WS(' ', usuarios.nombre_usuario,usuarios.apellido_usuario) as nombre, 
	usuarios.usuario, 
	usuarios.clave,
	usuarios.id_perfil_usuario, 
	perfiles.descripcion, 
	usuarios.estado,
	'' as opciones
FROM
	usuarios
	INNER JOIN
	perfiles
	ON 
		usuarios.id_perfil_usuario = perfiles.id_perfil
		
		ORDER BY usuarios.id_usuario ASC
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_VENTAS
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_VENTAS`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_VENTAS`(IN `fecha_ini` DATE, IN `fecha_fin` DATE)
SELECT

	vc.cliente_id, 
	cl.cliente_nombres, 
	vc.compro_id, 
	com.compro_tipo, 
	vc.nro_boleta, 
	vc.total_venta, 
	DATE_FORMAT(vc.fecha_venta, '%d/%m/%Y %r') as fecha, 
	vc.id_usuario, 
	u.usuario, 
	vc.venta_estado,
	'' as opcion,
	vc.f_pago,
	vc.subtotal,
	vc.igv
FROM
	venta_cabecera vc
	INNER JOIN
	clientes cl
	ON 
		vc.cliente_id = cl.cliente_id
	INNER JOIN
	comprobante com
	ON 
		vc.compro_id = com.compro_id
	INNER JOIN
	usuarios u
	ON 
		vc.id_usuario = u.id_usuario
		 WHERE DATE(vc.fecha_venta) BETWEEN fecha_ini AND fecha_fin
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_VENTAS2
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_VENTAS2`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_VENTAS2`(in fecha_ini DATE, in fecha_fin DATE)
SELECT
	vc.nro_boleta, 
	vc.total_venta, 
	DATE_FORMAT(vc.fecha_venta, '%d/%m/%Y') as fecha, 
	vc.id_usuario, 
	u.usuario, 
	vc.venta_estado,
	'' as opcion

FROM
	venta_cabecera vc
	INNER JOIN
	usuarios u
	ON 
		vc.id_usuario = u.id_usuario
		 WHERE DATE(vc.fecha_venta) BETWEEN fecha_ini AND fecha_fin
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_VENTAS_CREDITO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_VENTAS_CREDITO`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_VENTAS_CREDITO`()
BEGIN
SELECT
vc.nro_boleta,
cl.cliente_nombres,
DATE_FORMAT(vc.fecha_venta, '%d/%m/%Y %r') as fecha, 
vc.total_venta,
vc.abonado,
IFNULL((vc.total_venta - vc.abonado),0) as restante,
vc.venta_estado,
'' AS opcion 
FROM
	venta_cabecera vc INNER JOIN clientes cl ON
	vc.cliente_id = cl.cliente_id
WHERE
	vc.venta_estado IN ('CREDITO', 'PAGADA');
	
	END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_VENTAS_POR_CAJA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_VENTAS_POR_CAJA`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_VENTAS_POR_CAJA`(IN CAJA_ID INT)
SELECT
	vc.nro_boleta,
	vc.cliente_id,
	c.cliente_nombres,
	vc.subtotal,
	vc.igv,
	vc.total_venta,
	DATE_FORMAT(vc.fecha_venta, '%d/%m/%Y') as fecha,
	vc.caja_id,
	vc.venta_estado
FROM
	venta_cabecera vc
	INNER JOIN clientes c ON vc.cliente_id = c.cliente_id
	where vc.venta_estado = 'REGISTRADA' and vc.caja_id = CAJA_ID
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_OBTENER_DATA_EMPRESA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_OBTENER_DATA_EMPRESA`;
delimiter ;;
CREATE PROCEDURE `SP_OBTENER_DATA_EMPRESA`()
SELECT
	empresa.id_empresa, 
	empresa.razon_social, 
	empresa.ruc, 
	empresa.direccion, 
	empresa.celular, 
	empresa.moneda, 
	empresa.email,
	empresa.imagen,
	empresa.igv,
	empresa.cuenta,
	empresa.nro_cuenta,
	empresa.nombre_sistema,
	empresa.tipo_impuesto,
	empresa.soles,
	empresa.centimos
FROM
	empresa
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_OBTENER_ESTADO_CAJA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_OBTENER_ESTADO_CAJA`;
delimiter ;;
CREATE PROCEDURE `SP_OBTENER_ESTADO_CAJA`()
SELECT
	caja_estado,
	caja_f_apertura,
	caja_hora_apertura,
	caja_monto_total,
	caja_monto_ingreso 
FROM
	caja 
WHERE
	caja_estado = 'VIGENTE'
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_OBTENER_NRO_BOLETA2
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_OBTENER_NRO_BOLETA2`;
delimiter ;;
CREATE PROCEDURE `SP_OBTENER_NRO_BOLETA2`(in ID int)
SELECT compro_serie,
	
		IFNULL(LPAD(MAX(c.compro_numero)+1,8,'0'),'00000001') nro_boleta,
		compro_tipo
		
		from comprobante c
		where compro_id  = ID
		GROUP BY compro_serie, compro_tipo
	-- 	where compro_id COLLATE utf8mb4_general_ci = ID
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REGISTRAR_ABONO_VENTA_CREDITO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_ABONO_VENTA_CREDITO`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_ABONO_VENTA_CREDITO`(IN p_nro_bol VARCHAR(13), IN p_monto DECIMAL(10,2), IN p_caja_id INT)
BEGIN
    -- Declaración de variables
    DECLARE abono FLOAT;
    DECLARE tventa FLOAT;

    -- Insertar el pago en la tabla venta_credito
    INSERT INTO venta_credito (nro_boleta, monto, fecha_pago, estado, caja_estado, caja_id)
    VALUE(p_nro_bol, p_monto, CONVERT_TZ(CURRENT_TIMESTAMP(),'SYSTEM','-05:00'), 'PAGADO', 'VIGENTE', p_caja_id);
    
    -- Actualizar el campo abonado de la tabla venta_cabecera
    UPDATE venta_cabecera
    SET abonado = abonado + p_monto
    WHERE nro_boleta = p_nro_bol;
    
    -- Recalcular el valor de abono después de la actualización
    SET abono := (SELECT SUM(monto) FROM venta_credito WHERE nro_boleta = p_nro_bol);

    -- Verificar si abono es igual al total_venta y actualizar el estado
    IF abono >= (SELECT total_venta FROM venta_cabecera WHERE nro_boleta = p_nro_bol) THEN
        UPDATE venta_cabecera
        SET venta_estado = 'PAGADA'
        WHERE nro_boleta = p_nro_bol;  
    END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REGISTRAR_APERTURA_CAJA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_APERTURA_CAJA`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_APERTURA_CAJA`(IN DESCRIPCION VARCHAR(100), IN MONTO_INI FLOAT)
BEGIN
DECLARE CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM caja where caja_estado='VIGENTE');
if @CANTIDAD = 0 THEN
	INSERT INTO caja (caja_descripcion, caja_monto_inicial, caja_f_apertura, caja_estado, caja_hora_apertura) VALUES(DESCRIPCION, MONTO_INI, DATE(CONVERT_TZ(NOW(),'SYSTEM','-05:00')), 'VIGENTE', TIME(CONVERT_TZ(NOW(),'SYSTEM','-05:00')));
SELECT 1;
ELSE
SELECT 2;
END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REGISTRAR_CAJA_CIERRE
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_CAJA_CIERRE`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_CAJA_CIERRE`(IN MONTO_INGRESO FLOAT, IN CANT_INGRES VARCHAR(100), IN MONTO_EGRES FLOAT,  IN CANT_EGRESO VARCHAR(100), IN MONTO_TOTAL FLOAT, IN MONTO_I_DIREC FLOAT, IN MONTO_E_DIREC FLOAT,  IN MONTO_ABON FLOAT, IN CANT_ABON VARCHAR(100))
BEGIN 
	
		UPDATE caja SET 
		caja_monto_ingreso = MONTO_INGRESO,
			caja_count_ingreso = CANT_INGRES,
			caja__monto_egreso = MONTO_EGRES,
			caja_count_egreso = CANT_EGRESO,
		caja_f_cierre = DATE(CONVERT_TZ(NOW(),'SYSTEM','-05:00')),
		caja_monto_total = MONTO_TOTAL,
		caja_estado = 'CERRADO',
		caja_hora_cierre = TIME(CONVERT_TZ(NOW(),'SYSTEM','-05:00')),
		caja_monto_ing_directo = MONTO_I_DIREC,
		caja_monto_egre_directo = MONTO_E_DIREC,
		caja_abonos = MONTO_ABON,
		caja_count_abonos = CANT_ABON
		WHERE caja_estado = 'VIGENTE';

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REGISTRAR_COMPROBANTES
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_COMPROBANTES`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_COMPROBANTES`(IN tipo VARCHAR(255), IN serie varchar(4), IN numero varchar(8))
BEGIN

INSERT INTO comprobante (compro_tipo, compro_serie, compro_numero, compro_estado) 
VALUES (tipo, serie, numero, 'ACTIVO');

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REPORTE_COMPARATIVO_ANUAL
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_COMPARATIVO_ANUAL`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_COMPARATIVO_ANUAL`()
SELECT 
YEAR(fecha_venta) as ano,
count(total_venta) as cant_venta_ano,
SUM(total_venta) as total_venta_ano
FROM venta_cabecera
where venta_estado IN ('REGISTRADA', 'PAGADA', 'CREDITO') GROUP BY YEAR(fecha_venta)
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REPORTE_COMPARATIVO_ANUAL_COMPRAS
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_COMPARATIVO_ANUAL_COMPRAS`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_COMPARATIVO_ANUAL_COMPRAS`()
SELECT 
YEAR(fecha_comprobante) as ano,
count(total_compra) as cant_venta_ano,
SUM(total_compra) as total_venta_ano
FROM compra_cabecera
where compra_estado ='REGISTRADA' GROUP BY YEAR(fecha_comprobante)
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REPORTE_COMPRAS_DEL_DIA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_COMPRAS_DEL_DIA`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_COMPRAS_DEL_DIA`(IN FINICIO DATE, IN FFIN DATE)
SELECT
	DATE_FORMAT(cc.fecha_comprobante, '%d/%m/%Y') as fecha,
	cp.compro_tipo,
	cc.nro_compra,
	c.cliente_nombres,
	cc.ope_gravada,
	cc.igv,
	cc.total_compra
FROM
	compra_cabecera cc
	INNER JOIN clientes c ON cc.cliente_id = c.cliente_id
		INNER JOIN comprobante cp on cc.compro_id = cp.compro_id
	where cc.compra_estado = 'REGISTRADA'
	and   DATE(cc.fecha_comprobante) BETWEEN FINICIO AND FFIN 	
	ORDER BY cc.fecha_comprobante asc
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REPORTE_COMPRAS_MES_ANIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_COMPRAS_MES_ANIO`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_COMPRAS_MES_ANIO`(IN MES VARCHAR(5),IN ANIO VARCHAR(10))
SELECT 
		cl.cliente_nombres, 
	CONCAT_WS(' - ',cp.compro_tipo, cc.nro_compra) AS comprobante, 
	cc.total_compra, 
	COUNT(cd.cantidad) AS cant_prod,  
	DATE_FORMAT(cc.fecha_comprobante, '%d/%m/%Y') as fecha, 
	u.nombre_usuario
FROM
	compra_cabecera cc
	INNER JOIN
	clientes cl
	ON 
		cc.cliente_id = cl.cliente_id
	INNER JOIN
	comprobante cp
	ON 
		cc.compro_id = cp.compro_id
	INNER JOIN
	compra_detalle cd
	ON 
		cc.nro_compra = cd.nro_compra
	INNER JOIN
	usuarios u
	ON 
		cc.id_usuario = u.id_usuario
		
		
		WHERE  cc.compra_estado ='REGISTRADA'
		and (select MONTH(cc.fecha_comprobante))= MES
		and YEAR(cc.fecha_comprobante)= ANIO
		GROUP BY cc.nro_compra, cl.cliente_nombres ,comprobante, cc.total_compra, u.nombre_usuario, cc.fecha_comprobante
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REPORTE_COMPRAS_POR_ANIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_COMPRAS_POR_ANIO`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_COMPRAS_POR_ANIO`(IN ANIO VARCHAR(10))
SELECT 
YEAR(cc.fecha_comprobante) as ano, 
case month(cc.fecha_comprobante) 
WHEN 1 THEN 'Enero'
WHEN 2 THEN  'Febrero'
WHEN 3 THEN 'Marzo' 
WHEN 4 THEN 'Abril' 
WHEN 5 THEN 'Mayo'
WHEN 6 THEN 'Junio'
WHEN 7 THEN 'Julio'
WHEN 8 THEN 'Agosto'
WHEN 9 THEN 'Septiembre'
WHEN 10 THEN 'Octubre'
WHEN 11 THEN 'Noviembre'
WHEN 12 THEN 'Diciembre'
 END mesnombre ,
 count(cc.total_compra) as cant_ventas,
 SUM(cc.total_compra) as total
FROM compra_cabecera cc
where cc.compra_estado ='REGISTRADA' and YEAR(cc.fecha_comprobante) = ANIO
GROUP BY cc.fecha_comprobante
-- YEAR(cc.fecha_comprobante), month(cc.fecha_comprobante)
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REPORTE_COMPRA_RECORD_USUARIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_COMPRA_RECORD_USUARIO`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_COMPRA_RECORD_USUARIO`(IN ID INT,IN ANIO VARCHAR(10))
SELECT 
YEAR(c.fecha_comprobante) as ano, 
case month(c.fecha_comprobante) 
WHEN 1 THEN 'Enero'
WHEN 2 THEN  'Febrero'
WHEN 3 THEN 'Marzo' 
WHEN 4 THEN 'Abril' 
WHEN 5 THEN 'Mayo'
WHEN 6 THEN 'Junio'
WHEN 7 THEN 'Julio'
WHEN 8 THEN 'Agosto'
WHEN 9 THEN 'Septiembre'
WHEN 10 THEN 'Octubre'
WHEN 11 THEN 'Noviembre'
WHEN 12 THEN 'Diciembre'
 END mesnombre,
 u.usuario as usu_nombre,	
count(c.total_compra) as cant_ventas,
SUM(c.total_compra) as total
FROM compra_cabecera c
INNER JOIN
	usuarios u
	ON 
		c.id_usuario = u.id_usuario
where c.compra_estado ='REGISTRADA' and YEAR(c.fecha_comprobante) = ANIO and c.id_usuario = ID
GROUP BY c.fecha_comprobante, u.usuario
-- YEAR(c.fecha_comprobante), month(c.fecha_comprobante)
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REPORTE_CREDITOS_COMPARATIVO_ANUAL
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_CREDITOS_COMPARATIVO_ANUAL`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_CREDITOS_COMPARATIVO_ANUAL`()
SELECT 
YEAR(fecha_venta) as ano,
count(total_venta) as cant_venta_ano,
SUM(total_venta) as total_venta_ano
FROM venta_cabecera
where venta_estado IN ( 'PAGADA', 'CREDITO') GROUP BY YEAR(fecha_venta)
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REPORTE_LISTAR_TOTAL_CIERRE_CAJA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_LISTAR_TOTAL_CIERRE_CAJA`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_LISTAR_TOTAL_CIERRE_CAJA`()
SELECT 
	(select ROUND(MAX(caja_monto_inicial),2) from caja where caja_estado = 'VIGENTE') as monto_inicial_caja,
	
	(select ROUND(IFNULL(SUM(total_venta),0),2) from venta_cabecera where estado_caja = 'VIGENTE' AND venta_estado = 'REGISTRADA' ) as suma_ventas,
	(select  COUNT(*) from venta_cabecera where estado_caja = 'VIGENTE' AND venta_estado = 'REGISTRADA' ) as conta_ventas,
	
	(select ROUND(IFNULL(SUM(monto),0),2) from venta_credito where caja_estado = 'VIGENTE'  ) as suma_abonos,
	
	(select  COUNT(*) from venta_credito where caja_estado = 'VIGENTE'  ) as conta_abonos,
	
	(select ROUND(IFNULL(SUM(total_compra),0),2) from compra_cabecera where estado_caja = 'VIGENTE' AND compra_estado = 'REGISTRADA' ) as suma_compras,
	(select  COUNT(*) from compra_cabecera where estado_caja = 'VIGENTE' AND compra_estado = 'REGISTRADA' ) as conta_compras,

	(select caja_estado from caja where caja_estado = 'VIGENTE' ) as estado,
	(select  CONCAT_WS(' ',DATE_FORMAT(caja_f_apertura, '%d/%m/%Y'), caja_hora_apertura)  from caja where caja_estado = 'VIGENTE' ) as fecha_apertura,
	
	(Select COUNT(*) from movimientos where movi_tipo = 'INGRESO' AND movi_caja = 'VIGENTE') as cant_ingresos,
	(select ROUND(IFNULL(SUM(movi_monto),0),2) from movimientos where movi_tipo = 'INGRESO' AND movi_caja = 'VIGENTE') as suma_ingresos,
	(Select COUNT(*) from movimientos where movi_tipo = 'EGRESO' AND movi_caja = 'VIGENTE') as cant_egresos,
	(select ROUND(IFNULL(SUM(movi_monto),0),2) from movimientos where movi_tipo = 'EGRESO' AND movi_caja = 'VIGENTE') as suma_egresos
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REPORTE_MOVIMIENTOS_FECHAS
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_MOVIMIENTOS_FECHAS`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_MOVIMIENTOS_FECHAS`(IN MOVI VARCHAR(50), IN FINICIO DATE, IN FFIN DATE)
SELECT

	movi_tipo,
	movi_descripcion,
	ROUND(movi_monto,2) as monto,
	 DATE_FORMAT(movi_fecha, '%d/%m/%Y') as fecha,
	 movi_responsable,
	 movi_caja

FROM
	movimientos 
	WHERE movi_tipo = MOVI
		and   DATE(movi_fecha) BETWEEN FINICIO AND FFIN
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REPORTE_PIVOT_COMPRAS
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_PIVOT_COMPRAS`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_PIVOT_COMPRAS`()
SELECT YEAR(fecha_comprobante) as anio,
SUM(CASE WHEN MONTH(fecha_comprobante)=1 THEN total_compra ELSE 0 END) AS enero,
SUM(CASE WHEN MONTH(fecha_comprobante)=2 THEN total_compra ELSE 0 END) AS febrero,
SUM(CASE WHEN MONTH(fecha_comprobante)=3 THEN total_compra ELSE 0 END) AS marzo,
SUM(CASE WHEN MONTH(fecha_comprobante)=4 THEN total_compra ELSE 0 END) AS abril,
SUM(CASE WHEN MONTH(fecha_comprobante)=5 THEN total_compra ELSE 0 END) AS mayo,
SUM(CASE WHEN MONTH(fecha_comprobante)=6 THEN total_compra ELSE 0 END) AS junio,
SUM(CASE WHEN MONTH(fecha_comprobante)=7 THEN total_compra ELSE 0 END) AS julio,
SUM(CASE WHEN MONTH(fecha_comprobante)=8 THEN total_compra ELSE 0 END) AS agosto,
SUM(CASE WHEN MONTH(fecha_comprobante)=9 THEN total_compra ELSE 0 END) AS setiembre,
SUM(CASE WHEN MONTH(fecha_comprobante)=10 THEN total_compra ELSE 0 END) AS octubre,
SUM(CASE WHEN MONTH(fecha_comprobante)=11 THEN total_compra ELSE 0 END) AS noviembre,
SUM(CASE WHEN MONTH(fecha_comprobante)=12 THEN total_compra ELSE 0 END) AS diciembre,
SUM(total_compra) as total
FROM compra_cabecera
WHERE compra_estado ='REGISTRADA'
GROUP BY YEAR(fecha_comprobante)
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REPORTE_PIVOT_VENTAS
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_PIVOT_VENTAS`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_PIVOT_VENTAS`()
SELECT YEAR(fecha_venta) as anio,
SUM(CASE WHEN MONTH(fecha_venta)=1 THEN total_venta ELSE 0 END) AS enero,
SUM(CASE WHEN MONTH(fecha_venta)=2 THEN total_venta ELSE 0 END) AS febrero,
SUM(CASE WHEN MONTH(fecha_venta)=3 THEN total_venta ELSE 0 END) AS marzo,
SUM(CASE WHEN MONTH(fecha_venta)=4 THEN total_venta ELSE 0 END) AS abril,
SUM(CASE WHEN MONTH(fecha_venta)=5 THEN total_venta ELSE 0 END) AS mayo,
SUM(CASE WHEN MONTH(fecha_venta)=6 THEN total_venta ELSE 0 END) AS junio,
SUM(CASE WHEN MONTH(fecha_venta)=7 THEN total_venta ELSE 0 END) AS julio,
SUM(CASE WHEN MONTH(fecha_venta)=8 THEN total_venta ELSE 0 END) AS agosto,
SUM(CASE WHEN MONTH(fecha_venta)=9 THEN total_venta ELSE 0 END) AS setiembre,
SUM(CASE WHEN MONTH(fecha_venta)=10 THEN total_venta ELSE 0 END) AS octubre,
SUM(CASE WHEN MONTH(fecha_venta)=11 THEN total_venta ELSE 0 END) AS noviembre,
SUM(CASE WHEN MONTH(fecha_venta)=12 THEN total_venta ELSE 0 END) AS diciembre,
SUM(total_venta ) as total
FROM venta_cabecera
WHERE venta_estado IN ('REGISTRADA', 'PAGADA', 'CREDITO')
GROUP BY YEAR(fecha_venta)
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REPORTE_UTILIDAD_PRODUCTOS / se agrego " - dv.vd_descuento"
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_UTILIDAD_PRODUCTOS`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_UTILIDAD_PRODUCTOS`()
SELECT
	CONCAT_WS(' | ', p.codigo_producto, p.descripcion_producto) as producto, 
		SUM(dv.cantidad) as cantida_vendidos,
	MAX(dv.precio_unitario_venta) as precio_venta,
	p.precio_compra_producto as precio_compra, 
	ROUND((MAX(dv.precio_unitario_venta) - p.precio_compra_producto),4) as utilidad,
	 ROUND(SUM(((dv.precio_unitario_venta - p.precio_compra_producto) * dv.cantidad) - dv.vd_descuento),4) as suma_total
FROM
	productos p
	INNER JOIN
	venta_detalle dv
	ON 
		p.codigo_producto = dv.codigo_producto
	AND dv.venta_estado = 'REGISTRADA'
		 GROUP BY dv.codigo_producto
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REPORTE_VENTA_CREDITO_FECHAS
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_VENTA_CREDITO_FECHAS`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_VENTA_CREDITO_FECHAS`(IN FINICIO DATE, IN FFIN DATE)
SELECT
	DATE_FORMAT(vc.fecha_venta, '%d/%m/%Y') as fecha,
	cp.compro_tipo,
	vc.nro_boleta,
	c.cliente_nombres,
	vc.subtotal,
	vc.igv,
	vc.total_venta,
	vc.abonado,
	CASE 
	WHEN vc.venta_estado = 'PAGADA' THEN
		'PAGADA'
	ELSE
	CONCAT('PENDIENTE: ', (vc.total_venta - vc.abonado ))
END as venta_est
FROM
	venta_cabecera vc
	INNER JOIN clientes c ON vc.cliente_id = c.cliente_id
		INNER JOIN comprobante cp on vc.compro_id = cp.compro_id
	where vc.venta_estado IN ('PAGADA', 'CREDITO')
	and   DATE(vc.fecha_venta) BETWEEN FINICIO AND FFIN 	
	ORDER BY vc.fecha_venta asc
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REPORTE_VENTA_CREDITO_MES_ANIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_VENTA_CREDITO_MES_ANIO`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_VENTA_CREDITO_MES_ANIO`(IN MES VARCHAR(5),IN ANIO VARCHAR(10))
SELECT 
	CONCAT(	cl.cliente_nombres, ' | CREDITO: ', vc.total_venta, ' ',
	CASE 
			WHEN vc.venta_estado = 'CREDITO' THEN 'PENDIENTE'
			ELSE
				'PAGADA'
		END  , ': ', (vc.total_venta - vc.abonado)) as cliente, 
	CONCAT_WS(' - ',cp.compro_tipo, vc.nro_boleta) AS comprobante, 
	vc.total_venta, 
	COUNT(dv.cantidad) AS cant_prod,  
	DATE_FORMAT(vc.fecha_venta, '%d/%m/%Y') as fecha, 
	u.nombre_usuario

FROM
	venta_cabecera vc
	INNER JOIN
	clientes cl
	ON 
		vc.cliente_id = cl.cliente_id
	INNER JOIN
	comprobante cp
	ON 
		vc.compro_id = cp.compro_id
	INNER JOIN
	venta_detalle dv
	ON 
		vc.nro_boleta = dv.nro_boleta
	INNER JOIN
	usuarios u
	ON 
		vc.id_usuario = u.id_usuario
		
		
		WHERE  vc.venta_estado IN ('PAGADA', 'CREDITO')
		and (select MONTH(vc.fecha_venta))= MES
		and YEAR(vc.fecha_venta)= ANIO
		GROUP BY vc.nro_boleta
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REPORTE_VENTA_CREDITO_POR_ANIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_VENTA_CREDITO_POR_ANIO`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_VENTA_CREDITO_POR_ANIO`(IN ANIO VARCHAR(10))
SELECT 
YEAR(v.fecha_venta) as ano, 
case month(v.fecha_venta) 
WHEN 1 THEN 'Enero'
WHEN 2 THEN  'Febrero'
WHEN 3 THEN 'Marzo' 
WHEN 4 THEN 'Abril' 
WHEN 5 THEN 'Mayo'
WHEN 6 THEN 'Junio'
WHEN 7 THEN 'Julio'
WHEN 8 THEN 'Agosto'
WHEN 9 THEN 'Septiembre'
WHEN 10 THEN 'Octubre'
WHEN 11 THEN 'Noviembre'
WHEN 12 THEN 'Diciembre'
 END mesnombre ,
 count(*) as cant_ventas,
 SUM(v.total_venta) as total
FROM venta_cabecera v
where venta_estado IN ( 'PAGADA', 'CREDITO') and YEAR(v.fecha_venta) = ANIO
GROUP BY month(v.fecha_venta), YEAR(v.fecha_venta), mesnombre
-- YEAR(v.fecha_venta), month(v.fecha_venta)
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REPORTE_VENTA_DEL_DIA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_VENTA_DEL_DIA`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_VENTA_DEL_DIA`(IN FINICIO DATE, IN FFIN DATE)
SELECT
	DATE_FORMAT(vc.fecha_venta, '%d/%m/%Y') as fecha,
	cp.compro_tipo,
	vc.nro_boleta,
	c.cliente_nombres,
	vc.subtotal,
	vc.igv,
	vc.total_venta
FROM
	venta_cabecera vc
	INNER JOIN clientes c ON vc.cliente_id = c.cliente_id
		INNER JOIN comprobante cp on vc.compro_id = cp.compro_id
	where vc.venta_estado = 'REGISTRADA'
	and   DATE(vc.fecha_venta) BETWEEN FINICIO AND FFIN 	
	ORDER BY vc.fecha_venta asc
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REPORTE_VENTA_MES_ANIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_VENTA_MES_ANIO`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_VENTA_MES_ANIO`(IN MES VARCHAR(5),IN ANIO VARCHAR(10))
SELECT 
		cl.cliente_nombres, 
	CONCAT_WS(' - ',cp.compro_tipo, vc.nro_boleta) AS comprobante, 
	vc.total_venta, 
	COUNT(dv.cantidad) AS cant_prod,  
	DATE_FORMAT(vc.fecha_venta, '%d/%m/%Y') as fecha, 
	u.nombre_usuario
FROM
	venta_cabecera vc
	INNER JOIN
	clientes cl
	ON 
		vc.cliente_id = cl.cliente_id
	INNER JOIN
	comprobante cp
	ON 
		vc.compro_id = cp.compro_id
	INNER JOIN
	venta_detalle dv
	ON 
		vc.nro_boleta = dv.nro_boleta
	INNER JOIN
	usuarios u
	ON 
		vc.id_usuario = u.id_usuario
		
		
		WHERE  vc.venta_estado ='REGISTRADA'
		and (select MONTH(vc.fecha_venta))= MES
		and YEAR(vc.fecha_venta)= ANIO
		GROUP BY vc.nro_boleta
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REPORTE_VENTA_POR_ANIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_VENTA_POR_ANIO`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_VENTA_POR_ANIO`(IN ANIO VARCHAR(10))
SELECT 
YEAR(v.fecha_venta) as ano, 
case month(v.fecha_venta) 
WHEN 1 THEN 'Enero'
WHEN 2 THEN  'Febrero'
WHEN 3 THEN 'Marzo' 
WHEN 4 THEN 'Abril' 
WHEN 5 THEN 'Mayo'
WHEN 6 THEN 'Junio'
WHEN 7 THEN 'Julio'
WHEN 8 THEN 'Agosto'
WHEN 9 THEN 'Septiembre'
WHEN 10 THEN 'Octubre'
WHEN 11 THEN 'Noviembre'
WHEN 12 THEN 'Diciembre'
 END mesnombre ,
 count(*) as cant_ventas,
 SUM(v.total_venta) as total
FROM venta_cabecera v
where venta_estado IN ('REGISTRADA', 'PAGADA', 'CREDITO') and YEAR(v.fecha_venta) = ANIO
GROUP BY month(v.fecha_venta), YEAR(v.fecha_venta), mesnombre
-- YEAR(v.fecha_venta), month(v.fecha_venta)
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REPORTE_VENTA_RECORD_USUARIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REPORTE_VENTA_RECORD_USUARIO`;
delimiter ;;
CREATE PROCEDURE `SP_REPORTE_VENTA_RECORD_USUARIO`(IN ID INT,IN ANIO VARCHAR(10))
SELECT 
YEAR(v.fecha_venta) as ano, 
case month(v.fecha_venta) 
WHEN 1 THEN 'Enero'
WHEN 2 THEN  'Febrero'
WHEN 3 THEN 'Marzo' 
WHEN 4 THEN 'Abril' 
WHEN 5 THEN 'Mayo'
WHEN 6 THEN 'Junio'
WHEN 7 THEN 'Julio'
WHEN 8 THEN 'Agosto'
WHEN 9 THEN 'Septiembre'
WHEN 10 THEN 'Octubre'
WHEN 11 THEN 'Noviembre'
WHEN 12 THEN 'Diciembre'
 END mesnombre,
 u.usuario as usu_nombre,	
count(v.total_venta) as cant_ventas,
SUM(v.total_venta) as total
FROM venta_cabecera v
INNER JOIN
	usuarios u
	ON 
		v.id_usuario = u.id_usuario
where venta_estado IN ('REGISTRADA','PAGADA', 'CREDITO') and YEAR(v.fecha_venta) = ANIO and v.id_usuario = ID
GROUP BY YEAR(v.fecha_venta), month(v.fecha_venta), mesnombre, u.usuario
-- YEAR(v.fecha_venta),
-- month(v.fecha_venta)
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_SELECT_TALLAS_PARA_CODIGO_BARRA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_SELECT_TALLAS_PARA_CODIGO_BARRA`;
delimiter ;;
CREATE PROCEDURE `SP_SELECT_TALLAS_PARA_CODIGO_BARRA`(IN codigo_p VARCHAR(20))
SELECT 
	tp.id_talla,
	t.descripcion, 
	tp.stock,
	'' as opcion
FROM
	talla_producto tp
	INNER JOIN talla t on tp.id_talla = t.id_talla
WHERE
	tp.codigo_producto  =  codigo_p and tp.stock > '0'
	
	-- tp.codigo_producto COLLATE utf8mb4_general_ci =  codigo_p and tp.stock > '0'
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_SELECT_TALLAS_POR_CODIGO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_SELECT_TALLAS_POR_CODIGO`;
delimiter ;;
CREATE PROCEDURE `SP_SELECT_TALLAS_POR_CODIGO`(IN codigo_p VARCHAR(20))
SELECT 
	tp.id_talla,
	t.descripcion, 
	tp.stock,
	'' as opcion
FROM
	talla_producto tp
	INNER JOIN talla t on tp.id_talla = t.id_talla
WHERE
	tp.codigo_producto COLLATE utf8mb4_general_ci=  codigo_p
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_VER_DETALLE_TALLAS_PRODUCTO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_VER_DETALLE_TALLAS_PRODUCTO`;
delimiter ;;
CREATE PROCEDURE `SP_VER_DETALLE_TALLAS_PRODUCTO`(IN codigo_p VARCHAR(20))
SELECT
	tp.id_talla,
	t.descripcion,
	tp.stock ,
	'' as opcion
FROM
	talla_producto tp
	INNER JOIN talla t on tp.id_talla = t.id_talla
WHERE
	tp.codigo_producto = codigo_p
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table caja
-- ----------------------------
DROP TRIGGER IF EXISTS `TG_CERRAR_VENTA`;
delimiter ;;
CREATE TRIGGER `TG_CERRAR_VENTA` BEFORE UPDATE ON `caja` FOR EACH ROW BEGIN

UPDATE venta_cabecera SET
estado_caja= 'CERRADO'
where estado_caja='VIGENTE' AND venta_estado IN ('REGISTRADA', 'PAGADA');
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table caja
-- ----------------------------
DROP TRIGGER IF EXISTS `TG_CERRAR_OMPRA`;
delimiter ;;
CREATE TRIGGER `TG_CERRAR_OMPRA` BEFORE UPDATE ON `caja` FOR EACH ROW BEGIN

UPDATE compra_cabecera SET
estado_caja= 'CERRADO'
where estado_caja='VIGENTE';
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table caja
-- ----------------------------
DROP TRIGGER IF EXISTS `TG_CERRAR_MOV`;
delimiter ;;
CREATE TRIGGER `TG_CERRAR_MOV` BEFORE UPDATE ON `caja` FOR EACH ROW BEGIN

UPDATE movimientos SET
movi_caja= 'CERRADO'
where movi_caja='VIGENTE';
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table caja
-- ----------------------------
DROP TRIGGER IF EXISTS `TG_CERRAR_VENT_CREDITO`;
delimiter ;;
CREATE TRIGGER `TG_CERRAR_VENT_CREDITO` BEFORE UPDATE ON `caja` FOR EACH ROW BEGIN

UPDATE venta_credito SET
caja_estado = 'CERRADO'
where caja_estado='VIGENTE';
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table venta_cabecera
-- ----------------------------
DROP TRIGGER IF EXISTS `actualizar_credito_pagado`;
delimiter ;;
CREATE TRIGGER `actualizar_credito_pagado` AFTER UPDATE ON `venta_cabecera` FOR EACH ROW BEGIN
	/* DECLARE abono FLOAT;
	
	 SET abono:=(SELECT SUM(monto) FROM venta_credito WHERE nro_boleta = NEW.nro_boleta);
   IF abono >= NEW.total_venta THEN
        UPDATE venta_cabecera
        SET venta_estado = 'PAGADA'
        WHERE nro_boleta = NEW.nro_boleta;  
    END IF;*/
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;

