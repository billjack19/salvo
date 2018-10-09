-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26-Mar-2018 às 22:46
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `revistas_download`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `apostilas`
--

CREATE TABLE `apostilas` (
  `id_apostilas` int(11) NOT NULL,
  `descricao_apostilas` varchar(200) NOT NULL,
  `text_arquivo_apostilas` varchar(200) NOT NULL,
  `imagem_apostilas` varchar(200) DEFAULT NULL,
  `topicos_id` int(200) NOT NULL,
  `data_atualizacao_apostilas` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_apostilas` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `apostilas`
--

INSERT INTO `apostilas` (`id_apostilas`, `descricao_apostilas`, `text_arquivo_apostilas`, `imagem_apostilas`, `topicos_id`, `data_atualizacao_apostilas`, `usuario_id`, `bool_ativo_apostilas`) VALUES
(1, 'Apostila do Curso de Arduino com Álvaro Justen', 'apostilarev4.pdf', 'Apostila_do_Curso_de_Arduino_com_Alvaro_Justen.png', 1, '2018-03-26 16:14:27', 1, 1),
(2, 'Mini Curso Arduino', 'Mini_Curso_Arduino.pdf', 'Mini_Curso_Arduino.png', 1, '2018-03-26 16:14:11', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id_livros` int(11) NOT NULL,
  `descricao_livros` varchar(200) NOT NULL,
  `text_arquivo_livros` varchar(200) NOT NULL,
  `imagem_capa_livros` varchar(200) DEFAULT NULL,
  `topicos_id` int(11) NOT NULL,
  `data_atualizacao_livros` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_livros` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id_livros`, `descricao_livros`, `text_arquivo_livros`, `imagem_capa_livros`, `topicos_id`, `data_atualizacao_livros`, `usuario_id`, `bool_ativo_livros`) VALUES
