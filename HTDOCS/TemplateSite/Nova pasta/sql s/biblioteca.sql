-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21-Dez-2017 às 20:49
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.5

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
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `ID_ALUNO` int(11) NOT NULL,
  `MATRICULA_ALUNO` varchar(45) NOT NULL,
  `NOME_ALUNO` varchar(30) NOT NULL,
  `EMAIL_ALUNO` varchar(50) DEFAULT NULL,
  `CPF_ALUNO` varchar(25) DEFAULT NULL,
  `RG_ALUNO` varchar(25) DEFAULT NULL,
  `SEXO_ALUNO` varchar(15) NOT NULL,
  `DATA_NASCIMENTO_ALUNO` varchar(15) NOT NULL,
  `TURNO_ALUNO` varchar(15) NOT NULL,
  `TELEFONE_ALUNO` varchar(25) NOT NULL,
  `RECORD_ALUNO` int(11) DEFAULT NULL,
  `ID_NIVEL_ACESSO` int(11) DEFAULT NULL,
  `ANO_ALUNO` varchar(40) NOT NULL,
  `TURMA_ALUNO` varchar(10) NOT NULL,
  `SALA_ALUNO` varchar(25) NOT NULL,
  `NUMERO_LIVROS` int(11) NOT NULL,
  `FREQUENCIA_LIVRO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`ID_ALUNO`, `MATRICULA_ALUNO`, `NOME_ALUNO`, `EMAIL_ALUNO`, `CPF_ALUNO`, `RG_ALUNO`, `SEXO_ALUNO`, `DATA_NASCIMENTO_ALUNO`, `TURNO_ALUNO`, `TELEFONE_ALUNO`, `RECORD_ALUNO`, `ID_NIVEL_ACESSO`, `ANO_ALUNO`, `TURMA_ALUNO`, `SALA_ALUNO`, `NUMERO_LIVROS`, `FREQUENCIA_LIVRO`) VALUES
(1, '8923h92387', 'Harrison Souza Araujo', '', '060.545.076-73', '51.728.201', 'Masculino', '1998-05-24', 'Manhâ', '37 8 9272-9290', 0, 4, '1° ano Ensino Médio', '109', '7 - Sala de Aula', 2, 8),
(2, '0000000000', 'Luis Gustavo L.G', 'luisguh2405@gmail.com', '070.545.076-73', '12.345.678', 'Masculino', '1999-05-24', 'Noite', '35 9 8819-1578', 0, 4, '3° ano Ensino Médio', '01', '7 - Sala de Info', 1, 5),
(4, '0000000001', 'Rafaela Cristina Martin', '', '', '', 'Feminino', '1999-03-05', 'Manhã / Noite', '35 9 9895-5674', 0, 4, '3° ano Ensino Médio', '301', '9 - Sala de Aula', 0, 2),
(5, '434254352', 'Jack Biller da Silva Prado', 'jackbiller@hotmail.com', '234.534.252-34', '23.452.435', 'Masculino', '2017-04-06', 'Manhâ', '32 4 3412-3412', 0, 4, '6° ano Ensino Fundamental', '234', '14 - Sala de Aula', 1, 11),
(7, '8923h92387', 'Gustavo Henrique Messias', 'messias@mail.com', '', '', 'Masculino', '2017-04-19', 'Manhâ', '35 9 8819-1578', 0, 4, '9° ano Ensino Fundamental', '234', '11 - Sala de Video', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ano`
--

CREATE TABLE `ano` (
  `ID_ANO` int(11) NOT NULL,
  `DESCRICAO_ANO` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ano`
--

INSERT INTO `ano` (`ID_ANO`, `DESCRICAO_ANO`) VALUES
(1, '6° ano Ensino Fundamental'),
(2, '7° ano Ensino Fundamental'),
(3, '8° ano Ensino Fundamental'),
(4, '9° ano Ensino Fundamental'),
(5, '1° ano Ensino Médio'),
(6, '2° ano Ensino Médio'),
(7, '3° ano Ensino Médio');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `ID_CADASTRO` int(11) NOT NULL,
  `NOME_CADASTRO` varchar(50) NOT NULL,
  `LOGIN_CADASTRO` varchar(50) NOT NULL,
  `SENHA_CADASTRO` varchar(15) NOT NULL,
  `ID_NIVEL_ACESSO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`ID_CADASTRO`, `NOME_CADASTRO`, `LOGIN_CADASTRO`, `SENHA_CADASTRO`, `ID_NIVEL_ACESSO`) VALUES
