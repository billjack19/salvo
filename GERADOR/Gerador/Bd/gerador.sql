-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01-Fev-2018 às 11:24
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gerador`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `config_login`
--

CREATE TABLE `config_login` (
  `id_config_login` int(11) NOT NULL,
  `descricao_config_login` varchar(100) NOT NULL,
  `imagem_fundo_id` int(11) NOT NULL,
  `imagem_icone_id` int(11) NOT NULL,
  `tabela_login_config_login` varchar(100) NOT NULL,
  `login_config_login` varchar(100) NOT NULL,
  `senha_config_login` varchar(100) NOT NULL,
  `cor_fundo_config_login` varchar(10) NOT NULL,
  `password_config_login` int(1) NOT NULL,
  `projeto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `config_login`
--

INSERT INTO `config_login` (`id_config_login`, `descricao_config_login`, `imagem_fundo_id`, `imagem_icone_id`, `tabela_login_config_login`, `login_config_login`, `senha_config_login`, `cor_fundo_config_login`, `password_config_login`, `projeto_id`) VALUES
(5, '29/12/2017 04:09:17', 2, 7, 'usuario', 'login_usuario', 'senha_usuario', '#acd7f0', 1, 5),
(6, '05/01/2018 05:54:53', 2, 9, 'tabusuarios', 'Identificacao', 'Senha', '#a6afdd', 0, 6),
(7, '29/12/2017 11:03:24', 7, 7, 'usuario', 'login_usuario', 'senha_usuario', '#97c0d5', 1, 8),
(8, '16/01/2018 03:19:06', 2, 7, 'usuario', 'login_usuario', 'senha_usuario', '#aee8e8', 1, 9),
(9, '16/01/2018 03:46:57', 8, 11, 'usuario', 'login_usuario', 'senha_usuario', '#c2e7ed', 1, 10),
(10, '16/01/2018 10:14:17', 8, 12, 'usuario', 'login_usuario', 'senha_usuario', '#b9e4ea', 1, 11),
(11, '29/01/2018 11:04:40', 8, 5, 'usuario', 'login_usuario', 'senha_usuario', '#b9cad0', 1, 12),
(12, '25/01/2018 01:07:30', 8, 13, 'usuario', 'login_usuario', 'senha_usuario', '#ffbf80', 1, 13),
(13, '30/01/2018 10:22:12', 8, 14, 'usuario', 'login_usuario', 'senha_usuario', '#a0e0eb', 1, 15),
(14, '31/01/2018 02:21:50', 8, 11, 'usuario', 'login_usuario', 'senha_usuario', '#67c25c', 1, 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `config_principal`
--

CREATE TABLE `config_principal` (
  `id_config_principal` int(11) NOT NULL,
  `projeto_id` int(11) NOT NULL,
  `modelo_cores_menu_id` int(11) NOT NULL,
  `icone_cadastro_config_principa` varchar(100) NOT NULL,
  `tabelas_cadastro_config_principa` text NOT NULL,
  `logoLg_config_principa` varchar(100) NOT NULL,
  `logoSm_config_principa` varchar(100) NOT NULL,
  `bool_upload_config_principa` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `config_principal`
--

INSERT INTO `config_principal` (`id_config_principal`, `projeto_id`, `modelo_cores_menu_id`, `icone_cadastro_config_principa`, `tabelas_cadastro_config_principa`, `logoLg_config_principa`, `logoSm_config_principa`, `bool_upload_config_principa`) VALUES
(1, 10, 6, '\n						\n						\n						\n						\n						\n						\n						\n						\n						\n						<i class="fa fa-list-ul" aria-', 'cards+configurar_site+contato+destaque+endereco_site+estado+grupo+item+loja+slide_show', 'ferramentas_administrativas.png', 'ferramentas_administrativas.png', 1),
(2, 9, 1, '\n						<i class="fa fa-list-ul" aria-hidden="true"></i>					', 'cliente_site+configurar_site+contato+estado+grupo+item+quem_somos+videos', 'AMFiosLogoLg.png', 'AMFiosLogoSm.png', 0),
(3, 11, 2, '\n						\n						\n						\n						\n						\n						\n						\n						\n						\n						\n						\n						<i class="fa fa-', 'configurar_site+contato+empresa+estado+quem_somos+saiba_mais+teste+videos', 'LogoCafePocosLg.png', 'LogoCafePocosSm.png', 1),
(4, 12, 6, '\n						\n						\n						\n						\n						\n						\n						<i class="fa fa-list" aria-hidden="true"></i>						', 'aluno+console+genero+jogo+livro+objetivos+operacao_teste+prefixos', 'LogoLg.png', 'LogoSmForm.png', 1),
(5, 13, 4, '\n						\n						\n						\n						\n						\n						\n						\n						\n						<i class="fa fa-list" aria-hidden="tr', 'cliente_site+configurar_site+contato+empresa+estado+grupo+item+quem_somos+videos', 'LogoLg.png', 'LogoSmForm.png', 0),
(6, 15, 1, '\n						\n						\n						\n						\n						<i class="fa fa-list" aria-hidden="true"></i>																				', 'configurar_site+contato+empresa+estado+quem_somos+saiba_mais+videos', 'LogotipoFinal.png', 'LogotipoFinal.png', 1),
(7, 16, 2, '\n						\n						\n						\n						<i class="fa fa-list-ul" aria-hidden="true"></i>																				', 'formula+logica_negocio+tabela_padrao', 'LogotipoFinal.png', 'LogotipoFinal.png', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `config_relatorio`
--

CREATE TABLE `config_relatorio` (
  `id_config_relatorio` int(11) NOT NULL,
  `tabelas_config_relatorio` text NOT NULL,
  `projeto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `config_relatorio`
--

INSERT INTO `config_relatorio` (`id_config_relatorio`, `tabelas_config_relatorio`, `projeto_id`) VALUES
(1, 'cliefornec+contato+teste_grade+videos', 11),
(2, 'aluno+livro+manhas', 12),
(3, 'cliente_site+contato+grupo+item+item_orcamento+orcamento+videos', 13),
(4, 'cliente_site+contato+item_orcamento+videos', 15),
(5, 'formula+tabela_padrao', 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cor_modelo_menu`
--

CREATE TABLE `cor_modelo_menu` (
  `id_cor_modelo_menu` int(11) NOT NULL,
  `descricao_cor_modelo_menu` varchar(10) NOT NULL,
  `modelo_cores_menu_id` int(11) NOT NULL,
  `num_cor_modelo_menu` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cor_modelo_menu`
--

INSERT INTO `cor_modelo_menu` (`id_cor_modelo_menu`, `descricao_cor_modelo_menu`, `modelo_cores_menu_id`, `num_cor_modelo_menu`) VALUES
(1, '303946', 1, 1),
(2, '1c2128', 1, 2),
(3, '3b4655', 1, 3),
(4, '262d37', 1, 4),
(5, '505e73', 1, 5),
(6, '455264', 1, 6),
(7, '071e24', 1, 7),
(8, '344154', 1, 8),
(9, '304639', 2, 1),
(10, '1c2821', 2, 2),
(11, '3b5546', 2, 3),
(12, '26372d', 2, 4),
(13, '50735e', 2, 5),
(14, '456452', 2, 6),
(15, '07241e', 2, 7),
(16, '345441', 2, 8),
(17, '393046', 3, 1),
(18, '211c28', 3, 2),
(19, '463b55', 3, 3),
(20, '2d2637', 3, 4),
(21, '5e5073', 3, 5),
(22, '524564', 3, 6),
(23, '1e0724', 3, 7),
(24, '413454', 3, 8),
(25, '394630', 4, 1),
(26, '21281c', 4, 2),
(27, '46553b', 4, 3),
(28, '2d3726', 4, 4),
(29, '5e7350', 4, 5),
(30, '526445', 4, 6),
(31, '1e2407', 4, 7),
(32, '415434', 4, 8),
(33, '463039', 5, 1),
(34, '281c21', 5, 2),
(35, '553b46', 5, 3),
(36, '37262d', 5, 4),
(37, '73505e', 5, 5),
(38, '644552', 5, 6),
(39, '24071e', 5, 7),
(40, '543441', 5, 8),
(41, '463930', 6, 1),
(42, '28211c', 6, 2),
(43, '55463b', 6, 3),
(44, '372d26', 6, 4),
(45, '735e50', 6, 5),
(46, '645245', 6, 6),
(47, '241e07', 6, 7),
(48, '544134', 6, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `formula`
--

CREATE TABLE `formula` (
  `id_formula` int(11) NOT NULL,
  `descricao_formula` varchar(200) NOT NULL,
  `formula_formula` varchar(200) NOT NULL,
  `numero_campos_formula` int(11) NOT NULL,
  `bool_ativo_formula` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `formula`
--

INSERT INTO `formula` (`id_formula`, `descricao_formula`, `formula_formula`, `numero_campos_formula`, `bool_ativo_formula`) VALUES
(1, 'Soma dois números', 'n0 + n1', 2, 1),
(2, 'Subtrair dois numeros', 'n0 - n1', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grade`
--

CREATE TABLE `grade` (
  `id_grade` int(11) NOT NULL,
  `descricao_grade` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `projeto_id` int(11) NOT NULL,
  `tabela_primaria` varchar(200) NOT NULL,
  `tabela_grade` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `grade`
--

INSERT INTO `grade` (`id_grade`, `descricao_grade`, `projeto_id`, `tabela_primaria`, `tabela_grade`) VALUES
(1, '2018-01-02 08:21:20', 9, 'cliente_site', 'orcamento'),
(2, '2018-01-02 08:21:36', 9, 'orcamento', 'item_orcamento'),
(3, '2018-01-02 10:28:39', 9, 'configurar_site', 'cards'),
(5, '2018-01-02 10:28:58', 9, 'configurar_site', 'slide_show'),
(6, '2018-01-02 10:29:09', 9, 'configurar_site', 'endereco_site'),
(8, '2018-01-02 13:47:21', 9, 'configurar_site', 'loja'),
(9, '2018-01-02 15:41:29', 9, 'loja', 'topicos_loja'),
(10, '2018-01-02 16:04:45', 9, 'configurar_site', 'destaque_grupo'),
(11, '2018-01-08 08:45:54', 10, 'loja', 'topicos_loja'),
(12, '2018-01-12 11:03:07', 11, 'configurar_site', 'cards'),
(13, '2018-01-12 11:03:15', 11, 'configurar_site', 'destaque_grupo'),
(14, '2018-01-12 11:03:25', 11, 'configurar_site', 'slide_show'),
(15, '2018-01-12 11:03:41', 11, 'configurar_site', 'loja'),
(19, '2018-01-12 11:07:14', 11, 'configurar_site', 'endereco_site'),
(20, '2018-01-13 09:37:13', 11, 'saiba_mais', 'adicional_site'),
(21, '2018-01-22 10:05:11', 11, 'teste', 'teste_grade'),
(22, '2018-01-23 09:59:55', 12, 'jogo', 'manhas'),
(23, '2018-01-24 16:48:56', 13, 'cliente_site', 'orcamento'),
(24, '2018-01-24 16:49:03', 13, 'orcamento', 'item_orcamento'),
(25, '2018-01-24 16:49:13', 13, 'configurar_site', 'cards'),
(26, '2018-01-24 16:49:23', 13, 'configurar_site', 'destaque_grupo'),
(27, '2018-01-24 16:49:55', 13, 'configurar_site', 'endereco_site'),
(28, '2018-01-24 16:50:09', 13, 'configurar_site', 'slide_show'),
(29, '2018-01-24 16:50:25', 13, 'configurar_site', 'loja'),
(30, '2018-01-24 16:50:59', 13, 'loja', 'topicos_loja'),
(31, '2018-01-27 10:08:58', 12, 'console', 'jogo'),
(32, '2018-01-30 10:17:33', 15, 'configurar_site', 'cards'),
(33, '2018-01-30 10:17:44', 15, 'configurar_site', 'destaque_grupo'),
(34, '2018-01-30 10:17:52', 15, 'configurar_site', 'endereco_site'),
(35, '2018-01-30 10:18:04', 15, 'configurar_site', 'slide_show'),
(36, '2018-01-30 10:18:11', 15, 'configurar_site', 'loja'),
(37, '2018-01-30 10:18:21', 15, 'cliente_site', 'orcamento'),
(38, '2018-01-30 10:18:30', 15, 'orcamento', 'item_orcamento'),
(39, '2018-01-30 10:18:42', 15, 'loja', 'topicos_loja'),
(40, '2018-01-30 14:43:01', 15, 'saiba_mais', 'adicional_site');

-- --------------------------------------------------------

--
-- Estrutura da tabela `icones`
--

CREATE TABLE `icones` (
  `id_icones` int(11) NOT NULL,
  `descricao_icones` varchar(200) NOT NULL,
  `html_icones` varchar(200) NOT NULL,
  `tipo_icones` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `icones`
--

INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
(1, 'glass', '<i class=''glyphicon glyphicon-glass''></i>', 'b'),
(2, 'music', '<i class=''glyphicon glyphicon-music''></i>', 'b'),
(3, 'search', '<i class=''glyphicon glyphicon-search''></i>', 'b'),
(4, 'envelope', '<i class=''glyphicon glyphicon-envelope''></i>', 'b'),
(5, 'heart', '<i class=''glyphicon glyphicon-heart''></i>', 'b'),
(6, 'star', '<i class=''glyphicon glyphicon-star''></i>', 'b'),
(7, 'star-empty', '<i class=''glyphicon glyphicon-star-empty''></i>', 'b'),
(8, 'user', '<i class=''glyphicon glyphicon-user''></i>', 'b'),
(9, 'film', '<i class=''glyphicon glyphicon-film''></i>', 'b'),
(10, 'th-large', '<i class=''glyphicon glyphicon-th-large''></i>', 'b'),
(11, 'th', '<i class=''glyphicon glyphicon-th''></i>', 'b'),
(12, 'th-list', '<i class=''glyphicon glyphicon-th-list''></i>', 'b'),
(13, 'ok', '<i class=''glyphicon glyphicon-ok''></i>', 'b'),
(14, 'remove', '<i class=''glyphicon glyphicon-remove''></i>', 'b'),
(15, 'zoom-in', '<i class=''glyphicon glyphicon-zoom-in''></i>', 'b'),
(16, 'zoom-out', '<i class=''glyphicon glyphicon-zoom-out''></i>', 'b'),
(17, 'off', '<i class=''glyphicon glyphicon-off''></i>', 'b'),
(18, 'signal', '<i class=''glyphicon glyphicon-signal''></i>', 'b'),
(19, 'cog', '<i class=''glyphicon glyphicon-cog''></i>', 'b'),
(20, 'trash', '<i class=''glyphicon glyphicon-trash''></i>', 'b'),
(21, 'home', '<i class=''glyphicon glyphicon-home''></i>', 'b'),
(22, 'file', '<i class=''glyphicon glyphicon-file''></i>', 'b'),
(23, 'time', '<i class=''glyphicon glyphicon-time''></i>', 'b'),
(24, 'road', '<i class=''glyphicon glyphicon-road''></i>', 'b'),
(25, 'download-alt', '<i class=''glyphicon glyphicon-download-alt''></i>', 'b'),
(26, 'download', '<i class=''glyphicon glyphicon-download''></i>', 'b'),
(27, 'upload', '<i class=''glyphicon glyphicon-upload''></i>', 'b'),
(28, 'inbox', '<i class=''glyphicon glyphicon-inbox''></i>', 'b'),
(29, 'play-circle', '<i class=''glyphicon glyphicon-play-circle''></i>', 'b'),
(30, 'repeat', '<i class=''glyphicon glyphicon-repeat''></i>', 'b'),
(31, 'refresh', '<i class=''glyphicon glyphicon-refresh''></i>', 'b'),
(32, 'list-alt', '<i class=''glyphicon glyphicon-list-alt''></i>', 'b'),
(33, 'lock>', '<i class=''glyphicon glyphicon-lock''></i>', 'b'),
(34, 'flag', '<i class=''glyphicon glyphicon-flag''></i>', 'b'),
(35, 'headphones', '<i class=''glyphicon glyphicon-headphones''></i>', 'b'),
(36, 'volume-off', '<i class=''glyphicon glyphicon-volume-off''></i>', 'b'),
(37, 'volume-down', '<i class=''glyphicon glyphicon-volume-down''></i>', 'b'),
(38, 'volume-up', '<i class=''glyphicon glyphicon-volume-up''></i>', 'b'),
(39, 'qrcode', '<i class=''glyphicon glyphicon-qrcode''></i>', 'b'),
(40, 'barcode', '<i class=''glyphicon glyphicon-barcode''></i>', 'b'),
(41, 'tag', '<i class=''glyphicon glyphicon-tag''></i>', 'b'),
(42, 'tags', '<i class=''glyphicon glyphicon-tags''></i>', 'b'),
(43, 'book', '<i class=''glyphicon glyphicon-book''></i>', 'b'),
(44, 'bookmark>', '<i class=''glyphicon glyphicon-bookmark''></i>', 'b'),
(45, 'print', '<i class=''glyphicon glyphicon-print''></i>', 'b'),
(46, 'camera>', '<i class=''glyphicon glyphicon-camera''></i>', 'b'),
(47, 'font', '<i class=''glyphicon glyphicon-font''></i>', 'b'),
(48, 'bold', '<i class=''glyphicon glyphicon-bold''></i>', 'b'),
(49, 'italic', '<i class=''glyphicon glyphicon-italic''></i>', 'b'),
(50, 'text-height', '<i class=''glyphicon glyphicon-text-height''></i>', 'b'),
(51, 'text-width', '<i class=''glyphicon glyphicon-text-width''></i>', 'b'),
(52, 'align-left', '<i class=''glyphicon glyphicon-align-left''></i>', 'b'),
(53, 'align-center', '<i class=''glyphicon glyphicon-align-center''></i>', 'b'),
(54, 'align-right', '<i class=''glyphicon glyphicon-align-right''></i>', 'b'),
(55, 'align-justify', '<i class=''glyphicon glyphicon-align-justify''></i>', 'b'),
(56, 'list', '<i class=''glyphicon glyphicon-list''></i>', 'b'),
(57, 'indent-left', '<i class=''glyphicon glyphicon-indent-left''></i>', 'b'),
(58, 'indent-right', '<i class=''glyphicon glyphicon-indent-right''></i>', 'b'),
(59, 'facetime-video', '<i class=''glyphicon glyphicon-facetime-video''></i>', 'b'),
(60, 'picture', '<i class=''glyphicon glyphicon-picture''></i>', 'b'),
(61, 'pencil', '<i class=''glyphicon glyphicon-pencil''></i>', 'b'),
(62, 'map-marker', '<i class=''glyphicon glyphicon-map-marker''></i>', 'b'),
(63, 'adjust', '<i class=''glyphicon glyphicon-adjust''></i>', 'b'),
(64, 'tint', '<i class=''glyphicon glyphicon-tint''></i>', 'b'),
(65, 'edit', '<i class=''glyphicon glyphicon-edit''></i>', 'b'),
(66, 'share', '<i class=''glyphicon glyphicon-share''></i>', 'b'),
(67, 'check', '<i class=''glyphicon glyphicon-check''></i>', 'b'),
(68, 'move', '<i class=''glyphicon glyphicon-move''></i>', 'b'),
(69, 'step-backward', '<i class=''glyphicon glyphicon-step-backward''></i>', 'b'),
(70, 'fast-backward', '<i class=''glyphicon glyphicon-fast-backward''></i>', 'b'),
(71, 'backward', '<i class=''glyphicon glyphicon-backward''></i>', 'b'),
(72, 'play', '<i class=''glyphicon glyphicon-play''></i>', 'b'),
(73, 'pause', '<i class=''glyphicon glyphicon-pause''></i>', 'b'),
(74, 'stop', '<i class=''glyphicon glyphicon-stop''></i>', 'b'),
(75, 'forward', '<i class=''glyphicon glyphicon-forward''></i>', 'b'),
(76, 'fast-forward', '<i class=''glyphicon glyphicon-fast-forward''></i>', 'b'),
(77, 'step-forward', '<i class=''glyphicon glyphicon-step-forward''></i>', 'b'),
(78, 'eject', '<i class=''glyphicon glyphicon-eject''></i>', 'b'),
(79, 'chevron-left', '<i class=''glyphicon glyphicon-chevron-left''></i>', 'b'),
(80, 'chevron-right', '<i class=''glyphicon glyphicon-chevron-right''></i>', 'b'),
(81, 'plus-sign', '<i class=''glyphicon glyphicon-plus-sign''></i>', 'b'),
(82, 'minus-sign', '<i class=''glyphicon glyphicon-minus-sign''></i>', 'b'),
(83, 'remove-sign', '<i class=''glyphicon glyphicon-remove-sign''></i>', 'b'),
(84, 'ok-sign', '<i class=''glyphicon glyphicon-ok-sign''></i>', 'b'),
(85, 'question-sign', '<i class=''glyphicon glyphicon-question-sign''></i>', 'b'),
(86, 'info-sign', '<i class=''glyphicon glyphicon-info-sign''></i>', 'b'),
(87, 'screenshot', '<i class=''glyphicon glyphicon-screenshot''></i>', 'b'),
(88, 'remove-circle', '<i class=''glyphicon glyphicon-remove-circle''></i>', 'b'),
(89, 'ok-circle', '<i class=''glyphicon glyphicon-ok-circle''></i>', 'b'),
(90, 'ban-circle', '<i class=''glyphicon glyphicon-ban-circle''></i>', 'b'),
(91, 'arrow-left', '<i class=''glyphicon glyphicon-arrow-left''></i>', 'b'),
(92, 'arrow-right', '<i class=''glyphicon glyphicon-arrow-right''></i>', 'b'),
(93, 'arrow-up', '<i class=''glyphicon glyphicon-arrow-up''></i>', 'b'),
(94, 'arrow-down', '<i class=''glyphicon glyphicon-arrow-down''></i>', 'b'),
(95, 'share-alt', '<i class=''glyphicon glyphicon-share-alt''></i>', 'b'),
(96, 'resize-full', '<i class=''glyphicon glyphicon-resize-full''></i>', 'b'),
(97, 'resize-small', '<i class=''glyphicon glyphicon-resize-small''></i>', 'b'),
(98, 'plus', '<i class=''glyphicon glyphicon-plus''></i>', 'b'),
(99, 'minus', '<i class=''glyphicon glyphicon-minus''></i>', 'b'),
(100, 'asterisk', '<i class=''glyphicon glyphicon-asterisk''></i>', 'b'),
(101, 'exclamation-sign', '<i class=''glyphicon glyphicon-exclamation-sign''></i>', 'b'),
(102, 'gift', '<i class=''glyphicon glyphicon-gift''></i>', 'b'),
(103, 'leaf', '<i class=''glyphicon glyphicon-leaf''></i>', 'b'),
(104, 'fire', '<i class=''glyphicon glyphicon-fire''></i>', 'b'),
(105, 'eye-open', '<i class=''glyphicon glyphicon-eye-open''></i>', 'b'),
(106, 'eye-close', '<i class=''glyphicon glyphicon-eye-close''></i>', 'b'),
(107, 'warning-sign', '<i class=''glyphicon glyphicon-warning-sign''></i>', 'b'),
(108, 'plane', '<i class=''glyphicon glyphicon-plane''></i>', 'b'),
(109, 'calendar', '<i class=''glyphicon glyphicon-calendar''></i>', 'b'),
(110, 'random', '<i class=''glyphicon glyphicon-random''></i>', 'b'),
(111, 'comment', '<i class=''glyphicon glyphicon-comment''></i>', 'b'),
(112, 'magnet', '<i class=''glyphicon glyphicon-magnet''></i>', 'b'),
(113, 'chevron-up', '<i class=''glyphicon glyphicon-chevron-up''></i>', 'b'),
(114, 'chevron-down', '<i class=''glyphicon glyphicon-chevron-down''></i>', 'b'),
(115, 'retweet', '<i class=''glyphicon glyphicon-retweet''></i>', 'b'),
(116, 'shopping-cart', '<i class=''glyphicon glyphicon-shopping-cart''></i>', 'b'),
(117, 'folder-close', '<i class=''glyphicon glyphicon-folder-close''></i>', 'b'),
(118, 'folder-open', '<i class=''glyphicon glyphicon-folder-open''></i>', 'b'),
(119, 'resize-vertical', '<i class=''glyphicon glyphicon-resize-vertical''></i>', 'b'),
(120, 'resize-horizontal', '<i class=''glyphicon glyphicon-resize-horizontal''></i>', 'b'),
(121, 'hdd', '<i class=''glyphicon glyphicon-hdd''></i>', 'b'),
(122, 'bullhorn', '<i class=''glyphicon glyphicon-bullhorn''></i>', 'b'),
(123, 'bell', '<i class=''glyphicon glyphicon-bell''></i>', 'b'),
(124, 'certificate', '<i class=''glyphicon glyphicon-certificate''></i>', 'b'),
(125, 'thumbs-up', '<i class=''glyphicon glyphicon-thumbs-up''></i>', 'b'),
(126, 'thumbs-down', '<i class=''glyphicon glyphicon-thumbs-down''></i>', 'b'),
(127, 'hand-right', '<i class=''glyphicon glyphicon-hand-right''></i>', 'b'),
(128, 'hand-left', '<i class=''glyphicon glyphicon-hand-left''></i>', 'b'),
(129, 'hand-up', '<i class=''glyphicon glyphicon-hand-up''></i>', 'b'),
(130, 'hand-down', '<i class=''glyphicon glyphicon-hand-down''></i>', 'b'),
(131, 'circle-arrow-right', '<i class=''glyphicon glyphicon-circle-arrow-right''></i>', 'b'),
(132, 'circle-arrow-left', '<i class=''glyphicon glyphicon-circle-arrow-left''></i>', 'b'),
(133, 'circle-arrow-up', '<i class=''glyphicon glyphicon-circle-arrow-up''></i>', 'b'),
(134, 'circle-arrow-down', '<i class=''glyphicon glyphicon-circle-arrow-down''></i>', 'b'),
(135, 'globe', '<i class=''glyphicon glyphicon-globe''></i>', 'b'),
(136, 'wrench', '<i class=''glyphicon glyphicon-wrench''></i>', 'b'),
(137, 'tasks', '<i class=''glyphicon glyphicon-tasks''></i>', 'b'),
(138, 'filter', '<i class=''glyphicon glyphicon-filter''></i>', 'b'),
(139, 'briefcase', '<i class=''glyphicon glyphicon-briefcase''></i>', 'b'),
(140, 'fullscreen', '<i class=''glyphicon glyphicon-fullscreen''></i>', 'b'),
(141, 'dashboard', '<i class=''glyphicon glyphicon-dashboard''></i>', 'b'),
(142, 'paperclipn', '<i class=''glyphicon glyphicon-paperclip''></i>', 'b'),
(143, 'heart-empty', '<i class=''glyphicon glyphicon-heart-empty''></i>', 'b'),
(144, 'link', '<i class=''glyphicon glyphicon-link''></i>', 'b'),
(145, 'phone', '<i class=''glyphicon glyphicon-phone''></i>', 'b'),
(146, 'pushpin', '<i class=''glyphicon glyphicon-pushpin''></i>', 'b'),
(147, 'euro', '<i class=''glyphicon glyphicon-euro''></i>', 'b'),
(148, 'usd', '<i class=''glyphicon glyphicon-usd''></i>', 'b'),
(149, 'gbp', '<i class=''glyphicon glyphicon-gbp''></i>', 'b'),
(150, 'sort', '<i class=''glyphicon glyphicon-sort''></i>', 'b'),
(151, 'sort-by-alphabet', '<i class=''glyphicon glyphicon-sort-by-alphabet''></i>', 'b'),
(152, 'sort-by-alphabet-alt', '<i class=''glyphicon glyphicon-sort-by-alphabet-alt''></i>', 'b'),
(153, 'sort-by-order', '<i class=''glyphicon glyphicon-sort-by-order''></i>', 'b'),
(154, 'sort-by-order-alt', '<i class=''glyphicon glyphicon-sort-by-order-alt''></i>', 'b'),
(155, 'sort-by-attributes', '<i class=''glyphicon glyphicon-sort-by-attributes''></i>', 'b'),
(156, 'sort-by-attributes-alt', '<i class=''glyphicon glyphicon-sort-by-attributes-alt''></i>', 'b'),
(157, 'unchecked', '<i class=''glyphicon glyphicon-unchecked''></i>', 'b'),
(158, 'expand', '<i class=''glyphicon glyphicon-expand''></i>', 'b'),
(159, 'collapse-down', '<i class=''glyphicon glyphicon-collapse-down''></i>', 'b'),
(160, 'collapse-top', '<i class=''glyphicon glyphicon-collapse-up''></i>', 'b'),
(161, 'log-in', '<i class=''glyphicon glyphicon-log-in''></i>', 'b'),
(162, 'flash', '<i class=''glyphicon glyphicon-flash''></i>', 'b'),
(163, 'log-out', '<i class=''glyphicon glyphicon-log-out''></i>', 'b'),
(164, 'new-window', '<i class=''glyphicon glyphicon-new-window''></i>', 'b'),
(165, 'record', '<i class=''glyphicon glyphicon-record''></i>', 'b'),
(166, 'save', '<i class=''glyphicon glyphicon-save''></i>', 'b'),
(167, 'open', '<i class=''glyphicon glyphicon-open''></i>', 'b'),
(168, 'saved', '<i class=''glyphicon glyphicon-saved''></i>', 'b'),
(169, 'import', '<i class=''glyphicon glyphicon-import''></i>', 'b'),
(170, 'export', '<i class=''glyphicon glyphicon-export''></i>', 'b'),
(171, 'send', '<i class=''glyphicon glyphicon-send''></i>', 'b'),
(172, 'floppy-disk', '<i class=''glyphicon glyphicon-floppy-disk''></i>', 'b'),
(173, 'floppy-saved', '<i class=''glyphicon glyphicon-floppy-saved''></i>', 'b'),
(174, 'floppy-remove', '<i class=''glyphicon glyphicon-floppy-remove''></i>', 'b'),
(175, 'floppy-save', '<i class=''glyphicon glyphicon-floppy-save''></i>', 'b'),
(176, 'floppy-open', '<i class=''glyphicon glyphicon-floppy-open''></i>', 'b'),
(177, 'credit-card', '<i class=''glyphicon glyphicon-credit-card''></i>', 'b'),
(178, 'transfer', '<i class=''glyphicon glyphicon-transfer''></i>', 'b'),
(179, 'cutlery', '<i class=''glyphicon glyphicon-cutlery''></i>', 'b'),
(180, 'header', '<i class=''glyphicon glyphicon-header''></i>', 'b'),
(181, 'compressed', '<i class=''glyphicon glyphicon-compressed''></i>', 'b'),
(182, 'earphone', '<i class=''glyphicon glyphicon-earphone''></i>', 'b'),
(183, 'phone-alt', '<i class=''glyphicon glyphicon-phone-alt''></i>', 'b'),
(184, 'tower', '<i class=''glyphicon glyphicon-tower''></i>', 'b'),
(185, 'stats', '<i class=''glyphicon glyphicon-stats''></i>', 'b'),
(186, 'sd-video', '<i class=''glyphicon glyphicon-sd-video''></i>', 'b'),
(187, 'hd-video', '<i class=''glyphicon glyphicon-hd-video''></i>', 'b'),
(188, 'subtitles', '<i class=''glyphicon glyphicon-subtitles''></i>', 'b'),
(189, 'sound-stereo', '<i class=''glyphicon glyphicon-sound-stereo''></i>', 'b'),
(190, 'sound-dolby', '<i class=''glyphicon glyphicon-sound-dolby''></i>', 'b'),
(191, 'sound-5-1', '<i class=''glyphicon glyphicon-sound-5-1''></i>', 'b'),
(192, 'sound-6-1', '<i class=''glyphicon glyphicon-sound-6-1''></i>', 'b'),
(193, 'sound-7-1', '<i class=''glyphicon glyphicon-sound-7-1''></i>', 'b'),
(194, 'copyright-mark', '<i class=''glyphicon glyphicon-copyright-mark''></i>', 'b'),
(195, 'registration-mark', '<i class=''glyphicon glyphicon-registration-mark''></i>', 'b'),
(196, 'cloud', '<i class=''glyphicon glyphicon-cloud''></i>', 'b'),
(197, 'cloud-download', '<i class=''glyphicon glyphicon-cloud-download''></i>', 'b'),
(198, 'cloud-upload', '<i class=''glyphicon glyphicon-cloud-upload''></i>', 'b'),
(199, 'tree-conifer', '<i class=''glyphicon glyphicon-tree-conifer''></i>', 'b'),
(200, 'tree-deciduous', '<i class=''glyphicon glyphicon-tree-deciduous''></i>', 'b'),
(201, 'address-book', '<i class=''fa fa-address-book'' aria-hidden=''true''></i>', 'f'),
(202, 'address-book-o', '<i class=''fa fa-address-book-o'' aria-hidden=''true''></i>', 'f'),
(203, 'address-card', '<i class=''fa fa-address-card'' aria-hidden=''true''></i>', 'f'),
(204, 'address-card-o', '<i class=''fa fa-address-card-o'' aria-hidden=''true''></i>', 'f'),
(205, 'bandcamp', '<i class=''fa fa-bandcamp'' aria-hidden=''true''></i>', 'f'),
(206, 'bath', '<i class=''fa fa-bath'' aria-hidden=''true''></i>', 'f'),
(207, 'bathtub <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-bathtub'' aria-hidden=''true''></i>', 'f'),
(208, 'drivers-license <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-drivers-license'' aria-hidden=''true''></i>', 'f'),
(209, 'drivers-license-o <span class=''text-muted''>(alias)</', '<i class=''fa fa-drivers-license-o'' aria-hidden=''true''></i>', 'f'),
(210, 'eercast', '<i class=''fa fa-eercast'' aria-hidden=''true''></i>', 'f'),
(211, 'envelope-open', '<i class=''fa fa-envelope-open'' aria-hidden=''true''></i>', 'f'),
(212, 'envelope-open-o', '<i class=''fa fa-envelope-open-o'' aria-hidden=''true''></i>', 'f'),
(213, 'etsy', '<i class=''fa fa-etsy'' aria-hidden=''true''></i>', 'f'),
(214, 'free-code-camp', '<i class=''fa fa-free-code-camp'' aria-hidden=''true''></i>', 'f'),
(215, 'grav', '<i class=''fa fa-grav'' aria-hidden=''true''></i>', 'f'),
(216, 'handshake-o', '<i class=''fa fa-handshake-o'' aria-hidden=''true''></i>', 'f'),
(217, 'id-badge', '<i class=''fa fa-id-badge'' aria-hidden=''true''></i>', 'f'),
(218, 'id-card', '<i class=''fa fa-id-card'' aria-hidden=''true''></i>', 'f'),
(219, 'id-card-o', '<i class=''fa fa-id-card-o'' aria-hidden=''true''></i>', 'f'),
(220, 'imdb', '<i class=''fa fa-imdb'' aria-hidden=''true''></i>', 'f'),
(221, 'linode', '<i class=''fa fa-linode'' aria-hidden=''true''></i>', 'f'),
(222, 'meetup', '<i class=''fa fa-meetup'' aria-hidden=''true''></i>', 'f'),
(223, 'microchip', '<i class=''fa fa-microchip'' aria-hidden=''true''></i>', 'f'),
(224, 'podcast', '<i class=''fa fa-podcast'' aria-hidden=''true''></i>', 'f'),
(225, 'quora', '<i class=''fa fa-quora'' aria-hidden=''true''></i>', 'f'),
(226, 'ravelry', '<i class=''fa fa-ravelry'' aria-hidden=''true''></i>', 'f'),
(227, 's15 <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-s15'' aria-hidden=''true''></i>', 'f'),
(228, 'shower', '<i class=''fa fa-shower'' aria-hidden=''true''></i>', 'f'),
(229, 'snowflake-o', '<i class=''fa fa-snowflake-o'' aria-hidden=''true''></i>', 'f'),
(230, 'superpowers', '<i class=''fa fa-superpowers'' aria-hidden=''true''></i>', 'f'),
(231, 'telegram', '<i class=''fa fa-telegram'' aria-hidden=''true''></i>', 'f'),
(232, 'thermometer <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-thermometer'' aria-hidden=''true''></i>', 'f'),
(233, 'thermometer-0 <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-thermometer-0'' aria-hidden=''true''></i>', 'f'),
(234, 'thermometer-1 <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-thermometer-1'' aria-hidden=''true''></i>', 'f'),
(235, 'thermometer-2 <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-thermometer-2'' aria-hidden=''true''></i>', 'f'),
(236, 'thermometer-3 <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-thermometer-3'' aria-hidden=''true''></i>', 'f'),
(237, 'thermometer-4 <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-thermometer-4'' aria-hidden=''true''></i>', 'f'),
(238, 'thermometer-empty', '<i class=''fa fa-thermometer-empty'' aria-hidden=''true''></i>', 'f'),
(239, 'thermometer-full', '<i class=''fa fa-thermometer-full'' aria-hidden=''true''></i>', 'f'),
(240, 'thermometer-half', '<i class=''fa fa-thermometer-half'' aria-hidden=''true''></i>', 'f'),
(241, 'thermometer-quarter', '<i class=''fa fa-thermometer-quarter'' aria-hidden=''true''></i>', 'f'),
(242, 'thermometer-three-quarters', '<i class=''fa fa-thermometer-three-quarters'' aria-hidden=''true''></i>', 'f'),
(243, 'times-rectangle <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-times-rectangle'' aria-hidden=''true''></i>', 'f'),
(244, 'times-rectangle-o <span class=''text-muted''>(alias)</', '<i class=''fa fa-times-rectangle-o'' aria-hidden=''true''></i>', 'f'),
(245, 'user-circle', '<i class=''fa fa-user-circle'' aria-hidden=''true''></i>', 'f'),
(246, 'user-circle-o', '<i class=''fa fa-user-circle-o'' aria-hidden=''true''></i>', 'f'),
(247, 'user-o', '<i class=''fa fa-user-o'' aria-hidden=''true''></i>', 'f'),
(248, 'vcard <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-vcard'' aria-hidden=''true''></i>', 'f'),
(249, 'vcard-o <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-vcard-o'' aria-hidden=''true''></i>', 'f'),
(250, 'window-close', '<i class=''fa fa-window-close'' aria-hidden=''true''></i>', 'f'),
(251, 'window-close-o', '<i class=''fa fa-window-close-o'' aria-hidden=''true''></i>', 'f'),
(252, 'window-maximize', '<i class=''fa fa-window-maximize'' aria-hidden=''true''></i>', 'f'),
(253, 'window-minimize', '<i class=''fa fa-window-minimize'' aria-hidden=''true''></i>', 'f'),
(254, 'window-restore', '<i class=''fa fa-window-restore'' aria-hidden=''true''></i>', 'f'),
(255, 'wpexplorer', '<i class=''fa fa-wpexplorer'' aria-hidden=''true''></i>', 'f'),
(256, 'address-book', '<i class=''fa fa-address-book'' aria-hidden=''true''></i>', 'f'),
(257, 'address-book-o', '<i class=''fa fa-address-book-o'' aria-hidden=''true''></i>', 'f'),
(258, 'address-card', '<i class=''fa fa-address-card'' aria-hidden=''true''></i>', 'f'),
(259, 'address-card-o', '<i class=''fa fa-address-card-o'' aria-hidden=''true''></i>', 'f'),
(260, 'adjust', '<i class=''fa fa-adjust'' aria-hidden=''true''></i>', 'f'),
(261, 'american-sign-language-interpreting', '<i class=''fa fa-american-sign-language-interpreting'' aria-hidden=''true''></i>', 'f'),
(262, 'anchor', '<i class=''fa fa-anchor'' aria-hidden=''true''></i>', 'f'),
(263, 'archive', '<i class=''fa fa-archive'' aria-hidden=''true''></i>', 'f'),
(264, 'area-chart', '<i class=''fa fa-area-chart'' aria-hidden=''true''></i>', 'f'),
(265, 'arrows', '<i class=''fa fa-arrows'' aria-hidden=''true''></i>', 'f'),
(266, 'arrows-h', '<i class=''fa fa-arrows-h'' aria-hidden=''true''></i>', 'f'),
(267, 'arrows-v', '<i class=''fa fa-arrows-v'' aria-hidden=''true''></i>', 'f'),
(268, 'asl-interpreting <span class=''text-muted''>(alias)</span', '<i class=''fa fa-asl-interpreting'' aria-hidden=''true''></i>', 'f'),
(269, 'assistive-listening-systems', '<i class=''fa fa-assistive-listening-systems'' aria-hidden=''true''></i>', 'f'),
(270, 'asterisk', '<i class=''fa fa-asterisk'' aria-hidden=''true''></i>', 'f'),
(271, 'at', '<i class=''fa fa-at'' aria-hidden=''true''></i>', 'f'),
(272, 'audio-description', '<i class=''fa fa-audio-description'' aria-hidden=''true''></i>', 'f'),
(273, 'automobile <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-automobile'' aria-hidden=''true''></i>', 'f'),
(274, 'balance-scale', '<i class=''fa fa-balance-scale'' aria-hidden=''true''></i>', 'f'),
(275, 'ban', '<i class=''fa fa-ban'' aria-hidden=''true''></i>', 'f'),
(276, 'bank <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-bank'' aria-hidden=''true''></i>', 'f'),
(277, 'bar-chart', '<i class=''fa fa-bar-chart'' aria-hidden=''true''></i>', 'f'),
(278, 'bar-chart-o <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-bar-chart-o'' aria-hidden=''true''></i>', 'f'),
(279, 'barcode', '<i class=''fa fa-barcode'' aria-hidden=''true''></i>', 'f'),
(280, 'bars', '<i class=''fa fa-bars'' aria-hidden=''true''></i>', 'f'),
(281, 'bath', '<i class=''fa fa-bath'' aria-hidden=''true''></i>', 'f'),
(282, 'bathtub <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-bathtub'' aria-hidden=''true''></i>', 'f'),
(283, 'battery <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-battery'' aria-hidden=''true''></i>', 'f'),
(284, 'battery-0 <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-battery-0'' aria-hidden=''true''></i>', 'f'),
(285, 'battery-1 <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-battery-1'' aria-hidden=''true''></i>', 'f'),
(286, 'battery-2 <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-battery-2'' aria-hidden=''true''></i>', 'f'),
(287, 'battery-3 <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-battery-3'' aria-hidden=''true''></i>', 'f'),
(288, 'battery-4 <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-battery-4'' aria-hidden=''true''></i>', 'f'),
(289, 'battery-empty', '<i class=''fa fa-battery-empty'' aria-hidden=''true''></i>', 'f'),
(290, 'battery-full', '<i class=''fa fa-battery-full'' aria-hidden=''true''></i>', 'f'),
(291, 'battery-half', '<i class=''fa fa-battery-half'' aria-hidden=''true''></i>', 'f'),
(292, 'battery-quarter', '<i class=''fa fa-battery-quarter'' aria-hidden=''true''></i>', 'f'),
(293, 'battery-three-quarters', '<i class=''fa fa-battery-three-quarters'' aria-hidden=''true''></i>', 'f'),
(294, 'bed', '<i class=''fa fa-bed'' aria-hidden=''true''></i>', 'f'),
(295, 'beer', '<i class=''fa fa-beer'' aria-hidden=''true''></i>', 'f'),
(296, 'bell', '<i class=''fa fa-bell'' aria-hidden=''true''></i>', 'f'),
(297, 'bell-o', '<i class=''fa fa-bell-o'' aria-hidden=''true''></i>', 'f'),
(298, 'bell-slash', '<i class=''fa fa-bell-slash'' aria-hidden=''true''></i>', 'f'),
(299, 'bell-slash-o', '<i class=''fa fa-bell-slash-o'' aria-hidden=''true''></i>', 'f'),
(300, 'bicycle', '<i class=''fa fa-bicycle'' aria-hidden=''true''></i>', 'f'),
(301, 'binoculars', '<i class=''fa fa-binoculars'' aria-hidden=''true''></i>', 'f'),
(302, 'birthday-cake', '<i class=''fa fa-birthday-cake'' aria-hidden=''true''></i>', 'f'),
(303, 'blind', '<i class=''fa fa-blind'' aria-hidden=''true''></i>', 'f'),
(304, 'bluetooth', '<i class=''fa fa-bluetooth'' aria-hidden=''true''></i>', 'f'),
(305, 'bluetooth-b', '<i class=''fa fa-bluetooth-b'' aria-hidden=''true''></i>', 'f'),
(306, 'bolt', '<i class=''fa fa-bolt'' aria-hidden=''true''></i>', 'f'),
(307, 'bomb', '<i class=''fa fa-bomb'' aria-hidden=''true''></i>', 'f'),
(308, 'book', '<i class=''fa fa-book'' aria-hidden=''true''></i>', 'f'),
(309, 'bookmark', '<i class=''fa fa-bookmark'' aria-hidden=''true''></i>', 'f'),
(310, 'bookmark-o', '<i class=''fa fa-bookmark-o'' aria-hidden=''true''></i>', 'f'),
(311, 'braille', '<i class=''fa fa-braille'' aria-hidden=''true''></i>', 'f'),
(312, 'briefcase', '<i class=''fa fa-briefcase'' aria-hidden=''true''></i>', 'f'),
(313, 'bug', '<i class=''fa fa-bug'' aria-hidden=''true''></i>', 'f'),
(314, 'building', '<i class=''fa fa-building'' aria-hidden=''true''></i>', 'f'),
(315, 'building-o', '<i class=''fa fa-building-o'' aria-hidden=''true''></i>', 'f'),
(316, 'bullhorn', '<i class=''fa fa-bullhorn'' aria-hidden=''true''></i>', 'f'),
(317, 'bullseye', '<i class=''fa fa-bullseye'' aria-hidden=''true''></i>', 'f'),
(318, 'bus', '<i class=''fa fa-bus'' aria-hidden=''true''></i>', 'f'),
(319, 'cab <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-cab'' aria-hidden=''true''></i>', 'f'),
(320, 'calculator', '<i class=''fa fa-calculator'' aria-hidden=''true''></i>', 'f'),
(321, 'calendar', '<i class=''fa fa-calendar'' aria-hidden=''true''></i>', 'f'),
(322, 'calendar-check-o', '<i class=''fa fa-calendar-check-o'' aria-hidden=''true''></i>', 'f'),
(323, 'calendar-minus-o', '<i class=''fa fa-calendar-minus-o'' aria-hidden=''true''></i>', 'f'),
(324, 'calendar-o', '<i class=''fa fa-calendar-o'' aria-hidden=''true''></i>', 'f'),
(325, 'calendar-plus-o', '<i class=''fa fa-calendar-plus-o'' aria-hidden=''true''></i>', 'f'),
(326, 'calendar-times-o', '<i class=''fa fa-calendar-times-o'' aria-hidden=''true''></i>', 'f'),
(327, 'camera', '<i class=''fa fa-camera'' aria-hidden=''true''></i>', 'f'),
(328, 'camera-retro', '<i class=''fa fa-camera-retro'' aria-hidden=''true''></i>', 'f'),
(329, 'car', '<i class=''fa fa-car'' aria-hidden=''true''></i>', 'f'),
(330, 'caret-square-o-down', '<i class=''fa fa-caret-square-o-down'' aria-hidden=''true''></i>', 'f'),
(331, 'caret-square-o-left', '<i class=''fa fa-caret-square-o-left'' aria-hidden=''true''></i>', 'f'),
(332, 'caret-square-o-right', '<i class=''fa fa-caret-square-o-right'' aria-hidden=''true''></i>', 'f'),
(333, 'caret-square-o-up', '<i class=''fa fa-caret-square-o-up'' aria-hidden=''true''></i>', 'f'),
(334, 'cart-arrow-down', '<i class=''fa fa-cart-arrow-down'' aria-hidden=''true''></i>', 'f'),
(335, 'cart-plus', '<i class=''fa fa-cart-plus'' aria-hidden=''true''></i>', 'f'),
(336, 'cc', '<i class=''fa fa-cc'' aria-hidden=''true''></i>', 'f'),
(337, 'certificate', '<i class=''fa fa-certificate'' aria-hidden=''true''></i>', 'f'),
(338, 'check', '<i class=''fa fa-check'' aria-hidden=''true''></i>', 'f'),
(339, 'check-circle', '<i class=''fa fa-check-circle'' aria-hidden=''true''></i>', 'f'),
(340, 'check-circle-o', '<i class=''fa fa-check-circle-o'' aria-hidden=''true''></i>', 'f'),
(341, 'check-square', '<i class=''fa fa-check-square'' aria-hidden=''true''></i>', 'f'),
(342, 'check-square-o', '<i class=''fa fa-check-square-o'' aria-hidden=''true''></i>', 'f'),
(343, 'child', '<i class=''fa fa-child'' aria-hidden=''true''></i>', 'f'),
(344, 'circle', '<i class=''fa fa-circle'' aria-hidden=''true''></i>', 'f'),
(345, 'circle-o', '<i class=''fa fa-circle-o'' aria-hidden=''true''></i>', 'f'),
(346, 'circle-o-notch', '<i class=''fa fa-circle-o-notch'' aria-hidden=''true''></i>', 'f'),
(347, 'circle-thin', '<i class=''fa fa-circle-thin'' aria-hidden=''true''></i>', 'f'),
(348, 'clock-o', '<i class=''fa fa-clock-o'' aria-hidden=''true''></i>', 'f'),
(349, 'clone', '<i class=''fa fa-clone'' aria-hidden=''true''></i>', 'f'),
(350, 'close <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-close'' aria-hidden=''true''></i>', 'f'),
(351, 'cloud', '<i class=''fa fa-cloud'' aria-hidden=''true''></i>', 'f'),
(352, 'cloud-download', '<i class=''fa fa-cloud-download'' aria-hidden=''true''></i>', 'f'),
(353, 'cloud-upload', '<i class=''fa fa-cloud-upload'' aria-hidden=''true''></i>', 'f'),
(354, 'code', '<i class=''fa fa-code'' aria-hidden=''true''></i>', 'f'),
(355, 'code-fork', '<i class=''fa fa-code-fork'' aria-hidden=''true''></i>', 'f'),
(356, 'coffee', '<i class=''fa fa-coffee'' aria-hidden=''true''></i>', 'f'),
(357, 'cog', '<i class=''fa fa-cog'' aria-hidden=''true''></i>', 'f'),
(358, 'cogs', '<i class=''fa fa-cogs'' aria-hidden=''true''></i>', 'f'),
(359, 'comment', '<i class=''fa fa-comment'' aria-hidden=''true''></i>', 'f'),
(360, 'comment-o', '<i class=''fa fa-comment-o'' aria-hidden=''true''></i>', 'f'),
(361, 'commenting', '<i class=''fa fa-commenting'' aria-hidden=''true''></i>', 'f'),
(362, 'commenting-o', '<i class=''fa fa-commenting-o'' aria-hidden=''true''></i>', 'f'),
(363, 'comments', '<i class=''fa fa-comments'' aria-hidden=''true''></i>', 'f'),
(364, 'comments-o', '<i class=''fa fa-comments-o'' aria-hidden=''true''></i>', 'f'),
(365, 'compass', '<i class=''fa fa-compass'' aria-hidden=''true''></i>', 'f'),
(366, 'copyright', '<i class=''fa fa-copyright'' aria-hidden=''true''></i>', 'f'),
(367, 'creative-commons', '<i class=''fa fa-creative-commons'' aria-hidden=''true''></i>', 'f'),
(368, 'credit-card', '<i class=''fa fa-credit-card'' aria-hidden=''true''></i>', 'f'),
(369, 'credit-card-alt', '<i class=''fa fa-credit-card-alt'' aria-hidden=''true''></i>', 'f'),
(370, 'crop', '<i class=''fa fa-crop'' aria-hidden=''true''></i>', 'f'),
(371, 'crosshairs', '<i class=''fa fa-crosshairs'' aria-hidden=''true''></i>', 'f'),
(372, 'cube', '<i class=''fa fa-cube'' aria-hidden=''true''></i>', 'f'),
(373, 'cubes', '<i class=''fa fa-cubes'' aria-hidden=''true''></i>', 'f'),
(374, 'cutlery', '<i class=''fa fa-cutlery'' aria-hidden=''true''></i>', 'f'),
(375, 'dashboard <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-dashboard'' aria-hidden=''true''></i>', 'f'),
(376, 'database', '<i class=''fa fa-database'' aria-hidden=''true''></i>', 'f'),
(377, 'deaf', '<i class=''fa fa-deaf'' aria-hidden=''true''></i>', 'f'),
(378, 'deafness <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-deafness'' aria-hidden=''true''></i>', 'f'),
(379, 'desktop', '<i class=''fa fa-desktop'' aria-hidden=''true''></i>', 'f'),
(380, 'diamond', '<i class=''fa fa-diamond'' aria-hidden=''true''></i>', 'f'),
(381, 'dot-circle-o', '<i class=''fa fa-dot-circle-o'' aria-hidden=''true''></i>', 'f'),
(382, 'download', '<i class=''fa fa-download'' aria-hidden=''true''></i>', 'f'),
(383, 'drivers-license <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-drivers-license'' aria-hidden=''true''></i>', 'f'),
(384, 'drivers-license-o <span class=''text-muted''>(alias)</', '<i class=''fa fa-drivers-license-o'' aria-hidden=''true''></i>', 'f'),
(385, 'edit <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-edit'' aria-hidden=''true''></i>', 'f'),
(386, 'ellipsis-h', '<i class=''fa fa-ellipsis-h'' aria-hidden=''true''></i>', 'f'),
(387, 'ellipsis-v', '<i class=''fa fa-ellipsis-v'' aria-hidden=''true''></i>', 'f'),
(388, 'envelope', '<i class=''fa fa-envelope'' aria-hidden=''true''></i>', 'f'),
(389, 'envelope-o', '<i class=''fa fa-envelope-o'' aria-hidden=''true''></i>', 'f'),
(390, 'envelope-open', '<i class=''fa fa-envelope-open'' aria-hidden=''true''></i>', 'f'),
(391, 'envelope-open-o', '<i class=''fa fa-envelope-open-o'' aria-hidden=''true''></i>', 'f'),
(392, 'envelope-square', '<i class=''fa fa-envelope-square'' aria-hidden=''true''></i>', 'f'),
(393, 'eraser', '<i class=''fa fa-eraser'' aria-hidden=''true''></i>', 'f'),
(394, 'exchange', '<i class=''fa fa-exchange'' aria-hidden=''true''></i>', 'f'),
(395, 'exclamation', '<i class=''fa fa-exclamation'' aria-hidden=''true''></i>', 'f'),
(396, 'exclamation-circle', '<i class=''fa fa-exclamation-circle'' aria-hidden=''true''></i>', 'f'),
(397, 'exclamation-triangle', '<i class=''fa fa-exclamation-triangle'' aria-hidden=''true''></i>', 'f'),
(398, 'external-link', '<i class=''fa fa-external-link'' aria-hidden=''true''></i>', 'f'),
(399, 'external-link-square', '<i class=''fa fa-external-link-square'' aria-hidden=''true''></i>', 'f'),
(400, 'eye', '<i class=''fa fa-eye'' aria-hidden=''true''></i>', 'f'),
(401, 'eye-slash', '<i class=''fa fa-eye-slash'' aria-hidden=''true''></i>', 'f'),
(402, 'eyedropper', '<i class=''fa fa-eyedropper'' aria-hidden=''true''></i>', 'f'),
(403, 'fax', '<i class=''fa fa-fax'' aria-hidden=''true''></i>', 'f'),
(404, 'feed <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-feed'' aria-hidden=''true''></i>', 'f'),
(405, 'female', '<i class=''fa fa-female'' aria-hidden=''true''></i>', 'f'),
(406, 'fighter-jet', '<i class=''fa fa-fighter-jet'' aria-hidden=''true''></i>', 'f'),
(407, 'file-archive-o', '<i class=''fa fa-file-archive-o'' aria-hidden=''true''></i>', 'f'),
(408, 'file-audio-o', '<i class=''fa fa-file-audio-o'' aria-hidden=''true''></i>', 'f'),
(409, 'file-code-o', '<i class=''fa fa-file-code-o'' aria-hidden=''true''></i>', 'f'),
(410, 'file-excel-o', '<i class=''fa fa-file-excel-o'' aria-hidden=''true''></i>', 'f'),
(411, 'file-image-o', '<i class=''fa fa-file-image-o'' aria-hidden=''true''></i>', 'f'),
(412, 'file-movie-o <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-file-movie-o'' aria-hidden=''true''></i>', 'f'),
(413, 'file-pdf-o', '<i class=''fa fa-file-pdf-o'' aria-hidden=''true''></i>', 'f'),
(414, 'file-photo-o <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-file-photo-o'' aria-hidden=''true''></i>', 'f'),
(415, 'file-picture-o <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-file-picture-o'' aria-hidden=''true''></i>', 'f'),
(416, 'file-powerpoint-o', '<i class=''fa fa-file-powerpoint-o'' aria-hidden=''true''></i>', 'f'),
(417, 'file-sound-o <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-file-sound-o'' aria-hidden=''true''></i>', 'f'),
(418, 'file-video-o', '<i class=''fa fa-file-video-o'' aria-hidden=''true''></i>', 'f'),
(419, 'file-word-o', '<i class=''fa fa-file-word-o'' aria-hidden=''true''></i>', 'f'),
(420, 'file-zip-o <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-file-zip-o'' aria-hidden=''true''></i>', 'f'),
(421, 'film', '<i class=''fa fa-film'' aria-hidden=''true''></i>', 'f'),
(422, 'filter', '<i class=''fa fa-filter'' aria-hidden=''true''></i>', 'f'),
(423, 'fire', '<i class=''fa fa-fire'' aria-hidden=''true''></i>', 'f'),
(424, 'fire-extinguisher', '<i class=''fa fa-fire-extinguisher'' aria-hidden=''true''></i>', 'f'),
(425, 'flag', '<i class=''fa fa-flag'' aria-hidden=''true''></i>', 'f'),
(426, 'flag-checkered', '<i class=''fa fa-flag-checkered'' aria-hidden=''true''></i>', 'f'),
(427, 'flag-o', '<i class=''fa fa-flag-o'' aria-hidden=''true''></i>', 'f'),
(428, 'flash <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-flash'' aria-hidden=''true''></i>', 'f'),
(429, 'flask', '<i class=''fa fa-flask'' aria-hidden=''true''></i>', 'f'),
(430, 'folder', '<i class=''fa fa-folder'' aria-hidden=''true''></i>', 'f'),
(431, 'folder-o', '<i class=''fa fa-folder-o'' aria-hidden=''true''></i>', 'f'),
(432, 'folder-open', '<i class=''fa fa-folder-open'' aria-hidden=''true''></i>', 'f'),
(433, 'folder-open-o', '<i class=''fa fa-folder-open-o'' aria-hidden=''true''></i>', 'f'),
(434, 'frown-o', '<i class=''fa fa-frown-o'' aria-hidden=''true''></i>', 'f'),
(435, 'futbol-o', '<i class=''fa fa-futbol-o'' aria-hidden=''true''></i>', 'f'),
(436, 'gamepad', '<i class=''fa fa-gamepad'' aria-hidden=''true''></i>', 'f'),
(437, 'gavel', '<i class=''fa fa-gavel'' aria-hidden=''true''></i>', 'f'),
(438, 'gear <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-gear'' aria-hidden=''true''></i>', 'f'),
(439, 'gears <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-gears'' aria-hidden=''true''></i>', 'f'),
(440, 'gift', '<i class=''fa fa-gift'' aria-hidden=''true''></i>', 'f'),
(441, 'glass', '<i class=''fa fa-glass'' aria-hidden=''true''></i>', 'f'),
(442, 'globe', '<i class=''fa fa-globe'' aria-hidden=''true''></i>', 'f'),
(443, 'graduation-cap', '<i class=''fa fa-graduation-cap'' aria-hidden=''true''></i>', 'f'),
(444, 'group <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-group'' aria-hidden=''true''></i>', 'f'),
(445, 'hand-grab-o <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-hand-grab-o'' aria-hidden=''true''></i>', 'f'),
(446, 'hand-lizard-o', '<i class=''fa fa-hand-lizard-o'' aria-hidden=''true''></i>', 'f'),
(447, 'hand-paper-o', '<i class=''fa fa-hand-paper-o'' aria-hidden=''true''></i>', 'f'),
(448, 'hand-peace-o', '<i class=''fa fa-hand-peace-o'' aria-hidden=''true''></i>', 'f'),
(449, 'hand-pointer-o', '<i class=''fa fa-hand-pointer-o'' aria-hidden=''true''></i>', 'f'),
(450, 'hand-rock-o', '<i class=''fa fa-hand-rock-o'' aria-hidden=''true''></i>', 'f'),
(451, 'hand-scissors-o', '<i class=''fa fa-hand-scissors-o'' aria-hidden=''true''></i>', 'f'),
(452, 'hand-spock-o', '<i class=''fa fa-hand-spock-o'' aria-hidden=''true''></i>', 'f'),
(453, 'hand-stop-o <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-hand-stop-o'' aria-hidden=''true''></i>', 'f'),
(454, 'handshake-o', '<i class=''fa fa-handshake-o'' aria-hidden=''true''></i>', 'f'),
(455, 'hard-of-hearing <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-hard-of-hearing'' aria-hidden=''true''></i>', 'f'),
(456, 'hashtag', '<i class=''fa fa-hashtag'' aria-hidden=''true''></i>', 'f'),
(457, 'hdd-o', '<i class=''fa fa-hdd-o'' aria-hidden=''true''></i>', 'f'),
(458, 'headphones', '<i class=''fa fa-headphones'' aria-hidden=''true''></i>', 'f'),
(459, 'heart', '<i class=''fa fa-heart'' aria-hidden=''true''></i>', 'f'),
(460, 'heart-o', '<i class=''fa fa-heart-o'' aria-hidden=''true''></i>', 'f'),
(461, 'heartbeat', '<i class=''fa fa-heartbeat'' aria-hidden=''true''></i>', 'f'),
(462, 'history', '<i class=''fa fa-history'' aria-hidden=''true''></i>', 'f'),
(463, 'home', '<i class=''fa fa-home'' aria-hidden=''true''></i>', 'f'),
(464, 'hotel <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-hotel'' aria-hidden=''true''></i>', 'f'),
(465, 'hourglass', '<i class=''fa fa-hourglass'' aria-hidden=''true''></i>', 'f'),
(466, 'hourglass-1 <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-hourglass-1'' aria-hidden=''true''></i>', 'f'),
(467, 'hourglass-2 <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-hourglass-2'' aria-hidden=''true''></i>', 'f'),
(468, 'hourglass-3 <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-hourglass-3'' aria-hidden=''true''></i>', 'f'),
(469, 'hourglass-end', '<i class=''fa fa-hourglass-end'' aria-hidden=''true''></i>', 'f'),
(470, 'hourglass-half', '<i class=''fa fa-hourglass-half'' aria-hidden=''true''></i>', 'f'),
(471, 'hourglass-o', '<i class=''fa fa-hourglass-o'' aria-hidden=''true''></i>', 'f'),
(472, 'hourglass-start', '<i class=''fa fa-hourglass-start'' aria-hidden=''true''></i>', 'f'),
(473, 'i-cursor', '<i class=''fa fa-i-cursor'' aria-hidden=''true''></i>', 'f'),
(474, 'id-badge', '<i class=''fa fa-id-badge'' aria-hidden=''true''></i>', 'f'),
(475, 'id-card', '<i class=''fa fa-id-card'' aria-hidden=''true''></i>', 'f'),
(476, 'id-card-o', '<i class=''fa fa-id-card-o'' aria-hidden=''true''></i>', 'f'),
(477, 'image <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-image'' aria-hidden=''true''></i>', 'f'),
(478, 'inbox', '<i class=''fa fa-inbox'' aria-hidden=''true''></i>', 'f'),
(479, 'industry', '<i class=''fa fa-industry'' aria-hidden=''true''></i>', 'f'),
(480, 'info', '<i class=''fa fa-info'' aria-hidden=''true''></i>', 'f'),
(481, 'info-circle', '<i class=''fa fa-info-circle'' aria-hidden=''true''></i>', 'f'),
(482, 'institution <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-institution'' aria-hidden=''true''></i>', 'f'),
(483, 'key', '<i class=''fa fa-key'' aria-hidden=''true''></i>', 'f'),
(484, 'keyboard-o', '<i class=''fa fa-keyboard-o'' aria-hidden=''true''></i>', 'f'),
(485, 'language', '<i class=''fa fa-language'' aria-hidden=''true''></i>', 'f'),
(486, 'laptop', '<i class=''fa fa-laptop'' aria-hidden=''true''></i>', 'f'),
(487, 'leaf', '<i class=''fa fa-leaf'' aria-hidden=''true''></i>', 'f'),
(488, 'legal <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-legal'' aria-hidden=''true''></i>', 'f'),
(489, 'lemon-o', '<i class=''fa fa-lemon-o'' aria-hidden=''true''></i>', 'f'),
(490, 'level-down', '<i class=''fa fa-level-down'' aria-hidden=''true''></i>', 'f'),
(491, 'level-up', '<i class=''fa fa-level-up'' aria-hidden=''true''></i>', 'f'),
(492, 'life-bouy <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-life-bouy'' aria-hidden=''true''></i>', 'f'),
(493, 'life-buoy <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-life-buoy'' aria-hidden=''true''></i>', 'f'),
(494, 'life-ring', '<i class=''fa fa-life-ring'' aria-hidden=''true''></i>', 'f'),
(495, 'life-saver <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-life-saver'' aria-hidden=''true''></i>', 'f'),
(496, 'lightbulb-o', '<i class=''fa fa-lightbulb-o'' aria-hidden=''true''></i>', 'f'),
(497, 'line-chart', '<i class=''fa fa-line-chart'' aria-hidden=''true''></i>', 'f'),
(498, 'location-arrow', '<i class=''fa fa-location-arrow'' aria-hidden=''true''></i>', 'f'),
(499, 'lock', '<i class=''fa fa-lock'' aria-hidden=''true''></i>', 'f'),
(500, 'low-vision', '<i class=''fa fa-low-vision'' aria-hidden=''true''></i>', 'f'),
(501, 'magic', '<i class=''fa fa-magic'' aria-hidden=''true''></i>', 'f'),
(502, 'magnet', '<i class=''fa fa-magnet'' aria-hidden=''true''></i>', 'f'),
(503, 'mail-forward <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-mail-forward'' aria-hidden=''true''></i>', 'f'),
(504, 'mail-reply <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-mail-reply'' aria-hidden=''true''></i>', 'f'),
(505, 'mail-reply-all <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-mail-reply-all'' aria-hidden=''true''></i>', 'f'),
(506, 'male', '<i class=''fa fa-male'' aria-hidden=''true''></i>', 'f'),
(507, 'map', '<i class=''fa fa-map'' aria-hidden=''true''></i>', 'f'),
(508, 'map-marker', '<i class=''fa fa-map-marker'' aria-hidden=''true''></i>', 'f'),
(509, 'map-o', '<i class=''fa fa-map-o'' aria-hidden=''true''></i>', 'f'),
(510, 'map-pin', '<i class=''fa fa-map-pin'' aria-hidden=''true''></i>', 'f'),
(511, 'map-signs', '<i class=''fa fa-map-signs'' aria-hidden=''true''></i>', 'f'),
(512, 'meh-o', '<i class=''fa fa-meh-o'' aria-hidden=''true''></i>', 'f'),
(513, 'microchip', '<i class=''fa fa-microchip'' aria-hidden=''true''></i>', 'f'),
(514, 'microphone', '<i class=''fa fa-microphone'' aria-hidden=''true''></i>', 'f'),
(515, 'microphone-slash', '<i class=''fa fa-microphone-slash'' aria-hidden=''true''></i>', 'f'),
(516, 'minus', '<i class=''fa fa-minus'' aria-hidden=''true''></i>', 'f'),
(517, 'minus-circle', '<i class=''fa fa-minus-circle'' aria-hidden=''true''></i>', 'f'),
(518, 'minus-square', '<i class=''fa fa-minus-square'' aria-hidden=''true''></i>', 'f'),
(519, 'minus-square-o', '<i class=''fa fa-minus-square-o'' aria-hidden=''true''></i>', 'f'),
(520, 'mobile', '<i class=''fa fa-mobile'' aria-hidden=''true''></i>', 'f'),
(521, 'mobile-phone <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-mobile-phone'' aria-hidden=''true''></i>', 'f'),
(522, 'money', '<i class=''fa fa-money'' aria-hidden=''true''></i>', 'f'),
(523, 'moon-o', '<i class=''fa fa-moon-o'' aria-hidden=''true''></i>', 'f'),
(524, 'mortar-board <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-mortar-board'' aria-hidden=''true''></i>', 'f'),
(525, 'motorcycle', '<i class=''fa fa-motorcycle'' aria-hidden=''true''></i>', 'f'),
(526, 'mouse-pointer', '<i class=''fa fa-mouse-pointer'' aria-hidden=''true''></i>', 'f'),
(527, 'music', '<i class=''fa fa-music'' aria-hidden=''true''></i>', 'f'),
(528, 'navicon <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-navicon'' aria-hidden=''true''></i>', 'f'),
(529, 'newspaper-o', '<i class=''fa fa-newspaper-o'' aria-hidden=''true''></i>', 'f'),
(530, 'object-group', '<i class=''fa fa-object-group'' aria-hidden=''true''></i>', 'f'),
(531, 'object-ungroup', '<i class=''fa fa-object-ungroup'' aria-hidden=''true''></i>', 'f'),
(532, 'paint-brush', '<i class=''fa fa-paint-brush'' aria-hidden=''true''></i>', 'f'),
(533, 'paper-plane', '<i class=''fa fa-paper-plane'' aria-hidden=''true''></i>', 'f'),
(534, 'paper-plane-o', '<i class=''fa fa-paper-plane-o'' aria-hidden=''true''></i>', 'f'),
(535, 'paw', '<i class=''fa fa-paw'' aria-hidden=''true''></i>', 'f'),
(536, 'pencil', '<i class=''fa fa-pencil'' aria-hidden=''true''></i>', 'f'),
(537, 'pencil-square', '<i class=''fa fa-pencil-square'' aria-hidden=''true''></i>', 'f'),
(538, 'pencil-square-o', '<i class=''fa fa-pencil-square-o'' aria-hidden=''true''></i>', 'f'),
(539, 'percent', '<i class=''fa fa-percent'' aria-hidden=''true''></i>', 'f'),
(540, 'phone', '<i class=''fa fa-phone'' aria-hidden=''true''></i>', 'f'),
(541, 'phone-square', '<i class=''fa fa-phone-square'' aria-hidden=''true''></i>', 'f'),
(542, 'photo <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-photo'' aria-hidden=''true''></i>', 'f'),
(543, 'picture-o', '<i class=''fa fa-picture-o'' aria-hidden=''true''></i>', 'f'),
(544, 'pie-chart', '<i class=''fa fa-pie-chart'' aria-hidden=''true''></i>', 'f'),
(545, 'plane', '<i class=''fa fa-plane'' aria-hidden=''true''></i>', 'f'),
(546, 'plug', '<i class=''fa fa-plug'' aria-hidden=''true''></i>', 'f'),
(547, 'plus', '<i class=''fa fa-plus'' aria-hidden=''true''></i>', 'f'),
(548, 'plus-circle', '<i class=''fa fa-plus-circle'' aria-hidden=''true''></i>', 'f'),
(549, 'plus-square', '<i class=''fa fa-plus-square'' aria-hidden=''true''></i>', 'f'),
(550, 'plus-square-o', '<i class=''fa fa-plus-square-o'' aria-hidden=''true''></i>', 'f'),
(551, 'podcast', '<i class=''fa fa-podcast'' aria-hidden=''true''></i>', 'f'),
(552, 'power-off', '<i class=''fa fa-power-off'' aria-hidden=''true''></i>', 'f'),
(553, 'print', '<i class=''fa fa-print'' aria-hidden=''true''></i>', 'f'),
(554, 'puzzle-piece', '<i class=''fa fa-puzzle-piece'' aria-hidden=''true''></i>', 'f'),
(555, 'qrcode', '<i class=''fa fa-qrcode'' aria-hidden=''true''></i>', 'f'),
(556, 'question', '<i class=''fa fa-question'' aria-hidden=''true''></i>', 'f'),
(557, 'question-circle', '<i class=''fa fa-question-circle'' aria-hidden=''true''></i>', 'f'),
(558, 'question-circle-o', '<i class=''fa fa-question-circle-o'' aria-hidden=''true''></i>', 'f'),
(559, 'quote-left', '<i class=''fa fa-quote-left'' aria-hidden=''true''></i>', 'f'),
(560, 'quote-right', '<i class=''fa fa-quote-right'' aria-hidden=''true''></i>', 'f'),
(561, 'random', '<i class=''fa fa-random'' aria-hidden=''true''></i>', 'f'),
(562, 'recycle', '<i class=''fa fa-recycle'' aria-hidden=''true''></i>', 'f'),
(563, 'refresh', '<i class=''fa fa-refresh'' aria-hidden=''true''></i>', 'f'),
(564, 'registered', '<i class=''fa fa-registered'' aria-hidden=''true''></i>', 'f'),
(565, 'remove <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-remove'' aria-hidden=''true''></i>', 'f'),
(566, 'reorder <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-reorder'' aria-hidden=''true''></i>', 'f'),
(567, 'reply', '<i class=''fa fa-reply'' aria-hidden=''true''></i>', 'f'),
(568, 'reply-all', '<i class=''fa fa-reply-all'' aria-hidden=''true''></i>', 'f'),
(569, 'retweet', '<i class=''fa fa-retweet'' aria-hidden=''true''></i>', 'f'),
(570, 'road', '<i class=''fa fa-road'' aria-hidden=''true''></i>', 'f'),
(571, 'rocket', '<i class=''fa fa-rocket'' aria-hidden=''true''></i>', 'f'),
(572, 'rss', '<i class=''fa fa-rss'' aria-hidden=''true''></i>', 'f'),
(573, 'rss-square', '<i class=''fa fa-rss-square'' aria-hidden=''true''></i>', 'f'),
(574, 's15 <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-s15'' aria-hidden=''true''></i>', 'f'),
(575, 'search', '<i class=''fa fa-search'' aria-hidden=''true''></i>', 'f'),
(576, 'search-minus', '<i class=''fa fa-search-minus'' aria-hidden=''true''></i>', 'f'),
(577, 'search-plus', '<i class=''fa fa-search-plus'' aria-hidden=''true''></i>', 'f'),
(578, 'send <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-send'' aria-hidden=''true''></i>', 'f'),
(579, 'send-o <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-send-o'' aria-hidden=''true''></i>', 'f'),
(580, 'server', '<i class=''fa fa-server'' aria-hidden=''true''></i>', 'f'),
(581, 'share', '<i class=''fa fa-share'' aria-hidden=''true''></i>', 'f'),
(582, 'share-alt', '<i class=''fa fa-share-alt'' aria-hidden=''true''></i>', 'f'),
(583, 'share-alt-square', '<i class=''fa fa-share-alt-square'' aria-hidden=''true''></i>', 'f'),
(584, 'share-square', '<i class=''fa fa-share-square'' aria-hidden=''true''></i>', 'f'),
(585, 'share-square-o', '<i class=''fa fa-share-square-o'' aria-hidden=''true''></i>', 'f'),
(586, 'shield', '<i class=''fa fa-shield'' aria-hidden=''true''></i>', 'f'),
(587, 'ship', '<i class=''fa fa-ship'' aria-hidden=''true''></i>', 'f'),
(588, 'shopping-bag', '<i class=''fa fa-shopping-bag'' aria-hidden=''true''></i>', 'f'),
(589, 'shopping-basket', '<i class=''fa fa-shopping-basket'' aria-hidden=''true''></i>', 'f'),
(590, 'shopping-cart', '<i class=''fa fa-shopping-cart'' aria-hidden=''true''></i>', 'f'),
(591, 'shower', '<i class=''fa fa-shower'' aria-hidden=''true''></i>', 'f'),
(592, 'sign-in', '<i class=''fa fa-sign-in'' aria-hidden=''true''></i>', 'f'),
(593, 'sign-language', '<i class=''fa fa-sign-language'' aria-hidden=''true''></i>', 'f'),
(594, 'sign-out', '<i class=''fa fa-sign-out'' aria-hidden=''true''></i>', 'f'),
(595, 'signal', '<i class=''fa fa-signal'' aria-hidden=''true''></i>', 'f'),
(596, 'signing <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-signing'' aria-hidden=''true''></i>', 'f'),
(597, 'sitemap', '<i class=''fa fa-sitemap'' aria-hidden=''true''></i>', 'f'),
(598, 'sliders', '<i class=''fa fa-sliders'' aria-hidden=''true''></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
(599, 'smile-o', '<i class=''fa fa-smile-o'' aria-hidden=''true''></i>', 'f'),
(600, 'snowflake-o', '<i class=''fa fa-snowflake-o'' aria-hidden=''true''></i>', 'f'),
(601, 'soccer-ball-o <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-soccer-ball-o'' aria-hidden=''true''></i>', 'f'),
(602, 'sort', '<i class=''fa fa-sort'' aria-hidden=''true''></i>', 'f'),
(603, 'sort-alpha-asc', '<i class=''fa fa-sort-alpha-asc'' aria-hidden=''true''></i>', 'f'),
(604, 'sort-alpha-desc', '<i class=''fa fa-sort-alpha-desc'' aria-hidden=''true''></i>', 'f'),
(605, 'sort-amount-asc', '<i class=''fa fa-sort-amount-asc'' aria-hidden=''true''></i>', 'f'),
(606, 'sort-amount-desc', '<i class=''fa fa-sort-amount-desc'' aria-hidden=''true''></i>', 'f'),
(607, 'sort-asc', '<i class=''fa fa-sort-asc'' aria-hidden=''true''></i>', 'f'),
(608, 'sort-desc', '<i class=''fa fa-sort-desc'' aria-hidden=''true''></i>', 'f'),
(609, 'sort-down <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-sort-down'' aria-hidden=''true''></i>', 'f'),
(610, 'sort-numeric-asc', '<i class=''fa fa-sort-numeric-asc'' aria-hidden=''true''></i>', 'f'),
(611, 'sort-numeric-desc', '<i class=''fa fa-sort-numeric-desc'' aria-hidden=''true''></i>', 'f'),
(612, 'sort-up <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-sort-up'' aria-hidden=''true''></i>', 'f'),
(613, 'space-shuttle', '<i class=''fa fa-space-shuttle'' aria-hidden=''true''></i>', 'f'),
(614, 'spinner', '<i class=''fa fa-spinner'' aria-hidden=''true''></i>', 'f'),
(615, 'spoon', '<i class=''fa fa-spoon'' aria-hidden=''true''></i>', 'f'),
(616, 'square', '<i class=''fa fa-square'' aria-hidden=''true''></i>', 'f'),
(617, 'square-o', '<i class=''fa fa-square-o'' aria-hidden=''true''></i>', 'f'),
(618, 'star', '<i class=''fa fa-star'' aria-hidden=''true''></i>', 'f'),
(619, 'star-half', '<i class=''fa fa-star-half'' aria-hidden=''true''></i>', 'f'),
(620, 'star-half-empty <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-star-half-empty'' aria-hidden=''true''></i>', 'f'),
(621, 'star-half-full <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-star-half-full'' aria-hidden=''true''></i>', 'f'),
(622, 'star-half-o', '<i class=''fa fa-star-half-o'' aria-hidden=''true''></i>', 'f'),
(623, 'star-o', '<i class=''fa fa-star-o'' aria-hidden=''true''></i>', 'f'),
(624, 'sticky-note', '<i class=''fa fa-sticky-note'' aria-hidden=''true''></i>', 'f'),
(625, 'sticky-note-o', '<i class=''fa fa-sticky-note-o'' aria-hidden=''true''></i>', 'f'),
(626, 'street-view', '<i class=''fa fa-street-view'' aria-hidden=''true''></i>', 'f'),
(627, 'suitcase', '<i class=''fa fa-suitcase'' aria-hidden=''true''></i>', 'f'),
(628, 'sun-o', '<i class=''fa fa-sun-o'' aria-hidden=''true''></i>', 'f'),
(629, 'support <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-support'' aria-hidden=''true''></i>', 'f'),
(630, 'tablet', '<i class=''fa fa-tablet'' aria-hidden=''true''></i>', 'f'),
(631, 'tachometer', '<i class=''fa fa-tachometer'' aria-hidden=''true''></i>', 'f'),
(632, 'tag', '<i class=''fa fa-tag'' aria-hidden=''true''></i>', 'f'),
(633, 'tags', '<i class=''fa fa-tags'' aria-hidden=''true''></i>', 'f'),
(634, 'tasks', '<i class=''fa fa-tasks'' aria-hidden=''true''></i>', 'f'),
(635, 'taxi', '<i class=''fa fa-taxi'' aria-hidden=''true''></i>', 'f'),
(636, 'television', '<i class=''fa fa-television'' aria-hidden=''true''></i>', 'f'),
(637, 'terminal', '<i class=''fa fa-terminal'' aria-hidden=''true''></i>', 'f'),
(638, 'thermometer <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-thermometer'' aria-hidden=''true''></i>', 'f'),
(639, 'thermometer-0 <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-thermometer-0'' aria-hidden=''true''></i>', 'f'),
(640, 'thermometer-1 <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-thermometer-1'' aria-hidden=''true''></i>', 'f'),
(641, 'thermometer-2 <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-thermometer-2'' aria-hidden=''true''></i>', 'f'),
(642, 'thermometer-3 <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-thermometer-3'' aria-hidden=''true''></i>', 'f'),
(643, 'thermometer-4 <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-thermometer-4'' aria-hidden=''true''></i>', 'f'),
(644, 'thermometer-empty', '<i class=''fa fa-thermometer-empty'' aria-hidden=''true''></i>', 'f'),
(645, 'thermometer-full', '<i class=''fa fa-thermometer-full'' aria-hidden=''true''></i>', 'f'),
(646, 'thermometer-half', '<i class=''fa fa-thermometer-half'' aria-hidden=''true''></i>', 'f'),
(647, 'thermometer-quarter', '<i class=''fa fa-thermometer-quarter'' aria-hidden=''true''></i>', 'f'),
(648, 'thermometer-three-quarters', '<i class=''fa fa-thermometer-three-quarters'' aria-hidden=''true''></i>', 'f'),
(649, 'thumb-tack', '<i class=''fa fa-thumb-tack'' aria-hidden=''true''></i>', 'f'),
(650, 'thumbs-down', '<i class=''fa fa-thumbs-down'' aria-hidden=''true''></i>', 'f'),
(651, 'thumbs-o-down', '<i class=''fa fa-thumbs-o-down'' aria-hidden=''true''></i>', 'f'),
(652, 'thumbs-o-up', '<i class=''fa fa-thumbs-o-up'' aria-hidden=''true''></i>', 'f'),
(653, 'thumbs-up', '<i class=''fa fa-thumbs-up'' aria-hidden=''true''></i>', 'f'),
(654, 'ticket', '<i class=''fa fa-ticket'' aria-hidden=''true''></i>', 'f'),
(655, 'times', '<i class=''fa fa-times'' aria-hidden=''true''></i>', 'f'),
(656, 'times-circle', '<i class=''fa fa-times-circle'' aria-hidden=''true''></i>', 'f'),
(657, 'times-circle-o', '<i class=''fa fa-times-circle-o'' aria-hidden=''true''></i>', 'f'),
(658, 'times-rectangle <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-times-rectangle'' aria-hidden=''true''></i>', 'f'),
(659, 'times-rectangle-o <span class=''text-muted''>(alias)</', '<i class=''fa fa-times-rectangle-o'' aria-hidden=''true''></i>', 'f'),
(660, 'tint', '<i class=''fa fa-tint'' aria-hidden=''true''></i>', 'f'),
(661, 'toggle-down <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-toggle-down'' aria-hidden=''true''></i>', 'f'),
(662, 'toggle-left <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-toggle-left'' aria-hidden=''true''></i>', 'f'),
(663, 'toggle-off', '<i class=''fa fa-toggle-off'' aria-hidden=''true''></i>', 'f'),
(664, 'toggle-on', '<i class=''fa fa-toggle-on'' aria-hidden=''true''></i>', 'f'),
(665, 'toggle-right <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-toggle-right'' aria-hidden=''true''></i>', 'f'),
(666, 'toggle-up <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-toggle-up'' aria-hidden=''true''></i>', 'f'),
(667, 'trademark', '<i class=''fa fa-trademark'' aria-hidden=''true''></i>', 'f'),
(668, 'trash', '<i class=''fa fa-trash'' aria-hidden=''true''></i>', 'f'),
(669, 'trash-o', '<i class=''fa fa-trash-o'' aria-hidden=''true''></i>', 'f'),
(670, 'tree', '<i class=''fa fa-tree'' aria-hidden=''true''></i>', 'f'),
(671, 'trophy', '<i class=''fa fa-trophy'' aria-hidden=''true''></i>', 'f'),
(672, 'truck', '<i class=''fa fa-truck'' aria-hidden=''true''></i>', 'f'),
(673, 'tty', '<i class=''fa fa-tty'' aria-hidden=''true''></i>', 'f'),
(674, 'tv <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-tv'' aria-hidden=''true''></i>', 'f'),
(675, 'umbrella', '<i class=''fa fa-umbrella'' aria-hidden=''true''></i>', 'f'),
(676, 'universal-access', '<i class=''fa fa-universal-access'' aria-hidden=''true''></i>', 'f'),
(677, 'university', '<i class=''fa fa-university'' aria-hidden=''true''></i>', 'f'),
(678, 'unlock', '<i class=''fa fa-unlock'' aria-hidden=''true''></i>', 'f'),
(679, 'unlock-alt', '<i class=''fa fa-unlock-alt'' aria-hidden=''true''></i>', 'f'),
(680, 'unsorted <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-unsorted'' aria-hidden=''true''></i>', 'f'),
(681, 'upload', '<i class=''fa fa-upload'' aria-hidden=''true''></i>', 'f'),
(682, 'user', '<i class=''fa fa-user'' aria-hidden=''true''></i>', 'f'),
(683, 'user-circle', '<i class=''fa fa-user-circle'' aria-hidden=''true''></i>', 'f'),
(684, 'user-circle-o', '<i class=''fa fa-user-circle-o'' aria-hidden=''true''></i>', 'f'),
(685, 'user-o', '<i class=''fa fa-user-o'' aria-hidden=''true''></i>', 'f'),
(686, 'user-plus', '<i class=''fa fa-user-plus'' aria-hidden=''true''></i>', 'f'),
(687, 'user-secret', '<i class=''fa fa-user-secret'' aria-hidden=''true''></i>', 'f'),
(688, 'user-times', '<i class=''fa fa-user-times'' aria-hidden=''true''></i>', 'f'),
(689, 'users', '<i class=''fa fa-users'' aria-hidden=''true''></i>', 'f'),
(690, 'vcard <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-vcard'' aria-hidden=''true''></i>', 'f'),
(691, 'vcard-o <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-vcard-o'' aria-hidden=''true''></i>', 'f'),
(692, 'video-camera', '<i class=''fa fa-video-camera'' aria-hidden=''true''></i>', 'f'),
(693, 'volume-control-phone', '<i class=''fa fa-volume-control-phone'' aria-hidden=''true''></i>', 'f'),
(694, 'volume-down', '<i class=''fa fa-volume-down'' aria-hidden=''true''></i>', 'f'),
(695, 'volume-off', '<i class=''fa fa-volume-off'' aria-hidden=''true''></i>', 'f'),
(696, 'volume-up', '<i class=''fa fa-volume-up'' aria-hidden=''true''></i>', 'f'),
(697, 'warning <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-warning'' aria-hidden=''true''></i>', 'f'),
(698, 'wheelchair', '<i class=''fa fa-wheelchair'' aria-hidden=''true''></i>', 'f'),
(699, 'wheelchair-alt', '<i class=''fa fa-wheelchair-alt'' aria-hidden=''true''></i>', 'f'),
(700, 'wifi', '<i class=''fa fa-wifi'' aria-hidden=''true''></i>', 'f'),
(701, 'window-close', '<i class=''fa fa-window-close'' aria-hidden=''true''></i>', 'f'),
(702, 'window-close-o', '<i class=''fa fa-window-close-o'' aria-hidden=''true''></i>', 'f'),
(703, 'window-maximize', '<i class=''fa fa-window-maximize'' aria-hidden=''true''></i>', 'f'),
(704, 'window-minimize', '<i class=''fa fa-window-minimize'' aria-hidden=''true''></i>', 'f'),
(705, 'window-restore', '<i class=''fa fa-window-restore'' aria-hidden=''true''></i>', 'f'),
(706, 'wrench', '<i class=''fa fa-wrench'' aria-hidden=''true''></i>', 'f'),
(707, 'american-sign-language-interpreting', '<i class=''fa fa-american-sign-language-interpreting'' aria-hidden=''true''></i>', 'f'),
(708, 'asl-interpreting <span class=''text-muted''>(alias)</span', '<i class=''fa fa-asl-interpreting'' aria-hidden=''true''></i>', 'f'),
(709, 'assistive-listening-systems', '<i class=''fa fa-assistive-listening-systems'' aria-hidden=''true''></i>', 'f'),
(710, 'audio-description', '<i class=''fa fa-audio-description'' aria-hidden=''true''></i>', 'f'),
(711, 'blind', '<i class=''fa fa-blind'' aria-hidden=''true''></i>', 'f'),
(712, 'braille', '<i class=''fa fa-braille'' aria-hidden=''true''></i>', 'f'),
(713, 'cc', '<i class=''fa fa-cc'' aria-hidden=''true''></i>', 'f'),
(714, 'deaf', '<i class=''fa fa-deaf'' aria-hidden=''true''></i>', 'f'),
(715, 'deafness <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-deafness'' aria-hidden=''true''></i>', 'f'),
(716, 'hard-of-hearing <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-hard-of-hearing'' aria-hidden=''true''></i>', 'f'),
(717, 'low-vision', '<i class=''fa fa-low-vision'' aria-hidden=''true''></i>', 'f'),
(718, 'question-circle-o', '<i class=''fa fa-question-circle-o'' aria-hidden=''true''></i>', 'f'),
(719, 'sign-language', '<i class=''fa fa-sign-language'' aria-hidden=''true''></i>', 'f'),
(720, 'signing <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-signing'' aria-hidden=''true''></i>', 'f'),
(721, 'tty', '<i class=''fa fa-tty'' aria-hidden=''true''></i>', 'f'),
(722, 'universal-access', '<i class=''fa fa-universal-access'' aria-hidden=''true''></i>', 'f'),
(723, 'volume-control-phone', '<i class=''fa fa-volume-control-phone'' aria-hidden=''true''></i>', 'f'),
(724, 'wheelchair', '<i class=''fa fa-wheelchair'' aria-hidden=''true''></i>', 'f'),
(725, 'wheelchair-alt', '<i class=''fa fa-wheelchair-alt'' aria-hidden=''true''></i>', 'f'),
(726, 'hand-grab-o <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-hand-grab-o'' aria-hidden=''true''></i>', 'f'),
(727, 'hand-lizard-o', '<i class=''fa fa-hand-lizard-o'' aria-hidden=''true''></i>', 'f'),
(728, 'hand-o-down', '<i class=''fa fa-hand-o-down'' aria-hidden=''true''></i>', 'f'),
(729, 'hand-o-left', '<i class=''fa fa-hand-o-left'' aria-hidden=''true''></i>', 'f'),
(730, 'hand-o-right', '<i class=''fa fa-hand-o-right'' aria-hidden=''true''></i>', 'f'),
(731, 'hand-o-up', '<i class=''fa fa-hand-o-up'' aria-hidden=''true''></i>', 'f'),
(732, 'hand-paper-o', '<i class=''fa fa-hand-paper-o'' aria-hidden=''true''></i>', 'f'),
(733, 'hand-peace-o', '<i class=''fa fa-hand-peace-o'' aria-hidden=''true''></i>', 'f'),
(734, 'hand-pointer-o', '<i class=''fa fa-hand-pointer-o'' aria-hidden=''true''></i>', 'f'),
(735, 'hand-rock-o', '<i class=''fa fa-hand-rock-o'' aria-hidden=''true''></i>', 'f'),
(736, 'hand-scissors-o', '<i class=''fa fa-hand-scissors-o'' aria-hidden=''true''></i>', 'f'),
(737, 'hand-spock-o', '<i class=''fa fa-hand-spock-o'' aria-hidden=''true''></i>', 'f'),
(738, 'hand-stop-o <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-hand-stop-o'' aria-hidden=''true''></i>', 'f'),
(739, 'thumbs-down', '<i class=''fa fa-thumbs-down'' aria-hidden=''true''></i>', 'f'),
(740, 'thumbs-o-down', '<i class=''fa fa-thumbs-o-down'' aria-hidden=''true''></i>', 'f'),
(741, 'thumbs-o-up', '<i class=''fa fa-thumbs-o-up'' aria-hidden=''true''></i>', 'f'),
(742, 'thumbs-up', '<i class=''fa fa-thumbs-up'' aria-hidden=''true''></i>', 'f'),
(743, 'ambulance', '<i class=''fa fa-ambulance'' aria-hidden=''true''></i>', 'f'),
(744, 'automobile <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-automobile'' aria-hidden=''true''></i>', 'f'),
(745, 'bicycle', '<i class=''fa fa-bicycle'' aria-hidden=''true''></i>', 'f'),
(746, 'bus', '<i class=''fa fa-bus'' aria-hidden=''true''></i>', 'f'),
(747, 'cab <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-cab'' aria-hidden=''true''></i>', 'f'),
(748, 'car', '<i class=''fa fa-car'' aria-hidden=''true''></i>', 'f'),
(749, 'fighter-jet', '<i class=''fa fa-fighter-jet'' aria-hidden=''true''></i>', 'f'),
(750, 'motorcycle', '<i class=''fa fa-motorcycle'' aria-hidden=''true''></i>', 'f'),
(751, 'plane', '<i class=''fa fa-plane'' aria-hidden=''true''></i>', 'f'),
(752, 'rocket', '<i class=''fa fa-rocket'' aria-hidden=''true''></i>', 'f'),
(753, 'ship', '<i class=''fa fa-ship'' aria-hidden=''true''></i>', 'f'),
(754, 'space-shuttle', '<i class=''fa fa-space-shuttle'' aria-hidden=''true''></i>', 'f'),
(755, 'subway', '<i class=''fa fa-subway'' aria-hidden=''true''></i>', 'f'),
(756, 'taxi', '<i class=''fa fa-taxi'' aria-hidden=''true''></i>', 'f'),
(757, 'train', '<i class=''fa fa-train'' aria-hidden=''true''></i>', 'f'),
(758, 'truck', '<i class=''fa fa-truck'' aria-hidden=''true''></i>', 'f'),
(759, 'wheelchair', '<i class=''fa fa-wheelchair'' aria-hidden=''true''></i>', 'f'),
(760, 'wheelchair-alt', '<i class=''fa fa-wheelchair-alt'' aria-hidden=''true''></i>', 'f'),
(761, 'genderless', '<i class=''fa fa-genderless'' aria-hidden=''true''></i>', 'f'),
(762, 'intersex <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-intersex'' aria-hidden=''true''></i>', 'f'),
(763, 'mars', '<i class=''fa fa-mars'' aria-hidden=''true''></i>', 'f'),
(764, 'mars-double', '<i class=''fa fa-mars-double'' aria-hidden=''true''></i>', 'f'),
(765, 'mars-stroke', '<i class=''fa fa-mars-stroke'' aria-hidden=''true''></i>', 'f'),
(766, 'mars-stroke-h', '<i class=''fa fa-mars-stroke-h'' aria-hidden=''true''></i>', 'f'),
(767, 'mars-stroke-v', '<i class=''fa fa-mars-stroke-v'' aria-hidden=''true''></i>', 'f'),
(768, 'mercury', '<i class=''fa fa-mercury'' aria-hidden=''true''></i>', 'f'),
(769, 'neuter', '<i class=''fa fa-neuter'' aria-hidden=''true''></i>', 'f'),
(770, 'transgender', '<i class=''fa fa-transgender'' aria-hidden=''true''></i>', 'f'),
(771, 'transgender-alt', '<i class=''fa fa-transgender-alt'' aria-hidden=''true''></i>', 'f'),
(772, 'venus', '<i class=''fa fa-venus'' aria-hidden=''true''></i>', 'f'),
(773, 'venus-double', '<i class=''fa fa-venus-double'' aria-hidden=''true''></i>', 'f'),
(774, 'venus-mars', '<i class=''fa fa-venus-mars'' aria-hidden=''true''></i>', 'f'),
(775, 'file', '<i class=''fa fa-file'' aria-hidden=''true''></i>', 'f'),
(776, 'file-archive-o', '<i class=''fa fa-file-archive-o'' aria-hidden=''true''></i>', 'f'),
(777, 'file-audio-o', '<i class=''fa fa-file-audio-o'' aria-hidden=''true''></i>', 'f'),
(778, 'file-code-o', '<i class=''fa fa-file-code-o'' aria-hidden=''true''></i>', 'f'),
(779, 'file-excel-o', '<i class=''fa fa-file-excel-o'' aria-hidden=''true''></i>', 'f'),
(780, 'file-image-o', '<i class=''fa fa-file-image-o'' aria-hidden=''true''></i>', 'f'),
(781, 'file-movie-o <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-file-movie-o'' aria-hidden=''true''></i>', 'f'),
(782, 'file-o', '<i class=''fa fa-file-o'' aria-hidden=''true''></i>', 'f'),
(783, 'file-pdf-o', '<i class=''fa fa-file-pdf-o'' aria-hidden=''true''></i>', 'f'),
(784, 'file-photo-o <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-file-photo-o'' aria-hidden=''true''></i>', 'f'),
(785, 'file-picture-o <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-file-picture-o'' aria-hidden=''true''></i>', 'f'),
(786, 'file-powerpoint-o', '<i class=''fa fa-file-powerpoint-o'' aria-hidden=''true''></i>', 'f'),
(787, 'file-sound-o <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-file-sound-o'' aria-hidden=''true''></i>', 'f'),
(788, 'file-text', '<i class=''fa fa-file-text'' aria-hidden=''true''></i>', 'f'),
(789, 'file-text-o', '<i class=''fa fa-file-text-o'' aria-hidden=''true''></i>', 'f'),
(790, 'file-video-o', '<i class=''fa fa-file-video-o'' aria-hidden=''true''></i>', 'f'),
(791, 'file-word-o', '<i class=''fa fa-file-word-o'' aria-hidden=''true''></i>', 'f'),
(792, 'file-zip-o <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-file-zip-o'' aria-hidden=''true''></i>', 'f'),
(793, 'circle-o-notch', '<i class=''fa fa-circle-o-notch'' aria-hidden=''true''></i>', 'f'),
(794, 'cog', '<i class=''fa fa-cog'' aria-hidden=''true''></i>', 'f'),
(795, 'gear <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-gear'' aria-hidden=''true''></i>', 'f'),
(796, 'refresh', '<i class=''fa fa-refresh'' aria-hidden=''true''></i>', 'f'),
(797, 'spinner', '<i class=''fa fa-spinner'' aria-hidden=''true''></i>', 'f'),
(798, 'check-square', '<i class=''fa fa-check-square'' aria-hidden=''true''></i>', 'f'),
(799, 'check-square-o', '<i class=''fa fa-check-square-o'' aria-hidden=''true''></i>', 'f'),
(800, 'circle', '<i class=''fa fa-circle'' aria-hidden=''true''></i>', 'f'),
(801, 'circle-o', '<i class=''fa fa-circle-o'' aria-hidden=''true''></i>', 'f'),
(802, 'dot-circle-o', '<i class=''fa fa-dot-circle-o'' aria-hidden=''true''></i>', 'f'),
(803, 'minus-square', '<i class=''fa fa-minus-square'' aria-hidden=''true''></i>', 'f'),
(804, 'minus-square-o', '<i class=''fa fa-minus-square-o'' aria-hidden=''true''></i>', 'f'),
(805, 'plus-square', '<i class=''fa fa-plus-square'' aria-hidden=''true''></i>', 'f'),
(806, 'plus-square-o', '<i class=''fa fa-plus-square-o'' aria-hidden=''true''></i>', 'f'),
(807, 'square', '<i class=''fa fa-square'' aria-hidden=''true''></i>', 'f'),
(808, 'square-o', '<i class=''fa fa-square-o'' aria-hidden=''true''></i>', 'f'),
(809, 'cc-amex', '<i class=''fa fa-cc-amex'' aria-hidden=''true''></i>', 'f'),
(810, 'cc-diners-club', '<i class=''fa fa-cc-diners-club'' aria-hidden=''true''></i>', 'f'),
(811, 'cc-discover', '<i class=''fa fa-cc-discover'' aria-hidden=''true''></i>', 'f'),
(812, 'cc-jcb', '<i class=''fa fa-cc-jcb'' aria-hidden=''true''></i>', 'f'),
(813, 'cc-mastercard', '<i class=''fa fa-cc-mastercard'' aria-hidden=''true''></i>', 'f'),
(814, 'cc-paypal', '<i class=''fa fa-cc-paypal'' aria-hidden=''true''></i>', 'f'),
(815, 'cc-stripe', '<i class=''fa fa-cc-stripe'' aria-hidden=''true''></i>', 'f'),
(816, 'cc-visa', '<i class=''fa fa-cc-visa'' aria-hidden=''true''></i>', 'f'),
(817, 'credit-card', '<i class=''fa fa-credit-card'' aria-hidden=''true''></i>', 'f'),
(818, 'credit-card-alt', '<i class=''fa fa-credit-card-alt'' aria-hidden=''true''></i>', 'f'),
(819, 'google-wallet', '<i class=''fa fa-google-wallet'' aria-hidden=''true''></i>', 'f'),
(820, 'paypal', '<i class=''fa fa-paypal'' aria-hidden=''true''></i>', 'f'),
(821, 'area-chart', '<i class=''fa fa-area-chart'' aria-hidden=''true''></i>', 'f'),
(822, 'bar-chart', '<i class=''fa fa-bar-chart'' aria-hidden=''true''></i>', 'f'),
(823, 'bar-chart-o <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-bar-chart-o'' aria-hidden=''true''></i>', 'f'),
(824, 'line-chart', '<i class=''fa fa-line-chart'' aria-hidden=''true''></i>', 'f'),
(825, 'pie-chart', '<i class=''fa fa-pie-chart'' aria-hidden=''true''></i>', 'f'),
(826, 'bitcoin <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-bitcoin'' aria-hidden=''true''></i>', 'f'),
(827, 'btc', '<i class=''fa fa-btc'' aria-hidden=''true''></i>', 'f'),
(828, 'cny <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-cny'' aria-hidden=''true''></i>', 'f'),
(829, 'dollar <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-dollar'' aria-hidden=''true''></i>', 'f'),
(830, 'eur', '<i class=''fa fa-eur'' aria-hidden=''true''></i>', 'f'),
(831, 'euro <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-euro'' aria-hidden=''true''></i>', 'f'),
(832, 'gbp', '<i class=''fa fa-gbp'' aria-hidden=''true''></i>', 'f'),
(833, 'gg', '<i class=''fa fa-gg'' aria-hidden=''true''></i>', 'f'),
(834, 'gg-circle', '<i class=''fa fa-gg-circle'' aria-hidden=''true''></i>', 'f'),
(835, 'ils', '<i class=''fa fa-ils'' aria-hidden=''true''></i>', 'f'),
(836, 'inr', '<i class=''fa fa-inr'' aria-hidden=''true''></i>', 'f'),
(837, 'jpy', '<i class=''fa fa-jpy'' aria-hidden=''true''></i>', 'f'),
(838, 'krw', '<i class=''fa fa-krw'' aria-hidden=''true''></i>', 'f'),
(839, 'money', '<i class=''fa fa-money'' aria-hidden=''true''></i>', 'f'),
(840, 'rmb <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-rmb'' aria-hidden=''true''></i>', 'f'),
(841, 'rouble <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-rouble'' aria-hidden=''true''></i>', 'f'),
(842, 'rub', '<i class=''fa fa-rub'' aria-hidden=''true''></i>', 'f'),
(843, 'ruble <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-ruble'' aria-hidden=''true''></i>', 'f'),
(844, 'rupee <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-rupee'' aria-hidden=''true''></i>', 'f'),
(845, 'shekel <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-shekel'' aria-hidden=''true''></i>', 'f'),
(846, 'sheqel <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-sheqel'' aria-hidden=''true''></i>', 'f'),
(847, 'try', '<i class=''fa fa-try'' aria-hidden=''true''></i>', 'f'),
(848, 'turkish-lira <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-turkish-lira'' aria-hidden=''true''></i>', 'f'),
(849, 'usd', '<i class=''fa fa-usd'' aria-hidden=''true''></i>', 'f'),
(850, 'viacoin', '<i class=''fa fa-viacoin'' aria-hidden=''true''></i>', 'f'),
(851, 'won <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-won'' aria-hidden=''true''></i>', 'f'),
(852, 'yen <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-yen'' aria-hidden=''true''></i>', 'f'),
(853, 'align-center', '<i class=''fa fa-align-center'' aria-hidden=''true''></i>', 'f'),
(854, 'align-justify', '<i class=''fa fa-align-justify'' aria-hidden=''true''></i>', 'f'),
(855, 'align-left', '<i class=''fa fa-align-left'' aria-hidden=''true''></i>', 'f'),
(856, 'align-right', '<i class=''fa fa-align-right'' aria-hidden=''true''></i>', 'f'),
(857, 'bold', '<i class=''fa fa-bold'' aria-hidden=''true''></i>', 'f'),
(858, 'chain <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-chain'' aria-hidden=''true''></i>', 'f'),
(859, 'chain-broken', '<i class=''fa fa-chain-broken'' aria-hidden=''true''></i>', 'f'),
(860, 'clipboard', '<i class=''fa fa-clipboard'' aria-hidden=''true''></i>', 'f'),
(861, 'columns', '<i class=''fa fa-columns'' aria-hidden=''true''></i>', 'f'),
(862, 'copy <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-copy'' aria-hidden=''true''></i>', 'f'),
(863, 'cut <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-cut'' aria-hidden=''true''></i>', 'f'),
(864, 'dedent <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-dedent'' aria-hidden=''true''></i>', 'f'),
(865, 'eraser', '<i class=''fa fa-eraser'' aria-hidden=''true''></i>', 'f'),
(866, 'file', '<i class=''fa fa-file'' aria-hidden=''true''></i>', 'f'),
(867, 'file-o', '<i class=''fa fa-file-o'' aria-hidden=''true''></i>', 'f'),
(868, 'file-text', '<i class=''fa fa-file-text'' aria-hidden=''true''></i>', 'f'),
(869, 'file-text-o', '<i class=''fa fa-file-text-o'' aria-hidden=''true''></i>', 'f'),
(870, 'files-o', '<i class=''fa fa-files-o'' aria-hidden=''true''></i>', 'f'),
(871, 'floppy-o', '<i class=''fa fa-floppy-o'' aria-hidden=''true''></i>', 'f'),
(872, 'font', '<i class=''fa fa-font'' aria-hidden=''true''></i>', 'f'),
(873, 'header', '<i class=''fa fa-header'' aria-hidden=''true''></i>', 'f'),
(874, 'indent', '<i class=''fa fa-indent'' aria-hidden=''true''></i>', 'f'),
(875, 'italic', '<i class=''fa fa-italic'' aria-hidden=''true''></i>', 'f'),
(876, 'link', '<i class=''fa fa-link'' aria-hidden=''true''></i>', 'f'),
(877, 'list', '<i class=''fa fa-list'' aria-hidden=''true''></i>', 'f'),
(878, 'list-alt', '<i class=''fa fa-list-alt'' aria-hidden=''true''></i>', 'f'),
(879, 'list-ol', '<i class=''fa fa-list-ol'' aria-hidden=''true''></i>', 'f'),
(880, 'list-ul', '<i class=''fa fa-list-ul'' aria-hidden=''true''></i>', 'f'),
(881, 'outdent', '<i class=''fa fa-outdent'' aria-hidden=''true''></i>', 'f'),
(882, 'paperclip', '<i class=''fa fa-paperclip'' aria-hidden=''true''></i>', 'f'),
(883, 'paragraph', '<i class=''fa fa-paragraph'' aria-hidden=''true''></i>', 'f'),
(884, 'paste <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-paste'' aria-hidden=''true''></i>', 'f'),
(885, 'repeat', '<i class=''fa fa-repeat'' aria-hidden=''true''></i>', 'f'),
(886, 'rotate-left <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-rotate-left'' aria-hidden=''true''></i>', 'f'),
(887, 'rotate-right <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-rotate-right'' aria-hidden=''true''></i>', 'f'),
(888, 'save <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-save'' aria-hidden=''true''></i>', 'f'),
(889, 'scissors', '<i class=''fa fa-scissors'' aria-hidden=''true''></i>', 'f'),
(890, 'strikethrough', '<i class=''fa fa-strikethrough'' aria-hidden=''true''></i>', 'f'),
(891, 'subscript', '<i class=''fa fa-subscript'' aria-hidden=''true''></i>', 'f'),
(892, 'superscript', '<i class=''fa fa-superscript'' aria-hidden=''true''></i>', 'f'),
(893, 'table', '<i class=''fa fa-table'' aria-hidden=''true''></i>', 'f'),
(894, 'text-height', '<i class=''fa fa-text-height'' aria-hidden=''true''></i>', 'f'),
(895, 'text-width', '<i class=''fa fa-text-width'' aria-hidden=''true''></i>', 'f'),
(896, 'th', '<i class=''fa fa-th'' aria-hidden=''true''></i>', 'f'),
(897, 'th-large', '<i class=''fa fa-th-large'' aria-hidden=''true''></i>', 'f'),
(898, 'th-list', '<i class=''fa fa-th-list'' aria-hidden=''true''></i>', 'f'),
(899, 'underline', '<i class=''fa fa-underline'' aria-hidden=''true''></i>', 'f'),
(900, 'undo', '<i class=''fa fa-undo'' aria-hidden=''true''></i>', 'f'),
(901, 'unlink <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-unlink'' aria-hidden=''true''></i>', 'f'),
(902, 'angle-double-down', '<i class=''fa fa-angle-double-down'' aria-hidden=''true''></i>', 'f'),
(903, 'angle-double-left', '<i class=''fa fa-angle-double-left'' aria-hidden=''true''></i>', 'f'),
(904, 'angle-double-right', '<i class=''fa fa-angle-double-right'' aria-hidden=''true''></i>', 'f'),
(905, 'angle-double-up', '<i class=''fa fa-angle-double-up'' aria-hidden=''true''></i>', 'f'),
(906, 'angle-down', '<i class=''fa fa-angle-down'' aria-hidden=''true''></i>', 'f'),
(907, 'angle-left', '<i class=''fa fa-angle-left'' aria-hidden=''true''></i>', 'f'),
(908, 'angle-right', '<i class=''fa fa-angle-right'' aria-hidden=''true''></i>', 'f'),
(909, 'angle-up', '<i class=''fa fa-angle-up'' aria-hidden=''true''></i>', 'f'),
(910, 'arrow-circle-down', '<i class=''fa fa-arrow-circle-down'' aria-hidden=''true''></i>', 'f'),
(911, 'arrow-circle-left', '<i class=''fa fa-arrow-circle-left'' aria-hidden=''true''></i>', 'f'),
(912, 'arrow-circle-o-down', '<i class=''fa fa-arrow-circle-o-down'' aria-hidden=''true''></i>', 'f'),
(913, 'arrow-circle-o-left', '<i class=''fa fa-arrow-circle-o-left'' aria-hidden=''true''></i>', 'f'),
(914, 'arrow-circle-o-right', '<i class=''fa fa-arrow-circle-o-right'' aria-hidden=''true''></i>', 'f'),
(915, 'arrow-circle-o-up', '<i class=''fa fa-arrow-circle-o-up'' aria-hidden=''true''></i>', 'f'),
(916, 'arrow-circle-right', '<i class=''fa fa-arrow-circle-right'' aria-hidden=''true''></i>', 'f'),
(917, 'arrow-circle-up', '<i class=''fa fa-arrow-circle-up'' aria-hidden=''true''></i>', 'f'),
(918, 'arrow-down', '<i class=''fa fa-arrow-down'' aria-hidden=''true''></i>', 'f'),
(919, 'arrow-left', '<i class=''fa fa-arrow-left'' aria-hidden=''true''></i>', 'f'),
(920, 'arrow-right', '<i class=''fa fa-arrow-right'' aria-hidden=''true''></i>', 'f'),
(921, 'arrow-up', '<i class=''fa fa-arrow-up'' aria-hidden=''true''></i>', 'f'),
(922, 'arrows', '<i class=''fa fa-arrows'' aria-hidden=''true''></i>', 'f'),
(923, 'arrows-alt', '<i class=''fa fa-arrows-alt'' aria-hidden=''true''></i>', 'f'),
(924, 'arrows-h', '<i class=''fa fa-arrows-h'' aria-hidden=''true''></i>', 'f'),
(925, 'arrows-v', '<i class=''fa fa-arrows-v'' aria-hidden=''true''></i>', 'f'),
(926, 'caret-down', '<i class=''fa fa-caret-down'' aria-hidden=''true''></i>', 'f'),
(927, 'caret-left', '<i class=''fa fa-caret-left'' aria-hidden=''true''></i>', 'f'),
(928, 'caret-right', '<i class=''fa fa-caret-right'' aria-hidden=''true''></i>', 'f'),
(929, 'caret-square-o-down', '<i class=''fa fa-caret-square-o-down'' aria-hidden=''true''></i>', 'f'),
(930, 'caret-square-o-left', '<i class=''fa fa-caret-square-o-left'' aria-hidden=''true''></i>', 'f'),
(931, 'caret-square-o-right', '<i class=''fa fa-caret-square-o-right'' aria-hidden=''true''></i>', 'f'),
(932, 'caret-square-o-up', '<i class=''fa fa-caret-square-o-up'' aria-hidden=''true''></i>', 'f'),
(933, 'caret-up', '<i class=''fa fa-caret-up'' aria-hidden=''true''></i>', 'f'),
(934, 'chevron-circle-down', '<i class=''fa fa-chevron-circle-down'' aria-hidden=''true''></i>', 'f'),
(935, 'chevron-circle-left', '<i class=''fa fa-chevron-circle-left'' aria-hidden=''true''></i>', 'f'),
(936, 'chevron-circle-right', '<i class=''fa fa-chevron-circle-right'' aria-hidden=''true''></i>', 'f'),
(937, 'chevron-circle-up', '<i class=''fa fa-chevron-circle-up'' aria-hidden=''true''></i>', 'f'),
(938, 'chevron-down', '<i class=''fa fa-chevron-down'' aria-hidden=''true''></i>', 'f'),
(939, 'chevron-left', '<i class=''fa fa-chevron-left'' aria-hidden=''true''></i>', 'f'),
(940, 'chevron-right', '<i class=''fa fa-chevron-right'' aria-hidden=''true''></i>', 'f'),
(941, 'chevron-up', '<i class=''fa fa-chevron-up'' aria-hidden=''true''></i>', 'f'),
(942, 'exchange', '<i class=''fa fa-exchange'' aria-hidden=''true''></i>', 'f'),
(943, 'hand-o-down', '<i class=''fa fa-hand-o-down'' aria-hidden=''true''></i>', 'f'),
(944, 'hand-o-left', '<i class=''fa fa-hand-o-left'' aria-hidden=''true''></i>', 'f'),
(945, 'hand-o-right', '<i class=''fa fa-hand-o-right'' aria-hidden=''true''></i>', 'f'),
(946, 'hand-o-up', '<i class=''fa fa-hand-o-up'' aria-hidden=''true''></i>', 'f'),
(947, 'long-arrow-down', '<i class=''fa fa-long-arrow-down'' aria-hidden=''true''></i>', 'f'),
(948, 'long-arrow-left', '<i class=''fa fa-long-arrow-left'' aria-hidden=''true''></i>', 'f'),
(949, 'long-arrow-right', '<i class=''fa fa-long-arrow-right'' aria-hidden=''true''></i>', 'f'),
(950, 'long-arrow-up', '<i class=''fa fa-long-arrow-up'' aria-hidden=''true''></i>', 'f'),
(951, 'toggle-down <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-toggle-down'' aria-hidden=''true''></i>', 'f'),
(952, 'toggle-left <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-toggle-left'' aria-hidden=''true''></i>', 'f'),
(953, 'toggle-right <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-toggle-right'' aria-hidden=''true''></i>', 'f'),
(954, 'toggle-up <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-toggle-up'' aria-hidden=''true''></i>', 'f'),
(955, 'arrows-alt', '<i class=''fa fa-arrows-alt'' aria-hidden=''true''></i>', 'f'),
(956, 'backward', '<i class=''fa fa-backward'' aria-hidden=''true''></i>', 'f'),
(957, 'compress', '<i class=''fa fa-compress'' aria-hidden=''true''></i>', 'f'),
(958, 'eject', '<i class=''fa fa-eject'' aria-hidden=''true''></i>', 'f'),
(959, 'expand', '<i class=''fa fa-expand'' aria-hidden=''true''></i>', 'f'),
(960, 'fast-backward', '<i class=''fa fa-fast-backward'' aria-hidden=''true''></i>', 'f'),
(961, 'fast-forward', '<i class=''fa fa-fast-forward'' aria-hidden=''true''></i>', 'f'),
(962, 'forward', '<i class=''fa fa-forward'' aria-hidden=''true''></i>', 'f'),
(963, 'pause', '<i class=''fa fa-pause'' aria-hidden=''true''></i>', 'f'),
(964, 'pause-circle', '<i class=''fa fa-pause-circle'' aria-hidden=''true''></i>', 'f'),
(965, 'pause-circle-o', '<i class=''fa fa-pause-circle-o'' aria-hidden=''true''></i>', 'f'),
(966, 'play', '<i class=''fa fa-play'' aria-hidden=''true''></i>', 'f'),
(967, 'play-circle', '<i class=''fa fa-play-circle'' aria-hidden=''true''></i>', 'f'),
(968, 'play-circle-o', '<i class=''fa fa-play-circle-o'' aria-hidden=''true''></i>', 'f'),
(969, 'random', '<i class=''fa fa-random'' aria-hidden=''true''></i>', 'f'),
(970, 'step-backward', '<i class=''fa fa-step-backward'' aria-hidden=''true''></i>', 'f'),
(971, 'step-forward', '<i class=''fa fa-step-forward'' aria-hidden=''true''></i>', 'f'),
(972, 'stop', '<i class=''fa fa-stop'' aria-hidden=''true''></i>', 'f'),
(973, 'stop-circle', '<i class=''fa fa-stop-circle'' aria-hidden=''true''></i>', 'f'),
(974, 'stop-circle-o', '<i class=''fa fa-stop-circle-o'' aria-hidden=''true''></i>', 'f'),
(975, 'youtube-play', '<i class=''fa fa-youtube-play'' aria-hidden=''true''></i>', 'f'),
(976, '500px', '<i class=''fa fa-500px'' aria-hidden=''true''></i>', 'f'),
(977, 'adn', '<i class=''fa fa-adn'' aria-hidden=''true''></i>', 'f'),
(978, 'amazon', '<i class=''fa fa-amazon'' aria-hidden=''true''></i>', 'f'),
(979, 'android', '<i class=''fa fa-android'' aria-hidden=''true''></i>', 'f'),
(980, 'angellist', '<i class=''fa fa-angellist'' aria-hidden=''true''></i>', 'f'),
(981, 'apple', '<i class=''fa fa-apple'' aria-hidden=''true''></i>', 'f'),
(982, 'bandcamp', '<i class=''fa fa-bandcamp'' aria-hidden=''true''></i>', 'f'),
(983, 'behance', '<i class=''fa fa-behance'' aria-hidden=''true''></i>', 'f'),
(984, 'behance-square', '<i class=''fa fa-behance-square'' aria-hidden=''true''></i>', 'f'),
(985, 'bitbucket', '<i class=''fa fa-bitbucket'' aria-hidden=''true''></i>', 'f'),
(986, 'bitbucket-square', '<i class=''fa fa-bitbucket-square'' aria-hidden=''true''></i>', 'f'),
(987, 'bitcoin <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-bitcoin'' aria-hidden=''true''></i>', 'f'),
(988, 'black-tie', '<i class=''fa fa-black-tie'' aria-hidden=''true''></i>', 'f'),
(989, 'bluetooth', '<i class=''fa fa-bluetooth'' aria-hidden=''true''></i>', 'f'),
(990, 'bluetooth-b', '<i class=''fa fa-bluetooth-b'' aria-hidden=''true''></i>', 'f'),
(991, 'btc', '<i class=''fa fa-btc'' aria-hidden=''true''></i>', 'f'),
(992, 'buysellads', '<i class=''fa fa-buysellads'' aria-hidden=''true''></i>', 'f'),
(993, 'cc-amex', '<i class=''fa fa-cc-amex'' aria-hidden=''true''></i>', 'f'),
(994, 'cc-diners-club', '<i class=''fa fa-cc-diners-club'' aria-hidden=''true''></i>', 'f'),
(995, 'cc-discover', '<i class=''fa fa-cc-discover'' aria-hidden=''true''></i>', 'f'),
(996, 'cc-jcb', '<i class=''fa fa-cc-jcb'' aria-hidden=''true''></i>', 'f'),
(997, 'cc-mastercard', '<i class=''fa fa-cc-mastercard'' aria-hidden=''true''></i>', 'f'),
(998, 'cc-paypal', '<i class=''fa fa-cc-paypal'' aria-hidden=''true''></i>', 'f'),
(999, 'cc-stripe', '<i class=''fa fa-cc-stripe'' aria-hidden=''true''></i>', 'f'),
(1000, 'cc-visa', '<i class=''fa fa-cc-visa'' aria-hidden=''true''></i>', 'f'),
(1001, 'chrome', '<i class=''fa fa-chrome'' aria-hidden=''true''></i>', 'f'),
(1002, 'codepen', '<i class=''fa fa-codepen'' aria-hidden=''true''></i>', 'f'),
(1003, 'codiepie', '<i class=''fa fa-codiepie'' aria-hidden=''true''></i>', 'f'),
(1004, 'connectdevelop', '<i class=''fa fa-connectdevelop'' aria-hidden=''true''></i>', 'f'),
(1005, 'contao', '<i class=''fa fa-contao'' aria-hidden=''true''></i>', 'f'),
(1006, 'css3', '<i class=''fa fa-css3'' aria-hidden=''true''></i>', 'f'),
(1007, 'dashcube', '<i class=''fa fa-dashcube'' aria-hidden=''true''></i>', 'f'),
(1008, 'delicious', '<i class=''fa fa-delicious'' aria-hidden=''true''></i>', 'f'),
(1009, 'deviantart', '<i class=''fa fa-deviantart'' aria-hidden=''true''></i>', 'f'),
(1010, 'digg', '<i class=''fa fa-digg'' aria-hidden=''true''></i>', 'f'),
(1011, 'dribbble', '<i class=''fa fa-dribbble'' aria-hidden=''true''></i>', 'f'),
(1012, 'dropbox', '<i class=''fa fa-dropbox'' aria-hidden=''true''></i>', 'f'),
(1013, 'drupal', '<i class=''fa fa-drupal'' aria-hidden=''true''></i>', 'f'),
(1014, 'edge', '<i class=''fa fa-edge'' aria-hidden=''true''></i>', 'f'),
(1015, 'eercast', '<i class=''fa fa-eercast'' aria-hidden=''true''></i>', 'f'),
(1016, 'empire', '<i class=''fa fa-empire'' aria-hidden=''true''></i>', 'f'),
(1017, 'envira', '<i class=''fa fa-envira'' aria-hidden=''true''></i>', 'f'),
(1018, 'etsy', '<i class=''fa fa-etsy'' aria-hidden=''true''></i>', 'f'),
(1019, 'expeditedssl', '<i class=''fa fa-expeditedssl'' aria-hidden=''true''></i>', 'f'),
(1020, 'fa <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-fa'' aria-hidden=''true''></i>', 'f'),
(1021, 'facebook', '<i class=''fa fa-facebook'' aria-hidden=''true''></i>', 'f'),
(1022, 'facebook-f <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-facebook-f'' aria-hidden=''true''></i>', 'f'),
(1023, 'facebook-official', '<i class=''fa fa-facebook-official'' aria-hidden=''true''></i>', 'f'),
(1024, 'facebook-square', '<i class=''fa fa-facebook-square'' aria-hidden=''true''></i>', 'f'),
(1025, 'firefox', '<i class=''fa fa-firefox'' aria-hidden=''true''></i>', 'f'),
(1026, 'first-order', '<i class=''fa fa-first-order'' aria-hidden=''true''></i>', 'f'),
(1027, 'flickr', '<i class=''fa fa-flickr'' aria-hidden=''true''></i>', 'f'),
(1028, 'font-awesome', '<i class=''fa fa-font-awesome'' aria-hidden=''true''></i>', 'f'),
(1029, 'fonticons', '<i class=''fa fa-fonticons'' aria-hidden=''true''></i>', 'f'),
(1030, 'fort-awesome', '<i class=''fa fa-fort-awesome'' aria-hidden=''true''></i>', 'f'),
(1031, 'forumbee', '<i class=''fa fa-forumbee'' aria-hidden=''true''></i>', 'f'),
(1032, 'foursquare', '<i class=''fa fa-foursquare'' aria-hidden=''true''></i>', 'f'),
(1033, 'free-code-camp', '<i class=''fa fa-free-code-camp'' aria-hidden=''true''></i>', 'f'),
(1034, 'ge <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-ge'' aria-hidden=''true''></i>', 'f'),
(1035, 'get-pocket', '<i class=''fa fa-get-pocket'' aria-hidden=''true''></i>', 'f'),
(1036, 'gg', '<i class=''fa fa-gg'' aria-hidden=''true''></i>', 'f'),
(1037, 'gg-circle', '<i class=''fa fa-gg-circle'' aria-hidden=''true''></i>', 'f'),
(1038, 'git', '<i class=''fa fa-git'' aria-hidden=''true''></i>', 'f'),
(1039, 'git-square', '<i class=''fa fa-git-square'' aria-hidden=''true''></i>', 'f'),
(1040, 'github', '<i class=''fa fa-github'' aria-hidden=''true''></i>', 'f'),
(1041, 'github-alt', '<i class=''fa fa-github-alt'' aria-hidden=''true''></i>', 'f'),
(1042, 'github-square', '<i class=''fa fa-github-square'' aria-hidden=''true''></i>', 'f'),
(1043, 'gitlab', '<i class=''fa fa-gitlab'' aria-hidden=''true''></i>', 'f'),
(1044, 'gittip <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-gittip'' aria-hidden=''true''></i>', 'f'),
(1045, 'glide', '<i class=''fa fa-glide'' aria-hidden=''true''></i>', 'f'),
(1046, 'glide-g', '<i class=''fa fa-glide-g'' aria-hidden=''true''></i>', 'f'),
(1047, 'google', '<i class=''fa fa-google'' aria-hidden=''true''></i>', 'f'),
(1048, 'google-plus', '<i class=''fa fa-google-plus'' aria-hidden=''true''></i>', 'f'),
(1049, 'google-plus-circle <span class=''text-muted''>(alias)</', '<i class=''fa fa-google-plus-circle'' aria-hidden=''true''></i>', 'f'),
(1050, 'google-plus-official', '<i class=''fa fa-google-plus-official'' aria-hidden=''true''></i>', 'f'),
(1051, 'google-plus-square', '<i class=''fa fa-google-plus-square'' aria-hidden=''true''></i>', 'f'),
(1052, 'google-wallet', '<i class=''fa fa-google-wallet'' aria-hidden=''true''></i>', 'f'),
(1053, 'gratipay', '<i class=''fa fa-gratipay'' aria-hidden=''true''></i>', 'f'),
(1054, 'grav', '<i class=''fa fa-grav'' aria-hidden=''true''></i>', 'f'),
(1055, 'hacker-news', '<i class=''fa fa-hacker-news'' aria-hidden=''true''></i>', 'f'),
(1056, 'houzz', '<i class=''fa fa-houzz'' aria-hidden=''true''></i>', 'f'),
(1057, 'html5', '<i class=''fa fa-html5'' aria-hidden=''true''></i>', 'f'),
(1058, 'imdb', '<i class=''fa fa-imdb'' aria-hidden=''true''></i>', 'f'),
(1059, 'instagram', '<i class=''fa fa-instagram'' aria-hidden=''true''></i>', 'f'),
(1060, 'internet-explorer', '<i class=''fa fa-internet-explorer'' aria-hidden=''true''></i>', 'f'),
(1061, 'ioxhost', '<i class=''fa fa-ioxhost'' aria-hidden=''true''></i>', 'f'),
(1062, 'joomla', '<i class=''fa fa-joomla'' aria-hidden=''true''></i>', 'f'),
(1063, 'jsfiddle', '<i class=''fa fa-jsfiddle'' aria-hidden=''true''></i>', 'f'),
(1064, 'lastfm', '<i class=''fa fa-lastfm'' aria-hidden=''true''></i>', 'f'),
(1065, 'lastfm-square', '<i class=''fa fa-lastfm-square'' aria-hidden=''true''></i>', 'f'),
(1066, 'leanpub', '<i class=''fa fa-leanpub'' aria-hidden=''true''></i>', 'f'),
(1067, 'linkedin', '<i class=''fa fa-linkedin'' aria-hidden=''true''></i>', 'f'),
(1068, 'linkedin-square', '<i class=''fa fa-linkedin-square'' aria-hidden=''true''></i>', 'f'),
(1069, 'linode', '<i class=''fa fa-linode'' aria-hidden=''true''></i>', 'f'),
(1070, 'linux', '<i class=''fa fa-linux'' aria-hidden=''true''></i>', 'f'),
(1071, 'maxcdn', '<i class=''fa fa-maxcdn'' aria-hidden=''true''></i>', 'f'),
(1072, 'meanpath', '<i class=''fa fa-meanpath'' aria-hidden=''true''></i>', 'f'),
(1073, 'medium', '<i class=''fa fa-medium'' aria-hidden=''true''></i>', 'f'),
(1074, 'meetup', '<i class=''fa fa-meetup'' aria-hidden=''true''></i>', 'f'),
(1075, 'mixcloud', '<i class=''fa fa-mixcloud'' aria-hidden=''true''></i>', 'f'),
(1076, 'modx', '<i class=''fa fa-modx'' aria-hidden=''true''></i>', 'f'),
(1077, 'odnoklassniki', '<i class=''fa fa-odnoklassniki'' aria-hidden=''true''></i>', 'f'),
(1078, 'odnoklassniki-square', '<i class=''fa fa-odnoklassniki-square'' aria-hidden=''true''></i>', 'f'),
(1079, 'opencart', '<i class=''fa fa-opencart'' aria-hidden=''true''></i>', 'f'),
(1080, 'openid', '<i class=''fa fa-openid'' aria-hidden=''true''></i>', 'f'),
(1081, 'opera', '<i class=''fa fa-opera'' aria-hidden=''true''></i>', 'f'),
(1082, 'optin-monster', '<i class=''fa fa-optin-monster'' aria-hidden=''true''></i>', 'f'),
(1083, 'pagelines', '<i class=''fa fa-pagelines'' aria-hidden=''true''></i>', 'f'),
(1084, 'paypal', '<i class=''fa fa-paypal'' aria-hidden=''true''></i>', 'f'),
(1085, 'pied-piper', '<i class=''fa fa-pied-piper'' aria-hidden=''true''></i>', 'f'),
(1086, 'pied-piper-alt', '<i class=''fa fa-pied-piper-alt'' aria-hidden=''true''></i>', 'f'),
(1087, 'pied-piper-pp', '<i class=''fa fa-pied-piper-pp'' aria-hidden=''true''></i>', 'f'),
(1088, 'pinterest', '<i class=''fa fa-pinterest'' aria-hidden=''true''></i>', 'f'),
(1089, 'pinterest-p', '<i class=''fa fa-pinterest-p'' aria-hidden=''true''></i>', 'f'),
(1090, 'pinterest-square', '<i class=''fa fa-pinterest-square'' aria-hidden=''true''></i>', 'f'),
(1091, 'product-hunt', '<i class=''fa fa-product-hunt'' aria-hidden=''true''></i>', 'f'),
(1092, 'qq', '<i class=''fa fa-qq'' aria-hidden=''true''></i>', 'f'),
(1093, 'quora', '<i class=''fa fa-quora'' aria-hidden=''true''></i>', 'f'),
(1094, 'ra <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-ra'' aria-hidden=''true''></i>', 'f'),
(1095, 'ravelry', '<i class=''fa fa-ravelry'' aria-hidden=''true''></i>', 'f'),
(1096, 'rebel', '<i class=''fa fa-rebel'' aria-hidden=''true''></i>', 'f'),
(1097, 'reddit', '<i class=''fa fa-reddit'' aria-hidden=''true''></i>', 'f'),
(1098, 'reddit-alien', '<i class=''fa fa-reddit-alien'' aria-hidden=''true''></i>', 'f'),
(1099, 'reddit-square', '<i class=''fa fa-reddit-square'' aria-hidden=''true''></i>', 'f'),
(1100, 'renren', '<i class=''fa fa-renren'' aria-hidden=''true''></i>', 'f'),
(1101, 'resistance <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-resistance'' aria-hidden=''true''></i>', 'f'),
(1102, 'safari', '<i class=''fa fa-safari'' aria-hidden=''true''></i>', 'f'),
(1103, 'scribd', '<i class=''fa fa-scribd'' aria-hidden=''true''></i>', 'f'),
(1104, 'sellsy', '<i class=''fa fa-sellsy'' aria-hidden=''true''></i>', 'f'),
(1105, 'share-alt', '<i class=''fa fa-share-alt'' aria-hidden=''true''></i>', 'f'),
(1106, 'share-alt-square', '<i class=''fa fa-share-alt-square'' aria-hidden=''true''></i>', 'f'),
(1107, 'shirtsinbulk', '<i class=''fa fa-shirtsinbulk'' aria-hidden=''true''></i>', 'f'),
(1108, 'simplybuilt', '<i class=''fa fa-simplybuilt'' aria-hidden=''true''></i>', 'f'),
(1109, 'skyatlas', '<i class=''fa fa-skyatlas'' aria-hidden=''true''></i>', 'f'),
(1110, 'skype', '<i class=''fa fa-skype'' aria-hidden=''true''></i>', 'f'),
(1111, 'slack', '<i class=''fa fa-slack'' aria-hidden=''true''></i>', 'f'),
(1112, 'slideshare', '<i class=''fa fa-slideshare'' aria-hidden=''true''></i>', 'f'),
(1113, 'snapchat', '<i class=''fa fa-snapchat'' aria-hidden=''true''></i>', 'f'),
(1114, 'snapchat-ghost', '<i class=''fa fa-snapchat-ghost'' aria-hidden=''true''></i>', 'f'),
(1115, 'snapchat-square', '<i class=''fa fa-snapchat-square'' aria-hidden=''true''></i>', 'f'),
(1116, 'soundcloud', '<i class=''fa fa-soundcloud'' aria-hidden=''true''></i>', 'f'),
(1117, 'spotify', '<i class=''fa fa-spotify'' aria-hidden=''true''></i>', 'f'),
(1118, 'stack-exchange', '<i class=''fa fa-stack-exchange'' aria-hidden=''true''></i>', 'f'),
(1119, 'stack-overflow', '<i class=''fa fa-stack-overflow'' aria-hidden=''true''></i>', 'f'),
(1120, 'steam', '<i class=''fa fa-steam'' aria-hidden=''true''></i>', 'f'),
(1121, 'steam-square', '<i class=''fa fa-steam-square'' aria-hidden=''true''></i>', 'f'),
(1122, 'stumbleupon', '<i class=''fa fa-stumbleupon'' aria-hidden=''true''></i>', 'f'),
(1123, 'stumbleupon-circle', '<i class=''fa fa-stumbleupon-circle'' aria-hidden=''true''></i>', 'f'),
(1124, 'superpowers', '<i class=''fa fa-superpowers'' aria-hidden=''true''></i>', 'f'),
(1125, 'telegram', '<i class=''fa fa-telegram'' aria-hidden=''true''></i>', 'f'),
(1126, 'tencent-weibo', '<i class=''fa fa-tencent-weibo'' aria-hidden=''true''></i>', 'f'),
(1127, 'themeisle', '<i class=''fa fa-themeisle'' aria-hidden=''true''></i>', 'f'),
(1128, 'trello', '<i class=''fa fa-trello'' aria-hidden=''true''></i>', 'f'),
(1129, 'tripadvisor', '<i class=''fa fa-tripadvisor'' aria-hidden=''true''></i>', 'f'),
(1130, 'tumblr', '<i class=''fa fa-tumblr'' aria-hidden=''true''></i>', 'f'),
(1131, 'tumblr-square', '<i class=''fa fa-tumblr-square'' aria-hidden=''true''></i>', 'f'),
(1132, 'twitch', '<i class=''fa fa-twitch'' aria-hidden=''true''></i>', 'f'),
(1133, 'twitter', '<i class=''fa fa-twitter'' aria-hidden=''true''></i>', 'f'),
(1134, 'twitter-square', '<i class=''fa fa-twitter-square'' aria-hidden=''true''></i>', 'f'),
(1135, 'usb', '<i class=''fa fa-usb'' aria-hidden=''true''></i>', 'f'),
(1136, 'viacoin', '<i class=''fa fa-viacoin'' aria-hidden=''true''></i>', 'f'),
(1137, 'viadeo', '<i class=''fa fa-viadeo'' aria-hidden=''true''></i>', 'f'),
(1138, 'viadeo-square', '<i class=''fa fa-viadeo-square'' aria-hidden=''true''></i>', 'f'),
(1139, 'vimeo', '<i class=''fa fa-vimeo'' aria-hidden=''true''></i>', 'f'),
(1140, 'vimeo-square', '<i class=''fa fa-vimeo-square'' aria-hidden=''true''></i>', 'f'),
(1141, 'vine', '<i class=''fa fa-vine'' aria-hidden=''true''></i>', 'f'),
(1142, 'vk', '<i class=''fa fa-vk'' aria-hidden=''true''></i>', 'f'),
(1143, 'wechat <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-wechat'' aria-hidden=''true''></i>', 'f'),
(1144, 'weibo', '<i class=''fa fa-weibo'' aria-hidden=''true''></i>', 'f'),
(1145, 'weixin', '<i class=''fa fa-weixin'' aria-hidden=''true''></i>', 'f'),
(1146, 'whatsapp', '<i class=''fa fa-whatsapp'' aria-hidden=''true''></i>', 'f'),
(1147, 'wikipedia-w', '<i class=''fa fa-wikipedia-w'' aria-hidden=''true''></i>', 'f'),
(1148, 'windows', '<i class=''fa fa-windows'' aria-hidden=''true''></i>', 'f'),
(1149, 'wordpress', '<i class=''fa fa-wordpress'' aria-hidden=''true''></i>', 'f'),
(1150, 'wpbeginner', '<i class=''fa fa-wpbeginner'' aria-hidden=''true''></i>', 'f'),
(1151, 'wpexplorer', '<i class=''fa fa-wpexplorer'' aria-hidden=''true''></i>', 'f'),
(1152, 'wpforms', '<i class=''fa fa-wpforms'' aria-hidden=''true''></i>', 'f'),
(1153, 'xing', '<i class=''fa fa-xing'' aria-hidden=''true''></i>', 'f'),
(1154, 'xing-square', '<i class=''fa fa-xing-square'' aria-hidden=''true''></i>', 'f'),
(1155, 'y-combinator', '<i class=''fa fa-y-combinator'' aria-hidden=''true''></i>', 'f'),
(1156, 'y-combinator-square <span class=''text-muted''>(alias)', '<i class=''fa fa-y-combinator-square'' aria-hidden=''true''></i>', 'f'),
(1157, 'yahoo', '<i class=''fa fa-yahoo'' aria-hidden=''true''></i>', 'f'),
(1158, 'yc <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-yc'' aria-hidden=''true''></i>', 'f'),
(1159, 'yc-square <span class=''text-muted''>(alias)</span>', '<i class=''fa fa-yc-square'' aria-hidden=''true''></i>', 'f'),
(1160, 'yelp', '<i class=''fa fa-yelp'' aria-hidden=''true''></i>', 'f'),
(1161, 'yoast', '<i class=''fa fa-yoast'' aria-hidden=''true''></i>', 'f'),
(1162, 'youtube', '<i class=''fa fa-youtube'' aria-hidden=''true''></i>', 'f'),
(1163, 'youtube-play', '<i class=''fa fa-youtube-play'' aria-hidden=''true''></i>', 'f'),
(1164, 'youtube-square', '<i class=''fa fa-youtube-square'' aria-hidden=''true''></i>', 'f'),
(1165, 'ambulance', '<i class=''fa fa-ambulance'' aria-hidden=''true''></i>', 'f'),
(1166, 'h-square', '<i class=''fa fa-h-square'' aria-hidden=''true''></i>', 'f');
INSERT INTO `icones` (`id_icones`, `descricao_icones`, `html_icones`, `tipo_icones`) VALUES
(1167, 'heart', '<i class=''fa fa-heart'' aria-hidden=''true''></i>', 'f'),
(1168, 'heart-o', '<i class=''fa fa-heart-o'' aria-hidden=''true''></i>', 'f'),
(1169, 'heartbeat', '<i class=''fa fa-heartbeat'' aria-hidden=''true''></i>', 'f'),
(1170, 'hospital-o', '<i class=''fa fa-hospital-o'' aria-hidden=''true''></i>', 'f'),
(1171, 'medkit', '<i class=''fa fa-medkit'' aria-hidden=''true''></i>', 'f'),
(1172, 'plus-square', '<i class=''fa fa-plus-square'' aria-hidden=''true''></i>', 'f'),
(1173, 'stethoscope', '<i class=''fa fa-stethoscope'' aria-hidden=''true''></i>', 'f'),
(1174, 'user-md', '<i class=''fa fa-user-md'' aria-hidden=''true''></i>', 'f'),
(1175, 'wheelchair', '<i class=''fa fa-wheelchair'' aria-hidden=''true''></i>', 'f'),
(1176, 'wheelchair-alt', '<i class=''fa fa-wheelchair-alt'' aria-hidden=''true''></i>', 'f');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_fundo`
--

CREATE TABLE `imagem_fundo` (
  `id_imagem_fundo` int(11) NOT NULL,
  `descricao_imagem_fundo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `imagem_fundo`
--

INSERT INTO `imagem_fundo` (`id_imagem_fundo`, `descricao_imagem_fundo`) VALUES
(1, 'fundo azul.jpg'),
(2, 'fundo.jpg'),
(3, 'fundo_musical.png'),
(4, 'fundo2.png'),
(5, 'biblioteca_backGroud.jpg'),
(6, 'biblioteca_backGroud2.jpg'),
(7, 'fundo_manchado.jpg'),
(8, 'fundo-slideshow-home.jpg'),
(9, 'LogoLg.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_icone`
--

CREATE TABLE `imagem_icone` (
  `id_imagem_icone` int(11) NOT NULL,
  `descricao_imagem_icone` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `imagem_icone`
--

INSERT INTO `imagem_icone` (`id_imagem_icone`, `descricao_imagem_icone`) VALUES
(2, 'teacher.ico'),
(3, 'lampada.gif'),
(4, 'clave_sol.png'),
(5, 'livro.png'),
(6, 'abastecimento_icon.png'),
(7, 'Logotipo.png'),
(8, 'icons8-Truck-48.png'),
(9, 'favicon2.png'),
(10, 'Logotipo.png'),
(11, 'ferramentas_administrativas.png'),
(12, 'Logo_cafe_pocos.png'),
(13, 'LogoSmForm.png'),
(14, 'LogotipoFinal.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_logo`
--

CREATE TABLE `imagem_logo` (
  `id_imagem_logo` int(11) NOT NULL,
  `descricao_imagem_logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `imagem_logo`
--

INSERT INTO `imagem_logo` (`id_imagem_logo`, `descricao_imagem_logo`) VALUES
(1, 'AMFiosLogoSm.png'),
(2, 'AMFiosLogoLg.png'),
(3, 'favicon2.png'),
(4, 'LogoBrothers.png'),
(5, 'ferramentas_administrativas.png'),
(6, 'LogoCafePocosSm.png'),
(7, 'LogoCafePocosLg.png'),
(8, 'LogoLg.png'),
(9, 'LogoSmForm.png'),
(10, 'LogotipoFinal.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `logica_negocio`
--

CREATE TABLE `logica_negocio` (
  `id_logica_negocio` int(11) NOT NULL,
  `projetos_id` int(11) NOT NULL,
  `tabela_logica_negocio` varchar(200) NOT NULL,
  `campos_logica_negocio` text NOT NULL,
  `campo_resultado_logica_negocio` varchar(200) NOT NULL,
  `formula_id` int(11) NOT NULL,
  `bool_ativo_logica_negocio` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `logica_negocio`
--

INSERT INTO `logica_negocio` (`id_logica_negocio`, `projetos_id`, `tabela_logica_negocio`, `campos_logica_negocio`, `campo_resultado_logica_negocio`, `formula_id`, `bool_ativo_logica_negocio`) VALUES
(1, 12, 'operacao_teste', 'valor_1_operacao_teste+valor_2_operacao_teste', 'resultado_operacao_teste', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo_cores_menu`
--

CREATE TABLE `modelo_cores_menu` (
  `id_modelo_cores_menu` int(11) NOT NULL,
  `descricao_modelo_cores_menu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `modelo_cores_menu`
--

INSERT INTO `modelo_cores_menu` (`id_modelo_cores_menu`, `descricao_modelo_cores_menu`) VALUES
(1, '3b4655'),
(2, '3b5546'),
(3, '463b55'),
(4, '2d3726'),
(5, '37262d'),
(6, '372d26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel_acesso`
--

CREATE TABLE `nivel_acesso` (
  `id_nivel_acesso` int(11) NOT NULL,
  `descricao_nivel_acesso` varchar(200) NOT NULL,
  `area_nivel_acesso` text NOT NULL,
  `data_atualizacao_nivel_acesso` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_nivel_acesso` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `nivel_acesso`
--

INSERT INTO `nivel_acesso` (`id_nivel_acesso`, `descricao_nivel_acesso`, `area_nivel_acesso`, `data_atualizacao_nivel_acesso`, `usuario_id`, `bool_ativo_nivel_acesso`) VALUES
(1, 'Nivel Administrador', 'formula+logica_negocio+tabela_padrao+upload+mapa+mov+pdf+usuario', '2018-01-31 14:51:46', 1, 1),
(2, 'Usuário Padrão', 'formula+logica_negocio+tabela_padrao+pdf+usuario', '2018-01-31 14:53:15', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projetos`
--

CREATE TABLE `projetos` (
  `id_projeto` int(11) NOT NULL,
  `nome` varchar(500) NOT NULL,
  `host` varchar(500) NOT NULL,
  `user` varchar(500) NOT NULL,
  `pws` varchar(500) NOT NULL,
  `bancoDados` varchar(500) NOT NULL,
  `versao` varchar(20) NOT NULL DEFAULT '1',
  `bool_ativo` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `projetos`
--

INSERT INTO `projetos` (`id_projeto`, `nome`, `host`, `user`, `pws`, `bancoDados`, `versao`, `bool_ativo`) VALUES
(5, 'AMFios_admim', 'localhost', 'root', '', 'amfios', '1', 1),
(6, 'Format', 'localhost', 'root', '', 'format', '1', 1),
(8, 'AMFios_admim2', 'localhost', 'root', '', 'amfios', '1', 1),
(9, 'admin', 'amfios.mysql.uhserver.com', 'cdisite', 'Teste@12', 'amfios', '1', 1),
(10, 'admin_site', 'localhost', 'root', '', 'site', '1', 1),
(11, 'admin_cafepocos', 'localhost', 'root', '', 'cafe_pocos', '1', 1),
(12, 'teste_apagar', 'localhost', 'root', '', 'vaila', '1.3.1.1', 1),
(13, 'admin_minas_system', 'localhost', 'root', '', 'minas_system', '1', 1),
(14, 'site_do_zero', 'localhost', 'root', '', 'site_do_zero', '1', 1),
(15, 'admin_cdi', 'localhost', 'root', '', 'cdi_web', '1.3.1.1', 1),
(16, 'gerador_cadastro', 'localhost', 'root', '', 'gerador', '1.3.1.1', 1),
(17, 'Jack', 'localhost', 'root', '', 'site_do_zero', '1', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatorios`
--

CREATE TABLE `relatorios` (
  `id_relatorios` int(11) NOT NULL,
  `descricao_relatorios` varchar(200) NOT NULL,
  `tabela_relatorios` varchar(200) NOT NULL,
  `colunas_relatorios` text NOT NULL,
  `colunas_estrangeiras_relatorios` text NOT NULL,
  `colunas_filtro_relatorios` text,
  `bool_filtro_ativo_relatorios` int(1) NOT NULL DEFAULT '1',
  `data_atualizacao_relatorios` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_emitir_relatorios` int(1) NOT NULL DEFAULT '0',
  `bool_ativo_relatorios` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `relatorios`
--

INSERT INTO `relatorios` (`id_relatorios`, `descricao_relatorios`, `tabela_relatorios`, `colunas_relatorios`, `colunas_estrangeiras_relatorios`, `colunas_filtro_relatorios`, `bool_filtro_ativo_relatorios`, `data_atualizacao_relatorios`, `usuario_id`, `bool_emitir_relatorios`, `bool_ativo_relatorios`) VALUES
(2, 'Relatório de Tabelas Padrão', 'tabela_padrao', 'descricao_tabela_padrao+bool_ativo_tabela_padrao', '', '', 1, '2018-01-31 14:33:36', 1, 0, 1),
(3, 'Relatório de Fórmulas', 'formula', 'descricao_formula+formula_formula+numero_campos_formula+bool_ativo_formula', '', NULL, 0, '2018-01-31 14:33:26', 1, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatorio_tabela`
--

CREATE TABLE `relatorio_tabela` (
  `id_relatorio_tabela` int(11) NOT NULL,
  `descricao_relatorio_tabela` varchar(200) NOT NULL,
  `data_atualizacao_relatorio_tabela` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_relatorio_tabela` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `relatorio_tabela`
--

INSERT INTO `relatorio_tabela` (`id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES
(1, 'formula', '2018-01-31 14:52:36', 1),
(2, 'tabela_padrao', '2018-01-31 14:52:36', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabela_algoritimo_exe`
--

CREATE TABLE `tabela_algoritimo_exe` (
  `id_tabela_algoritimo_exe` int(11) NOT NULL,
  `descricao_padrao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tabela_algoritimo_exe`
--

INSERT INTO `tabela_algoritimo_exe` (`id_tabela_algoritimo_exe`, `descricao_padrao`) VALUES
(1, 'Padrão Site');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabela_algoritimo_exe_item`
--

CREATE TABLE `tabela_algoritimo_exe_item` (
  `id_tabela_algoritimo_exe_item` int(11) NOT NULL,
  `tabela_algoritimo_exe_id` int(11) NOT NULL,
  `descricao_tabela` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tabela_algoritimo_exe_item`
--

INSERT INTO `tabela_algoritimo_exe_item` (`id_tabela_algoritimo_exe_item`, `tabela_algoritimo_exe_id`, `descricao_tabela`) VALUES
(1, 1, 'cliente_site.sql'),
(3, 1, 'contato.sql'),
(4, 1, 'empresa.sql'),
(5, 1, 'site.sql'),
(6, 1, 'cards.sql'),
(7, 1, 'loja.sql'),
(8, 1, 'topicos_loja.sql'),
(9, 1, 'slide_show.sql'),
(10, 1, 'endereco_site.sql'),
(11, 1, 'grupo.sql'),
(12, 1, 'item.sql'),
(13, 1, 'destaque_grupo.sql'),
(14, 1, 'estado.sql'),
(15, 1, 'cliente_site.sql'),
(16, 1, 'orcamento.sql'),
(17, 1, 'item_orcamento.sql'),
(18, 1, 'saiba_mais.sql'),
(19, 1, 'adicional_site.sql'),
(20, 1, 'quem_somos.sql'),
(21, 1, 'videos.sql'),
(22, 1, 'configurar_site.sql');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabela_padrao`
--

CREATE TABLE `tabela_padrao` (
  `id_tabela_padrao` int(11) NOT NULL,
  `descricao_tabela_padrao` varchar(200) NOT NULL,
  `bool_ativo_tabela_padrao` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tabela_padrao`
--

INSERT INTO `tabela_padrao` (`id_tabela_padrao`, `descricao_tabela_padrao`, `bool_ativo_tabela_padrao`) VALUES
(1, 'upload_arq', 1),
(2, 'relatorios', 1),
(3, 'relatorio_tabela', 1),
(4, 'area_acesso', 1),
(5, 'nivel_acesso', 1),
(6, 'usuario', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `upload_arq`
--

CREATE TABLE `upload_arq` (
  `id_upload_arq` int(11) NOT NULL,
  `descricao_upload_arq` varchar(100) NOT NULL,
  `tipo_upload_arq` varchar(100) NOT NULL,
  `data_atualizacaoupload_arq` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_upload_arq` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(200) DEFAULT NULL,
  `login_usuario` char(3) DEFAULT NULL,
  `senha_usuario` varchar(100) DEFAULT NULL,
  `nivel_acesso_id` int(11) NOT NULL DEFAULT '1',
  `bool_ativo_usuario` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES
(1, 'ADMINISTRADOR', 'ADM', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 1, 1),
(2, 'JACK BILLER', 'JAC', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config_login`
--
ALTER TABLE `config_login`
  ADD PRIMARY KEY (`id_config_login`),
  ADD KEY `fk_config_login<>projetos` (`projeto_id`),
  ADD KEY `fk_config_login<>imagem_fundo` (`imagem_fundo_id`),
  ADD KEY `fk_config_login<>imagem_icone` (`imagem_icone_id`);

--
-- Indexes for table `config_principal`
--
ALTER TABLE `config_principal`
  ADD PRIMARY KEY (`id_config_principal`);

--
-- Indexes for table `config_relatorio`
--
ALTER TABLE `config_relatorio`
  ADD PRIMARY KEY (`id_config_relatorio`),
  ADD KEY `fk_config_relatorio<>projetos` (`projeto_id`);

--
-- Indexes for table `cor_modelo_menu`
--
ALTER TABLE `cor_modelo_menu`
  ADD PRIMARY KEY (`id_cor_modelo_menu`),
  ADD KEY `fk_cor_modelo_menu<>modelo_cores_menu` (`modelo_cores_menu_id`);

--
-- Indexes for table `formula`
--
ALTER TABLE `formula`
  ADD PRIMARY KEY (`id_formula`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id_grade`);

--
-- Indexes for table `icones`
--
ALTER TABLE `icones`
  ADD PRIMARY KEY (`id_icones`);

--
-- Indexes for table `imagem_fundo`
--
ALTER TABLE `imagem_fundo`
  ADD PRIMARY KEY (`id_imagem_fundo`);

--
-- Indexes for table `imagem_icone`
--
ALTER TABLE `imagem_icone`
  ADD PRIMARY KEY (`id_imagem_icone`);

--
-- Indexes for table `imagem_logo`
--
ALTER TABLE `imagem_logo`
  ADD PRIMARY KEY (`id_imagem_logo`);

--
-- Indexes for table `logica_negocio`
--
ALTER TABLE `logica_negocio`
  ADD PRIMARY KEY (`id_logica_negocio`);

--
-- Indexes for table `modelo_cores_menu`
--
ALTER TABLE `modelo_cores_menu`
  ADD PRIMARY KEY (`id_modelo_cores_menu`);

--
-- Indexes for table `nivel_acesso`
--
ALTER TABLE `nivel_acesso`
  ADD PRIMARY KEY (`id_nivel_acesso`),
  ADD KEY `fk_nivel_acesso<>usuario` (`usuario_id`);

--
-- Indexes for table `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`id_projeto`);

--
-- Indexes for table `relatorios`
--
ALTER TABLE `relatorios`
  ADD PRIMARY KEY (`id_relatorios`);

--
-- Indexes for table `relatorio_tabela`
--
ALTER TABLE `relatorio_tabela`
  ADD PRIMARY KEY (`id_relatorio_tabela`);

--
-- Indexes for table `tabela_algoritimo_exe`
--
ALTER TABLE `tabela_algoritimo_exe`
  ADD PRIMARY KEY (`id_tabela_algoritimo_exe`);

--
-- Indexes for table `tabela_algoritimo_exe_item`
--
ALTER TABLE `tabela_algoritimo_exe_item`
  ADD PRIMARY KEY (`id_tabela_algoritimo_exe_item`),
  ADD KEY `fk_tabela_algoritimo_exe_item<>tabela_algoritimo_exe` (`tabela_algoritimo_exe_id`);

--
-- Indexes for table `tabela_padrao`
--
ALTER TABLE `tabela_padrao`
  ADD PRIMARY KEY (`id_tabela_padrao`);

--
-- Indexes for table `upload_arq`
--
ALTER TABLE `upload_arq`
  ADD PRIMARY KEY (`id_upload_arq`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `Login` (`login_usuario`),
  ADD KEY `fk_usuario<>nivel_acesso` (`nivel_acesso_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config_login`
--
ALTER TABLE `config_login`
  MODIFY `id_config_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `config_principal`
--
ALTER TABLE `config_principal`
  MODIFY `id_config_principal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `config_relatorio`
--
ALTER TABLE `config_relatorio`
  MODIFY `id_config_relatorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cor_modelo_menu`
--
ALTER TABLE `cor_modelo_menu`
  MODIFY `id_cor_modelo_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `formula`
--
ALTER TABLE `formula`
  MODIFY `id_formula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id_grade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `icones`
--
ALTER TABLE `icones`
  MODIFY `id_icones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1177;
--
-- AUTO_INCREMENT for table `imagem_fundo`
--
ALTER TABLE `imagem_fundo`
  MODIFY `id_imagem_fundo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `imagem_icone`
--
ALTER TABLE `imagem_icone`
  MODIFY `id_imagem_icone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `imagem_logo`
--
ALTER TABLE `imagem_logo`
  MODIFY `id_imagem_logo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `logica_negocio`
--
ALTER TABLE `logica_negocio`
  MODIFY `id_logica_negocio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `modelo_cores_menu`
--
ALTER TABLE `modelo_cores_menu`
  MODIFY `id_modelo_cores_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `nivel_acesso`
--
ALTER TABLE `nivel_acesso`
  MODIFY `id_nivel_acesso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `projetos`
--
ALTER TABLE `projetos`
  MODIFY `id_projeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `relatorios`
--
ALTER TABLE `relatorios`
  MODIFY `id_relatorios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `relatorio_tabela`
--
ALTER TABLE `relatorio_tabela`
  MODIFY `id_relatorio_tabela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tabela_algoritimo_exe`
--
ALTER TABLE `tabela_algoritimo_exe`
  MODIFY `id_tabela_algoritimo_exe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tabela_algoritimo_exe_item`
--
ALTER TABLE `tabela_algoritimo_exe_item`
  MODIFY `id_tabela_algoritimo_exe_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tabela_padrao`
--
ALTER TABLE `tabela_padrao`
  MODIFY `id_tabela_padrao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `upload_arq`
--
ALTER TABLE `upload_arq`
  MODIFY `id_upload_arq` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `config_login`
--
ALTER TABLE `config_login`
  ADD CONSTRAINT `fk_config_login<>imagem_fundo` FOREIGN KEY (`imagem_fundo_id`) REFERENCES `imagem_fundo` (`id_imagem_fundo`),
  ADD CONSTRAINT `fk_config_login<>imagem_icone` FOREIGN KEY (`imagem_icone_id`) REFERENCES `imagem_icone` (`id_imagem_icone`),
  ADD CONSTRAINT `fk_config_login<>projetos` FOREIGN KEY (`projeto_id`) REFERENCES `projetos` (`id_projeto`);

--
-- Limitadores para a tabela `config_relatorio`
--
ALTER TABLE `config_relatorio`
  ADD CONSTRAINT `fk_config_relatorio<>projetos` FOREIGN KEY (`projeto_id`) REFERENCES `projetos` (`id_projeto`);

--
-- Limitadores para a tabela `cor_modelo_menu`
--
ALTER TABLE `cor_modelo_menu`
  ADD CONSTRAINT `fk_cor_modelo_menu<>modelo_cores_menu` FOREIGN KEY (`modelo_cores_menu_id`) REFERENCES `modelo_cores_menu` (`id_modelo_cores_menu`);

--
-- Limitadores para a tabela `nivel_acesso`
--
ALTER TABLE `nivel_acesso`
  ADD CONSTRAINT `fk_nivel_acesso<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `tabela_algoritimo_exe_item`
--
ALTER TABLE `tabela_algoritimo_exe_item`
  ADD CONSTRAINT `fk_tabela_algoritimo_exe_item<>tabela_algoritimo_exe` FOREIGN KEY (`tabela_algoritimo_exe_id`) REFERENCES `tabela_algoritimo_exe` (`id_tabela_algoritimo_exe`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario<>nivel_acesso` FOREIGN KEY (`nivel_acesso_id`) REFERENCES `nivel_acesso` (`id_nivel_acesso`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
