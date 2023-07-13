-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 13, 2023 lúc 12:21 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlsach`
--
CREATE DATABASE IF NOT EXISTS `qlsach` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `qlsach`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `macthd` bigint(20) NOT NULL,
  `masach` varchar(50) NOT NULL,
  `soluongmua` int(11) NOT NULL,
  `mahoadon` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`macthd`, `masach`, `soluongmua`, `mahoadon`) VALUES
(1, 'b12', 10, 1),
(2, 'b12', 12, 1),
(3, 'b12', 34, 1),
(4, 'b12', 2, 3),
(5, 'b14', 4, 3),
(6, 'b16', 2, 4),
(7, 'b18', 1, 4),
(8, 'b17', 4, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangnhap`
--

CREATE TABLE `dangnhap` (
  `tendn` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `quyen` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dangnhap`
--

INSERT INTO `dangnhap` (`tendn`, `password`, `quyen`) VALUES
('abc', '123', 0),
('dencan', '111', 1),
('nhha', '2ezur0ziU1o=', 1),
('nhha76', 'J2A461dUG8UKL/8XBhus3g==', 1),
('vnnquang', '$2y$10$QMP8pM8bIsKE/R9qHEiDt.ZS89x54JeyWXxXyhbWFXDq/YfYcenFW', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `mahoadon` bigint(20) NOT NULL,
  `makh` bigint(20) DEFAULT NULL,
  `ngaymua` datetime NOT NULL,
  `damua` tinyint(4) DEFAULT NULL,
  `diachi` varchar(45) DEFAULT NULL,
  `sodienthoai` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`mahoadon`, `makh`, `ngaymua`, `damua`, `diachi`, `sodienthoai`) VALUES
(1, 20, '2023-07-13 16:37:23', 1, NULL, NULL),
(2, 21, '2023-07-13 16:37:23', 1, NULL, NULL),
(3, 20, '2023-07-13 16:37:23', 0, NULL, NULL),
(4, 23, '2023-07-13 16:46:40', 0, '14 Sông Xanh', '0912345678'),
(5, 23, '2023-07-13 16:47:33', 1, '18 Nguyễn Huệ', '0912345679');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `makh` bigint(20) NOT NULL,
  `hoten` varchar(50) DEFAULT NULL,
  `diachi` varchar(50) DEFAULT NULL,
  `sodt` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tendn` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`makh`, `hoten`, `diachi`, `sodt`, `email`, `tendn`, `password`) VALUES
(20, 'Nguyễn Khắc Chung', 'Huế', NULL, NULL, 'nkchung', '123'),
(21, 'ha ha', 'hu hu', NULL, NULL, 'hic hic', 'hi hi'),
(22, 'ha ha', 'hu hu', NULL, NULL, 'sfhdfa', 'shdg'),
(23, 'Võ Ngọc Nhật Quang', '16 Chi Lăng', '0912345678', 'vnnquang@fsoft.vn', 'vnnquang', '$2y$10$U2s9yqtnEG5GUjxPkA5zXOI9UWHvFlA3JZe97TZ3c0oaerPChJ4XW');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `maloai` varchar(50) NOT NULL,
  `tenloai` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`maloai`, `tenloai`) VALUES
('Bi quyet cuoc song', 'Bí quyết cuộc sống'),
('ccc', 'Con ong chau cha'),
('Chinh tri', 'Chính trị'),
('Dia ly', 'Địa lý abc'),
('Hoa hoc', 'Hoá học'),
('Khoa hoc', 'Khoa học'),
('Kinh te', 'Kinh tế'),
('Lich su', 'Lịch Sử'),
('N;ai ngu', 'N;ại ngữ'),
('On thi CD-DH', 'Ôn thi CĐ-ĐH'),
('Tam ly', 'Tâm lý'),
('Tin', 'Tin Học'),
('Toan', 'Toán Học'),
('trinh tham', 'Trinh thám'),
('Van', 'Văn Học'),
('Vat ly', 'Vật lý'),
('Y hoc', 'Y học');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `masach` varchar(50) NOT NULL,
  `tensach` varchar(50) DEFAULT NULL,
  `soluong` bigint(20) DEFAULT NULL,
  `gia` bigint(20) DEFAULT NULL,
  `maloai` varchar(50) DEFAULT NULL,
  `sotap` varchar(50) DEFAULT NULL,
  `anh` varchar(255) DEFAULT NULL,
  `ngaynhap` datetime DEFAULT NULL,
  `tacgia` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`masach`, `tensach`, `soluong`, `gia`, `maloai`, `sotap`, `anh`, `ngaynhap`, `tacgia`) VALUES
