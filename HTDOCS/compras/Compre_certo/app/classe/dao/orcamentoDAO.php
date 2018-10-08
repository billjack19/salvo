
<?php 
require_once "../classe/conexao.php";
require_once "../controllers/funcoes_notificacoesControllerAcao.php";

class orcamentoDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}


	function cadastraOrcamento(Orcamento $entidadeOrcamento, $area){

		// Configuração de notificação
		/* $area = 'orcamento'; */
		$usuarioAtuador = $entidadeOrcamento->get('usuario_id'); 
		$descricaoNotificacao = 'Descrição => '.$entidadeOrcamento->get('descricao_orcamento').'<br>';
		$descricaoNotificacao .= 'Usuário => /%/SELECT * FROM usuario WHERE id_usuario = '.$entidadeOrcamento->get('usuario_id').'/%/<br>';
		$descricaoBool = $entidadeOrcamento->get('bool_ativo_orcamento') == 1 ? "Sim" : "Não";
		$descricaoNotificacao .= 'Ativo => '.$descricaoBool.'<br>';
		$tipo_alteracao_notificacoes = 'i';
		registrarNotificacao($area, $descricaoNotificacao, $usuarioAtuador, $tipo_alteracao_notificacoes, $this->pdo);

		// Tentar gravar um novo registro
		try{
			$param = array(
				':descricao_orcamento'=>$entidadeOrcamento->get('descricao_orcamento'), 
				':usuario_id'=>$entidadeOrcamento->get('usuario_id'), 
				':bool_ativo_orcamento'=>$entidadeOrcamento->get('bool_ativo_orcamento')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO orcamento (descricao_orcamento, usuario_id, bool_ativo_orcamento) VALUES (:descricao_orcamento, :usuario_id, :bool_ativo_orcamento);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Orcamento ".$ex->getMessage();
		}
	}


	function atualizaOrcamento(Orcamento $entidadeOrcamento, $id, $area){

		// Configuração de notificação
		/* $area = 'orcamento'; */
		$descricaoNotificacao = "";
		$controleAteracao = 0;
		$usuarioAtuador = $entidadeOrcamento->get('usuario_id'); 
		$sql = "SELECT * FROM orcamento WHERE id_orcamento = ".$id;
		$verifica = $this->pdo->query($sql);
		foreach ($verifica as $dados){ 
			if ($dados['descricao_orcamento'] != $entidadeOrcamento->get('descricao_orcamento')) {
				$descricaoNotificacao .= '<b style="color: red">Descrição: '.$dados['descricao_orcamento'].' => '.$entidadeOrcamento->get('descricao_orcamento').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Descrição => '.$entidadeOrcamento->get('descricao_orcamento').'<br>';
			}
			if ($dados['usuario_id'] != $entidadeOrcamento->get('usuario_id')) {
				$descricaoNotificacao .= '<b style="color: red">Usuário: /%/SELECT * FROM usuario WHERE id_usuario = '.$dados['usuario_id'].'/%/ => /%/SELECT * FROM usuario WHERE id_usuario = '.$entidadeOrcamento->get('usuario_id').'/%/</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Usuário => /%/SELECT * FROM usuario WHERE id_usuario = '.$entidadeOrcamento->get('usuario_id').'/%/<br>';
			}
			if ($dados['bool_ativo_orcamento'] != $entidadeOrcamento->get('bool_ativo_orcamento')) {
				$descricaoBool = $entidadeOrcamento->get('bool_ativo_orcamento') == 1 ? "Sim" : "Não";
				$descricaoBool2 = $dados['bool_ativo_orcamento'] == 1 ? "Sim" : "Não";
				$descricaoNotificacao .= '<b style="color: red">Ativo: '.$descricaoBool2.' => '.$descricaoBool.'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoBool = $entidadeOrcamento->get('bool_ativo_orcamento') == 1 ? "Sim" : "Não";
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
				':descricao_orcamento'=>$entidadeOrcamento->get('descricao_orcamento'), 
				':usuario_id'=>$entidadeOrcamento->get('usuario_id'), 
				':bool_ativo_orcamento'=>$entidadeOrcamento->get('bool_ativo_orcamento')
			);

			$stmt = $this->pdo->prepare("UPDATE orcamento SET descricao_orcamento = :descricao_orcamento, usuario_id = :usuario_id, bool_ativo_orcamento = :bool_ativo_orcamento WHERE id_orcamento = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Orcamento ".$ex->getMessage();
		}
	}
}
?>