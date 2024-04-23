-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Apr 2024 pada 19.59
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
-- Struktur dari tabel `participant_payments`
--

CREATE TABLE `participant_payments` (
  `ID_Payment` int(11) NOT NULL,
  `ID_Participant` int(11) DEFAULT NULL,
  `Payment_Method` varchar(50) DEFAULT NULL,
  `Payment_Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `participant_payments`
--

INSERT INTO `participant_payments` (`ID_Payment`, `ID_Participant`, `Payment_Method`, `Payment_Date`) VALUES
(1, 11, 'Transfer', '2024-02-05 00:00:00'),
(2, 12, 'Transfer', '2024-02-05 00:00:00');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT untuk tabel `participant_payments`
--
ALTER TABLE `participant_payments`
  MODIFY `ID_Payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `participant_payments`
--
ALTER TABLE `participant_payments`
  ADD CONSTRAINT `fk_participant_payment` FOREIGN KEY (`ID_Participant`) REFERENCES `participant` (`ID_Participant`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
