
<?php 
require_once "../classe/conexao.php";

class teste_gradeDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraTeste_grade(Teste_grade $entidadeTeste_grade){
		try{
			$param = array(
				':descricao_teste_grade'=>$entidadeTeste_grade->get('descricao_teste_grade'), 
				':teste_id'=>$entidadeTeste_grade->get('teste_id'), 
				':usuario_id'=>$entidadeTeste_grade->get('usuario_id'), 
				':bool_ativo_teste_grade'=>$entidadeTeste_grade->get('bool_ativo_teste_grade')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO teste_grade (descricao_teste_grade, teste_id, usuario_id, bool_ativo_teste_grade) VALUES (:descricao_teste_grade, :teste_id, :usuario_id, :bool_ativo_teste_grade);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Teste_grade ".$ex->getMessage();
		}
	}
	function atualizaTeste_grade(Teste_grade $entidadeTeste_grade, $id){
		try{
			$param = array(
				':descricao_teste_grade'=>$entidadeTeste_grade->get('descricao_teste_grade'), 
				':teste_id'=>$entidadeTeste_grade->get('teste_id'), 
				':usuario_id'=>$entidadeTeste_grade->get('usuario_id'), 
				':bool_ativo_teste_grade'=>$entidadeTeste_grade->get('bool_ativo_teste_grade')
			);

			$stmt = $this->pdo->prepare("UPDATE teste_grade SET descricao_teste_grade = :descricao_teste_grade, teste_id = :teste_id, usuario_id = :usuario_id, bool_ativo_teste_grade = :bool_ativo_teste_grade WHERE id_teste_grade = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Teste_grade ".$ex->getMessage();
		}
	}
}
?>