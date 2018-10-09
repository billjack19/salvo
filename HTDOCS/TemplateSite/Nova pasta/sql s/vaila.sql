-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01-Fev-2018 às 21:05
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaila`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id_aluno` int(11) NOT NULL,
  `nome_aluno` varchar(100) NOT NULL,
  `data_nascimento_aluno` date NOT NULL,
  `sexo_aluno` enum('Masculino','Feminino') NOT NULL,
  `data_atualizacao_aluno` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_aluno` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id_aluno`, `nome_aluno`, `data_nascimento_aluno`, `sexo_aluno`, `data_atualizacao_aluno`, `usuario_id`, `bool_ativo_aluno`) VALUES
(1, 'Jack Biller', '1997-11-19', 'Masculino', '2018-01-26 11:51:04', 1, 1),
(2, 'Teste', '1998-05-24', 'Masculino', '2018-01-30 08:15:12', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `console`
--

CREATE TABLE `console` (
  `id_console` int(11) NOT NULL,
  `descricao_console` varchar(150) NOT NULL,
  `data_atualizacao_console` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_console` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `console`
--

INSERT INTO `console` (`id_console`, `descricao_console`, `data_atualizacao_console`, `usuario_id`, `bool_ativo_console`) VALUES
(1, 'PS2', '2018-01-23 10:01:34', 1, 1),
(2, 'PC', '2018-01-23 11:02:59', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(11) NOT NULL,
  `descricao_genero` varchar(150) NOT NULL,
  `data_atualizacao_genero` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_genero` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `genero`
--

INSERT INTO `genero` (`id_genero`, `descricao_genero`, `data_atualizacao_genero`, `usuario_id`, `bool_ativo_genero`) VALUES
(1, 'Comedia', '2018-01-23 08:05:16', 1, 1),
(2, 'Terror', '2018-01-30 08:18:09', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogo`
--

CREATE TABLE `jogo` (
  `id_jogo` int(11) NOT NULL,
  `descricao_jogo` varchar(150) NOT NULL,
  `console_id` int(150) NOT NULL,
  `data_atualizacao_jogo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_jogo` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `jogo`
--

INSERT INTO `jogo` (`id_jogo`, `descricao_jogo`, `console_id`, `data_atualizacao_jogo`, `usuario_id`, `bool_ativo_jogo`) VALUES
(1, 'Gta', 1, '2018-01-23 10:01:48', 1, 1),
(2, 'Mortal Kombat', 1, '2018-01-23 11:02:02', 1, 1),
(3, 'GTA', 2, '2018-01-23 11:03:14', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `id_livro` int(11) NOT NULL,
  `descricao_livro` varchar(200) NOT NULL,
  `codigo_livro` varchar(150) NOT NULL,
  `genero_id` int(200) NOT NULL,
  `data_atualizacao_livro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_livro` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`id_livro`, `descricao_livro`, `codigo_livro`, `genero_id`, `data_atualizacao_livro`, `usuario_id`, `bool_ativo_livro`) VALUES
(1, 'O livro', '123', 1, '2018-01-23 08:05:42', 1, 1),
(2, 'O Livro Assombrado', '465', 2, '2018-01-23 08:06:05', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `manhas`
--

CREATE TABLE `manhas` (
  `id_manhas` int(11) NOT NULL,
  `manha_manhas` varchar(100) NOT NULL,
  `descricao_manhas` varchar(150) NOT NULL,
  `jogo_id` int(150) NOT NULL,
  `data_atualizacao_manhas` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_manhas` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `manhas`
--

INSERT INTO `manhas` (`id_manhas`, `manha_manhas`, `descricao_manhas`, `jogo_id`, `data_atualizacao_manhas`, `usuario_id`, `bool_ativo_manhas`) VALUES
(1, 'xyz', 'Ti tonar imortal', 1, '2018-01-23 10:03:17', 1, 1),
(2, 'xasd', 'Fatality', 2, '2018-01-23 11:02:17', 1, 1),
(3, 'qwrer', 'Brutality', 2, '2018-01-23 11:02:49', 1, 1),
(4, 'qweasd', 'Pack de armas', 3, '2018-01-23 11:03:32', 1, 1);

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
(1, 'Nível Administrador', 'aluno+console+genero+jogo+livro+objetivos+operacao_teste+prefixos+manhas-jogo+jogo-console+upload+mapa+mov+pdf+usuario', '2018-01-31 18:02:34', 1, 1),
(2, 'Nível de Aluno', 'aluno+livro', '2018-01-31 10:17:30', 1, 1),
(3, 'Nível Para Vídeo Game', 'console+jogo+manhas-jogo+jogo-console+pdf', '2018-01-31 10:17:37', 1, 1),
(4, 'Ajudante de Jogador', 'console+jogo', '2018-01-29 12:00:41', 7, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `objetivos`
--

CREATE TABLE `objetivos` (
  `id_objetivos` int(11) NOT NULL,
  `titulo_objetivos` varchar(200) NOT NULL,
  `descricao_objetivos` text NOT NULL,
  `data_atualizacao_objetivos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_objetivos` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `objetivos`
--

INSERT INTO `objetivos` (`id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES
(1, 'Gráficos por valor', 'Vou determinar que uma tabela com campo de valor numérico possa renderizar gráfico a partir de seu histórico<br><br>\nPre requisitos: tabela de logs com trigers pre programadas', '2018-01-31 13:21:33', 1, 1),
(2, 'Foto pela webcam do pc', 'Cadastrar nome de fotos tiradas pela webcam do pc e ser capas de tirar e armazena-la no servidor', '2018-01-31 13:22:46', 1, 1),
(3, 'Interfase SO', 'Objetivo de deixar um rodapé fixo na tela com um batão capaz de pesquisar qualquer coisa no sistema e ti levando ao acesso a ela sem precisar de mouse, somente no teclado<br>\nAlém de ícones na pagina principal do sistemas cadastrados pelo próprio usuário', '2018-01-31 13:25:36', 1, 1),
(4, 'Tabela de log', 'tem como finalidade registrar informação anterior na da atualizada', '2018-01-31 13:26:16', 1, 1),
(5, 'Responsividade de tabela', 'deixar as tabelas mais flexíveis a tela em que esta sendo projetada', '2018-01-31 13:26:59', 1, 1),
(6, 'Tabela Cabeçario', 'Tem por objetivo definir algumas pre configurações nos heads de relatórios', '2018-01-31 13:28:06', 1, 1),
(7, 'Movimentação de arquivo', 'Em andamento<br>\nFalta fazer para arquivos de vídeo, áudio e texto', '2018-01-31 13:29:08', 1, 1),
(8, 'Multiplos Uploads', 'A ideia é poder fazer mais de um upload por vez', '2018-01-31 13:29:41', 1, 1),
(9, 'Preenchimento automatica de campos', 'O sistema através de um data poderá preencher automaticamente um campo', '2018-01-31 13:48:09', 1, 1),
(10, 'Logica de negócio', 'O sistema será capaz de executar operações entre campos da tabela e preenche outro campo com o resultado', '2018-01-31 13:49:42', 1, 1),
(11, 'Filtro no cabeçalho da tabela', 'Clicando no cabeçalho ele ordenará os registros de acordo com o cabeçalho, se tiver com seta pra cima ordenará em ordem decrescente e com a seta para baixo ordenará em ordem crescente', '2018-01-31 13:53:09', 1, 1),
(12, 'Mascaras', 'Setar mascaras nos campos', '2018-01-31 14:01:47', 1, 1),
(13, 'Busca por busca', 'Tem um campo e pelo valor desse campo você limita valor de outro campo', '2018-01-31 15:03:32', 1, 1),
(14, 'numerador de registros', 'coluna de numero numerando registro por registro', '2018-01-31 15:16:08', 1, 0),
(15, 'Notificação', 'avisar registros cadastrados recentemente ou registros proximo de uma determinada data', '2018-01-31 15:29:02', 1, 1),
(16, 'Limitar campo numerico', 'Bug para corrigir, nos campos de tipo ''number'' pode-se digitar a quantidade de números que quiser', '2018-01-31 16:33:59', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `operacao_teste`
--

CREATE TABLE `operacao_teste` (
  `id_operacao_teste` int(11) NOT NULL,
  `valor_1_operacao_teste` int(11) NOT NULL,
  `valor_2_operacao_teste` int(11) NOT NULL,
  `resultado_operacao_teste` int(11) NOT NULL,
  `valor_3_operacao_teste` int(11) NOT NULL,
  `valor_4_operacao_teste` int(11) NOT NULL,
  `resultado_2_operacao_teste` int(11) NOT NULL,
  `data_atualizacao_operacao_teste` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_operacao_teste` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `operacao_teste`
--

INSERT INTO `operacao_teste` (`id_operacao_teste`, `valor_1_operacao_teste`, `valor_2_operacao_teste`, `resultado_operacao_teste`, `valor_3_operacao_teste`, `valor_4_operacao_teste`, `resultado_2_operacao_teste`, `data_atualizacao_operacao_teste`, `usuario_id`, `bool_ativo_operacao_teste`) VALUES
(1, 150, 20, 120, 30, 50, 2, '2018-02-01 14:34:11', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prefixos`
--

CREATE TABLE `prefixos` (
  `id_prefixos` int(11) NOT NULL,
  `prefixo_prefixos` varchar(200) NOT NULL,
  `descricao_prefixos` text NOT NULL,
  `data_atualizacao_prefixos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_prefixos` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `prefixos`
--

INSERT INTO `prefixos` (`id_prefixos`, `prefixo_prefixos`, `descricao_prefixos`, `data_atualizacao_prefixos`, `usuario_id`, `bool_ativo_prefixos`) VALUES
(1, 'imagem', 'Serve para referenciar nome de uma imagem no servidor', '2018-01-31 13:13:40', 1, 1),
(2, 'video', 'Serve para referenciar um arquivo de vídeo no servidor', '2018-01-31 13:14:07', 1, 1),
(3, 'audio', 'Serve para referenciar um arquivo de audio no servidor', '2018-01-31 13:14:31', 1, 1),
(4, 'texto', 'Serve para referenciar um arquivo de texto no servidor', '2018-01-31 13:14:58', 1, 1),
(5, 'bool', 'É um campo de verdadeiro ou falso.<br>\nSua formação é de int(1) prédefinido com 1, este campo só recebe valor 1 ou 0 sendo que o 1 serve para verdadeiro e o 0 para falso', '2018-01-31 13:16:40', 1, 1),
(6, 'senha', 'Este campo aparece somente no cadastro e do tipo password, para ser alterado é preciso estar logado ou ter acesso direto ao banco de dados', '2018-01-31 13:18:14', 1, 1);

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
(2, 'Relatório de Manhas de Jogos', 'manhas', 'manha_manhas+descricao_manhas', 'manhas_tr_jogo_tr_descricao_jogo+jogo_tr_console_tr_descricao_console+manhas_tr_usuario_tr_nome_usuario', ' AND (jogo.descricao_jogo LIKE ''%Gta%'') AND (console.descricao_console LIKE ''%PC%'')', 1, '2018-01-26 11:39:47', 1, 0, 1),
(6, 'Relatório de Livros', 'livro', 'descricao_livro+codigo_livro+data_atualizacao_livro', 'livro_tr_genero_tr_descricao_genero+livro_tr_usuario_tr_nome_usuario', NULL, 1, '2018-01-23 15:31:12', 1, 0, 1),
(7, 'teste', 'aluno', 'nome_aluno+data_nascimento_aluno+sexo_aluno', 'aluno_tr_usuario_tr_nome_usuario+aluno_tr_usuario_tr_login_usuario', '', 1, '2018-01-24 14:25:19', 1, 0, 1);

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
(1, 'aluno', '2018-02-01 15:40:42', 1),
(2, 'livro', '2018-02-01 15:40:42', 1),
(3, 'manhas', '2018-02-01 15:40:42', 1);

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
  `nivel_acesso_id` int(11) DEFAULT '1',
  `bool_ativo_usuario` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES
(1, 'ADMINISTRADOR', 'ADM', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 1, 1),
(3, 'JACK', 'JAC', '*531E182E2F72080AB0740FE2F2D689DBE0146E04', 1, 0),
(7, 'JOGADOR', 'JOG', '*7297C3E22DEB91303FC493303A8158AD4231F486', 3, 1),
(8, 'Ajudante de Jogador', 'AJJ', '*68922D0185D8333DA80D814C32E5A04C28CC06D0', 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id_aluno`),
  ADD KEY `fk_aluno<>usuario` (`usuario_id`);

--
-- Indexes for table `console`
--
ALTER TABLE `console`
  ADD PRIMARY KEY (`id_console`),
  ADD KEY `fk_console<>usuario` (`usuario_id`);

--
-- Indexes for table `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`),
  ADD KEY `fk_genero<>usuario` (`usuario_id`);

--
-- Indexes for table `jogo`
--
ALTER TABLE `jogo`
  ADD PRIMARY KEY (`id_jogo`),
  ADD KEY `fk_jogo<>usuario` (`usuario_id`),
  ADD KEY `fk_jogo<>console` (`console_id`);

--
-- Indexes for table `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id_livro`),
  ADD KEY `fk_livro<>usuario` (`usuario_id`),
  ADD KEY `fk_livro<>genero` (`genero_id`);

--
-- Indexes for table `manhas`
--
ALTER TABLE `manhas`
  ADD PRIMARY KEY (`id_manhas`),
  ADD KEY `fk_manhas<>usuario` (`usuario_id`),
  ADD KEY `fk_manhas<>jogo` (`jogo_id`);

--
-- Indexes for table `nivel_acesso`
--
ALTER TABLE `nivel_acesso`
  ADD PRIMARY KEY (`id_nivel_acesso`),
  ADD KEY `fk_nivel_acesso<>ususrio` (`usuario_id`);

--
-- Indexes for table `objetivos`
--
ALTER TABLE `objetivos`
  ADD PRIMARY KEY (`id_objetivos`),
  ADD KEY `fk_objetivos<>usuario` (`usuario_id`);

--
-- Indexes for table `operacao_teste`
--
ALTER TABLE `operacao_teste`
  ADD PRIMARY KEY (`id_operacao_teste`),
  ADD KEY `fk_operacao_teste<>usuario` (`usuario_id`);

--
-- Indexes for table `prefixos`
--
ALTER TABLE `prefixos`
  ADD PRIMARY KEY (`id_prefixos`),
  ADD KEY `fk_prefixos<>usuario` (`usuario_id`);

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
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `console`
--
ALTER TABLE `console`
  MODIFY `id_console` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jogo`
--
ALTER TABLE `jogo`
  MODIFY `id_jogo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `livro`
--
ALTER TABLE `livro`
  MODIFY `id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `manhas`
--
ALTER TABLE `manhas`
  MODIFY `id_manhas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `nivel_acesso`
--
ALTER TABLE `nivel_acesso`
  MODIFY `id_nivel_acesso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `objetivos`
--
ALTER TABLE `objetivos`
  MODIFY `id_objetivos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `operacao_teste`
--
ALTER TABLE `operacao_teste`
  MODIFY `id_operacao_teste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `prefixos`
--
ALTER TABLE `prefixos`
  MODIFY `id_prefixos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `relatorios`
--
ALTER TABLE `relatorios`
  MODIFY `id_relatorios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `relatorio_tabela`
--
ALTER TABLE `relatorio_tabela`
  MODIFY `id_relatorio_tabela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `upload_arq`
--
ALTER TABLE `upload_arq`
  MODIFY `id_upload_arq` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `fk_aluno<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `console`
--
ALTER TABLE `console`
  ADD CONSTRAINT `fk_console<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `genero`
--
ALTER TABLE `genero`
  ADD CONSTRAINT `fk_genero<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `jogo`
--
ALTER TABLE `jogo`
  ADD CONSTRAINT `fk_jogo<>console` FOREIGN KEY (`console_id`) REFERENCES `console` (`id_console`),
  ADD CONSTRAINT `fk_jogo<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `fk_livro<>genero` FOREIGN KEY (`genero_id`) REFERENCES `genero` (`id_genero`),
  ADD CONSTRAINT `fk_livro<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `manhas`
--
ALTER TABLE `manhas`
  ADD CONSTRAINT `fk_manhas<>jogo` FOREIGN KEY (`jogo_id`) REFERENCES `jogo` (`id_jogo`),
  ADD CONSTRAINT `fk_manhas<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `nivel_acesso`
--
ALTER TABLE `nivel_acesso`
  ADD CONSTRAINT `fk_nivel_acesso<>ususrio` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `objetivos`
--
ALTER TABLE `objetivos`
  ADD CONSTRAINT `fk_objetivos<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `operacao_teste`
--
ALTER TABLE `operacao_teste`
  ADD CONSTRAINT `fk_operacao_teste<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `prefixos`
--
ALTER TABLE `prefixos`
  ADD CONSTRAINT `fk_prefixos<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario<>nivel_acesso` FOREIGN KEY (`nivel_acesso_id`) REFERENCES `nivel_acesso` (`id_nivel_acesso`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
