
<?php 
require_once "../classe/conexao.php";
require_once "../controllers/funcoes_notificacoesControllerAcao.php";

class item_orcamentoDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}


	function cadastraItem_orcamento(Item_orcamento $entidadeItem_orcamento, $area){

		// Configuração de notificação
		/* $area = 'item_orcamento'; */
		 
		$descricaoNotificacao = 'Orçamento => /%/SELECT * FROM orcamento WHERE id_orcamento = '.$entidadeItem_orcamento->get('orcamento_id').'/%/<br>';
		$descricaoNotificacao .= 'Item => /%/SELECT * FROM item WHERE id_item = '.$entidadeItem_orcamento->get('item_id').'/%/<br>';
		$descricaoNotificacao .= 'Quantidade => '.$entidadeItem_orcamento->get('quantidade_item_orcamento').'<br>';
		$descricaoNotificacao .= 'Total => '.$entidadeItem_orcamento->get('total_item_orcamento').'<br>';
		$descricaoBool = $entidadeItem_orcamento->get('bool_ativo_item_orcamento') == 1 ? "Sim" : "Não";
		$descricaoNotificacao .= 'Ativo => '.$descricaoBool.'<br>';
		$tipo_alteracao_notificacoes = 'i';
		registrarNotificacao($area, $descricaoNotificacao, $usuarioAtuador, $tipo_alteracao_notificacoes, $this->pdo);

		// Tentar gravar um novo registro
		try{
			$param = array(
				':orcamento_id'=>$entidadeItem_orcamento->get('orcamento_id'), 
				':item_id'=>$entidadeItem_orcamento->get('item_id'), 
				':quantidade_item_orcamento'=>$entidadeItem_orcamento->get('quantidade_item_orcamento'), 
				':total_item_orcamento'=>$entidadeItem_orcamento->get('total_item_orcamento'), 
				':bool_ativo_item_orcamento'=>$entidadeItem_orcamento->get('bool_ativo_item_orcamento')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO item_orcamento (orcamento_id, item_id, quantidade_item_orcamento, total_item_orcamento, bool_ativo_item_orcamento) VALUES (:orcamento_id, :item_id, :quantidade_item_orcamento, :total_item_orcamento, :bool_ativo_item_orcamento);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Item_orcamento ".$ex->getMessage();
		}
	}


	function atualizaItem_orcamento(Item_orcamento $entidadeItem_orcamento, $id, $area){

		// Configuração de notificação
		/* $area = 'item_orcamento'; */
		$descricaoNotificacao = "";
		$controleAteracao = 0;
		 
		$sql = "SELECT * FROM item_orcamento WHERE id_item_orcamento = ".$id;
		$verifica = $this->pdo->query($sql);
		foreach ($verifica as $dados){ 
			if ($dados['orcamento_id'] != $entidadeItem_orcamento->get('orcamento_id')) {
				$descricaoNotificacao .= '<b style="color: red">Orçamento: /%/SELECT * FROM orcamento WHERE id_orcamento = '.$dados['orcamento_id'].'/%/ => /%/SELECT * FROM orcamento WHERE id_orcamento = '.$entidadeItem_orcamento->get('orcamento_id').'/%/</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Orçamento => /%/SELECT * FROM orcamento WHERE id_orcamento = '.$entidadeItem_orcamento->get('orcamento_id').'/%/<br>';
			}
			if ($dados['item_id'] != $entidadeItem_orcamento->get('item_id')) {
				$descricaoNotificacao .= '<b style="color: red">Item: /%/SELECT * FROM item WHERE id_item = '.$dados['item_id'].'/%/ => /%/SELECT * FROM item WHERE id_item = '.$entidadeItem_orcamento->get('item_id').'/%/</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Item => /%/SELECT * FROM item WHERE id_item = '.$entidadeItem_orcamento->get('item_id').'/%/<br>';
			}
			if ($dados['quantidade_item_orcamento'] != $entidadeItem_orcamento->get('quantidade_item_orcamento')) {
				$descricaoNotificacao .= '<b style="color: red">Quantidade: '.$dados['quantidade_item_orcamento'].' => '.$entidadeItem_orcamento->get('quantidade_item_orcamento').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Quantidade => '.$entidadeItem_orcamento->get('quantidade_item_orcamento').'<br>';
			}
			if ($dados['total_item_orcamento'] != $entidadeItem_orcamento->get('total_item_orcamento')) {
				$descricaoNotificacao .= '<b style="color: red">Total: '.$dados['total_item_orcamento'].' => '.$entidadeItem_orcamento->get('total_item_orcamento').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Total => '.$entidadeItem_orcamento->get('total_item_orcamento').'<br>';
			}
			if ($dados['bool_ativo_item_orcamento'] != $entidadeItem_orcamento->get('bool_ativo_item_orcamento')) {
				$descricaoBool = $entidadeItem_orcamento->get('bool_ativo_item_orcamento') == 1 ? "Sim" : "Não";
				$descricaoBool2 = $dados['bool_ativo_item_orcamento'] == 1 ? "Sim" : "Não";
				$descricaoNotificacao .= '<b style="color: red">Ativo: '.$descricaoBool2.' => '.$descricaoBool.'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoBool = $entidadeItem_orcamento->get('bool_ativo_item_orcamento') == 1 ? "Sim" : "Não";
				$descricaoNotificacao .= 'Ativo => '.$descricaoBool.'<br>';
			}
		}
		$tipo_alteracao_notificacoes = 'u';
		if($descricaoNotificacao != "" && $controleAteracao != 0){
			registrarNotificacao($area, $descricaoNotificacao, $usuarioAtuador, $tipo_alteracao_notificacoes, $this->pdo);
		}

		// Tenta atualizar um registro exitente
		try{
			$param = array(
				':orcamento_id'=>$entidadeItem_orcamento->get('orcamento_id'), 
				':item_id'=>$entidadeItem_orcamento->get('item_id'), 
				':quantidade_item_orcamento'=>$entidadeItem_orcamento->get('quantidade_item_orcamento'), 
				':total_item_orcamento'=>$entidadeItem_orcamento->get('total_item_orcamento'), 
				':bool_ativo_item_orcamento'=>$entidadeItem_orcamento->get('bool_ativo_item_orcamento')
			);

			$stmt = $this->pdo->prepare("UPDATE item_orcamento SET orcamento_id = :orcamento_id, item_id = :item_id, quantidade_item_orcamento = :quantidade_item_orcamento, total_item_orcamento = :total_item_orcamento, bool_ativo_item_orcamento = :bool_ativo_item_orcamento WHERE id_item_orcamento = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Item_orcamento ".$ex->getMessage();
		}
	}
}
?>