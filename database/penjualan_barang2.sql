-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jan 2023 pada 16.49
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan_barang2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `harga_satuan` bigint(20) NOT NULL,
  `keterangan` text NOT NULL,
  `stok` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `id_jenis`, `id_user`, `nama_barang`, `harga_satuan`, `keterangan`, `stok`, `status`) VALUES
(1, 1, 1, 'Kopi', 3000, 'Tersedia', 75, 1),
(2, 1, 1, 'Teh', 3000, 'Tersedia', 76, 1),
(3, 2, 1, 'kopi', 5000, 'tersedia', 75, 0),
(4, 2, 1, 'Pasta gigi', 1000, 'tersedia', 80, 1),
(5, 2, 1, 'Sabun Mandi', 10000, 'tersedia', 70, 1),
(6, 1, 1, 'sampo', 1000, 'tersedia', 75, 1),
(7, 1, 1, 'Teh', 5000, 'tersedia', 76, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id` int(11) NOT NULL,
  `nama_jenis` varchar(128) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id`, `nama_jenis`, `status`) VALUES
(1, 'Konsumsi', 1),
(2, 'Pembersih', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `total_harga` bigint(20) NOT NULL,
  `tanggal` bigint(20) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_barang`, `id_jenis`, `id_user`, `kuantitas`, `total_harga`, `tanggal`, `status`) VALUES
(2, 1, 1, 2, 10, 30000, 1674660402, 0),
(3, 2, 1, 2, 19, 57000, 1674660421, 0),
(4, 4, 2, 2, 20, 20000, 1674660457, 0),
(5, 5, 2, 2, 30, 300000, 1674660474, 0),
(6, 6, 1, 2, 25, 25000, 1674660495, 0),
(7, 7, 1, 2, 5, 25000, 1674660510, 0),
(8, 3, 2, 2, 15, 75000, 1674660677, 0),
(9, 1, 1, 2, 10, 30000, 1674660720, 0),
(10, 2, 1, 2, 19, 57000, 1674660742, 0),
(11, 1, 1, 2, 10, 30000, 1674661214, 1),
(12, 2, 1, 2, 19, 57000, 1674661242, 1),
(13, 1, 1, 2, 15, 45000, 1674661262, 1),
(14, 4, 2, 2, 20, 20000, 1674661277, 1),
(15, 5, 2, 2, 30, 300000, 1674661291, 1),
(16, 6, 1, 2, 25, 25000, 1674661309, 1),
(17, 2, 1, 2, 5, 15000, 1674661348, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `nomor_hp` varchar(64) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `alamat`, `nomor_hp`, `jenis_kelamin`, `email`, `password`, `role`) VALUES
(1, 'Admin', 'Indonesia', '081111111111', 'Laki-laki', 'admin@email.com', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'Pelanggan', 'Indonesia', '082222222222', 'Perempuan', 'pelanggan@email.com', '7f78f06d2d1262a0a222ca9834b15d9d', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_barang` (`id_jenis`),
  ADD KEY `user_barang` (`id_user`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_transaksi` (`id_barang`),
  ADD KEY `jenis_transaksi` (`id_jenis`),
  ADD KEY `user_transaksi` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `jenis_barang` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_barang` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `barang_transaksi` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jenis_transaksi` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_transaksi` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
