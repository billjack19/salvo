-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19-Fev-2018 às 13:21
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cdi_web`
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

--
-- Extraindo dados da tabela `adicional_site`
--

INSERT INTO `adicional_site` (`id_adicional_site`, `titulo_adicional_site`, `descricao_adicional_site`, `imagem_adicional_site`, `saiba_mais_id`, `usuario_id`, `data_atualizacao_adicional_site`, `bool_ativo_adicional_site`) VALUES
(1, ' ', '<a href=''http://www.amfiosecabos.com.br/''  target=''_blank''>AM Fios & Cabos\n</a>', 'amfiosLg.png', 1, 1, '2018-02-02 13:45:04', 1),
(2, ' ', '<a href=''http://www.cafepocos.com.br/''  target=''_blank''>\nCaféPoços<br>\n</a>\n', 'cafepocosLg.png', 1, 1, '2018-02-02 13:47:41', 1),
(3, ' ', '<a href=''http://minassystem.com.br/''  target=''_blank''>\nMinas System\n</a>', 'minas_system.png', 1, 1, '2018-02-02 13:49:09', 1),
(4, ' ', '<a href=''http://construtorabrothers.com.br/''  target=''_blank''>\nConstrutora Brothers\n</a>', 'LogoBrothers.png', 1, 1, '2018-02-02 13:45:39', 1),
(5, ' ', ' ItaPostes', 'itapostes.jpg', 1, 1, '2018-02-07 08:04:08', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cards`
--

