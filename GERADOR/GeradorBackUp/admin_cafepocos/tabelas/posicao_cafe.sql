
-- Criar tabela posicao_cafe
-- Gerando em: 01/08/2018 16:53:39
-- Pelo Gerador JK-19

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
INSERT INTO posicao_cafe ( `id_posicao_cafe`, `cliente`, `fazenda`, `cidade`, `insc_est`, `safra`, `lote`, `lote_cliente`, `entrada`, `nfe_fiscal`, `padrao`, `preparo`, `kilos`, `sacas`, `per_umi`, `per_imp`, `per_cat`, `per_def`, `cert`, `data_atualizacao`) VALUES ( 1, 1, 'teste', 'teste', 'teste', '2013', 'teste', 'teste', '2018-01-19 00:00:00', '123', '', '', 13, 13, 2, 1, 1, 1, '', '2018-01-19 17:32:46'
);
INSERT INTO posicao_cafe ( `id_posicao_cafe`, `cliente`, `fazenda`, `cidade`, `insc_est`, `safra`, `lote`, `lote_cliente`, `entrada`, `nfe_fiscal`, `padrao`, `preparo`, `kilos`, `sacas`, `per_umi`, `per_imp`, `per_cat`, `per_def`, `cert`, `data_atualizacao`) VALUES ( 2, 1, 'teste', 'teste', 'teste', '2013', 'teste', 'teste', '2018-01-18 00:00:00', '53445', '', '', 14, 41, 1, 1, 1, , '', '2018-01-19 17:32:46'
);
INSERT INTO posicao_cafe ( `id_posicao_cafe`, `cliente`, `fazenda`, `cidade`, `insc_est`, `safra`, `lote`, `lote_cliente`, `entrada`, `nfe_fiscal`, `padrao`, `preparo`, `kilos`, `sacas`, `per_umi`, `per_imp`, `per_cat`, `per_def`, `cert`, `data_atualizacao`) VALUES ( 3, 1, 'teste', 'teste', 'teste', '2014', 'teste', 'teste', '2018-01-25 00:00:00', '45678', '', '', 32, 12, , , , , '', '2018-01-19 17:32:46'
);
INSERT INTO posicao_cafe ( `id_posicao_cafe`, `cliente`, `fazenda`, `cidade`, `insc_est`, `safra`, `lote`, `lote_cliente`, `entrada`, `nfe_fiscal`, `padrao`, `preparo`, `kilos`, `sacas`, `per_umi`, `per_imp`, `per_cat`, `per_def`, `cert`, `data_atualizacao`) VALUES ( 4, 1, 'teste2', 'teste', 'teste', '2014', 'teste', 'teste', '2018-01-18 00:00:00', '123432', '', '', 53, 43, , , , , '', '2018-01-19 17:32:46'
);
INSERT INTO posicao_cafe ( `id_posicao_cafe`, `cliente`, `fazenda`, `cidade`, `insc_est`, `safra`, `lote`, `lote_cliente`, `entrada`, `nfe_fiscal`, `padrao`, `preparo`, `kilos`, `sacas`, `per_umi`, `per_imp`, `per_cat`, `per_def`, `cert`, `data_atualizacao`) VALUES ( 5, 1, 'teste2', 'teste', 'teste', '2012', 'teste', 'teste', '2018-01-24 00:00:00', '123', '', '', 312, 2, , , , , '', '2018-01-19 17:32:46'
);
INSERT INTO posicao_cafe ( `id_posicao_cafe`, `cliente`, `fazenda`, `cidade`, `insc_est`, `safra`, `lote`, `lote_cliente`, `entrada`, `nfe_fiscal`, `padrao`, `preparo`, `kilos`, `sacas`, `per_umi`, `per_imp`, `per_cat`, `per_def`, `cert`, `data_atualizacao`) VALUES ( 6, 94352, '-', '', '', '2013/2014', '059209-1 -P', '', '2016-12-14 00:00:00', '002497', '', '17/19', 1980, 33, , , , , '', '2018-01-22 15:30:47'
);
INSERT INTO posicao_cafe ( `id_posicao_cafe`, `cliente`, `fazenda`, `cidade`, `insc_est`, `safra`, `lote`, `lote_cliente`, `entrada`, `nfe_fiscal`, `padrao`, `preparo`, `kilos`, `sacas`, `per_umi`, `per_imp`, `per_cat`, `per_def`, `cert`, `data_atualizacao`) VALUES ( 7, 94352, '-', '', '', '2013/2014', '059305-1 -P', '', '2017-01-31 00:00:00', '002541', '', 'SLD EMB', 150.3, 2.51, , 0, , , '', '2018-01-22 15:30:47'
);
INSERT INTO posicao_cafe ( `id_posicao_cafe`, `cliente`, `fazenda`, `cidade`, `insc_est`, `safra`, `lote`, `lote_cliente`, `entrada`, `nfe_fiscal`, `padrao`, `preparo`, `kilos`, `sacas`, `per_umi`, `per_imp`, `per_cat`, `per_def`, `cert`, `data_atualizacao`) VALUES ( 8, 94352, '-', '', '', '2013/2014', '059306-2 -P', '', '2017-02-01 00:00:00', '002542', '', 'SLD LIG', 40, 0.67, , 0, , , '', '2018-01-22 15:30:47'
);
INSERT INTO posicao_cafe ( `id_posicao_cafe`, `cliente`, `fazenda`, `cidade`, `insc_est`, `safra`, `lote`, `lote_cliente`, `entrada`, `nfe_fiscal`, `padrao`, `preparo`, `kilos`, `sacas`, `per_umi`, `per_imp`, `per_cat`, `per_def`, `cert`, `data_atualizacao`) VALUES ( 9, 94352, '-', '', '', '2016/2017', '058788-5 -P', '58237-A', '2016-09-21 00:00:00', '200030', '', 'B/C', 300, 5, 0, 0, , , '', '2018-01-22 15:30:47'
);
INSERT INTO posicao_cafe ( `id_posicao_cafe`, `cliente`, `fazenda`, `cidade`, `insc_est`, `safra`, `lote`, `lote_cliente`, `entrada`, `nfe_fiscal`, `padrao`, `preparo`, `kilos`, `sacas`, `per_umi`, `per_imp`, `per_cat`, `per_def`, `cert`, `data_atualizacao`) VALUES ( 10, 94352, '-', '', '', '2016/2017', '059158-A-P', '59153-A', '2016-12-01 00:00:00', '931182', '', 'B/C', 240, 4, 0, 0, , , '', '2018-01-22 15:30:47'
);