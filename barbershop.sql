-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2024 at 06:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barbershop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `idAdmin` int(5) NOT NULL,
  `Ausername` varchar(50) NOT NULL,
  `Apassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`idAdmin`, `Ausername`, `Apassword`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barber`
--

CREATE TABLE `tbl_barber` (
  `idBarber` int(5) NOT NULL,
  `Bbnama` varchar(100) NOT NULL,
  `Bbdeskripsi` varchar(2000) NOT NULL,
  `Bbfoto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_barber`
--

INSERT INTO `tbl_barber` (`idBarber`, `Bbnama`, `Bbdeskripsi`, `Bbfoto`) VALUES
(4, 'Hafid', 'Pengalaman 50000 tahun', 'Untitled3_202211181840522.png'),
(6, 'Naufal', 'Pengalaman 300 tahun', 'SAVE_20230531_1441123.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `idBooking` int(5) NOT NULL,
  `Btanggal` date NOT NULL,
  `Bjam` time NOT NULL,
  `Bbarber` varchar(100) NOT NULL,
  `Bservices` varchar(100) NOT NULL,
  `Bstatus` varchar(100) NOT NULL,
  `idServices` int(5) NOT NULL,
  `idCustomer` int(5) NOT NULL,
  `idBarber` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`idBooking`, `Btanggal`, `Bjam`, `Bbarber`, `Bservices`, `Bstatus`, `idServices`, `idCustomer`, `idBarber`) VALUES
(1, '2024-06-05', '10:00:00', 'Hafid', 'Coloring', 'Menunggu', 3, 2, 4),
(2, '2024-06-13', '11:00:00', '', '', 'Dibatalkan', 1, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `idCustomer` int(5) NOT NULL,
  `Cnama` varchar(100) NOT NULL,
  `Cemail` varchar(100) NOT NULL,
  `Ctlpn` varchar(16) NOT NULL,
  `Cpassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`idCustomer`, `Cnama`, `Cemail`, `Ctlpn`, `Cpassword`) VALUES
(2, 'Hafid Naufal', 'hafidnaufal61@gmail.com', '081575179085', 'Hafid198232'),
(3, 'Naufal', 'hafidnaufal@gmail.com', '081575179088', 'Hafid198232'),
(5, 'Kevin', 'kevin@gmail.com', '081575179085', 'guascsjakd'),
(6, 'Saputra', 'saputra@gmail.com', '082189382431', 'adxhcx'),
(7, 'Febri', 'febri@gmail.com', '081575179885', 'guascsjaakd'),
(8, 'Rizky', 'rizky@gmail.com', '082119382431', 'asdxhcx'),
(9, 'Sugeng', 'sugeng@gmail.com', '082575179085', 'guascsajakd'),
(10, 'Siti', 'siti@gmail.com', '082182382431', 'adxhdcx'),
(11, 'Lili', 'lili@gmail.com', '081575173085', 'guascsjaakd'),
(12, 'Kito', 'kito@gmail.com', '082289382431', 'addxhcx'),
(13, 'redi', 'redi@gmail.com', '081575172085', 'guascsjfakd'),
(14, 'Jiko', 'jiko@gmail.com', '082389382431', 'adxshcx');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `idGallery` int(5) NOT NULL,
  `Gnama` varchar(100) NOT NULL,
  `Gdeskripsi` varchar(2000) NOT NULL,
  `Gfoto` varchar(100) NOT NULL,
  `idServices` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`idGallery`, `Gnama`, `Gdeskripsi`, `Gfoto`, `idServices`) VALUES
(1, 'Potong', 'Potong rambut', '21.png', 3),
(2, 'Haircut', 'safcsewdfcd ', '4.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `idServices` int(5) NOT NULL,
  `Snama` varchar(100) NOT NULL,
  `Sdeskripsi` varchar(2000) NOT NULL,
  `Sharga` varchar(15) NOT NULL,
  `Sfoto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`idServices`, `Snama`, `Sdeskripsi`, `Sharga`, `Sfoto`) VALUES
(1, 'Haircut', 'Potong rambut rapi', 'Rp 50.000,00', '2.png'),
(3, 'Coloring', 'Mewarnai rambut', 'Rp 200.000,00', '42.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `order_id` char(20) NOT NULL,
  `gross_amount` int(11) NOT NULL,
  `bank` varchar(10) NOT NULL,
  `transaction_type` varchar(19) NOT NULL,
  `payment_type` varchar(13) NOT NULL,
  `status_code` char(3) NOT NULL,
  `va_number` varchar(30) NOT NULL,
  `pdf_url` text NOT NULL,
  `idBooking` int(5) NOT NULL,
  `transaction_time` varchar(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `tbl_barber`
--
ALTER TABLE `tbl_barber`
  ADD PRIMARY KEY (`idBarber`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`idBooking`),
  ADD KEY `idServices` (`idServices`),
  ADD KEY `idCustomer` (`idCustomer`),
  ADD KEY `idBarber` (`idBarber`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`idCustomer`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`idGallery`),
  ADD KEY `idServices` (`idServices`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`idServices`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `idBooking` (`idBooking`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `idAdmin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_barber`
--
ALTER TABLE `tbl_barber`
  MODIFY `idBarber` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `idBooking` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `idCustomer` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `idGallery` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `idServices` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD CONSTRAINT `tbl_booking_ibfk_1` FOREIGN KEY (`idCustomer`) REFERENCES `tbl_customer` (`idCustomer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_booking_ibfk_2` FOREIGN KEY (`idServices`) REFERENCES `tbl_services` (`idServices`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_booking_ibfk_3` FOREIGN KEY (`idBarber`) REFERENCES `tbl_barber` (`idBarber`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD CONSTRAINT `tbl_gallery_ibfk_1` FOREIGN KEY (`idServices`) REFERENCES `tbl_services` (`idServices`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD CONSTRAINT `tbl_transaksi_ibfk_1` FOREIGN KEY (`idBooking`) REFERENCES `tbl_booking` (`idBooking`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
