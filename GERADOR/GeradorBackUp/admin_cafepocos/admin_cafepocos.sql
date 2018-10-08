
-- Backup Geral
-- Gerando em: 01/08/2018 16:53:33
-- Pelo Gerador JK-19




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: adicional_site
DROP TABLE IF EXISTS `adicional_site`;

CREATE TABLE IF NOT EXISTS `adicional_site` (
	`id_adicional_site` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_adicional_site` varchar(200) NOT NULL ,
	`descricao_adicional_site` text NOT NULL ,
	`imagem_adicional_site` varchar(200) NOT NULL ,
	`saiba_mais_id` int(11) NOT NULL ,
	`usuario_id` int(11) NOT NULL ,
	`data_atualizacao_adicional_site` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_adicional_site` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO adicional_site ( `id_adicional_site`, `titulo_adicional_site`, `descricao_adicional_site`, `imagem_adicional_site`, `saiba_mais_id`, `usuario_id`, `data_atualizacao_adicional_site`, `bool_ativo_adicional_site`) VALUES ( 1, '"O Blend Natural"<br>"Acordar bem cedo e sentir um bom aroma de café!"', 'O café é uma das bebidas mais consumidas do mundo por ter seu sabor marcante e aroma inconfundível; E por isso nós selecionamos os melhores grãos de Poços de Caldas e região e o aroma do saboroso café mineiro para que você possa saborear o mais delicioso café.
<br>
Porque, para nós, café de verdade tem que ser excelente.', 'Blend_Natural_cafepocoscafe.jpg', 1, 1, '2018-01-13 09:46:25', 1);
INSERT INTO adicional_site ( `id_adicional_site`, `titulo_adicional_site`, `descricao_adicional_site`, `imagem_adicional_site`, `saiba_mais_id`, `usuario_id`, `data_atualizacao_adicional_site`, `bool_ativo_adicional_site`) VALUES ( 2, 'CaféPoços<br>A União dos Melhores Cafés!!!', 'Em parceria com o produtor, procuramos o desenvolvimento e o crescimento da cafeicultura de Poços de Caldas e região ao prestarmos serviços em diversas áreas fundamentais ao benefício dos cafés e ao promovermos concursos e eventos para a divulgação e valorização da qualidade de nossos cafés.<br>
A CaféPoços busca reunir os melhores cafés da Região de Poços de Caldas, que por sua altitude, relevo montanhoso e características vulcânicas singulares, proporcionam uma acidez controlada balanceada com uma doçura característica, oferecendo cafés únicos e altamente apreciados no Brasil e no exterior.', 'LogotipoOrignalSemCorte.JPG', 1, 1, '2018-01-20 08:16:20', 1);
INSERT INTO adicional_site ( `id_adicional_site`, `titulo_adicional_site`, `descricao_adicional_site`, `imagem_adicional_site`, `saiba_mais_id`, `usuario_id`, `data_atualizacao_adicional_site`, `bool_ativo_adicional_site`) VALUES ( 3, 'Teste', 'teste', 'Logotipo.JPG', 1, 1, '2018-01-15 17:24:52', 0);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: cards
DROP TABLE IF EXISTS `cards`;

CREATE TABLE IF NOT EXISTS `cards` (
	`id_cards` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_cards` varchar(100) NOT NULL ,
	`descricao_cards` varchar(200)  ,
	`imagem_cards` varchar(100) NOT NULL ,
	`configurar_site_id` int(11) NOT NULL ,
	`data_atualizacao_cards` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_cards` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 1, 'Adubos e Fertilizantes', '', 'adubo.jpg', 1, '2018-01-12 13:41:29', 1);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 2, 'Defensívos Agrícolas', '', 'defensivo.png', 1, '2018-01-12 13:41:42', 1);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `bool_ativo_cards`) VALUES ( 3, 'Ferramentas em Geral', '', 'ferramentas.jpg', 1, '2018-01-29 08:32:38', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: cliefornec
DROP TABLE IF EXISTS `cliefornec`;

CREATE TABLE IF NOT EXISTS `cliefornec` (
	`CODIGO` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`CPF_CGC` varchar(18)  ,
	`RAZAOSOCIAL` varchar(255)  ,
	`NOMEFANTASIA` varchar(255)  ,
	`senha_site` varchar(255)  ,
	`bool_ativo_cliefornec` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 1, '11475013604', 'ACACIO ZANETTI', 'ACACIO ZANETTI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 149, '66475252000185', 'EZIO PENNA E SILVA', 'EZIO PENNA E SILVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 251, '92954952687', 'ACACIO ZANETTI JUNIOR', 'ACACIO ZANETTI JUNIOR', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 454, '02155856000161', 'AFONSO REALE NETO - ME', 'AFONSO REALE NETO - ME', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 456, '82105944604000', 'LUCIANO GARCIA                          ', 'LUCIANO GARCIA                          ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 457, '02571905000147', 'ELETROLEX LTDA - EPP', 'ELETROLEX LTDA - EPP', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 459, '21164306000153', 'HOTEL POCOS DE CALDAS LTDA', 'HOTEL POCOS DE CALDAS LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 476, '75488213600000', 'SIRLEY LOURENCO FERREIRA                ', 'SIRLEY LOURENCO FERREIRA                ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 479, '71345441000254', 'CAREMLL PRODUTOS FARMACEUTICOS LTDA-EPP', 'CAREMLL PRODUTOS FARMACEUTICOS LTDA-EPP', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 482, '35243627615000', 'JOSE EXPEDITO FRANCO                    ', 'JOSE EXPEDITO FRANCO                    ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 503, '30977606600000', 'JOAO BENTO DA SILVA                     ', 'JOAO BENTO DA SILVA                     ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 504, '18426336604', 'JOSE MARCOS ORTEGA DE ARO', 'JOSE MARCOS ORTEGA DE ARO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 505, '42945428000157', 'MARTINS E DAMAS LTDA                    ', 'MARTINS E DAMAS LTDA                    ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 569, '23324874000108', 'REGINALDO COELHO ALVES                  ', 'REGINALDO COELHO ALVES                  ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 571, '64197221000184', 'LAVA BEM URCA', 'LAVA BEM URCA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 573, '03474527606000', 'CARLOS ALBERTO PESSOA                   ', 'CARLOS ALBERTO PESSOA                   ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 608, '02210187000183', 'SANDRA MARIA BOSCO RENGANESCHI          ', 'SANDRA MARIA BOSCO RENGANESCHI          ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 668, '00278098622', 'NEIL DOS ANJOS DE SOUSA E OU', 'NEIL DOS ANJOS DE SOUSA E OU', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 694, '00028931696', 'MARCIO JOSE DA SILVA', 'MARCIO JOSE DA SILVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 697, '01995102672', 'MOZART XAVIER LOPES - ESPOLIO', 'MOZART XAVIER LOPES - ESPOLIO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 701, '94873348668', 'NARCISO CANDIDO DA SILVA', 'NARCISO CANDIDO DA SILVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 704, '97318647687', 'NATANAEL FELICIANO', 'NATANAEL FELICIANO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 908, '08897689604', 'NAIR MARTINS DE MELLO E OUTROS', 'NAIR MARTINS DE MELLO E OUTROS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 953, '32462913904', 'NARCIZO RODRIGUES', 'NARCIZO RODRIGUES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 1037, '17524653000253', 'ALBUQUERQUE COM E SERVICOS LTD', 'ALBUQUERQUE COM E SERVICOS LTD', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 1385, '45209332691', 'ERNANDES FRANCO DOS REIS E OUTRO', 'ERNANDES FRANCO DOS REIS E OUTRO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 1513, '45760330691', 'DORCELINO XAVIER DA SILVA', 'DORCELINO XAVIER DA SILVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 1666, '10802728871', 'DIONIZIO BATISTA RAMOS', 'DIONIZIO BATISTA RAMOS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 1711, '31404987649', 'PAULO ROBERTO MUNIZ', 'PAULO ROBERTO MUNIZ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 1774, '37360060800', 'JOSE ALVES FERRAZ', 'JOSE ALVES FERRAZ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 1875, '99709783653', 'PEDRO DE OLIVEIRA PAIVA E OUTRA', 'PEDRO DE OLIVEIRA PAIVA E OUTRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 1917, '82104174600', 'JENUEL FERREIRA SORIANO', 'JENUEL FERREIRA SORIANO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 1919, '77210476687', 'EDVALDO GONCALVES', 'EDVALDO GONCALVES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 2981, '86828076000125', 'WIDE TECH CONS.SIST. S/C LTDA.          ', 'WIDE TECH CONS.SIST. S/C LTDA.          ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 4737, '25863721000156', 'OXICOPER LTDA', 'OXICOPER LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 4794, '67856369000171', 'QUIMIVAN COMERCIAL LTDA                 ', 'QUIMIVAN COMERCIAL LTDA                 ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 4801, '65770059000104', 'QUINABRA-QUIM.NAT.BRAS.LTDA', 'QUINABRA-QUIM.NAT.BRAS.LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 4847, '65559155000108', 'SANYO ARMAZENS GERAIS LTDA              ', 'SANYO ARMAZENS GERAIS LTDA              ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 4874, '60844800007638', 'SANDOZ S.A.                             ', 'SANDOZ S.A.                             ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 4889, '61457743000180', 'SALVI CASAGRANDE MED.AUTOMATIZ', 'SALVI CASAGRANDE MED.AUTOMATIZ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 4896, '50148444000147', 'SANEBRAS SOC.BRAS.SANEANTES LT          ', 'SANEBRAS SOC.BRAS.SANEANTES LT          ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 4990, '64212731000183', 'ZEBU ECOLOGICA S/A                      ', 'ZEBU ECOLOGICA S/A                      ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10031, '22007215000177', 'TOKFECH LTDA.', 'TOKFECH LTDA.', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10039, '41950643000183', 'POÇOS TURBO DIESEL LTDA.', 'POÇOS TURBO DIESEL LTDA.', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10042, '17280125891', 'ANTONIO JORGE RODRIGUES', 'ANTONIO JORGE RODRIGUES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10071, '82221847849', 'PAULO AFONSO DA FONSECA', 'PAULO AFONSO DA FONSECA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10105, '82272590810', 'CORNELIO JOSE DA SILVA', 'CORNELIO JOSE DA SILVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10120, '31416284672', 'JOAO CANDIDO MONTEIRO', 'JOAO CANDIDO MONTEIRO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10121, '84576375687', 'ALEXANDRE VILAS BOAS', 'ALEXANDRE VILAS BOAS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10124, '02619393604', 'ANDRELINO ANTONIO SIQUEIRA', 'ANDRELINO ANTONIO SIQUEIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10126, '10638734000154', 'RODRIGUES SILVA DE OLIVEIRA ME', 'FUNILARIA E PINTURA PASTEIS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10143, '03805426000100', 'MB AUDITORES INDEPENDENTES S/S LTDA.', 'MB AUDITORES INDEPENDENTES S/S LTDA.', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10167, '06143726000240', 'UTI CAP SERV COM PROD. ALIM. LTDA.', 'UTI CAP SERV COM PROD. ALIM. LTDA.', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10173, '20775128003826', 'PAROQUIA NOSSA SENHORA APARECIDA', 'PAROQUIA NOSSA SENHORA APARECIDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10174, '57032427000350', 'PEDRO MARCIO DA FONSECA & CIA LTDA.', 'SUPERMERCADO FONSECA LTDA.', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10175, '02689733000100', 'PAO PAO E CONVENIENCIAS LTDA', 'PAO PAO E CONVENIENCIAS LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10177, '33333333333', 'CARLOS THEODORO MARAN', 'CARLOS THEODORO MARAN', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10179, '33333333333', 'CARLOS MARAN', 'CARLOS MARAN', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10184, '97316806672', 'SILVESTRE AZEVEDO FERRAZ', 'SILVESTRE AZEVEDO FERRAZ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10186, '13729003000102', 'VENANCIO & CIA. LTDA.', 'SUPERLIMP UTENSILIOS COMESTICOS.', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10187, '07845341000107', 'PIZZA & PIZZA LTDA.', 'PIZZA & PIZZA LTDA.', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10188, '03685056000115', 'MIGUEL ARCANJO MAXIMO-ME', 'MIGUEL ARCANJO MAXIMO-ME', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10189, '57121893649', 'BENEDITA BRAGA', 'BENEDITA BRAGA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10192, '11848949000162', 'MARCELO CANDIDO EDUARDO & CIA. LTDA.-ME', 'TRANSLOC TRANSPORTES E LOCAÇÕES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10201, '02157667849', 'JAIR SÓRIO', 'JAIR SÓRIO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10203, '09740222684', 'JULIANO APARECIDO DE OLIVEIRA CAMPOS', 'JULIANO APARECIDO DE OLIVEIRA CAMPOS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10208, '07918953000263', 'SYRIO COM.IMP.EXP.LTDA', 'SYRIO COM.IMP.EXP.LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10233, '39346861033337', 'CENCOSUD BRASIL COMERCIAL LTDA.', 'CENCOSUD BRASIL COMERCIAL LTDA.', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10238, '12631393000110', 'CORPLAST COMERCIO DE ARTEFATOS DE BORRACHAS LTDA', 'CORPLAST COMERCIO DE ARTEFATOS DE BORRACHAS LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10245, '13708711000167', 'POSTO ALTO DA SERRA DE DIVINOLANDIA LTDA ME', 'POSTO ALTO DA SERRA DE DIVINOLANDIA LTDA ME', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10246, '18386393000189', 'CARTORIO OF.REG.IMOVEIS COMARCA S.J.RIO PARDO-SP', 'CARTORIO OF.REG.IMOVEIS COMARCA S.J.RIO PARDO-SP', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10247, '17856881000140', 'MINAS LAR LTDA', 'MINAS LAR LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10253, '14482013000159', 'STRADA VEICULOS', 'STRADA VEICULOS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10254, '18770087000141', 'FABIANO CUSTODIO FERREIRA ME', 'FABIANO CUSTODIO FERREIRA ME', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10257, '33041260135841', 'VIA VAREJO S/A', 'CASAS BAHIA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10258, '33333333333', 'FRANCISCO BARZAGLI', 'FRANCISCO BARZAGLI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10265, '08908516620', 'FELICIANO LIBANO SILVEIRA Fo.', 'FELICIANO LIBANO SILVEIRA Fo.', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10269, '01627368000147', 'ROBSON GIRALDO', 'TEMPERO MINEIRO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10279, '03078695808', 'HENRIQUE LUIZ REIJERS E OUTRO', 'HENRIQUE LUIZ REIJERS E OUTRO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10307, '02619563615', 'JOSE MAURO FRANCO', 'JOSE MAURO FRANCO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10309, '45236791008761', 'COOPERCITRUS COOP. DE PRODUTORES RURAIS', 'COOPERCITRUS COOP. DE PRODUTORES RURAIS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10314, '87689402000557', 'TRANSPORTES LUFT LTDA', 'TRANSPORTES LUFT LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10335, '22023162000188', 'CONSTRUTORA LBL LTDA.', 'CONSTRUTORA LBL LTDA.', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10336, '60394723003089', 'DIXIE TOGA LTDA.', 'DIXIE TOGA LTDA.', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10341, '22851247000154', 'ATACADO VERIN LTDA ME', 'ATACADO VERIN LTDA ME', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10342, '71388862000181', 'Minas Lubrificantes Ltda.', '', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10344, '01456452665', 'HENRIQUE PALMA NETO', 'HENRIQUE PALMA NETO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10347, '07865151000151', 'R. F. MILANESI EPP', 'SUPERAGRI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10353, '88037668000154', 'TRAMONTINA MULTI S/A', '', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10354, '12933715000429', 'CMR LABORATORIOS VETERINARIOS LTDA.', 'CMR LABORATORIOS VETERINARIOS LTDA.', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10358, '00634083000251', 'VETQUIMICA COMERCIAL AGRICOLA LTDA', 'CURVELO - MG VETQUIMICA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10359, '19681514000188', 'DURIN IMPORTS - IMPORTACAO E COMERC PRODUTOS PLAST', 'DURIN IMPORTS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10373, '00401938000113', 'REFRACON IND. DE REFRATARIOS LTDA EPP', 'REFRACON', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10374, '16499809000140', 'METALURGICA BRAS SOL EIRELI', 'BRAS SOL', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10383, '10379339000102', 'CREUZAMIR APARECIDA FANTI ME', 'FANTI FIOS E CABOS - VARAL FANTI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10385, '04376510000119', 'FABIO MESSIAS BORGES', 'FAMAQUINAS FERRAMENTAS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10394, '24109835000142', 'SANDRINI  & COSTA RESTAURANTE LTDA.', 'SANDRINI  & COSTA RESTAURANTE LTDA.', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10402, '27388552000175', 'FERRAMENTAS AGRICOLAS L.P. LTDA', 'FERRAMENTAS L.P.', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10425, '05452786000100', 'JUSTIÇA FEDERAL DE PRIMEIRO GRAU', 'JUSTIÇA FEDERAL DE PRIMEIRO GRAU', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10432, '03817469000106', 'TOYAMA DO BRASIL MAQUINAS LTDA', 'Toyama Br', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10434, '05454606000110', 'EVERALDO JUNIOR ELLER EIRELI', 'Tecnutri', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10468, '23392253000153', 'IVAN FERRADOZA ME', 'MONTE SANTO DISTRIBUIDORA AGROPECAS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10470, '95591723005188', 'TNT MERCURIO CARGAS E ENCOMENDAS', 'TNT MERCURIO CARGAS E ENCOMENDAS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10471, '', 'MARCIO JUNQUEIRA DE SOUZA E SILVA', '', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10508, '34667490691', 'BENEDITO MARTINS VIEIRA', 'BENEDITO MARTINS VIEIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10702, '17269806691', 'ONOFRE DE SIQUEIRA', 'ONOFRE DE SIQUEIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10794, '31439870659', 'RICARDO BRAGA', 'RICARDO BRAGA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10814, '46797491649', 'SAULO FRANCISCO DE PAULA', 'SAULO FRANCISCO DE PAULA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 10852, '97860620600', 'MARIA ALVES E FILHOS', 'MARIA ALVES E FILHOS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 16576, '96452255000164', 'R.C.M. AGRICOLA LTDA.                   ', 'R.C.M. AGRICOLA LTDA.                   ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 16577, '64114952000119', 'R.F. RODRIGUES FRANCA                   ', 'R.F. RODRIGUES FRANCA                   ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 16578, '25390782000143', 'RAMOS & LUCAS COM.E REPRES.LTD', 'RAMOS & LUCAS COM.E REPRES.LTD', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 16579, '55958318000171', 'RAPIDO D OESTE S.A', 'RAPIDO D OESTE S.A', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 16580, '20851705000120', 'RAPIDO SUL DE MINAS LTDA                ', 'RAPIDO SUL DE MINAS LTDA                ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 16581, '19312115000301', 'RAPIDO TRANSPORTE CALDAS LTDA           ', 'RAPIDO TRANSPORTE CALDAS LTDA           ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 16587, '26339234000151', 'REFRIGERACAO BASSO LTDA', 'REFRIGERACAO BASSO LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 16593, '45990181000189', 'ROBERT BOSCH LIMITADA', 'ROBERT BOSCH LIMITADA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 16607, '00727996000131', 'SAL RURAL IND.COM.LTDA.                 ', 'SAL RURAL IND.COM.LTDA.                 ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 16608, '60844800001869', 'SANDOZ S/A                              ', 'SANDOZ S/A                              ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 16609, '00003249000150', 'SANI QUIMICA LTDA                       ', 'SANI QUIMICA LTDA                       ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 16611, '61079117022257', 'SAO PAULO ALPARGATAS S/A                ', 'SAO PAULO ALPARGATAS S/A                ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 16630, '60872306000160', 'SHERWIN-WILLIANS DO BRAS.I.C.L          ', 'SHERWIN-WILLIANS DO BRAS.I.C.L          ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 16735, '21785860000158', 'WILSON DA SILVEIRA(SERVE-JATO)          ', 'WILSON DA SILVEIRA(SERVE-JATO)          ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 16736, '49697261000100', 'WILSON ROBERTO ZANETTI                  ', 'WILSON ROBERTO ZANETTI                  ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 16737, '29213386006809', 'XEROX DO BRASIL S/A.                    ', 'XEROX DO BRASIL S/A.                    ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 16738, '04831230000153', 'IRMAOS YAMAGUTI LTDA. - EPP', 'IRMAOS YAMAGUTI LTDA. - EPP', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 30059, '33333333333', 'BELARMINO ZANETTI', 'BELARMINO ZANETTI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 30078, '26394596604', 'ANTONIO FELICIANO', 'ANTONIO FELICIANO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 30090, '23640238000187', 'CARNEIRO E CIA LTDA', 'CARNEIRO E CIA LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 30856, '75296977653', 'SEBASTIAO APARECIDO DE SOUZA', 'SEBASTIAO APARECIDO DE SOUZA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 30988, '21462852653', 'SEBASTIAO PICOLLI FILHO', 'SEBASTIAO PICOLLI FILHO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50018, '06253192655', 'EZEQUIEL BONFIM SILVA', 'EZEQUIEL BONFIM SILVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50021, '17213789000161', 'CARLOS EDUARDO CARDOSO', 'CARLOS EDUARDO CARDOSO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50023, '55800165653', 'ADAO DOMINGOS DA SILVA', 'ADAO DOMINGOS DA SILVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50024, '07621037000186', 'CACAU SHOW', 'CACAU SHOW', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50029, '01607044000147', 'UNIBANCO S/A', 'UNIBANCO S/A', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50030, '11600753000154', 'NLB INDUSTRIA DE MAQUINAS E EQUIPAMENTO LTDA EPP', 'NLB INDUSTRIA DE MAQUINAS E EQUIPAMENTO LTDA EPP', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50400, '00468429000108', 'VITAGRO IND.COM.REPRESENTACOES LTDA.    ', 'VITAGRO IND.COM.REPRESENTACOES LTDA.    ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50402, '61322296634000', 'ROGERIO HENRIQUE FRANCO                 ', 'ROGERIO HENRIQUE FRANCO                 ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50403, '23887265653000', 'GERALDO DONIZETI FRANCO                 ', 'GERALDO DONIZETI FRANCO                 ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50405, '03413737000124', 'SERRALHERIA CORREA & FRANCO LTDA', 'SERRALHERIA CORREA & FRANCO LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50406, '00958123000130', 'LUPERCIO JOSE CHAVES DIAS               ', 'LUPERCIO JOSE CHAVES DIAS               ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50407, '00414115000122', 'POUSO ACO COMERCIO DE FERRAGENS LTDA    ', 'POUSO ACO COMERCIO DE FERRAGENS LTDA    ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50408, '57211997000146', 'MARCON INDUSTRIA METALURGICA LTDA', 'MARCON INDUSTRIA METALURGICA LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50409, '56783681013306', 'SEMENTES AGROCERES S/A-IPUA             ', 'SEMENTES AGROCERES S/A-IPUA             ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50424, '03158641000167', 'O JORNALISTA LTDA                       ', 'O JORNALISTA LTDA                       ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50425, '61082822015428', 'BUNGE FERTILIZANTES S/A  CUBATAO', 'BUNGE FERTILIZANTES S/A', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50426, '10390117803000', 'DANIEL TOMAZ                            ', 'DANIEL TOMAZ                            ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50427, '26379511000150', 'ITAPORANGA COMERCIO E EXPORTACAO LTDA', 'ITAPORANGA COMERCIO E EXPORTACAO LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50428, '56374895000260', 'MINERACAO DE CALCARIO VITTI LTDA        ', 'MINERACAO DE CALCARIO VITTI LTDA        ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50429, '65239691000126', 'NORA NEY NUNES                          ', 'NORA NEY NUNES                          ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50430, '64857093634000', 'LUIZ CARLOS GOMES                       ', 'LUIZ CARLOS GOMES                       ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50431, '12200417691000', 'LAZARO DIVINO ALEXANDRE                 ', 'LAZARO DIVINO ALEXANDRE                 ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50442, '23655301000159', 'ARTEC INDUSTRIA E COMERCIO LTDA. - EPP', 'ARTEC INDUSTRIA E COMERCIO LTDA. - EPP', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50443, '02639570000151', 'SOLPACK LTDA', 'SOLPACK LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50444, '10678456000169', 'CALF - CALCADOS E EPI S S/A             ', 'CALF - CALCADOS E EPI S S/A             ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50445, '56783681012504', 'SEMENTES AGROCERES S/A                  ', 'SEMENTES AGROCERES S/A                  ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50446, '52226073000108', 'BRASIF S/A EXPORTACAO E IMPORTACAO', 'BRASIF S/A EXPORTACAO E IMPORTACAO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50447, '01468659000130', 'POSTO EMANUEL LTDA                      ', 'POSTO EMANUEL LTDA                      ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50448, '71345441002540', 'CARMELL PRODUTOS FARMACEUTICOS LTDA     ', 'CARMELL PRODUTOS FARMACEUTICOS LTDA     ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50449, '777.583.746-20', 'ALAELSON FERREIRA RODRIGUES', 'ALAELSON FERREIRA RODRIGUES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50450, '85312762687000', 'JOSE JOSMAR                             ', 'JOSE JOSMAR                             ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50451, '54832555000129', 'TELMAC-COM.IMPORTACAO E EXPORTACAO LTDA', 'TELMAC-COM.IMPORTACAO E EXPORTACAO LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50453, '33982139600000', 'SEBASTIAO DO CARMO FRANCO               ', 'SEBASTIAO DO CARMO FRANCO               ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50454, '78097878615000', 'SANDRO JOSE DE OLIVEIRA                 ', 'SANDRO JOSE DE OLIVEIRA                 ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50460, '02423920000148', 'BIO SOJA FERTILIZANTES LTDA', 'BIO SOJA FERTILIZANTES LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50461, '53577961000553', 'BRASIL TRANSP.INTERMODAL LTDA (D.CAXIAS)', 'BRASIL TRANSP.INTERMODAL LTDA (D.CAXIAS)', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50462, '07703716634000', 'JOAO AUGUSTINHO MENDES                  ', 'JOAO AUGUSTINHO MENDES                  ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50463, '31042066604000', 'JOSE CARLOS NERY                        ', 'JOSE CARLOS NERY                        ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50477, '01383526000241', 'GRIFFIN DO BRASIL LTDA                  ', 'GRIFFIN DO BRASIL LTDA                  ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50479, '70938956000114', 'MAURICIO JOSE GUIMARAES                 ', 'MAURICIO JOSE GUIMARAES                 ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50480, '60898723000181', 'BCN-BANCO DE CREDITO NACIONAL S.A.', 'BCN-BANCO DE CREDITO NACIONAL S.A.', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50481, '18936539604000', 'AGEU LAZARO DE FIGUEIREDO', 'AGEU LAZARO DE FIGUEIREDO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50482, '47964424000130', 'IND.MECANICAS ROCHFER LTDA', 'IND.MECANICAS ROCHFER LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50483, '03670750000169', 'WAGO PRODUTOS PECUARIOS LTDA', 'WAGO PRODUTOS PECUARIOS LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50484, '02437276000167', 'IND.E COM. TWILL S/A                    ', 'IND.E COM. TWILL S/A                    ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50485, '00338421000127', 'JOSE OSVALDO DE BRITO', 'JOSE OSVALDO DE BRITO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50486, '01354636000102', 'UNIVERSO ONLINE LTDA                    ', 'UNIVERSO ONLINE LTDA                    ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50487, '51032856653000', 'PAULO AFONSO DE OLIVEIRA                ', 'PAULO AFONSO DE OLIVEIRA                ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50489, '88006514615000', 'LUIZ CARLOS DE SOUZA                    ', 'LUIZ CARLOS DE SOUZA                    ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50490, '41665845000183', 'FERREIRA & LOPES LTDA. - ME             ', 'FERREIRA & LOPES LTDA. - ME             ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50491, '04640505884000', 'VALDELINO PEREIRA DO NASCIMENTO         ', 'VALDELINO PEREIRA DO NASCIMENTO         ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50497, '10209303000172', 'I BRESSAN INSUMOS AGROPECUARIOS ME', 'I BRESSAN INSUMOS AGROPECUARIOS ME', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50501, '10490830000106', 'REDE SULMINEIRA DE PROVEDORES', 'REDE SULMINEIRA DE PROVEDORES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50504, '75304766000320', 'SANMAK IND. DE MAQUINAS S/A', 'SANMAK IND. DE MAQUINAS S/A', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50516, '61082822017048', 'BUNGE FERTILIZANTES S/A - CONGONHAL', 'BUNGE FERTILIZANTES S/A - CONGONHAL', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50519, '23648751000114', 'GEORGES STRAVOS APOSTOLATOS - ME        ', 'GEORGES STRAVOS APOSTOLATOS - ME        ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50520, '18913459000141', 'MARETTI & CIA LTDA', 'MARETTI & CIA LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50521, '01918990000104', 'MINERACAO CORUMBA LTDA', 'MINERACAO CORUMBA LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50522, '19308469672000', 'OSMAR PEREIRA MARTINS                   ', 'OSMAR PEREIRA MARTINS                   ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50552, '00637023000101', 'MOVEIS REAL DEVILLE LTDA                ', 'MOVEIS REAL DEVILLE LTDA                ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50553, '22358253000174', 'FERTILAVRAS COM. E REPRESENTACOES LTDA  ', 'FERTILAVRAS COM. E REPRESENTACOES LTDA  ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50554, '50918515000143', 'DOSIO BETTIO & CIA LTDA ME              ', 'DOSIO BETTIO & CIA LTDA ME              ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50555, '05480297686000', 'FERNANDO TOBIAS DA COSTA                ', 'FERNANDO TOBIAS DA COSTA                ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50556, '20770566000533', 'COOP. REG.CAFEICULTORES GUAXUPE LTDA', 'COOP. REG.CAFEICULTORES GUAXUPE LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50583, '10277146000132', 'OURENSE DO BRASIL IND ART MET PLAST LTDA.', 'OURENSE DO BRASIL IND ART MET PLAST LTDA.', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50593, '47960950089785', 'MAGAZINE LUIZA S/A', 'MAGAZINE LUIZA S/A', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50603, '06227077000185', 'FUNDIÇÃO LASSAL ME', 'FUNDIÇÃO LASSAL ME', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50622, '19464091000144', 'JQ RACOES LTDA-ME', 'JQ RACOES LTDA-ME', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50645, '55514269000188', 'LIVRARIA E PAPELARIA  TATONI LTDA.', 'LIVRARIA E PAPELARIA  TATONI LTDA.', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50673, '03544598000178', 'CARDOSO DE FREITAS E CIA LTDA', 'CARDOSO DE FREITAS E CIA LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50698, '17993482000120', 'JELIABE RABELO DE ALMEIDA', 'JELIABE RABELO DE ALMEIDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50699, '03239470000109', 'PITAGORAS SISTEMA DE EDUCAÇÃO SUPERIOR SOCIEDADE LTDA.', 'PITAGORAS SISTEMA DE EDUCAÇÃO SUPERIOR SOCIEDADE LTDA.', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50755, '41719444000169', 'ALL PANOS INDUSTRIA E COMERCIO LTDA', 'ALL PANOS INDUSTRIA E COMERCIO LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50757, '54951520000109', 'ART GRAF ETIQUETAS LTDA EPP', 'ART GRAF ETIQUETAS LTDA EPP', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50758, '21782545000258', 'ANTONIO RENATO DE CARVALHO', 'TRANSCALDAS TRANSPORTES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50759, '02783490000175', 'KELLTER COMERCIO DE SEMENTES DE CAPIM LTDA.', 'KELLTER COMERCIO DE SEMENTES DE CAPIM LTDA.', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50764, '46422275000114', 'EBRAPI  AGRONEGOCIOS LTDA', 'EBRAPI  AGRONEGOCIOS LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50771, '21333646000160', 'FUNDICAO ALFA LTDA', 'FUNDICAO ALFA LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50772, '89844922000199', 'FELTRIN SEMENTES LTDA', 'FELTRIN SEMENTES LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50774, '67783872620', 'RITA DE FATIMA FEREIRA', 'RITA DE FATIMA FEREIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50776, '13193159000111', 'LUCAS AUGUST PEREIRA-ME', 'LUCAS AUGUST PEREIRA-ME', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50781, '07479591616', 'DIEGO EDUARDO RABELO DE ARAUJO', 'DIEGO EDUARDO RABELO DE ARAUJO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50782, '41238290663', 'MARIA OLIMPIA FERREIRA', 'MARIA OLIMPIA FERREIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50783, '08291015864', 'JOAO OSCAR CLAUDIANO', 'JOAO OSCAR CLAUDIANO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50790, '07046317000108', 'BOMBAS LIDER COMERCIO LTDA.', 'BOMBAS LIDER COMERCIO LTDA.', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50791, '16097366000160', 'GAIOLAS QUATIGUA INDUSTRIA E COMERCIO LTDA.', 'GAIOLAS QUATIGUA INDUSTRIA E COMERCIO LTDA.', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50800, '11792240600', 'MICHAEL DE CAMPOS LIMA', 'MICHAEL DE CAMPOS LIMA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50807, '87622017604', 'GEOMAR DE OLIVEIRA FRANCO', 'GEOMAR DE OLIVEIRA FRANCO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 50808, '00735879000110', 'NORDTECH MAQUINAS E MOTORES LTDA.', 'NORDTECH MAQUINAS E MOTORES LTDA.', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 90074, '34630953868', 'ROBERTO FRISCHIMAN', 'ROBERTO FRISCHIMAN', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 90112, '03018385691', 'MARCELO FONSECA PEREIRA', 'MARCELO FONSECA PEREIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 90113, '48965359600', 'EDSON BENEDITO DE MELO', 'EDSON BENEDITO DE MELO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 90114, '15911004615', 'GERALDO PERGENTINO DA SILVA', 'GERALDO PERGENTINO DA SILVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 90191, '02942958000127', 'LUIZ RENATO BACARINE DE SOUZA - ME', 'LUIZ RENATO BACARINE DE SOUZA - ME', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 90744, '18514650653', 'HELIO CANDIDO FRANCO E OUTRA', 'HELIO CANDIDO FRANCO E OUTRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 90745, '55790461972', 'JOSE ESIPARRAPAN E OUTRA', 'JOSE ESIPARRAPAN E OUTRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 90746, '65906144900', 'GILDEAO DOS SANTOS', 'GILDEAO DOS SANTOS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 90747, '21396825649', 'OCTAVIANO DA SILVA E MARIA ANGELINA DA SILVA', 'OCTAVIANO DA SILVA E MARIA ANGELINA DA SILVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 90748, '', 'ARMAZEM COOP. REGIONAL DE POCOS DE CALDAS', 'ARMAZEM COOP. REGIONAL DE POCOS DE CALDAS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 90749, '44831733000143', 'PREFEITURA DA ESTANCIA HIDR. DE AGUAS DA PRATA', 'PREFEITURA DA ESTANCIA HIDR. DE AGUAS DA PRATA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 90750, '20123428000139', 'SINDICATO DOS ENGENHEIROS NO ESTADO MINAS GERAIS', 'SINDICATO DOS ENGENHEIROS NO ESTADO MINAS GERAIS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 90751, '82105367615', 'ERASMO JOSE SEBASTIAO E MAILZA DE F.F.SEBASTIAO', 'ERASMO JOSE SEBASTIAO E MAILZA DE F.F.SEBASTIAO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 90753, '', 'ARMAZEM COOP. REGIONAL DE P DE CALDAS (CAMPESTRE)', 'ARMAZEM COOP. REGIONAL DE P DE CALDAS (CAMPESTRE)', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 90754, '43875327691', 'JOSE HORACIO ANUNCIACAO', 'JOSE HORACIO ANUNCIACAO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 90755, '23655491000104', 'ASILO E CENTRO ESPIRITA VINHA DO SENHOR', 'ASILO E CENTRO ESPIRITA VINHA DO SENHOR', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 90758, '03363354000199', 'DISTRIBUIDORA DE GENEROS ALIMENTICIOS COYOTE LTDA', 'DISTRIBUIDORA DE GENEROS ALIMENTICIOS COYOTE LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 90759, '', 'PNEUS 1001 LTDA - (BORRACHARIA)', 'PNEUS 1001 LTDA - (BORRACHARIA)', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 90760, '41903436000178', 'GOOD PRODUTOS ALIMENTICIOS LTDA.', 'GOOD PRODUTOS ALIMENTICIOS LTDA.', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 90761, '19834332000280', 'PANIF. CONF. E LANCH. NOSSO PAO LTDA - FILIAL', 'PANIF. CONF. E LANCH. NOSSO PAO LTDA - FILIAL', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 90762, '17203848604', 'JOSE ABRAO DE FIGUEIREDO', 'JOSE ABRAO DE FIGUEIREDO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 90763, '10833609815', 'MARIA LUCIA CARVALHO LIMA DE TOLEDO PIZA', 'MARIA LUCIA CARVALHO LIMA DE TOLEDO PIZA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 90764, '56108125853', 'ODAIR ANIZEZIO DE MELO', 'ODAIR ANIZEZIO DE MELO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 91097, '31321020678', 'JOSUE DOMINGUES DA SILVA', 'JOSUE DOMINGUES DA SILVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 91334, '10887865887', 'MARCILIO MESQUITA', 'MARCILIO MESQUITA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 91339, '33296723900', 'JOAO DA COSTA SILVERIO', 'JOAO DA COSTA SILVERIO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 91366, '04210043630', 'ELCIO LUIS MONTEVECHI', 'ELCIO LUIS MONTEVECHI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 91531, '21398402672', 'ULISES ANDRADE E OUTRA', 'ULISES ANDRADE E OUTRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 91532, '40532445872', 'BENEDITO ALVES FERREIRA SILVA', 'BENEDITO ALVES FERREIRA SILVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 91533, '10082689687', 'JOSE LEMES DE CARVALHO', 'JOSE LEMES DE CARVALHO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 91535, '00528137620', 'JYLBES DELLAROLI', 'JYLBES DELLAROLI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 91536, '39536602687', 'PAULO SERGIO INACIO DA SILVA', 'PAULO SERGIO INACIO DA SILVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 91537, '05989601000192', 'PROTESEG EQUIPAMENTOS DE SEGURANÇA LTDA. - ME', 'PROTESEG EQUIPAMENTOS DE SEGURANÇA LTDA. - ME', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 91539, '29676339849', 'JOSE JUSTINO DE ALMEIDA', 'JOSE JUSTINO DE ALMEIDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 91540, '56631583000103', 'PRO VASO IND.COM. DE FERTILIZANTES ORGANICOS LTDA.', 'PRO VASO IND.COM. DE FERTILIZANTES ORGANICOS LTDA.', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 91541, '72592583653', 'LUCIANA UTSCH LEONELLO NOGUEIRA', 'LUCIANA UTSCH LEONELLO NOGUEIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 91542, '02727329660', 'WILSON MOLINARI', 'WILSON MOLINARI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 91548, '08403622856', 'VALDIR BARZAGLI', 'VALDIR BARZAGLI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 91557, '43467334687', 'REGINALDO MARIANO', 'REGINALDO MARIANO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 92264, '45450110634', 'JOSE PERES FERREIRA FILHO', 'JOSE PERES FERREIRA FILHO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 92265, '09174591134', 'CARMEN LUCIA OPIPARI SANTIAGO', 'CARMEN LUCIA OPIPARI SANTIAGO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93456, '96224568634', 'RONYVALDO  DONIZETTI DA CRUZ', 'RONYVALDO  DONIZETTI DA CRUZ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93457, '41292537604', 'LUIZ  MIGUEL  FERNANDES', 'LUIZ MIGUEL FERNANDES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93458, '87829495000144', 'SIMETALL  IND E COM DE FERRAMENTAS LTDA', 'SIMETALL  IND E COM DE FERRAMENTAS LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93459, '87443902620', 'MONICA   CRISTINA DOS SANTOS GONZAGA', 'MONICA   CRISTINA DOS SANTOS GONZAGA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93460, '02610574649', 'GUILHERME DE ARAUJO  ALVES', 'GUILHERME DE ARAUJO  ALVES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93461, '28698754600', 'JOSE CARLOS RODRIGUES', 'JOSE CARLOS RODRIGUES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93462, '11330873000189', 'ANNA CECILIA FELISBERTO MUSSOLIN-ME', 'ANNA CECILIA FELISBERTO MUSSOLIN-ME', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93463, '15893995600', 'ANTONIO VITOR AGUIAR', 'ANTONIO VITOR AGUIAR', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93464, '70388555653', 'ERLON DE SOUZA REIS', 'ERLON DE SOUZA REIS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93465, '06142621000196', 'DOCES COLMEIA LTDA', 'DOCES COLMEIA LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93466, '15021987895', 'JEADIEL   DE OLIVEIRA   SANTOS', 'JEADIEL   DE OLIVEIRA   SANTOS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93467, '10077235649', 'MARIA  HELENA   MATAVELLI', 'MARIA  HELENA   MATAVELLI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93468, '00712935665', 'NILSON  DUARTE  ROCHA', 'NILSON  DUARTE  ROCHA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93469, '01699195870', 'JOSE CARLOS PEREIRA', 'JOSE CARLOS PEREIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93470, '31002159822', 'RENATO  SCHEFER', 'RENATO  SCHEFER', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93471, '07409582677', 'RENATO  JOSE FRANCO', 'RENATO JOSE FRANCO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93472, '20524237000189', 'PERFIL  ENGENHARIA S.A', 'PERFIL  ENGENHARIA S.A', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93473, '39770079634', 'SEBASTIÃO RIBEIRO GUIMARÃES', 'SEBASTIÃO RIBEIRO GUIMARÃES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93755, '06283219000121', 'GRAO DE OURO COM INSUMOS AGRÍCOLAS LTDA', 'GRAO DE OURO COM INSUM OS AGRÍCOLAS LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93756, '39538303687', 'FABIO ALVES FERNANDES', 'FABIO ALVES FERNANDES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93757, '19278829668', 'ISAIAS FERRAZ DE FIGUEIREDO', 'ISAIAS FERRAZ DE FIGUEIREDO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93758, '01633138658', 'DAVID MANOEL DE ALMEIDA MARQUES', 'DAVID MANOEL DE ALMEIDA MARQUES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93759, '44509065868', 'JOSE TASCA', 'JOSE TASCA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93760, '28573463600', 'SALVADOR DOS SANTOS', 'SALVADOR DOS SANTOS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93761, '01175004618', 'ANDRÉ JUNIO MARTINS', 'ANDRÉ JUNIO MARTINS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93762, '51942410891', 'SEBASTIAO GALINDO GIMENES', 'AV SO JORGE', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93763, '79060358600', 'JOAQUIM CUSTODIO DE CARVALHO', 'JOAQUIM CUSTODIO DE CARVALHO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93764, '00976856000105', 'VISAFERTIL I.E.COM.FERTILIZANTES ORGANICOS LTDA.', 'VISAFERTIL I.E.COM.FERTILIZANTES ORGANICOS LTDA.', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93765, '67873723615', 'ANTONIO CESAR SABINO', 'ANTONIO CESAR SABINO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93766, '23714670653', 'ANTONIO CARLOS', 'ANTONIO CARLOS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93767, '04561381619', 'ALTIERES RIBEIRO LOPES', 'ALTIERES RIBEIRO LOPES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93768, '43088040006', 'ALBANO FORNARI TOME', 'ALBANO FORNARI TOME', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93769, '00236028642', 'HELENA RODOLFO ERINO', 'HELENA RODOLFO ERINO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93770, '04412800000170', 'ALVORADA TRANSPORTES DE CARGAS LTDA. - ME', 'ALVORADA TRANSPORTES DE CARGAS LTDA. - ME', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93771, '01103299611', 'MARCELIO DONIZETTI AGNALDO', 'MARCELIO DONIZETTI AGNALDO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93772, '17171482634', 'EULEI GOMES NEGRÃO', 'EULEI GOMES NEGRÃO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93773, '41777806000178', 'CASA DE RESGATE EMANUEL', 'CASA DE RESGATE EMANUEL', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93774, '95685227604', 'MARCIO ANTONIO DE LUCIO', 'MARCIO ANTONIO DE LUCIO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93777, '07970185000106', 'CSD IND.COM.CORTE E DOBRA DE AÇO S/A.', 'CSD IND.COM.CORTE E DOBRA DE AÇO S/A.', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93778, '30996490663', 'ENIO HENRIQUE PRADO', 'ENIO HENRIQUE PRADO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93779, '00530204649', 'SERGIO ITALO BLASI', 'SERGIO ITALO BLASI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93786, '64564789600', 'ROBSON LORO', 'ROBSON LORO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93787, '35317663687', 'RONALDO PONTES TEIXEIRA', 'RONALDO PONTES TEIXEIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93788, '31404499687', 'ADEMAR DE TOLEDO BRAZ', 'ADEMAR DE TOLEDO BRAZ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93789, '99823101604', 'ADINEI CORREA LOPES', 'ADINEI CORREA LOPES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93790, '31440568634', 'SERGIO HONORIO ALVES', 'SERGIO HONORIO ALVES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93791, '27227081672', 'SONIA CRISTINA SARTI', 'SONIA CRISTINA SARTI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93792, '04403153607', 'EDUARDO MUNIZ MEDEIROS', 'EDUARDO MUNIZ MEDEIROS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93793, '84776250691', 'FLAVIO JACINTO DO LAGO', 'FLAVIO JACINTO DO LAGO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93794, '18988394000101', 'HJR CONSTRUÇÕES LTDA', 'HJR CONSTRUÇÕES LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93795, '05508693000141', 'COSTA PINTO EMPREENDIMENTOS E PARTICIPAÇÕES LTDA', 'COSTA PINTO EMPREENDIMENTOS E PARTICIPAÇÕES LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93796, '07709556655', 'WILLIAM GUSTAVO PEREIRA SILVA', 'WILLIAM GUSTAVO PEREIRA SILVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93797, '03730944000102', 'CLINICA MEMORIAL LTDA RADIOTERAPIA', 'CLINICA MEMORIAL LTDA RADIOTERAPIA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93798, '16850894000149', 'RONIVALDO DONIZETTI DA CRUZ - ME', 'RONY COFFEE', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93799, '01739606698', 'HENRI MARIE ROBERT PHILIPPE', 'HENRI MARIE ROBERT PHILIPPE', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93800, '62740849672', 'GIOVANE HILARIO DA SILVA', 'GIOVANE HILARIO DA SILVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93801, '23840331668', 'JOAO NARCISO TEIXEIRA', 'JOAO NARCISO TEIXEIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93802, '26814917890', 'LUCIANO LUIS DA SILVA', 'LUCIANO LUIS DA SILVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93803, '71856366715', 'ERICH BRUNO HOERTEL NEGRI', 'ERICH BRUNO HOERTEL NEGRI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93804, '03140914679', 'PAULO JUSCELINO DE ALCANTARA', 'PAULO JUSCELINO DE ALCANTARA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93805, '00011758660', 'SILAS CORDEIRO', 'SILAS CORDEIRO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93806, '03214443615', 'GERALDO ALVES MOREIRA', 'GERALDO ALVES MOREIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93807, '34238522672', 'LAZARO OZORIO DE OLIVEIRA', 'LAZARO OZORIO DE OLIVEIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93808, '05696708617', 'JOAO BATISTA SANTOS', 'JOAO BATISTA SANTOS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93809, '23885955687', 'EDSON DE OLIVEIRA', 'EDSON DE OLIVEIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93810, '19795092634', 'ROVIR BRAZ ZETULA', 'ROVIR BRAZ ZETULA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93811, '16158076830', 'BENEDITA ROSA DE FREITAS NOGUEIRA', 'BENEDITA ROSA DE FREITAS NOGUEIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93812, '30606818804', 'JOELSON GONÇALVES SA', 'JOELSON GONÇALVES SA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93813, '17293740697', 'VICTOR FELISBERTO DOS REIS', 'VICTOR FELISBERTO DOS REIS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93814, '09479369800', 'JOSE VALTER RUFINO', 'JOSE VALTER RUFINO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93815, '17540867000132', 'GSR PC ESQUADRIAS E VIDRO TEMPERADO', 'GSR PC ESQUADRIAS E VIDRO TEMPERADO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93816, '11995324876', 'MAURICIO RODRIGUES', 'MAURICIO RODRIGUES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93817, '39531176884', 'LUCAS MENDES MARTINS', 'LUCAS MENDES MARTINS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93818, '15937733827', 'NILSON EDSON FERNANDES', 'NILSON EDSON FERNANDES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93819, '01452680639', 'LUCAS MENEZES MARQUES', 'LUCAS MENEZES MARQUES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93821, '39537579620', 'JULIO CESAR FERREIRA', 'JULIO CESAR FERREIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93822, '53234170649', 'PAULO EDUARDO CARLINI', 'PAULO EDUARDO CARLINI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93823, '53895592668', 'JOSE ANTONIO BENELLI', 'JOSE ANTONIO BENELLI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93824, '41353994600', 'ARNALDO UNTURA', 'ARNALDO UNTURA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93825, '03683341637', 'MAURO SERGIO DONIZETTI SILVERIO', 'MAURO SERGIO DONIZETTI SILVERIO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93826, '00217759823', 'ADEMIR JOSE HENRIQUE RECK', 'ADEMIR JOSE HENRIQUE RECK', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93827, '01477586610', 'EDINILSON DONIZETE TEIXEIRA', 'EDINILSON DONIZETE TEIXEIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93828, '12152846672', 'GERALDO MOREIRA DA SILVA', 'GERALDO MOREIRA DA SILVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93829, '83135669653', 'CARLOS ROBERTO GASPAR', 'CARLOS ROBERTO GASPAR', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93830, '61018961615', 'APARECIDO DO NASCIMENTO', 'APARECIDO DO NASCIMENTO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93831, '41883471000172', 'COND.  EDIFÍCIO IANÊ', 'COND.  EDIFÍCIO IANÊ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93832, '53421450072', 'JORGE SILVERIO NUNES DE OLIVEIRA', 'JORGE SILVERIO NUNES DE OLIVEIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93833, '52493148649', 'IVAN LELECO FILHO', 'IVAN LELECO FILHO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93834, '61321206615', 'PAULO CESAR RODRIGUES', 'PAULO CESAR RODRIGUES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93835, '00776528866', 'PAULO BRANDAO LUZITANO', 'PAULO BRANDAO LUZITANO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93836, '26329484600', 'JOAQUIM TADEU MAFRA', 'JOAQUIM TADEU MAFRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93837, '41296877604', 'PAULO DOS SANTOS', 'PAULO DOS SANTOS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93838, '05971325698', 'TIAGO APARECIDO DE SOUZA', 'TIAGO APARECIDO DE SOUZA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93839, '05328961000143', 'INSETIMAX INDUSTRIA QUIMICA LTDA. - EPP', 'INSETIMAX INDUSTRIA QUIMICA LTDA. - EPP', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93840, '04862332862', 'GILBERTO MONEDA DE MORAIS', 'GILBERTO MONEDA DE MORAIS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93841, '35285400600', 'ROBERTO RECHE', 'ROBERTO RECHE', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93842, '11868028000161', 'FLAMA COMERCIO DE CAFE LTDA', 'FLAMA COMERCIO DE CAFE LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93843, '11486626000419', 'CINLOG LOGISTICA SA', 'CINLOG LOGISTICA SA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93844, '34236759691', 'OSMAR DOS SANTOS ARAO', 'OSMAR DOS SANTOS ARAO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93845, '01472587669', 'PATRICIA MONTEIRO DOS SANTOS', 'PATRICIA MONTEIRO DOS SANTOS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93846, '04481246618', 'TATIANA ABRAO', 'TATIANA ABRAO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93847, '17288817000100', 'EDUARDO  VALIM DO VAL E OUTROS', 'EDUARDO  VALIM DO VAL E OUTROS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93848, '46707409620', 'ROSANGELO ZANETTI', '9969-5058', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93849, '02612477608', 'MARIA CLEIDE DE CARVALHO MORAES', 'MARIA CLEIDE DE CARVALHO MORAES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93850, '03895133698', 'ELIAS JULIO DE OLIVEIRA', 'ELIAS JULIO DE OLIVEIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93851, '35364360644', 'DENIR  BATISTA TEIXEIRA', 'DENIR  BATISTA TEIXEIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93852, '92452728691', 'HELIO MESSIAS GARCIA E OUTROS', 'HELIO MESSIAS GARCIA E OUTROS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93853, '88327124668', 'SEBASTIAO JOSE CARDILLO FILHO', 'SEBASTIAO JOSE CARDILLO FILHO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93854, '31317952634', 'GERALDO JOSE DE CARVALHO', 'GERALDO JOSE DE CARVALHO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93855, '23784415687', 'PEDRO FERREIRA DA SILVA', 'PEDRO FERREIRA DA SILVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93856, '19834100000141', 'CAIXA ESCOLAR PROF. ARLINDO PEREIRA', 'CAIXA ESCOLAR PROF. ARLINDO PEREIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93857, '11028854000100', 'ANDREIA APARECIDA DE OLIVEIRA & CIA LTDA. - ME', 'ANDREIA APARECIDA DE OLIVEIRA & CIA LTDA. - ME', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93858, '11973134000105', 'SUL AMERICA ODONTOLOGICO S.A.', 'SUL AMERICA ODONTOLOGICO S.A.', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93859, '35286458653', 'WALDIR ANTONIO PINTO', 'WALDIR ANTONIO PINTO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93860, '31267999810', 'LUCIO INACIO PEREIRA', 'LUCIO INACIO PEREIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93861, '52733084615', 'JOSE FRANSCISCO GARCIA SOUZA', 'JOSE FRANSCISCO GARCIA SOUZA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93862, '01251221602', 'LEANDRO ZANETTI', 'LEANDRO ZANETTI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93863, '07113216000102', 'JOAO CARRO DA SILVA -ME', 'JOAO CARRO DA SILVA -ME', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93864, '34153381691', 'WALDYR PAULINO DA COSTA NETO', 'WALDYR PAULINO DA COSTA NETO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93865, '17172241649', 'JOSE OLIMPIO MARTINS', 'JOSE OLIMPIO MARTINS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93866, '44326483687', 'JOSE MARCOS RIBEIRO', 'JOSE MARCOS RIBEIRO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93867, '21335362649', 'PAULO BIANUCCI', 'PAULO BIANUCCI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93868, '79060587634', 'ISRAEL DIAS', 'ISRAEL DIAS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93869, '82277958891', 'OSFATI TEIXEIRA', 'OSFATI TEIXEIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93870, '03595546601', 'CRISTIANO PRADO', 'CRISTIANO PRADO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93871, '89362632853', 'LASARA MARIA VARGAS', 'LASARA MARIA VARGAS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93872, '39632490649', 'DIVINO BENTO', 'DIVINO BENTO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93873, '15274950000181', 'EDVALDO DO NASCIMENTO E OUTROS', 'EDVALDO DO NASCIMENTO E OUTROS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93874, '32954813857', 'VINICIUS SANTOS LUZ', 'VINICIUS SANTOS LUZ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93875, '54958741615', 'SERGIO ALVES DA SILVA', 'SERGIO ALVES DA SILVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93876, '04511346801', 'JOAO DE MORAES', 'JOAO DE MORAES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93877, '00028534697', 'PAULO HENRIQUE DOS SANTOS RIBEIRO', 'PAULO HENRIQUE DOS SANTOS RIBEIRO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93878, '31353371620', 'SEBASTIAO BORGES DA SILVA', 'SEBASTIAO BORGES DA SILVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93879, '88327604600', 'DENILSON MARQUES MORAES', 'DENILSON MARQUES MORAES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93880, '06188736609', 'ROGERIO ALEXANDRE TEIXEIRA', 'ROGERIO ALEXANDRE TEIXEIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93881, '60344237672', 'FLAVIO DONIZETTI MAIMONE', 'FLAVIO DONIZETTI MAIMONE', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93882, '35288230625', 'JOSE EUCLIDES TEIXEIRA', 'JOSE EUCLIDES TEIXEIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93883, '34450467787', 'RAULINA MARIA ADISSI', 'RAULINA MARIA ADISSI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93884, '23838779649', 'BENEDITO LUIZ FERREIRA', 'BENEDITO LUIZ FERREIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93885, '15348982000184', 'RRR COMERCIO DE MATERIAIS EIRELI', 'RRR COMERCIO DE MATERIAIS EIRELI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93886, '93814968891', 'VALTER TEIXEIRA REIS', 'VALTER TEIXEIRA REIS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93887, '97313343604', 'ANTONIO CARLOS DE REZENDE', 'ANTONIO CARLOS DE REZENDE', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93888, '00278171648', 'AILTON ALEXANDRE DE OLIVEIRA', 'AILTON ALEXANDRE DE OLIVEIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93889, '50527509604', 'BETANIA SERAFIM DE MATOS', 'BETANIA SERAFIM DE MATOS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93890, '69430381768', 'JOSE MAURICIO TEIXEIRA COUTINHO', 'JOSE MAURICIO TEIXEIRA COUTINHO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93891, '16580052600', 'CLEUBI MIGLIORANZI', 'CLEUBI MIGLIORANZI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93892, '56228356012148', 'CRBS S/A', 'CRBS S/A', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93893, '15893260678', 'ARLINDO TEODORO DA CRUZ', 'ARLINDO TEODORO DA CRUZ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93894, '89023382668', 'JOAO FRANCISCO DA SILVA', 'JOAO FRANCISCO DA SILVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93895, '34634622653', 'WALDOMIRO JOSE MUNIZ', 'WALDOMIRO JOSE MUNIZ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93896, '59895706000373', 'IRMAOS FLAMINIO & CIA LTDA', 'IRMAOS FLAMINIO & CIA LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93897, '49574221687', 'VOLNEI  CHINI', 'VOLNEI  CHINI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93898, '10947249000162', 'GRAO SULDESTE COMERCIO IMP EXP DE CAFE E CER. LTDA', 'GRAO SULDESTE COMERCIO IMP EXP DE CAFE E CER. LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93901, '03740854804', 'LUIZ GONZAGA CHIAVEGATO', 'LUIZ GONZAGA CHIAVEGATO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93904, '08899495653', 'JOSE ROBERTO CAPONI', 'JOSE ROBERTO CAPONI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93905, '20775128007228', 'MITRA DIOCESANA DE GUAXUPE PAR SAO PAULO APOSTOLO', 'MITRA DIOCESANA DE GUAXUPE PAR SAO PAULO APOSTOLO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93906, '22746161672', 'REGINA CELIA MARTINS LUZ', 'REGINA CELIA MARTINS LUZ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93907, '16994492000118', 'LOTEAMENTO RESIDENCIAL VEREDA SPE LTDA', 'LOTEAMENTO RESIDENCIAL VEREDA SPE LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93928, '17416199000136', 'CAIXA ESCOLAR DA ESC MUNC MARIA OVIDIA JUNQUEIRA', 'CAIXA ESCOLAR DA ESC MUNC MARIA OVIDIA JUNQUEIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93929, '01204486611', 'CARLOS ROBERTO DOS SANTOS', 'CARLOS ROBERTO DOS SANTOS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93930, '25638354000197', 'EDIFICIO SAN MARTINS', 'EDIFICIO SANMARTINS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93931, '08730174635', 'FLAVIA ALESSANDRA FERREIRA', 'FLAVIA ALESSANDRA FERREIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93932, '02889946630', 'CLAUDINEI DE OLIVEIRA', 'CLAUDINEI DE OLIVEIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93933, '92864600668', 'SAMUEL BATISTA DE CARVALHO', 'SAMUEL BATISTA DE CARVALHO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93934, '61064076653', 'MARIA HELENA GUIMARAES', '', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93935, '07724203601', 'RENAN ARTHUR BOSIO GUIMARAES', 'RENAN ARTHUR BOSIO GUIMARAES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93936, '14700153000156', 'HOLLYWOOD CAFE LTDA', 'HOLLYWOOD CAFE LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93938, '01262826683', 'FABRICIO  MARTINS DOMINGUES', 'FABRICIO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93939, '75802180625', 'WILSON ANTONIO NASCIMENTO', 'WILSON ANTONIO NASCIMENTO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93940, '28943937849', 'ARIOVALDO JACINTHO', 'ARIOVALDO JACINTHO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93941, '20775128004636', 'NITRA DIOCESANA DE GUAXUPE', 'NITRA DIOCESANA DE GUAXUPE', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93942, '12578404000146', 'CGH PEDACINHO DO CÉU SPE ENERGIA ELETRICA  LTDA', 'CGH PEDACINHO DO CÉU SPE ENERGIA ELETRICA  LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93943, '16679557000130', 'ASPRA PM BM DE MINAS GERAIS', 'ASPRA PM BM DE MINAS GERAIS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93944, '05027968000125', 'MASTER TRANSPORTES E LOGISTICA LTDA', 'MASTER TRANSPORTES E LOGISTICA LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93945, '88438457649', 'EDIVAR JOSE DE CARVALHO E OUTROS', 'EDIVAR JOSE DE CARVALHO E OUTROS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93946, '18295215787', 'ALVARO ELY MONTEIRO VILELA', 'ALVARO ELY MONTEIRO VILELA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93947, '00075944880', 'WAGNER BARROS GAMA', 'WAGNER BARROS GAMA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93948, '15021025600', 'SILVINO ZANETTI', 'SILVINO ZANETTI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93949, '18757440000153', 'JS EMPORIO E CONVENIENCIA LTDA ME', 'JS EMPORIO E CONVENIENCIA LTDA ME', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93950, '00960418000140', 'MUNDO VERDE AGROPECUARIA LTDA ME', 'MUNDO VERDE VIVEIRO FLORESTAL', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93951, '03742318853', 'JOSE NILTON DA SILVA', 'JOSE NILTON DA SILVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93952, '18938671615', 'CELESTRINO DE OLIVEIRA', 'CELESTRINO DE OLIVEIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93953, '14151866000108', 'SANDRO OMAR FERNANDES-ME', 'SANDRO OMAR FERNANDES-ME', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93954, '17856162000200', 'FORMAT FORNECEDORA DE MATERIAS LTDA', 'FORMAT FORNECEDORA DE MATERIAS LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93955, '06020259668', 'MENDES INCORPORADORA LTDA', 'MENDES INCORPORADORA LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93956, '14730298000280', 'BUENO CAFE COMERCIO E EXPORTAÇÃO LTDA', 'BUENO CAFE COMERCIO E EXPORTAÇÃO LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93957, '09242069698', 'ROGER APARECIDO SOARES', '', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93958, '67729178000491', 'COMERCIAL CIRURGICA RIO CLARENSE', 'COMERCIAL CIRURGICA RIO CLARENSE', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93959, '17293102000145', 'GICAFÉ COMÉRCIO DE GRÃOS LTDA', 'GICAFÉ COMÉRCIO DE GRÃOS LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93960, '58666338687', 'DAVID IZIDIO DOS SANTOS', 'DAVID IZIDIO DOS SANTOS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93961, '50791044653', 'DANIR GUELERE', 'DANIR GUELERE', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93962, '16959150000167', 'BAVARESCO TORREFAÇÃO E COMÉRCIO DE CAFE LTDA', 'BAVARESCO TORREFAÇÃO E COMÉRCIO DE CAFE LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93963, '20775128004555', 'MITRA DIOCESANA DE GUAXUPE', 'PAROQUIA SAO JUDAS TADEU', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93964, '07266796000178', 'CAVACOLANDIA', 'CAVACOLANDIA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93965, '13233988000180', 'GREMIO RECR E CULT ESC DE SAMBA ACAD SO SANTA RITA', 'ESCOLA DE SAMBA ACADEMICOS DO SANTA RITA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93966, '05907519649', 'ANTONIO JORGE DOS SANTOS', 'ANTONIO JORGE DOS SANTOS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93967, '15304911000180', 'REFRATARIOS SN LTDA', 'REFRATARIOS SN LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93968, '11325054000143', 'ASSOCIAÇÃO REC INF PERERE DO AMANHA', 'ASSOCIAÇÃO REC INF PERERE DO AMANHA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93969, '19521142000122', 'DILMAN RODRIGUES E OUTROS', 'DILMAN RODRIGUES E OUTROS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93970, '33982511615', 'JOAO BOSCO PEREIRA DE CASTRO', 'JOAO BOSCO PEREIRA DE CASTRO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93971, '08573241000131', 'NOVA CAR COMERCIO DE VEICULOS PEÇAS E SERV LTDA', 'NOVA CAR COMERCIO DE VEICULOS PEÇAS E SERV LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93972, '79962157668', 'RAMIRO DE SOUZA MELO', 'RAMIRO DE SOUZA MELO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93973, '11052562000103', 'VARGINHA COM. IMPORTAÇÃO E EXPORTAÇÃO DE CAFE LTDA', 'VARGINHA COM. IMPORTAÇÃO E EXPORTAÇÃO DE CAFE LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93974, '21464324620', 'IDELMA RIBEIRO LOPES', 'IDELMA RIBEIRO LOPES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93975, '03398929605', 'FLAVIO AUGUSTO BRAGA WESTIN', 'FLAVIO AUGUSTO BRAGA WESTIN', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93976, '07988123000806', 'T&AG ARMAZENS GERAIS LTDA', 'T&AG ARMAZENS GERAIS LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93977, '15238073000193', 'ASSOCIAÇÃO SAO PAULO APOSTOLO', 'ASSOCIAÇÃO SAO PAULO APOSTOLO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93978, '37382848850', 'RAFAEL ARAUJO SILVA', 'RAFAEL ARAUJO SILVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93979, '25639519000145', 'ORQUESTRA SINFONICA DE POÇOS DE CALDAS', 'ORQUESTRA SINFONICA DE POÇOS DE CALDAS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93980, '51699419604', 'JOSE ROMILDO ZETULA', 'JOSE ROMILDO ZETULA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93981, '18553379000122', 'COMERCIAL QUEBRA COCO LTDA - ME', 'COMERCIAL QUEBRA COCO LTDA - ME', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93982, '23715006668', 'RUBENS ANTONIO BORGES', 'RUBENS ANTONIO BORGES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93983, '09604161610', 'DANIELLE CRISTINE MAFRA', 'DANIELLE CRISTINE MAFRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93984, '01486044638', 'RENISE SOUZA DOS SANTOS GUZZI', 'RENISE SOUZA DOS SANTOS GUZZI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93985, '55468314649', 'ELCIO BELCHIOR', 'ELCIO BELCHIOR', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93986, '04103347821', 'ISAC DE OLIVEIRA', 'ISAC DE OLIVEIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93987, '51700018604', 'MARIA APARECIDA BATISTA', 'MARIA APARECIDA BATISTA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93990, '22685741801', 'JULIENE KEIKO FUJII', '', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93991, '58932704600', 'MARCOS APARECIDO MAFRA', 'MARCOS APARECIDO MAFRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93992, '00235934666', 'LUIZ CARLOS DOS SANTOS', 'LUIZ CARLOS DOS SANTOS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93993, '12579490000373', 'SAINT EMILION AUTOMOVEIS PEÇAS E SERV LTDA', 'SAINT EMILION AUTOMOVEIS PEÇAS E SERV LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93994, '15875725672', 'ANTONIO ALVES DE DEUS', 'ANTONIO ALVES DE DEUS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93995, '18507438000126', 'MARIO LUCIO ZAGO', 'MARIO LUCIO ZAGO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93996, '35364807649', 'JOAQUIM ANTONIO CORREA', 'JOAQUIM ANTONIO CORREA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93997, '18938787672', 'ONOFRE DA SIVEIRA', 'ONOFRE DA SILVEIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93998, '31443680672', 'JAIR JUVENTINO GARCIA', 'JAIR JUVENTINO GARCIA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 93999, '59988304668', 'VALDECIR SIDERIO', 'VALDECIR SIDERIO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94000, '35284854691', 'JOAO APARECIDO HILARIO', 'JOAO APARECIDO HILARIO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94001, '02697108840', 'SILVIA ELAINE SUMAN BAPTISTA', 'SILVIA ELAINE SUMAN BAPTISTA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94002, '16579216620', 'SEBASTIAO PEREIRA', 'SEBASTIAO PEREIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94003, '08899062897', 'ALEXANDER DANNIAS', 'ALEXANDER DANNIAS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94004, '27203601803', 'NORBERTO DIAS', 'NORBERTO DIAS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94005, '05859911000192', 'TALL MAX INDUSTRIA EIRELI', 'TALL MAX INDUSTRIA EIRELI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94015, '14862334000189', 'MIMAPELY CONSTRUTORAE INCORPORADORA LTDA', 'MIMAPELY CONSTRUTORAE INCORPORADORA LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94016, '12018082868', 'JOSE GONCALVES', 'JOSE GONCALVES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94017, '70865485615', 'EMERSON ADRIANO SILVA', 'EMERSON ADRIANO SILVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94018, '58118721604', 'MARTIOS AUGUSTO TEIXEIRA ALVES', 'MARTIOS AUGUSTO TEIXEIRA ALVES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94020, '10475209664', 'PAULO CESAR DE COUTO', 'PAULO CESAR DE COUTO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94021, '15530260000146', 'LOTEAMENTO CENTREVILLE SPE LTDA.', 'LOTEAMENTO CENTREVILLE SPE LTDA.', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94022, '19252005668', 'EDSON DO NASCIMENTO PAULINO', 'EDSON DO NASCIMENTO PAULINO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94023, '25575105806', 'RODRIGO DO SALTO ANDRE', 'RODRIGO DO SALTO ANDRE', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94024, '18625202000194', 'FOTO PRAÇA 1', 'FOTO PRAÇA 1', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94025, '76893073887', 'MARIA CECILIA ZANGIACOMI', 'MARIA CECILIA ZANGIACOMI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94026, '38665287000303', 'CARA COOPERATIVA AGROP. REG. DE ANDRADAS LTDA', 'CARA COOPERATIVA AGROP. REG. DE ANDRADAS LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94027, '19308116672', 'ARACI DE LOURDES DIAS', 'ARACI DE LOURDES DIAS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94028, '09886770759', 'JOSE CARLOS MUNHOZ FERNANDES E OUTROS', 'JOSE CARLOS MUNHOZ FERNANDES E OUTROS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94029, '39539741653', 'JOAO OLINTO DE AGUIAR', 'JOAO OLINTO DE AGUIAR', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94030, '17467515003700', 'CAFÉ TRÊS CORAÇÕES S.A', 'CAFÉ TRÊS CORAÇÕES S.A', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94031, '10083138668', 'JOSE DIONIZIO CORREA', 'JOSE DIONIZIO CORREA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94032, '57879400672', 'MARCIO APARECIDO CALLE', 'MARCIO APARECIDO CALLE', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94033, '00711579644', 'ZERETE OLIVEIRA', 'ZERETE OLIVEIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94034, '59369850678', 'TANIA REGINA DE MELO TAVARES', 'TANIA REGINA DE MELO TAVARES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94035, '41359569634', 'LEVI TEIXEIRA DOS SANTOS', 'LEVI TEIXEIRA DOS SANTOS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94036, '24064971604', 'ROBERTO CUNHA DA COSTA', 'ROBERTO CUNHA DA COSTA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94037, '72590726600', 'SEBASTIAO SABINO FERREIRA', 'SEBASTIAO SABINO FERREIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94038, '06082213688', 'ADRIANO COSTA ADRIANO', 'ADRIANO COSTA ADRIANO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94039, '28551010697', 'MARCOS ANTONIO SILVA', 'MARCOS ANTONIO SILVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94040, '07417114601', 'INACIO ROBERTO DE OLIVEIRA E OUTROS', 'INACIO ROBERTO DE OLIVEIRA E OUTROS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94041, '10663367689', 'ADOLFO LUIS CANDIDO', 'ADOLFO LUIS CANDIDO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94042, '18459628003300', 'BAYER S/A', 'BAYER S/A', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94043, '50527703672', 'RICARDO CAMPOS', 'RICARDO CAMPOS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94165, '00526959649', 'JOEL JUNQUEIRA FERREIRA', 'JOEL JUNQUEIRA FERREIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94166, '13313094848', 'MARCELO LUIZ DOS SANTOS', 'MARCELO LUIZ DOS SANTOS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94167, '06078053400', 'FREDERICO ALCANTRA NOVELLI DIAS', 'FREDERICO ALCANTRA NOVELLI DIAS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94168, '35342463653', 'GILSON DONIZETE PEREIRA', 'GILSON DONIZETE PEREIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94169, '06151057694', 'PAULA ARAUJO GOUVEIA DE ANDRADE E OUTROS', 'PAULA ARAUJO GOUVEIA DE ANDRADE E OUTROS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94170, '28102363134', 'SEBASTIAO BARBOZA DAS NEVES', 'SEBASTIAO BARBOZA DAS NEVES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94171, '61359157620', 'MANASSES FRANCO E OUTROS', 'MANSSES FRANCO E OUTROS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94172, '01097764613', 'ADILSON MARCELO FIGUEIREDO EIRELE', 'ADILSON MARCELO FIGUEIREDO EIRELE', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94173, '25636010000149', 'CONDOMINIO SOLAR MARROCOS', 'CONDOMINIO SOLAR MARROCOS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94175, '05988000690', 'LOURENÇO JOSÉ RIDOLFI', 'LOURENÇO JOSÉ RIDOLFI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94176, '04236579685', 'EDNA DA FONSECA  CARVALHO', 'EDNA DA FONSECA CARVALHO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94177, '98477021600', 'ELINA DE FATIMA LEME', 'ELINA DE FATIMA LEME', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94178, '27922913000111', 'ATUALIZAÇÃO PROFISSIONAL CONTINUADA LTDA', 'ATUALIZAÇÃO PROFISSIONAL CONTINUADA LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94179, '02901390000104', 'FIRCON CONSTRUÇAO CIVIL LTDA', 'FIRCON CONSTRUÇAO CIVIL LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94180, '11117399605', 'THALISON HENRIQUE MACIEL SILVA', '', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94181, '53233000600', 'MOISES BATISTA DE CARVALHO', 'MOISES BATISTA DE CARVALHO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94182, '46155465649', 'NILCELINO RODRIGUES DA CRUZ', 'NILCELINO RODRIGUES DA CRUZ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94183, '73520209691', 'LUCIANO RIZZETTO', 'LUCIANO RIZZETTO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94184, '17093068820', 'ANDRE TOPOLOVSZKI', 'ANDRE TOPOLOVSZKI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94185, '23890894615', 'JOSE AFONSO DA SILVA', 'JOSE AFONSO DA SILVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94186, '12694806856', 'CARLOS ALEXANDRE STANO', 'CARLOS ALEXANDRE STANO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94187, '23360248000169', 'B&P COMERCIO E EXPORTAÇÃO DE CAFE LTDA', 'B&P COMERCIO E EXPORTAÇÃO DE CAFE LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94188, '46222464653', 'MOACIR PRESATO ALVES', 'MOACIR PRESATO ALVES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94189, '03335364872', 'JOAO PAULO MUNIZ', 'JOAO PAULO MUNIZ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94190, '06866579856', 'JANEVILE SARTINI MUNIZ GARCIA', 'JANEVILE SARTINI MUNIZ GARCIA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94191, '10834145855', 'MARCIA CRISTINY', 'MARCIA CRISTINY', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94192, '42225938000150', 'CSB DROGARIAS S A', 'DROGASMIL', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94193, '08071985000158', 'ASSOCIAÇÃO DE AGRICULTORES FAMILIARES DO CÓRREGO D', 'ASSOCIAÇÃO DE AGRICULTORES FAMILIARES DO CÓRREGO D', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94194, '20892515000150', 'CORRETORA CAFE CALDENSE S/S LTDA', 'CORRETORA CAFE CALDENSE', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94195, '15420647672', 'FRANCISCO MENDES RIBEIRO', 'FRANCISCO MENDES RIBEIRO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94197, '39515648653', 'ADELSON VIEIRA FRANCO', 'ADELSON VIEIRA FRANCO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94198, '02988978654', 'LEANDRO ALVES BRAGA', 'LEANDRO ALVES BRAGA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94199, '47522470625', 'JURANDIR DA COSTA FILOMENO', 'JURANDIR DA COSTA FILOMENO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94200, '26331764615', 'JOSE CARLOS DARE', 'JOSE CARLOS DARÉ', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94201, '10004068653', 'JOSE RIDOLFI', 'JOSE RIDOLFI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94202, '53505611891', 'JOSE EUDARY DE OLIVEIRA', 'JOSE EUDARY DE OLIVEIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94203, '14780968615', 'PAULINO FERREIRA DO LAGO', 'PAULINO FERREIRA DO LAGO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94204, '02419870000125', 'COOPERATIVA DOS TRANSPORTADORES AUTONOMOS DE ARCOS', 'COOPERATIVA DOS TRANSPORTADORES AUTONOMOS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94205, '07568516610', 'ANDRE ULISSES BENETTI', 'ANDRE ULISSES BENETTI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94206, '11216695000160', 'KADOSHI DO BRASIL IND E COM DE MAQ E IMP AG LTDA M', 'KADOSCHI DO BRASIL IND E COM DE MAQ E EMP AG', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94207, '05930001618', 'FLAVIO DONIZETI DA SILVA', 'FLAVIO DONIZETI DA SILVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94208, '40717267849', 'HELIO DOS REIS JUSTINO', 'HELIO DOS REIS JUSTINO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94209, '32039554823', 'RODRIGO VENTURA SILVA', 'RODRIGO VENTURA SILVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94210, '61201529620', 'MARIA TEIXEIRA GUIMARÃES', 'MARIA TEIXEIRA GUIMARÃES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94211, '16576016000187', 'ORGANIZA NEGOCIOS LTDA-EPP', 'ORGANIZA NEGOCIOS LTDA-EPP', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94212, '21493286668', 'FLORENCIO EDUARDO QUINTEIRO', 'FLORENCIO EDUARDO QUINTEIRO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94213, '04385378000101', 'AGUA E TERRA PLANEJAMENTO AMBIENTAL LTDA', 'AGUA E TERRA PLANEJAMENTO AMBIENTAL LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94214, '78598028649', 'EUDES CLODOALDO RAIMUNDO', 'EUDES CLODOALDO RAIMUNDO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94215, '75492083600', 'JOELMAR LUCAS DE ANDRADE', 'JOELMAR LUCAS DE ANDRADE', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94216, '52355110697', 'EDVALDO LUIZ PESSOA', 'EDVALDO LUIZ PESSOA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94217, '59893966604', 'JOSE BENEDITO DOS SANTOS E OUTROS', 'JOSE BENEDITO DOS SANTOS E OUTROS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94218, '15635449620', 'JANIRA DIAS RIBEIRO', 'JANIRA DIAS RIBEIRO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94219, '65817915634', 'CLAUDINEI INACIO DO AMARAL', 'CLAUDINEI INACIO DO AMARAL', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94220, '05361146684', 'DEIVIDI JUNIO DA COSTA', 'DEIVIDI JUNIO DA COSTA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94221, '10527931000104', 'INFORMATIZE COMERCIO E SERVIÇOS DE INFORMATICA', 'INFORMATIZE COMERCIO E SERVIÇOS DE INFORMATICA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94222, '21149507000181', 'CARLA PATRICIA DE CARVALHO', 'S.O.S DE CARTUCHOS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94223, '10966025000106', 'SMC COMERCIO E EXPORTAÇÃO DE CAFÉ S/A', 'SMC COMERCIO E EXPORTAÇÃO DE CAFÉ S/A', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94224, '45734500682', 'SANDRA LUIZA DE CASTRO MOREIRA', 'SANDRA LUIZA DE CASTRO MOREIA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94225, '08477223688', 'JOSE ORLANDO BERNARDES JUNIOR', 'JOSE ORLANDO BERNARDES JUNIOR', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94226, '03936948607', 'SAULO TERCIO NASCIMENTO VIEIRA', 'SAULO TERCIO NASCIMENTO VIEIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94227, '17174309615', 'PEDRO JOSE ALVES', 'PEDRO JOSE ALVES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94228, '06534633833', 'ADAO CARLOS COSTA', 'ADAO CARLOS COSTA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94229, '19204114000181', 'HOTEL SALVADOR', 'HOTEL SALVADOR', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94230, '06940299637', 'RODRIGO TOGNI DO AMARAL', 'RODRIGO TOGNI DO AMARAL', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94231, '73920084000155', 'CONSEL SERVIÇOS DE CONSERVAÇÃO E LIMPEZA LTDA', 'CONSEL SERVIÇOS DE CONSERVAÇÃO E LIMPEZA LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94232, '12084144000152', 'MAURICIO QUISILI MALVONI- ME', 'MALRICIO MALVONI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94233, '10555952000125', 'IBD CERTIFICA..ES LTDA', 'IBD CERTIFICA..ES LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94234, '22216253000130', '7 ESTRELAS COMERCIAL LTDA ME- 7 ESTRELAS', '7 ESTRELAS COMERCIAL LTDA ME- 7 ESTRELAS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94235, '14789965600', 'JOÃO BATISTA DE OLIVEIRA', 'JOÃO BATISTA DE OLIVEIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94236, '12203351691', 'ZELIA FERREIRA ROCHA DE MOURA', 'ZELIA FERREIRA ROCHA DE MOURA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94237, '23844469672', 'JOÃO MENDES', 'JOÃO MEDES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94238, '20764959000100', 'CAFE VILA MONGE LTDA ME', 'CAFE VILA MONGE LTDA ME', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94239, '45811520620', 'LUIZ ANTONIO LORCA GIMENES', 'LUIZ ANTONIO LORCA GIMENES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94240, '09686581804', 'VALDIR INACIO', '', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94241, '19308108653', 'CLAUDIO RODRIGUES DO LAGO', 'CLAUDIO RODRIGUES DO LAGO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94242, '27619413812', 'ELIAS DOMINGUES', 'ELIAS DOMINGUES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94243, '00025501000122', 'ALTECOM COMPRESSORES E BOMBAS LTDA EPP', 'ALTECOM COMPRESSORES E BOMBAS LTDA EPP', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94244, '01204279667', 'THAIS FERREIRA FERNANDES', 'THAIS FERREIRA FERNANDES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94245, '02615010620', 'IVO DOS SANTOS', 'IVO DOS SANTOS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94246, '05026942000162', 'TELEMIDIA SISTEMAS DE TELECOMUNICAÇAO LTDA', 'TELEMIDIA SISTEMAS DE TELECOMUNICAÇAO LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94247, '08898693672', 'JOSE MOACIR DE PAIVA', 'JOSE MOACIR DE PAIVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94248, '01234049678', 'ULISSES FERREIRA DE OLIVEIRA', 'ULISSES FERREIRA DE OLIVEIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94249, '04762264652', 'DONIZETI JOAQUIM DA SILVA', 'DONIZETI JOAQUIM DA SILVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94250, '83659889849', 'ALOIZIO LEAL DE CARVALHO', 'ALOIZIO LEAL DE CARVALHO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94260, '03083347871', 'JOSE LEONARDO FILHO', 'JOSE LEONARDO FILHO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94261, '87649594300', 'JOSE RAIMUNDO PENHA COSTA', 'JOSE RAIMUNDO PENHA COSTA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94262, '00543035000258', 'SILGAN WHITE CAP DO BRASIL LTDA', 'SILGAN WHITE CAP DO BRASIL LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94263, '21700760000181', 'SWLMAQ DO BRASIL AUTOMAÇCAO COMERCIAL LTDA ME', 'SWLMAQ DO BRASIL', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94264, '98441000700', 'LEILA DE BRITO PORTUGAL', 'LEILA DE BRITO PORTUGAL', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94265, '39690237691', 'RONALDO APARECIDO VICENTE', 'RONALDO APARECIDO VICENTE', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94266, '20658691000122', '	RODRIGO VIEIRA MARQUES', 'SUL MAQUINAS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94268, '71116289000157', 'AUTO POSTO GASPARZINHO LTDA', 'AUTO POSTO GASPARZINHO LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94269, '17171997634', 'WASHINGTON RICARDO DA SILVA', 'WASHINGTON RICARDO DA SILVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94270, '22068338000118', 'LIDIANE DE MORAES', 'LIDIANE DE MORAES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94271, '14781875653', 'MAURLIO RAYMUNDO DAMIÃO', 'MAURILIO RAYMUNDO DAMIÃO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94272, '05316608852', 'SILVIA SANTA GUIMARAES DOS SANTOS', 'SILVIA SANTA GUIMARAES DOS SANTOS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94273, '02499830875', 'MARILZA JUNQUEIRA ALVES', 'MARILZA JUNQUEIRA ALVES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94274, '14776100000119', 'ANA PAULA OZORIO DE SOUZA CONSTRUÇOES EPP', 'ANA PAULA OZORIO DE SOUZA CONSTRUÇOES EPP', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94275, '13028338000101', 'IGREJA BATISTA AVIVAR', 'IGREJA BATISTA AVIVAR', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94276, '17172365615', 'CARLOS ALBERTO DOS SANTOA', 'CARLOS ALBERTO DOS SANTOS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94277, '08523942688', 'PEDRO VIEIRA MARQUES', 'PEDRO VIEIRA MARQUES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94278, '04634403000143', 'COMERCIAL BERALDO LTDA - ME', 'COMERCIAL BERALDO LTDA - ME', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94279, '51016397615', 'CLAUDIO BATISTA BARBOSA', 'CLAUDIO BATISTA BARBOSA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94281, '83342486600', 'FABIO RAMOS PEREIRA', 'FABIO RAMOS PEREIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94282, '23885700697', 'MARA RUBIA SENA SOLIA', 'MARA RUBIA SENA SOLIA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94283, '86588044100', 'ROBERSON CASSIO FONTANA', 'ROBERSON CASSIO FONTANA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94284, '00571161000135', 'ASSOCIAÇÃO COMUNITARIA RURAL DA REGIÃO SOUZA LIMA', 'ASSOLIMA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94285, '95591723009175', '	TNT MERCURIO CARGAS E ENCOMENDAS EXPRESSAS S/A', '	TNT MERCURIO CARGAS E ENCOMENDAS EXPRESSAS S/A', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94286, '24166715000187', 'VULCÃO DE MINAS CAFÉ LTDA - ME', 'VULCÃO DE MINAS CAFÉ LTDA - ME', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94287, '01451917000175', 'MARAN CONSTRUTORA LTDA', 'MARAN CONSTRUTORA LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94288, '00186925670', 'MARCELIO FERREIRA SALLES', 'MARCELIO FERREIRA SALLES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94289, '21440046000100', 'GONÇALVES CERVEJARIA ARTESANAL LTDA', 'GONÇALVES CERVEJARIA ARTESANAL LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94290, '13142271651', 'LUCCA GRAVINEZZI', 'LUCCA GRAVINEZZI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94291, '27140342687', 'SERGIO LOPES', 'SERGIO LOPES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94292, '41387872672', 'MARIA FATIMA DE PAULA', 'MARIA FATIMA DE PAULA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94293, '10249184000181', 'MARCELO CORSO ME', 'MARCELO CORSO ME', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94294, '05116931001579', 'ASSOC. BRAS. DE ASSISTENCIA  AS PESSOAS COM CANCER', 'ASSOC. BRAS. DE ASSISTENCIA  AS PESSOAS COM CANCER', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94295, '19507458000160', 'MAGAZINE VIOLA DE OURO', 'MAGAZINE VIOLA DE OURO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94296, '08428260842', 'MANASSES DA SILVA TEIXEIRA', 'MANASSES DA SILVA TEIXEIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94297, '01644004607', 'CESAR LUIZ DE SOUZA', 'CESAR LUIZ DE SOUZA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94298, '00023913681', 'MARCOS DE SOUZA ALEXANDRE', 'MARCOS DE SOUZA ALEXANDRE', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94299, '29420993809', 'CARMEN ANGELA DE SORTI', 'CARMEN ANGELA DE SORTI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94300, '37672886649', 'AGNALDO ANTONIO DA SILVA', 'AGNALDO ANTONIO DA SILVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94301, '49358219653', 'ANTONIO GONÇALVES', 'ANTONIO GONÇALVES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94302, '18724260000175', 'MAGNECON TELECOMUNICAÇOES E EMPRENDIMENTO LTDA', 'MAGNECON TELECOMUNICAÇOES E EMPRENDIMENTO LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94303, '38776746828', 'EMERSON JUNIOR VITORINO', 'EMERSON JUNIOR VITORINO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94304, '60407573887', 'CELSO PAULO FURLANI', 'CELSO PAULO FURLANI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94305, '34205152604', 'ANTONIO DONIZETI DA COSTA', 'ANTONIO DONIZETI DA COSTA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94328, '03210763000155', 'BARBOSA E DIAS ADVOGADOS ASSOCIADOS S/C', 'BARBOSA E DIAS ADVOGADOS ASSOCIADOS S/C', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94352, '03586538000703', 'BOURBON SPECIALTY COFFEES S/A - [TERCEIRO]', 'BOURBON', '03586538000703', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94415, '24958221859', 'LUIZ FERNANDO DE PAIVA', 'LUIZ FERNANDO DE PAIVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94416, '51699060649', 'MOISES APARECIDO GARCIA', 'MOISES APARECIDO GARCIA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94417, '05257882639', 'FABIO JUNIO DE CARVALHO', 'FABIO JUNIO DE CARVALHO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94418, '04669575000152', 'AJAZA CONSTRUTORA E SERVICOS LTDA', 'AJAZA CONSTRUTORA E SERVICOS LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94421, '64660624000118', 'CRC COM DE PNEUS LTDA', 'CRC COM DE PNEUS LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94422, '23649825000137', 'POSTO NOSSA SENHORA  APARECIDA LTDA', 'POSTO NOSSA SENHORA  APARECIDA LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94423, '05237921825', 'ANTONIO CARLOS DE ANDRADE', 'ANTONIO CARLOS DE ANDRADE', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94424, '94873470625', 'ERLON HERMES SANTIAGO COUTINHO', 'ERLON HERMES SANTIAGO COUTINHO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94425, '64667774649', 'RONAN DA SILVA', 'RONAN DA SILVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94426, '12218642620', 'OSORIO LUIZ MORAES', 'OSORIO LUIZ MORAES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94427, '58849122691', 'FABIANA ALVISI ZANGIACOMI', 'FABIANA ALVISI ZANGIACOMI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94428, '94814830610', 'ANA MARIA REZENDE AZEVEDO', 'ANA MARIA REZENDE AZEVEDO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94429, '31427871604', 'MANOEL GOMES ALMEIDA', 'MANOEL GOMES ALMEIDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94430, '22241862000149', 'Franco E Lago Instalações Elétricas', 'Franco E Lago Instalações Elétricas', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94431, '11836930000104', 'AUTO POSTO PAMPA LTDA', 'AUTO POSTO PAMPA LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94432, '06653855104', 'JOAO  BATISTA DE CARVALHO', 'JOAO BATISTA DE CARVALHO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94433, '23950607000138', 'MJ CONESERTOS E SERVICOS LTDA ME', 'MJ COSTURAS BAGS E SACARIAS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94434, '05250512607', 'EVANDRO CARLOS CONSOLINI', 'EVANDRO CARLOS CONSOLINI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94435, '34588027620', 'JORGE CHAVES DUTRA', 'JORGE CHAVES DUTRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94436, '00586359630', 'MARIA DO ROSARIO LEITE E OUTROS', 'MARIA DO ROSARIO LEITE E OUTROS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94437, '20394896000148', 'TRANSPORTES SANTA RITA LTDA.', 'TRANSPORTES SANTA RITALTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94438, '07468871000183', 'MADEN CONSTRUTORA LTDA', 'MADEN CONSTRUTORA LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94439, '87444682615', 'VALTER MARCELINO ALVES', 'VALTER MARCELINO ALVES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94440, '39537595668', 'ANTONIO MOREIRA', 'ANTONIO MOREIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94441, '04860970640', 'JOSE OSWALDO PEREIRA DOS SANTOS', 'JOSE OSWALDO PEREIRA DOS SANTOS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94442, '19305192653', 'ANTONIO MAURO BRANDAO', 'ANTONIO MAURO BRANDAO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94443, '21806455000179', 'APARECIDA SILVANA DE CARVALHO 29065355839 ME', 'APARECIDA SILVANA DE CARVALHO 29065355839 ME', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94444, '65836634653', 'ADINAN CARLOS NOGUEIRA', 'ADINAN CARLOS NOGUEIRA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94445, '53234227691', 'ADELIA DELLA TESTA TRDIANI', 'ADELIA DELLA TESTA TRDIANI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94446, '20252551877', 'EVANDRO FERNANDES', 'EVANDRO FERNANDES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94447, '26502680000135', 'ANGOS ENGENHARIA E TELECOMUNICACOES', 'ANGOS ENGENHARIA E TELECOMUNICACOES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94448, '10665687000138', '	PROHTEC MOTORES ELETRICOS LTDA - ME', '	PROHTEC MOTORES ELETRICOS LTDA - ME', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94449, '23386496000189', 'FOCUSBRAS SOLUTIONS LTDA', 'FOCUSBRAS SOLUTIONS LTDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94450, '21154554000113', 'TRIBUNAL DE JUSTICA DO ESTADO DE MINAS GERAIS', 'TRIBUNAL DE JUSTICA DO ESTADO DE MINAS GERAIS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94451, '26745183000168', 'CONDOMINIO RESIDENCIAL VILA VEREDA', 'CONDOMINIO RESIDENCIAL VILA VEREDA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94452, '21427986000150', 'DENIS REGIS NEDER', 'DENIS REGIS NEDER', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94453, '04045136622', 'RUTH MARIA DE ARRUDA CAMARGO JUNQUEIRA E OUTROS', 'RUTH MARIA DE ARRUDA CAMARGO JUNQUEIRA E OUTROS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94454, '38366936821', 'FELIPE RIBEIRO DA SILVA', 'FELIPE RIBEIRO DA SILVA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94455, '19791259615', 'CLESIO TARCISIO MORI', 'CLESIO TARCISIO MORI', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94456, '20140167000165', 'COMERCIAL ALVES FERREIRA LTDA ME', 'CONSTRUCASA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94457, '20207097000115', '	CARLOS HENRIQUE DA COSTA', '	CARLOS HENRIQUE DA COSTA', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94458, '21460124634', 'KAJANY CESAR MOREIRA DOS SANTOS', 'KAJANY CESAR MOREIRA DOS SANTOS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94459, '14015461000142', 'SCALLBERI CONSTRUCOES E SERVICOS LTDA.', 'SCALLBERI CONSTRUCOES E SERVICOS LTDA.', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94460, '55209394620', 'CHARLES DIAS DE MORAES', 'CHARLES DIAS DE MORAES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94461, '73714550615', 'JOSE CARLOS DE MELO', 'JOSE CARLOS DE MELO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94462, '26985246000153', 'MINAS CLUB DISTRIBUIDORA LTDA.', 'MINAS CLUB DISTRIBUIDORA LTDA.', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94463, '20216836000135', 'AR GUAZZELLI MATERIAIS ELETRICOS ME', 'AR GUAZZELLI MATERIAIS ELETRICOS ME', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94464, '23930484000173', 'LUCAS PLADEVALL', 'SITIO BEIRA RIO', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94474, '89391705634', 'ESTEFERSON HENRIQUE LOPES', 'ESTEFERSON HENRIQUE LOPES', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94475, '11129295000117', '	TSV SOLUCOES E SERVICOS LTDA - ME', '	TSV SOLUCOES E SERVICOS LTDA - ME', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94476, '66821746834', 'JOSE NARCISO NOVAIS', 'JOSE NOVAIS', '123', 1);
INSERT INTO cliefornec ( `CODIGO`, `CPF_CGC`, `RAZAOSOCIAL`, `NOMEFANTASIA`, `senha_site`, `bool_ativo_cliefornec`) VALUES ( 94477, '35317302668', 'JOSE RAIMUNDO DE MORAIS', 'JOSE RAIMUNDO DE MORAIS', '123', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: cliefornec_telefone
DROP TABLE IF EXISTS `cliefornec_telefone`;

CREATE TABLE IF NOT EXISTS `cliefornec_telefone` (
	`Cliente` int(11) NOT NULL PRIMARY KEY ,
	`Sequencia` int(11) NOT NULL PRIMARY KEY ,
	`Email` varchar(255)  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 0, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1, 0, 'jackbiller19@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 2, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 8, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 14, 0, 'eder@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 14, 1, 'pradocontabil@yahoo.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 19, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 27, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 36, 0, 'ana.cagnani@uol.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 40, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 42, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 61, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 62, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 63, 0, 'eder@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 68, 0, 'eder@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 71, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 85, 0, 'caioj@matrix.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 86, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 88, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91, 0, 'fazendamariano@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94, 0, 'riodasantas@pocos-net.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 100, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 112, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 116, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 126, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 131, 0, 'www.trevisan.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 132, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 134, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 140, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 147, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 153, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 154, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 160, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 163, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 174, 0, 'eder@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 181, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 182, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 183, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 191, 0, '....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 199, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 200, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 204, 0, 'caracu@pocos-net.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 207, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 209, 0, 'cafepocos.@cafepocos.com.brSS');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 212, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 215, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 221, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 240, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 241, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 248, 159, 'protecaototal@portecaototal.co');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 249, 0, 'cafepocos@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 255, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 266, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 277, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 289, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 292, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 301, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 303, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 308, 0, 'eder@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 316, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 317, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 318, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 319, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 343, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 344, 0, 'karlajunq@uol.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 350, 0, 'drimoreirat@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 364, 0, 'fazenda.cachoeirinha@yahoo.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 365, 0, 'cafepocos@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 372, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 373, 0, 'eder@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 375, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 379, 0, 'queilapf@yahoo.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 382, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 392, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 397, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 399, 0, 'adolfo@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 400, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 406, 0, '9974-0741');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 411, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 433, 0, 'n');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 442, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 443, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 450, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 451, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 452, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 462, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 483, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 485, 0, 'eder@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 490, 0, 'eder@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 498, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 500, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 504, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 508, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 509, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 512, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 514, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 519, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 532, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 536, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 538, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 541, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 542, 0, 'eder@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 544, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 545, 0, 'cafepocos@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 554, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 562, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 566, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 567, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 571, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 579, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 582, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 583, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 586, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 590, 0, 'cafepocos@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 597, 0, 'eder@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 598, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 611, 0, 'fazendamariano@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 620, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 623, 0, '(11) 9276-0641 maria angela');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 634, 0, 'leilafrib@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 638, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 639, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 644, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 649, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 658, 0, 'queilapf@yahoo.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 660, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 661, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 664, 0, 'majarantes@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 664, 1, 'fazendabelavista.bv@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 668, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 670, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 672, 0, 'eder@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 676, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 683, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 693, 0, 'marvin.leite1@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 699, 0, 'cafepocos@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 702, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 703, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 704, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 708, 0, 'eder@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 714, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 721, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 728, 0, 'eder@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 750, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 753, 0, 'eliane@fazendaagualimpa.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 762, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 771, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 800, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 805, 0, 'eder@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 806, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 808, 0, 'fazendamariano@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 811, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 816, 0, 'eder@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 824, 0, 'ramiro.ferreira@alcace.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 828, 0, 'fcp@pocos-net.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 835, 0, 'cafepocos@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 844, 0, 'seamarante@pocos-net.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 857, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 861, 0, 'sebastiao.navarro@bol.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 863, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 869, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 870, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 875, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 877, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 882, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 887, 0, 'eder@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 888, 0, 'eder@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 896, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 902, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 908, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 911, 0, '...');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 917, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 922, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 927, 0, 'cafepocos@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 929, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 930, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 932, 0, 'mmnb@uol.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 939, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 947, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 955, 0, 'fcp@pocos-net.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 956, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 963, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 965, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 968, 0, '....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 972, 0, 'zuleika@serralinda.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 985, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1023, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1039, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1042, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1043, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1067, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1078, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1081, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1090, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1091, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1092, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1103, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1114, 0, 'ricardobratusse@yahoo.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1118, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1123, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1129, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1131, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1134, 0, 'joaoalbinofilho@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1135, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1142, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1168, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1193, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1227, 0, '...');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1228, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1229, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1230, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1257, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1264, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1282, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1283, 0, '....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1296, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1309, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1315, 0, 'paz_caputoyahoo.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1317, 0, 'cafepocos@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1327, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1335, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1340, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1346, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1378, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1379, 0, '...');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1380, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1413, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1418, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1461, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1470, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1503, 0, 'eder@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1512, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1520, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1521, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1525, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1530, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1550, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1568, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1577, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1579, 0, 'cafepocos@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1590, 0, 'mario@centro-otorrino.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1598, 0, 'milton_prado@yahoo.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1601, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1620, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1644, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1666, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1684, 0, 'eder@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1716, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1725, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1749, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1768, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1796, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1807, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1814, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1815, 0, 'rafael-recreio@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1837, 0, 'eder@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1850, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1858, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1871, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1873, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1885, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1911, 0, 'eder@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1937, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1945, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1949, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1950, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1956, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 1986, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 2007, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 2019, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 2210, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 2318, 0, 'astec@dimaqequipamentos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 3003, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 4010, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 4016, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 4025, 0, 'agrosul.voce@uol.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 4111, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 4156, 0, 'cadastro.tcr@heringer.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 4163, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 4169, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 4304, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 4356, 153, 'forsul@forsull.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 4366, 0, 'fortluz@uol.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 4655, 142, 'moore-brasil@moore.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 4735, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 4762, 0, 'daianacs2009@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 4842, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 4935, 136, 'transp.ramos@pocos-net.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 4936, 0, 'tgl@matrix.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 4970, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 5045, 135, 'gmaf@gmaf.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10019, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10025, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10028, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10037, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10041, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10048, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10050, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10074, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10092, 0, 'patricia@royalcafe.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10098, 0, 'concreto@construtoraetapa.com.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10098, 1, 'tiago.plachi@construtoraetapa.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10100, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10107, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10109, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10116, 0, 'cafepocos@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10125, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10129, 0, '...........');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10130, 0, 'faturamento@caral.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10154, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10155, 0, 'urupecogumelos@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10165, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10167, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10172, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10184, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10186, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10208, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10216, 0, 'embrasp@pocos-net.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10219, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10227, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10230, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10231, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10235, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10239, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10242, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10244, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10246, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10247, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10253, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10260, 0, 'NENETO - 9987-1127');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10269, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10279, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10292, 0, 'eliane.henriqueta@logoplaste.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10295, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10296, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10297, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10305, 0, 'contasapagar@pradolux.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10306, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10315, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10317, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10321, 0, 'jrfsiqueira@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10325, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10345, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10356, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10357, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10360, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10364, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10376, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10380, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10381, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10394, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10405, 0, 'maplachi@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10425, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10429, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10440, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10441, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10442, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10447, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10451, 0, 'compras@santacasapc.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10452, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10460, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10500, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10511, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10518, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10519, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10520, 0, '.....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10538, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10560, 0, 'all-fer@pocos-net.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10592, 0, '....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10601, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10605, 0, 'lhottoni@hotmail.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10607, 0, '37155967 - LEONILDO');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10612, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10614, 0, 'ester.mfmk@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10616, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10642, 0, 'financeiro1@supervale.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10653, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10680, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10688, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10694, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10700, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10705, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10750, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10760, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10763, 0, 'flaviane.jacinto@vilanova.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10773, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10780, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10782, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10806, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10818, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10826, 0, 'togni.mse@togni.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10830, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10831, 0, 'deividi.nogueira@vmetaiscba.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10836, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10855, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10893, 0, 'rafael.santos@transtassi.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10908, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10926, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10936, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10963, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 10966, 0, 'wilsoncat01@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 11858, 0, 'sindruralpocos@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 12004, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 13033, 0, 'barrasflorestal@barrasflorestal.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 16096, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 16117, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 16150, 0, 'cadioli@cadioli.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 16156, 0, 'capatex@uol.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 16266, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 16278, 154, 'sac@correnteseduardofusi.com.b');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 16295, 0, 'trans.ramos@pocos-net.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 16342, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 16347, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 16377, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 16378, 0, 'alex.silva@anauger.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 16381, 152, 'VITALFARMA@PARAISONET.COM.BR');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 16397, 0, 'ricardogambaroto@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 16398, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 16473, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 16483, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 16486, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 16531, 143, 'marest@marest.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 16584, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 16615, 0, 'bruna@fuzil.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 16628, 139, 'servi@veloxmail.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 16637, 0, 'claudinei@sitcar.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 16642, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 16740, 0, 'dryelle.santos@bravolog.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 30454, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 30482, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 30854, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 30995, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50003, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50006, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50007, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50008, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50009, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50012, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50016, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50021, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50023, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50030, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50037, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50039, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50045, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50046, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50052, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50058, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50063, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50069, 0, 'circullare@circullare.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50083, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50104, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50105, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50118, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50170, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50184, 0, 'csoltda@yahoo.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50225, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50246, 158, 'paganini@paganini.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50259, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50392, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50399, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50401, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50457, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50465, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50467, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50473, 0, 'vendas@semeali.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50485, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50497, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50501, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50520, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50545, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50547, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50583, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50586, 141, 'dellas@globalmg.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50594, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50666, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50676, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50693, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50696, 134, 'trapp@trapp.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50698, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50709, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50726, 1, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50728, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50738, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50740, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50751, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50757, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50758, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50759, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50763, 0, 'nfe.ourofino@comexim.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50764, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50774, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50775, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50776, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50781, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50782, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50790, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50793, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50800, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50801, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50807, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50817, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50832, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50840, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50844, 0, 'financeiro@amfiosecabos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50862, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50876, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50882, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50887, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50892, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50894, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50906, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50907, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50916, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50917, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50919, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50925, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50927, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50928, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50929, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50930, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50931, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 50932, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90000, 0, 'eder@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90009, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90017, 0, 'tsilva@bourboncoffees.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90017, 1, 'elaineramos@bourboncoffees.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90018, 131, 'lessa@lessacafe.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90036, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90048, 0, 'alana@lessacafe.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90049, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90078, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90098, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90102, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90210, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90219, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90224, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90236, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90247, 133, 'olicar@olicar.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90248, 0, 'fiscal@spresscafe.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90263, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90268, 0, 'alexandre.mingot@yoorin.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90277, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90281, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90285, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90287, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90289, 0, 'gianelli37emerson@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90295, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90296, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90297, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90298, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90308, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90319, 156, 'luizfernandosalles@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90328, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90332, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90336, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90340, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90351, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90361, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90368, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90377, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90384, 0, 'compras@socicam.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90401, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90432, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90442, 0, 'semprevivafinanceiro@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90456, 0, 'marcos_goncalvess@yahoo.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90459, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90480, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90487, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90492, 0, 'cmenezes@matriz.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90501, 151, 'acscargo@terra.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90520, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90527, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90548, 0, 'cafepocos@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90551, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90563, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90576, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90586, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90595, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90609, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90634, 0, 'cafepocos@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90670, 0, 'eliana.silva@alcace.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90685, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90711, 146, 'panamericasupri@terra.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90723, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90727, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90764, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90768, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90770, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90781, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90792, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90807, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90822, 149, 'textilsj@dglnet.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90830, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90836, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90839, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90851, 145, 'westfaliaws@uol.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90857, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90860, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90877, 0, 'gustavomorais@inb.gov.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90880, 0, '...');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90883, 150, 'vetminas@ligbr.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90890, 0, 'mineracao@cazanga.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90909, 144, 'lavizoo@aol.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90911, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90921, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90924, 0, 'santana@xlig.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90944, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 90972, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91006, 0, 'fortluz@uol.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91008, 0, 'jfcancian@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91010, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91015, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91026, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91027, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91028, 0, 'CDI@CDIINFO.COM.BR');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91031, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91034, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91040, 0, 'cromoarte@uol.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91042, 0, '9834-7078');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91046, 0, 'lcjc9100@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91053, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91066, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91070, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91074, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91076, 160, 'GRANDELESTE@ GRANDELESTE.COM.B');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91104, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91106, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91112, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91120, 0, 'fabiana@curimbaba.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91125, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91129, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91144, 161, 'barrosmetal@uol.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91163, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91166, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91170, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91171, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91176, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91180, 0, 'comceramica@lorenzetti.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91184, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91186, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91196, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91201, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91202, 0, '...');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91203, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91205, 164, 'aminoagro@aminoagro.agr.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91217, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91223, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91226, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91238, 0, 'cafepocos@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91239, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91240, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91252, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91257, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91258, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91259, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91263, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91267, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91269, 0, '....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91275, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91280, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91283, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91284, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91305, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91308, 0, 'NAO');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91314, 0, 'NAO');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91325, 163, 'lambari@pocosnet.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91327, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91329, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91333, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91344, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91347, 0, 'juliano.melo@ipanemacoffees.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91350, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91353, 0, 'j.a.pedroso@tpnet.psi.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91357, 130, 'gbvt@directnet.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91358, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91360, 0, '00000000000000000');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91367, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91368, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91381, 0, 'COGUMELOS@URUPE.COM.BR');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91407, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91408, 129, 'comercial.falcao@terra.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91412, 0, 'compras@climepetotal.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91415, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91417, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91420, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91424, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91426, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91430, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91431, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91432, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91435, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91437, 0, 'tainara@exportadoralambari.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91437, 1, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91437, 2, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91457, 0, 'financeiro.vga@telemont.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91462, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91471, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91474, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91476, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91478, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91483, 0, '...');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91484, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91488, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91491, 0, 'daytona@daytonahonda.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91492, 108, 'pagril@uai.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91498, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91505, 0, 'fiscal@mundart-cristalizacao.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91505, 1, 'vendas@mundart-cristalizacao.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91506, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91509, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91510, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91534, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91539, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91545, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91546, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91548, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91551, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91556, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91560, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91561, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91566, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91576, 0, 'eder@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91580, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91583, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91584, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91598, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91599, 0, 'CDI@CDIINFO.COM.BR');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91600, 0, '....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91602, 119, 'castrorezendemg@aol.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91603, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91604, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91610, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91612, 0, 'CONTABILIDADE@CDIINFO.COM.BR');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91617, 0, '...');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91624, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91627, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91628, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91629, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91640, 121, 'GRANDELESTE@ GRANDELESTE.COM.B');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91642, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91647, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91652, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91653, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91665, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91667, 0, 'cafegraodeouro@cafegraodeouro.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91671, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91672, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91674, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91675, 122, 'natucid@terra.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91677, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91678, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91682, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91683, 0, '....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91684, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91686, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91689, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91692, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91696, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91700, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91704, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91705, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91710, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91713, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91715, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91716, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91717, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91721, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91722, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91724, 0, 'truckj@truckj.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91728, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91730, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91731, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91734, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91739, 123, 'ACOBENI@ACOBENI.COM.BR');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91741, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91745, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91765, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91768, 0, 'claudinei@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91773, 110, 'fscoffee@zaz.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91774, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91776, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91782, 0, 'atendimento@campocachoeira.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91783, 111, 'jequit@terra.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91784, 112, 'jaguare@jaguare.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91785, 113, 'macplasti@aol.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91788, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91791, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91795, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91797, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91802, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91804, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91812, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91813, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91823, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91828, 0, 'dandrea@agrimport.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91845, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91849, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91851, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91852, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91853, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91854, 0, 'eder@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91856, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91859, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91862, 0, '...');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91879, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91880, 0, '9995-8577  casa reginaldo');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91882, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91883, 0, 'debora_albino@pdic.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91884, 100, 'grandeleste@grandeleste.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91887, 0, 'pastobras@pastobras.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91888, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91898, 102, 'pms@santos.sp.gov.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91901, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91903, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91904, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91905, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91907, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91912, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91917, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91920, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91923, 114, 'tecfilm@tecfilm.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91924, 115, 'transmendes@transmendes.com.r');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91927, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91929, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91935, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91937, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91941, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91942, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91943, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91946, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91949, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91957, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91960, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91965, 0, 'casadasvacinas@ig.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91975, 0, 'formatloteamentos@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91977, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91979, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 91986, 0, '...');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92001, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92002, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92005, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92009, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92011, 166, 'OLIRTOSJ@IG.COM.BR');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92017, 0, 'protspray@protspray.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92033, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92034, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92037, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92039, 0, 'claudinei@sitcar.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92040, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92051, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92052, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92053, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92062, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92064, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92066, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92072, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92081, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92082, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92084, 0, 'julio@terrafortecafes.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92084, 1, 'FISCAL@TERRAFORTECAFES.COM.BR');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92092, 0, '37213100');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92100, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92105, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92111, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92116, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92122, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92123, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92125, 0, 'wolgranbarbosa@yahoo.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92126, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92128, 117, 'grafmol@grafmol.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92130, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92136, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92137, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92139, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92145, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92146, 116, 'MZK@MZK.COM.BR');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92147, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92149, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92151, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92152, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92155, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92156, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92159, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92170, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92171, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92172, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92178, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92183, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92186, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92194, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92195, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92198, 118, 'andre@cassillatour.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92204, 0, '........');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92207, 0, 'hernani.ut@uol.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92214, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92215, 0, 'andre@cassillatour.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92216, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92220, 128, 'LUCAS_CASAO@HOTMAIL.COM');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92222, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92223, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92224, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92225, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92226, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92231, 0, '...');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92232, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92238, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92242, 105, 'distrijacto@yahoo.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92251, 103, 'botimetal@botimetal.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92252, 0, '.........');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92255, 104, 'parcan@parcanbh.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92263, 0, 'carloshm@cnen.gov.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92265, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92268, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92274, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92277, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92282, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92291, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92292, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92296, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92297, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92300, 0, '......');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92306, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92308, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92309, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92310, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92314, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92315, 0, 'nf.minasmetaispc@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92315, 1, 'ju_minasmetaispc@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92317, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92319, 167, 'vpasteis@yahoo.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92323, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92329, 0, '...');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92333, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92335, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92336, 0, '.....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92339, 0, '.......');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92344, 0, '.......');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92353, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92355, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92360, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92361, 0, 'lgconstrutora@bol.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92363, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92364, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92372, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92373, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92376, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92379, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92382, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92389, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92391, 0, '........');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92396, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92400, 0, 'sac@docescastellani.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92405, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92406, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92407, 0, '......');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92411, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92420, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92422, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92427, 0, '.....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92431, 0, '.....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92435, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92436, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92437, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92439, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92440, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92443, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92449, 0, '.....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92451, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92452, 0, 'cesarbluma@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92460, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92462, 0, 'eder@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92465, 169, 'walmor@dglnet.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92468, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92472, 0, 'riodasantas@pocos-net.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92478, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92480, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92481, 0, 'irineujuniorr@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92486, 0, '.....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92487, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92488, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92491, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92501, 170, 'marcusvaldivieso@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92502, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92509, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92520, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92521, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92525, 0, 'eder@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92527, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92528, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92532, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92536, 171, 'MGMCAMISETAS@YAHOO.COM.BR');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92538, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92539, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92542, 172, 'eloi@liviero.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92548, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92554, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92555, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92557, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92559, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92561, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92565, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92567, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92572, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92577, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92580, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92583, 173, 'nexusepi@nexusepi.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92585, 174, 'PNEUSUL@PNEUSUL.COM.BR');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92588, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92592, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92598, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92599, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92601, 0, 'PETROL@PETROL.COM.BR');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92602, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92603, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92604, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92606, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92609, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92611, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92612, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92614, 176, 'alkaprodutosagropecuarios@uol.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92617, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92619, 177, 'pat.bandeira@bol.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92628, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92631, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92632, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92633, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92638, 0, 'adriana@lessacafe.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92639, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92642, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92646, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92646, 1, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92649, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92652, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92655, 0, 'marcosousa@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92657, 0, 'blatta@blatta.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92658, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92660, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92661, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92666, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92667, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92671, 179, 'terravivaambiental@bol.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92672, 0, 'adm@pocosbeer.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92673, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92676, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92678, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92680, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92681, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92683, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92685, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92686, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92692, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92697, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92698, 180, 'pacaluz@pacaluz.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92699, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92703, 181, 'botimetal@botimetal.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92707, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92711, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92713, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92714, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92715, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92719, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92720, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92723, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92727, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92728, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92729, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92732, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92735, 182, 'eletroservice-pc@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92737, 0, 'isabel@ecoga.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92738, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92739, 0, 'alexandro@emsere.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92745, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92749, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92751, 183, 'dmincorporadora@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92756, 184, 'marcio.seixas@linse.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92757, 0, 'andretopolovszki@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92760, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92768, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92769, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92770, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92772, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92780, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92784, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92788, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92790, 0, 'fabiana.goncalves@cbl-logistica.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92798, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92806, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92816, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92817, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92819, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92825, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92827, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92829, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92830, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92831, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92833, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92834, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92837, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92840, 0, 'adm@genfertil.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92841, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92844, 0, 'aline@minassultransportes.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92845, 0, 'fazenda.3barras@uol.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92847, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92854, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92855, 0, 'repor@repor.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92857, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92859, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92863, 0, 'quisana@pocos-net.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92874, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92875, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92879, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92880, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92887, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92888, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92893, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92894, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92900, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92905, 0, 'americaimports@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92906, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92912, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92916, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92919, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92920, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92922, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92924, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92925, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92933, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92936, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92938, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92944, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92946, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92950, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92951, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92953, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92953, 1, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92954, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92958, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92960, 0, 'caracu@pocos-net.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92966, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92969, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92970, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92971, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92974, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92976, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92977, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92978, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92983, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92984, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92988, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92989, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92990, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92993, 0, ',');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92995, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 92996, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93012, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93013, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93015, 0, 'toninho@terrafortecafes.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93018, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93020, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93026, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93028, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93029, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93033, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93036, 0, 'joaocebolaccp@yahoo.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93037, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93038, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93043, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93045, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93046, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93047, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93048, 0, 'COMERCIALASSIS@BOL.COM.BR');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93053, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93054, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93057, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93058, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93059, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93060, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93063, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93065, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93066, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93067, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93068, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93069, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93070, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93071, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93072, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93073, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93074, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93075, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93076, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93077, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93078, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93079, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93080, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93081, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93082, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93083, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93084, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93085, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93086, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93087, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93088, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93089, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93090, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93091, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93092, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93093, 0, 'luisinhoagro@yahoo.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93094, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93095, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93097, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93098, 0, 'bzandreia@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93099, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93100, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93101, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93102, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93103, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93104, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93105, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93106, 0, 'matoseluz@bol.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93106, 1, 'tanialuciamatos@bol.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93107, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93108, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93109, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93110, 0, 'santalina@uol.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93112, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93113, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93114, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93115, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93116, 0, 'case.financeiro@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93116, 1, 'case.civil@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93118, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93119, 0, 'eder@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93120, 0, 'eder@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93121, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93122, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93123, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93124, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93125, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93126, 0, 'digitronicti@ig.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93127, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93128, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93129, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93130, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93131, 186, 'agronet@axtelecom.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93132, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93133, 0, 'eder@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93135, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93136, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93137, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93138, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93139, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93140, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93141, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93142, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93143, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93144, 0, 'mcminsumos@superig.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93145, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93146, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93147, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93148, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93149, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93150, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93151, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93152, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93153, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93154, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93155, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93156, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93157, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93158, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93160, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93161, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93162, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93163, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93164, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93165, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93166, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93167, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93168, 0, '...');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93169, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93170, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93171, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93172, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93173, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93174, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93175, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93176, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93177, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93178, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93180, 0, 'lessa@lessacafe.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93181, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93182, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93183, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93184, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93185, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93186, 0, 'julio.zulao@yahoo.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93187, 0, '...');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93188, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93189, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93190, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93191, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93192, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93193, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93195, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93196, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93197, 0, 'adcalcoa@pocos-net.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93198, 0, 'acr@acrservicos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93198, 1, 'dalberto@acrservicos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93199, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93200, 0, 'COMPRAS@CONSTRUTORABORA.COM.BR');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93201, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93202, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93203, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93204, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93205, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93206, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93208, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93209, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93210, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93211, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93212, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93213, 0, '....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93214, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93215, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93216, 0, '...');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93217, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93218, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93219, 0, '....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93220, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93221, 0, '...');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93222, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93223, 0, '...');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93224, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93225, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93226, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93227, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93228, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93229, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93230, 0, '...');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93231, 0, 'duaupe@duaupe.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93232, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93234, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93235, 0, '....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93236, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93237, 0, '....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93238, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93239, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93240, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93241, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93242, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93243, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93244, 0, '...');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93245, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93246, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93247, 0, '...');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93248, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93249, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93250, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93251, 0, '...');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93252, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93253, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93254, 0, '...');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93255, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93256, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93257, 0, 'texwork@texwork.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93259, 0, '....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93260, 0, '....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93261, 0, '....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93262, 0, '....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93263, 0, '....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93264, 0, '...');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93265, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93266, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93267, 0, '...');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93268, 0, '.....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93269, 0, 'karina.procopio@outlook.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93270, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93271, 0, '...');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93272, 0, '....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93273, 0, '...');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93274, 0, '....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93275, 0, '....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93276, 0, '....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93277, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93278, 0, '....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93280, 0, '....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93281, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93282, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93283, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93284, 0, '...');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93285, 0, '....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93286, 0, '....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93287, 0, '.....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93288, 0, '...');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93289, 0, '...');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93290, 0, '.....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93291, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93292, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93294, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93295, 0, '...');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93296, 0, '....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93298, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93299, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93300, 0, '....');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93301, 0, '...');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93302, 0, '..');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93303, 0, '...');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93305, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93306, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93307, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93308, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93309, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93311, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93312, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93313, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93314, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93315, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93316, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93317, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93318, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93319, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93320, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93321, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93322, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93323, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93324, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93325, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93326, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93327, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93328, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93329, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93330, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93331, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93333, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93334, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93335, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93336, 0, 'jecjconstrucoes@yahoo.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93337, 0, 'principe@pcs.matrix.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93338, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93339, 0, 'lucasfigueiredo22@yahoo.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93341, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93343, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93344, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93345, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93346, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93347, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93348, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93349, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93350, 0, 'rosa@ferragensnegrao.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93351, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93352, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93353, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93355, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93356, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93357, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93359, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93360, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93361, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93362, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93363, 0, 'receptorascuritiba@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93364, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93365, 0, 'botiluvas@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93366, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93368, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93369, 0, 'marcia.vegran@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93370, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93372, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93373, 0, 'financeiro@julicantransportes.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93374, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93375, 0, 'sandrojoseh@itelefonica.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93376, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93377, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93378, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93381, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93382, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93383, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93384, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93389, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93391, 0, 'bauen.adriano@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93392, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93393, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93394, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93395, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93397, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93398, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93399, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93401, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93402, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93403, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93404, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93405, 0, 'vendas@laboratorioadn.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93406, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93407, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93408, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93409, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93410, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93411, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93412, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93413, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93414, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93415, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93416, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93417, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93418, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93419, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93420, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93421, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93422, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93423, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93424, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93425, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93428, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93429, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93431, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93432, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93433, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93434, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93435, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93436, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93437, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93439, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93440, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93443, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93444, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93445, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93446, 0, 'gislene@fazendasertaozinho.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93447, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93449, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93450, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93451, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93452, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93453, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93454, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93455, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93456, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93457, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93458, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93459, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93460, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93461, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93462, 0, 'olivia.comercial@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93463, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93464, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93465, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93466, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93467, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93468, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93469, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93470, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93471, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93472, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93473, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93474, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93475, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93476, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93477, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93478, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93479, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93480, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93481, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93482, 0, 'francisco@buenocafe.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93483, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93484, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93485, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93486, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93487, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93488, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93489, 0, 'bilajunqueira@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93490, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93491, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93492, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93493, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93494, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93495, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93496, 0, 'formatloteamentos@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93497, 0, 'jdgrossi@uol.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93498, 0, 'drauzioclinico@pocos-net.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93499, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93500, 0, 'debora@athena.eng.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93501, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93502, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93503, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93504, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93505, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93506, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93507, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93508, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93509, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93510, 0, 'alana@agrovecal.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93511, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93512, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93513, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93514, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93515, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93516, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93517, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93518, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93519, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93520, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93521, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93522, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93523, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93524, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93526, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93527, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93528, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93529, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93530, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93531, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93532, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93533, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93534, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93535, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93536, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93537, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93538, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93539, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93540, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93541, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93542, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93543, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93544, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93545, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93546, 0, 'juliana@lvsolucoes.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93547, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93548, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93549, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93550, 0, 'apoliveira@dmee.com.br
