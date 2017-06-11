-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 11 2017 г., 15:21
-- Версия сервера: 5.7.14
-- Версия PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `netpeaktest`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1492859670),
('m130524_201442_init', 1492859673);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `imageUrl` varchar(255) DEFAULT NULL,
  `avatarUrl` varchar(255) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `name`, `description`, `imageUrl`, `avatarUrl`, `date`) VALUES
(31, 'Природа', 'Картинки с пейзажиками', '/uploads//priroda', '/uploads//priroda/priroda_bwua_24.06.2012_082__1920x1080.jpg', '2017-06-10'),
(30, 'Дети', 'Альбом с детишками', '/uploads//deti', '/uploads//deti/children-wallpaper-1366x768.jpg', '2017-06-11'),
(32, 'Интерьеры', 'Различные дизайны комнат', '/uploads//inter-ery', '/uploads//inter-ery/127-705x470.jpg', '2017-05-12'),
(33, 'Покемоны', 'Покемоны они и в африке покемноы', '/uploads//pokemony', '/uploads//pokemony/02.jpg', '2017-06-11'),
(34, 'Архитектура', 'Просто домики', '/uploads//arhitektura', '/uploads//arhitektura/4b849d416740c9b816019c09970.jpg', '2017-06-14'),
(35, 'Времена года', 'Тут описание', '/uploads//vremena-goda', '/uploads//vremena-goda/29-10-2016_vremena_goda_banner_960x530px.jpg', '2017-06-28'),
(36, 'Живопись', 'Налетай не скупись...', '/uploads//zhivopis', '/uploads//zhivopis/1.jpg', '2017-06-07'),
(37, 'Йога', 'Прикольные ребята', '/uploads//yoga', '/uploads//yoga/3-39899_1_6.jpg', '2017-06-06'),
(38, 'Космос', 'Просто космос', '/uploads//kosmos', '/uploads//kosmos/013898-Terra-земля-планета-космос-луна-15.jpg', '2017-06-07'),
(39, 'Коты', 'Милые котейки', '/uploads//koty', '/uploads//koty/12_reference.jpg', '2017-06-15'),
(40, 'Море', 'Ой море-море...', '/uploads//more', '/uploads//more/8c7fe1cd1d899d0d659766c7076133c9.jpg', '2017-06-04'),
(41, 'Скульптура', 'Камуфки', '/uploads//skul-ptura', '/uploads//skul-ptura/1558-9.jpg', '2017-06-09'),
(42, 'Цветы', 'Зелени еще добавим', '/uploads//cvety', '/uploads//cvety/290dd8a12d.jpg', '2017-06-06'),
(43, 'Шоколад', 'Мечта ребенка', '/uploads//shokolad', '/uploads//shokolad/1d39885380bf0666d8301ecdfc427252.jpg', '2017-06-21');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'vLyTe7W_kdaOwcuc-ukbUzIZ18PXV9Sg', '$2y$13$nQQKZWXjJMa72zfMJTk.DOIqjzrO7MiDQz803y4/5iSW.5gIVvXW.', NULL, 'artem.rendak@mail.ru', 10, 1492860002, 1492860002);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
