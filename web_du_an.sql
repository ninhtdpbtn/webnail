-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2020 at 06:57 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_du_an`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `name_booking` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_booking` int(11) NOT NULL,
  `image_booking` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_booking` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `time_booking` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_booking` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_booking` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_product`
--

CREATE TABLE `booking_product` (
  `id_booking` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_expert` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 : Đơn đặt lịch\r\n2 : Đơn đặt lịch hoàn thành\r\n3 : Đơn đặt lịch đã hủy\r\n4 : Đơn đặt lịch hoàn thành đã xóa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_news`
--

CREATE TABLE `category_news` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_news`
--

INSERT INTO `category_news` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'bog', 0, '2020-09-12 04:24:37', '2020-09-12 05:02:40'),
(2, 'mẹo vặt', 0, '2020-09-12 04:24:37', '2020-09-12 04:51:08');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Dịch vụ nail', '2020-09-08 01:35:56', '2020-09-10 13:28:30'),
(2, 'Mẫu nail hot', '2020-09-08 01:35:56', '2020-09-08 01:36:23'),
(6, 'Combo', '2020-09-10 13:43:20', '2020-09-11 03:12:39');

-- --------------------------------------------------------

--
-- Table structure for table `expert`
--

CREATE TABLE `expert` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expert`
--

INSERT INTO `expert` (`id`, `name`, `location`, `avatar`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Thị Phương Thảo', 'Chuyên Gia', '/uploads/8U9A3966-8720-1555557964.jpg', 0, '2020-09-08 01:42:06', '2020-09-12 03:53:55'),
(2, 'Nguyễn Phương Nhi', 'Chuyên Gia', '/uploads/4.jpg', 0, '2020-09-08 01:42:06', '2020-09-12 03:53:59'),
(3, 'Ngô Hồng Nhung', 'Chuyên Gia', '/uploads/5.jpg', 0, '2020-09-08 01:42:06', '2020-09-12 03:54:06');

-- --------------------------------------------------------

--
-- Table structure for table `expert_product`
--

CREATE TABLE `expert_product` (
  `id_product` int(11) NOT NULL,
  `id_expert` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lien_he`
--

CREATE TABLE `lien_he` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` int(255) NOT NULL,
  `detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lien_he`
--

INSERT INTO `lien_he` (`id`, `name`, `email`, `phone`, `detail`, `status`, `created_at`, `updated_at`) VALUES
(96, 'Dương Văn Ninh', NULL, 334589123, 'Xin hãy điền thông tin và lời nhắn của bạn vào biểu mẫu dưới đây\r\nQuyên Beauty sẽ liên hệ lại với bạn trong thời gian nhanh nhất.', 3, '2020-09-15 03:34:15', '2020-09-15 03:57:19'),
(97, 'Dương Văn Ninh', NULL, 334589123, 'Xin hãy điền thông tin và lời nhắn của bạn vào biểu mẫu dưới đây\r\nQuyên Beauty sẽ liên hệ lại với bạn trong thời gian nhanh nhất.', 2, '2020-09-15 03:34:57', '2020-09-15 03:56:39'),
(98, 'Dương Văn Ninh', NULL, 334589123, 'Xin hãy điền thông tin và lời nhắn của bạn vào biểu mẫu dưới đây\r\nQuyên Beauty sẽ liên hệ lại với bạn trong thời gian nhanh nhất.', 2, '2020-09-15 03:46:40', '2020-09-15 03:56:44');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(150) NOT NULL,
  `short_title` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_category_news` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `details`, `image`, `status`, `short_title`, `slug`, `id_category_news`, `created_at`, `updated_at`) VALUES
(1, 'Làm nail là gì? Nên làm nail kiểu nào không hại da mà lại đẹp xuất sắc?', '<p>Những mẫu nail trơn, vẽ hoa, đ&iacute;nh đ&aacute;&hellip; lu&ocirc;n l&agrave; những mẫu được ưa chuộng v&agrave; l&agrave;m nhiều. Tuy nhi&ecirc;n trước khi l&agrave;m m&oacute;ng, bạn phải hiểu được l&agrave;m nail l&agrave; như thế n&agrave;o? Quy tr&igrave;nh l&agrave;m nail ra sao v&agrave; kiểu nail n&agrave;o ph&ugrave; hợp với bạn? Để bạn hiểu r&otilde; hơn về lĩnh vực l&agrave;m đẹp n&agrave;y,&nbsp;<strong><a href=\"https://tadilamdep.vn/\" rel=\"noopener noreferrer\" target=\"_blank\">Tadilamdep.vn</a></strong>&nbsp;sẽ cung cấp những th&ocirc;ng tin đầy đủ nhất, tốt nhất tới bạn.</p>\r\n\r\n<h2><strong>1. L&agrave;m nail l&agrave; g&igrave;?</strong></h2>\r\n\r\n<p>Nail l&agrave; thuật ngữ tiếng Anh v&agrave; tiếng Việt c&oacute; nghĩa l&agrave; l&agrave;m m&oacute;ng tay, m&oacute;ng ch&acirc;n. L&agrave;m nail l&agrave; một trong lĩnh vực l&agrave;m đẹp, cụ thể bạn sẽ được chăm s&oacute;c m&oacute;ng của m&igrave;nh tốt nhất. Khi l&agrave;m m&oacute;ng bạn sẽ được cắt tỉa m&oacute;ng, chăm s&oacute;c m&oacute;ng, sơn sửa m&oacute;ng tay, m&oacute;ng ch&acirc;n với nhiều kiểu kh&aacute;c nhau, t&ugrave;y &yacute; th&iacute;ch.</p>\r\n\r\n<p>Hiện nay, bạn c&oacute; thể l&agrave;m m&oacute;ng với nhiều sự lựa chọn như loại sơn thường, sơn gel&hellip;. Hay sơn m&oacute;ng trơn, sơn vẽ họa tiết, sơn đ&iacute;nh đ&aacute; &hellip; Mỗi kiểu nail sẽ gi&uacute;p bạn c&oacute; phong c&aacute;ch ri&ecirc;ng, nổi bật được t&iacute;nh c&aacute;ch v&agrave; sở th&iacute;ch của bạn.</p>\r\n\r\n<h2><strong>2. L&agrave;m nail c&oacute; lợi &iacute;ch g&igrave;? C&oacute; hại tới da kh&ocirc;ng?</strong></h2>\r\n\r\n<h3><strong>2.1. Lợi &iacute;ch của l&agrave;m nail&nbsp;</strong></h3>\r\n\r\n<ul>\r\n	<li>Gi&uacute;p bạn c&oacute; những m&oacute;ng tay, m&oacute;ng ch&acirc;n xinh, đẹp, c&aacute; t&iacute;nh hoặc dễ thương.&nbsp;</li>\r\n	<li>Che khuyết điểm ở m&oacute;ng tay, m&oacute;ng ch&acirc;n một c&aacute;ch dễ d&agrave;ng, đẹp.</li>\r\n	<li>L&agrave;m m&oacute;ng sẽ gi&uacute;p bạn đẹp hơn, sang hơn khi kết hợp với những bộ đầm, v&aacute;y hoặc quần jean.</li>\r\n	<li>Gi&uacute;p bạn tự tin, năng động hơn.</li>\r\n	<li>Ng&oacute;n ch&acirc;n, ng&oacute;n tay của bạn nh&igrave;n sẽ thon, d&agrave;i đẹp hơn.<img alt=\"Móng tay đẹp\" height=\"663\" sizes=\"(max-width: 780px) 100vw, 780px\" src=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-1.jpg\" srcset=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-1.jpg 780w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-1-300x255.jpg 300w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-1-768x653.jpg 768w\" width=\"780\" />\r\n	<p>L&agrave;m m&oacute;ng gi&uacute;p tay bạn đẹp, xinh hơn</p>\r\n	</li>\r\n</ul>\r\n\r\n<h3><strong>2.2. L&agrave;m nail c&oacute; hại da kh&ocirc;ng?</strong></h3>\r\n\r\n<p>Khi l&agrave;m m&oacute;ng l&agrave; bạn đ&atilde; tiếp x&uacute;c với h&oacute;a chất từ sơn m&agrave;u, sơn b&oacute;ng, sơn dưỡng hoặc bột đắp m&oacute;ng, keo d&iacute;nh gắn đ&aacute;&hellip; Những h&oacute;a chất đ&oacute; &iacute;t nhiều cũng l&agrave;m ảnh hưởng đến da của bạn. Tuy nhi&ecirc;n, trong qu&aacute; tr&igrave;nh l&agrave;m nail bạn c&oacute; thể đeo khẩu trang y tế. Bạn tr&aacute;nh dũa m&oacute;ng, cắt tỉa phần da qu&aacute; nhiều hoặc thay đổi m&agrave;u sơn m&oacute;ng li&ecirc;n tục trong thời gian ngắn.&nbsp;</p>\r\n\r\n<p>Nếu l&agrave;m m&oacute;ng trong thời gian c&aacute;ch nhau khoảng 1 &ndash; 2 th&aacute;ng v&agrave; thực hiện đ&uacute;ng c&aacute;c lưu &yacute; tr&ecirc;n th&igrave; sơn m&oacute;ng kh&ocirc;ng ảnh hưởng g&igrave; nhiều đến da bạn.</p>\r\n\r\n<p>Xem th&ecirc;m:&nbsp;<strong><a href=\"https://tadilamdep.vn/nail/luu-huynh-nail-co-doc-khong-luu-y-gi-khi-su-dung-luu-huynh-lam-mong.html\" rel=\"noopener noreferrer\" target=\"_blank\">Lưu huỳnh nail c&oacute; độc kh&ocirc;ng? Lưu &yacute; g&igrave; khi sử dụng lưu huỳnh l&agrave;m m&oacute;ng?</a></strong></p>\r\n\r\n<h2><strong>3. Gợi &yacute; c&aacute;c kiểu nail vừa đẹp lại &iacute;t hại tới da&nbsp;</strong></h2>\r\n\r\n<p>L&agrave;m nail sẽ gi&uacute;p bạn c&oacute; bộ m&oacute;ng xinh, bắt mắt hơn. Tuy nhi&ecirc;n bạn n&ecirc;n c&acirc;n nhắc v&agrave; chọn những kiểu nail &iacute;t g&acirc;y ảnh hưởng tới da như sau:</p>\r\n\r\n<h3><strong>3.1. Kiểu nail trơn</strong></h3>\r\n\r\n<p>Kiểu nail n&agrave;y kh&aacute; đơn giản, kh&ocirc;ng cầu kỳ. L&agrave;m m&oacute;ng sơn trơn chỉ sử dụng sơn dưỡng, sơn nền (sơn m&agrave;u) v&agrave; sơn phủ (sơn b&oacute;ng). Thời gian l&agrave;m m&oacute;ng kh&aacute; nhanh gọn. Do đ&oacute;, gi&uacute;p bạn hạn chế sử dụng c&aacute;c loại h&oacute;a chất c&oacute; thể g&acirc;y hại da.</p>\r\n\r\n<p>M&agrave;u sơn trơn thường được d&ugrave;ng l&agrave; loại sơn thường hoặc sơn gel. Nhưng tốt nhất bạn n&ecirc;n sơn sơn thường để giảm t&aacute;c động của h&oacute;a chất. Sơn gel c&oacute; độ b&aacute;m d&iacute;nh, bền m&agrave;u nhưng khả năng ảnh hưởng tới da sẽ nhiều hơn.</p>\r\n\r\n<p><img alt=\"Làm nail đẹp\" height=\"550\" sizes=\"(max-width: 780px) 100vw, 780px\" src=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-2.jpg\" srcset=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-2.jpg 780w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-2-300x212.jpg 300w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-2-768x542.jpg 768w\" width=\"780\" /></p>\r\n\r\n<p>Kiểu nail trơn vừa đơn giản, đẹp lại kh&ocirc;ng hại da</p>\r\n\r\n<p>Với kiểu l&agrave;m m&oacute;ng th&ocirc;ng thường n&agrave;y, bạn cũng kh&ocirc;ng cần d&ugrave;ng đến đ&egrave;n sấy. V&igrave; theo c&aacute;c b&aacute;c sĩ, sử dụng c&aacute;c loại đ&egrave;n UV v&agrave; đ&egrave;n LED nhiều sẽ l&agrave;m tăng khả năng ung thư da.</p>\r\n\r\n<h3><strong>3.2. Kiểu l&agrave;m nail vẽ họa tiết</strong></h3>\r\n\r\n<p>Kiểu nail n&agrave;y sẽ th&ecirc;m bước vẽ họa tiết l&ecirc;n m&oacute;ng sau khi sơn sơn nền xong. Họa tiết sẽ c&oacute; c&aacute;c kiểu như vẽ hoa, l&aacute;, con vật, chữ c&aacute;i, h&igrave;nh khối&hellip; bằng c&aacute;c m&agrave;u sơn kh&aacute;c nhau. C&aacute;c mẫu nail n&agrave;y &iacute;t sử dụng chất b&aacute;m d&iacute;nh, tạo m&agrave;u sẽ an to&agrave;n hơn.</p>\r\n\r\n<p>Bạn n&ecirc;n chọn những mẫu họa tiết nhẹ nh&agrave;ng, &iacute;t họa tiết gi&uacute;p m&oacute;ng thanh mảnh, đẹp, kh&ocirc;ng ảnh hưởng đến da.</p>\r\n\r\n<p><img alt=\"Mẫu nail đẹp\" height=\"500\" sizes=\"(max-width: 780px) 100vw, 780px\" src=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-3.jpg\" srcset=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-3.jpg 780w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-3-300x192.jpg 300w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-3-768x492.jpg 768w\" width=\"780\" /></p>\r\n\r\n<p>Mẫu nail họa tiết sẽ tạo n&ecirc;n điểm nhấn cho m&oacute;ng v&agrave; cũng kh&ocirc;ng g&acirc;y hại cho da</p>\r\n\r\n<h2><strong>4. Chi ph&iacute; l&agrave;m nail từng mẫu như thế n&agrave;o?</strong></h2>\r\n\r\n<ul>\r\n	<li>T&ugrave;y mỗi loại, kiểu l&agrave;m m&oacute;ng sẽ c&oacute; mức gi&aacute; kh&aacute;c nhau, cụ thể như sau:</li>\r\n	<li>Sơn gel trơn: Gi&aacute; giao động từ 100 &ndash; 150 ng&agrave;n đồng. Đ&acirc;y l&agrave; mẫu nail c&oacute; mức gi&aacute; thấp nhất.</li>\r\n	<li>Sơn đắp gel cao cấp: Mức gi&aacute; giao động từ 200 &ndash; 350 ng&agrave;n đồng. Loại nail n&agrave;y c&oacute; mức gi&aacute; trung b&igrave;nh, giữ m&agrave;u l&acirc;u, m&oacute;ng đẹp.</li>\r\n	<li>Đắp m&oacute;ng bột, đ&iacute;nh đ&aacute;: Gi&aacute; từ 150 &ndash; 350 ng&agrave;n đồng.</li>\r\n	<li>Đắp m&oacute;ng lụa: C&oacute; mức gi&aacute; kh&aacute; cao từ 500 ng&agrave;n đồng trở l&ecirc;n. Mẫu nail n&agrave;y sẽ nối c&aacute;c m&oacute;ng giả nh&igrave;n rất tự nhi&ecirc;n, đẹp mắt.</li>\r\n</ul>\r\n\r\n<h2><strong>5. Quy tr&igrave;nh l&agrave;m nail tại tiệm như thế n&agrave;o?</strong></h2>\r\n\r\n<p>Kh&aacute;c với l&agrave;m nail tại nh&agrave;, khi tới tiệm bạn sẽ được chăm s&oacute;c cẩn thận, tốt hơn. Quy tr&igrave;nh l&agrave;m m&oacute;ng ở tiệm sẽ gồm 6 bước cơ bản để bạn c&oacute; bộ m&oacute;ng xinh, kh&ocirc;ng ảnh hưởng tới da:</p>\r\n\r\n<ul>\r\n	<li>Bước 1: Tư vấn mẫu nail đẹp, ph&ugrave; hợp với tay hoặc ch&acirc;n của bạn.</li>\r\n	<li>Bước 2: Xử l&yacute; m&oacute;ng th&ocirc;, ủ m&oacute;ng v&agrave; đưa về trạng th&aacute;i ban đầu.</li>\r\n	<li>Bước 3: Chăm s&oacute;c, vệ sinh, nhặt da quanh m&oacute;ng kỹ c&agrave;ng.</li>\r\n	<li>Bước 4: Sửa m&oacute;ng về d&aacute;ng chuẩn v&agrave; l&agrave;m mịn bề mặt m&oacute;ng, ng&acirc;m tay hoặc ch&acirc;n với nước ấm.</li>\r\n	<li>Bước 5: Sơn gel tạo kiểu ph&ugrave; hợp với m&oacute;ng của bạn.</li>\r\n	<li>Bước 6: Massage bằng c&aacute;c loại kem dưỡng da từ tự nhi&ecirc;n để dưỡng m&oacute;ng tốt nhất.<img alt=\"Quy trình làm nail\" height=\"502\" sizes=\"(max-width: 780px) 100vw, 780px\" src=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-4.jpg\" srcset=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-4.jpg 780w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-4-300x193.jpg 300w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-4-768x494.jpg 768w\" width=\"780\" />\r\n	<p>Quy tr&igrave;nh l&agrave;m nail ở tiệm cầu kỳ, cẩn thận hơn</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2><strong>6. Sau khi l&agrave;m m&oacute;ng cần lưu &yacute; g&igrave;?</strong></h2>\r\n\r\n<p>Để m&oacute;ng của bạn đẹp, giữ được m&agrave;u l&acirc;u, kh&ocirc;ng bong tr&oacute;c bạn n&ecirc;n lưu &yacute; c&aacute;c vấn đề cơ bản như sau:</p>\r\n\r\n<ul>\r\n	<li>Sử dụng c&aacute;c loại nước đ&aacute;nh b&oacute;ng m&oacute;ng tay gi&uacute;p bảo vệ m&oacute;ng v&agrave; gi&uacute;p m&oacute;ng mọc tốt hơn. Duy tr&igrave; trong thời gian từ 1 &ndash; 2 th&aacute;ng.</li>\r\n	<li>D&ugrave;ng kem dưỡng m&oacute;ng nhiều th&agrave;nh phần vitamin E mỗi tối.</li>\r\n	<li>Ng&acirc;m m&oacute;ng tay trong dầu oliu 10 ph&uacute;t mỗi ng&agrave;y v&agrave; tuần l&agrave;m 2 lần.</li>\r\n	<li>D&ugrave;ng găng tay khi l&agrave;m c&aacute;c việc như rửa b&aacute;t, giặt quần &aacute;o, dọn đồ&hellip; để tr&aacute;nh m&oacute;ng bị xước, bong tr&oacute;c m&oacute;ng.</li>\r\n	<li>Bổ sung c&aacute;c thực phẩm gi&agrave;u biotin gi&uacute;p m&oacute;ng cứng khỏe hơn như bơ, s&uacute;p lơ, ngũ cốc nguy&ecirc;n hạt&hellip;</li>\r\n	<li>Vệ sinh m&oacute;ng thường xuy&ecirc;n, tr&aacute;nh để m&oacute;ng bị bẩn.</li>\r\n</ul>\r\n\r\n<h2><strong>7. Gợi &yacute; 20 mẫu m&oacute;ng tay xu hướng 2020 n&agrave;ng n&agrave;o nh&igrave;n cũng m&ecirc;</strong></h2>\r\n\r\n<p>Nếu bạn chưa biết n&ecirc;n l&agrave;m m&oacute;ng tay kiểu n&agrave;o hợp xu hướng l&agrave;m nail 2020 m&agrave; vừa đẹp, ph&ugrave; hợp với m&igrave;nh bạn c&oacute; thể tham khảo c&aacute;c mẫu sau:</p>\r\n\r\n<p><img alt=\"Mẫu nail đẹp\" height=\"558\" sizes=\"(max-width: 780px) 100vw, 780px\" src=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-5.jpg\" srcset=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-5.jpg 780w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-5-300x215.jpg 300w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-5-768x549.jpg 768w\" width=\"780\" /></p>\r\n\r\n<p>Mẫu 1 &ndash; Kiểu nail đ&iacute;nh đ&aacute; v&agrave; hoa ở 2 ng&oacute;n giữa gi&uacute;p tay bạn nổi bật hơn</p>\r\n\r\n<p><img alt=\"Bộ nail đẹp\" height=\"640\" sizes=\"(max-width: 780px) 100vw, 780px\" src=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-6.jpg\" srcset=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-6.jpg 780w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-6-300x246.jpg 300w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-6-768x630.jpg 768w\" width=\"780\" /></p>\r\n\r\n<p>Mẫu 2 &ndash; Bộ m&oacute;ng kết hợp 2 m&agrave;u sơn với nhau v&agrave; vẽ họa tiết dễ thương rất ph&ugrave; hợp với c&ocirc; n&agrave;ng nhẹ nh&agrave;ng, mơ mộng</p>\r\n\r\n<p><img alt=\"Mẫu nail trơn\" height=\"502\" sizes=\"(max-width: 780px) 100vw, 780px\" src=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-7.jpg\" srcset=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-7.jpg 780w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-7-300x193.jpg 300w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-7-768x494.jpg 768w\" width=\"780\" /></p>\r\n\r\n<p>Mẫu 3 &ndash; Nail trơn lu&ocirc;n ph&ugrave; hợp với mọi thời đại, nhẹ nh&agrave;ng, đẹp thanh tho&aacute;t.</p>\r\n\r\n<p><img alt=\"Mẫu nail hoa \" height=\"480\" sizes=\"(max-width: 780px) 100vw, 780px\" src=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-8.jpg\" srcset=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-8.jpg 780w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-8-300x185.jpg 300w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-8-768x473.jpg 768w\" width=\"780\" /></p>\r\n\r\n<p>Mẫu 4 &ndash; Kiểu l&agrave;m m&oacute;ng đ&iacute;nh hoa to gi&uacute;p bạn nổi bật, thu h&uacute;t mọi &aacute;nh nh&igrave;n.</p>\r\n\r\n<p><img alt=\"Móng đẹp\" height=\"565\" sizes=\"(max-width: 780px) 100vw, 780px\" src=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-9.jpg\" srcset=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-9.jpg 780w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-9-300x217.jpg 300w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-9-768x556.jpg 768w\" width=\"780\" /></p>\r\n\r\n<p>Mẫu 5 &ndash;&nbsp; Bộ m&oacute;ng đẹp ph&ugrave; hợp với c&aacute;c n&agrave;ng d&acirc;u</p>\r\n\r\n<p><img alt=\"Làm nail\" height=\"500\" sizes=\"(max-width: 780px) 100vw, 780px\" src=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-10.jpg\" srcset=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-10.jpg 780w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-10-300x192.jpg 300w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-10-768x492.jpg 768w\" width=\"780\" /></p>\r\n\r\n<p>Mẫu 6 &ndash; Sử dụng hạt ngọc đ&iacute;nh v&agrave;o m&oacute;ng gi&uacute;p tay bạn nh&igrave;n sang, lung linh hơn.</p>\r\n\r\n<p><img alt=\"Làm nail đẹp\" height=\"600\" sizes=\"(max-width: 780px) 100vw, 780px\" src=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-11.jpg\" srcset=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-11.jpg 780w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-11-300x231.jpg 300w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-11-768x591.jpg 768w\" width=\"780\" /></p>\r\n\r\n<p>Mẫu 7 &ndash; Tạo điểm nhấn với bộ m&oacute;ng trơn bằng 1 m&oacute;ng đ&iacute;nh k&iacute;n đ&aacute;.</p>\r\n\r\n<p><img alt=\"Mẫu nail caro\" height=\"400\" sizes=\"(max-width: 780px) 100vw, 780px\" src=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-12.jpg\" srcset=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-12.jpg 780w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-12-300x154.jpg 300w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-12-768x394.jpg 768w\" width=\"780\" /></p>\r\n\r\n<p>Mẫu 8 &ndash; Vẽ họa tiết caro hoặc đ&iacute;nh đ&aacute; sẽ gi&uacute;p m&oacute;ng bạn nổi bật hơn.</p>\r\n\r\n<p><img alt=\"Làm nail đẹp\" height=\"600\" sizes=\"(max-width: 780px) 100vw, 780px\" src=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-13.jpg\" srcset=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-13.jpg 780w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-13-300x231.jpg 300w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-13-768x591.jpg 768w\" width=\"780\" /></p>\r\n\r\n<p>Mẫu 9 &ndash; Sử dụng sơn m&agrave;u đậm v&agrave; đ&iacute;nh đ&aacute; v&agrave;o 1 v&agrave;i m&oacute;ng tay l&agrave; sự xu hướng l&agrave;m m&oacute;ng 2020.</p>\r\n\r\n<p><img alt=\"Mẫu móng đẹp\" height=\"500\" sizes=\"(max-width: 780px) 100vw, 780px\" src=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-14.jpg\" srcset=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-14.jpg 780w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-14-300x192.jpg 300w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-14-768x492.jpg 768w\" width=\"780\" /></p>\r\n\r\n<p>Mẫu 10 &ndash; Mẫu m&oacute;ng n&agrave;y ph&ugrave; hợp với c&aacute;c c&ocirc; n&agrave;ng c&aacute; t&iacute;nh, c&oacute; ch&uacute;t nổi loạn.</p>\r\n\r\n<p><img alt=\"Làm nail đẹp\" height=\"500\" sizes=\"(max-width: 780px) 100vw, 780px\" src=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-15.jpg\" srcset=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-15.jpg 780w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-15-300x192.jpg 300w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-15-768x492.jpg 768w\" width=\"780\" /></p>\r\n\r\n<p>Mẫu 11 &ndash; Th&ecirc;m họa tiết hoa nhẹ nh&agrave;ng gi&uacute;p tay thanh mảnh hơn.</p>\r\n\r\n<p><img alt=\"Mẫu nail đẹp\" height=\"564\" sizes=\"(max-width: 780px) 100vw, 780px\" src=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-16.jpg\" srcset=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-16.jpg 780w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-16-300x217.jpg 300w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-16-768x555.jpg 768w\" width=\"780\" /></p>\r\n\r\n<p>Mẫu 12 &ndash; Họa tiết vũ trụ, bầu trời ph&ugrave; hợp với c&ocirc; n&agrave;ng c&oacute; ch&uacute;t huyền b&iacute;</p>\r\n\r\n<p><img alt=\"Làm nail đẹp \" height=\"654\" sizes=\"(max-width: 780px) 100vw, 780px\" src=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-17.jpg\" srcset=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-17.jpg 780w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-17-300x252.jpg 300w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-17-768x644.jpg 768w\" width=\"780\" /></p>\r\n\r\n<p>Mẫu 13 &ndash; Sơn &oacute;ng &aacute;nh gi&uacute;p bạn tr&ocirc;ng nhẹ nh&agrave;ng, xinh xắn hơn.</p>\r\n\r\n<p><img alt=\"Mẫu nail nhịp trái tim\" height=\"677\" sizes=\"(max-width: 780px) 100vw, 780px\" src=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-18.jpg\" srcset=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-18.jpg 780w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-18-300x260.jpg 300w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-18-768x667.jpg 768w\" width=\"780\" /></p>\r\n\r\n<p>Mẫu 14 &ndash; Họa tiết nhịp tr&aacute;i tim kh&aacute; th&uacute; vị khi bạn đang y&ecirc;u, thể hiện t&igrave;nh y&ecirc;u với ai đ&oacute;.</p>\r\n\r\n<p><img alt=\"Mẫu nail đính đá\" height=\"600\" sizes=\"(max-width: 780px) 100vw, 780px\" src=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-19.jpg\" srcset=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-19.jpg 780w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-19-300x231.jpg 300w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-19-768x591.jpg 768w\" width=\"780\" /></p>\r\n\r\n<p>Mẫu 15 &ndash; Sơn m&agrave;u nổi v&agrave; đ&iacute;nh đ&aacute; to sẽ gi&uacute;p bạn th&ecirc;m phần c&aacute; t&iacute;nh hơn.</p>\r\n\r\n<p><img alt=\"Làm nail đẹp\" height=\"437\" sizes=\"(max-width: 780px) 100vw, 780px\" src=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-20.jpg\" srcset=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-20.jpg 780w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-20-300x168.jpg 300w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-20-768x430.jpg 768w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-20-390x220.jpg 390w\" width=\"780\" /></p>\r\n\r\n<p>Mẫu 16 &ndash; Kiểu nail n&agrave;y kh&aacute; ph&ugrave; hợp với c&ocirc; n&agrave;ng th&iacute;ch sự đơn giản.</p>\r\n\r\n<p><img alt=\"Làm nail đẹp\" height=\"500\" sizes=\"(max-width: 780px) 100vw, 780px\" src=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-21.jpg\" srcset=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-21.jpg 780w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-21-300x192.jpg 300w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-21-768x492.jpg 768w\" width=\"780\" /></p>\r\n\r\n<p>Mẫu 17 &ndash; Nếu bạn đang c&oacute; &yacute; định đi biển chơi c&oacute; thể sơn mẫu n&agrave;y nh&eacute;.</p>\r\n\r\n<p><img alt=\"Mẫu nail hoạt hình\" height=\"759\" sizes=\"(max-width: 780px) 100vw, 780px\" src=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-22.jpg\" srcset=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-22.jpg 780w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-22-300x292.jpg 300w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-22-768x747.jpg 768w\" width=\"780\" /></p>\r\n\r\n<p>Mẫu 18 &ndash; Kiểu nail hoạt h&igrave;nh ph&ugrave; hợp với c&aacute;c bạn g&aacute;i trẻ trung, tinh nghịch</p>\r\n\r\n<p><img alt=\"Mẫu nail vân đá\" height=\"480\" sizes=\"(max-width: 780px) 100vw, 780px\" src=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-23.jpg\" srcset=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-23.jpg 780w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-23-300x185.jpg 300w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-23-768x473.jpg 768w\" width=\"780\" /></p>\r\n\r\n<p>Mẫu 19 &ndash; Mẫu nail v&acirc;n đ&aacute; n&agrave;y kh&aacute; lạ, ấn tượng bạn n&ecirc;n thử.</p>\r\n\r\n<p><img alt=\"Mẫu nail đầu móng trắng\" height=\"463\" sizes=\"(max-width: 780px) 100vw, 780px\" src=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-24.jpg\" srcset=\"https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-24.jpg 780w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-24-300x178.jpg 300w, https://tadilamdep.vn/wp-content/uploads/2020/02/lam-nail-24-768x456.jpg 768w\" width=\"780\" /></p>\r\n\r\n<p>Mẫu 20 &ndash; Mẫu nail đầu m&oacute;ng trắng n&agrave;y ph&ugrave; hợp với c&ocirc; g&aacute;i đơn giản, nhẹ nh&agrave;ng</p>\r\n\r\n<p>Với những th&ocirc;ng tin bổ &iacute;ch trong b&agrave;i viết, ch&uacute;ng t&ocirc;i hi vọng bạn sẽ hiểu r&otilde; hơn về&nbsp;<strong><a href=\"https://tadilamdep.vn/nail/lam-nail-la-gi-nen-lam-nail-kieu-nao-khong-hai-da-ma-lai-dep-xuat-sac.html\">l&agrave;m nail l&agrave; như thế n&agrave;o</a></strong>? N&ecirc;n lựa chọn kiểu l&agrave;m m&oacute;ng n&agrave;o vừa đẹp, vừa kh&ocirc;ng hại tới da tay nhất. Hy vọng bạn h&atilde;y lựa chọn được mẫu nail đẹp, ph&ugrave; hợp với m&igrave;nh để diện đi tiệc, đi l&agrave;m hoặc đi chơi nh&eacute;!</p>', '/uploads/9fe1cf63847870ec402165f6d0951227.jpg', 1, 'Những mẫu nail trơn, vẽ hoa, đính đá… luôn là những mẫu được ưa chuộng và làm nhiều.', 'lam-nail-la-gi-nen-lam-nail-kieu-nao-khong-hai-da-ma-lai-dep-xuat-sac1', 1, '2020-09-14 07:00:56', '2020-09-14 07:00:56'),
(3, '6 Điều cần nhớ trong nghề làm nail chúng ta cần khắc cốt ghi tâm.', '<h2><strong>Khi l&agrave;m việc h&atilde;y ăn mặc thật gọn g&agrave;ng sạch sẽ</strong></h2>\r\n\r\n<p><img alt=\"nghề làm nail\" height=\"350\" src=\"https://www.kiotviet.vn/wp-content/uploads/2019/09/ngh%E1%BB%81-l%C3%A0m-nail.jpg\" title=\"nghề làm nail\" width=\"760\" /><em>Khi l&agrave;m việc h&atilde;y ăn mặc thật gọn g&agrave;ng sạch sẽ</em></p>\r\n\r\n<p>C&oacute; nhiều người thường thắc mắc kh&ocirc;ng biết khi l&agrave;m tại tiệm nail th&igrave; ăn mặc như thế n&agrave;o? Tự do mặc đồ m&igrave;nh th&iacute;ch hay mặc đồng phục? C&acirc;u trả lời đ&uacute;ng nhất được ghi nhận l&agrave; chỉ cần mặc gọn g&agrave;ng sạch sẽ l&agrave; được. R&otilde; r&agrave;ng bạn kh&ocirc;ng thể để kh&aacute;ch nh&igrave;n thấy bộ dạng &ldquo;xuề x&ograve;a&rdquo; cẩu thả của m&igrave;nh trong khi l&agrave;m c&aacute;i nghề &ldquo;đầy t&iacute;nh nghệ thuật&rdquo; như thế n&agrave;y đ&uacute;ng kh&ocirc;ng n&agrave;o?</p>\r\n\r\n<p>Trong khi đ&oacute;, một số tiệm spa c&oacute; lu&ocirc;n đồng phục cho nh&acirc;n vi&ecirc;n để đảm bảo t&iacute;nh chuy&ecirc;n nghiệp cũng như hạn chế việc nh&acirc;n vi&ecirc;n tự &yacute; ăn mặc qu&aacute; &quot;lố&quot; khiến kh&aacute;ch h&agrave;ng phản cảm.</p>\r\n\r\n<h2><strong>2. H&atilde;y đeo khẩu trang trong khi l&agrave;m việc để bảo vệ bản th&acirc;n</strong></h2>\r\n\r\n<p>Bước ch&acirc;n v&agrave;o nghề l&agrave;m nail bạn phải x&aacute;c định rằng bản th&acirc;n phải li&ecirc;n tục tiếp x&uacute;c với h&oacute;a chất từ 8 - 10 tiếng mỗi ng&agrave;y. Theo một nghi&ecirc;n cứu, thợ l&agrave;m m&oacute;ng h&iacute;t thở m&ugrave;i m&agrave; c&aacute;c c&aacute;c h&oacute;a chất n&agrave;y tỏa ra trong một thời gian d&agrave;i sẽ c&oacute; nguy cơ ung thư v&agrave; mắc những căn bệnh li&ecirc;n quan tới phổi. Do vậy, khi l&agrave;m nghề n&agrave;y nhất quyết phải c&oacute; biện ph&aacute;p bảo vệ bản th&acirc;n.</p>\r\n\r\n<p>Đối với c&aacute;c tiệm nail cần th&igrave; phải c&oacute; quạt th&ocirc;ng gi&oacute; để thải bớt m&ugrave;i kh&oacute; chịu từ sơn m&oacute;ng tay ra khỏi kh&ocirc;ng gian. B&ecirc;n cạnh đ&oacute;, v&igrave; c&aacute;c h&oacute;a chất c&oacute; thể nguy hại đến sức khỏe ngay cả với nồng độ thấp n&ecirc;n bạn h&atilde;y đeo khẩu trang v&agrave; d&ugrave;ng găng tay để hạn chế tối đa việc h&iacute;t phải ch&uacute;ng.&nbsp;</p>\r\n\r\n<p>Thực tế, c&aacute;c nh&acirc;n vi&ecirc;n hiện nay thường chủ quan m&agrave; đeo khẩu trang y tế mỏng kh&ocirc;ng c&oacute; t&aacute;c dụng mấy trong việc ngăn cản họ h&iacute;t thở phải c&aacute;c chất độc hại. Do vậy, bạn h&atilde;y lựa chọn những loại khẩu trang c&oacute; bộ phận lọc kh&iacute;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Xem th&ecirc;m:&nbsp;<a href=\"https://www.kiotviet.vn/11-buoc-don-gian-de-thanh-cong-khi-mo-tiem-nail/\" rel=\"noopener noreferrer\" target=\"_blank\"><em>11 bước đơn giản để th&agrave;nh c&ocirc;ng khi mở tiệm nail</em></a></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>3. Lu&ocirc;n đảm bảo dụng cụ l&agrave;m m&oacute;ng được vệ sinh hay khử tr&ugrave;ng trước khi l&agrave;m cho kh&aacute;ch</strong></h2>\r\n\r\n<p>C&aacute;c bộ dụng cụ cắt, tỉa m&oacute;ng được coi l&agrave; vật dụng trung gian truyền nhiễm virus vi&ecirc;m gan B, nấm m&oacute;ng,... hay thậm tr&iacute; l&agrave; HIV nếu ch&uacute;ng được d&ugrave;ng chung giữa c&aacute;c kh&aacute;ch h&agrave;ng với nhau. Do vậy, để ph&ograve;ng ngừa tối đa rủi ro v&agrave; gi&uacute;p kh&aacute;ch h&agrave;ng cảm thấy y&ecirc;n t&acirc;m c&aacute;c tiệm nail buộc phải vệ sinh dụng cụ thật cẩn thận trước khi l&agrave;m m&oacute;ng cho kh&aacute;ch tiếp theo. Tất cả nh&acirc;n vi&ecirc;n tại cửa h&agrave;ng đều phải c&oacute; tr&aacute;ch nghiệm thực hiện c&ocirc;ng việc vệ sinh n&agrave;y.</p>\r\n\r\n<h2><strong>4. Phải biết c&aacute;ch &ldquo;chiều chuộng&rdquo; c&aacute;c thượng đế</strong></h2>\r\n\r\n<p><img alt=\"nghề làm nail\" height=\"350\" src=\"https://www.kiotviet.vn/wp-content/uploads/2019/09/ngh%E1%BB%81-l%C3%A0m-nail-2.jpg\" title=\"nghề làm nail\" width=\"760\" /><em>Phải biết c&aacute;ch &ldquo;chiều chuộng&rdquo; c&aacute;c thượng đế</em></p>\r\n\r\n<p>Biết chiều kh&aacute;ch l&agrave; phương ph&aacute;p kh&ocirc;n ngoan trong kinh doanh nghề n&agrave;y. &ldquo;Cao thủ&rdquo; hơn l&agrave; vừa chiều được kh&aacute;ch lại vừa hướng kh&aacute;ch theo sự hướng dẫn của bạn tr&ecirc;n cơ sở t&ocirc;n trọng sự chọn lựa của họ.</p>\r\n\r\n<p>Với những kh&aacute;ch dễ thương th&igrave; kh&ocirc;ng sao nhưng nhiều người kh&oacute; t&iacute;nh h&agrave;nh l&ecirc;n h&agrave;nh xuống nh&acirc;n vi&ecirc;n tại tiệm. Chẳng hạn như, c&oacute; kh&aacute;ch bắt thợ sơn cho đ&atilde; mấy ng&oacute;n tay rồi lại n&oacute;i kh&ocirc;ng th&iacute;ch, đ&ograve;i đổi nước sơn kh&aacute;c, c&oacute; l&uacute;c y&ecirc;u cầu nhi&ecirc;n vi&ecirc;n l&agrave;m theo &yacute; họ nhưng sau c&ugrave;ng kh&ocirc;ng ưng lại quay ra khiển tr&aacute;ch,... Tuy nhiều kh&aacute;ch đ&ograve;i hỏi v&ocirc; l&yacute; nhưng bạn vẫn phải chiều họ cho bằng được. Tốt nhất l&agrave; trong trường hợp kh&aacute;ch kh&ocirc;ng h&agrave;i l&ograve;ng th&igrave; h&atilde;y đổi thợ kh&aacute;c kh&eacute;o n&oacute;i v&agrave; &ldquo; cao tay hơn&rdquo;.</p>\r\n\r\n<p>Ngo&agrave;i ra, để kh&aacute;ch h&agrave;ng y&ecirc;u th&iacute;ch tiệm nail của m&igrave;nh th&igrave; nhất định phải thấu hiểu sở th&iacute;ch của họ. Phải biết kh&aacute;ch th&iacute;ch dịch vụ m&oacute;ng n&agrave;o, th&iacute;ch m&agrave;u sơn g&igrave;, c&aacute;c xu hướng &quot;hot&quot; thiết kế ra sao,... để l&agrave;m theo &yacute; họ, thể hiện sự chăm s&oacute;c hay quan t&acirc;m t&iacute;ch cực đến mong muốn của kh&aacute;ch. C&oacute; như vậy kh&aacute;ch h&agrave;ng sẽ lu&ocirc;n muốn quay lại l&agrave;m tiếp v&agrave; tự nhi&ecirc;n lợi nhuận sẽ tăng cao.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Xem th&ecirc;m:&nbsp;<a href=\"https://www.kiotviet.vn/10-buoc-kinh-doanh-spa-nho-cho-nguoi-moi-bat-dau/\" rel=\"noopener noreferrer\" target=\"_blank\"><em>10 bước kinh doanh spa nhỏ cho người mới bắt đầu</em></a></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>5. Trau dồi kinh nghiệm quản l&yacute;</strong></h2>\r\n\r\n<p>Tiệm nail mở ra nhiều, lượng d&acirc;n l&agrave;m nail cũng ng&agrave;y một lớn hơn, nhưng kh&ocirc;ng phải cứ mở cửa h&agrave;ng l&agrave; đ&atilde; &ldquo;hốt bạc&rdquo; ngay được. Cũng nhiều tiệm phải đ&oacute;ng cửa, thợ bỏ nghề do kh&ocirc;ng đảm bảo được doanh thu, lợi nhuận. Ở g&oacute;c độ kinh doanh, c&oacute; nhiều l&yacute; do dẫn đến sự thất bại khi mở tiệm, trong đ&oacute; hơn 90% l&agrave; từ sự quản l&yacute; yếu k&eacute;m v&agrave; thiếu kinh nghiệm.&nbsp;</p>\r\n\r\n<p>L&yacute; do l&agrave; đa phần chủ tiệm nails đi l&ecirc;n từ người thợ l&acirc;u năm, c&oacute; kinh nghiệm l&agrave;m m&oacute;ng chuy&ecirc;n nghiệp nhưng lại thiếu kiến thức về vấn đề quản l&yacute; từ nh&acirc;n vi&ecirc;n, h&agrave;ng h&oacute;a, kh&aacute;ch h&agrave;ng,... đến cả doanh thu, lợi nhuận v&agrave; chi ph&iacute;. C&aacute;i sự yếu k&eacute;m trong quản l&yacute; đ&atilde; tạo n&ecirc;n v&ocirc; v&agrave;n những kh&oacute; khăn trong qu&aacute; tr&igrave;nh kinh doanh v&agrave; ph&aacute;t triển tiệm nail.</p>\r\n\r\n<p>*Gợi &yacute;: Một trợ thủ đắc lực nhất bạn c&oacute; thể sử dụng ngay ch&iacute;nh l&agrave; phần mềm quản l&yacute; tiệm Nail KiotViet.</p>\r\n\r\n<h2><strong>6. Tay nghề thật vững v&agrave;ng để hạn chế rủi ro</strong></h2>\r\n\r\n<p><img alt=\"nghề làm nail\" height=\"350\" src=\"https://www.kiotviet.vn/wp-content/uploads/2019/09/ngh%E1%BB%81-l%C3%A0m-nail-1.jpg\" title=\"\" width=\"760\" /><em>Tay nghề thật vững v&agrave;ng để hạn chế rủi ro</em></p>\r\n\r\n<p>C&aacute;c tai nạn dễ xảy ra nhất trong tiệm nails ch&iacute;nh l&agrave; l&agrave;m kh&aacute;ch h&agrave;ng bị bỏng v&agrave; trầy da. Khi rủi ro xảy ra d&ugrave; mức độ nặng hay nhẹ th&igrave; kh&aacute;ch h&agrave;ng cũng sẽ đ&aacute;nh gi&aacute; t&iacute;nh chuy&ecirc;n nghiệp, kỹ năng trong nghề của người thợ l&agrave;m đ&atilde; l&agrave;m m&oacute;ng cho họ. Thế mới thấy, muốn l&agrave;m nghề nail th&igrave; tay nghề phải thật vững v&agrave; lu&ocirc;n trau dồi kỹ năng nếu kh&ocirc;ng muốn để xảy ra tai nạn kh&ocirc;ng đ&aacute;ng c&oacute; với kh&aacute;ch h&agrave;ng.&nbsp;</p>', '/uploads/mau-nail-mau-xanh-reu.jpg', 1, 'Những mẫu nail trơn, vẽ hoa, đính đá… luôn là những mẫu được ưa chuộng và làm nhiều.', '6-dieu-can-nho-trong-nghe-lam-nail-chung-ta-can-khac-cot-ghi-tam3', 1, '2020-09-14 07:01:47', '2020-09-14 07:01:47'),
(4, 'Những lợi ích mà bột nhúng Nail mang lại cho ngành làm nail', '<h3>Bột nh&uacute;ng nail gi&uacute;p dưỡng m&oacute;ng, An to&agrave;n v&agrave; kh&ocirc;ng ảnh hướng đến sức khỏe</h3>\r\n\r\n<p>Bột nh&uacute;ng c&oacute; chứa Vitamin E v&agrave; Calcium gi&uacute;p m&oacute;ng tay khỏe mạnh, kh&ocirc;ng bị mẻ vỡ hay g&atilde;y m&oacute;ng. Bột nh&uacute;ng kh&ocirc;ng c&oacute; m&ugrave;i, kh&ocirc;ng chứa liquid, hay primer n&ecirc;n kh&ocirc;ng g&acirc;y ảnh hưởng đến sức khỏe thợ l&agrave;m nails v&agrave; kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>M&oacute;ng l&agrave;m bột nh&uacute;ng khỏe v&agrave; chắc, l&ecirc;n m&agrave;u đẹp thời gian giữ m&agrave;u l&ecirc;n đến gần 1 th&aacute;ng. Thời gian để ho&agrave;n th&agrave;nh một bộ m&oacute;ng cũng rất nhanh chỉ mất khoản 30 ph&uacute;t.</p>\r\n\r\n<h3>Đắp móng với b&ocirc;̣t nhúng nail d&ecirc;̃ dàng và nhánh chóng</h3>\r\n\r\n<p>N&ecirc;́u bạn là 1 thợ nails đã sử dụng qua b&ocirc;̣t nhúng nắm vững các bước cơ bản thì vi&ecirc;̣c đắp m&ocirc;̣t b&ocirc;̣ móng với b&ocirc;̣t nhúng r&acirc;́t nhanh chỉ m&acirc;́t khoản 30 phút đ&ecirc;̉ hoàn thành. Với những bạn kh&ocirc;ng phải là thợ cũng có th&ecirc;̉ tự làm tại nhà với 1 b&ocirc;̣ móng cơ bản với b&ocirc;̣t nhúng. Chỉ c&acirc;̀n bạn nắm những bước thực hi&ecirc;̣n sử dụng b&ocirc;̣t nhúng sau:</p>\r\n\r\n<p>Bước 1: Sơn 1 lớp Dipping primer để kh&ocirc;</p>\r\n\r\n<p>Bước 2: Sơn tiếp 1 lớp Dipping Base</p>\r\n\r\n<p>Bước 3: Đẩy nhẹ ng&oacute;n tay v&agrave;o bột nh&uacute;ng 45 độ</p>\r\n\r\n<p>Bước 4: Sơn tiếp 1 lớp Base lần 2</p>\r\n\r\n<p>Bước 5: Đẩy nhẹ ng&oacute;n tay v&agrave;o bột nh&uacute;ng 45 độ lần 2</p>\r\n\r\n<p>Bước 6: Sơn tiếp 1 lớp Activator cuối c&ugrave;ng</p>\r\n\r\n<p>Bước 7: Sơn lớp Top đ&ecirc;̉ tạo đ&ocirc;̣ bóng cho móng.</p>\r\n\r\n<h3>B&ocirc;̣t nhúng nail có th&ecirc;̉ làm được Đắp, nhúng, Ombre</h3>\r\n\r\n<p>Bột nh&uacute;ng rất dễ sử dụng bạn c&oacute; thể d&ugrave;ng bột nh&uacute;ng để đắp, khi kết hợp bột nh&uacute;ng với c&aacute;c chất li&ecirc;n kết để đắp l&ecirc;n m&oacute;ng. Ưu điểm của đắp bột l&agrave; l&agrave;m m&oacute;ng d&agrave;y hơn, chắc hơn v&agrave; giữ được m&agrave;u l&acirc;u hơn.</p>\r\n\r\n<p>Đ&atilde; n&oacute;i đến bột nh&uacute;ng th&igrave; c&ocirc;ng d&uacute;ng ch&iacute;nh của n&oacute; l&agrave; nh&uacute;ng, việc tạo ra bột nh&ugrave;ng nhằm thay đổi dần việc sử dụng bột để đắp v&igrave; khi d&ugrave;ng bột nh&uacute;ng m&oacute;ng cũng d&agrave;y giống như bạn đắp. Thời gian cũng nhanh v&agrave; dễ l&agrave;m hơn khi bạn đắp bột.</p>\r\n\r\n<p><img alt=\"Móng làm từ bột nhúng với kỹ thuật ombre\" height=\"622\" sizes=\"(max-width: 500px) 100vw, 500px\" src=\"https://superstarmatching3in1.vn/wp-content/uploads/2018/05/mong-duoc-lam-tu-bot-nhung-voi-ky-thuat-ombre.jpg\" srcset=\"https://superstarmatching3in1.vn/wp-content/uploads/2018/05/mong-duoc-lam-tu-bot-nhung-voi-ky-thuat-ombre.jpg 500w, https://superstarmatching3in1.vn/wp-content/uploads/2018/05/mong-duoc-lam-tu-bot-nhung-voi-ky-thuat-ombre-322x400.jpg 322w\" width=\"500\" /></p>\r\n\r\n<p>M&oacute;ng l&agrave;m từ bột nh&uacute;ng nail với kỹ thuật ombre</p>\r\n\r\n<p>Một điểm nổi bật nữa của bột nh&uacute;ng đ&oacute; l&agrave; Ombre, bột nh&uacute;ng c&oacute; thể l&agrave;m Ombre kỹ thuật n&agrave;y đ&ograve;i hỏi thợ nails c&oacute; tay nghề phải cao v&agrave; d&agrave;y dặn kinh nghiệm.</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/f49a6dbc-42d9-4f3c-a1f3-980870bfa73c\" width=\"640\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>Đ&oacute; chỉ l&agrave; những lợi &iacute;ch cơ bản m&agrave;&nbsp;<a href=\"https://superstarmatching3in1.vn/nhung-loi-ich-ma-bot-nhung-nail-mang-lai-cho-nganh-nails/\"><strong>bột nh&uacute;ng nail</strong></a>&nbsp;mang lại, kh&ocirc;ng chỉ dừng lại ở một sản phẩm tốt chất lượng. M&agrave; c&ograve;n ở chỗ bột nh&uacute;ng nail thay dần c&aacute;c kỹ thuật l&agrave;m nail truyền thống, sử dụng c&aacute;c h&oacute;a chất độc hại (lưu huỳnh.v.v&hellip;) g&acirc;y ảnh hưởng đến sức khỏe kh&ocirc;ng chỉ của thợ l&agrave;m nail m&agrave; của cả kh&aacute;ch h&agrave;ng.</p>', '/uploads/9fe1cf63847870ec402165f6d0951227.jpg', 2, 'Nail là thuật ngữ tiếng Anh và tiếng Việt có nghĩa là làm móng tay, móng chân. Làm nail là một trong lĩnh vực làm đẹp,', 'nhung-loi-ich-ma-bot-nhung-nail-mang-lai-cho-nganh-lam-nail4', 2, '2020-09-14 07:04:27', '2020-09-14 07:04:27');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `id_category` int(250) NOT NULL,
  `name_product` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `slug` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `id_category`, `name_product`, `image`, `price`, `slug`, `status`, `description`, `created_at`, `updated_at`) VALUES
(5, 2, 'Mẫu Cuccio', '/uploads/mau-nail-mau-xanh-reu.jpg', 350000, 'san-pham-demo27', 1, 'Cuccio- thương hiệu nail cao cấp của Mỹ- được phân phối độc quyền tại Việt Nam bởi Vĩnh Trí, với hai dòng sơn móng tay chủ yếu là sơn gel với sơn móng tay với nhiều màu sắc khác nhau, rất dễ dàng cho các nàng lựa chọn.', '2020-09-08 01:27:11', '2020-09-14 04:07:07'),
(6, 1, 'Mẫu O.P.I', '/uploads/5e1233f24531100c154d7fcf.jpg', 350000, 'san-pham-demo27', 1, 'OPI là một thương hiệu nail có uy tín, xuất xứ từ Mỹ, với các sản phẩm sơn móng tay màu sắc phong phú, đẹp và bền màu, không gây ảnh hưởng xấu cho móng.', '2020-09-08 01:27:11', '2020-09-14 04:07:07'),
(7, 2, 'Mẫu Essie', '/uploads/fc2da582bb18611b4271aab6210528ee.jpg', 350000, 'san-pham-demo27', 1, 'Cũng là một thương hiệu nail của Mỹ, tuy nhiên thương hiệu nail Essie này lại được biết đến với nhưng màu sơn trẻ trung, bắt mắt phù hợp với giới trẻ.', '2020-09-08 01:27:11', '2020-09-14 04:07:07'),
(8, 1, 'Mẫu The Face Shop', '/uploads/9fe1cf63847870ec402165f6d0951227.jpg', 299999, 'mau-the-face-shop8', 1, 'Là dòng sản phẩm nail của Hàn Quốc, thương hiệu nail này cũng được biết đến với màu sắc trẻ trung, tươi sáng.', '2020-09-08 01:27:11', '2020-09-14 04:40:05'),
(10, 1, 'Mẫu Hint Of Cheetah', '/uploads/mau-nail-mau-xanh-reu.jpg', 480000, 'mau-hint-of-cheetah10', 1, 'Màu nude NUME Soft Taupe Bút vẽ màu đen Topcoat Seche Vite', '2020-09-08 01:27:11', '2020-09-14 04:40:41'),
(11, 2, 'Mẫu móng chân đính đá', '/uploads/maxresdefault.jpg', 249000, 'mau-mong-chan-dinh-da11', 1, 'Đây là mẫu móng chân đẹp và hết sức cầu kỳ tốn thời gian. Để thực hiện bạn phải trải qua 2 công đoạn bao gồm vẽ họa tiết và đính đá lên vị trí mong muốn.', '2020-09-08 01:27:11', '2020-09-14 09:10:40'),
(12, 1, 'Mẫu móng chân màu đỏ', '/uploads/images.jpg', 249000, 'san-pham-demo27', 1, 'Mẫu móng chân màu đỏ là màu may mắn đồng thời đại diện cho sự quyến rũ, không khó hiểu khi tông màu này hot không hạ nhiệt. Có rất nhiều mẫu nail móng chân đẹp để bạn lựa chọn, tuy nhiên màu đỏ vẫn khiến nhiều cô nàng bị “say đắm” nhất.', '2020-09-08 01:27:11', '2020-09-14 04:07:07'),
(13, 1, 'Mẫu móng chân đi biển', '/uploads/download (2).jpg', 249000, 'san-pham-demo27', 2, 'Mùa hè sắp đến bạn đang có những kế hoạch du lịch khám phá cảnh đẹp hãy tân trang lại móng chân của mình bằng những mẫu nail đi biển hot nhất hiện nay.', '2020-09-08 01:27:11', '2020-09-14 04:07:07'),
(14, 1, 'Mẫu móng chân màu xanh', '/uploads/hoc-cat-da-tay-chan.jpg', 249000, 'san-pham-demo27', 1, 'Những gam màu xanh luôn có sức hút mãnh liệt với những cô nàng yêu thích sự mới lạ. Mẫu móng chân với gam màu xanh cô ban, xanh ngọc bích hay xanh tím than sẽ giúp những bạn gái cực thời trang và ấn tượng.', '2020-09-08 01:27:11', '2020-09-14 04:07:07'),
(15, 1, 'Mẫu móng chân màu đen', '/uploads/self-nail-salon-3way-buffer-r-12_c990ea775664490590ff2a90ed4a12ab_master.jpg', 249000, 'san-pham-demo27', 3, 'Không cần quá cầu kỳ chỉ với mẫu móng chân màu đen đã giúp bạn thu hút sự chú ý của đối phương bởi sự sang trọng lịch lãm mà không kém phần tinh tế.', '2020-09-08 01:27:11', '2020-09-14 04:07:07'),
(16, 1, 'Mẫu móng chân màu vàng', '/uploads/su-that-it-ai-biet-ve-son-mong-tay-khong-the-tay-gay-hai-cho-suc-khoe-nhu-the-nao.jpg', 249000, 'san-pham-demo27', 1, 'Nếu bạn muốn nổi bật ấn tượng có thể học theo cách vẽ mẫu móng chân đẹp với màu vàng tươi sáng cùng các họa tiết đính đá, chấm bị hay kẻ sọc. Hoặc mix thêm những ánh nhũ vàng kiêu sa để đôi bàn chân thêm thu hút lộng lẫy.', '2020-09-08 01:27:11', '2020-09-14 04:07:07'),
(18, 6, 'VIP1', '/uploads/pasted image 0.png', 249000, 'san-pham-demo27', 1, 'Vệ sinh móng tay, chân Sơn móng tay , chân theo yêu cầu Tặng 1 voucher giảm gái 10% cho lần kế tiếp', '2020-09-12 15:40:07', '2020-09-14 04:07:07'),
(19, 6, 'VIP2', '/uploads/pasted image 0.png', 319000, 'san-pham-demo27', 1, 'Vệ sinh móng tay, chân Sơn móng tay , chân theo yêu cầu Tặng 1 voucher giảm gái 10% cho lần kế tiếp', '2020-09-12 15:40:37', '2020-09-14 04:07:07'),
(20, 6, 'VIP3', '/uploads/pasted image 0.png', 399000, 'san-pham-demo27', 1, 'Vệ sinh móng tay, chân Sơn móng tay , chân theo yêu cầu Tặng 1 voucher giảm gái 10% cho lần kế tiếp', '2020-09-12 15:41:14', '2020-09-14 04:07:07'),
(27, 1, 'sản phẩm  demo', '/uploads/9fe1cf63847870ec402165f6d0951227.jpg', 5000000, 'san-pham-demo27', 2, 'fdsafdsfsdafsđâsfsdafsdaf', '2020-09-14 04:07:07', '2020-09-14 04:27:41');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `image`, `phone`, `address`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Dương Văn Ninh', 'ninhdvph07642@gmail.com', '$2y$10$s7cCpfF/U9n1UZy6.zI7gOnzeRgkxuzyB4vyc5uOSSbXHmxrL4UqC', '/uploads/download (2).jpg', '0334389123', 'Thái Nguyên', 2, '2020-09-08 01:46:16', '2020-09-14 01:54:41'),
(6, 'Nguyễn Quốc Vinh', 'vinhdn@fpt.edu.vn', '$2y$10$MtwJTaStyxXr6oUZXFKfGOqYRkt/w4kHPCkxTLpyEXDob57ESO.KO', '/uploads/9fe1cf63847870ec402165f6d0951227.jpg', '0334589123', 'Bắc ninh', 1, '2020-09-11 03:34:48', '2020-09-14 01:54:44'),
(7, 'Dương Văn Ninh', 'ninh@gmail.com', '$2y$10$HpA4IUbPi2M64Tup1i4T9uD8DpcPyhXrL0IWafPK.i5kk68wvlhF6', '/uploads/9fe1cf63847870ec402165f6d0951227.jpg', '0334589193', 'Thái nguyên', 1, '2020-09-11 06:45:26', '2020-09-14 01:54:47');

-- --------------------------------------------------------

--
-- Table structure for table `user_product`
--

CREATE TABLE `user_product` (
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `category_news`
--
ALTER TABLE `category_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expert`
--
ALTER TABLE `expert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lien_he`
--
ALTER TABLE `lien_he`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_news`
--
ALTER TABLE `category_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `expert`
--
ALTER TABLE `expert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lien_he`
--
ALTER TABLE `lien_he`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