('b1', 'tyi', 124, 1123, 'Bi quyet cuoc song', '1', 'image_sach/b1.jpg', NULL, 'Anne Morrow Lindbergh'),
('b11', 'Tìm lại chính mình', 18, 42000, 'Bi quyet cuoc song', '1', 'image_sach/b11.jpg', NULL, 'Marcia Grad'),
('b12', 'Tìm lại giá trị cuộc sống', 40, 26000, 'Bi quyet cuoc song', '1', 'image_sach/b12.jpg', NULL, 'Mark V. Hansen, Jack Canfield'),
('b14', 'Sứ mệnh yêu thương', 26, 40000, 'Bi quyet cuoc song', '1', 'image_sach/b14.jpg', NULL, 'Roger Cole'),
('b16', 'Con sẽ làm được', 100, 23000, 'Bi quyet cuoc song', '1', 'image_sach/b16.jpg', NULL, 'Donna M.Gennett- Ph.D'),
('b17', 'Đi tìm ý nghĩa cuộc sống', 50, 37000, 'Bi quyet cuoc song', '1', 'image_sach/b17.jpg', NULL, 'ERNIE CARWILE'),
('b18', 'Cảm ơn ký ức', 30, 45000, 'Bi quyet cuoc song', '1', 'image_sach/b18.jpg', NULL, 'CeceliAhern'),
('b19', 'Hạt Giống Tâm Hồn dành cho sinh viên hoc sinh', 20, 22000, 'Bi quyet cuoc song', '2', 'image_sach/b19.jpg', NULL, 'Jack Canield-Mark Victor Hansen'),
('b2', 'Bí mật của may mắn', 10, 18000, 'Bi quyet cuoc song', '1', 'image_sach/b2.jpg', NULL, ' Tổng hợp thành phố Hồ Chí Minh'),
('b20', 'Hạt Giống Tâm Hồn dành riêng cho phụ nữ', 30, 22000, 'Bi quyet cuoc song', '2', 'image_sach/b20.jpg', NULL, 'Jack Canield-Mark Victor Hansen'),
('b21', 'Hạt Giống Tâm Hồn dành cho tuổi Teen', 36, 29000, 'Bi quyet cuoc song', '1', 'image_sach/b21.jpg', NULL, 'Nhiều tác giả First News tổng hợp và thực hiện'),
('b22', 'Làm thế nào để con chăm học', 50, 26000, 'Bi quyet cuoc song', '1', 'image_sach/b22.jpg', NULL, 'Lê Duyên Hải'),
('b24', 'Những giá trị cuộc sống', 56, 27000, 'Bi quyet cuoc song', '1', 'image_sach/b24.jpg', NULL, 'Diane Tillman'),
('b25', 'Quà tặng diệu kỳ', 30, 26000, 'Bi quyet cuoc song', '1', 'image_sach/b25.jpg', NULL, 'Mark V. Hansen, Jack Canfield'),
('b3', 'Chấp cánh tuổi thơ', 15, 24000, 'Bi quyet cuoc song', '1', 'image_sach/b3.jpg', NULL, 'Tổng hợp TP Hồ Chí Minh'),
('b4', 'Hạt giống yêu thương-Chicken Soup for the Soul 20', 20, 30000, 'Bi quyet cuoc song', '1', 'image_sach/b4.jpg', NULL, 'Nhiều tác giả - Tổng hợp và thực hiện First News'),
('b5', 'Gía trị cuộc sống', 30, 14000, 'Bi quyet cuoc song', '1', 'image_sach/b5.jpg', NULL, 'Tổng hợp thành phố Hồ Chí Minh'),
('b6', 'Hãy yêu cuộc sống của bạn chọn', 25, 40000, 'Bi quyet cuoc song', '1', 'image_sach/b6.jpg', NULL, 'Tổng hợp TP Hồ Chí Minh'),
('b7', 'Quà tặng cuộc sống', 30, 19000, 'Bi quyet cuoc song', '1', 'image_sach/b7.jpg', NULL, 'Dr.Bernie S.Siegel'),
('b8', 'Quà tặng tinh thần dành cho phụ nữ', 10, 20000, 'Bi quyet cuoc song', '1', 'image_sach/b8.jpg', NULL, 'Nhiều tác giả - Biên soạn: First News'),
('c10', 'Triết học Phương Đông', 56, 23000, 'Chinh tri', '1', 'image_sach/c10.jpg', NULL, 'M.T.STEPANLANTS'),
('c11', 'Mắt bão - Những năm tháng của tôi tại CIA', 10, 144000, 'Chinh tri', '1', 'image_sach/c11.jpg', NULL, 'George Tenet'),
('c12', '11Võ Văn Kiệt - Đổi mới, bản lĩnh và sáng tạo', 34, 55000, 'Chinh tri', '1', 'image_sach/c12.jpg', NULL, 'Võ Văn Kiệt'),
('c2', 'Các trường phái triết học', 15, 110000, 'Chinh tri', '1', 'image_sach/c2.jpg', NULL, 'David E Cooper'),
('c3', 'Chủ nghĩa Mac-Lênin bàn về TN và công tác TN', 40, 14000, 'Chinh tri', '1', 'image_sach/c3.jpg', NULL, 'Phạm Đình Nghiệp'),
('c5', 'Nhận diện chủ nghĩa tự do mới', 26, 16000, 'Chinh tri', '1', 'image_sach/c5.jpg', NULL, 'Nguyễn Văn Thanh'),
('c6', 'Tư tưởng HCM về dựng nước đi đôi với giữ nước', 10, 56000, 'Chinh tri', '1', 'image_sach/c6.jpg', NULL, 'Viện khoa học xã hội nhân văn quân sự'),
('c7', 'Cuộc chiến ngầm-Bí sử nhà trắng 2006-2008', 5, 130000, 'Chinh tri', '1', 'image_sach/c7.jpg', NULL, 'Bob Woodward'),
('c8', 'Tuyển tập danh tác triết học từ plato đến derrida', 3, 185000, 'Chinh tri', '1', 'image_sach/c8.jpg', NULL, 'Eorrest E.baird'),
('c9', 'Những chuyên đề triết học', 40, 19000, 'Chinh tri', '1', 'image_sach/c9.jpg', NULL, 'Nhà xuất bản-Khoa học xã hội'),
('d1', 'Bản đồ địa lý thế giới', 30, 34000, 'Dia ly', '1', 'image_sach/d1.jpg', NULL, 'Phạm Cao Hoàn'),
('d2', 'Địa lý hành chính Việt Nam', 10, 30000, 'Dia ly', '1', 'image_sach/d2.jpg', NULL, 'Nguyễn Huy'),
('d3', 'Ôn tập để học tốt địa lý 11', 40, 20000, 'Dia ly', '2', 'image_sach/d3.jpg', NULL, 'Phạm Thị Sen-Nguyễn Việt Hùng'),
('d4', 'Đổi mới phương pháp dạy học và kiểm tra địa lý 10', 26, 27000, 'Dia ly', '1', 'image_sach/d4.jpg', NULL, 'Nguyễn Hải Châu'),
('d5', 'Atlat địa lý Việt Nam', 500, 19000, 'Dia ly', '1', 'image_sach/d5.jpg', NULL, 'NXB Giáo dục'),
('d6', 'Địa lý và bản đồ', 48, 3600, 'Dia ly', '1', 'image_sach/d6.jpg', NULL, 'Hồ Tiến Huân'),
('d7', 'Địa lý kinh tế-Xã hội châu âu', 40, 25000, 'Dia ly', '1', 'image_sach/d7.jpg', NULL, 'Bùi Thị Hải Yến-Phạm Thị Ngọc Diệp'),
('h1', 'Hoá học đại cương', 200, 36000, 'Hoa hoc', '1', 'image_sach/h1.jpg', NULL, 'NXB khkt'),
('h2', 'Hoá học 12 nâng cao', 330, 24000, 'Hoa hoc', '1', 'image_sach/h2.jpg', NULL, 'Nguyễn Đức Nghĩa'),
('h3', 'Hướng dẫn sử dụng hiệu quả hoá 12 nâng cao', 400, 36000, 'Hoa hoc', '1', 'image_sach/h3.jpg', NULL, 'Lê Thanh Hải'),
('h4', 'Hoá học 11 nâng cao', 50, 31000, 'Hoa hoc', '1', 'image_sach/h4.jpg', NULL, 'Nguyễn Minh An'),
('h5', 'Hoá học 12', 40, 23000, 'Hoa hoc', '1', 'image_sach/h5.jpg', NULL, 'Trần Xuân Bắc'),
('h6', 'Hoá học đại cương 1', 600, 50000, 'Hoa hoc', '2', 'image_sach/h6.jpg', NULL, 'Nguyễn Đức Vận'),
('h7', 'Hoá học đại cương 2', 700, 50000, 'Hoa hoc', '2', 'image_sach/h7.jpg', NULL, 'Nguyễn Đức Vận'),
('h8', 'Câu hỏi lý thuyết và bài tập trắc nghiệm hoá học', 56, 67000, 'Hoa hoc', '1', 'image_sach/h8.jpg', NULL, 'Lê Thanh Xuân'),
('k1', 'Từ điển tường giải kinh tế thị trường xã hội', 7, 165000, 'Kinh te', '1', 'image_sach/k1.jpg', NULL, 'Rolf H. Hasse-Hermann Schneider-Klaus Weigelt'),
('k10', 'Nguồn gốc của khủng hoảng tài chính', 50, 55000, 'Kinh te', '1', 'image_sach/k10.jpg', NULL, 'George Cooper'),
('k11', 'Vượt qua khủng hoảng kinh tế', 48, 39000, 'Kinh te', '1', 'image_sach/k11.jpg', NULL, 'Nguyễn Sơn'),
('k12', 'Chiến lược cạnh tranh mới', 36, 50000, 'Kinh te', '1', 'image_sach/k12.jpg', NULL, 'Tạ Ngọc Ái'),
('k2', 'Từ điển thuật ngữ thị trường chứng khoán', 20, 65000, 'Kinh te', '1', 'image_sach/k2.jpg', NULL, 'First News'),
('k3', 'Quản trị tài chính', 5, 285000, 'Kinh te', '1', 'image_sach/k3.jpg', NULL, 'Eugene F Brigham -Joel F Houston'),
('k4', 'Từ điển kinh tế thương mại Anh', 10, 188000, 'Kinh te', '1', 'image_sach/k4.jpg', NULL, 'Trần Văn Chánh'),
('k5', 'Bí quyết kinh doanh', 20, 68000, 'Kinh te', '1', 'image_sach/k5.jpg', NULL, 'Tạ Ngọc Ái'),
('k6', 'Thuật lãnh đạo', 30, 40000, 'Kinh te', '1', 'image_sach/k6.jpg', NULL, 'NXB Từ điển bách khoa'),
('k7', 'Chiến lược thương hiệu Châu Á', 45, 69000, 'Kinh te', '1', 'image_sach/k7.jpg', NULL, 'Martin Roll'),
('k8', 'Để thành công chứng khoán', 12, 60000, 'Kinh te', '1', 'image_sach/k8.jpg', NULL, 'NXB trẻ'),
('k9', 'Từ điển thuật ngữ kinh tế tài chính', 29, 63000, 'Kinh te', '1', 'image_sach/k9.jpg', NULL, 'Bernrd & Colli'),
('khoa1', 'Hồ Sơ Nội Bộ', 36, 65000, 'Khoa hoc', '1', 'image_sach/khoa1.jpg', NULL, 'Lưu Bình'),
('khoa11', 'Sách của bạn tôi', 29, 48000, 'Khoa hoc', '1', 'image_sach/khoa11.jpg', NULL, 'Anatole France'),
('khoa12', 'Thắm sắc hoa đào', 68, 42000, 'Khoa hoc', '1', 'image_sach/khoa12.jpg', NULL, 'Vương An Ức'),
('khoa13', 'Vô chiêu vô thức & viết ngắn tự chọn', 78, 45000, 'Khoa hoc', '1', 'image_sach/khoa13.jpg', NULL, 'Phan Cung Việt'),
('khoa14', 'Thành phố Quốc Tế', 37, 49000, 'Khoa hoc', '1', 'image_sach/khoa14.jpg', NULL, 'Don Delillo'),
('khoa15', 'Cuộc chiến khuy cúc', 58, 54000, 'Khoa hoc', '1', 'image_sach/khoa15.jpg', NULL, 'Louis Pergaud'),
('khoa16', 'Thiết thư Trúc kiếm - 2 tập', 12, 189000, 'Khoa hoc', '1', 'image_sach/khoa16.jpg', NULL, 'Bạch Ngọc Thạch'),
('khoa17', 'Học viện Công chúa - Princess Academy', 27, 59000, 'Khoa hoc', '1', 'image_sach/khoa17.jpg', NULL, 'Shannon Hale'),
('khoa3', 'Thái độ quyết định thành công', 10, 24000, 'Khoa hoc', '1', 'image_sach/khoa3.jpg', NULL, 'Wayne Cordeiro'),
('khoa4', 'Sydney yêu thương', 20, 38000, 'Khoa hoc', '1', 'image_sach/khoa4.jpg', NULL, 'Trung Nghĩa'),
('khoa5', 'Thành Cổ Tinh Tuyệt', 35, 25000, 'Khoa hoc', '1', 'image_sach/khoa5.jpg', NULL, 'Nguyễn Thị Mơ Mộng'),
('khoa7', 'Alice ở xứ sở diệu kì và Alice ở xứ sở trong gương', 48, 58000, 'Khoa hoc', '1', 'image_sach/khoa7.jpg', NULL, 'Lewis Carrol'),
('khoa8', 'Lâu đài thần bí', 50, 59000, 'Khoa hoc', '1', 'image_sach/khoa8.jpg', NULL, 'Edward Eager'),
('khoa9', 'Truyện cổ Andersen', 14, 95000, 'Khoa hoc', '1', 'image_sach/khoa9.jpg', NULL, 'Hans Christian Andersen'),
('l1', 'Từ điển nhân vật lịch sử Việt Nam', 34, 78000, 'Lich su', '1', 'image_sach/l1.jpg', NULL, 'Đinh Xuân Lâm, Trương Hữu Quýnh'),
('l10', 'Chiếc áo Bác Hồ', 60, 24000, 'Lich su', '1', 'image_sach/l10.jpg', NULL, 'Ngọc Châu'),
('l11', 'Thời thanh niên của Bác Hồ', 29, 25500, 'Lich su', '1', 'image_sach/l11.jpg', NULL, 'Hồng Hà'),
('l12', 'Bác Hồ với tuổi trẻ năm châu', 59, 20000, 'Lich su', '1', 'image_sach/l12.jpg', NULL, 'Trần Đương'),
('l13', 'Những mẩu chuyện về đạo đức tác phong của Bác Hồ', 18, 67000, 'Lich su', '1', 'image_sach/l13.jpg', NULL, 'NXB Thanh Niên'),
('l14', 'Đại cương về văn hóa Việt Nam chặng đường 60 năm', 45, 35000, 'Lich su', '1', 'image_sach/l14.jpg', NULL, 'NXB Quốc Gia'),
('l15', 'Hoàng Lê Nhất Thống Chí', 100, 56000, 'Lich su', '1', 'image_sach/l15.jpg', NULL, 'Ngô Gia Văn Phái'),
('l16', 'Lịch sử đạo thiên chúa ở Việt Nam', 50, 24000, 'Lich su', '1', 'image_sach/l16.jpg', NULL, 'Phạm Hồng Lam'),
('l17', 'Lịch sử phật giáo', 10, 115000, 'Lich su', '1', 'image_sach/l17.jpg', NULL, 'Nguyễn Tuệ Chân'),
('l2', 'Một thiên lịch sử 6 đời Tổng Thống Mỹ Trung', 10, 130000, 'Lich su', '1', 'image_sach/l2.jpg', NULL, 'Patrick Tyler'),
('l3', 'Lịch sử Đông Nam Á', 40, 45000, 'Lich su', '1', 'image_sach/l3.jpg', NULL, 'Lương Minh-Đỗ Thanh Bình-Trần Thị Vinh'),
('l4', 'Lịch sử đạo phật Việt Nam', 67, 36000, 'Lich su', '1', 'image_sach/l4.jpg', NULL, 'Nguyễn Duy Hinh'),
('l5', 'Lịch sử bí mật đế chế Hoa Kỳ', 9, 104000, 'Lich su', '1', 'image_sach/l5.jpg', NULL, 'John Perkins'),
('l6', 'Lịch sử Trung Quốc 5000 năm', 34, 49000, 'Lich su', '2', 'image_sach/l6.jpg', NULL, 'Lê Hán Đạt-Tào Hán Chương'),
('l7', '9 bản tuyên ngôn nổi tiếng thế giới', 20, 80000, 'Lich su', '1', 'image_sach/l7.jpg', NULL, 'NXB Văn hoá thông tin'),
('l8', 'Địa danh Hồ Chí Minh', 100, 30000, 'Lich su', '1', 'image_sach/l8.jpg', NULL, 'NXB Thanh Niên'),
('l9', 'Nguyễn Aí Quốc với nhật ký chìm tàu', 30, 40000, 'Lich su', '1', 'image_sach/l9.jpg', NULL, 'Phạm Quý Thích'),
('ly1', 'Vật lý đại cương', 57, 34000, 'Vat ly', '1', 'image_sach/ly1.jpg', NULL, 'Nguyễn Trong Hiếu'),
('ly2', 'Phương pháp luyện thi môn vật lý', 87, 23000, 'Vat ly', '1', 'image_sach/ly2.jpg', NULL, 'Võ Hải Hà'),
('ly3', 'Hoc tốt vật lý 12', 90, 20000, 'Vat ly', '1', 'image_sach/ly3.jpg', NULL, 'Lê Minh Trí'),
('ly4', 'Giải các bài toán vật lý sơ cấp', 100, 35000, 'Vat ly', '3', 'image_sach/ly4.jpg', NULL, 'Võ Việt Hùng'),
('ly5', 'Bài tập và 453 bài toán vật lý 11', 200, 25500, 'Vat ly', '1', 'image_sach/ly5.jpg', NULL, 'Nguyễn Lâm Huy'),
('ly6', 'Giáo trình vật lý đại cương A1', 20, 65000, 'Vat ly', '1', 'image_sach/ly6.jpg', NULL, 'Trương Quang Ngọc'),
('ly7', '168 câu hỏi lý thú về vật lý', 98, 43000, 'Vat ly', '1', 'image_sach/ly7.jpg', NULL, 'Dương Văn Khoa'),
('n1', 'Oxford', 30, 97000, 'N;ai ngu', '1', 'image_sach/n1.jpg', NULL, 'Oxford University Press'),
('n2', 'Từ điển Anh-Anh-Việt', 20, 36000, 'N;ai ngu', '1', 'image_sach/n2.jpg', NULL, 'Nhà xuất bản thống kê'),
('n3', 'Từ điển Anh-Anh-Việt', 40, 64000, 'N;ai ngu', '1', 'image_sach/n3.jpg', NULL, 'Quang Hùng - Ngọc Ánh'),
('n4', 'Oxford Wordpower Dictionary with CD-ROM', 50, 180000, 'N;ai ngu', '1', 'image_sach/n4.jpg', NULL, 'Oxford University Press'),
('n5', 'Tiếng anh 12', 10, 26000, 'N;ai ngu', '1', 'image_sach/n7.jpg', NULL, 'Nguyễn Tùng'),
('n6', 'Giáo trình tiếng anh khoa học máy tính', 28, 78000, 'N;ai ngu', '1', 'image_sach/n6.jpg', NULL, 'Quang Huy-Ngọc Ánh'),
('o1', 'Đề thi tuyển sinh địa lý', 100, 25000, 'On thi CD-DH', '1', 'image_sach/o1.jpg', NULL, 'Nguyễn Đức Vũ'),
('o2', 'Tuyển chọn những bài ôn luyện thi CĐ-ĐH môn địa lý', 50, 18000, 'On thi CD-DH', '1', 'image_sach/o2.jpg', NULL, 'Phí Công Việt'),
('o3', 'Ôn thi tốt nghiệp THPT-CĐ-ĐH môn Tiếng Anh', 40, 34000, 'On thi CD-DH', '1', 'image_sach/o3.jpg', NULL, 'Nguyễn Thanh Nam'),
('o4', 'Chuyên đề khảo sát hàm số luyện thi CĐ-ĐH', 30, 40000, 'On thi CD-DH', '1', 'image_sach/o4.jpg', NULL, 'Trần Đức Huyên'),
('o5', 'Chuẩn bị ôn thi tốt nghiệp THPT-CĐ-ĐH môn Vật lý', 20, 35000, 'On thi CD-DH', '1', 'image_sach/o5.jpg', NULL, 'Nguyễn Minh Tuân'),
('o6', 'Hướng dẫn ôn tập thi môn toán', 46, 26000, 'On thi CD-DH', '3', 'image_sach/o6.jpg', NULL, 'Trần Công Mân'),
('o7', 'Chuẩn bị ôn thi tốt nghiệp THPT-CĐ-ĐH môn Hoá Học', 78, 47000, 'On thi CD-DH', '1', 'image_sach/o7.jpg', NULL, 'Nguyễn Huy Hoàng'),
('o8', 'Luyện thi sinh học', 57, 43000, 'On thi CD-DH', '1', 'image_sach/o8.jpg', NULL, 'Tàu Minh Việt'),
('t1', 'Tâm lý làm sáng của trẻ em Việt Nam', 50, 34000, 'Tam ly', '1', 'image_sach/t1.jpg', NULL, 'Trần Thị Kim Yến'),
('t2', 'Tư vấn tâm lý căn bản', 30, 23000, 'Tam ly', '1', 'image_sach/t2.jpg', NULL, 'Nguyễn Thị Như Lan'),
('t3', 'Tâm lý học', 34, 56000, 'Tam ly', '1', 'image_sach/t3.jpg', NULL, 'Đào Duy Quang'),
('t4', 'Chuẩn bị tâm lý tuổi 40', 60, 29000, 'Tam ly', '1', 'image_sach/t4.jpg', NULL, 'Kajuri'),
('t5', 'Mãi thấm màu tình bạn', 67, 45000, 'Tam ly', '1', 'image_sach/t5.jpg', NULL, 'Nguyễn Trung Trực'),
('t6', 'Chuẩn bị tâm lý tuổi 50', 23, 17000, 'Tam ly', '1', 'image_sach/t6.jpg', NULL, 'Kajuri'),
('t7', 'Sức mạnh của trí tuệ cảm xúc', 40, 48000, 'Tam ly', '1', 'image_sach/t7.jpg', NULL, 'Roger Fisher & Daniel Sapiro'),
('t8', 'Gợi ý giải đáp những câu hỏi cho trẻ em', 20, 19000, 'Tam ly', '1', 'image_sach/t8.jpg', NULL, 'Liêm Trinh - Nguyễn Nghiêm'),
('tin1', 'Cấu trúc dữ liệu và giải thuật', 40, 30000, 'Tin', '1', 'image_sach/tin1.jpg', NULL, 'Đỗ Xuân Lôi'),
('tin10', 'Nâng Cấp Bảo Trì Và Xử Lý Phần Cứng Máy Tính tập 2', 200, 45000, 'Tin', '2', 'image_sach/tin10.jpg', NULL, 'Michael Miller - Biên dịch Thanh Nguyên'),
('tin11', 'Nâng Cấp Bảo Trì Và Xử Lý Phần Cứng Máy Tính tập 1', 100, 45000, 'Tin', '2', 'image_sach/tin11.jpg', NULL, 'Michael Miller - Biên dịch Thanh Nguyên'),
('tin12', 'Giáo Trình Thực Hành Flash', 120, 35000, 'Tin', '1', 'image_sach/tin12.jpg', NULL, 'Phạm Quang  Hân - Hồ Chí Hoà '),
('tin13', 'Làm chủ Windows Server 2003- Tập 2', 40, 153000, 'Tin', '2', 'image_sach/tin13.jpg', NULL, 'Phạm Hoàng Dũng'),
('tin14', 'Sử dụng Illustrator CS cho người mới bắt đầu', 30, 46000, 'Tin', '1', 'image_sach/tin14.jpg', NULL, 'KS. Ngọc Tuấn'),
('tin15', 'Tinh chỉnh sự thực thi và tối ưu hóa ASP.NET', 50, 38000, 'Tin', '1', 'image_sach/tin15.jpg', NULL, 'Ban biên soạn Hoàn Vũ-Chủ biên Phạm Đăng Khoa'),
('tin16', 'Đồ họa vi tính Photoshop-Thật là đơn giản', 20, 60000, 'Tin', '1', 'image_sach/tin16.jpg', NULL, 'Dương Mạnh Hùng - Lê Huy'),
('tin2', 'Thiết kế sản phẩm với Cimatron E7.0', 20, 63000, 'Tin', '1', 'image_sach/tin2.jpg', NULL, 'Nguyễn Trọng Hữu'),
('tin3', 'Thực hành Visual C++ 6.0', 12, 40000, 'Tin', '1', 'image_sach/tin3.jpg', NULL, 'Trương Công Tuấn'),
('tin4', '3D Studio Max 5.0', 12, 32000, 'Tin', '1', 'image_sach/tin4.jpg', NULL, 'Trần Xuân Lôi'),
('tin5', 'Thiết Kế Bản Vẽ Kỹ Thuật Với AUTOCAD 2005', 25, 90000, 'Tin', '1', 'image_sach/tin5.jpg', NULL, 'Thuận Thành-Thành Tân'),
('tin6', 'Lý thuyết cơ cở dữ liệu', 58, 32000, 'Tin', '1', 'image_sach/tin6.jpg', NULL, 'Đõ tiến Tùng'),
('tin7', 'Hướng dẫn sử dụng Photoshop 8.0', 30, 80000, 'Tin', '1', 'image_sach/tin7.jpg', NULL, 'Nguyễn Tuấn Ngọc'),
('tin8', 'Giáo Trình Cấu Trúc Máy Tính', 20, 45000, 'Tin', '1', 'image_sach/tin8.jpg', NULL, 'Đặng Văn Anh'),
('tin9', 'Tự học thiết kế Web và quản lý Web', 15, 35000, 'Tin', '1', 'image_sach/tin9.jpg', NULL, 'Nguyễn Đình Tuấn'),
('toan1', 'Giải tích', 10, 25000, 'Toan', '1', 'image_sach/toan1.jpg', NULL, 'Nguyễn Gia Định'),
('toan10', 'Toán hình giải tích 12', 39, 32000, 'Toan', '1', 'image_sach/toan10.jpg', NULL, 'Nguyễn Huy Long'),
('toan2', 'Cẩm Nang Toán Giải Tích', 100, 30000, 'Toan', '1', 'image_sach/toan2.jpg', NULL, 'Hoàng Văn Phong'),
('toan3', 'Giải Tích Số', 300, 25000, 'Toan', '1', 'image_sach/toan3.jpg', NULL, 'Lê Minh Nghĩa'),
('toan4', 'Giáo Trình Toán Giải Tích - Tập', 120, 19000, 'Toan', '2', 'image_sach/toan4.jpg', NULL, 'Nguyễn Nhật Minh'),
('toan5', 'Toán Học Với Đời Sống Sản Xuất Quốc Phòng', 100, 23000, 'Toan', '2', 'image_sach/toan5.jpg', NULL, 'Trần Như Lệ'),
('toan6', 'Tuyển Chọn 351 Bài Toán Giải Tích Tổ', 50, 35000, 'Toan', '1', 'image_sach/toan6.jpg', NULL, 'Nguyễn Đình Anh'),
('toan7', 'Toán Hình Giải Tích 12', 35, 26000, 'Toan', '2', 'image_sach/toan7.jpg', NULL, 'Đào Văn Thi'),
('toan8', 'Ảo thuật toán học', 100, 23000, 'Toan', '1', 'image_sach/toan8.jpg', NULL, 'Matin Ganơ'),
('toan9', 'Toán cao cấp giải tich', 40, 38000, 'Toan', '2', 'image_sach/toan9.jpg', NULL, 'Phạm Hồng Danh'),
('tt1', 'Thám tử lừng danh Conan', 12, 22000, 'ccc', '100', 'image_sach/wYIqsvL2RW2QtotVV1h8zmhiH55kLvZ4z2vQUCfv.webp', '2023-07-13 00:00:00', 'Gosho Aoyama'),
('v1', 'Chuyện chưa biết về nhà văn Nam Cao', 101, 35000, 'Van', '1', 'image_sach/v1.jpg', NULL, 'Trần Thị Hồng'),
('v10', 'Tắt Đèn 1', 23, 23000, 'Van', '2', 'image_sach/v10.jpg', NULL, 'Ngô Tất Tố'),
('v11', 'Thằng mõ trâu', 69, 27000, 'Van', '1', 'image_sach/v11.jpg', NULL, 'Phạm Ngọc Tiến'),
('v12', 'Huế - mùa mai đỏ', 10, 110000, 'Van', '1', 'image_sach/v12.jpg', NULL, 'Xuân Thiều'),
('v13', 'Chí Phèo', 90, 34000, 'Van', '1', 'image_sach/v13.jpg', NULL, 'Nam Cao'),
('v14', 'Thế giới Chữ Nghĩa trong thơ ca Tình Yêu', 50, 36000, 'Van', '1', 'image_sach/v14.jpg', NULL, 'Dương Văn Khoa'),
('v15', 'Chuyện tử tù Lê Quang Vịnh', 70, 30000, 'Van', '1', 'image_sach/v15.jpg', NULL, 'Ngô Minh'),
('v16', 'Truyện ngắn đương đại Việt Nam- tập 2', 40, 45000, 'Van', '2', 'image_sach/v16.jpg', NULL, 'Nguyễn Lâm Huy'),
('v17', 'Kiều', 100, 32000, 'Van', '1', 'image_sach/v17.jpg', NULL, 'Nguyễn Du'),
('v18', 'Cuộc đời và trang viết Nhìn nhận - đánh giá', 35, 65000, 'Van', '1', 'image_sach/v18.jpg', NULL, 'Lê Tuấn Anh'),
('v19', 'Truyện ngắn đương đại Việt Nam- tập 1', 65, 45000, 'Van', '2', 'image_sach/v19.jpg', NULL, 'Nguyễn Lâm Huy'),
('v2', 'Hành trang tuổi mười tám', 20, 23000, 'Van', '1', 'image_sach/v2.jpg', NULL, 'Kim Nguyễn'),
('v3', 'Xuân Từ Chiều', 100, 39000, 'Van', '1', 'image_sach/v3.jpg', NULL, 'Y Ban'),
('v4', 'Ca Dao Việt Nam Va Những Lời Bình', 200, 23500, 'Van', '1', 'image_sach/v4.jpg', NULL, 'Lê Nam'),
('v5', 'Tuyển tập truyện ngắn hay', 100, 45000, 'Van', '1', 'image_sach/v5.jpg', NULL, 'Võ Việt Hùng'),
('v6', 'Giông Tố', 32, 35000, 'Van', '1', 'image_sach/v6.jpg', NULL, 'Ngô Tất Tố'),
('v7', 'Hoàng Như Ma', 50, 114000, 'Van', '1', 'image_sach/v7.jpg', NULL, 'Trần Hữu Tá'),
('v8', 'Hòn Đất', 20, 30000, 'Van', '1', 'image_sach/v8.jpg', NULL, 'Lê Hữu Nghị'),
('v9', 'Tắt Đèn', 35, 25000, 'Van', '2', 'image_sach/v9.jpg', NULL, 'Ngô Tất Tố'),
('y1', 'Tỏi với sức khỏe con người', 35, 26000, 'Y hoc', '1', 'image_sach/y1.jpg', NULL, 'Lê Minh Trí'),
('y10', 'Bệnh tiền liệt tuyến  giải pháp dự phòng-điều trị', 340, 18000, 'Y hoc', '1', 'image_sach/y10.jpg', NULL, 'Ngô Tín'),
('y11', 'Cách ăn uống phòng bệnh ung thư', 56, 42000, 'Y hoc', '1', 'image_sach/y11.jpg', NULL, 'Ngọc Phương'),
('y12', 'Cách phòng ngừa điều trị bệnh Gút', 78, 45000, 'Y hoc', '1', 'image_sach/y12.jpg', NULL, 'BS Mạnh Hải'),
('y13', 'Bệnh gan mật những điều cần biết', 90, 37000, 'Y hoc', '1', 'image_sach/y13.jpg', NULL, 'BS Bạch Minh'),
('y14', 'Vị thuốc chữa bệnh bằng rau củ quả', 87, 29500, 'Y hoc', '1', 'image_sach/y14.jpg', NULL, 'BS Lê Hữu Phước'),
('y15', 'Trà với sức khoẻ và sắc đẹp', 99, 25000, 'Y hoc', '1', 'image_sach/y15.jpg', NULL, 'Lương Quỳnh Bạch'),
('y16', 'Cẩm nang sức khoẻ gia đình', 20, 120000, 'Y hoc', '1', 'image_sach/y16.jpg', NULL, 'Nguyễn Lân Đính'),
('y2', 'Phòng chữa bệnh béo Tri thức cơ sở của bệnh béo', 30, 10500, 'Y hoc', '1', 'image_sach/y2.jpg', NULL, 'Lưu Diễm Kiêu'),
('y3', 'Bệnh Tăng Huyết Áp Cách Phòng Và Điều Trị', 20, 35000, 'Y hoc', '1', 'image_sach/y3.jpg', NULL, ' Bạch Minh'),
('y4', 'Các bệnh ung thư thường gặp và đông y', 100, 34000, 'Y hoc', '1', 'image_sach/y4.jpg', NULL, ' Bác sĩ Hùng Minh'),
('y5', '34 bài thuốc chữa bệnh từ rau quả', 110, 20000, 'Y hoc', '1', 'image_sach/y5.jpg', NULL, 'Lê Hạnh'),
('y6', 'Ấn huyệt bằng tay chữa bệnh', 120, 30000, 'Y hoc', '1', 'image_sach/y6.jpg', NULL, 'Võ Hải Hà'),
('y7', 'Bạn chính là bác sỹ tốt nhất của mình', 35, 40000, 'Y hoc', '1', 'image_sach/y7.jpg', NULL, 'Lê Duyên Hải'),
('y8', 'Từ điển Y học', 200, 71000, 'Y hoc', '1', 'image_sach/y8.jpg', NULL, 'BS Đặng Văn Chí'),
('y9', 'Các bệnh về da liễu phát hiện và điều trị', 300, 30000, 'Y hoc', '1', 'image_sach/y9.jpg', NULL, 'BS Lê Dung');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`macthd`);

--
-- Chỉ mục cho bảng `dangnhap`
--
ALTER TABLE `dangnhap`
  ADD PRIMARY KEY (`tendn`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`mahoadon`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makh`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`maloai`);

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`masach`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `macthd` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `mahoadon` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `makh` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
