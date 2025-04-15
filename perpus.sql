-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 15 Apr 2025 pada 08.49
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `sinopsis` text DEFAULT NULL,
  `pengarang` varchar(100) DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `sinopsis`, `pengarang`, `cover`, `id_kategori`) VALUES
(2, 'Cara Cerdas Bernegara revealed', 'Dokumen tersebut membahas konsep cara cerdas bernegara yang diusulkan oleh Bossman Mardigu Wowiek yang mencakup pengurangan birokrasi, perubahan sistem pendidikan dan pertahanan, serta pembangunan ibu kota baru. Dokumen selanjutnya membahas pengaruh konsep tersebut yang masih terbatas di kalangan masyarakat Indonesia, serta situasi geopolitik ketegangan antara Tiongkok dan Taiwan yang berpotensi memicu konflik bersenjata.', 'Bossman Mardigu Wowiek', 'buku2.jpg', 1),
(4, 'Dongkrak Omset Milyaran dengan tim penjualan', 'Buku ini memberikan panduan bagaimana membangun tim penjualan yang handal, setia, dan mahir menutup penjualan (closing) untuk meningkatkan omzet hingga miliaran. Buku ini berisi kisah-kisah praktisi bisnis yang berhasil menerapkan strategi penjualan dalam buku ini untuk meningkatkan omset mereka hingga ratusan juta hingga miliaran rupiah.', 'Dewa Eka Prayoga', 'buku1.jpg', 2),
(5, 'Bahasa Jepang untuk pemula', 'Buku Bahasa Jepang untuk Pemula memberikan pemahaman dasar bahasa Jepang, termasuk tata bahasa, kosakata, dan ekspresi sehari-hari. Buku ini menggunakan pendekatan praktis dengan contoh dialog, latihan interaktif, dan studi kasus. ', 'Nino Harryken S.', 'buku3.jpg', 2),
(6, 'Komik Donal Bebek Paman Gober', 'Komik Donal Bebek dan Paman Gober bercerita tentang petualangan Paman Gober, seorang bebek kaya raya yang mencari harta karun. Paman Gober adalah paman dari Donal Bebek, keponakannya yang miskin.', 'Carl Barks', 'buku4.jpg', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Fiksi'),
(2, 'Nonfiksi'),
(3, 'komik'),
(4, 'Sastra'),
(5, 'Bisnis dan Ekonomi'),
(6, 'Sejarah'),
(7, 'Politik'),
(8, 'Kesehatan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
