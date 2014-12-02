-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01-Dez-2014 às 01:50
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
-- Estrutura da tabela `jogo`
--

CREATE TABLE IF NOT EXISTS `jogo` (
`id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `distribuidora` varchar(45) DEFAULT NULL,
  `genero` varchar(45) DEFAULT NULL,
  `idioma` varchar(45) DEFAULT NULL,
  `faixa_etaria` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Extraindo dados da tabela `jogo`
--

INSERT INTO `jogo` (`id`, `nome`, `distribuidora`, `genero`, `idioma`, `faixa_etaria`) VALUES
(1, 'Splinter Cell Black List', 'Ubisoft', 'Tiro', 'Portuguese', 18),
(2, 'Hitman Absolution', 'Square Enix', 'Tiro', 'English', 18),
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
(33, 'Batman Arkham Ciry', ' Warner Bros', 'Action, Adventure', 'English', 18),
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
(76, 'SSX', 'EA', 'Sport', 'English', 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jogo`
--
ALTER TABLE `jogo`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jogo`
--
ALTER TABLE `jogo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=77;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
