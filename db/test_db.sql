-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 27 2022 г., 23:54
-- Версия сервера: 5.7.38
-- Версия PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(12) NOT NULL,
  `page` int(10) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(52) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `page`, `comment`, `createdAt`, `username`) VALUES
(1, 18, 'dsafdsf', '2022-12-21 18:06:12', 'ilana'),
(2, 18, 'fgsdgdfsg', '2022-12-21 18:06:12', 'ilana'),
(3, 18, 'agadsgdgf', '2022-12-21 18:06:12', 'ilana'),
(4, 18, 'fasdfdasfas', '2022-12-21 18:06:12', 'ilana'),
(5, 18, 'fadasgsdgsddgsdgs', '2022-12-21 18:06:12', 'ilana'),
(6, 18, 'werfewr', '2022-12-21 18:06:12', 'ilana'),
(7, 23, 'asdrfasfas', '2022-12-21 18:06:12', 'ilana'),
(8, 18, 'fsdgsfdg', '2022-12-21 18:12:32', 'ilana'),
(9, 18, 'dfsfgdsdfsg', '2022-12-21 18:19:00', 'ilana'),
(10, 18, 'dsfsaf', '2022-12-21 18:19:04', 'ilana');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `image_path` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `content`, `date`, `user_id`, `image_path`) VALUES
(16, 'dvsdvsvdsvdsvdd', 'vsdvsdvsfbzdfbzdfb', 'dzfbfdbtdt', '2022-12-14 13:17:22', 9, 'images/blog-post.jpg'),
(17, 'dtbdtbdtbdnttntnt', 'ntntnrtn', 'rtnsrtnsrntrtn', '2022-12-14 13:17:33', 9, 'images/image.png'),
(18, 'trnsrtnrtnsrtns', 'ntstntnstnfgnfxgnfgn', 'fgnfgnsftrtnrsnt', '2022-12-14 13:17:47', 9, 'images/image.png'),
(23, 'z', 'z', 'z', '2022-12-21 10:59:46', 11, 'images/image.png');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `channelname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `channelname`, `email`, `password`, `description`) VALUES
(4, 'Victor', 'victor@example.com', 'e10adc3949ba59abbe56e057f20f883e', NULL),
(6, 'ak', 'ak@mail.ru', '202cb962ac59075b964b07152d234b70', NULL),
(7, 'user', 'user@mail.ru', '202cb962ac59075b964b07152d234b70', NULL),
(8, 'qwe', 'qwe@mail.ru', '81dc9bdb52d04dc20036dbd8313ed055', NULL),
(9, 'qwety', 'vke2004@mail.ru', '202cb962ac59075b964b07152d234b70', NULL),
(11, 'z', 'z@mail.ru', '202cb962ac59075b964b07152d234b70', NULL),
(12, 'ilana', 'ilana@mail.ru', 'dc3b2f948f70137c146d91e10938e2a6', NULL),
(13, 'iiii', 'i@mail.ru', '698d51a19d8a121ce581499d7b701668', NULL),
(14, 'sssss', 'iii@mail.ru', 'dc3b2f948f70137c146d91e10938e2a6', NULL),
(15, 'xzxzxz', 'i1@gmail.ru', '698d51a19d8a121ce581499d7b701668', 'xzxzxzzxxz');

-- --------------------------------------------------------

--
-- Структура таблицы `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `video_url` text NOT NULL,
  `channelname` varchar(50) DEFAULT NULL,
  `videoname` varchar(50) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `channel_id` int(11) NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `videos`
--

INSERT INTO `videos` (`id`, `video_url`, `channelname`, `videoname`, `description`, `channel_id`, `image_url`) VALUES
(3, 'video-63a44eab5cdbf4.57623646.mp4', 'ilana', 'dfsddsd', NULL, 12, 'images/kitten_5120x2880_ib3l1.jpg'),
(4, 'video-63a44eb5b74710.93307892.mp4', 'ilana', 'xzxzxzxz', 'xzxz', 12, 'images/kitten_5120x2880_ib3l1.jpg'),
(5, 'video-63a46420d54e08.36478872.mp4', 'ilana', 'dsfdsaf', 'dfasffdssf', 12, 'images/kitten_5120x2880_ib3l1.jpg'),
(6, 'video-63a4647c7359b4.07062455.mp4', 'ilana', 'dsfdsf', 'dfsfdfs', 12, 'images/kitten_5120x2880_ib3l1.jpg'),
(7, 'video-63a46b9d945a47.46221641.mp4', 'username', 'sd', 'ddd', 17, 'images/kitten_5120x2880_ib3l1.jpg'),
(8, 'video-63a46baa4a1dc5.19225608.mp4', 'username', 'xxczcxz', 'xczcxxcz', 17, 'images/kitten_5120x2880_ib3l1.jpg'),
(9, 'video-63a46bf3757af6.84199249.mp4', 'username', 'saddasdas', 'dasdasdas', 17, 'images/kitten_5120x2880_ib3l1.jpg'),
(10, 'video-63a46c6f530b24.70033243.mp4', 'ilana', 'AAAAAAAA', 'AAAAAAAAAA', 12, 'images/kitten_5120x2880_ib3l1.jpg'),
(11, 'video-63a46e7ebfede3.74823905.mp4', 'ilana', 'IIIIIIIIIIIdasdasdas', 'sdadasdas', 12, 'images/kitten_5120x2880_ib3l1.jpg'),
(12, 'video-63a46eae95c589.55599589.mp4', 'username', 'AAAA1111111a', 'dsadsdas', 17, 'images/63a5b97887b43.png'),
(13, 'video-63a46ecdb4c335.63604951.mp4', 'username', '111111111', '111111111111', 17, 'images/kitten_5120x2880_ib3l1.jpg'),
(14, 'video-63a46f5b20fd87.97876307.mp4', 'ilana', '22222', '22222', 12, 'images/kitten_5120x2880_ib3l1.jpg'),
(15, 'video-63a46ff31023e8.30824544.mp4', 'ilana', 'dfsfs', 'safsfasfs', 12, 'images/kitten_5120x2880_ib3l1.jpg'),
(16, 'video-63a5b97887b4b6.01462134.mp4', 'xzxzxz', 'dffffff', 'dfffffff', 15, 'images/63ab447f6cda0.png'),
(18, 'video-63a5b97887b4b6.01462134.mp4', 'xzxzxz', 'ddddddddd', 'dddddddd', 15, 'images/63ab44e5b91e8.png'),
(19, 'video-63a5b97887b4b6.01462134.mp4', 'xzxzxz', 'ttttttt', 'ttttttttt', 15, 'images/63ab4537c5e1c.png'),
(20, 'video-63a5b97887b4b6.01462134.mp4', 'xzxzxz', 'ddd', 'dddddd', 15, 'images/63ab45c808e3c.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
