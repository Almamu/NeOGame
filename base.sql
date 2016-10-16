-- phpMyAdmin SQL Dump
-- version 4.4.14.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-10-2016 a las 15:28:21
-- Versión del servidor: 5.5.50-0+deb8u1
-- Versión de PHP: 5.6.24-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `game_elements`
--

CREATE TABLE IF NOT EXISTS `game_elements` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `systemname` varchar(200) NOT NULL,
  `icon` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `game_elements`
--

INSERT INTO `game_elements` (`id`, `name`, `category`, `systemname`, `icon`) VALUES
(1, 'Mina de Metal', 'Buildings', 'Mines.Metal', 'mines.metal.png'),
(2, 'Mina de Cristal', 'Buildings', 'Mines.Crystal', 'mines.crystal.png'),
(3, 'Sintetizador de Deuterio', 'Buildings', 'Mines.Deuterium', 'mines.deuterium.png'),
(10, 'Planta de Energía Solar', 'Buildings', 'Energy.Solar', 'energy.solar.png'),
(11, 'Planta de Fusión', 'Buildings', 'Energy.Fusion', 'energy.fusion.png'),
(21, 'Satélite Solar', 'Buildings', 'SolarSatellite', 'solarsatellite.png'),
(40, 'Alamcén de Metal', 'Buildings', 'Storage.Metal', 'storage.metal.png'),
(41, 'Almacén de Cristal', 'Buildings', 'Storage.Crystal', 'storage.crystal.png'),
(42, 'Contenedor de Deuterio', 'Buildings', 'Storage.Deuterium', 'storage.deuterium.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL,
  `iso` varchar(2) CHARACTER SET utf8 NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `languages`
--

INSERT INTO `languages` (`id`, `iso`, `name`) VALUES
(1, 'ES', 'Spanish'),
(2, 'EN', 'English');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planet`
--

CREATE TABLE IF NOT EXISTS `planet` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT 'Namek',
  `userid` int(11) NOT NULL COMMENT 'User owner',
  `galaxy` int(2) NOT NULL,
  `system` int(3) NOT NULL,
  `planet` int(3) NOT NULL,
  `parent` int(11) DEFAULT NULL COMMENT 'Planeta al que pertenece',
  `lastupdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `type` int(1) DEFAULT '0' COMMENT 'Tipo (planeta, luna o runa)',
  `skin` varchar(40) DEFAULT NULL,
  `destroyed` tinyint(1) DEFAULT '0',
  `points` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `planet`
--

INSERT INTO `planet` (`id`, `name`, `userid`, `galaxy`, `system`, `planet`, `parent`, `lastupdate`, `type`, `skin`, `destroyed`, `points`) VALUES
(1, 'Namek', 1, 1, 1, 1, NULL, '2015-12-29 23:04:13', 0, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planet_settings`
--

CREATE TABLE IF NOT EXISTS `planet_settings` (
  `id` int(11) NOT NULL,
  `settingid` int(11) NOT NULL,
  `planetid` int(11) NOT NULL,
  `value` text CHARACTER SET utf8
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `planet_settings`
--

INSERT INTO `planet_settings` (`id`, `settingid`, `planetid`, `value`) VALUES
(1, 78, 1, '-93'),
(2, 79, 1, '58'),
(3, 63, 1, '0'),
(4, 64, 1, '0'),
(5, 62, 1, '0'),
(6, 61, 1, '0'),
(7, 60, 1, '0'),
(8, 52, 1, '0'),
(9, 53, 1, '0'),
(10, 58, 1, '0'),
(11, 59, 1, '0'),
(12, 54, 1, '0'),
(13, 57, 1, '0'),
(14, 55, 1, '0'),
(15, 56, 1, '0'),
(16, 2, 1, '0'),
(17, 3, 1, '10000'),
(18, 1, 1, '0'),
(19, 10, 1, '0'),
(20, 8, 1, '0'),
(21, 9, 1, '10000'),
(22, 7, 1, '0'),
(23, 5, 1, '0'),
(24, 6, 1, '10000'),
(25, 4, 1, '0'),
(26, 33, 1, '0'),
(27, 32, 1, '0'),
(28, 39, 1, '0'),
(29, 40, 1, '0'),
(30, 41, 1, '0'),
(31, 31, 1, '0'),
(32, 28, 1, '0'),
(33, 29, 1, '0'),
(34, 30, 1, '0'),
(35, 27, 1, '0'),
(36, 34, 1, '0'),
(37, 37, 1, '0'),
(38, 38, 1, '0'),
(39, 35, 1, '0'),
(40, 36, 1, '0'),
(41, 26, 1, '0'),
(42, 23, 1, '0'),
(43, 24, 1, '0'),
(44, 21, 1, '0'),
(45, 22, 1, '0'),
(46, 20, 1, '0'),
(47, 25, 1, '0'),
(48, 48, 1, '0'),
(49, 49, 1, '0'),
(50, 42, 1, '0'),
(51, 51, 1, '0'),
(52, 50, 1, '0'),
(53, 43, 1, '0'),
(54, 44, 1, '0'),
(55, 47, 1, '0'),
(56, 46, 1, '0'),
(57, 45, 1, '0'),
(58, 17, 1, '0'),
(59, 19, 1, '0'),
(60, 18, 1, '0'),
(61, 12, 1, '2'),
(62, 14, 1, '1'),
(63, 13, 1, '2'),
(64, 15, 1, '0'),
(65, 16, 1, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `value` text CHARACTER SET utf8 COMMENT 'Default value',
  `oncreate` tinyint(1) DEFAULT '0' COMMENT 'Copy values on create new planet / account.',
  `description` text
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `oncreate`, `description`) VALUES
(1, 'Planet.Resources.Metal.Amount', '0', 1, NULL),
(2, 'Planet.Resources.Metal.PerHour', '0', 1, NULL),
(3, 'Planet.Resources.Metal.Max', '10000', 1, NULL),
(4, 'Planet.Resources.Crystal.Amount', '0', 1, NULL),
(5, 'Planet.Resources.Crystal.PerHour', '0', 1, NULL),
(6, 'Planet.Resources.Crystal.Max', '10000', 1, NULL),
(7, 'Planet.Resources.Deuterium.Amount', '0', 1, NULL),
(8, 'Planet.Resources.Deuterium.PerHour', '0', 1, NULL),
(9, 'Planet.Resources.Deuterium.Max', '10000', 1, NULL),
(10, 'Planet.Resources.Energy.Amount', '0', 1, NULL),
(11, 'Account.DarkMatter.Amount', '0', 1, NULL),
(12, 'Planet.Buildings.Mines.Metal.Level', '0', 1, NULL),
(13, 'Planet.Buildings.Mines.Crystal.Level', '0', 1, NULL),
(14, 'Planet.Buildings.Mines.Deuterium.Level', '0', 1, NULL),
(15, 'Planet.Buildings.Energy.Solar.Level', '0', 1, NULL),
(16, 'Planet.Buildings.Energy.Fusion.Level', '0', 1, NULL),
(17, 'Planet.Buildings.Storage.Resources.Metal.Level', '0', 1, NULL),
(18, 'Planet.Buildings.Storage.Resources.Crystal.Level', '0', 1, NULL),
(19, 'Planet.Buildings.Storage.Resources.Deuterium.Level', '0', 1, NULL),
(20, 'Planet.Facilities.Factory.Robot.Level', '0', 1, NULL),
(21, 'Planet.Facilities.Lab.Research.Level', '0', 1, NULL),
(22, 'Planet.Facilities.Hangar.Level', '0', 1, NULL),
(23, 'Planet.Facilities.Storage.Alliance.Level', '0', 1, NULL),
(24, 'Planet.Facilities.Missiles.Level', '0', 1, NULL),
(25, 'Planet.Facilities.Factory.NanoRobot.Level', '0', 1, NULL),
(26, 'Planet.Facilities.Terraformer.Level', '0', 1, NULL),
(27, 'Planet.Research.Basic.Energy.Level', '0', 1, NULL),
(28, 'Planet.Research.Basic.Laser.Level', '0', 1, NULL),
(29, 'Planet.Research.Basic.Ionic.Level', '0', 1, NULL),
(30, 'Planet.Research.Basic.HyperSpace.Level', '0', 1, NULL),
(31, 'Planet.Research.Basic.Plasma.Level', '0', 1, NULL),
(32, 'Planet.Research.Propulsion.Combustion.Level', '0', 1, NULL),
(33, 'Planet.Research.Propulsion.HyperSpace.Level', '0', 1, NULL),
(34, 'Planet.Research.Advanced.Spy.Level', '0', 1, NULL),
(35, 'Planet.Research.Advanced.Computing.Level', '0', 1, NULL),
(36, 'Planet.Research.Advanced.Astrophysics.Level', '0', 1, NULL),
(37, 'Planet.Research.Advanced.InterGalacticSpy.Level', '0', 1, NULL),
(38, 'Planet.Research.Advanced.Gravitron.Level', '0', 1, NULL),
(39, 'Planet.Research.Combat.Militar.Level', '0', 1, NULL),
(40, 'Planet.Research.Combat.Defense.Level', '0', 1, NULL),
(41, 'Planet.Research.Combat.Armor.Level', '0', 1, NULL),
(42, 'Planet.Defense.MissileLauncher.Amount', '0', 1, NULL),
(43, 'Planet.Defense.Laser.Light.Amount', '0', 1, NULL),
(44, 'Planet.Defense.Laser.Heavy.Amount', '0', 1, NULL),
(45, 'Planet.Defense.Cannon.Gauss.Amount', '0', 1, NULL),
(46, 'Planet.Defense.Cannon.Ionic.Amount', '0', 1, NULL),
(47, 'Planet.Defense.Cannon.Plasma.Amount', '0', 1, NULL),
(48, 'Planet.Defense.Shield.Light.Amount', '0', 1, NULL),
(49, 'Planet.Defense.Shield.Heavy.Amount', '0', 1, NULL),
(50, 'Planet.Defense.Missile.AntiBallistic.Amount', '0', 1, NULL),
(51, 'Planet.Defense.Missile.InterPlanetary.Amount', '0', 1, NULL),
(52, 'Planet.Shipyard.Battle.Fighter.Light.Amount', '0', 1, NULL),
(53, 'Planet.Shipyard.Battle.Fighter.Heavy.Amount', '0', 1, NULL),
(54, 'Planet.Shipyard.Battle.Cruiser.Amount', '0', 1, NULL),
(55, 'Planet.Shipyard.Battle.Battleship.Amount', '0', 1, NULL),
(56, 'Planet.Shipyard.Battle.Battlecruiser.Amount', '0', 1, NULL),
(57, 'Planet.Shipyard.Battle.Bomber.Amount', '0', 1, NULL),
(58, 'Planet.Shipyard.Battle.Destroyer.Amount', '0', 1, NULL),
(59, 'Planet.Shipyard.Battle.DeathStar.Amount', '0', 1, NULL),
(60, 'Planet.Shipyard.Civil.Cargo.Light.Amount', '0', 1, NULL),
(61, 'Planet.Shipyard.Civil.Colony.Amount', '0', 1, NULL),
(62, 'Planet.Shipyard.Civil.Recycler.Amount', '0', 1, NULL),
(63, 'Planet.Shipyard.Civil.Spy.Amount', '0', 1, NULL),
(64, 'Planet.Shipyard.Civil.SolarSatelite.Amount', '0', 1, NULL),
(65, 'System.Requirements.Buildings.Energy.Fusion', 'a:2:{s:38:"Planet.Buildings.Mines.Deuterium.Level";i:5;s:34:"Planet.Research.Basic.Energy.Level";i:3;}', 0, NULL),
(66, 'System.Resources.Metal.Base.Amount', '0', 0, NULL),
(67, 'System.Resources.Metal.Base.PerHour', '120', 0, NULL),
(68, 'System.Calculation.Buildings.Mines.Metal', '%System.Resources.Metal.Base.PerHour% * %Planet.Buildings.Mines.Metal.Level% * pow(1.1, %Planet.Buildings.Mines.Metal.Level%)', 0, NULL),
(69, 'System.Resources.Crystal.Base.Amount', '0', 0, NULL),
(70, 'System.Resources.Crystal.Base.PerHour', '20', 0, NULL),
(71, 'System.Calculation.Buildings.Mines.Crystal', '%System.Resources.Crystal.Base.PerHour% * %Planet.Buildings.Mines.Crystal.Level% * pow(1.1, %Planet.Buildings.Mines.Crystal.Level%)', 0, NULL),
(72, 'System.Resources.Deuterium.Base.Amount', '0', 0, NULL),
(73, 'System.Resources.Deuterium.Base.PerHour', '0', 0, NULL),
(74, 'System.Calculation.Buildings.Mines.Deuterium', '%System.Resources.Deuterium.Base.PerHour% * %Planet.Buildings.Mines.Deuterium.Level% * pow(1.1, %Planet.Buildings.Mines.Deuterium.Level%) * (1.44 - (0.004 * %Planet.Temperature.Max%))', 0, NULL),
(75, 'System.Calculation.Buildings.Storage.Metal', '5000 * round(2.5, * pow(exp(1), (20 * %Planet.Buildings.Storage.Resources.Metal.Level% / 33)))', 0, NULL),
(76, 'System.Calculation.Buildings.Storage.Crystal', '5000 * round(2.5, * pow(exp(1), (20 * %Planet.Buildings.Storage.Resources.Crystal.Level% / 33)))', 0, NULL),
(77, 'System.Calculation.Buildings.Storage.Deuterium', '5000 * round(2.5, * pow(exp(1), (20 * %Planet.Buildings.Storage.Resources.Deuterium.Level% / 33)))', 0, NULL),
(78, 'Planet.Temperature.Min', '-93', 1, 'Temperatura mínima de la Tierra.'),
(79, 'Planet.Temperature.Max', '58', 1, 'Temperatura máxima de la Tierra.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `user` varchar(50) DEFAULT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(150) NOT NULL,
  `failed_attempts` int(1) DEFAULT '0',
  `date_register` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_lastlogin` timestamp NULL DEFAULT NULL,
  `ip_register` varchar(24) DEFAULT '0.0.0.0',
  `ip_lastlogin` varchar(24) DEFAULT '0.0.0.0',
  `admin` int(1) DEFAULT '0',
  `validated` tinyint(1) DEFAULT '0',
  `banned` tinyint(1) DEFAULT '0',
  `referral` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `user`, `password`, `email`, `failed_attempts`, `date_register`, `date_lastlogin`, `ip_register`, `ip_lastlogin`, `admin`, `validated`, `banned`, `referral`) VALUES
(1, 'duhow', 'nulling', 'correo@ejemplo.com', 0, '2015-12-29 18:59:20', NULL, '0.0.0.0', '0.0.0.0', 3, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_extra`
--

CREATE TABLE IF NOT EXISTS `user_extra` (
  `userid` int(11) NOT NULL DEFAULT '0',
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `avatar` varchar(512) DEFAULT NULL,
  `birthday` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `works`
--

CREATE TABLE IF NOT EXISTS `works` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `planetid` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `systemname` varchar(100) NOT NULL,
  `tolevel` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT '1',
  `status` enum('0','1','2') DEFAULT '0',
  `date_init` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_finish` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `game_elements`
--
ALTER TABLE `game_elements`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `planet`
--
ALTER TABLE `planet`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `planet_settings`
--
ALTER TABLE `planet_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `SettingID` (`settingid`),
  ADD KEY `PlanetID` (`planetid`);

--
-- Indices de la tabla `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_extra`
--
ALTER TABLE `user_extra`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `game_elements`
--
ALTER TABLE `game_elements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT de la tabla `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `planet`
--
ALTER TABLE `planet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `planet_settings`
--
ALTER TABLE `planet_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT de la tabla `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
