-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Сен 22 2014 г., 21:41
-- Версия сервера: 5.1.73
-- Версия PHP: 5.3.3-7+squeeze19

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `cdn`
--

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL,
  `code` text NOT NULL,
  `hash` text NOT NULL,
  `image_hash` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `code`, `hash`, `image_hash`) VALUES
(2, 'b9GP69SU', '1ae9bd5b581141c680beb945e4fafbb3', '3dc071f64d5498756dda3e86319c1e4cf8a3ae54'),
(1, '11ae84ec', '966a7cebf9b84f069c5e67ee8b702753', '8a172529d33292be2cd7e06fed0c1954a398617f');
