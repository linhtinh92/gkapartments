/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : shopping_cart

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-12-27 09:04:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for blogs
-- ----------------------------
DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of blogs
-- ----------------------------
INSERT INTO `blogs` VALUES ('2', 'Kid’s Fashion', '/public/upload/images/348-blog2-370x224.jpg', 'Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable, that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\',', '#', '1', '2016-12-17 05:10:24', '2016-12-17 05:10:24');
INSERT INTO `blogs` VALUES ('3', 'Men\'s Colections', '/public/upload/images/449-blog1-370x224.jpg', '  Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable, that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', ', '#', '1', '2016-12-17 05:10:59', '2016-12-17 05:10:59');
INSERT INTO `blogs` VALUES ('4', 'Men’s Fashion', '/public/upload/images/902-blog3-370x224.jpg', '  Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable, that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', ', '#', '1', '2016-12-17 05:11:43', '2016-12-17 05:11:43');

-- ----------------------------
-- Table structure for brand_logos
-- ----------------------------
DROP TABLE IF EXISTS `brand_logos`;
CREATE TABLE `brand_logos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of brand_logos
-- ----------------------------
INSERT INTO `brand_logos` VALUES ('2', 'Brand Logo A', 'public/upload/images/159-brand1-175x72.png', '#', '1', '2016-12-17 05:22:56', '2016-12-17 05:22:56');
INSERT INTO `brand_logos` VALUES ('3', 'Brand Logo B', 'public/upload/images/267-brand2-175x72.png', '#', '1', '2016-12-17 05:23:08', '2016-12-17 05:23:08');
INSERT INTO `brand_logos` VALUES ('4', 'Brand Logo C', 'public/upload/images/576-brand3-175x72.png', '#', '1', '2016-12-17 05:23:20', '2016-12-17 05:23:20');
INSERT INTO `brand_logos` VALUES ('5', 'Brand Logo D', 'public/upload/images/623-brand4-175x72.png', '#', '1', '2016-12-17 05:23:30', '2016-12-17 05:23:30');
INSERT INTO `brand_logos` VALUES ('6', 'Brand Logo E', 'public/upload/images/983-brand5-175x72.png', '#', '1', '2016-12-17 05:23:43', '2016-12-17 05:23:43');

-- ----------------------------
-- Table structure for carts
-- ----------------------------
DROP TABLE IF EXISTS `carts`;
CREATE TABLE `carts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `checkout_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_qty` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of carts
-- ----------------------------
INSERT INTO `carts` VALUES ('1', '2', '1', 'Adipiscing Elit', '1', 'public/upload/images/414-3-539x761.jpg', '100', '2016-12-19 02:53:49', '2016-12-19 02:53:49');
INSERT INTO `carts` VALUES ('2', '2', '2', 'Adipiscing Elit', '1', 'public/upload/images/414-3-539x761.jpg', '100', '2016-12-19 03:03:19', '2016-12-19 03:03:19');
INSERT INTO `carts` VALUES ('3', '2', '3', 'Adipiscing Elit', '1', 'public/upload/images/414-3-539x761.jpg', '100', '2016-12-19 03:03:54', '2016-12-19 03:03:54');
INSERT INTO `carts` VALUES ('4', '2', '4', 'Adipiscing Elit', '1', 'public/upload/images/414-3-539x761.jpg', '100', '2016-12-19 03:05:08', '2016-12-19 03:05:08');
INSERT INTO `carts` VALUES ('5', '2', '5', 'Adipiscing Elit', '1', 'public/upload/images/414-3-539x761.jpg', '100', '2016-12-19 03:12:57', '2016-12-19 03:12:57');
INSERT INTO `carts` VALUES ('6', '2', '6', 'Adipiscing Elit', '1', 'public/upload/images/414-3-539x761.jpg', '100', '2016-12-19 03:19:38', '2016-12-19 03:19:38');
INSERT INTO `carts` VALUES ('7', '2', '7', 'Adipiscing Elit', '1', 'public/upload/images/414-3-539x761.jpg', '100', '2016-12-19 03:29:49', '2016-12-19 03:29:49');
INSERT INTO `carts` VALUES ('8', '2', '8', 'Adipiscing Elit', '1', 'public/upload/images/414-3-539x761.jpg', '100', '2016-12-19 03:36:55', '2016-12-19 03:36:55');
INSERT INTO `carts` VALUES ('9', '2', '9', 'Adipiscing Elit', '1', 'public/upload/images/414-3-539x761.jpg', '100', '2016-12-19 03:46:18', '2016-12-19 03:46:18');
INSERT INTO `carts` VALUES ('10', '8', '10', 'Pellentesque Habitant', '1', 'public/upload/images/409-7.jpg', '1000000', '2016-12-19 06:58:40', '2016-12-19 06:58:40');
INSERT INTO `carts` VALUES ('11', '6', '10', 'Pleasure Rationally', '3', 'public/upload/images/494-15_1_4.jpg', '1000000', '2016-12-19 06:58:40', '2016-12-19 06:58:40');
INSERT INTO `carts` VALUES ('12', '8', '1', 'Pellentesque Habitant', '4', 'public/upload/images/409-7.jpg', '1000000', '2016-12-19 07:07:26', '2016-12-19 07:07:26');
INSERT INTO `carts` VALUES ('13', '3', '1', 'Fusce Aliquam', '2', 'public/upload/images/684-1.jpg', '10000000', '2016-12-19 07:07:26', '2016-12-19 07:07:26');
INSERT INTO `carts` VALUES ('14', '5', '1', 'Aptent Taciti', '1', 'public/upload/images/810-17_1_3.jpg', '100000', '2016-12-19 07:07:26', '2016-12-19 07:07:26');
INSERT INTO `carts` VALUES ('15', '6', '2', 'Pleasure Rationally', '1', 'public/upload/images/494-15_1_4.jpg', '1000000', '2016-12-19 08:19:47', '2016-12-19 08:19:47');
INSERT INTO `carts` VALUES ('16', '6', '3', 'Pleasure Rationally', '1', 'public/upload/images/494-15_1_4.jpg', '1000000', '2016-12-19 08:20:10', '2016-12-19 08:20:10');
INSERT INTO `carts` VALUES ('17', '6', '4', 'Pleasure Rationally', '1', 'public/upload/images/494-15_1_4.jpg', '1000000', '2016-12-19 08:20:47', '2016-12-19 08:20:47');
INSERT INTO `carts` VALUES ('18', '8', '5', 'Pellentesque Habitant', '1', 'public/upload/images/409-7.jpg', '1000000', '2016-12-19 08:37:32', '2016-12-19 08:37:32');
INSERT INTO `carts` VALUES ('19', '4', '5', 'Vulputate Mollis', '1', 'public/upload/images/172-19_1_5.jpg', '1000000', '2016-12-19 08:37:32', '2016-12-19 08:37:32');
INSERT INTO `carts` VALUES ('20', '3', '5', 'Fusce Aliquam', '1', 'public/upload/images/684-1.jpg', '10000000', '2016-12-19 08:37:32', '2016-12-19 08:37:32');
INSERT INTO `carts` VALUES ('21', '7', '5', 'Cras Neque Metus', '1', 'public/upload/images/607-9_1_2.jpg', '100000', '2016-12-19 08:37:32', '2016-12-19 08:37:32');
INSERT INTO `carts` VALUES ('22', '8', '6', 'Pellentesque Habitant', '1', 'public/upload/images/409-7.jpg', '1000000', '2016-12-19 08:38:57', '2016-12-19 08:38:57');
INSERT INTO `carts` VALUES ('23', '8', '7', 'Pellentesque Habitant', '1', 'public/upload/images/409-7.jpg', '1000000', '2016-12-19 08:40:25', '2016-12-19 08:40:25');
INSERT INTO `carts` VALUES ('24', '3', '7', 'Fusce Aliquam', '1', 'public/upload/images/684-1.jpg', '10000000', '2016-12-19 08:40:25', '2016-12-19 08:40:25');
INSERT INTO `carts` VALUES ('25', '8', '8', 'Pellentesque Habitant', '1', 'public/upload/images/409-7.jpg', '1000000', '2016-12-19 08:44:23', '2016-12-19 08:44:23');
INSERT INTO `carts` VALUES ('26', '7', '8', 'Cras Neque Metus', '1', 'public/upload/images/607-9_1_2.jpg', '100000', '2016-12-19 08:44:23', '2016-12-19 08:44:23');
INSERT INTO `carts` VALUES ('27', '4', '8', 'Vulputate Mollis', '1', 'public/upload/images/172-19_1_5.jpg', '1000000', '2016-12-19 08:44:24', '2016-12-19 08:44:24');
INSERT INTO `carts` VALUES ('28', '5', '8', 'Aptent Taciti', '1', 'public/upload/images/810-17_1_3.jpg', '100000', '2016-12-19 08:44:24', '2016-12-19 08:44:24');
INSERT INTO `carts` VALUES ('29', '4', '9', 'Vulputate Mollis', '1', 'public/upload/images/172-19_1_5.jpg', '1000000', '2016-12-20 15:17:53', '2016-12-20 15:17:53');
INSERT INTO `carts` VALUES ('30', '8', '10', 'Pellentesque Habitant', '1', 'public/upload/images/409-7.jpg', '1000000', '2016-12-20 15:18:49', '2016-12-20 15:18:49');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `site_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_description` text COLLATE utf8_unicode_ci,
  `site_keyword` text COLLATE utf8_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('6', 'Phòng Ngủ', 'phong-ngu', '0', 'Phòng Ngủ', 'Phòng Ngủ', 'Phòng Ngủ', '1', '2016-12-15 15:22:26', '2016-12-19 05:09:22');
INSERT INTO `categories` VALUES ('7', 'Sunglasses', 'sunglasses', '6', 'Sunglasses', 'Sunglasses', 'Sunglasses', '1', '2016-12-17 02:48:56', '2016-12-17 03:08:47');
INSERT INTO `categories` VALUES ('8', 'livingroom', 'livingroom', '0', 'livingroom', 'livingroom', 'livingroom', '1', '2016-12-17 02:49:05', '2016-12-17 03:11:06');
INSERT INTO `categories` VALUES ('9', 'Belts', 'belts', '8', 'Belts', 'Belts', 'Belts', '1', '2016-12-17 02:49:16', '2016-12-17 03:11:37');
INSERT INTO `categories` VALUES ('10', 'Gold Necklaces', 'gold-necklaces', '6', 'Gold Necklaces', 'Gold Necklaces', 'Gold Necklaces', '1', '2016-12-17 03:10:04', '2016-12-17 03:10:04');
INSERT INTO `categories` VALUES ('11', 'Platinum Necklaces', 'platinum-necklaces', '6', 'Platinum Necklaces', 'Platinum Necklaces', 'Platinum Necklaces', '1', '2016-12-17 03:10:22', '2016-12-17 03:10:22');
INSERT INTO `categories` VALUES ('12', 'Silver Necklaces', 'silver-necklaces', '6', 'Silver Necklaces', 'Silver Necklaces', 'Silver Necklaces', '1', '2016-12-17 03:10:40', '2016-12-17 03:10:40');
INSERT INTO `categories` VALUES ('13', 'Cold Weather', 'cold-weather', '8', 'Cold Weather', 'Cold Weather', 'Cold Weather', '1', '2016-12-17 03:11:56', '2016-12-17 03:11:56');
INSERT INTO `categories` VALUES ('14', 'Lighting', 'lighting', '0', 'Lighting', 'Lighting', 'Lighting', '1', '2016-12-17 03:12:21', '2016-12-17 03:12:21');
INSERT INTO `categories` VALUES ('15', 'Sundresses', 'sundresses', '14', 'Sundresses', 'Sundresses', 'Sundresses', '1', '2016-12-17 03:13:06', '2016-12-17 03:13:06');
INSERT INTO `categories` VALUES ('16', 'Dresser', 'dresser', '0', 'Dresser', 'Dresser', 'Dresser', '1', '2016-12-17 03:13:42', '2016-12-17 03:13:42');
INSERT INTO `categories` VALUES ('17', 'Evening', 'evening', '16', 'Evening', 'Evening', 'Evening', '1', '2016-12-17 03:13:59', '2016-12-17 03:13:59');

-- ----------------------------
-- Table structure for checkouts
-- ----------------------------
DROP TABLE IF EXISTS `checkouts`;
CREATE TABLE `checkouts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province` int(11) NOT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subtotal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `district` int(11) NOT NULL,
  `checkout_type` int(11) NOT NULL DEFAULT '0',
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of checkouts
-- ----------------------------
INSERT INTO `checkouts` VALUES ('1', 'Nguyen Vu linh', '', 'linhtinh.it.92@gmail.com', 'JM47WZNFN0', '0933910461', '1', '24,100,000.0', '24,100,000.0', '2', '0', '435 Hoang Van Thu', '', '0', '2016-12-19 07:07:26', '2016-12-19 07:30:21');
INSERT INTO `checkouts` VALUES ('2', 'Nguyen Vu linh', '', 'linhtinh.it.92@gmail.com', 'SC017KQKYV', '0933910461', '1', '1,000,000.0', '1,000,000.0', '2', '0', '435 Hoang Van Thu', '', '0', '2016-12-19 08:19:47', '2016-12-19 08:19:47');
INSERT INTO `checkouts` VALUES ('3', 'Nguyen Vu linh', '', 'linhtinh.it.92@gmail.com', '5C5I5ED705', '0933910461', '1', '1,000,000.0', '1,000,000.0', '2', '0', '435 Hoang Van Thu', '', '0', '2016-12-19 08:20:10', '2016-12-19 08:20:10');
INSERT INTO `checkouts` VALUES ('4', 'Nguyen Vu linh', '', 'linhtinh.it.92@gmail.com', 'R5NLU3C7Q7', '0933910461', '1', '1,000,000.0', '1,000,000.0', '2', '0', '435 Hoang Van Thu', '', '0', '2016-12-19 08:20:47', '2016-12-19 08:20:47');
INSERT INTO `checkouts` VALUES ('5', 'Linh', '', 'linhtinh.it.92@gmail.com', 'C57SF8LXM1', '0933910461', '1', '12,100,000.0', '12,100,000.0', '2', '0', 'Tây ninh', 'nhanh', '0', '2016-12-19 08:37:32', '2016-12-19 08:37:32');
INSERT INTO `checkouts` VALUES ('6', 'Linh', '', 'linhtinh.it.92@gmail.com', 'AH4E73POTU', '0933910461', '1', '1,000,000.0', '1,000,000.0', '2', '0', 'Tây ninh', '', '0', '2016-12-19 08:38:57', '2016-12-19 08:38:57');
INSERT INTO `checkouts` VALUES ('7', 'Linh', '', 'linhtinh.it.92@gmail.com', 'IN5ABQMKCQ', '0933910461', '1', '11,000,000.0', '11,000,000.0', '2', '0', 'Tây ninh', '', '0', '2016-12-19 08:40:25', '2016-12-19 08:40:25');
INSERT INTO `checkouts` VALUES ('8', 'Nguyen Vu linh', '', 'linhtinh.it.92@gmail.com', '8991EHCF5R', '0933910461', '1', '2,200,000.0', '2,200,000.0', '2', '0', '435 Hoang Van Thu', '', '0', '2016-12-19 08:44:23', '2016-12-19 08:44:23');
INSERT INTO `checkouts` VALUES ('9', 'Linh', '', 'linhtinh.it.92@gmail.com', 'FURA-5G85', '0933910461', '1', '1,000,000.0', '1,000,000.0', '2', '0', 'Tây ninh', '', '0', '2016-12-20 15:17:53', '2016-12-20 15:17:53');
INSERT INTO `checkouts` VALUES ('10', 'Linh', '', 'linhtinh.it.92@gmail.com', 'FURA-3JY3', '0933910461', '1', '1,000,000.0', '1,000,000.0', '2', '0', 'Tây ninh', '', '0', '2016-12-20 15:18:49', '2016-12-20 15:18:49');

-- ----------------------------
-- Table structure for configs
-- ----------------------------
DROP TABLE IF EXISTS `configs`;
CREATE TABLE `configs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `option_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `option_value` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of configs
-- ----------------------------
INSERT INTO `configs` VALUES ('1', 'site_title', 'sadasd', '2016-12-14 14:33:25', '2016-12-14 14:33:25');
INSERT INTO `configs` VALUES ('2', 'site_description', 'asdasd', '2016-12-14 14:41:33', '2016-12-14 14:41:33');
INSERT INTO `configs` VALUES ('3', 'site_keyword', 'asd,asdasd,asdfas,sdf', '2016-12-14 14:53:29', '2016-12-14 15:07:04');
INSERT INTO `configs` VALUES ('4', 'email_receives_feedback', 'linhtinh.it.92@gmail.com', '2016-12-14 14:56:19', '2016-12-14 14:56:19');
INSERT INTO `configs` VALUES ('5', 'phone_number', '+8493391046', '2016-12-14 14:58:48', '2016-12-18 09:20:39');
INSERT INTO `configs` VALUES ('6', 'tag_line', 'asd', '2016-12-17 02:35:25', '2016-12-17 02:35:25');
INSERT INTO `configs` VALUES ('7', 'sub_money', 'VND', '2016-12-17 04:33:50', '2016-12-17 04:33:50');
INSERT INTO `configs` VALUES ('8', 'company_name', 'Cendo', '2016-12-18 09:17:20', '2016-12-18 09:18:12');
INSERT INTO `configs` VALUES ('9', 'address', 'số 249 Cộng Hoà, phường 13, quận Tân Bình, Tp.HCM', '2016-12-18 09:17:20', '2016-12-18 09:19:12');
INSERT INTO `configs` VALUES ('10', 'longitude', '10.801936', '2016-12-18 09:17:20', '2016-12-18 09:20:39');
INSERT INTO `configs` VALUES ('11', 'latitude', '106.647350', '2016-12-18 09:17:20', '2016-12-18 09:20:39');

-- ----------------------------
-- Table structure for contacts
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of contacts
-- ----------------------------
INSERT INTO `contacts` VALUES ('1', 'Linh', 'Tây ninh', 'linhtinh.it.92@gmail.com', '933910461', 'ádasd', '1', '2016-12-18 09:58:36', '2016-12-19 06:20:17');
INSERT INTO `contacts` VALUES ('2', 'Linh', 'Tây ninh', 'linhtinh.it.92@gmail.com', '933910461', '123123', '0', '2016-12-18 10:07:13', '2016-12-18 10:07:13');
INSERT INTO `contacts` VALUES ('3', 'Linh', 'Tây ninh', 'linhtinh.it.92@gmail.com', '933910461', 'ádasd', '0', '2016-12-18 10:11:56', '2016-12-18 10:11:56');
INSERT INTO `contacts` VALUES ('4', 'Linh', 'Tây ninh', 'linhtinh.it.92@gmail.com', '933910461', 'ádasd', '0', '2016-12-18 10:16:15', '2016-12-18 10:16:15');
INSERT INTO `contacts` VALUES ('5', 'Linh', 'Tây ninh', 'linhtinh.it.92@gmail.com', '933910461', 'ádasd', '1', '2016-12-18 10:16:34', '2016-12-19 06:20:24');
INSERT INTO `contacts` VALUES ('6', 'Linh', 'Tây ninh', 'linhtinh.it.92@gmail.com', '933910461', 'dfgdfgdfg', '1', '2016-12-18 10:19:16', '2016-12-19 06:20:14');
INSERT INTO `contacts` VALUES ('7', 'Linh', 'Tây ninh', 'linhtinh.it.92@gmail.com', '933910461', 'ádasd', '0', '2016-12-18 10:44:26', '2016-12-18 10:44:26');
INSERT INTO `contacts` VALUES ('8', 'Linh', 'Tây ninh', 'linhtinh.it.92@gmail.com', '933910461', 'ádasd', '0', '2016-12-18 10:45:55', '2016-12-18 10:45:55');

-- ----------------------------
-- Table structure for locations
-- ----------------------------
DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of locations
-- ----------------------------
INSERT INTO `locations` VALUES ('1', 'TP Hồ Chí Minh', '0', 'TP', '2016-12-18 15:36:34', '2016-12-18 15:36:34');
INSERT INTO `locations` VALUES ('2', 'Tân Bình', '1', 'Quận', '2016-12-18 15:37:42', '2016-12-18 15:37:42');
INSERT INTO `locations` VALUES ('3', 'Bình Tân', '1', 'Quận', '2016-12-18 23:23:19', '2016-12-18 23:23:19');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2016_12_11_015849_create_shoppingcart_table', '1');
INSERT INTO `migrations` VALUES ('2016_12_12_160611_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2016_12_14_095304_create_sliders_table', '1');
INSERT INTO `migrations` VALUES ('2016_12_14_102626_create_blogs_table', '1');
INSERT INTO `migrations` VALUES ('2016_12_14_140006_create_configs_table', '2');
INSERT INTO `migrations` VALUES ('2016_12_14_150753_create_brand_logos_table', '3');
INSERT INTO `migrations` VALUES ('2016_12_14_153240_create_categories_table', '4');
INSERT INTO `migrations` VALUES ('2016_12_14_161506_create_products_table', '5');
INSERT INTO `migrations` VALUES ('2016_12_16_090454_create_product_metas_table', '5');
INSERT INTO `migrations` VALUES ('2016_12_17_150113_create_shoppingcart_table', '6');
INSERT INTO `migrations` VALUES ('2016_12_18_092809_create_contacts_table', '6');
INSERT INTO `migrations` VALUES ('2016_12_18_152743_create_locations_table', '7');
INSERT INTO `migrations` VALUES ('2016_12_18_150553_create_carts_table', '10');
INSERT INTO `migrations` VALUES ('2016_12_18_150608_create_checkouts_table', '11');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for persistences
-- ----------------------------
DROP TABLE IF EXISTS `persistences`;
CREATE TABLE `persistences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `persistences_code_unique` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of persistences
-- ----------------------------

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cate_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double DEFAULT NULL,
  `price_sale` double NOT NULL DEFAULT '0',
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci,
  `site_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_description` text COLLATE utf8_unicode_ci,
  `site_keyword` text COLLATE utf8_unicode_ci,
  `featured_product` tinyint(4) NOT NULL DEFAULT '0',
  `new_product` tinyint(4) NOT NULL DEFAULT '0',
  `bestseller_product` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_cate_id_foreign` (`cate_id`),
  CONSTRAINT `products_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', '6', 'Sed Diam', 'sed-diam', '100', '0', 'public/upload/images/607-4-539x761.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio...', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam erat mi, rutrum at sollicitudin rhoncus, ultricies posuere erat. Duis convallis, arcu nec aliquam consequat, purus felis vehicula felis, a dapibus enim lorem nec augue. Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer enim purus, posuere at ultricies eu, placerat a felis. Suspendisse aliquet urna pretium eros convallis interdum. Quisque in arcu id dui vulputate mollis eget non arcu. Aenean et nulla purus. Mauris vel tellus non nunc mattis lobortis.</p>\r\n', '', '', '', '1', '1', '1', '1', '2016-12-17 03:50:56', '2016-12-17 04:05:14');
INSERT INTO `products` VALUES ('2', '6', 'Adipiscing Elit', 'adipiscing-elit', '200', '100', 'public/upload/images/414-3-539x761.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio...', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam erat mi, rutrum at sollicitudin rhoncus, ultricies posuere erat. Duis convallis, arcu nec aliquam consequat, purus felis vehicula felis, a dapibus enim lorem nec augue. Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer enim purus, posuere at ultricies eu, placerat a felis. Suspendisse aliquet urna pretium eros convallis interdum. Quisque in arcu id dui vulputate mollis eget non arcu. Aenean et nulla purus. Mauris vel tellus non nunc mattis lobortis.</p>\r\n', '', '', '', '1', '1', '1', '1', '2016-12-17 04:56:20', '2016-12-17 11:21:00');
INSERT INTO `products` VALUES ('3', '6', 'Fusce Aliquam', 'fusce-aliquam', '10000000', '0', 'public/upload/images/684-1.jpg', 'Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem ...', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam erat mi, rutrum at sollicitudin rhoncus, ultricies posuere erat. Duis convallis, arcu nec aliquam consequat, purus felis vehicula felis, a dapibus enim lorem nec augue. Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer enim purus, posuere at ultricies eu, placerat a felis. Suspendisse aliquet urna pretium eros convallis interdum. Quisque in arcu id dui vulputate mollis eget non arcu. Aenean et nulla purus. Mauris vel tellus non nunc mattis lobortis.</p>\r\n', 'Fusce Aliquam', 'Fusce Aliquam', 'Fusce Aliquam', '1', '1', '1', '1', '2016-12-19 03:56:33', '2016-12-19 04:02:51');
INSERT INTO `products` VALUES ('4', '6', 'Vulputate Mollis', 'vulputate-mollis', '1000000', '0', 'public/upload/images/172-19_1_5.jpg', 'Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem ...', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam erat mi, rutrum at sollicitudin rhoncus, ultricies posuere erat. Duis convallis, arcu nec aliquam consequat, purus felis vehicula felis, a dapibus enim lorem nec augue.</p>\r\n', 'Vulputate Mollis', 'Vulputate Mollis', 'Vulputate Mollis', '1', '1', '1', '1', '2016-12-19 04:11:04', '2016-12-19 04:20:43');
INSERT INTO `products` VALUES ('5', '6', 'Aptent Taciti', 'aptent-taciti', '100000', '0', 'public/upload/images/810-17_1_3.jpg', 'Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem ...', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam erat mi, rutrum at sollicitudin rhoncus, ultricies posuere erat. Duis convallis, arcu nec aliquam consequat, purus felis vehicula felis, a dapibus enim lorem nec augue.</p>\r\n', 'Aptent Taciti', 'Aptent Taciti', 'Aptent Taciti', '1', '1', '1', '1', '2016-12-19 04:13:27', '2016-12-19 04:13:27');
INSERT INTO `products` VALUES ('6', '6', 'Pleasure Rationally', 'pleasure-rationally', '1000000', '0', 'public/upload/images/494-15_1_4.jpg', 'Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem ...', '<p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer enim purus, posuere at ultricies eu, placerat a felis. Suspendisse aliquet urna pretium eros convallis interdum. Quisque in arcu id dui vulputate mollis eget non arcu. Aenean et nulla purus. Mauris vel tellus non nunc mattis lobortis.</p>\r\n', '', '', '', '1', '1', '1', '1', '2016-12-19 04:14:46', '2016-12-19 04:14:46');
INSERT INTO `products` VALUES ('7', '6', 'Cras Neque Metus', 'cras-neque-metus', '100000', '0', 'public/upload/images/607-9_1_2.jpg', 'Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem ...', '<p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer enim purus, posuere at ultricies eu, placerat a felis. Suspendisse aliquet urna pretium eros convallis interdum. Quisque in arcu id dui vulputate mollis eget non arcu. Aenean et nulla purus. Mauris vel tellus non nunc mattis lobortis. Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer enim purus, posuere at ultricies eu, placerat a felis. Suspendisse aliquet urna pretium eros convallis interdum. Quisque in arcu id dui vulputate mollis eget non arcu. Aenean et nulla purus. Mauris vel tellus non nunc mattis lobortis.</p>\r\n', '', '', '', '1', '1', '1', '1', '2016-12-19 04:17:54', '2016-12-19 04:17:54');
INSERT INTO `products` VALUES ('8', '6', 'Pellentesque Habitant', 'pellentesque-habitant', '1000000', '0', 'public/upload/images/409-7.jpg', 'Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem ...', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam erat mi, rutrum at sollicitudin rhoncus, ultricies posuere erat. Duis convallis, arcu nec aliquam consequat, purus felis vehicula felis, a dapibus enim lorem nec augue. Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer enim purus, posuere at ultricies eu, placerat a felis. Suspendisse aliquet urna pretium eros convallis interdum. Quisque in arcu id dui vulputate mollis eget non arcu. Aenean et nulla purus. Mauris vel tellus non nunc mattis lobortis.</p>\r\n', '', '', '', '1', '1', '1', '1', '2016-12-19 04:19:09', '2016-12-19 04:19:09');

-- ----------------------------
-- Table structure for product_metas
-- ----------------------------
DROP TABLE IF EXISTS `product_metas`;
CREATE TABLE `product_metas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_metas_product_id_foreign` (`product_id`),
  CONSTRAINT `product_metas_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of product_metas
-- ----------------------------
INSERT INTO `product_metas` VALUES ('9', '1', 'Availability', 'availability', 'img', '/public/upload/images/18-539x761.jpg', '2016-12-17 04:06:45', '2016-12-17 04:06:45');
INSERT INTO `product_metas` VALUES ('10', '1', 'Brand', 'brand', 'text', 'Apple', '2016-12-17 04:06:45', '2016-12-17 04:06:45');
INSERT INTO `product_metas` VALUES ('17', '2', 'Adipiscing Elit', 'adipiscing-elit', 'img', '/public/upload/images/10-539x761.jpg', '2016-12-17 11:21:00', '2016-12-17 11:21:00');
INSERT INTO `product_metas` VALUES ('18', '2', 'Product Code', 'product-code', 'text', '123', '2016-12-17 11:21:00', '2016-12-17 11:21:00');
INSERT INTO `product_metas` VALUES ('20', '3', 'Fusce Aliquam', 'fusce-aliquam', 'img', '/public/upload/images/535-4-539x761.jpg', '2016-12-19 04:02:51', '2016-12-19 04:02:51');
INSERT INTO `product_metas` VALUES ('21', '5', 'Availability', 'availability', 'img', '/public/upload/images/10.jpg', '2016-12-19 04:13:27', '2016-12-19 04:13:27');
INSERT INTO `product_metas` VALUES ('22', '5', 'Adipiscing Elit', 'adipiscing-elit', 'img', '/public/upload/images/9.jpg', '2016-12-19 04:13:27', '2016-12-19 04:13:27');
INSERT INTO `product_metas` VALUES ('23', '6', 'Adipiscing Elit', 'adipiscing-elit', 'img', '/public/upload/images/684-1.jpg', '2016-12-19 04:14:46', '2016-12-19 04:14:46');
INSERT INTO `product_metas` VALUES ('24', '7', 'Availability', 'availability', 'img', '/public/upload/images/810-17_1_3.jpg', '2016-12-19 04:17:54', '2016-12-19 04:17:54');
INSERT INTO `product_metas` VALUES ('25', '8', 'Adipiscing Elit', 'adipiscing-elit', 'img', '/public/upload/images/18-539x761.jpg', '2016-12-19 04:19:09', '2016-12-19 04:19:09');
INSERT INTO `product_metas` VALUES ('26', '8', 'Availability', 'availability', 'img', '/public/upload/images/10-539x761.jpg', '2016-12-19 04:19:09', '2016-12-19 04:19:09');

-- ----------------------------
-- Table structure for shoppingcart
-- ----------------------------
DROP TABLE IF EXISTS `shoppingcart`;
CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `instance` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`identifier`,`instance`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of shoppingcart
-- ----------------------------

-- ----------------------------
-- Table structure for sliders
-- ----------------------------
DROP TABLE IF EXISTS `sliders`;
CREATE TABLE `sliders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of sliders
-- ----------------------------
INSERT INTO `sliders` VALUES ('1', 'DESIGN FURNITURE', '/public/upload/images/647-DESIGN-FURNITURE.jpg', 'SAVE UP TO 70% A HUGE SELECTION OF FURNITURE', '#', '1', '2016-12-17 02:01:04', '2016-12-17 02:01:04');
INSERT INTO `sliders` VALUES ('2', 'DESIGN FURNITURE 2', '/public/upload/images/309-MTDS-Guest-Bedroom-Blue-Sofa-HQ-e1465650262625-1920x658.jpg', 'SAVE UP TO 70% A HUGE SELECTION OF FURNITURE', '#', '1', '2016-12-17 02:01:38', '2016-12-17 02:01:38');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'linhtinh', '$2y$10$DorBOX2IJVrzmF62w.cLDO6mJc6WXFQfkWijcgS5iIJKG0W9CDP6y', 'Linh', '/public/upload/images/961-THK_3856_1.png', null, '1', '1', '2016-12-14 13:58:26', '2016-12-16 15:14:52');
