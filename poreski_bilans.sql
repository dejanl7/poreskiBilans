-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2016 at 01:07 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poreski_bilans`
--

-- --------------------------------------------------------

--
-- Table structure for table `podaci`
--

CREATE TABLE `podaci` (
  `id` bigint(20) NOT NULL,
  `naziv_firme` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sediste` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pib` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `vrsta_obveznika` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `period_od` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `period_do` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `godina` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dobit_poslovne_godine` decimal(17,2) NOT NULL,
  `dobit_koncesije` decimal(17,2) NOT NULL,
  `gubitak_poslovne_godine` decimal(17,2) NOT NULL,
  `dobici_imovina` decimal(17,2) NOT NULL,
  `gubici_imovina` decimal(17,2) NOT NULL,
  `nedokumentovani_troskovi` decimal(17,2) NOT NULL,
  `ivos_potrazivanja` decimal(17,2) NOT NULL,
  `pokloni_organizacijama` decimal(17,2) NOT NULL,
  `pokloni_p_l` decimal(17,2) NOT NULL,
  `kamate` decimal(17,2) NOT NULL,
  `prinudna_naplata` decimal(17,2) NOT NULL,
  `novcane_kazne` decimal(17,2) NOT NULL,
  `zatezne_kamate` decimal(17,2) NOT NULL,
  `neposlovni_troskovi` decimal(17,2) NOT NULL,
  `troskovi_materijala` decimal(17,2) NOT NULL,
  `obracuante_otpremnine` decimal(17,2) NOT NULL,
  `isplacene_otpremnine` decimal(17,2) NOT NULL,
  `amortizacija` decimal(17,2) NOT NULL,
  `poreska_amortizacija` decimal(17,2) NOT NULL,
  `nauka_zdravstvo` decimal(17,2) NOT NULL,
  `izdaci_kultura` decimal(17,2) NOT NULL,
  `clanarine` decimal(17,2) NOT NULL,
  `reklame` decimal(17,2) NOT NULL,
  `reprezentacija` decimal(17,2) NOT NULL,
  `ivos_manje` decimal(17,2) NOT NULL,
  `nerezidentno_lice` decimal(17,2) NOT NULL,
  `neplaceni_porezi` decimal(17,2) NOT NULL,
  `placeni_porezi` decimal(17,2) NOT NULL,
  `veci_ivos` decimal(17,2) NOT NULL,
  `ivos_osiguranje` decimal(17,2) NOT NULL,
  `nepriznata_dug_rez` decimal(17,2) NOT NULL,
  `iskoriscena_dug_rez` decimal(17,2) NOT NULL,
  `rashodi_obezvredjenje` decimal(17,2) NOT NULL,
  `rashodi_obezvredjenje1` decimal(17,2) NOT NULL,
  `tax` decimal(17,2) NOT NULL,
  `porez_dividende` decimal(17,2) NOT NULL,
  `porez_po_odbitku` decimal(17,2) NOT NULL,
  `ivos_pojedinacna` decimal(17,2) NOT NULL,
  `prihodi_ivos` decimal(17,2) NOT NULL,
  `prihodi_dividende` decimal(17,2) NOT NULL,
  `prihodi_kamate` decimal(17,2) NOT NULL,
  `neiskoriscena_dug_rez` decimal(17,2) NOT NULL,
  `prihodi_rashodi` decimal(17,2) NOT NULL,
  `troskovi_trcena` decimal(17,2) NOT NULL,
  `izvestaj_trcena` decimal(17,2) NOT NULL,
  `prihodi_trcena` decimal(17,2) NOT NULL,
  `obracunati_trprihodi` decimal(17,2) NOT NULL,
  `obr_krashodi` decimal(17,2) NOT NULL,
  `obr_krprihodi` decimal(17,2) NOT NULL,
  `zbir_korekcija` decimal(17,2) NOT NULL,
  `kamata_zajam` decimal(17,2) NOT NULL,
  `oporeziva_dobit` decimal(17,2) NOT NULL,
  `gubitak` decimal(17,2) NOT NULL,
  `prethodni_gubitak` decimal(17,2) NOT NULL,
  `ostatak_oporezive_dobiti` decimal(17,2) NOT NULL,
  `kd_tg` decimal(17,2) NOT NULL,
  `kg_tg` decimal(17,2) NOT NULL,
  `kapitalni_dobici` decimal(17,2) NOT NULL,
  `kapitalni_gubici` decimal(17,2) NOT NULL,
  `preneti_kapitalni_gubici` decimal(17,2) NOT NULL,
  `ostatak_kap_dobitka` decimal(17,2) NOT NULL,
  `poreska_osnovica` decimal(17,2) NOT NULL,
  `u` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dana` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `podaci`
--
ALTER TABLE `podaci`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `podaci`
--
ALTER TABLE `podaci`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
