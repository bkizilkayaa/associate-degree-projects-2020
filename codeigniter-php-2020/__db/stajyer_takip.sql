-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 22 Haz 2020, 22:33:19
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `stajyer_takip`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_degisiklik`
--

DROP TABLE IF EXISTS `tbl_degisiklik`;
CREATE TABLE `tbl_degisiklik` (
  `talep_id` int(11) NOT NULL,
  `ogrenci_nosu` varchar(30) NOT NULL,
  `ogrenci_adi` varchar(30) DEFAULT NULL,
  `ogrenci_soyadi` varchar(30) DEFAULT NULL,
  `eski_firmasi` int(11) DEFAULT NULL,
  `nedeni` text,
  `yeni_firmasi` int(11) DEFAULT NULL,
  `talep_tarihi` text,
  `sorumlu_ogretmeni` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_firmalar`
--

DROP TABLE IF EXISTS `tbl_firmalar`;
CREATE TABLE `tbl_firmalar` (
  `firma_id` int(11) NOT NULL,
  `firma_alani` varchar(30) DEFAULT NULL,
  `firma_adi` varchar(30) DEFAULT NULL,
  `firma_adresi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `yol_destegi` double DEFAULT NULL,
  `yemek_destegi` double DEFAULT NULL,
  `calisan_sayisi` int(11) DEFAULT NULL,
  `stajyer_maasi` double DEFAULT NULL,
  `firma_telefon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `tbl_firmalar`
--

INSERT INTO `tbl_firmalar` (`firma_id`, `firma_alani`, `firma_adi`, `firma_adresi`, `yol_destegi`, `yemek_destegi`, `calisan_sayisi`, `stajyer_maasi`, `firma_telefon`) VALUES
(2, 'Mobil Programlama', 'modpos', 'Gürsel Mahallesi Doğuş iş merkezi İkbal sok D:No:1 6/12, 34265 Kâğıthane', 200, 150, 11, 467.33, '0212 216 1121'),
(3, 'Veri', 'cyberist', 'Sakarya Serdivan', 0, 200, 11, 670, '321398293221'),
(4, 'Masaüst Programlama', 'SolvePark', 'KKKKKKKKKKKK', 0, 150, 21, 680, '321398293221'),
(5, 'Mobil Programlama', 'KLKL', 'Sakarya Serdivan', 0, 200, 11, 471.35, '02122151478');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_ogrenci`
--

DROP TABLE IF EXISTS `tbl_ogrenci`;
CREATE TABLE `tbl_ogrenci` (
  `ogrenci_id` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ogrenci_ad` varchar(30) DEFAULT NULL,
  `ogrenci_soyad` varchar(30) DEFAULT NULL,
  `firma_id` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `staj_baslangic` date DEFAULT NULL,
  `staj_bitis` date DEFAULT NULL,
  `sorumlu_ogretmen` int(11) DEFAULT NULL,
  `staj_not_ort` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tbl_ogrenci`
--

INSERT INTO `tbl_ogrenci` (`ogrenci_id`, `ogrenci_ad`, `ogrenci_soyad`, `firma_id`, `staj_baslangic`, `staj_bitis`, `sorumlu_ogretmen`, `staj_not_ort`) VALUES
('b192102001', 'metin', 'yıldızz', '2', '2020-06-01', '2020-06-10', 1, 0),
('b19210201', 'hamz', 'arslan', '4', '2018-12-01', '2019-04-12', 1, 71),
('b192102015', 'hamza', 'arslan', '4', '2020-05-01', '2020-05-31', 2, 16),
('b19210207', 'merveA', 'kayaA', '5', '2019-12-12', '2020-12-12', 3, 65);

--
-- Tetikleyiciler `tbl_ogrenci`
--
DROP TRIGGER IF EXISTS `trg_aktar`;
DELIMITER $$
CREATE TRIGGER `trg_aktar` AFTER INSERT ON `tbl_ogrenci` FOR EACH ROW BEGIN
       INSERT INTO tbl_ogrenci_not (ogrenci_no) VALUES (NEW.ogrenci_id);
   END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `trg_sill`;
DELIMITER $$
CREATE TRIGGER `trg_sill` AFTER DELETE ON `tbl_ogrenci` FOR EACH ROW BEGIN
     DELETE FROM tbl_ogrenci_not WHERE ogrenci_no=OLD.ogrenci_id;
   END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_ogrenci_not`
--

DROP TABLE IF EXISTS `tbl_ogrenci_not`;
CREATE TABLE `tbl_ogrenci_not` (
  `ogrenci_no` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fiilen_mevcudiyet_` smallint(6) DEFAULT NULL,
  `mesguliyet_` smallint(6) DEFAULT NULL,
  `farkindalik_` smallint(6) DEFAULT NULL,
  `pratik_iliskilendirme_` smallint(6) DEFAULT NULL,
  `gorevleri_uygulama_` smallint(6) DEFAULT NULL,
  `sorumluluk_alma_` smallint(6) DEFAULT NULL,
  `yenilik_gelistirme_` smallint(6) DEFAULT NULL,
  `iletisim_becerisi_` smallint(6) DEFAULT NULL,
  `rapor_yazimi_` smallint(6) DEFAULT NULL,
  `uygulama_uyumu_` smallint(6) DEFAULT NULL,
  `rapor_eklerinin_uyumu_` smallint(6) DEFAULT NULL,
  `savunmada_tutarlilik_` smallint(6) DEFAULT NULL,
  `myo_not_ort` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tbl_ogrenci_not`
--

INSERT INTO `tbl_ogrenci_not` (`ogrenci_no`, `fiilen_mevcudiyet_`, `mesguliyet_`, `farkindalik_`, `pratik_iliskilendirme_`, `gorevleri_uygulama_`, `sorumluluk_alma_`, `yenilik_gelistirme_`, `iletisim_becerisi_`, `rapor_yazimi_`, `uygulama_uyumu_`, `rapor_eklerinin_uyumu_`, `savunmada_tutarlilik_`, `myo_not_ort`) VALUES
('b192102015', 0, 27, 33, 22, 0, 0, 0, 51, 0, 41, 20, 0, 16),
('b19210201', 66, 45, 77, 58, 66, 77, 88, 100, 100, 100, 33, 44, 71),
('b19210207', 36, 22, 36, 45, 45, 78, 78, 87, 87, 88, 98, 80, 65),
('b192102001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Tetikleyiciler `tbl_ogrenci_not`
--
DROP TRIGGER IF EXISTS `trg_guncelle`;
DELIMITER $$
CREATE TRIGGER `trg_guncelle` AFTER UPDATE ON `tbl_ogrenci_not` FOR EACH ROW BEGIN
  UPDATE tbl_ogrenci SET staj_not_ort=new.myo_not_ort WHERE ogrenci_id=OLD.ogrenci_no;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_ogretmen`
--

DROP TABLE IF EXISTS `tbl_ogretmen`;
CREATE TABLE `tbl_ogretmen` (
  `ogretmen_id` int(11) NOT NULL,
  `ogretmen_ad` varchar(30) DEFAULT NULL,
  `ogretmen_soyad` varchar(30) DEFAULT NULL,
  `ogretmen_unvan` varchar(30) DEFAULT NULL,
  `girisAdi` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sifre` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ogretmen_mail` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `tbl_ogretmen`
--

INSERT INTO `tbl_ogretmen` (`ogretmen_id`, `ogretmen_ad`, `ogretmen_soyad`, `ogretmen_unvan`, `girisAdi`, `sifre`, `ogretmen_mail`) VALUES
(1, 'ismail', 'öylek', 'öğretim görevlisi', 'ismailoylek', '202cb962ac59075b964b07152d234b70', 'ioylek@subu.edu.tr'),
(2, 'serkan', 'dereli', 'dr', 'dereli', '202cb962ac59075b964b07152d234b70', NULL),
(3, 'fevziye gözde', 'gökpınar', 'öğretim görevlisi', 'gokpinar', '250cf8b51c773f3f8dc8b4be867a9a02', 'ggokpinar@subu.edu.tr'),
(49, 'ismail', 'öylek', 'öğretim görevlisi', 'ozkancanay', '202cb962ac59075b964b07152d234b70', 'ewewew');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `tbl_degisiklik`
--
ALTER TABLE `tbl_degisiklik`
  ADD PRIMARY KEY (`talep_id`);

--
-- Tablo için indeksler `tbl_firmalar`
--
ALTER TABLE `tbl_firmalar`
  ADD PRIMARY KEY (`firma_id`);

--
-- Tablo için indeksler `tbl_ogrenci`
--
ALTER TABLE `tbl_ogrenci`
  ADD PRIMARY KEY (`ogrenci_id`);

--
-- Tablo için indeksler `tbl_ogretmen`
--
ALTER TABLE `tbl_ogretmen`
  ADD PRIMARY KEY (`ogretmen_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `tbl_degisiklik`
--
ALTER TABLE `tbl_degisiklik`
  MODIFY `talep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_firmalar`
--
ALTER TABLE `tbl_firmalar`
  MODIFY `firma_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_ogretmen`
--
ALTER TABLE `tbl_ogretmen`
  MODIFY `ogretmen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
