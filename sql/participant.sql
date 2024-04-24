-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Apr 2024 pada 03.12
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
-- Struktur dari tabel `activities`
--

CREATE TABLE `activities` (
  `Activity_ID` int(11) NOT NULL,
  `ID_Committee` int(11) DEFAULT NULL,
  `Activity_Name` varchar(100) NOT NULL,
  `Activity_Date` date DEFAULT NULL,
  `Location` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `activities`
--

INSERT INTO `activities` (`Activity_ID`, `ID_Committee`, `Activity_Name`, `Activity_Date`, `Location`) VALUES
(20, 1, 'jump', '2024-04-08', 'jakarta'),
(21, 2, 'swim', '2024-04-14', 'bekasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `comlist`
--

CREATE TABLE `comlist` (
  `Committee_ID` int(11) NOT NULL,
  `ID_Committee` int(11) DEFAULT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Role` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `comlist`
--

INSERT INTO `comlist` (`Committee_ID`, `ID_Committee`, `Name`, `Email`, `City`, `Role`) VALUES
(1, 1, 'khansa', 'khansa@gmail.com', 'bogor', 'documentation'),
(2, 2, 'kalla', 'kalla@gmail.com', 'bogor', 'project manager');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `ID_Committee` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`ID_Committee`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'khansa', 'khansahwaidafatin@gmail.com', 'halo', '2024-04-23 17:11:59'),
(2, 'dira', 'nadir@gmail.com', 'yess', '2024-04-23 17:52:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `participant`
--

CREATE TABLE `participant` (
  `ID_Participant` int(11) NOT NULL,
  `Nama` varchar(30) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `City` varchar(20) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `participant`
--

INSERT INTO `participant` (`ID_Participant`, `Nama`, `Email`, `City`, `Gender`, `Name`) VALUES
(11, NULL, 'aespakarina@gmail.com', 'Bekasi', 'Female', 'karina'),
(12, NULL, 'khansa@gmail.com', 'bogor', 'Female', 'khansa');

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
-- Indeks untuk tabel `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`Activity_ID`),
  ADD KEY `ID_Committee` (`ID_Committee`);

--
-- Indeks untuk tabel `comlist`
--
ALTER TABLE `comlist`
  ADD PRIMARY KEY (`Committee_ID`),
  ADD KEY `ID_Committee` (`ID_Committee`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID_Committee`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `unique_id_committee` (`ID_Committee`);

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
-- Indeks untuk tabel `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`Sponsor_ID`),
  ADD KEY `ID_Committee` (`ID_Committee`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `activities`
--
ALTER TABLE `activities`
  MODIFY `Activity_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `comlist`
--
ALTER TABLE `comlist`
  MODIFY `Committee_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `participant`
--
ALTER TABLE `participant`
  MODIFY `ID_Participant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `participant_payments`
--
ALTER TABLE `participant_payments`
  MODIFY `ID_Payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `Sponsor_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`ID_Committee`) REFERENCES `login` (`ID_Committee`);

--
-- Ketidakleluasaan untuk tabel `comlist`
--
ALTER TABLE `comlist`
  ADD CONSTRAINT `comlist_ibfk_1` FOREIGN KEY (`ID_Committee`) REFERENCES `login` (`ID_Committee`);

--
-- Ketidakleluasaan untuk tabel `participant_payments`
--
ALTER TABLE `participant_payments`
  ADD CONSTRAINT `fk_participant_payment` FOREIGN KEY (`ID_Participant`) REFERENCES `participant` (`ID_Participant`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sponsor`
--
ALTER TABLE `sponsor`
  ADD CONSTRAINT `sponsor_ibfk_1` FOREIGN KEY (`ID_Committee`) REFERENCES `login` (`ID_Committee`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
