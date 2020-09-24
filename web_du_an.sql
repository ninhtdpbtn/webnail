-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2020 at 08:45 AM
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

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `name_booking`, `phone_booking`, `image_booking`, `email_booking`, `id_user`, `time_booking`, `description_booking`, `status_booking`, `created_at`, `updated_at`) VALUES
(10, 'Dương văn ninh', 334589123, '/uploads/119651238_2605306403066040_1066325878995970183_n.jpg', 'ninh@gmail.com', 2, '2020-09-18T23:56', 'demo', 1, '2020-09-16 16:56:49', '2020-09-16 16:56:49'),
(15, 'Dương văn ninh', 334589123, '', 'ninh@gmail.com', 2, '2020-09-25T09:09', 'dsadsadasdassd', 1, '2020-10-17 02:10:04', '2020-09-17 02:10:34'),
(16, 'Dương văn ninh', 334589123, '/uploads/html5pagelayout.png', 'ninh@gmail.com', NULL, '2020-09-18T09:27', 'đasadassdasd', 1, '2020-09-17 02:28:27', '2020-09-17 02:28:27'),
(17, 'Dương văn ninh', 334589123, '', 'ninh@gmail.com', NULL, '2020-09-16T00:59', 'dsdasdas', 1, '2020-09-17 08:39:55', '2020-09-17 08:39:55'),
(18, 'Dương văn ninh', 334589123, '/uploads/html5pagelayout.png', 'ninh@gmail.com', NULL, '2020-09-18T16:08', 'đsađâsdadadas', 1, '2020-09-17 09:10:22', '2020-09-17 09:10:22'),
(19, 'Dương văn ninh', 934589123, '', 'ninh@gmail.com', 2, '2020-09-10T08:15', 'dfasdsadasdas', 1, '2020-09-18 01:16:30', '2020-09-18 01:16:30'),
(20, 'Dương văn ninh', 334589123, '', 'ninh@gmail.com', 2, '2020-09-10T08:19', 'dsadassdasda', 1, '2020-09-18 01:21:11', '2020-09-18 01:21:11'),
(21, 'Dương văn ninh', 334589123, '', 'ninh@gmail.com', 2, '2020-09-10T08:24', 'sadsadsadsadas', 1, '2020-09-18 01:25:43', '2020-09-18 01:25:43'),
(22, 'Dương văn ninh', 334589123, '', 'ninh@gmail.com', 2, '2020-09-25T08:58', 'cdsadsadasdasdas', 1, '2020-09-18 01:58:34', '2020-09-18 01:58:34'),
(23, 'Dương văn ninh', 334589123, '', 'ninh@gmail.com', 2, '2020-09-25T08:58', 'cdsadsadasdasdas', 1, '2020-09-18 01:58:36', '2020-09-18 01:58:36'),
(24, 'Dương văn ninh', 334589123, '', 'ninh@gmail.com', 2, '2020-09-09T09:01', 'âsaSÂSASADSAD', 1, '2020-09-18 02:01:24', '2020-09-18 02:01:24'),
(25, 'Dương văn ninh', 334589123, '', 'ninh@gmail.com', 2, '2020-09-30T09:03', 'đasadasdasdas', 1, '2020-09-18 02:03:11', '2020-09-18 02:03:11'),
(26, 'Nguyễn quốc vinh', 334589123, '/uploads/html5pagelayout.png', 'ninh@gmail.com', 2, '2020-09-03T09:03', 'dsdsadasdsadasda', 1, '2020-09-18 02:03:34', '2020-09-18 02:03:34'),
(27, 'Dương văn ninh', 334589123, '', 'ninh@gmail.com', 2, '2020-09-19T09:04', 'dsdasdasda', 1, '2020-09-18 02:04:46', '2020-09-18 02:04:46'),
(28, 'Dương văn ninh', 334589123, '', 'vinhbn@gmail.com', 2, '2020-09-18T11:11', 'đasadsadasd', 1, '2020-09-18 02:12:09', '2020-09-18 02:12:09'),
(29, 'Dương văn ninh', 334589123, '', 'ninh@gmail.com', 2, '2020-09-18T05:12', 'dấdasdasdassdassdasdas', 1, '2020-09-18 02:12:32', '2020-09-18 02:12:32'),
(30, 'Dương văn ninh', 334589123, '', 'ninh@gmail.com', 2, '2020-09-17T09:12', 'dasdasdasdasdasdas', 1, '2020-09-18 02:12:59', '2020-09-18 02:12:59'),
(31, 'Dương văn ninh', 334589123, '', 'vinhbn@gmail.com', 2, '2020-09-18T09:39', 'dasdasdasdasda', 1, '2020-09-18 02:18:37', '2020-09-18 02:18:37'),
(32, 'Dương văn ninh', 334589123, '/uploads/html5pagelayout.png', 'vinhbn@gmail.com', 2, '2020-09-18T08:14', 'ádasdasdasdassda', 1, '2020-09-18 02:19:05', '2020-09-18 02:19:05'),
(33, 'Dương văn ninhh', 334589123, '', 'ninh@gmail.com', 2, '2020-09-18T06:21', 'đsađâsdass', 1, '2020-09-18 02:21:42', '2020-09-18 02:21:42'),
(34, 'Dương văn ninh', 334589123, '', 'ninh@gmail.com', 2, '2020-09-18T08:20', 'đsađâsdass', 1, '2020-09-18 02:21:57', '2020-09-18 02:21:57'),
(35, 'ninhd', 334589123, '', 'ninh@gmail.com', 2, '2020-09-18T07:09', 'đsađâsdass', 1, '2020-09-18 02:22:10', '2020-09-18 02:22:10'),
(36, 'Dương văn ninh', 334589123, '', 'vinhbn@gmail.com', 2, '2020-09-25T15:24', 'làm thật đẹp', 1, '2020-09-21 08:24:29', '2020-09-21 08:24:29'),
(37, 'Dương văn ninh', 334589123, '', 'vinhbn@gmail.com', 2, '2020-09-25T15:24', 'làm thật đẹp', 1, '2020-09-21 08:26:38', '2020-09-21 08:26:38');

