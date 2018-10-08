
-- Criar tabela quem_somos
-- Gerando em: 01/08/2018 16:54:49
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
INSERT INTO quem_somos ( `id_quem_somos`, `titulo_quem_somos`, `descricao_quem_somos`, `imagem_quem_somos`, `data_atualizacao_quem_somos`, `bool_ativo_quem_somos`) VALUES ( 1, 'Sobre A Minas System', '<p>
A Minas System é uma empresa de distribuição de produtos de CFTV e Segurança. Possuímos uma grande experiência nessa setor, conhecemos este mercado e sabemos do desafio que o Revendedor enfrenta diariamente. Viemos com o compromisso de estreitar o relacionamento entre o Fabricante e você Revendedor, oferecendo um atendimento personalizado e um pós-venda diferenciado. Representamos grandes marcas no mercado, disponibilizando soluções que atendam com eficiência e investimentos acessíveis às necessidades do seu cliente.</p>
<br>
<p>
Estamos também à disposição para desenvolver e orientar, sempre que houver necessidade, na elaboração de projetos de segurança em ambientes corporativos e em ambientes residenciais, a nossa meta é estabelecer uma parceria longa e próspera. Tenha a certeza revendedor, que você encontrou um distribuidor que não procura somente realizar uma venda, mas um parceiro de negócios que vai trabalhar junto com você.
</p>
<br>
<p>Venha nos visita, estamos te aguardando.</p>', 'LogoLg.png', '2018-06-22 16:43:39', 1
);