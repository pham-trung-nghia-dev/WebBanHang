-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.11.0.7065
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for shopbanhang
CREATE DATABASE IF NOT EXISTS `shopbanhang` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `shopbanhang`;

-- Dumping structure for table shopbanhang.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shopbanhang.cache: ~0 rows (approximately)

-- Dumping structure for table shopbanhang.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shopbanhang.cache_locks: ~0 rows (approximately)

-- Dumping structure for table shopbanhang.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shopbanhang.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table shopbanhang.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shopbanhang.migrations: ~14 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '2025_07_03_073536_create_tbl_category_product', 1),
	(4, '2025_07_03_100816_create_tbl_brand_product', 1),
	(5, '2025_07_03_132130_create_tbl_product', 1),
	(6, '2025_07_04_153113_tbl_customer', 1),
	(7, '2025_07_04_162546_tbl_shipping', 1),
	(8, '2025_07_05_033000_tbl_payment', 1),
	(9, '2025_07_05_033100_tbl_order', 1),
	(10, '2025_07_05_033132_tbl_order_details', 1),
	(11, '2025_07_08_154522_create_failed_jobs_table', 1),
	(12, '2025_07_09_111219_create_tbl_email_log_table', 1),
	(13, '2025_12_28_104432_add_product_name_to_tbl_product_table', 2),
	(14, '2025_12_28_105229_add_parent_id_to_tbl_category_product_table', 3);

-- Dumping structure for table shopbanhang.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shopbanhang.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table shopbanhang.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shopbanhang.sessions: ~0 rows (approximately)

