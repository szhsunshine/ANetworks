-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-02-2018 a las 02:54:57
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `anetwork`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ac_addons`
--

CREATE TABLE `ac_addons` (
  `id` int(128) NOT NULL,
  `addon_name` tinytext NOT NULL,
  `addon_version` varchar(50) NOT NULL,
  `addon_uploader` varchar(50) NOT NULL,
  `addon_description` text NOT NULL,
  `status` int(8) NOT NULL DEFAULT '2',
  `downloads` int(128) NOT NULL DEFAULT '0',
  `category` int(16) NOT NULL,
  `updated` int(16) NOT NULL,
  `uploaded` int(16) NOT NULL,
  `expansion` int(8) NOT NULL,
  `file_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Addon System';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ac_category`
--

CREATE TABLE `ac_category` (
  `id` int(128) NOT NULL,
  `category` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Addon Categories';

--
-- Volcado de datos para la tabla `ac_category`
--

INSERT INTO `ac_category` (`id`, `category`) VALUES
(1, 'Action Bars'),
(2, 'Chat & Communication'),
(3, 'Artwork'),
(4, 'Auction & Economy'),
(5, 'Audio & Video'),
(6, 'Bags & Inventory'),
(7, 'Boss Encounters'),
(8, 'Buffs & Debuffs'),
(9, 'Class'),
(10, 'Combat'),
(11, 'Guild'),
(12, 'Mail'),
(13, 'Map & Minimap'),
(14, 'Minigames'),
(15, 'Miscellaneous'),
(16, 'Professions'),
(17, 'PvP'),
(18, 'Quests & Leveling'),
(19, 'Roleplay'),
(20, 'Tooltip'),
(21, 'Unitframes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ac_config`
--

CREATE TABLE `ac_config` (
  `id_cnf` int(25) NOT NULL,
  `config_item` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ac_config`
--

INSERT INTO `ac_config` (`id_cnf`, `config_item`, `value`) VALUES
(1, 'Site name', 'ANetwork Hub'),
(2, 'Maintenance?', '1'),
(3, 'Allow upload?', '1'),
(4, 'Allow download?', '1'),
(5, 'Plugins system?', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ac_discussion`
--

CREATE TABLE `ac_discussion` (
  `id` int(128) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `author` varchar(155) NOT NULL,
  `category` int(16) NOT NULL,
  `date` int(16) NOT NULL,
  `announcement` int(2) NOT NULL,
  `sticky` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Discussion System';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ac_discussion_category`
--

CREATE TABLE `ac_discussion_category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `Isfather` int(1) NOT NULL,
  `idfather` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ac_discussion_replies`
--

CREATE TABLE `ac_discussion_replies` (
  `id` int(128) NOT NULL,
  `id_thread` int(128) NOT NULL,
  `msg` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `date` int(16) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Discussion Thread System';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ac_discussion_thread`
--

CREATE TABLE `ac_discussion_thread` (
  `id` int(128) NOT NULL,
  `id_cat` int(128) NOT NULL,
  `title` tinytext NOT NULL,
  `msg` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `date` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Discussion Thread System';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ac_downloads`
--

CREATE TABLE `ac_downloads` (
  `id` int(128) NOT NULL,
  `file_id` varchar(50) NOT NULL,
  `ip` tinytext NOT NULL,
  `user_agent` text NOT NULL,
  `time` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Download Logging System';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ac_expansion`
--

CREATE TABLE `ac_expansion` (
  `id` int(255) NOT NULL,
  `expansion` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1' COMMENT 'status column'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ac_expansion`
--

INSERT INTO `ac_expansion` (`id`, `expansion`, `status`) VALUES
(1, 'Classic', 1),
(2, 'The Burning Crusade', 1),
(3, 'The Last King', 1),
(4, 'Cataclysm', 1),
(5, 'Mist of Pandaria', 1),
(6, 'Warlords of Draenor', 1),
(7, 'Legion', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ac_files`
--

CREATE TABLE `ac_files` (
  `id` int(128) NOT NULL,
  `file_id` varchar(50) NOT NULL,
  `file_name` tinytext NOT NULL,
  `file_tmp` tinytext NOT NULL,
  `file_size` int(128) NOT NULL,
  `file_url` tinytext NOT NULL,
  `added` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Stores Addon File Information';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ac_logs`
--

CREATE TABLE `ac_logs` (
  `id` int(128) NOT NULL,
  `username` varchar(50) NOT NULL,
  `page` tinytext NOT NULL,
  `data` text NOT NULL,
  `user_agent` text NOT NULL,
  `ip` tinytext NOT NULL,
  `time` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='General Logging System';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ac_modules`
--

CREATE TABLE `ac_modules` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ac_modules`
--

INSERT INTO `ac_modules` (`id`, `name`, `status`) VALUES
(1, 'Discord Experimental', 1),
(2, 'Discord Classic', 0),
(3, 'Register', 1),
(4, 'Login', 1),
(5, 'Comments', 1),
(6, 'Addons', 1),
(7, 'Discussion', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ac_news`
--

CREATE TABLE `ac_news` (
  `id` int(128) NOT NULL,
  `news_title` tinytext NOT NULL,
  `news_content` text NOT NULL,
  `news_author` varchar(50) NOT NULL,
  `post_date` int(10) NOT NULL,
  `news_short` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='News System';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ac_ranks`
--

CREATE TABLE `ac_ranks` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `permission` int(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ac_ranks_permissions`
--

CREATE TABLE `ac_ranks_permissions` (
  `id` int(50) NOT NULL,
  `perm_id` int(50) NOT NULL,
  `has_admin` int(2) NOT NULL,
  `has_kick` int(2) NOT NULL,
  `has_ban` int(2) NOT NULL,
  `has_acp` int(2) NOT NULL,
  `has_forum_mod` int(2) NOT NULL,
  `has_addons_mod` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ac_users`
--

CREATE TABLE `ac_users` (
  `id` int(128) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` tinytext NOT NULL,
  `password` varchar(50) NOT NULL,
  `last_login` int(16) NOT NULL DEFAULT '0',
  `registered` int(16) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `post` int(255) DEFAULT '0',
  `online` binary(2) DEFAULT '0\0',
  `group` varchar(255) DEFAULT 'Miembro'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='User System';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ac_users_groups`
--

CREATE TABLE `ac_users_groups` (
  `id` int(255) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `post` decimal(65,0) DEFAULT '0',
  `special` set('True','False') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ac_version`
--

CREATE TABLE `ac_version` (
  `id` int(255) NOT NULL,
  `gameversion` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ac_version`
--

INSERT INTO `ac_version` (`id`, `gameversion`) VALUES
(1, '1.1.2'),
(2, '2.4.3'),
(3, '3.3.5a'),
(4, '4.3.4'),
(5, '5.4.8'),
(7, '7.1.0'),
(8, '7.2.5'),
(9, '7.3.0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ac_addons`
--
ALTER TABLE `ac_addons`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ac_category`
--
ALTER TABLE `ac_category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ac_config`
--
ALTER TABLE `ac_config`
  ADD KEY `id_cnf` (`id_cnf`);

--
-- Indices de la tabla `ac_discussion`
--
ALTER TABLE `ac_discussion`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `ac_discussion_category`
--
ALTER TABLE `ac_discussion_category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ac_discussion_replies`
--
ALTER TABLE `ac_discussion_replies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `ac_discussion_thread`
--
ALTER TABLE `ac_discussion_thread`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `ac_downloads`
--
ALTER TABLE `ac_downloads`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ac_expansion`
--
ALTER TABLE `ac_expansion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ac_files`
--
ALTER TABLE `ac_files`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ac_logs`
--
ALTER TABLE `ac_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ac_modules`
--
ALTER TABLE `ac_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ac_news`
--
ALTER TABLE `ac_news`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ac_ranks`
--
ALTER TABLE `ac_ranks`
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `ac_ranks_permissions`
--
ALTER TABLE `ac_ranks_permissions`
  ADD PRIMARY KEY (`perm_id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `perm_id` (`perm_id`);

--
-- Indices de la tabla `ac_users`
--
ALTER TABLE `ac_users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ac_users_groups`
--
ALTER TABLE `ac_users_groups`
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `ac_version`
--
ALTER TABLE `ac_version`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ac_addons`
--
ALTER TABLE `ac_addons`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de la tabla `ac_category`
--
ALTER TABLE `ac_category`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `ac_config`
--
ALTER TABLE `ac_config`
  MODIFY `id_cnf` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ac_discussion_category`
--
ALTER TABLE `ac_discussion_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ac_discussion_replies`
--
ALTER TABLE `ac_discussion_replies`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ac_discussion_thread`
--
ALTER TABLE `ac_discussion_thread`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ac_downloads`
--
ALTER TABLE `ac_downloads`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ac_expansion`
--
ALTER TABLE `ac_expansion`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ac_files`
--
ALTER TABLE `ac_files`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de la tabla `ac_logs`
--
ALTER TABLE `ac_logs`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `ac_modules`
--
ALTER TABLE `ac_modules`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ac_news`
--
ALTER TABLE `ac_news`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ac_ranks`
--
ALTER TABLE `ac_ranks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ac_ranks_permissions`
--
ALTER TABLE `ac_ranks_permissions`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ac_users`
--
ALTER TABLE `ac_users`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ac_users_groups`
--
ALTER TABLE `ac_users_groups`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ac_version`
--
ALTER TABLE `ac_version`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
