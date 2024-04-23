-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Apr 2024 pada 19.57
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
-- Struktur dari tabel `sponsor`
--

CREATE TABLE `sponsor` (
  `Sponsor_ID` int(11) NOT NULL,
  `ID_Committee` int(11) DEFAULT NULL,
  `Sponsor_Brand` varchar(100) NOT NULL,
  `Contact_Person` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sponsor`
--

INSERT INTO `sponsor` (`Sponsor_ID`, `ID_Committee`, `Sponsor_Brand`, `Contact_Person`) VALUES
(1, 1, 'bearbrand', 'andira'),
(2, 2, 'kanzler', 'zize');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`Sponsor_ID`),
  ADD KEY `ID_Committee` (`ID_Committee`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `Sponsor_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `sponsor`
--
ALTER TABLE `sponsor`
  ADD CONSTRAINT `sponsor_ibfk_1` FOREIGN KEY (`ID_Committee`) REFERENCES `login` (`ID_Committee`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
