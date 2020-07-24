-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 24, 2020 at 12:29 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deteksi_autis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `kata_sandi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `kata_sandi`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `isi`) VALUES
(1, 'Insting Keibuan Dian Sastro Tepat Menangani Anaknya yang Autis', 'Dian Sastrowardoyo berbagi cerita tentang anak pertamanya yang didiagnosis memiliki spektrum autisme. Insting keibuannya merasakan hal yang tidak beres sejak anaknya berusia 4 bulan.\r\n\r\n\"Dia selalu nangis parah, tantrum, kalau ada perubahan kecil. Misalkan dari ruang yang cerah ke ruang yang gelap, dari udara luar ke ruangan ber-AC,\" ujar Dian dalam seminar daring bersama Konekin dan Rumah Millenials (19/4/2020).\r\n\r\nReaksi tersebut membuat pemeran Cinta di film AADC ini mencari tahu apa yang salah dengan anaknya. Ia sempat beberapa kali pergi ke dokter, tak jarang dokter yang menangani menganggap ini normal.\r\n\r\n\"Karena itu dokter anak, bukan dokter spesialis menangani anak berkebutuhan khusus.\"\r\n\r\nInsting seorang ibu tidak membuatnya berhenti sampai di sana. Ia tetap mencari tahu apa yang salah dengan anaknya.'),
(3, 'Awal Mula Puteri Indonesia Kalbar 2019 Ajarkan Tari untuk Anak Berkebutuhan Khusus', 'Puteri Indonesia Kalimantan Barat 2019, Karina Syahna membagikan pengalaman mengajar tari bagi anak dengan disabilitas. Perempuan usia 25 ini mulai aktif mengajar tari sejak 7 tahun silam.\r\n\r\nGrup tari yang ia pegang bernama G-Star, terdiri dari anak-anak autis, down syndrome, dan tuli. G-Star acap kali unjuk kebolehan di berbagai acara baik di dalam maupun di luar negeri.\r\n\r\nâ€œBiasanya kami latihan satu minggu satu kali. Kalau ada acara, kami latihan bisa sampai lima kali dalam satu minggu,â€ ujar Karina dalam webminar M Talks Konekin.\r\n\r\nMenurutnya, untuk menolong dan berkolaborasi, orang harus mau berkenalan, menerima perbedaan, dan stigma di masyarakat tentang disabilitas. Hal tersebut tidak ia anggap sebagai penghalang melainkan tantangan yang harus dihadapi.');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id` int(11) NOT NULL,
  `nama_gejala` varchar(100) NOT NULL,
  `jawaban` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id`, `nama_gejala`, `jawaban`) VALUES
(71, 'Apakah anak terlalu asyik dengan obyek ?', 1),
(73, 'Apakah anak merespon panggilan ?', 1),
(74, 'Apakah anak bereaksi saat namanya dipanggil ?', 1),
(75, 'Apakah anak kurang kontak mata ?', 1),
(76, 'Apakah anak sering mengoceh ?', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `hari` varchar(128) NOT NULL,
  `waktu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `hari`, `waktu`) VALUES
(1, 'Senin', '10.00 - 16.00'),
(2, 'Selasa', '10.00 - 16.00');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `menu`, `content`) VALUES
(4, 'Taman Pelatihan Harapan', 'Taman Pelatihan Harapan merupakan pusat terapi yang menangani anak autis yang ada di Kota Makassar.'),
(5, 'Alamat', 'Jl. Pengayoman Komp. Ruko Akik Hijau F. 12A\r\nTelp. (0411) 448663 Makassar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diagnosa`
--

CREATE TABLE `tbl_diagnosa` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL,
  `jawaban` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hasil_diagnosa`
--

CREATE TABLE `tbl_hasil_diagnosa` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_diagnosa` varchar(56) NOT NULL,
  `presentase_hasil` decimal(4,2) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_hasil_diagnosa`
--

INSERT INTO `tbl_hasil_diagnosa` (`id`, `id_user`, `kode_diagnosa`, `presentase_hasil`, `tanggal`) VALUES
(1, 3, '24Jul2020114911', '93.75', '2020-07-24'),
(2, 3, '24072020114944', '0.00', '2020-07-24'),
(3, 3, '20202407115318', '87.50', '2020-07-24'),
(4, 3, '20202407115345', '75.00', '2020-07-24');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` datetime NOT NULL,
  `jenis_kelamin` int(1) NOT NULL,
  `alamat` text NOT NULL,
  `kata_sandi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `kata_sandi`) VALUES
(3, 'teset', 'test', '2020-07-17 00:00:00', 1, 'set', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_diagnosa`
--
ALTER TABLE `tbl_diagnosa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hasil_diagnosa`
--
ALTER TABLE `tbl_hasil_diagnosa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_diagnosa`
--
ALTER TABLE `tbl_diagnosa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tbl_hasil_diagnosa`
--
ALTER TABLE `tbl_hasil_diagnosa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
