<?php 
require_once "../class/conexao.php";

class loteamentoDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraLoteamento(Loteamento $entidadeLoteamento){
		try{
			$param = array(
				':Nome'=>$entidadeLoteamento->get('Nome'),
				':AreaTotal'=>$entidadeLoteamento->get('AreaTotal'),
				':QtdeLotes'=>$entidadeLoteamento->get('QtdeLotes'),
				':QtdeLotesDisp'=>$entidadeLoteamento->get('QtdeLotesDisp'),
				':Observacao'=>$entidadeLoteamento->get('Observacao'),
				':DataAtualizacao'=>$entidadeLoteamento->get('DataAtualizacao'),
				':HoraAtualizacao'=>$entidadeLoteamento->get('HoraAtualizacao'),
				':UsuarioAtualizacao'=>$entidadeLoteamento->get('UsuarioAtualizacao'),
				':CaminhoImagem'=>$entidadeLoteamento->get('CaminhoImagem'),
				':ObservacaoCorretagem'=>$entidadeLoteamento->get('ObservacaoCorretagem'),
				':TabCoeficiente'=>$entidadeLoteamento->get('TabCoeficiente'),
				':EmpresaLoteamento'=>$entidadeLoteamento->get('EmpresaLoteamento'),
				':CEP'=>$entidadeLoteamento->get('CEP'),
				':Cidade'=>$entidadeLoteamento->get('Cidade'),
				':Estado'=>$entidadeLoteamento->get('Estado'),
				':ValorTaxaAdministrativa'=>$entidadeLoteamento->get('ValorTaxaAdministrativa'),
				':ContaCustoComissao'=>$entidadeLoteamento->get('ContaCustoComissao'),
				':PrazoEscritura'=>$entidadeLoteamento->get('PrazoEscritura'),
				':grupo_conta_Reembolso'=>$entidadeLoteamento->get('grupo_conta_Reembolso'),
				':seq_cta_custo_Reembolso'=>$entidadeLoteamento->get('seq_cta_custo_Reembolso'),
				':sub_grupo_Reembolso'=>$entidadeLoteamento->get('sub_grupo_Reembolso'),
				':ck_Mostrar_Site'=>$entidadeLoteamento->get('ck_Mostrar_Site'),
				':Latitude'=>$entidadeLoteamento->get('Latitude'),
				':Longitude'=>$entidadeLoteamento->get('Longitude'),
				':DescricaoParaSite'=>$entidadeLoteamento->get('DescricaoParaSite'),
				':DescricaoResumidaParaSite'=>$entidadeLoteamento->get('DescricaoResumidaParaSite')
				);
			
			$stmt = $this->pdo->prepare("INSERT INTO tabloteamentos ( Nome, AreaTotal, QtdeLotes, QtdeLotesDisp, Observacao, DataAtualizacao, HoraAtualizacao, UsuarioAtualizacao, CaminhoImagem, ObservacaoCorretagem, TabCoeficiente, EmpresaLoteamento, CEP, Cidade, Estado, ValorTaxaAdministrativa, ContaCustoComissao, PrazoEscritura, grupo_conta_Reembolso, seq_cta_custo_Reembolso, sub_grupo_Reembolso, ck_Mostrar_Site, Latitude, Longitude, DescricaoParaSite, DescricaoResumidaParaSite ) VALUES ( :Nome, :AreaTotal, :QtdeLotes, :QtdeLotesDisp, :Observacao, :DataAtualizacao, :HoraAtualizacao, :UsuarioAtualizacao, :CaminhoImagem, :ObservacaoCorretagem, :TabCoeficiente, :EmpresaLoteamento, :CEP, :Cidade, :Estado, :ValorTaxaAdministrativa, :ContaCustoComissao, :PrazoEscritura, :grupo_conta_Reembolso, :seq_cta_custo_Reembolso, :sub_grupo_Reembolso, :ck_Mostrar_Site, :Latitude, :Longitude, :DescricaoParaSite, :DescricaoResumidaParaSite );"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Loteamento ".$ex->getMessage();
		}
	}
	function atualizaLoteamento(Loteamento $entidadeLoteamento, $id){
		try{
			$param = array(
				':Nome'=>$entidadeLoteamento->get('Nome'),
				':AreaTotal'=>$entidadeLoteamento->get('AreaTotal'),
				':QtdeLotes'=>$entidadeLoteamento->get('QtdeLotes'),
				':QtdeLotesDisp'=>$entidadeLoteamento->get('QtdeLotesDisp'),
				':Observacao'=>$entidadeLoteamento->get('Observacao'),
				':DataAtualizacao'=>$entidadeLoteamento->get('DataAtualizacao'),
				':HoraAtualizacao'=>$entidadeLoteamento->get('HoraAtualizacao'),
				':UsuarioAtualizacao'=>$entidadeLoteamento->get('UsuarioAtualizacao'),
				':CaminhoImagem'=>$entidadeLoteamento->get('CaminhoImagem'),
				':ObservacaoCorretagem'=>$entidadeLoteamento->get('ObservacaoCorretagem'),
				':TabCoeficiente'=>$entidadeLoteamento->get('TabCoeficiente'),
				':EmpresaLoteamento'=>$entidadeLoteamento->get('EmpresaLoteamento'),
				':CEP'=>$entidadeLoteamento->get('CEP'),
				':Cidade'=>$entidadeLoteamento->get('Cidade'),
				':Estado'=>$entidadeLoteamento->get('Estado'),
				':ValorTaxaAdministrativa'=>$entidadeLoteamento->get('ValorTaxaAdministrativa'),
				':ContaCustoComissao'=>$entidadeLoteamento->get('ContaCustoComissao'),
				':PrazoEscritura'=>$entidadeLoteamento->get('PrazoEscritura'),
				':grupo_conta_Reembolso'=>$entidadeLoteamento->get('grupo_conta_Reembolso'),
				':seq_cta_custo_Reembolso'=>$entidadeLoteamento->get('seq_cta_custo_Reembolso'),
				':sub_grupo_Reembolso'=>$entidadeLoteamento->get('sub_grupo_Reembolso'),
				':ck_Mostrar_Site'=>$entidadeLoteamento->get('ck_Mostrar_Site'),
				':Latitude'=>$entidadeLoteamento->get('Latitude'),
				':Longitude'=>$entidadeLoteamento->get('Longitude'),
				':DescricaoParaSite'=>$entidadeLoteamento->get('DescricaoParaSite'),
				':DescricaoResumidaParaSite'=>$entidadeLoteamento->get('DescricaoResumidaParaSite')
				);

			$stmt = $this->pdo->prepare("UPDATE tabloteamentos SET Nome = :Nome, AreaTotal = :AreaTotal, QtdeLotes = :QtdeLotes, QtdeLotesDisp = :QtdeLotesDisp, Observacao = :Observacao, DataAtualizacao = :DataAtualizacao, HoraAtualizacao = :HoraAtualizacao, UsuarioAtualizacao = :UsuarioAtualizacao, CaminhoImagem = :CaminhoImagem, ObservacaoCorretagem = :ObservacaoCorretagem, TabCoeficiente = :TabCoeficiente, EmpresaLoteamento = :EmpresaLoteamento, CEP = :CEP, Cidade = :Cidade, Estado = :Estado, ValorTaxaAdministrativa = :ValorTaxaAdministrativa, ContaCustoComissao = :ContaCustoComissao, PrazoEscritura = :PrazoEscritura, grupo_conta_Reembolso = :grupo_conta_Reembolso, seq_cta_custo_Reembolso = :seq_cta_custo_Reembolso, sub_grupo_Reembolso = :sub_grupo_Reembolso, ck_Mostrar_Site = :ck_Mostrar_Site, Latitude = :Latitude, Longitude = :Longitude, DescricaoParaSite = :DescricaoParaSite, DescricaoResumidaParaSite = :DescricaoResumidaParaSite WHERE Codigo = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Loteamento ".$ex->getMessage();
		}
	}
}
?>