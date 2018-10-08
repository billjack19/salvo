CREATE TABLE `aluno` ( `ID_ALUNO` int(11) NOT NULL AUTO_INCREMENT, `MATRICULA_ALUNO` varchar(45) NOT NULL, `NOME_ALUNO` varchar(30) NOT NULL, `EMAIL_ALUNO` varchar(50) DEFAULT NULL, `CPF_ALUNO` varchar(25) DEFAULT NULL, `RG_ALUNO` varchar(25) DEFAULT NULL, `SEXO_ALUNO` varchar(15) NOT NULL, `DATA_NASCIMENTO_ALUNO` varchar(15) NOT NULL, `TURNO_ALUNO` varchar(15) NOT NULL, `TELEFONE_ALUNO` varchar(25) NOT NULL, `RECORD_ALUNO` int(11) DEFAULT NULL, `ID_NIVEL_ACESSO` int(11) DEFAULT NULL, `ANO_ALUNO` varchar(40) NOT NULL, `TURMA_ALUNO` varchar(10) NOT NULL, `SALA_ALUNO` varchar(25) NOT NULL, `NUMERO_LIVROS` int(11) NOT NULL, `FREQUENCIA_LIVRO` int(11) NOT NULL, PRIMARY KEY (`ID_ALUNO`), KEY `fk_ID_NIVEL_ACESSO` (`ID_NIVEL_ACESSO`), CONSTRAINT `fk_ID_NIVEL_ACESSO` FOREIGN KEY (`ID_NIVEL_ACESSO`) REFERENCES `nivel_acesso` (`ID_NIVEL_ACESSO`) ) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;



INSERT INTO aluno 
VALUES('1','8923h92387','Harrison Souza Araujo','','060.545.076-73','51.728.201','Masculino','1998-05-24','Manhâ','37 8 9272-9290','0','4','1° ano Ensino Médio','109','7 - Sala de Aula','2','8');

INSERT INTO aluno 
VALUES('2','0000000000','Luis Gustavo L.G','luisguh2405@gmail.com','070.545.076-73','12.345.678','Masculino','1999-05-24','Noite','35 9 8819-1578','0','4','3° ano Ensino Médio','01','7 - Sala de Info','1','5');

INSERT INTO aluno 
VALUES('4','0000000001','Rafaela Cristina Martin','','','','Feminino','1999-03-05','Manhã / Noite','35 9 9895-5674','0','4','3° ano Ensino Médio','301','9 - Sala de Aula','0','2');

INSERT INTO aluno 
VALUES('5','434254352','Jack Biller da Silva Prado','jackbiller@hotmail.com','234.534.252-34','23.452.435','Masculino','2017-04-06','Manhâ','32 4 3412-3412','0','4','6° ano Ensino Fundamental','234','14 - Sala de Aula','1','11');

INSERT INTO aluno 
VALUES('7','8923h92387','Gustavo Henrique Messias','messias@mail.com','','','Masculino','2017-04-19','Manhâ','35 9 8819-1578','0','4','9° ano Ensino Fundamental','234','11 - Sala de Video','0','0');



CREATE TABLE `ano` ( `ID_ANO` int(11) NOT NULL AUTO_INCREMENT, `DESCRICAO_ANO` varchar(25) NOT NULL, PRIMARY KEY (`ID_ANO`) ) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;



INSERT INTO ano 
VALUES('1','6° ano Ensino Fundamental','','');

INSERT INTO ano 
VALUES('2','7° ano Ensino Fundamental','','');

INSERT INTO ano 
VALUES('3','8° ano Ensino Fundamental','','');

INSERT INTO ano 
VALUES('4','9° ano Ensino Fundamental','','');

INSERT INTO ano 
VALUES('5','1° ano Ensino Médio','','');

INSERT INTO ano 
VALUES('6','2° ano Ensino Médio','','');

INSERT INTO ano 
VALUES('7','3° ano Ensino Médio','','');



