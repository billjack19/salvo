
-- Backup Geral
-- Gerando em: 02/08/2018 11:00:40
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
INSERT INTO adicional_site ( `id_adicional_site`, `titulo_adicional_site`, `descricao_adicional_site`, `imagem_adicional_site`, `saiba_mais_id`, `usuario_id`, `data_atualizacao_adicional_site`, `bool_ativo_adicional_site`) VALUES ( 1, 'Prêmios Top of Mind Brazil', 'Considerado hoje como o mais importante prêmio de marketing editado no Brasil, o Top of Mind Brazil tem aprimorado suas técnicas de coleta 
e análise de dados para que seus resultados sejam cada vez mais fiéis às tendências de mercado. 
<br><br>
O INBRAP sabe de suas responsabilidades para com o Brasil, e por isso, instituiu o Prêmio Top of Mind Brazil, concedido anualmente àquelas 
empresas, entidades e profissionais que realmente fazem a diferença e tem como objetivo reconhecer, distinguir e premiar a gestão de 
empresas e instituições que se destacam no mercado brasileiro, cuja excelência na qualidade de seus produtos ou serviços contribuem 
efetivamente para o desenvolvimento sócio-econômico do pais, valorizando sobretudo a pessoa humana e os princípios éticos que devem 
reger a sociedade brasileira.
<br><br>
O prêmio Top of Mind Brazil é o resultado de uma proposta erguida sobre sólidas bases de análise mercadológica em consonância com os 
mais modernos modelos de gestão utilizados pelas mais importantes premiações internacionais.
<br><br>
Para saber mais detalhes do Prêmio Top of Mind Brazil consulte o site: 
<a href=\'http://www.ibrap.com.br\' target=\'_blank\'>www.ibrap.com.br</a>', 'top_of_mind_brazil.jpg', 1, 1, '2018-07-13 10:18:11', 1);
INSERT INTO adicional_site ( `id_adicional_site`, `titulo_adicional_site`, `descricao_adicional_site`, `imagem_adicional_site`, `saiba_mais_id`, `usuario_id`, `data_atualizacao_adicional_site`, `bool_ativo_adicional_site`) VALUES ( 2, 'Prêmio IMEC 2010', 'O Prêmio IMEC, há 20 anos, destaca profissionais e empresas que atuam corretamente na área de Engenharia e seu objetivo é dar mais 
credibilidade aos premiados dentro do mercado da construção civil.
<br><br>
São eleitos fornecedores de produtos e serviços, pessoas físicas e jurídicas, que tenham contribuído, de forma significativa, para a cultura, 
economia e, em particular, para o desenvolvimento da Engenharia.
<br><br>
A SJT Construtora e Incorporadora Ltda. foi uma das empresas conceituadas e reconhecidas neste ramo a receber o Prêmio IMEC 2010,
em função da qualidade de seus empreendimentos, seriedade em seu trabalho, comprometimento com o meio ambiente e preocupação com o
bem-estar de seus moradores.
<br><br>
Para saber mais detalhes do Prêmio IMEC 2010 consulte o site: 
<a href=\'http://www.premioimec.com.br\' target=\'_blank\'>www.premioimec.com.br</a>', 'premio_imec_2010.png', 1, 1, '2018-07-13 10:17:55', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: area_nivel_acesso
DROP TABLE IF EXISTS `area_nivel_acesso`;

CREATE TABLE IF NOT EXISTS `area_nivel_acesso` (
	`id_area_nivel_acesso` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`area_area_nivel_acesso` varchar(200) NOT NULL ,
	`demostrativo_area_nivel_acesso` varchar(200) NOT NULL ,
	`bool_list_area_nivel_acesso` int(1) NOT NULL DEFAULT 1 ,
	`bool_insert_area_nivel_acesso` int(1) NOT NULL DEFAULT 1 ,
	`bool_update_area_nivel_acesso` int(1) NOT NULL DEFAULT 1 ,
	`nivel_acesso_id` int(11) NOT NULL ,
	`data_atualizacao_area_nivel_acesso` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_area_nivel_acesso` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 266, 'adicional_site-saiba_mais', 'Adicional Site - Saiba Mais', 1, 1, 1, 2, '2018-07-26 10:04:01', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 267, 'configurar_site', 'Configurar Site', 1, 1, 1, 2, '2018-07-26 10:04:01', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 268, 'contato', 'Contato', 1, 1, 1, 2, '2018-07-26 10:04:01', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 269, 'destaque_grupo-configurar_site', 'Destaque Grupo - Configurar Site', 1, 1, 1, 2, '2018-07-26 10:04:01', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 270, 'endereco_site-configurar_site', 'Endereço Site - Configurar Site', 1, 1, 1, 2, '2018-07-26 10:04:01', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 271, 'fotos-item', 'Fotos - Item', 1, 1, 1, 2, '2018-07-26 10:04:02', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 272, 'grupo', 'Grupo', 1, 1, 1, 2, '2018-07-26 10:04:02', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 273, 'item', 'Item', 1, 1, 1, 2, '2018-07-26 10:04:02', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 274, 'loja-configurar_site', 'Loja - Configurar Site', 1, 1, 1, 2, '2018-07-26 10:04:02', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 275, 'new_sjt', 'New Sjt', 1, 1, 1, 2, '2018-07-26 10:04:02', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 276, 'paginas-new_sjt', 'Páginas - New Sjt', 1, 1, 1, 2, '2018-07-26 10:04:03', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 277, 'quem_somos', 'Quem Somos', 1, 1, 1, 2, '2018-07-26 10:04:03', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 278, 'saiba_mais', 'Saiba Mais', 1, 1, 1, 2, '2018-07-26 10:04:03', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 279, 'situacao', 'Situação', 1, 1, 1, 2, '2018-07-26 10:04:03', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 280, 'slide_show-configurar_site', 'Slide Show - Configurar Site', 1, 1, 1, 2, '2018-07-26 10:04:03', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 281, 'topicos_loja-loja', 'Tópicos Loja - Loja', 1, 1, 1, 2, '2018-07-26 10:04:04', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 282, 'upload', 'Upload', 1, 1, 1, 2, '2018-07-26 10:04:04', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 283, 'videos', 'Videos', 1, 1, 1, 2, '2018-07-26 10:04:04', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 337, 'configurar_site', 'Configurar Site', 1, 1, 1, 1, '2018-07-27 14:37:18', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 338, 'contato', 'Contato', 1, 1, 1, 1, '2018-07-27 14:37:18', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 339, 'grupo', 'Grupo', 1, 1, 1, 1, '2018-07-27 14:37:18', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 340, 'item', 'Item', 1, 1, 1, 1, '2018-07-27 14:37:18', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 341, 'new_sjt', 'New Sjt', 1, 1, 1, 1, '2018-07-27 14:37:18', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 342, 'quem_somos', 'Quem Somos', 1, 1, 1, 1, '2018-07-27 14:37:18', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 343, 'saiba_mais', 'Saiba Mais', 1, 1, 1, 1, '2018-07-27 14:37:19', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 344, 'situacao', 'Situação', 1, 1, 1, 1, '2018-07-27 14:37:19', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 345, 'videos', 'Videos', 1, 1, 1, 1, '2018-07-27 14:37:19', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 346, 'orcamento-cliente_site', 'Orçamento - Cliente Site', 1, 1, 1, 1, '2018-07-27 14:37:19', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 347, 'item_orcamento-orcamento', 'Item Orçamento - Orçamento', 1, 1, 1, 1, '2018-07-27 14:37:19', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 348, 'cards-configurar_site', 'Cards - Configurar Site', 1, 1, 1, 1, '2018-07-27 14:37:19', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 349, 'destaque_grupo-configurar_site', 'Destaque Grupo - Configurar Site', 1, 1, 1, 1, '2018-07-27 14:37:19', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 350, 'endereco_site-configurar_site', 'Endereço Site - Configurar Site', 1, 1, 1, 1, '2018-07-27 14:37:19', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 351, 'slide_show-configurar_site', 'Slide Show - Configurar Site', 1, 1, 1, 1, '2018-07-27 14:37:19', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 352, 'loja-configurar_site', 'Loja - Configurar Site', 1, 1, 1, 1, '2018-07-27 14:37:19', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 353, 'topicos_loja-loja', 'Tópicos Loja - Loja', 1, 1, 1, 1, '2018-07-27 14:37:19', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 354, 'adicional_site-saiba_mais', 'Adicional Site - Saiba Mais', 1, 1, 1, 1, '2018-07-27 14:37:19', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 355, 'paginas-new_sjt', 'Páginas - New Sjt', 1, 1, 1, 1, '2018-07-27 14:37:20', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 356, 'fotos-item', 'Fotos - Item', 1, 1, 1, 1, '2018-07-27 14:37:20', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 357, 'item-grupo', 'Item - Grupo', 1, 1, 1, 1, '2018-07-27 14:37:20', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 358, 'upload', 'Upload', 1, 1, 1, 1, '2018-07-27 14:37:20', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 359, 'mapa', 'Mapa', 1, 1, 1, 1, '2018-07-27 14:37:20', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 360, 'mov', 'Mov', 1, 1, 1, 1, '2018-07-27 14:37:20', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 361, 'relatorio', 'Relatório', 1, 1, 1, 1, '2018-07-27 14:37:20', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 362, 'notificacao', 'Notificação', 1, 1, 1, 1, '2018-07-27 14:37:20', 1, 1);
INSERT INTO area_nivel_acesso ( `id_area_nivel_acesso`, `area_area_nivel_acesso`, `demostrativo_area_nivel_acesso`, `bool_list_area_nivel_acesso`, `bool_insert_area_nivel_acesso`, `bool_update_area_nivel_acesso`, `nivel_acesso_id`, `data_atualizacao_area_nivel_acesso`, `usuario_id`, `bool_ativo_area_nivel_acesso`) VALUES ( 363, 'usuario', 'Usuário', 1, 1, 1, 1, '2018-07-27 14:37:20', 1, 1);



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
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_cards` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `usuario_id`, `bool_ativo_cards`) VALUES ( 1, '2005/2006 e 2006/2007', 'Prêmio Top of Mind Brazil', 'trofeu.png', 1, '2018-07-18 08:14:12', 1, 0);
INSERT INTO cards ( `id_cards`, `titulo_cards`, `descricao_cards`, `imagem_cards`, `configurar_site_id`, `data_atualizacao_cards`, `usuario_id`, `bool_ativo_cards`) VALUES ( 2, 'STJ NEWS', 'Novidades, destaques, acabamentos, em construção. Confira no nosso jornal.', '57.jpg', 1, '2018-07-18 08:14:15', 1, 0);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: cliente_site
DROP TABLE IF EXISTS `cliente_site`;

CREATE TABLE IF NOT EXISTS `cliente_site` (
	`id_cliente_site` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`nome_cliente_site` varchar(200) NOT NULL ,
	`login_cliente_site` varchar(200) NOT NULL ,
	`senha_cliente_site` varchar(200) NOT NULL ,
	`telefone_cliente_site` varchar(30) NOT NULL ,
	`celular_cliente_site` varchar(30)  ,
	`endereco_cliente_site` varchar(500)  ,
	`numero_cliente_site` int(11)  ,
	`complemento_cliente_site` varchar(200)  ,
	`bairro_cliente_site` varchar(200)  ,
	`cidade_cliente_site` varchar(200)  ,
	`estado_id` int(11)  ,
	`cep_cliente_site` varchar(30)  ,
	`data_atualizacao_cliente_site` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11)  ,
	`bool_ativo_cliente_site` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: configurar_site
DROP TABLE IF EXISTS `configurar_site`;

CREATE TABLE IF NOT EXISTS `configurar_site` (
	`id_configurar_site` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_configurar_site` varchar(100) NOT NULL ,
	`titulo_menu_configurar_site` varchar(100) NOT NULL ,
	`cor_pagina_configurar_site` varchar(100) NOT NULL ,
	`contra_cor_pagina_configurar_site` varchar(100) NOT NULL ,
	`imagem_icone_configurar_site` varchar(100) NOT NULL ,
	`imagem_logo_configurar_site` varchar(100) NOT NULL ,
	`data_atualizacao_configurar_site` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_configurar_site` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO configurar_site ( `id_configurar_site`, `titulo_configurar_site`, `titulo_menu_configurar_site`, `cor_pagina_configurar_site`, `contra_cor_pagina_configurar_site`, `imagem_icone_configurar_site`, `imagem_logo_configurar_site`, `data_atualizacao_configurar_site`, `usuario_id`, `bool_ativo_configurar_site`) VALUES ( 1, 'SJT CONSTRUTORA E INCORPORADORA', ' ', 'white; /* #1E90FF; */', 'black;', 'logoSm.png', 'logoSemFundo.png', '2018-07-19 13:31:03', 1, 1);



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
INSERT INTO contato ( `id_contato`, `nome_contato`, `email_contato`, `telefone_contato`, `assunto_contato`, `mensagem_contato`, `usuario_id`, `data_atualizacao_contato`, `bool_ativo_contato`) VALUES ( 1, 'Jack', 'jackmailteste@gmail.com', 'teste', 'Formulario de Contato - Site SJT Construtora', 'Teste formulario de contato SJT', 2, '2018-07-25 09:51:02', 1);
INSERT INTO contato ( `id_contato`, `nome_contato`, `email_contato`, `telefone_contato`, `assunto_contato`, `mensagem_contato`, `usuario_id`, `data_atualizacao_contato`, `bool_ativo_contato`) VALUES ( 2, 'Jack', 'jackmailteste@gmail.com', 'teste', 'Formulario de Contato - Site SJT CONSTRUTORA E INCORPORADORA', 'Teste', 2, '2018-07-25 09:59:24', 1);



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
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_destaque_grupo` int(1) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO destaque_grupo ( `id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `usuario_id`, `bool_ativo_destaque_grupo`) VALUES ( 1, 'Casas Residenciais', 1, 'residenncial.png', '', 1, '2018-07-13 16:39:25', 1, 1);
INSERT INTO destaque_grupo ( `id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `usuario_id`, `bool_ativo_destaque_grupo`) VALUES ( 2, 'Condomínios', 2, 'condominio.png', '', 1, '2018-07-13 16:39:37', 1, 1);
INSERT INTO destaque_grupo ( `id_destaque_grupo`, `titulo_destaque_grupo`, `grupo_id`, `imagem_destaque_grupo`, `descricao_destaque_grupo`, `configurar_site_id`, `data_atualizacao_destaque_grupo`, `usuario_id`, `bool_ativo_destaque_grupo`) VALUES ( 3, 'Terrenos', 3, 'terreno.jpg', '', 1, '2018-07-27 09:01:46', 1, 1);



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


-- Dados da tabela: Nenhum registro



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
	`horario_funcionamento_endereco_site` text NOT NULL ,
	`latitude_endereco_site` varchar(100) NOT NULL ,
	`longitude_endereco_site` varchar(100) NOT NULL ,
	`configurar_site_id` int(11) NOT NULL ,
	`data_atualizacao_endereco_site` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_endereco_site` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO endereco_site ( `id_endereco_site`, `descricao_endereco_site`, `endereco_endereco_site`, `numero_endereco_site`, `complemento_endereco_site`, `bairro_endereco_site`, `cidade_endereco_site`, `estado_id`, `cep_endereco_site`, `telefone_endereco_site`, `celular_endereco_site`, `email_endereco_site`, `horario_funcionamento_endereco_site`, `latitude_endereco_site`, `longitude_endereco_site`, `configurar_site_id`, `data_atualizacao_endereco_site`, `usuario_id`, `bool_ativo_endereco_site`) VALUES ( 1, 'SJT Construtora', 'Rua. Dr. Agostinho de Souza Lima', 149, '', 'Aparecida', 'Poços de Caldas', 13, '37701-126', '(35) 3721-6494', '', 'sjtconst@veloxmail.com.br', 'Segunda a Sexta: 8h as 17h30', '-21.7889276', '-46.5599226', 1, '2018-07-12 16:17:00', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: estado
DROP TABLE IF EXISTS `estado`;

CREATE TABLE IF NOT EXISTS `estado` (
	`id_estado` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_estado` varchar(100) NOT NULL ,
	`sigla_estado` char(2) NOT NULL ,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_estado` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 1, 'Acre', 'AC', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 2, 'Alagoas', 'AL', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 3, 'Amapá', 'AP', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 4, 'Amazonas', 'AM', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 5, 'Bahia', 'BA', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 6, 'Ceará', 'CE', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 7, 'Distrito Federal', 'DF', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 8, 'Espírito Santo', 'ES', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 9, 'Goiás', 'GO', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 10, 'Maranhão', 'MA', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 11, 'Mato Grosso', 'MT', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 12, 'Mato Grosso do Sul', 'MS', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 13, 'Minas Gerais', 'MG', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 14, 'Pará', 'PA', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 15, 'Paraíba', 'PB', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 16, 'Paraná', 'PR', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 17, 'Pernambuco', 'PE', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 18, 'Piauí', 'PI', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 19, 'Rio de Janeiro', 'RJ', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 20, 'Rio Grande do Norte', 'RN', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 21, 'Rio Grande do Sul', 'RS', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 22, 'Rondônia', 'RO', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 23, 'Roraima', 'RR', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 24, 'Santa Catarina', 'SC', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 25, 'São Paulo', 'SP', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 26, 'Sergipe', 'SE', 1, 1);
INSERT INTO estado ( `id_estado`, `descricao_estado`, `sigla_estado`, `usuario_id`, `bool_ativo_estado`) VALUES ( 27, 'Tocantins', 'TO', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: fotos
DROP TABLE IF EXISTS `fotos`;

CREATE TABLE IF NOT EXISTS `fotos` (
	`id_fotos` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_fotos` varchar(50) NOT NULL ,
	`imagem_fotos` varchar(100) NOT NULL ,
	`item_id` int(11) NOT NULL ,
	`data_atualizacao_fotos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_fotos` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 1, 'Academia', 'MirantesulAcademia.jpg', 1, '2018-07-16 10:46:05', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 2, 'Área Externa', 'Mirantesularea_externa.jpg', 1, '2018-07-16 10:46:27', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 3, 'Banheiro', 'MirantesulBanheiro.jpg', 1, '2018-07-16 10:46:36', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 4, 'Churrasqueira', 'MirantesulChurrasqueira.jpg', 1, '2018-07-16 10:46:50', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 5, 'Cobertura', 'MirantesulCobertura.jpg', 1, '2018-07-16 10:47:03', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 6, 'Cozinha', 'MirantesulCozinha.jpg', 1, '2018-07-16 10:47:11', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 7, 'Dormitório 1', 'MirantesulDormitorio_1.jpg', 1, '2018-07-16 14:50:16', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 8, 'Dormitório 2', 'MirantesulDormitorio_2.jpg', 1, '2018-07-16 10:47:39', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 9, 'Entrada Social', 'MirantesulEntrada_Social.jpg', 1, '2018-07-16 10:47:55', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 10, 'Fachada', 'MirantesulFachada.jpg', 1, '2018-07-16 10:51:35', 1, 0);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 11, 'Guarita', 'MirantesulGuarita.jpg', 1, '2018-07-16 10:48:14', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 12, 'Hall', 'MirantesulHall.jpg', 1, '2018-07-16 10:51:39', 1, 0);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 13, 'Hall Dormitórios', 'Mirantesulhall_dormitorios.jpg', 1, '2018-07-16 10:50:46', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 14, 'Hall Entrada', 'Mirantesulhall_entrada.jpg', 1, '2018-07-16 10:49:02', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 15, 'Lavanderia', 'Mirantesullavanderia.jpg', 1, '2018-07-16 10:49:13', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 16, 'Piscina', 'Mirantesulpiscina.jpg', 1, '2018-07-16 10:49:45', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 17, 'Baheiro', 'villaggio__banheiro.jpg', 2, '2018-07-16 14:47:00', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 18, 'Banheiro Suite', 'villaggio__banheiro_suite.jpg', 2, '2018-07-16 14:47:16', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 19, 'Cozinha e Lavandeira', 'villaggio__cozinha_e_lavanderia.jpg', 2, '2018-07-16 14:47:39', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 20, 'Sacada', 'villaggio__sacada.jpg', 2, '2018-07-16 14:47:48', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 21, 'Sala', 'villaggio__sala.jpg', 2, '2018-07-16 14:48:00', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 22, 'Sala de Jantar', 'villaggio__sala_de_jantar.jpg', 2, '2018-07-16 14:48:12', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 23, 'Suite', 'villaggio__suite.jpg', 2, '2018-07-16 14:48:19', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 24, 'Ccorredor', 'villaggio__villaggio__.jpg', 2, '2018-07-16 14:49:19', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 25, 'Área de Lazer', 'quissisana_tower__Area_de_lazer.jpg', 3, '2018-07-16 15:05:24', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 26, 'Banheiro 1', 'quissisana_tower__banheiro1.jpg', 3, '2018-07-16 15:05:43', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 27, 'Banheiro Suite', 'quissisana_tower__banheiro_suite.jpg', 3, '2018-07-16 15:06:01', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 28, 'Banheiro Suite 2', 'quissisana_tower__Banheiro_Suite_2.jpg', 3, '2018-07-16 15:06:18', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 29, 'Corredor', 'quissisana_tower__corredor.jpg', 3, '2018-07-16 15:06:26', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 30, 'Cozinha', 'quissisana_tower__cozinha.jpg', 3, '2018-07-16 15:06:45', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 31, 'Dispensa', 'quissisana_tower__Dispensa.jpg', 3, '2018-07-16 15:06:54', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 32, 'Dormitório 1', 'quissisana_tower__dormitorio1.jpg', 3, '2018-07-16 15:07:12', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 33, 'Dormitório 2', 'quissisana_tower__dormitorio2.jpg', 3, '2018-07-16 15:08:49', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 34, 'Lavanderia', 'quissisana_tower__lavanderia.jpg', 3, '2018-07-16 15:09:02', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 35, 'Sala', 'quissisana_tower__sala.jpg', 3, '2018-07-16 15:09:13', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 36, 'Suite', 'quissisana_tower__suite.jpg', 3, '2018-07-16 15:09:22', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 37, 'Área de Lazer', 'HondurasArea_de_lazer.jpg', 4, '2018-07-16 15:19:39', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 38, 'Banheiro', 'HondurasBanheiro.jpg', 4, '2018-07-16 15:19:51', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 39, 'Churrasqueira', 'HondurasChurrasqueira.jpg', 4, '2018-07-16 15:20:06', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 40, 'Cozinha', 'HondurasCozinha.jpg', 4, '2018-07-16 15:21:56', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 41, 'Cozinha 2', 'HondurasCozinha2.jpg', 4, '2018-07-16 15:21:32', 1, 0);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 42, 'Dormitório', 'HondurasDormitorio.jpg', 4, '2018-07-16 15:20:50', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 43, 'Escadas', 'HondurasEscadas.jpg', 4, '2018-07-16 15:21:00', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 44, 'Hall Entrada', 'HondurasHall_Entrada.jpg', 4, '2018-07-16 15:23:44', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 45, 'Sala', 'HondurasSala.jpg', 4, '2018-07-16 15:21:18', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 46, 'Vista Frontal', 'jardim_dos_estados_frontal.jpg', 5, '2018-07-16 17:34:59', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 47, 'Vista do Fundo', 'jardim_dos_estados_fundo.jpg', 5, '2018-07-16 17:35:14', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 48, 'Área Externa', 'Residencia_1_Area_Externa.jpg', 6, '2018-07-23 17:06:19', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 49, 'Área Externa', 'Residencia_1_Area_Externa_2.jpg', 6, '2018-07-23 17:24:10', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 50, 'Banheiro Suite', 'Residencia_1_Banheiro_Suite_1.jpg', 6, '2018-07-23 17:24:15', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 51, 'Banheiro Suite Master', 'Residencia_1_Banheiro_Suite_Master.jpg', 6, '2018-07-23 17:21:37', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 52, 'Churrasqueira', 'Residencia_1_Churrasqueira.jpg', 6, '2018-07-23 17:21:47', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 53, 'Closet Suite Master', 'Residencia_1_Closet_Suite_Master.jpg', 6, '2018-07-23 17:22:00', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 54, 'Cozinha', 'Residencia_1_Cozinha.jpg', 6, '2018-07-23 17:22:10', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 55, 'Cozinha', 'Residencia_1_Cozinha_2.jpg', 6, '2018-07-23 17:24:23', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 56, 'Entrada Social', 'Residencia_1_Entrada_Social.jpg', 6, '2018-07-23 17:22:38', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 57, 'Escadas', 'Residencia_1_Escadas.jpg', 6, '2018-07-23 17:22:50', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 58, 'Escadas', 'Residencia_1_Escadas_2.jpg', 6, '2018-07-23 17:23:08', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 59, 'Lareira Naval', 'Residencia_1_Lareira_Naval.jpg', 6, '2018-07-23 17:23:25', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 60, 'Piscina', 'Residencia_1_Piscina.jpg', 6, '2018-07-23 17:23:34', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 61, 'Sacadas', 'Residencia_1_Sacadas.jpg', 6, '2018-07-23 17:23:44', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 62, 'Suite', 'Residencia_1_Suite_2.jpg', 6, '2018-07-23 17:23:54', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 63, 'Suite_Master', 'Residencia_1_Suite_Master.jpg', 6, '2018-07-23 17:24:03', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 64, 'Área Externa', 'Berlin34AreaExterna.jpg', 7, '2018-07-25 10:38:13', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 65, 'Área Externa', 'Berlin34AreaExterna.jpg', 7, '2018-07-25 13:33:50', 1, 0);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 66, 'Banheiro Suite Master', 'Berlin34BanheiroSuiteMaster1.jpg', 7, '2018-07-25 10:38:29', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 67, 'Churrasqueira', 'Berlin34Churrasqueira.jpg', 7, '2018-07-25 10:38:40', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 68, 'Corredor', 'Berlin34Corredor01.jpg', 7, '2018-07-25 10:38:50', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 69, 'Corredor', 'Berlin34Corredor02.jpg', 7, '2018-07-25 13:33:57', 1, 0);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 70, 'Corredor', 'Berlin34Corredor03.jpg', 7, '2018-07-25 10:39:03', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 71, 'Cozinha', 'Berlin34Cozinha.jpg', 7, '2018-07-25 10:39:14', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 72, 'Entrada Social', 'Berlin34EntradaSocial.jpg', 7, '2018-07-25 13:34:02', 1, 0);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 73, 'Frente', 'Berlin34Frente01.jpg', 7, '2018-07-25 10:39:44', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 74, 'Frente', 'Berlin34Frente02.jpg', 7, '2018-07-25 10:39:52', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 75, 'Frente', 'Berlin34Frente03.jpg', 7, '2018-07-25 10:39:59', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 76, 'Garagem', 'Berlin34Garagem.jpg', 7, '2018-07-25 10:40:10', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 77, 'Hall Salas', 'Berlin34HallSalas.jpg', 7, '2018-07-25 10:40:22', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 78, 'Jardim', 'Berlin34Jardim001.jpg', 7, '2018-07-25 13:35:33', 1, 0);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 79, 'Jardim Externo', 'Berlin34JardimExterno01.jpg', 7, '2018-07-25 10:41:04', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 80, 'Jardim Fundo', 'Berlin34JardimFundo01.jpg', 7, '2018-07-25 10:41:25', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 81, 'Jardim Fundo', 'Berlin34JardimFundo02.jpg', 7, '2018-07-25 10:41:40', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 82, 'Jardim Fundo', 'Berlin34JardimFundo03.jpg', 7, '2018-07-25 10:41:48', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 83, 'Jardim Fundo', 'Berlin34JardimFundo04.jpg', 7, '2018-07-25 10:41:55', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 84, 'Jardim Fundo', 'Berlin34JardimFundo05.jpg', 7, '2018-07-25 10:42:07', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 85, 'Jardim Garagem', 'Berlin34JardimGaragem01.jpg', 7, '2018-07-25 10:42:38', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 86, 'Jardim Garagem', 'Berlin34JardimGaragem03.jpg', 7, '2018-07-25 10:42:52', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 87, 'Jardim Hall', 'Berlin34JardimHall01.jpg', 7, '2018-07-25 10:43:10', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 88, 'Jardim Hall', 'Berlin34JardimHall02.jpg', 7, '2018-07-25 10:43:20', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 89, 'Jardim Hall', 'Berlin34JardimHall03.jpg', 7, '2018-07-25 10:43:32', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 90, 'Jardim Hall', 'Berlin34JardimHall04.jpg', 7, '2018-07-25 13:34:10', 1, 0);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 91, 'Jardim Hall', 'Berlin34JardimHall05.jpg', 7, '2018-07-25 13:34:15', 1, 0);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 92, 'Jardim Hall', 'Berlin34JardimHall06.jpg', 7, '2018-07-25 10:43:58', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 93, 'Lavabo', 'Berlin34Lavabo.jpg', 7, '2018-07-27 09:39:37', 1, 0);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 94, 'Lavanderia', 'Berlin34Lavanderia.jpg', 7, '2018-07-25 10:44:28', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 95, 'Parte Externa', 'Berlin34ParteExterna2.jpg', 7, '2018-07-27 09:39:29', 1, 0);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 96, 'Sala de Estar', 'Berlin34SalaEstar.jpg', 7, '2018-07-25 10:45:07', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 97, 'Sala de Jantar', 'Berlin34SalaJantar.jpg', 7, '2018-07-25 10:45:37', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 98, 'Suite', 'Berlin34Suite1.jpg', 7, '2018-07-25 10:45:52', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 99, 'Suite', 'Berlin34Suite2.jpg', 7, '2018-07-25 10:46:02', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 100, 'Suite Master', 'Berlin34SuiteMaster.jpg', 7, '2018-07-25 10:46:25', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 101, 'Suite Master', 'Berlin34SuiteMaster1.jpg', 7, '2018-07-25 10:46:34', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 102, 'Entrada Social', 'MontevideuEntradaSocial.jpg', 8, '2018-07-25 13:57:34', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 103, 'Entrada Social', 'MontevideuEntradaSocial_1.jpg', 8, '2018-07-25 13:57:40', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 104, 'Escadas', 'MontevideuEscadas.jpg', 8, '2018-07-25 13:57:48', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 105, 'Fachada', 'MontevideuFachada.jpg', 8, '2018-07-25 13:57:56', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 106, 'Fachada Fundo', 'MontevideuFachadaFundo.jpg', 8, '2018-07-25 13:58:04', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 107, 'Lavabo', 'MontevideuLavabo.jpg', 8, '2018-07-25 13:59:59', 1, 0);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 108, 'Piscina com Cascata', 'MontevideuPiscinaComCascata.jpg', 8, '2018-07-25 13:58:30', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 109, 'Piscina', 'MontevideuPiscinaComCascataJardin.jpg', 8, '2018-07-25 13:58:42', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 110, 'Sala com Lareira', 'MontevideuSalaComLareira.jpg', 8, '2018-07-25 13:58:55', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 111, 'Sala de Jantar', 'MontevideuSalaDeJantar.jpg', 8, '2018-07-25 13:59:11', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 112, 'Suite', 'MontevideuSuite2.jpg', 8, '2018-07-25 14:00:04', 1, 0);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 113, 'Suite', 'MontevideuSuite3.jpg', 8, '2018-07-25 14:00:07', 1, 0);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 114, 'Suite Master', 'MontevideuSuiteMaster.jpg', 8, '2018-07-25 13:59:38', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 115, 'Suite Master', 'MontevideuSuiteMaster1.jpg', 8, '2018-07-25 13:59:45', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 116, 'Suite Master', 'MontevideuSuiteMaster2.jpg', 8, '2018-07-25 14:00:11', 1, 0);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 117, 'Área Externa', 'Berlin46_AreaExterna1.jpg', 9, '2018-07-27 09:40:52', 1, 0);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 118, 'Área Externa', 'Berlin46_AreaExterna2.jpg', 9, '2018-07-27 09:40:56', 1, 0);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 119, 'Área Externa', 'Berlin46_AreaExterna3.jpg', 9, '2018-07-27 09:40:58', 1, 0);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 120, 'Área Externa', 'Berlin46_AreaExterna4.jpg', 9, '2018-07-27 09:41:02', 1, 0);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 121, 'Área Externa', 'Berlin46_AreaExterna6.jpg', 9, '2018-07-27 09:41:07', 1, 0);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 122, 'Área Externa', 'Berlin46_AreaExterna9.jpg', 9, '2018-07-27 09:41:11', 1, 0);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 123, 'Banheira Suite Master', 'Berlin46_BanheiraSuiteMaster.jpg', 9, '2018-07-27 09:41:14', 1, 0);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 124, 'Banheiro Suite', 'Berlin46_BanheiroSuite2.jpg', 9, '2018-07-26 08:13:03', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 125, 'Banheiro Suite', 'Berlin46_BanheiroSuite3.jpg', 9, '2018-07-27 09:41:19', 1, 0);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 126, 'Banheiro Suite Master', 'Berlin46_BanheiroSuiteMaster.jpg', 9, '2018-07-26 08:13:27', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 127, 'Banheiro Suite', 'Berlin46_BanheiroSuite3.jpg', 9, '2018-07-26 08:16:49', 1, 0);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 128, 'Churrasqueira', 'Berlin46_Churrasqueira1.jpg', 9, '2018-07-27 09:41:24', 1, 0);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 129, 'Cozinha', 'Berlin46_Cozinha.jpg', 9, '2018-07-26 08:14:08', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 130, 'Entrada Social', 'Berlin46_EntradaSocial1.jpg', 9, '2018-07-26 08:14:25', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 131, 'Entrada Social', 'Berlin46_EntradaSocial2.jpg', 9, '2018-07-27 09:41:28', 1, 0);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 132, 'Fachada', 'Berlin46_Fachada.jpg', 9, '2018-07-26 08:14:55', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 133, 'Garagem', 'Berlin46_Garagem.jpg', 9, '2018-07-26 08:15:05', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 134, 'Hall', 'Berlin46_Hall.jpg', 9, '2018-07-26 08:15:14', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 135, 'Lavabo', 'Berlin46_Lavabo.jpg', 9, '2018-07-26 10:11:30', 1, 0);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 136, 'Sala de Estar', 'Berlin46_SalaDeEstar.jpg', 9, '2018-07-26 08:15:40', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 137, 'Sala de Jantar', 'Berlin46_SalaDeJantar.jpg', 9, '2018-07-26 08:16:02', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 138, 'Suite', 'Berlin46_Suite2.jpg', 9, '2018-07-26 08:16:13', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 139, 'Suite', 'Berlin46_Suite3.jpg', 9, '2018-07-26 08:16:18', 1, 1);
INSERT INTO fotos ( `id_fotos`, `descricao_fotos`, `imagem_fotos`, `item_id`, `data_atualizacao_fotos`, `usuario_id`, `bool_ativo_fotos`) VALUES ( 140, 'Suite Master', 'Berlin46_SuiteMaster1.jpg', 9, '2018-07-26 08:16:28', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: grupo
DROP TABLE IF EXISTS `grupo`;

CREATE TABLE IF NOT EXISTS `grupo` (
	`id_grupo` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_grupo` char(50) NOT NULL ,
	`imagem_grupo` varchar(100) NOT NULL ,
	`data_atualizacao_grupo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11)  ,
	`bool_ativo_grupo` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `imagem_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 1, 'Casas Residenciais', 'residenncial.png', '2018-07-13 16:38:11', 1, 1);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `imagem_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 2, 'Condomínios', 'condominio.png', '2018-07-13 16:38:25', 1, 1);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `imagem_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 3, 'Terrenos', 'terreno.jpg', '2018-07-27 09:01:32', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: item
DROP TABLE IF EXISTS `item`;

CREATE TABLE IF NOT EXISTS `item` (
	`id_item` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_item` varchar(300) NOT NULL ,
	`descricao_resumida_item` text  ,
	`descricao_site_item` text  ,
	`imagem_item` varchar(200) NOT NULL ,
	`endereco_item` varchar(300)  ,
	`numero_item` int(5) NOT NULL ,
	`bairro_item` varchar(50)  ,
	`cidade_item` varchar(50)  ,
	`estado_id` int(50)  ,
	`situacao_id` int(11) NOT NULL ,
	`grupo_id` int(11)  ,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_item` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO item ( `id_item`, `titulo_item`, `descricao_resumida_item`, `descricao_site_item`, `imagem_item`, `endereco_item`, `numero_item`, `bairro_item`, `cidade_item`, `estado_id`, `situacao_id`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 1, 'Mirante Sul Residencial', 'Apartamento com 3 dormitórios, sendo 1 suíte, área de lazer  letterspacing 6 com churrasqueira e forno à lenha, academia de ginástica,  piscina aquecida...', 'Apartamentos com 3 dormitórios, sendo 1 suíte, garagem para 2 carros, acabamento em madeira e granito, 
sacada, área de lazer com churrasqueira e forno à lenha, academia de ginástica, piscina aquecida, playground, elevador, 
monitoramento e guarita 24 horas e vista panôramica.', 'Mirante_Sul_Residencial.png', 'Rua Haiti', 110, 'Jardim Quissisana', 'Poços de Caldas', 13, 7, 2, 1, 1);
INSERT INTO item ( `id_item`, `titulo_item`, `descricao_resumida_item`, `descricao_site_item`, `imagem_item`, `endereco_item`, `numero_item`, `bairro_item`, `cidade_item`, `estado_id`, `situacao_id`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 2, 'Villaggio di Trento Residencial', 'Apartamentos com 3 dormitórios, sendo 1 suíte, garagem para 2 carros, sacada e área de lazer com churrasqueira...', 'Apartamentos com 3 dormitórios, sendo 1 suíte, garagem para 2 carros, acabamento em 
madeira e granito, sacada e área de lazer com churrasqueira.', 'Villaggio_di_Trento.png', 'Rua Uruguai', 105, 'Jardim Quissisana', 'Poços de Caldas', 13, 2, 2, 1, 1);
INSERT INTO item ( `id_item`, `titulo_item`, `descricao_resumida_item`, `descricao_site_item`, `imagem_item`, `endereco_item`, `numero_item`, `bairro_item`, `cidade_item`, `estado_id`, `situacao_id`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 3, 'Quissisana Tower Residencial', 'Apartamentos com 3 dormitórios, sendo 1 suíte, garagem para 1 
carro, despensa individual, acabamento em madeira e granito...', 'Apartamentos com 3 dormitórios, sendo 1 suíte, garagem para 1 carro, despensa individual, 
acabamento em madeira e granito, sacada e área de lazer com churrasqueira.', 'Quissisana_Tower_Residencial.jpg', 'Rua Equador', 245, 'Jardim Quissisana', 'Poços de Caldas', 13, 2, 2, 1, 1);
INSERT INTO item ( `id_item`, `titulo_item`, `descricao_resumida_item`, `descricao_site_item`, `imagem_item`, `endereco_item`, `numero_item`, `bairro_item`, `cidade_item`, `estado_id`, `situacao_id`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 4, 'Honduras Top Life Residencial', 'Apartamentos com 3 dormitórios, sendo 1 suíte, garagem 
para 2 carros, despensa individual...', 'Apartamentos com 3 dormitórios, sendo 1 suíte, garagem para 2 carros, despensa individual, 
acabamento em madeira e granito, sacada e área de lazer com churrasqueira.', 'Honduras_Top_Life_Residencial.png', 'Rua Honduras', 85, 'Jardim Quissisana', 'Poços de Caldas', 13, 2, 2, 1, 1);
INSERT INTO item ( `id_item`, `titulo_item`, `descricao_resumida_item`, `descricao_site_item`, `imagem_item`, `endereco_item`, `numero_item`, `bairro_item`, `cidade_item`, `estado_id`, `situacao_id`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 5, 'Terreno Jardim dos Estados', 'Local Ideal para prédio com 910M² de área', 'Local Ideal para prédio com 910M² de área', 'jardim_dos_estados_frontal.jpg', 'Rua Corumba', 0, 'Jardim dos Estados', 'Poços de Caldas', 13, 4, 3, 1, 1);
INSERT INTO item ( `id_item`, `titulo_item`, `descricao_resumida_item`, `descricao_site_item`, `imagem_item`, `endereco_item`, `numero_item`, `bairro_item`, `cidade_item`, `estado_id`, `situacao_id`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 6, 'Excelente residência de alto padrão', '3 suítes com sacadas, sendo 1 suíte máster com sauna, sala 3 
ambientes, lareira, lavabo, 2 cozinhas planejadas, armários 
embutidos...', '3 suítes com sacadas, sendo 1 suíte máster com sauna e banheira, sala 3 ambientes, lareira, lavabo, 2 cozinhas planejadas, armários 
embutidos, espaço gourmet com churrasqueira e forno iglu, piscina aquecida com solarium, garagem para 4 carros, sistema de alarme 
e câmeras monitorado,  acabamento em madeira e granito, esquadrias Tigre, toda jardinada, sistema de gás encanado e quarto de 
empregada.', 'ParisFachada.jpg', 'Av. Paris', 978, 'Jardim Europa', 'Poços de Caldas', 13, 5, 1, 1, 1);
INSERT INTO item ( `id_item`, `titulo_item`, `descricao_resumida_item`, `descricao_site_item`, `imagem_item`, `endereco_item`, `numero_item`, `bairro_item`, `cidade_item`, `estado_id`, `situacao_id`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 7, 'Excelente residência de alto padrão', '3 suites, sendo 1 suíte master com banheira e closet,  garagem 
para 4 carros  e dispensa, sistema de alarme e cameras 
monitorado,  aquecimento solar ...', 'Excelente residência, 3 suites, sendo1 suíte master com banheira e closet,1 quarto reversivel, sala para 3 ambientes com 
sacada e pergolado, lavabo, 2 cozinhas com despensa, lavanderia, espaço gourmet com forno iglu e churrasqueira, garagem para 4 carros, 
sistema de alarme e câmeras monitorado, acabamento em madeira e granito, esquadrias Tigre, toda jardinada,  
sistema de gás encanado, aquecimento solar e quarto de empregada.', 'residencia_berlin34.png', 'Rua Berlin', 34, 'Jardim Europa', 'Poços de Caldas', 13, 5, 1, 1, 1);
INSERT INTO item ( `id_item`, `titulo_item`, `descricao_resumida_item`, `descricao_site_item`, `imagem_item`, `endereco_item`, `numero_item`, `bairro_item`, `cidade_item`, `estado_id`, `situacao_id`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 8, 'Excelente residência de alto padrão', 'Três suítes com sacadas, sendo uma suíte máster com banheira e 
decorada, sala quatro ambientes com lareira, dois lavabos 
decorados, cozinha planejada ...', 'Três suítes com sacadas, sendo uma suíte máster com banheira e decorada, sala quatro ambientes com lareira, dois lavabos decorados, cozinha 
planejada, área de apoio para cozinha ou churrasqueira, piscina aquecida com cascata e iluminação, muros altos, ensolarada, garagem ampla, 
sistema de alarme com cerca elétrica, instalações para câmeras de segurança, toda jardinada, sistema de aquecimento solar, gás encanado, suíte 
de empregada, deposito, dispensa, lavanderia, hall intimo para escritório ou sala de estar, localização privilegiada e vista panorâmica.', 'residencia_montevidel.png', 'Av. Montevidéu', 531, 'Jardim Novo Mundo II', 'Poços da Caldas', 13, 1, 1, 1, 1);
INSERT INTO item ( `id_item`, `titulo_item`, `descricao_resumida_item`, `descricao_site_item`, `imagem_item`, `endereco_item`, `numero_item`, `bairro_item`, `cidade_item`, `estado_id`, `situacao_id`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 9, 'Excelente residência de alto padrão', 'Três suítes, sendo uma suíte máster com banheira, sala três 
ambientes, hall, dois lavabos, cozinha, churrasqueira, garagem 
ampla, sistema de alarme com cerca elétrica ...', 'Três suítes, sendo uma suíte máster com banheira, sala três ambientes, hall, dois lavabos, cozinha, churrasqueira, garagem ampla, sistema de 
alarme com cerca elétrica, instalações para câmeras de segurança, toda jardinada, sistema de aquecimento solar, gás encanado, suíte de 
empregada, deposito, dispensa, lavanderia.', 'residencia_berlin46.png', 'Rua Berlin', 46, 'Jardim Europa', 'Poços de Caldas', 13, 1, 1, 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: item_orcamento
DROP TABLE IF EXISTS `item_orcamento`;

CREATE TABLE IF NOT EXISTS `item_orcamento` (
	`id_item_orcamento` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`data_lanc_item_orcamento` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`orcamento_id` int(11) NOT NULL ,
	`item_id` int(11) NOT NULL ,
	`quantidade_item_orcamento` float NOT NULL ,
	`total_item_orcamento` float NOT NULL ,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_item_orcamento` int(1)  DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro



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
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_loja` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO loja ( `id_loja`, `titulo_loja`, `descricao_loja`, `imagem_loja`, `configurar_site_id`, `data_atualizacao_loja`, `usuario_id`, `bool_ativo_loja`) VALUES ( 1, 'Faça uma visita!', '', 'logoSemFundo19.png', 1, '2018-07-23 15:13:49', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: new_sjt
DROP TABLE IF EXISTS `new_sjt`;

CREATE TABLE IF NOT EXISTS `new_sjt` (
	`id_new_sjt` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_new_sjt` varchar(50) NOT NULL ,
	`imagem_demonstrativa_new_sjt` varchar(100) NOT NULL ,
	`numero_edicao_new_sjt` int(3) NOT NULL ,
	`data_atualizacao_new_sjt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_new_sjt` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO new_sjt ( `id_new_sjt`, `descricao_new_sjt`, `imagem_demonstrativa_new_sjt`, `numero_edicao_new_sjt`, `data_atualizacao_new_sjt`, `usuario_id`, `bool_ativo_new_sjt`) VALUES ( 1, 'Edição 44', 'ed44_min_pag_1.jpg', 44, '2018-07-23 15:16:38', 1, 1);
INSERT INTO new_sjt ( `id_new_sjt`, `descricao_new_sjt`, `imagem_demonstrativa_new_sjt`, `numero_edicao_new_sjt`, `data_atualizacao_new_sjt`, `usuario_id`, `bool_ativo_new_sjt`) VALUES ( 2, 'Edição 45', 'ed45_min_pag_1.jpg', 45, '2018-07-23 15:19:19', 1, 1);
INSERT INTO new_sjt ( `id_new_sjt`, `descricao_new_sjt`, `imagem_demonstrativa_new_sjt`, `numero_edicao_new_sjt`, `data_atualizacao_new_sjt`, `usuario_id`, `bool_ativo_new_sjt`) VALUES ( 3, 'Edição 46', 'ed46_min_pag_1.jpg', 46, '2018-07-23 15:19:32', 1, 1);
INSERT INTO new_sjt ( `id_new_sjt`, `descricao_new_sjt`, `imagem_demonstrativa_new_sjt`, `numero_edicao_new_sjt`, `data_atualizacao_new_sjt`, `usuario_id`, `bool_ativo_new_sjt`) VALUES ( 4, 'Edição 47', 'ed47_min_pag_1.jpg', 47, '2018-07-23 15:19:43', 1, 1);
INSERT INTO new_sjt ( `id_new_sjt`, `descricao_new_sjt`, `imagem_demonstrativa_new_sjt`, `numero_edicao_new_sjt`, `data_atualizacao_new_sjt`, `usuario_id`, `bool_ativo_new_sjt`) VALUES ( 5, 'Edição 49', 'ed49_min_pag_1.jpg', 49, '2018-07-23 15:19:51', 1, 1);
INSERT INTO new_sjt ( `id_new_sjt`, `descricao_new_sjt`, `imagem_demonstrativa_new_sjt`, `numero_edicao_new_sjt`, `data_atualizacao_new_sjt`, `usuario_id`, `bool_ativo_new_sjt`) VALUES ( 6, 'Edição 50', 'ed50_min_pag_1.jpg', 50, '2018-07-23 15:20:08', 1, 1);
INSERT INTO new_sjt ( `id_new_sjt`, `descricao_new_sjt`, `imagem_demonstrativa_new_sjt`, `numero_edicao_new_sjt`, `data_atualizacao_new_sjt`, `usuario_id`, `bool_ativo_new_sjt`) VALUES ( 7, 'Edição 52', 'ed52_min_pag_1.jpg', 52, '2018-07-23 15:20:18', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: nivel_acesso
DROP TABLE IF EXISTS `nivel_acesso`;

CREATE TABLE IF NOT EXISTS `nivel_acesso` (
	`id_nivel_acesso` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_nivel_acesso` varchar(200) NOT NULL ,
	`area_nivel_acesso` text NOT NULL ,
	`data_atualizacao_nivel_acesso` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_nivel_acesso` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO nivel_acesso ( `id_nivel_acesso`, `descricao_nivel_acesso`, `area_nivel_acesso`, `data_atualizacao_nivel_acesso`, `usuario_id`, `bool_ativo_nivel_acesso`) VALUES ( 1, 'Nivel Administrador', 'configurar_site+contato+grupo+item+new_sjt+quem_somos+saiba_mais+situacao+videos+orcamento-cliente_site+item_orcamento-orcamento+cards-configurar_site+destaque_grupo-configurar_site+endereco_site-configurar_site+slide_show-configurar_site+loja-configurar_site+topicos_loja-loja+adicional_site-saiba_mais+paginas-new_sjt+fotos-item+item-grupo+upload+mapa+mov+relatorio+notificacao+usuario', '2018-07-27 14:37:18', 1, 1);
INSERT INTO nivel_acesso ( `id_nivel_acesso`, `descricao_nivel_acesso`, `area_nivel_acesso`, `data_atualizacao_nivel_acesso`, `usuario_id`, `bool_ativo_nivel_acesso`) VALUES ( 2, 'SJT', '', '2018-07-26 10:04:00', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: notificacoes
DROP TABLE IF EXISTS `notificacoes`;

CREATE TABLE IF NOT EXISTS `notificacoes` (
	`id_notificacoes` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_notificacoes` text NOT NULL ,
	`usuario_atuador_notificacoes` varchar(200) NOT NULL ,
	`usuaio_requerente_notificacoes` varchar(200) NOT NULL ,
	`tipo_alteracao_notificacoes` enum('i','u','d') NOT NULL ,
	`notificacoes_config_id` int(200) NOT NULL ,
	`bool_view_notificacoes` int(1) NOT NULL ,
	`data_atualizacao_notificacoes` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_notificacoes` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: notificacoes_config
DROP TABLE IF EXISTS `notificacoes_config`;

CREATE TABLE IF NOT EXISTS `notificacoes_config` (
	`id_notificacoes_config` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`area_notificacoes_config` varchar(200) NOT NULL ,
	`tipo_alteracao_notificacoes_config` varchar(100) NOT NULL ,
	`data_atualizacao_notificacoes_config` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_notificacoes_config` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: notificacoes_pendentes
DROP TABLE IF EXISTS `notificacoes_pendentes`;

CREATE TABLE IF NOT EXISTS `notificacoes_pendentes` (
	`id_notificacoes_pendentes` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_notificacoes_pendentes` text NOT NULL ,
	`usuario_atuador_notificacoes_pendentes` varchar(200) NOT NULL ,
	`usuaio_requerente_notificacoes_pendentes` varchar(200) NOT NULL ,
	`tipo_alteracao_notificacoes_pendentes` enum('i','u','d') NOT NULL ,
	`notificacoes_config_id` int(200) NOT NULL ,
	`data_atualizacao_notificacoes_pendentes` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_notificacoes_pendentes` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: notificacoes_salvas
DROP TABLE IF EXISTS `notificacoes_salvas`;

CREATE TABLE IF NOT EXISTS `notificacoes_salvas` (
	`id_notificacoes_salvas` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_notificacoes_salvas` text NOT NULL ,
	`usuario_atuador_notificacoes_salvas` varchar(200) NOT NULL ,
	`usuaio_requerente_notificacoes_salvas` varchar(200) NOT NULL ,
	`tipo_alteracao_notificacoes_salvas` varchar(50) NOT NULL ,
	`notificacoes_config_id` int(200) NOT NULL ,
	`data_atualizacao_notificacoes_salvas` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_notificacoes_salvas` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: orcamento
DROP TABLE IF EXISTS `orcamento`;

CREATE TABLE IF NOT EXISTS `orcamento` (
	`id_orcamento` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_orcamento` varchar(200) NOT NULL ,
	`cliente_site_id` int(11) NOT NULL ,
	`data_lanc_orcamento` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_orcamento` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: paginas
DROP TABLE IF EXISTS `paginas`;

CREATE TABLE IF NOT EXISTS `paginas` (
	`id_paginas` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`numero_da_pagina_paginas` int(3) NOT NULL ,
	`imagem_paginas` varchar(50) NOT NULL ,
	`imagem_miniatura_paginas` varchar(50) NOT NULL ,
	`new_sjt_id` int(11) NOT NULL ,
	`data_atualizacao_paginas` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_paginas` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 2, 1, 'ed44_pag_1.jpg', 'ed44_min_pag_1.jpg', 1, '2018-07-13 14:33:04', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 3, 2, 'ed44_pag_2.jpg', 'ed44_min_pag_2.jpg', 1, '2018-07-13 14:34:47', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 4, 3, 'ed44_pag_3.jpg', 'ed44_min_pag_3.jpg', 1, '2018-07-13 14:34:58', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 5, 4, 'ed44_pag_4.jpg', 'ed44_min_pag_4.jpg', 1, '2018-07-13 14:35:09', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 6, 5, 'ed44_pag_5.jpg', 'ed44_min_pag_5.jpg', 1, '2018-07-13 14:35:24', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 7, 6, 'ed44_pag_6.jpg', 'ed44_min_pag_6.jpg', 1, '2018-07-13 14:35:35', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 8, 7, 'ed44_pag_7.jpg', 'ed44_min_pag_7.jpg', 1, '2018-07-13 14:35:51', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 9, 8, 'ed44_pag_8.jpg', 'ed44_min_pag_8.jpg', 1, '2018-07-13 14:36:03', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 10, 1, 'ed45_pag_1.jpg', 'ed45_min_pag_1.jpg', 2, '2018-07-13 14:45:40', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 11, 2, 'ed45_pag_2.jpg', 'ed45_min_pag_2.jpg', 2, '2018-07-13 14:44:30', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 12, 3, 'ed45_pag_3.jpg', 'ed45_min_pag_3.jpg', 2, '2018-07-13 14:44:39', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 13, 4, 'ed45_pag_4.jpg', 'ed45_min_pag_4.jpg', 2, '2018-07-13 14:44:50', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 14, 5, 'ed45_pag_5.jpg', 'ed45_min_pag_5.jpg', 2, '2018-07-13 14:45:02', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 15, 6, 'ed45_pag_6.jpg', 'ed45_min_pag_6.jpg', 2, '2018-07-13 14:45:10', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 16, 7, 'ed45_pag_7.jpg', 'ed45_min_pag_7.jpg', 2, '2018-07-13 14:45:18', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 17, 8, 'ed45_pag_8.jpg', 'ed45_min_pag_8.jpg', 2, '2018-07-13 14:45:28', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 18, 1, 'ed46_pag_1.jpg', 'ed46_min_pag_1.jpg', 3, '2018-07-13 14:54:21', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 19, 2, 'ed46_pag_2.jpg', 'ed46_min_pag_2.jpg', 3, '2018-07-13 14:54:42', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 20, 3, 'ed46_pag_3.jpg', 'ed46_min_pag_3.jpg', 3, '2018-07-13 14:54:55', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 21, 4, 'ed46_pag_4.jpg', 'ed46_min_pag_4.jpg', 3, '2018-07-13 14:55:07', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 22, 5, 'ed46_pag_5.jpg', 'ed46_min_pag_5.jpg', 3, '2018-07-13 14:55:22', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 23, 6, 'ed46_pag_6.jpg', 'ed46_min_pag_6.jpg', 3, '2018-07-13 14:55:36', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 24, 7, 'ed46_pag_7.jpg', 'ed46_min_pag_7.jpg', 3, '2018-07-13 14:55:46', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 25, 8, 'ed46_pag_8.jpg', 'ed46_min_pag_8.jpg', 3, '2018-07-13 14:55:56', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 26, 1, 'ed47_pag_1.jpg', 'ed47_min_pag_1.jpg', 4, '2018-07-13 15:03:07', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 27, 2, 'ed47_pag_2.jpg', 'ed47_min_pag_2.jpg', 4, '2018-07-13 15:03:20', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 28, 3, 'ed47_pag_3.jpg', 'ed47_min_pag_3.jpg', 4, '2018-07-13 15:03:31', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 29, 4, 'ed47_pag_4.jpg', 'ed47_min_pag_4.jpg', 4, '2018-07-13 15:03:46', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 30, 5, 'ed47_pag_5.jpg', 'ed47_min_pag_5.jpg', 4, '2018-07-13 15:04:00', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 31, 6, 'ed47_pag_6.jpg', 'ed47_min_pag_6.jpg', 4, '2018-07-13 15:04:13', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 32, 7, 'ed47_pag_7.jpg', 'ed47_min_pag_7.jpg', 4, '2018-07-13 15:04:24', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 33, 8, 'ed47_pag_8.jpg', 'ed47_min_pag_8.jpg', 4, '2018-07-13 15:04:37', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 34, 1, 'ed49_pag_1.jpg', 'ed49_min_pag_1.jpg', 5, '2018-07-13 15:15:03', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 35, 2, 'ed49_pag_2.jpg', 'ed49_min_pag_2.jpg', 5, '2018-07-13 15:15:15', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 36, 3, 'ed49_pag_3.jpg', 'ed49_min_pag_3.jpg', 5, '2018-07-13 15:15:28', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 37, 4, 'ed49_pag_4.jpg', 'ed49_min_pag_4.jpg', 5, '2018-07-13 15:15:41', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 38, 5, 'ed49_pag_5.jpg', 'ed49_min_pag_5.jpg', 5, '2018-07-13 15:15:52', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 39, 6, 'ed49_pag_6.jpg', 'ed49_min_pag_6.jpg', 5, '2018-07-13 15:16:06', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 40, 7, 'ed49_pag_7.jpg', 'ed49_min_pag_7.jpg', 5, '2018-07-13 15:16:18', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 41, 8, 'ed49_pag_8.jpg', 'ed49_min_pag_8.jpg', 5, '2018-07-13 15:16:27', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 42, 1, 'ed50_pag_1.jpg', 'ed50_min_pag_1.jpg', 6, '2018-07-13 15:23:25', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 43, 2, 'ed50_pag_2.jpg', 'ed50_min_pag_2.jpg', 6, '2018-07-13 15:23:35', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 44, 3, 'ed50_pag_3.jpg', 'ed50_min_pag_3.jpg', 6, '2018-07-13 15:23:45', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 45, 4, 'ed50_pag_4.jpg', 'ed50_min_pag_4.jpg', 6, '2018-07-13 15:23:58', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 46, 5, 'ed50_pag_5.jpg', 'ed50_min_pag_5.jpg', 6, '2018-07-13 15:24:16', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 47, 6, 'ed50_pag_6.jpg', 'ed50_min_pag_6.jpg', 6, '2018-07-13 15:24:30', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 48, 7, 'ed50_pag_7.jpg', 'ed50_min_pag_7.jpg', 6, '2018-07-13 15:24:43', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 49, 8, 'ed50_pag_8.jpg', 'ed50_min_pag_8.jpg', 6, '2018-07-13 15:24:54', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 50, 1, 'ed52_pag_1.jpg', 'ed52_min_pag_1.jpg', 7, '2018-07-13 15:33:18', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 51, 2, 'ed52_pag_2.jpg', 'ed52_min_pag_2.jpg', 7, '2018-07-13 15:33:29', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 52, 3, 'ed52_pag_3.jpg', 'ed52_min_pag_3.jpg', 7, '2018-07-13 15:33:39', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 53, 4, 'ed52_pag_4.jpg', 'ed52_min_pag_4.jpg', 7, '2018-07-13 15:33:49', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 54, 5, 'ed52_pag_5.jpg', 'ed52_min_pag_5.jpg', 7, '2018-07-13 15:33:57', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 55, 6, 'ed52_pag_6.jpg', 'ed52_min_pag_6.jpg', 7, '2018-07-13 15:34:05', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 56, 7, 'ed52_pag_7.jpg', 'ed52_min_pag_7.jpg', 7, '2018-07-13 15:34:14', 1, 1);
INSERT INTO paginas ( `id_paginas`, `numero_da_pagina_paginas`, `imagem_paginas`, `imagem_miniatura_paginas`, `new_sjt_id`, `data_atualizacao_paginas`, `usuario_id`, `bool_ativo_paginas`) VALUES ( 57, 8, 'ed52_pag_8.jpg', 'ed52_min_pag_8.jpg', 7, '2018-07-13 15:34:22', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: quem_somos
DROP TABLE IF EXISTS `quem_somos`;

CREATE TABLE IF NOT EXISTS `quem_somos` (
	`id_quem_somos` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_quem_somos` varchar(200) NOT NULL ,
	`descricao_quem_somos` text NOT NULL ,
	`imagem_quem_somos` varchar(100) NOT NULL ,
	`data_atualizacao_quem_somos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_quem_somos` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO quem_somos ( `id_quem_somos`, `titulo_quem_somos`, `descricao_quem_somos`, `imagem_quem_somos`, `data_atualizacao_quem_somos`, `usuario_id`, `bool_ativo_quem_somos`) VALUES ( 1, 'Sobre a SJT', 'Disposta a inovar o setor de construção civil e satisfazer as necessidades de seus clientes com uma moradia segura, de bom gosto e 
notável arquitetura, a SJT Incorporadora e Administradora Ltda. prima por qualidade - desde nobre matéria-prima com marcas 
reconhecidas até o detalhe do acabamento final, respeito e segurança em todas as suas obras.
<br>
Profissionais renomados, fornecedores eficientes e mão-de-obra especializada são primordiais na garantia de bons resultados. 
<br>
A empresa que aprimorou o mercado de arquitetura com suas idéias modernas e construções bem feitas valoriza os profissionais desta 
área e conta com uma equipe competente e comprometida com seu trabalho, sempre construindo qualidade de vida e pensando no 
bem-estar de seus proprietários.
<br>
O reconhecimento de sua seriedade pôde ser constatado nos sucessos consecutivos do Prêmio Top of Mind 2005, 2006 e  2007.
<br>
Visite você também nossos empreendimentos!', 'sobreSemFundo.png', '2018-07-21 08:10:39', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: relatorio_tabela
DROP TABLE IF EXISTS `relatorio_tabela`;

CREATE TABLE IF NOT EXISTS `relatorio_tabela` (
	`id_relatorio_tabela` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_relatorio_tabela` varchar(200) NOT NULL ,
	`data_atualizacao_relatorio_tabela` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_relatorio_tabela` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro



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


-- Dados da tabela: Nenhum registro



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
INSERT INTO saiba_mais ( `id_saiba_mais`, `descricao_saiba_mais`, `usuario_id`, `data_atualizacao_saiba_mais`, `bool_ativo_saiba_mais`) VALUES ( 1, 'Saiba Mais', 1, '2018-07-13 09:21:16', 1);



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
INSERT INTO site ( `ID_SITE`, `NOME_EMPRESA`, `NOME_CIDADE`, `ESTADO`, `FONE`, `FONE_APP`, `EMAIL`, `sendusername`, `sendpassword`, `smtpserver`, `smtpserverport`, `MailFrom`, `MailTo`, `MailCc`, `bool_ativo_site`) VALUES ( 1, 'SJT CONSTRUTORA E INCORPORADORA', 'Poços de Caldas', 'MG', '(35) 3721-6494', '', 'cdi@cdiinfo.com.br', 'thiago@cdiinfo.com.br', 'Cdidesenv03@', 'mail.cdiinfo.com.br', 465, 'thiago@cdiinfo.com.br', 'thiago.cdi@Hotmail.com', 'cdiinfo.suporte@gmail.com', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: situacao
DROP TABLE IF EXISTS `situacao`;

CREATE TABLE IF NOT EXISTS `situacao` (
	`id_situacao` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_situacao` varchar(200) NOT NULL ,
	`cor_situacao` varchar(20) NOT NULL ,
	`data_atualizacao_situacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_situacao` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO situacao ( `id_situacao`, `descricao_situacao`, `cor_situacao`, `data_atualizacao_situacao`, `usuario_id`, `bool_ativo_situacao`) VALUES ( 1, 'Pronto P/ Morar!', 'green;', '2018-07-25 17:36:12', 1, 1);
INSERT INTO situacao ( `id_situacao`, `descricao_situacao`, `cor_situacao`, `data_atualizacao_situacao`, `usuario_id`, `bool_ativo_situacao`) VALUES ( 2, '100% Vendido', 'red;', '2018-07-16 16:49:47', 1, 1);
INSERT INTO situacao ( `id_situacao`, `descricao_situacao`, `cor_situacao`, `data_atualizacao_situacao`, `usuario_id`, `bool_ativo_situacao`) VALUES ( 3, 'Últimas Unidades', '#f0ad4e;', '2018-07-16 16:53:40', 1, 1);
INSERT INTO situacao ( `id_situacao`, `descricao_situacao`, `cor_situacao`, `data_atualizacao_situacao`, `usuario_id`, `bool_ativo_situacao`) VALUES ( 4, 'Vende-se', 'green;', '2018-07-16 17:28:37', 1, 1);
INSERT INTO situacao ( `id_situacao`, `descricao_situacao`, `cor_situacao`, `data_atualizacao_situacao`, `usuario_id`, `bool_ativo_situacao`) VALUES ( 5, 'Vendido', 'red;', '2018-07-17 08:38:34', 1, 1);
INSERT INTO situacao ( `id_situacao`, `descricao_situacao`, `cor_situacao`, `data_atualizacao_situacao`, `usuario_id`, `bool_ativo_situacao`) VALUES ( 6, 'Vendido', 'red', '2018-07-23 17:05:26', 1, 0);
INSERT INTO situacao ( `id_situacao`, `descricao_situacao`, `cor_situacao`, `data_atualizacao_situacao`, `usuario_id`, `bool_ativo_situacao`) VALUES ( 7, 'Pronto P/ Morar *<br><span style=\'color:#f0ad4e;\'>* Últimas Unidades', 'green;', '2018-07-27 11:28:20', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: slide_show
DROP TABLE IF EXISTS `slide_show`;

CREATE TABLE IF NOT EXISTS `slide_show` (
	`id_slide_show` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_slide_show` varchar(100)  ,
	`descricao_slide_show` varchar(200)  ,
	`imagem_slide_show` varchar(100) NOT NULL ,
	`item_id` int(11)  ,
	`configurar_site_id` int(11) NOT NULL ,
	`data_atualizacao_slide_show` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_slide_show` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO slide_show ( `id_slide_show`, `titulo_slide_show`, `descricao_slide_show`, `imagem_slide_show`, `item_id`, `configurar_site_id`, `data_atualizacao_slide_show`, `usuario_id`, `bool_ativo_slide_show`) VALUES ( 1, 'Honduras Top Life Residencial', 'Totalmente Vendido', 'Honduras_Top_Life_Residencial_slide.png', 4, 1, '2018-07-19 16:34:48', 1, 1);
INSERT INTO slide_show ( `id_slide_show`, `titulo_slide_show`, `descricao_slide_show`, `imagem_slide_show`, `item_id`, `configurar_site_id`, `data_atualizacao_slide_show`, `usuario_id`, `bool_ativo_slide_show`) VALUES ( 2, 'Mirante Sul Residencial', 'Pronto P/ Morar', 'Mirante_Sul_Residencial_slide.png', 1, 1, '2018-07-19 16:36:05', 1, 1);
INSERT INTO slide_show ( `id_slide_show`, `titulo_slide_show`, `descricao_slide_show`, `imagem_slide_show`, `item_id`, `configurar_site_id`, `data_atualizacao_slide_show`, `usuario_id`, `bool_ativo_slide_show`) VALUES ( 3, 'Villaggio Di Trento Residencial', 'Totalmente Vendido', 'Villaggio_di_Trento_slide.png', 2, 1, '2018-07-19 16:36:01', 1, 1);
INSERT INTO slide_show ( `id_slide_show`, `titulo_slide_show`, `descricao_slide_show`, `imagem_slide_show`, `item_id`, `configurar_site_id`, `data_atualizacao_slide_show`, `usuario_id`, `bool_ativo_slide_show`) VALUES ( 6, 'Quissisana Tower Residencial', 'Totalmente Vendido', 'Quissisana_Tower_Residencial_slide.png', 3, 1, '2018-07-19 16:36:10', 1, 1);
INSERT INTO slide_show ( `id_slide_show`, `titulo_slide_show`, `descricao_slide_show`, `imagem_slide_show`, `item_id`, `configurar_site_id`, `data_atualizacao_slide_show`, `usuario_id`, `bool_ativo_slide_show`) VALUES ( 7, 'Excelente residencia de alto padrão', '', 'residencial_paris_slide.png', 6, 1, '2018-07-26 13:35:21', 1, 1);
INSERT INTO slide_show ( `id_slide_show`, `titulo_slide_show`, `descricao_slide_show`, `imagem_slide_show`, `item_id`, `configurar_site_id`, `data_atualizacao_slide_show`, `usuario_id`, `bool_ativo_slide_show`) VALUES ( 8, 'Excelente residência de alto padrão', '', 'residecial_berlin34_slide.png', 7, 1, '2018-07-26 13:36:04', 1, 1);
INSERT INTO slide_show ( `id_slide_show`, `titulo_slide_show`, `descricao_slide_show`, `imagem_slide_show`, `item_id`, `configurar_site_id`, `data_atualizacao_slide_show`, `usuario_id`, `bool_ativo_slide_show`) VALUES ( 9, 'Excelente residência de alto padrão', '', 'residencial_montevidel_slide.png', 8, 1, '2018-07-26 13:36:20', 1, 1);
INSERT INTO slide_show ( `id_slide_show`, `titulo_slide_show`, `descricao_slide_show`, `imagem_slide_show`, `item_id`, `configurar_site_id`, `data_atualizacao_slide_show`, `usuario_id`, `bool_ativo_slide_show`) VALUES ( 10, 'Excelente residência de alto padrão', '', 'residencial_berlin46_slide.png', 9, 1, '2018-07-26 13:36:36', 1, 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: topicos_loja
DROP TABLE IF EXISTS `topicos_loja`;

CREATE TABLE IF NOT EXISTS `topicos_loja` (
	`id_topicos_loja` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_topicos_loja` varchar(100) NOT NULL ,
	`descricao_topicos_loja` varchar(100) NOT NULL ,
	`loja_id` int(11) NOT NULL ,
	`data_atualizacao_topicos_loja` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_topicos_loja` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO topicos_loja ( `id_topicos_loja`, `titulo_topicos_loja`, `descricao_topicos_loja`, `loja_id`, `data_atualizacao_topicos_loja`, `usuario_id`, `bool_ativo_topicos_loja`) VALUES ( 1, 'Endereço', 'Rua. Dr. Agostinho de Souza Lima, 149 - Aparecida  Poços de Caldas - MG, 37701-126 ', 1, '2018-07-13 15:51:14', 1, 1);
INSERT INTO topicos_loja ( `id_topicos_loja`, `titulo_topicos_loja`, `descricao_topicos_loja`, `loja_id`, `data_atualizacao_topicos_loja`, `usuario_id`, `bool_ativo_topicos_loja`) VALUES ( 3, 'Telefone', '(35) 3721-6494', 1, '2018-07-13 15:54:58', 1, 1);
INSERT INTO topicos_loja ( `id_topicos_loja`, `titulo_topicos_loja`, `descricao_topicos_loja`, `loja_id`, `data_atualizacao_topicos_loja`, `usuario_id`, `bool_ativo_topicos_loja`) VALUES ( 4, 'E-mail', 'sjtconst@veloxmail.com.br', 1, '2018-07-13 15:55:16', 1, 1);
INSERT INTO topicos_loja ( `id_topicos_loja`, `titulo_topicos_loja`, `descricao_topicos_loja`, `loja_id`, `data_atualizacao_topicos_loja`, `usuario_id`, `bool_ativo_topicos_loja`) VALUES ( 5, 'Horário de Funcionamento', 'Segunda a Sexta: 8h as 17h30', 1, '2018-07-13 15:55:27', 1, 1);



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
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 318, 'residencia_montevidel.png', 'imagem', '2018-07-26 10:36:52', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 319, 'residencia_berlin46.png', 'imagem', '2018-07-26 10:37:24', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 320, 'residecial_berlin34_slide.png', 'imagem', '2018-07-26 13:33:17', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 321, 'residencial_berlin46_slide.png', 'imagem', '2018-07-26 13:33:36', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 322, 'residencial_montevidel_slide.png', 'imagem', '2018-07-26 13:33:51', 1);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 323, 'residencial_paris_slide.png', 'imagem', '2018-07-26 13:34:08', 1);



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: usuario
DROP TABLE IF EXISTS `usuario`;

CREATE TABLE IF NOT EXISTS `usuario` (
	`id_usuario` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`nome_usuario` varchar(200)  ,
	`login_usuario` char(3)  ,
	`senha_usuario` varchar(100)  ,
	`nivel_acesso_id` int(11) NOT NULL DEFAULT 1 ,
	`bool_ativo_usuario` int(1)  DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO usuario ( `id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES ( 1, 'ADMINISTRADOR', 'ADM', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 1, 1);
INSERT INTO usuario ( `id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES ( 2, 'SITE', 'SIT', '*C737C0A2F678ACBE092353610475CC003320E65E', 1, 1);
INSERT INTO usuario ( `id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES ( 3, 'SJT', 'SJT', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 2, 1);



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


-- Dados da tabela: Nenhum registro




-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
-- Chaves de todas as Tabelas 




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: adicional_site

ALTER TABLE `adicional_site`
	ADD CONSTRAINT `fk_adicional_site<>saiba_mais` FOREIGN KEY (`saiba_mais_id`) REFERENCES `saiba_mais` (`id_saiba_mais`);

ALTER TABLE `adicional_site`
	ADD CONSTRAINT `fk_adicional_site<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: area_nivel_acesso

ALTER TABLE `area_nivel_acesso`
	ADD CONSTRAINT `fk_area_nivel_acesso<>nivel_acesso` FOREIGN KEY (`nivel_acesso_id`) REFERENCES `nivel_acesso` (`id_nivel_acesso`);

ALTER TABLE `area_nivel_acesso`
	ADD CONSTRAINT `fk_area_nivel_acesso<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: cards

ALTER TABLE `cards`
	ADD CONSTRAINT `fk_cards<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: cliente_site

ALTER TABLE `cliente_site`
	ADD CONSTRAINT `fk_cliente_site<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: configurar_site

ALTER TABLE `configurar_site`
	ADD CONSTRAINT `fk_configurar_site<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: contato

ALTER TABLE `contato`
	ADD CONSTRAINT `fk_contato<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: destaque_grupo

ALTER TABLE `destaque_grupo`
	ADD CONSTRAINT `fk_destaque_grupo<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: empresa

ALTER TABLE `empresa`
	ADD CONSTRAINT `fk_empresa<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: endereco_site

ALTER TABLE `endereco_site`
	ADD CONSTRAINT `fk_endereco_site<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: estado

ALTER TABLE `estado`
	ADD CONSTRAINT `fk_estado<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: fotos

ALTER TABLE `fotos`
	ADD CONSTRAINT `fk_fotos<>item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id_item`);

ALTER TABLE `fotos`
	ADD CONSTRAINT `fk_fotos<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: grupo

ALTER TABLE `grupo`
	ADD CONSTRAINT `fk_grupo<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: item

ALTER TABLE `item`
	ADD CONSTRAINT `fk_item<>grupo` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id_grupo`);

ALTER TABLE `item`
	ADD CONSTRAINT `fk_item<>situacao` FOREIGN KEY (`situacao_id`) REFERENCES `situacao` (`id_situacao`);

ALTER TABLE `item`
	ADD CONSTRAINT `fk_item<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: item_orcamento

ALTER TABLE `item_orcamento`
	ADD CONSTRAINT `fk_item_orcamento<>item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id_item`);

ALTER TABLE `item_orcamento`
	ADD CONSTRAINT `fk_item_orcamento<>orcamento` FOREIGN KEY (`orcamento_id`) REFERENCES `orcamento` (`id_orcamento`);

ALTER TABLE `item_orcamento`
	ADD CONSTRAINT `fk_item_orcamento<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: loja

ALTER TABLE `loja`
	ADD CONSTRAINT `fk_loja<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: new_sjt

ALTER TABLE `new_sjt`
	ADD CONSTRAINT `fk_new_SJT<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: nivel_acesso

ALTER TABLE `nivel_acesso`
	ADD CONSTRAINT `fk_nivel_acesso<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: notificacoes

ALTER TABLE `notificacoes`
	ADD CONSTRAINT `fk_notificacoes<>notificacoes_config` FOREIGN KEY (`notificacoes_config_id`) REFERENCES `notificacoes_config` (`id_notificacoes_config`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: notificacoes_config

ALTER TABLE `notificacoes_config`
	ADD CONSTRAINT `fk_notificacoes_config<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: notificacoes_pendentes

ALTER TABLE `notificacoes_pendentes`
	ADD CONSTRAINT `fk_notificacoes_pendentes<>notificacoes_config` FOREIGN KEY (`notificacoes_config_id`) REFERENCES `notificacoes_config` (`id_notificacoes_config`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: notificacoes_salvas

ALTER TABLE `notificacoes_salvas`
	ADD CONSTRAINT `fk_notificacoes_salvas<>notificacoes_config` FOREIGN KEY (`notificacoes_config_id`) REFERENCES `notificacoes_config` (`id_notificacoes_config`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: orcamento

ALTER TABLE `orcamento`
	ADD CONSTRAINT `fk_orcamento<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: paginas

ALTER TABLE `paginas`
	ADD CONSTRAINT `fk_paginas<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: quem_somos

ALTER TABLE `quem_somos`
	ADD CONSTRAINT `fk_quem_somos<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: relatorio_tabela - Nenhuma chave encontrada




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: relatorios - Nenhuma chave encontrada




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: saiba_mais

ALTER TABLE `saiba_mais`
	ADD CONSTRAINT `fk_saiba_mais<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: site - Nenhuma chave encontrada




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: situacao

ALTER TABLE `situacao`
	ADD CONSTRAINT `fk_status<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: slide_show

ALTER TABLE `slide_show`
	ADD CONSTRAINT `fk_slide_show<>item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id_item`);

ALTER TABLE `slide_show`
	ADD CONSTRAINT `fk_slide_show<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: topicos_loja

ALTER TABLE `topicos_loja`
	ADD CONSTRAINT `fk_topicos_loja<>loja` FOREIGN KEY (`loja_id`) REFERENCES `loja` (`id_loja`);

ALTER TABLE `topicos_loja`
	ADD CONSTRAINT `fk_topicos_loja<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: upload_arq - Nenhuma chave encontrada




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: usuario

ALTER TABLE `usuario`
	ADD UNIQUE INDEX `Login` (`login_usuario`);

ALTER TABLE `usuario`
	ADD CONSTRAINT `fk_usuario<>nivel_acesso` FOREIGN KEY (`nivel_acesso_id`) REFERENCES `nivel_acesso` (`id_nivel_acesso`);




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: videos - Nenhuma chave encontrada