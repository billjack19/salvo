
-- Criar tabela tabloteamentos
-- Gerando em: 01/08/2018 16:50:29
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `tabloteamentos`;

CREATE TABLE IF NOT EXISTS `tabloteamentos` (
	`Codigo` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`Nome` varchar(225)  ,
	`AreaTotal` float  ,
	`AreaLoteada` float NOT NULL ,
	`QtdeLotes` int(11)  ,
	`QtdeLotesDisp` varchar(10000)  ,
	`Observacao` int(11)  ,
	`DataAtualizacao` date  ,
	`HoraAtualizacao` char(8)  ,
	`UsuarioAtualizacao` char(3)  ,
	`CaminhoImagem` varchar(500)  ,
	`ObservacaoCorretagem` text  ,
	`TabCoeficiente` int(11)  ,
	`EmpresaLoteamento` varchar(70)  ,
	`CEP` varchar(9)  ,
	`Cidade` int(11)  ,
	`Estado` char(2)  ,
	`ValorTaxaAdministrativa` float  ,
	`ContaCustoComissao` varchar(11)  ,
	`PrazoEscritura` int(11)  ,
	`grupo_conta_Reembolso` int(11)  ,
	`seq_cta_custo_Reembolso` int(11)  ,
	`sub_grupo_Reembolso` int(11)  ,
	`ck_Mostrar_Site` int(1)  ,
	`Latitude` varchar(50)  ,
	`Longitude` varchar(50)  ,
	`DescricaoParaSite` varchar(4000)  ,
	`DescricaoResumidaParaSite` varchar(4000)  ,
	`IR_CNPJ_EMPRESA` varchar(30)  ,
	`IR_PRAZO_ESCLARECIMENTOS` date  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO tabloteamentos ( `Codigo`, `Nome`, `AreaTotal`, `AreaLoteada`, `QtdeLotes`, `QtdeLotesDisp`, `Observacao`, `DataAtualizacao`, `HoraAtualizacao`, `UsuarioAtualizacao`, `CaminhoImagem`, `ObservacaoCorretagem`, `TabCoeficiente`, `EmpresaLoteamento`, `CEP`, `Cidade`, `Estado`, `ValorTaxaAdministrativa`, `ContaCustoComissao`, `PrazoEscritura`, `grupo_conta_Reembolso`, `seq_cta_custo_Reembolso`, `sub_grupo_Reembolso`, `ck_Mostrar_Site`, `Latitude`, `Longitude`, `DescricaoParaSite`, `DescricaoResumidaParaSite`, `IR_CNPJ_EMPRESA`, `IR_PRAZO_ESCLARECIMENTOS`) VALUES ( 1, 'Residencial Tiradentes', 245628, 109036, 330, '111', , '0000-00-00', '09:47:00', 'MLC', '\servercExecContas a ReceberLotes4.jpg', '', 1, 'CONSTRUTORA BROTHERS LTDA.', '37701000', 2847, 'MG', 2.5, '901.001.012', 6, 901, 11, 11, 1, '-21.830809', '-46.578784', '', '', '', ''
);
INSERT INTO tabloteamentos ( `Codigo`, `Nome`, `AreaTotal`, `AreaLoteada`, `QtdeLotes`, `QtdeLotesDisp`, `Observacao`, `DataAtualizacao`, `HoraAtualizacao`, `UsuarioAtualizacao`, `CaminhoImagem`, `ObservacaoCorretagem`, `TabCoeficiente`, `EmpresaLoteamento`, `CEP`, `Cidade`, `Estado`, `ValorTaxaAdministrativa`, `ContaCustoComissao`, `PrazoEscritura`, `grupo_conta_Reembolso`, `seq_cta_custo_Reembolso`, `sub_grupo_Reembolso`, `ck_Mostrar_Site`, `Latitude`, `Longitude`, `DescricaoParaSite`, `DescricaoResumidaParaSite`, `IR_CNPJ_EMPRESA`, `IR_PRAZO_ESCLARECIMENTOS`) VALUES ( 2, 'Loteamento Jardim São Bento', 358699, 1706.53, 8, '7', , '0000-00-00', '09:47:00', 'MLC', '', '', 3, 'FORMAT FORNECEDORA DE MATERIAIS LTDA', '37701030', 2847, 'MG', 0, '', 6, 901, 11, 11, 0, '', '', '', '', '', ''
);
INSERT INTO tabloteamentos ( `Codigo`, `Nome`, `AreaTotal`, `AreaLoteada`, `QtdeLotes`, `QtdeLotesDisp`, `Observacao`, `DataAtualizacao`, `HoraAtualizacao`, `UsuarioAtualizacao`, `CaminhoImagem`, `ObservacaoCorretagem`, `TabCoeficiente`, `EmpresaLoteamento`, `CEP`, `Cidade`, `Estado`, `ValorTaxaAdministrativa`, `ContaCustoComissao`, `PrazoEscritura`, `grupo_conta_Reembolso`, `seq_cta_custo_Reembolso`, `sub_grupo_Reembolso`, `ck_Mostrar_Site`, `Latitude`, `Longitude`, `DescricaoParaSite`, `DescricaoResumidaParaSite`, `IR_CNPJ_EMPRESA`, `IR_PRAZO_ESCLARECIMENTOS`) VALUES ( 3, 'Loteamento Jardim Santa Teresa', 237760, 33479.3, 118, '16', , '0000-00-00', '09:47:00', 'MLC', '', '', 4, 'LOTEAMENTO JARDIM SANTA TEREZA SPE LTDA.', '37701030', 2847, 'MG', 0, '', 6, 901, 11, 11, 0, '', '', '', '', '', ''
);
INSERT INTO tabloteamentos ( `Codigo`, `Nome`, `AreaTotal`, `AreaLoteada`, `QtdeLotes`, `QtdeLotesDisp`, `Observacao`, `DataAtualizacao`, `HoraAtualizacao`, `UsuarioAtualizacao`, `CaminhoImagem`, `ObservacaoCorretagem`, `TabCoeficiente`, `EmpresaLoteamento`, `CEP`, `Cidade`, `Estado`, `ValorTaxaAdministrativa`, `ContaCustoComissao`, `PrazoEscritura`, `grupo_conta_Reembolso`, `seq_cta_custo_Reembolso`, `sub_grupo_Reembolso`, `ck_Mostrar_Site`, `Latitude`, `Longitude`, `DescricaoParaSite`, `DescricaoResumidaParaSite`, `IR_CNPJ_EMPRESA`, `IR_PRAZO_ESCLARECIMENTOS`) VALUES ( 4, 'Monte Verde II', 123077, 3126.24, 4, '4', , '0000-00-00', '09:47:00', 'MLC', '', '', 0, 'Imobiliária Rex Ltda', '37701030', 2847, 'MG', 0, '', 6, 901, 11, 11, 0, '', '', '', '', '', ''
);
INSERT INTO tabloteamentos ( `Codigo`, `Nome`, `AreaTotal`, `AreaLoteada`, `QtdeLotes`, `QtdeLotesDisp`, `Observacao`, `DataAtualizacao`, `HoraAtualizacao`, `UsuarioAtualizacao`, `CaminhoImagem`, `ObservacaoCorretagem`, `TabCoeficiente`, `EmpresaLoteamento`, `CEP`, `Cidade`, `Estado`, `ValorTaxaAdministrativa`, `ContaCustoComissao`, `PrazoEscritura`, `grupo_conta_Reembolso`, `seq_cta_custo_Reembolso`, `sub_grupo_Reembolso`, `ck_Mostrar_Site`, `Latitude`, `Longitude`, `DescricaoParaSite`, `DescricaoResumidaParaSite`, `IR_CNPJ_EMPRESA`, `IR_PRAZO_ESCLARECIMENTOS`) VALUES ( 5, 'Loteamento Alfa', 20475.6, 6367.9, 21, '1', , '0000-00-00', '09:47:00', 'MLC', '', '', 6, 'Construtora Brothers Ltda.', '37701030', 2847, 'MG', 0, '', 6, 901, 11, 11, 0, '', '', '', '', '', ''
);
INSERT INTO tabloteamentos ( `Codigo`, `Nome`, `AreaTotal`, `AreaLoteada`, `QtdeLotes`, `QtdeLotesDisp`, `Observacao`, `DataAtualizacao`, `HoraAtualizacao`, `UsuarioAtualizacao`, `CaminhoImagem`, `ObservacaoCorretagem`, `TabCoeficiente`, `EmpresaLoteamento`, `CEP`, `Cidade`, `Estado`, `ValorTaxaAdministrativa`, `ContaCustoComissao`, `PrazoEscritura`, `grupo_conta_Reembolso`, `seq_cta_custo_Reembolso`, `sub_grupo_Reembolso`, `ck_Mostrar_Site`, `Latitude`, `Longitude`, `DescricaoParaSite`, `DescricaoResumidaParaSite`, `IR_CNPJ_EMPRESA`, `IR_PRAZO_ESCLARECIMENTOS`) VALUES ( 6, 'Jardim Itamaraty V', 1, 716.04, 4, '4', , '0000-00-00', '09:48:00', 'MLC', '', '', 7, 'Flama Imóveis e Administração Ltda.', '37701030', 2847, 'MG', 0, '', 6, 901, 11, 11, 0, '', '', '', '', '', ''
);
INSERT INTO tabloteamentos ( `Codigo`, `Nome`, `AreaTotal`, `AreaLoteada`, `QtdeLotes`, `QtdeLotesDisp`, `Observacao`, `DataAtualizacao`, `HoraAtualizacao`, `UsuarioAtualizacao`, `CaminhoImagem`, `ObservacaoCorretagem`, `TabCoeficiente`, `EmpresaLoteamento`, `CEP`, `Cidade`, `Estado`, `ValorTaxaAdministrativa`, `ContaCustoComissao`, `PrazoEscritura`, `grupo_conta_Reembolso`, `seq_cta_custo_Reembolso`, `sub_grupo_Reembolso`, `ck_Mostrar_Site`, `Latitude`, `Longitude`, `DescricaoParaSite`, `DescricaoResumidaParaSite`, `IR_CNPJ_EMPRESA`, `IR_PRAZO_ESCLARECIMENTOS`) VALUES ( 7, 'Loteamento Residencial Veredas', 96800, 41861.9, 145, '9', 16994, '0000-00-00', '09:47:00', 'MLC', '', '', 8, 'Loteamento Residencial Veredas SPE LTDA', '37701030', 2847, 'MG', 2.5, '901.002.012', 2, 901, 11, 11, 1, '-21.791673', '-46.607791', '', '', '', ''
);
INSERT INTO tabloteamentos ( `Codigo`, `Nome`, `AreaTotal`, `AreaLoteada`, `QtdeLotes`, `QtdeLotesDisp`, `Observacao`, `DataAtualizacao`, `HoraAtualizacao`, `UsuarioAtualizacao`, `CaminhoImagem`, `ObservacaoCorretagem`, `TabCoeficiente`, `EmpresaLoteamento`, `CEP`, `Cidade`, `Estado`, `ValorTaxaAdministrativa`, `ContaCustoComissao`, `PrazoEscritura`, `grupo_conta_Reembolso`, `seq_cta_custo_Reembolso`, `sub_grupo_Reembolso`, `ck_Mostrar_Site`, `Latitude`, `Longitude`, `DescricaoParaSite`, `DescricaoResumidaParaSite`, `IR_CNPJ_EMPRESA`, `IR_PRAZO_ESCLARECIMENTOS`) VALUES ( 8, 'Lot. São Bento - Botelhos', 760610, 17402.2, 100, '20', , '0000-00-00', '09:47:00', 'MLC', '', '', 9, 'Construtora Brothers Ltda.', '37720000', 2332, 'MG', 2.5, '901.003.012', 2, 901, 11, 11, 1, '', '', '', '', '', ''
);
INSERT INTO tabloteamentos ( `Codigo`, `Nome`, `AreaTotal`, `AreaLoteada`, `QtdeLotes`, `QtdeLotesDisp`, `Observacao`, `DataAtualizacao`, `HoraAtualizacao`, `UsuarioAtualizacao`, `CaminhoImagem`, `ObservacaoCorretagem`, `TabCoeficiente`, `EmpresaLoteamento`, `CEP`, `Cidade`, `Estado`, `ValorTaxaAdministrativa`, `ContaCustoComissao`, `PrazoEscritura`, `grupo_conta_Reembolso`, `seq_cta_custo_Reembolso`, `sub_grupo_Reembolso`, `ck_Mostrar_Site`, `Latitude`, `Longitude`, `DescricaoParaSite`, `DescricaoResumidaParaSite`, `IR_CNPJ_EMPRESA`, `IR_PRAZO_ESCLARECIMENTOS`) VALUES ( 9, 'Loteamento Res. Centreville', 132982, 41085.4, 117, '22', , '0000-00-00', '14:10:00', 'SEL', '', '', 10, 'Loteamento Centreville SPE LTDA EPP', '37701030', 1, 'MG', 0, '', 2, 901, 11, 11, 1, '-21.801086', '-46.595691', '', '', '', ''
);
INSERT INTO tabloteamentos ( `Codigo`, `Nome`, `AreaTotal`, `AreaLoteada`, `QtdeLotes`, `QtdeLotesDisp`, `Observacao`, `DataAtualizacao`, `HoraAtualizacao`, `UsuarioAtualizacao`, `CaminhoImagem`, `ObservacaoCorretagem`, `TabCoeficiente`, `EmpresaLoteamento`, `CEP`, `Cidade`, `Estado`, `ValorTaxaAdministrativa`, `ContaCustoComissao`, `PrazoEscritura`, `grupo_conta_Reembolso`, `seq_cta_custo_Reembolso`, `sub_grupo_Reembolso`, `ck_Mostrar_Site`, `Latitude`, `Longitude`, `DescricaoParaSite`, `DescricaoResumidaParaSite`, `IR_CNPJ_EMPRESA`, `IR_PRAZO_ESCLARECIMENTOS`) VALUES ( 10, 'Loteamento Jardins de Florença', 274084, 0, 0, '0', , '0000-00-00', '09:48:00', 'MLC', '', '', 0, 'Empreendimento Imobiliario Alpha SPE Ltda', '37701030', 2847, 'MG', 0, '', 2, 901, 11, 11, 0, '', '', '', '', '', ''
);