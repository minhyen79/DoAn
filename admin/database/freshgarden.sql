-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 06, 2020 lúc 08:53 AM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `freshgarden`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brands`
--

CREATE TABLE `tbl_brands` (
  `id_brand` int(11) NOT NULL,
  `brand_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tên thương hiệu',
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brands`
--

INSERT INTO `tbl_brands` (`id_brand`, `brand_name`, `create_at`, `status`) VALUES
(4, 'MixiFood', '2020-08-22 09:07:13', 1),
(5, 'Cloundys', '2020-08-22 09:07:13', 1),
(6, 'Apple & Eve', '2020-08-22 09:08:27', 1),
(7, 'Langer’s', '2020-08-22 09:08:27', 1),
(8, 'Tropicana', '2020-08-22 09:09:01', 1),
(9, 'Frooti', '2020-08-22 09:09:01', 1),
(10, 'Ocean Spray', '2020-08-22 09:09:11', 1),
(11, 'Ceres', '2020-08-22 09:09:11', 1),
(12, 'Minute Maid', '2020-08-22 09:09:36', 1),
(13, 'Simply Orange', '2020-08-22 09:09:36', 1),
(14, 'Del Monte', '2020-08-22 09:09:50', 1),
(15, 'V8', '2020-08-22 09:10:16', 1),
(16, 'Vfresh', '2020-08-22 09:11:51', 1),
(17, 'Nutriboost', '2020-08-22 09:13:11', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_news`
--