apoliveira@dmee.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93551, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93552, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93553, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93554, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93555, 0, 'joaomeletti@ps2empreendimentos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93555, 1, 'vendas@bosquedasaraucarias.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93555, 2, 'joao@bosquedasaraucarias.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93556, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93557, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93558, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93559, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93560, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93561, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93562, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93563, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93564, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93565, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93566, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93567, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93568, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93569, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93570, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93571, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93572, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93573, 0, 'nfe@seltcom.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93574, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93575, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93576, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93577, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93578, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93579, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93580, 0, 'antonio.metran@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93581, 0, 'agrovila.e@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93582, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93583, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93584, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93585, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93586, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93587, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93588, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93589, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93590, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93591, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93592, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93593, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93594, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93595, 0, 'smelloantonio@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93596, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93597, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93598, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93599, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93600, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93601, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93602, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93604, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93606, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93607, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93608, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93609, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93611, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93612, 0, 'luis.cortezano@alcoa.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93613, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93614, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93615, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93616, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93617, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93618, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93619, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93620, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93620, 1, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93621, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93622, 0, 'financeiro@cecsolucoes.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93623, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93624, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93625, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93627, 0, 'lucas85souza@yahoo.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93629, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93630, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93631, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93632, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93633, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93634, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93636, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93637, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93638, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93639, 0, 'joaosena@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93640, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93641, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93642, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93643, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93644, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93645, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93646, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93647, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93648, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93649, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93650, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93651, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93652, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93653, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93654, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93655, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93656, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93657, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93658, 0, 'reservas@nacionalpocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93659, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93660, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93661, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93663, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93664, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93665, 0, 'financeiro@labasque.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93666, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93667, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93668, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93669, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93670, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93671, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93672, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93673, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93674, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93675, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93676, 0, 'contatopc.papoloc@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93677, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93678, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93679, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93680, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93681, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93682, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93683, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93684, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93685, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93686, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93687, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93688, 0, 'gsc@gseventos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93689, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93690, 0, 'santaroca@uaimail.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93691, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93692, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93693, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93694, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93695, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93696, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93697, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93698, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93699, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93700, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93701, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93702, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93703, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93705, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93706, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93707, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93708, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93709, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93710, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93711, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93712, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93714, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93715, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93716, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93717, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93718, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93719, 0, 'silvana.placenco@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93720, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93721, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93722, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93723, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93724, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93725, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93726, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93727, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93728, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93729, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93730, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93731, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93732, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93733, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93734, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93735, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93736, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93737, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93738, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93739, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93740, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93741, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93742, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93743, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93746, 0, 'claudinei@sitcar.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93747, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93748, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93749, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93750, 0, 'administrativo2@2rpart.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93751, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93752, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93753, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93754, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93756, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93757, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93758, 0, 'davidalmeidamarques@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93758, 1, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93759, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93760, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93761, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93762, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93763, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93764, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93765, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93766, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93767, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93768, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93769, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93771, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93772, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93773, 0, 'contato@casaresgate.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93774, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93775, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93776, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93777, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93778, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93779, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93780, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93781, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93782, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93783, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93784, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93785, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93786, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93787, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93788, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93789, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93790, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93791, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93792, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93793, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93794, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93795, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93796, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93797, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93798, 0, 'ronny.cruz_28@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93799, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93800, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93801, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93802, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93803, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93804, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93805, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93806, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93807, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93808, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93809, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93810, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93811, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93812, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93813, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93814, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93815, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93816, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93817, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93818, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93819, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93820, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93821, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93822, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93823, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93824, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93825, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93826, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93827, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93828, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93829, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93830, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93831, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93832, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93833, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93834, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93835, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93836, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93837, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93838, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93840, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93841, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93842, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93843, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93844, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93845, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93846, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93847, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93848, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93849, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93850, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93851, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93852, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93853, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93854, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93855, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93856, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93859, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93860, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93861, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93862, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93863, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93864, 0, 'denilson@ranauro.adm.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93865, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93866, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93867, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93868, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93869, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93870, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93871, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93872, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93873, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93874, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93875, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93876, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93877, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93878, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93879, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93880, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93881, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93882, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93883, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93884, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93885, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93886, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93887, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93888, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93889, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93890, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93891, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93892, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93893, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93894, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93895, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93896, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93897, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93898, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93899, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93900, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93901, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93902, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93903, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93904, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93905, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93906, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93907, 0, 'financeiro@formatloteamentos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93908, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93909, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93910, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93911, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93912, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93914, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93915, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93916, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93917, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93918, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93919, 0, 'madessilvapaisagismo@yahoo.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93920, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93921, 0, 'josemarcioguimaraes@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93922, 0, 'sportluck.pocos@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93923, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93924, 0, 'confianca.contabilidade@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93925, 0, 'atendimentocasadoconstrutor@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93926, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93927, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93928, 0, 'mariaovidia@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93929, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93930, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93931, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93932, 0, 'claudinei.oliveira@alcoa.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93933, 0, 'wlconscivil@yahoo.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93934, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93935, 0, 'fussen@europe.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93936, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93937, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93938, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93939, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93940, 0, 'shaftel@terra.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93941, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93942, 0, 'cghscamp@yahoo.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93943, 0, 'aspra-regionalpocosdecaldas@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93944, 0, 'edilson.staff@mastertranspo.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93945, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93946, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93947, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93948, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93949, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93950, 0, 'battesiniflorestal@ig.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93951, 0, 'jose-niltons@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93952, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93953, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93954, 0, 'format@formatloteamentos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93955, 0, 'imobiliariamendespocos@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93956, 0, 'fiscalmg@buenocafe.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93959, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93960, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93961, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93962, 0, 'nfemulatinho@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93963, 0, 'paroquiasaojudaspc@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93964, 0, 'ECONAD@GLOBO.COM');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93965, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93966, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93967, 0, 'refratariossn@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93968, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93969, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93970, 0, 'joaoboscopereiradecastro@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93971, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93972, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93973, 0, 'alana@lessacafe.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93974, 0, 'altiereslopes@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93975, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93976, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93977, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93978, 0, 'raphaelsurfyes@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93979, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93980, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93981, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93982, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93983, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93984, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93985, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93986, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93987, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93988, 0, 'agnaldobom@yahoo.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93989, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93990, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93991, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93992, 0, 'luizcarlos.santos7@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93993, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93994, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93995, 0, 'mariolucio.zago@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93996, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93997, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93998, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 93999, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94000, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94001, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94002, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94003, 0, 'familia@dannias.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94004, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94005, 0, 'jluiz@apport.ind.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94006, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94007, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94008, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94009, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94010, 0, 'sumayra.rodrigues@pitagoras.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94011, 0, 'richfontella@uol.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94012, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94013, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94014, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94015, 0, 'atendimentomimapely@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94016, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94017, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94018, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94019, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94020, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94021, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94022, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94023, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94024, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94025, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94026, 0, 'nfe.andradas@cara.agr.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94027, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94028, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94029, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94030, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94031, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94032, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94033, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94034, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94035, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94036, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94037, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94038, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94039, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94040, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94041, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94042, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94043, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94044, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94045, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94046, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94047, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94048, 0, 'administracao@edmundocafe.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94049, 0, 'PRADO.MARCELLA2014@BOL.COM.BR');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94050, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94051, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94052, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94053, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94054, 0, 'corretora_cafecaldense@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94055, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94056, 0, 'administracao@maddza.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94057, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94058, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94059, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94060, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94061, 0, 'SUPERVISAO@SUPERVALE.COM');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94062, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94063, 0, 'MARKETING@CLIMEPETOTAL.COM.BR');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94064, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94065, 0, 'imoveis777@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94066, 0, 'lucasglobotroter@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94067, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94068, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94069, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94070, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94071, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94072, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94073, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94074, 0, 'm.petreca@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94075, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94076, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94077, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94078, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94079, 0, 'financeiro@redutodocafe.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94080, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94082, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94083, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94084, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94085, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94086, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94087, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94088, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94089, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94090, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94091, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94092, 0, 'christianofloripa303@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94093, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94094, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94095, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94096, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94097, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94098, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94099, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94100, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94101, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94102, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94103, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94104, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94105, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94106, 0, 'cafepocos@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94107, 0, 'jrcafe2010@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94108, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94109, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94110, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94111, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94112, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94113, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94114, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94115, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94116, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94117, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94118, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94119, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94120, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94121, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94122, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94123, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94124, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94125, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94126, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94127, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94128, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94129, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94130, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94131, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94132, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94133, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94134, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94135, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94136, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94137, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94138, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94139, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94140, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94141, 0, 'fiscal@cafesamaria.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94142, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94143, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94144, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94145, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94146, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94147, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94148, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94149, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94150, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94151, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94152, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94153, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94154, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94155, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94156, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94157, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94158, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94159, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94160, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94161, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94162, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94163, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94164, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94165, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94166, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94167, 0, 'frederico_novelli190@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94168, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94169, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94170, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94171, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94172, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94173, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94174, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94175, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94176, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94177, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94178, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94179, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94180, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94181, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94182, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94183, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94184, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94185, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94186, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94187, 0, 'borbakfe@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94188, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94189, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94190, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94191, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94192, 0, 'fabio.faria@csbdrogarias.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94195, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94196, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94197, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94198, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94199, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94200, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94201, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94202, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94203, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94204, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94205, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94206, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94207, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94208, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94209, 0, 'rvs.ventura@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94210, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94211, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94212, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94213, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94214, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94215, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94216, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94217, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94218, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94219, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94220, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94222, 0, 'cont.consulte@uol.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94223, 0, '????');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94224, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94225, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94226, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94227, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94228, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94229, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94230, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94231, 0, 'consel@veloxmail.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94232, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94234, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94236, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94237, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94238, 0, 'vendas@vilamonge.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94239, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94240, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94241, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94242, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94243, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94244, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94245, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94246, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94247, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94248, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94249, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94250, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94251, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94252, 0, 'mirian@citroenlaroche.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94253, 0, 'engecad505@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94254, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94255, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94256, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94257, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94258, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94259, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94260, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94261, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94262, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94263, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94264, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94265, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94266, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94267, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94268, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94269, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94270, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94271, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94272, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94273, 0, 'marilzajunqueiraalves@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94274, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94275, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94276, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94277, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94278, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94279, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94280, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94281, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94282, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94283, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94284, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94285, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94286, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94287, 0, 'maranconstrutora.ltda@gmail.co');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94288, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94289, 0, 'ALESSANDRO.GONCALVES@GMAIL.COM');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94290, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94291, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94292, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94293, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94294, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94295, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94296, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94297, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94298, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94299, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94300, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94301, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94302, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94303, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94304, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94305, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94306, 0, 'juliana.oliveira@resolv.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94307, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94308, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94309, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94310, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94311, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94312, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94313, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94314, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94315, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94316, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94317, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94318, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94319, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94320, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94321, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94322, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94323, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94324, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94325, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94326, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94327, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94328, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94329, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94330, 0, 'raquel.viana@sanches.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94331, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94332, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94333, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94334, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94335, 0, 'LEILAESTILO@HOTMAIL.COM');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94336, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94337, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94338, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94339, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94340, 0, 'ENGENHARIA.PROJETOS.278@GMAIL.COM');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94341, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94342, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94343, 0, 'CARLOSMCSP@HOTMAIL.COM');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94344, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94345, 0, 'MIGUELCDS1@YAHOO.COM.BR');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94346, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94347, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94348, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94349, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94350, 0, 'RENATA.OLIVEIRA@RIOCLARENSE.CO');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94351, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94352, 0, 'tsilva@bourboncoffees.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94352, 1, 'elaineramos@bourboncoffees.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94352, 2, 'thiago.almeida@bourboncoffees.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94353, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94354, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94355, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94356, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94357, 0, 'JBREKALIO@YAHOO.COM');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94358, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94359, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94360, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94361, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94362, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94363, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94364, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94365, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94366, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94367, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94368, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94369, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94370, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94371, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94372, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94373, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94374, 0, 'francoffee.brasil@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94375, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94376, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94377, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94378, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94379, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94380, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94381, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94382, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94383, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94384, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94385, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94386, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94387, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94388, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94389, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94390, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94391, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94392, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94393, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94394, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94395, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94396, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94397, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94398, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94399, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94400, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94401, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94402, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94403, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94404, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94405, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94406, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94407, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94408, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94409, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94410, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94411, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94412, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94413, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94414, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94415, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94416, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94417, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94418, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94419, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94420, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94421, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94422, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94423, 0, '.');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94424, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94425, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94426, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94427, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94428, 0, 'ana.mr.azevedo@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94429, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94430, 0, 'francoelagoinstalacaoeletrica@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94431, 0, 'andreia.pereira@postopampa');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94432, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94433, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94434, 0, 'vandoconsolini@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94435, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94436, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94437, 0, 'transsantarita@bol.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94438, 0, 'madenconstrutora@yahoo.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94439, 0, 'WN4A@OUTLOOK.COM');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94440, 0, 'ismeria295@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94441, 0, 'alessandrads1@yahho.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94442, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94444, 0, 'adinan@agenciacervantes.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94445, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94446, 0, 'evandro_anselmo@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94447, 0, 'supervisao.angosengenharia@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94448, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94449, 0, 'idu.guilherme@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94451, 0, 'marcelo@ethosadm.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94453, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94454, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94455, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94456, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94457, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94458, 0, 'kajanycesar@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94459, 0, 'scallberi@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94460, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94461, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94462, 0, 'vanconti@hotmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94463, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94464, 0, 's.rural.divinolandia@bol.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94465, 0, 'contato@coalengenharia.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94466, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94467, 0, 'credito@institutodonato.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94468, 0, 'cafepocos@cafepocos.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94469, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94470, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94471, 0, '0514.antonior.costa@bradesco.com.br');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94472, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94473, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94474, 0, 'leholiveira550@gmail.com');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94475, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94476, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94477, 0, '');
INSERT INTO cliefornec_telefone ( `Cliente`, `Sequencia`, `Email`) VALUES ( 94478, 0, '');



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: configurar_site
DROP TABLE IF EXISTS `configurar_site`;

