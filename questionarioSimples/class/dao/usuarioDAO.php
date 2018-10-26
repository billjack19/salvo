<?php 
require_once "../class/conexao.php";

class usuarioDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraUsuario(Usuario $entidadeUsuario){
		try{
			$param = array(
				':Identificacao'=>$entidadeUsuario->get('Identificacao'),
				':Nome'=>$entidadeUsuario->get('Nome'),
				':Senha'=>$entidadeUsuario->get('Senha'),
				':Administracao'=>$entidadeUsuario->get('Administracao'),
				':FILIAL'=>$entidadeUsuario->get('FILIAL'),
				':AlteraFilial'=>$entidadeUsuario->get('AlteraFilial'),
				':AlteraFinanceiro'=>$entidadeUsuario->get('AlteraFinanceiro'),
				':Diretoria'=>$entidadeUsuario->get('Diretoria'),
				':Perc_Descontos'=>$entidadeUsuario->get('Perc_Descontos'),
				':Perc_Juros'=>$entidadeUsuario->get('Perc_Juros'),
				':Atendente'=>$entidadeUsuario->get('Atendente'),
				':Palm'=>$entidadeUsuario->get('Palm'),
				':Vendedor'=>$entidadeUsuario->get('Vendedor'),
				':ControlaOP'=>$entidadeUsuario->get('ControlaOP'),
				':Master'=>$entidadeUsuario->get('Master'),
				':ConsultaPedidos'=>$entidadeUsuario->get('ConsultaPedidos'),
				':Inativo'=>$entidadeUsuario->get('Inativo'),
				':ControleAutorizacaoCompras'=>$entidadeUsuario->get('ControleAutorizacaoCompras'),
				':ValorMaxSolicitacao'=>$entidadeUsuario->get('ValorMaxSolicitacao'),
				':ValorMaxCotacao'=>$entidadeUsuario->get('ValorMaxCotacao'),
				':DescontoNF'=>$entidadeUsuario->get('DescontoNF'),
				':ValorMaxOrdemCompra'=>$entidadeUsuario->get('ValorMaxOrdemCompra'),
				':AutorizacaoReabrePedido'=>$entidadeUsuario->get('AutorizacaoReabrePedido'),
				':DATAATUALIZACAO'=>$entidadeUsuario->get('DATAATUALIZACAO'),
				':HORAATUALIZACAO'=>$entidadeUsuario->get('HORAATUALIZACAO'),
				':USUARIOATUALIZACAO'=>$entidadeUsuario->get('USUARIOATUALIZACAO'),
				':DATAATUALIZACAO_Alteracao'=>$entidadeUsuario->get('DATAATUALIZACAO_Alteracao'),
				':HORAATUALIZACAO_Alteracao'=>$entidadeUsuario->get('HORAATUALIZACAO_Alteracao'),
				':USUARIOATUALIZACAO_Alteracao'=>$entidadeUsuario->get('USUARIOATUALIZACAO_Alteracao'),
				':AutorizaAtualizacoes'=>$entidadeUsuario->get('AutorizaAtualizacoes'),
				':MostrarConsultaCompras'=>$entidadeUsuario->get('MostrarConsultaCompras'),
				':NaoAlteraDataPagto'=>$entidadeUsuario->get('NaoAlteraDataPagto'),
				':EncerraReclamacao'=>$entidadeUsuario->get('EncerraReclamacao'),
				':DistribuiReclamacao'=>$entidadeUsuario->get('DistribuiReclamacao'),
				':IncluiFoto'=>$entidadeUsuario->get('IncluiFoto'),
				':ExcluiFoto'=>$entidadeUsuario->get('ExcluiFoto'),
				':Valor_Descontos'=>$entidadeUsuario->get('Valor_Descontos'),
				':ConsultaGeracaoCompras'=>$entidadeUsuario->get('ConsultaGeracaoCompras'),
				':ControlaLogistica'=>$entidadeUsuario->get('ControlaLogistica')
				);
			
			$stmt = $this->pdo->prepare("INSERT INTO tabusuarios ( Identificacao, Nome, Senha, Administracao, FILIAL, AlteraFilial, AlteraFinanceiro, Diretoria, Perc_Descontos, Perc_Juros, Atendente, Palm, Vendedor, ControlaOP, Master, ConsultaPedidos, Inativo, ControleAutorizacaoCompras, ValorMaxSolicitacao, ValorMaxCotacao, DescontoNF, ValorMaxOrdemCompra, AutorizacaoReabrePedido, DATAATUALIZACAO, HORAATUALIZACAO, USUARIOATUALIZACAO, DATAATUALIZACAO_Alteracao, HORAATUALIZACAO_Alteracao, USUARIOATUALIZACAO_Alteracao, AutorizaAtualizacoes, MostrarConsultaCompras, NaoAlteraDataPagto, EncerraReclamacao, DistribuiReclamacao, IncluiFoto, ExcluiFoto, Valor_Descontos, ConsultaGeracaoCompras, ControlaLogistica ) VALUES ( :Identificacao, :Nome, :Senha, :Administracao, :FILIAL, :AlteraFilial, :AlteraFinanceiro, :Diretoria, :Perc_Descontos, :Perc_Juros, :Atendente, :Palm, :Vendedor, :ControlaOP, :Master, :ConsultaPedidos, :Inativo, :ControleAutorizacaoCompras, :ValorMaxSolicitacao, :ValorMaxCotacao, :DescontoNF, :ValorMaxOrdemCompra, :AutorizacaoReabrePedido, :DATAATUALIZACAO, :HORAATUALIZACAO, :USUARIOATUALIZACAO, :DATAATUALIZACAO_Alteracao, :HORAATUALIZACAO_Alteracao, :USUARIOATUALIZACAO_Alteracao, :AutorizaAtualizacoes, :MostrarConsultaCompras, :NaoAlteraDataPagto, :EncerraReclamacao, :DistribuiReclamacao, :IncluiFoto, :ExcluiFoto, :Valor_Descontos, :ConsultaGeracaoCompras, :ControlaLogistica );");

			return $stmt->execute($param);

		}catch(PDOException $ex){
			return "Erro ao cadastrar Usuario ".$ex->getMessage();

		}
	}
	function atualizaUsuario(Usuario $entidadeUsuario ,$id){
		try{
			$param = array(
				':Nome'=>$entidadeUsuario->get('Nome'),
				':Senha'=>$entidadeUsuario->get('Senha'),
				':Administracao'=>$entidadeUsuario->get('Administracao'),
				':FILIAL'=>$entidadeUsuario->get('FILIAL'),
				':AlteraFilial'=>$entidadeUsuario->get('AlteraFilial'),
				':AlteraFinanceiro'=>$entidadeUsuario->get('AlteraFinanceiro'),
				':Diretoria'=>$entidadeUsuario->get('Diretoria'),
				':Perc_Descontos'=>$entidadeUsuario->get('Perc_Descontos'),
				':Perc_Juros'=>$entidadeUsuario->get('Perc_Juros'),
				':Atendente'=>$entidadeUsuario->get('Atendente'),
				':Palm'=>$entidadeUsuario->get('Palm'),
				':Vendedor'=>$entidadeUsuario->get('Vendedor'),
				':ControlaOP'=>$entidadeUsuario->get('ControlaOP'),
				':Master'=>$entidadeUsuario->get('Master'),
				':ConsultaPedidos'=>$entidadeUsuario->get('ConsultaPedidos'),
				':Inativo'=>$entidadeUsuario->get('Inativo'),
				':ControleAutorizacaoCompras'=>$entidadeUsuario->get('ControleAutorizacaoCompras'),
				':ValorMaxSolicitacao'=>$entidadeUsuario->get('ValorMaxSolicitacao'),
				':ValorMaxCotacao'=>$entidadeUsuario->get('ValorMaxCotacao'),
				':DescontoNF'=>$entidadeUsuario->get('DescontoNF'),
				':ValorMaxOrdemCompra'=>$entidadeUsuario->get('ValorMaxOrdemCompra'),
				':AutorizacaoReabrePedido'=>$entidadeUsuario->get('AutorizacaoReabrePedido'),
				':DATAATUALIZACAO'=>$entidadeUsuario->get('DATAATUALIZACAO'),
				':HORAATUALIZACAO'=>$entidadeUsuario->get('HORAATUALIZACAO'),
				':USUARIOATUALIZACAO'=>$entidadeUsuario->get('USUARIOATUALIZACAO'),
				':DATAATUALIZACAO_Alteracao'=>$entidadeUsuario->get('DATAATUALIZACAO_Alteracao'),
				':HORAATUALIZACAO_Alteracao'=>$entidadeUsuario->get('HORAATUALIZACAO_Alteracao'),
				':USUARIOATUALIZACAO_Alteracao'=>$entidadeUsuario->get('USUARIOATUALIZACAO_Alteracao'),
				':AutorizaAtualizacoes'=>$entidadeUsuario->get('AutorizaAtualizacoes'),
				':MostrarConsultaCompras'=>$entidadeUsuario->get('MostrarConsultaCompras'),
				':NaoAlteraDataPagto'=>$entidadeUsuario->get('NaoAlteraDataPagto'),
				':EncerraReclamacao'=>$entidadeUsuario->get('EncerraReclamacao'),
				':DistribuiReclamacao'=>$entidadeUsuario->get('DistribuiReclamacao'),
				':IncluiFoto'=>$entidadeUsuario->get('IncluiFoto'),
				':ExcluiFoto'=>$entidadeUsuario->get('ExcluiFoto'),
				':Valor_Descontos'=>$entidadeUsuario->get('Valor_Descontos'),
				':ConsultaGeracaoCompras'=>$entidadeUsuario->get('ConsultaGeracaoCompras'),
				':ControlaLogistica'=>$entidadeUsuario->get('ControlaLogistica')
			);
			
			$stmt = $this->pdo->prepare("UPDATE tabusuarios SET Nome = :Nome, Senha = :Senha, Administracao = :Administracao, FILIAL = :FILIAL, AlteraFilial = :AlteraFilial, AlteraFinanceiro = :AlteraFinanceiro, Diretoria = :Diretoria, Perc_Descontos = :Perc_Descontos, Perc_Juros = :Perc_Juros, Atendente = :Atendente, Palm = :Palm, Vendedor = :Vendedor, ControlaOP = :ControlaOP, Master = :Master, ConsultaPedidos = :ConsultaPedidos, Inativo = :Inativo, ControleAutorizacaoCompras = :ControleAutorizacaoCompras, ValorMaxSolicitacao = :ValorMaxSolicitacao, ValorMaxCotacao = :ValorMaxCotacao, DescontoNF = :DescontoNF, ValorMaxOrdemCompra = :ValorMaxOrdemCompra, AutorizacaoReabrePedido = :AutorizacaoReabrePedido, DATAATUALIZACAO = :DATAATUALIZACAO, HORAATUALIZACAO = :HORAATUALIZACAO, USUARIOATUALIZACAO = :USUARIOATUALIZACAO, DATAATUALIZACAO_Alteracao = :DATAATUALIZACAO_Alteracao, HORAATUALIZACAO_Alteracao = :HORAATUALIZACAO_Alteracao, USUARIOATUALIZACAO_Alteracao = :USUARIOATUALIZACAO_Alteracao, AutorizaAtualizacoes = :AutorizaAtualizacoes, MostrarConsultaCompras = :MostrarConsultaCompras, NaoAlteraDataPagto = :NaoAlteraDataPagto, EncerraReclamacao = :EncerraReclamacao, DistribuiReclamacao = :DistribuiReclamacao, IncluiFoto = :IncluiFoto, ExcluiFoto = :ExcluiFoto, Valor_Descontos = :Valor_Descontos, ConsultaGeracaoCompras = :ConsultaGeracaoCompras, ControlaLogistica = :ControlaLogistica WHERE Identificacao = ".$id.";");
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Usuario ".$ex->getMessage();
		}
	}
}
?>