CREATE TABLE `cadastro` ( `ID_CADASTRO` int(11) NOT NULL AUTO_INCREMENT, `NOME_CADASTRO` varchar(50) NOT NULL, `LOGIN_CADASTRO` varchar(50) NOT NULL, `SENHA_CADASTRO` varchar(15) NOT NULL, `ID_NIVEL_ACESSO` int(11) NOT NULL, PRIMARY KEY (`ID_CADASTRO`), UNIQUE KEY `LOGIN_CADASTRO` (`LOGIN_CADASTRO`) ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;



INSERT INTO cadastro 
VALUES('1','Grupo de desenvolvedores','adminTI','admin000','1','','','','','');

INSERT INTO cadastro 
VALUES('3','Tia da biblioteca','biblioteca','12345','2','','','','','');



CREATE TABLE `cargo` ( `ID_CARGO` int(11) NOT NULL AUTO_INCREMENT, `DESCRICAO_CARGO` varchar(60) NOT NULL, PRIMARY KEY (`ID_CARGO`) ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;



INSERT INTO cargo 
VALUES('1','','','');

INSERT INTO cargo 
VALUES('2','Bibliotecário','','');

INSERT INTO cargo 
VALUES('3','Professor','','');



CREATE TABLE `emprestimo_kit` ( `ID_EMPRESTIMO_KIT` int(11) NOT NULL AUTO_INCREMENT, `ID_KIT` int(11) NOT NULL, `ID_FUNCIONARIO` int(11) NOT NULL, `DATA_EMPRESTIMO_KIT` varchar(15) NOT NULL, `CODIGO_AULA_EMPRESTIMO_KIT` varchar(5) NOT NULL, `STATUS_EMPRESTIMO_KIT` tinyint(1) NOT NULL, PRIMARY KEY (`ID_EMPRESTIMO_KIT`), KEY `fk_ID_FUNCIONARIO2` (`ID_FUNCIONARIO`), KEY `fk_ID_KIT` (`ID_KIT`), CONSTRAINT `fk_ID_FUNCIONARIO2` FOREIGN KEY (`ID_FUNCIONARIO`) REFERENCES `funcionario` (`ID_FUNCIONARIO`), CONSTRAINT `fk_ID_KIT` FOREIGN KEY (`ID_KIT`) REFERENCES `kit` (`ID_KIT`) ) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;



INSERT INTO emprestimo_kit 
VALUES('1','3','1','2017-04-09','mh1','1');

INSERT INTO emprestimo_kit 
VALUES('3','2','1','2017-04-10','mh1','1');

INSERT INTO emprestimo_kit 
VALUES('4','2','1','2017-04-08','mh1','2');

INSERT INTO emprestimo_kit 
VALUES('6','3','1','2017-04-09','mh2','1');

INSERT INTO emprestimo_kit 
VALUES('7','2','1','2017-04-08','th3','1');

INSERT INTO emprestimo_kit 
VALUES('8','3','1','2017-04-10','nh4','1');

INSERT INTO emprestimo_kit 
VALUES('9','4','1','2017-04-10','mh3','1');

INSERT INTO emprestimo_kit 
VALUES('10','4','1','2017-04-10','mh2','1');

INSERT INTO emprestimo_kit 
VALUES('11','2','1','2017-04-10','mh2','1');

INSERT INTO emprestimo_kit 
VALUES('12','2','1','2017-04-08','mh1','1');

INSERT INTO emprestimo_kit 
VALUES('13','2','1','2017-04-10','mh3','1');

INSERT INTO emprestimo_kit 
VALUES('14','4','1','2017-04-10','th1','1');

INSERT INTO emprestimo_kit 
VALUES('15','2','1','2017-04-10','nh4','1');

INSERT INTO emprestimo_kit 
VALUES('16','2','1','2017-04-11','th5','1');

INSERT INTO emprestimo_kit 
VALUES('17','2','1','2017-04-11','mh2','1');

INSERT INTO emprestimo_kit 
VALUES('18','2','1','2017-04-20','mh3','1');

INSERT INTO emprestimo_kit 
VALUES('19','2','1','2017-04-15','th1','1');

INSERT INTO emprestimo_kit 
VALUES('20','2','1','2017-04-15','th2','1');



CREATE TABLE `emprestimo_livro` ( `ID_EMPRESTIMO_LIVRO` int(11) NOT NULL AUTO_INCREMENT, `ID_LIVRO` int(11) NOT NULL, `ID_ALUNO` int(11) DEFAULT NULL, `ID_CADASTRO` int(11) NOT NULL, `DATA_INICIAL_EMPRESTIMO_LIVRO` varchar(15) NOT NULL, `DATA_FINAL_EMPRESTIMO_LIVRO` varchar(15) NOT NULL, `STATUS_EMPRESTIMO` int(1) NOT NULL, PRIMARY KEY (`ID_EMPRESTIMO_LIVRO`), KEY `fk_ID_LIVRO` (`ID_LIVRO`), KEY `fk_ID_ALUNO` (`ID_ALUNO`), KEY `fk_ID_CADASTRO` (`ID_CADASTRO`), CONSTRAINT `fk_ID_ALUNO` FOREIGN KEY (`ID_ALUNO`) REFERENCES `aluno` (`ID_ALUNO`), CONSTRAINT `fk_ID_CADASTRO` FOREIGN KEY (`ID_CADASTRO`) REFERENCES `cadastro` (`ID_CADASTRO`), CONSTRAINT `fk_ID_LIVRO` FOREIGN KEY (`ID_LIVRO`) REFERENCES `livro` (`ID_LIVRO`) ) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;



INSERT INTO emprestimo_livro 
VALUES('1','1','1','1','2017-04-03','2017-04-23','2');

INSERT INTO emprestimo_livro 
VALUES('2','2','2','1','2017-04-03','2017-04-23','2');

INSERT INTO emprestimo_livro 
VALUES('4','3','5','1','2017-04-06','2017-04-26','2');

INSERT INTO emprestimo_livro 
VALUES('5','4','4','3','2017-04-07','2017-04-23','2');

INSERT INTO emprestimo_livro 
VALUES('6','1','1','1','2017-04-07','2017-04-26','2');

INSERT INTO emprestimo_livro 
VALUES('7','2','5','1','2017-04-07','2017-04-27','2');

INSERT INTO emprestimo_livro 
VALUES('8','1','5','1','2017-04-07','2017-04-11','2');

INSERT INTO emprestimo_livro 
VALUES('9','4','5','1','2017-04-07','2017-04-16','2');

INSERT INTO emprestimo_livro 
VALUES('10','2','5','1','2017-04-07','2017-04-27','2');

INSERT INTO emprestimo_livro 
VALUES('11','3','2','1','2017-04-07','2017-04-12','2');

INSERT INTO emprestimo_livro 
VALUES('12','5','5','1','2017-04-08','2017-04-28','2');

INSERT INTO emprestimo_livro 
VALUES('13','2','1','1','2017-04-11','2017-04-12','2');

INSERT INTO emprestimo_livro 
VALUES('14','1','2','1','2017-04-11','2017-05-01','1');

INSERT INTO emprestimo_livro 
VALUES('15','5','1','1','2017-04-13','2017-04-14','2');

INSERT INTO emprestimo_livro 
VALUES('16','5','1','1','2017-04-13','2017-04-14','2');

INSERT INTO emprestimo_livro 
VALUES('17','5','1','1','2017-04-13','2017-04-14','2');

INSERT INTO emprestimo_livro 
VALUES('18','3','5','1','2017-04-13','2017-04-14','2');

INSERT INTO emprestimo_livro 
VALUES('19','3','5','1','2017-04-13','2017-04-16','2');

INSERT INTO emprestimo_livro 
VALUES('20','3','5','1','2017-04-13','2017-04-14','2');

INSERT INTO emprestimo_livro 
VALUES('21','2','4','1','2017-04-14','2017-04-14','2');

INSERT INTO emprestimo_livro 
VALUES('22','2','2','1','2017-04-15','2017-04-16','2');

INSERT INTO emprestimo_livro 
VALUES('23','3','2','1','2017-04-15','2017-04-16','2');

INSERT INTO emprestimo_livro 
VALUES('24','3','1','1','2017-04-15','2017-05-06','1');

INSERT INTO emprestimo_livro 
VALUES('25','2','1','1','2017-04-15','2017-05-06','1');

INSERT INTO emprestimo_livro 
VALUES('26','5','5','1','2017-04-15','2017-05-06','1');

INSERT INTO emprestimo_livro 
VALUES('27','4','5','1','2017-04-15','2017-04-18','2');



CREATE TABLE `emprestimo_livro2` ( `ID_EMPRESTIMO_LIVRO2` int(11) NOT NULL AUTO_INCREMENT, `ID_LIVRO` int(11) NOT NULL, `ID_FUNCIONARIO` int(11) NOT NULL, `ID_CADASTRO` int(11) NOT NULL, `DATA_INICIAL_EMPRESTIMO_LIVRO` varchar(15) NOT NULL, `DATA_FINAL_EMPRESTIMO_LIVRO` varchar(15) NOT NULL, `STATUS_EMPRESTIMO` int(1) NOT NULL, PRIMARY KEY (`ID_EMPRESTIMO_LIVRO2`), KEY `fk_ID_CADASTRO2` (`ID_CADASTRO`), KEY `fk_ID_LIVRO2` (`ID_LIVRO`), KEY `fk_ID_ALUNO2` (`ID_FUNCIONARIO`), CONSTRAINT `fk_ID_ALUNO2` FOREIGN KEY (`ID_FUNCIONARIO`) REFERENCES `funcionario` (`ID_FUNCIONARIO`), CONSTRAINT `fk_ID_CADASTRO2` FOREIGN KEY (`ID_CADASTRO`) REFERENCES `cadastro` (`ID_CADASTRO`), CONSTRAINT `fk_ID_LIVRO2` FOREIGN KEY (`ID_LIVRO`) REFERENCES `livro` (`ID_LIVRO`) ) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO emprestimo_livro2 
VALUES(


CREATE TABLE `frase_do_dia` ( `ID_FRASE` int(11) NOT NULL AUTO_INCREMENT, `DESCRICAO_FRASE` text NOT NULL, `AUTOR_FRASE` varchar(30) DEFAULT NULL, PRIMARY KEY (`ID_FRASE`) ) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;



INSERT INTO frase_do_dia 
VALUES('1','Apressa-te a viver bem e pensa que cada dia é, por si só, uma vida.','Sêneca');

INSERT INTO frase_do_dia 
VALUES('2','As casas são construídas para que se viva nelas, não para serem olhadas.','Francis Bacon');

INSERT INTO frase_do_dia 
VALUES('3','É difícil viver com as pessoas porque calar é muito difícil.','Friedrich Nietzsche');

INSERT INTO frase_do_dia 
VALUES('4','Viver sem filosofar é o que se chama ter os olhos fechados sem nunca os haver tentado abrir.','René Descartes');

INSERT INTO frase_do_dia 
VALUES('5','Se vives de acordo com as leis da natureza, nunca serás pobre; se vives de acordo com as opiniões alheias, nunca serás rico.','Sêneca');

INSERT INTO frase_do_dia 
VALUES('6','Trabalha como se vivesses para sempre. Ama como se fosses morrer hoje.','Sêneca');

INSERT INTO frase_do_dia 
VALUES('7','Aquele que vive de combater um inimigo tem interesse em o deixar com vida.','Friedrich Nietzsche');

INSERT INTO frase_do_dia 
VALUES('8','Não vivemos para comer, mas comemos para viver.','Sócrates');

INSERT INTO frase_do_dia 
VALUES('9','Renda-se, como eu me rendi. Mergulhe no que você não conhece como eu mergulhei. Não se preocupe em entender, viver ultrapassa qualquer entendimento.','Clarice Lispector');

INSERT INTO frase_do_dia 
VALUES('10','Apressa-te a viver bem e pensa que cada dia é, por si só, uma vida.','Sêneca');

INSERT INTO frase_do_dia 
VALUES('11','Aprenda como se você fosse viver para sempre. Viva como se você fosse morrer amanhã.','Santo Isidoro de Sevilha');

INSERT INTO frase_do_dia 
VALUES('12','Não viva para que a sua presença seja notada, mas para que a sua falta seja sentida.','Bob Marley');

INSERT INTO frase_do_dia 
VALUES('13','Seja feliz do jeito que você é, não mude sua rotina pelo o que os outros exigem de você, simplesmente viva de acordo com o seu modo de viver.','Bob Marley');

INSERT INTO frase_do_dia 
VALUES('14','Sonhe como se fosse viver para sempre, viva como se fosse morrer amanhã.','James Dean');

INSERT INTO frase_do_dia 
VALUES('15','A vida é maravilhosa se não se tem medo dela.','Charles Chaplin');

INSERT INTO frase_do_dia 
VALUES('16','Falar sem aspas, amar sem interrogação, sonhar com reticências, viver sem ponto final.','Charles Chaplin');

INSERT INTO frase_do_dia 
VALUES('17','O incentivo de viver é arriscar, deixe o medo para os fracos.','Charles Chaplin');

INSERT INTO frase_do_dia 
VALUES('18','Não existe coisa melhor no mundo do que viver, curtir e gozar a vida, que passa rápido e daqui não levaremos nada, a não ser toda a experiência e as amizades.','Charles Chaplin');

INSERT INTO frase_do_dia 
VALUES('19','O importante não é vencer todos os dias, mas lutar sempre.','Waldemar Valle Martins');

INSERT INTO frase_do_dia 
VALUES('20','Maior que a tristeza de não haver vencido é a vergonha de não ter lutado!','Rui Barbosa');

INSERT INTO frase_do_dia 
VALUES('21','É melhor conquistar a si mesmo do que vencer mil batalhas.','Buda');

INSERT INTO frase_do_dia 
VALUES('22','Enquanto houver vontade de lutar haverá esperança de vencer.','Santo Agostinho');

INSERT INTO frase_do_dia 
VALUES('23','Difícil é ganhar um amigo em uma hora; fácil é ofendê-lo em um minuto.','Provérbio Chinês');

INSERT INTO frase_do_dia 
VALUES('24','O medo de perder tira a vontade de ganhar.','Wanderley Luxemburgo');

INSERT INTO frase_do_dia 
VALUES('25','Aquele que não tem confiança nos outros, não lhes pode ganhar a confiança.','Lao-Tsé');

INSERT INTO frase_do_dia 
VALUES('26','Escolher o seu tempo é ganhar tempo.','Francis Bacon');

INSERT INTO frase_do_dia 
VALUES('27','Arriscamo-nos a perder quando queremos ganhar demais.','Jean de La Fontaine');

INSERT INTO frase_do_dia 
VALUES('28','Perder para a razão, sempre é ganhar','Aldo Novak');

INSERT INTO frase_do_dia 
VALUES('29','O homem digno ganha para viver; o menos honesto vive para ganhar.','Textos Judaicos');

INSERT INTO frase_do_dia 
VALUES('30','Não basta conquistar a sabedoria, é preciso usá-la.','Cícero');

INSERT INTO frase_do_dia 
VALUES('31','De que serve ao homem conquistar o mundo inteiro se perder a alma?','Jesus Cristo');

INSERT INTO frase_do_dia 
VALUES('32','É fácil adquirir um inimigo; difícil é conquistar um amigo.','Textos Judaicos');

INSERT INTO frase_do_dia 
VALUES('33','A única forma de vencer uma discussão é evitá-la.','Dale Carnegie');

INSERT INTO frase_do_dia 
VALUES('34','Sofrer, é só uma vez; vencer, é para a eternidade.','Soren Kierkegaard');

INSERT INTO frase_do_dia 
VALUES('35','O ignorante afirma, o sábio duvida, o sensato reflete.','Aristóteles');

INSERT INTO frase_do_dia 
VALUES('36','Para quê preocuparmo-nos com a morte? A vida tem tantos problemas que temos de resolver primeiro.','Confúcio');

INSERT INTO frase_do_dia 
VALUES('37','Se a tranquilidae da água permite refletir as coisas, o que não poderá a tranquilidade do espírito?','Chuang Tzu');

INSERT INTO frase_do_dia 
VALUES('38','Não coma quando, o alimento, cair no chão, mas coma quando vier dele','Jack Biller');

INSERT INTO frase_do_dia 
VALUES('39','Todo o homem que lê demais e usa o cérebro de menos adquire a preguiça de pensar.','Albert Einstein');

INSERT INTO frase_do_dia 
VALUES('40','Quem não sabe o que é a vida, como poderá saber o que é a morte?','Confúcio');

INSERT INTO frase_do_dia 
VALUES('41','O livro traz a vantagem de a gente poder estar só e ao mesmo tempo acompanhado.','Mario Quintana');

INSERT INTO frase_do_dia 
VALUES('42','Onde o amor impera, não há desejo de poder; e onde o poder predomina, há falta de amor. Um é a sombra do outro.','Carl Jung');

INSERT INTO frase_do_dia 
VALUES('43','É mais fácil obter o que se deseja com um sorriso do que à ponta da espada.','William Shakespeare');

INSERT INTO frase_do_dia 
VALUES('44','Quem quiser vencer na vida deve fazer como os seus sábios: mesmo com a alma partida, ter um sorriso nos lábios.','Dinamor');

INSERT INTO frase_do_dia 
VALUES('45','O sorriso que ofereceres, a ti voltará outra vez.','Abílio Guerra Junqueiro');

INSERT INTO frase_do_dia 
VALUES('46','O sol é para as flores o que os sorrisos são para a humanidade.','Joseph Addison');

INSERT INTO frase_do_dia 
VALUES('47','Um suspiro é uma censura ao presente e um sorriso ao passado.','Madame Émile Girardin');

INSERT INTO frase_do_dia 
VALUES('48','Pouca coisa é necessária para transformar inteiramente uma vida: amor no coração e sorriso nos lábios.','Martin Luther King');

INSERT INTO frase_do_dia 
VALUES('49','Sou abraços, sorrisos, ânimo, bom humor, sarcasmo, preguiça e agora sono.','Clarice Lispector');

INSERT INTO frase_do_dia 
VALUES('50','Eu sei que é daquele sorriso que minha alma precisava.','Tati Bernardi');

INSERT INTO frase_do_dia 
VALUES('51','Debaixo da maquiagem e por trás do meu sorriso, eu sou apenas uma menina que deseja o mundo','Marilyn Monroe');

INSERT INTO frase_do_dia 
VALUES('52','E a minha alma alegra-se com seu sorriso, um sorriso amplo e humano, como o aplauso de uma multidão.','Fernando Pessoa');

INSERT INTO frase_do_dia 
VALUES('53','Bom mesmo é ter problema na cabeça, sorriso na boca e paz no coração!','Ailin Aleixo');

INSERT INTO frase_do_dia 
VALUES('54','Não se esconda atrás de um falso sorriso. Você tem o direito de não estar bem.','Paulo Coelho');

INSERT INTO frase_do_dia 
VALUES('55','Eduquem as crianças, para que não seja necessário punir os adultos.','Pitágoras');

INSERT INTO frase_do_dia 
VALUES('56','Em estado de dúvida, suspende o juízo.','Pitágoras');

INSERT INTO frase_do_dia 
VALUES('57','Com organização e tempo, acha-se o segredo de fazer tudo e bem feito.','Pitágoras');

INSERT INTO frase_do_dia 
VALUES('58','Nosso egoísmo é, em grande parte, produto da sociedade.','Émile Durkheim');

INSERT INTO frase_do_dia 
VALUES('59','O indivíduo se mata para parar de sofrer.','Émile Durkheim');

INSERT INTO frase_do_dia 
VALUES('60','A religião não é somente um sistema de idéias, ela é antes de tudo um sistema de forças.','Émile Durkheim');

INSERT INTO frase_do_dia 
VALUES('61','O homem é mortal por seus temores e imortal por seus desejos.','Pitágoras');

INSERT INTO frase_do_dia 
VALUES('62','Ser feliz sem motivo é a mais autêntica forma de felicidade.','Carlos Drummond de Andrade');

INSERT INTO frase_do_dia 
VALUES('63','Não existe um caminho para a felicidade. A felicidade é o caminho.','Thich Nhat Hanh');

INSERT INTO frase_do_dia 
VALUES('64','Saber encontrar a alegria na alegria dos outros, é o segredo da felicidade.','Georges Bernanos');

INSERT INTO frase_do_dia 
VALUES('65','Até cortar os próprios defeitos pode ser perigoso. Nunca se sabe qual é o defeito que sustenta nosso edifício inteiro.','Clarice Lispector');

INSERT INTO frase_do_dia 
VALUES('66','Que ninguém se engane, só se consegue a simplicidade através de muito trabalho.','Clarice Lispector');

INSERT INTO frase_do_dia 
VALUES('67','Enquanto eu tiver perguntas e não houver resposta continuarei a escrever.','Clarice Lispector');

INSERT INTO frase_do_dia 
VALUES('68','Já que se há de escrever... que ao menos não se esmaguem com palavras as entrelinhas.','Clarice Lispector');

INSERT INTO frase_do_dia 
VALUES('69','Somos o que pensamos. Tudo o que somos surge com nossos pensamentos. Com nossos pensamentos, fazemos o nosso mundo.','Buda');

INSERT INTO frase_do_dia 
VALUES('70','Sua tarefa é descobrir o seu trabalho e, então, com todo o coração, dedicar-se a ele.','Buda');

INSERT INTO frase_do_dia 
VALUES('71','Só há um tempo em que é fundamental despertar. Esse tempo é agora.','Buda');

INSERT INTO frase_do_dia 
VALUES('72','De todos os animais selvagens, o homem jovem é o mais difícil de domar.','Platão');

INSERT INTO frase_do_dia 
VALUES('73','Deve-se temer a velhice, porque ela nunca vem só. Bengalas são provas de idade e não de prudência.','Platão');

INSERT INTO frase_do_dia 
VALUES('74','Ela acreditava em anjo e, porque acreditava, eles existiam.','Clarice Lispector');

INSERT INTO frase_do_dia 
VALUES('75','A paz vem de dentro de você mesmo. Não a procure à sua volta.','Buda');

INSERT INTO frase_do_dia 
VALUES('76','O que somos é consequência do que pensamos.','Buda');

INSERT INTO frase_do_dia 
VALUES('77','A amizade desenvolve a felicidade e reduz o sofrimento, duplicando a nossa alegria e dividindo a nossa dor.','Joseph Addison');

INSERT INTO frase_do_dia 
VALUES('78','Ser feliz sem motivo é a mais autêntica forma de felicidade.','Carlos Drummond de Andrade');



CREATE TABLE `funcionario` ( `ID_FUNCIONARIO` int(11) NOT NULL AUTO_INCREMENT, `NOME_FUNCIONARIO` varchar(30) NOT NULL, `CPF_FUNCIONARIO` varchar(15) NOT NULL, `RG_FUNCIONARIO` varchar(15) DEFAULT NULL, `SEXO_FUNCIONARIO` varchar(15) NOT NULL, `DATA_NASCIMENTO_FUNCIONARIO` varchar(15) NOT NULL, `TELEFONE_FUNCIONARIO` varchar(15) NOT NULL, `EMAIL_FUNCIONARIO` varchar(50) DEFAULT NULL, `CEP_FUNCIONARIO` varchar(15) DEFAULT NULL, `ENDERECO_FUNCIONARIO` varchar(50) DEFAULT NULL, `NUMERO_END_FUNCIONARIO` int(11) DEFAULT NULL, `COMPLEMENTO_END_FUNCIONARIO` varchar(20) DEFAULT NULL, `BAIRRO_END_FUNCIONARIO` varchar(20) DEFAULT NULL, `ESTADO_END_FUNCIONARIO` varchar(20) DEFAULT NULL, `CIDADE_END_FUNCIONARIO` varchar(20) DEFAULT NULL, `TURNO_FUNCIONARIO` varchar(30) NOT NULL, `CARGO_FUNCIONARIO` varchar(25) NOT NULL, `ID_NIVEL_ACESSO` int(11) NOT NULL, `MASP` varchar(25) NOT NULL, `NUMERO_LIVROS` int(1) NOT NULL, `FREQUENCIA_LIVRO` int(11) NOT NULL, PRIMARY KEY (`ID_FUNCIONARIO`), KEY `fk_ID_CARGO` (`CARGO_FUNCIONARIO`), KEY `fk_ID_NIVEL_ACESSO2` (`ID_NIVEL_ACESSO`), CONSTRAINT `fk_ID_NIVEL_ACESSO2` FOREIGN KEY (`ID_NIVEL_ACESSO`) REFERENCES `nivel_acesso` (`ID_NIVEL_ACESSO`) ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;



INSERT INTO funcionario 
VALUES('1','Vinicius De Sousa Cardoso','022.487.066-18','','Masculino','1998-12-07','35 9 8874-9841','viniciussousacardoso@gmail.com','37701-462','Rua Vereador Rubens de Paiva','70','NENHUM','Santa Angela','MG','Poços De Caldas','Todos','Professor','3','0.000.000-0','0','0');

INSERT INTO funcionario 
VALUES('4','Rafaela Cristina Martins','022.334.056-17','MG-19.455.405','Feminino','1999-03-05','35 9 9895-5674','rafaela.rcm.martins@gmail.com','37701-319','Nicolina Bernades','478','','Santa Augusta','MG','Poços de Caldas','Todos','Bibliotecário','2','0.000.000-1','0','0');



CREATE TABLE `idioma` ( `ID_IDIOMA` int(11) NOT NULL AUTO_INCREMENT, `DESCRICAO_IDIOMA` varchar(35) NOT NULL, `SIGLA_IDIOMA` varchar(5) NOT NULL, PRIMARY KEY (`ID_IDIOMA`) ) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;



INSERT INTO idioma 
VALUES('1','','');

INSERT INTO idioma 
VALUES('2','Português (Brasil)','pt-br');

INSERT INTO idioma 
VALUES('28','English (US)','en-us');

INSERT INTO idioma 
VALUES('29','Ceština','cs-cz');

INSERT INTO idioma 
VALUES('30','Dansk','da-dk');

INSERT INTO idioma 
VALUES('31','Deutsch','de-de');

INSERT INTO idioma 
VALUES('32','English (Australia)','en-au');

INSERT INTO idioma 
VALUES('33','English (Canada)','en-ca');

INSERT INTO idioma 
VALUES('34','English (India)','en-in');

INSERT INTO idioma 
VALUES('35','English (UK)','en-gb');

INSERT INTO idioma 
VALUES('36','Español','es-es');

INSERT INTO idioma 
VALUES('37','Español (MX)','es-mx');

INSERT INTO idioma 
VALUES('38','Français','fr-fr');

INSERT INTO idioma 
VALUES('39','Français (Canada)','fr-ca');

INSERT INTO idioma 
VALUES('40','Italiano','it-it');

INSERT INTO idioma 
VALUES('41','Magyar','hu-hu');

INSERT INTO idioma 
VALUES('42','Norsk','nb-no');

INSERT INTO idioma 
VALUES('43','Nederlands','nl-nl');

INSERT INTO idioma 
VALUES('44','Polski','pl-pl');

INSERT INTO idioma 
VALUES('46','Português','pt-pt');

INSERT INTO idioma 
VALUES('47','Svenska','sv-se');

INSERT INTO idioma 
VALUES('48','Türkçe','tr-tr');

INSERT INTO idioma 
VALUES('49','???????','ru-ru');

INSERT INTO idioma 
VALUES('50','???','ja-jp');

INSERT INTO idioma 
VALUES('51','???','ko-kr');

INSERT INTO idioma 
VALUES('52','??(??)','zh-cn');

INSERT INTO idioma 
VALUES('53','??(??)','zh-tw');



CREATE TABLE `itens` ( `ID_ITENS` int(11) NOT NULL AUTO_INCREMENT, `QTD_ITENS` int(11) NOT NULL, `DESCRICAO_KIT` int(11) NOT NULL, `DESCRICAO_PRODUTO` varchar(45) NOT NULL, PRIMARY KEY (`ID_ITENS`) ) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;



INSERT INTO itens 
VALUES('14','2','1','Cabo HDMI');

INSERT INTO itens 
VALUES('15','1','2','Projetor');

INSERT INTO itens 
VALUES('16','4','2','Cabo HDMI');

INSERT INTO itens 
VALUES('17','32','2','Cabo de Som P2');

INSERT INTO itens 
VALUES('18','1','2','Cabo HDMI');

INSERT INTO itens 
VALUES('19','1','2','Cabo VGA');

INSERT INTO itens 
VALUES('20','2','2','Cabo de Força');

INSERT INTO itens 
VALUES('21','1','3','Projetor');

INSERT INTO itens 
VALUES('22','1','3','Caixa de Som');

INSERT INTO itens 
VALUES('23','1','3','Controle');

INSERT INTO itens 
VALUES('24','1','3','Extensão');



CREATE TABLE `kit` ( `ID_KIT` int(11) NOT NULL AUTO_INCREMENT, `DESCRICAO_KIT` varchar(35) NOT NULL, `NUMERO_KIT` int(11) DEFAULT NULL, PRIMARY KEY (`ID_KIT`) ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;



INSERT INTO kit 
VALUES('1','','');

INSERT INTO kit 
VALUES('2','Kit 1','1');

INSERT INTO kit 
VALUES('3','Kit 2','2');

INSERT INTO kit 
VALUES('4','Sala de Video','');



CREATE TABLE `livro` ( `ID_LIVRO` int(11) NOT NULL AUTO_INCREMENT, `CODIGO_LIVRO` varchar(15) NOT NULL, `ISBN` varchar(20) NOT NULL, `NOME_LIVRO` varchar(35) NOT NULL, `AUTOR_LIVRO` varchar(30) NOT NULL, `TEMA_LIVRO` varchar(25) NOT NULL, `ANO_LIVRO` varchar(25) DEFAULT NULL, `MATERIA_LIVRO` varchar(25) DEFAULT NULL, `ESTANTE_LIVRO` int(2) DEFAULT NULL, `PRATELEIRA_LIVRO` int(2) DEFAULT NULL, `EDITORA_LIVRO` varchar(20) DEFAULT NULL, `EDICAO_LIVRO` varchar(10) DEFAULT NULL, `IDIOMA_LIVRO` varchar(25) DEFAULT NULL, `PRAZO_LIVRO` int(3) NOT NULL, `STATUS_LIVRO` int(11) NOT NULL, `FREQUENCIA_LIVRO` int(11) NOT NULL, PRIMARY KEY (`ID_LIVRO`), KEY `fk_ID_TEMA` (`TEMA_LIVRO`), KEY `IDIOMA_LIVRO` (`IDIOMA_LIVRO`) ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;



INSERT INTO livro 
VALUES('1','432','978-8-5254-1741-1','Romanceiro da Inconfidência','Cecília Meireles','Poesia','','','','','L&PM POCKET','684','','20','2','4');

INSERT INTO livro 
VALUES('2','278','xxx-850-8-0407-85','Senhora','José de Alencar','Romance','','','','','Ática','','','20','2','8');

INSERT INTO livro 
VALUES('3','L1-15','xxx-x-xxxx-xxxx-x','Dom Quixote','Miguel de Cervantes','Aventura','','','','','L&PM POCKET','400','','20','2','7');

INSERT INTO livro 
VALUES('4','509','xxx-8-5160-0308-6','A Ladeira Da Saudade','Ganymédes José','Romance','','','','','Moderna','50','','20','1','3');

INSERT INTO livro 
VALUES('5','235','xxx-x-xxxx-xxxx-x','O medico e o Monstro','Graphic Chillers','Romance','','','','','Prumo','','','20','2','5');



CREATE TABLE `log_emprestimo_livro` ( `ID_EMPRESTIMO_LIVRO` int(11) NOT NULL, `ID_LIVRO` int(11) NOT NULL, `ID_ALUNO` int(11) NOT NULL, `ID_CADASTRO` int(11) NOT NULL, `DATA_INICIAL_EMPRESTIMO_LIVRO` varchar(15) NOT NULL, `DATA_FINAL_EMPRESTIMO_LIVRO` varchar(15) NOT NULL, `STATUS_EMPRESTIMO` int(1) NOT NULL, `FLTIPOLOG` char(1) NOT NULL, `DATALOG` datetime NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO log_emprestimo_livro 
VALUES('2','2','2','1','2017-04-03','2017-04-23','0','U','2017-04-07 01:47:50');

INSERT INTO log_emprestimo_livro 
VALUES('4','3','5','1','2017-04-06','2017-04-26','0','U','2017-04-07 01:47:55');

INSERT INTO log_emprestimo_livro 
VALUES('5','4','4','3','2017-04-07','2017-04-27','1','U','2017-04-07 01:48:15');

INSERT INTO log_emprestimo_livro 
VALUES('5','4','4','3','2017-04-07','2017-04-27','2','U','2017-04-07 01:48:15');

INSERT INTO log_emprestimo_livro 
VALUES('6','1','1','1','2017-04-07','2017-04-27','1','I','2017-04-07 01:54:13');

INSERT INTO log_emprestimo_livro 
VALUES('6','1','1','1','2017-04-07','2017-04-27','1','U','2017-04-07 01:54:23');

INSERT INTO log_emprestimo_livro 
VALUES('6','1','1','1','2017-04-07','2017-04-27','2','U','2017-04-07 01:54:23');

INSERT INTO log_emprestimo_livro 
VALUES('7','2','5','1','2017-04-07','2017-04-27','1','I','2017-04-07 02:02:40');

INSERT INTO log_emprestimo_livro 
VALUES('7','2','5','1','2017-04-07','2017-04-27','1','U','2017-04-07 02:03:00');

INSERT INTO log_emprestimo_livro 
VALUES('8','1','5','1','2017-04-07','2017-04-27','1','I','2017-04-07 09:50:58');

INSERT INTO log_emprestimo_livro 
VALUES('9','4','5','1','2017-04-07','2017-04-27','1','I','2017-04-07 09:51:10');

INSERT INTO log_emprestimo_livro 
VALUES('10','2','5','1','2017-04-07','2017-04-27','1','I','2017-04-07 09:51:23');

INSERT INTO log_emprestimo_livro 
VALUES('11','3','2','1','2017-04-07','2017-04-27','1','I','2017-04-07 09:51:51');

INSERT INTO log_emprestimo_livro 
VALUES('10','2','5','1','2017-04-07','2017-04-27','1','U','2017-04-07 09:53:02');

INSERT INTO log_emprestimo_livro 
VALUES('12','5','5','1','2017-04-08','2017-04-28','1','I','2017-04-08 14:55:36');

INSERT INTO log_emprestimo_livro 
VALUES('12','5','5','1','2017-04-08','2017-04-28','1','U','2017-04-08 14:56:09');

INSERT INTO log_emprestimo_livro 
VALUES('13','2','6','1','2017-04-11','2017-05-01','1','I','2017-04-11 00:49:11');

INSERT INTO log_emprestimo_livro 
VALUES('8','1','5','1','2017-04-07','2017-04-27','1','U','2017-04-11 00:53:45');

INSERT INTO log_emprestimo_livro 
VALUES('13','2','6','1','2017-04-11','2017-05-01','1','U','2017-04-11 00:55:12');

INSERT INTO log_emprestimo_livro 
VALUES('13','2','6','1','2017-04-11','2017-04-11','2','D','2017-04-11 09:26:10');

INSERT INTO log_emprestimo_livro 
VALUES('13','2','1','1','2017-04-11','2017-05-01','1','I','2017-04-11 19:37:06');

INSERT INTO log_emprestimo_livro 
VALUES('13','2','1','1','2017-04-11','2017-05-01','1','U','2017-04-11 19:40:52');

INSERT INTO log_emprestimo_livro 
VALUES('14','1','2','1','2017-04-11','2017-05-01','1','I','2017-04-11 20:46:16');

INSERT INTO log_emprestimo_livro 
VALUES('11','3','2','1','2017-04-07','2017-04-27','1','U','2017-04-11 20:48:44');

INSERT INTO log_emprestimo_livro 
VALUES('15','5','1','1','2017-04-13','2017-05-04','1','I','2017-04-13 23:22:11');

INSERT INTO log_emprestimo_livro 
VALUES('16','5','1','1','2017-04-13','2017-05-04','1','I','2017-04-13 23:24:06');

INSERT INTO log_emprestimo_livro 
VALUES('17','5','1','1','2017-04-13','2017-05-04','1','I','2017-04-13 23:25:21');

INSERT INTO log_emprestimo_livro 
VALUES('18','3','5','1','2017-04-13','2017-05-04','1','I','2017-04-13 23:27:11');

INSERT INTO log_emprestimo_livro 
VALUES('19','3','5','1','2017-04-13','2017-05-04','1','I','2017-04-13 23:27:51');

INSERT INTO log_emprestimo_livro 
VALUES('20','3','5','1','2017-04-13','2017-05-04','1','I','2017-04-13 23:30:36');

INSERT INTO log_emprestimo_livro 
VALUES('21','2','4','1','2017-04-14','2017-05-04','1','I','2017-04-14 13:47:02');

INSERT INTO log_emprestimo_livro 
VALUES('21','2','4','1','2017-04-14','2017-05-04','1','U','2017-04-14 17:36:53');

INSERT INTO log_emprestimo_livro 
VALUES('20','3','5','1','2017-04-13','2017-05-04','1','U','2017-04-14 17:43:43');

INSERT INTO log_emprestimo_livro 
VALUES('20','3','5','1','2017-04-13','2017-04-14','2','U','2017-04-14 17:43:47');

INSERT INTO log_emprestimo_livro 
VALUES('5','4','4','3','2017-04-07','2006','2','U','2017-04-14 17:45:21');

INSERT INTO log_emprestimo_livro 
VALUES('6','1','1','1','2017-04-07','2006','2','U','2017-04-14 17:45:33');

INSERT INTO log_emprestimo_livro 
VALUES('17','5','1','1','2017-04-13','2017-05-04','1','U','2017-04-14 17:45:53');

INSERT INTO log_emprestimo_livro 
VALUES('18','3','5','1','2017-04-13','2017-05-04','1','U','2017-04-14 17:47:28');

INSERT INTO log_emprestimo_livro 
VALUES('18','3','5','1','2017-04-13','2017-04-14','2','U','2017-04-14 17:47:32');

INSERT INTO log_emprestimo_livro 
VALUES('18','3','5','1','2017-04-13','2017-04-14','2','U','2017-04-14 17:47:32');

INSERT INTO log_emprestimo_livro 
VALUES('18','3','5','1','2017-04-13','2017-04-14','2','U','2017-04-14 17:47:32');

INSERT INTO log_emprestimo_livro 
VALUES('18','3','5','1','2017-04-13','2017-04-14','2','U','2017-04-14 17:47:33');

INSERT INTO log_emprestimo_livro 
VALUES('18','3','5','1','2017-04-13','2017-04-14','2','U','2017-04-14 17:47:33');

INSERT INTO log_emprestimo_livro 
VALUES('18','3','5','1','2017-04-13','2017-04-14','2','U','2017-04-14 17:47:34');

INSERT INTO log_emprestimo_livro 
VALUES('18','3','5','1','2017-04-13','2017-04-14','2','U','2017-04-14 17:47:34');

INSERT INTO log_emprestimo_livro 
VALUES('15','5','1','1','2017-04-13','2017-05-04','1','U','2017-04-14 17:53:54');

INSERT INTO log_emprestimo_livro 
VALUES('16','5','1','1','2017-04-13','2017-05-04','1','U','2017-04-14 17:56:08');

INSERT INTO log_emprestimo_livro 
VALUES('22','2','2','1','2017-04-15','2017-05-05','1','I','2017-04-15 09:14:06');

INSERT INTO log_emprestimo_livro 
VALUES('23','3','2','1','2017-04-15','2017-05-05','1','I','2017-04-15 09:14:19');

INSERT INTO log_emprestimo_livro 
VALUES('23','3','2','1','2017-04-15','2017-05-05','1','U','2017-04-15 19:51:26');

INSERT INTO log_emprestimo_livro 
VALUES('22','2','2','1','2017-04-15','2017-05-05','1','U','2017-04-15 19:51:30');

INSERT INTO log_emprestimo_livro 
VALUES('19','3','5','1','2017-04-13','2017-05-04','1','U','2017-04-15 19:51:33');

INSERT INTO log_emprestimo_livro 
VALUES('9','4','5','1','2017-04-07','2017-04-27','1','U','2017-04-15 19:51:36');

INSERT INTO log_emprestimo_livro 
VALUES('24','3','1','1','2017-04-15','2017-05-06','1','I','2017-04-15 19:51:51');

INSERT INTO log_emprestimo_livro 
VALUES('25','2','1','1','2017-04-15','2017-05-06','1','I','2017-04-15 19:52:19');

INSERT INTO log_emprestimo_livro 
VALUES('26','5','5','1','2017-04-15','2017-05-06','1','I','2017-04-15 19:52:55');

INSERT INTO log_emprestimo_livro 
VALUES('27','4','5','1','2017-04-15','2017-05-06','1','I','2017-04-15 19:57:07');

INSERT INTO log_emprestimo_livro 
VALUES('27','4','5','1','2017-04-15','2017-05-06','1','U','2017-04-17 22:23:00');



CREATE TABLE `materia` ( `ID_MATERIA` int(11) NOT NULL AUTO_INCREMENT, `DESCRICAO_MATERIA` varchar(25) NOT NULL, PRIMARY KEY (`ID_MATERIA`) ) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;



INSERT INTO materia 
VALUES('1','Português');

INSERT INTO materia 
VALUES('2','Matematica');

INSERT INTO materia 
VALUES('3','História');

INSERT INTO materia 
VALUES('4','Geografia');

INSERT INTO materia 
VALUES('5','Ciências');

INSERT INTO materia 
VALUES('6','Biologia');

INSERT INTO materia 
VALUES('7','Química');

INSERT INTO materia 
VALUES('8','Física');

INSERT INTO materia 
VALUES('9','Artes');

INSERT INTO materia 
VALUES('10','Filosofia');

INSERT INTO materia 
VALUES('11','Sociologia');

INSERT INTO materia 
VALUES('12','Inglês');

INSERT INTO materia 
VALUES('13','Espanhol');

INSERT INTO materia 
VALUES('14','Ed. Física');



CREATE TABLE `nivel_acesso` ( `ID_NIVEL_ACESSO` int(11) NOT NULL AUTO_INCREMENT, `DESCRICAO_NIVEL_ACESSO` varchar(15) NOT NULL, PRIMARY KEY (`ID_NIVEL_ACESSO`) ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;



INSERT INTO nivel_acesso 
VALUES('1','Administrador');

INSERT INTO nivel_acesso 
VALUES('2','Bibliotecário');

INSERT INTO nivel_acesso 
VALUES('3','Professor');

INSERT INTO nivel_acesso 
VALUES('4','Aluno');



CREATE TABLE `ponto` ( `ID_PONTO` int(11) NOT NULL AUTO_INCREMENT, `ID_FUNCIONARIO` int(11) NOT NULL, `DATA_PONTO` varchar(10) NOT NULL, `HORARIO_INICIAL_PONTO` varchar(7) NOT NULL, `HORARIO_FINAL_PONTO` varchar(7) NOT NULL, PRIMARY KEY (`ID_PONTO`), KEY `fk_ID_FUNCIONARIO` (`ID_FUNCIONARIO`), CONSTRAINT `fk_ID_FUNCIONARIO` FOREIGN KEY (`ID_FUNCIONARIO`) REFERENCES `funcionario` (`ID_FUNCIONARIO`) ) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO ponto 
VALUES(


CREATE TABLE `produto` ( `ID_PRODUTO` int(11) NOT NULL AUTO_INCREMENT, `DESCRICAO_PRODUTO` varchar(45) NOT NULL, `STATUS_PRODUTO` varchar(30) NOT NULL, PRIMARY KEY (`ID_PRODUTO`) ) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;



INSERT INTO produto 
VALUES('1','','Funcionando');

INSERT INTO produto 
VALUES('2','Cabo VGA','Funcionando');

INSERT INTO produto 
VALUES('3','Cabo HDMI','Funcionando');

INSERT INTO produto 
VALUES('4','Cabo de Som P2','Funcionando');

INSERT INTO produto 
VALUES('5','Cabo de Força','Funcionando');

INSERT INTO produto 
VALUES('6','Projetor','Funcionando');

INSERT INTO produto 
VALUES('7','Caixa de Som','Funcionando');

INSERT INTO produto 
VALUES('8','Notebook','Funcionando');

INSERT INTO produto 
VALUES('9','Cabo de Som P10','Funcionando');

INSERT INTO produto 
VALUES('10','Benjamin (T)','Funcionando');

INSERT INTO produto 
VALUES('11','Controle','Funcionando');

INSERT INTO produto 
VALUES('12','Fonte do Notebook','Funcionando');

INSERT INTO produto 
VALUES('13','CD Manual','Funcionando');

INSERT INTO produto 
VALUES('14','Extensão','Funcionando');

INSERT INTO produto 
VALUES('29','cabo','Funcionando');



CREATE TABLE `sala` ( `ID_SALA` int(11) NOT NULL AUTO_INCREMENT, `DESCRICAO_SALA` varchar(25) NOT NULL, PRIMARY KEY (`ID_SALA`) ) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;



INSERT INTO sala 
VALUES('1','1 - Sala de Aula');

INSERT INTO sala 
VALUES('2','2 - Sala de Aula');

INSERT INTO sala 
VALUES('3','3 - Sala de Aula');

INSERT INTO sala 
VALUES('4','4 - Sala de Aula');

INSERT INTO sala 
VALUES('5','5 - Sala de Aula');

INSERT INTO sala 
VALUES('6','6 - Sala de Aula');

INSERT INTO sala 
VALUES('7','7 - Sala de Info');

INSERT INTO sala 
VALUES('8','8 - Sala de Aula');

INSERT INTO sala 
VALUES('9','9 - Sala de Aula');

INSERT INTO sala 
VALUES('10','10 - Sala de Aula');

INSERT INTO sala 
VALUES('11','11 - Sala de Video');

INSERT INTO sala 
VALUES('12','12 - Sala de Aula');

INSERT INTO sala 
VALUES('13','13 - Sala de Aula');

INSERT INTO sala 
VALUES('14','14 - Sala de Aula');

INSERT INTO sala 
VALUES('15','15 - Sala de Aula');

INSERT INTO sala 
VALUES('16','16 - Sala de Aula');

INSERT INTO sala 
VALUES('17','17 - Sala de Aula');

INSERT INTO sala 
VALUES('18','18 - Sala de Aula');

INSERT INTO sala 
VALUES('19','19 - Sala de Aula');

INSERT INTO sala 
VALUES('20','20 - Sala de Aula');

INSERT INTO sala 
VALUES('21','21 - Sala de Aula');

INSERT INTO sala 
VALUES('22','22 - Sala de Aula');



CREATE TABLE `tema` ( `ID_TEMA` int(11) NOT NULL AUTO_INCREMENT, `DESCRICAO_TEMA` varchar(35) NOT NULL, PRIMARY KEY (`ID_TEMA`) ) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;



INSERT INTO tema 
VALUES('1','');

INSERT INTO tema 
VALUES('2','Didático');

INSERT INTO tema 
VALUES('3','Dicionario');

INSERT INTO tema 
VALUES('4','Aventura');

INSERT INTO tema 
VALUES('5','Biográfico');

INSERT INTO tema 
VALUES('6','Cientifico');

INSERT INTO tema 
VALUES('7','Contos');

INSERT INTO tema 
VALUES('8','Crônicas');

INSERT INTO tema 
VALUES('9','Drama');

INSERT INTO tema 
VALUES('10','Épico');

INSERT INTO tema 
VALUES('11','Fantasia');

INSERT INTO tema 
VALUES('12','Ficção Cientifica');

INSERT INTO tema 
VALUES('13','Ficção Histórica');

INSERT INTO tema 
VALUES('14','Guia de Viagem');

INSERT INTO tema 
VALUES('15','Horror');

INSERT INTO tema 
VALUES('16','Infantojuvanil');

INSERT INTO tema 
VALUES('17','Infantil');

INSERT INTO tema 
VALUES('18','Manual');

INSERT INTO tema 
VALUES('19','Poesia');

INSERT INTO tema 
VALUES('20','Política');

INSERT INTO tema 
VALUES('21','Romance');

INSERT INTO tema 
VALUES('22','Autoajuda');



CREATE TABLE `turno` ( `ID_TURNO` int(11) NOT NULL AUTO_INCREMENT, `DESCRICAO_TURNO` varchar(60) NOT NULL, PRIMARY KEY (`ID_TURNO`) ) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;



INSERT INTO turno 
VALUES('1','');

INSERT INTO turno 
VALUES('2','Manhâ');

INSERT INTO turno 
VALUES('3','Tarde');

INSERT INTO turno 
VALUES('4','Noite');

INSERT INTO turno 
VALUES('5','Manhã / Tarde');

INSERT INTO turno 
VALUES('6','Manhã / Noite');

INSERT INTO turno 
VALUES('7','Tarde / Noite');

INSERT INTO turno 
VALUES('8','Todos');



CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_emprestimokit` AS select `e`.`ID_EMPRESTIMO_KIT` AS `ID_EMPRESTIMO_KIT`,`l`.`DESCRICAO_KIT` AS `DESCRICAO_KIT`,`a`.`NOME_FUNCIONARIO` AS `NOME_FUNCIONARIO`,`e`.`DATA_EMPRESTIMO_KIT` AS `DATA_EMPRESTIMO_KIT`,`e`.`CODIGO_AULA_EMPRESTIMO_KIT` AS `CODIGO_AULA_EMPRESTIMO_KIT`,`e`.`STATUS_EMPRESTIMO_KIT` AS `STATUS_EMPRESTIMO_KIT`,`e`.`ID_KIT` AS `ID_KIT` from ((`emprestimo_kit` `e` join `funcionario` `a` on((`a`.`ID_FUNCIONARIO` = `e`.`ID_FUNCIONARIO`))) join `kit` `l` on((`l`.`ID_KIT` = `e`.`ID_KIT`)));



INSERT INTO v_emprestimokit 
VALUES('1','Kit 2','Vinicius De Sousa Cardoso','2017-04-09','mh1','1','3');

INSERT INTO v_emprestimokit 
VALUES('3','Kit 1','Vinicius De Sousa Cardoso','2017-04-10','mh1','1','2');

INSERT INTO v_emprestimokit 
VALUES('4','Kit 1','Vinicius De Sousa Cardoso','2017-04-08','mh1','2','2');

INSERT INTO v_emprestimokit 
VALUES('6','Kit 2','Vinicius De Sousa Cardoso','2017-04-09','mh2','1','3');

INSERT INTO v_emprestimokit 
VALUES('7','Kit 1','Vinicius De Sousa Cardoso','2017-04-08','th3','1','2');

INSERT INTO v_emprestimokit 
VALUES('8','Kit 2','Vinicius De Sousa Cardoso','2017-04-10','nh4','1','3');

INSERT INTO v_emprestimokit 
VALUES('9','Sala de Video','Vinicius De Sousa Cardoso','2017-04-10','mh3','1','4');

INSERT INTO v_emprestimokit 
VALUES('10','Sala de Video','Vinicius De Sousa Cardoso','2017-04-10','mh2','1','4');

INSERT INTO v_emprestimokit 
VALUES('11','Kit 1','Vinicius De Sousa Cardoso','2017-04-10','mh2','1','2');

INSERT INTO v_emprestimokit 
VALUES('12','Kit 1','Vinicius De Sousa Cardoso','2017-04-08','mh1','1','2');

INSERT INTO v_emprestimokit 
VALUES('13','Kit 1','Vinicius De Sousa Cardoso','2017-04-10','mh3','1','2');

INSERT INTO v_emprestimokit 
VALUES('14','Sala de Video','Vinicius De Sousa Cardoso','2017-04-10','th1','1','4');

INSERT INTO v_emprestimokit 
VALUES('15','Kit 1','Vinicius De Sousa Cardoso','2017-04-10','nh4','1','2');

INSERT INTO v_emprestimokit 
VALUES('16','Kit 1','Vinicius De Sousa Cardoso','2017-04-11','th5','1','2');

INSERT INTO v_emprestimokit 
VALUES('17','Kit 1','Vinicius De Sousa Cardoso','2017-04-11','mh2','1','2');

INSERT INTO v_emprestimokit 
VALUES('18','Kit 1','Vinicius De Sousa Cardoso','2017-04-20','mh3','1','2');

INSERT INTO v_emprestimokit 
VALUES('19','Kit 1','Vinicius De Sousa Cardoso','2017-04-15','th1','1','2');

INSERT INTO v_emprestimokit 
VALUES('20','Kit 1','Vinicius De Sousa Cardoso','2017-04-15','th2','1','2');



CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_emprestimolivro` AS select `e`.`ID_EMPRESTIMO_LIVRO` AS `ID_EMPRESTIMO_LIVRO`,`a`.`NOME_ALUNO` AS `NOME_ALUNO`,`l`.`NOME_LIVRO` AS `NOME_LIVRO`,`c`.`NOME_CADASTRO` AS `NOME_CADASTRO`,`e`.`DATA_INICIAL_EMPRESTIMO_LIVRO` AS `DATA_INICIAL_EMPRESTIMO_LIVRO`,`e`.`DATA_FINAL_EMPRESTIMO_LIVRO` AS `DATA_FINAL_EMPRESTIMO_LIVRO`,`e`.`STATUS_EMPRESTIMO` AS `STATUS_EMPRESTIMO` from (((`emprestimo_livro` `e` join `aluno` `a` on((`a`.`ID_ALUNO` = `e`.`ID_ALUNO`))) join `livro` `l` on((`l`.`ID_LIVRO` = `e`.`ID_LIVRO`))) join `cadastro` `c` on((`c`.`ID_CADASTRO` = `e`.`ID_CADASTRO`)));



INSERT INTO v_emprestimolivro 
VALUES('1','Harrison Souza Araujo','Romanceiro da Inconfidência','Grupo de desenvolvedores','2017-04-03','2017-04-23','2');

INSERT INTO v_emprestimolivro 
VALUES('6','Harrison Souza Araujo','Romanceiro da Inconfidência','Grupo de desenvolvedores','2017-04-07','2017-04-26','2');

INSERT INTO v_emprestimolivro 
VALUES('8','Jack Biller da Silva Prado','Romanceiro da Inconfidência','Grupo de desenvolvedores','2017-04-07','2017-04-11','2');

INSERT INTO v_emprestimolivro 
VALUES('14','Luis Gustavo L.G','Romanceiro da Inconfidência','Grupo de desenvolvedores','2017-04-11','2017-05-01','1');

INSERT INTO v_emprestimolivro 
VALUES('2','Luis Gustavo L.G','Senhora','Grupo de desenvolvedores','2017-04-03','2017-04-23','2');

INSERT INTO v_emprestimolivro 
VALUES('7','Jack Biller da Silva Prado','Senhora','Grupo de desenvolvedores','2017-04-07','2017-04-27','2');

INSERT INTO v_emprestimolivro 
VALUES('10','Jack Biller da Silva Prado','Senhora','Grupo de desenvolvedores','2017-04-07','2017-04-27','2');

INSERT INTO v_emprestimolivro 
VALUES('13','Harrison Souza Araujo','Senhora','Grupo de desenvolvedores','2017-04-11','2017-04-12','2');

INSERT INTO v_emprestimolivro 
VALUES('21','Rafaela Cristina Martin','Senhora','Grupo de desenvolvedores','2017-04-14','2017-04-14','2');

INSERT INTO v_emprestimolivro 
VALUES('22','Luis Gustavo L.G','Senhora','Grupo de desenvolvedores','2017-04-15','2017-04-16','2');

INSERT INTO v_emprestimolivro 
VALUES('25','Harrison Souza Araujo','Senhora','Grupo de desenvolvedores','2017-04-15','2017-05-06','1');

INSERT INTO v_emprestimolivro 
VALUES('4','Jack Biller da Silva Prado','Dom Quixote','Grupo de desenvolvedores','2017-04-06','2017-04-26','2');

INSERT INTO v_emprestimolivro 
VALUES('11','Luis Gustavo L.G','Dom Quixote','Grupo de desenvolvedores','2017-04-07','2017-04-12','2');

INSERT INTO v_emprestimolivro 
VALUES('18','Jack Biller da Silva Prado','Dom Quixote','Grupo de desenvolvedores','2017-04-13','2017-04-14','2');

INSERT INTO v_emprestimolivro 
VALUES('19','Jack Biller da Silva Prado','Dom Quixote','Grupo de desenvolvedores','2017-04-13','2017-04-16','2');

INSERT INTO v_emprestimolivro 
VALUES('20','Jack Biller da Silva Prado','Dom Quixote','Grupo de desenvolvedores','2017-04-13','2017-04-14','2');

INSERT INTO v_emprestimolivro 
VALUES('23','Luis Gustavo L.G','Dom Quixote','Grupo de desenvolvedores','2017-04-15','2017-04-16','2');

INSERT INTO v_emprestimolivro 
VALUES('24','Harrison Souza Araujo','Dom Quixote','Grupo de desenvolvedores','2017-04-15','2017-05-06','1');

INSERT INTO v_emprestimolivro 
VALUES('9','Jack Biller da Silva Prado','A Ladeira Da Saudade','Grupo de desenvolvedores','2017-04-07','2017-04-16','2');

INSERT INTO v_emprestimolivro 
VALUES('27','Jack Biller da Silva Prado','A Ladeira Da Saudade','Grupo de desenvolvedores','2017-04-15','2017-04-18','2');

INSERT INTO v_emprestimolivro 
VALUES('5','Rafaela Cristina Martin','A Ladeira Da Saudade','Tia da biblioteca','2017-04-07','2017-04-23','2');

INSERT INTO v_emprestimolivro 
VALUES('12','Jack Biller da Silva Prado','O medico e o Monstro','Grupo de desenvolvedores','2017-04-08','2017-04-28','2');

INSERT INTO v_emprestimolivro 
VALUES('15','Harrison Souza Araujo','O medico e o Monstro','Grupo de desenvolvedores','2017-04-13','2017-04-14','2');

INSERT INTO v_emprestimolivro 
VALUES('16','Harrison Souza Araujo','O medico e o Monstro','Grupo de desenvolvedores','2017-04-13','2017-04-14','2');

INSERT INTO v_emprestimolivro 
VALUES('17','Harrison Souza Araujo','O medico e o Monstro','Grupo de desenvolvedores','2017-04-13','2017-04-14','2');

INSERT INTO v_emprestimolivro 
VALUES('26','Jack Biller da Silva Prado','O medico e o Monstro','Grupo de desenvolvedores','2017-04-15','2017-05-06','1');



CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_emprestimolivro2` AS select `t1e`.`ID_EMPRESTIMO_LIVRO2` AS `ID_EMPRESTIMO_LIVRO2`,`t2a`.`NOME_FUNCIONARIO` AS `NOME_FUNCIONARIO`,`t3l`.`NOME_LIVRO` AS `NOME_LIVRO`,`t1e`.`DATA_INICIAL_EMPRESTIMO_LIVRO` AS `DATA_INICIAL_EMPRESTIMO_LIVRO`,`t1e`.`DATA_FINAL_EMPRESTIMO_LIVRO` AS `DATA_FINAL_EMPRESTIMO_LIVRO` from ((`emprestimo_livro2` `t1e` join `funcionario` `t2a` on((`t1e`.`ID_FUNCIONARIO` = `t2a`.`ID_FUNCIONARIO`))) join `livro` `t3l` on((`t1e`.`ID_LIVRO` = `t3l`.`ID_LIVRO`)));



INSERT INTO v_emprestimolivro2 
VALUES(


CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_logemprestimolivro` AS select `e`.`ID_EMPRESTIMO_LIVRO` AS `ID_EMPRESTIMO_LIVRO`,`a`.`NOME_ALUNO` AS `NOME_ALUNO`,`l`.`NOME_LIVRO` AS `NOME_LIVRO`,`c`.`NOME_CADASTRO` AS `NOME_CADASTRO`,`e`.`DATA_INICIAL_EMPRESTIMO_LIVRO` AS `DATA_INICIAL_EMPRESTIMO_LIVRO`,`e`.`DATA_FINAL_EMPRESTIMO_LIVRO` AS `DATA_FINAL_EMPRESTIMO_LIVRO`,`e`.`STATUS_EMPRESTIMO` AS `STATUS_EMPRESTIMO`,`e`.`FLTIPOLOG` AS `FLTIPOLOG`,`e`.`DATALOG` AS `DATALOG` from (((`log_emprestimo_livro` `e` join `aluno` `a` on((`a`.`ID_ALUNO` = `e`.`ID_ALUNO`))) join `livro` `l` on((`l`.`ID_LIVRO` = `e`.`ID_LIVRO`))) join `cadastro` `c` on((`c`.`ID_CADASTRO` = `e`.`ID_CADASTRO`)));



INSERT INTO v_logemprestimolivro 
VALUES('2','Luis Gustavo L.G','Senhora','Grupo de desenvolvedores','2017-04-03','2017-04-23','0','U','2017-04-07 01:47:50');

INSERT INTO v_logemprestimolivro 
VALUES('4','Jack Biller da Silva Prado','Dom Quixote','Grupo de desenvolvedores','2017-04-06','2017-04-26','0','U','2017-04-07 01:47:55');

INSERT INTO v_logemprestimolivro 
VALUES('5','Rafaela Cristina Martin','A Ladeira Da Saudade','Tia da biblioteca','2017-04-07','2017-04-27','1','U','2017-04-07 01:48:15');

INSERT INTO v_logemprestimolivro 
VALUES('5','Rafaela Cristina Martin','A Ladeira Da Saudade','Tia da biblioteca','2017-04-07','2017-04-27','2','U','2017-04-07 01:48:15');

INSERT INTO v_logemprestimolivro 
VALUES('6','Harrison Souza Araujo','Romanceiro da Inconfidência','Grupo de desenvolvedores','2017-04-07','2017-04-27','1','I','2017-04-07 01:54:13');

INSERT INTO v_logemprestimolivro 
VALUES('6','Harrison Souza Araujo','Romanceiro da Inconfidência','Grupo de desenvolvedores','2017-04-07','2017-04-27','1','U','2017-04-07 01:54:23');

INSERT INTO v_logemprestimolivro 
VALUES('6','Harrison Souza Araujo','Romanceiro da Inconfidência','Grupo de desenvolvedores','2017-04-07','2017-04-27','2','U','2017-04-07 01:54:23');

INSERT INTO v_logemprestimolivro 
VALUES('7','Jack Biller da Silva Prado','Senhora','Grupo de desenvolvedores','2017-04-07','2017-04-27','1','I','2017-04-07 02:02:40');

INSERT INTO v_logemprestimolivro 
VALUES('7','Jack Biller da Silva Prado','Senhora','Grupo de desenvolvedores','2017-04-07','2017-04-27','1','U','2017-04-07 02:03:00');

INSERT INTO v_logemprestimolivro 
VALUES('8','Jack Biller da Silva Prado','Romanceiro da Inconfidência','Grupo de desenvolvedores','2017-04-07','2017-04-27','1','I','2017-04-07 09:50:58');

INSERT INTO v_logemprestimolivro 
VALUES('9','Jack Biller da Silva Prado','A Ladeira Da Saudade','Grupo de desenvolvedores','2017-04-07','2017-04-27','1','I','2017-04-07 09:51:10');

INSERT INTO v_logemprestimolivro 
VALUES('10','Jack Biller da Silva Prado','Senhora','Grupo de desenvolvedores','2017-04-07','2017-04-27','1','I','2017-04-07 09:51:23');

INSERT INTO v_logemprestimolivro 
VALUES('11','Luis Gustavo L.G','Dom Quixote','Grupo de desenvolvedores','2017-04-07','2017-04-27','1','I','2017-04-07 09:51:51');

INSERT INTO v_logemprestimolivro 
VALUES('10','Jack Biller da Silva Prado','Senhora','Grupo de desenvolvedores','2017-04-07','2017-04-27','1','U','2017-04-07 09:53:02');

INSERT INTO v_logemprestimolivro 
VALUES('12','Jack Biller da Silva Prado','O medico e o Monstro','Grupo de desenvolvedores','2017-04-08','2017-04-28','1','I','2017-04-08 14:55:36');

INSERT INTO v_logemprestimolivro 
VALUES('12','Jack Biller da Silva Prado','O medico e o Monstro','Grupo de desenvolvedores','2017-04-08','2017-04-28','1','U','2017-04-08 14:56:09');

INSERT INTO v_logemprestimolivro 
VALUES('8','Jack Biller da Silva Prado','Romanceiro da Inconfidência','Grupo de desenvolvedores','2017-04-07','2017-04-27','1','U','2017-04-11 00:53:45');

INSERT INTO v_logemprestimolivro 
VALUES('13','Harrison Souza Araujo','Senhora','Grupo de desenvolvedores','2017-04-11','2017-05-01','1','I','2017-04-11 19:37:06');

INSERT INTO v_logemprestimolivro 
VALUES('13','Harrison Souza Araujo','Senhora','Grupo de desenvolvedores','2017-04-11','2017-05-01','1','U','2017-04-11 19:40:52');

INSERT INTO v_logemprestimolivro 
VALUES('14','Luis Gustavo L.G','Romanceiro da Inconfidência','Grupo de desenvolvedores','2017-04-11','2017-05-01','1','I','2017-04-11 20:46:16');

INSERT INTO v_logemprestimolivro 
VALUES('11','Luis Gustavo L.G','Dom Quixote','Grupo de desenvolvedores','2017-04-07','2017-04-27','1','U','2017-04-11 20:48:44');

INSERT INTO v_logemprestimolivro 
VALUES('15','Harrison Souza Araujo','O medico e o Monstro','Grupo de desenvolvedores','2017-04-13','2017-05-04','1','I','2017-04-13 23:22:11');

INSERT INTO v_logemprestimolivro 
VALUES('16','Harrison Souza Araujo','O medico e o Monstro','Grupo de desenvolvedores','2017-04-13','2017-05-04','1','I','2017-04-13 23:24:06');

INSERT INTO v_logemprestimolivro 
VALUES('17','Harrison Souza Araujo','O medico e o Monstro','Grupo de desenvolvedores','2017-04-13','2017-05-04','1','I','2017-04-13 23:25:21');

INSERT INTO v_logemprestimolivro 
VALUES('18','Jack Biller da Silva Prado','Dom Quixote','Grupo de desenvolvedores','2017-04-13','2017-05-04','1','I','2017-04-13 23:27:11');

INSERT INTO v_logemprestimolivro 
VALUES('19','Jack Biller da Silva Prado','Dom Quixote','Grupo de desenvolvedores','2017-04-13','2017-05-04','1','I','2017-04-13 23:27:51');

INSERT INTO v_logemprestimolivro 
VALUES('20','Jack Biller da Silva Prado','Dom Quixote','Grupo de desenvolvedores','2017-04-13','2017-05-04','1','I','2017-04-13 23:30:36');

INSERT INTO v_logemprestimolivro 
VALUES('21','Rafaela Cristina Martin','Senhora','Grupo de desenvolvedores','2017-04-14','2017-05-04','1','I','2017-04-14 13:47:02');

INSERT INTO v_logemprestimolivro 
VALUES('21','Rafaela Cristina Martin','Senhora','Grupo de desenvolvedores','2017-04-14','2017-05-04','1','U','2017-04-14 17:36:53');

INSERT INTO v_logemprestimolivro 
VALUES('20','Jack Biller da Silva Prado','Dom Quixote','Grupo de desenvolvedores','2017-04-13','2017-05-04','1','U','2017-04-14 17:43:43');

INSERT INTO v_logemprestimolivro 
VALUES('20','Jack Biller da Silva Prado','Dom Quixote','Grupo de desenvolvedores','2017-04-13','2017-04-14','2','U','2017-04-14 17:43:47');

INSERT INTO v_logemprestimolivro 
VALUES('5','Rafaela Cristina Martin','A Ladeira Da Saudade','Tia da biblioteca','2017-04-07','2006','2','U','2017-04-14 17:45:21');

INSERT INTO v_logemprestimolivro 
VALUES('6','Harrison Souza Araujo','Romanceiro da Inconfidência','Grupo de desenvolvedores','2017-04-07','2006','2','U','2017-04-14 17:45:33');

INSERT INTO v_logemprestimolivro 
VALUES('17','Harrison Souza Araujo','O medico e o Monstro','Grupo de desenvolvedores','2017-04-13','2017-05-04','1','U','2017-04-14 17:45:53');

INSERT INTO v_logemprestimolivro 
VALUES('18','Jack Biller da Silva Prado','Dom Quixote','Grupo de desenvolvedores','2017-04-13','2017-05-04','1','U','2017-04-14 17:47:28');

INSERT INTO v_logemprestimolivro 
VALUES('18','Jack Biller da Silva Prado','Dom Quixote','Grupo de desenvolvedores','2017-04-13','2017-04-14','2','U','2017-04-14 17:47:32');

INSERT INTO v_logemprestimolivro 
VALUES('18','Jack Biller da Silva Prado','Dom Quixote','Grupo de desenvolvedores','2017-04-13','2017-04-14','2','U','2017-04-14 17:47:32');

INSERT INTO v_logemprestimolivro 
VALUES('18','Jack Biller da Silva Prado','Dom Quixote','Grupo de desenvolvedores','2017-04-13','2017-04-14','2','U','2017-04-14 17:47:32');

INSERT INTO v_logemprestimolivro 
VALUES('18','Jack Biller da Silva Prado','Dom Quixote','Grupo de desenvolvedores','2017-04-13','2017-04-14','2','U','2017-04-14 17:47:33');

INSERT INTO v_logemprestimolivro 
VALUES('18','Jack Biller da Silva Prado','Dom Quixote','Grupo de desenvolvedores','2017-04-13','2017-04-14','2','U','2017-04-14 17:47:33');

INSERT INTO v_logemprestimolivro 
VALUES('18','Jack Biller da Silva Prado','Dom Quixote','Grupo de desenvolvedores','2017-04-13','2017-04-14','2','U','2017-04-14 17:47:34');

INSERT INTO v_logemprestimolivro 
VALUES('18','Jack Biller da Silva Prado','Dom Quixote','Grupo de desenvolvedores','2017-04-13','2017-04-14','2','U','2017-04-14 17:47:34');

INSERT INTO v_logemprestimolivro 
VALUES('15','Harrison Souza Araujo','O medico e o Monstro','Grupo de desenvolvedores','2017-04-13','2017-05-04','1','U','2017-04-14 17:53:54');

INSERT INTO v_logemprestimolivro 
VALUES('16','Harrison Souza Araujo','O medico e o Monstro','Grupo de desenvolvedores','2017-04-13','2017-05-04','1','U','2017-04-14 17:56:08');

INSERT INTO v_logemprestimolivro 
VALUES('22','Luis Gustavo L.G','Senhora','Grupo de desenvolvedores','2017-04-15','2017-05-05','1','I','2017-04-15 09:14:06');

INSERT INTO v_logemprestimolivro 
VALUES('23','Luis Gustavo L.G','Dom Quixote','Grupo de desenvolvedores','2017-04-15','2017-05-05','1','I','2017-04-15 09:14:19');

INSERT INTO v_logemprestimolivro 
VALUES('23','Luis Gustavo L.G','Dom Quixote','Grupo de desenvolvedores','2017-04-15','2017-05-05','1','U','2017-04-15 19:51:26');

INSERT INTO v_logemprestimolivro 
VALUES('22','Luis Gustavo L.G','Senhora','Grupo de desenvolvedores','2017-04-15','2017-05-05','1','U','2017-04-15 19:51:30');

INSERT INTO v_logemprestimolivro 
VALUES('19','Jack Biller da Silva Prado','Dom Quixote','Grupo de desenvolvedores','2017-04-13','2017-05-04','1','U','2017-04-15 19:51:33');

INSERT INTO v_logemprestimolivro 
VALUES('9','Jack Biller da Silva Prado','A Ladeira Da Saudade','Grupo de desenvolvedores','2017-04-07','2017-04-27','1','U','2017-04-15 19:51:36');

INSERT INTO v_logemprestimolivro 
VALUES('24','Harrison Souza Araujo','Dom Quixote','Grupo de desenvolvedores','2017-04-15','2017-05-06','1','I','2017-04-15 19:51:51');

INSERT INTO v_logemprestimolivro 
VALUES('25','Harrison Souza Araujo','Senhora','Grupo de desenvolvedores','2017-04-15','2017-05-06','1','I','2017-04-15 19:52:19');

INSERT INTO v_logemprestimolivro 
VALUES('26','Jack Biller da Silva Prado','O medico e o Monstro','Grupo de desenvolvedores','2017-04-15','2017-05-06','1','I','2017-04-15 19:52:55');

INSERT INTO v_logemprestimolivro 
VALUES('27','Jack Biller da Silva Prado','A Ladeira Da Saudade','Grupo de desenvolvedores','2017-04-15','2017-05-06','1','I','2017-04-15 19:57:07');

INSERT INTO v_logemprestimolivro 
VALUES('27','Jack Biller da Silva Prado','A Ladeira Da Saudade','Grupo de desenvolvedores','2017-04-15','2017-05-06','1','U','2017-04-17 22:23:00');

