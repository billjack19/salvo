
<?php 
require_once "../classe/conexao.php";

class basedadosDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraBasedados(Basedados $entidadeBasedados){
		try{
			$param = array(
				':descricao_baseDados'=>$entidadeBasedados->get('descricao_baseDados'), 
				':regitros_id'=>$entidadeBasedados->get('regitros_id')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO basedados (descricao_baseDados, regitros_id) VALUES (:descricao_baseDados, :regitros_id);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Basedados ".$ex->getMessage();
		}
	}
	function atualizaBasedados(Basedados $entidadeBasedados, $id){
		try{
			$param = array(
				':descricao_baseDados'=>$entidadeBasedados->get('descricao_baseDados'), 
				':regitros_id'=>$entidadeBasedados->get('regitros_id')
			);

			$stmt = $this->pdo->prepare("UPDATE basedados SET descricao_baseDados = :descricao_baseDados, regitros_id = :regitros_id WHERE id_baseDados = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Basedados ".$ex->getMessage();
		}
	}
}
?>