(1, 'Grupo de desenvolvedores', 'adminTI', 'admin000', 1),
(3, 'Tia da biblioteca', 'biblioteca', '12345', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE `cargo` (
  `ID_CARGO` int(11) NOT NULL,
  `DESCRICAO_CARGO` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`ID_CARGO`, `DESCRICAO_CARGO`) VALUES
(1, ''),
(2, 'Bibliotecário'),
(3, 'Professor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimo_kit`
--

CREATE TABLE `emprestimo_kit` (
  `ID_EMPRESTIMO_KIT` int(11) NOT NULL,
  `ID_KIT` int(11) NOT NULL,
  `ID_FUNCIONARIO` int(11) NOT NULL,
  `DATA_EMPRESTIMO_KIT` varchar(15) NOT NULL,
  `CODIGO_AULA_EMPRESTIMO_KIT` varchar(5) NOT NULL,
  `STATUS_EMPRESTIMO_KIT` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `emprestimo_kit`
--

INSERT INTO `emprestimo_kit` (`ID_EMPRESTIMO_KIT`, `ID_KIT`, `ID_FUNCIONARIO`, `DATA_EMPRESTIMO_KIT`, `CODIGO_AULA_EMPRESTIMO_KIT`, `STATUS_EMPRESTIMO_KIT`) VALUES
(1, 3, 1, '2017-04-09', 'mh1', 1),
(3, 2, 1, '2017-04-10', 'mh1', 1),
(4, 2, 1, '2017-04-08', 'mh1', 2),
(6, 3, 1, '2017-04-09', 'mh2', 1),
(7, 2, 1, '2017-04-08', 'th3', 1),
(8, 3, 1, '2017-04-10', 'nh4', 1),
(9, 4, 1, '2017-04-10', 'mh3', 1),
(10, 4, 1, '2017-04-10', 'mh2', 1),
(11, 2, 1, '2017-04-10', 'mh2', 1),
(12, 2, 1, '2017-04-08', 'mh1', 1),
(13, 2, 1, '2017-04-10', 'mh3', 1),
(14, 4, 1, '2017-04-10', 'th1', 1),
(15, 2, 1, '2017-04-10', 'nh4', 1),
(16, 2, 1, '2017-04-11', 'th5', 1),
(17, 2, 1, '2017-04-11', 'mh2', 1),
(18, 2, 1, '2017-04-20', 'mh3', 1),
(19, 2, 1, '2017-04-15', 'th1', 1),
(20, 2, 1, '2017-04-15', 'th2', 1),
(21, 2, 1, '2017-04-22', 'mh1', 1),
(22, 2, 1, '2017-04-22', 'th1', 1),
(23, 2, 1, '2017-04-22', 'th2', 1),
(24, 3, 1, '2017-04-22', 'mh1', 1),
(25, 3, 1, '2017-04-22', 'th1', 1),
(26, 3, 1, '2017-04-16', 'mh3', 1),
(27, 4, 1, '2017-10-21', 'nh3', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimo_livro`
--

CREATE TABLE `emprestimo_livro` (
  `ID_EMPRESTIMO_LIVRO` int(11) NOT NULL,
  `ID_LIVRO` int(11) NOT NULL,
  `ID_ALUNO` int(11) DEFAULT NULL,
  `ID_CADASTRO` int(11) NOT NULL,
  `DATA_INICIAL_EMPRESTIMO_LIVRO` varchar(15) NOT NULL,
  `DATA_FINAL_EMPRESTIMO_LIVRO` varchar(15) NOT NULL,
  `STATUS_EMPRESTIMO` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `emprestimo_livro`
--

INSERT INTO `emprestimo_livro` (`ID_EMPRESTIMO_LIVRO`, `ID_LIVRO`, `ID_ALUNO`, `ID_CADASTRO`, `DATA_INICIAL_EMPRESTIMO_LIVRO`, `DATA_FINAL_EMPRESTIMO_LIVRO`, `STATUS_EMPRESTIMO`) VALUES
(1, 1, 1, 1, '2017-04-03', '2017-04-23', 2),
(2, 2, 2, 1, '2017-04-03', '2017-04-23', 2),
(4, 3, 5, 1, '2017-04-06', '2017-04-26', 2),
(5, 4, 4, 3, '2017-04-07', '2017-04-23', 2),
(6, 1, 1, 1, '2017-04-07', '2017-04-26', 2),
(7, 2, 5, 1, '2017-04-07', '2017-04-27', 2),
(8, 1, 5, 1, '2017-04-07', '2017-04-11', 2),
(9, 4, 5, 1, '2017-04-07', '2017-04-16', 2),
(10, 2, 5, 1, '2017-04-07', '2017-04-27', 2),
(11, 3, 2, 1, '2017-04-07', '2017-04-12', 2),
(12, 5, 5, 1, '2017-04-08', '2017-04-28', 2),
(13, 2, 1, 1, '2017-04-11', '2017-04-12', 2),
(14, 1, 2, 1, '2017-04-11', '2017-05-01', 1),
(15, 5, 1, 1, '2017-04-13', '2017-04-14', 2),
(16, 5, 1, 1, '2017-04-13', '2017-04-14', 2),
(17, 5, 1, 1, '2017-04-13', '2017-04-14', 2),
(18, 3, 5, 1, '2017-04-13', '2017-04-14', 2),
(19, 3, 5, 1, '2017-04-13', '2017-04-16', 2),
(20, 3, 5, 1, '2017-04-13', '2017-04-14', 2),
(21, 2, 4, 1, '2017-04-14', '2017-04-14', 2),
(22, 2, 2, 1, '2017-04-15', '2017-04-16', 2),
(23, 3, 2, 1, '2017-04-15', '2017-04-16', 2),
(24, 3, 1, 1, '2017-04-15', '2017-05-06', 1),
(25, 2, 1, 1, '2017-04-15', '2017-05-06', 1),
(26, 5, 5, 1, '2017-04-15', '2017-05-06', 1),
(27, 4, 5, 1, '2017-04-15', '2017-04-18', 2);

--
-- Acionadores `emprestimo_livro`
--
DELIMITER $$
CREATE TRIGGER `tr_LogEmprestimoLivroD` AFTER DELETE ON `emprestimo_livro` FOR EACH ROW BEGIN
SET @str.operacao = 'D';
INSERT INTO log_emprestimo_livro (ID_EMPRESTIMO_LIVRO , ID_LIVRO , ID_ALUNO , ID_CADASTRO , DATA_INICIAL_EMPRESTIMO_LIVRO , DATA_FINAL_EMPRESTIMO_LIVRO , STATUS_EMPRESTIMO , FLTIPOLOG , DATALOG) VALUES (old.ID_EMPRESTIMO_LIVRO , old.ID_LIVRO , old.ID_ALUNO , old.ID_CADASTRO , old.DATA_INICIAL_EMPRESTIMO_LIVRO , old.DATA_FINAL_EMPRESTIMO_LIVRO , old.STATUS_EMPRESTIMO , @str.operacao , now());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_LogEmprestimoLivroI` AFTER INSERT ON `emprestimo_livro` FOR EACH ROW BEGIN
SET @str.operacao = 'I';
INSERT INTO log_emprestimo_livro (ID_EMPRESTIMO_LIVRO , ID_LIVRO , ID_ALUNO , ID_CADASTRO , DATA_INICIAL_EMPRESTIMO_LIVRO , DATA_FINAL_EMPRESTIMO_LIVRO , STATUS_EMPRESTIMO , FLTIPOLOG , DATALOG) VALUES (new.ID_EMPRESTIMO_LIVRO , new.ID_LIVRO , new.ID_ALUNO , new.ID_CADASTRO , new.DATA_INICIAL_EMPRESTIMO_LIVRO , new.DATA_FINAL_EMPRESTIMO_LIVRO , new.STATUS_EMPRESTIMO , @str.operacao , now());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_LogEmprestimoLivroU` AFTER UPDATE ON `emprestimo_livro` FOR EACH ROW BEGIN
SET @str.operacao = 'U';
INSERT INTO log_emprestimo_livro (ID_EMPRESTIMO_LIVRO , ID_LIVRO , ID_ALUNO , ID_CADASTRO , DATA_INICIAL_EMPRESTIMO_LIVRO , DATA_FINAL_EMPRESTIMO_LIVRO , STATUS_EMPRESTIMO , FLTIPOLOG , DATALOG) VALUES (old.ID_EMPRESTIMO_LIVRO , old.ID_LIVRO , old.ID_ALUNO , old.ID_CADASTRO , old.DATA_INICIAL_EMPRESTIMO_LIVRO , old.DATA_FINAL_EMPRESTIMO_LIVRO , old.STATUS_EMPRESTIMO , @str.operacao , now());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimo_livro2`
--

CREATE TABLE `emprestimo_livro2` (
  `ID_EMPRESTIMO_LIVRO2` int(11) NOT NULL,
  `ID_LIVRO` int(11) NOT NULL,
  `ID_FUNCIONARIO` int(11) NOT NULL,
  `ID_CADASTRO` int(11) NOT NULL,
  `DATA_INICIAL_EMPRESTIMO_LIVRO` varchar(15) NOT NULL,
  `DATA_FINAL_EMPRESTIMO_LIVRO` varchar(15) NOT NULL,
  `STATUS_EMPRESTIMO` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `frase_do_dia`
--

CREATE TABLE `frase_do_dia` (
  `ID_FRASE` int(11) NOT NULL,
  `DESCRICAO_FRASE` text NOT NULL,
  `AUTOR_FRASE` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `frase_do_dia`
--

INSERT INTO `frase_do_dia` (`ID_FRASE`, `DESCRICAO_FRASE`, `AUTOR_FRASE`) VALUES
(1, 'Apressa-te a viver bem e pensa que cada dia é, por si só, uma vida.', 'Sêneca'),
(2, 'As casas são construídas para que se viva nelas, não para serem olhadas.', 'Francis Bacon'),
(3, 'É difícil viver com as pessoas porque calar é muito difícil.', 'Friedrich Nietzsche'),
(4, 'Viver sem filosofar é o que se chama ter os olhos fechados sem nunca os haver tentado abrir.', 'René Descartes'),
(5, 'Se vives de acordo com as leis da natureza, nunca serás pobre; se vives de acordo com as opiniões alheias, nunca serás rico.', 'Sêneca'),
(6, 'Trabalha como se vivesses para sempre. Ama como se fosses morrer hoje.', 'Sêneca'),
(7, 'Aquele que vive de combater um inimigo tem interesse em o deixar com vida.', 'Friedrich Nietzsche'),
(8, 'Não vivemos para comer, mas comemos para viver.', 'Sócrates'),
(9, 'Renda-se, como eu me rendi. Mergulhe no que você não conhece como eu mergulhei. Não se preocupe em entender, viver ultrapassa qualquer entendimento.', 'Clarice Lispector'),
(10, 'Apressa-te a viver bem e pensa que cada dia é, por si só, uma vida.', 'Sêneca'),
(11, 'Aprenda como se você fosse viver para sempre. Viva como se você fosse morrer amanhã.', 'Santo Isidoro de Sevilha'),
(12, 'Não viva para que a sua presença seja notada, mas para que a sua falta seja sentida.', 'Bob Marley'),
(13, 'Seja feliz do jeito que você é, não mude sua rotina pelo o que os outros exigem de você, simplesmente viva de acordo com o seu modo de viver.', 'Bob Marley'),
(14, 'Sonhe como se fosse viver para sempre, viva como se fosse morrer amanhã.', 'James Dean'),
(15, 'A vida é maravilhosa se não se tem medo dela.', 'Charles Chaplin'),
(16, 'Falar sem aspas, amar sem interrogação, sonhar com reticências, viver sem ponto final.', 'Charles Chaplin'),
(17, 'O incentivo de viver é arriscar, deixe o medo para os fracos.', 'Charles Chaplin'),
(18, 'Não existe coisa melhor no mundo do que viver, curtir e gozar a vida, que passa rápido e daqui não levaremos nada, a não ser toda a experiência e as amizades.', 'Charles Chaplin'),
(19, 'O importante não é vencer todos os dias, mas lutar sempre.', 'Waldemar Valle Martins'),
(20, 'Maior que a tristeza de não haver vencido é a vergonha de não ter lutado!', 'Rui Barbosa'),
(21, 'É melhor conquistar a si mesmo do que vencer mil batalhas.', 'Buda'),
(22, 'Enquanto houver vontade de lutar haverá esperança de vencer.', 'Santo Agostinho'),
(23, 'Difícil é ganhar um amigo em uma hora; fácil é ofendê-lo em um minuto.', 'Provérbio Chinês'),
(24, 'O medo de perder tira a vontade de ganhar.', 'Wanderley Luxemburgo'),
(25, 'Aquele que não tem confiança nos outros, não lhes pode ganhar a confiança.', 'Lao-Tsé'),
(26, 'Escolher o seu tempo é ganhar tempo.', 'Francis Bacon'),
(27, 'Arriscamo-nos a perder quando queremos ganhar demais.', 'Jean de La Fontaine'),
(28, 'Perder para a razão, sempre é ganhar', 'Aldo Novak'),
(29, 'O homem digno ganha para viver; o menos honesto vive para ganhar.', 'Textos Judaicos'),
(30, 'Não basta conquistar a sabedoria, é preciso usá-la.', 'Cícero'),
(31, 'De que serve ao homem conquistar o mundo inteiro se perder a alma?', 'Jesus Cristo'),
(32, 'É fácil adquirir um inimigo; difícil é conquistar um amigo.', 'Textos Judaicos'),
(33, 'A única forma de vencer uma discussão é evitá-la.', 'Dale Carnegie'),
(34, 'Sofrer, é só uma vez; vencer, é para a eternidade.', 'Soren Kierkegaard'),
(35, 'O ignorante afirma, o sábio duvida, o sensato reflete.', 'Aristóteles'),
(36, 'Para quê preocuparmo-nos com a morte? A vida tem tantos problemas que temos de resolver primeiro.', 'Confúcio'),
(37, 'Se a tranquilidae da água permite refletir as coisas, o que não poderá a tranquilidade do espírito?', 'Chuang Tzu'),
(38, 'Não coma quando, o alimento, cair no chão, mas coma quando vier dele', 'Jack Biller'),
(39, 'Todo o homem que lê demais e usa o cérebro de menos adquire a preguiça de pensar.', 'Albert Einstein'),
(40, 'Quem não sabe o que é a vida, como poderá saber o que é a morte?', 'Confúcio'),
(41, 'O livro traz a vantagem de a gente poder estar só e ao mesmo tempo acompanhado.', 'Mario Quintana'),
(42, 'Onde o amor impera, não há desejo de poder; e onde o poder predomina, há falta de amor. Um é a sombra do outro.', 'Carl Jung'),
(43, 'É mais fácil obter o que se deseja com um sorriso do que à ponta da espada.', 'William Shakespeare'),
(44, 'Quem quiser vencer na vida deve fazer como os seus sábios: mesmo com a alma partida, ter um sorriso nos lábios.', 'Dinamor'),
(45, 'O sorriso que ofereceres, a ti voltará outra vez.', 'Abílio Guerra Junqueiro'),
(46, 'O sol é para as flores o que os sorrisos são para a humanidade.', 'Joseph Addison'),
(47, 'Um suspiro é uma censura ao presente e um sorriso ao passado.', 'Madame Émile Girardin'),
(48, 'Pouca coisa é necessária para transformar inteiramente uma vida: amor no coração e sorriso nos lábios.', 'Martin Luther King'),
(49, 'Sou abraços, sorrisos, ânimo, bom humor, sarcasmo, preguiça e agora sono.', 'Clarice Lispector'),
(50, 'Eu sei que é daquele sorriso que minha alma precisava.', 'Tati Bernardi'),
(51, 'Debaixo da maquiagem e por trás do meu sorriso, eu sou apenas uma menina que deseja o mundo', 'Marilyn Monroe'),
(52, 'E a minha alma alegra-se com seu sorriso, um sorriso amplo e humano, como o aplauso de uma multidão.', 'Fernando Pessoa'),
(53, 'Bom mesmo é ter problema na cabeça, sorriso na boca e paz no coração!', 'Ailin Aleixo'),
(54, 'Não se esconda atrás de um falso sorriso. Você tem o direito de não estar bem.', 'Paulo Coelho'),
(55, 'Eduquem as crianças, para que não seja necessário punir os adultos.', 'Pitágoras'),
(56, 'Em estado de dúvida, suspende o juízo.', 'Pitágoras'),
(57, 'Com organização e tempo, acha-se o segredo de fazer tudo e bem feito.', 'Pitágoras'),
(58, 'Nosso egoísmo é, em grande parte, produto da sociedade.', 'Émile Durkheim'),
(59, 'O indivíduo se mata para parar de sofrer.', 'Émile Durkheim'),
(60, 'A religião não é somente um sistema de idéias, ela é antes de tudo um sistema de forças.', 'Émile Durkheim'),
(61, 'O homem é mortal por seus temores e imortal por seus desejos.', 'Pitágoras'),
(62, 'Ser feliz sem motivo é a mais autêntica forma de felicidade.', 'Carlos Drummond de Andrade'),
(63, 'Não existe um caminho para a felicidade. A felicidade é o caminho.', 'Thich Nhat Hanh'),
(64, 'Saber encontrar a alegria na alegria dos outros, é o segredo da felicidade.', 'Georges Bernanos'),
(65, 'Até cortar os próprios defeitos pode ser perigoso. Nunca se sabe qual é o defeito que sustenta nosso edifício inteiro.', 'Clarice Lispector'),
(66, 'Que ninguém se engane, só se consegue a simplicidade através de muito trabalho.', 'Clarice Lispector'),
(67, 'Enquanto eu tiver perguntas e não houver resposta continuarei a escrever.', 'Clarice Lispector'),
(68, 'Já que se há de escrever... que ao menos não se esmaguem com palavras as entrelinhas.', 'Clarice Lispector'),
(69, 'Somos o que pensamos. Tudo o que somos surge com nossos pensamentos. Com nossos pensamentos, fazemos o nosso mundo.', 'Buda'),
(70, 'Sua tarefa é descobrir o seu trabalho e, então, com todo o coração, dedicar-se a ele.', 'Buda'),
(71, 'Só há um tempo em que é fundamental despertar. Esse tempo é agora.', 'Buda'),
(72, 'De todos os animais selvagens, o homem jovem é o mais difícil de domar.', 'Platão'),
(73, 'Deve-se temer a velhice, porque ela nunca vem só. Bengalas são provas de idade e não de prudência.', 'Platão'),
(74, 'Ela acreditava em anjo e, porque acreditava, eles existiam.', 'Clarice Lispector'),
(75, 'A paz vem de dentro de você mesmo. Não a procure à sua volta.', 'Buda'),
(76, 'O que somos é consequência do que pensamos.', 'Buda'),
(77, 'A amizade desenvolve a felicidade e reduz o sofrimento, duplicando a nossa alegria e dividindo a nossa dor.', 'Joseph Addison'),
(78, 'Ser feliz sem motivo é a mais autêntica forma de felicidade.', 'Carlos Drummond de Andrade');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `ID_FUNCIONARIO` int(11) NOT NULL,
  `NOME_FUNCIONARIO` varchar(30) NOT NULL,
  `CPF_FUNCIONARIO` varchar(15) NOT NULL,
  `RG_FUNCIONARIO` varchar(15) DEFAULT NULL,
  `SEXO_FUNCIONARIO` varchar(15) NOT NULL,
  `DATA_NASCIMENTO_FUNCIONARIO` varchar(15) NOT NULL,
  `TELEFONE_FUNCIONARIO` varchar(15) NOT NULL,
  `EMAIL_FUNCIONARIO` varchar(50) DEFAULT NULL,
  `CEP_FUNCIONARIO` varchar(15) DEFAULT NULL,
  `ENDERECO_FUNCIONARIO` varchar(50) DEFAULT NULL,
  `NUMERO_END_FUNCIONARIO` int(11) DEFAULT NULL,
  `COMPLEMENTO_END_FUNCIONARIO` varchar(20) DEFAULT NULL,
  `BAIRRO_END_FUNCIONARIO` varchar(20) DEFAULT NULL,
  `ESTADO_END_FUNCIONARIO` varchar(20) DEFAULT NULL,
  `CIDADE_END_FUNCIONARIO` varchar(20) DEFAULT NULL,
  `TURNO_FUNCIONARIO` varchar(30) NOT NULL,
  `CARGO_FUNCIONARIO` varchar(25) NOT NULL,
  `ID_NIVEL_ACESSO` int(11) NOT NULL,
  `MASP` varchar(25) NOT NULL,
  `NUMERO_LIVROS` int(1) NOT NULL,
  `FREQUENCIA_LIVRO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`ID_FUNCIONARIO`, `NOME_FUNCIONARIO`, `CPF_FUNCIONARIO`, `RG_FUNCIONARIO`, `SEXO_FUNCIONARIO`, `DATA_NASCIMENTO_FUNCIONARIO`, `TELEFONE_FUNCIONARIO`, `EMAIL_FUNCIONARIO`, `CEP_FUNCIONARIO`, `ENDERECO_FUNCIONARIO`, `NUMERO_END_FUNCIONARIO`, `COMPLEMENTO_END_FUNCIONARIO`, `BAIRRO_END_FUNCIONARIO`, `ESTADO_END_FUNCIONARIO`, `CIDADE_END_FUNCIONARIO`, `TURNO_FUNCIONARIO`, `CARGO_FUNCIONARIO`, `ID_NIVEL_ACESSO`, `MASP`, `NUMERO_LIVROS`, `FREQUENCIA_LIVRO`) VALUES
(1, 'Vinicius De Sousa Cardoso', '022.487.066-18', '', 'Masculino', '1998-12-07', '35 9 8874-9841', 'viniciussousacardoso@gmail.com', '37701-462', 'Rua Vereador Rubens de Paiva', 70, 'NENHUM', 'Santa Angela', 'MG', 'Poços De Caldas', 'Todos', 'Professor', 3, '0.000.000-0', 0, 0),
(4, 'Rafaela Cristina Martins', '022.334.056-17', 'MG-19.455.405', 'Feminino', '1999-03-05', '35 9 9895-5674', 'rafaela.rcm.martins@gmail.com', '37701-319', 'Nicolina Bernades', 478, '', 'Santa Augusta', 'MG', 'Poços de Caldas', 'Todos', 'Bibliotecário', 2, '0.000.000-1', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `idioma`
--

CREATE TABLE `idioma` (
  `ID_IDIOMA` int(11) NOT NULL,
  `DESCRICAO_IDIOMA` varchar(35) NOT NULL,
  `SIGLA_IDIOMA` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `idioma`
--

INSERT INTO `idioma` (`ID_IDIOMA`, `DESCRICAO_IDIOMA`, `SIGLA_IDIOMA`) VALUES
(1, '', ''),
(2, 'Português (Brasil)', 'pt-br'),
(28, 'English (US)', 'en-us'),
(29, 'Čeština', 'cs-cz'),
(30, 'Dansk', 'da-dk'),
(31, 'Deutsch', 'de-de'),
(32, 'English (Australia)', 'en-au'),
(33, 'English (Canada)', 'en-ca'),
(34, 'English (India)', 'en-in'),
(35, 'English (UK)', 'en-gb'),
(36, 'Español', 'es-es'),
(37, 'Español (MX)', 'es-mx'),
(38, 'Français', 'fr-fr'),
(39, 'Français (Canada)', 'fr-ca'),
(40, 'Italiano', 'it-it'),
(41, 'Magyar', 'hu-hu'),
(42, 'Norsk', 'nb-no'),
(43, 'Nederlands', 'nl-nl'),
(44, 'Polski', 'pl-pl'),
(46, 'Português', 'pt-pt'),
(47, 'Svenska', 'sv-se'),
(48, 'Türkçe', 'tr-tr'),
(49, 'русский', 'ru-ru'),
(50, '日本語', 'ja-jp'),
(51, '한국어', 'ko-kr'),
(52, '中文(简体)', 'zh-cn'),
(53, '中文(繁體)', 'zh-tw');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

CREATE TABLE `itens` (
  `ID_ITENS` int(11) NOT NULL,
  `QTD_ITENS` int(11) NOT NULL,
  `DESCRICAO_KIT` int(11) NOT NULL,
  `DESCRICAO_PRODUTO` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `itens`
--

INSERT INTO `itens` (`ID_ITENS`, `QTD_ITENS`, `DESCRICAO_KIT`, `DESCRICAO_PRODUTO`) VALUES
(14, 2, 1, 'Cabo HDMI'),
(15, 1, 2, 'Projetor'),
(16, 4, 2, 'Cabo HDMI'),
(17, 32, 2, 'Cabo de Som P2'),
(18, 1, 2, 'Cabo HDMI'),
(19, 1, 2, 'Cabo VGA'),
(20, 2, 2, 'Cabo de Força'),
(21, 1, 3, 'Projetor'),
(22, 1, 3, 'Caixa de Som'),
(23, 1, 3, 'Controle'),
(24, 1, 3, 'Extensão');

-- --------------------------------------------------------

--
-- Estrutura da tabela `kit`
--

CREATE TABLE `kit` (
  `ID_KIT` int(11) NOT NULL,
  `DESCRICAO_KIT` varchar(35) NOT NULL,
  `NUMERO_KIT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `kit`
--

INSERT INTO `kit` (`ID_KIT`, `DESCRICAO_KIT`, `NUMERO_KIT`) VALUES
(1, '', NULL),
(2, 'Kit 1', 1),
(3, 'Kit 2', 2),
(4, 'Sala de Video', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `ID_LIVRO` int(11) NOT NULL,
  `CODIGO_LIVRO` varchar(15) NOT NULL,
  `ISBN` varchar(20) NOT NULL,
  `NOME_LIVRO` varchar(35) NOT NULL,
  `AUTOR_LIVRO` varchar(30) NOT NULL,
  `TEMA_LIVRO` varchar(25) NOT NULL,
  `ANO_LIVRO` varchar(25) DEFAULT NULL,
  `MATERIA_LIVRO` varchar(25) DEFAULT NULL,
  `ESTANTE_LIVRO` int(2) DEFAULT NULL,
  `PRATELEIRA_LIVRO` int(2) DEFAULT NULL,
  `EDITORA_LIVRO` varchar(20) DEFAULT NULL,
  `EDICAO_LIVRO` varchar(10) DEFAULT NULL,
  `IDIOMA_LIVRO` varchar(25) DEFAULT NULL,
  `PRAZO_LIVRO` int(3) NOT NULL,
  `STATUS_LIVRO` int(11) NOT NULL,
  `FREQUENCIA_LIVRO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`ID_LIVRO`, `CODIGO_LIVRO`, `ISBN`, `NOME_LIVRO`, `AUTOR_LIVRO`, `TEMA_LIVRO`, `ANO_LIVRO`, `MATERIA_LIVRO`, `ESTANTE_LIVRO`, `PRATELEIRA_LIVRO`, `EDITORA_LIVRO`, `EDICAO_LIVRO`, `IDIOMA_LIVRO`, `PRAZO_LIVRO`, `STATUS_LIVRO`, `FREQUENCIA_LIVRO`) VALUES
(1, '432', '978-8-5254-1741-1', 'Romanceiro da Inconfidência', 'Cecília Meireles', 'Poesia', NULL, NULL, NULL, NULL, 'L&PM POCKET', '684', NULL, 20, 2, 4),
(2, '278', 'xxx-850-8-0407-85', 'Senhora', 'José de Alencar', 'Romance', NULL, NULL, NULL, NULL, 'Ática', NULL, NULL, 20, 2, 8),
(3, 'L1-15', 'xxx-x-xxxx-xxxx-x', 'Dom Quixote', 'Miguel de Cervantes', 'Aventura', NULL, NULL, NULL, NULL, 'L&PM POCKET', '400', NULL, 20, 2, 7),
(4, '509', 'xxx-8-5160-0308-6', 'A Ladeira Da Saudade', 'Ganymédes José', 'Romance', NULL, NULL, NULL, NULL, 'Moderna', '50', NULL, 20, 1, 3),
(5, '235', 'xxx-x-xxxx-xxxx-x', 'O medico e o Monstro', 'Graphic Chillers', 'Romance', NULL, NULL, NULL, NULL, 'Prumo', NULL, NULL, 20, 2, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `log_emprestimo_livro`
--

CREATE TABLE `log_emprestimo_livro` (
  `ID_EMPRESTIMO_LIVRO` int(11) NOT NULL,
  `ID_LIVRO` int(11) NOT NULL,
  `ID_ALUNO` int(11) NOT NULL,
  `ID_CADASTRO` int(11) NOT NULL,
  `DATA_INICIAL_EMPRESTIMO_LIVRO` varchar(15) NOT NULL,
  `DATA_FINAL_EMPRESTIMO_LIVRO` varchar(15) NOT NULL,
  `STATUS_EMPRESTIMO` int(1) NOT NULL,
  `FLTIPOLOG` char(1) NOT NULL,
  `DATALOG` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `log_emprestimo_livro`
--

INSERT INTO `log_emprestimo_livro` (`ID_EMPRESTIMO_LIVRO`, `ID_LIVRO`, `ID_ALUNO`, `ID_CADASTRO`, `DATA_INICIAL_EMPRESTIMO_LIVRO`, `DATA_FINAL_EMPRESTIMO_LIVRO`, `STATUS_EMPRESTIMO`, `FLTIPOLOG`, `DATALOG`) VALUES
(2, 2, 2, 1, '2017-04-03', '2017-04-23', 0, 'U', '2017-04-07 01:47:50'),
(4, 3, 5, 1, '2017-04-06', '2017-04-26', 0, 'U', '2017-04-07 01:47:55'),
(5, 4, 4, 3, '2017-04-07', '2017-04-27', 1, 'U', '2017-04-07 01:48:15'),
(5, 4, 4, 3, '2017-04-07', '2017-04-27', 2, 'U', '2017-04-07 01:48:15'),
(6, 1, 1, 1, '2017-04-07', '2017-04-27', 1, 'I', '2017-04-07 01:54:13'),
(6, 1, 1, 1, '2017-04-07', '2017-04-27', 1, 'U', '2017-04-07 01:54:23'),
(6, 1, 1, 1, '2017-04-07', '2017-04-27', 2, 'U', '2017-04-07 01:54:23'),
(7, 2, 5, 1, '2017-04-07', '2017-04-27', 1, 'I', '2017-04-07 02:02:40'),
(7, 2, 5, 1, '2017-04-07', '2017-04-27', 1, 'U', '2017-04-07 02:03:00'),
(8, 1, 5, 1, '2017-04-07', '2017-04-27', 1, 'I', '2017-04-07 09:50:58'),
(9, 4, 5, 1, '2017-04-07', '2017-04-27', 1, 'I', '2017-04-07 09:51:10'),
(10, 2, 5, 1, '2017-04-07', '2017-04-27', 1, 'I', '2017-04-07 09:51:23'),
(11, 3, 2, 1, '2017-04-07', '2017-04-27', 1, 'I', '2017-04-07 09:51:51'),
(10, 2, 5, 1, '2017-04-07', '2017-04-27', 1, 'U', '2017-04-07 09:53:02'),
(12, 5, 5, 1, '2017-04-08', '2017-04-28', 1, 'I', '2017-04-08 14:55:36'),
(12, 5, 5, 1, '2017-04-08', '2017-04-28', 1, 'U', '2017-04-08 14:56:09'),
(13, 2, 6, 1, '2017-04-11', '2017-05-01', 1, 'I', '2017-04-11 00:49:11'),
(8, 1, 5, 1, '2017-04-07', '2017-04-27', 1, 'U', '2017-04-11 00:53:45'),
(13, 2, 6, 1, '2017-04-11', '2017-05-01', 1, 'U', '2017-04-11 00:55:12'),
(13, 2, 6, 1, '2017-04-11', '2017-04-11', 2, 'D', '2017-04-11 09:26:10'),
(13, 2, 1, 1, '2017-04-11', '2017-05-01', 1, 'I', '2017-04-11 19:37:06'),
(13, 2, 1, 1, '2017-04-11', '2017-05-01', 1, 'U', '2017-04-11 19:40:52'),
(14, 1, 2, 1, '2017-04-11', '2017-05-01', 1, 'I', '2017-04-11 20:46:16'),
(11, 3, 2, 1, '2017-04-07', '2017-04-27', 1, 'U', '2017-04-11 20:48:44'),
(15, 5, 1, 1, '2017-04-13', '2017-05-04', 1, 'I', '2017-04-13 23:22:11'),
(16, 5, 1, 1, '2017-04-13', '2017-05-04', 1, 'I', '2017-04-13 23:24:06'),
(17, 5, 1, 1, '2017-04-13', '2017-05-04', 1, 'I', '2017-04-13 23:25:21'),
(18, 3, 5, 1, '2017-04-13', '2017-05-04', 1, 'I', '2017-04-13 23:27:11'),
(19, 3, 5, 1, '2017-04-13', '2017-05-04', 1, 'I', '2017-04-13 23:27:51'),
(20, 3, 5, 1, '2017-04-13', '2017-05-04', 1, 'I', '2017-04-13 23:30:36'),
(21, 2, 4, 1, '2017-04-14', '2017-05-04', 1, 'I', '2017-04-14 13:47:02'),
(21, 2, 4, 1, '2017-04-14', '2017-05-04', 1, 'U', '2017-04-14 17:36:53'),
(20, 3, 5, 1, '2017-04-13', '2017-05-04', 1, 'U', '2017-04-14 17:43:43'),
(20, 3, 5, 1, '2017-04-13', '2017-04-14', 2, 'U', '2017-04-14 17:43:47'),
(5, 4, 4, 3, '2017-04-07', '2006', 2, 'U', '2017-04-14 17:45:21'),
(6, 1, 1, 1, '2017-04-07', '2006', 2, 'U', '2017-04-14 17:45:33'),
(17, 5, 1, 1, '2017-04-13', '2017-05-04', 1, 'U', '2017-04-14 17:45:53'),
(18, 3, 5, 1, '2017-04-13', '2017-05-04', 1, 'U', '2017-04-14 17:47:28'),
(18, 3, 5, 1, '2017-04-13', '2017-04-14', 2, 'U', '2017-04-14 17:47:32'),
(18, 3, 5, 1, '2017-04-13', '2017-04-14', 2, 'U', '2017-04-14 17:47:32'),
(18, 3, 5, 1, '2017-04-13', '2017-04-14', 2, 'U', '2017-04-14 17:47:32'),
(18, 3, 5, 1, '2017-04-13', '2017-04-14', 2, 'U', '2017-04-14 17:47:33'),
(18, 3, 5, 1, '2017-04-13', '2017-04-14', 2, 'U', '2017-04-14 17:47:33'),
(18, 3, 5, 1, '2017-04-13', '2017-04-14', 2, 'U', '2017-04-14 17:47:34'),
(18, 3, 5, 1, '2017-04-13', '2017-04-14', 2, 'U', '2017-04-14 17:47:34'),
(15, 5, 1, 1, '2017-04-13', '2017-05-04', 1, 'U', '2017-04-14 17:53:54'),
(16, 5, 1, 1, '2017-04-13', '2017-05-04', 1, 'U', '2017-04-14 17:56:08'),
(22, 2, 2, 1, '2017-04-15', '2017-05-05', 1, 'I', '2017-04-15 09:14:06'),
(23, 3, 2, 1, '2017-04-15', '2017-05-05', 1, 'I', '2017-04-15 09:14:19'),
(23, 3, 2, 1, '2017-04-15', '2017-05-05', 1, 'U', '2017-04-15 19:51:26'),
(22, 2, 2, 1, '2017-04-15', '2017-05-05', 1, 'U', '2017-04-15 19:51:30'),
(19, 3, 5, 1, '2017-04-13', '2017-05-04', 1, 'U', '2017-04-15 19:51:33'),
(9, 4, 5, 1, '2017-04-07', '2017-04-27', 1, 'U', '2017-04-15 19:51:36'),
(24, 3, 1, 1, '2017-04-15', '2017-05-06', 1, 'I', '2017-04-15 19:51:51'),
(25, 2, 1, 1, '2017-04-15', '2017-05-06', 1, 'I', '2017-04-15 19:52:19'),
(26, 5, 5, 1, '2017-04-15', '2017-05-06', 1, 'I', '2017-04-15 19:52:55'),
(27, 4, 5, 1, '2017-04-15', '2017-05-06', 1, 'I', '2017-04-15 19:57:07'),
(27, 4, 5, 1, '2017-04-15', '2017-05-06', 1, 'U', '2017-04-17 22:23:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `materia`
--

CREATE TABLE `materia` (
  `ID_MATERIA` int(11) NOT NULL,
  `DESCRICAO_MATERIA` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `materia`
--

INSERT INTO `materia` (`ID_MATERIA`, `DESCRICAO_MATERIA`) VALUES
(1, 'Português'),
(2, 'Matematica'),
(3, 'História'),
(4, 'Geografia'),
(5, 'Ciências'),
(6, 'Biologia'),
(7, 'Química'),
(8, 'Física'),
(9, 'Artes'),
(10, 'Filosofia'),
(11, 'Sociologia'),
(12, 'Inglês'),
(13, 'Espanhol'),
(14, 'Ed. Física');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel_acesso`
--

CREATE TABLE `nivel_acesso` (
  `ID_NIVEL_ACESSO` int(11) NOT NULL,
  `DESCRICAO_NIVEL_ACESSO` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `nivel_acesso`
--

INSERT INTO `nivel_acesso` (`ID_NIVEL_ACESSO`, `DESCRICAO_NIVEL_ACESSO`) VALUES
(1, 'Administrador'),
(2, 'Bibliotecário'),
(3, 'Professor'),
(4, 'Aluno');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ponto`
--

CREATE TABLE `ponto` (
  `ID_PONTO` int(11) NOT NULL,
  `ID_FUNCIONARIO` int(11) NOT NULL,
  `DATA_PONTO` varchar(10) NOT NULL,
  `HORARIO_INICIAL_PONTO` varchar(7) NOT NULL,
  `HORARIO_FINAL_PONTO` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `ID_PRODUTO` int(11) NOT NULL,
  `DESCRICAO_PRODUTO` varchar(45) NOT NULL,
  `STATUS_PRODUTO` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`ID_PRODUTO`, `DESCRICAO_PRODUTO`, `STATUS_PRODUTO`) VALUES
(1, '', 'Funcionando'),
(2, 'Cabo VGA', 'Funcionando'),
(3, 'Cabo HDMI', 'Funcionando'),
(4, 'Cabo de Som P2', 'Funcionando'),
(5, 'Cabo de Força', 'Funcionando'),
(6, 'Projetor', 'Funcionando'),
(7, 'Caixa de Som', 'Funcionando'),
(8, 'Notebook', 'Funcionando'),
(9, 'Cabo de Som P10', 'Funcionando'),
(10, 'Benjamin (T)', 'Funcionando'),
(11, 'Controle', 'Funcionando'),
(12, 'Fonte do Notebook', 'Funcionando'),
(13, 'CD Manual', 'Funcionando'),
(14, 'Extensão', 'Funcionando'),
(29, 'cabo', 'Funcionando');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala`
--

CREATE TABLE `sala` (
  `ID_SALA` int(11) NOT NULL,
  `DESCRICAO_SALA` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sala`
--

INSERT INTO `sala` (`ID_SALA`, `DESCRICAO_SALA`) VALUES
(1, '1 - Sala de Aula'),
(2, '2 - Sala de Aula'),
(3, '3 - Sala de Aula'),
(4, '4 - Sala de Aula'),
(5, '5 - Sala de Aula'),
(6, '6 - Sala de Aula'),
(7, '7 - Sala de Info'),
(8, '8 - Sala de Aula'),
(9, '9 - Sala de Aula'),
(10, '10 - Sala de Aula'),
(11, '11 - Sala de Video'),
(12, '12 - Sala de Aula'),
(13, '13 - Sala de Aula'),
(14, '14 - Sala de Aula'),
(15, '15 - Sala de Aula'),
(16, '16 - Sala de Aula'),
(17, '17 - Sala de Aula'),
(18, '18 - Sala de Aula'),
(19, '19 - Sala de Aula'),
(20, '20 - Sala de Aula'),
(21, '21 - Sala de Aula'),
(22, '22 - Sala de Aula');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tema`
--

CREATE TABLE `tema` (
  `ID_TEMA` int(11) NOT NULL,
  `DESCRICAO_TEMA` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tema`
--

INSERT INTO `tema` (`ID_TEMA`, `DESCRICAO_TEMA`) VALUES
(1, ''),
(2, 'Didático'),
(3, 'Dicionario'),
(4, 'Aventura'),
(5, 'Biográfico'),
(6, 'Cientifico'),
(7, 'Contos'),
(8, 'Crônicas'),
(9, 'Drama'),
(10, 'Épico'),
(11, 'Fantasia'),
(12, 'Ficção Cientifica'),
(13, 'Ficção Histórica'),
(14, 'Guia de Viagem'),
(15, 'Horror'),
(16, 'Infantojuvanil'),
(17, 'Infantil'),
(18, 'Manual'),
(19, 'Poesia'),
(20, 'Política'),
(21, 'Romance'),
(22, 'Autoajuda');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turno`
--

CREATE TABLE `turno` (
  `ID_TURNO` int(11) NOT NULL,
  `DESCRICAO_TURNO` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turno`
--

INSERT INTO `turno` (`ID_TURNO`, `DESCRICAO_TURNO`) VALUES
(1, ''),
(2, 'Manhâ'),
(3, 'Tarde'),
(4, 'Noite'),
(5, 'Manhã / Tarde'),
(6, 'Manhã / Noite'),
(7, 'Tarde / Noite'),
(8, 'Todos');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_emprestimokit`
--
CREATE TABLE `v_emprestimokit` (
`ID_EMPRESTIMO_KIT` int(11)
,`DESCRICAO_KIT` varchar(35)
,`NOME_FUNCIONARIO` varchar(30)
,`DATA_EMPRESTIMO_KIT` varchar(15)
,`CODIGO_AULA_EMPRESTIMO_KIT` varchar(5)
,`STATUS_EMPRESTIMO_KIT` tinyint(1)
,`ID_KIT` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_emprestimolivro`
--
CREATE TABLE `v_emprestimolivro` (
`ID_EMPRESTIMO_LIVRO` int(11)
,`NOME_ALUNO` varchar(30)
,`NOME_LIVRO` varchar(35)
,`NOME_CADASTRO` varchar(50)
,`DATA_INICIAL_EMPRESTIMO_LIVRO` varchar(15)
,`DATA_FINAL_EMPRESTIMO_LIVRO` varchar(15)
,`STATUS_EMPRESTIMO` int(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_emprestimolivro2`
--
CREATE TABLE `v_emprestimolivro2` (
`ID_EMPRESTIMO_LIVRO2` int(11)
,`NOME_FUNCIONARIO` varchar(30)
,`NOME_LIVRO` varchar(35)
,`DATA_INICIAL_EMPRESTIMO_LIVRO` varchar(15)
,`DATA_FINAL_EMPRESTIMO_LIVRO` varchar(15)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_logemprestimolivro`
--
CREATE TABLE `v_logemprestimolivro` (
`ID_EMPRESTIMO_LIVRO` int(11)
,`NOME_ALUNO` varchar(30)
,`NOME_LIVRO` varchar(35)
,`NOME_CADASTRO` varchar(50)
,`DATA_INICIAL_EMPRESTIMO_LIVRO` varchar(15)
,`DATA_FINAL_EMPRESTIMO_LIVRO` varchar(15)
,`STATUS_EMPRESTIMO` int(1)
,`FLTIPOLOG` char(1)
,`DATALOG` datetime
);

-- --------------------------------------------------------

--
-- Structure for view `v_emprestimokit`
--
DROP TABLE IF EXISTS `v_emprestimokit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_emprestimokit`  AS  select `e`.`ID_EMPRESTIMO_KIT` AS `ID_EMPRESTIMO_KIT`,`l`.`DESCRICAO_KIT` AS `DESCRICAO_KIT`,`a`.`NOME_FUNCIONARIO` AS `NOME_FUNCIONARIO`,`e`.`DATA_EMPRESTIMO_KIT` AS `DATA_EMPRESTIMO_KIT`,`e`.`CODIGO_AULA_EMPRESTIMO_KIT` AS `CODIGO_AULA_EMPRESTIMO_KIT`,`e`.`STATUS_EMPRESTIMO_KIT` AS `STATUS_EMPRESTIMO_KIT`,`e`.`ID_KIT` AS `ID_KIT` from ((`emprestimo_kit` `e` join `funcionario` `a` on((`a`.`ID_FUNCIONARIO` = `e`.`ID_FUNCIONARIO`))) join `kit` `l` on((`l`.`ID_KIT` = `e`.`ID_KIT`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_emprestimolivro`
--
DROP TABLE IF EXISTS `v_emprestimolivro`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_emprestimolivro`  AS  select `e`.`ID_EMPRESTIMO_LIVRO` AS `ID_EMPRESTIMO_LIVRO`,`a`.`NOME_ALUNO` AS `NOME_ALUNO`,`l`.`NOME_LIVRO` AS `NOME_LIVRO`,`c`.`NOME_CADASTRO` AS `NOME_CADASTRO`,`e`.`DATA_INICIAL_EMPRESTIMO_LIVRO` AS `DATA_INICIAL_EMPRESTIMO_LIVRO`,`e`.`DATA_FINAL_EMPRESTIMO_LIVRO` AS `DATA_FINAL_EMPRESTIMO_LIVRO`,`e`.`STATUS_EMPRESTIMO` AS `STATUS_EMPRESTIMO` from (((`emprestimo_livro` `e` join `aluno` `a` on((`a`.`ID_ALUNO` = `e`.`ID_ALUNO`))) join `livro` `l` on((`l`.`ID_LIVRO` = `e`.`ID_LIVRO`))) join `cadastro` `c` on((`c`.`ID_CADASTRO` = `e`.`ID_CADASTRO`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_emprestimolivro2`
--
DROP TABLE IF EXISTS `v_emprestimolivro2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_emprestimolivro2`  AS  select `t1e`.`ID_EMPRESTIMO_LIVRO2` AS `ID_EMPRESTIMO_LIVRO2`,`t2a`.`NOME_FUNCIONARIO` AS `NOME_FUNCIONARIO`,`t3l`.`NOME_LIVRO` AS `NOME_LIVRO`,`t1e`.`DATA_INICIAL_EMPRESTIMO_LIVRO` AS `DATA_INICIAL_EMPRESTIMO_LIVRO`,`t1e`.`DATA_FINAL_EMPRESTIMO_LIVRO` AS `DATA_FINAL_EMPRESTIMO_LIVRO` from ((`emprestimo_livro2` `t1e` join `funcionario` `t2a` on((`t1e`.`ID_FUNCIONARIO` = `t2a`.`ID_FUNCIONARIO`))) join `livro` `t3l` on((`t1e`.`ID_LIVRO` = `t3l`.`ID_LIVRO`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_logemprestimolivro`
--
DROP TABLE IF EXISTS `v_logemprestimolivro`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_logemprestimolivro`  AS  select `e`.`ID_EMPRESTIMO_LIVRO` AS `ID_EMPRESTIMO_LIVRO`,`a`.`NOME_ALUNO` AS `NOME_ALUNO`,`l`.`NOME_LIVRO` AS `NOME_LIVRO`,`c`.`NOME_CADASTRO` AS `NOME_CADASTRO`,`e`.`DATA_INICIAL_EMPRESTIMO_LIVRO` AS `DATA_INICIAL_EMPRESTIMO_LIVRO`,`e`.`DATA_FINAL_EMPRESTIMO_LIVRO` AS `DATA_FINAL_EMPRESTIMO_LIVRO`,`e`.`STATUS_EMPRESTIMO` AS `STATUS_EMPRESTIMO`,`e`.`FLTIPOLOG` AS `FLTIPOLOG`,`e`.`DATALOG` AS `DATALOG` from (((`log_emprestimo_livro` `e` join `aluno` `a` on((`a`.`ID_ALUNO` = `e`.`ID_ALUNO`))) join `livro` `l` on((`l`.`ID_LIVRO` = `e`.`ID_LIVRO`))) join `cadastro` `c` on((`c`.`ID_CADASTRO` = `e`.`ID_CADASTRO`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`ID_ALUNO`),
  ADD KEY `fk_ID_NIVEL_ACESSO` (`ID_NIVEL_ACESSO`);

--
-- Indexes for table `ano`
--
ALTER TABLE `ano`
  ADD PRIMARY KEY (`ID_ANO`);

--
-- Indexes for table `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`ID_CADASTRO`),
  ADD UNIQUE KEY `LOGIN_CADASTRO` (`LOGIN_CADASTRO`);

--
-- Indexes for table `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`ID_CARGO`);

--
-- Indexes for table `emprestimo_kit`
--
ALTER TABLE `emprestimo_kit`
  ADD PRIMARY KEY (`ID_EMPRESTIMO_KIT`),
  ADD KEY `fk_ID_FUNCIONARIO2` (`ID_FUNCIONARIO`),
  ADD KEY `fk_ID_KIT` (`ID_KIT`);

--
-- Indexes for table `emprestimo_livro`
--
ALTER TABLE `emprestimo_livro`
  ADD PRIMARY KEY (`ID_EMPRESTIMO_LIVRO`),
  ADD KEY `fk_ID_LIVRO` (`ID_LIVRO`),
  ADD KEY `fk_ID_ALUNO` (`ID_ALUNO`),
  ADD KEY `fk_ID_CADASTRO` (`ID_CADASTRO`);

--
-- Indexes for table `emprestimo_livro2`
--
ALTER TABLE `emprestimo_livro2`
  ADD PRIMARY KEY (`ID_EMPRESTIMO_LIVRO2`),
  ADD KEY `fk_ID_CADASTRO2` (`ID_CADASTRO`),
  ADD KEY `fk_ID_LIVRO2` (`ID_LIVRO`),
  ADD KEY `fk_ID_ALUNO2` (`ID_FUNCIONARIO`);

--
-- Indexes for table `frase_do_dia`
--
ALTER TABLE `frase_do_dia`
  ADD PRIMARY KEY (`ID_FRASE`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`ID_FUNCIONARIO`),
  ADD KEY `fk_ID_CARGO` (`CARGO_FUNCIONARIO`),
  ADD KEY `fk_ID_NIVEL_ACESSO2` (`ID_NIVEL_ACESSO`);

--
-- Indexes for table `idioma`
--
ALTER TABLE `idioma`
  ADD PRIMARY KEY (`ID_IDIOMA`);

--
-- Indexes for table `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`ID_ITENS`);

--
-- Indexes for table `kit`
--
ALTER TABLE `kit`
  ADD PRIMARY KEY (`ID_KIT`);

--
-- Indexes for table `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`ID_LIVRO`),
  ADD KEY `fk_ID_TEMA` (`TEMA_LIVRO`),
  ADD KEY `IDIOMA_LIVRO` (`IDIOMA_LIVRO`);

--
-- Indexes for table `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`ID_MATERIA`);

--
-- Indexes for table `nivel_acesso`
--
ALTER TABLE `nivel_acesso`
  ADD PRIMARY KEY (`ID_NIVEL_ACESSO`);

--
-- Indexes for table `ponto`
--
ALTER TABLE `ponto`
  ADD PRIMARY KEY (`ID_PONTO`),
  ADD KEY `fk_ID_FUNCIONARIO` (`ID_FUNCIONARIO`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`ID_PRODUTO`);

--
-- Indexes for table `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`ID_SALA`);

--
-- Indexes for table `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`ID_TEMA`);

--
-- Indexes for table `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`ID_TURNO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `ID_ALUNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ano`
--
ALTER TABLE `ano`
  MODIFY `ID_ANO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `ID_CADASTRO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cargo`
--
ALTER TABLE `cargo`
  MODIFY `ID_CARGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `emprestimo_kit`
--
ALTER TABLE `emprestimo_kit`
  MODIFY `ID_EMPRESTIMO_KIT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `emprestimo_livro`
--
ALTER TABLE `emprestimo_livro`
  MODIFY `ID_EMPRESTIMO_LIVRO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `emprestimo_livro2`
--
ALTER TABLE `emprestimo_livro2`
  MODIFY `ID_EMPRESTIMO_LIVRO2` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `frase_do_dia`
--
ALTER TABLE `frase_do_dia`
  MODIFY `ID_FRASE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `ID_FUNCIONARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `idioma`
--
ALTER TABLE `idioma`
  MODIFY `ID_IDIOMA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `itens`
--
ALTER TABLE `itens`
  MODIFY `ID_ITENS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `kit`
--
ALTER TABLE `kit`
  MODIFY `ID_KIT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `livro`
--
ALTER TABLE `livro`
  MODIFY `ID_LIVRO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `materia`
--
ALTER TABLE `materia`
  MODIFY `ID_MATERIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `nivel_acesso`
--
ALTER TABLE `nivel_acesso`
  MODIFY `ID_NIVEL_ACESSO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ponto`
--
ALTER TABLE `ponto`
  MODIFY `ID_PONTO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `ID_PRODUTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `sala`
--
ALTER TABLE `sala`
  MODIFY `ID_SALA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tema`
--
ALTER TABLE `tema`
  MODIFY `ID_TEMA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `turno`
--
ALTER TABLE `turno`
  MODIFY `ID_TURNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `fk_ID_NIVEL_ACESSO` FOREIGN KEY (`ID_NIVEL_ACESSO`) REFERENCES `nivel_acesso` (`ID_NIVEL_ACESSO`);

--
-- Limitadores para a tabela `emprestimo_kit`
--
ALTER TABLE `emprestimo_kit`
  ADD CONSTRAINT `fk_ID_FUNCIONARIO2` FOREIGN KEY (`ID_FUNCIONARIO`) REFERENCES `funcionario` (`ID_FUNCIONARIO`),
  ADD CONSTRAINT `fk_ID_KIT` FOREIGN KEY (`ID_KIT`) REFERENCES `kit` (`ID_KIT`);

--
-- Limitadores para a tabela `emprestimo_livro`
--
ALTER TABLE `emprestimo_livro`
  ADD CONSTRAINT `fk_ID_ALUNO` FOREIGN KEY (`ID_ALUNO`) REFERENCES `aluno` (`ID_ALUNO`),
  ADD CONSTRAINT `fk_ID_CADASTRO` FOREIGN KEY (`ID_CADASTRO`) REFERENCES `cadastro` (`ID_CADASTRO`),
  ADD CONSTRAINT `fk_ID_LIVRO` FOREIGN KEY (`ID_LIVRO`) REFERENCES `livro` (`ID_LIVRO`);

--
-- Limitadores para a tabela `emprestimo_livro2`
--
ALTER TABLE `emprestimo_livro2`
  ADD CONSTRAINT `fk_ID_ALUNO2` FOREIGN KEY (`ID_FUNCIONARIO`) REFERENCES `funcionario` (`ID_FUNCIONARIO`),
  ADD CONSTRAINT `fk_ID_CADASTRO2` FOREIGN KEY (`ID_CADASTRO`) REFERENCES `cadastro` (`ID_CADASTRO`),
  ADD CONSTRAINT `fk_ID_LIVRO2` FOREIGN KEY (`ID_LIVRO`) REFERENCES `livro` (`ID_LIVRO`);

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `fk_ID_NIVEL_ACESSO2` FOREIGN KEY (`ID_NIVEL_ACESSO`) REFERENCES `nivel_acesso` (`ID_NIVEL_ACESSO`);

--
-- Limitadores para a tabela `ponto`
--
ALTER TABLE `ponto`
  ADD CONSTRAINT `fk_ID_FUNCIONARIO` FOREIGN KEY (`ID_FUNCIONARIO`) REFERENCES `funcionario` (`ID_FUNCIONARIO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
