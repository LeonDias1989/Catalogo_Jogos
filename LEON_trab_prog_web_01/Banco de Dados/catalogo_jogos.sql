-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Dez-2014 às 00:39
-- Versão do servidor: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `catalogo_jogos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `console`
--

CREATE TABLE IF NOT EXISTS `console` (
`id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `midia` varchar(100) NOT NULL,
  `geracao` int(11) NOT NULL,
  `fabricante` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `console`
--

INSERT INTO `console` (`id`, `nome`, `midia`, `geracao`, `fabricante`) VALUES
(1, 'Xbox One', 'Blu-Ray', 8, 'Microsoft'),
(3, 'Playstation 4', 'Blu-Ray', 8, 'Sony'),
(4, 'Playstation 3', 'Blu-Ray', 7, 'Sony'),
(5, 'Super Nintendo (NES)', 'Cartucho', 4, 'Nintendo'),
(6, 'Playstation 2', 'DVD', 6, 'Sony'),
(7, 'Playstation', 'CD', 5, 'Sony'),
(8, 'Nintendo 64', 'Cartucho', 5, 'Nintendo'),
(9, 'Dream Cast', 'CD', 6, 'Sega'),
(10, 'Game Cube', 'Mini DVD', 6, 'Nintendo'),
(11, 'Xbox 360', 'HD-DVD', 7, 'Microsoft'),
(12, 'Nes', 'Cartucho', 3, 'Nintendo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `console_usuario`
--

CREATE TABLE IF NOT EXISTS `console_usuario` (
`id` int(11) NOT NULL,
  `id_usuarioFK` int(11) NOT NULL,
  `id_consoleFK` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `console_usuario`
--

INSERT INTO `console_usuario` (`id`, `id_usuarioFK`, `id_consoleFK`) VALUES
(2, 13, 4),
(4, 13, 1),
(5, 13, 11),
(6, 13, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogo`
--

CREATE TABLE IF NOT EXISTS `jogo` (
`id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `distribuidora` varchar(45) DEFAULT NULL,
  `genero` varchar(45) DEFAULT NULL,
  `idioma` varchar(45) DEFAULT NULL,
  `faixa_etaria` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Extraindo dados da tabela `jogo`
--

INSERT INTO `jogo` (`id`, `nome`, `distribuidora`, `genero`, `idioma`, `faixa_etaria`) VALUES
(1, 'Splinter Cell Black List', 'Ubisoft', 'Tiro', 'Portuguese', 18),
(3, 'Splinter Cell Conviction', 'Ubisoft', 'Tiro', 'English', 18),
(4, 'Gears of War 3', 'Epic Games', 'Tiro', 'Portuguese', 16),
(5, 'Gears of War Judgment', 'Microsoft Studios', 'Tiro', 'Portuguese', 16),
(6, 'Max Payne 3', 'Rockstar', 'Tiro', 'Portuguese', 18),
(7, 'Sniper Elite 3', '505 Games', 'Tiro', 'Portuguese', 18),
(8, 'Ghost Recon', 'Ubisoft', 'Tiro', 'Portuguese', 18),
(9, 'Army of Two the Devil''s Cartel', 'EA', 'Tiro', 'English', 18),
(10, 'Lost Planet 3', 'Capcom', 'Tiro', 'Portuguese', 16),
(11, 'Dead Space 3', 'EA', 'Survivor Horror', 'English', 18),
(12, 'Dead Space 2', 'EA', 'Survivor Horror', 'English', 18),
(13, 'Dead Space ', 'EA', 'Survivor Horror', 'English', 18),
(14, 'Alan Wake', 'Remedy', 'Survivor Horror', 'Portuguese', 18),
(15, 'Silent Hill Downpour', 'Konami', 'Survivor Horror', 'Portuguese', 18),
(16, 'Silent Hill Homecoming', 'Konami', 'Survivor Horror', 'English', 18),
(17, 'Silent Hill HD Collection', 'Konami', 'Survivor Horror', 'English', 18),
(18, 'Walking Dead Season 1', 'Telltale Games', 'point and click', 'English', 18),
(19, 'Dead Island ', 'Deep Silver', 'FPS', 'English', 18),
(20, 'Resident Evil Operation Raccoon City', 'Capcom', 'Survivor Horror', 'English', 18),
(21, 'Resident Evil 5', 'Capcom', 'Survivor Horror', 'English', 18),
(22, 'Resident Evil 6', 'Capcom', 'Survivor Horror', 'Portuguese', 18),
(23, 'Crysis 3', 'EA', 'FPS', 'English', 18),
(24, 'Resident Evil Revelations', 'Capcom', 'Survivor Horror', 'Portuguese', 18),
(25, 'Bioshock Infinite', '2K', 'FPS', 'Portuguese', 18),
(26, 'Bioshock 2', '2K', 'FPS', 'English', 18),
(27, 'Medal of Honor Warfighter', 'EA', 'FPS', 'English', 18),
(28, 'Far Cry 3', 'Ubisoft', 'FPS', 'Portuguese', 18),
(29, 'Far Cry 4', 'Ubisoft', 'FPS', 'Portuguese', 18),
(30, 'Halo 4', '343 Industries', 'FPS', 'Portuguese', 18),
(31, 'Battlefield 4', 'EA', 'FPS', 'Portuguese', 18),
(32, 'Batman Arkham Origins', ' Warner Bros', 'Action, Adventure', 'Portuguese', 16),
(33, 'Batman Arkham City', ' Warner Bros', 'Action, Adventure', 'Portuguese', 15),
(34, 'The Amazing Spider Man', 'Activision', 'Action, Adventure', 'English', 18),
(35, 'Devil May Cry - DMC', 'Capcom', 'Hack and slash', 'Portuguese', 18),
(36, 'castlevania lord of shadows 2', 'Konami', 'Hack and slash', 'Portuguese', 18),
(37, 'Dantes Inferno', 'EA', 'Hack and slash', 'English', 18),
(38, 'metal gear rising revengeance', 'Konami', 'Hack and slash', 'Portuguese', 18),
(39, 'Remember Me', 'Capcom', 'Hack and slash', 'Portuguese', 16),
(40, 'Watch Dogs', 'Ubisoft', 'Action, Adventure', 'Portuguese', 18),
(41, 'GTA 5', 'Rockstar', 'Action, Adventure', 'Portuguese', 18),
(42, 'GTA 4', 'Rockstar', 'Action, Adventure', 'English', 18),
(43, 'Red Dead Redemption', 'Rockstar', 'Action, Adventure', 'English', 18),
(44, 'Sleeping Dogs', 'Square Enix', 'Action, Adventure', 'English', 18),
(45, 'Tomb Raider', 'Square Enix', 'Action, Adventure', 'Portuguese', 18),
(46, 'The Godfather 2', 'EA', 'Tiro', 'English', 18),
(47, 'Assassins Creed Rogue', 'Ubisoft', 'Action, Adventure', 'Portuguese', 14),
(48, 'Assassins Creed 4', 'Ubisoft', 'Action, Adventure', 'Portuguese', 14),
(49, 'Assassins Creed 3', 'Ubisoft', 'Action, Adventure', 'Portuguese', 14),
(50, 'Assassins Creed Revelations', 'Ubisoft', 'Action, Adventure', 'Portuguese', 14),
(51, 'Assassins Creed 2', 'Ubisoft', 'Action, Adventure', 'English', 14),
(52, 'Assassins Creed ', 'Ubisoft', 'Action, Adventure', 'English', 14),
(53, 'Forza Horizon', 'Microsoft Studios', 'Corrida', 'Portuguese', 14),
(54, 'Forza Horizon 2', 'Microsoft Studios', 'Corrida', 'Portuguese', 14),
(55, 'Forza Motorsport 4', 'Microsoft Studios', 'Corrida', 'Portuguese', 14),
(56, 'Grid Autosport', 'Codemasters', 'Corrida', 'Portuguese', 14),
(57, 'Dirt 3', 'Codemasters', 'Corrida', 'English', 14),
(58, 'F1 2012', 'Codemasters', 'Corrida', 'English', 14),
(59, 'F1 2013', 'Codemasters', 'Corrida', 'Portuguese', 14),
(60, 'Driver San Francisco', 'Ubisoft', 'Corrida', 'English', 14),
(61, 'Midnight Club Los Angeles', 'Rockstar', 'Corrida', 'English', 14),
(62, 'Chaves Kart', 'Slangs', 'Corrida', 'Portuguese', 8),
(63, 'NFS the run', 'EA', 'Corrida', 'English', 14),
(64, 'Rayman Legends', 'Ubisoft', 'Plataforma', 'Portuguese', 8),
(65, 'Rayman Origins', 'Ubisoft', 'Plataforma', 'Portuguese', 8),
(66, 'Diablo 3', 'Blizzard', 'RPG', 'Portuguese', 16),
(67, 'South Park the Stick of Truth', 'Ubisoft', 'RPG', 'Portuguese', 18),
(68, 'Fable ', 'Microsoft Studios', 'RPG', 'Portuguese', 14),
(69, 'Tekken Tag Tournament 2', 'Namco Bandai', 'Luta', 'English', 14),
(70, 'Dark Souls 2', 'Namco Bandai', 'RPG', 'Portuguese', 14),
(71, 'Mortal Kombat', 'Warner Bros', 'Luta', 'Portuguese', 18),
(72, 'Injustice The Gods Among Us', 'Warner Bros', 'Luta', 'Portuguese', 14),
(73, 'Super Street Fighter 4', 'Capcom', 'Luta', 'English', 14),
(74, 'Marvel vs Capcom', 'Capcom', 'Luta', 'English', 14),
(75, 'PES 2013', 'Konami', 'Sport', 'Portuguese', 14),
(76, 'SSX', 'EA', 'Sport', 'English', 14),
(77, 'Hitman Absolution', 'Square Enix', 'Tiro', 'English', 18),
(78, 'Forza Motorsport 5', 'Microsoft Studios', 'Corrida', 'Portuguese', 14),
(79, 'Metal Gear Solid 4', 'Konami', 'Tiro', 'English', 18),
(80, 'Sonic', 'Sega', 'Plataforma', 'English', 8),
(81, 'Metal Gear Ground Zeroes', 'Konami', 'Tiro', 'Portuguese', 18),
(82, 'Call of Duty Advance Warfare', 'Activision', 'FPS', 'PortuguÃªs', 16),
(83, 'Assassins Creed Unity', 'Ubisoft', 'Action and Adventure', 'PortuguÃªs', 14),
(84, 'Super Mario 3', 'Nintendo', 'Plataforma', 'English', 10),
(85, 'Super Mario 2', 'Nintendo', 'Plataforma', 'English', 0),
(86, 'Donkey Kong Country', 'Nintendo', 'Plataforma', 'English', 10),
(87, 'Space Invaders', 'Nintendo', 'Tiro', 'English', 5),
(88, 'God of War 2', 'Santa Monica', 'Action and Adventure', 'English', 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogo_usuario`
--

CREATE TABLE IF NOT EXISTS `jogo_usuario` (
`id` int(11) NOT NULL,
  `id_usuarioFK` int(11) NOT NULL,
  `id_jogoFK` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- Extraindo dados da tabela `jogo_usuario`
--

INSERT INTO `jogo_usuario` (`id`, `id_usuarioFK`, `id_jogoFK`) VALUES
(4, 7, 9),
(5, 7, 52),
(6, 7, 47),
(7, 7, 25),
(8, 7, 82),
(9, 7, 36),
(10, 7, 70),
(11, 7, 64),
(12, 7, 41),
(13, 7, 80),
(14, 7, 40),
(29, 13, 33),
(30, 13, 32),
(31, 13, 25),
(32, 13, 12),
(33, 13, 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id` int(11) NOT NULL,
  `nome` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sobrenome` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `idade` int(10) unsigned DEFAULT NULL,
  `sexo` varchar(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(1000) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `sobrenome`, `idade`, `sexo`, `email`, `senha`) VALUES
(1, 'Solid', 'Snake', 33, 'M', 'snake_eater@gmail.com', '8756e53bd07da8ba5689f0fb32f6e576'),
(3, 'Cebolinha ', 'da Turma de MÃ´nia', 12, 'M', 'cebolinha.lr@hotmail.com', 'e19d5cd5af0378da05f63f891c7467af'),
(4, 'Joselito', 'Sem noÃ§Ã£o', 33, 'M', 'joselito.no_sense@bol.com.br', 'e19d5cd5af0378da05f63f891c7467af'),
(5, 'Henrique', 'Schwab', 26, 'M', 'henrique@gmail.com', 'e19d5cd5af0378da05f63f891c7467af'),
(6, 'JoÃ£o', 'Pedro GuimarÃ£es', 18, 'M', 'joao.maroto@hotmail.com', 'e19d5cd5af0378da05f63f891c7467af'),
(7, 'Trevor', 'Philips', 50, 'M', 'trevor.vida_louca@yahoo.com.br', 'e19d5cd5af0378da05f63f891c7467af'),
(8, 'Crash ', 'Bandicoot', 10, 'M', 'crash@hotmail.com', 'e19d5cd5af0378da05f63f891c7467af'),
(9, 'Lucas ', 'Dias Vieira', 20, 'M', 'lucas.dias@hotmail.com', 'e19d5cd5af0378da05f63f891c7467af'),
(10, 'AdÃ£o', 'Negro', 47, 'M', 'adao.vilao.dc@gmail.com', 'e19d5cd5af0378da05f63f891c7467af'),
(11, 'Bruce', 'Wayne', 40, 'M', 'bruce.batman@hotmail.com', 'e19d5cd5af0378da05f63f891c7467af'),
(13, 'Leon', 'Dias Vieira', 25, 'M', 'leondias1989@gmail.com', '8756e53bd07da8ba5689f0fb32f6e576'),
(15, 'Lara', 'Croft', 30, 'F', 'lara.croft@hotmail.com', 'e19d5cd5af0378da05f63f891c7467af'),
(16, 'Mario', '', 45, 'M', 'mario.time@gmail.com', 'e19d5cd5af0378da05f63f891c7467af'),
(17, 'Jupter', 'Apple', 38, 'M', 'jupter.psy@hotmail.com', 'e19d5cd5af0378da05f63f891c7467af'),
(18, 'Flash', 'Gordon', 25, 'M', 'flash_h@gmail.com', 'e19d5cd5af0378da05f63f891c7467af'),
(19, 'Luigi', 'Mario Verde', 48, 'M', 'luigi@gmail.com', 'e19d5cd5af0378da05f63f891c7467af');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `console`
--
ALTER TABLE `console`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `console_usuario`
--
ALTER TABLE `console_usuario`
 ADD PRIMARY KEY (`id`), ADD KEY `id_usuarioFK` (`id_usuarioFK`), ADD KEY `id_consoleFK` (`id_consoleFK`);

--
-- Indexes for table `jogo`
--
ALTER TABLE `jogo`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jogo_usuario`
--
ALTER TABLE `jogo_usuario`
 ADD PRIMARY KEY (`id`), ADD KEY `id_usuarioFK` (`id_usuarioFK`), ADD KEY `id_jogoFK` (`id_jogoFK`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `console`
--
ALTER TABLE `console`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `console_usuario`
--
ALTER TABLE `console_usuario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `jogo`
--
ALTER TABLE `jogo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `jogo_usuario`
--
ALTER TABLE `jogo_usuario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `console_usuario`
--
ALTER TABLE `console_usuario`
ADD CONSTRAINT `console_usuario_ibfk_1` FOREIGN KEY (`id_usuarioFK`) REFERENCES `usuario` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `console_usuario_ibfk_2` FOREIGN KEY (`id_consoleFK`) REFERENCES `console` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `jogo_usuario`
--
ALTER TABLE `jogo_usuario`
ADD CONSTRAINT `jogo_usuario_ibfk_1` FOREIGN KEY (`id_usuarioFK`) REFERENCES `usuario` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `jogo_usuario_ibfk_2` FOREIGN KEY (`id_jogoFK`) REFERENCES `jogo` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
