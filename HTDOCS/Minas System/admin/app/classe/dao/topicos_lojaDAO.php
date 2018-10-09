
<?php 
require_once "../classe/conexao.php";
require_once "../controllers/funcoes_notificacoesControllerAcao.php";

class topicos_lojaDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}


	function cadastraTopicos_loja(Topicos_loja $entidadeTopicos_loja, $area){

		// Configuração de notificação
		/* $area = 'topicos_loja'; */
		 
		$descricaoNotificacao = 'Titulo => '.$entidadeTopicos_loja->get('titulo_topicos_loja').'<br>';
		$descricaoNotificacao .= 'Descrição => '.$entidadeTopicos_loja->get('descricao_topicos_loja').'<br>';
		$descricaoNotificacao .= 'Loja => /%/SELECT * FROM loja WHERE id_loja = '.$entidadeTopicos_loja->get('loja_id').'/%/<br>';
		$descricaoBool = $entidadeTopicos_loja->get('bool_ativo_topicos_loja') == 1 ? "Sim" : "Não";
		$descricaoNotificacao .= 'Ativo => '.$descricaoBool.'<br>';
		$tipo_alteracao_notificacoes = 'i';
		registrarNotificacao($area, $descricaoNotificacao, $usuarioAtuador, $tipo_alteracao_notificacoes, $this->pdo);

		// Tentar gravar um novo registro
		try{
			$param = array(
				':titulo_topicos_loja'=>$entidadeTopicos_loja->get('titulo_topicos_loja'), 
				':descricao_topicos_loja'=>$entidadeTopicos_loja->get('descricao_topicos_loja'), 
				':loja_id'=>$entidadeTopicos_loja->get('loja_id'), 
				':bool_ativo_topicos_loja'=>$entidadeTopicos_loja->get('bool_ativo_topicos_loja')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO topicos_loja (titulo_topicos_loja, descricao_topicos_loja, loja_id, bool_ativo_topicos_loja) VALUES (:titulo_topicos_loja, :descricao_topicos_loja, :loja_id, :bool_ativo_topicos_loja);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Topicos_loja ".$ex->getMessage();
		}
	}


	function atualizaTopicos_loja(Topicos_loja $entidadeTopicos_loja, $id, $area){

		// Configuração de notificação
		/* $area = 'topicos_loja'; */
		$descricaoNotificacao = "";
		$controleAteracao = 0;
		 
		$sql = "SELECT * FROM topicos_loja WHERE id_topicos_loja = ".$id;
		$verifica = $this->pdo->query($sql);
		foreach ($verifica as $dados){ 
			if ($dados['titulo_topicos_loja'] != $entidadeTopicos_loja->get('titulo_topicos_loja')) {
				$descricaoNotificacao .= '<b style="color: red">Titulo: '.$dados['titulo_topicos_loja'].' => '.$entidadeTopicos_loja->get('titulo_topicos_loja').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Titulo => '.$entidadeTopicos_loja->get('titulo_topicos_loja').'<br>';
			}
			if ($dados['descricao_topicos_loja'] != $entidadeTopicos_loja->get('descricao_topicos_loja')) {
				$descricaoNotificacao .= '<b style="color: red">Descrição: '.$dados['descricao_topicos_loja'].' => '.$entidadeTopicos_loja->get('descricao_topicos_loja').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Descrição => '.$entidadeTopicos_loja->get('descricao_topicos_loja').'<br>';
			}
			if ($dados['loja_id'] != $entidadeTopicos_loja->get('loja_id')) {
				$descricaoNotificacao .= '<b style="color: red">Loja: /%/SELECT * FROM loja WHERE id_loja = '.$dados['loja_id'].'/%/ => /%/SELECT * FROM loja WHERE id_loja = '.$entidadeTopicos_loja->get('loja_id').'/%/</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Loja => /%/SELECT * FROM loja WHERE id_loja = '.$entidadeTopicos_loja->get('loja_id').'/%/<br>';
			}
			if ($dados['bool_ativo_topicos_loja'] != $entidadeTopicos_loja->get('bool_ativo_topicos_loja')) {
				$descricaoBool = $entidadeTopicos_loja->get('bool_ativo_topicos_loja') == 1 ? "Sim" : "Não";
				$descricaoBool2 = $dados['bool_ativo_topicos_loja'] == 1 ? "Sim" : "Não";
				$descricaoNotificacao .= '<b style="color: red">Ativo: '.$descricaoBool2.' => '.$descricaoBool.'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoBool = $entidadeTopicos_loja->get('bool_ativo_topicos_loja') == 1 ? "Sim" : "Não";
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
				':titulo_topicos_loja'=>$entidadeTopicos_loja->get('titulo_topicos_loja'), 
				':descricao_topicos_loja'=>$entidadeTopicos_loja->get('descricao_topicos_loja'), 
				':loja_id'=>$entidadeTopicos_loja->get('loja_id'), 
				':bool_ativo_topicos_loja'=>$entidadeTopicos_loja->get('bool_ativo_topicos_loja')
			);

			$stmt = $this->pdo->prepare("UPDATE topicos_loja SET titulo_topicos_loja = :titulo_topicos_loja, descricao_topicos_loja = :descricao_topicos_loja, loja_id = :loja_id, bool_ativo_topicos_loja = :bool_ativo_topicos_loja WHERE id_topicos_loja = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Topicos_loja ".$ex->getMessage();
		}
	}
}
?>