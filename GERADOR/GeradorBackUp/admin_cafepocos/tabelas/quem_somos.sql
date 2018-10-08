
-- Criar tabela quem_somos
-- Gerando em: 01/08/2018 16:53:39
-- Pelo Gerador JK-19

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
Terreno de 7.660 m2. Nossa História', '2.jpg', '2018-01-20 09:52:29', 1
);