CREATE TABLE `tbl_category_news` (
  `id_category_new` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên danh mục',
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `parent_id` tinyint(2) NOT NULL COMMENT 'Danh mục cha'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_news`
--

INSERT INTO `tbl_category_news` (`id_category_new`, `name`, `create_at`, `status`, `parent_id`) VALUES
(1, 'công nghệ', '2020-09-05 11:46:36', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_products`
--

CREATE TABLE `tbl_category_products` (
  `id_category` int(11) NOT NULL,
  `name_cate` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `parent_id` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_products`
--

INSERT INTO `tbl_category_products` (`id_category`, `name_cate`, `create_at`, `status`, `parent_id`) VALUES
(1, 'Trái Cây', '2020-08-20 07:46:50', 1, 0),
(2, 'Rau', '2020-08-20 07:46:50', 1, 0),
(3, 'Củ', '2020-08-20 07:47:55', 1, 0),
(4, 'Trái cây nhập', '2020-09-04 23:47:47', 1, 1),
(5, 'Trái cây việt', '2020-09-04 23:56:40', 1, 1),
(6, 'Cherry', '2020-09-05 00:00:41', 1, 4),
(7, 'Nho', '2020-09-05 00:00:41', 1, 4),
(8, 'Táo', '2020-09-05 00:01:24', 1, 4),
(9, 'Lê', '2020-09-05 00:01:24', 1, 4),
(10, 'Nhãn', '2020-09-05 00:02:02', 1, 5),
(11, 'Thanh Long', '2020-09-05 00:02:02', 1, 5);

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
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_detail_images`
--

CREATE TABLE `tbl_detail_images` (
  `id_detail_image` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `sub_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ảnh sản phẩm liên quan',
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_detail_images`
--

INSERT INTO `tbl_detail_images` (`id_detail_image`, `id_product`, `sub_image`, `create_at`, `status`) VALUES
(10, 24, 'boA.jpg', '2020-08-31 11:21:40', 1),
(11, 24, 'boB.jpg', '2020-08-31 11:21:40', 1),
(12, 24, 'boC.jpg', '2020-08-31 11:21:49', 1),
(13, 34, 'vaiA.jpg\r\n', '2020-09-01 08:51:09', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_detail_news`
--

CREATE TABLE `tbl_detail_news` (
  `id_detail_new` int(11) NOT NULL,
  `id_news` int(11) NOT NULL,
  `sub_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ảnh liên quan blog',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_detail_news`
--

INSERT INTO `tbl_detail_news` (`id_detail_new`, `id_news`, `sub_image`, `created_at`, `status`) VALUES
(1, 1, 'anh1.jpg', '2020-09-05 11:48:12', 1);

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
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `point` tinyint(4) DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_members`
--

INSERT INTO `tbl_members` (`id_member`, `name`, `email`, `phone`, `password`, `address`, `point`, `create_at`, `status`) VALUES
(168, 'Nguyễn Duy Hoàng', 'duyhoangpt998@gmail.com', '', '1 ', '', 1, '2020-09-03 16:57:59', 0),
(169, 'Nguyễn Duy Hoàng', 'duyhoangpt998@gmail.com', '', '1 ', '', NULL, '2020-09-03 16:57:59', 1),
(170, 'Nguyễn Duy Hoàng', 'duyhoangpt998@gmail.com', '', '1 ', '', NULL, '2020-09-03 16:57:59', 1),
(171, 'Nguyễn Duy Hoàng', 'duyhoangpt998@gmail.com', '', '1 ', '', 1, '2020-09-03 16:57:59', 0),
(172, 'Nguyễn Duy Hoàng', 'duyhoangpt998@gmail.com', '', '1 ', '', NULL, '2020-09-03 16:57:59', 1),
(173, 'Nguyễn Duy Hoàng', 'duyhoangpt998@gmail.com', '', '1 ', '', NULL, '2020-09-03 16:57:59', 1),
(174, 'Nguyễn Duy Hoàng', 'duyhoangpt998@gmail.com', '', '1 ', '', 1, '2020-09-03 16:57:59', 0),
(175, 'Nguyễn Duy Hoàng', 'duyhoangpt998@gmail.com', '', '1 ', '', NULL, '2020-09-03 16:57:59', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id_news` int(11) NOT NULL,
  `id_category_new` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `main_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ảnh chính blog',
  `description` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'mô tả',
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_news`
--

INSERT INTO `tbl_news` (`id_news`, `id_category_new`, `title`, `main_image`, `description`, `create_at`, `status`) VALUES
(1, 1, 'Công nghệ số 2020', 'abc.jpg', 'Halu', '2020-09-05 11:47:39', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id_order` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'lời nhắn',
  `pinCode` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mã Pin',
  `ship_method` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'phương thức vận chuyển',
  `payl_method` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'phương thức thanh toán',
  `date_order` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'ngày mua',
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_products`
--

INSERT INTO `tbl_products` (`id_product`, `id_category`, `id_brand`, `product_name`, `origin`, `main_image`, `second_image`, `price`, `quantity`, `mass`, `description`, `classify`, `sale`, `price_sale`, `create_at`, `status`) VALUES
(24, 1, 4, 'Bơ cloudy hàn quốc', 'Hàn Quốc', 'bo.jpg', 'bo.jpg', 120000, 0, '1kg', 'Bơ (danh pháp hai phần: Persea americana) là một loại cây cận nhiệt đới có nguồn gốc từ México và Trung Mỹ, được phân loại thực vật có hoa, hai lá mầm, và cũng vì thế mà hàn quốc ở busan đã nghiên cứu ra nông trại trông hàng ngàn hecta bơ đem ra những sản phẩm ngon nhất.', 'Bơ', NULL, NULL, '2020-08-25 21:21:58', 1),
(25, 1, 4, 'Cam nhót điện biên', 'Điện Biên', 'cam.jpg', 'cam.jpg', 65000, 0, '1kg', 'Cam nhót là loại hoa quả được xếp vào bậc xa xỉ nhất ở điện biên từ nhũng năm 2010, quả cam nhót có hình dạng màu vàng tươi kèm theo đó là thân hình giống trái nhót. quả có vị ngọt thanh mang hương vị tươi ngon và bổ dưỡng, cam nhót được trồng chủ yếu ở cánh đồng mường thanh.', 'Cam', NULL, NULL, '2020-08-25 21:21:58', 1),
(26, 1, 4, 'Dâu ta ninh thuận', 'Ninh thuận', 'dauta.jpg', 'dauta.jpg', 57000, 0, '100g', 'Dâu ta được trồng phổ biến ở ninh thuận, quả ban đầu có màu đỏ , khi chín chúng có màu tím đậm, dâu ta được thu hoạch vào tháng 8, thời gian thu hoạch rất ngắn nên khi đúng lúc chín bà con sẽ thu hoạch luôn trong tháng đó để tránh hỏng , dâu ta có hương vị ngọt lịm.', 'Dâu ta', NULL, NULL, '2020-08-25 21:28:04', 1),
(27, 1, 4, 'Dưa lưới sài gòn', 'Sài gòn', 'dualuoi.jpg', 'dualuoi.jpg', 140000, 30, '1kg', '	\r\nQuả hình tròn, khi chín ngả màu vàng và có các đường gân trắng đan xen như lưới. Trọng lượng trung bình từ 1.5-2.5kg/quả', 'Dưa ', NULL, NULL, '2020-08-25 21:28:04', 1),
(28, 1, 4, 'Lê Forelle Nam Phi', 'Nam Phi', 'le.jpg', 'le.jpg', 110000, 20, '1kg', 'Lê Forelle Nam Phi hay còn gọi là  Lê đỏ vàng Nam Phi, rất dễ nhận biết vì có 3 màu đặc trưng là Xanh – Đỏ - Vàng xen kẽ nhau rất đẹp và có hình dáng phía trên thì thon dài, phía dưới hơi bầu tròn giống giọt nước, nhìn qua trông giống như trái hồ lô của Việt Nam. Trọng lượng trung bình mỗi quả từ 200g đến 300g.', 'Lê', 10, NULL, '2020-08-25 21:33:30', 1),
(29, 1, 4, 'Mít tổ nữ ', 'Hà Giang', 'mit.jpg', 'mit.jpg', 87000, 30, '1kg', 'Cây mít thuộc loại cây gỗ nhỡ cao từ 8 đến 15 m. Cây mít ra quả sau ba năm tuổi và quả của nó là loại quả phức, ăn được. Mít được coi là loại cây ăn trái với quả chín lớn nhất lớn trong các loài thảo mộc. Mít có giá trị thương mại. Mỗi trái khá lớn hình bầu dục kích thước 30–60 cm x 20–30 cm. Vỏ mít sù sì, có gai nhỏ. Mít ra quả vào khoảng giữa mùa xuân và chín vào cuối mùa hè (tháng 7-8).', 'Mít', 5, NULL, '2020-08-25 21:33:30', 1),
(30, 1, 4, 'Ổi Bo', 'Cao Lãnh - Đồng Tháp', 'oi.jpg', 'oi.jpg', 57000, 20, '1kg', 'Cây ổi nhỏ hơn cây vải, nhãn, cao nhiều nhất 10m, đường kính thân tối đa 30 cm. \r\nThân cây chắc, khỏe, ngắn vì phân cành sớm. Thân nhẵn nhụi rất ít bị sâu đục, vỏ già có thể tróc ra từng mảng phía dưới lại có một lượt vỏ mới cũng nhẵn, màu xám, hơi xanh. Cành non 4 cạnh, khi già mới tròn dần, lá đối xứng.', 'Ổi', 5, NULL, '2020-08-25 21:35:43', 1),
(31, 1, 4, 'Sung Mỹ', 'NewYork', 'sungmy.jpg', 'sungmy.jpg', 120000, 50, '1kg', 'Sung mỹ là loại quả khó trồng nhất đặc biệt ở các vùng đông nam á, loại quả này được trồng phổ biến ở phía tây đại lộ 5a NewYork, nó có vị ngọt như mật ong rừng và cảm giác ấm cúng bên gia đình, loại quả này thường được biếu tặng vào những dịp noel.', 'Sung', NULL, NULL, '2020-08-25 21:40:30', 1),
(32, 1, 4, 'Táo envy', 'New Zealand', 'tao.jpg', 'tao.jpg', 135000, 25, '1kg', 'Có xuất xứ chính gốc là từ New Zealand, Envy thực sự đã khiến cho rất nhiều loại táo khác cùng một học phải ganh tị với mình rất nhiều. Mặc dù có nguồn gốc từ New Zealand, tuy nhiên hiện nay, nó được trồng nhiều nhất ở những khu vực như Mỹ và Chile, … Mùa thu hoạch chính của  loại táo này thường là từ tháng 10 cho đến tháng 3 năm sau.', 'Táo', NULL, NULL, '2020-08-25 21:40:30', 1),
(33, 1, 4, 'Thanh Long', 'Tiền Giang', 'thanhlong.jpg', 'thanhlong.jpg', 84000, 45, '1kg', 'Loại ruột trắng vỏ hồng hay đỏ được trồng rộng rãi ở các tỉnh như Bình Thuận, Long An, Tiền Giang v.v. Loại ruột đỏ vỏ đỏ được nghiên cứu và lai tạo bởi Viện Cây Ăn Quả Miền Nam SOFRI (ấp Đông, xã Long Định,huyện Châu Thành,tỉnh Tiền Giang) hiện nay đã được trồng rộng rãi và phổ biến khắp các tỉnh tập trung ở Bình Thuận, Tiền Giang,Long An,...Bên cạnh đó hiện nay giống thanh long ruột tím hồng cũng được nghiên cứu và lai tạo bởi Viện Cây Ăn Quả Miền Nam cũng đã được đưa vào trồng đại trà.', 'Thanh Long', 5, NULL, '2020-08-25 21:47:00', 1),
(34, 1, 4, 'Vải thiều Bắc Giang', 'Bắc Giang', 'vai.jpg', 'vai.jpg', 45000, 100, '1kg', 'Vải thiều đóng lon được dùng pha chế món trà vải và được xem là một trong những món thanh nhiệt và được ưa chọn của giới trẻ hiện nay. Trà vải đang là thực đơn ưa thích tại các chuỗi đồ uống lớn như: Highlands Coffee, The Coffee House, Phúc Long… và rất nhiều cửa hiệu tea shop khác bởi nó thơm ngon, hợp khẩu vị người Việt và tốt cho sức khỏe.\r\n\r\nVị thơm ngon của trà, vị thơm của vải thiều, giòn ngọt của trái vải và đặc biệt là có thể phối thêm những nguyên liệu khác tạo nên gu riêng cho từng nơi.', 'Vải', 10, NULL, '2020-08-25 21:47:00', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_ratings`
--

CREATE TABLE `tbl_ratings` (
  `id_rating` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `rate` tinyint(1) DEFAULT NULL COMMENT 'vote sản phẩm',
  `description` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'mô tả',
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slides`
--

CREATE TABLE `tbl_slides` (
  `id_slide` int(11) NOT NULL,
  `slide_title` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tiều đề slider',
  `slide_content` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nội dung slider',
  `slide_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Ảnh slide',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'phân quyền',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `name`, `email`, `phone`, `password`, `role`, `status`, `address`, `create_at`) VALUES
(1, 'Nguyễn Duy Hoàng', 'jannguyen@gmail.com', '0972853498', 'Hoanglol2', 3, 1, 'Điện Biên Phủ', '2020-09-04 16:36:57');

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
-- Chỉ mục cho bảng `tbl_members`
--
ALTER TABLE `tbl_members`
  ADD PRIMARY KEY (`id_member`);

--
-- Chỉ mục cho bảng `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`id_news`),
  ADD KEY `fk_id_cate_new_tbl_news_cate_new` (`id_category_new`);

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
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tbl_category_news`
--
ALTER TABLE `tbl_category_news`
  MODIFY `id_category_new` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_category_products`
--
ALTER TABLE `tbl_category_products`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_detail_images`
--
ALTER TABLE `tbl_detail_images`
  MODIFY `id_detail_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tbl_detail_news`
--
ALTER TABLE `tbl_detail_news`
  MODIFY `id_detail_new` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT cho bảng `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `tbl_ratings`
--
ALTER TABLE `tbl_ratings`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_slides`
--
ALTER TABLE `tbl_slides`
  MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `fk_id_cate_new_tbl_news_cate_new` FOREIGN KEY (`id_category_new`) REFERENCES `tbl_category_news` (`id_category_new`) ON DELETE NO ACTION ON UPDATE CASCADE;

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
