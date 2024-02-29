/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 80030
 Source Host           : localhost:3306
 Source Schema         : medicine_forecast

 Target Server Type    : MySQL
 Target Server Version : 80030
 File Encoding         : 65001

 Date: 29/02/2024 16:08:43
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for forecasts
-- ----------------------------
DROP TABLE IF EXISTS `forecasts`;
CREATE TABLE `forecasts`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tgl_jual` date NOT NULL,
  `no_faktur` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_obat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_keluar` int NOT NULL,
  `harga_satuan` int NOT NULL,
  `total_harga` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of forecasts
-- ----------------------------

-- ----------------------------
-- Table structure for histories
-- ----------------------------
DROP TABLE IF EXISTS `histories`;
CREATE TABLE `histories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tahun` int NULL DEFAULT NULL,
  `bulan` int NULL DEFAULT NULL,
  `medicine_id` int NULL DEFAULT NULL,
  `jumlah_keluar` int NULL DEFAULT NULL,
  `total` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 180 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of histories
-- ----------------------------
INSERT INTO `histories` VALUES (1, 2017, 1, 5, 92, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (2, 2017, 2, 5, 152, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (3, 2017, 3, 5, 147, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (4, 2017, 4, 5, 256, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (5, 2017, 5, 5, 113, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (6, 2017, 6, 5, 90, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (7, 2017, 7, 5, 66, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (8, 2017, 8, 5, 150, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (9, 2017, 9, 5, 71, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (10, 2017, 10, 5, 144, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (11, 2017, 11, 5, 154, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (12, 2017, 12, 5, 156, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (13, 2018, 1, 5, 215, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (14, 2018, 2, 5, 131, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (15, 2018, 3, 5, 172, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (16, 2018, 4, 5, 159, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (17, 2018, 5, 5, 258, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (18, 2018, 6, 5, 108, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (19, 2018, 7, 5, 157, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (20, 2018, 8, 5, 100, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (21, 2018, 9, 5, 156, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (22, 2018, 10, 5, 177, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (23, 2018, 11, 5, 172, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (24, 2018, 12, 5, 132, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (25, 2019, 1, 5, 134, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (26, 2019, 2, 5, 154, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (27, 2019, 3, 5, 149, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (28, 2019, 4, 5, 106, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (29, 2019, 5, 5, 141, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (30, 2019, 6, 5, 108, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (31, 2019, 7, 5, 296, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (32, 2019, 8, 5, 142, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (33, 2019, 9, 5, 180, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (34, 2019, 10, 5, 95, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (35, 2019, 11, 5, 256, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (36, 2019, 12, 5, 130, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (37, 2017, 1, 6, 120, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (38, 2017, 2, 6, 80, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (39, 2017, 3, 6, 100, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (40, 2017, 4, 6, 80, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (41, 2017, 5, 6, 40, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (42, 2017, 6, 6, 70, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (43, 2017, 7, 6, 70, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (44, 2017, 8, 6, 160, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (45, 2017, 9, 6, 137, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (46, 2017, 10, 6, 130, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (47, 2017, 11, 6, 150, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (48, 2017, 12, 6, 190, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (49, 2018, 1, 6, 113, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (50, 2018, 2, 6, 165, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (51, 2018, 3, 6, 130, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (52, 2018, 4, 6, 165, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (53, 2018, 5, 6, 131, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (54, 2018, 6, 6, 250, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (55, 2018, 7, 6, 240, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (56, 2018, 8, 6, 160, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (57, 2018, 9, 6, 197, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (58, 2018, 10, 6, 170, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (59, 2018, 11, 6, 210, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (60, 2018, 12, 6, 290, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (61, 2019, 1, 6, 330, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (62, 2019, 2, 6, 145, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (63, 2019, 3, 6, 170, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (64, 2019, 4, 6, 140, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (65, 2019, 5, 6, 135, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (66, 2019, 6, 6, 231, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (67, 2019, 7, 6, 170, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (68, 2019, 8, 6, 220, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (69, 2019, 9, 6, 120, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (70, 2019, 10, 6, 222, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (71, 2019, 11, 6, 140, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (72, 2019, 12, 6, 180, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (73, 2017, 1, 7, 16, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (74, 2017, 2, 7, 15, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (75, 2017, 3, 7, 20, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (76, 2017, 4, 7, 20, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (77, 2017, 5, 7, 5, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (78, 2017, 6, 7, 7, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (79, 2017, 7, 7, 6, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (80, 2017, 8, 7, 6, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (81, 2017, 9, 7, 6, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (82, 2017, 10, 7, 13, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (83, 2017, 11, 7, 11, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (84, 2017, 12, 7, 11, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (85, 2018, 1, 7, 13, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (86, 2018, 2, 7, 16, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (87, 2018, 3, 7, 10, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (88, 2018, 4, 7, 11, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (89, 2018, 5, 7, 11, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (90, 2018, 6, 7, 4, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (91, 2018, 7, 7, 16, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (92, 2018, 8, 7, 14, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (93, 2018, 9, 7, 13, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (94, 2018, 10, 7, 8, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (95, 2018, 11, 7, 19, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (96, 2018, 12, 7, 9, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (97, 2019, 1, 7, 11, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (98, 2019, 2, 7, 35, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (99, 2019, 3, 7, 8, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (100, 2019, 4, 7, 12, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (101, 2019, 5, 7, 17, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (102, 2019, 6, 7, 15, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (103, 2019, 7, 7, 11, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (104, 2019, 8, 7, 18, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (105, 2019, 9, 7, 15, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (106, 2019, 10, 7, 19, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (107, 2019, 11, 7, 17, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (108, 2019, 12, 7, 16, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (109, 2017, 1, 8, 70, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (110, 2017, 2, 8, 100, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (111, 2017, 3, 8, 99, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (112, 2017, 4, 8, 80, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (113, 2017, 5, 8, 80, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (114, 2017, 6, 8, 55, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (115, 2017, 7, 8, 20, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (116, 2017, 8, 8, 110, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (117, 2017, 9, 8, 50, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (118, 2017, 10, 8, 329, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (119, 2017, 11, 8, 135, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (120, 2017, 12, 8, 92, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (121, 2018, 1, 8, 43, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (122, 2018, 2, 8, 56, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (123, 2018, 3, 8, 128, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (124, 2018, 4, 8, 105, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (125, 2018, 5, 8, 138, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (126, 2018, 6, 8, 65, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (127, 2018, 7, 8, 105, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (128, 2018, 8, 8, 107, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (129, 2018, 9, 8, 93, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (130, 2018, 10, 8, 112, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (131, 2018, 11, 8, 102, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (132, 2018, 12, 8, 42, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (133, 2019, 1, 8, 72, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (134, 2019, 2, 8, 132, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (135, 2019, 3, 8, 110, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (136, 2019, 4, 8, 91, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (137, 2019, 5, 8, 110, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (138, 2019, 6, 8, 80, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (139, 2019, 7, 8, 124, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (140, 2019, 8, 8, 162, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (141, 2019, 9, 8, 84, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (142, 2019, 10, 8, 170, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (143, 2019, 11, 8, 116, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (144, 2019, 12, 8, 54, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (145, 2017, 1, 9, 140, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (146, 2017, 2, 9, 120, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (147, 2017, 3, 9, 100, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (148, 2017, 4, 9, 30, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (149, 2017, 5, 9, 70, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (150, 2017, 6, 9, 170, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (151, 2017, 7, 9, 100, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (152, 2017, 8, 9, 80, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (153, 2017, 9, 9, 120, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (154, 2017, 10, 9, 140, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (155, 2017, 11, 9, 80, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (156, 2017, 12, 9, 100, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (157, 2018, 1, 9, 110, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (158, 2018, 2, 9, 90, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (159, 2018, 3, 9, 140, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (160, 2018, 4, 9, 40, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (161, 2018, 5, 9, 110, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (162, 2018, 6, 9, 150, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (163, 2018, 7, 9, 160, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (164, 2018, 8, 9, 190, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (165, 2018, 9, 9, 80, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (166, 2018, 10, 9, 180, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (167, 2018, 11, 9, 170, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (168, 2018, 12, 9, 380, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (169, 2019, 1, 9, 210, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (170, 2019, 2, 9, 210, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (171, 2019, 3, 9, 100, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (172, 2019, 4, 9, 90, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (173, 2019, 5, 9, 200, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (174, 2019, 6, 9, 180, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (175, 2019, 7, 9, 110, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (176, 2019, 8, 9, 230, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (177, 2019, 9, 9, 270, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (178, 2019, 10, 9, 150, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (179, 2019, 11, 9, 180, NULL, NULL, NULL);
INSERT INTO `histories` VALUES (180, 2019, 12, 9, 230, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for medicines
-- ----------------------------
DROP TABLE IF EXISTS `medicines`;
CREATE TABLE `medicines`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_obat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int NOT NULL,
  `harga` int NOT NULL,
  `tanggal_kadaluarsa` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of medicines
-- ----------------------------
INSERT INTO `medicines` VALUES (5, 'SUPERTETRA CAP', 200, 1060, '2025-11-25', '2023-12-14 09:21:17', '2023-12-14 09:21:17');
INSERT INTO `medicines` VALUES (6, 'NEURALGIN RX TAB', 400, 700, '2025-05-29', '2023-12-14 09:21:59', '2023-12-14 09:21:59');
INSERT INTO `medicines` VALUES (7, 'SANMOL SYR', 100, 12900, '2025-04-01', '2023-12-14 09:22:25', '2023-12-14 09:22:25');
INSERT INTO `medicines` VALUES (8, 'SANGOBION 10\'S', 120, 1150, '2025-08-09', '2023-12-14 09:23:04', '2023-12-14 09:23:04');
INSERT INTO `medicines` VALUES (9, 'VOLTADEX 50MG TAB', 250, 375, '2025-02-13', '2023-12-14 09:24:06', '2023-12-14 09:24:06');

-- ----------------------------
-- Table structure for messages
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `page` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `forecast_id` int NULL DEFAULT NULL,
  `user_id` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of messages
-- ----------------------------
INSERT INTO `messages` VALUES (1, 'telah mengubah data profil', 'changelog', 'profile', NULL, NULL, 3, '2023-10-04 07:49:19', '2023-10-04 07:49:19');
INSERT INTO `messages` VALUES (2, 'telah mengubah data profil', 'changelog', 'profile', NULL, NULL, 3, '2023-10-04 07:49:48', '2023-10-04 07:49:48');
INSERT INTO `messages` VALUES (3, 'telah mengubah data password', 'changelog', 'password', NULL, NULL, 3, '2023-10-04 07:50:19', '2023-10-04 07:50:19');
INSERT INTO `messages` VALUES (4, 'telah dinonaktifkan', 'changelog', 'pending', NULL, NULL, 1, '2023-10-04 07:51:00', '2023-10-04 07:51:00');
INSERT INTO `messages` VALUES (5, 'telah diaktifkan', 'changelog', 'users', NULL, NULL, 1, '2023-10-04 07:51:39', '2023-10-04 07:51:39');
INSERT INTO `messages` VALUES (6, 'Telah berhasil login', 'changelog', 'dashboard', NULL, NULL, 2, '2023-10-04 07:53:40', '2023-10-04 07:53:40');
INSERT INTO `messages` VALUES (7, 'telah mengubah data profil', 'changelog', 'profile', NULL, NULL, 2, '2023-10-04 07:55:04', '2023-10-04 07:55:04');
INSERT INTO `messages` VALUES (8, 'telah mengubah data password', 'changelog', 'password', NULL, NULL, 2, '2023-10-04 07:55:29', '2023-10-04 07:55:29');
INSERT INTO `messages` VALUES (9, 'Telah menambahkan data obat', 'activity', 'medicine', 'Slyrphil Syrup', NULL, 2, '2023-10-04 07:56:15', '2023-10-04 07:56:15');
INSERT INTO `messages` VALUES (10, 'Telah mengubah data obat', 'activity', 'medicine', 'Slyrphil Syrup', NULL, 2, '2023-10-04 07:56:46', '2023-10-04 07:56:46');
INSERT INTO `messages` VALUES (11, 'Telah menghapus data obat', 'activity', 'medicine', 'Slyrphil Syrup', NULL, 2, '2023-10-04 07:56:57', '2023-10-04 07:56:57');
INSERT INTO `messages` VALUES (12, 'Telah berhasil logout', 'changelog', 'dashboard', NULL, NULL, 2, '2023-10-04 08:03:05', '2023-10-04 08:03:05');
INSERT INTO `messages` VALUES (13, 'Telah berhasil login', 'changelog', 'dashboard', NULL, NULL, 1, '2023-12-05 04:18:42', '2023-12-05 04:18:42');
INSERT INTO `messages` VALUES (14, 'Telah menambahkan data obat', 'activity', 'medicine', 'Cetirizine', NULL, 1, '2023-12-05 04:19:16', '2023-12-05 04:19:16');
INSERT INTO `messages` VALUES (15, 'Telah mengubah data obat', 'activity', 'medicine', 'Cetirizine New', NULL, 1, '2023-12-05 04:21:04', '2023-12-05 04:21:04');
INSERT INTO `messages` VALUES (16, 'Telah menghapus data obat', 'activity', 'medicine', 'Cetirizine New', NULL, 1, '2023-12-05 04:21:32', '2023-12-05 04:21:32');
INSERT INTO `messages` VALUES (17, 'telah dinonaktifkan', 'changelog', 'pending', NULL, NULL, 2, '2023-12-05 04:22:08', '2023-12-05 04:22:08');
INSERT INTO `messages` VALUES (18, 'Telah berhasil login', 'changelog', 'dashboard', NULL, NULL, 1, '2023-12-08 20:21:03', '2023-12-08 20:21:03');
INSERT INTO `messages` VALUES (19, 'Telah menambahkan data obat', 'activity', 'medicine', 'asdas', NULL, 1, '2023-12-08 20:28:35', '2023-12-08 20:28:35');
INSERT INTO `messages` VALUES (20, 'Telah menambahkan data obat', 'activity', 'medicine', 'asdasd', NULL, 1, '2023-12-08 20:29:02', '2023-12-08 20:29:02');
INSERT INTO `messages` VALUES (21, 'telah diaktifkan', 'changelog', 'users', NULL, NULL, 2, '2023-12-08 20:37:11', '2023-12-08 20:37:11');
INSERT INTO `messages` VALUES (22, 'telah dinonaktifkan', 'changelog', 'pending', NULL, NULL, 2, '2023-12-08 20:37:26', '2023-12-08 20:37:26');
INSERT INTO `messages` VALUES (23, 'telah mengubah data profil', 'changelog', 'profile', NULL, NULL, 1, '2023-12-08 20:46:04', '2023-12-08 20:46:04');
INSERT INTO `messages` VALUES (24, 'Telah berhasil login', 'changelog', 'dashboard', NULL, NULL, 1, '2023-12-14 08:57:08', '2023-12-14 08:57:08');
INSERT INTO `messages` VALUES (25, 'telah mengubah data profil', 'changelog', 'profile', NULL, NULL, 1, '2023-12-14 08:57:27', '2023-12-14 08:57:27');
INSERT INTO `messages` VALUES (26, 'Telah menghapus data obat', 'activity', 'medicine', 'asdas', NULL, 1, '2023-12-14 08:57:32', '2023-12-14 08:57:32');
INSERT INTO `messages` VALUES (27, 'Telah menghapus data obat', 'activity', 'medicine', 'asdasd', NULL, 1, '2023-12-14 08:57:35', '2023-12-14 08:57:35');
INSERT INTO `messages` VALUES (28, 'Telah menambahkan data obat', 'activity', 'medicine', 'SUPERTETRA CAP', NULL, 1, '2023-12-14 09:21:17', '2023-12-14 09:21:17');
INSERT INTO `messages` VALUES (29, 'Telah menambahkan data obat', 'activity', 'medicine', 'NEURALGIN RX TAB', NULL, 1, '2023-12-14 09:21:59', '2023-12-14 09:21:59');
INSERT INTO `messages` VALUES (30, 'Telah menambahkan data obat', 'activity', 'medicine', 'SANMOL SYR', NULL, 1, '2023-12-14 09:22:25', '2023-12-14 09:22:25');
INSERT INTO `messages` VALUES (31, 'Telah menambahkan data obat', 'activity', 'medicine', 'SANGOBION 10\'S', NULL, 1, '2023-12-14 09:23:04', '2023-12-14 09:23:04');
INSERT INTO `messages` VALUES (32, 'Telah menambahkan data obat', 'activity', 'medicine', 'VOLTADEX 50MG TAB', NULL, 1, '2023-12-14 09:24:06', '2023-12-14 09:24:06');
INSERT INTO `messages` VALUES (33, 'Telah berhasil login', 'changelog', 'dashboard', NULL, NULL, 1, '2023-12-14 12:22:15', '2023-12-14 12:22:15');
INSERT INTO `messages` VALUES (34, 'telah dinonaktifkan', 'changelog', 'pending', NULL, NULL, 1, '2024-01-09 06:13:00', '2024-01-09 06:13:00');
INSERT INTO `messages` VALUES (35, 'telah diaktifkan', 'changelog', 'users', NULL, NULL, 2, '2024-01-09 06:13:09', '2024-01-09 06:13:09');
INSERT INTO `messages` VALUES (36, 'telah dinonaktifkan', 'changelog', 'pending', NULL, NULL, 2, '2024-01-09 06:13:37', '2024-01-09 06:13:37');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2023_07_24_230343_create_medicines_table', 1);
INSERT INTO `migrations` VALUES (6, '2023_07_25_014112_create_forecasts_table', 1);
INSERT INTO `migrations` VALUES (7, '2023_08_02_130355_create_messages_table', 1);
INSERT INTO `migrations` VALUES (8, '2023_09_04_151404_create_histories_table', 1);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` int NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Paris Purwanti S.E.I', 'landriani@example.com', '2023-09-04 16:48:56', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'deactivated', '08123456789', 'Psr. Pacuan Kuda No. 305, Lubuklinggau 90502, Maluku', 0, 'XBC7vplkMp', '2023-09-04 16:48:56', '2024-01-09 06:13:00');
INSERT INTO `users` VALUES (2, 'Lili Hartati', 'raina78@example.org', '2023-09-04 16:48:56', '$2y$10$t8cuSu0LABj9JSNu5uCeCuICr1Zzt/IkH0nRrNLzg54KoDu5ijp/.', 'activated', '081234567890', 'Kpg. Rajawali No. 494, Ambon 66357, Kalteng', 0, 'UWBeJD3sPGKvZDM2ZBOMboOMwNwutaQzA0ueXDt5nSOaDh8v46C6Z60Peas9', '2023-09-04 16:48:56', '2024-01-09 06:13:37');
INSERT INTO `users` VALUES (3, 'Kuur', 'dickynakiri@gmail.com', '2023-09-04 16:48:56', '$2y$10$NQeoJLqkLyKPverZjXMnsOX93bXyTTkfGbbushRB1GbzyQoY6Qb1G', 'activated', '085156186156', 'Jl. Baturaden, Jember, Jawa Timur, Indonesia', 1, 'D7Ja4vPGRW4oLUEmL9eyhYD9pFYOgxXYN9TbGsGCotAeYTaqwduUvs1KUVcb', '2023-09-04 16:48:56', '2023-10-04 07:50:19');

SET FOREIGN_KEY_CHECKS = 1;
