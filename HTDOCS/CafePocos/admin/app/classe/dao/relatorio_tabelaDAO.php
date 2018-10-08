
<?php 
require_once "../classe/conexao.php";

class relatorio_tabelaDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraRelatorio_tabela(Relatorio_tabela $entidadeRelatorio_tabela){
		try{
			$param = array(
				':descricao_relatorio_tabela'=>$entidadeRelatorio_tabela->get('descricao_relatorio_tabela'), 
				':bool_ativo_relatorio_tabela'=>$entidadeRelatorio_tabela->get('bool_ativo_relatorio_tabela')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO relatorio_tabela (descricao_relatorio_tabela, bool_ativo_relatorio_tabela) VALUES (:descricao_relatorio_tabela, :bool_ativo_relatorio_tabela);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Relatorio_tabela ".$ex->getMessage();
		}
	}
	function atualizaRelatorio_tabela(Relatorio_tabela $entidadeRelatorio_tabela, $id){
		try{
			$param = array(
				':descricao_relatorio_tabela'=>$entidadeRelatorio_tabela->get('descricao_relatorio_tabela'), 
				':bool_ativo_relatorio_tabela'=>$entidadeRelatorio_tabela->get('bool_ativo_relatorio_tabela')
			);

			$stmt = $this->pdo->prepare("UPDATE relatorio_tabela SET descricao_relatorio_tabela = :descricao_relatorio_tabela, bool_ativo_relatorio_tabela = :bool_ativo_relatorio_tabela WHERE id_relatorio_tabela = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Relatorio_tabela ".$ex->getMessage();
		}
	}
}
?>