-- phpMyAdmin SQL Dump
-- version 4.7.8
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th4 12, 2021 lúc 02:02 PM
-- Phiên bản máy phục vụ: 5.6.36
-- Phiên bản PHP: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `btsonline_admin`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brands`
--

CREATE TABLE `tbl_brands` (
  `id_brand` int(11) NOT NULL,
  `brand_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tên thương hiệu	',
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_brands`
--

INSERT INTO `tbl_brands` (`id_brand`, `brand_name`, `create_at`, `status`) VALUES
(1, 'Liti Florit', '2020-09-24 00:57:11', 1),
(4, 'Paul Robent', '2020-09-24 00:57:40', 1),
(6, 'Flower box', '2020-09-24 00:57:52', 1),
(8, '26 April Flowers', '2020-09-25 16:47:56', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_news`
--

CREATE TABLE `tbl_category_news` (
  `id_category_new` int(11) NOT NULL,
  `name_cate` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên danh mục',
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `parent_id` tinyint(2) NOT NULL COMMENT 'Danh mục cha'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_news`
--

INSERT INTO `tbl_category_news` (`id_category_new`, `name_cate`, `create_at`, `status`, `parent_id`) VALUES
(6, 'Phái đẹp', '2020-09-17 20:18:44', 1, 0),
(7, '26 April Flowers', '2020-09-17 20:18:44', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_products`
--

CREATE TABLE `tbl_category_products` (
  `id_category` int(11) NOT NULL,
  `name_cate` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'Quyết định việc ẩn hiện cate',
  `parent_id` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_products`
--

INSERT INTO `tbl_category_products` (`id_category`, `name_cate`, `create_at`, `status`, `parent_id`) VALUES
(1, 'Ngày của mẹ', '2020-08-20 07:46:50', 1, 0),
(2, 'Ngày Valentine', '2020-08-20 07:46:50', 1, 0),
(3, 'Hoa cưới', '2020-08-20 07:47:55', 1, 0),
(4, 'Hoa chúc mừng', '2020-08-20 07:47:55', 0, 0),
(5, 'Ngày nhà giáo', '2021-03-05 21:26:51', 1, 0),
(6, 'Hoa sinh nhật', '2021-03-05 21:27:03', 1, 0),
(7, 'Cây cảnh', '2021-03-05 22:45:27', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_contacts`
--

CREATE TABLE `tbl_contacts` (
  `id_contact` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_contacts`
--

INSERT INTO `tbl_contacts` (`id_contact`, `name`, `phone`, `email`, `description`, `create_at`, `status`) VALUES
(2, 'Ngô kiến huy', '0972864333', 'ngohuy@gmail.com', 'Tôi cần mua nho', '2020-09-25 12:05:34', 1),
(4, 'abc', '3', 'testemail@gmail.com', 'test', '2021-04-09 20:57:20', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_detail_images`
--

CREATE TABLE `tbl_detail_images` (
  `id_detail_image` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `sub_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ảnh sản phẩm liên quan',
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_detail_images`
--

INSERT INTO `tbl_detail_images` (`id_detail_image`, `id_product`, `sub_image`, `create_at`, `status`) VALUES
(72, 68, '1617958244BOUQUET-4308_June-500x500.jpg', '2021-04-09 15:50:44', 1),
(73, 68, '1617958258BOUQUET-4308-500x500.jpg', '2021-04-09 15:50:58', 1),
(74, 69, '1617958275BOUQUET-5614_1-500x500.jpg', '2021-04-09 15:51:15', 1),
(75, 69, '1617958290BOUQUET-5614_2-500x500.jpg', '2021-04-09 15:51:30', 1),
(76, 73, '1617958444ke-hoa-chuc-mung-khai-truong-(18)-2422.jpg', '2021-04-09 15:54:04', 1),
(77, 73, '1617958462ke-hoa-khai-truong-kt-105-510x680.jpg', '2021-04-09 15:54:22', 1),
(78, 73, '1617958474index.jpg', '2021-04-09 15:54:34', 1),
(79, 72, '1617958593bo-hoa-hong-ohara-tinh-trong-mong475.jpg', '2021-04-09 15:56:33', 1),
(80, 72, '1617958615index.jpg', '2021-04-09 15:56:55', 1),
(81, 72, '1617958628dfvdf.jpg', '2021-04-09 15:57:08', 1),
(82, 72, '1617958645rgerg.jpg', '2021-04-09 15:57:25', 1),
(83, 72, '1617958663indexrfre.jpg', '2021-04-09 15:57:43', 1),
(84, 72, '1617958676indexgẻg.jpg', '2021-04-09 15:57:56', 1),
(85, 72, '1617958687indexrèwe.jpg', '2021-04-09 15:58:07', 1),
(86, 71, '1617958767ewfwefwf.jpg', '2021-04-09 15:59:27', 1),
(87, 71, '1617958782ewfwe.jpg', '2021-04-09 15:59:42', 1),
(88, 71, '1617958799èwef.jpg', '2021-04-09 15:59:59', 1),
(89, 70, '1617958859indexrèwe.jpg', '2021-04-09 16:00:59', 1),
(90, 70, '1617958876indexgẻg.jpg', '2021-04-09 16:01:16', 1),
(91, 76, '1617958937indexgẻg.jpg', '2021-04-09 16:02:17', 1),
(92, 76, '1617958954indexrèwe.jpg', '2021-04-09 16:02:34', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_detail_news`
--

CREATE TABLE `tbl_detail_news` (
  `id_detail_new` int(11) NOT NULL,
  `id_news` int(11) NOT NULL,
  `sub_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ảnh liên quan blog',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_detail_orders`
--

CREATE TABLE `tbl_detail_orders` (
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` tinyint(4) NOT NULL COMMENT 'số lượng',
  `price` float NOT NULL COMMENT 'Giá gốc',
  `total` float NOT NULL COMMENT 'Tổng tiền của 1 sản phẩm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_detail_orders`
--

INSERT INTO `tbl_detail_orders` (`id_order`, `id_product`, `quantity`, `price`, `total`) VALUES
(200, 63, 2, 240000, 480000),
(201, 33, 1, 84000, 84000),
(202, 63, 1, 340000, 340000),
(203, 50, 1, 55000, 55000),
(203, 52, 5, 25000, 125000),
(204, 33, 1, 100000, 100000),
(204, 52, 1, 25000, 25000),
(205, 50, 1, 55000, 55000),
(205, 52, 1, 25000, 25000),
(205, 57, 1, 800000, 800000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_gifts`
--

CREATE TABLE `tbl_gifts` (
  `id_gift` int(11) NOT NULL,
  `gift_code` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mã gift code',
  `gift_percent` tinyint(3) NOT NULL DEFAULT '0' COMMENT 'Phần % giảm giá',
  `gift_quantity` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Số lượng sử dụng code',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày tạo mã',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_gifts`
--

INSERT INTO `tbl_gifts` (`id_gift`, `gift_code`, `gift_percent`, `gift_quantity`, `created`, `status`) VALUES
(1, 'FLOWERS', 5, 3, '2020-09-08 19:37:20', 1),
(2, 'StoreSale', 10, 1, '2020-09-08 19:37:20', 1),
(3, 'WoementDay', 15, 2, '2020-09-25 21:33:23', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_members`
--

CREATE TABLE `tbl_members` (
  `id_member` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `point` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Điểm tích lũy',
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_members`
--

INSERT INTO `tbl_members` (`id_member`, `name`, `email`, `phone`, `password`, `address`, `point`, `create_at`, `status`) VALUES
(235, 'Mai Van Nam', 'vannam@gmail.com', '0987789589', 'QWJjQDEyMzQq', NULL, 0, '2021-03-03 16:06:18', 1),
(236, 'Trần Cao Nguyên', 'khactung7@gmail.com', '0987454789', 'Rmxvd2Vyc0AxMjMq', 'Hà Nội', 0, '2021-03-05 11:55:16', 1),
(237, 'meo', 'jannguyen@gmail.com', '0977982881', 'Rmxvd2Vyc0AxMjMq', '23423423', 0, '2021-03-05 22:16:24', 1),
(238, 'Trang', 'tranglun301299@gmail.com', '0396085519', 'Rmxvd2Vyc0AxMjMq', 'dffdss', 0, '2021-03-06 10:38:48', 1),
(239, 'Trần Ngọc Linh Trang', 'linhtrang9906@gmail.com', '0356895088', 'VHJhbmd0cmFuMjQxMA==', NULL, 0, '2021-03-07 08:55:35', 1),
(240, 'Mèo', 'huyenabc244@gmail.com', '0335906573', 'V2h1eWVuMkA=', 'XT', 0, '2021-03-08 16:38:01', 1),
(241, 'A', 'a@gmail.com', '0394355843', 'Rmxvd2Vyc0AxMjMq', 'Hà nôi', 0, '2021-03-09 20:54:58', 1),
(243, 'minh yen', 'my@gmail.com', '0977876221', 'TGUxMjM0NTY=', NULL, 9, '2021-04-10 22:49:42', 1),
(244, 'Thịnh', '20a4040138@bav.edu.vn', '0943524693', 'TnQxMjEyMTk5OQ==', NULL, 0, '2021-04-11 13:02:47', 1),
(245, 'Huyền', '20A4040070@gmail.com', '0332332435', 'SHV5ZW4yNDRA', NULL, 0, '2021-04-12 10:30:42', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id_news` int(11) NOT NULL,
  `id_category_new` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `classify` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Phân loại blog',
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `main_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ảnh chính blog',
  `description` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'mô tả',
  `main_content` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nội dung chính bài viết',
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_news`
--

INSERT INTO `tbl_news` (`id_news`, `id_category_new`, `id_user`, `classify`, `title`, `main_image`, `description`, `main_content`, `create_at`, `status`) VALUES
(39, 6, 1, 'Ngọt ngào và ý nghĩa với hoa c', 'Hoa Cẩm Tú Cầu', '1615043854canh-dong-hoa-cam-tu-cau-da-lat3.jpg', '<h2><strong>Một số mẫu hoa cưới cẩm t&uacute; cầu</strong></h2>\r\n\r\n<p>Hoa cưới cẩm t&uacute; cầu l&agrave; loại hoa c&oacute; m&agrave;u sắc đa dạng, hoa trồng ngay trong nước n&ecirc;n chi ph&iacute; rẻ, hoa tươi l&acirc;u, dễ b&oacute;. Bạn c&oacute; thể dễ d&agrave;ng b&oacute; dạng tr&ograve;n hay d&agrave;i, chỉ qua mấy bước cơ bản v&agrave; với v&agrave;i c&ocirc;ng cụ dễ kiếm bạn c&oacute; thể tự tay b&oacute; hoa cưới cẩm t&uacute; cầu cho ri&ecirc;ng m&igrave;nh.</p>\r\n\r\n<p>Dưới đ&acirc;y l&agrave; một số mẫu hoa cầm tay cẩm t&uacute; cầu d&agrave;nh cho c&ocirc; d&acirc;u Việt:</p>\r\n\r\n<p><img alt=\"Hoa cưới cẩm tú cầu không cần cầu kỳ mà bó hoa sẽ tự lên dáng đẹp thanh tao, trang nhã\" src=\"http://juliette.vn/wp-content/uploads/2019/03/hoa-cuoi-cam-tu-cau-2.jpg\" style=\"height:748px; width:500px\" /></p>\r\n\r\n<p>Hoa cưới cẩm t&uacute; cầu kh&ocirc;ng cần cầu kỳ m&agrave; b&oacute; hoa sẽ tự l&ecirc;n d&aacute;ng đẹp thanh tao, trang nh&atilde;</p>\r\n\r\n<p><img alt=\"Hoa cưới cẩm tú cầu màu trắng thích hợp để kết hợp cùng những loại hoa khác.\" src=\"http://juliette.vn/wp-content/uploads/2019/03/hoa-cuoi-cam-tu-cau-5.jpg\" style=\"height:602px; width:400px\" /></p>\r\n\r\n<p>Hoa cưới cẩm t&uacute; cầu m&agrave;u trắng th&iacute;ch hợp để kết hợp c&ugrave;ng những loại hoa kh&aacute;c.</p>\r\n\r\n<p><img alt=\"Bó cẩm tú cầu này giúp tôn màu váy trắng cô dâu mặc trong ngày cưới\" src=\"http://juliette.vn/wp-content/uploads/2019/03/hoa-cuoi-cam-tu-cau-3.jpg\" style=\"height:750px; width:500px\" /></p>\r\n\r\n<p>B&oacute; cẩm t&uacute; cầu n&agrave;y gi&uacute;p t&ocirc;n m&agrave;u v&aacute;y trắng c&ocirc; d&acirc;u mặc trong ng&agrave;y cưới</p>\r\n\r\n<p><img alt=\"Sắc trắng của cẩm tú cầu phù hợp với những cô dâu lãng mạn, nhẹ nhàng.\" src=\"http://juliette.vn/wp-content/uploads/2019/03/hoa-cuoi-cam-tu-cau-5-1.jpg\" style=\"height:602px; width:400px\" /></p>\r\n\r\n<p>Sắc trắng của cẩm t&uacute; cầu ph&ugrave; hợp với những c&ocirc; d&acirc;u l&atilde;ng mạn, nhẹ nh&agrave;ng.</p>\r\n\r\n<p><img alt=\"Bó hoa kết hợp cùng vải thô gai, tạo sự mộc mạc, đơn giản.\" src=\"http://juliette.vn/wp-content/uploads/2019/03/hoa-cuoi-cam-tu-cau-6.jpg\" style=\"height:601px; width:400px\" /></p>\r\n\r\n<p>B&oacute; hoa kết hợp c&ugrave;ng vải th&ocirc; gai, tạo sự mộc mạc, đơn giản.</p>\r\n\r\n<p><img alt=\"Cẩm tú cầu kết hợp cùng hoa hồng nhẹ nhàng, tinh tế\" src=\"http://juliette.vn/wp-content/uploads/2019/03/hctcd_wedding_hydrangea_1-455x531.jpg\" style=\"height:531px; width:455px\" /></p>\r\n\r\n<p>Cẩm t&uacute; cầu kết hợp c&ugrave;ng hoa hồng nhẹ nh&agrave;ng, tinh tế</p>\r\n\r\n<p><img alt=\"Hoa cưới cẩm tú cầu xanh nổi bật\" src=\"http://juliette.vn/wp-content/uploads/2019/03/hoa-cam-tay-co-dau-ket-tu-hoa-cam-tu-cau-xanh-ngot-ngao.jpg\" style=\"height:579px; width:500px\" /></p>\r\n\r\n<p>Hoa cưới cẩm t&uacute; cầu xanh nổi bật</p>\r\n', 'Hoa cẩm tú cầu có đủ màu sắc từ trắng, xanh, hồng nhạt đến tím. Mỗi màu sắc cho ta những vẻ đẹp lung linh hiếm có ở những loài hoa khác.\r\n       ', '2020-09-25 17:42:37', 1),
(40, 7, 1, 'Hoa cưới', 'Cách làm hoa cưới cầm tay đơn giản nhất cho cô dâu', '1615043470dct.jpg', '<h2><strong>C&aacute;ch l&agrave;m hoa cưới cầm tay từ hoa tươi</strong></h2>\r\n\r\n<p>Chuẩn bị nguy&ecirc;n liệu.</p>\r\n\r\n<ul>\r\n	<li>Trước hết để b&oacute; được một b&oacute; hoa cưới bằng hoa tươi đẹp cần lựa chọn loại hoa ph&ugrave; hợp với trang phục cưới của c&ocirc; d&acirc;u ch&uacute; rể.</li>\r\n	<li>N&ecirc;n chọn c&aacute;c mẫu hoa cả hai đều y&ecirc;u th&iacute;ch v&agrave; an to&agrave;n, để đảm bảo ch&uacute; rể v&agrave; c&ocirc; d&acirc;u kh&ocirc;ng bị dị ứng với bất kỳ lo&agrave;i hoa n&agrave;o trong b&oacute; hoa.</li>\r\n	<li>Chuẩn bị hoa ch&iacute;nh, hoa phụ, c&aacute;c loại hoa l&aacute; đi k&egrave;m, chuẩn bị một miếng xốp ng&acirc;m sẵn nước đ&atilde; mềm, chuẩn bị khung cầm tay, dao, k&eacute;o, d&acirc;y th&eacute;p d&acirc;y ruy băng v&agrave; một số phụ kiện lấp l&aacute;nh gi&uacute;p cho b&oacute; hoa của bạn sang trọng v&agrave; lộng lẫy hơn.</li>\r\n</ul>\r\n\r\n<p>Sau khi đ&atilde; chuẩn bị đủ nguy&ecirc;n liệu, phụ kiện đi k&egrave;m, những dụng cụ đi k&egrave;m th&igrave; c&oacute; thể tiến h&agrave;nh ngay c&aacute;ch l&agrave;m hoa cưới cầm tay đơn giản ngay th&ocirc;i n&agrave;o.</p>\r\n\r\n<ul>\r\n	<li>Bước 1: Đầu ti&ecirc;n gắn miếng xốp đ&atilde; ng&acirc;m nước v&agrave;o tay cầm của c&ocirc; d&acirc;u để cố định vị khung hoa cầm tay chắc chắn, sau đ&oacute; cố định lại bằng d&acirc;y th&eacute;p.</li>\r\n</ul>\r\n\r\n<p><img alt=\"Cố định bó hoa bằng miếng xốp\" src=\"http://juliette.vn/wp-content/uploads/2019/05/xop.jpg\" style=\"height:598px; width:600px\" /></p>\r\n\r\n<p>B&oacute; hoa cầm tay gi&uacute;p c&ocirc; d&acirc;u rạng rỡ hơn</p>\r\n\r\n<ul>\r\n	<li>Bước 2: Sau khi đ&atilde; cố định tay cầm hoa v&agrave; miếng xốp, bạn chọn những b&ocirc;ng hoa to v&agrave; đẹp nhất để cắm l&agrave;m c&agrave;nh hoa ch&iacute;nh.\r\n	<p>&nbsp;</p>\r\n	<img alt=\"Chọn những bông hoa to và đẹp nhất\" src=\"http://juliette.vn/wp-content/uploads/2019/05/cach-lm.jpg\" style=\"height:338px; width:600px\" />\r\n	<p>Chọn những b&ocirc;ng hoa to v&agrave; đẹp nhất</p>\r\n	</li>\r\n	<li>Bước 3: Tiếp đ&oacute;, sử dụng hoa ch&iacute;nh cắm v&agrave;o miếng xốp để tạo điểm nhấn v&agrave; l&agrave; trung t&acirc;m b&oacute; hoa cưới cầm tay.</li>\r\n</ul>\r\n\r\n<p><img alt=\"Bó hoa lại và buộc cố định \" src=\"http://juliette.vn/wp-content/uploads/2019/05/clh.jpg\" style=\"height:800px; width:600px\" /></p>\r\n\r\n<p>B&oacute; hoa lại v&agrave; buộc cố định</p>\r\n\r\n<ul>\r\n	<li>Bước 4: Chọn hoa phụ cắm xung quanh những b&ocirc;ng hoa ch&iacute;nh, mật độ vừa đủ quanh theo chiều kim đồng hồ. Sau đ&oacute; d&ugrave;ng băng d&iacute;nh cố định lại phần tay cầm, quấn th&ecirc;m một lớp dải ruy băng thắt nơ kh&eacute;o l&eacute;o, bạn đ&atilde; gần ho&agrave;n thiện b&oacute; hoa.</li>\r\n</ul>\r\n\r\n<p><img alt=\"Trang trí hoa bằng phụ kiện đi kèm\" src=\"http://juliette.vn/wp-content/uploads/2019/05/trang-tri-hoa.jpg\" style=\"height:514px; width:600px\" /></p>\r\n\r\n<p>Trang tr&iacute; hoa bằng phụ kiện đi k&egrave;m</p>\r\n\r\n<ul>\r\n	<li>Bước 5: Cuối c&ugrave;ng bạn c&oacute; thể th&ecirc;m hoặc kh&ocirc;ng th&ecirc;m phụ kiện lấp l&aacute;nh, hay phun lớp kim tuyến l&ecirc;n gi&uacute;p b&oacute; hoa của bạn sinh động v&agrave; bắt mắt hơn.Sau khi b&oacute; xong n&ecirc;n phun nước dạng phun sương để giữ hoa tươi l&acirc;u hơn.</li>\r\n</ul>\r\n', 'Hoa cưới là một phần không thể thiếu trong ngày trọng đại của các cặp đôi. Mỗi bó hoa cưới  đều mang nhiều thông điệp ý nghĩa riêng. Vậy làm sao có thể tự tay làm những bó hoa cưới lộng lẫy nhất cho ngày trọng đại?                ', '2020-09-25 17:43:54', 1),
(41, 7, 1, 'Hoa Tuyết Mai', 'Hoa tuyết mai có ý nghĩa gì? Cách cắm hoa tuyết mai thật đẹp.', '1614966950hoa-tuyet-mai-al.jpg', '<h2>Hoa tuyết mai l&agrave; g&igrave;?</h2>\r\n\r\n<p>Hoa tuyết mai (c&ograve;n được gọi l&agrave; hoa bạch tuyết mai, m&atilde; thi&ecirc;n hương, hay hoa ng&agrave;n sao...) l&agrave; một loại hoa c&oacute; xuất xứ từ Trung Quốc. Loại hoa n&agrave;y thường nở v&agrave;o khoảng cuối Đ&ocirc;ng, đầu Xu&acirc;n.</p>\r\n\r\n<p>Mỗi c&agrave;nh hoa tuyết mai c&oacute; chiều d&agrave;i khoảng 1,2 đến 1,5 m&eacute;t. Hoa c&oacute; 5 c&aacute;nh m&agrave;u trắng muốt, nhỏ li ti c&ugrave;ng với đ&oacute; l&agrave; hương thơm nhẹ nh&agrave;ng rất dễ chịu. Mặc d&ugrave; b&ocirc;ng hoa tuyết mai rất nhỏ nhưng n&oacute; lại mọc dọc theo c&agrave;nh l&aacute; với mật độ d&agrave;y đặc n&ecirc;n nh&igrave;n tổng thể c&agrave;nh hoa tuyết mai rất xum xu&ecirc; v&agrave; thu h&uacute;t. Ch&iacute;nh v&igrave; thế, loại hoa n&agrave;y cũng rất được ưa chuộng mỗi dịp Tết đến, Xu&acirc;n về b&ecirc;n cạnh&nbsp;c&aacute;c loại hoa như&nbsp;<a href=\"https://meta.vn/hotro/hoa-thanh-lieu-7583\" title=\"Ý nghĩa của hoa thanh liễu là gì? Cách cắm hoa thanh liễu đẹp đón Tết sung túc\">hoa thanh liễu</a>,&nbsp;<a href=\"https://meta.vn/hotro/hoa-tieu-tu-cau-7709\" title=\"Hoa tiểu tú cầu là hoa gì? Cách cắm hoa tiểu tú cầu đẹp, trang nhã\">hoa tiểu t&uacute; cầu</a>,&nbsp;<a href=\"https://meta.vn/hotro/hoa-violet-7767\" title=\"Hoa violet là hoa gì, màu gì? Ý nghĩa và cách cắm hoa violet đẹp\">hoa violet</a>,&nbsp;<a href=\"https://meta.vn/hotro/hoa-cam-chuong-7764\" title=\"Hoa cẩm chướng (hoa phăng) có ý nghĩa gì? Cách cắm hoa phăng đẹp nhất\">hoa cẩm chướng</a>,&nbsp;<a href=\"https://meta.vn/hotro/hoa-hai-duong-7769\" title=\"Hoa hải đường là hoa gì, nở vào mùa nào? Ý nghĩa và cách trồng hoa hải đường trong nhà\">hoa hải đường</a>,&nbsp;<a href=\"https://meta.vn/hotro/lan-ho-diep-7582\" title=\"Cách cắm hoa lan hồ điệp đẹp, ý nghĩa, đón may mắn, tài lộc Tết 2021\">hoa lan hồ điệp</a>...</p>\r\n\r\n<p><img alt=\"Cách cắm hoa tuyết mai\" src=\"https://s.meta.com.vn/img/thumb.ashx/Data/image/2021/01/25/hoa-tuyet-mai-3.jpg\" style=\"height:500px; width:375px\" title=\"Cách cắm hoa tuyết mai\" /></p>\r\n\r\n<h2>Hoa tuyết mai c&oacute; &yacute; nghĩa g&igrave;?</h2>\r\n\r\n<p>Hoa tuyết mai c&oacute; m&agrave;u trắng tinh kh&ocirc;i thể hiện cho sự tinh khiết, thanh tao. Hoa v&agrave; l&aacute; lại thường mọc với mật độ d&agrave;y n&ecirc;n tạo cho ch&uacute;ng ta c&oacute; được cảm gi&aacute;c xum xu&ecirc;, thể hiện cho sự phồn thịnh, thịnh vượng, may mắn. Ng&agrave;y Tết, trưng những chậu hoa tuyết mai hay b&igrave;nh hoa tuyết mai c&ograve;n l&agrave; để thể hiện sự sang trọng, qu&yacute; ph&aacute;i cho gia chủ.</p>\r\n\r\n<p><img alt=\"Hoa tuyết mai\" src=\"https://s.meta.com.vn/img/thumb.ashx/Data/image/2021/01/25/hoa-tuyet-mai-7.jpg\" style=\"height:500px; width:434px\" title=\"Hoa tuyết mai\" /></p>\r\n\r\n<h3>C&aacute;ch chọn mua hoa tuyết mai đẹp</h3>\r\n\r\n<p>Khi mua hoa tuyết mai, bạn n&ecirc;n chọn những c&agrave;nh hoa c&oacute; cả những b&ocirc;ng nở v&agrave; nụ bởi như thế th&igrave; thời gian chơi hoa mới được l&acirc;u. Ngo&agrave;i ra, bạn cũng n&ecirc;n chọn những c&agrave;nh hoa c&oacute; hoa, l&aacute;, nụ mọc đều từ tr&ecirc;n xuống dưới v&agrave; phải tươi, kh&ocirc;ng h&eacute;o hay bị dập n&aacute;t.</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, bạn cũng n&ecirc;n lựa chọn c&aacute;c c&agrave;nh thẳng v&agrave; cong kh&aacute;c nhau để khi cắm c&oacute; được sự h&agrave;i h&ograve;a, uyển chuyển.</p>\r\n\r\n<h3>C&aacute;ch cắm hoa tuyết mai đẹp, tươi l&acirc;u</h3>\r\n\r\n<ul>\r\n	<li>Bước 1: Hoa tuyết mai l&agrave; loại hoa th&acirc;n gỗ, rất kh&oacute; h&uacute;t nước. Ch&iacute;nh v&igrave; thế, trước khi cắm bạn n&ecirc;n cắt v&aacute;t ch&eacute;o gốc hoa khoảng 45 độ, đồng thời chẻ đ&ocirc;i gốc để hoa h&uacute;t nước dễ d&agrave;ng hơn.</li>\r\n	<li>Bước 2: Bạn tiến h&agrave;nh đốt gốc hoa tr&ecirc;n bếp ga hoặc bếp củi để hạn chế vi khuẩn sinh s&ocirc;i l&agrave;m thối c&agrave;nh.</li>\r\n	<li>Bước 3: Bạn cho nước v&agrave;o b&igrave;nh cắm hoa rồi cho thuốc dưỡng hoa hoặc v&agrave;i vi&ecirc;n vitamin B1 hoặc nghiền n&aacute;t aspirin rồi thả v&agrave;o b&igrave;nh.</li>\r\n	<li>Bước 4: Bạn cắm lần lượt c&aacute;c c&agrave;nh hoa tuyết mai v&agrave;o b&igrave;nh. N&ecirc;n cắm đan xen c&aacute;c c&agrave;nh thẳng v&agrave; c&agrave;nh cong để tổng thể b&igrave;nh hoa c&oacute; được độ mềm mại, h&agrave;i h&ograve;a nhất.</li>\r\n	<li>Bước 5: Sau khi cắm xong, bạn đặt b&igrave;nh hoa ở vị tr&iacute; tho&aacute;ng m&aacute;t, đủ &aacute;nh s&aacute;ng, tr&aacute;nh xa nguồn nhiệt. Cứ 2 ng&agrave;y bạn n&ecirc;n thay nước cho hoa 1 lần, đồng thời phun sương l&ecirc;n c&agrave;nh hoa để&nbsp;<a href=\"https://meta.vn/hotro/meo-giu-hoa-tuoi-ngay-tet-1810\" title=\"Mẹo giữ hoa tươi ngày Tết\">giữ hoa được tươi l&acirc;u hơn trong dịp Tết</a>.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '                    Những năm gần đây, hoa tuyết mai là một trong những loại hoa rất được ưa chuộng vào dịp Tết. Vậy hoa tuyết mai có ý nghĩa gì mà nhiều người lựa chọn tới vậy và cách cắm hoa tuyết mai đẹp chơi Tết như thế nào? Mời bạn theo dõi bài viết ', '2020-09-25 17:45:15', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id_order` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `note` text COLLATE utf8_unicode_ci COMMENT 'lời nhắn',
  `pinCode` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mã Pin',
  `ship_method` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'phương thức vận chuyển',
  `payl_method` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'phương thức thanh toán',
  `date_order` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'ngày mua',
  `status` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_orders`
--

INSERT INTO `tbl_orders` (`id_order`, `id_member`, `note`, `pinCode`, `ship_method`, `payl_method`, `date_order`, `status`) VALUES
(200, 236, 'Nhận ngay bạn ơi', 'e5ae0d', 'shipone', 'paylone', '2021-03-05 13:37:36', 0),
(201, 237, '234234', 'ad5e01', 'shipone', 'paylone', '2021-03-05 22:16:24', 0),
(202, 238, 'sđ', '834d03', 'shipone', 'paylone', '2021-03-06 10:38:48', 0),
(203, 241, 'Hà noius', '68d98f', 'shipone', 'paylone', '2021-03-09 20:54:58', 0),
(204, 236, 'oke', 'c8c3e6', 'shipone', 'paylone', '2021-03-25 20:15:56', 1),
(205, 243, 'hà nội', '255fee', 'shipone', 'paylone', '2021-04-10 22:51:01', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id_product` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL COMMENT 'thương hiệu sp',
  `product_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tên sản phẩm',
  `origin` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Xuất xứ',
  `main_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `second_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'giúp làm nổi bật sản phẩm',
  `price` float NOT NULL,
  `quantity` tinyint(4) NOT NULL COMMENT 'số lượng',
  `mass` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'khối lượng sản phẩm',
  `description` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'mô tả',
  `classify` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'phân loại sp',
  `sale` tinyint(2) DEFAULT NULL COMMENT 'giảm giá %',
  `price_sale` float DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_products`
--

INSERT INTO `tbl_products` (`id_product`, `id_category`, `id_brand`, `product_name`, `origin`, `main_image`, `second_image`, `price`, `quantity`, `mass`, `description`, `classify`, `sale`, `price_sale`, `create_at`, `status`) VALUES
(27, 3, 6, 'Hoa cẩm tú cầu', 'Sài gòn', '1614764422cam_tu_cau (1).jpg', '1614764422fairtraderoses_2019_envsub_550x650.jpg', 400000, 4, '1', 'Xét về ý nghĩa thì ý nghĩa chính của cẩm tú cầu là tượng trưng cho sự lạnh lùng, vô cảm.\n\nBên cạnh đó còn có các ý nghĩa khác, mà hiện nay vẫn còn rất nhiều tranh cãi xung quanh:\n\nDo đặc tính thay đổi màu sắc khi độ pH trong đất thay đổi, đã mang đến một ý nghĩa cũng khá buồn cho cẩm tú cầu, đó là sự thay đổi trong tình yêu.\n\nMột câu chuyện khác, lại kể về việc 1 Hoàng Đế Nhật Bản đã dùng hoa cẩm tú cầu để xin lỗi người mình yêu. Nên từ đó về sau, cẩm tú cầu cũng là loài hoa gửi gắm những lời xin lỗi.\n\nVà, từ vẻ bề ngoài với những cánh hoa mỏng manh, chen chúc nhau tạo thành một quả cầu hoa, nên cẩm tú cầu còn tượng trưng cho sự biết ơn và chân thành.\n\nTuy còn nhiều tranh cãi xung quanh ý nghĩa của hoa cẩm tú cầu, nhưng một số nơi trên thế giới quan niệm rằng hoa cẩm tú cầu là loài hoa dùng để kỉ niệm 4 năm ngày cưới.', 'cẩm tú cầu', 0, 0, '2020-08-25 21:28:04', 1),
(29, 3, 4, 'Hoa oải hương', 'Hà Giang', '1615004990oai_huong (1).jpg', '1615004990oai_huong (1).jpg', 120000, 6, '1', 'Người Việt thường có câu “màu tím thuỷ chung”, do vậy oải hương với màu tím đặc trưng đã trở thành biểu tượng của sự chung thuỷ trong tình yêu. Lavender còn được biết với cái tên “Thảo dược tình yêu” (Herb of love). Nó tượng trưng cho tình yêu bền bỉ, sắc son, bên nhau đến khi “đầu bạc răng long”, mãi không chia lìa. Do vậy, các cặp đôi thường tặng nhau những món quà có biểu tượng hoa lavender.\nLavender còn tượng trưng cho sự tinh tế, nhẹ nhàng của người con gái. Những bông hoa oải hương với sắc tím đằm thắm, nhẹ nhàng và thanh cao mang đến cho cuộc sống sự yên bình và dễ chịu hơn.', 'Hoa cưới', 5, 0, '2020-08-25 21:33:30', 1),
(30, 7, 8, 'Chi lan hồ điệp', 'Cao Lãnh - Đồng Tháp', '1614765522lan_ho_diep (11).jpg', '1614765522hoa_ly (8).jpg', 250000, 15, '1', 'Với sự phát triển và sức sống mãnh liệt. Lan Hồ Điệp nói riêng và các loài hoa Lan nói riêng còn có ý nghĩa biểu tượng cho sự sinh sản. Điều này có từ thời Trung Quốc và Hy Lạp thời xưa. \nLan Hồ Điệp tượng trưng cho sự sinh sản\nĐối với người Trung Quốc, hoa Lan chính là sự tượng trưng cho gia đình có con cái đông đủ và đầy ắp tiếng cười. Còn đối với người Hy Lạp, hoa lan được sử dụng để xác định giới tính của đứa con trong bụng của người mẹ. Nếu là con trai thì cha của đứa bé phải ăn rễ lớn của cây lan hồ điệp. Nếu là con gái thì cha đứa bé ăn rễ nhỏ của cây lan. \n\nMỗi nước đều có ý nghĩa về loài hoa lan này khác nhau. Nhưng chung quy, hoa Lan là biểu tượng về đường con cái trong gia đình.', 'Lan', 5, 0, '2020-08-25 21:35:43', 1),
(33, 5, 4, 'Hoa cúc xanh', 'Tiền Giang', '1615006265hoa cúc xanh.jpg', '1615006265hoa cúc xanh.jpg', 100000, 15, '1', 'Những bông hoa cúc xanh mang thông điệp về niềm hạnh phúc. Nó nhắn nhủ chúng ta rằng hãy biết trân trọng, giữ gìn niềm hạnh phúc ngay bên cạnh mình.', 'Chúc mừng thầy cô', 5, 0, '2020-08-25 21:47:00', 1),
(50, 3, 8, 'Hoa sen cầm tay cô dâu', 'Nhật bản', '1615191622z1985330763792_141c1813147b0c9ab3af53fa5a491c27 (1).jpg', '1615191622z1985330763792_141c1813147b0c9ab3af53fa5a491c27 (1).jpg', 55000, 48, '1', 'Nằm trong bộ sưu tập những mẫu hoa cưới cầm tay được làm bằng hoa sen Thái đẹp nhất. Màu trắng của sự quý phái , sang trọng .\r\nNhững bông hoa sen được lựa chọn tinh tế và kỹ lưỡng để tạo nên những bó hoa cưới đẹp nhất cho cô dâu trong ngày cưới .\r\n\r\nChúng tôi luôn đem đến cho bạn những quyền lợi tốt nhất:\r\n\r\nHoa được thiết kế theo phong cách hiện đại\r\n\r\nCó đóng hộp để các bạn có thể mang đi xa .', 'Hoa cưới', 0, 0, '2020-09-25 16:38:19', 1),
(52, 4, 8, 'Hoa Hồng ECUADOR', 'Hà Đông', '1614961599hoa-hong-ecuador-gui-tinh-yeu-cua-toi718.jpg', '1614961599hoa-hong-ecuador-gui-tinh-yeu-cua-toi718.jpg', 25000, 41, '1', 'Nếu như ai đó trót yêu thích vẻ đẹp của hoa hồng Ecuador thì có lẽ sẽ không thể nào không biết được rằng đây chính là loài hoa tượng trưng cho một tình yêu bất diệt, bền vững, tồn tại mãi theo năm tháng.\r\nChính vì lý do đó nên hoa hồng Ecuador được xem như một cách bày tỏ khéo léo tình cảm, thông điệp của mình đến với nửa kia rằng yêu chúng ta dù phải đi qua bao nhiêu chông gai, khó khăn, trắc trở đi nữa thì cũng sẽ mãi bền chặt theo tháng năm.\r\n', 'Hoa chúc mừng', 0, 0, '2020-09-25 16:46:40', 1),
(55, 6, 8, 'Hoa hồng đỏ', 'Hải Dương', '1614961216hoa-sinh-nhat-026-min.jpg', '1614961216hoa-sinh-nhat-026-min.jpg', 550000, 48, '1', 'Hoa hồng đỏ thể hiện ý nghĩa tình yêu chân thành, mãnh liệt bất chấp mọi chông gai. Đối với những mối quan hệ mới vừa bắt đầu hoặc là gắn bó dài lâu thì một bó hoa hồng đỏ như cách khẳng định tình cảm chân thành, đồng thời là lời hứa cho sự phát triển lâu dài về sau, cùng nhau đi đến đoạn cuối con đường. Bó hoa thích hợp tặng dịp đặc biệt Valentine, ngày kỉ niệm, cầu hôn….', 'Hoa sinh nhật', 0, 0, '2020-09-25 16:54:54', 1),
(56, 6, 8, 'Bó hoa hồng pastel', 'Đà Lạt', '1614961130hoa-sinh-nhat-027-min.jpg', '1614961130hoa-sinh-nhat-027-min.jpg', 1250000, 40, '1', 'Bó hoa hồng pastel điểm sao hồng tuy đơn giản nhưng cũng thật sang trọng và cuốn hút. Lớp giấy gói viền đỏ đô càng làm tôn thêm vẻ đẹp của bó hoa. Đây chắc chắn là món quà tuyệt vời dành tặng cho người yêu, bạn bè, đồng nghiệp vào những dịp quan trọng để lưu lại khoảnh khắcn đáng nhớ tặng sinh nhật, tặng người yêu Vv…', 'Hoa sinh nhật', 0, 0, '2020-09-25 16:57:32', 1),
(57, 6, 8, 'Bó hoa Trọn vẹn', 'Hà Nội', '1615190053hoa-sinh-nhat-031-min.jpg', '1615190053hoa-sinh-nhat-031-min.jpg', 800000, 29, '1', 'Trọn vẹn là mẫu hoa được thiết kế với ý nghĩa gởi đến người nhận thông điệp hãy cùng đồng hành với nhau để có một tình yêu trọn vẹn trong suốt con đường ở tương lai. Bó hoa thích hợp gửi tặng đến bà xã, người yêu trong các dịp đặc biệt.', 'Hoa sinh nhật', 0, 0, '2020-09-25 17:00:23', 1),
(63, 5, 6, 'Yêu thương', 'Điện Biên', '1614957613huong_duong (1).jpg', '1614957613huong_duong (1).jpg', 340000, 1, '', 'undefined', 'Ngày nhà giáo', 0, 0, '2020-09-25 17:20:14', 1),
(68, 3, 8, 'Hoa cầm tay cô dâu Môi Hồng ', 'Hà Nội', '1617954620BOUQUET-4308_June-500x500.jpg', '1617954620BOUQUET-4308-500x500.jpg', 640000, 5, '5', 'Một chút sắc hồng lãng mạn, một chút sắc trắng tinh khôi hòa quyện lại tạo nên một bó hoa rất dễ thương. Bó hoa là điều tuyệt vời nhất cho các cô nàng yêu sắc hồng và theo đuổi phong cách sang trọng quí phái.', 'Hoa cưới', 10, 64000, '2021-04-09 14:50:20', 1),
(69, 3, 8, 'Sánh bước chung đôi ', 'Đà Lạt', '1617955304BOUQUET-5614_1-500x500.jpg', '1617955304BOUQUET-5614_2-500x500.jpg', 700000, 4, '1', 'Như 1 lời hứa hẹn tình cảm, bó hoa cưới Sánh bước chung đôi mang đến sự chân thành, đong đầy yêu thương của chú rể dành tặng ý trung nhân của đời mình. Được thiết kế đơn giản với tông màu hồng-trắng nhưng không kém phần sang trọng, đây sẽ là bó hoa cưới cực kỳ trang nhã, xinh đẹp, ý nghĩa\r\n\r\nBó hoa Sánh bước chung đôi bao gồm:\r\n\r\n    Cẩm chướng hồng\r\n    Hoa baby trắng', 'Hoa cưới', 0, 0, '2021-04-09 15:01:44', 1),
(70, 3, 8, 'Nguyện bên em ', 'Hồ Chí Minh', '1617955391BOUQUET-5617-500x500.jpg', '1617955391BOUQUET-5617-500x500.jpg', 700000, 10, '1', 'Hoa hồng là loài hoa tượng trưng cho sự sự sôi nổi, cháy bỏng trong tình yêu. Ngoài vẻ đẹp quyến rũ và thanh lịch thì hoa hồng cũng là hoa cưới được dùng phổ biến nhất. Chính sự phong phú về màu sắc mà hoa hồng được nhiều cặp đôi lựa chọn làm màu sắc chủ đạo trong tiệc cưới. \r\n\r\nNguyện bên em là bó hoa cưới cầm tay cô dâu xinh đẹp, nhã nhặn, mang vẻ đẹp sang trọng và thuần khiết cho người con gái trong ngày trọng đại của cuộc đời mình.\r\n\r\nBó hoa Nguyện bên em bao gồm:\r\n\r\n    Hoa hồng kem pastel\r\n    Hoa baby trắng\r\n    Hoa sao tím', 'Hoa cưới', 0, 0, '2021-04-09 15:03:11', 1),
(71, 6, 8, 'Hoa hồng đỏ', 'Hà Nội', '1617955510default.jpg', '1617955510default.jpg', 1200000, 3, '1', 'Hoa hồng là loài hoa tượng trưng cho sự sự sôi nổi, cháy bỏng trong tình yêu. Ngoài vẻ đẹp quyến rũ và thanh lịch thì hoa hồng cũng là hoa cưới được dùng phổ biến nhất. Chính sự phong phú về màu sắc mà hoa hồng được nhiều cặp đôi lựa chọn làm màu sắc chủ đạo trong tiệc cưới. \r\nNguyện bên em là bó hoa cưới cầm tay cô dâu xinh đẹp, nhã nhặn, mang vẻ đẹp sang trọng và thuần khiết cho người con gái trong ngày trọng đại của cuộc đời mình.\r\nBó hoa Nguyện bên em bao gồm:\r\n\r\n - Hoa hồng kem pastel\r\n -  Hoa baby trắng\r\n -  Hoa sao tím', 'Hoa sinh nhật', 0, 0, '2021-04-09 15:05:10', 1),
(72, 6, 8, 'Bó hoa hồng Ohara - Tình trong mộng', 'Hàn Quốc', '1617955660BOUQUET-5617-500x500.jpg', '1617955660BOUQUET-5617-500x500.jpg', 1350000, 1, '1', ' Bó hoa hồng Ohara - Tình trong mộng được kết hợp từ những bông hoa hồng Ohara ngọt ngào, điểm thêm chút sắc xanh của lá cho ta cảm giác mơ mộng nhưng không kém phần ngọt ngào, quyến rũ. Dành tặng bó hoa hồng Ohara này tới người  bạn yêu thương để thể hiện tình cảm chân thành và lãng mạn của mình nhé!\r\nBó hoa hồng Ohara - Tình trong mộng gồm có:\r\n\r\n- Hoa hồng Ohara\r\n\r\n- Lá đô la\r\n\r\n- Lá đuôi chồn\r\n\r\n- Giấy gói hoa cao cấp Hàn Quốc', 'Hoa sinh nhật', 10, 0, '2021-04-09 15:07:40', 1),
(73, 4, 8, 'Khai Trương Tấn Tài', 'Đà Lạt', '1617956363ke-hoa-khai-truong-kt-105-510x680.jpg', '1617956363ke-hoa-khai-truong-kt-105-510x680.jpg', 1500000, 4, '4', 'Đơn giản nhưng cũng đầy sự trang trọng, Kệ hoa Khai Trương Tấn Tài  mang trên mình một thiết kế với hoa cẩm tú cầu làm chủ đạo, kèm những loại hoa tone vàng rực rỡ mang ý nghĩa chúc mừng sâu sắc. Cẩm tú cầu mang một ý nghĩa là niềm hy vọng, hy vọng may mắn, tiền tài, thành công sẽ đến với người nhận.\r\nKệ hoa chúc mừng Khai Trương Tấn Tài gồm có:\r\n- Hoa cẩm tú cầu\r\n- Hoa hướng dương\r\n- Hoa hồng vàng\r\n- Hoa cúc mini / ping pong vàng\r\n- Một số hoa lá phụ khác\r\n', 'Hoa chúc mừng', 50, 0, '2021-04-09 15:19:23', 1),
(74, 4, 8, 'Thăng Tiến', 'Hà Nội', '1617956581Hoa-Hop-Go-TH-H119-2-510x680.jpg', '1617956581Hoa-Hop-Go-TH-H119-2-510x680.jpg', 650000, 10, '5', 'Lẵng hoa tone vàng cam Thăng Tiến H119 là lẵng hoa có thể tặng trong tất cả mọi dịp từ chúc mừng sinh nhật cho đến khai trương cửa hàng, công ty.\r\nNguyên Liệu Lẵng Hoa Thăng Tiến H119\r\n  -  Hoa hồng màu hột gà\r\n  -  Hoa hướng dương\r\n  -  Lan thái\r\n  -  Lan vũ nữ\r\n  -  Một số hoa & lá phụ khác\r\n', 'Hoa chúc mừng', 0, 10000, '2021-04-09 15:23:01', 1),
(75, 2, 8, 'Nơi tình yêu bắt đầu', 'Đà Lạt', '1617957235noi-tinh-yeu-bat-dau-1-510x510.jpg', '1617957235noi-tinh-yeu-bat-dau-1-510x510.jpg', 450000, 10, '2', 'Bó hoa tươi – Nơi tình yêu bắt đầu, với tone màu hồng dịu mắt và hiện đại. Nơi tình yêu bắt đầu lan tỏa cảm giác tươi mát, nhẹ nhàng, xua tan mọi sự mệt mỏi, muộn phiền và và thêm nhiều hi vọng cho cuộc sống này.\r\n\r\nMàu hồng của hoa hồng kem dâu mang thông điệp về sự sinh sôi, phát triển, kề bên là những cánh hoa phăng hồng phớt dễ thương điểm xuyến thêm đó chút trắng tinh khôi hoa Cúc nhắc nhớ một tình yêu vừa chớm nở, một tình yêu vừa mới bắt đầu, dịu dàng, thanh khiết như buổi sớm ban mai. Tổng thể là sự kết hợp hài hòa của những rung cảm đầu tiên, trong sáng, chân thành với niềm hi vọng cho tình cảm ấy ngày càng thăng hoa, bền chặt.\r\n', 'Hoa tình yêu', 10, 100000, '2021-04-09 15:30:34', 1),
(76, 2, 8, 'Ngây ngô', 'Hà Nội', '1617957519tinh20khoi202-49-510x510.jpg', '1617957519tinh20khoi202-49-510x510.jpg', 400000, 15, '3', '\r\n\r\nBạn là một cô nàng yêu màu hồng, yêu sự ngọt ngào, dịu dàng thì hãy về với đội tone hoa của bó hoa “Ngây ngô” này ngay thôi!\r\n\r\n    Hoa hồng kem dâu vốn nổi tiếng với độ mềm mại, tone màu dịu mắt rất thích hợp với các cô nàng kẹo ngọt.\r\n    Những nàng baby tuy nhỏ nhắn mang màu trắng tinh khôi nhưng cũng khoe sắc không hề kém cạnh với sắc hồng kem.\r\n\r\nEm là thiên thần trong mắt anh – chính là thông điệp được ẩn sâu trong bó hồng ấy. Bạn sẽ chẳng phải mất quá nhiều thời gian để chọn lựa mà vẫn có\r\n\r\nmột quyết định hoàn hảo khi dành tặng bó hồng ấy tới người yêu thương.\r\n', 'Hoa tình yêu', 0, 0, '2021-04-09 15:38:39', 1),
(77, 1, 1, 'Ngọc sắc', 'Hồ Chí Minh', '161795772410707_ngoc-sac.jpg', '161795772410707_ngoc-sac.jpg', 500000, 7, '1', 'Ngọc sắc\r\nGiỏ hoa gam tím chủ đạo cực kì phù hợp gửi tặng những người phụ nữ bạn yêu thương trong các dịp lễ đặc biệt. Mỗi đoá hoa khoe sắc như cách mà bạn gửi gắm tâm tình của mình đến với người nhận. Hãy tạo thêm những kỉ niệm thật đáng nhớ với người bạn yêu quý nhé.', 'Hoa tặng mẹ', 0, 0, '2021-04-09 15:42:04', 1),
(78, 1, 1, 'Giỏ hoa tươi - Thanh âm Giỏ hoa \"Thanh âm\" ', 'Hồ Chí Minh', '161795781410709_thanh-am.jpg', '161795781410709_thanh-am.jpg', 700000, 15, '3', 'Giỏ hoa tươi - Thanh âm\r\nGiỏ hoa \"Thanh âm\" là sự kết hợp chủ đạo của hồng đỏ, cẩm chưởng đỏ, lan moakara đỏ và các hoa lá phụ khác. Mẫu cắm đã tôn vinh lên hết được ý nghĩa tượng trưng của hoa hồng đỏ sẵn có trong tình yêu kiêu sa và rực rỡ và không bao giờ phai nhạt.', 'Hoa tặng mẹ', 0, 0, '2021-04-09 15:43:34', 1),
(79, 4, 1, 'Miranda Rose', 'Hồ Chính Minh', '1618131895mirida1.jpg', '1618131895mirida2.jpg', 650000, 15, '3', 'Trong tình yêu màu trắng tượng trưng cho một tình yêu thuần khiết. Trong ngày lễ trọng đại, chọn hoa hồng trắng là màu chủ đạo nhằm tôn vinh một tình yêu mãi mãi không phai theo năm tháng.', 'Hoa chúc mừng', 0, 0, '2021-04-11 16:04:55', 1),
(80, 6, 1, 'Hướng dương', 'Hà Nội', '1618132372ốc quế cẩm tú cầu.jpg', '1618132372ốc quế.jpg', 700000, 15, '3', 'Hoa hướng dương tượng trưng cho sự đáng yêu, trung thành và trường thọ. Phần lớn ý nghĩa của hoa hướng dương bắt nguồn từ chính cái tên của nó, chính là mặt trời - một biểu tượng mãnh liệt của sự sống. ... Ngoài ra, Hoa hướng dương được biết đến là loài hoa hạnh phúc đối với người Do Thái, làm cho chúng trở thành món quà hoàn hảo để mang lại niềm vui cho ngày đặc biệt của ai đó hoặc của chính bạn..', 'Hoa sinh nhật', 0, 0, '2021-04-11 16:12:52', 1),
(81, 1, 1, 'SunFlower', 'Hàn Nội', '1618132559hương dương.jpg', '1618132559huong_duong (1).jpg', 840000, 15, '3', 'Hoa hướng dương tượng trưng cho sự đáng yêu, trung thành và trường thọ. Phần lớn ý nghĩa của hoa hướng dương bắt nguồn từ chính cái tên của nó, chính là mặt trời - một biểu tượng mãnh liệt của sự sống. ... Ngoài ra, Hoa hướng dương được biết đến là loài hoa hạnh phúc đối với người Do Thái, làm cho chúng trở thành món quà hoàn hảo để mang lại niềm vui cho ngày đặc biệt của ai đó hoặc của chính bạn..', 'Ngày của mẹ', 0, 0, '2021-04-11 16:15:59', 1),
(82, 2, 4, 'Gladys', 'Hà Nội', '1618132741gladys.jpg', '1618132741gladys1.jpg', 900000, 15, '3', 'Hoa hồng đỏ từ lâu được xem là biểu tượng cho tình yêu lãng mạn, mãnh liệt và vĩnh cửu của lứa đôi. Vì vậy, loài hoa này thường được tặng vào các dịp lễ, kỷ niệm,... nhất là các dịp lễ liên quan tới tình yêu như Valentine hay các ngày lễ của phụ nữ (8/3, 20/10).', 'Ngày Valentine', 0, 0, '2021-04-11 16:19:01', 1),
(83, 4, 8, 'Angela', 'Hà Nội', '1618133086Angela.jpg', '1618133086angela1.jpg', 580000, 15, '3', 'Loài hoa này còn thể hiện cho sự hài hòa, cân bằng của cuộc sống, luôn biết trân trọng những gì đang có ở hiện tại và luôn cố gắng vươn tới những điều tốt đẹp nhất trong tương lai.', 'Hoa chúc mừng', 0, 0, '2021-04-11 16:24:46', 1),
(84, 4, 1, 'Pretty in pink', 'Hồ Chính Minh', '1618133635pink.jpg', '1618133635pink1.jpg', 620000, 15, '3', 'Miranda rose là giống hoa hồng nhập ngoại có nguồn gốc từ Anh và được lai tạo bởi David Austin vào năm 1997.\nHoa có đặc trưng màu hồng phấn, cánh kép (mỗi bông có tới trên 120 cánh hoa).\nGiống hồng thân bụi với bông lớn (đường kính bông từ 10 - 12cm).\nHoa Miranda Rose mang ý nghĩa về 1 tình yêu lãng mạn và ngọt ngào.', 'Hoa chúc mừng', 0, 0, '2021-04-11 16:33:55', 1),
(85, 2, 8, 'Erica', 'Hà Nội', '1618133812red.jpg', '1618133812red1.jpg', 840000, 15, '3', 'Hoa hồng đỏ từ lâu được xem là biểu tượng cho tình yêu lãng mạn, mãnh liệt và vĩnh cửu của lứa đôi. Vì vậy, loài hoa này thường được tặng vào các dịp lễ, kỷ niệm,... nhất là các dịp lễ liên quan tới tình yêu như Valentine hay các ngày lễ của phụ nữ (8/3, 20/10).', 'Hoa Valentine', 0, 0, '2021-04-11 16:36:52', 1),
(86, 2, 4, 'Lover', 'Hà Nội', '1618133912lover.jpg', '1618133912lover1.jpg', 780000, 15, '3', 'Hoa hồng đỏ từ lâu được xem là biểu tượng cho tình yêu lãng mạn, mãnh liệt và vĩnh cửu của lứa đôi. Vì vậy, loài hoa này thường được tặng vào các dịp lễ, kỷ niệm,... nhất là các dịp lễ liên quan tới tình yêu như Valentine hay các ngày lễ của phụ nữ (8/3, 20/10).', 'Hoa Valentine', 0, 0, '2021-04-11 16:38:32', 1),
(87, 1, 1, 'Springs', 'Hà Nội', '1618134157sp.jpg', '1618134157sp1.jpg', 1200000, 18, '3', 'Hoa cúc mẫu đơn được xem như một trong những loài hoa đẹp nhất thế giới. Với vẻ đẹp duyên dáng và độc đáo kiến chúng ta liên tưởng đến một người phụ nữ xinh đẹp và tài giỏi đang khoác lên mình một tấm áo lụa thướt tha. Hoa cúc mẫu đơn nổi bật và sang trọng được yêu thích ở khắp mọi nơi chính là món quà hoàn hảo cho những tháng đầu hè.', 'Ngày của mẹ', 0, 0, '2021-04-11 16:42:37', 1),
(89, 5, 1, 'Lyly', 'Hà Nội', '1618134710cam.jpg', '1618134710cam1.jpg', 720000, 15, '3', 'Hồng cam đậm (hồng đỏ cam) lại mang vẻ đẹp rực rỡ hơn, tươi sáng hơn hồng cam nhạt. Màu sắc của hoa là sự pha trộn giữa sắc cam và đỏ thẫm hoặc cam đậm và vàng. Một số loại hồng cam nhập khẩu với kích thước bông lớn, trên một bông còn có thể đồng thời mang đủ sắc cam đậm – nhạt khác nhau.', 'Ngày nhà giáo', 0, 0, '2021-04-11 16:51:50', 1),
(90, 3, 1, 'Secret', 'Hà Nội', '1618135138se.jpg', '1618135138se1.jpg', 850000, 15, '3', 'Hoa hồng Shizuku mang ý nghĩa về 1 tình yêu chân thành, mộc mạc, giản đơn, không cầu kỳ hoa mỹ. Những bông hồng Shizuku đem tặng là món quà thay lời thổ lộ về tình cảm trong sáng, mộc mạc giữa 2 người.', 'Hoa cưới', 0, 500000, '2021-04-11 16:58:58', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_ratings`
--

CREATE TABLE `tbl_ratings` (
  `id_rating` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `rate` tinyint(1) DEFAULT NULL COMMENT 'Tối đa 5 sao',
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_ratings`
--

INSERT INTO `tbl_ratings` (`id_rating`, `id_product`, `id_member`, `rate`, `create_at`, `status`) VALUES
(46, 33, 235, 5, '2021-03-03 16:06:31', 1),
(47, 27, 235, 5, '2021-03-03 16:07:54', 1),
(48, 29, 235, 3, '2021-03-03 16:07:57', 1),
(49, 57, 235, 5, '2021-03-03 16:08:19', 1),
(50, 56, 235, 4, '2021-03-03 16:08:21', 1),
(51, 50, 235, 4, '2021-03-03 16:08:23', 1),
(52, 52, 235, 5, '2021-03-03 16:08:24', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slides`
--

CREATE TABLE `tbl_slides` (
  `id_slide` int(11) NOT NULL,
  `slide_title` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tiều đề slider',
  `slide_content` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nội dung slider',
  `slide_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Ảnh slide',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_slides`
--

INSERT INTO `tbl_slides` (`id_slide`, `slide_title`, `slide_content`, `slide_image`, `created_at`) VALUES
(1, '26 April Flowers', 'Hoa tươi Đà Lạt - Ưu đãi ngập tràn. Siêu ưu đãi với đơn hàng 500K', 'slider6.jpg', '2020-09-20 17:49:31'),
(2, 'Flowers Beautiful', 'Sử dụng tài khoản khi mua hàng, nhận ngay điểm tích lũy. Tích ngay quà khủng, cùng lập tài khoản với mình nhé!', 'slider3.jpg', '2020-09-20 17:49:31'),
(3, 'Happy Woments Days', 'Khuyến mại khủng, Cùng tham gia chia sẻ sản phẩm để nhận mã giảm giá , Giảm giá lên tới 50%', '16011312801601117431slider5.jpg', '2020-09-20 17:49:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'phân quyền',
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `name`, `role`, `email`, `phone`, `password`, `status`, `address`, `create_at`) VALUES
(1, 'Administrator', 3, 'admin@gmail.com', '0989888999', 'Flowers@123*', 1, 'Điện Biên Phủ', '2020-09-04 16:36:57'),
(54, 'Nguyễn Anh Tuấn', 1, 'anhtuan@gmail.com', '0978889992', 'Tuan123', 1, 'Phùng Khoang -  Hà Đông', '2020-09-12 12:17:19'),
(79, 'Đàm Quang Việt', 3, 'damviet@gmail.com', '0972853499', '123@', 1, 'Hồng Mai - Hà Nội', '2020-09-12 18:23:03'),
(80, 'Nguyễn Ngọc Duy', 1, 'ngocduy@gmail.com', '0972853466', 'Duy.1234', 1, 'Điện Biên', '2020-09-12 20:08:41'),
(81, 'Đàm Quang Việt', 3, 'viet@gmail.com', '032455698', 'Viet.123', 1, 'HỒng Mai', '2020-09-26 17:34:46'),
(82, 'Trần Anh Tú', 3, 'trantu123@gmail.com', '0935709669', 'Anh123', 1, 'hà nồi', '2020-09-26 17:44:02'),
(83, 'Nguyễn Gia Bảo', 1, 'nguyenbao@gmail.com', '0972853491', 'SG9hbmdsb2wy', 1, NULL, '2020-09-28 16:42:39'),
(84, 'Trang', 1, 'tranglun301299@gmail.com', '0396085519', 'Rmxvd2Vyc0AxMjM=', 1, NULL, '2021-03-06 09:52:26'),
(85, 'Trang', 1, 'tranglun123@gmail.com', '0396085517', 'VHJhbmczMDEyOTk=', 1, NULL, '2021-03-06 09:58:57');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_brands`
--
ALTER TABLE `tbl_brands`
  ADD PRIMARY KEY (`id_brand`);

--
-- Chỉ mục cho bảng `tbl_category_news`
--
ALTER TABLE `tbl_category_news`
  ADD PRIMARY KEY (`id_category_new`);

--
-- Chỉ mục cho bảng `tbl_category_products`
--
ALTER TABLE `tbl_category_products`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  ADD PRIMARY KEY (`id_contact`);

--
-- Chỉ mục cho bảng `tbl_detail_images`
--
ALTER TABLE `tbl_detail_images`
  ADD PRIMARY KEY (`id_detail_image`),
  ADD KEY `fk_id_product_tbl_detail_imgs_products` (`id_product`);

--
-- Chỉ mục cho bảng `tbl_detail_news`
--
ALTER TABLE `tbl_detail_news`
  ADD PRIMARY KEY (`id_detail_new`),
  ADD KEY `fk_id_new_tbl_detail_news_news` (`id_news`);

--
-- Chỉ mục cho bảng `tbl_detail_orders`
--
ALTER TABLE `tbl_detail_orders`
  ADD PRIMARY KEY (`id_order`,`id_product`) USING BTREE,
  ADD KEY `fk_id_order_tbl_detail_orders_orders` (`id_order`),
  ADD KEY `fk_id_product_tbl_detail_orders_products` (`id_product`);

--
-- Chỉ mục cho bảng `tbl_gifts`
--
ALTER TABLE `tbl_gifts`
  ADD PRIMARY KEY (`id_gift`);

--
-- Chỉ mục cho bảng `tbl_members`
--
ALTER TABLE `tbl_members`
  ADD PRIMARY KEY (`id_member`);

--
-- Chỉ mục cho bảng `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`id_news`),
  ADD KEY `fk_id_cate_new_tbl_news_cate_news` (`id_category_new`),
  ADD KEY `fk_id_user_tbl_news_users` (`id_user`);

--
-- Chỉ mục cho bảng `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `fk_id_member_tbl_orders_members` (`id_member`);

--
-- Chỉ mục cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `fk_id_cate_tbl_products_cates` (`id_category`),
  ADD KEY `fk_id_brand_tbl_products_brands` (`id_brand`);

--
-- Chỉ mục cho bảng `tbl_ratings`
--
ALTER TABLE `tbl_ratings`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `fk_id_product_tbl_comments_products` (`id_product`),
  ADD KEY `fk_id_member_tbl_comments_members` (`id_member`);

--
-- Chỉ mục cho bảng `tbl_slides`
--
ALTER TABLE `tbl_slides`
  ADD PRIMARY KEY (`id_slide`);

--
-- Chỉ mục cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_brands`
--
ALTER TABLE `tbl_brands`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_category_news`
--
ALTER TABLE `tbl_category_news`
  MODIFY `id_category_new` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_category_products`
--
ALTER TABLE `tbl_category_products`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_detail_images`
--
ALTER TABLE `tbl_detail_images`
  MODIFY `id_detail_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT cho bảng `tbl_detail_news`
--
ALTER TABLE `tbl_detail_news`
  MODIFY `id_detail_new` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_gifts`
--
ALTER TABLE `tbl_gifts`
  MODIFY `id_gift` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT cho bảng `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT cho bảng `tbl_ratings`
--
ALTER TABLE `tbl_ratings`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `tbl_slides`
--
ALTER TABLE `tbl_slides`
  MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_detail_images`
--
ALTER TABLE `tbl_detail_images`
  ADD CONSTRAINT `fk_id_product_tbl_detail_imgs_products` FOREIGN KEY (`id_product`) REFERENCES `tbl_products` (`id_product`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_detail_news`
--
ALTER TABLE `tbl_detail_news`
  ADD CONSTRAINT `fk_id_new_tbl_detail_news_news` FOREIGN KEY (`id_news`) REFERENCES `tbl_news` (`id_news`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_detail_orders`
--
ALTER TABLE `tbl_detail_orders`
  ADD CONSTRAINT `fk_id_order_tbl_detail_orders_orders` FOREIGN KEY (`id_order`) REFERENCES `tbl_orders` (`id_order`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_product_tbl_detail_orders_products` FOREIGN KEY (`id_product`) REFERENCES `tbl_products` (`id_product`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD CONSTRAINT `fk_id_cate_new_tbl_news_cate_news` FOREIGN KEY (`id_category_new`) REFERENCES `tbl_category_news` (`id_category_new`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_user_tbl_news_users` FOREIGN KEY (`id_user`) REFERENCES `tbl_users` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `fk_id_member_tbl_orders_members` FOREIGN KEY (`id_member`) REFERENCES `tbl_members` (`id_member`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `fk_id_brand_tbl_products_brands` FOREIGN KEY (`id_brand`) REFERENCES `tbl_brands` (`id_brand`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_cate_tbl_products_cates` FOREIGN KEY (`id_category`) REFERENCES `tbl_category_products` (`id_category`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_ratings`
--
ALTER TABLE `tbl_ratings`
  ADD CONSTRAINT `fk_id_member_tbl_ratings_members` FOREIGN KEY (`id_member`) REFERENCES `tbl_members` (`id_member`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_product_tbl_ratings_products` FOREIGN KEY (`id_product`) REFERENCES `tbl_products` (`id_product`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
