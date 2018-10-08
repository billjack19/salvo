
<?php 
require_once "../classe/conexao.php";

class statusDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraStatus(Status $entidadeStatus){
		try{
			$param = array(
				':descricao_status'=>$entidadeStatus->get('descricao_status'), 
				':basedados_id'=>$entidadeStatus->get('basedados_id')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO status (descricao_status, basedados_id) VALUES (:descricao_status, :basedados_id);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Status ".$ex->getMessage();
		}
	}
	function atualizaStatus(Status $entidadeStatus, $id){
		try{
			$param = array(
				':descricao_status'=>$entidadeStatus->get('descricao_status'), 
				':basedados_id'=>$entidadeStatus->get('basedados_id')
			);

			$stmt = $this->pdo->prepare("UPDATE status SET descricao_status = :descricao_status, basedados_id = :basedados_id WHERE id_status = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Status ".$ex->getMessage();
		}
	}
}
?>