-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 29, 2024 lúc 08:19 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tdbs`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `token_login` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `pass_real` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`username`, `password`, `role`, `token_login`, `created_at`, `updated_at`, `pass_real`, `user_id`) VALUES
('admin1', '$2y$10$ZqPu75HjC0JuKK2uj6TSv.vcVLLe0VZ0ZKJCEoeMDur3gMpWwVmzC', 1, '', '2024-06-28 10:40:35', NULL, '123', 9),
('khoiadmin', '$2y$10$HQzSV5sEcIklTZvgeYH/5OBztNbFx6C1HzZb6Ytqj375YRPEOKlGC', 0, '68a2dab7f6c7ff60e79d52b0ebc762fd', '2024-06-28 10:41:30', NULL, '123', 10),
('khoiuser', '$2y$10$hIRK7HHtPQwNUlvjPUHx.uoywmJETSB0txQ534jBKKdv8CsdvHpja', 1, '', '2024-06-28 11:38:14', NULL, '123', 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `album`
--

CREATE TABLE `album` (
  `album_id` int(11) NOT NULL,
  `album_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `bill_id` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `bill_cost` float NOT NULL,
  `bill_detail` mediumtext NOT NULL,
  `pay_method` varchar(255) DEFAULT NULL,
  `bill_status` int(11) NOT NULL,
  `escate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `booking_date` varchar(20) NOT NULL,
  `date_of_use` varchar(20) NOT NULL,
  `payment_status` int(11) DEFAULT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `booking`
--

INSERT INTO `booking` (`booking_id`, `customer_id`, `booking_date`, `date_of_use`, `payment_status`, `total_price`) VALUES
(5, 60, '2024-04-28', '2024-04-28', 1, 590000),
(6, 61, '2023-04-28', '2023-04-28', 1, 1570000),
(7, 62, '2024-06-28', '2024-06-28', 1, 990000),
(8, 63, '2024-06-28', '2024-06-28', 1, 990000),
(9, 64, '2024-08-28', '2024-08-28', 1, 990000),
(10, 65, '2024-06-28', '2024-06-28', 1, 990000),
(11, 66, '2024-06-28', '2024-06-28', 1, 200000),
(12, 67, '2024-06-28', '2024-06-28', 1, 200000),
(13, 68, '2024-06-28', '2024-06-28', 1, 600000),
(14, 69, '2024-08-28', '2024-08-28', 1, 200000),
(15, 70, '2024-08-28', '2024-08-28', 1, 200000),
(16, 71, '2024-06-28', '2024-06-28', 1, 200000),
(17, 72, '2024-06-28', '2024-06-28', 1, 200000),
(18, 73, '2024-07-28', '2024-07-28', 1, 2160000),
(19, 74, '2024-07-28', '2024-07-28', 1, 790000),
(20, 75, '2024-07-28', '2024-07-28', 1, 1570000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booking_detail`
--

