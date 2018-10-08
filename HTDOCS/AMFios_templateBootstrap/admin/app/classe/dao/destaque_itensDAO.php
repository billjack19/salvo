
<?php 
require_once "../classe/conexao.php";

class destaque_itensDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraDestaque_itens(Destaque_itens $entidadeDestaque_itens){
		try{
			$param = array(
				':descricao_destaque_itens'=>$entidadeDestaque_itens->get('descricao_destaque_itens'), 
				':item_id'=>$entidadeDestaque_itens->get('item_id'), 
				':configurar_site_id'=>$entidadeDestaque_itens->get('configurar_site_id'), 
				':bool_ativo_destaque_itens'=>$entidadeDestaque_itens->get('bool_ativo_destaque_itens')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO destaque_itens (descricao_destaque_itens, item_id, configurar_site_id, bool_ativo_destaque_itens) VALUES (:descricao_destaque_itens, :item_id, :configurar_site_id, :bool_ativo_destaque_itens);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Destaque_itens ".$ex->getMessage();
		}
	}
	function atualizaDestaque_itens(Destaque_itens $entidadeDestaque_itens, $id){
		try{
			$param = array(
				':descricao_destaque_itens'=>$entidadeDestaque_itens->get('descricao_destaque_itens'), 
				':item_id'=>$entidadeDestaque_itens->get('item_id'), 
				':configurar_site_id'=>$entidadeDestaque_itens->get('configurar_site_id'), 
				':bool_ativo_destaque_itens'=>$entidadeDestaque_itens->get('bool_ativo_destaque_itens')
			);

			$stmt = $this->pdo->prepare("UPDATE destaque_itens SET descricao_destaque_itens = :descricao_destaque_itens, item_id = :item_id, configurar_site_id = :configurar_site_id, bool_ativo_destaque_itens = :bool_ativo_destaque_itens WHERE id_destaque_itens = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Destaque_itens ".$ex->getMessage();
		}
	}
}
?>