-- --------------------------------------------------------

--
-- Table structure for table `booking_product`
--

CREATE TABLE `booking_product` (
  `id_booking` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_expert` int(11) NOT NULL,
  `status_booking_product` int(11) NOT NULL COMMENT '1 : Đơn đặt lịch\r\n2 : Đơn đặt lịch hoàn thành\r\n3 : Đơn đặt lịch đã hủy\r\n4 : Đơn đặt lịch hoàn thành đã xóa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking_product`
--

INSERT INTO `booking_product` (`id_booking`, `id_product`, `id_expert`, `status_booking_product`) VALUES
(10, 5, 2, 3),
(10, 6, 2, 3),
(10, 7, 2, 3),
(10, 8, 2, 2),
(10, 10, 2, 2),
(10, 11, 2, 2),
(10, 12, 2, 2),
(10, 14, 2, 2),
(10, 16, 2, 2),
(10, 18, 2, 2),
(15, 5, 3, 4),
(15, 6, 3, 2),
(15, 7, 3, 2),
(16, 5, 2, 2),
(16, 6, 2, 2),
(16, 8, 2, 2),
(17, 5, 2, 2),
(18, 5, 2, 2),
(18, 6, 2, 3),
(19, 6, 2, 2),
(20, 6, 2, 2),
(21, 5, 2, 2),
(22, 5, 2, 2),
(23, 5, 2, 2),
(24, 5, 2, 2),
(25, 7, 2, 2),
(26, 5, 2, 2),
(27, 8, 2, 2),
(28, 5, 1, 4),
(29, 5, 2, 2),
(30, 7, 2, 2),
(31, 5, 2, 2),
(32, 5, 2, 2),
(33, 7, 1, 4),
(34, 7, 1, 4),
(35, 7, 1, 4),
(37, 5, 3, 3);

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
(97, 'Dương Văn Ninh', NULL, 334589123, 'Xin hãy điền thông tin và lời nhắn của bạn vào biểu mẫu dưới đây\r\nQuyên Beauty sẽ liên hệ lại với bạn trong thời gian nhanh nhất.', 3, '2020-09-15 03:34:57', '2020-09-17 02:13:43'),
(98, 'Dương Văn Ninh', NULL, 334589123, 'Xin hãy điền thông tin và lời nhắn của bạn vào biểu mẫu dưới đây\r\nQuyên Beauty sẽ liên hệ lại với bạn trong thời gian nhanh nhất.', 2, '2020-09-15 03:46:40', '2020-09-15 03:56:44'),
(99, 'Dương Văn Ninh', NULL, 334589123, 'dsadasdas', 2, '2020-09-16 07:21:16', '2020-09-17 01:19:30'),
(100, 'Dương Văn Ninh', NULL, 334589123, 'dsadsadasdas', 2, '2020-09-16 07:22:22', '2020-09-17 01:19:33'),
(101, 'Dương Văn Ninh', NULL, 334589123, 'Xin hãy điền thông tin và lời nhắn của bạn vào biểu mẫu dưới đây\r\nQuyên Beauty sẽ liên hệ lại với bạn trong thời gian nhanh nhất.', 2, '2020-09-16 07:23:51', '2020-09-17 01:19:43'),
(102, 'Dương Văn Ninh', NULL, 334589123, 'Xin hãy điền thông tin và lời nhắn của bạn vào biểu mẫu dưới đây\r\nQuyên Beauty sẽ liên hệ lại với bạn trong thời gian nhanh nhất.', 2, '2020-09-16 07:24:08', '2020-09-17 01:19:45'),
(103, 'Dương Văn Ninh', NULL, 334589123, 'Xin hãy điền thông tin và lời nhắn của bạn vào biểu mẫu dưới đây\r\nQuyên Beauty sẽ liên hệ lại với bạn trong thời gian nhanh nhất.', 2, '2020-09-16 16:19:12', '2020-09-17 17:37:52'),
(104, 'Dương Văn Ninh', NULL, 334589123, 'Xin hãy điền thông tin và lời nhắn của bạn vào biểu mẫu dưới đây\r\nQuyên Beauty sẽ liên hệ lại với bạn trong thời gian nhanh nhất.', 2, '2020-09-17 17:38:30', '2020-09-17 17:38:46');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(150) NOT NULL,
  `short_title` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_category_news` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `details`, `image`, `status`, `short_title`, `slug`, `id_category_news`, `created_at`, `updated_at`) VALUES
(11, 'Làm nail là gì? Nên làm nail kiểu nào không hại da mà lại đẹp xuất sắc?', '<h2><strong>1. L&agrave;m nail l&agrave; g&igrave;?</strong></h2>\r\n\r\n<p>Nail l&agrave; thuật ngữ tiếng Anh v&agrave; tiếng Việt c&oacute; nghĩa l&agrave; l&agrave;m m&oacute;ng tay, m&oacute;ng ch&acirc;n. L&agrave;m nail l&agrave; một trong lĩnh vực l&agrave;m đẹp, cụ thể bạn sẽ được chăm s&oacute;c m&oacute;ng của m&igrave;nh tốt nhất. Khi l&agrave;m m&oacute;ng bạn sẽ được cắt tỉa m&oacute;ng, chăm s&oacute;c m&oacute;ng, sơn sửa m&oacute;ng tay, m&oacute;ng ch&acirc;n với nhiều kiểu kh&aacute;c nhau, t&ugrave;y &yacute; th&iacute;ch.</p>\r\n\r\n<p>Hiện nay, bạn c&oacute; thể l&agrave;m m&oacute;ng với nhiều sự lựa chọn như loại sơn thường, sơn gel&hellip;. Hay sơn m&oacute;ng trơn, sơn vẽ họa tiết, sơn đ&iacute;nh đ&aacute; &hellip; Mỗi kiểu nail sẽ gi&uacute;p bạn c&oacute; phong c&aacute;ch ri&ecirc;ng, nổi bật được t&iacute;nh c&aacute;ch v&agrave; sở th&iacute;ch của bạn.</p>\r\n\r\n<h2><strong>2. L&agrave;m nail c&oacute; lợi &iacute;ch g&igrave;? C&oacute; hại tới da kh&ocirc;ng?</strong></h2>\r\n\r\n<h3><strong>2.1. Lợi &iacute;ch của l&agrave;m nail&nbsp;</strong></h3>\r\n\r\n<ul>\r\n	<li>Gi&uacute;p bạn c&oacute; những m&oacute;ng tay, m&oacute;ng ch&acirc;n xinh, đẹp, c&aacute; t&iacute;nh hoặc dễ thương.&nbsp;</li>\r\n	<li>Che khuyết điểm ở m&oacute;ng tay, m&oacute;ng ch&acirc;n một c&aacute;ch dễ d&agrave;ng, đẹp.</li>\r\n	<li>L&agrave;m m&oacute;ng sẽ gi&uacute;p bạn đẹp hơn, sang hơn khi kết hợp với những bộ đầm, v&aacute;y hoặc quần jean.</li>\r\n	<li>Gi&uacute;p bạn tự tin, năng động hơn.</li>\r\n	<li>Ng&oacute;n ch&acirc;n, ng&oacute;n tay của bạn nh&igrave;n sẽ thon, d&agrave;i đẹp hơn.<input alt=\"\" src=\"http://localhost/webnail/public/uploads/images/lam-nail-1.jpg\" style=\"height:663px; width:780px\" type=\"image\" /></li>\r\n</ul>', '/uploads/lam-nail-5.jpg', 1, 'Những mẫu nail trơn, vẽ hoa, đính đá… luôn là những mẫu được ưa chuộng và làm nhiều.', 'lam-nail-la-gi-nen-lam-nail-kieu-nao-khong-hai-da-ma-lai-dep-xuat-sac11', 2, '2020-09-18 03:25:56', '2020-09-18 04:23:37');

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
-- Dumping data for table `user_product`
--

INSERT INTO `user_product` (`id_user`, `id_product`, `status`) VALUES
(2, 5, 2),
(7, 6, 2),
(7, 7, 2),
(7, 8, 2),
(7, 10, 2),
(2, 11, 2),
(2, 12, 2),
(2, 14, 2),
(2, 16, 2),
(2, 18, 2),
(2, 5, 2),
(7, 6, 2),
(7, 7, 2),
(7, 6, 2),
(7, 19, 2),
(7, 6, 2),
(7, 7, 2),
(7, 8, 2),
(7, 10, 2),
(2, 5, 2),
(7, 8, 1),
(2, 5, 2),
(2, 6, 2),
(2, 6, 2),
(2, 5, 2),
(2, 5, 2),
(2, 5, 2),
(2, 7, 2),
(2, 5, 2),
(2, 8, 2),
(2, 5, 2),
(2, 5, 2),
(2, 7, 2),
(2, 5, 2),
(2, 5, 2),
(2, 7, 2),
(2, 5, 2),
(2, 5, 1);

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
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
