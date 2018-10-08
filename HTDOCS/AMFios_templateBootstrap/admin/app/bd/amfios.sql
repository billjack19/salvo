-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12-Jan-2018 às 13:49
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amfios`
--

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
(1, 'Construção e Reforma', '', 'card1.jpg', 1, '2018-01-10 10:15:17', 1),
(2, 'Casa e Escritório', '', 'card3.jpg', 1, '2018-01-09 08:17:46', 1),
(3, 'Iluminação e decoração', '', 'card2.jpg', 1, '2018-01-09 08:18:08', 1);

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
(1, 'teste', 'teste', 'teste', 'Teste', '', '', 0, '', '', '', 13, '', 1),
(2, 'Jack Biller', 'jac', '123', '9999-9999', '', '', 0, '', '', '', NULL, '', 1),
(4, 'Jack', 'jac', '123', '123', '', '', 0, '', '', '', 0, '', 0),
(5, 'Teste Jack', 'jac', '456', '125', '', '', 0, '', '', '', NULL, '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `configurar_site`
--

CREATE TABLE `configurar_site` (
  `id_configurar_site` int(11) NOT NULL,
  `titulo_configurar_site` varchar(100) NOT NULL,
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

INSERT INTO `configurar_site` (`id_configurar_site`, `titulo_configurar_site`, `cor_pagina_configurar_site`, `contra_cor_pagina_configurar_site`, `imagem_icone_configurar_site`, `imagem_logo_configurar_site`, `data_atualizacao_configurar_site`, `bool_ativo_configurar_site`) VALUES
(1, 'AM Fios & Cabos', '#7ec0fa;', '#fff;', 'Logotipo.png', 'Logotipo_branca.png', '2018-01-08 14:30:42', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `id_contato` int(11) NOT NULL,
  `DT_CONTATO` datetime(1) DEFAULT CURRENT_TIMESTAMP
) ;

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
(1, 'Cabos Atox', 2, 'cabo.jpg', '', 1, '2018-01-02 16:09:31', 1),
(2, 'Luminária Pública', 8, 'luminarias.png', '', 1, '2018-01-02 16:51:49', 1),
(3, 'Chaves e Fusíveis', 4, 'fusiveis.jpg', '', 1, '2018-01-02 16:52:36', 1),
(4, 'Canaletas e Acessórios', 3, 'fundo3.jpg', '', 1, '2018-01-05 14:32:56', 0);

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
(1, 'R. Pedro Bertozi n° 8', 'R. Pedro Bertozi', 8, '', 'Vila Olímpica', 'Poços de Caldas', 13, '37704-375', '(35) 3722-0808', '', '', 'Segunda - Sexta · 07:30–18:00', '-21.779533', '-46.60325899999998', 1, '2018-01-08 13:29:37', 1);

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
(1, 'Automação e Controle', '2017-12-29 00:00:00', 1, 1),
(2, 'Cabos Atox', '2017-12-29 00:00:00', 1, 1),
(3, 'Canaletas e Acessórios', '2017-12-22 10:01:36', 1, 1),
(4, 'Chaves e Fusíveis', '2017-12-22 10:01:36', 1, 1),
(5, 'Conduletes e Caixas', '2017-12-22 10:01:36', 1, 1),
(6, 'Disjuntores', '2017-12-29 00:00:00', 1, 1),
(7, 'Eletrocalhas', '2017-12-29 00:00:00', 1, 1),
(8, 'Luminária Pública', '2017-12-29 00:00:00', 1, 1),
(9, 'Para-raio e Acessórios para Aterramento', '2017-12-22 10:01:36', 1, 1),
(10, 'Quadros de Comando', '2017-12-29 00:00:00', 1, 1),
(11, 'Teleinformática e Telefonia', '2017-12-22 10:01:36', 1, 1),
(12, 'Terminais', '2017-12-29 00:00:00', 1, 1);

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
  `grupo_id` int(11),
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_item` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `item`
--

