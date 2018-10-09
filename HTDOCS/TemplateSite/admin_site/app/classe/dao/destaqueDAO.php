
<?php 
require_once "../classe/conexao.php";

class destaqueDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraDestaque(Destaque $entidadeDestaque){
		try{
			$param = array(
				':descricao_destaque'=>$entidadeDestaque->get('descricao_destaque'), 
				':grupo_id'=>$entidadeDestaque->get('grupo_id'), 
				':imagem_destaque'=>$entidadeDestaque->get('imagem_destaque'), 
				':bool_ativo_destaque'=>$entidadeDestaque->get('bool_ativo_destaque')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO destaque (descricao_destaque, grupo_id, imagem_destaque, bool_ativo_destaque) VALUES (:descricao_destaque, :grupo_id, :imagem_destaque, :bool_ativo_destaque);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Destaque ".$ex->getMessage();
		}
	}
	function atualizaDestaque(Destaque $entidadeDestaque, $id){
		try{
			$param = array(
				':descricao_destaque'=>$entidadeDestaque->get('descricao_destaque'), 
				':grupo_id'=>$entidadeDestaque->get('grupo_id'), 
				':imagem_destaque'=>$entidadeDestaque->get('imagem_destaque'), 
				':bool_ativo_destaque'=>$entidadeDestaque->get('bool_ativo_destaque')
			);

			$stmt = $this->pdo->prepare("UPDATE destaque SET descricao_destaque = :descricao_destaque, grupo_id = :grupo_id, imagem_destaque = :imagem_destaque, bool_ativo_destaque = :bool_ativo_destaque WHERE id_destaque = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Destaque ".$ex->getMessage();
		}
	}
}
?>