
-- Criar tabela adicional_site
-- Gerando em: 01/08/2018 16:53:37
-- Pelo Gerador JK-19

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
Porque, para nós, café de verdade tem que ser excelente.', 'Blend_Natural_cafepocoscafe.jpg', 1, 1, '2018-01-13 09:46:25', 1
);
INSERT INTO adicional_site ( `id_adicional_site`, `titulo_adicional_site`, `descricao_adicional_site`, `imagem_adicional_site`, `saiba_mais_id`, `usuario_id`, `data_atualizacao_adicional_site`, `bool_ativo_adicional_site`) VALUES ( 2, 'CaféPoços<br>A União dos Melhores Cafés!!!', 'Em parceria com o produtor, procuramos o desenvolvimento e o crescimento da cafeicultura de Poços de Caldas e região ao prestarmos serviços em diversas áreas fundamentais ao benefício dos cafés e ao promovermos concursos e eventos para a divulgação e valorização da qualidade de nossos cafés.<br>
A CaféPoços busca reunir os melhores cafés da Região de Poços de Caldas, que por sua altitude, relevo montanhoso e características vulcânicas singulares, proporcionam uma acidez controlada balanceada com uma doçura característica, oferecendo cafés únicos e altamente apreciados no Brasil e no exterior.', 'LogotipoOrignalSemCorte.JPG', 1, 1, '2018-01-20 08:16:20', 1
);
INSERT INTO adicional_site ( `id_adicional_site`, `titulo_adicional_site`, `descricao_adicional_site`, `imagem_adicional_site`, `saiba_mais_id`, `usuario_id`, `data_atualizacao_adicional_site`, `bool_ativo_adicional_site`) VALUES ( 3, 'Teste', 'teste', 'Logotipo.JPG', 1, 1, '2018-01-15 17:24:52', 0
);