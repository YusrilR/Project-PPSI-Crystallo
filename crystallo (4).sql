-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2021 pada 08.41
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crystallo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggajian_pegawai`
--

CREATE TABLE `penggajian_pegawai` (
  `Id_PenggajianPegawai` char(5) NOT NULL,
  `Id_Pegawai` char(5) NOT NULL,
  `Id_Gaji` char(5) NOT NULL,
  `Tgl_PenggajianPegawai` date NOT NULL,
  `Grand_Total` int(11) NOT NULL,
  `ApprovalPegawai_Keuangan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggajian_pekerja`
--

CREATE TABLE `penggajian_pekerja` (
  `Id_PenggajianPekerja` char(5) NOT NULL,
  `Id_Pekerja` char(5) NOT NULL,
  `Id_Gaji` char(5) NOT NULL,
  `Tgl_PenggajianPekerja` date NOT NULL,
  `Jml_Produksi` int(11) NOT NULL,
  `Grand_Total` int(11) NOT NULL,
  `ApprovalPekerja_Keuangan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi`
--

CREATE TABLE `produksi` (
  `Id_Produksi` char(5) NOT NULL,
  `Id_Produk` char(5) NOT NULL,
  `Id_Bahan` char(5) NOT NULL,
  `Id_Pekerja` char(5) NOT NULL,
  `Tgl_Produksi` date NOT NULL,
  `Qty_Produksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produksi`
--

INSERT INTO `produksi` (`Id_Produksi`, `Id_Produk`, `Id_Bahan`, `Id_Pekerja`, `Tgl_Produksi`, `Qty_Produksi`) VALUES
('PD001', 'PR001', 'BB001', 'PP001', '2021-06-27', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_bahanbaku`
--