CREATE TABLE IF NOT EXISTS `configurar_site` (
	`id_configurar_site` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_configurar_site` varchar(100) NOT NULL ,
	`titulo_menu_configurar_site` varchar(100)  ,
	`cor_pagina_configurar_site` varchar(100) NOT NULL ,
	`contra_cor_pagina_configurar_site` varchar(100) NOT NULL ,
	`imagem_icone_configurar_site` varchar(100) NOT NULL ,
	`imagem_logo_configurar_site` varchar(100) NOT NULL ,
	`bem_vindo_configurar_site` varchar(100)  ,
	`data_atualizacao_configurar_site` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_configurar_site` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO configurar_site ( `id_configurar_site`, `titulo_configurar_site`, `titulo_menu_configurar_site`, `cor_pagina_configurar_site`, `contra_cor_pagina_configurar_site`, `imagem_icone_configurar_site`, `imagem_logo_configurar_site`, `bem_vindo_configurar_site`, `data_atualizacao_configurar_site`, `bool_ativo_configurar_site`) VALUES ( 1, 'CaféPoços', 'CaféPoços', '#00aa6a;', '#fff;', 'Logo_cafe_pocos.png', 'Logotipo.JPG', 'Bem Vindo a Café Poços!', '2018-01-24 10:53:58', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: contato
DROP TABLE IF EXISTS `contato`;

CREATE TABLE IF NOT EXISTS `contato` (
	`id_contato` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`nome_contato` varchar(200) NOT NULL ,
	`email_contato` varchar(200)  ,
	`telefone_contato` varchar(200)  ,
	`assunto_contato` varchar(200)  ,
	`mensagem_contato` text  ,
	`usuario_id` int(11) NOT NULL ,
	`data_atualizacao_contato` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_contato` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO contato ( `id_contato`, `nome_contato`, `email_contato`, `telefone_contato`, `assunto_contato`, `mensagem_contato`, `usuario_id`, `data_atualizacao_contato`, `bool_ativo_contato`) VALUES ( 1, 'Teste Jack', 'teste@teste.teste', '9999-9999', 'Formulario de Contato - Site CaféPoços', 'Teste', 3, '2018-01-24 14:50:35', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: destaque_grupo
DROP TABLE IF EXISTS `destaque_grupo`;

CREATE TABLE IF NOT EXISTS `destaque_grupo` (
	`id_destaque_grupo` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_destaque_grupo` varchar(100) NOT NULL ,
	`grupo_id` int(11) NOT NULL ,
	`imagem_destaque_grupo` varchar(100) NOT NULL ,
	`descricao_destaque_grupo` varchar(300)  ,
	`configurar_site_id` int(11) NOT NULL ,
	`data_atualizacao_destaque_grupo` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_destaque_grupo` int(1) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO destaque_grupo ( `id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `bool_ativo_destaque_grupo`) VALUES ( 1, 'Cabos Atox', 2, 'cabo.jpg', '', 1, '2018-01-12 14:23:10', 0);
INSERT INTO destaque_grupo ( `id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `bool_ativo_destaque_grupo`) VALUES ( 2, 'Luminária Pública', 8, 'luminarias.png', '', 1, '2018-01-12 14:22:49', 0);
INSERT INTO destaque_grupo ( `id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `bool_ativo_destaque_grupo`) VALUES ( 3, 'Chaves e Fusíveis', 4, 'fusiveis.jpg', '', 1, '2018-01-12 14:22:47', 0);
INSERT INTO destaque_grupo ( `id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `bool_ativo_destaque_grupo`) VALUES ( 4, 'Canaletas e Acessórios', 3, 'fundo3.jpg', '', 1, '2018-01-05 14:32:56', 0);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: empresa
DROP TABLE IF EXISTS `empresa`;

CREATE TABLE IF NOT EXISTS `empresa` (
	`id_empresa` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_empresa` varchar(200) NOT NULL ,
	`imagem_logo_empresa` varchar(200) NOT NULL ,
	`data_atualizacao_empresa` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_empresa` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO empresa ( `id_empresa`, `descricao_empresa`, `imagem_logo_empresa`, `data_atualizacao_empresa`, `usuario_id`, `bool_ativo_empresa`) VALUES ( 1, 'COOP. REG. DOS CAFEICULTORES DE POÇOS DE CALDAS', 'LogotipoOrignal.JPG', '2018-01-29 08:32:21', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: endereco_site
DROP TABLE IF EXISTS `endereco_site`;

CREATE TABLE IF NOT EXISTS `endereco_site` (
	`id_endereco_site` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_endereco_site` varchar(100) NOT NULL ,
	`endereco_endereco_site` varchar(100) NOT NULL ,
	`numero_endereco_site` int(11) NOT NULL ,
	`complemento_endereco_site` varchar(100)  ,
	`bairro_endereco_site` varchar(100)  ,
	`cidade_endereco_site` varchar(100) NOT NULL ,
	`estado_id` int(11) NOT NULL ,
	`cep_endereco_site` varchar(15) NOT NULL ,
	`telefone_endereco_site` varchar(50) NOT NULL ,
	`celular_endereco_site` varchar(50)  ,
	`email_endereco_site` varchar(100)  ,
	`horario_funcionamento_endereco_site` text  ,
	`latitude_endereco_site` varchar(100) NOT NULL ,
	`longitude_endereco_site` varchar(100) NOT NULL ,
	`configurar_site_id` int(11) NOT NULL ,
	`data_atualizacao_endereco_site` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_endereco_site` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO endereco_site ( `id_endereco_site`, `descricao_endereco_site`, `endereco_endereco_site`, `numero_endereco_site`, `complemento_endereco_site`, `bairro_endereco_site`, `cidade_endereco_site`, `estado_id`, `cep_endereco_site`, `telefone_endereco_site`, `celular_endereco_site`, `email_endereco_site`, `horario_funcionamento_endereco_site`, `latitude_endereco_site`, `longitude_endereco_site`, `configurar_site_id`, `data_atualizacao_endereco_site`, `bool_ativo_endereco_site`) VALUES ( 1, 'R. Pedro Bertozi n° 8', ' Av. João Pinheiro', 757, '', 'Centro', 'Poços de Caldas', 13, '37701-386', '(35) 3722-1250 ', '', 'camara@cafepocos.com.br', '', '-21.785929', '-46.5800446', 1, '2018-01-19 17:56:22', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: estado
DROP TABLE IF EXISTS `estado`;

CREATE TABLE IF NOT EXISTS `estado` (
	`id_estado` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_estado` varchar(100) NOT NULL ,
	`sigla_estado` char(2) NOT NULL ,
	`bool_ativo_estado` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 1, 'Acre', 'AC', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 2, 'Alagoas', 'AL', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 3, 'Amapá', 'AP', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 4, 'Amazonas', 'AM', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 5, 'Bahia', 'BA', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 6, 'Ceará', 'CE', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 7, 'Distrito Federal', 'DF', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 8, 'Espírito Santo', 'ES', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 9, 'Goiás', 'GO', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 10, 'Maranhão', 'MA', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 11, 'Mato Grosso', 'MT', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 12, 'Mato Grosso do Sul', 'MS', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 13, 'Minas Gerais', 'MG', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 14, 'Pará', 'PA', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 15, 'Paraíba', 'PB', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 16, 'Paraná', 'PR', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 17, 'Pernambuco', 'PE', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 18, 'Piauí', 'PI', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 19, 'Rio de Janeiro', 'RJ', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 20, 'Rio Grande do Norte', 'RN', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 21, 'Rio Grande do Sul', 'RS', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 22, 'Rondônia', 'RO', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 23, 'Roraima', 'RR', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 24, 'Santa Catarina', 'SC', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 25, 'São Paulo', 'SP', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 26, 'Sergipe', 'SE', 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `bool_ativo_estado`) VALUES ( 27, 'Tocantins', 'TO', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: grupo
DROP TABLE IF EXISTS `grupo`;

CREATE TABLE IF NOT EXISTS `grupo` (
	`id_grupo` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_grupo` char(50) NOT NULL ,
	`data_atualizacao_grupo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11)  ,
	`bool_ativo_grupo` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 1, 'Automação e Controle', '2017-12-29 00:00:00', 1, 1);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 2, 'Cabos Atox', '2017-12-29 00:00:00', 1, 1);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 3, 'Canaletas e Acessórios', '2017-12-22 10:01:36', 1, 1);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 4, 'Chaves e Fusíveis', '2017-12-22 10:01:36', 1, 1);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 5, 'Conduletes e Caixas', '2017-12-22 10:01:36', 1, 1);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 6, 'Disjuntores', '2017-12-29 00:00:00', 1, 1);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 7, 'Eletrocalhas', '2017-12-29 00:00:00', 1, 1);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 8, 'Luminária Pública', '2017-12-29 00:00:00', 1, 1);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 9, 'Para-raio e Acessórios para Aterramento', '2017-12-22 10:01:36', 1, 1);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 10, 'Quadros de Comando', '2017-12-29 00:00:00', 1, 1);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 11, 'Teleinformática e Telefonia', '2017-12-22 10:01:36', 1, 1);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 12, 'Terminais', '2017-12-29 00:00:00', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: item
