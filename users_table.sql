-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2022-01-19 16:58:09
-- サーバのバージョン： 10.4.22-MariaDB
-- PHP のバージョン: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `moetness_test`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `users_table`
--

CREATE TABLE `users_table` (
  `id` int(11) NOT NULL,
  `users_name` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `users_email` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `users_password` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `is_admin` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `users_table`
--

INSERT INTO `users_table` (`id`, `users_name`, `users_email`, `users_password`, `is_admin`, `is_deleted`, `created_at`, `updated_at`) VALUES
(56, '海馬セト', 'bbbb@bbbb', '$2y$10$IfU668DCEvHMku2NoKhX5uv0nsN/mXvcNamVzwBlZwf2FSjFbDreK', 0, 0, '2022-01-10 22:51:10', '2022-01-10 22:51:10'),
(57, 'ルメール', 'cccc@c', '$2y$10$WAasnChuAxXxhoM6FLl5ueiW/860vD6lFr9S0ISZGCQ0CXIamt0z6', 0, 0, '2022-01-11 00:23:39', '2022-01-11 00:23:39'),
(58, 'Mデムーロ', 'mmmm@m', '$2y$10$.myU46L.nagzczFgRwjm/OGOBevzuc4/esvBhf13qja.zgX5loeUO', 0, 0, '2022-01-19 23:07:36', '2022-01-19 23:07:36'),
(59, '福永祐一', 'ffff@f', '$2y$10$EZiymmsSFZR3saOwOlsF9.nhj2OYUHC5cHUYYVDpmH8/ObeGktWSm', 0, 0, '2022-01-19 23:08:11', '2022-01-19 23:08:11'),
(60, '藤田菜七子', 'nnnn@n', '$2y$10$5wIoUIGFjntO2nOPA7RNROC5KKrO2vF5hTLT7AByoLXPbuP0qY9yq', 0, 0, '2022-01-19 23:09:09', '2022-01-19 23:09:09'),
(61, '徳川家康', 'shogun@s', '$2y$10$9ClpbGUjVnoNfpTgVIjik.O3ISu1K5w4KPniBGOYUb3/sUn3xtXGy', 0, 0, '2022-01-20 00:50:14', '2022-01-20 00:50:14');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
