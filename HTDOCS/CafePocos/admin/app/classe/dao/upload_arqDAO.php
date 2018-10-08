
<?php 
require_once "../classe/conexao.php";

class upload_arqDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraUpload_arq(Upload_arq $entidadeUpload_arq){
		try{
			$param = array(
				':descricao_upload_arq'=>$entidadeUpload_arq->get('descricao_upload_arq'), 
				':tipo_upload_arq'=>$entidadeUpload_arq->get('tipo_upload_arq'), 
				':bool_ativo_upload_arq'=>$entidadeUpload_arq->get('bool_ativo_upload_arq')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO upload_arq (descricao_upload_arq, tipo_upload_arq, bool_ativo_upload_arq) VALUES (:descricao_upload_arq, :tipo_upload_arq, :bool_ativo_upload_arq);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Upload_arq ".$ex->getMessage();
		}
	}
	function atualizaUpload_arq(Upload_arq $entidadeUpload_arq, $id){
		try{
			$param = array(
				':descricao_upload_arq'=>$entidadeUpload_arq->get('descricao_upload_arq'), 
				':tipo_upload_arq'=>$entidadeUpload_arq->get('tipo_upload_arq'), 
				':bool_ativo_upload_arq'=>$entidadeUpload_arq->get('bool_ativo_upload_arq')
			);

			$stmt = $this->pdo->prepare("UPDATE upload_arq SET descricao_upload_arq = :descricao_upload_arq, tipo_upload_arq = :tipo_upload_arq, bool_ativo_upload_arq = :bool_ativo_upload_arq WHERE id_upload_arq = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Upload_arq ".$ex->getMessage();
		}
	}
}
?>