CREATE TABLE `booking_detail` (
  `booking_detail_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `ticket_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `booking_detail`
--

INSERT INTO `booking_detail` (`booking_detail_id`, `quantity`, `price`, `booking_id`, `ticket_id`) VALUES
(5, 1, 200000, 5, 2),
(6, 1, 390000, 5, 3),
(7, 2, 200000, 6, 2),
(8, 3, 390000, 6, 3),
(9, 3, 200000, 7, 2),
(10, 1, 390000, 7, 3),
(11, 3, 200000, 8, 2),
(12, 1, 390000, 8, 3),
(13, 3, 200000, 9, 2),
(14, 1, 390000, 9, 3),
(15, 3, 200000, 10, 2),
(16, 1, 390000, 10, 3),
(17, 1, 200000, 11, 2),
(18, 1, 200000, 12, 2),
(19, 3, 200000, 13, 2),
(20, 1, 200000, 14, 2),
(21, 1, 200000, 15, 2),
(22, 1, 200000, 16, 2),
(23, 1, 200000, 17, 2),
(24, 3, 200000, 18, 2),
(25, 4, 390000, 18, 3),
(26, 2, 200000, 19, 2),
(27, 1, 390000, 19, 3),
(28, 2, 200000, 20, 2),
(29, 3, 390000, 20, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `countries`
--

CREATE TABLE `countries` (
  `countryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `countries`
--

INSERT INTO `countries` (`countryName`) VALUES
('Afghanistan'),
('Albania'),
('Algeria'),
('Andorra'),
('Angola'),
('Antigua và Barbuda'),
('Argentina'),
('Armenia'),
('Australia'),
('Áo'),
('Azerbaijan'),
('Bahamas'),
('Bahrain'),
('Bangladesh'),
('Barbados'),
('Belarus'),
('Bỉ'),
('Belize'),
('Benin'),
('Bhutan'),
('Bolivia'),
('Bosnia và Herzegovina'),
('Botswana'),
('Brazil'),
('Brunei'),
('Bulgaria'),
('Burkina Faso'),
('Burundi'),
('Cabo Verde'),
('Campuchia'),
('Cameroon'),
('Canada'),
('Cộng hòa Trung Phi'),
('Chad'),
('Chile'),
('Trung Quốc'),
('Colombia'),
('Comoros'),
('Cộng hòa Dân chủ Congo'),
('Cộng hòa Congo'),
('Costa Rica'),
('Croatia'),
('Cuba'),
('Síp'),
('Cộng hòa Séc'),
('Đan Mạch'),
('Djibouti'),
('Dominica'),
('Cộng hòa Dominica'),
('Ecuador'),
('Ai Cập'),
('El Salvador'),
('Guinea Xích Đạo'),
('Eritrea'),
('Estonia'),
('Eswatini'),
('Ethiopia'),
('Fiji'),
('Phần Lan'),
('Pháp'),
('Gabon'),
('Gambia'),
('Georgia'),
('Đức'),
('Ghana'),
('Hy Lạp'),
('Grenada'),
('Guatemala'),
('Guinea'),
('Guinea-Bissau'),
('Guyana'),
('Haiti'),
('Honduras'),
('Hungary'),
('Iceland'),
('Ấn Độ'),
('Indonesia'),
('Iran'),
('Iraq'),
('Ireland'),
('Israel'),
('Ý'),
('Jamaica'),
('Nhật Bản'),
('Jordan'),
('Kazakhstan'),
('Kenya'),
('Kiribati'),
('Bắc Triều Tiên'),
('Hàn Quốc'),
('Kosovo'),
('Kuwait'),
('Kyrgyzstan'),
('Lào'),
('Latvia'),
('Liban'),
('Lesotho'),
('Liberia'),
('Libya'),
('Liechtenstein'),
('Lithuania'),
('Luxembourg'),
('Madagascar'),
('Malawi'),
('Malaysia'),
('Maldives'),
('Mali'),
('Malta'),
('Quần đảo Marshall'),
('Mauritania'),
('Mauritius'),
('Mexico'),
('Micronesia'),
('Moldova'),
('Monaco'),
('Mông Cổ'),
('Montenegro'),
('Morocco'),
('Mozambique'),
('Myanmar'),
('Namibia'),
('Nauru'),
('Nepal'),
('Hà Lan'),
('New Zealand'),
('Nicaragua'),
('Niger'),
('Nigeria'),
('Bắc Macedonia'),
('Na Uy'),
('Oman'),
('Pakistan'),
('Palau'),
('Palestine'),
('Panama'),
('Papua New Guinea'),
('Paraguay'),
('Peru'),
('Philippines'),
('Ba Lan'),
('Bồ Đào Nha'),
('Qatar'),
('Romania'),
('Nga'),
('Rwanda'),
('Saint Kitts và Nevis'),
('Saint Lucia'),
('Saint Vincent và Grenadines'),
('Samoa'),
('San Marino'),
('Sao Tome và Principe'),
('Ả Rập Xê-út'),
('Senegal'),
('Serbia'),
('Seychelles'),
('Sierra Leone'),
('Singapore'),
('Slovakia'),
('Slovenia'),
('Quần đảo Solomon'),
('Somalia'),
('Nam Phi'),
('Nam Sudan'),
('Tây Ban Nha'),
('Sri Lanka'),
('Sudan'),
('Suriname'),
('Thụy Điển'),
('Thụy Sĩ'),
('Syria'),
('Đài Loan'),
('Tajikistan'),
('Tanzania'),
('Thái Lan'),
('Đông Timor'),
('Togo'),
('Tonga'),
('Trinidad và Tobago'),
('Tunisia'),
('Thổ Nhĩ Kỳ'),
('Turkmenistan'),
('Tuvalu'),
('Uganda'),
('Ukraine'),
('Các Tiểu vương quốc Ả Rập Thống nhất'),
('Vương quốc Anh'),
('Hoa Kỳ'),
('Uruguay'),
('Uzbekistan'),
('Vanuatu'),
('Vatican'),
('Venezuela'),
('Việt Nam'),
('Yemen'),
('Zambia'),
('Zimbabwe');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`customer_id`, `user_id`) VALUES
(51, 9),
(52, 11),
(57, 16),
(60, 19),
(61, 20),
(62, 21),
(63, 22),
(64, 23),
(65, 24),
(66, 25),
(67, 26),
(68, 27),
(69, 28),
(70, 29),
(71, 30),
(72, 31),
(73, 32),
(74, 33),
(75, 34),
(76, 35),
(77, 36),
(79, 38),
(80, 39),
(81, 40);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `employee_address` varchar(1000) NOT NULL,
  `employee_birthday` date NOT NULL,
  `employee_sex` int(11) NOT NULL,
  `employee_email` varchar(255) NOT NULL,
  `employee_phone` varchar(255) NOT NULL,
  `employee_id_number` varchar(255) NOT NULL,
  `employee_start_active` time NOT NULL,
  `employee_end_active` time NOT NULL,
  `employee_salary` float NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `employee`
--

INSERT INTO `employee` (`id`, `employee_name`, `employee_address`, `employee_birthday`, `employee_sex`, `employee_email`, `employee_phone`, `employee_id_number`, `employee_start_active`, `employee_end_active`, `employee_salary`, `created_at`, `updated_at`) VALUES
(4, 'Nam', 'Nam Định', '2004-11-25', 1, 'khoindt10a4@gmail.com', '0336749488', '036204017630', '06:00:00', '17:00:00', 300000, '2024-06-24 00:00:00', '2024-06-27 00:00:00'),
(5, 'Khôi', 'Nam Định', '2004-11-25', 1, 'khoindt10a4@gmail.com', '0336749488', '036204017630', '06:00:00', '17:00:00', 300000, '2024-06-24 18:19:33', NULL),
(6, 'Quyền', 'Nam Định', '2004-11-25', 1, 'khoindt10a4@gmail.com', '0336749488', '036204017630', '07:00:00', '17:00:00', 300000, '2024-06-24 18:19:33', '2024-06-27 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `enterservice`
--

CREATE TABLE `enterservice` (
  `enterservice_id` int(11) NOT NULL,
  `enterservice_name` varchar(255) NOT NULL,
  `enterservice_desc` varchar(255) NOT NULL,
  `enterservice_price` int(11) NOT NULL,
  `escate_id` int(11) NOT NULL,
  `max_participants` int(11) DEFAULT NULL,
  `min_participants` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `age_limit` int(11) DEFAULT NULL,
  `enterservice_regulations` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `enterservice`
--

INSERT INTO `enterservice` (`enterservice_id`, `enterservice_name`, `enterservice_desc`, `enterservice_price`, `escate_id`, `max_participants`, `min_participants`, `status`, `created_at`, `updated_at`, `age_limit`, `enterservice_regulations`) VALUES
(7, 'Vượt long môn', 'Dòng sông diệu kỳ uốn lượn cùng những khúc cua “siêu đã”. Điểm đặc biệt là “vượt long môn” - trượt thác từ độ cao 16m, khi thả xuống bọt tung trắng xóa. ', 0, 26, 0, 0, '1', '2024-06-04 10:07:00', '2024-06-27 04:46:32', 16, 'Chiều cao trên 1m'),
(11, 'Bước chân kỳ bí ', 'Trò chơi không dành cho những người yếu tim. Bạn chắc là mình dám chơi? Dù có thế nào bạn cũng nhất định phải thử một lần trong đời. Nếu đi theo team và chơi teambuilding thì còn gì bằng. Cảm giác vượt qua chính mình thật tuyệt vời đó.', 0, 26, NULL, NULL, '1', '2024-06-04 11:01:00', '2024-06-04 11:01:23', 16, 'Chiều cao trên 1.3m'),
(12, 'Cung đường tốc độ', 'Đã nhắc đến “Bước chân kỳ bí” thì không thể bỏ qua trò chơi “cung đường tốc độ”. Hai trò chơi này mới xuất hiện tại tổ hợp giải trí Thiên Đường Bảo Sơn để các bạn chơi tới bến.', 0, 26, NULL, NULL, '1', '2024-06-04 11:03:00', NULL, 13, 'Chiều cao trên 1.3m'),
(13, 'Cú rơi vô cực ', 'Thực sự cho chơi này đã chơi rồi thì không thể quên được cảm giác “run sợ”, chơi xong rồi chân chỉ có nhũn như con chi chi. ', 0, 30, 0, 0, '1', '2024-06-04 11:06:00', '2024-06-05 14:52:27', 13, 'Chiều cao trên 1.3m'),
(14, 'Khủng long trỗi dậy ', 'Bạn có dám thử thách sự dũng cảm của bản thân khi phiêu lưu cùng chú khủng long khổng lồ và vô cùng khó bảo? Đây là trò chơi mang lại nỗi “kinh hoàng” cho tất cả những ai từng chơi.', 0, 30, NULL, NULL, '1', '2024-06-04 11:07:00', '2024-06-04 11:10:58', 13, 'Chiều cao trên 1.3m'),
(15, 'Bay giữa ngân hà ', 'Bạn nào ưa mạo hiểm và cảm giác phiêu phiêu thì trò chơi này sinh ra là để dành cho bạn. Trò chơi chỉ dành cho những người siêu can đảm. Ngày bé ai chẳng một lần ước mơ mình được như những chú chim tự do sải cánh bay lượn trên bầu trời. Hãy thử ngay trò c', 0, 30, NULL, NULL, '1', '2024-06-04 11:07:00', '2024-06-04 11:28:30', 13, 'Chiều cao trên 1.3m'),
(16, 'Chiếu phim 4D', 'Phim 4D kết hợp đồng bộ 1 phim 3D và những hiệu ứng kĩ thuật (vật lý) trong rạp chiếu phim. Một số những hiệu ứng được sử dụng trong phim 4D bao gồm mưa, gió, ánh sáng nhấp nháy,và sự rung chuyển. Việc sử dụng những tia nước và luồng khí cũng rất phổ biến', 0, 31, NULL, NULL, '1', '2024-06-04 11:09:00', '2024-06-04 11:48:08', 0, '  Chiều cao trên 1m'),
(17, 'Chiếu phim XD', 'Phim 2D, 3D, 4D chắc các bạn đã nghe quen rồi, nhưng XD thì chưa nhiều người biết đến. ', 0, 31, NULL, 0, '1', '2024-06-04 11:10:00', '2024-06-04 11:13:16', 10, '  Chiều cao trên 1m'),
(18, 'Nhà ma', 'Bạn sẽ “du hành” vào thế giới âm ti đầy hắc ám. Con đường đi vào vòng vèo tối tăm, những âm thanh kẽo kẹt, tiếng thét rợn người, tiếng quỷ sai cùng những hình ảnh ám ảnh ngay cả trong giấc mơ của bạn.', 0, 30, NULL, NULL, '1', '2024-06-04 11:35:00', NULL, 10, 'Chiều cao trên 1m'),
(19, 'Thuyền cướp biển', '“Thuyền cướp biển” được xếp top những trò chơi cảm giác mạnh trên thế giới. Tuy chỉ là chiếc thuyền lắc lư chuyển động đung đưa quanh trục thôi những cũng khiến bạn hoảng hốt.', 0, 30, NULL, NULL, '1', '2024-06-04 11:36:00', '2024-06-04 11:37:18', 11, 'Chiều cao trên 1.1m'),
(20, 'Ô tô đụng ', 'Một trong những trò chơi xả stress cực hiệu quả đó là “ô tô đụng nhau”, việc của bạn chỉ là lái những chiếc ô tô đồ chơi để chúng va vào nhau. Một trải nghiệm cực thích thú.. Vì ngoài đời chúng ta khổng thể chơi trò này với những chiếc xe thật ngoài đường', 0, 30, NULL, NULL, '1', '2024-06-04 11:37:00', NULL, 12, 'Chiều cao trên 1.2m'),
(21, 'Đu quay dây văng', 'Trò chơi như trong khu vườn cổ tích, mỗi người sẽ ngồi trên chiếc ghế có sợi dây nối dài và quay xung quanh. Cảm giác như đang bay lượn giữa không trung.', 0, 30, NULL, NULL, '1', '2024-06-04 11:38:00', NULL, 11, 'Chiều cao trên 1.1m'),
(22, 'Đu quay mặt trời', 'Chắc hẳn trò chơi này quá quen thuộc với các bạn trẻ. Đa số công viên lớn nào cũng sẽ có trò chơi này. Tuy nhiên, đã đến đây hãy thử đu quay mặt trời tại đây để cảm nhận sự khác biệt.', 0, 30, NULL, NULL, '1', '2024-06-04 11:39:00', '2024-06-04 11:47:34', 0, 'Chiều cao trên 1.1m'),
(23, 'Cao tốc khứ hồi', 'Cao tốc khứ hồi mang đến cho du khách những trải nghiệm phiêu du trên chuyến tàu thần kì ngắm nhìn quang cảnh công viên sau đó kịch tính cùng cú trượt 360 độ giữa không trung khứ hồi trở về vị trí ban đầu, đường ray uốn lượn hình xoắn ốc điệu nghệ thích m', 0, 30, NULL, NULL, '1', '2024-06-04 11:39:00', NULL, 11, 'Chiều cao trên 1.1m'),
(24, 'Vườn thú Safari', 'Khám phá thiên nhiên hoang dã và các loài chim muôn thú rừng quý hiếm là trải nghiệm tuyệt với của du khách khi tới đây. ', 0, 26, NULL, NULL, '1', '2024-06-04 11:53:00', NULL, 0, ''),
(25, 'Khám phá cung cá nước ngọt và nước lợ', 'Hành trình khám phá thủy cung, du khách bắt đầu chuyến đi đầy hào hứng với khu vực cá nước ngọt nổi bật với các loài sinh vật như: cá Hải tượng, cá Sấu hỏa tiễn với chiếc mõm dài và hung dữ như cá sấu, đàn cá Đĩa hiền lành nhiều màu sắc, đàn cá Rồng hắc l', 0, 27, NULL, NULL, '1', '2024-06-04 11:55:00', '2024-06-04 17:19:59', 0, 'Không có'),
(26, 'Khám phá cung cá nước mặn', 'Thủy cung khu nước mặn vừa được đầu tư nâng cấp xây dựng mới với thiết kế độc đáo. Du khách sẽ đắm chìm vào không gian đại dương bao la xanh thẳm dưới đường hầm mái vòm trong suốt, tận mắt chứng kiến những loài cá mập, cùng hàng ngàn các loài sinh vật cùn', 0, 27, NULL, NULL, '1', '2024-06-04 11:55:00', '2024-06-04 17:20:11', 0, 'Không có'),
(27, 'Khám phá cung Thế giới động vật ', 'Được chia thành 4 khu: Khu trưng bày động vật hoang mạc, Khu trưng bày động vật hoang dã, Khu trưng bày động vật thủy sinh và Khu trưng bày động vật đới lạnh chắc chắn sẽ là một trải nghiệm vô cùng đáng nhớ đối với du khách, đặc biệt là các bạn nhỏ.', 0, 27, NULL, NULL, '1', '2024-06-04 11:56:00', '2024-06-04 17:20:20', 0, 'Không có'),
(28, 'Vườn thú cưng', 'Vườn thú cưng là nơi trú ngụ của thỏ, chuột lang và gà con. Những loài động vật nhỏ bé, tinh nghịch với đôi mắt tròn xoe đã chiếm trọn trái tim của du khách ngay lần đầu gặp gỡ. Chắc hẳn ai ai cũng không thể kiềm lòng mà ngắm nghía chúng hồi lâu và nhẹ nh', 0, 28, NULL, NULL, '1', '2024-06-04 11:57:00', NULL, 0, ''),
(29, 'Đảo tí hon', 'Đảo tí hon là khu vui chơi ngoài trời dành cho bé ngay trong khuôn viên của Happy Farm. Không chỉ đơn thuần như cầu trượt, xích đu,... thông thường, các trò chơi tại Đảo tí hon được lựa chọn tỉ mỉ từ chất liệu cho đến màu sắc, vừa là nơi cho các bé thỏa t', 0, 28, NULL, NULL, '1', '2024-06-04 11:57:00', NULL, 0, ''),
(30, 'Góc sáng tạo và Khu vườn vui nhộn ', 'Các bé sẽ được lạc vào khu vườn xanh mát với những loài cây quen thuộc như: cà chua, dâu tây,... trổ tài làm nông dân nhí, tham gia các lớp học sáng tạo: trồng cây, thu hoạch mùa vụ, làm bánh. ', 0, 28, NULL, NULL, '1', '2024-06-04 11:58:00', NULL, 0, ''),
(31, 'Quầy nông trang', 'Quầy nông trang - địa điểm trưng bày, cho thuê trang phục chụp ảnh và bán các sản phẩm lưu niệm “độc quyền” Happy Farm cho du khách khi có dịp ghé thăm nông trại. Bạn có thể dễ dàng tìm thấy bộ đồ cao bồi cho bé để lên ảnh siêu ngầu hay sắm sửa những món ', 0, 28, NULL, NULL, '1', '2024-06-04 11:58:00', NULL, 0, ''),
(32, 'Đảo rùa vui nhộn', 'Tại Đảo rùa vui nhộn, các bạn nhỏ có thể thỏa thích chơi đùa tại khu vui chơi nước trên cạn ngộ nghĩnh cũng như trò chơi Vũ điệu xúc tu với những đường trượt ngắn sặc sỡ sắc màu, được nhập khẩu đồng bộ từ Canada.', 0, 29, 0, 0, '1', '2024-06-04 11:59:00', '2024-06-06 10:12:07', 0, 'Không có'),
(33, 'Vịnh mùa xuân', 'Du khách sẽ được đắm mình trong làn nước xanh mát tại các bể bơi vô cực hay thư thái thả trôi trên sông lười và nằm dài trong các chòi thảnh thơi dưới những bóng cây nhiệt đới. Cả gia đình sẽ cùng thỏa sức vui đùa với hệ thống 7 làn trượt và gần trăm trải', 0, 29, NULL, NULL, '1', '2024-06-04 12:00:00', NULL, 0, ''),
(34, 'Vịnh tàu đắm', 'Du khách sẽ được đắm mình trong làn nước xanh mát tại các bể bơi vô cực hay thư thái thả trôi trên sông lười và nằm dài trong các chòi thảnh thơi dưới những bóng cây nhiệt đới. Cả gia đình sẽ cùng thỏa sức vui đùa với hệ thống 7 làn trượt và gần trăm trải', 0, 29, NULL, NULL, '1', '2024-06-04 12:01:00', '2024-06-04 12:01:29', 0, 'Không có'),
(46, 'Đền Taj Mahal - Viên ngọc quý của Ấn Độ', 'Ngôi đền Taj Mahal gắn liền với câu chuyện về tình yêu bất diệt của hoàng đế Shah Jahan với người vợ yêu quý là hoàng hậu Mumtaz Mahah. Kỳ quan đặc biệt của đất nước Ấn Độ được mệnh danh như một hình mẫu tuyệt vời của kiến trúc MoGon.', 0, 32, NULL, NULL, '1', '2024-06-05 17:06:00', NULL, 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `enterservice_category`
--

CREATE TABLE `enterservice_category` (
  `escate_id` int(11) NOT NULL,
  `escate_name` varchar(255) NOT NULL,
  `escate_desc` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `escate_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `enterservice_category`
--

INSERT INTO `enterservice_category` (`escate_id`, `escate_name`, `escate_desc`, `created_at`, `updated_at`, `status`, `escate_img`) VALUES
(26, 'Tổ hợp Safari ', 'Tổ hợp Safari gồm tổ hợp thác nước, vườn chim, tạo hình sông núi như trong một khu rừng nguyên sinh. Đây là thế giới hoang dã với rất nhiều chủng loại động vật khác nhau từ các loài động vật ăn cỏ, động vật ăn thịt đến chim chóc.', '2024-06-03', '2024-06-24', '1', 'escate-1719213330.jpg'),
(27, 'Thủy cung', 'Nếu trót yêu thế giới đại dương bao la, muôn màu thì Thủy cung sẽ là điểm đến mà bạn không nên bỏ lỡ. Hãy ghé thăm Thủy cung để tìm hiểu thế giới đại dương huyền bí.', '2024-06-03', '2024-06-24', '1', 'escate-1719213444.png'),
(28, 'Happy Farm', 'Nông trại vui vẻ được chia thành các khu: Vườn thú cưng, Trại thú nuôi, Đảo vịt, Đảo tí hon, Góc sáng tạo, Khu vườn vui nhộn, Quầy nông trang, Tiệm ăn Hạt dẻ và khu lưu trú farmstay.', '2024-06-03', '2024-06-24', '1', 'escate-1719213455.jpg'),
(29, 'Công viên nước', 'Trong lịch sử, Castaway Lagoon là một đầm phá đầy bí ẩn, được tạo hóa cất giữ trong suốt nhiều năm, một thiên đường trù phú chỉ được khám phá khi những con thuyền không thể chống cự lại cơn thịnh nộ của bão tố mà trôi dạt vào đây.', '2024-06-03', '2024-06-24', '1', 'escate-1719213471.png'),
(30, 'Trò chơi cảm giác mạnh', 'Nơi hội tụ các trò chơi cảm giác mạnh hot hit. Hàng loạt những trò chơi mạo hiểm, sôi động, hấp dẫn dành cho các lứa tuổi khác nhau, tổ hợp trò chơi tại đây thu hút và gây ấn tượng với mọi du khách. Đây là miền đất của những giấc mơ và chuyến phiêu lưu.', '2024-06-03', '2024-06-24', '1', 'escate-1719213500.jpg'),
(31, 'Rạp Phim Bay', 'Rạp Phim Bay Fly Over đã nhận được hàng ngàn sự yêu thích từ du khách thập phương và bạn bè quốc tế. Loại hình phim độc đáo này có gì mà chưa từng có dấu hiệu “hạ nhiệt&#34;.', '2024-06-03', '2024-06-24', '1', 'escate-1719213510.jpg'),
(32, 'Phim trường', 'Chẳng cần phải sang trời tây, tại Hà Nội cũng có thiên đường mộng mơ mang tên Phim trường Kỳ quan thế giới.', '2024-06-03', '2024-06-24', '1', 'escate-1719213523.jpg'),
(35, 'Trò chơi dành cho trẻ em', 'Nhẹ nhàng hơn, đảm bảo phù hợp với mọi lứa tuổi, dù là các bạn nhỏ hay các mẹ “yếu tim” vẫn có thể chơi vô tư.', '2024-06-04', '2024-06-24', '1', 'escate-1719213567.jpg'),
(43, 'Làng nghề', 'Khu làng nghề có diện tích 10.000 m2 quy tụ những sản phẩm thủ công đặc sắc của 13 làng nghề phía Bắc Việt Nam trong một không gian mang đậm bản sắc dân tộc. Du khách đến đây sẽ được chứng kiến quy...', '2024-06-24', NULL, '1', 'escate-1719213617.jpg'),
(44, 'Ẩm thực', 'Đến với Công viên Thiên đường Bảo Sơn du khách không chỉ được trải nghiệm tổ hợp vui chơi - giải trí tất cả trong 1 tại Hà Nội mà còn được thưởng thức những món ăn ngon trong công viên với hệ thống...', '2024-06-24', NULL, '1', 'escate-1719213651.jpg'),
(45, 'Lưu trú', 'Bên cạnh ẩm thực, dịch vụ lưu trú tại công viên Thiên đường Bảo Sơn cũng khiến không ít du khách choáng ngợp. Nằm ngay trong công viên Thiên đường Bảo Sơn, du khách có thể lựa chọn nghỉ ngơi tại...', '2024-06-24', NULL, '1', 'escate-1719213692.jpg'),
(46, 'Hội trường', 'Với thế mạnh về không gian có sức chứa “khủng”, có thể điều chỉnh linh hoạt theo từng quy mô tiệc, Baoson Palace xứng đáng trở thành điểm đến lý tưởng của các doanh nghiệp, tổ chức có nhu cầu tổ...', '2024-06-24', NULL, '1', 'escate-1719213711.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(255) DEFAULT NULL,
  `event_desc` varchar(255) DEFAULT NULL,
  `event_content` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `event_image` varchar(255) DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `event_desc`, `event_content`, `created_at`, `event_image`, `updated_at`) VALUES
(11, 'HÈ VI VU - TRỌN GÓI THẢ GA - CHÀO HÈ CỰC ĐÃ', 'Công viên Thiên Đường Bảo Sơn tưng bừng chào hè 2024 với giá vé trọn gói cực tiết kiệm.', 'Công viên Thiên Đường Bảo Sơn mở cửa tất cả các ngày trong tuần (Thứ 2 - Chủ Nhật) từ 8h00 - 17h00 với giá vé trọn gói áp dụng từ ngày 20/5 - 4/9/2024 cụ thể như sau: &#13;&#10;&#13;&#10;Khách cao dưới 1m: Miễn phí&#13;&#10;Khách cao từ 1m - 1.3m: 320.000', '2024-06-08', 'event-1717838232.png', '2024-06-26'),
(12, 'ĐIỂM VUI CHƠI CUỐI TUẦN LÝ TƯỞNG VÀO MÙA HÈ CHO CÁC GIA ĐÌNH', '&#13;&#10;ĐIỂM VUI CHƠI CUỐI TUẦN LÝ TƯỞNG VÀO MÙA HÈ CHO CÁC GIA ĐÌNH', 'Hè đến mang theo những háo hức của các em nhỏ về kỳ nghỉ nhiều trải nghiệm sau một năm học tập vất vả. Đó là lúc công viên Thiên Đường Bảo Sơn đồng hành với các bậc phụ huynh để thiết kế những chuyến vui chơi tuyệt vời với đa dạng các hoạt động giáo dục v', '2024-06-08', 'event-1717839426.jpg', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_album`
--

CREATE TABLE `image_album` (
  `image_id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `new_id` int(11) NOT NULL,
  `new_title` longtext DEFAULT NULL,
  `new_desc` longtext DEFAULT NULL,
  `new_image` varchar(10000) DEFAULT NULL,
  `created_at` date NOT NULL,
  `new_type` varchar(255) NOT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`new_id`, `new_title`, `new_desc`, `new_image`, `created_at`, `new_type`, `updated_at`) VALUES
(9, 'TẾT THIẾU NHI VUI HẾT CỠ TẠI CÔNG VIÊN THIÊN ĐƯỜNG BẢO SƠN ', 'TẾT THIẾU NHI VUI HẾT CỠ TẠI CÔNG VIÊN THIÊN ĐƯỜNG BẢO SƠN ', 'new-1719408735.jpg', '2024-06-06', '0', '2024-06-26'),
(10, 'KHÁM PHÁ VƯƠNG QUỐC KHỦNG LONG 7D SIÊU THỰC TẠI  THỦY CUNG THIÊN ĐƯỜNG BẢO SƠN ', 'Vương quốc Khủng long tại tầng 4 Thủy cung Thiên Đường Bảo Sơn được ra mắt từ tháng 4/2024 quy tụ hàng trăm loài khủng long lớn nhỏ thu hút sự quan tâm và yêu thích của đông đảo du khách, đặc biệt là các bạn nhỏ ', 'new-1717697005.jpg', '2024-06-06', '0', '2024-06-09'),
(15, 'ĐÓN TẾT THIẾU NHI, CHO CON ĐI NGAY CÔNG VIÊN THIÊN ĐƯỜNG BẢO SƠN   ', '', 'new-1717745425.jpg', '2024-06-07', '0', NULL),
(16, '[INFOGRAPHIC] GỢI Ý LỊCH TRÌNH HÈ VI VU TẠI CÔNG VIÊN THIÊN ĐƯỜNG BẢO SƠN', '', 'new-1717745480.png', '2024-06-07', '0', NULL),
(17, ' CÙNG BÉ TÌM HIỂU LỊCH SỬ VÀ NHỮNG NÉT ĐẸP TRUYỀN THỐNG DÂN TỘC VIỆT NAM TẠI CÔNG', '', 'new-1717745504.jpg', '2024-06-07', '0', NULL),
(18, ' GỢI Ý LỊCH TRÌNH DÃ NGOẠI DÀNH CHO HỌC SINH MẦM NON TẠI CÔNG VIÊN THIÊN ĐƯỜNG', '', 'new-1717745523.jpg', '2024-06-07', '0', NULL),
(19, ' PHÒNG CHIẾU PHIM BAY THIÊN ĐƯỜNG BẢO SƠN CHÍNH THỨC ĐÓN KHÁCH TRỞ LẠI TỪ', '', 'new-1717745537.jpg', '2024-06-07', '0', NULL),
(20, ' ƯU ĐÃI KHỦNG THÁNG 5 - MUA VÉ CỰC HỜI TẠI CÔNG VIÊN THIÊN ĐƯỜNG BẢO SƠN ', '', 'new-1717745557.png', '2024-06-07', '0', NULL),
(21, ' TỔ HỢP CÁC TRÒ CHƠI DÀNH RIÊNG CHO BÉ TẠI CÔNG VIÊN THIÊN ĐƯỜNG BẢO SƠN ', '', 'new-1717745575.jpg', '2024-06-07', '0', NULL),
(23, 'CÔNG VIÊN THIÊN ĐƯỜNG BẢO SƠN CẬP NHẬT GIÁ VÉ TỪ NGÀY 27/4 - 1/5/2024 ', '', 'new-1717930928.jpg', '2024-06-09', '0', '2024-06-09'),
(24, ' CÔNG VIÊN NƯỚC TẠI THIÊN ĐƯỜNG BẢO SƠN MỞ BÁN VÉ LẺ ĐỒNG GIÁ, VUI TỚI BÊN SAU', '', 'new-1717935620.png', '2024-06-09', '0', NULL),
(25, ' TỔNG HỢP NHỮNG KHOẢNH KHẮC ĐÁNG NHỚ TRONG SỰ KIỆN HULA SUMMER TẠI CÔNG VIÊN', '', 'new-1717935856.jpg', '2024-06-09', '0', NULL),
(32, ' ĐIỂM VUI CHƠI CUỐI TUẦN LÝ TƯỞNG VÀO MÙA HÈ CHO CÁC GIA ĐÌNH', 'Hè đến mang theo những háo hức của các em nhỏ về kỳ nghỉ nhiều trải nghiệm sau một năm học tập vất vả. Đó là lúc công viên Thiên Đường Bảo Sơn đồng hành với các bậc phụ huynh để thiết kế những chuyến vui chơi tuyệt vời với đa dạng các hoạt động giáo dục và giải trí mới mẻ, lý thú dành riêng cho các thiên thần nhí trong không gian vui chơi rộng rãi, chan hòa với thiên nhiên.', 'new-1717954875.jpg', '2024-06-09', '1', '2024-06-09'),
(33, ' CÔNG VIÊN THIÊN ĐƯỜNG BẢO SƠN CẬP NHẬT BẢNG GIÁ VÉ MÙA HÈ 2024  ', '', 'new-1717956567.jpg', '2024-06-09', '0', NULL),
(34, ' GIÁ VÉ THÁNG 5/2024 TẠI CÔNG VIÊN THIÊN ĐƯỜNG BẢO SƠN ', '', 'new-1717956777.jpg', '2024-06-09', '0', NULL),
(35, ' [INFOGRAPHIC] GỢI Ý LỊCH TRÌNH VI VU HULA SUMMER TẠI CÔNG VIÊN THIÊN ĐƯỜNG BẢO SƠN', '', 'new-1717956796.png', '2024-06-09', 'Chọn loại tin', NULL),
(36, 'GỢI Ý CÁC ĐỊA ĐIỂM ĂN UỐNG VÀ LƯU TRÚ TẠI CÔNG VIÊN THIÊN ĐƯỜNG BẢO SƠN TRONG DỊP', '', 'new-1717956842.jpg', '2024-06-09', '0', NULL),
(37, ' LỊCH BIỂU DIỄN CÁC CHƯƠNG TRÌNH NGHỆ THUẬT SỰ KIỆN HULA SUMMER TẠI CÔNG VIÊN', '', 'new-1717956861.jpg', '2024-06-09', '0', NULL),
(38, ' BÙNG NỔ SIÊU SỰ KIỆN HULA SUMMER TẠI CÔNG VIÊN THIÊN ĐƯỜNG BẢO SƠN DỊP NGHỈ LỄ', '', 'new-1717956889.jpg', '2024-06-09', '0', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news_image`
--

CREATE TABLE `news_image` (
  `new_image_id` int(11) NOT NULL,
  `new_image_info` mediumtext NOT NULL,
  `new_content_id` int(11) NOT NULL,
  `new_image_name` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `new_content`
--

CREATE TABLE `new_content` (
  `new_content_id` int(11) NOT NULL,
  `content` mediumtext NOT NULL,
  `new_id` int(11) NOT NULL,
  `new_content_heading` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `serviceCate_id` int(11) NOT NULL,
  `service_title` varchar(1000) NOT NULL,
  `service_img` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `service`
--

INSERT INTO `service` (`service_id`, `serviceCate_id`, `service_title`, `service_img`, `created_at`, `updated_at`) VALUES
(1, 3, 'BẢNG GIÁ VÉ CÔNG VIÊN THIÊN ĐƯỜNG BẢO SƠN HÈ 2024 (TỪ 18/5 - 4/9/2024)', 'priceTable-1718029633.png', '2024-06-10 16:27:13', '2024-06-26 19:29:48'),
(2, 3, 'BẢNG QUY ĐỊNH CHIỀU CAO TỔ HỢP TRÒ CHƠI TẠI CÔNG VIÊN THIÊN ĐƯỜNG BẢO', 'priceTable-1718029815.png', '2024-06-10 16:30:15', NULL),
(3, 3, 'LỊCH BIỂU DIỄN NGHỆ THUẬT CỐ ĐỊNH', 'priceTable-1718030124.png', '2024-06-10 16:35:24', NULL),
(4, 3, 'LỊCH HOẠT ĐỘNG VÀ GIÁ VÉ CÔNG VIÊN NƯỚC CASTAWAY LAGOON', 'priceTable-1718033832.png', '2024-06-10 17:37:12', NULL),
(5, 4, 'NHÀ HÀNG SEA BAY 2 TẦNG', 'priceTable-1718035914.jpg', '2024-06-10 18:11:54', NULL),
(6, 4, ' ẨM THỰC PHỐ CỔ  ẨM THỰC PHỐ CỔ', 'priceTable-1718035932.jpg', '2024-06-10 18:12:12', NULL),
(7, 4, 'NHÀ HÀNG TIỆM ĂN HẠT DẺ', 'priceTable-1718035941.png', '2024-06-10 18:12:21', NULL),
(8, 4, 'NHÀ HÀNG HOBBY (CHỈ NHẬN ĐẶT TRƯỚC)', 'priceTable-1718035953.jpg', '2024-06-10 18:12:33', NULL),
(9, 4, 'TỔ HỢP CAFE VÀ NHÀ HÀNG MÂY QUÁN', 'priceTable-1718035965.jpg', '2024-06-10 18:12:45', NULL),
(10, 4, ' LỊCH HOẠT ĐỘNG HỆ THỐNG ẨM THỰC ÁP DỤNG TỪ 3/6/2024 LỊCH HOẠT ĐỘNG HỆ THỐNG ẨM THỰC ÁP DỤNG TỪ 3/6/2024', 'priceTable-1718035976.png', '2024-06-10 18:12:56', NULL),
(11, 5, 'BẢNG GIÁ KHÁCH SẠN BAOSON PARADISE', 'priceTable-1718040131.png', '2024-06-10 19:22:11', NULL),
(12, 5, 'BẢNG GIÁ HOMESTAY NHÀ TRÊN CÂY MEXICO', 'priceTable-1718040148.png', '2024-06-10 19:22:28', NULL),
(13, 5, 'BẢNG GIÁ HOMESTAY LÀNG PHÁP', 'priceTable-1718040162.png', '2024-06-10 19:22:42', NULL),
(14, 5, 'BẢNG GIÁ BAOSON FARMSTAY', 'priceTable-1718040174.png', '2024-06-10 19:22:54', NULL),
(15, 5, ' BẢNG GIÁ NHÀ NGHỈ CỘNG ĐỒNG  BẢNG GIÁ NHÀ NGHỈ CỘNG ĐỒNG', 'priceTable-1718040187.png', '2024-06-10 19:23:07', NULL),
(16, 6, 'TỔ CHỨC SỰ KIỆN NGOÀI TRỜI', 'priceTable-1718040219.png', '2024-06-10 19:23:39', NULL),
(17, 6, 'TỔ CHỨC SỰ KIỆN TRONG HỘI TRƯỜNG', 'priceTable-1718040231.png', '2024-06-10 19:23:51', NULL),
(18, 6, 'TỔ CHỨC CÁC SỰ KIỆN GIA ĐÌNH, HỌP LỚP, TRI ÂN TRỌN GÓI', 'priceTable-1718040244.png', '2024-06-10 19:24:04', NULL),
(19, 6, 'TỔ CHỨC TIỆC CƯỚI TRỌN GÓI', 'priceTable-1718040253.png', '2024-06-10 19:24:13', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `service_category`
--

CREATE TABLE `service_category` (
  `serviceCate_id` int(11) NOT NULL,
  `serviceCate_name` varchar(1000) NOT NULL,
  `serviceCate_icon` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `service_category`
--

INSERT INTO `service_category` (`serviceCate_id`, `serviceCate_name`, `serviceCate_icon`, `created_at`, `updated_at`) VALUES
(3, 'Dịch vụ vui chơi, giải trí', 'service-1718012137.png', '2024-06-10 10:34:18', '2024-06-28 08:50:01'),
(4, 'Dịch vụ ẩm thực', 'service-1718012151.png', '2024-06-10 11:35:51', '2024-06-26 15:03:13'),
(5, 'Dịch vụ lưu trú', 'service-1718012163.png', '2024-06-10 11:36:03', NULL),
(6, 'Tổ chức sự kiện', 'service-1718012177.png', '2024-06-10 11:36:17', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL,
  `ticket_name` varchar(255) DEFAULT NULL,
  `price` decimal(10,3) DEFAULT NULL,
  `ticket_icon` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `ticket_name`, `price`, `ticket_icon`, `created_at`, `updated_at`) VALUES
(2, 'Vé tham quan khách cao từ 1m - 1,3m', 200.000, 'service-1719048523.png', '2024-06-22 11:28:43', '2024-06-26 16:00:17'),
(3, 'Vé tham quan khách cao trên 1,3m', 390.000, 'service-1719048567.png', '2024-06-22 11:29:27', '2024-06-28 14:19:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` mediumtext NOT NULL,
  `country` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `id_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `name`, `address`, `country`, `email`, `phone`, `created_at`, `updated_at`, `id_number`) VALUES
(9, 'Nguyễn Văn Khôi', 'Số 10 Ngách 23 ngõ 79 Triều Khúc', 'Việt Nam', '1@gmail.com', '0336749488', '2024-06-28 10:40:34', NULL, '012345678910'),
(10, 'Nguyễn Văn Khôi', 'Số 10 Ngách 23 ngõ 79 Triều Khúc', 'Việt Nam', 'khoindt10a4@gmail.com', '0336749488', '2024-06-28 10:41:30', NULL, '012345678910'),
(11, 'Nguyễn Văn Khôi', 'Số 10 Ngách 23 ngõ 79 Triều Khúc', 'Việt Nam', 'nvkxxx04@gmail.com', '0336749488', '2024-06-28 11:38:14', NULL, '012345678910'),
(16, 'Nguyễn Văn Khôi12345', 'Số 10 Ngách 23 ngõ 79 Triều Khúc', 'Việt Nam', 'khoindt10a4@gmail.com', '0336749488', '2024-06-28 12:07:46', NULL, '123'),
(19, 'Lê Huy Thăng', 'Số 10 Ngách 23 ngõ 79 Triều Khúc', 'Việt Nam', 'khoindt10a4@gmail.com', '0336749488', '2024-06-28 14:48:08', NULL, '123'),
(20, 'Hoàng Văn Vũ', 'Số 10 Ngách 23 ngõ 79 Triều Khúc', 'Việt Nam', 'khoindt10a4@gmail.com', '0336749488', '2024-06-28 14:57:05', NULL, '123'),
(21, 'Phạm Thành Nam', 'Số 10 Ngách 23 ngõ 79 Triều Khúc', 'Việt Nam', 'khoindt10a4@gmail.com', '0336749488', '2024-06-28 16:44:52', NULL, '123'),
(22, 'Đỗ Minh Quyền', 'Số 10 Ngách 23 ngõ 79 Triều Khúc', 'Việt Nam', 'khoindt10a4@gmail.com', '0336749488', '2024-06-28 16:51:17', NULL, '123'),
(23, 'Trịnh Thị Hạnh', 'Số 10 Ngách 23 ngõ 79 Triều Khúc', 'Việt Nam', 'khoindt10a4@gmail.com', '0336749488', '2024-06-28 16:51:57', NULL, '123'),
(24, 'Nguyễn Văn Khôi', 'Số 10 Ngách 23 ngõ 79 Triều Khúc', 'Việt Nam', 'khoindt10a4@gmail.com', '0336749488', '2024-06-28 16:53:28', NULL, '123'),
(25, 'Nguyễn Văn B', 'Số 10 Ngách 23 ngõ 79 Triều Khúc', 'Việt Nam', 'khoindt10a4@gmail.com', '0336749488', '2024-06-28 17:03:50', NULL, '123'),
(26, 'Nguyễn Văn C', 'Số 10 Ngách 23 ngõ 79 Triều Khúc', 'Việt Nam', 'khoindt10a4@gmail.com', '0336749488', '2024-06-28 17:04:30', NULL, '123'),
(27, 'Nguyễn Văn D', 'Số 10 Ngách 23 ngõ 79 Triều Khúc', 'Việt Nam', 'khoindt10a4@gmail.com', '0336749488', '2024-06-28 17:06:56', NULL, '123'),
(28, 'Nguyễn Văn E', 'Số 10 Ngách 23 ngõ 79 Triều Khúc', 'Việt Nam', 'khoindt10a4@gmail.com', '0336749488', '2024-06-28 17:08:52', NULL, '123'),
(29, 'Nguyễn Văn F', 'Số 10 Ngách 23 ngõ 79 Triều Khúc', 'Việt Nam', 'khoindt10a4@gmail.com', '0336749488', '2024-06-28 17:14:25', NULL, '123'),
(30, 'Nguyễn Văn L', 'Số 10 Ngách 23 ngõ 79 Triều Khúc', 'Việt Nam', 'khoindt10a4@gmail.com', '0336749488', '2024-06-28 17:15:23', NULL, '123'),
(31, 'Nguyễn Văn P', 'Số 10 Ngách 23 ngõ 79 Triều Khúc', 'Việt Nam', 'khoindt10a4@gmail.com', '0336749488', '2024-06-28 17:15:45', NULL, '123'),
(32, 'Nguyễn Văn U', 'Số 10 Ngách 23 ngõ 79 Triều Khúc', 'Việt Nam', 'khoindt10a4@gmail.com', '0336749488', '2024-06-28 17:17:33', NULL, '123'),
(33, 'Nguyễn Văn Y', 'Số 10 Ngách 23 ngõ 79 Triều Khúc', 'Việt Nam', 'khoindt10a4@gmail.com', '0336749488', '2024-06-28 17:40:55', NULL, '123'),
(34, 'Nguyễn Văn A', 'Số 10 Ngách 23 ngõ 79 Triều Khúc', 'Việt Nam', 'khoindt10a4@gmail.com', '0336749488', '2024-06-28 17:47:49', NULL, '123'),
(35, 'Nguyễn Văn X', 'Số 10 Ngách 23 ngõ 79 Triều Khúc', 'Việt Nam', 'khoindt10a4@gmail.com', '0336749488', '2024-06-29 03:10:08', NULL, '123'),
(36, 'Nguyễn Văn S', 'Số 10 Ngách 23 ngõ 79 Triều Khúc', 'Việt Nam', 'khoindt10a4@gmail.com', '0336749488', '2024-06-29 03:12:30', NULL, '123'),
(38, 'Nguyễn Văn Q', 'Số 10 Ngách 23 ngõ 79 Triều Khúc', 'Việt Nam', 'khoindt10a4@gmail.com', '0336749488', '2024-06-29 03:16:11', NULL, '123'),
(39, 'Nguyễn Văn Z', 'Số 10 Ngách 23 ngõ 79 Triều Khúc', 'Việt Nam', 'khoindt10a4@gmail.com', '0336749488', '2024-06-29 03:20:32', NULL, '123'),
(40, 'Nguyễn Văn Khôi', 'Số 10 Ngách 23 ngõ 79 Triều Khúc', 'Việt Nam', 'khoindt10a4@gmail.com', '0336749488', '2024-06-29 03:21:51', NULL, '123');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`album_id`);

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `escate_id` (`escate_id`);

--
-- Chỉ mục cho bảng `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `booking_detail`
--
ALTER TABLE `booking_detail`
  ADD PRIMARY KEY (`booking_detail_id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `ticket_id` (`ticket_id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `enterservice`
--
ALTER TABLE `enterservice`
  ADD PRIMARY KEY (`enterservice_id`),
  ADD KEY `cate_id` (`escate_id`),
  ADD KEY `cate_id_2` (`escate_id`),
  ADD KEY `cate_id_3` (`escate_id`);

--
-- Chỉ mục cho bảng `enterservice_category`
--
ALTER TABLE `enterservice_category`
  ADD PRIMARY KEY (`escate_id`);

--
-- Chỉ mục cho bảng `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Chỉ mục cho bảng `image_album`
--
ALTER TABLE `image_album`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `album_id` (`album_id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`new_id`);

--
-- Chỉ mục cho bảng `news_image`
--
ALTER TABLE `news_image`
  ADD PRIMARY KEY (`new_image_id`),
  ADD KEY `new_content_id` (`new_content_id`);

--
-- Chỉ mục cho bảng `new_content`
--
ALTER TABLE `new_content`
  ADD PRIMARY KEY (`new_content_id`),
  ADD KEY `new_id` (`new_id`);

--
-- Chỉ mục cho bảng `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `serviceCate_id` (`serviceCate_id`);

--
-- Chỉ mục cho bảng `service_category`
--
ALTER TABLE `service_category`
  ADD PRIMARY KEY (`serviceCate_id`);

--
-- Chỉ mục cho bảng `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `album`
--
ALTER TABLE `album`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `booking_detail`
--
ALTER TABLE `booking_detail`
  MODIFY `booking_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT cho bảng `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `enterservice`
--
ALTER TABLE `enterservice`
  MODIFY `enterservice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `enterservice_category`
--
ALTER TABLE `enterservice_category`
  MODIFY `escate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `image_album`
--
ALTER TABLE `image_album`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `new_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `news_image`
--
ALTER TABLE `news_image`
  MODIFY `new_image_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `new_content`
--
ALTER TABLE `new_content`
  MODIFY `new_content_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `service_category`
--
ALTER TABLE `service_category`
  MODIFY `serviceCate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`escate_id`) REFERENCES `enterservice_category` (`escate_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Các ràng buộc cho bảng `booking_detail`
--
ALTER TABLE `booking_detail`
  ADD CONSTRAINT `booking_detail_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_detail_ibfk_2` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`ticket_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `enterservice`
--
ALTER TABLE `enterservice`
  ADD CONSTRAINT `enterservice_ibfk_1` FOREIGN KEY (`escate_id`) REFERENCES `enterservice_category` (`escate_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `image_album`
--
ALTER TABLE `image_album`
  ADD CONSTRAINT `image_album_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `album` (`album_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `news_image`
--
ALTER TABLE `news_image`
  ADD CONSTRAINT `news_image_ibfk_1` FOREIGN KEY (`new_content_id`) REFERENCES `new_content` (`new_content_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `new_content`
--
ALTER TABLE `new_content`
  ADD CONSTRAINT `new_content_ibfk_1` FOREIGN KEY (`new_id`) REFERENCES `news` (`new_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`serviceCate_id`) REFERENCES `service_category` (`serviceCate_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