DROP TABLE IF EXISTS `item`;

CREATE TABLE IF NOT EXISTS `item` (
	`id_item` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_item` varchar(300) NOT NULL ,
	`descricao_site_item` varchar(300)  ,
	`unidade_medida_item` varchar(3)  ,
	`imagem_item` varchar(200) NOT NULL ,
	`grupo_id` int(11)  ,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_item` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 1, 'teste', 'teste', 'UN', 'Logotipo.jpg', 4, 1, 0);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 2, 'Cabos Atox', '', 'UN', 'cabo.jpg', 2, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 3, 'Chaves e Fusíveis', '', 'UN', 'fusiveis.jpg', 4, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 4, 'Luminária Pública', '', 'UN', 'luminarias.png', 8, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 5, 'Botões', 'Para seus projetos com tomadas de decisão entre outros', 'UN', 'botoes.jpg', 1, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 6, 'Chave Comutadora', '', 'UN', 'chave-comutadora.jpg', 1, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 7, 'Contator', 'Contator', 'UN', 'contator.jpg', 1, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 8, 'Contator', '', 'UN', 'contator.jpg', 7, 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 9, 'Cabo Atox', '', 'MT', 'cabo-atox.jpg', 2, 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: loja
DROP TABLE IF EXISTS `loja`;