INSERT INTO `item` (`id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES
(1, 'teste', 'teste', 'UN', 'Logotipo.jpg', 4, 1, 0),
(2, 'Cabos Atox', '', 'UN', 'cabo.jpg', 2, 1, 1),
(3, 'Chaves e Fusíveis', '', 'UN', 'fusiveis.jpg', 4, 1, 1),
(4, 'Luminária Pública', '', 'UN', 'luminarias.png', 8, 1, 1),
(5, 'Botões', 'Para seus projetos com tomadas de decisão entre outros', 'UN', 'botoes.jpg', 1, 1, 1),
(6, 'Chave Comutadora', '', 'UN', 'chave-comutadora.jpg', 1, 1, 1),
(7, 'Contator', 'Contator', 'UN', 'contator.jpg', 1, 1, 1),
(8, 'Contator', '', 'UN', 'contator.jpg', 7, 1, 1),
(9, 'Cabo Atox', '', 'MT', 'cabo-atox.jpg', 2, 1, 1);

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
(1, '2018-01-08 13:33:23', 1, 5, 10, 0, 1),
(2, '2018-01-11 17:56:32', 2, 4, 2, 20, 1),
(3, '2018-01-11 17:56:42', 2, 8, 13, 25, 1);

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
(1, 'Visite nossa loja', 'Aguardamos sua visita!', 'loja.png', 1, '2018-01-02 15:55:04', 1);

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
(1, 'Teste', 1, '2018-01-08 13:33:04', 1),
(2, 'Orcamento Teste', 4, '2018-01-11 17:49:47', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `quem_somos`
--

CREATE TABLE `quem_somos` (
  `id_quem_somos` int(11) NOT NULL,
  `titulo_quem_somos` varchar(200) NOT NULL,
  `descricao_quem_somos` text NOT NULL,
  `data_atualizacao_quem_somos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_quem_somos` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `quem_somos`
--

INSERT INTO `quem_somos` (`id_quem_somos`, `titulo_quem_somos`, `descricao_quem_somos`, `data_atualizacao_quem_somos`, `bool_ativo_quem_somos`) VALUES
(1, 'Quem Somos?', ' ', '2018-01-10 14:06:51', 0);

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
(1, 'AM Fios & Cabos', 'Poços de Caldas', 'MG', '35 3722-0808', '', 'cdi@cdiinfo.com.br', 'thiago@cdiinfo.com.br', 'Cdidesenv03@', 'mail.cdiinfo.com.br', 465, 'thiago@cdiinfo.com.br', 'thiago.cdi@Hotmail.com', 'cdiinfo.suporte@gmail.com', 1);

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
(1, 'Tudo em Lâmpadas', 'Para sua casa e escritório.', 'fundo1.jpg', 1, '2018-01-05 10:18:10', 1),
(2, 'Completa linha de cabos', 'Para você que vai construir ou reformar.', 'fundo2.jpg', 1, '2018-01-02 11:00:01', 1),
(3, 'Grandes Negócios', 'Fechamos qualquer negócio', 'fundo3.jpg', 1, '2018-01-02 11:03:41', 1),
(4, 'Teste', 'teste', 'loja.png', 1, '2018-01-05 14:34:57', 0);

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
(1, 'Endereço:', 'R. Pedro Bertozi. 8 -4 Vl Olímpica. Poços de Caldas - MG. 37704-375', 1, '2018-01-02 15:43:56', 1),
(2, 'Telefone:', '(35) 3722-0808', 1, '2018-01-02 15:43:22', 1),
(3, 'Horário:', 'Segunda - Sexta · 07:30–18:00', 1, '2018-01-02 15:44:02', 1),
(4, 'E-mail', 'teste@gmail.com', 1, '2018-01-09 08:20:42', 0);

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
(1, 'Logotipo.jpg', 'imagem', '2018-01-02 08:44:21', 1),
(2, 'Logotipo.png', 'imagem', '2018-01-02 10:30:55', 1),
(3, 'Logotipo_branca.png', 'imagem', '2018-01-02 10:31:16', 1),
(4, 'card1.jpg', 'imagem', '2018-01-02 10:35:46', 1),
(5, 'card2.jpg', 'imagem', '2018-01-02 10:35:57', 1),
(6, 'card3.jpg', 'imagem', '2018-01-02 10:36:06', 1),
(7, 'loja.png', 'imagem', '2018-01-02 10:36:28', 1),
(8, 'fundo1.jpg', 'imagem', '2018-01-02 10:36:40', 1),
(9, 'fundo2.jpg', 'imagem', '2018-01-02 10:36:51', 1),
(10, 'fundo3.jpg', 'imagem', '2018-01-02 10:37:05', 1),
(11, 'cabo.jpg', 'imagem', '2018-01-02 10:42:41', 1),
(12, 'fusiveis.jpg', 'imagem', '2018-01-02 10:42:52', 1),
(13, 'luminarias.png', 'imagem', '2018-01-02 10:43:01', 1),
(14, 'botoes.jpg', 'imagem', '2018-01-02 17:06:48', 1),
(15, 'chave-comutadora.jpg', 'imagem', '2018-01-02 17:13:29', 1),
(16, 'contator.jpg', 'imagem', '2018-01-04 10:27:23', 1),
(17, 'equipamento-de-medicao.jpg', 'imagem', '2018-01-05 13:23:26', 1),
(18, 'cabo-atox.jpg', 'imagem', '2018-01-05 13:24:24', 1),
(19, 'cabo-coaxial.jpg', 'imagem', '2018-01-05 13:33:47', 1),
(20, 'cabo-flexivel-750v.jpg', 'imagem', '2018-01-05 13:36:10', 1),
(21, 'cabo-de-telefonia.jpg', 'imagem', '2018-01-05 13:38:53', 1),
(22, 'maxresdefault_(1).jpg', 'imagem', '2018-01-08 14:13:06', 1),
(23, 'maxresdefault.jpg', 'imagem', '2018-01-08 14:20:06', 1),
(24, 'fundoslideshowhome.jpg', 'imagem', '2018-01-08 16:15:26', 1),
(25, 'Chrysanthemum.jpg', 'imagem', '2018-01-08 16:16:02', 1),
(26, 'Jellyfish.jpg', 'imagem', '2018-01-09 09:43:58', 1),
(27, 'Penguins.jpg', 'imagem', '2018-01-09 09:49:16', 1),
(28, 'Hydrangeas.jpg', 'imagem', '2018-01-09 14:13:17', 1),
(29, 'fundo-slideshow-home.jpg', 'imagem', '2018-01-10 13:36:55', 1),
(30, 'grupo_teste.png', 'imagem', '2018-01-10 13:37:36', 1);

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
(1, 'ADMINISTRADOR', 'ADM', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 1);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `destaque_grupo`
--
ALTER TABLE `destaque_grupo`
  ADD PRIMARY KEY (`id_destaque_grupo`),
  ADD KEY `fk_desatque_itens<>configurar_site` (`configurar_site_id`),
  ADD KEY `fk_desatque_itens<>grupo` (`grupo_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id_cards` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cliente_site`
--
ALTER TABLE `cliente_site`
  MODIFY `id_cliente_site` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `configurar_site`
--
ALTER TABLE `configurar_site`
  MODIFY `id_configurar_site` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contato`
--
ALTER TABLE `contato`
  MODIFY `id_contato` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `destaque_grupo`
--
ALTER TABLE `destaque_grupo`
  MODIFY `id_destaque_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `item_orcamento`
--
ALTER TABLE `item_orcamento`
  MODIFY `id_item_orcamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `loja`
--
ALTER TABLE `loja`
  MODIFY `id_loja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orcamento`
--
ALTER TABLE `orcamento`
  MODIFY `id_orcamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `quem_somos`
--
ALTER TABLE `quem_somos`
  MODIFY `id_quem_somos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `ID_SITE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `slide_show`
--
ALTER TABLE `slide_show`
  MODIFY `id_slide_show` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `topicos_loja`
--
ALTER TABLE `topicos_loja`
  MODIFY `id_topicos_loja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `upload_arq`
--
ALTER TABLE `upload_arq`
  MODIFY `id_upload_arq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `fk_cards<>configurar_site` FOREIGN KEY (`configurar_site_id`) REFERENCES `configurar_site` (`id_configurar_site`);

--
-- Limitadores para a tabela `destaque_grupo`
--
ALTER TABLE `destaque_grupo`
  ADD CONSTRAINT `fk_desatque_itens<>configurar_site` FOREIGN KEY (`configurar_site_id`) REFERENCES `configurar_site` (`id_configurar_site`),
  ADD CONSTRAINT `fk_desatque_itens<>grupo` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id_grupo`);

--
-- Limitadores para a tabela `endereco_site`
--
ALTER TABLE `endereco_site`
  ADD CONSTRAINT `fk_edereco_site<>configurar_site` FOREIGN KEY (`configurar_site_id`) REFERENCES `configurar_site` (`id_configurar_site`);

--
-- Limitadores para a tabela `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `fk_grupo<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_item<>grupo` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id_grupo`),
  ADD CONSTRAINT `fk_item<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `loja`
--
ALTER TABLE `loja`
  ADD CONSTRAINT `fk_loja<>configurar_site` FOREIGN KEY (`configurar_site_id`) REFERENCES `configurar_site` (`id_configurar_site`);

--
-- Limitadores para a tabela `orcamento`
--
ALTER TABLE `orcamento`
  ADD CONSTRAINT `fk_orcamento<>cliente_site` FOREIGN KEY (`cliente_site_id`) REFERENCES `cliente_site` (`id_cliente_site`);

--
-- Limitadores para a tabela `slide_show`
--
ALTER TABLE `slide_show`
  ADD CONSTRAINT `fk_slide_show<>configurar_site` FOREIGN KEY (`configurar_site_id`) REFERENCES `configurar_site` (`id_configurar_site`);

--
-- Limitadores para a tabela `topicos_loja`
--
ALTER TABLE `topicos_loja`
  ADD CONSTRAINT `fk_topicos_loja<>loja` FOREIGN KEY (`loja_id`) REFERENCES `loja` (`id_loja`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
