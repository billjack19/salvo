
<?php 
require_once "../classe/conexao.php";

class itemDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraItem(Item $entidadeItem){
		try{
			$param = array(
				':descricao_item'=>$entidadeItem->get('descricao_item'), 
				':unidade_medida_item'=>$entidadeItem->get('unidade_medida_item'), 
				':peso_unitario_item'=>$entidadeItem->get('peso_unitario_item'), 
				':estoque_item'=>$entidadeItem->get('estoque_item'), 
				':sub_grupo_id'=>$entidadeItem->get('sub_grupo_id'), 
				':usuario_id'=>$entidadeItem->get('usuario_id'), 
				':bool_ativo_item'=>$entidadeItem->get('bool_ativo_item')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO item (descricao_item, unidade_medida_item, peso_unitario_item, estoque_item, sub_grupo_id, usuario_id, bool_ativo_item) VALUES (:descricao_item, :unidade_medida_item, :peso_unitario_item, :estoque_item, :sub_grupo_id, :usuario_id, :bool_ativo_item);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Item ".$ex->getMessage();
		}
	}
	function atualizaItem(Item $entidadeItem, $id){
		try{
			$param = array(
				':descricao_item'=>$entidadeItem->get('descricao_item'), 
				':unidade_medida_item'=>$entidadeItem->get('unidade_medida_item'), 
				':peso_unitario_item'=>$entidadeItem->get('peso_unitario_item'), 
				':estoque_item'=>$entidadeItem->get('estoque_item'), 
				':sub_grupo_id'=>$entidadeItem->get('sub_grupo_id'), 
				':usuario_id'=>$entidadeItem->get('usuario_id'), 
				':bool_ativo_item'=>$entidadeItem->get('bool_ativo_item')
			);

			$stmt = $this->pdo->prepare("UPDATE item SET descricao_item = :descricao_item, unidade_medida_item = :unidade_medida_item, peso_unitario_item = :peso_unitario_item, estoque_item = :estoque_item, sub_grupo_id = :sub_grupo_id, usuario_id = :usuario_id, bool_ativo_item = :bool_ativo_item WHERE id_item = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Item ".$ex->getMessage();
		}
	}
}
?>