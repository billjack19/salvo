
<?php 
require_once "../classe/conexao.php";

class testeDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraTeste(Teste $entidadeTeste){
		try{
			$param = array(
				':descricao_teste'=>$entidadeTeste->get('descricao_teste'), 
				':usuario_id'=>$entidadeTeste->get('usuario_id'), 
				':bool_ativo_teste'=>$entidadeTeste->get('bool_ativo_teste')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO teste (descricao_teste, usuario_id, bool_ativo_teste) VALUES (:descricao_teste, :usuario_id, :bool_ativo_teste);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Teste ".$ex->getMessage();
		}
	}
	function atualizaTeste(Teste $entidadeTeste, $id){
		try{
			$param = array(
				':descricao_teste'=>$entidadeTeste->get('descricao_teste'), 
				':usuario_id'=>$entidadeTeste->get('usuario_id'), 
				':bool_ativo_teste'=>$entidadeTeste->get('bool_ativo_teste')
			);

			$stmt = $this->pdo->prepare("UPDATE teste SET descricao_teste = :descricao_teste, usuario_id = :usuario_id, bool_ativo_teste = :bool_ativo_teste WHERE id_teste = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Teste ".$ex->getMessage();
		}
	}
}
?>