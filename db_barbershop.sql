-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Apr 2021 pada 19.50
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_barbershop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `nama_pembooking` varchar(255) DEFAULT NULL,
  `tanggal_booking` varchar(255) DEFAULT NULL,
  `jam_booking` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'belum selesai'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`booking_id`, `nama_pembooking`, `tanggal_booking`, `jam_booking`, `status`) VALUES
(1, 'nizar', '2021-04-23', '10', 'belum selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `nama_menu` varchar(255) DEFAULT NULL,
  `menu_link` varchar(255) DEFAULT NULL,
  `menu_icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`menu_id`, `nama_menu`, `menu_link`, `menu_icon`) VALUES
(1, 'Dashboard', 'menu/dashboard', 'fas fa-fire'),
(2, 'Laporan Bookingan', 'menu/laporan', 'fas fa-book');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_menu`
--

CREATE TABLE `sub_menu` (
  `submenu_id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `nama_submenu` varchar(255) DEFAULT NULL,
  `link_submenu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `role` int(3) DEFAULT 2,
  `username` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`uid`, `role`, `username`, `fullname`, `password`) VALUES
(3, 1, 'admin', 'administrator', '$2y$10$Bom4QbQGjrGDF1YrrmTg2O.RWlj3RakTfcv.1DVUE5H6kuV5eM6G6');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indeks untuk tabel `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`submenu_id`),
  ADD KEY `FK_456b5d55-56db-4ae8-87bd-fd05259f228e` (`menu_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD CONSTRAINT `FK_456b5d55-56db-4ae8-87bd-fd05259f228e` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
