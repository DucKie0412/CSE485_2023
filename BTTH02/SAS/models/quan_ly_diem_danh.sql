-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 22, 2023 lúc 08:14 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quan_ly_diem_danh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attendance`
--

CREATE TABLE `attendance` (
  `id` int(25) NOT NULL,
  `attendance_Date` date NOT NULL,
  `id_Course` int(25) NOT NULL,
  `id_Class` int(25) NOT NULL,
  `id_Student` int(25) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `attendance`
--

INSERT INTO `attendance` (`id`, `attendance_Date`, `id_Course`, `id_Class`, `id_Student`, `status`) VALUES
(1, '2023-05-16', 2, 3, 2, 'Co mat'),
(2, '2023-05-16', 2, 3, 3, 'Co mat'),
(3, '2023-05-17', 2, 3, 2, 'Vang mat'),
(4, '2023-05-17', 2, 3, 3, 'Co mat');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class`
--

CREATE TABLE `class` (
  `id` int(25) NOT NULL,
  `id_Class` int(25) NOT NULL,
  `id_Course` int(25) NOT NULL,
  `id_Lecturer` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `class`
--

INSERT INTO `class` (`id`, `id_Class`, `id_Course`, `id_Lecturer`) VALUES
(1, 2, 3, 2),
(2, 3, 2, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class_student`
--

CREATE TABLE `class_student` (
  `id` int(25) NOT NULL,
  `id_Class` int(25) NOT NULL,
  `id_Student` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `class_student`
--

INSERT INTO `class_student` (`id`, `id_Class`, `id_Student`) VALUES
(1, 2, 3),
(2, 3, 2),
(3, 2, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course`
--

CREATE TABLE `course` (
  `id` int(25) NOT NULL,
  `id_Course` int(25) NOT NULL,
  `id_Lecturer` int(25) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `course`
--

INSERT INTO `course` (`id`, `id_Course`, `id_Lecturer`, `name`) VALUES
(1, 2, 3, 'Lập trình C#'),
(2, 3, 2, 'Lập trình Web');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lecturer`
--

CREATE TABLE `lecturer` (
  `id` int(25) NOT NULL,
  `id_Lecturer` int(25) NOT NULL,
  `full_Name` varchar(50) NOT NULL,
  `user_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lecturer`
--

INSERT INTO `lecturer` (`id`, `id_Lecturer`, `full_Name`, `user_Name`) VALUES
(1, 2, 'Tran Van A', 'tranvana@gmail.com'),
(2, 3, 'Tran Van B', 'tranvanb@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student`
--

CREATE TABLE `student` (
  `id` int(25) NOT NULL,
  `id_Student` int(25) NOT NULL,
  `full_Name` varchar(50) NOT NULL,
  `birth_Day` date DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `user_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `student`
--

INSERT INTO `student` (`id`, `id_Student`, `full_Name`, `birth_Day`, `address`, `user_Name`) VALUES
(1, 2, 'Nguyen Van A', '2002-05-21', 'Ha Noi', 'nguyenvana@gmail.com'),
(2, 3, 'Nguyen Van B', '2002-09-20', 'Ha Noi', 'nguyenvanb@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_Name` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `role` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `user_Name`, `password`, `role`) VALUES
(1, 'nguyenvana@gmail.com', '123456', 1),
(2, 'nguyenvanb@gmail.com', '123456', 1),
(3, 'tranvana@gmail.com', '123456', 0),
(4, 'tranvanb@gmail.com', '123456', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Class` (`id_Class`),
  ADD KEY `id_Course` (`id_Course`),
  ADD KEY `id_Student` (`id_Student`);

--
-- Chỉ mục cho bảng `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id_Class`),
  ADD KEY `id_Course` (`id_Course`),
  ADD KEY `id_Lecturer` (`id_Lecturer`);

--
-- Chỉ mục cho bảng `class_student`
--
ALTER TABLE `class_student`
  ADD KEY `id_Class` (`id_Class`),
  ADD KEY `id_Student` (`id_Student`);

--
-- Chỉ mục cho bảng `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id_Course`),
  ADD KEY `id_Lecturer` (`id_Lecturer`);

--
-- Chỉ mục cho bảng `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`id_Lecturer`);

--
-- Chỉ mục cho bảng `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id_Student`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`id_Class`) REFERENCES `class` (`id_Class`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`id_Course`) REFERENCES `course` (`id_Course`),
  ADD CONSTRAINT `attendance_ibfk_3` FOREIGN KEY (`id_Student`) REFERENCES `student` (`id_Student`);

--
-- Các ràng buộc cho bảng `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`id_Course`) REFERENCES `course` (`id_Course`),
  ADD CONSTRAINT `class_ibfk_2` FOREIGN KEY (`id_Lecturer`) REFERENCES `lecturer` (`id_Lecturer`);

--
-- Các ràng buộc cho bảng `class_student`
--
ALTER TABLE `class_student`
  ADD CONSTRAINT `class_student_ibfk_1` FOREIGN KEY (`id_Class`) REFERENCES `class` (`id_Class`),
  ADD CONSTRAINT `class_student_ibfk_2` FOREIGN KEY (`id_Student`) REFERENCES `student` (`id_Student`);

--
-- Các ràng buộc cho bảng `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`id_Lecturer`) REFERENCES `lecturer` (`id_Lecturer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
