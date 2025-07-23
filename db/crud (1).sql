/*
 Navicat Premium Dump SQL

 Source Server         : MariaDB
 Source Server Type    : MariaDB
 Source Server Version : 110802 (11.8.2-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : crud

 Target Server Type    : MariaDB
 Target Server Version : 110802 (11.8.2-MariaDB)
 File Encoding         : 65001

 Date: 26/06/2025 14:29:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for compra
-- ----------------------------
DROP TABLE IF EXISTS `compra`;
CREATE TABLE `compra`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NULL DEFAULT NULL,
  `producto` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `usuario`(`usuario` ASC) USING BTREE,
  INDEX `producto`(`producto` ASC) USING BTREE,
  CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`producto`) REFERENCES `producto` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_uca1400_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of compra
-- ----------------------------

-- ----------------------------
-- Table structure for producto
-- ----------------------------
DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci NULL DEFAULT NULL,
  `nombre_producto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci NULL DEFAULT NULL,
  `descripcion` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci NULL DEFAULT NULL,
  `precio` decimal(10, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_uca1400_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of producto
-- ----------------------------
INSERT INTO `producto` VALUES (1, 'public/img/685d982a7720d_Screenshot 2025-06-26 at 12-53-40 CES 2024 Alienware\'s new laptop looks like regular notebook but packs gaming power.png', 'AlienWare', 'Laptop 14va Generacion con procesador IntelCore Ultra 9 1TB de almacenamiento y 32GB de RAM', 1800.20);
INSERT INTO `producto` VALUES (2, 'public/img/685d98391dcf3_Screenshot 2025-06-26 at 12-54-59 The M3 MacBook Air M3 is a remarkable $250 off right now Macworld.png', 'Macbook Air', 'Laptop 12va Generacion procesador ionic8 1TB de almacenamiento y 16GB de RAM', 1500.50);
INSERT INTO `producto` VALUES (4, 'public/img/685d98434701c_Screenshot 2025-06-26 at 12-55-57 Battery AI Conoce la nueva característica de Samsung S25 Ultra - Inteligencia Artificial.png', 'Samsun S25 Ultra', 'Telefono Samsung S25 Ultra Procesador Snapdragon Qualcom G3 512GB almacenamiento 12 RAM', 1700.00);
INSERT INTO `producto` VALUES (5, 'public/img/685d9bd736b4f_Screenshot 2025-06-26 at 14-11-41 Apple presenta el iPhone 16 Pro y el iPhone 16 Pro Max - Apple.png', 'iPhone 16 Pro Max', 'iPhone 16 Pro Max Procesador A18Pro 512GB almacenamiento 8GB de RAM ', 1900.00);
INSERT INTO `producto` VALUES (6, 'public/img/685d9c74c1423_Screenshot 2025-06-26 at 14-14-56 Huawei Matebook X Pro análisis review con características precio y especificaciones.png', 'Huawei Matbook X Pro', 'Laptop Huawei 13va Generacion con procesador IntelCore 7 1TB de almacenamiento y 16GB de RAM', 1200.00);
INSERT INTO `producto` VALUES (7, 'public/img/685d9d59ea543_Screenshot 2025-06-26 at 14-17-52 Samsung Galaxy A56 5G análisis uno de los reyes de la gama media notable en todo y con 6 años de actualizaciones.png', 'Samsung A56 5G', 'Telefono Samsung A56 con Procesador Exynos 1580 256GB de almacenamiento y 12GB de RAM', 510.00);
INSERT INTO `producto` VALUES (8, 'public/img/685d9dd1cd263_Screenshot 2025-06-26 at 14-20-42 ▷ Mejores audífonos Sony 2025 Experto Hiraoka.png', 'Audifonos Sony WH-1000XM5 Noise Cancelling', 'Audifonos inalambricos Sony WH-1000XM5 Noise Cancelling ', 462.00);
INSERT INTO `producto` VALUES (9, 'public/img/685d9e47d95fd_maxresdefault.jpg', 'OPPO WATCH X', 'Smart Watch con 32horas de duracion', 210.00);

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci NULL DEFAULT NULL,
  `apellido` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci NULL DEFAULT NULL,
  `telefono` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci NULL DEFAULT NULL,
  `correo` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci NULL DEFAULT NULL,
  `usuario` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci NULL DEFAULT NULL,
  `clave` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci NULL DEFAULT NULL,
  `estado` enum('activo','inactivo') CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_uca1400_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES (1, 'lex', 'ugsha', '123456789', '@gmail.com', 'lex', '123', 'activo');

SET FOREIGN_KEY_CHECKS = 1;