CREATE TABLE `cards` (
  `id_cards` int(11) NOT NULL,
  `titulo_cards` varchar(100) NOT NULL,
  `descricao_cards` text,
  `descricao_item_cards` text,
  `imagem_cards` varchar(100) NOT NULL,
  `sequencia_cards` int(11) NOT NULL,
  `configurar_site_id` int(11) NOT NULL,
  `data_atualizacao_cards` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_cards` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cards`
--

INSERT INTO `cards` (`id_cards`, `titulo_cards`, `descricao_cards`, `descricao_item_cards`, `imagem_cards`, `sequencia_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES
(1, 'Soluções para Almoxarifado', 'Controle de Estoque<br>Controle de Armazenamento de Bags<br>Controle de Matéria prima de Produção', NULL, 'Estoque.jpg', 2, 1, '2018-02-06 14:32:36', 0),
(2, 'Sistema para Controle de Armações Corte/Dobra', '', NULL, 'Aco.jpg', 10, 1, '2018-02-06 15:28:37', 0),
(3, 'Sistema para Controle de Estoque e  Armazenamento', '', NULL, 'Estoque.jpg', 10, 1, '2018-02-06 15:28:35', 0),
(4, 'Sistema para Gerenciamento de Instaladoras', '', NULL, 'Contrucao.jpg', 10, 1, '2018-02-06 15:28:32', 0),
(5, 'Aplicativo para restaurantes', 'Um aplicativo que conversa direto com o banco de dados e mostra a visão geral de como seu estabelecimento está, auxiliando no atendimento e agilizando os processos', 'Desenvolvido em código hibrido com o conceito de aplicação em uma única página atingindo melhor eficiência em processamento, aproveitamento de cache para rapidez e uma interfase intuitiva e fácil de usar', 'card_restaurante2.png', 1, 1, '2018-02-06 16:26:58', 1),
(6, 'Aplicativo para Vendas', 'Um aplicativo para soluções rápidas com uma eficiência fantástica, deixa de lado o papel a agilize seus processos', 'Desenvolvido com código hibrido, realize suas vendas de maneira dinâmica e simples, conversa direto com banco de dados alimentando automaticamente o sistema', 'card_feira_app.png', 2, 1, '2018-02-06 17:25:09', 1),
(7, 'Sistema para Controle de Armazenagem de Café', 'Controle total da posição do café, e interações na nuvem acessando o site o cliente tem acesso ao relatório que mostra a posição de café', '', 'card_armazem_cafe.png', 3, 1, '2018-02-06 17:21:53', 1),
(8, 'Sistema para Controle de Postes', '', NULL, 'card_postes.png', 4, 1, '2018-02-06 15:25:56', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliefornec`
--

CREATE TABLE `cliefornec` (
  `CODIGO` int(11) NOT NULL,
  `CPF_CGC` varchar(18) DEFAULT NULL,
  `RAZAOSOCIAL` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliefornec`
--

INSERT INTO `cliefornec` (`CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`) VALUES
(1, '07623180000107', 'CDI INFORMATICA E ASSESSORIA LTDA.'),
(2, '01552768000130', 'LAVANDERIA MERLI LTDA'),
(4, '23641822000157', 'COOPERATIVA REG. DOS CAF. DE POÇOS DE CALDAS (CAFEPOCOS)'),
(6, '00754369000190', 'RIO BRANCO DISTRIBUIDORA LTDA'),
(22, '00000000000000', 'FUSAO DISTRIBUIDOR DE FILTROS E LUBRIFICANTES'),
(23, '07447587000120', 'METROPOLE CONSULTORIA DE IMOVEIS LTDA'),
(30, '05274169000153', 'ARMAZENS GERAIS GUAXUPE LTDA (COCAFE)'),
(39, '23252836000189', 'ELEVEM ELEVADORES LTDA'),
(41, '07493066000100', 'COMERCIO E IND. ITAPOSTES DE ART. CONCRETO LTDA'),
(48, '03311308000146', 'SJT CONSTRUTORA E INCORPORADORA LTDA'),
(50, '03507989000112', 'FERREIRA IND. E COM. DE ALIMENTOS LTDA'),
(51, '05413999000114', 'SEIVA ART. EMBALAGENS LTDA'),
(52, '00000000000', 'SOLAR MINAS LTDA'),
(53, '00000000000', 'ELLOFER PRODUTOS SIDERURGICOS LTDA'),
(59, '05205014000165', 'MARCELO HERBE JAUCH ME - MHJ VIDROS'),
(61, '23647688000100', 'FRIGORIFICO NOSSA SENHORA DA SAUDE'),
(63, '00000000000', 'BOLONHA COM. E DISTRIB. PROD. ALIMENTICIOS LTDA'),
(65, '09174812000128', 'FORT PECAS INDUSTRIA E COMERCIO LTDA'),
(66, '17853011000117', 'COMERCIAL BANDEIRANTES - SANTA FÉ'),
(67, '04909704000132', 'PIUCA INDUSTRIA E COMERCIO DE ART. DE CONCRETO LTDA'),
(68, '01683591000101', 'EMSERE CONSTRUÇÕES LTDA'),
(81, '00000000000', 'ACOBAN ACO E FERRO LTDA'),
(83, '10238275000111', 'ITAMARATI ARTEFATOS DE PAPEL LTDA'),
(87, '05609059000103', 'MP TRELICAS COM.DE FERRO E ACO LTDA'),
(88, '00000000000', 'JARDIM THELMA COM DE FERRO E ACO LTDA'),
(89, '10376365000179', 'FICAPOCOS - FIOS E CABOS LTDA'),
(90, '01339808000160', 'INDUSTRIA DE PANIFICAÇÃO NEWBREAD LTDA'),
(100, '00000000000000', 'PASCHOAL POMARICO NETO'),
(109, '05882316000178', 'FERRAMAR'),
(111, '09079216000169', 'SUSPIRO DOURADO'),
(112, '64637499000125', 'GPAUTO MECÂNICA LTDA'),
(118, '04773004000163', 'COMPUINFO INFORMATICA LTDA'),
(124, '04766398000122', 'TRELIMAX IND. E COM. LTDA'),
(126, '11129295000117', 'AWA PRODUÇÕES LTDA'),
(128, '25863721000156', 'OXICOPER LTDA.'),
(130, '00000000000000', 'CLIENTES NFE'),
(131, '00000000000', 'DIAS CONTABILIDADE - LOURIVAL'),
(132, '00000000000000', 'RADIAL (GOLDPNEUS)'),
(133, '07135386000198', 'COMERCIAL TAMBAU'),
(134, '10927656000108', 'ITOY DISTRIBUIDORA LTDA'),
(135, '00000000000000', 'CASA DOS PISOS'),
(136, '00000000000000', 'LINGUICAS UAY'),
(137, '00000000000000', 'EMPORIO DO PEIXE'),
(138, '11296496000109', 'ACOS 4000'),
(139, '04982015000153', 'PAPELARIA KARAMBOLLAS'),
(140, '00000000000', 'DOCE GIGANTE'),
(141, '00000000000000', 'MARCENARIA SAO JORGE'),
(142, '00000000000000', 'INFORMATIZE'),
(143, '05972868000177', 'DISTRI-ROLL DISTRIBUIDORA DE ROLAMENTOS LTDA POÇOS'),
(144, '00000000000000', 'SORVETERIA NEVADA'),
(145, '64474380000189', 'PLASTIPOCOS'),
(146, '09459440000186', 'AM FIOS E CABOS'),
(149, '00000000000', 'CLIENTES FATURAMENTO GENÉRICO'),
(150, '00000000000000', 'IMOBILIARIA MINAS CENTRO'),
(151, '00000000000000', 'DOCES FAZENDA DE MINAS (MILKFRUT)'),
(152, '07891601000180', 'MGM CAMISETAS LTDA'),
(153, '00000000000000', 'ITAMARATI ESTOQUE'),
(154, '23647811000184', 'CASA DUARTE LTDA'),
(155, '14481967000147', 'HIDROSSOL POÇOS LTDA - ME'),
(156, '14482013000159', 'STRADA VEICULOS LTDA - ME'),
(157, '17856162000129', 'FORMAT FORNECEDORA DE MATERIAIS LTDA'),
(159, '74206343000305', 'DOMINGOS FERREIRA DE BRITO VESTUARIO ME'),
(160, '21867049000116', 'USIFER TERMO CONEXOES LTDA'),
(161, '41825506000117', 'SEM CENSURA / PASSARELA / SEM CENSURA CASA'),
(162, '08937662000102', 'CLAUDINEI DE SOUZA'),
(163, '07741896000109', 'CHICO VEICULOS LTDA'),
(164, '19834332000108', 'NOSSO PAO PRODUTOS ALIMENTICIOS LTDA'),
(165, '41903436000178', 'GOOD PRODUTOS ALIMENTICIOS LTDA'),
(166, '05662609000140', 'NOSSO PÃO PANIFICADORA E LANCHONETE LTDA'),
(167, '05662609000220', 'NOSSO PÃO PANIFICADORA E LANCHONETE LTDA - FILIAL'),
(168, '09216030000104', 'MARCEL DE MELLO FERNANDES'),
(169, '05799555000169', 'NIZE PEREIRA - ME'),
(170, '06232964000141', 'MARCIO LUIZ VIEIRA PEDRO - ME'),
(171, '00000000000', 'LUIZ FELIPI FERREIRA - CEI 50.045.57681.07'),
(172, '11313807000109', 'MELLO E FERNANDES CURSOS E TREINAMENTOS LTDA'),
(173, '13084500000109', 'CARMINHO DE SOUZA'),
(174, '13101599000100', 'POÇOS GRILL RESTAURANTE E PIZZARIA LTDA'),
(175, '46210258000202', 'COMERCIAL BANDEIRANTES DE BATERIAS LTDA'),
(176, '00000000000000', 'CLAUDIA TASSOTI KRAUSS'),
(177, '03836248000185', 'MERITUM EVENTOS LTDA.'),
(178, '00000000000000', 'LORO PNEUS'),
(179, '00000000000', 'JG ATACADISTA LTDA - EPP'),
(180, '21668504000154', 'JAVA COMERCIO DE BEBIDAS LTDA'),
(181, '11479745000100', 'BARBI DO BRASIL LTDA.'),
(182, '00000000000000', 'DISTRI-ROLL DISTRIBUIDORA DE ROLAMENTOS LTDA ARCOS'),
(183, '00000000000000', 'DISTRI-ROLL DISTRIBUIDORA DE ROLAMENTOS LTDA MOGI'),
(184, '00000000000000', 'DISTRI-ROLL DISTRIBUIDORA DE ROLAMENTOS LTDA SJDR'),
(185, '14255951000116', 'MHJ GLASS COMPANY'),
(186, '03550509000104', '2R PARTICIPAÇÕES LTDA'),
(187, '00000000000', 'CASA DAS COLAS LTDA - ME'),
(188, '11273920000108', 'ENGEKIT SOLUCOES TECNICAS LTDA.'),
(189, '60500212000160', 'SANHIDREL-ENGEKIT SOLUCOES TECNICAS LTDA.'),
(190, '59146878000182', 'MENSMEN INDUSTRIAL LTDA - ME (GRAMPOS POP)'),
(191, '65380321000104', 'CALDENSE EMBALAGENS LTDA'),
(192, '65289472000151', 'HIDROLIFE COMERCIAL LTDA'),
(193, '11262749000123', 'JR REPRESENTAÇÕES LTDA (ZECÃO PETSHOP)'),
(194, '19622464000168', 'RB TRANSPORTE E LOGISTICA EIRELI - ME'),
(195, '17656885000184', 'CERAMICA INDUSTRIAL CALDAS LTDA'),
(196, '59335828000143', 'CARLINHOS COM. DE FERRO E ACO LTDA'),
(197, '00000000000000', 'ATELIÊ L''ARTE (LARTE)'),
(198, '00000000000000', 'JP ATLETA (CASA DO ATLETA 2)'),
(199, '19963982000145', 'METIER ADEGAS LTDA EPP'),
(200, '21657627000190', '0800 CENTRO AUTOMOTIVO LTDA - ME (J E M)'),
(201, '21389388000134', 'PREVIFER'),
(202, '22026818000116', 'UP ELEVADORES LTDA'),
(203, '22151826000194', 'MERI MARIA JOSÉ DA SILVA (VIP COSMETICOS)'),
(204, '18534285000106', 'CASA DO ATLETA 1'),
(205, '00000000000000', 'CASA DO ATLETA 4'),
(206, '00000000000000', 'COMERCIAL FORTALEZA LTDA'),
(207, '24322070000124', 'BARRETO COMERCIO DE FERRAMENTAS LTDA'),
(208, '72784960000109', 'ARAGUAIA COMERCIAL DE FERRO E ACO LTDA.'),
(209, '00000000000000', 'POINT DAS PANQUECAS'),
(210, '26639337000137', 'FOGO PREMIUM FRUIT LTDA-ME'),
(211, '19436728000199', 'MINI MERCADO TRIUNFO'),
(212, '18031668000161', 'VEST BEM MODAS'),
(213, '00000000000000', 'GIPARTS'),
(214, '28166360000187', 'PERFORMANCE POLIMEROS LTDA - ME(BBF)'),
(215, '28105033000115', 'ZB INDUSTRIA DE ARTEFATOS PARA PETS LTDA - ME'),
(217, '15741801000185', 'MV SOLAR LTDA - ME'),
(218, '19014786000124', 'SANTA CASA DE MISERICÓRDIA DE CALDAS'),
(219, '00000000000000', 'MINAS SYSTEM');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliefornec_telefone`
--

CREATE TABLE `cliefornec_telefone` (
  `Cliente` int(11) NOT NULL,
  `Sequencia` int(11) NOT NULL,
  `Telefone` char(10) DEFAULT NULL,
  `EMail` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliefornec_telefone`
--

INSERT INTO `cliefornec_telefone` (`Cliente`, `Sequencia`, `Telefone`, `EMail`) VALUES
(1, 0, '3599109416', 'tpef2003@yahoo.com.br'),
(1, 1, '0000000000', 'tpef2003@yahoo.com.br'),
(1, 2, '0000000000', 'SUPORTE_CDI02@HOTMAIL.COM'),
(1, 3, '3591871219', 'suportecdi03@outlook.com'),
(1, 4, '3591650804', ''),
(2, 0, '3537121151', 'lav.merli@yahoo.com.br'),
(4, 0, '3537221250', 'camara@cafepocos.com.br'),
(6, 0, '3537225448', ''),
(6, 1, '3537225448', ''),
(6, 2, '3588364030', ''),
(6, 3, '3537153755', ''),
(22, 0, '3537222733', ''),
(23, 0, '3537221020', 'francis@metropole.com.br'),
(23, 1, '0000000000', 'rose@imetropole.com.br'),
(23, 2, '0000000000', 'debora@imetropole.com.br'),
(30, 0, '3535515931', 'marina@ribeirodovale.com.br'),
(39, 0, '3537142950', 'elevemelevadores@hotmail.com'),
(39, 1, '3599874934', ''),
(41, 0, '1147757245', 'claudio.martins@itapostes.com.br'),
(41, 1, '1146679444', 'financeiro@itapostes.com.br'),
(41, 2, '0000000000', 'fabricio@itapostes.com.br'),
(41, 3, '0000000000', 'vendas@itapostes.com.br'),
(48, 0, '3537216494', 'sjtconst@veloxmail.com.br'),
(50, 0, '3532651968', 'suspirodourado.mel@hotmail.com'),
(51, 0, '3537297300', 'financeiroseiva@pocos-net.com.br'),
(51, 1, '0000000000', 'ejmolinari@uol.com.br'),
(51, 2, '0000000000', 'comercialseiva@pocos-net.com.br'),
(52, 0, '3537131352', 'scosta@barbi.ind.br'),
(52, 1, '3599877124', ''),
(52, 2, '3537134007', 'vbazan@barbi.ind.br'),
(52, 3, '0000000000', 'fduarte@barbi.ind.br'),
(52, 4, '0000000000', 'emartoni@barbi.ind.br'),
(52, 5, '0000000000', 'ibatista@barbi.ind.br'),
(52, 6, '0000000000', 'fmazza@barbi.ind.br'),
(52, 7, '0000000000', 'engaplicacao@solarminas.com.br'),
(52, 8, '0000000000', 'fiscal@solarminas.com.br'),
(52, 9, '0000000000', 'instalacao@solarminas.com.br'),
(52, 10, '0000000000', 'carolina@solarminas.com.br'),
(52, 11, '0000000000', 'controle@solarminas.com.br'),
(52, 12, '0000000000', 'programacao@solarminas.com.br'),
(52, 13, '0000000000', 'moacir.mscont@gmail.com'),
(52, 14, '0000000000', 'grandesobras@solarminas.com.br'),
(52, 15, '0000000000', 'thiago.verolla@solarminas.com.br'),
(52, 16, '0000000000', 'transportes@solarminas.com.br'),
(52, 17, '0000000000', 'programacao@solarminas.com.br'),
(52, 18, '0000000000', 'recursoshumanos@solarminas.com.br'),
(52, 19, '0000000000', 'dp@solarminas.com.br'),
(52, 20, '0000000000', 'qualidade@solarminas.com.br'),
(52, 21, '0000000000', 'sat1@solarminas.com.br'),
(52, 22, '3599131598', 'andre.rodrigues@solarminas.com.br'),
(53, 0, '1142334444', ''),
(53, 1, '1140611825', 'engenharia@ellofer.com.br'),
(53, 2, '0000000000', 'sueli@ellofer.com.br'),
(53, 3, '1142334436', ''),
(53, 4, '0000000000', 'michele@ellofer.com.br'),
(53, 5, '0000000000', 'marcelo@ellofer.com.br'),
(59, 0, '1125798305', 'mhjvidros@mhjvidros.com.br'),
(59, 1, '1178808599', 'diretoria@mhjvidros.com.br'),
(61, 0, '3537158102', 'marco@frigonossa.com.br'),
(61, 1, '3537158000', ''),
(61, 2, '3537139320', ''),
(61, 3, '3591079355', 'josebenedito@frigonossa.com.br'),
(61, 4, '3537158045', 'custos@frigonossa.com.br'),
(63, 0, '3537218306', ''),
(65, 0, '3537141312', ''),
(65, 1, '0000000000', 'fortluz@uol.com.br'),
(66, 0, '3537221370', 'santafedistribuidora@hotmail.com'),
(67, 0, '1146666143', 'financeiro@piucablocos.com.br'),
(67, 1, '1146666143', 'atendimento@piucablocos.com.br'),
(68, 0, '3537141970', ''),
(68, 1, '3588625119', 'scalenghe@emsere.com.br'),
(81, 0, '1146695000', ''),
(81, 1, '1146695000', 'joaovalter@acoban.com.br'),
(81, 2, '0000000000', 'vendas@acoban.com.br'),
(81, 3, '0000000000', 'marines@acoban.com.br'),
(83, 0, '3537135657', ''),
(83, 1, '3537153755', 'riobranco@riobrancodistribuidora.com.br'),
(83, 2, '3588364030', ''),
(83, 3, '3537135657', 'riobranco.joao@hotmail.com'),
(83, 4, '3537225448', ''),
(83, 5, '0000000000', 'itamarati.silvia@hotmail.com'),
(83, 6, '0000000000', 'comercial@riobrancodistribuidora.com.br'),
(83, 7, '0000000000', 'contas.receber@riobrancodistribuidora.com.br'),
(83, 8, '0000000000', 'riobranco.marcia@gmail.com'),
(83, 9, '0000000000', 'alisonalonso5@gmail.com'),
(87, 0, '1139844541', 'zavitoskijr@gmail.com'),
(88, 0, '1143595000', 'vanderson@thelmafer.com.br'),
(89, 0, '3537222717', 'ficapocos@yahoo.com.br'),
(89, 1, '3537222717', 'moacirsiqueira@ibest.com.br'),
(90, 0, '3537131880', 'missassi@hotmail.com'),
(100, 0, '3537226790', ''),
(100, 1, '3588632035', ''),
(109, 0, '1143354449', 'vanderson@thelmafer.com.br'),
(111, 0, '3534511407', 'suspirodourado@hotmail.com'),
(111, 1, '0000000000', 'suspirodourado.mel@hotmail.com'),
(112, 0, '1182986163', ''),
(112, 1, '1137714435', 'gpauto@msn.com'),
(118, 0, '1141652625', 'albricas@hotmail.com'),
(124, 0, '1139461366', ''),
(124, 1, '1139419302', 'fiscal@trelimax.com.br'),
(124, 2, '1197976600', ''),
(126, 0, '3536975565', ''),
(128, 0, '3537222203', ''),
(128, 1, '3537143317', ''),
(128, 2, '1936222423', ''),
(128, 3, '1938312913', ''),
(128, 4, '3535313472', ''),
(128, 5, '0000000000', 'contasareceber@oxicoper.com.br'),
(128, 6, '0000000000', 'mclaudia.oxicoper@hotmail.com'),
(128, 7, '0000000000', 'financeiro@oxicoper.com.br'),
(128, 8, '0000000000', 'controledecilindros@oxicoper.com.br'),
(130, 0, '._________', '.'),
(131, 0, '7879856448', ''),
(131, 1, '3591070451', ''),
(131, 2, '3537147956', ''),
(132, 0, '3591920992', 'eduloro@terra.com.br'),
(132, 1, '3537122700', 'tatiane.radialpneus@hotmail.com'),
(133, 0, '1131239281', ''),
(133, 1, '1131239299', 'financeiro@tambaudiesel.com.br'),
(133, 2, '1155217900', ''),
(133, 3, '1131239299', 'nfe@tambaudiesel.com.br'),
(133, 4, '1194075156', 'Whatsapp'),
(134, 0, '1146992767', ''),
(134, 1, '1146992554', ''),
(135, 0, '3572111111', ''),
(136, 0, '3537221810', ''),
(137, 0, '3537216951', ''),
(138, 0, '1129474000', '2r.administrativo@2rpart.com.br'),
(138, 1, '1129474008', 'wander@aco4000.com.br'),
(138, 2, '0000000000', 'auxiliar@aco4000.com.br'),
(138, 3, '0000000000', 'notafiscal@aco4000.com.br'),
(138, 4, '0000000000', 'gerente@aco4000.com.br'),
(138, 5, '0000000000', 'assistente@aco4000.com.br'),
(138, 6, '0000000000', 'pessoal@aco4000.com.br'),
(138, 7, '0000000000', 'faturamento02@aco4000.com.br'),
(138, 8, '0000000000', 'fiscal@aco4fer.com.br'),
(139, 0, '3537144413', 'karambollas_pap@hotmail.com'),
(139, 1, '3588155573', ''),
(140, 0, '3537341206', 'docesgigante@docesgigante.com.br'),
(140, 1, '0000000000', 'contato@liberoalencar.com.br'),
(141, 0, '3537141548', 'carla@saojorgemarcenaria.com.br'),
(142, 0, '3537147748', ''),
(143, 0, '3599613394', 'joao.alves@distriroll.com.br'),
(143, 1, '3537143409', 'mayara@distriroll.com.br'),
(143, 2, '3733515327', ''),
(143, 3, '3233718069', 'isabela@roltec.net'),
(143, 4, '0000000000', 'dalcy@distriroll.com.br'),
(143, 5, '0000000000', 'financeiro@distriroll.com.br'),
(144, 0, '3537131470', 'nevada@uai.com.br'),
(145, 0, '3537222163', 'plastipocos@bol.com.br'),
(145, 1, '3591836222', ''),
(146, 0, '3537220808', 'andresa@amfiosecabos.com.br'),
(146, 1, '3588047188', ''),
(149, 0, '0000000000', ''),
(150, 0, '3537212797', 'joseolinto@minascentro.com'),
(150, 1, '3537212797', 'junio@minascentro.com'),
(150, 2, '0000000000', 'will@minascentro.com'),
(151, 0, '3537351381', 'financeiro.fazendademinas@hotmail.com'),
(152, 0, '3537211399', 'contato@mgmcamisetas.com.br'),
(152, 1, '3599874478', 'marcel@mgmcamisetas.com.br'),
(152, 2, '0000000000', 'contasareceber@mgmcamisetas.com.br'),
(152, 3, '0000000000', 'niamara.mgm@hotmail.com'),
(152, 4, '0000000000', 'vendas@mgmcamisetas.com.br'),
(153, 0, '0000000000', ''),
(154, 0, '3537222801', 'viviane@bigstaff.com.br'),
(154, 1, '1932621012', 'casaduarte@pocos-net.com.br'),
(154, 2, '1281378939', ''),
(155, 0, '3599263818', ''),
(155, 1, '3591154488', ''),
(155, 2, '3537135064', ''),
(156, 0, '3537224433', ''),
(156, 1, '3599743399', ''),
(157, 0, '3537215667', 'construtorabrothers@hotmail.com'),
(157, 1, '0000000000', 'alexandre@bgimobiliaria.com.br'),
(157, 2, '0000000000', 'financeiroformat@hotmail.com'),
(157, 3, '0000000000', 'formatloteamentos@hotmail.com'),
(159, 0, '35________', ''),
(160, 0, '3537141844', 'usiferconexoes@gmail.com'),
(160, 1, '3537215335', ''),
(160, 2, '3599845110', ''),
(161, 0, '3537124014', ''),
(161, 1, '3537129897', 'francisdaves@hotmail.com'),
(161, 2, '3537129897', ''),
(162, 0, '3599524240', 'claudinei@cdiinfo.com.br'),
(163, 0, '3537219093', ''),
(163, 1, '3591255072', ''),
(164, 0, '3536975565', ''),
(165, 0, '3536975564', ''),
(166, 0, '3536975564', ''),
(167, 0, '3536975564', ''),
(168, 0, '3536975565', ''),
(169, 0, '3536975565', ''),
(170, 0, '3536975565', ''),
(171, 0, '3536975565', ''),
(172, 0, '3536975565', ''),
(173, 0, '3537132267', ''),
(174, 0, '3537123584', ''),
(174, 1, '3537124486', ''),
(175, 0, '3536975565', ''),
(176, 0, '3536975565', ''),
(177, 0, '3537144506', ''),
(177, 1, '3591320534', ''),
(177, 2, '3588794972', ''),
(177, 3, '0000000000', 'dayanne_teofilo@hotmail.com'),
(177, 4, '0000000000', 'administracao@meritumeventos.com.br'),
(177, 5, '0000000000', 'financeiro@meritumeventos.com.br'),
(178, 0, '3591920992', 'adalberto.duloro@gmail.com'),
(179, 0, '3537431311', ''),
(179, 1, '3599040799', 'GAF@JGATACADISTA.COM.BR'),
(179, 2, '0000000000', 'cobranca@jgatacadista.com.br'),
(179, 3, '0000000000', 'financeiro@jgatacadista.com.br'),
(179, 4, '0000000000', 'faturamento@jgatacadista.com.br'),
(179, 5, '3584019495', ''),
(180, 0, '3500000000', ''),
(181, 0, '1145966582', 'scosta@barbi.ind.br'),
(181, 1, '1198693276', ''),
(181, 2, '0000000000', 'vbazan@barbi.ind.br'),
(181, 3, '0000000000', 'fduarte@barbi.ind.br'),
(181, 4, '0000000000', 'emartoni@barbi.ind.br'),
(181, 5, '0000000000', 'ibatista@barbi.ind.br'),
(181, 6, '0000000000', 'fmazza@barbi.ind.br'),
(181, 7, '0000000000', 'rtemoteo@barbi.ind.br'),
(182, 0, '3733514414', ''),
(183, 0, '1938049144', ''),
(184, 0, '3233718069', ''),
(185, 0, '3536975565', '???'),
(186, 0, '3537124213', '2r.administrativo@2rpart.com.br'),
(187, 0, '3537141646', 'financeirocasadascolas@yahoo.com.br'),
(188, 0, '1139311811', ''),
(188, 1, '1139335133', ''),
(188, 2, '1139335170', 'rodrigotemoteo@engekit.com.br'),
(189, 0, '1139335133', 'roberto@engekit.com.br'),
(189, 1, '1139335134', 'adriano@engekit.com.br'),
(189, 2, '1183893003', 'erick@engekit.com.br'),
(189, 3, '0000000000', 'nilton@engekit.com.br'),
(189, 4, '0000000000', 'junior@engekit.com.br'),
(189, 5, '0000000000', 'selma@engekit.com.br'),
(189, 6, '1139335168', 'eduardo@engekit.com.br'),
(189, 7, '0000000000', 'rogeriojacob@engekit.com.br'),
(189, 8, '0000000000', 'alessandra@engekit.com.br'),
(189, 9, '0000000000', 'marcia@engekit.com.br'),
(190, 0, '1124218064', 'pop.vendas@hotmail.com'),
(190, 1, '1196867193', ''),
(190, 2, '1199511599', 'fama.rep@uol.com.br'),
(191, 0, '3536973700', 'sergio@caldenseembalagens.com.br'),
(191, 1, '3536973717', 'julio@caldenseembalagens.com.br'),
(191, 2, '0000000000', 'faturamento@caldenseembalagens.com.br'),
(191, 3, '0000000000', 'priscilla@caldenseembalagens.com.br'),
(191, 4, '0000000000', 'thaynara@caldenseembalagens.com.br'),
(191, 5, '0000000000', 'claudinei_cdi@hotmail.com'),
(192, 0, '3537216468', 'hidrolife1@hotmail.com'),
(193, 0, '3537228524', 'taloliveira@hotmail.com'),
(193, 1, '3537228524', 'contato@zecaopet.com.br'),
(194, 0, '3588364030', 'riobranco@riobrancodistribuidora.com.br'),
(195, 0, '3537132505', 'comercial@cicrefratarios.com.br'),
(196, 0, '1129193056', 'carlinhoscomdeferro@uol.com.br'),
(196, 1, '1199006833', ''),
(197, 0, '3537212886', 'atelielaarte@hotmail.com'),
(197, 1, '3599770660', ''),
(198, 0, '3599002428', ''),
(198, 1, '3591202555', 'joaopaulomerli@hotmail.com'),
(198, 2, '3537219541', ''),
(199, 0, '1188218108', 'julianaertdalava@gmail.com'),
(199, 1, '3537141335', 'financeiro@adegasmetier.com.br'),
(199, 2, '3537142372', 'metier@metieradegas.com.br'),
(200, 0, '3537147070', 'zerooitocentos@outlook.com.br'),
(201, 0, '1126281287', 'pedro@previfer.com.br'),
(202, 0, '1936222447', ''),
(203, 0, '3588785244', 'WhatsApp'),
(203, 1, '3537225244', 'vipdistribuidorameri@outlook.com'),
(204, 0, '3537216460', ''),
(205, 0, '3537126336', ''),
(206, 0, '3534141820', 'comercialfortaleza@outlook.com.br'),
(206, 1, '3599420741', ''),
(207, 0, '1126281287', 'pedro@barretoferramentas.com.br'),
(207, 1, '1139225221', ''),
(208, 0, '1139799393', 'adriana@araguaiaferro.com.br'),
(208, 1, '1198957496', 'adriana@araguaiaferro.com.br'),
(208, 2, '1139799393', ''),
(209, 0, '1111111111', ''),
(210, 0, '3537124265', 'fogopremiumfruits@hotmail.com'),
(211, 0, '3537431038', 'tpef2003@yahoo.com.br'),
(211, 1, '3599705851', 'tpef2003@yahoo.com.br'),
(212, 0, '3598417837', ''),
(213, 0, '3537221234', ''),
(214, 0, '1138011724', 'vinicius@performancepolimeros.com.br'),
(215, 0, '3537143281', 'ZEANTONIO5335@GMAIL.COM'),
(215, 1, '3598753355', ''),
(217, 0, '3591471117', ''),
(218, 0, '3537351125', ''),
(219, 0, '3537126037', '');

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `configurar_site`
--

CREATE TABLE `configurar_site` (
  `id_configurar_site` int(11) NOT NULL,
  `titulo_configurar_site` varchar(100) NOT NULL,
  `titulo_menu_configurar_site` varchar(100) NOT NULL,
  `cor_pagina_configurar_site` varchar(100) NOT NULL,
  `contra_cor_pagina_configurar_site` varchar(100) NOT NULL,
  `imagem_icone_configurar_site` varchar(100) NOT NULL,
  `imagem_logo_configurar_site` varchar(100) NOT NULL,
  `imagem_logo_sm_configurar_site` varchar(100) NOT NULL,
  `bem_vindo_configurar_site` varchar(100) NOT NULL,
  `data_atualizacao_configurar_site` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_configurar_site` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `configurar_site`
--

INSERT INTO `configurar_site` (`id_configurar_site`, `titulo_configurar_site`, `titulo_menu_configurar_site`, `cor_pagina_configurar_site`, `contra_cor_pagina_configurar_site`, `imagem_icone_configurar_site`, `imagem_logo_configurar_site`, `imagem_logo_sm_configurar_site`, `bem_vindo_configurar_site`, `data_atualizacao_configurar_site`, `bool_ativo_configurar_site`) VALUES
(1, 'CDI Informática e Contabilidade', ' ', '#fff;', '#023C54;', 'IconeCDI_48.ico', 'LOGO3.png', 'logo.png', 'Bem Vindo a CDI!', '2018-02-05 14:43:01', 1);

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
(2, 'teste no site Jack', 'teste@teste.teste', 'teste', 'Formulario de Contato - Site CDI Informática & Contabilidade', 'teste', 4, '2018-01-30 16:44:11', 1);

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
(1, 'CDI Informática & Contabilidade', 'logo.png', '2018-01-30 16:33:38', 1, 1);

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
  `telefone_endereco_site` varchar(200) NOT NULL,
  `celular_endereco_site` varchar(200) DEFAULT NULL,
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
(1, 'Rua Ceará', 'Rua Ceará', 149, '', 'Centro', 'Poços de Caldas', 13, '37701-710', '(35) &nbsp;&nbsp;&nbsp; 3114-1177', '(35) 9 9165-0804', '', '<br>\nSegunda - Sexta das  08:00 até 18:00\n<br>\nSábado das 08:00 até 11:30\n', '-21.7820118', '-46.5679125', 1, '2018-02-06 18:02:01', 1);

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `links_uteis`
--

CREATE TABLE `links_uteis` (
  `id_links_uteis` int(11) NOT NULL,
  `descricao_links_uteis` varchar(200) NOT NULL,
  `link_links_uteis` varchar(200) NOT NULL,
  `data_atualizacao_links_uteis` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_links_uteis` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `links_uteis`
--

INSERT INTO `links_uteis` (`id_links_uteis`, `descricao_links_uteis`, `link_links_uteis`, `data_atualizacao_links_uteis`, `usuario_id`, `bool_ativo_links_uteis`) VALUES
(1, 'Ministério do Trabalho', 'http://trabalho.gov.br/', '2018-02-05 10:44:26', 1, 1),
(2, 'Receita Federal do Brasil', 'http://idg.receita.fazenda.gov.br/', '2018-02-05 10:24:04', 1, 1),
(3, 'Simples Nacional', 'http://www8.receita.fazenda.gov.br/SimplesNacional/', '2018-02-05 10:24:04', 1, 1),
(4, 'Correios - Consulta CEP', 'http://www.buscacep.correios.com.br/sistemas/buscacep/', '2018-02-05 10:24:04', 1, 1),
(5, 'Nota Fiscal Eletrônica', 'http://www.nfe.fazenda.gov.br/', '2018-02-05 10:24:04', 1, 1),
(6, 'Cons. Federal de Contabilidade', 'http://portalcfc.org.br/', '2018-02-05 10:24:04', 1, 1),
(7, 'Secretaria da Fazenda - MG', 'http://www.fazenda.mg.gov.br/', '2018-02-05 10:24:04', 1, 1),
(8, 'Junta Comercial - MG', 'https://www.jucemg.mg.gov.br/ibr/', '2018-02-05 10:24:04', 1, 1),
(9, 'CRC - MG', 'http://www.crcmg.org.br/', '2018-02-05 10:24:04', 1, 1),
(10, 'Sescon - MG', 'http://www.sescon-mg.com.br/home/', '2018-02-05 10:24:05', 1, 1),
(11, 'Estado de Minas', 'http://www.em.com.br/', '2018-02-05 10:24:05', 1, 1),
(12, 'Hoje em Dia', 'http://hojeemdia.com.br/', '2018-02-05 10:24:05', 1, 1),
(13, 'Índices de Investimentos', 'http://www.sitecontabil.com.br/investimentos.htm', '2018-02-05 10:24:05', 1, 1),
(14, 'Indicadores Econômicos', 'http://www.debit.com.br/', '2018-02-05 10:24:05', 1, 1),
(15, 'Instituições Financeiras', 'http://www.sitecontabil.com.br/instituicoes_financeiras.htm', '2018-02-05 10:24:05', 1, 1),
(16, 'Índices de Finanças', 'http://www.sitecontabil.com.br/financas.htm', '2018-02-05 10:44:30', 1, 1),
(17, 'Valor Econômico', 'http://www.valor.com.br/', '2018-02-05 10:24:05', 1, 1),
(18, 'Índices, Cotações e Finanças', 'http://economia.uol.com.br/', '2018-02-05 10:24:05', 1, 1),
(19, 'Portal do Empreendedor', 'http://www.portaldoempreendedor.gov.br/', '2018-02-05 10:24:05', 1, 1),
(20, 'Legislação da Receita Federal', 'http://www.receita.fazenda.gov.br/legislacao/legisassunto/default.htm', '2018-02-05 10:24:06', 1, 1),
(21, 'Portal Brasil - Governo Federal', 'http://www.brasil.gov.br/', '2018-02-05 10:24:06', 1, 1),
(22, 'Micro e Pequena Empresa', 'http://www.leigeral.com.br/', '2018-02-05 10:24:06', 1, 1),
(23, 'CNAE Fiscal', 'http://www.receita.fazenda.gov.br/PessoaJuridica/CNAEFiscal/cnaef.htm', '2018-02-05 10:24:06', 1, 1),
(24, 'Sindicatos e Associações', 'http://www.sitecontabil.com.br/sindicatos.htm', '2018-02-05 10:24:06', 1, 1),
(25, 'Conselho Federal de Contabilidade', 'http://cfc.org.br/', '2018-02-05 14:53:25', 1, 1);

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
(1, 'Venha nos fazer uma visita', 'Esperamos por você', 'FundoFinal.jpg', 1, '2018-01-30 10:54:11', 1);

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
(1, 'Nivel Administrador', 'configurar_site+contato+empresa+estado+links_uteis+quem_somos+saiba_mais+videos+cards-configurar_site+destaque_grupo-configurar_site+endereco_site-configurar_site+slide_show-configurar_site+loja-configurar_site+orcamento-cliente_site+item_orcamento-orcamento+topicos_loja-loja+adicional_site-saiba_mais+topicos_cards-cards+upload+mapa+mov+pdf+usuario', '2018-02-06 15:51:57', 1, 1),
(2, 'Nível de contato', 'contato+pdf', '2018-01-30 10:30:56', 1, 1);

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `quem_somos`
--

CREATE TABLE `quem_somos` (
  `id_quem_somos` int(11) NOT NULL,
  `titulo_quem_somos` varchar(200) NOT NULL,
  `descricao_quem_somos` text NOT NULL,
  `imagem_quem_somos` text NOT NULL,
  `data_atualizacao_quem_somos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_quem_somos` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `quem_somos`
--

INSERT INTO `quem_somos` (`id_quem_somos`, `titulo_quem_somos`, `descricao_quem_somos`, `imagem_quem_somos`, `data_atualizacao_quem_somos`, `bool_ativo_quem_somos`) VALUES
(1, 'CDI Informática e Assessoria Ltda', 'Fundada em 05 de outubro de 2005, a CDI Informática e Assessoria Ltda nasceu para oferecer Soluções em Informática e Assessoria Contábil para todos os ramos de atividade.\n<br>\nDesenvolvendo Softwares Personalizados, a CDI possui profissionais totalmente capacitados para atender as necessidades e expectativas dos clientes. Unidos a especialistas em Gestão Contábil, procuramos solucionar as carências do mercado empresarial através de capacitação, cortesia, ética, respeito e uma politica interna de qualidade.\n<br>\nAtendemos a vários ramos de atividade, o que nos proporciona um conhecimento diverso e possibilita o desenvolvimento de sistemas que atendem desde pequenos estabelecimentos à grandes empresas.\n<br>\nAtendendo às necessidades do mercado atual, a CDI investe em novas tecnologias para que os clientes tenham sempre serviços modernos e funcionais.\n<br><br><br><br>', 'ipad-606764.jpg', '2018-01-30 11:14:46', 1);

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
(1, 'Relatório de Contatos', 'contato', 'nome_contato+email_contato+telefone_contato', 'contato_tr_usuario_tr_nome_usuario', '', 1, '2018-01-31 11:44:54', 5, 0, 1);

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
(1, 'cliente_site', '2018-02-06 15:51:57', 1),
(2, 'contato', '2018-02-06 15:51:57', 1),
(3, 'item_orcamento', '2018-02-06 15:51:57', 1),
(4, 'videos', '2018-02-06 15:51:57', 1);

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

--
-- Extraindo dados da tabela `saiba_mais`
--

INSERT INTO `saiba_mais` (`id_saiba_mais`, `descricao_saiba_mais`, `usuario_id`, `data_atualizacao_saiba_mais`, `bool_ativo_saiba_mais`) VALUES
(1, 'Alguns de Nossos Clientes', 1, '2018-02-02 13:46:22', 1);

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
(1, 'CDI Informática & Contabilidade', 'Poços de Caldas', 'MG', '', '', 'cdi@cdiinfo.com.br', 'thiago@cdiinfo.com.br', 'Cdidesenv03@', 'mail.cdiinfo.com.br', 465, 'thiago@cdiinfo.com.br', 'thiago.cdi@Hotmail.com', 'cdiinfo.suporte@gmail.com', 1);

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
(1, 'Informática e Contabilidade', 'Doze dupla para suas soluções', 'info_contab.jpg', 1, '2018-02-02 14:20:19', 1),
(2, 'Soluções Personalizadas', 'Entregamos sob medida', '05.jpg', 1, '2018-01-30 10:57:57', 1),
(3, 'Softwares Personalizados', 'Concretize suas idéias personalizando com software CDI', 'fundo3.jpg', 1, '2018-02-05 13:15:21', 1),
(4, 'Sua empresa em suas mãos', 'Tenha controle total de sua empresa', 'empres_mao.jpg', 1, '2018-02-02 14:01:53', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `topicos_cards`
--

CREATE TABLE `topicos_cards` (
  `id_topicos_cards` int(11) NOT NULL,
  `descricao_topicos_cards` varchar(200) NOT NULL,
  `cards_id` int(200) NOT NULL,
  `data_atualizacao_topicos_cards` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_topicos_cards` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `topicos_cards`
--

INSERT INTO `topicos_cards` (`id_topicos_cards`, `descricao_topicos_cards`, `cards_id`, `data_atualizacao_topicos_cards`, `usuario_id`, `bool_ativo_topicos_cards`) VALUES
(1, 'Suportado no Android', 5, '2018-02-06 16:22:29', 1, 1),
(2, 'Utiliza tecnologias web', 5, '2018-02-06 16:23:35', 1, 1),
(3, 'Troca de informação via Web Service RESTFull', 5, '2018-02-06 16:28:44', 1, 1);

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
(1, 'Enderço', 'Rua Ceará, 149 Centro, Poços de Caldas', 1, '2018-01-30 10:54:59', 1),
(2, 'Telefone', '35 3715-1779', 1, '2018-01-30 10:55:31', 1);

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
(36, 'LogotipoBranca2.png', 'imagem', '2018-01-30 14:06:45', 1),
(37, 'LogotipoBranca3.png', 'imagem', '2018-01-30 14:13:54', 1),
(38, 'logocdipreto.png', 'imagem', '2018-01-30 14:25:50', 1),
(39, 'logocdi.png', 'imagem', '2018-01-30 14:28:50', 1),
(40, 'CDI.png', 'imagem', '2018-01-30 14:32:19', 1),
(41, 'CDI2.png', 'imagem', '2018-01-30 14:35:55', 1),
(42, 'Fundo02.jpg', 'imagem', '2018-01-30 14:40:17', 1),
(46, 'empres_mao.jpg', 'imagem', '2018-01-30 15:08:05', 1),
(50, 'logo.png', 'imagem', '2018-01-30 16:32:53', 1),
(51, 'info_contab.jpg', 'imagem', '2018-02-02 14:06:41', 1),
(52, 'Logotipo.jpg', 'imagem', '2018-02-05 13:23:33', 1),
(53, 'Logotipo.png', 'imagem', '2018-02-05 13:23:38', 1),
(54, 'LogotipoCDI.jpg', 'imagem', '2018-02-05 13:23:43', 1),
(55, 'LogotipoFinal.png', 'imagem', '2018-02-05 13:23:48', 1),
(56, 'LogotipoBranca.png', 'imagem', '2018-02-05 13:23:53', 1),
(57, 'IconeCDI_48.ico', 'imagem', '2018-02-05 13:40:35', 1),
(58, 'LOGO3.png', 'imagem', '2018-02-05 14:42:34', 1),
(59, 'card_restaurante.png', 'imagem', '2018-02-06 14:33:13', 1),
(60, 'card_vendas_app.png', 'imagem', '2018-02-06 14:44:57', 1),
(61, 'card_restaurante2.png', 'imagem', '2018-02-06 14:52:39', 1),
(62, 'card_feira_app.png', 'imagem', '2018-02-06 15:04:36', 1),
(63, 'card_armazem_cafe.png', 'imagem', '2018-02-06 15:17:09', 1),
(64, 'card_postes.png', 'imagem', '2018-02-06 15:25:25', 1),
(65, 'itapostes.jpg', 'imagem', '2018-02-07 08:03:06', 1);

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
(4, 'SITE', 'SIT', '', 1, 1),
(5, 'TESTE JACK', 'TES', '*3DCFB64FE0CB05D63B9AF64492B5CD6269D82EE8', 2, 1);

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
  ADD PRIMARY KEY (`id_cards`);

--
-- Indexes for table `cliefornec`
--
ALTER TABLE `cliefornec`
  ADD PRIMARY KEY (`CODIGO`);

--
-- Indexes for table `cliefornec_telefone`
--
ALTER TABLE `cliefornec_telefone`
  ADD PRIMARY KEY (`Cliente`,`Sequencia`);

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
  ADD PRIMARY KEY (`id_destaque_grupo`);

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
  ADD PRIMARY KEY (`id_endereco_site`);

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
  ADD PRIMARY KEY (`id_item_orcamento`),
  ADD KEY `fk_item_orcamento<>orcamento` (`orcamento_id`),
  ADD KEY `fk_item_orcamento<>item` (`item_id`);

--
-- Indexes for table `links_uteis`
--
ALTER TABLE `links_uteis`
  ADD PRIMARY KEY (`id_links_uteis`),
  ADD KEY `fk_links_uteis<>usuario` (`usuario_id`);

--
-- Indexes for table `loja`
--
ALTER TABLE `loja`
  ADD PRIMARY KEY (`id_loja`);

--
-- Indexes for table `nivel_acesso`
--
ALTER TABLE `nivel_acesso`
  ADD PRIMARY KEY (`id_nivel_acesso`),
  ADD KEY `fk_nivel_acesso<>usuario` (`usuario_id`);

--
-- Indexes for table `orcamento`
--
ALTER TABLE `orcamento`
  ADD PRIMARY KEY (`id_orcamento`);

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
  ADD PRIMARY KEY (`id_slide_show`);

--
-- Indexes for table `topicos_cards`
--
ALTER TABLE `topicos_cards`
  ADD PRIMARY KEY (`id_topicos_cards`),
  ADD KEY `fk_topicos_cards<>usuario` (`usuario_id`),
  ADD KEY `fk_topicos_cards<>cards` (`cards_id`);

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
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `Login` (`login_usuario`),
  ADD KEY `fk_usuario<>nivel_acesso` (`nivel_acesso_id`);

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
  MODIFY `id_adicional_site` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id_cards` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `cliente_site`
--
ALTER TABLE `cliente_site`
  MODIFY `id_cliente_site` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `configurar_site`
--
ALTER TABLE `configurar_site`
  MODIFY `id_configurar_site` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contato`
--
ALTER TABLE `contato`
  MODIFY `id_contato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `destaque_grupo`
--
ALTER TABLE `destaque_grupo`
  MODIFY `id_destaque_grupo` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item_orcamento`
--
ALTER TABLE `item_orcamento`
  MODIFY `id_item_orcamento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `links_uteis`
--
ALTER TABLE `links_uteis`
  MODIFY `id_links_uteis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `loja`
--
ALTER TABLE `loja`
  MODIFY `id_loja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `nivel_acesso`
--
ALTER TABLE `nivel_acesso`
  MODIFY `id_nivel_acesso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orcamento`
--
ALTER TABLE `orcamento`
  MODIFY `id_orcamento` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id_relatorio_tabela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `saiba_mais`
--
ALTER TABLE `saiba_mais`
  MODIFY `id_saiba_mais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
-- AUTO_INCREMENT for table `topicos_cards`
--
ALTER TABLE `topicos_cards`
  MODIFY `id_topicos_cards` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `topicos_loja`
--
ALTER TABLE `topicos_loja`
  MODIFY `id_topicos_loja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `upload_arq`
--
ALTER TABLE `upload_arq`
  MODIFY `id_upload_arq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id_videos` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `adicional_site`
--
ALTER TABLE `adicional_site`
  ADD CONSTRAINT `fk_adicional_site<>saiba_mais` FOREIGN KEY (`saiba_mais_id`) REFERENCES `saiba_mais` (`id_saiba_mais`),
  ADD CONSTRAINT `fk_adicional_site<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `contato`
--
ALTER TABLE `contato`
  ADD CONSTRAINT `fk_contato<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `fk_empresa<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

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
-- Limitadores para a tabela `item_orcamento`
--
ALTER TABLE `item_orcamento`
  ADD CONSTRAINT `fk_item_orcamento<>item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id_item`),
  ADD CONSTRAINT `fk_item_orcamento<>orcamento` FOREIGN KEY (`orcamento_id`) REFERENCES `orcamento` (`id_orcamento`);

--
-- Limitadores para a tabela `links_uteis`
--
ALTER TABLE `links_uteis`
  ADD CONSTRAINT `fk_links_uteis<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `nivel_acesso`
--
ALTER TABLE `nivel_acesso`
  ADD CONSTRAINT `fk_nivel_acesso<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `saiba_mais`
--
ALTER TABLE `saiba_mais`
  ADD CONSTRAINT `fk_saiba_mais<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `topicos_cards`
--
ALTER TABLE `topicos_cards`
  ADD CONSTRAINT `fk_topicos_cards<>cards` FOREIGN KEY (`cards_id`) REFERENCES `cards` (`id_cards`),
  ADD CONSTRAINT `fk_topicos_cards<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `topicos_loja`
--
ALTER TABLE `topicos_loja`
  ADD CONSTRAINT `fk_topicos_loja<>loja` FOREIGN KEY (`loja_id`) REFERENCES `loja` (`id_loja`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario<>nivel_acesso` FOREIGN KEY (`nivel_acesso_id`) REFERENCES `nivel_acesso` (`id_nivel_acesso`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
