-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2022-01-17 09:22:43
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
(1, '山田太郎', 'aaaa@a', '1111', 0, 0, '2021-12-20 18:45:27', '2021-12-20 18:45:27'),
(56, '海馬セト', 'bbbb@bbbb', '$2y$10$IfU668DCEvHMku2NoKhX5uv0nsN/mXvcNamVzwBlZwf2FSjFbDreK', 0, 0, '2022-01-10 22:51:10', '2022-01-10 22:51:10'),
(57, 'ルメール', 'cccc@c', '$2y$10$WAasnChuAxXxhoM6FLl5ueiW/860vD6lFr9S0ISZGCQ0CXIamt0z6', 0, 0, '2022-01-11 00:23:39', '2022-01-11 00:23:39');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
