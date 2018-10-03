
<?php 
require_once "../classe/conexao.php";
require_once "../controllers/funcoes_notificacoesControllerAcao.php";

class orcamento_itemDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}


	function cadastraOrcamento_item(Orcamento_item $entidadeOrcamento_item, $area){

		// Configuração de notificação
		/* $area = 'orcamento_item'; */
		$usuarioAtuador = $entidadeOrcamento_item->get('usuario_id'); 
		$descricaoNotificacao = 'Supermercado => /%/SELECT * FROM supermercado WHERE id_supermercado = '.$entidadeOrcamento_item->get('supermercado_id').'/%/<br>';
		$descricaoNotificacao .= 'Item => /%/SELECT * FROM item WHERE id_item = '.$entidadeOrcamento_item->get('item_id').'/%/<br>';
		$descricaoNotificacao .= 'Marca => /%/SELECT * FROM marca WHERE id_marca = '.$entidadeOrcamento_item->get('marca_id').'/%/<br>';
		$descricaoNotificacao .= 'Quantidade => '.$entidadeOrcamento_item->get('quantidade_orcamento_item').'<br>';
		$descricaoNotificacao .= 'Preço => '.$entidadeOrcamento_item->get('preco_orcamento_item').'<br>';
		$descricaoNotificacao .= 'Total => '.$entidadeOrcamento_item->get('total_orcamento_item').'<br>';
		$descricaoNotificacao .= 'Orçamento => /%/SELECT * FROM orcamento WHERE id_orcamento = '.$entidadeOrcamento_item->get('orcamento_id').'/%/<br>';
		$descricaoNotificacao .= 'Usuário => /%/SELECT * FROM usuario WHERE id_usuario = '.$entidadeOrcamento_item->get('usuario_id').'/%/<br>';
		$descricaoBool = $entidadeOrcamento_item->get('bool_ativo_orcamento_item') == 1 ? "Sim" : "Não";
		$descricaoNotificacao .= 'Ativo => '.$descricaoBool.'<br>';
		$tipo_alteracao_notificacoes = 'i';
		registrarNotificacao($area, $descricaoNotificacao, $usuarioAtuador, $tipo_alteracao_notificacoes, $this->pdo);

		// Tentar gravar um novo registro
		try{
			$param = array(
				':supermercado_id'=>$entidadeOrcamento_item->get('supermercado_id'), 
				':item_id'=>$entidadeOrcamento_item->get('item_id'), 
				':marca_id'=>$entidadeOrcamento_item->get('marca_id'), 
				':quantidade_orcamento_item'=>$entidadeOrcamento_item->get('quantidade_orcamento_item'), 
				':preco_orcamento_item'=>$entidadeOrcamento_item->get('preco_orcamento_item'), 
				':total_orcamento_item'=>$entidadeOrcamento_item->get('total_orcamento_item'), 
				':orcamento_id'=>$entidadeOrcamento_item->get('orcamento_id'), 
				':usuario_id'=>$entidadeOrcamento_item->get('usuario_id'), 
				':bool_ativo_orcamento_item'=>$entidadeOrcamento_item->get('bool_ativo_orcamento_item')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO orcamento_item (supermercado_id, item_id, marca_id, quantidade_orcamento_item, preco_orcamento_item, total_orcamento_item, orcamento_id, usuario_id, bool_ativo_orcamento_item) VALUES (:supermercado_id, :item_id, :marca_id, :quantidade_orcamento_item, :preco_orcamento_item, :total_orcamento_item, :orcamento_id, :usuario_id, :bool_ativo_orcamento_item);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Orcamento_item ".$ex->getMessage();
		}
	}


	function atualizaOrcamento_item(Orcamento_item $entidadeOrcamento_item, $id, $area){

		// Configuração de notificação
		/* $area = 'orcamento_item'; */
		$descricaoNotificacao = "";
		$controleAteracao = 0;
		$usuarioAtuador = $entidadeOrcamento_item->get('usuario_id'); 
		$sql = "SELECT * FROM orcamento_item WHERE id_orcamento_item = ".$id;
		$verifica = $this->pdo->query($sql);
		foreach ($verifica as $dados){ 
			if ($dados['supermercado_id'] != $entidadeOrcamento_item->get('supermercado_id')) {
				$descricaoNotificacao .= '<b style="color: red">Supermercado: /%/SELECT * FROM supermercado WHERE id_supermercado = '.$dados['supermercado_id'].'/%/ => /%/SELECT * FROM supermercado WHERE id_supermercado = '.$entidadeOrcamento_item->get('supermercado_id').'/%/</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Supermercado => /%/SELECT * FROM supermercado WHERE id_supermercado = '.$entidadeOrcamento_item->get('supermercado_id').'/%/<br>';
			}
			if ($dados['item_id'] != $entidadeOrcamento_item->get('item_id')) {
				$descricaoNotificacao .= '<b style="color: red">Item: /%/SELECT * FROM item WHERE id_item = '.$dados['item_id'].'/%/ => /%/SELECT * FROM item WHERE id_item = '.$entidadeOrcamento_item->get('item_id').'/%/</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Item => /%/SELECT * FROM item WHERE id_item = '.$entidadeOrcamento_item->get('item_id').'/%/<br>';
			}
			if ($dados['marca_id'] != $entidadeOrcamento_item->get('marca_id')) {
				$descricaoNotificacao .= '<b style="color: red">Marca: /%/SELECT * FROM marca WHERE id_marca = '.$dados['marca_id'].'/%/ => /%/SELECT * FROM marca WHERE id_marca = '.$entidadeOrcamento_item->get('marca_id').'/%/</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Marca => /%/SELECT * FROM marca WHERE id_marca = '.$entidadeOrcamento_item->get('marca_id').'/%/<br>';
			}
			if ($dados['quantidade_orcamento_item'] != $entidadeOrcamento_item->get('quantidade_orcamento_item')) {
				$descricaoNotificacao .= '<b style="color: red">Quantidade: '.$dados['quantidade_orcamento_item'].' => '.$entidadeOrcamento_item->get('quantidade_orcamento_item').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Quantidade => '.$entidadeOrcamento_item->get('quantidade_orcamento_item').'<br>';
			}
			if ($dados['preco_orcamento_item'] != $entidadeOrcamento_item->get('preco_orcamento_item')) {
				$descricaoNotificacao .= '<b style="color: red">Preço: '.$dados['preco_orcamento_item'].' => '.$entidadeOrcamento_item->get('preco_orcamento_item').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Preço => '.$entidadeOrcamento_item->get('preco_orcamento_item').'<br>';
			}
			if ($dados['total_orcamento_item'] != $entidadeOrcamento_item->get('total_orcamento_item')) {
				$descricaoNotificacao .= '<b style="color: red">Total: '.$dados['total_orcamento_item'].' => '.$entidadeOrcamento_item->get('total_orcamento_item').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Total => '.$entidadeOrcamento_item->get('total_orcamento_item').'<br>';
			}
			if ($dados['orcamento_id'] != $entidadeOrcamento_item->get('orcamento_id')) {
				$descricaoNotificacao .= '<b style="color: red">Orçamento: /%/SELECT * FROM orcamento WHERE id_orcamento = '.$dados['orcamento_id'].'/%/ => /%/SELECT * FROM orcamento WHERE id_orcamento = '.$entidadeOrcamento_item->get('orcamento_id').'/%/</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Orçamento => /%/SELECT * FROM orcamento WHERE id_orcamento = '.$entidadeOrcamento_item->get('orcamento_id').'/%/<br>';
			}
			if ($dados['usuario_id'] != $entidadeOrcamento_item->get('usuario_id')) {
				$descricaoNotificacao .= '<b style="color: red">Usuário: /%/SELECT * FROM usuario WHERE id_usuario = '.$dados['usuario_id'].'/%/ => /%/SELECT * FROM usuario WHERE id_usuario = '.$entidadeOrcamento_item->get('usuario_id').'/%/</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Usuário => /%/SELECT * FROM usuario WHERE id_usuario = '.$entidadeOrcamento_item->get('usuario_id').'/%/<br>';
			}
			if ($dados['bool_ativo_orcamento_item'] != $entidadeOrcamento_item->get('bool_ativo_orcamento_item')) {
				$descricaoBool = $entidadeOrcamento_item->get('bool_ativo_orcamento_item') == 1 ? "Sim" : "Não";
				$descricaoBool2 = $dados['bool_ativo_orcamento_item'] == 1 ? "Sim" : "Não";
				$descricaoNotificacao .= '<b style="color: red">Ativo: '.$descricaoBool2.' => '.$descricaoBool.'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoBool = $entidadeOrcamento_item->get('bool_ativo_orcamento_item') == 1 ? "Sim" : "Não";
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
				':supermercado_id'=>$entidadeOrcamento_item->get('supermercado_id'), 
				':item_id'=>$entidadeOrcamento_item->get('item_id'), 
				':marca_id'=>$entidadeOrcamento_item->get('marca_id'), 
				':quantidade_orcamento_item'=>$entidadeOrcamento_item->get('quantidade_orcamento_item'), 
				':preco_orcamento_item'=>$entidadeOrcamento_item->get('preco_orcamento_item'), 
				':total_orcamento_item'=>$entidadeOrcamento_item->get('total_orcamento_item'), 
				':orcamento_id'=>$entidadeOrcamento_item->get('orcamento_id'), 
				':usuario_id'=>$entidadeOrcamento_item->get('usuario_id'), 
				':bool_ativo_orcamento_item'=>$entidadeOrcamento_item->get('bool_ativo_orcamento_item')
			);

			$stmt = $this->pdo->prepare("UPDATE orcamento_item SET supermercado_id = :supermercado_id, item_id = :item_id, marca_id = :marca_id, quantidade_orcamento_item = :quantidade_orcamento_item, preco_orcamento_item = :preco_orcamento_item, total_orcamento_item = :total_orcamento_item, orcamento_id = :orcamento_id, usuario_id = :usuario_id, bool_ativo_orcamento_item = :bool_ativo_orcamento_item WHERE id_orcamento_item = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Orcamento_item ".$ex->getMessage();
		}
	}
}
?>