(1, 'Python para 1ed - Luiz Eduardo Borges', 'Python_para_desenvolvedores_1ed__Luiz_Eduardo_Borges.pdf', 'Python_para_desenvolvedores_1ed__Luiz_Eduardo_Borges.png', 2, '2018-03-22 15:42:24', 1, 1),
(2, 'Python para 2ed - Luiz Eduardo Borges', 'Python_para_desenvolvedores_2ed__Luiz_Eduardo_Borges.pdf', 'Python_para_desenvolvedores_2ed__Luiz_Eduardo_Borges.png', 2, '2018-03-22 15:42:33', 1, 1),
(3, 'eletronica2', 'eletronica2.pdf', 'eletronica2.png', 1, '2018-03-22 15:38:56', 1, 1),
(4, 'Manual_Prof_Eletronica_Basica', 'Manual_Prof_Eletronica_Basica.pdf', 'Manual_Prof_Eletronica_Basica.png', 1, '2018-03-22 15:41:39', 1, 1);

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
(1, 'Nivel Administrador', 'apostilas+livros+revista+topicos+apostilas-topicos+livros-topicos+revista-topicos+volumes-revista+upload+mapa+mov+pdf+notif+usuario', '2018-03-23 08:09:21', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacoes`
--

CREATE TABLE `notificacoes` (
  `id_notificacoes` int(11) NOT NULL,
  `descricao_notificacoes` text NOT NULL,
  `usuario_atuador_notificacoes` varchar(200) NOT NULL,
  `usuaio_requerente_notificacoes` varchar(200) NOT NULL,
  `tipo_alteracao_notificacoes` enum('i','u','d') NOT NULL,
  `notificacoes_config_id` int(200) NOT NULL,
  `bool_view_notificacoes` int(1) NOT NULL,
  `data_atualizacao_notificacoes` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_notificacoes` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `notificacoes`
--

INSERT INTO `notificacoes` (`id_notificacoes`, `descricao_notificacoes`, `usuario_atuador_notificacoes`, `usuaio_requerente_notificacoes`, `tipo_alteracao_notificacoes`, `notificacoes_config_id`, `bool_view_notificacoes`, `data_atualizacao_notificacoes`, `bool_ativo_notificacoes`) VALUES
(19, 'Descrição => PC&CIA<br>Imagem => saber_eletronica.png<br>Tópicos Id => 1<br>Usuário Id => 1<br>Ativo => 1<br>', '1', '1', 'i', 4, 1, '2018-03-26 14:27:18', 1),
(20, 'Descrição => PC&CIA 085<br>Text Arquivo => PCCIA_085.pdf<br>Imagem Capa => PCCIA085.png<br>Revista Id => 2<br>Usuário Id => 1<br>Ativo => 1<br>', '1', '1', 'i', 5, 1, '2018-03-26 14:27:18', 1),
(21, 'Descrição => PC&CIA 085<br>Text Arquivo => PCCIA_085.pdf<br>Imagem Capa => PCCIA085.png<br>Revista Id => 2<br>Usuário Id => 1<br>Ativo => 1<br>', '1', '1', 'u', 5, 1, '2018-03-26 14:27:18', 1),
(22, '<b>Aréa de Atuação:</b><br>volumes-revista<br><b>Registro inserido:</b><br>Descrição => PC&CIA 088<br>Text Arquivo => PCCIA_088.pdf<br>Imagem Capa => PCCIA088.png<br>Revista Id => /%/SELECT *  FROM revista WHERE id_revista = 2/%/<br>Usuário Id => 1<br>Ativo => 1<br>', '1', '1', 'i', 5, 1, '2018-03-26 14:46:12', 1),
(23, '<b>Aréa de Atuação:</b><br>revista<br><b>Registro inserido:</b><br>Descrição => Divirta-se com eletronica<br>Imagem => saber_eletronica.png<br>Tópicos => /%/SELECT * FROM topicos WHERE id_topicos = 1/%/<br>Usuário => /%/SELECT * FROM usuario WHERE id_usuario = 1/%/<br>Ativo => 1<br>', '1', '1', 'i', 2, 1, '2018-03-26 14:39:02', 1),
(24, '<b>Aréa de Atuação:</b><br>volumes-revista<br><b>Registro inserido:</b><br>Descrição => Divirta-se com_a Eletrônica Vol 01<br>Text Arquivo => Divirta-se_com_a_Eletronica_Vol_01.pdf<br>Imagem Capa => Divirta-secomaEletronicaVol01.png<br>Revista => /%/SELECT * FROM revista WHERE id_revista = 3/%/<br>Usuário => /%/SELECT * FROM usuario WHERE id_usuario = 1/%/<br>Ativo => 1<br>', '1', '1', 'i', 5, 1, '2018-03-26 14:52:40', 1),
(25, '<b>Aréa de Atuação:</b><br>revista<br><b>Registro alterado:</b><br>Descrição => Divirta-se com eletrônica<br>Imagem => saber_eletronica.png<br>Tópicos => /%/SELECT * FROM topicos WHERE id_topicos = 1/%/<br>Usuário => /%/SELECT * FROM usuario WHERE id_usuario = 1/%/<br>Ativo => 1<br>', '1', '1', 'u', 2, 1, '2018-03-26 14:55:55', 1),
(26, '<b>Aréa de Atuação:</b><br>revista<br><b>Registro alterado:</b><br>', '1', '1', 'u', 2, 1, '2018-03-26 15:42:30', 1),
(27, '<b>Aréa de Atuação:</b><br>revista<br><b>Registro alterado:</b><br>Ativo: Sim => Não<br>', '1', '1', 'u', 2, 1, '2018-03-26 15:42:30', 1),
(28, '<b>Aréa de Atuação:</b><br>apostilas<br><b>Registro alterado:</b><br>Descrição => Apostila do Curso de Arduino com Álvaro Justen<br>Text Arquivo => apostilarev4.pdf<br>Imagem => Apostila_do_Curso_de_Arduino_com_Alvaro_Justen.png<br>Tópicos: /%/SELECT * FROM topicos WHERE id_topicos = 1/%/ => <b>/%/SELECT * FROM topicos WHERE id_topicos = 2/%/</b><br>Usuário => /%/SELECT * FROM usuario WHERE id_usuario = 1/%/<br>Ativo => Sim<br>', '1', '1', 'u', 3, 1, '2018-03-26 15:49:44', 1),
(29, '<b>Aréa de Atuação:</b><br>apostilas<br><b>Registro alterado:</b><br>Descrição => Mini Curso Arduino<br>Text Arquivo => Mini_Curso_Arduino.pdf<br>Imagem => Mini_Curso_Arduino.png<br>Tópicos => /%/SELECT * FROM topicos WHERE id_topicos = 1/%/<br>Usuário => /%/SELECT * FROM usuario WHERE id_usuario = 1/%/<br><b style="color: red">Ativo: Sim => Não</b><br>', '1', '1', 'u', 3, 1, '2018-03-26 15:57:11', 1),
(30, '<b>Aréa de Atuação:</b><br>apostilas<br><b>Registro alterado:</b><br>Descrição => Mini Curso Arduino<br>Text Arquivo => Mini_Curso_Arduino.pdf<br>Imagem => Mini_Curso_Arduino.png<br><b style="color: red">Tópicos: /%/SELECT * FROM topicos WHERE id_topicos = 1/%/ => /%/SELECT * FROM topicos WHERE id_topicos = 2/%/</b><br>Usuário => /%/SELECT * FROM usuario WHERE id_usuario = 1/%/<br><b style="color: red">Ativo: Não => Sim</b><br>', '1', '1', 'u', 3, 1, '2018-03-26 15:58:20', 1),
(31, '<b>Aréa de Atuação:</b>apostilas<br><b>Registro alterado:</b><br>Descrição => Mini Curso Arduino<br>Text Arquivo => Mini_Curso_Arduino.pdf<br>Imagem => Mini_Curso_Arduino.png<br><b style="color: red">Tópicos: /%/SELECT * FROM topicos WHERE id_topicos = 2/%/ => /%/SELECT * FROM topicos WHERE id_topicos = 1/%/</b><br>Usuário => /%/SELECT * FROM usuario WHERE id_usuario = 1/%/<br>Ativo => Sim<br>', '1', '1', 'u', 3, 1, '2018-03-26 16:14:35', 1),
(32, '<b>Aréa de Atuação:</b>apostilas<br><b>Registro alterado:</b><br>Descrição => Apostila do Curso de Arduino com Álvaro Justen<br>Text Arquivo => apostilarev4.pdf<br>Imagem => Apostila_do_Curso_de_Arduino_com_Alvaro_Justen.png<br><b style="color: red">Tópicos: /%/SELECT * FROM topicos WHERE id_topicos = 2/%/ => /%/SELECT * FROM topicos WHERE id_topicos = 1/%/</b><br>Usuário => /%/SELECT * FROM usuario WHERE id_usuario = 1/%/<br>Ativo => Sim<br>', '1', '1', 'u', 3, 1, '2018-03-26 16:14:35', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacoes_config`
--

CREATE TABLE `notificacoes_config` (
  `id_notificacoes_config` int(11) NOT NULL,
  `area_notificacoes_config` varchar(200) NOT NULL,
  `tipo_alteracao_notificacoes_config` varchar(100) NOT NULL,
  `data_atualizacao_notificacoes_config` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_notificacoes_config` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `notificacoes_config`
--

INSERT INTO `notificacoes_config` (`id_notificacoes_config`, `area_notificacoes_config`, `tipo_alteracao_notificacoes_config`, `data_atualizacao_notificacoes_config`, `usuario_id`, `bool_ativo_notificacoes_config`) VALUES
(1, 'livros', 'I+U', '2018-03-22 15:19:59', 1, 1),
(2, 'revista', 'I+U', '2018-03-23 08:57:42', 1, 1),
(3, 'apostilas', 'I+U', '2018-03-23 08:57:47', 1, 1),
(4, 'revista-topicos', 'I+U', '2018-03-26 08:39:55', 1, 1),
(5, 'volumes-revista', 'I+U', '2018-03-26 08:40:02', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacoes_pendentes`
--

CREATE TABLE `notificacoes_pendentes` (
  `id_notificacoes_pendentes` int(11) NOT NULL,
  `descricao_notificacoes_pendentes` text NOT NULL,
  `usuario_atuador_notificacoes_pendentes` varchar(200) NOT NULL,
  `usuaio_requerente_notificacoes_pendentes` varchar(200) NOT NULL,
  `tipo_alteracao_notificacoes_pendentes` enum('i','u','d') NOT NULL,
  `notificacoes_config_id` int(200) NOT NULL,
  `data_atualizacao_notificacoes_pendentes` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_notificacoes_pendentes` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacoes_salvas`
--

CREATE TABLE `notificacoes_salvas` (
  `id_notificacoes_salvas` int(11) NOT NULL,
  `descricao_notificacoes_salvas` text NOT NULL,
  `usuario_atuador_notificacoes_salvas` varchar(200) NOT NULL,
  `usuaio_requerente_notificacoes_salvas` varchar(200) NOT NULL,
  `tipo_alteracao_notificacoes_salvas` varchar(50) NOT NULL,
  `notificacoes_config_id` int(200) NOT NULL,
  `data_atualizacao_notificacoes_salvas` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_notificacoes_salvas` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'apostilas', '2018-03-26 17:33:39', 1),
(2, 'livros', '2018-03-26 17:33:39', 1),
(3, 'revista', '2018-03-26 17:33:39', 1),
(4, 'trabalho', '2018-03-26 17:33:39', 1),
(5, 'volumes', '2018-03-26 17:33:39', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `revista`
--

CREATE TABLE `revista` (
  `id_revista` int(11) NOT NULL,
  `descricao_revista` varchar(200) NOT NULL,
  `imagem_revista` varchar(200) DEFAULT NULL,
  `topicos_id` int(200) NOT NULL,
  `data_atualizacao_revista` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_revista` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `revista`
--

INSERT INTO `revista` (`id_revista`, `descricao_revista`, `imagem_revista`, `topicos_id`, `data_atualizacao_revista`, `usuario_id`, `bool_ativo_revista`) VALUES
(1, 'Saber Eletrônica', 'saber_eletronica.png', 1, '2018-03-23 08:14:42', 1, 1),
(2, 'PC&CIA', 'saber_eletronica.png', 1, '2018-03-26 08:45:39', 1, 1),
(3, 'Divirta-se com eletrônica', 'saber_eletronica.png', 1, '2018-03-26 15:42:12', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rtabalhos`
--

CREATE TABLE `rtabalhos` (
  `id_rtabalhos` int(11) NOT NULL,
  `data_atualizacao_rtabalhos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_rtabalhos` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `topicos`
--

CREATE TABLE `topicos` (
  `id_topicos` int(11) NOT NULL,
  `descricao_topicos` varchar(200) NOT NULL,
  `data_atualizacao_topicos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_topicos` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `topicos`
--

INSERT INTO `topicos` (`id_topicos`, `descricao_topicos`, `data_atualizacao_topicos`, `usuario_id`, `bool_ativo_topicos`) VALUES
(1, 'Eletrônica', '2018-03-22 14:53:46', 1, 1),
(2, 'Programação', '2018-03-22 14:54:18', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `trabalho`
--

CREATE TABLE `trabalho` (
  `id_trabalho` int(11) NOT NULL,
  `data_atualizacao_trabalho` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_trabalho` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'apostilarev4.pdf', 'texto', '2018-03-22 10:45:21', 1),
(2, 'Apostila_do_Curso_de_Arduino_com_Alvaro_Justen.png', 'imagem', '2018-03-22 10:48:12', 1),
(3, 'Mini_Curso_Arduino.pdf', 'texto', '2018-03-22 14:39:36', 1),
(4, 'Mini_Curso_Arduino.png', 'imagem', '2018-03-22 14:46:47', 1),
(5, 'Python_para_desenvolvedores_1ed__Luiz_Eduardo_Borges.pdf', 'texto', '2018-03-22 14:58:04', 1),
(6, 'Python_para_desenvolvedores_2ed__Luiz_Eduardo_Borges.pdf', 'texto', '2018-03-22 15:29:48', 1),
(7, 'Python_para_desenvolvedores_2ed__Luiz_Eduardo_Borges.png', 'imagem', '2018-03-22 15:31:35', 1),
(8, 'Python_para_desenvolvedores_1ed__Luiz_Eduardo_Borges.png', 'imagem', '2018-03-22 15:33:31', 1),
(9, 'eletronica2.pdf', 'texto', '2018-03-22 15:36:14', 1),
(10, 'eletronica2.png', 'imagem', '2018-03-22 15:38:44', 1),
(11, 'Manual_Prof_Eletronica_Basica.pdf', 'texto', '2018-03-22 15:39:36', 1),
(12, 'Manual_Prof_Eletronica_Basica.png', 'imagem', '2018-03-22 15:41:23', 1),
(13, 'saber_eletronica.png', 'imagem', '2018-03-23 08:14:21', 1),
(14, 'Fora_de_Serie_Saber_Eletronica_n_8_JulDez1990.pdf', 'texto', '2018-03-23 10:36:59', 1),
(15, 'Fora_de_Serie_Saber_Eletronica_n_8_JulDez1990.png', 'imagem', '2018-03-23 10:36:57', 1),
(18, 'Fora_de_Srie_Saber_Eletrnica_n19-Fev-1996.pdf', 'texto', '2018-03-23 08:45:43', 1),
(19, 'Fora_de_Serie_Saber_Eletronica_n19-Fev-1996.png', 'imagem', '2018-03-23 08:52:55', 1),
(20, 'PCCIA_085.pdf', 'texto', '2018-03-26 08:46:33', 1),
(21, 'PCCIA085.png', 'imagem', '2018-03-26 08:48:55', 1),
(22, 'PCCIA_088.pdf', 'texto', '2018-03-26 09:53:59', 1),
(23, 'PCCIA088.png', 'imagem', '2018-03-26 09:55:52', 1),
(24, 'Divirta-se_com_a_Eletronica_Vol_01.pdf', 'texto', '2018-03-26 14:49:55', 1),
(25, 'Divirta-secomaEletronicaVol01.png', 'imagem', '2018-03-26 14:51:36', 1);

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
(2, 'SITE', 'SIT', '*C737C0A2F678ACBE092353610475CC003320E65E', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `volumes`
--

CREATE TABLE `volumes` (
  `id_volumes` int(11) NOT NULL,
  `descricao_volumes` varchar(200) NOT NULL,
  `text_arquivo_volumes` varchar(200) NOT NULL,
  `imagem_capa_volumes` varchar(200) DEFAULT NULL,
  `revista_id` int(200) NOT NULL,
  `data_atualizacao_volumes` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_volumes` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `volumes`
--

INSERT INTO `volumes` (`id_volumes`, `descricao_volumes`, `text_arquivo_volumes`, `imagem_capa_volumes`, `revista_id`, `data_atualizacao_volumes`, `usuario_id`, `bool_ativo_volumes`) VALUES
(1, 'Fora de Série Saber Eletrônica n° 8 Jul-Dez-1990', 'Fora_de_Serie_Saber_Eletronica_n_8_JulDez1990.pdf', 'Fora_de_Serie_Saber_Eletronica_n_8_JulDez1990.png', 1, '2018-03-23 10:39:12', 1, 1),
(2, 'Fora de Série Saber Eletrônica n°19-Fev-1996', 'Fora_de_Srie_Saber_Eletrnica_n19-Fev-1996.pdf', 'Fora_de_Serie_Saber_Eletronica_n19-Fev-1996.png', 1, '2018-03-23 08:53:12', 1, 1),
(3, 'PC&CIA 085', 'PCCIA_085.pdf', 'PCCIA085.png', 2, '2018-03-26 08:51:56', 1, 1),
(4, 'PC&CIA 088', 'PCCIA_088.pdf', 'PCCIA088.png', 2, '2018-03-26 09:56:26', 1, 1),
(5, 'Divirta-se com_a Eletrônica Vol 01', 'Divirta-se_com_a_Eletronica_Vol_01.pdf', 'Divirta-secomaEletronicaVol01.png', 3, '2018-03-26 14:52:27', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apostilas`
--
ALTER TABLE `apostilas`
  ADD PRIMARY KEY (`id_apostilas`),
  ADD KEY `fk_apostilas<>usuario` (`usuario_id`),
  ADD KEY `fk_apostilas<>topicos` (`topicos_id`);

--
-- Indexes for table `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id_livros`),
  ADD KEY `fk_livros<>usuario` (`usuario_id`),
  ADD KEY `fk_livros<>topicos` (`topicos_id`);

--
-- Indexes for table `nivel_acesso`
--
ALTER TABLE `nivel_acesso`
  ADD PRIMARY KEY (`id_nivel_acesso`),
  ADD KEY `fk_nivel_acesso<>usuario` (`usuario_id`);

--
-- Indexes for table `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD PRIMARY KEY (`id_notificacoes`),
  ADD KEY `fk_notificacoes<>notificacoes_config` (`notificacoes_config_id`);

--
-- Indexes for table `notificacoes_config`
--
ALTER TABLE `notificacoes_config`
  ADD PRIMARY KEY (`id_notificacoes_config`),
  ADD KEY `fk_notificacoes_config<>usuario` (`usuario_id`);

--
-- Indexes for table `notificacoes_pendentes`
--
ALTER TABLE `notificacoes_pendentes`
  ADD PRIMARY KEY (`id_notificacoes_pendentes`),
  ADD KEY `fk_notificacoes_pendentes<>notificacoes_config` (`notificacoes_config_id`);

--
-- Indexes for table `notificacoes_salvas`
--
ALTER TABLE `notificacoes_salvas`
  ADD PRIMARY KEY (`id_notificacoes_salvas`),
  ADD KEY `fk_notificacoes_salvas<>notificacoes_config` (`notificacoes_config_id`);

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
-- Indexes for table `revista`
--
ALTER TABLE `revista`
  ADD PRIMARY KEY (`id_revista`),
  ADD KEY `fk_revista<>usuario` (`usuario_id`),
  ADD KEY `fk_revista<>topicos` (`topicos_id`);

--
-- Indexes for table `rtabalhos`
--
ALTER TABLE `rtabalhos`
  ADD PRIMARY KEY (`id_rtabalhos`),
  ADD KEY `fk_rtabalhos<>usuario` (`usuario_id`);

--
-- Indexes for table `topicos`
--
ALTER TABLE `topicos`
  ADD PRIMARY KEY (`id_topicos`),
  ADD KEY `fk_topicos<>usuario` (`usuario_id`);

--
-- Indexes for table `trabalho`
--
ALTER TABLE `trabalho`
  ADD PRIMARY KEY (`id_trabalho`),
  ADD KEY `fk_trabalho<>usuario` (`usuario_id`);

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
-- Indexes for table `volumes`
--
ALTER TABLE `volumes`
  ADD PRIMARY KEY (`id_volumes`),
  ADD KEY `fk_volumes<>usuario` (`usuario_id`),
  ADD KEY `fk_volumes<>revista` (`revista_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apostilas`
--
ALTER TABLE `apostilas`
  MODIFY `id_apostilas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `livros`
--
ALTER TABLE `livros`
  MODIFY `id_livros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `nivel_acesso`
--
ALTER TABLE `nivel_acesso`
  MODIFY `id_nivel_acesso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notificacoes`
--
ALTER TABLE `notificacoes`
  MODIFY `id_notificacoes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `notificacoes_config`
--
ALTER TABLE `notificacoes_config`
  MODIFY `id_notificacoes_config` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `notificacoes_pendentes`
--
ALTER TABLE `notificacoes_pendentes`
  MODIFY `id_notificacoes_pendentes` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notificacoes_salvas`
--
ALTER TABLE `notificacoes_salvas`
  MODIFY `id_notificacoes_salvas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `relatorios`
--
ALTER TABLE `relatorios`
  MODIFY `id_relatorios` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `relatorio_tabela`
--
ALTER TABLE `relatorio_tabela`
  MODIFY `id_relatorio_tabela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `revista`
--
ALTER TABLE `revista`
  MODIFY `id_revista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rtabalhos`
--
ALTER TABLE `rtabalhos`
  MODIFY `id_rtabalhos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `topicos`
--
ALTER TABLE `topicos`
  MODIFY `id_topicos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `trabalho`
--
ALTER TABLE `trabalho`
  MODIFY `id_trabalho` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `upload_arq`
--
ALTER TABLE `upload_arq`
  MODIFY `id_upload_arq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `volumes`
--
ALTER TABLE `volumes`
  MODIFY `id_volumes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `apostilas`
--
ALTER TABLE `apostilas`
  ADD CONSTRAINT `fk_apostilas<>topicos` FOREIGN KEY (`topicos_id`) REFERENCES `topicos` (`id_topicos`),
  ADD CONSTRAINT `fk_apostilas<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `livros`
--
ALTER TABLE `livros`
  ADD CONSTRAINT `fk_livros<>topicos` FOREIGN KEY (`topicos_id`) REFERENCES `topicos` (`id_topicos`),
  ADD CONSTRAINT `fk_livros<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `nivel_acesso`
--
ALTER TABLE `nivel_acesso`
  ADD CONSTRAINT `fk_nivel_acesso<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD CONSTRAINT `fk_notificacoes<>notificacoes_config` FOREIGN KEY (`notificacoes_config_id`) REFERENCES `notificacoes_config` (`id_notificacoes_config`);

--
-- Limitadores para a tabela `notificacoes_config`
--
ALTER TABLE `notificacoes_config`
  ADD CONSTRAINT `fk_notificacoes_config<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `notificacoes_pendentes`
--
ALTER TABLE `notificacoes_pendentes`
  ADD CONSTRAINT `fk_notificacoes_pendentes<>notificacoes_config` FOREIGN KEY (`notificacoes_config_id`) REFERENCES `notificacoes_config` (`id_notificacoes_config`);

--
-- Limitadores para a tabela `notificacoes_salvas`
--
ALTER TABLE `notificacoes_salvas`
  ADD CONSTRAINT `fk_notificacoes_salvas<>notificacoes_config` FOREIGN KEY (`notificacoes_config_id`) REFERENCES `notificacoes_config` (`id_notificacoes_config`);

--
-- Limitadores para a tabela `revista`
--
ALTER TABLE `revista`
  ADD CONSTRAINT `fk_revista<>topicos` FOREIGN KEY (`topicos_id`) REFERENCES `topicos` (`id_topicos`),
  ADD CONSTRAINT `fk_revista<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `rtabalhos`
--
ALTER TABLE `rtabalhos`
  ADD CONSTRAINT `fk_rtabalhos<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `topicos`
--
ALTER TABLE `topicos`
  ADD CONSTRAINT `fk_topicos<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `trabalho`
--
ALTER TABLE `trabalho`
  ADD CONSTRAINT `fk_trabalho<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario<>nivel_acesso` FOREIGN KEY (`nivel_acesso_id`) REFERENCES `nivel_acesso` (`id_nivel_acesso`);

--
-- Limitadores para a tabela `volumes`
--
ALTER TABLE `volumes`
  ADD CONSTRAINT `fk_volumes<>revista` FOREIGN KEY (`revista_id`) REFERENCES `revista` (`id_revista`),
  ADD CONSTRAINT `fk_volumes<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
