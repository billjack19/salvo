-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25-Jan-2018 às 18:12
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minas_system`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adicional_site`
--

CREATE TABLE `adicional_site` (
  `id_adicional_site` int(11) NOT NULL,
  `titulo_adicional_site` varchar(200) NOT NULL,
  `descricao_adicional_site` text NOT NULL,
  `imagem_adicional_site` varchar(200) NOT NULL,
  `saiba_mais_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `data_atualizacao_adicional_site` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_adicional_site` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cards`
--

CREATE TABLE `cards` (
  `id_cards` int(11) NOT NULL,
  `titulo_cards` varchar(100) NOT NULL,
  `descricao_cards` varchar(200) DEFAULT NULL,
  `imagem_cards` varchar(100) NOT NULL,
  `configurar_site_id` int(11) NOT NULL,
  `data_atualizacao_cards` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_cards` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cards`
--

INSERT INTO `cards` (`id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES
(1, 'Next Cable', '', 'Logonext.jpg', 1, '2018-01-25 09:49:34', 1),
(2, 'Giga Security', '', 'footerlogogigasecurity.png', 1, '2018-01-25 09:50:25', 1),
(3, 'New Back', '', 'marcanewback.png', 1, '2018-01-25 09:51:47', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente_site`
--

CREATE TABLE `cliente_site` (
  `id_cliente_site` int(11) NOT NULL,
  `nome_cliente_site` varchar(200) NOT NULL,
  `login_cliente_site` varchar(200) NOT NULL,
  `senha_cliente_site` varchar(200) NOT NULL,
  `telefone_cliente_site` varchar(30) NOT NULL,
  `celular_cliente_site` varchar(30) DEFAULT NULL,
  `endereco_cliente_site` varchar(500) DEFAULT NULL,
  `numero_cliente_site` int(11) DEFAULT NULL,
  `complemento_cliente_site` varchar(200) DEFAULT NULL,
  `bairro_cliente_site` varchar(200) DEFAULT NULL,
  `cidade_cliente_site` varchar(200) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `cep_cliente_site` varchar(30) DEFAULT NULL,
  `bool_ativo_cliente_site` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente_site`
--

INSERT INTO `cliente_site` (`id_cliente_site`, `nome_cliente_site`, `login_cliente_site`, `senha_cliente_site`, `telefone_cliente_site`, `celular_cliente_site`, `endereco_cliente_site`, `numero_cliente_site`, `complemento_cliente_site`, `bairro_cliente_site`, `cidade_cliente_site`, `estado_id`, `cep_cliente_site`, `bool_ativo_cliente_site`) VALUES
(1, 'Jack Biller', 'jac', '123', '99723-1080', '', '', 0, '', '', '', 0, '', 1),
(2, 'Jack Biller', 'jac', '123', '99723-1080', '', '', 0, '', '', '', 0, '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `configurar_site`
--

CREATE TABLE `configurar_site` (
  `id_configurar_site` int(11) NOT NULL,
  `titulo_configurar_site` varchar(100) NOT NULL,
  `titulo_menu_configurar_site` varchar(100) DEFAULT NULL,
  `cor_pagina_configurar_site` varchar(100) NOT NULL,
  `contra_cor_pagina_configurar_site` varchar(100) NOT NULL,
  `imagem_icone_configurar_site` varchar(100) NOT NULL,
  `imagem_logo_configurar_site` varchar(100) NOT NULL,
  `data_atualizacao_configurar_site` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_configurar_site` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `configurar_site`
--

INSERT INTO `configurar_site` (`id_configurar_site`, `titulo_configurar_site`, `titulo_menu_configurar_site`, `cor_pagina_configurar_site`, `contra_cor_pagina_configurar_site`, `imagem_icone_configurar_site`, `imagem_logo_configurar_site`, `data_atualizacao_configurar_site`, `bool_ativo_configurar_site`) VALUES
(1, 'Minas System', '', '#f76b00;', '#fff;', 'LogoSmForm.png', 'LogoLgBranca.png', '2018-01-25 14:10:36', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `id_contato` int(11) NOT NULL,
  `nome_contato` varchar(200) NOT NULL,
  `email_contato` varchar(200) DEFAULT NULL,
  `telefone_contato` varchar(200) DEFAULT NULL,
  `assunto_contato` varchar(200) DEFAULT NULL,
  `mensagem_contato` text,
  `usuario_id` int(11) NOT NULL,
  `data_atualizacao_contato` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_contato` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`id_contato`, `nome_contato`, `email_contato`, `telefone_contato`, `assunto_contato`, `mensagem_contato`, `usuario_id`, `data_atualizacao_contato`, `bool_ativo_contato`) VALUES
(1, 'teste no site Jack', 'site_Jack@asd.asd', '123', 'Formulario de Contato - Site Minas System', 'Teste', 2, '2018-01-25 13:57:44', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `destaque_grupo`
--

CREATE TABLE `destaque_grupo` (
  `id_destaque_grupo` int(11) NOT NULL,
  `titulo_destaque_grupo` varchar(100) NOT NULL,
  `grupo_id` int(11) NOT NULL,
  `imagem_destaque_grupo` varchar(100) NOT NULL,
  `descricao_destaque_grupo` varchar(300) DEFAULT NULL,
  `configurar_site_id` int(11) NOT NULL,
  `data_atualizacao_destaque_grupo` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_destaque_grupo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `destaque_grupo`
--

INSERT INTO `destaque_grupo` (`id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `bool_ativo_destaque_grupo`) VALUES
(1, 'Alarmes', 1, 'alarmes.JPG', '', 1, '2018-01-25 08:52:05', 1),
(2, 'Automação', 2, 'Automacao.jpg', '', 1, '2018-01-25 08:53:34', 1),
(3, 'Baterias e Pilhas', 3, 'Baterias_e_Pilhas.jpg', '', 1, '2018-01-25 08:54:38', 1),
(4, 'Cabos', 4, 'Cabos.jpg', '', 1, '2018-01-25 08:58:07', 1),
(5, 'CFTV', 5, 'CFTV.png', '', 1, '2018-01-25 08:59:31', 1),
(6, 'Conectores', 6, 'Conectores.jpg', '', 1, '2018-01-25 09:00:29', 1),
(7, 'Controle de Acesso', 7, 'Controle_de_Acesso.png', '', 1, '2018-01-25 09:02:24', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `descricao_empresa` varchar(200) NOT NULL,
  `imagem_logo_empresa` varchar(200) NOT NULL,
  `data_atualizacao_empresa` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_empresa` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `descricao_empresa`, `imagem_logo_empresa`, `data_atualizacao_empresa`, `usuario_id`, `bool_ativo_empresa`) VALUES
(1, 'Minas System', 'LogoLg.png', '2018-01-25 08:36:46', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco_site`
--

CREATE TABLE `endereco_site` (
  `id_endereco_site` int(11) NOT NULL,
  `descricao_endereco_site` varchar(100) NOT NULL,
  `endereco_endereco_site` varchar(100) NOT NULL,
  `numero_endereco_site` int(11) NOT NULL,
  `complemento_endereco_site` varchar(100) DEFAULT NULL,
  `bairro_endereco_site` varchar(100) DEFAULT NULL,
  `cidade_endereco_site` varchar(100) NOT NULL,
  `estado_id` int(11) NOT NULL,
  `cep_endereco_site` varchar(15) NOT NULL,
  `telefone_endereco_site` varchar(50) NOT NULL,
  `celular_endereco_site` varchar(50) DEFAULT NULL,
  `email_endereco_site` varchar(100) DEFAULT NULL,
  `horario_funcionamento_endereco_site` text NOT NULL,
  `latitude_endereco_site` varchar(100) NOT NULL,
  `longitude_endereco_site` varchar(100) NOT NULL,
  `configurar_site_id` int(11) NOT NULL,
  `data_atualizacao_endereco_site` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_endereco_site` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `endereco_site`
--

INSERT INTO `endereco_site` (`id_endereco_site`, `descricao_endereco_site`, `endereco_endereco_site`, `numero_endereco_site`, `complemento_endereco_site`, `bairro_endereco_site`, `cidade_endereco_site`, `estado_id`, `cep_endereco_site`, `telefone_endereco_site`, `celular_endereco_site`, `email_endereco_site`, `horario_funcionamento_endereco_site`, `latitude_endereco_site`, `longitude_endereco_site`, `configurar_site_id`, `data_atualizacao_endereco_site`, `bool_ativo_endereco_site`) VALUES
(1, 'R. Francisco Tramonte, 10', 'R. Francisco Tramonte', 10, '', 'Jardim Centenario', 'Poços de Caldas', 13, '37704-256', '(35) 3712-6037', '', '', 'segunda - sexta 08:00–18:00', '-21.804359', '-46.562745', 1, '2018-01-25 09:10:41', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `descricao_estado` varchar(100) NOT NULL,
  `sigla_estado` char(2) NOT NULL,
  `bool_ativo_estado` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES
(1, 'Acre', 'AC', 1),
(2, 'Alagoas', 'AL', 1),
(3, 'Amapá', 'AP', 1),
(4, 'Amazonas', 'AM', 1),
(5, 'Bahia', 'BA', 1),
(6, 'Ceará', 'CE', 1),
(7, 'Distrito Federal', 'DF', 1),
(8, 'Espírito Santo', 'ES', 1),
(9, 'Goiás', 'GO', 1),
(10, 'Maranhão', 'MA', 1),
(11, 'Mato Grosso', 'MT', 1),
(12, 'Mato Grosso do Sul', 'MS', 1),
(13, 'Minas Gerais', 'MG', 1),
(14, 'Pará', 'PA', 1),
(15, 'Paraíba', 'PB', 1),
(16, 'Paraná', 'PR', 1),
(17, 'Pernambuco', 'PE', 1),
(18, 'Piauí', 'PI', 1),
(19, 'Rio de Janeiro', 'RJ', 1),
(20, 'Rio Grande do Norte', 'RN', 1),
(21, 'Rio Grande do Sul', 'RS', 1),
(22, 'Rondônia', 'RO', 1),
(23, 'Roraima', 'RR', 1),
(24, 'Santa Catarina', 'SC', 1),
(25, 'São Paulo', 'SP', 1),
(26, 'Sergipe', 'SE', 1),
(27, 'Tocantins', 'TO', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

CREATE TABLE `grupo` (
  `id_grupo` int(11) NOT NULL,
  `descricao_grupo` char(50) NOT NULL,
  `data_atualizacao_grupo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) DEFAULT NULL,
  `bool_ativo_grupo` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES
(1, 'Alarmes', '2018-01-25 08:43:01', 1, 1),
(2, 'Automação', '2018-01-25 08:43:07', 1, 1),
(3, 'Baterias e Pilhas', '2018-01-25 08:43:17', 1, 1),
(4, 'Cabos', '2018-01-25 08:43:25', 1, 1),
(5, 'CFTV', '2018-01-25 08:43:37', 1, 1),
(6, 'Conectores', '2018-01-25 08:43:51', 1, 1),
(7, 'Controle de Acesso', '2018-01-25 08:44:35', 1, 1),
(8, 'Fechaduras', '2018-01-25 08:44:47', 1, 1),
(9, 'Ferramentas', '2018-01-25 08:45:00', 1, 1),
(10, 'Informática', '2018-01-25 08:45:13', 1, 1),
(11, 'Interfonia', '2018-01-25 08:46:09', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE `item` (
  `id_item` int(11) NOT NULL,
  `descricao_item` varchar(300) NOT NULL,
  `descricao_site_item` varchar(300) DEFAULT NULL,
  `unidade_medida_item` varchar(3) DEFAULT NULL,
  `imagem_item` varchar(200) NOT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_item` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `item`
--

INSERT INTO `item` (`id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES
(1, 'Câmera de Seguração', '', '', 'camera.png', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_orcamento`
--

CREATE TABLE `item_orcamento` (
  `id_item_orcamento` int(11) NOT NULL,
  `data_lanc_item_orcamento` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `orcamento_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantidade_item_orcamento` float NOT NULL,
  `total_item_orcamento` float NOT NULL,
  `bool_ativo_item_orcamento` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `item_orcamento`
--

INSERT INTO `item_orcamento` (`id_item_orcamento`, `data_lanc_item_orcamento`, `orcamento_id`, `item_id`, `quantidade_item_orcamento`, `total_item_orcamento`, `bool_ativo_item_orcamento`) VALUES
(1, '2018-01-25 10:36:21', 1, 1, 10, 1200, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `loja`
--

CREATE TABLE `loja` (
  `id_loja` int(11) NOT NULL,
  `titulo_loja` varchar(100) NOT NULL,
  `descricao_loja` varchar(100) DEFAULT NULL,
  `imagem_loja` varchar(100) DEFAULT NULL,
  `configurar_site_id` int(11) NOT NULL,
  `data_atualizacao_loja` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_loja` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `loja`
--

INSERT INTO `loja` (`id_loja`, `titulo_loja`, `descricao_loja`, `imagem_loja`, `configurar_site_id`, `data_atualizacao_loja`, `bool_ativo_loja`) VALUES
(1, 'Venha visitar nossa loja', 'Aguardamos sua visita', 'loja.png', 1, '2018-01-25 09:36:27', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento`
--

CREATE TABLE `orcamento` (
  `id_orcamento` int(11) NOT NULL,
  `descricao_orcamento` varchar(200) NOT NULL,
  `cliente_site_id` int(11) NOT NULL,
  `data_lanc_orcamento` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_orcamento` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `orcamento`
--

INSERT INTO `orcamento` (`id_orcamento`, `descricao_orcamento`, `cliente_site_id`, `data_lanc_orcamento`, `bool_ativo_orcamento`) VALUES
(1, 'Teste Jack', 2, '2018-01-25 10:35:22', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `quem_somos`
--

CREATE TABLE `quem_somos` (
  `id_quem_somos` int(11) NOT NULL,
  `titulo_quem_somos` varchar(200) NOT NULL,
  `descricao_quem_somos` text NOT NULL,
  `imagem_quem_somos` varchar(100) NOT NULL,
  `data_atualizacao_quem_somos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_quem_somos` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `quem_somos`
--

INSERT INTO `quem_somos` (`id_quem_somos`, `titulo_quem_somos`, `descricao_quem_somos`, `imagem_quem_somos`, `data_atualizacao_quem_somos`, `bool_ativo_quem_somos`) VALUES
(1, 'Sobre A Minas System', 'Escreva aqui sua historio', 'LogoLg.png', '2018-01-25 13:17:30', 1);

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
(1, 'Relatório de Contatos', 'contato', 'nome_contato+email_contato+telefone_contato', 'contato_tr_usuario_tr_nome_usuario', ' AND (usuario.nome_usuario LIKE ''%SITE%'')', 1, '2018-01-25 13:59:34', 1, 0, 1);

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
(1, 'cliente_site', '2018-01-25 14:41:09', 1),
(2, 'contato', '2018-01-25 14:41:09', 1),
(3, 'grupo', '2018-01-25 14:41:09', 1),
(4, 'item', '2018-01-25 14:41:09', 1),
(5, 'item_orcamento', '2018-01-25 14:41:09', 1),
(6, 'orcamento', '2018-01-25 14:41:09', 1),
(7, 'videos', '2018-01-25 14:41:09', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `saiba_mais`
--

CREATE TABLE `saiba_mais` (
  `id_saiba_mais` int(11) NOT NULL,
  `descricao_saiba_mais` varchar(200) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `data_atualizacao_saiba_mais` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_saiba_mais` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `site`
--

CREATE TABLE `site` (
  `ID_SITE` int(11) NOT NULL,
  `NOME_EMPRESA` varchar(100) DEFAULT NULL,
  `NOME_CIDADE` varchar(100) DEFAULT NULL,
  `ESTADO` char(2) DEFAULT NULL,
  `FONE` varchar(14) DEFAULT NULL,
  `FONE_APP` varchar(14) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `sendusername` varchar(255) DEFAULT NULL,
  `sendpassword` varchar(255) DEFAULT NULL,
  `smtpserver` varchar(255) DEFAULT NULL,
  `smtpserverport` int(11) DEFAULT NULL,
  `MailFrom` varchar(255) DEFAULT NULL,
  `MailTo` varchar(255) DEFAULT NULL,
  `MailCc` varchar(255) DEFAULT NULL,
  `bool_ativo_site` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `site`
--

INSERT INTO `site` (`ID_SITE`, `NOME_EMPRESA`, `NOME_CIDADE`, `ESTADO`, `FONE`, `FONE_APP`, `EMAIL`, `sendusername`, `sendpassword`, `smtpserver`, `smtpserverport`, `MailFrom`, `MailTo`, `MailCc`, `bool_ativo_site`) VALUES
(1, 'Minas System', 'Poços de Caldas', 'MG', '(35) 3712-6037', '', 'cdi@cdiinfo.com.br', 'thiago@cdiinfo.com.br', 'Cdidesenv03@', 'mail.cdiinfo.com.br', 465, 'thiago@cdiinfo.com.br', 'thiago.cdi@Hotmail.com', 'cdiinfo.suporte@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `slide_show`
--

CREATE TABLE `slide_show` (
  `id_slide_show` int(11) NOT NULL,
  `titulo_slide_show` varchar(100) DEFAULT NULL,
  `descricao_slide_show` varchar(200) DEFAULT NULL,
  `imagem_slide_show` varchar(100) NOT NULL,
  `configurar_site_id` int(11) NOT NULL,
  `data_atualizacao_slide_show` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_slide_show` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `slide_show`
--

INSERT INTO `slide_show` (`id_slide_show`, `titulo_slide_show`, `descricao_slide_show`, `imagem_slide_show`, `configurar_site_id`, `data_atualizacao_slide_show`, `bool_ativo_slide_show`) VALUES
(1, 'Tudo em Alarmes', 'Para sua Familia Mais Segura', 'fundo1.jpg', 1, '2018-01-25 09:20:09', 1),
(2, 'Tecnologias em Automação', 'Para você idealizar seus projetos ', 'fundo2.jpg', 1, '2018-01-25 09:25:12', 1),
(3, 'Informática', 'Venha conferir nossos produtos', 'fundo3.jpg', 1, '2018-01-25 09:27:47', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `topicos_loja`
--

CREATE TABLE `topicos_loja` (
  `id_topicos_loja` int(11) NOT NULL,
  `titulo_topicos_loja` varchar(100) NOT NULL,
  `descricao_topicos_loja` varchar(100) NOT NULL,
  `loja_id` int(11) NOT NULL,
  `data_atualizacao_topicos_loja` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_topicos_loja` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `topicos_loja`
--

INSERT INTO `topicos_loja` (`id_topicos_loja`, `titulo_topicos_loja`, `descricao_topicos_loja`, `loja_id`, `data_atualizacao_topicos_loja`, `bool_ativo_topicos_loja`) VALUES
(1, 'Endereço', 'R. Francisco Tramonte, 10 - Jardim Centenario, Poços de Caldas - MG', 1, '2018-01-25 09:36:53', 1),
(2, 'Telefone', '(35) 3712-6037 ', 1, '2018-01-25 09:37:13', 1),
(3, 'Horário de Funcionamento', 'Segunda - Sexta 08:00–18:00', 1, '2018-01-25 09:37:41', 1);

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

--
-- Extraindo dados da tabela `upload_arq`
--

INSERT INTO `upload_arq` (`id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES
(1, 'Logo.png', 'imagem', '2018-01-25 08:11:55', 1),
(2, 'LogoLg.png', 'imagem', '2018-01-25 08:11:57', 1),
(4, 'LogoSmBranca.png', 'imagem', '2018-01-25 08:12:02', 1),
(6, 'alarmes.JPG', 'imagem', '2018-01-25 08:51:34', 1),
(7, 'Automacao.jpg', 'imagem', '2018-01-25 08:53:15', 1),
(8, 'Baterias_e_Pilhas.jpg', 'imagem', '2018-01-25 08:54:22', 1),
(9, 'Cabos.jpg', 'imagem', '2018-01-25 08:57:49', 1),
(10, 'CFTV.png', 'imagem', '2018-01-25 08:59:08', 1),
(11, 'Conectores.jpg', 'imagem', '2018-01-25 09:00:11', 1),
(12, 'Controle_de_Acesso.png', 'imagem', '2018-01-25 09:02:00', 1),
(16, 'loja.png', 'imagem', '2018-01-25 09:35:46', 1),
(20, 'camera.png', 'imagem', '2018-01-25 09:53:25', 1),
(21, 'LogoLgBranca.png', 'imagem', '2018-01-25 13:10:09', 1),
(22, 'LogoLgForm.png', 'imagem', '2018-01-25 13:10:12', 1),
(23, 'LogoSmForm.png', 'imagem', '2018-01-25 13:10:16', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(200) DEFAULT NULL,
  `login_usuario` char(3) DEFAULT NULL,
  `senha_usuario` varchar(100) DEFAULT NULL,
  `bool_ativo_usuario` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `bool_ativo_usuario`) VALUES
(1, 'ADMINISTRADOR', 'ADM', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 1),
(2, 'SITE', 'SIT', '*C737C0A2F678ACBE092353610475CC003320E65E', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `videos`
--

CREATE TABLE `videos` (
  `id_videos` int(11) NOT NULL,
  `descricao_videos` text NOT NULL,
  `link_videos` varchar(200) NOT NULL,
  `data_atualizacao_videos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_videos` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adicional_site`
--
ALTER TABLE `adicional_site`
  ADD PRIMARY KEY (`id_adicional_site`),
  ADD KEY `fk_adicional_site<>usuario` (`usuario_id`),
  ADD KEY `fk_adiciona_site<>saiba_mais` (`saiba_mais_id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id_cards`),
  ADD KEY `fk_cards<>configurar_site` (`configurar_site_id`);

--
-- Indexes for table `cliente_site`
--
ALTER TABLE `cliente_site`
  ADD PRIMARY KEY (`id_cliente_site`);

--
-- Indexes for table `configurar_site`
--
ALTER TABLE `configurar_site`
  ADD PRIMARY KEY (`id_configurar_site`);

--
-- Indexes for table `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id_contato`),
  ADD KEY `fk_contato<>usuario` (`usuario_id`);

--
-- Indexes for table `destaque_grupo`
--
ALTER TABLE `destaque_grupo`
  ADD PRIMARY KEY (`id_destaque_grupo`),
  ADD KEY `fk_desatque_itens<>configurar_site` (`configurar_site_id`),
  ADD KEY `fk_desatque_itens<>grupo` (`grupo_id`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`),
  ADD KEY `fk_empresa<>usuario` (`usuario_id`);

--
-- Indexes for table `endereco_site`
--
ALTER TABLE `endereco_site`
  ADD PRIMARY KEY (`id_endereco_site`),
  ADD KEY `fk_edereco_site<>configurar_site` (`configurar_site_id`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indexes for table `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id_grupo`),
  ADD KEY `fk_grupo<>usuario` (`usuario_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `fk_item<>usuario` (`usuario_id`),
  ADD KEY `fk_item<>grupo` (`grupo_id`);

--
-- Indexes for table `item_orcamento`
--
ALTER TABLE `item_orcamento`
  ADD PRIMARY KEY (`id_item_orcamento`);

--
-- Indexes for table `loja`
--
ALTER TABLE `loja`
  ADD PRIMARY KEY (`id_loja`),
  ADD KEY `fk_loja<>configurar_site` (`configurar_site_id`);

--
-- Indexes for table `orcamento`
--
ALTER TABLE `orcamento`
  ADD PRIMARY KEY (`id_orcamento`),
  ADD KEY `fk_orcamento<>cliente_site` (`cliente_site_id`);

--
-- Indexes for table `quem_somos`
--
ALTER TABLE `quem_somos`
  ADD PRIMARY KEY (`id_quem_somos`);

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
-- Indexes for table `saiba_mais`
--
ALTER TABLE `saiba_mais`
  ADD PRIMARY KEY (`id_saiba_mais`),
  ADD KEY `fk_saiba_mais<>usuario` (`usuario_id`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`ID_SITE`);

--
-- Indexes for table `slide_show`
--
ALTER TABLE `slide_show`
  ADD PRIMARY KEY (`id_slide_show`),
  ADD KEY `fk_slide_show<>configurar_site` (`configurar_site_id`);

--
-- Indexes for table `topicos_loja`
--
ALTER TABLE `topicos_loja`
  ADD PRIMARY KEY (`id_topicos_loja`),
  ADD KEY `fk_topicos_loja<>loja` (`loja_id`);

--
-- Indexes for table `upload_arq`
--
ALTER TABLE `upload_arq`
  ADD PRIMARY KEY (`id_upload_arq`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id_videos`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adicional_site`
--
ALTER TABLE `adicional_site`
  MODIFY `id_adicional_site` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id_cards` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cliente_site`
--
ALTER TABLE `cliente_site`
  MODIFY `id_cliente_site` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `configurar_site`
--
ALTER TABLE `configurar_site`
  MODIFY `id_configurar_site` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contato`
--
ALTER TABLE `contato`
  MODIFY `id_contato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `destaque_grupo`
--
ALTER TABLE `destaque_grupo`
  MODIFY `id_destaque_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `endereco_site`
--
ALTER TABLE `endereco_site`
  MODIFY `id_endereco_site` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `item_orcamento`
--
ALTER TABLE `item_orcamento`
  MODIFY `id_item_orcamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `loja`
--
ALTER TABLE `loja`
  MODIFY `id_loja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orcamento`
--
ALTER TABLE `orcamento`
  MODIFY `id_orcamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `quem_somos`
--
ALTER TABLE `quem_somos`
  MODIFY `id_quem_somos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `relatorios`
--
ALTER TABLE `relatorios`
  MODIFY `id_relatorios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `relatorio_tabela`
--
ALTER TABLE `relatorio_tabela`
  MODIFY `id_relatorio_tabela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `saiba_mais`
--
ALTER TABLE `saiba_mais`
  MODIFY `id_saiba_mais` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `ID_SITE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `slide_show`
--
ALTER TABLE `slide_show`
  MODIFY `id_slide_show` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `topicos_loja`
--
ALTER TABLE `topicos_loja`
  MODIFY `id_topicos_loja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `upload_arq`
--
ALTER TABLE `upload_arq`
  MODIFY `id_upload_arq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id_videos` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
