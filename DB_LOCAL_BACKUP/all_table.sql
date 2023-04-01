/*
 Navicat Premium Data Transfer

 Source Server         : ret.local
 Source Server Type    : MySQL
 Source Server Version : 50562 (5.5.62-log)
 Source Host           : retdev.test:3306
 Source Schema         : tabel_peserta

 Target Server Type    : MySQL
 Target Server Version : 50562 (5.5.62-log)
 File Encoding         : 65001

 Date: 01/04/2023 15:11:26
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for peserta
-- ----------------------------
DROP TABLE IF EXISTS `peserta`;
CREATE TABLE `peserta`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NULL DEFAULT NULL,
  `nomor_telpon` varchar(255) NULL DEFAULT NULL,
  `email` varchar(255) NULL DEFAULT NULL,
  `alamat` varchar(255) NULL DEFAULT NULL,
  `created_datetime` datetime NULL DEFAULT NULL,
  `modified_datetime` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13;

-- ----------------------------
-- Records of peserta
-- ----------------------------
INSERT INTO `peserta` VALUES (10, 'Yazid A.R', '0822', 'aa@gmail.com', 'dasdsa', '2023-04-01 13:56:23', '2023-04-01 13:57:56'), (11, 'bbbbb', '0844', 'bb@gmail.com', 'bbbb', '2023-04-01 13:57:01', '2023-04-01 13:57:44'), (12, 'dvfdfvdfvfd', '08222', 'dd@gmail.com', 'vdfvdfvdf', '2023-04-01 13:58:30', NULL);

SET FOREIGN_KEY_CHECKS = 1;