CREATE TABLE IF NOT EXISTS `loja` (
	`id_loja` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_loja` varchar(100) NOT NULL ,
	`descricao_loja` varchar(100)  ,
	`imagem_loja` varchar(100)  ,
	`configurar_site_id` int(11) NOT NULL ,
	`data_atualizacao_loja` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_loja` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO loja ( `id_loja`, `titulo_loja`, `descricao_loja`, `imagem_loja`, `configurar_site_id`, `data_atualizacao_loja`, `bool_ativo_loja`) VALUES ( 1, 'A 60 anos armazenando seu café com a qualidade que só a CaféPoços possui!', '', '60.jpg', 1, '2018-01-12 15:42:43', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: posicao_cafe
DROP TABLE IF EXISTS `posicao_cafe`;

CREATE TABLE IF NOT EXISTS `posicao_cafe` (
	`id_posicao_cafe` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`cliente` int(11) NOT NULL ,
	`fazenda` varchar(200)  ,
	`cidade` varchar(200)  ,
	`insc_est` varchar(200)  ,
	`safra` varchar(50)  ,
	`lote` varchar(100)  ,
	`lote_cliente` varchar(100)  ,
	`entrada` datetime  ,
	`nfe_fiscal` varchar(10)  ,
	`padrao` varchar(200)  ,
	`preparo` varchar(50)  ,
	`kilos` float  ,
	`sacas` float  ,
	`per_umi` float  ,
	`per_imp` float  ,
	`per_cat` float  ,
	`per_def` float  ,
	`cert` varchar(200)  ,
	`data_atualizacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO posicao_cafe ( `id_posicao_cafe`, `cliente`, `fazenda`, `cidade`, `insc_est`, `safra`, `lote`, `lote_cliente`, `entrada`, `nfe_fiscal`, `padrao`, `preparo`, `kilos`, `sacas`, `per_umi`, `per_imp`, `per_cat`, `per_def`, `cert`, `data_atualizacao`) VALUES ( 1, 1, 'teste', 'teste', 'teste', '2013', 'teste', 'teste', '2018-01-19 00:00:00', '123', '', '', 13, 13, 2, 1, 1, 1, '', '2018-01-19 17:32:46');
INSERT INTO posicao_cafe ( `id_posicao_cafe`, `cliente`, `fazenda`, `cidade`, `insc_est`, `safra`, `lote`, `lote_cliente`, `entrada`, `nfe_fiscal`, `padrao`, `preparo`, `kilos`, `sacas`, `per_umi`, `per_imp`, `per_cat`, `per_def`, `cert`, `data_atualizacao`) VALUES ( 2, 1, 'teste', 'teste', 'teste', '2013', 'teste', 'teste', '2018-01-18 00:00:00', '53445', '', '', 14, 41, 1, 1, 1, , '', '2018-01-19 17:32:46');
INSERT INTO posicao_cafe ( `id_posicao_cafe`, `cliente`, `fazenda`, `cidade`, `insc_est`, `safra`, `lote`, `lote_cliente`, `entrada`, `nfe_fiscal`, `padrao`, `preparo`, `kilos`, `sacas`, `per_umi`, `per_imp`, `per_cat`, `per_def`, `cert`, `data_atualizacao`) VALUES ( 3, 1, 'teste', 'teste', 'teste', '2014', 'teste', 'teste', '2018-01-25 00:00:00', '45678', '', '', 32, 12, , , , , '', '2018-01-19 17:32:46');
INSERT INTO posicao_cafe ( `id_posicao_cafe`, `cliente`, `fazenda`, `cidade`, `insc_est`, `safra`, `lote`, `lote_cliente`, `entrada`, `nfe_fiscal`, `padrao`, `preparo`, `kilos`, `sacas`, `per_umi`, `per_imp`, `per_cat`, `per_def`, `cert`, `data_atualizacao`) VALUES ( 4, 1, 'teste2', 'teste', 'teste', '2014', 'teste', 'teste', '2018-01-18 00:00:00', '123432', '', '', 53, 43, , , , , '', '2018-01-19 17:32:46');
INSERT INTO posicao_cafe ( `id_posicao_cafe`, `cliente`, `fazenda`, `cidade`, `insc_est`, `safra`, `lote`, `lote_cliente`, `entrada`, `nfe_fiscal`, `padrao`, `preparo`, `kilos`, `sacas`, `per_umi`, `per_imp`, `per_cat`, `per_def`, `cert`, `data_atualizacao`) VALUES ( 5, 1, 'teste2', 'teste', 'teste', '2012', 'teste', 'teste', '2018-01-24 00:00:00', '123', '', '', 312, 2, , , , , '', '2018-01-19 17:32:46');
INSERT INTO posicao_cafe ( `id_posicao_cafe`, `cliente`, `fazenda`, `cidade`, `insc_est`, `safra`, `lote`, `lote_cliente`, `entrada`, `nfe_fiscal`, `padrao`, `preparo`, `kilos`, `sacas`, `per_umi`, `per_imp`, `per_cat`, `per_def`, `cert`, `data_atualizacao`) VALUES ( 6, 94352, '-', '', '', '2013/2014', '059209-1 -P', '', '2016-12-14 00:00:00', '002497', '', '17/19', 1980, 33, , , , , '', '2018-01-22 15:30:47');
INSERT INTO posicao_cafe ( `id_posicao_cafe`, `cliente`, `fazenda`, `cidade`, `insc_est`, `safra`, `lote`, `lote_cliente`, `entrada`, `nfe_fiscal`, `padrao`, `preparo`, `kilos`, `sacas`, `per_umi`, `per_imp`, `per_cat`, `per_def`, `cert`, `data_atualizacao`) VALUES ( 7, 94352, '-', '', '', '2013/2014', '059305-1 -P', '', '2017-01-31 00:00:00', '002541', '', 'SLD EMB', 150.3, 2.51, , 0, , , '', '2018-01-22 15:30:47');
INSERT INTO posicao_cafe ( `id_posicao_cafe`, `cliente`, `fazenda`, `cidade`, `insc_est`, `safra`, `lote`, `lote_cliente`, `entrada`, `nfe_fiscal`, `padrao`, `preparo`, `kilos`, `sacas`, `per_umi`, `per_imp`, `per_cat`, `per_def`, `cert`, `data_atualizacao`) VALUES ( 8, 94352, '-', '', '', '2013/2014', '059306-2 -P', '', '2017-02-01 00:00:00', '002542', '', 'SLD LIG', 40, 0.67, , 0, , , '', '2018-01-22 15:30:47');
INSERT INTO posicao_cafe ( `id_posicao_cafe`, `cliente`, `fazenda`, `cidade`, `insc_est`, `safra`, `lote`, `lote_cliente`, `entrada`, `nfe_fiscal`, `padrao`, `preparo`, `kilos`, `sacas`, `per_umi`, `per_imp`, `per_cat`, `per_def`, `cert`, `data_atualizacao`) VALUES ( 9, 94352, '-', '', '', '2016/2017', '058788-5 -P', '58237-A', '2016-09-21 00:00:00', '200030', '', 'B/C', 300, 5, 0, 0, , , '', '2018-01-22 15:30:47');
INSERT INTO posicao_cafe ( `id_posicao_cafe`, `cliente`, `fazenda`, `cidade`, `insc_est`, `safra`, `lote`, `lote_cliente`, `entrada`, `nfe_fiscal`, `padrao`, `preparo`, `kilos`, `sacas`, `per_umi`, `per_imp`, `per_cat`, `per_def`, `cert`, `data_atualizacao`) VALUES ( 10, 94352, '-', '', '', '2016/2017', '059158-A-P', '59153-A', '2016-12-01 00:00:00', '931182', '', 'B/C', 240, 4, 0, 0, , , '', '2018-01-22 15:30:47');



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: quem_somos
DROP TABLE IF EXISTS `quem_somos`;

CREATE TABLE IF NOT EXISTS `quem_somos` (
	`id_quem_somos` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_quem_somos` varchar(200) NOT NULL ,
	`descricao_quem_somos` text NOT NULL ,
	`imagem_quem_somos` varchar(100) NOT NULL ,
	`data_atualizacao_quem_somos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_quem_somos` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO quem_somos ( `id_quem_somos`, `titulo_quem_somos`, `descricao_quem_somos`, `imagem_quem_somos`, `data_atualizacao_quem_somos`, `bool_ativo_quem_somos`) VALUES ( 1, 'Sobre a Café Poços', '<br><br>
FUNDAÇÃO:<br>
Nos idos de 1959. quando a cafeicultura vivia uma fase muito crítica e os cafeicultores isolados. sem representatividade política. dependiam da intermediação de terceiros para a venda de seus produtos. sofrendo assim. total domínio por parte do comércio. As dificuldades daquele momento. fez com que os produtores se reunissem. concluindo que a melhor idéia seria criar uma organização cooperativista capaz de eliminar ou minimizar os problemas de todos. Onde a pessoa humana fosse respeitada e desde que a organização fosse capaz de orienta-los e engrandece-los. dentro de um sistema de maior justiça social. Este movimento. da cafeicultura. iniciado em Ribeirão Preto-SP. por ser. na época. o pólo cafeeiro mais importante do país. rapidamente difundiu-se nas regiões produtoras. Em POÇOS DE CALDAS. o movimento evoluiu e. em 20 DE JULHO DE 1.959. às 10:00 horas. produtores mineiros e paulistas. reunidos na sede da Associação Comercial de Poços de Caldas. fundaram a COOPERATIVA REGIONAL DOS CAFEICULTORES DE POÇOS DE CALDAS. com a sigla CAFÉPOÇOS. liderada pelos cafeicultores Joaquim Bernardes de Carvalho Dias. Ronaldo Loyolla Junqueira e Suelly Evandro Amarante. respectivamente Diretor Presidente. Diretor Gerente e Diretor Secretário. e pelos primeiros Conselheiros Administrativos. senhores Hermínio Lopes da Silva. José Affonso Junqueira de Barros Cobra. Manoel Ignácio Junqueira e Sebastião Ozório dos Reis. 
<br><br><br>

ÁREA DE AÇÃO INICIAL:<br>
Naquela época. a área de ação para admissão de associados limitava-se aos municípios de Poços de Caldas. Andradas. Botelhos. Cabo Verde. Campestre. Guaranésia e Machado em Minas Gerais. mais os de Águas da Prata. Caconde. Divinolândia e São Sebastião da Grama. do estado de São Paulo. 
<br><br><br>

FUNDADORES:<br>
Os fundadores da Cooperativa foram 81 produtores. de Minas Gerais e de São Paulo. 

<br><br><br>
TERRENO PRÓPRIO NA FUNDAÇÃO:<br>
Terreno de 7.660 m2. Nossa História', '2.jpg', '2018-01-20 09:52:29', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: relatorio_tabela
DROP TABLE IF EXISTS `relatorio_tabela`;

CREATE TABLE IF NOT EXISTS `relatorio_tabela` (
	`id_relatorio_tabela` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_relatorio_tabela` varchar(200) NOT NULL ,
	`data_atualizacao_relatorio_tabela` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_relatorio_tabela` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO relatorio_tabela ( `id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES ( 1, 'cliefornec', '2018-01-24 14:48:03', 1);
INSERT INTO relatorio_tabela ( `id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES ( 2, 'contato', '2018-01-24 14:48:03', 1);
INSERT INTO relatorio_tabela ( `id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES ( 3, 'teste_grade', '2018-01-24 14:48:04', 1);
INSERT INTO relatorio_tabela ( `id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES ( 4, 'videos', '2018-01-24 14:48:04', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: relatorios
DROP TABLE IF EXISTS `relatorios`;

CREATE TABLE IF NOT EXISTS `relatorios` (
	`id_relatorios` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_relatorios` varchar(200) NOT NULL ,
	`tabela_relatorios` varchar(200) NOT NULL ,
	`colunas_relatorios` text NOT NULL ,
	`colunas_estrangeiras_relatorios` text NOT NULL ,
	`colunas_filtro_relatorios` text  ,
	`bool_filtro_ativo_relatorios` int(1) NOT NULL DEFAULT 1 ,
	`data_atualizacao_relatorios` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_emitir_relatorios` int(1) NOT NULL DEFAULT 0 ,
	`bool_ativo_relatorios` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO relatorios ( `id_relatorios`, `descricao_relatorios`, `tabela_relatorios`, `colunas_relatorios`, `colunas_estrangeiras_relatorios`, `colunas_filtro_relatorios`, `bool_filtro_ativo_relatorios`, `data_atualizacao_relatorios`, `usuario_id`, `bool_emitir_relatorios`, `bool_ativo_relatorios`) VALUES ( 4, 'Relatorio de Link de Videos do YouTube', 'videos', 'descricao_videos+link_videos+data_atualizacao_videos', '', '', 1, '2018-01-19 16:03:00', 1, 0, 1);
INSERT INTO relatorios ( `id_relatorios`, `descricao_relatorios`, `tabela_relatorios`, `colunas_relatorios`, `colunas_estrangeiras_relatorios`, `colunas_filtro_relatorios`, `bool_filtro_ativo_relatorios`, `data_atualizacao_relatorios`, `usuario_id`, `bool_emitir_relatorios`, `bool_ativo_relatorios`) VALUES ( 5, 'Relatório de Estados', 'estado', 'descricao_estado+sigla_estado', '', '', 1, '2018-01-18 17:28:59', 1, 0, 1);
INSERT INTO relatorios ( `id_relatorios`, `descricao_relatorios`, `tabela_relatorios`, `colunas_relatorios`, `colunas_estrangeiras_relatorios`, `colunas_filtro_relatorios`, `bool_filtro_ativo_relatorios`, `data_atualizacao_relatorios`, `usuario_id`, `bool_emitir_relatorios`, `bool_ativo_relatorios`) VALUES ( 7, 'Relatório de Clientes', 'cliefornec', 'CPF_CGC+RAZAOSOCIAL', '', '', 1, '2018-01-19 16:27:36', 1, 0, 1);
INSERT INTO relatorios ( `id_relatorios`, `descricao_relatorios`, `tabela_relatorios`, `colunas_relatorios`, `colunas_estrangeiras_relatorios`, `colunas_filtro_relatorios`, `bool_filtro_ativo_relatorios`, `data_atualizacao_relatorios`, `usuario_id`, `bool_emitir_relatorios`, `bool_ativo_relatorios`) VALUES ( 20, 'Relatório de Contatos', 'contato', 'nome_contato+email_contato+telefone_contato', 'contato_tr_usuario_tr_nome_usuario', ' AND (usuario.nome_usuario LIKE \'%Site%\')', 1, '2018-01-24 14:52:28', 1, 0, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: saiba_mais
DROP TABLE IF EXISTS `saiba_mais`;

CREATE TABLE IF NOT EXISTS `saiba_mais` (
	`id_saiba_mais` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_saiba_mais` varchar(200) NOT NULL ,
	`usuario_id` int(11) NOT NULL ,
	`data_atualizacao_saiba_mais` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_saiba_mais` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO saiba_mais ( `id_saiba_mais`, `descricao_saiba_mais`, `usuario_id`, `data_atualizacao_saiba_mais`, `bool_ativo_saiba_mais`) VALUES ( 1, 'Saiba Mais Sobre a CaféPoços!', 1, '2018-01-13 09:49:25', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: site
DROP TABLE IF EXISTS `site`;

CREATE TABLE IF NOT EXISTS `site` (
	`ID_SITE` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`NOME_EMPRESA` varchar(100)  ,
	`NOME_CIDADE` varchar(100)  ,
	`ESTADO` char(2)  ,
	`FONE` varchar(14)  ,
	`FONE_APP` varchar(14)  ,
	`EMAIL` varchar(100)  ,
	`sendusername` varchar(255)  ,
	`sendpassword` varchar(255)  ,
	`smtpserver` varchar(255)  ,
	`smtpserverport` int(11)  ,
	`MailFrom` varchar(255)  ,
	`MailTo` varchar(255)  ,
	`MailCc` varchar(255)  ,
	`bool_ativo_site` int(1)  DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO site ( `ID_SITE`, `NOME_EMPRESA`, `NOME_CIDADE`, `ESTADO`, `FONE`, `FONE_APP`, `EMAIL`, `sendusername`, `sendpassword`, `smtpserver`, `smtpserverport`, `MailFrom`, `MailTo`, `MailCc`, `bool_ativo_site`) VALUES ( 1, 'CaféPoços', 'Poços de Caldas', 'MG', '(35) 3722-1250', '', 'cdi@cdiinfo.com.br', 'thiago@cdiinfo.com.br', 'Cdidesenv03@', 'mail.cdiinfo.com.br', 465, 'thiago@cdiinfo.com.br', 'thiago.cdi@Hotmail.com', 'cdiinfo.suporte@gmail.com', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: slide_show
DROP TABLE IF EXISTS `slide_show`;

CREATE TABLE IF NOT EXISTS `slide_show` (
	`id_slide_show` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_slide_show` varchar(100)  ,
	`descricao_slide_show` varchar(200)  ,
	`imagem_slide_show` varchar(100) NOT NULL ,
	`configurar_site_id` int(11) NOT NULL ,
	`data_atualizacao_slide_show` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_slide_show` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO slide_show ( `id_slide_show`, `titulo_slide_show`, `descricao_slide_show`, `imagem_slide_show`, `configurar_site_id`, `data_atualizacao_slide_show`, `bool_ativo_slide_show`) VALUES ( 1, 'ARMAZENAMENTO', 'Aqui você deposita seu café e a sua confiança! Seu café muito bem protegido e armazenado.', 'fundo1.jpeg', 1, '2018-01-12 15:31:06', 1);
INSERT INTO slide_show ( `id_slide_show`, `titulo_slide_show`, `descricao_slide_show`, `imagem_slide_show`, `configurar_site_id`, `data_atualizacao_slide_show`, `bool_ativo_slide_show`) VALUES ( 2, 'CERTIFICAÇÕES', 'Nossos cafés possuem as melhores certificações internacionais.', 'fundo2.jpg', 1, '2018-01-12 15:31:32', 1);
INSERT INTO slide_show ( `id_slide_show`, `titulo_slide_show`, `descricao_slide_show`, `imagem_slide_show`, `configurar_site_id`, `data_atualizacao_slide_show`, `bool_ativo_slide_show`) VALUES ( 3, 'SUSTENTABILIDADE', 'Sustentabilidade. proteção ambiental e responsabilidade social', 'fundo3.jpg', 1, '2018-01-12 15:36:08', 1);
INSERT INTO slide_show ( `id_slide_show`, `titulo_slide_show`, `descricao_slide_show`, `imagem_slide_show`, `configurar_site_id`, `data_atualizacao_slide_show`, `bool_ativo_slide_show`) VALUES ( 4, 'Teste', 'teste', 'loja.png', 1, '2018-01-05 14:34:57', 0);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: teste
DROP TABLE IF EXISTS `teste`;

CREATE TABLE IF NOT EXISTS `teste` (
	`id_teste` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_teste` varchar(200) NOT NULL ,
	`data_atualizacao_teste` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_teste` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO teste ( `id_teste`, `descricao_teste`, `data_atualizacao_teste`, `usuario_id`, `bool_ativo_teste`) VALUES ( 1, 'teste', '2018-01-22 10:07:17', 1, 1);
INSERT INTO teste ( `id_teste`, `descricao_teste`, `data_atualizacao_teste`, `usuario_id`, `bool_ativo_teste`) VALUES ( 2, 'Teste 2', '2018-01-22 10:16:00', 1, 1);
INSERT INTO teste ( `id_teste`, `descricao_teste`, `data_atualizacao_teste`, `usuario_id`, `bool_ativo_teste`) VALUES ( 3, 'Teste 3', '2018-01-22 10:16:05', 1, 1);
INSERT INTO teste ( `id_teste`, `descricao_teste`, `data_atualizacao_teste`, `usuario_id`, `bool_ativo_teste`) VALUES ( 4, 'Teste 4', '2018-01-22 10:16:10', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: teste_grade
DROP TABLE IF EXISTS `teste_grade`;

CREATE TABLE IF NOT EXISTS `teste_grade` (
	`id_teste_grade` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_teste_grade` varchar(200) NOT NULL ,
	`teste_id` int(200) NOT NULL ,
	`data_atualizacao_teste_grade` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_teste_grade` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO teste_grade ( `id_teste_grade`, `descricao_teste_grade`, `teste_id`, `data_atualizacao_teste_grade`, `usuario_id`, `bool_ativo_teste_grade`) VALUES ( 1, 'teste', 1, '2018-01-22 10:07:24', 1, 1);
INSERT INTO teste_grade ( `id_teste_grade`, `descricao_teste_grade`, `teste_id`, `data_atualizacao_teste_grade`, `usuario_id`, `bool_ativo_teste_grade`) VALUES ( 2, 'teste 2', 1, '2018-01-22 10:08:23', 1, 1);
INSERT INTO teste_grade ( `id_teste_grade`, `descricao_teste_grade`, `teste_id`, `data_atualizacao_teste_grade`, `usuario_id`, `bool_ativo_teste_grade`) VALUES ( 3, 'Teste grade 2', 2, '2018-01-22 10:17:20', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: topicos_loja
DROP TABLE IF EXISTS `topicos_loja`;

CREATE TABLE IF NOT EXISTS `topicos_loja` (
	`id_topicos_loja` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_topicos_loja` varchar(100) NOT NULL ,
	`descricao_topicos_loja` varchar(100) NOT NULL ,
	`loja_id` int(11) NOT NULL ,
	`data_atualizacao_topicos_loja` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_topicos_loja` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO topicos_loja ( `id_topicos_loja`, `titulo_topicos_loja`, `descricao_topicos_loja`, `loja_id`, `data_atualizacao_topicos_loja`, `bool_ativo_topicos_loja`) VALUES ( 1, 'Endereço', 'Av. João Pinheiro. 757. Poços de Caldas. MG', 1, '2018-01-12 15:42:48', 0);
INSERT INTO topicos_loja ( `id_topicos_loja`, `titulo_topicos_loja`, `descricao_topicos_loja`, `loja_id`, `data_atualizacao_topicos_loja`, `bool_ativo_topicos_loja`) VALUES ( 2, 'Telefone', '(35) 3722-1250 ', 1, '2018-01-12 15:42:51', 0);
INSERT INTO topicos_loja ( `id_topicos_loja`, `titulo_topicos_loja`, `descricao_topicos_loja`, `loja_id`, `data_atualizacao_topicos_loja`, `bool_ativo_topicos_loja`) VALUES ( 3, 'Horário', 'Segunda - Sexta · 07:30–18:00', 1, '2018-01-12 14:13:32', 0);
INSERT INTO topicos_loja ( `id_topicos_loja`, `titulo_topicos_loja`, `descricao_topicos_loja`, `loja_id`, `data_atualizacao_topicos_loja`, `bool_ativo_topicos_loja`) VALUES ( 4, 'E-mail', 'camara@cafepocos.com.br', 1, '2018-01-12 15:42:53', 0);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: upload_arq
DROP TABLE IF EXISTS `upload_arq`;

CREATE TABLE IF NOT EXISTS `upload_arq` (
	`id_upload_arq` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_upload_arq` varchar(100) NOT NULL ,
	`tipo_upload_arq` varchar(100) NOT NULL ,
	`data_atualizacaoupload_arq` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_upload_arq` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 32, 'Logo_cafe_pocos.png', 'imagem', '2018-01-12 13:15:25', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 34, 'fundo2.jpg', 'imagem', '2018-01-12 13:17:10', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 35, 'fundo3.jpg', 'imagem', '2018-01-12 13:17:24', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 36, 'adubo.jpg', 'imagem', '2018-01-12 13:40:12', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 37, 'defensivo.png', 'imagem', '2018-01-12 13:40:47', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 38, 'ferramentas.jpg', 'imagem', '2018-01-12 13:41:03', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 42, '2.jpg', 'imagem', '2018-01-12 15:44:14', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 45, 'Video1.mp4', 'video', '2018-01-13 11:09:34', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 54, 'Logotipo.JPG', 'imagem', '2018-01-15 13:39:46', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 55, 'coffeeshop1.jpg', 'imagem', '2018-01-15 13:39:48', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 56, 'fundo1.jpeg', 'imagem', '2018-01-15 13:39:49', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 57, '60.jpg', 'imagem', '2018-01-15 13:46:56', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 59, 'Kalimba.mp3', 'audio', '2018-01-15 14:47:11', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 61, 'descobrir_porta.txt', 'texto', '2018-01-15 16:56:49', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 62, 'Teste_Orcamento_Por_PDF.pdf', 'texto', '2018-01-15 17:18:44', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 63, 'Blend_Natural_cafepocoscafe.jpg', 'imagem', '2018-01-15 17:50:42', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 64, 'LogotipoOrignal.JPG', 'imagem', '2018-01-17 13:10:44', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 65, 'LogotipoOrignalSemCorte.JPG', 'imagem', '2018-01-19 16:45:00', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: usuario
DROP TABLE IF EXISTS `usuario`;

CREATE TABLE IF NOT EXISTS `usuario` (
	`id_usuario` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`nome_usuario` varchar(200)  ,
	`login_usuario` char(3)  ,
	`senha_usuario` varchar(100)  ,
	`bool_ativo_usuario` int(1)  DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO usuario ( `id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `bool_ativo_usuario`) VALUES ( 1, 'ADMINISTRADOR', 'ADM', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 1);
INSERT INTO usuario ( `id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `bool_ativo_usuario`) VALUES ( 3, 'Site', 'Sit', '*68922D0185D8333DA80D814C32E5A04C28CC06D0', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: videos
DROP TABLE IF EXISTS `videos`;

CREATE TABLE IF NOT EXISTS `videos` (
	`id_videos` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_videos` text NOT NULL ,
	`link_videos` varchar(200) NOT NULL ,
	`data_atualizacao_videos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_videos` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO videos ( `id_videos`, `descricao_videos`, `link_videos`, `data_atualizacao_videos`, `bool_ativo_videos`) VALUES ( 1, ' ', 'https://www.youtube.com/watch?v=wNBOw5TpJbw', '2018-01-12 13:29:38', 1);
INSERT INTO videos ( `id_videos`, `descricao_videos`, `link_videos`, `data_atualizacao_videos`, `bool_ativo_videos`) VALUES ( 2, ' ', 'https://www.youtube.com/watch?v=KNyUXgiVHMg', '2018-01-12 13:29:55', 1);