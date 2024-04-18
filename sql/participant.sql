-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Apr 2024 pada 11.18
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `participant`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `participant`
--

CREATE TABLE `participant` (
  `ID_Participant` int(11) NOT NULL,
  `Nama` varchar(30) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `City` varchar(20) NOT NULL,
  `Gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `participant`
--

INSERT INTO `participant` (`ID_Participant`, `Nama`, `Email`, `City`, `Gender`) VALUES
(1, 'Khansa Huwaida', 'khansahwaidafatin@gmail.com', 'Bogor', 'Female'),
(2, 'Ainun zahra', 'Ainunzahra@gmail.com', 'Jakarta', 'Female'),
(3, 'falidza jinan', 'falija@gmail.com', 'Cikarang', 'Female'),
(4, 'ica salsa', 'salsaaica@gmail.com', 'Bekasi', 'Female');

-- --------------------------------------------------------

--
-- Struktur dari tabel `participant_payments`
--

CREATE TABLE `participant_payments` (
  `ID_Payment` int(11) NOT NULL,
  `ID_Participant` int(11) DEFAULT NULL,
  `Payment_Method` varchar(50) DEFAULT NULL,
  `Payment_Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`ID_Participant`);

--
-- Indeks untuk tabel `participant_payments`
--
ALTER TABLE `participant_payments`
  ADD PRIMARY KEY (`ID_Payment`),
  ADD KEY `fk_participant_payment` (`ID_Participant`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `participant`
--
ALTER TABLE `participant`
  MODIFY `ID_Participant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `participant_payments`
--
ALTER TABLE `participant_payments`
  MODIFY `ID_Payment` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `participant_payments`
--
ALTER TABLE `participant_payments`
  ADD CONSTRAINT `fk_participant_payment` FOREIGN KEY (`ID_Participant`) REFERENCES `participant` (`ID_Participant`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
