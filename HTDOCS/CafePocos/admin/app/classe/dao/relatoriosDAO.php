
<?php 
require_once "../classe/conexao.php";

class relatoriosDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraRelatorios(Relatorios $entidadeRelatorios){
		try{
			$param = array(
				':tabela_relatorios'=>$entidadeRelatorios->get('tabela_relatorios'), 
				':colunas_relatorios'=>$entidadeRelatorios->get('colunas_relatorios'), 
				':usuario_id'=>$entidadeRelatorios->get('usuario_id'), 
				':bool_ativo_relatorios'=>$entidadeRelatorios->get('bool_ativo_relatorios')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO relatorios (tabela_relatorios, colunas_relatorios, usuario_id, bool_ativo_relatorios) VALUES (:tabela_relatorios, :colunas_relatorios, :usuario_id, :bool_ativo_relatorios);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Relatorios ".$ex->getMessage();
		}
	}
	function atualizaRelatorios(Relatorios $entidadeRelatorios, $id){
		try{
			$param = array(
				':tabela_relatorios'=>$entidadeRelatorios->get('tabela_relatorios'), 
				':colunas_relatorios'=>$entidadeRelatorios->get('colunas_relatorios'), 
				':usuario_id'=>$entidadeRelatorios->get('usuario_id'), 
				':bool_ativo_relatorios'=>$entidadeRelatorios->get('bool_ativo_relatorios')
			);

			$stmt = $this->pdo->prepare("UPDATE relatorios SET tabela_relatorios = :tabela_relatorios, colunas_relatorios = :colunas_relatorios, usuario_id = :usuario_id, bool_ativo_relatorios = :bool_ativo_relatorios WHERE id_relatorios = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Relatorios ".$ex->getMessage();
		}
	}
}
?>