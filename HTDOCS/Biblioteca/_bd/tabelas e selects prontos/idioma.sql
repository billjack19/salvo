-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Mar-2017 às 12:14
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `idioma`
--

CREATE TABLE `idioma` (
  `ID_IDIOMA` int(11) NOT NULL,
  `DESCRICAO_IDIOMA` varchar(25) NOT NULL,
  `SIGLA_IDIOMA` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `idioma`
--

INSERT INTO `idioma` (`ID_IDIOMA`, `DESCRICAO_IDIOMA`, `SIGLA_IDIOMA`) VALUES
(1, 'English (US)', 'en-us'),
(2, 'Čeština', 'cs-cz'),
(3, 'Dansk', 'da-dk'),
(4, 'Deutsch', 'de-de'),
(5, 'English (Australia)', 'en-au'),
(6, 'English (Canada)', 'en-ca'),
(7, 'English (India)', 'en-in'),
(8, 'English (UK)', 'en-gb'),
(9, 'Español', 'es-es'),
(10, 'Español (MX)', 'es-mx'),
(11, 'Français', 'fr-fr'),
(12, 'Français (Canada)', 'fr-ca'),
(13, 'Italiano', 'it-it'),
(14, 'Magyar', 'hu-hu'),
(15, 'Norsk', 'nb-no'),
(16, 'Nederlands', 'nl-nl'),
(17, 'Polski', 'pl-pl'),
(18, 'Português (Brasil)', 'pt-br'),
(19, 'Português', 'pt-pt'),
(20, 'Svenska', 'sv-se'),
(21, 'Türkçe', 'tr-tr'),
(22, 'русский', 'ru-ru'),
(23, '日本語', 'ja-jp'),
(24, '한국어', 'ko-kr'),
(25, '中文(简体)', 'zh-cn'),
(26, '中文(繁體)', 'zh-tw');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `idioma`
--
ALTER TABLE `idioma`
  ADD PRIMARY KEY (`ID_IDIOMA`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `idioma`
--
ALTER TABLE `idioma`
  MODIFY `ID_IDIOMA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