-- Dumping structure for table shopbanhang.tbl_brand
CREATE TABLE IF NOT EXISTS `tbl_brand` (
  `brand_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) NOT NULL,
  `brand_desc` text NOT NULL,
  `brand_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shopbanhang.tbl_brand: ~5 rows (approximately)
INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_desc`, `brand_status`, `created_at`, `updated_at`) VALUES
	(16, 'Nike', 'Thương hiệu thể thao nổi tiếng', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(17, 'Adidas', 'Thương hiệu thể thao hàng đầu', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(18, 'Uniqlo', 'Thời trang basic chất lượng cao', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(19, 'Zara', 'Thời trang nhanh châu Âu', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(20, 'No Brand', 'Sản phẩm không thương hiệu', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12');

-- Dumping structure for table shopbanhang.tbl_category_product
CREATE TABLE IF NOT EXISTS `tbl_category_product` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT 0,
  `category_name` varchar(255) NOT NULL,
  `category_desc` text NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shopbanhang.tbl_category_product: ~14 rows (approximately)
INSERT INTO `tbl_category_product` (`category_id`, `parent_id`, `category_name`, `category_desc`, `category_status`, `created_at`, `updated_at`) VALUES
	(34, 0, 'Thời trang nam', 'Quần áo, phụ kiện thời trang dành cho nam giới', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(35, 0, 'Thời trang nữ', 'Quần áo, phụ kiện thời trang dành cho nữ giới', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(36, 0, 'Giày dép', 'Giày dép nam, nữ các loại', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(37, 34, 'Áo thun nam', 'Áo thun nam các loại', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(38, 34, 'Áo sơ mi nam', 'Áo sơ mi nam công sở', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(39, 34, 'Quần nam', 'Quần jeans, quần dài nam', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(40, 34, 'Áo khoác nam', 'Áo khoác, áo jacket nam', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(41, 35, 'Áo thun nữ', 'Áo thun nữ các loại', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(42, 35, 'Váy', 'Váy liền, váy xòe nữ', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(43, 35, 'Quần nữ', 'Quần jeans, quần legging nữ', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(44, 35, 'Áo khoác nữ', 'Áo khoác, áo cardigan nữ', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(45, 36, 'Giày thể thao', 'Giày thể thao nam, nữ', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(46, 36, 'Giày cao gót', 'Giày cao gót nữ', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(47, 36, 'Dép, sandal', 'Dép quai hậu, sandal', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12');

-- Dumping structure for table shopbanhang.tbl_customer
CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `customer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shopbanhang.tbl_customer: ~1 rows (approximately)
INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_phone`, `created_at`, `updated_at`) VALUES
	(1, 'Nghĩa Phạm Trung Nghĩa', 'phamtrungnghia15082003@gmail.com', 'c1c5bf891d811a4525485fbd60ecbff5', '0335766722', NULL, NULL);

-- Dumping structure for table shopbanhang.tbl_email_log
CREATE TABLE IF NOT EXISTS `tbl_email_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `TenSanPham` varchar(255) DEFAULT NULL,
  `TenKhachHang` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `DonHang` bigint(20) unsigned NOT NULL,
  `PhuongThucThanhToan` varchar(255) NOT NULL,
  `TongTien` decimal(15,2) NOT NULL,
  `NoiDung` text DEFAULT NULL,
  `TrangThai` varchar(255) NOT NULL DEFAULT 'Đã gửi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shopbanhang.tbl_email_log: ~1 rows (approximately)
INSERT INTO `tbl_email_log` (`id`, `TenSanPham`, `TenKhachHang`, `email`, `SoLuong`, `DonHang`, `PhuongThucThanhToan`, `TongTien`, `NoiDung`, `TrangThai`, `created_at`, `updated_at`) VALUES
	(1, 'Áo thun nam cổ tròn', 'Nghĩa Phạm Trung Nghĩa', 'phamtrungnghia15082003@gmail.com', 1, 5, 'Thanh toán qua momo', 4316265.80, '{"email":"phamtrungnghia15082003@gmail.com","order_id":5,"order_total":4316265.8,"payment_method":"Thanh to\\u00e1n qua momo"}', 'Đã gửi', '2025-12-28 04:27:31', '2025-12-28 04:27:31');

-- Dumping structure for table shopbanhang.tbl_order
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` double NOT NULL,
  `order_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shopbanhang.tbl_order: ~5 rows (approximately)
INSERT INTO `tbl_order` (`order_id`, `customer_id`, `shipping_id`, `payment_id`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 1, 0, 0, NULL, NULL),
	(2, 1, 1, 2, 0, 0, NULL, NULL),
	(3, 1, 3, 3, 4316265.8, 0, NULL, NULL),
	(4, 1, 3, 4, 4316265.8, 0, NULL, NULL),
	(5, 1, 3, 5, 4316265.8, 0, NULL, NULL);

-- Dumping structure for table shopbanhang.tbl_order_details
CREATE TABLE IF NOT EXISTS `tbl_order_details` (
  `order_details_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` double NOT NULL,
  `product_sales_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_details_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shopbanhang.tbl_order_details: ~3 rows (approximately)
INSERT INTO `tbl_order_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `created_at`, `updated_at`) VALUES
	(1, 3, 94, 'Áo thun nam cổ tròn', 4316265.8, 1, NULL, NULL),
	(2, 4, 94, 'Áo thun nam cổ tròn', 4316265.8, 1, NULL, NULL),
	(3, 5, 94, 'Áo thun nam cổ tròn', 4316265.8, 1, NULL, NULL);

-- Dumping structure for table shopbanhang.tbl_payment
CREATE TABLE IF NOT EXISTS `tbl_payment` (
  `payment_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `payment_method` varchar(255) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shopbanhang.tbl_payment: ~5 rows (approximately)
INSERT INTO `tbl_payment` (`payment_id`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
	(1, 'Thanh toán qua momo', 0, NULL, NULL),
	(2, 'Thanh toán qua momo', 0, NULL, NULL),
	(3, 'Thanh toán qua momo', 0, NULL, NULL),
	(4, 'Thanh toán qua momo', 0, NULL, NULL),
	(5, 'Thanh toán qua momo', 0, NULL, NULL);

-- Dumping structure for table shopbanhang.tbl_product
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `product_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `product_content` text NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shopbanhang.tbl_product: ~31 rows (approximately)
INSERT INTO `tbl_product` (`product_id`, `product_name`, `category_id`, `brand_id`, `product_desc`, `product_content`, `product_price`, `product_image`, `product_status`, `created_at`, `updated_at`) VALUES
	(94, 'Áo thun nam cổ tròn', 43, 19, 'Mô tả sản phẩm Áo thun nam cổ tròn - Chất lượng cao, giá cả hợp lý', 'Chi tiết sản phẩm: Áo thun nam cổ tròn\n- Chất liệu: 100% cotton/ Polyester/ Vải cao cấp\n- Màu sắc: Đa dạng\n- Kích thước: S, M, L, XL, XXL\n- Phù hợp với mọi lứa tuổi\n- Thiết kế hiện đại, trẻ trung\n- Giá cả hợp lý, chất lượng đảm bảo', '3923878', '08b20ee4eb6e5936a2c09afae6fd95cf7793.webp', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(95, 'Quần jean nam dài', 47, 18, 'Mô tả sản phẩm Quần jean nam dài - Chất lượng cao, giá cả hợp lý', 'Chi tiết sản phẩm: Quần jean nam dài\n- Chất liệu: 100% cotton/ Polyester/ Vải cao cấp\n- Màu sắc: Đa dạng\n- Kích thước: S, M, L, XL, XXL\n- Phù hợp với mọi lứa tuổi\n- Thiết kế hiện đại, trẻ trung\n- Giá cả hợp lý, chất lượng đảm bảo', '3934994', '402536.webp', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(96, 'Áo khoác gió nam', 45, 20, 'Mô tả sản phẩm Áo khoác gió nam - Chất lượng cao, giá cả hợp lý', 'Chi tiết sản phẩm: Áo khoác gió nam\n- Chất liệu: 100% cotton/ Polyester/ Vải cao cấp\n- Màu sắc: Đa dạng\n- Kích thước: S, M, L, XL, XXL\n- Phù hợp với mọi lứa tuổi\n- Thiết kế hiện đại, trẻ trung\n- Giá cả hợp lý, chất lượng đảm bảo', '3729268', '61FTlZor2sL8790.jpg', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(97, 'Quần short nam', 41, 19, 'Mô tả sản phẩm Quần short nam - Chất lượng cao, giá cả hợp lý', 'Chi tiết sản phẩm: Quần short nam\n- Chất liệu: 100% cotton/ Polyester/ Vải cao cấp\n- Màu sắc: Đa dạng\n- Kích thước: S, M, L, XL, XXL\n- Phù hợp với mọi lứa tuổi\n- Thiết kế hiện đại, trẻ trung\n- Giá cả hợp lý, chất lượng đảm bảo', '1468988', '61FTlZor2sL87906116.jpg', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(98, 'Áo sơ mi nam dài tay', 38, 16, 'Mô tả sản phẩm Áo sơ mi nam dài tay - Chất lượng cao, giá cả hợp lý', 'Chi tiết sản phẩm: Áo sơ mi nam dài tay\n- Chất liệu: 100% cotton/ Polyester/ Vải cao cấp\n- Màu sắc: Đa dạng\n- Kích thước: S, M, L, XL, XXL\n- Phù hợp với mọi lứa tuổi\n- Thiết kế hiện đại, trẻ trung\n- Giá cả hợp lý, chất lượng đảm bảo', '3347493', '6783.jpg', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(99, 'Quần tây nam công sở', 43, 18, 'Mô tả sản phẩm Quần tây nam công sở - Chất lượng cao, giá cả hợp lý', 'Chi tiết sản phẩm: Quần tây nam công sở\n- Chất liệu: 100% cotton/ Polyester/ Vải cao cấp\n- Màu sắc: Đa dạng\n- Kích thước: S, M, L, XL, XXL\n- Phù hợp với mọi lứa tuổi\n- Thiết kế hiện đại, trẻ trung\n- Giá cả hợp lý, chất lượng đảm bảo', '1868847', '69e6abb32bafd1cb5fa133fffc0edfb67783.webp', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(100, 'Áo thun nữ cổ tròn', 47, 18, 'Mô tả sản phẩm Áo thun nữ cổ tròn - Chất lượng cao, giá cả hợp lý', 'Chi tiết sản phẩm: Áo thun nữ cổ tròn\n- Chất liệu: 100% cotton/ Polyester/ Vải cao cấp\n- Màu sắc: Đa dạng\n- Kích thước: S, M, L, XL, XXL\n- Phù hợp với mọi lứa tuổi\n- Thiết kế hiện đại, trẻ trung\n- Giá cả hợp lý, chất lượng đảm bảo', '1301377', '79a517f8a01858e1764b3db385fa24af5110.jpg', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(101, 'Quần jean nữ ống đứng', 43, 16, 'Mô tả sản phẩm Quần jean nữ ống đứng - Chất lượng cao, giá cả hợp lý', 'Chi tiết sản phẩm: Quần jean nữ ống đứng\n- Chất liệu: 100% cotton/ Polyester/ Vải cao cấp\n- Màu sắc: Đa dạng\n- Kích thước: S, M, L, XL, XXL\n- Phù hợp với mọi lứa tuổi\n- Thiết kế hiện đại, trẻ trung\n- Giá cả hợp lý, chất lượng đảm bảo', '1111693', '953037251-1_6867fd389659456ba0737121a59aca749731.jpg', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(102, 'Áo khoác nữ', 40, 20, 'Mô tả sản phẩm Áo khoác nữ - Chất lượng cao, giá cả hợp lý', 'Chi tiết sản phẩm: Áo khoác nữ\n- Chất liệu: 100% cotton/ Polyester/ Vải cao cấp\n- Màu sắc: Đa dạng\n- Kích thước: S, M, L, XL, XXL\n- Phù hợp với mọi lứa tuổi\n- Thiết kế hiện đại, trẻ trung\n- Giá cả hợp lý, chất lượng đảm bảo', '4953042', 'Cgr-19768.jpg', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(103, 'Váy liền thân nữ', 45, 19, 'Mô tả sản phẩm Váy liền thân nữ - Chất lượng cao, giá cả hợp lý', 'Chi tiết sản phẩm: Váy liền thân nữ\n- Chất liệu: 100% cotton/ Polyester/ Vải cao cấp\n- Màu sắc: Đa dạng\n- Kích thước: S, M, L, XL, XXL\n- Phù hợp với mọi lứa tuổi\n- Thiết kế hiện đại, trẻ trung\n- Giá cả hợp lý, chất lượng đảm bảo', '2072809', 'Cgr-21296.jpg', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(104, 'Áo sơ mi nữ', 37, 19, 'Mô tả sản phẩm Áo sơ mi nữ - Chất lượng cao, giá cả hợp lý', 'Chi tiết sản phẩm: Áo sơ mi nữ\n- Chất liệu: 100% cotton/ Polyester/ Vải cao cấp\n- Màu sắc: Đa dạng\n- Kích thước: S, M, L, XL, XXL\n- Phù hợp với mọi lứa tuổi\n- Thiết kế hiện đại, trẻ trung\n- Giá cả hợp lý, chất lượng đảm bảo', '1422483', 'Cgr-31640.jpg', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(105, 'Quần short nữ', 47, 18, 'Mô tả sản phẩm Quần short nữ - Chất lượng cao, giá cả hợp lý', 'Chi tiết sản phẩm: Quần short nữ\n- Chất liệu: 100% cotton/ Polyester/ Vải cao cấp\n- Màu sắc: Đa dạng\n- Kích thước: S, M, L, XL, XXL\n- Phù hợp với mọi lứa tuổi\n- Thiết kế hiện đại, trẻ trung\n- Giá cả hợp lý, chất lượng đảm bảo', '3807503', 'Cgr-33969.jpg', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(106, 'Giày thể thao nam', 47, 16, 'Mô tả sản phẩm Giày thể thao nam - Chất lượng cao, giá cả hợp lý', 'Chi tiết sản phẩm: Giày thể thao nam\n- Chất liệu: 100% cotton/ Polyester/ Vải cao cấp\n- Màu sắc: Đa dạng\n- Kích thước: S, M, L, XL, XXL\n- Phù hợp với mọi lứa tuổi\n- Thiết kế hiện đại, trẻ trung\n- Giá cả hợp lý, chất lượng đảm bảo', '2655930', 'e26968c6feafa0245b93b754b8944a9c-16668629125817917.jpg', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(107, 'Giày thể thao nữ', 42, 17, 'Mô tả sản phẩm Giày thể thao nữ - Chất lượng cao, giá cả hợp lý', 'Chi tiết sản phẩm: Giày thể thao nữ\n- Chất liệu: 100% cotton/ Polyester/ Vải cao cấp\n- Màu sắc: Đa dạng\n- Kích thước: S, M, L, XL, XXL\n- Phù hợp với mọi lứa tuổi\n- Thiết kế hiện đại, trẻ trung\n- Giá cả hợp lý, chất lượng đảm bảo', '2495363', 'ef53780-Photoroom-14486.jpg', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(108, 'Giày cao gót nữ', 39, 17, 'Mô tả sản phẩm Giày cao gót nữ - Chất lượng cao, giá cả hợp lý', 'Chi tiết sản phẩm: Giày cao gót nữ\n- Chất liệu: 100% cotton/ Polyester/ Vải cao cấp\n- Màu sắc: Đa dạng\n- Kích thước: S, M, L, XL, XXL\n- Phù hợp với mọi lứa tuổi\n- Thiết kế hiện đại, trẻ trung\n- Giá cả hợp lý, chất lượng đảm bảo', '3686534', 'eXZHledLbbG8cULQjzv1q6z224Z3DNwjrlcJHHht4745.webp', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(109, 'Dép quai hậu', 37, 18, 'Mô tả sản phẩm Dép quai hậu - Chất lượng cao, giá cả hợp lý', 'Chi tiết sản phẩm: Dép quai hậu\n- Chất liệu: 100% cotton/ Polyester/ Vải cao cấp\n- Màu sắc: Đa dạng\n- Kích thước: S, M, L, XL, XXL\n- Phù hợp với mọi lứa tuổi\n- Thiết kế hiện đại, trẻ trung\n- Giá cả hợp lý, chất lượng đảm bảo', '3641527', 'f444698b6fe1a593c55237a5343c196a412.webp', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(110, 'Áo khoác dù nam', 41, 16, 'Mô tả sản phẩm Áo khoác dù nam - Chất lượng cao, giá cả hợp lý', 'Chi tiết sản phẩm: Áo khoác dù nam\n- Chất liệu: 100% cotton/ Polyester/ Vải cao cấp\n- Màu sắc: Đa dạng\n- Kích thước: S, M, L, XL, XXL\n- Phù hợp với mọi lứa tuổi\n- Thiết kế hiện đại, trẻ trung\n- Giá cả hợp lý, chất lượng đảm bảo', '1226409', 'goods_65_473906_3x43610.avif', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(111, 'Áo khoác da nữ', 45, 20, 'Mô tả sản phẩm Áo khoác da nữ - Chất lượng cao, giá cả hợp lý', 'Chi tiết sản phẩm: Áo khoác da nữ\n- Chất liệu: 100% cotton/ Polyester/ Vải cao cấp\n- Màu sắc: Đa dạng\n- Kích thước: S, M, L, XL, XXL\n- Phù hợp với mọi lứa tuổi\n- Thiết kế hiện đại, trẻ trung\n- Giá cả hợp lý, chất lượng đảm bảo', '1015441', 'headband-on-off-black-white-14759.png', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(112, 'Quần jogger nam', 43, 18, 'Mô tả sản phẩm Quần jogger nam - Chất lượng cao, giá cả hợp lý', 'Chi tiết sản phẩm: Quần jogger nam\n- Chất liệu: 100% cotton/ Polyester/ Vải cao cấp\n- Màu sắc: Đa dạng\n- Kích thước: S, M, L, XL, XXL\n- Phù hợp với mọi lứa tuổi\n- Thiết kế hiện đại, trẻ trung\n- Giá cả hợp lý, chất lượng đảm bảo', '3332670', 'images6231.jpg', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(113, 'Quần legging nữ', 41, 18, 'Mô tả sản phẩm Quần legging nữ - Chất lượng cao, giá cả hợp lý', 'Chi tiết sản phẩm: Quần legging nữ\n- Chất liệu: 100% cotton/ Polyester/ Vải cao cấp\n- Màu sắc: Đa dạng\n- Kích thước: S, M, L, XL, XXL\n- Phù hợp với mọi lứa tuổi\n- Thiết kế hiện đại, trẻ trung\n- Giá cả hợp lý, chất lượng đảm bảo', '1667799', 'KA3900HD_32679.jpg', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(114, 'Áo len nam', 38, 19, 'Mô tả sản phẩm Áo len nam - Chất lượng cao, giá cả hợp lý', 'Chi tiết sản phẩm: Áo len nam\n- Chất liệu: 100% cotton/ Polyester/ Vải cao cấp\n- Màu sắc: Đa dạng\n- Kích thước: S, M, L, XL, XXL\n- Phù hợp với mọi lứa tuổi\n- Thiết kế hiện đại, trẻ trung\n- Giá cả hợp lý, chất lượng đảm bảo', '4709494', 'MilanWoolCoat2636.webp', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(115, 'Áo len nữ', 39, 16, 'Mô tả sản phẩm Áo len nữ - Chất lượng cao, giá cả hợp lý', 'Chi tiết sản phẩm: Áo len nữ\n- Chất liệu: 100% cotton/ Polyester/ Vải cao cấp\n- Màu sắc: Đa dạng\n- Kích thước: S, M, L, XL, XXL\n- Phù hợp với mọi lứa tuổi\n- Thiết kế hiện đại, trẻ trung\n- Giá cả hợp lý, chất lượng đảm bảo', '4553944', 'o1cn01dxe4bt28vcukhhc6g16111175830.webp', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(116, 'Áo hoodie nam', 37, 19, 'Mô tả sản phẩm Áo hoodie nam - Chất lượng cao, giá cả hợp lý', 'Chi tiết sản phẩm: Áo hoodie nam\n- Chất liệu: 100% cotton/ Polyester/ Vải cao cấp\n- Màu sắc: Đa dạng\n- Kích thước: S, M, L, XL, XXL\n- Phù hợp với mọi lứa tuổi\n- Thiết kế hiện đại, trẻ trung\n- Giá cả hợp lý, chất lượng đảm bảo', '2806402', 'o1cn01mafg4g2gdswnmtyzd39072596208.jpg', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(117, 'Áo hoodie nữ', 39, 16, 'Mô tả sản phẩm Áo hoodie nữ - Chất lượng cao, giá cả hợp lý', 'Chi tiết sản phẩm: Áo hoodie nữ\n- Chất liệu: 100% cotton/ Polyester/ Vải cao cấp\n- Màu sắc: Đa dạng\n- Kích thước: S, M, L, XL, XXL\n- Phù hợp với mọi lứa tuổi\n- Thiết kế hiện đại, trẻ trung\n- Giá cả hợp lý, chất lượng đảm bảo', '1247954', 's-l16008392.webp', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(118, 'Áo khoác bomber nam', 42, 20, 'Mô tả sản phẩm Áo khoác bomber nam - Chất lượng cao, giá cả hợp lý', 'Chi tiết sản phẩm: Áo khoác bomber nam\n- Chất liệu: 100% cotton/ Polyester/ Vải cao cấp\n- Màu sắc: Đa dạng\n- Kích thước: S, M, L, XL, XXL\n- Phù hợp với mọi lứa tuổi\n- Thiết kế hiện đại, trẻ trung\n- Giá cả hợp lý, chất lượng đảm bảo', '2253789', 's-l8009263.jpg', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(119, 'Quần jean nữ rách gối', 38, 16, 'Mô tả sản phẩm Quần jean nữ rách gối - Chất lượng cao, giá cả hợp lý', 'Chi tiết sản phẩm: Quần jean nữ rách gối\n- Chất liệu: 100% cotton/ Polyester/ Vải cao cấp\n- Màu sắc: Đa dạng\n- Kích thước: S, M, L, XL, XXL\n- Phù hợp với mọi lứa tuổi\n- Thiết kế hiện đại, trẻ trung\n- Giá cả hợp lý, chất lượng đảm bảo', '4292034', 'thu11113552.png', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(120, 'Áo thun có cổ', 42, 18, 'Mô tả sản phẩm Áo thun có cổ - Chất lượng cao, giá cả hợp lý', 'Chi tiết sản phẩm: Áo thun có cổ\n- Chất liệu: 100% cotton/ Polyester/ Vải cao cấp\n- Màu sắc: Đa dạng\n- Kích thước: S, M, L, XL, XXL\n- Phù hợp với mọi lứa tuổi\n- Thiết kế hiện đại, trẻ trung\n- Giá cả hợp lý, chất lượng đảm bảo', '1438510', 'TS246J2427.jpg', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(121, 'Quần jean ống rộng', 47, 16, 'Mô tả sản phẩm Quần jean ống rộng - Chất lượng cao, giá cả hợp lý', 'Chi tiết sản phẩm: Quần jean ống rộng\n- Chất liệu: 100% cotton/ Polyester/ Vải cao cấp\n- Màu sắc: Đa dạng\n- Kích thước: S, M, L, XL, XXL\n- Phù hợp với mọi lứa tuổi\n- Thiết kế hiện đại, trẻ trung\n- Giá cả hợp lý, chất lượng đảm bảo', '2482884', 'tx_03565_96bffa68e35f439f9f70cdaf5b701417_master_96abf664583348fb89ea86f0fe5a71f5_large6428.jpg', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(122, 'Áo khoác lông vũ', 44, 18, 'Mô tả sản phẩm Áo khoác lông vũ - Chất lượng cao, giá cả hợp lý', 'Chi tiết sản phẩm: Áo khoác lông vũ\n- Chất liệu: 100% cotton/ Polyester/ Vải cao cấp\n- Màu sắc: Đa dạng\n- Kích thước: S, M, L, XL, XXL\n- Phù hợp với mọi lứa tuổi\n- Thiết kế hiện đại, trẻ trung\n- Giá cả hợp lý, chất lượng đảm bảo', '2958037', 'U2652601-13109.jpg', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(123, 'Quần tây nữ', 47, 18, 'Mô tả sản phẩm Quần tây nữ - Chất lượng cao, giá cả hợp lý', 'Chi tiết sản phẩm: Quần tây nữ\n- Chất liệu: 100% cotton/ Polyester/ Vải cao cấp\n- Màu sắc: Đa dạng\n- Kích thước: S, M, L, XL, XXL\n- Phù hợp với mọi lứa tuổi\n- Thiết kế hiện đại, trẻ trung\n- Giá cả hợp lý, chất lượng đảm bảo', '2203868', 'vn-11134207-7r98o-ln36l8g517fca82228.jpg', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12'),
	(124, 'Áo cardigan nữ', 47, 18, 'Mô tả sản phẩm Áo cardigan nữ - Chất lượng cao, giá cả hợp lý', 'Chi tiết sản phẩm: Áo cardigan nữ\n- Chất liệu: 100% cotton/ Polyester/ Vải cao cấp\n- Màu sắc: Đa dạng\n- Kích thước: S, M, L, XL, XXL\n- Phù hợp với mọi lứa tuổi\n- Thiết kế hiện đại, trẻ trung\n- Giá cả hợp lý, chất lượng đảm bảo', '1169236', 'vn-11134207-7ras8-mbg5siu4a1dzbe3373.jpg', 1, '2025-12-28 03:57:12', '2025-12-28 03:57:12');

-- Dumping structure for table shopbanhang.tbl_shipping
CREATE TABLE IF NOT EXISTS `tbl_shipping` (
  `shipping_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shipping_name` varchar(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `shipping_email` varchar(255) NOT NULL,
  `shipping_phone` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`shipping_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shopbanhang.tbl_shipping: ~3 rows (approximately)
INSERT INTO `tbl_shipping` (`shipping_id`, `shipping_name`, `shipping_address`, `shipping_email`, `shipping_phone`, `customer_id`, `created_at`, `updated_at`) VALUES
	(1, 'Nghĩa Phạm Trung Nghĩa', 'chung cư conic dình khiêm', 'phamtrungnghia15082003@gmail.com', '0335766722', 1, NULL, NULL),
	(2, 'Nghĩa Phạm Trung Nghĩa', 'chung cư conic dình khiêm', 'phamtrungnghia15082003@gmail.com', '0335766722', 1, NULL, NULL),
	(3, 'Nghĩa Phạm Trung Nghĩa', 'chung cư conic dình khiêm', 'phamtrungnghia15082003@gmail.com', '0335766722', 1, NULL, NULL);

-- Dumping structure for table shopbanhang.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shopbanhang.users: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