CREATE TABLE `tabel_bahanbaku` (
  `Id_Bahan` char(5) NOT NULL,
  `Nama_Bahan` varchar(20) NOT NULL,
  `Stok_Bahan` int(11) NOT NULL,
  `HargaBahan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_bahanbaku`
--

INSERT INTO `tabel_bahanbaku` (`Id_Bahan`, `Nama_Bahan`, `Stok_Bahan`, `HargaBahan`) VALUES
('BB001', 'Karet', 10, 10000),
('BB002', 'Bahan 2', 5, 8000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_gaji`
--

CREATE TABLE `tabel_gaji` (
  `Id_Gaji` char(5) NOT NULL,
  `Deskripsi` varchar(50) NOT NULL,
  `Besar_Gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_gaji`
--

INSERT INTO `tabel_gaji` (`Id_Gaji`, `Deskripsi`, `Besar_Gaji`) VALUES
('GP001', 'gaji nada loh ini', 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_pegawai`
--

CREATE TABLE `tabel_pegawai` (
  `Id_Pegawai` char(5) NOT NULL,
  `Nama_Pegawai` varchar(20) NOT NULL,
  `Alamat_Pegawai` varchar(50) NOT NULL,
  `No_Telp_Pegawai` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_pegawai`
--

INSERT INTO `tabel_pegawai` (`Id_Pegawai`, `Nama_Pegawai`, `Alamat_Pegawai`, `No_Telp_Pegawai`) VALUES
('PG001', 'nada', 'di krian', '08123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_pekerja`
--

CREATE TABLE `tabel_pekerja` (
  `Id_Pekerja` char(5) NOT NULL,
  `Nama_Pekerja` varchar(20) NOT NULL,
  `Alamat_Pekerja` varchar(50) NOT NULL,
  `No_Telp_Pekerja` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_pekerja`
--

INSERT INTO `tabel_pekerja` (`Id_Pekerja`, `Nama_Pekerja`, `Alamat_Pekerja`, `No_Telp_Pekerja`) VALUES
('PP001', 'nada', 'Jl. Riyanto No.40', '085247275979');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_pelanggan`
--

CREATE TABLE `tabel_pelanggan` (
  `Id_Pelanggan` char(5) NOT NULL,
  `Nama_Pelanggan` varchar(20) NOT NULL,
  `Alamat_Pelanggan` varchar(50) NOT NULL,
  `No_Telp_Pelanggan` varchar(13) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_pelanggan`
--

INSERT INTO `tabel_pelanggan` (`Id_Pelanggan`, `Nama_Pelanggan`, `Alamat_Pelanggan`, `No_Telp_Pelanggan`, `Password`) VALUES
('PL001', 'Alvansyah', 'Jl Wonorejo 23', '14045', 'alvan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_pemesanan`
--

CREATE TABLE `tabel_pemesanan` (
  `Id_Produk` char(5) NOT NULL,
  `Id_Pelanggan` char(5) NOT NULL,
  `Kode_Pemesanan` char(5) NOT NULL,
  `Tgl_Pemesanan` date NOT NULL,
  `Qty_Pemesanan` int(11) NOT NULL,
  `Grand_Total` int(11) NOT NULL,
  `Metode_Pengiriman` varchar(25) NOT NULL,
  `Status_Bayar` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_produk`
--

CREATE TABLE `tabel_produk` (
  `Id_Produk` char(5) NOT NULL,
  `Nama_Produk` varchar(20) NOT NULL,
  `Stok` int(11) NOT NULL,
  `Harga` int(11) NOT NULL,
  `file_gambar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_produk`
--

INSERT INTO `tabel_produk` (`Id_Produk`, `Nama_Produk`, `Stok`, `Harga`, `file_gambar`) VALUES
('PR001', 'Sepatu Sandal', 12, 7000, '24.jpg'),
('PR002', 'Klompen 1', 10, 25000, 'klompen1.jpg'),
('PR003', 'Sandal Bagus', 20, 31000, 'Sepatusendal.jpg'),
('PR004', 'Klompen Air Brush', 6, 40000, 'arss2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_supplier`
--

CREATE TABLE `tabel_supplier` (
  `Id_Supplier` char(5) NOT NULL,
  `Nama_Supplier` varchar(20) NOT NULL,
  `Alamat_Supplier` varchar(50) NOT NULL,
  `No_Telp_Supplier` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_user`
--

CREATE TABLE `tabel_user` (
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_user`
--

INSERT INTO `tabel_user` (`username`, `password`, `level`) VALUES
('admin', 'admin', 'admin'),
('gudang', 'gudang', 'gudang'),
('kepegawaian', 'kepegawaian', 'kepegawaian'),
('keuangan', 'keuangan', 'keuangan'),
('pemesanan', 'pemesanan', 'pemesanan'),
('produksi', 'produksi', 'produksi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `penggajian_pegawai`
--
ALTER TABLE `penggajian_pegawai`
  ADD PRIMARY KEY (`Id_PenggajianPegawai`),
  ADD KEY `FK_PegawaiPenggajian` (`Id_Pegawai`),
  ADD KEY `FK_PegawaiGaji` (`Id_Gaji`);

--
-- Indeks untuk tabel `penggajian_pekerja`
--
ALTER TABLE `penggajian_pekerja`
  ADD PRIMARY KEY (`Id_PenggajianPekerja`),
  ADD KEY `FK_PekerjaPenggajian` (`Id_Pekerja`),
  ADD KEY `FK_PekerjaGaji` (`Id_Gaji`);

--
-- Indeks untuk tabel `produksi`
--
ALTER TABLE `produksi`
  ADD KEY `FK_PProduksi` (`Id_Produk`),
  ADD KEY `FK_BProduksi` (`Id_Bahan`),
  ADD KEY `FK_PekerjaProduksi` (`Id_Pekerja`);

--
-- Indeks untuk tabel `tabel_bahanbaku`
--
ALTER TABLE `tabel_bahanbaku`
  ADD PRIMARY KEY (`Id_Bahan`);

--
-- Indeks untuk tabel `tabel_gaji`
--
ALTER TABLE `tabel_gaji`
  ADD PRIMARY KEY (`Id_Gaji`);

--
-- Indeks untuk tabel `tabel_pegawai`
--
ALTER TABLE `tabel_pegawai`
  ADD PRIMARY KEY (`Id_Pegawai`);

--
-- Indeks untuk tabel `tabel_pekerja`
--
ALTER TABLE `tabel_pekerja`
  ADD PRIMARY KEY (`Id_Pekerja`);

--
-- Indeks untuk tabel `tabel_pelanggan`
--
ALTER TABLE `tabel_pelanggan`
  ADD PRIMARY KEY (`Id_Pelanggan`);

--
-- Indeks untuk tabel `tabel_pemesanan`
--
ALTER TABLE `tabel_pemesanan`
  ADD PRIMARY KEY (`Kode_Pemesanan`),
  ADD KEY `FK_ProdukPesan` (`Id_Produk`),
  ADD KEY `FK_PelangganPesan` (`Id_Pelanggan`);

--
-- Indeks untuk tabel `tabel_produk`
--
ALTER TABLE `tabel_produk`
  ADD PRIMARY KEY (`Id_Produk`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `penggajian_pegawai`
--
ALTER TABLE `penggajian_pegawai`
  ADD CONSTRAINT `FK_PegawaiGaji` FOREIGN KEY (`Id_Gaji`) REFERENCES `tabel_gaji` (`Id_Gaji`),
  ADD CONSTRAINT `FK_PegawaiPenggajian` FOREIGN KEY (`Id_Pegawai`) REFERENCES `tabel_pegawai` (`Id_Pegawai`);

--
-- Ketidakleluasaan untuk tabel `penggajian_pekerja`
--
ALTER TABLE `penggajian_pekerja`
  ADD CONSTRAINT `FK_PekerjaGaji` FOREIGN KEY (`Id_Gaji`) REFERENCES `tabel_gaji` (`Id_Gaji`),
  ADD CONSTRAINT `FK_PekerjaPenggajian` FOREIGN KEY (`Id_Pekerja`) REFERENCES `tabel_pekerja` (`Id_Pekerja`);

--
-- Ketidakleluasaan untuk tabel `produksi`
--
ALTER TABLE `produksi`
  ADD CONSTRAINT `FK_BProduksi` FOREIGN KEY (`Id_Bahan`) REFERENCES `tabel_bahanbaku` (`Id_Bahan`),
  ADD CONSTRAINT `FK_PProduksi` FOREIGN KEY (`Id_Produk`) REFERENCES `tabel_produk` (`Id_Produk`),
  ADD CONSTRAINT `FK_PekerjaProduksi` FOREIGN KEY (`Id_Pekerja`) REFERENCES `tabel_pekerja` (`Id_Pekerja`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
