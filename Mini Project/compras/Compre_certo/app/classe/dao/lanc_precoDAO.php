
<?php 
require_once "../classe/conexao.php";
require_once "../controllers/funcoes_notificacoesControllerAcao.php";

class lanc_precoDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}


	function cadastraLanc_preco(Lanc_preco $entidadeLanc_preco, $area){

		// Configuração de notificação
		/* $area = 'lanc_preco'; */
		$usuarioAtuador = $entidadeLanc_preco->get('usuario_id'); 
		$descricaoNotificacao = 'Supermercado => /%/SELECT * FROM supermercado WHERE id_supermercado = '.$entidadeLanc_preco->get('supermercado_id').'/%/<br>';
		$descricaoNotificacao .= 'Item => /%/SELECT * FROM item WHERE id_item = '.$entidadeLanc_preco->get('item_id').'/%/<br>';
		$descricaoNotificacao .= 'Marca => /%/SELECT * FROM marca WHERE id_marca = '.$entidadeLanc_preco->get('marca_id').'/%/<br>';
		$descricaoNotificacao .= 'Preço => '.$entidadeLanc_preco->get('preco_lanc_preco').'<br>';
		$descricaoNotificacao .= 'Usuário => /%/SELECT * FROM usuario WHERE id_usuario = '.$entidadeLanc_preco->get('usuario_id').'/%/<br>';
		$descricaoBool = $entidadeLanc_preco->get('bool_ativo_lanc_preco') == 1 ? "Sim" : "Não";
		$descricaoNotificacao .= 'Ativo => '.$descricaoBool.'<br>';
		$tipo_alteracao_notificacoes = 'i';
		registrarNotificacao($area, $descricaoNotificacao, $usuarioAtuador, $tipo_alteracao_notificacoes, $this->pdo);

		// Tentar gravar um novo registro
		try{
			$param = array(
				':supermercado_id'=>$entidadeLanc_preco->get('supermercado_id'), 
				':item_id'=>$entidadeLanc_preco->get('item_id'), 
				':marca_id'=>$entidadeLanc_preco->get('marca_id'), 
				':preco_lanc_preco'=>$entidadeLanc_preco->get('preco_lanc_preco'), 
				':usuario_id'=>$entidadeLanc_preco->get('usuario_id'), 
				':bool_ativo_lanc_preco'=>$entidadeLanc_preco->get('bool_ativo_lanc_preco')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO lanc_preco (supermercado_id, item_id, marca_id, preco_lanc_preco, usuario_id, bool_ativo_lanc_preco) VALUES (:supermercado_id, :item_id, :marca_id, :preco_lanc_preco, :usuario_id, :bool_ativo_lanc_preco);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Lanc_preco ".$ex->getMessage();
		}
	}


	function atualizaLanc_preco(Lanc_preco $entidadeLanc_preco, $id, $area){

		// Configuração de notificação
		/* $area = 'lanc_preco'; */
		$descricaoNotificacao = "";
		$controleAteracao = 0;
		$usuarioAtuador = $entidadeLanc_preco->get('usuario_id'); 
		$sql = "SELECT * FROM lanc_preco WHERE id_lanc_preco = ".$id;
		$verifica = $this->pdo->query($sql);
		foreach ($verifica as $dados){ 
			if ($dados['supermercado_id'] != $entidadeLanc_preco->get('supermercado_id')) {
				$descricaoNotificacao .= '<b style="color: red">Supermercado: /%/SELECT * FROM supermercado WHERE id_supermercado = '.$dados['supermercado_id'].'/%/ => /%/SELECT * FROM supermercado WHERE id_supermercado = '.$entidadeLanc_preco->get('supermercado_id').'/%/</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Supermercado => /%/SELECT * FROM supermercado WHERE id_supermercado = '.$entidadeLanc_preco->get('supermercado_id').'/%/<br>';
			}
			if ($dados['item_id'] != $entidadeLanc_preco->get('item_id')) {
				$descricaoNotificacao .= '<b style="color: red">Item: /%/SELECT * FROM item WHERE id_item = '.$dados['item_id'].'/%/ => /%/SELECT * FROM item WHERE id_item = '.$entidadeLanc_preco->get('item_id').'/%/</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Item => /%/SELECT * FROM item WHERE id_item = '.$entidadeLanc_preco->get('item_id').'/%/<br>';
			}
			if ($dados['marca_id'] != $entidadeLanc_preco->get('marca_id')) {
				$descricaoNotificacao .= '<b style="color: red">Marca: /%/SELECT * FROM marca WHERE id_marca = '.$dados['marca_id'].'/%/ => /%/SELECT * FROM marca WHERE id_marca = '.$entidadeLanc_preco->get('marca_id').'/%/</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Marca => /%/SELECT * FROM marca WHERE id_marca = '.$entidadeLanc_preco->get('marca_id').'/%/<br>';
			}
			if ($dados['preco_lanc_preco'] != $entidadeLanc_preco->get('preco_lanc_preco')) {
				$descricaoNotificacao .= '<b style="color: red">Preço: '.$dados['preco_lanc_preco'].' => '.$entidadeLanc_preco->get('preco_lanc_preco').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Preço => '.$entidadeLanc_preco->get('preco_lanc_preco').'<br>';
			}
			if ($dados['usuario_id'] != $entidadeLanc_preco->get('usuario_id')) {
				$descricaoNotificacao .= '<b style="color: red">Usuário: /%/SELECT * FROM usuario WHERE id_usuario = '.$dados['usuario_id'].'/%/ => /%/SELECT * FROM usuario WHERE id_usuario = '.$entidadeLanc_preco->get('usuario_id').'/%/</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Usuário => /%/SELECT * FROM usuario WHERE id_usuario = '.$entidadeLanc_preco->get('usuario_id').'/%/<br>';
			}
			if ($dados['bool_ativo_lanc_preco'] != $entidadeLanc_preco->get('bool_ativo_lanc_preco')) {
				$descricaoBool = $entidadeLanc_preco->get('bool_ativo_lanc_preco') == 1 ? "Sim" : "Não";
				$descricaoBool2 = $dados['bool_ativo_lanc_preco'] == 1 ? "Sim" : "Não";
				$descricaoNotificacao .= '<b style="color: red">Ativo: '.$descricaoBool2.' => '.$descricaoBool.'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoBool = $entidadeLanc_preco->get('bool_ativo_lanc_preco') == 1 ? "Sim" : "Não";
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
				':supermercado_id'=>$entidadeLanc_preco->get('supermercado_id'), 
				':item_id'=>$entidadeLanc_preco->get('item_id'), 
				':marca_id'=>$entidadeLanc_preco->get('marca_id'), 
				':preco_lanc_preco'=>$entidadeLanc_preco->get('preco_lanc_preco'), 
				':usuario_id'=>$entidadeLanc_preco->get('usuario_id'), 
				':bool_ativo_lanc_preco'=>$entidadeLanc_preco->get('bool_ativo_lanc_preco')
			);

			$stmt = $this->pdo->prepare("UPDATE lanc_preco SET supermercado_id = :supermercado_id, item_id = :item_id, marca_id = :marca_id, preco_lanc_preco = :preco_lanc_preco, usuario_id = :usuario_id, bool_ativo_lanc_preco = :bool_ativo_lanc_preco WHERE id_lanc_preco = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Lanc_preco ".$ex->getMessage();
		}
	}
}
?>