
-- Criar tabela tabusuarios
-- Gerando em: 01/08/2018 16:50:29
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `tabusuarios`;

CREATE TABLE IF NOT EXISTS `tabusuarios` (
	`Identificacao` char(3) NOT NULL PRIMARY KEY ,
	`Nome` varchar(30)  ,
	`Senha` char(10)  ,
	`Administracao` int(1)  ,
	`FILIAL` int(11)  ,
	`AlteraFilial` int(1)  ,
	`AlteraFinanceiro` int(1)  ,
	`Diretoria` int(1)  ,
	`Perc_Descontos` float  ,
	`Perc_Juros` float  ,
	`Atendente` int(11)  ,
	`Palm` int(1)  ,
	`Vendedor` int(11)  ,
	`ControlaOP` int(1)  ,
	`Master` int(1)  ,
	`ConsultaPedidos` int(1)  ,
	`Inativo` int(1)  ,
	`ControleAutorizacaoCompras` int(1)  ,
	`ValorMaxSolicitacao` float  ,
	`ValorMaxCotacao` float  ,
	`DescontoNF` float  ,
	`ValorMaxOrdemCompra` float  ,
	`AutorizacaoReabrePedido` int(1)  ,
	`DATAATUALIZACAO` datetime  ,
	`HORAATUALIZACAO` char(8)  ,
	`USUARIOATUALIZACAO` char(3)  ,
	`DATAATUALIZACAO_Alteracao` datetime  ,
	`HORAATUALIZACAO_Alteracao` char(8)  ,
	`USUARIOATUALIZACAO_Alteracao` char(3)  ,
	`AutorizaAtualizacoes` int(1)  ,
	`MostrarConsultaCompras` int(1)  ,
	`NaoAlteraDataPagto` int(1)  ,
	`EncerraReclamacao` int(1)  ,
	`DistribuiReclamacao` int(1)  ,
	`IncluiFoto` int(1)  ,
	`ExcluiFoto` int(1)  ,
	`Valor_Descontos` float  ,
	`ConsultaGeracaoCompras` int(1)  ,
	`ControlaLogistica` int(1)  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO tabusuarios ( `Identificacao`, `Nome`, `Senha`, `Administracao`, `FILIAL`, `AlteraFilial`, `AlteraFinanceiro`, `Diretoria`, `Perc_Descontos`, `Perc_Juros`, `Atendente`, `Palm`, `Vendedor`, `ControlaOP`, `Master`, `ConsultaPedidos`, `Inativo`, `ControleAutorizacaoCompras`, `ValorMaxSolicitacao`, `ValorMaxCotacao`, `DescontoNF`, `ValorMaxOrdemCompra`, `AutorizacaoReabrePedido`, `DATAATUALIZACAO`, `HORAATUALIZACAO`, `USUARIOATUALIZACAO`, `DATAATUALIZACAO_Alteracao`, `HORAATUALIZACAO_Alteracao`, `USUARIOATUALIZACAO_Alteracao`, `AutorizaAtualizacoes`, `MostrarConsultaCompras`, `NaoAlteraDataPagto`, `EncerraReclamacao`, `DistribuiReclamacao`, `IncluiFoto`, `ExcluiFoto`, `Valor_Descontos`, `ConsultaGeracaoCompras`, `ControlaLogistica`) VALUES ( 'ADM', 'ADMINISTRADOR', 'ADMMDA', 1, 1, 1, 1, 1, 30, , , 0, , 1, 1, 0, 0, 0, , , , 0, 0, '', '', '', '0000-00-00 00:00:00', '13:44:00', 'ADM', 1, 0, 0, 0, 0, 0, 0, , 0, 0
);
INSERT INTO tabusuarios ( `Identificacao`, `Nome`, `Senha`, `Administracao`, `FILIAL`, `AlteraFilial`, `AlteraFinanceiro`, `Diretoria`, `Perc_Descontos`, `Perc_Juros`, `Atendente`, `Palm`, `Vendedor`, `ControlaOP`, `Master`, `ConsultaPedidos`, `Inativo`, `ControleAutorizacaoCompras`, `ValorMaxSolicitacao`, `ValorMaxCotacao`, `DescontoNF`, `ValorMaxOrdemCompra`, `AutorizacaoReabrePedido`, `DATAATUALIZACAO`, `HORAATUALIZACAO`, `USUARIOATUALIZACAO`, `DATAATUALIZACAO_Alteracao`, `HORAATUALIZACAO_Alteracao`, `USUARIOATUALIZACAO_Alteracao`, `AutorizaAtualizacoes`, `MostrarConsultaCompras`, `NaoAlteraDataPagto`, `EncerraReclamacao`, `DistribuiReclamacao`, `IncluiFoto`, `ExcluiFoto`, `Valor_Descontos`, `ConsultaGeracaoCompras`, `ControlaLogistica`) VALUES ( 'ADR', 'ADRIANA', '5667', 1, 1, 1, 1, 1, 0, 0, , 0, , 1, 1, 0, 0, 0, , , 0, 0, 0, '', '', '', '0000-00-00 00:00:00', '15:29:00', 'ADM', 1, 0, 0, 0, 0, 0, 0, , 0, 0
);
INSERT INTO tabusuarios ( `Identificacao`, `Nome`, `Senha`, `Administracao`, `FILIAL`, `AlteraFilial`, `AlteraFinanceiro`, `Diretoria`, `Perc_Descontos`, `Perc_Juros`, `Atendente`, `Palm`, `Vendedor`, `ControlaOP`, `Master`, `ConsultaPedidos`, `Inativo`, `ControleAutorizacaoCompras`, `ValorMaxSolicitacao`, `ValorMaxCotacao`, `DescontoNF`, `ValorMaxOrdemCompra`, `AutorizacaoReabrePedido`, `DATAATUALIZACAO`, `HORAATUALIZACAO`, `USUARIOATUALIZACAO`, `DATAATUALIZACAO_Alteracao`, `HORAATUALIZACAO_Alteracao`, `USUARIOATUALIZACAO_Alteracao`, `AutorizaAtualizacoes`, `MostrarConsultaCompras`, `NaoAlteraDataPagto`, `EncerraReclamacao`, `DistribuiReclamacao`, `IncluiFoto`, `ExcluiFoto`, `Valor_Descontos`, `ConsultaGeracaoCompras`, `ControlaLogistica`) VALUES ( 'ALE', 'ALEXANDRE', '123', 1, 1, 1, 1, 1, 0, 0, , 0, , 1, 1, 0, 0, 0, , , 0, 0, 0, '', '', '', '0000-00-00 00:00:00', '14:56:00', 'FPV', 1, 0, 0, 0, 0, 0, 0, , 0, 0
);
INSERT INTO tabusuarios ( `Identificacao`, `Nome`, `Senha`, `Administracao`, `FILIAL`, `AlteraFilial`, `AlteraFinanceiro`, `Diretoria`, `Perc_Descontos`, `Perc_Juros`, `Atendente`, `Palm`, `Vendedor`, `ControlaOP`, `Master`, `ConsultaPedidos`, `Inativo`, `ControleAutorizacaoCompras`, `ValorMaxSolicitacao`, `ValorMaxCotacao`, `DescontoNF`, `ValorMaxOrdemCompra`, `AutorizacaoReabrePedido`, `DATAATUALIZACAO`, `HORAATUALIZACAO`, `USUARIOATUALIZACAO`, `DATAATUALIZACAO_Alteracao`, `HORAATUALIZACAO_Alteracao`, `USUARIOATUALIZACAO_Alteracao`, `AutorizaAtualizacoes`, `MostrarConsultaCompras`, `NaoAlteraDataPagto`, `EncerraReclamacao`, `DistribuiReclamacao`, `IncluiFoto`, `ExcluiFoto`, `Valor_Descontos`, `ConsultaGeracaoCompras`, `ControlaLogistica`) VALUES ( 'BEN', 'BENI', '1303', 0, 1, 1, 1, 0, 0, 0, , 0, , 1, 0, 0, 0, 0, , , 0, 0, 0, '', '', '', '0000-00-00 00:00:00', '15:28:00', 'ADM', 0, 0, 0, 0, 0, 0, 0, , 0, 0
);
INSERT INTO tabusuarios ( `Identificacao`, `Nome`, `Senha`, `Administracao`, `FILIAL`, `AlteraFilial`, `AlteraFinanceiro`, `Diretoria`, `Perc_Descontos`, `Perc_Juros`, `Atendente`, `Palm`, `Vendedor`, `ControlaOP`, `Master`, `ConsultaPedidos`, `Inativo`, `ControleAutorizacaoCompras`, `ValorMaxSolicitacao`, `ValorMaxCotacao`, `DescontoNF`, `ValorMaxOrdemCompra`, `AutorizacaoReabrePedido`, `DATAATUALIZACAO`, `HORAATUALIZACAO`, `USUARIOATUALIZACAO`, `DATAATUALIZACAO_Alteracao`, `HORAATUALIZACAO_Alteracao`, `USUARIOATUALIZACAO_Alteracao`, `AutorizaAtualizacoes`, `MostrarConsultaCompras`, `NaoAlteraDataPagto`, `EncerraReclamacao`, `DistribuiReclamacao`, `IncluiFoto`, `ExcluiFoto`, `Valor_Descontos`, `ConsultaGeracaoCompras`, `ControlaLogistica`) VALUES ( 'CAT', 'CATARINA', '0209672', 1, 1, 1, 1, 1, 0, 0, , 0, , 1, 1, 0, 0, 0, , , 0, 0, 0, '', '', '', '0000-00-00 00:00:00', '15:28:00', 'ADM', 1, 0, 0, 0, 0, 0, 0, , 0, 0
);
INSERT INTO tabusuarios ( `Identificacao`, `Nome`, `Senha`, `Administracao`, `FILIAL`, `AlteraFilial`, `AlteraFinanceiro`, `Diretoria`, `Perc_Descontos`, `Perc_Juros`, `Atendente`, `Palm`, `Vendedor`, `ControlaOP`, `Master`, `ConsultaPedidos`, `Inativo`, `ControleAutorizacaoCompras`, `ValorMaxSolicitacao`, `ValorMaxCotacao`, `DescontoNF`, `ValorMaxOrdemCompra`, `AutorizacaoReabrePedido`, `DATAATUALIZACAO`, `HORAATUALIZACAO`, `USUARIOATUALIZACAO`, `DATAATUALIZACAO_Alteracao`, `HORAATUALIZACAO_Alteracao`, `USUARIOATUALIZACAO_Alteracao`, `AutorizaAtualizacoes`, `MostrarConsultaCompras`, `NaoAlteraDataPagto`, `EncerraReclamacao`, `DistribuiReclamacao`, `IncluiFoto`, `ExcluiFoto`, `Valor_Descontos`, `ConsultaGeracaoCompras`, `ControlaLogistica`) VALUES ( 'ELA', 'ELAINE', '1858', 0, 1, 1, 1, 0, 0, 0, , 0, , 1, 0, 0, 0, 0, , , 0, 0, 0, '', '', '', '0000-00-00 00:00:00', '15:29:00', 'ADM', 0, 0, 0, 0, 0, 0, 0, , 0, 0
);
INSERT INTO tabusuarios ( `Identificacao`, `Nome`, `Senha`, `Administracao`, `FILIAL`, `AlteraFilial`, `AlteraFinanceiro`, `Diretoria`, `Perc_Descontos`, `Perc_Juros`, `Atendente`, `Palm`, `Vendedor`, `ControlaOP`, `Master`, `ConsultaPedidos`, `Inativo`, `ControleAutorizacaoCompras`, `ValorMaxSolicitacao`, `ValorMaxCotacao`, `DescontoNF`, `ValorMaxOrdemCompra`, `AutorizacaoReabrePedido`, `DATAATUALIZACAO`, `HORAATUALIZACAO`, `USUARIOATUALIZACAO`, `DATAATUALIZACAO_Alteracao`, `HORAATUALIZACAO_Alteracao`, `USUARIOATUALIZACAO_Alteracao`, `AutorizaAtualizacoes`, `MostrarConsultaCompras`, `NaoAlteraDataPagto`, `EncerraReclamacao`, `DistribuiReclamacao`, `IncluiFoto`, `ExcluiFoto`, `Valor_Descontos`, `ConsultaGeracaoCompras`, `ControlaLogistica`) VALUES ( 'FER', 'FERNANDA', '123', 0, 8, 0, 0, 0, 0, 0, 0, 0, , 0, 0, 0, 0, 0, , , 0, 0, 0, '0000-00-00 00:00:00', '07:47:00', 'CAT', '', '', '', 0, 0, 0, 0, 0, 0, 0, , 0, 0
);
INSERT INTO tabusuarios ( `Identificacao`, `Nome`, `Senha`, `Administracao`, `FILIAL`, `AlteraFilial`, `AlteraFinanceiro`, `Diretoria`, `Perc_Descontos`, `Perc_Juros`, `Atendente`, `Palm`, `Vendedor`, `ControlaOP`, `Master`, `ConsultaPedidos`, `Inativo`, `ControleAutorizacaoCompras`, `ValorMaxSolicitacao`, `ValorMaxCotacao`, `DescontoNF`, `ValorMaxOrdemCompra`, `AutorizacaoReabrePedido`, `DATAATUALIZACAO`, `HORAATUALIZACAO`, `USUARIOATUALIZACAO`, `DATAATUALIZACAO_Alteracao`, `HORAATUALIZACAO_Alteracao`, `USUARIOATUALIZACAO_Alteracao`, `AutorizaAtualizacoes`, `MostrarConsultaCompras`, `NaoAlteraDataPagto`, `EncerraReclamacao`, `DistribuiReclamacao`, `IncluiFoto`, `ExcluiFoto`, `Valor_Descontos`, `ConsultaGeracaoCompras`, `ControlaLogistica`) VALUES ( 'FPV', 'FLAVIA', '3064', 1, 1, 1, 1, 1, 0, 0, , 0, , 1, 1, 0, 0, 0, , , 0, 0, 0, '', '', '', '0000-00-00 00:00:00', '14:57:00', 'FPV', 1, 0, 0, 0, 0, 0, 0, , 0, 0
);
INSERT INTO tabusuarios ( `Identificacao`, `Nome`, `Senha`, `Administracao`, `FILIAL`, `AlteraFilial`, `AlteraFinanceiro`, `Diretoria`, `Perc_Descontos`, `Perc_Juros`, `Atendente`, `Palm`, `Vendedor`, `ControlaOP`, `Master`, `ConsultaPedidos`, `Inativo`, `ControleAutorizacaoCompras`, `ValorMaxSolicitacao`, `ValorMaxCotacao`, `DescontoNF`, `ValorMaxOrdemCompra`, `AutorizacaoReabrePedido`, `DATAATUALIZACAO`, `HORAATUALIZACAO`, `USUARIOATUALIZACAO`, `DATAATUALIZACAO_Alteracao`, `HORAATUALIZACAO_Alteracao`, `USUARIOATUALIZACAO_Alteracao`, `AutorizaAtualizacoes`, `MostrarConsultaCompras`, `NaoAlteraDataPagto`, `EncerraReclamacao`, `DistribuiReclamacao`, `IncluiFoto`, `ExcluiFoto`, `Valor_Descontos`, `ConsultaGeracaoCompras`, `ControlaLogistica`) VALUES ( 'KAT', 'KATIA', '1995162', 0, 1, 0, 0, 0, 0, 0, , 0, , 0, 0, 0, 1, 0, , , 0, 0, 0, '0000-00-00 00:00:00', '13:47:00', 'FPV', '0000-00-00 00:00:00', '14:57:00', 'FPV', 0, 0, 0, 0, 0, 0, 0, , 0, 0
);
INSERT INTO tabusuarios ( `Identificacao`, `Nome`, `Senha`, `Administracao`, `FILIAL`, `AlteraFilial`, `AlteraFinanceiro`, `Diretoria`, `Perc_Descontos`, `Perc_Juros`, `Atendente`, `Palm`, `Vendedor`, `ControlaOP`, `Master`, `ConsultaPedidos`, `Inativo`, `ControleAutorizacaoCompras`, `ValorMaxSolicitacao`, `ValorMaxCotacao`, `DescontoNF`, `ValorMaxOrdemCompra`, `AutorizacaoReabrePedido`, `DATAATUALIZACAO`, `HORAATUALIZACAO`, `USUARIOATUALIZACAO`, `DATAATUALIZACAO_Alteracao`, `HORAATUALIZACAO_Alteracao`, `USUARIOATUALIZACAO_Alteracao`, `AutorizaAtualizacoes`, `MostrarConsultaCompras`, `NaoAlteraDataPagto`, `EncerraReclamacao`, `DistribuiReclamacao`, `IncluiFoto`, `ExcluiFoto`, `Valor_Descontos`, `ConsultaGeracaoCompras`, `ControlaLogistica`) VALUES ( 'LAI', 'LAISSA', '123', 0, 1, 1, 1, 0, 0, 0, 0, 0, , 1, 0, 0, 0, 0, , , 0, 0, 0, '0000-00-00 00:00:00', '15:22:00', 'ADM', '0000-00-00 00:00:00', '15:22:00', 'ADM', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0
);
INSERT INTO tabusuarios ( `Identificacao`, `Nome`, `Senha`, `Administracao`, `FILIAL`, `AlteraFilial`, `AlteraFinanceiro`, `Diretoria`, `Perc_Descontos`, `Perc_Juros`, `Atendente`, `Palm`, `Vendedor`, `ControlaOP`, `Master`, `ConsultaPedidos`, `Inativo`, `ControleAutorizacaoCompras`, `ValorMaxSolicitacao`, `ValorMaxCotacao`, `DescontoNF`, `ValorMaxOrdemCompra`, `AutorizacaoReabrePedido`, `DATAATUALIZACAO`, `HORAATUALIZACAO`, `USUARIOATUALIZACAO`, `DATAATUALIZACAO_Alteracao`, `HORAATUALIZACAO_Alteracao`, `USUARIOATUALIZACAO_Alteracao`, `AutorizaAtualizacoes`, `MostrarConsultaCompras`, `NaoAlteraDataPagto`, `EncerraReclamacao`, `DistribuiReclamacao`, `IncluiFoto`, `ExcluiFoto`, `Valor_Descontos`, `ConsultaGeracaoCompras`, `ControlaLogistica`) VALUES ( 'MAR', 'MARCELA APARECIDA RIBEIRO', 'MAR181186', 0, 1, 0, 0, 0, 0, 0, , 0, , 0, 0, 0, 1, 0, , , 0, 0, 0, '', '', '', '0000-00-00 00:00:00', '14:58:00', 'FPV', 0, 0, 0, 0, 0, 0, 0, , 0, 0
);
INSERT INTO tabusuarios ( `Identificacao`, `Nome`, `Senha`, `Administracao`, `FILIAL`, `AlteraFilial`, `AlteraFinanceiro`, `Diretoria`, `Perc_Descontos`, `Perc_Juros`, `Atendente`, `Palm`, `Vendedor`, `ControlaOP`, `Master`, `ConsultaPedidos`, `Inativo`, `ControleAutorizacaoCompras`, `ValorMaxSolicitacao`, `ValorMaxCotacao`, `DescontoNF`, `ValorMaxOrdemCompra`, `AutorizacaoReabrePedido`, `DATAATUALIZACAO`, `HORAATUALIZACAO`, `USUARIOATUALIZACAO`, `DATAATUALIZACAO_Alteracao`, `HORAATUALIZACAO_Alteracao`, `USUARIOATUALIZACAO_Alteracao`, `AutorizaAtualizacoes`, `MostrarConsultaCompras`, `NaoAlteraDataPagto`, `EncerraReclamacao`, `DistribuiReclamacao`, `IncluiFoto`, `ExcluiFoto`, `Valor_Descontos`, `ConsultaGeracaoCompras`, `ControlaLogistica`) VALUES ( 'MLC', 'MARILZA LUIZA CARVALHO', '3925', 0, 1, 1, 1, 1, 0, 0, , 0, , 1, 1, 0, 0, 0, , , 0, 0, 0, '0000-00-00 00:00:00', '14:47:00', 'ADM', '0000-00-00 00:00:00', '15:30:00', 'ADM', 0, 0, 0, 0, 0, 0, 0, , 0, 0
);
INSERT INTO tabusuarios ( `Identificacao`, `Nome`, `Senha`, `Administracao`, `FILIAL`, `AlteraFilial`, `AlteraFinanceiro`, `Diretoria`, `Perc_Descontos`, `Perc_Juros`, `Atendente`, `Palm`, `Vendedor`, `ControlaOP`, `Master`, `ConsultaPedidos`, `Inativo`, `ControleAutorizacaoCompras`, `ValorMaxSolicitacao`, `ValorMaxCotacao`, `DescontoNF`, `ValorMaxOrdemCompra`, `AutorizacaoReabrePedido`, `DATAATUALIZACAO`, `HORAATUALIZACAO`, `USUARIOATUALIZACAO`, `DATAATUALIZACAO_Alteracao`, `HORAATUALIZACAO_Alteracao`, `USUARIOATUALIZACAO_Alteracao`, `AutorizaAtualizacoes`, `MostrarConsultaCompras`, `NaoAlteraDataPagto`, `EncerraReclamacao`, `DistribuiReclamacao`, `IncluiFoto`, `ExcluiFoto`, `Valor_Descontos`, `ConsultaGeracaoCompras`, `ControlaLogistica`) VALUES ( 'SEL', 'SELMA', '123', 0, 1, 1, 1, 0, 0, 0, , 0, , 1, 0, 0, 0, 0, , , 0, 0, 0, '0000-00-00 00:00:00', '16:23:00', 'ADM', '0000-00-00 00:00:00', '15:29:00', 'ADM', 0, 0, 0, 0, 0, 0, 0, , 0, 0
);